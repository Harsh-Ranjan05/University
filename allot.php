<?php 
include('db.php');

if(isset($_GET['student_id'])){
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id='$student_id'";
    $result = pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
}

// Handle form submit
if(isset($_POST['submit'])){
    $batch    = $_POST['batch'];
    $semester = $_POST['semester'];
    $section  = $_POST['section'];
    $class_code = $_POST['class_code'];

    $update_query = "UPDATE students 
                     SET batch='$batch', semester='$semester', section='$section', class_code='$class_code'
                     WHERE student_id='$student_id'";
    $update_result = pg_query($conn, $update_query);

    if($update_result){
        echo "<script>alert('Alloted Successfully..'); window.location='student.php';</script>";
    }else{
        echo "<script>alert('Failed To Allot..'); window.location='student.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University CRM - Student Class Allotment</title>
<style>
body { font-family: 'Segoe UI', sans-serif; background:#f4f6f9; }
.main-content { padding:20px; }
.topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.card-custom { border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); background:#fff; }
.table-responsive { overflow-x:auto; }
</style>
</head>
<body>
<?php include('navbar.php'); ?>

<main class="main-content">
<header class="topbar">
    <h1 class="h4 fw-bold text-primary">Student Class Allotment</h1>
    <!-- Trigger Modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#allotStudentModal">
        <i class="fas fa-check-circle"></i> Allot Class
    </button>
</header>

<!-- Student Info -->
<div class="card card-custom p-4 mb-4">
    <h5 class="text-secondary">Student Details</h5>
    <p><strong>ID:</strong> <?php echo $res['student_id']; ?> | 
       <strong>Name:</strong> <?php echo $res['full_name']; ?> | 
       <strong>Batch:</strong> <?php echo $res['batch']; ?> | 
       <strong>Semester:</strong> <?php echo $res['semester']; ?> | 
       <strong>Section:</strong> <?php echo $res['section']; ?> | 
       <strong>Class Code:</strong> <?php echo $res['class_code']; ?></p>
</div>

<!-- Allotment List -->
<div class="card card-custom p-4">
    <h5 class="text-secondary mb-3">Current Allotment</h5>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Batch</th>
                    <th>Semester</th>
                    <th>Section</th>
                    <th>Class Code</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $res['student_id']; ?></td>
                    <td><?php echo $res['full_name']; ?></td>
                    <td><?php echo $res['batch']; ?></td>
                    <td><?php echo $res['semester']; ?></td>
                    <td><?php echo $res['section']; ?></td>
                    <td><?php echo $res['class_code']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</main>

<!-- Allot Student Modal -->
<div class="modal fade" id="allotStudentModal" tabindex="-1" aria-labelledby="allotStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content card-custom">
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="allotStudentModalLabel"><i class="fas fa-check-circle"></i> Allot Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Batch</label>
              <select name="batch" class="form-select" required>
                <option value="">--Select Batch--</option>
                <?php 
                $result = pg_query($conn, "SELECT * FROM batch");
                while($row = pg_fetch_assoc($result)){ ?>
                  <option value="<?php echo $row['batch']; ?>" <?php if($res['batch']==$row['batch']) echo 'selected'; ?>>
                    <?php echo $row['batch']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Semester</label>
              <select name="semester" class="form-select" required>
                <option value="">--Select Semester--</option>
                <?php foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem){ ?>
                  <option value="<?php echo $sem; ?>" <?php if($res['semester']==$sem) echo 'selected'; ?>><?php echo $sem; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Section</label>
              <select name="section" class="form-select" required>
                <option value="">--Select Section--</option>
                <?php foreach(['A','B','C','D','E','F'] as $sec){ ?>
                  <option value="<?php echo $sec; ?>" <?php if($res['section']==$sec) echo 'selected'; ?>><?php echo $sec; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Class Code</label>
              <select name="class_code" class="form-select" required>
                <option value="">--Select Class--</option>
                <?php 
                $class_result = pg_query($conn, "SELECT * FROM class_room");
                while($c = pg_fetch_assoc($class_result)) { ?>
                  <option value="<?php echo $c['class_code']; ?>" <?php if($res['class_code']==$c['class_code']) echo 'selected'; ?>>
                    <?php echo $c['program'].' ('.$c['section'].') ('.$c['class_code'].')'; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Allot</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
