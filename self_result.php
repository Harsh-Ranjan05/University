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
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>Published Result</h1>
      <div class="profile">Admin ▼</div>
    </header>

   

    <!-- Allotment List -->
    <section class="table-container">
      <table>
        <thead>
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


    $query = "SELECT * FROM store_marks 
              WHERE student_id='$student_id' ";
    $result = pg_query($conn, $query);

    while($res = pg_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $res['subject_code']; ?></td>
            <td><?php echo $res['subject_name']; ?></td>
            <td><?php echo $res['exam_type']; ?></td>
             <td><?php echo $res['semester']; ?></td>
            <td>
              <a href="view_result.php?student_id=<?php echo urlencode($res['student_id']); ?>&exam_type=<?php echo urlencode($res['exam_type']); ?>">
  <button class="btn">View </button></a>
            </td>
        </tr>
<?php 
    } 

?>

        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
