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
     .btn-1 {
      padding:6px 12px;
      background:red;
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
      <h1>Student </h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Allotment Form -->
    <form action="" method="get">
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Student</th>
              <th>Semester</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
               <td>
<select name="student_id" required>
    <option value="">--select-student--</option>
    <?php 
    $student_result = pg_query($conn, "SELECT * FROM students");
    while($f = pg_fetch_array($student_result)) { ?>
      <option value="<?php echo $f['student_id']; ?>">
        <?php echo $f['full_name'] . " (" . $f['student_id'] . ") "; ?>
      </option>
    <?php } ?>
</select>

</td> 
 <td>
<select name="program" required>
    <option value="">--select-program--</option>
    <?php 
    $student_result = pg_query($conn, "SELECT * FROM students");
    while($f = pg_fetch_array($student_result)) { ?>
      <option value="<?php echo $f['program']; ?>">
        <?php echo $f['program'] . ".(" . $f['semester'] . ").(" .$f['batch'].") "; ?>
      </option>
    <?php } ?>
</select>

</td> 
<td><button name="fetch" type="submit" class="btn-assign">Fetch</button></td>
            </tr>
          </tbody>
        </table>
      </section>
    </form>

    <!-- Attendance List -->
    <form method="post">
    <section class="table-container">
      <table>
        <thead>
          <tr>
            <th>Student Id</th>
            <th>Full Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(isset($_GET['student_id']) && isset($_GET['program'])) {   
            $id = $_GET['student_id'];
            $program     = $_GET['program'];
        
            $query = "SELECT * FROM students
                      WHERE student_id='$id' 
                      AND program='$program'";
            $result = pg_query($conn, $query);

            while($res = pg_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $res['student_id']; ?></td>
                <td><?php echo $res['full_name']; ?></td>
                 <td>  <a class="btn" href="faculty_feedback.php?student_id=<?php echo urlencode($res['student_id']); ?>">
    Feedback
  </a></td>
              
              </tr>
            <?php 
            } 
        } 
        ?>
        </tbody>
      </table>
       <div class="table-container">
      <table>
        <h1>Student Feedback</h1>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Student</th>
            <th>Description</th>
            <th>Respond</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          $query = "SELECT * FROM feedback WHERE faculty_id='$employee_id' AND role_type='student'";
          $result = pg_query($conn, $query);
          while($res = pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['student_name']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td>  <a class="btn" href="faculty_feedback.php?student_id=<?php echo urlencode($res['student_id']); ?>">
    Reply
  </a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </section>
    </form>
  </main>
</body>
</html>
