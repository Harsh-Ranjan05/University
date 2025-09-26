<?php 
include('db.php');

// Pagination settings
$limit = 4; // records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
?>

<body>
  <?php include('navbar.php'); ?>
  <main class="container py-4">
    <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Attendance List</h1>
    <div class="profile fw-semibold">Welcome,  <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?>
</div>
  </header>

    <!-- Subject Filter -->
    <div class="card card-custom p-4 mb-4">
      <form action="" method="get" class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Select Subject</label>
          <select name="subject_code" class="form-select" required>
            <option value="">--Select Subject--</option>
            <?php 
            $faculty_result = pg_query($conn, "SELECT * FROM subject");
            while($f = pg_fetch_array($faculty_result)) { ?>
              <option value="<?php echo $f['subject_code']; ?>" 
                <?php if(isset($_GET['subject_code']) && $_GET['subject_code']==$f['subject_code']) echo 'selected'; ?>>
                (<?php echo $f['subject_code']; ?>) <?php echo $f['subject_name']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-3 align-self-end">
          <button name="fetch" type="submit" class="btn btn-primary w-100">Fetch</button>
        </div>
      </form>
    </div>

    <!-- Attendance Table -->
    <div class="card card-custom p-4">
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>Student Id</th>
              <th>Full Name</th>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          if(isset($_GET['subject_code'])) {   
              $subject_code = $_GET['subject_code'];

              // Count total records
              $countQuery = "SELECT COUNT(*) AS total FROM attendance WHERE subject_code='$subject_code'";
              $countResult = pg_query($conn, $countQuery);
              $countRow = pg_fetch_assoc($countResult);
              $totalRecords = $countRow['total'];
              $totalPages = ceil($totalRecords / $limit);

              // Fetch with pagination
              $query = "SELECT * FROM attendance WHERE subject_code='$subject_code' ORDER BY date DESC LIMIT $limit OFFSET $start";
              $result = pg_query($conn, $query);

              if(pg_num_rows($result) > 0){
                while($res = pg_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $res['student_id']; ?></td>
                    <td><?php echo $res['full_name']; ?></td>
                    <td><?php echo $res['subject_code']; ?></td>
                    <td><?php echo $res['subject_name']; ?></td>
                    <td><?php echo $res['date']; ?></td>
                    <td>
                      <?php if($res['day']=='Present'){ ?>
                        <button class="btn-present">Present</button>
                      <?php } else { ?>
                        <button class="btn-absent">Absent</button>
                      <?php } ?>
                    </td>
                  </tr>
                <?php }
              } else {
                echo "<tr><td colspan='6' class='text-center text-muted'>No attendance records found</td></tr>";
              }
          } else {
              echo "<tr><td colspan='6' class='text-center text-muted'>Select a subject to view attendance</td></tr>";
          }
          ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <?php if(isset($_GET['subject_code']) && $totalRecords > 0) { ?>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mt-3">
            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
              <a class="page-link" href="?subject_code=<?php echo $subject_code; ?>&page=<?php echo $page-1; ?>">Previous</a>
            </li>
            <?php for($i=1; $i<=$totalPages; $i++){ ?>
            <li class="page-item <?php if($page == $i){ echo 'active'; } ?>">
              <a class="page-link" href="?subject_code=<?php echo $subject_code; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php } ?>
            <li class="page-item <?php if($page >= $totalPages){ echo 'disabled'; } ?>">
              <a class="page-link" href="?subject_code=<?php echo $subject_code; ?>&page=<?php echo $page+1; ?>">Next</a>
            </li>
          </ul>
        </nav>
      <?php } ?>
    </div>
  </main>
</body>

