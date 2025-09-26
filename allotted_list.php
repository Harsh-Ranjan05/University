<?php 
include('db.php');
include('navbar.php');

// Pagination settings
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total records for this employee
$totalQuery = "SELECT COUNT(*) AS total FROM allot WHERE employee_id='$employee_id'";
$totalResult = pg_query($conn, $totalQuery);
$totalRow = pg_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch limited records for current page
$query_check = "SELECT * FROM allot WHERE employee_id='$employee_id' ORDER BY id DESC LIMIT $limit OFFSET $start";
$result_check = pg_query($conn, $query_check);
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
.pagination { list-style:none; display:flex; gap:5px; justify-content:center; padding:0; margin-top:15px; }
.pagination li a { display:block; padding:6px 12px; border:1px solid #ddd; border-radius:6px; color:#007bff; text-decoration:none; }
.pagination li.active a { background:#007bff; color:#fff; border-color:#007bff; }
.pagination li.disabled a { color:#ccc; pointer-events:none; border-color:#ddd; }
</style>
</head>
<body>
<main class="container py-4">
    <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Class Allotted List</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>
<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Subject Name</th>
                    <th>Day</th>
                    <th>Period</th>
                    <th>Program</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Room No.</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query_check ="SELECT*FROM allot WHERE employee_id='$employee_id'";
                while($res = pg_fetch_assoc($result_check)){ ?>
                <tr>
                    <td><?php echo $res['subject_name']; ?></td>
                    <td><?php echo $res['day']; ?></td>
                    <td><?php echo $res['period']; ?></td>
                    <td><?php echo $res['program']; ?></td>
                    <td><?php echo $res['semester']; ?></td>
                    <td><?php echo $res['section']; ?></td>
                    <td><?php echo $res['room_no']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
                </li>
                <?php for($i=1; $i<=$totalPages; $i++){ ?>
                <li class="page-item <?php if($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</main>
</body>
</html>
