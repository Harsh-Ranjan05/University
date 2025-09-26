<?php 
include('db.php');
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
    <h1 class="h4 fw-bold text-primary">Published Results</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>

    <div class="card card-custom p-4">
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Exam Type</th>
              <th>Semester</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
           $query_check = "SELECT * FROM store_marks WHERE student_id='$student_id'";
           $result_check = pg_query($conn, $query_check); 
              while($res = pg_fetch_assoc($result_check)) { ?>
                <tr>
                  <td><?php echo $res['subject_code']; ?></td>
                  <td><?php echo $res['subject_name']; ?></td>
                  <td><?php echo $res['exam_type']; ?></td>
                  <td><?php echo $res['semester']; ?></td>
                  <td>
                    <a href="view_result.php?student_id=<?php echo urlencode($res['student_id']); ?>&exam_type=<?php echo urlencode($res['exam_type']); ?>" class="btn btn-success btn-sm">
                      View
                    </a>
                  </td>
                </tr>
            <?php } 
                 ?>
          </tbody>
        </table>
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
  </main>
</body>

