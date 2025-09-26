<?php 
include('db.php');

// Fetch batch details
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM batch WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($res = pg_fetch_assoc($result)){
        $batch = $res['batch'];
    }
}

// Update batch
if(isset($_POST['submit'])){
    $batch = $_POST['batch'];
    $query = "UPDATE batch SET batch='$batch' WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($result){
        echo "<script>alert('Batch Updated Successfully'); window.location='batch.php';</script>";
    } else {
        echo "<script>alert('Failed To Update'); window.location='batch.php';</script>";
    }
}

// Pagination setup
$limit = 5; // Number of rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM batch";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated results
$query = "SELECT * FROM batch ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>


<body>

<?php include('navbar.php');?>

<main class="main-content">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 fw-bold text-primary">Edit Batch</h1>
    <a href="batch.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </header>

  <!-- Edit Batch Form -->
  <div class="card card-custom p-4 mb-4">
    <h5 class="mb-3">Update Batch</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label fw-semibold">Batch </label>
        <input type="text" name="batch" class="form-control" value="<?php echo $res['batch']; ?>" placeholder="Enter Batch Name" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>

  <!-- Batch Table -->
  <div class="card card-custom p-4 table-container">
    <h5 class="mb-3">Batch List</h5>
    <table class="table table-bordered table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>S.No.</th>
          <th>Batch</th>
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
          <td><?php echo $res['batch']; ?></td>
          <td>
            <span class="badge <?php echo ($res['status']==1)?'bg-success':'bg-danger'; ?>">
              <?php echo ($res['status']==1)?'Active':'Deactive'; ?>
            </span>
          </td>
          <td>
            <a href="edit_batch.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
            <a href="status.php?table=batch&id=<?php echo $res['id']; ?>" class="btn btn-sm <?php echo ($res['status']==1)?'btn-success':'btn-danger'; ?>">
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
</main>

</body>

