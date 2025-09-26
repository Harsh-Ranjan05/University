<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Class Allotment</title>

  <style>
    body {
      background: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .main-content {
      padding: 20px;
    }
    .card-custom {
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .text-center {
      text-align: center;
    }
  </style>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include('navbar.php'); ?>

  <main class="main-content">
    <!-- Header -->
    <header class="topbar">
      <h1 class="h4 fw-bold text-primary"><i class="fas fa-university"></i> Examination - Management</h1>
      <div class="profile fw-semibold">Welcome, <?= ($role_type == 'students' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
    </header>

    <!-- Allotment Form -->
    <div class="card card-custom mb-4 p-4">
      <h2 class="h5 mb-3 text-secondary"><i class="fas fa-filter"></i> Filter Students</h2>
      <form action="" method="get">
        <div class="row g-3">
          <!-- Program -->
          <div class="col-md-3">
            <label class="form-label fw-semibold">Program</label>
            <select name="program" class="form-select" required>
              <option value="">-- Select Program --</option>
              <?php 
              $result = pg_query($conn, "SELECT * FROM program");
              while($f = pg_fetch_array($result)){ ?>
                <option value="<?php echo $f['program']; ?>" <?php if(isset($_GET['program']) && $_GET['program']==$f['program']) echo 'selected'; ?>>
                  <?php echo $f['program']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <!-- Semester -->
          <div class="col-md-2">
            <label class="form-label fw-semibold">Semester</label>
            <select name="semester" class="form-select" required>
              <option value="">-- Select --</option>
              <?php foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem){ ?>
                <option value="<?php echo $sem; ?>" <?php if(isset($_GET['semester']) && $_GET['semester']==$sem) echo 'selected'; ?>><?php echo $sem; ?></option>
              <?php } ?>
            </select>
          </div>

          <!-- Section -->
          <div class="col-md-2">
            <label class="form-label fw-semibold">Section</label>
            <select name="section" class="form-select" required>
              <option value="">-- Select --</option>
              <?php foreach(['A','B','C','D','E','F'] as $sec){ ?>
                <option value="<?php echo $sec; ?>" <?php if(isset($_GET['section']) && $_GET['section']==$sec) echo 'selected'; ?>><?php echo $sec; ?></option>
              <?php } ?>
            </select>
          </div>

          <!-- Batch -->
          <div class="col-md-3">
            <label class="form-label fw-semibold">Batch</label>
            <select name="batch" class="form-select" required>
              <option value="">-- Select Batch --</option>
              <?php 
              $result = pg_query($conn, "SELECT * FROM batch");
              while($f = pg_fetch_array($result)){ ?>
                <option value="<?php echo $f['batch']; ?>" <?php if(isset($_GET['batch']) && $_GET['batch']==$f['batch']) echo 'selected'; ?>>
                  <?php echo $f['batch']; ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <!-- Submit -->
          <div class="col-md-2 d-flex align-items-end">
            <button name="fetch" type="submit" class="btn btn-primary w-100">
              <i class="fas fa-search"></i> Fetch
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Allotment List -->
    <div class="card card-custom p-4">
      <h2 class="h5 mb-3 text-secondary"><i class="fas fa-users"></i> Student List</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>Student Id</th>
              <th>Full Name</th>
              <th>Semester</th>
              <th>Section</th>
              <th>Batch</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          if(isset($_GET['program'], $_GET['semester'], $_GET['section'], $_GET['batch'])) {    
              $program = $_GET['program'];
              $semester = $_GET['semester'];
              $section  = $_GET['section'];
              $batch    = $_GET['batch'];

              $query = "SELECT * FROM students 
                        WHERE program='$program' 
                        AND semester='$semester' 
                        AND section='$section' 
                        AND batch='$batch'";
              $result = pg_query($conn, $query);

              if(pg_num_rows($result) > 0){
                  while($res = pg_fetch_array($result)) { ?>
                    <tr>
                      <td><?php echo $res['student_id']; ?></td>
                      <td><?php echo $res['full_name']; ?></td>
                      <td><?php echo $res['semester']; ?></td>
                      <td><?php echo $res['section']; ?></td>
                      <td><?php echo $res['batch']; ?></td>
                      <td>
                        <a href="generate_result.php?student_id=<?php echo urlencode($res['student_id']); ?>" 
                           class="btn btn-success btn-sm">
                          <i class="fas fa-file-alt"></i> Create Result
                        </a>
                      </td>
                    </tr>
                <?php } 
              } else { ?>
                  <tr>
                    <td colspan="6" class="text-center">No records found.</td>
                  </tr>
              <?php }
          } else { ?>
              <tr>
                <td colspan="6" class="text-center">Please select filters to view students.</td>
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
