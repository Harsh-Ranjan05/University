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
      <h1>Faculty </h1>
      <div class="profile">Admin ▼</div>
    </header>


      
        
    <section class="table-container">
      
        </tbody>
      </table>
      <div class="table-container">
      <table>
        <h1>Faculty Feedback</h1>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Faculty</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          $query = "SELECT * FROM feedback WHERE student_id='$student_id' AND role_type='faculty'";
          $result = pg_query($conn, $query);
          while($res = pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['faculty_name']; ?></td>
            <td><?php echo $res['description']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </section>
  
  </main>
</body>
</html>
