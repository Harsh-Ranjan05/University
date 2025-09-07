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
      <h1>Attendance - List</h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Allotment Form -->
    <form action="" method="get">
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Program</th>
              <th>Class Code</th>
              <th>Date</th>
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
                <select name="subject_code" required>
                  <option value="">--select-class_code--</option>
                  <?php 
                  $faculty_result = pg_query($conn, "SELECT * FROM subject");
                  while($f = pg_fetch_array($faculty_result)) { ?>
                    <option value="<?php echo $f['subject_code']; ?>">
                      <?php echo "(" . $f['subject_code'] . ") (" . $f['subject_name'] . ")"; ?>
                    </option>
                  <?php } ?>
                </select>
              </td>
              <td>
                <input type="date" name="date" >
              </td>
              <td>
                <select name="class_code" required>
                  <option value="">--select-class_code--</option>
                  <?php 
                  $faculty_result = pg_query($conn, "SELECT * FROM class_room");
                  while($f = pg_fetch_array($faculty_result)) { ?>
                    <option value="<?php echo $f['class_code']; ?>">
                      <?php echo $f['program'] . " (" . $f['section'] . ")  (" . $f['semester'] . ")(" . $f['class_code'] . ")"; ?>
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
            <th>Program</th>
           <th>Class Code</th>
           <th>Subject Code</th>
           <th>Subject Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(isset($_GET['program']) && isset($_GET['class_code']) && isset($_GET['date']) && isset($_GET['subject_code'])) {   
            $program      = $_GET['program'];
            $date         = $_GET['date'];
            $subject_code = $_GET['subject_code'];
            $class_code   = $_GET['class_code'];

            $query = "SELECT * FROM attendance
                      WHERE program='$program' 
                      AND class_code='$class_code' 
                      AND date='$date' 
                      AND employee_id='$employee_id'";
            $result = pg_query($conn, $query);

            while($res = pg_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $res['student_id']; ?></td>
                <td><?php echo $res['full_name']; ?></td>
                <td><?php echo $res['program']; ?></td>
                <td><?php echo $res['class_code']; ?></td>
                <td><?php echo $res['subject_code']; ?></td>
                <td><?php echo $res['subject_name']; ?></td>
                <td><?php if($res['day']=='Present'){?>
                  <button   class="btn">Present</button>
                  <?php } else{?>
                     <button   class="btn-1">Absent</button>
                    <?php } ?>
                </td>
                </td>
              </tr>
            <?php 
            } 
        } 
        ?>
        </tbody>
      </table>
    </section>
    </form>
  </main>
</body>
</html>
