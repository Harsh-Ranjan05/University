<?php 
include('db.php');

// Pagination settings
$limit = 10; // students per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

if(isset($_POST['submit'])){
    $employee_id  = $_POST['employee_id'];
    $student_ids  = $_POST['student_id'];
    $full_names   = $_POST['full_name'];
    $program      = $_POST['program'];
    $class_code   = $_POST['class_code'];
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $days         = $_POST['day'];
    $date         = date('Y-m-d');

    foreach($student_ids as $i => $student_id){
        $day = $days[$i];
        $check="SELECT * FROM attendance WHERE student_id='$student_id' AND date='$date'";
        $check_result = pg_query($conn,$check);
        if(pg_num_rows($check_result) == 0){
            $insert = "INSERT INTO attendance (employee_id,full_name,program,class_code,student_id,subject_code,subject_name,date,day)
                       VALUES ('$employee_id','".$full_names[$i]."','$program','$class_code','$student_id','$subject_code','$subject_name','$date','$day')";
            pg_query($conn,$insert);
        }
    }
    echo "<script>alert('Attendance marked successfully.'); window.location='mark_attendance.php';</script>";
}
// Pagination
$limit = 5; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total Records
$totalQuery = "SELECT COUNT(*) AS total FROM students";
$totalResult = pg_query($conn, $totalQuery);
$totalRow = pg_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch students
$query = "SELECT * FROM students ORDER BY student_id DESC LIMIT $limit OFFSET $start";
$result = pg_query($conn, $query);
?>

<body>
<?php include('navbar.php'); ?>
<main class="container py-4">
 <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Mark Attendance List</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>

<!-- Filter Form -->
<div class="card card-custom p-4 mb-4">
    <form method="get" class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Program</label>
            <select name="program" class="form-select" required>
                <option value="">--Select Program--</option>
                <?php $result = pg_query($conn,"SELECT * FROM program");
                while($f = pg_fetch_assoc($result)){ ?>
                    <option value="<?php echo $f['program']; ?>" <?php if(isset($_GET['program']) && $_GET['program']==$f['program']) echo 'selected'; ?>>
                        <?php echo $f['program']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select" required>
                <option value="">--Select Semester--</option>
                <?php foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem){ ?>
                    <option value="<?php echo $sem; ?>" <?php if(isset($_GET['semester']) && $_GET['semester']==$sem) echo 'selected'; ?>><?php echo $sem; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Section</label>
            <select name="section" class="form-select" required>
                <option value="">--Select Section--</option>
                <?php foreach(['A','B','C','D','E','F'] as $sec){ ?>
                    <option value="<?php echo $sec; ?>" <?php if(isset($_GET['section']) && $_GET['section']==$sec) echo 'selected'; ?>><?php echo $sec; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Class Code</label>
            <select name="class_code" class="form-select" required>
                <option value="">--Select Class--</option>
                <?php $result = pg_query($conn,"SELECT * FROM class_room");
                while($c = pg_fetch_assoc($result)){ ?>
                    <option value="<?php echo $c['class_code']; ?>" <?php if(isset($_GET['class_code']) && $_GET['class_code']==$c['class_code']) echo 'selected'; ?>>
                        <?php echo $c['class_code']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Fetch Students</button>
        </div>
    </form>
</div>

<?php 
if(isset($_GET['program'], $_GET['semester'], $_GET['section'], $_GET['class_code'])){
    $program = $_GET['program'];
    $semester = $_GET['semester'];
    $section = $_GET['section'];
    $class_code = $_GET['class_code'];

    // Total students for pagination
    $total_result = pg_query($conn,"SELECT COUNT(*) as total FROM students WHERE program='$program' AND semester='$semester' AND section='$section' AND class_code='$class_code'");
    $total_row = pg_fetch_assoc($total_result);
    $total = $total_row['total'];

    // Fetch students with limit
    $students = pg_query($conn,"SELECT * FROM students WHERE program='$program' AND semester='$semester' AND section='$section' AND class_code='$class_code' ORDER BY student_id LIMIT $limit OFFSET $start");
?>

<!-- Student Attendance Table -->
<form method="post">
<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Class Code</th>
                    <th>Present/Absent</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(pg_num_rows($students) > 0){
                while($stu = pg_fetch_assoc($students)){
                    $allot = pg_query($conn,"SELECT * FROM allot WHERE class_code='$class_code' LIMIT 1");
                    $assign = pg_fetch_assoc($allot);
                ?>
                <tr>
                    <td><?php echo $stu['student_id']; ?><input type="hidden" name="student_id[]" value="<?php echo $stu['student_id']; ?>"></td>
                    <td><?php echo $stu['full_name']; ?><input type="hidden" name="full_name[]" value="<?php echo $stu['full_name']; ?>"></td>
                    <td><?php echo $stu['semester']; ?></td>
                    <td><?php echo $stu['section']; ?></td>
                    <td><?php echo $stu['class_code']; ?></td>
                    <td>
                        <select name="day[]" class="form-select" required>
                            <option value="">--Select--</option>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>

                    <input type="hidden" name="employee_id" value="<?php echo $assign['employee_id']; ?>">
                    <input type="hidden" name="program" value="<?php echo $program; ?>">
                    <input type="hidden" name="class_code" value="<?php echo $class_code; ?>">
                    <input type="hidden" name="subject_code" value="<?php echo $assign['subject_code']; ?>">
                    <input type="hidden" name="subject_name" value="<?php echo $assign['subject_name']; ?>">
                </tr>
                <?php } } else { ?>
                <?php echo "<tr><td colspan='6' class='text-center'>No students found.</td></tr>"; } ?>
            </tbody>
        </table>
        <div class="mt-3 text-end">
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Confirm Attendance</button>
        </div>

      <!-- Pagination Links -->
    <nav aria-label="Page navigation">
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

    </div>
</div>
</form>
<?php } ?>

</body>

