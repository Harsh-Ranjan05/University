<?php
include('db.php');
include('navbar.php');

// Get faculty & student info
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "SELECT * FROM allot WHERE employee_id='$employee_id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_array($result)) {
        $faculty_id   = $res['employee_id'];
        $subject_code = $res['subject_code'];
        $faculty_name = $res['full_name'];
    }
}
// Insert feedback
// -------------------------
if (isset($_POST['submit'])) {
    $student_id   = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $faculty_id   = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $role_type    = $_POST['role_type'];
    $description  = $_POST['description'];

    $query_1 = "INSERT INTO feedback(student_id,student_name,faculty_id,faculty_name,role_type,description) 
                VALUES('$student_id','$student_name','$faculty_id','$faculty_name','$role_type','$description')";
    $result_1 = pg_query($conn, $query_1);

    if ($result_1) {
        echo "<script>alert('Feedback Added Successfully..'); window.location='faculty_feedback.php';</script>";
    } else {
        echo "<script>alert('Failed To Add..'); window.location='faculty_feedback.php';</script>";
    }
}

// Pagination settings
$limit = 5; // rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM feedback WHERE student_id='$student_id' AND role_type='faculty'";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch feedback for current page
$feedback_query = "SELECT * FROM feedback 
                   WHERE student_id='$student_id' AND role_type='faculty' 
                   ORDER BY id DESC 
                   LIMIT $limit OFFSET $offset";
$feedback_result = pg_query($conn, $feedback_query);
?>

<body>

<main class="main-content">
  <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Faculty Feedback</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>

  <section class="content">
    <div class="card card-custom p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 text-secondary">Faculty List</h2>
        <!-- Add Feedback Button -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeedbackModal">
          <i class="fas fa-plus"></i> Add Feedback
        </button>
      </div>
  <div class="card card-custom">
    <h5 class="mb-3">Faculty Feedback</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Faculty Id</th>
            <th>Faculty Name</th>
            <th>Feedback</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = $offset + 1;
          while($res = pg_fetch_array($feedback_result)) { ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['faculty_id']; ?></td>
            <td><?php echo $res['faculty_name']; ?></td>
            <td><?php echo $res['description']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <nav>
      <ul class="pagination justify-content-center">
        <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
          <a class="page-link" href="?employee_id=<?php echo $employee_id; ?>&page=<?php echo $page-1; ?>">&laquo; Prev</a>
        </li>
        <?php for($p=1; $p<=$total_pages; $p++){ ?>
          <li class="page-item <?php if($page==$p) echo 'active'; ?>">
            <a class="page-link" href="?employee_id=<?php echo $employee_id; ?>&page=<?php echo $p; ?>"><?php echo $p; ?></a>
          </li>
        <?php } ?>
        <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
          <a class="page-link" href="?employee_id=<?php echo $employee_id; ?>&page=<?php echo $page+1; ?>">Next &raquo;</a>
        </li>
      </ul>
    </nav>
  </div>
    </section>
</main>
<!-- Add Feedback Modal -->
<div class="modal fade" id="addFeedbackModal" tabindex="-1" aria-labelledby="addFeedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title" id="addFeedbackModalLabel">Add Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
          <input type="hidden" name="student_name" value="<?php echo $full_name; ?>">
          <input type="hidden" name="faculty_name" value="<?php echo $faculty_name; ?>">
          <input type="hidden" name="faculty_id" value="<?php echo $employee_id; ?>">
          <input type="hidden" name="role_type" value="<?php echo $role_type; ?>">

          <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Feedback</label>
            <textarea id="description" name="description" class="form-control" placeholder="Enter feedback" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>

