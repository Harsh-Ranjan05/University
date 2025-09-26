<?php 
include('db.php');



if(isset($_POST['submit'])){
  $subject_code = $_POST['subject_code'];
  $subject_name = $_POST['subject_name'];
  $department   = $_POST['department'];
  $branch       = $_POST['branch'];
  $semester     = $_POST['semester'];
  $section      = $_POST['section'];
  $allotted     = $_POST['allotted'];
  $day          = $_POST['days'];
  $period_no    = $_POST['period_no'];
  $room_no      = $_POST['room_no'];

  // ✅ Insert into timetable
  $query="INSERT INTO timetable(subject_code, subject_name, department, branch, semester, section, allotted, day, period_no, room_no) 
          VALUES('$subject_code','$subject_name','$department','$branch','$semester','$section','$allotted','$day','$period_no','$room_no')";
  
  $result=pg_query($conn,$query);

  if($result){
      echo "<script>alert('Time Table Entry Added Successfully ✅'); window.location='timetable.php';</script>";
  }else{
      echo "<script>alert(' Failed To Add Entry'); window.location='timetable.php';</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Subject Teacher Allotment</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif; }
    body { display:flex; min-height:100vh; background:#f4f6f9; color:#333; }
    .table-container { padding:20px; overflow-x:auto; }
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
    .btn{
      padding:6px 12px;
      background:green;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;  
      text-decoration:none;
    }
    .btn-1 {
      background:green; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
    }
    .btn-2{
      background:red; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
    }
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>Time Table Mangment</h1>
      <div class="profile"> <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
    </header>

    <!-- ✅ Allotment Form -->
    <form action="" method="post">
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Department</th>
              <th>Branch</th>
              <th>Semester</th>
              <th>Section</th>
            <th>Faculty</th>
              <th>Day</th>
              <th>Peroid </th>
              <th>Room No.</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
include('db.php'); // make sure connection is included

if (isset($_GET['id'])) {
    $id          = $_GET['id'];
    $subject_code= $_GET['subject_code'];
    $department  = $_GET['department'];
    $branch      = $_GET['branch'];
    $section     = $_GET['section'];
    $allotted    = $_GET['allotted'];

    // 🔹 First check with only ID (most unique field)
    $query = "SELECT * FROM allotment WHERE id='$id'";
    $result = pg_query($conn, $query);

    while($res = pg_fetch_assoc($result)){
?>
        <tr>
            <td><?php echo $res['subject_code']; ?>
                <input type="hidden" name="subject_code" value="<?php echo $res['subject_code']; ?>">
            </td>
            <td><?php echo $res['subject_name']; ?>
                <input type="hidden" name="subject_name" value="<?php echo $res['subject_name']; ?>">
            </td>
            <td><?php echo $res['department']; ?>
                <input type="hidden" name="department" value="<?php echo $res['department']; ?>">
            </td>
            <td><?php echo $res['branch']; ?>
                <input type="hidden" name="branch" value="<?php echo $res['branch']; ?>">
            </td>
            <td><?php echo $res['semester']; ?>
                <input type="hidden" name="semester" value="<?php echo $res['semester']; ?>">
            </td>
            <td><?php echo $res['section']; ?>
                <input type="hidden" name="section" value="<?php echo $res['section']; ?>">
            </td>
            <td><?php echo $res['allotted']; ?>
                <input type="hidden" name="allotted" value="<?php echo $res['allotted']; ?>">
            </td>
            
            <td>
                <select name="days" required>
                  <option value="">-- Select Day --</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                </select>
            </td>

            <td>
                <select name="period_no" required>
                  <option value="">-- Select Period --</option>
                  <option value="1">1st Period</option>
                  <option value="2">2nd Period</option>
                  <option value="3">3rd Period</option>
                  <option value="4">4th Period</option>
                  <option value="5">5th Period</option>
                  <option value="6">6th Period</option>
                  <option value="7">7th Period</option>
                  <option value="8">8th Period</option>
                </select>
            </td>

            <td>
                <select name="room_no" required>
                  <option value="">-- Select Room --</option>
                  <option value="101">Room 101</option>
                  <option value="102">Room 102</option>
                  <option value="103">Room 103</option>
                  <option value="104">Room 104</option>
                  <option value="201">Room 201</option>
                  <option value="202">Room 202</option>
                  <option value="203">Room 203</option>
                  <option value="204">Room 204</option>
                  <option value="Lab-1">Computer Lab 1</option>
                  <option value="Lab-2">Computer Lab 2</option>
                </select>
            </td>

            <td><button name="submit" type="submit" class="btn-assign">Assign</button></td>
        </tr>
<?php 
    } 
} 
?>


          </tbody>
        </table>
      </section>
    </form>

        </section>
        
    
  </main>
</body>
</html>