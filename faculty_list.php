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
    <h1 class="h4 fw-bold text-primary">Feedback</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?>
</div>
  </header>

    <!-- Allotment Form -->
    <div class="card-custom mb-4">
      <form action="" method="get" class="row g-3">
        <div class="col-md-5">
          <label class="form-label">Select Subject</label>
          <select name="subject_code" class="form-select" required>
            <option value="">--Select Subject--</option>
            <?php 
            $subject_result = pg_query($conn, "SELECT * FROM subject");
            while($f = pg_fetch_array($subject_result)) { ?>
              <option value="<?php echo $f['subject_code']; ?>" 
                <?php if(isset($_GET['subject_code']) && $_GET['subject_code']==$f['subject_code']) echo 'selected'; ?>>
                <?php echo $f['subject_code'] . " (" . $f['subject_name'] . ")"; ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Select Semester</label>
          <select name="semester" class="form-select" required>
            <option value="">--Select Semester--</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
          </select>
        </div>
        <div class="col-md-3 align-self-end">
          <button name="fetch" type="submit" class="btn-assign w-100">Fetch</button>
        </div>
      </form>
    </div>

    <!-- Allotment List -->
    <?php if(isset($_GET['subject_code']) && isset($_GET['semester'])) {   
        $subject_code = $_GET['subject_code'];
        $semester     = $_GET['semester'];

        $query = "SELECT * FROM allot 
                  WHERE subject_code='$subject_code' 
                  AND semester='$semester'";
        $result = pg_query($conn, $query);

        if(pg_num_rows($result) > 0){ ?>
          <div class="card-custom">
            <h5 class="mb-3">Add Feedback</h5>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Faculty Id</th>
                    <th>Full Name</th>
                    <th>Subject</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($res = pg_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $res['employee_id']; ?></td>
                    <td><?php echo $res['full_name']; ?></td>
                    <td><?php echo $res['subject_name']; ?></td>
                    <td>
                      <a class="btn btn-success btn-sm" href="student_feedback.php?employee_id=<?php echo urlencode($res['employee_id']); ?>">Feedback</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php } else {
          echo "<div class='alert alert-warning'>No faculty found for this subject & semester.</div>";
        }
    } ?>

    <!-- Faculty Feedback Section -->
    <div class="card-custom">
      <h5 class="mb-3">Faculty Feedback</h5>
      <div class="table-responsive">
        <?php
        // Count feedback
        $countQuery = "SELECT COUNT(*) AS total FROM feedback WHERE student_id='$student_id' AND role_type='faculty'";
        $countResult = pg_query($conn, $countQuery);
        $countRow = pg_fetch_assoc($countResult);
        $totalRecords = $countRow['total'];
        $totalPages = ceil($totalRecords / $limit);

        // Fetch feedback with pagination
        $query = "SELECT * FROM feedback WHERE student_id='$student_id' AND role_type='faculty' ORDER BY id DESC LIMIT $limit OFFSET $start";
        $result = pg_query($conn, $query);
        ?>
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>S.No.</th>
              <th>Faculty</th>
              <th>Description</th>
              <th>Respond</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = $start + 1;
            while($res = pg_fetch_assoc($result)){ ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $res['faculty_name']; ?></td>
                <td><?php echo $res['description']; ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="student_feedback.php?faculty_id=<?php echo urlencode($res['faculty_id']); ?>">Reply</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <!-- Pagination -->
        <?php if($totalRecords > 0) { ?>
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
