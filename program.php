<?php 
include('db.php');
if(isset($_POST['submit'])){
    $program = $_POST['program'];
    $query="INSERT INTO program(program) VALUES('$program')";
    $result=pg_query($conn, $query);
    if($result){
    echo "<script>alert('Added Successfully..'); window.location='program.php';</script>";
    }else{
    echo "<script>alert('Failed To Added..'); window.location='program.php';</script>";
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }


   .content { display:flex; padding:10px; gap:5px; flex:1; }

    /* Form */
    .form-container {
      flex:1;
      background:white;
      padding:20px;
      border-radius:12px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    .form-container h2 { margin-bottom:15px; }
    .form-group { margin-bottom:15px; }
    .form-group label { display:block; margin-bottom:6px; font-weight:600; }
    .form-group input, .form-group select {
      width:100%; padding:10px;
      border:1px solid #ccc; border-radius:6px;
    }
    .btn {
      background:#007bff; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
    }
    .btn:hover { background:#0056b3; }
      /* Table */
    .table-container {
      flex:2;
      background:white;
      padding:10px;
      border-radius:12px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      overflow:auto;
    }
    .table-container h2 { margin-bottom:15px; }
    table {
      width:100%; border-collapse:collapse;
    }
    table th, table td {
      border:1px solid #ddd;
      padding:10px;
      text-align:left;
    }
    table th {
      background:#f2f2f2;
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

<?php include('navbar.php');?>
  <main class="main-content">
    <header class="topbar">
      <h1>Dashboard</h1>
      <div class="profile">Welcome, Admin</div>
    </header>
    <section class="content">
      <!-- Form -->
      <div class="form-container">
        <h2>Add Program</h2>
        <form method="POST">
          <div class="form-group">
            <label for="name">Program Name</label>
            <input type="text" id="name" name="program" placeholder="Enter full name">
          </div>
          <button type="submit" name="submit" class="btn">Add +</button>
        </form>
      </div>

      <!-- Table -->
      <div class="table-container">
        <h2>Program List</h2>
        <table>
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Program Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            $query="SELECT*FROM program";
            $result=pg_query($conn, $query);
            while($res=pg_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $res['program']; ?></td>
              <td><?php 
if ($res['status'] == 1) { ?>
    <a href="status.php?table=program&id=<?php echo $res['id']; ?>" class="btn-1">Active</a>
<?php } else { ?>
    <a href="status.php?table=program&id=<?php echo $res['id']; ?>" class="btn-2">Deactive</a>
<?php } ?></td>
              <td><a href="edit_program.php?&id=<?php echo $res['id']; ?>" class="btn-1">Edit</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>
