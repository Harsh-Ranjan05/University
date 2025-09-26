<?php 
include('db.php');

// Insert Subject
if(isset($_POST['submit'])){
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $query="INSERT INTO subject(subject_name,subject_code) VALUES('$subject_name','$subject_code')";
    $result=pg_query($conn, $query);
    if($result){
        echo "<script>alert('Added Successfully..'); window.location='subject.php';</script>";
    }else{
        echo "<script>alert('Failed To Add..'); window.location='subject.php';</script>";
    }
}

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM subject";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated results
$query = "SELECT * FROM subject ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>



<body>

<?php include('navbar.php');?>

<main class="main-content">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 fw-bold text-primary">Subject Management</h1>
    <!-- Add Subject Button -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
      <i class="fas fa-plus"></i> Add Subject
    </button>
  </header>

  <section class="table-container">
    <div class="card card-custom p-4">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $i = $offset + 1;
        while($res = pg_fetch_assoc($result)){ ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['subject_code']; ?></td>
            <td><?php echo $res['subject_name']; ?></td>
            <td>
              <span class="badge <?php echo ($res['status'] == 1) ? 'bg-success' : 'bg-danger'; ?>">
                <?php echo ($res['status'] == 1) ? 'Active' : 'Deactive'; ?>
              </span>
            </td>
            <td>
              <a href="edit_subject.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a href="status.php?table=subject&id=<?php echo $res['id']; ?>" class="btn btn-sm <?php echo ($res['status']==1)?'btn-success':'btn-danger'; ?>">
                <?php echo ($res['status']==1)?'Active':'Deactive'; ?>
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>

      <!-- Pagination -->
      <nav>
        <ul class="pagination justify-content-center mt-3">
          <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
          </li>
          <?php for($i=1; $i<=$total_pages; $i++){ ?>
            <li class="page-item <?php if($i==$page) echo 'active'; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
</main>

<!-- Add Subject Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubjectModalLabel">Add Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label fw-semibold">Subject Name</label>
            <input type="text" name="subject_name" class="form-control" placeholder="Enter Subject Name" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Subject Code</label>
            <input type="text" name="subject_code" class="form-control" placeholder="Enter Subject Code" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>

