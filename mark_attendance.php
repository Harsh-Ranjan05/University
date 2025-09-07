<?php 
include('db.php');
if(isset($_POST['submit'])){
  $employee_id = $_POST['employee_id'];
  $full_name = $_POST['full_name'];
  $student_id = $_POST['student_id'];
  $program = $_POST['program'];
  $class_code = $_POST['class_code'];
  $subject_code = $_POST['subject_code'];
  $subject_name = $_POST['subject_name'];
  $date = date('Y-m-d');
   $day = $_POST['day'];
  $check="SELECT*FROM attendance WHERE student_id='$student_id' AND date='$date'";
  $check_result = pg_query($conn,$check);
  $total_check = pg_num_rows($check_result);
  if($total_check > 0){
     echo "<script>alert('Attendance already marked for today.'); window.location='mark_attendance.php';</script>";
  }else{
$insert = "INSERT INTO attendance (employee_id,full_name,program,class_code,student_id, subject_code, subject_name,date,day) 
               VALUES ('$employee_id','$full_name','$program','$class_code','$student_id', '$subject_code', '$subject_name','$date','$day')";
    $result = pg_query($conn,$insert);

    if ($result) {
      echo "<script>alert('Attendance marked successfully.'); window.location='mark_attendance.php';</script>";
    } else {
      echo "<script>alert('Error marking attendance.');</script>";
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
    .btn-assign:hover { background:#0056b3; }
    .btn {
      padding:6px 12px;
      background:green;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;  
      text-decoration:none;
    }
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>Attendance - Management</h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Allotment Form -->
    <form action="" method="get">
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Program</th>
              <th>Semester</th>
              <th>Section</th>
              <th>Class Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <td>
               <select name="program" required>
                  <option value="">--select-program--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM program");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['program']; ?>"><?php echo $f['program']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td>
                <select name="semester" required>
                  <option value="">--select-semester--</option>
                  <option value="I">I</option>
                  <option value="II">II</option>
                  <option value="III">III</option>
                  <option value="IV">IV</option>
                  <option value="V">V</option>
                  <option value="VI">VI</option>
                  <option value="VII">VII</option>
                  <option value="VIII">VIII</option>
                </select>
              </td>

              <td>
                <select name="section" required>
                  <option value="">--select-section--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                </select>
              </td>
              <td>
                <select name="class_code" required>
                  <option value="">--select-class-code--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM class_room");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['class_code']; ?>"><?php echo $f['class_code']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td><button name="fetch" type="submit" class="btn-assign">Fetch</button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </form>

    <!-- Allotment List -->
     <form method="post">
    <section class="table-container">
      <table>
        <thead>
          <tr>
            <th>Student Id</th>
            <th>Full Name</th>
            <th>Semester</th>
            <th>Section</th>
            <th>Class Code</th>
            <th>Persent/Absent</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
       <?php 
if(isset($_GET['program']) && isset($_GET['semester']) && isset($_GET['section']) && isset($_GET['class_code'])) {   
    $program = $_GET['program'];
    $semester = $_GET['semester'];
    $section  = $_GET['section'];
    $class_code    = $_GET['class_code'];

    $query = "SELECT * FROM students 
              WHERE program='$program' 
              AND semester='$semester' 
              AND section='$section' 
              AND class_code='$class_code'";
    $result = pg_query($conn, $query);

    while($res = pg_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $res['student_id']; ?></td>
            <td><?php echo $res['full_name']; ?></td>
            <td><?php echo $res['semester']; ?></td>
            <td><?php echo $res['section']; ?></td>
            <td><?php echo $res['class_code']; ?></td>
            <input type="hidden" name="student_id" value="<?php echo $res['student_id']; ?>">
             <input type="hidden" name="full_name" value="<?php echo $res['full_name']; ?>">
            <td>  
              <select name="day" required>
                  <option value="">--select-present/absent--</option>
                  <option value="Present">Present</option>
                  <option value="Absent">Absent</option>
                </select>
              </td>
            <td>
              <?php 
            $query="SELECT*FROM allot WHERE employee_id='$employee_id'";
            $result=pg_query($conn,$query);
            while($res=pg_fetch_array($result)){
              $subject_code = $res['subject_code'];
              $subject_name = $res['subject_name'];
            ?>
            <?php } ?>
            <input type="hidden" name="employee_id" value="<?php echo $employee_id;?>">
              <input type="hidden" name="program" value="<?php echo $program;?>">
               <input type="hidden" name="class_code" value="<?php echo $class_code;?>">
            <input type="hidden" name="subject_code" value="<?php echo $subject_code; ?>">
           <input type="hidden" name="subject_name" value="<?php echo $subject_name; ?>">
                    <button type="submit" name="submit" class="btn">Confirm</button>
            </td>
        </tr>
        </form>
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
