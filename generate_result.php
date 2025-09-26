<?php 
include('db.php');

if(isset($_GET['student_id'])){
   $student_id = $_GET['student_id'];
   $query = "SELECT * FROM students WHERE student_id='$student_id'";
   $result=pg_query($conn,$query);
   if($result){
     while($res=pg_fetch_array($result)){
       $full_name_1 = $res['full_name'];
       $semester_1   = $res['semester'];  
       $program_1   = $res['program'];  
       $batch_1   = $res['batch'];  
     }
   }
}

if(isset($_POST['submit'])){
  $student_id     = $_POST['student_id'];
  $semester       = $_POST['semester'];
  $subject_code   = $_POST['subject_code'];
  $subject_name   = $_POST['subject_name'];
  $exam_type      = $_POST['exam_type'];
  $max_marks      = $_POST['max_marks'];
  $marks_obtained = $_POST['marks_obtained'];

  $query="INSERT INTO store_marks(student_id,semester,subject_code,subject_name,exam_type,max_marks,marks_obtained) 
  VALUES('$student_id','$semester','$subject_code','$subject_name','$exam_type','$max_marks','$marks_obtained')";

  $result=pg_query($conn, $query);
  if($result){
    echo "<script>alert('Marks Added Sucessfully ..'); window.location='generate_result.php?student_id=$student_id';</script>";
  }else{
    echo "<script>alert('Failed To Added Marks ..'); window.location='generate_result.php?student_id=$student_id';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Generate Result</title>

  <style>
    body {
      background: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .main-content { padding: 20px; }
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
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>

  <main class="main-content">
    <!-- Header -->
    <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Add Marksheet Records</h1>
    <div class="profile fw-semibold">Welcome, <?php echo $full_name; ?></div>
  </header>

    <!-- Student Details -->
    <div class="card card-custom p-4 mb-4">
      <h2 class="h5 text-secondary"><i class="fas fa-user-graduate"></i> Student Information</h2>
      <div class="row g-3 mt-2">
        <div class="col-md-3">
          <span class="fw-semibold">Full Name:</span> <?php echo isset($full_name_1) ? $full_name_1 : 'N/A'; ?>
        </div>
        <div class="col-md-2">
          <span class="fw-semibold">Semester:</span> <?php echo isset($semester_1) ? $semester_1 : 'N/A'; ?>
        </div>
        <div class="col-md-4">
          <span class="fw-semibold">Program:</span> <?php echo isset($program_1) ? $program_1 : 'N/A'; ?>
        </div>
        <div class="col-md-2">
          <span class="fw-semibold">Batch:</span> <?php echo isset($batch_1) ? $batch_1 : 'N/A'; ?>
        </div>
    </div>

    <!-- Add Marks Button -->
    <div class="mb-3">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMarksModal">
        <i class="fas fa-plus-circle"></i> Add Marks
      </button>
    </div>

    <!-- Marks Table -->
    <div class="card card-custom p-4">
      <h2 class="h5 mb-3 text-secondary"><i class="fas fa-list"></i> Marks List</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
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
          if(isset($_GET['student_id'])){
            $student_id = $_GET['student_id'];
            $query="SELECT * FROM store_marks WHERE student_id='$student_id'";
            $result = pg_query($conn, $query); 
            while($res=pg_fetch_array($result)){ ?>
              <tr>
                <td><?php echo $res['subject_code']; ?></td>
                <td><?php echo $res['subject_name']; ?></td>
                <td><?php echo $res['exam_type']; ?></td>
                <td><?php echo $res['semester']; ?></td>
                <td>
                  <a href="view_result.php?student_id=<?php echo urlencode($res['student_id']); ?>&exam_type=<?php echo urlencode($res['exam_type']); ?>" 
                     class="btn btn-success btn-sm">
                    <i class="fas fa-eye"></i> View
                  </a>
                </td>
              </tr>
          <?php } } ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Modal for Add Marks -->
  <div class="modal fade" id="addMarksModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fas fa-pen"></i> Add Marks</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body row g-3">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
            <input type="hidden" name="semester" value="<?php echo $semester; ?>">

            <div class="col-md-6">
              <label class="form-label fw-semibold">Subject Code</label>
              <select name="subject_code" class="form-select" required>
                <option value="">-- Select --</option>
                <?php 
                $result = pg_query($conn, "SELECT * FROM subject");
                while($row = pg_fetch_array($result)){ ?>
                  <option value="<?php echo $row['subject_code']; ?>">
                    <?php echo $row['subject_code']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Subject Name</label>
              <select name="subject_name" class="form-select" required>
                <option value="">-- Select --</option>
                <?php 
                $result = pg_query($conn, "SELECT * FROM subject");
                while($row = pg_fetch_array($result)){ ?>
                  <option value="<?php echo $row['subject_name']; ?>">
                    <?php echo $row['subject_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Exam Type</label>
              <select name="exam_type" class="form-select" required>
                <option value="">-- Select --</option>
                <option value="Final">Final</option>
                <option value="Midterm">Midterm</option>
                <option value="Practical">Practical</option>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Max Marks</label>
              <input type="number" name="max_marks" class="form-control" required>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Marks Obtained</label>
              <input type="number" name="marks_obtained" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="fas fa-save"></i> Save
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
