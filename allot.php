<?php 
include('db.php');

if(isset($_GET['student_id'])){
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id='$student_id'";
    $result = pg_query($conn, $query);
    while($res = pg_fetch_array($result)){
        $student_id = $res['student_id'];
        $full_name = $res['full_name'];
        $batch = $res['batch'];
        $semester = $res['semester'];
        $section = $res['section'];
    }
}

if(isset($_POST['submit'])){
    $batch    = $_POST['batch'];
    $semester = $_POST['semester'];
    $section  = $_POST['section'];
    $class_code = $_POST['class_code'];

    // Run update query
    $update_query = "UPDATE students 
                     SET batch='$batch', semester='$semester', section='$section' , class_code='$class_code'
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
      <h1>Class - Management</h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Allotment Form -->
    <form action="" method="post">
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Batch </th>
              <th>Semester</th>
              <th>Section</th>
              <th>Class Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="batch">
                  <option value="">--select-batch--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM batch");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['batch']; ?>"><?php echo $row['batch']; ?></option>
                  <?php } ?>
                </select>
              </td>

             

             

              <td>
                <select name="semester">
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
                <select name="section">
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
    <option value="">--select-class_code--</option>
    <?php 
    $faculty_result = pg_query($conn, "SELECT * FROM class_room");
    while($f = pg_fetch_array($faculty_result)) { ?>
      <option value="<?php echo $f['class_code']; ?>">
        <?php echo $f['program'] . " (" . $f['section'] . ") (" . $f['class_code'] . ")"; ?>
      </option>
    <?php } ?>
  </select>
</td>

              <td><button name="submit" type="submit" class="btn-assign">Allot </button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </form>

    <!-- Allotment List -->
    <section class="table-container">
      <table>
        <thead>
          <tr>
            <th>Student ID</th>
             <th>Full Name</th>
            <th>Semester</th>
            <th>Section</th>
            <th>Class Code</th>
            <th>Batch</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         $query="SELECT * FROM students WHERE student_id='$student_id'";
         $result=pg_query($conn,$query);
         while($res=pg_fetch_array($result)){
         ?>
            <tr>
              <td><?php echo $res['student_id'];?></td>
              <td><?php echo $res['full_name']; ?></td>
              <td><?php echo $res['semester']; ?></td>
              <td><?php echo $res['section']; ?></td>
               <td><?php echo $res['class_code']; ?></td>
              <td><?php echo $res['batch']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
