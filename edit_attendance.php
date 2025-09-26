<?php 
include('db.php');

// Fetch existing attendance record
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM attendance WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($res = pg_fetch_assoc($result)){
        $full_name = $res['full_name'];
        $date = $res['date'];
        $program = $res['program'];
        $day = $res['day'];
    }
}

// Update attendance
if(isset($_POST['submit'])){
    $day = $_POST['day'];
    $query = "UPDATE attendance SET day='$day' WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($result){
        echo "<script>alert('Updated Successfully'); window.location='edit_attendance.php';</script>";
    } else {
        echo "<script>alert('Failed to Update'); window.location='edit_attendance.php';</script>";
    }
}

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM attendance";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated results
$query = "SELECT * FROM attendance ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>

<body>

<?php include('navbar.php');?>

<main class="main-content container py-4">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 fw-bold text-primary">Edit Attendance</h1>
    <a href="departments.php" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i> Back to List
    </a>
  </header>

  <!-- Edit Form Card -->
  <div class="card card-custom p-4 mb-4">
    <h5 class="mb-3">Update Attendance Status for <?php echo isset($full_name) ? $full_name : ''; ?></h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <select name="day" class="form-select" required>
          <option value="">--Select--</option>
          <option value="Present" <?php if(isset($day) && $day=='Present') echo 'selected'; ?>>Present</option>
          <option value="Absent"  <?php if(isset($day) && $day=='Absent') echo 'selected'; ?>>Absent</option>
        </select>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Update
      </button>
    </form>
  </div>

  <!-- Attendance Table Card -->
  <div class="card card-custom p-4 table-container">
    <h5 class="mb-3">Student Attendance List</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Full Name</th>
            <th>Program</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(pg_num_rows($result) > 0){
          $i = $offset + 1;
          while($res = pg_fetch_assoc($result)){ ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $res['full_name']; ?></td>
              <td><?php echo $res['program']; ?></td>
              <td><?php echo $res['date']; ?></td>
              <td><?php if($res['day']=='Present'){ ?>
                       <button class="btn btn-success">Present</button>
                        <?php } else { ?>
                        <button class="btn btn-danger">Absent</button>
                  <?php } ?>
                </td>
              <td>
                <a href="edit_attendance.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i> Edit
                </a>
              </td>
            </tr>
          <?php }
        } else {
          echo '<tr><td colspan="6" class="text-center fw-bold">No attendance records found.</td></tr>';
        }
        ?>
        </tbody>
      </table>
    </div>

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
