<?php 
include('db.php');

$limit = 2; // Feedbacks per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
?>

<body>
<?php include('navbar.php'); ?>
<main class="container py-4">

 <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Students Feedback</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?>
</div>
  </header>

  <div class="card-custom mb-4">
  <form action="" method="get" class="row g-3">
    <div class="col-md-5">
      <label class="form-label">Select Student</label>
      <select name="full_name_1" class="form-select" required>
        <option value="">--Select Student--</option>
        <?php 
        $students = pg_query($conn, "SELECT * FROM students");
        while($f = pg_fetch_array($students)) { ?>
          <option value="<?php echo $f['full_name']; ?>">
            <?php echo $f['full_name'] . " (" . $f['student_id'] . ")"; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Select Class</label>
      <select name="class_code_1" class="form-select" required>
        <option value="">--Select Class--</option>
        <?php 
        $classes = pg_query($conn, "SELECT DISTINCT class_code, program, section, semester FROM students");
        while($f = pg_fetch_array($classes)) { ?>
          <option value="<?php echo $f['class_code']; ?>">
            <?php echo $f['program'] . " (" . $f['section'] . ")"." (" . $f['semester'] . ")"; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="col-md-3 align-self-end">
      <button name="fetch" type="submit" class="btn-assign w-100">Fetch</button>
    </div>
  </form>
</div>

<?php if(isset($_GET['full_name_1']) && isset($_GET['class_code_1'])) {   
    $full_name_1 = $_GET['full_name_1'];
    $class_code_1 = $_GET['class_code_1'];

    $query = "SELECT * FROM students
              WHERE full_name='$full_name_1' 
              AND class_code='$class_code_1'";
    $result = pg_query($conn, $query);

    if(pg_num_rows($result) > 0){ ?>
      <div class="card-custom">
        <h5 class="mb-3">Student Info</h5>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>Student Id</th>
                <th>Full Name</th>
                <th>Program</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($res = pg_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $res['student_id']; ?></td>
                <td><?php echo $res['full_name']; ?></td>
                <td><?php echo $res['program']; ?></td>
                <td>
                <a class="btn btn-success btn-sm" href="faculty_feedback.php?student_id=<?php echo urlencode($res['student_id']); ?>">Feedback</a>

                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php } else {
      echo "<div class='alert alert-warning'>No students found for this class.</div>";
    }
} ?>

  <!-- Student Feedback Table -->
  <div class="card-custom">
    <h5 class="mb-3">Feedback from Students</h5>
    <div class="table-responsive">
      <?php
      // Total records
      $totalQuery = "SELECT COUNT(*) AS total FROM feedback WHERE faculty_id='$employee_id' AND role_type='student'";
      $totalResult = pg_query($conn, $totalQuery);
      $totalRow = pg_fetch_assoc($totalResult);
      $totalRecords = $totalRow['total'];
      $totalPages = ceil($totalRecords / $limit);

      // Fetch feedback with limit and offset
      $query = "SELECT * FROM feedback WHERE faculty_id='$employee_id' AND role_type='student' ORDER BY id DESC LIMIT $limit OFFSET $start";
      $result = pg_query($conn, $query);
      ?>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Student</th>
            <th>Description</th>
            <th>Respond</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(pg_num_rows($result) > 0){
          $i = $start + 1;
          while($res = pg_fetch_assoc($result)){ ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo htmlspecialchars($res['student_name']); ?></td>
              <td><?php echo htmlspecialchars($res['description']); ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href="faculty_feedback.php?student_id=<?php echo urlencode($res['student_id']); ?>">Reply</a>
              </td>
            </tr>
          <?php } 
        } else {
          echo "<tr><td colspan='4' class='text-center text-muted'>No feedback found</td></tr>";
        }
        ?>
        </tbody>
      </table>

      <!-- Pagination -->
      <?php if($totalRecords > 0){ ?>
      <nav>
        <ul class="pagination justify-content-center mt-3">
          <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
            <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
          </li>
          <?php for($i=1; $i<=$totalPages; $i++){ ?>
          <li class="page-item <?php if($page == $i){ echo 'active'; } ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
          <?php } ?>
          <li class="page-item <?php if($page >= $totalPages){ echo 'disabled'; } ?>">
            <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
          </li>
        </ul>
      </nav>
      <?php } ?>
    </div>
  </div>

</main>
</body>

