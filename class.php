<?php 
include('db.php');

if(isset($_POST['submit'])){
  $department = $_POST['department'];
  $branch     = $_POST['branch'];
  $program    = $_POST['program'];
  $semester   = $_POST['semester'];
  $section    = $_POST['section'];
  $room_no    = $_POST['room_no'];
  $class_code     = $_POST['class_code'];
  $batch      = $_POST['batch'];

  $query="INSERT INTO class_room(department,branch,program,semester,section,room_no,class_code,batch) 
VALUES('$department','$branch','$program','$semester','$section','$room_no','$class_code','$batch')";
  $result=pg_query($conn,$query);
  if($result){
      echo "<script>alert('Alloted Successfully..'); window.location='class.php';</script>";
  }else{
      echo "<script>alert('Failed To Allot..'); window.location='class.php';</script>";
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
              <th>Department</th>
              <th>Branch</th>
              <th>Program</th>
              <th>Semester</th>
              <th>Section</th>
              <th>Room No.</th>
              <th>Class Code</th>
              <th>Batch</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="department" required>
                  <option value="">--select-department--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM department");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td>
                <select name="branch" required>
                  <option value="">--select-branch--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM branch");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td>
                <select name="program" required>
                  <option value="">--select-program--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM program");
                  while($row = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $row['program']; ?>"><?php echo $row['program']; ?></option>
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
                <select name="room_no" required>
                  <option value="">--select-room_no--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM room_no");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['room_no']; ?>"><?php echo $f['room_no']; ?></option>
                  <?php } ?>
                </select>
              </td>
                <td>
                  <input type="text" name="class_code">
                </td>
              <td>
                <select name="batch" required>
                  <option value="">--select-batch--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM batch");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['batch']; ?>"><?php echo $f['batch']; ?></option>
                  <?php } ?>
                </select>
              </td>

              <td><button name="submit" type="submit" class="btn-assign">Create</button></td>
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
            <th>Department</th>
            <th>Branch</th>
            <th>Program</th>
            <th>Semester</th>
            <th>Section</th>
            <th>Room No.</th>
            <th>Class Code</th>
            <th>Batch</th>
            <th>Alloted</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         $query="SELECT * FROM class_room";
         $result=pg_query($conn,$query);
         while($res=pg_fetch_array($result)){
         ?>
            <tr>
              <td><?php echo $res['department'];?></td>
              <td><?php echo $res['branch']; ?></td>
              <td><?php echo $res['program']; ?></td>
              <td><?php echo $res['semester']; ?></td>
              <td><?php echo $res['section']; ?></td>
              <td><?php echo $res['room_no']; ?></td>
              <td><?php echo $res['class_code']; ?></td>
              <td><?php echo $res['batch']; ?></td>
              <td><a href="allot_class.php?id=<?php echo $res['id']; ?>" class="btn">Allot</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
