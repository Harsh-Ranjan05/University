<?php 
include('db.php');

// Insert Branch
if(isset($_POST['submit'])){
    $branch = $_POST['branch'];
    $query="INSERT INTO branch(branch) VALUES('$branch')";
    $result=pg_query($conn, $query);
    if($result){
        echo "<script>alert('Added Successfully..'); window.location='branch.php';</script>";
    }else{
        echo "<script>alert('Failed To Add..'); window.location='branch.php';</script>";
    }
}

// Pagination setup
$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM branch";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated results
$query = "SELECT * FROM branch ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>

<body>

<?php include('navbar.php');?> 

<main class="main-content">
  <header class="topbar">
    <h1 class="h4 fw-bold text-primary">Dashboard</h1>
    <div class="profile fw-semibold">Welcome,<?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>

  <section class="content">
    <div class="card card-custom p-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 text-secondary">Branch List</h2>
        <!-- Add Branch Button -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBranchModal">
          <i class="fas fa-plus"></i> Add Branch
        </button>
      </div>

      <!-- Table -->
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Branch Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = $offset + 1;
          while ($res = pg_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['branch']; ?></td>
            <td>
              <span class="badge <?php echo ($res['status'] == 1) ? 'bg-success' : 'bg-danger'; ?>">
                <?php echo ($res['status'] == 1) ? 'Active' : 'Deactive'; ?>
              </span>
            </td>
            <td>
              <a href="edit_branch.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i> Edit
              </a>
              <?php if ($res['status'] == 1) { ?>
                  <a href="status.php?table=branch&id=<?php echo $res['id']; ?>" class="btn btn-sm btn-success">
                      <i class="fas fa-check-circle"></i> Active
                  </a>
              <?php } else { ?>
                  <a href="status.php?table=branch&id=<?php echo $res['id']; ?>" class="btn btn-sm btn-danger">
                      <i class="fas fa-times-circle"></i> Deactive
                  </a>
              <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <!-- Pagination -->
      <nav>
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
          </li>
          <?php for ($i=1; $i <= $total_pages; $i++) { ?>
            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
              <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
            <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
</main>

<!-- Add Branch Modal -->
<div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title" id="addBranchModalLabel">Add Branch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="branch" class="form-label fw-semibold">Branch Name</label>
            <input type="text" id="branch" name="branch" class="form-control" placeholder="Enter branch name" required>
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

