<?php 
include('db.php');

// Pagination settings
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University CRM - Attendance</title>
<style>
body { font-family: 'Segoe UI', sans-serif; background:#f4f6f9; }
.card-custom { border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); background:#fff; margin-bottom:20px; }
.table-responsive { overflow-x:auto; }
.btn-assign { padding:6px 12px; background:#007bff; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px; }
.btn-assign:hover { background:#0056b3; }
.btn { padding:6px 12px; background:green; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px; text-decoration:none; }
.btn-1 { padding:6px 12px; background:red; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px; text-decoration:none; }
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<main class="container py-4">

    <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Attendance List</h1>
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
            <?php 
            $result = pg_query($conn, "SELECT * FROM program");
            while($f = pg_fetch_assoc($result)){ ?>
                <option value="<?php echo $f['program']; ?>" <?php if(isset($_GET['program']) && $_GET['program']==$f['program']) echo 'selected'; ?>>
                    <?php echo $f['program']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Subject</label>
        <select name="subject_code" class="form-select" required>
            <option value="">--Select Subject--</option>
            <?php 
            $result = pg_query($conn, "SELECT * FROM subject");
            while($f = pg_fetch_assoc($result)){ ?>
                <option value="<?php echo $f['subject_code']; ?>" <?php if(isset($_GET['subject_code']) && $_GET['subject_code']==$f['subject_code']) echo 'selected'; ?>>
                    <?php echo "(".$f['subject_code'].") ".$f['subject_name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Class Code</label>
        <select name="class_code" class="form-select" required>
            <option value="">--Select Class--</option>
            <?php 
            $result = pg_query($conn, "SELECT * FROM class_room");
            while($f = pg_fetch_assoc($result)){ ?>
                <option value="<?php echo $f['class_code']; ?>" <?php if(isset($_GET['class_code']) && $_GET['class_code']==$f['class_code']) echo 'selected'; ?>>
                    <?php echo $f['program']." (".$f['section'].") (".$f['semester'].") (".$f['class_code'].")"; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
    </div>

    <div class="col-12">
        <button type="submit" name="fetch" class="btn-assign">Fetch</button>
    </div>
</form>
</div>

<?php 
if(isset($_GET['program'], $_GET['class_code'], $_GET['date'], $_GET['subject_code'])){   
    $program = $_GET['program'];
    $class_code = $_GET['class_code'];
    $date = $_GET['date'];
    $subject_code = $_GET['subject_code'];

    // Total records for pagination
    $totalQuery = "SELECT COUNT(*) as total FROM attendance WHERE program='$program' AND class_code='$class_code' AND date='$date' AND subject_code='$subject_code'";
    $totalResult = pg_query($conn, $totalQuery);
    $totalRow = pg_fetch_assoc($totalResult);
    $totalRecords = $totalRow['total'];
    $totalPages = ceil($totalRecords / $limit);

    // Fetch attendance records
    $query = "SELECT * FROM attendance WHERE program='$program' AND class_code='$class_code' AND date='$date' AND subject_code='$subject_code' ORDER BY student_id DESC LIMIT $limit OFFSET $start";
    $result = pg_query($conn, $query);
?>

<!-- Attendance Table -->
<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Program</th>
                    <th>Class Code</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($res = pg_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $res['student_id']; ?></td>
                    <td><?php echo $res['full_name']; ?></td>
                    <td><?php echo $res['program']; ?></td>
                    <td><?php echo $res['class_code']; ?></td>
                    <td><?php echo $res['subject_code']; ?></td>
                    <td><?php echo $res['subject_name']; ?></td>
                    <td>
                        <?php if($res['day']=='Present'){ ?>
                       <button class="btn btn-success">Present</button>
                        <?php } else { ?>
                        <button class="btn btn-danger">Absent</button>
                        <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="edit_attendance.php?id=<?php echo $res['id']; ?>">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-3">
                <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?program=<?php echo $program; ?>&class_code=<?php echo $class_code; ?>&subject_code=<?php echo $subject_code; ?>&date=<?php echo $date; ?>&page=<?php echo $page-1; ?>">Previous</a>
                </li>
                <?php for($i=1; $i<=$totalPages; $i++){ ?>
                <li class="page-item <?php if($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?program=<?php echo $program; ?>&class_code=<?php echo $class_code; ?>&subject_code=<?php echo $subject_code; ?>&date=<?php echo $date; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
                    <a class="page-link" href="?program=<?php echo $program; ?>&class_code=<?php echo $class_code; ?>&subject_code=<?php echo $subject_code; ?>&date=<?php echo $date; ?>&page=<?php echo $page+1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php } ?>

</main>
</body>
</html>
