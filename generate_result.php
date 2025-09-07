<?php 
include('db.php');

if(isset($_GET['student_id'])){
   $student_id = $_GET['student_id'];
   $query = "SELECT * FROM students WHERE student_id='$student_id'";
   $result=pg_query($conn,$query);
  if($result){
     while($res=pg_fetch_array($result)){
     $student_id = $res['student_id'];
     $semester   = $res['semester'];  
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
    echo "<script>alert('Marks Added Sucessfully ..'); window.location='generate_result.php';</script>";
  }else{
    echo "<script>alert('Failed To Added Marks ..'); window.location='enroll_student.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Class Allotment</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif; }
    body { display:flex; min-height:100vh; background:#f4f6f9; color:#333; }
    .table-container { padding:20px; overflow-x:auto; width:100%; }
    table {
      width:100%;
      border-collapse:collapse;
      background:#fff;
      border-radius:8px;
      overflow:hidden;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding:12px 15px;
      text-align:left;
      border-bottom:1px solid #eee;
    }
    th { background:#f8f9fc; }
    tr:hover { background:#f1f1f1; }
    .btn-assign {
      padding:6px 12px;
      background:#007bff;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
    }
     .btn-assign-1 {
      padding:6px 12px;
      background:green;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
    }
    .btn-assign:hover { background:#0056b3; }
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>Examination - Management</h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Allotment Form -->
    <form action="" method="post">
      <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
      <input type="hidden" name="semester" value="<?php echo $semester; ?>">

      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Subject Code </th>
              <th>Subject Name</th>
              <th>Exam Type</th>
              <th>Max Marks</th>
              <th>Marks Obtained</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="subject_code" required>
                  <option value="">--select-subject-code--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM subject");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['subject_code']; ?>">
                      <?php echo $row['subject_code']; ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="subject_name" required>
                  <option value="">--select-subject-name--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM subject");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['subject_name']; ?>">
                      <?php echo $row['subject_name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <select name="exam_type" required>
                  <option value="">--select-exam-type--</option>
                  <option value="Final">Final</option>
                  <option value="Midterm">Midterm</option>
                  <option value="Practical">Practical</option>
                </select>
              </td>
              <td>
                <input type="text" name="max_marks" required>
              </td>
              <td>
                <input type="text" name="marks_obtained" required>
              </td>
              <td>
                <button name="submit" type="submit" class="btn-assign">Add</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </form>
    <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Subject Code </th>
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
  while($res=pg_fetch_array($result)){ 
?>
<tr>
  <td><?php echo $res['subject_code']; ?></td>
  <td><?php echo $res['subject_name']; ?></td>
  <td><?php echo $res['exam_type']; ?></td>
  <td><?php echo $res['semester']; ?></td>
 <td> <a href="view_result.php?student_id=<?php echo urlencode($res['student_id']); ?>&exam_type=<?php echo urlencode($res['exam_type']); ?>">
  <button class="btn-assign-1">View </button></a>
</tr>
<?php
  }
}
?>

          </tbody>
        </table>
      </section>
  </main>
</body>
</html>
