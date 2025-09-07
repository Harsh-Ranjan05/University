<?php 
include('db.php');

if(isset($_GET['student_id'])){
   $student_id = $_GET['student_id'];
   $query = "SELECT * FROM students WHERE student_id='$student_id'";
   $result=pg_query($conn,$query);
  if($result){
     while($res=pg_fetch_array($result)){
     $student_id_1 = $res['student_id'];
     $full_name_1 =$res['full_name'];
     $semester_1  = $res['semester'];  
     $program_1 = $res['program'];
     $batch_1 = $res['batch'];
     $section_1 = $res['section'];
   }
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
    .result-container {
      background: #fff;
      max-width: 900px;
      margin: auto;
      padding: 30px;
      border: 2px solid #222;
      border-radius: 10px;
    }
    .header {
      text-align: center;
      border-bottom: 2px solid #222;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .header h1 {
      font-size: 28px;
      margin-bottom: 5px;
    }
    .header h2 {
      font-size: 20px;
      font-weight: normal;
      color: #444;
    }
    .student-info {
      margin-bottom: 20px;
    }
    .student-info table {
      width: 100%;
      border-collapse: collapse;
    }
    .student-info td {
      padding: 6px 8px;
      font-size: 15px;
    }
    .marks-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .marks-table th, .marks-table td {
      border: 1px solid #444;
      padding: 8px;
      text-align: center;
    }
    .marks-table th {
      background: #eaeaea;
    }
    .result-summary {
      margin-top: 20px;
      font-size: 16px;
      display: flex;
      justify-content: space-between;
      font-weight: bold;
    }
    .footer {
      text-align: right;
      margin-top: 40px;
    }
    .footer p {
      margin-top: 60px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>View-Marksheet</h1>
      <div class="profile">Admin ▼</div>
    </header>
<div class="result-container">
    <!-- Header -->
    <div class="header">
      <h1>BHARTI GYANPEETH</h1>
      <h2>Semester Examination Result</h2>
    </div>

    <!-- Student Information -->
    <div class="student-info">
      <table>
        <tr>
          <td><strong>Student ID:</strong> <?php echo $student_id_1; ?></td>
          <td><strong>Name:</strong> <?php echo $full_name_1; ?></td>
        </tr>
        <tr>
          <td><strong>Program:</strong> <?php echo $program_1; ?></td>
          <td><strong>Semester:</strong> <?php echo $semester_1; ?></td>
        </tr>
        <tr>
          <td><strong>Batch:</strong> <?php echo $batch_1; ?></td>
          <td><strong>Section:</strong><?php echo $section_1; ?></td>
        </tr>
      </table>
    </div>

    <!-- Marks Table -->
    <table class="marks-table">
      <thead>
        <tr>
          <th>Subject Code</th>
          <th>Subject Name</th>
          <th>Max Marks</th>
          <th>Marks Obtained</th>
          <th>Exam Type</th>
        </tr>
      </thead>
      <tbody>
      <?php 
if(isset($_GET['student_id']) && isset($_GET['exam_type'])){
    $student_id = $_GET['student_id'];
    $exam_type = $_GET['exam_type']; 

    $query = "SELECT * FROM store_marks 
              WHERE student_id='$student_id' 
              AND exam_type='$exam_type'";
    $result = pg_query($conn, $query); 

    $total_marks = 0;
    $marks_obtained = 0;

    if($result){
        while($res = pg_fetch_assoc($result)){ 
            $total_marks += (int)$res['max_marks'];
            $marks_obtained += (int)$res['marks_obtained'];
?>
<tr>
  <td><?php echo $res['subject_code']; ?></td>
  <td><?php echo $res['subject_name']; ?></td>
  <td><?php echo $res['max_marks']; ?></td>
  <td><?php echo $res['marks_obtained']; ?></td>
  <td><?php echo $res['exam_type']; ?></td>
</tr>
<?php
        }

     // Calculate percentage
if ($total_marks > 0) {
    $percentage = ($marks_obtained / $total_marks) * 100;
} else {
    $percentage = 0;
}

// Determine result status
if ($percentage >= 40) {
    $result_status = 'PASS';
} else {
    $result_status = 'FAIL';
}

    }
}
?>

</tbody>
</table>

<!-- Result Summary -->
<div class="result-summary">
  <span>Total Marks: <?php echo $total_marks; ?></span>
  <span>Marks Obtained: <?php echo $marks_obtained; ?></span>
  <span>Percentage: <?php echo number_format($percentage, 2); ?>%</span>
  <span>Result: <?php echo $result_status; ?></span>
</div>

    <div class="footer">
      <p>Controller of Examination</p>
    </div>
  </div>
  </main>
</body>
</html>
