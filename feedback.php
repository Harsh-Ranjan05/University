<?php
include('db.php');
include('navbar.php');

// ✅ Pagination settings
$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// ✅ Count total rows
$count_query = "SELECT COUNT(*) FROM feedback WHERE student_id='$student_id' AND role_type='faculty'";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// ✅ Fetch feedback with LIMIT + OFFSET
$query = "SELECT * FROM feedback WHERE student_id='$student_id' AND role_type='faculty' 
          ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>
<main class="main-content">
  <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Faculty Feedback</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'students' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?>
</div>
  </header>

  <section class="content">
    <div class="card card-custom p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 text-secondary">From Faculty </h2>
      </div>
  <div class="card card-custom">
    <h5 class="mb-3">Faculty Feedback</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Faculty Name</th>
            <th>Feedback</th>
          </tr>
        </thead>
        <tbody>
         <?php 
          $i = $offset + 1; // ✅ Correct serial with pagination
          while($res = pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
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
</body>
