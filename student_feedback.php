<?php
include('db.php');
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "SELECT * FROM allot WHERE employee_id='$employee_id'";
    $result = pg_query($conn, $query);
    if($res = pg_fetch_array($result)){
        $id            = $res['employee_id'];
        $subject_code  = $res['subject_code'];
        $faculty_name  = $res['full_name'];
    }
}

if(isset($_POST['submit'])){
    $student_id   = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $faculty_id   = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $role_type    = $_POST['role_type'];
    $subject_code = $_POST['subject_code'];
    $description  = $_POST['description'];

    $query_1="INSERT INTO feedback(student_id,student_name,faculty_id,faculty_name,role_type,subject_code,description) 
              VALUES('$student_id','$student_name','$faculty_id','$faculty_name','$role_type','$subject_code','$description')";
    $result_1=pg_query($conn, $query_1);

    if($result_1){
        echo "<script>alert('Feedback Added Successfully..'); window.location='student_feedback.php';</script>";
    }else{
        echo "<script>alert('Failed To Add..'); window.location='student_feedback.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Faculty Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }
    .content { display:flex; padding:10px; gap:5px; flex:1; }
    .form-container { flex:1; background:white; padding:20px; border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
    .form-container h2 { margin-bottom:15px; }
    .form-group { margin-bottom:15px; }
    .form-group label { display:block; margin-bottom:6px; font-weight:600; }
    .form-group input, .form-group select, .form-group textarea { width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; }
    .btn { background:#007bff; color:white; padding:10px 15px; border:none; border-radius:6px; cursor:pointer; }
    .btn:hover { background:#0056b3; }
    .table-container { flex:2; background:white; padding:10px; border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1); overflow:auto; }
    .table-container h2 { margin-bottom:15px; }
    table { width:100%; border-collapse:collapse; }
    table th, table td { border:1px solid #ddd; padding:10px; text-align:left; }
    table th { background:#f2f2f2; }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="main-content">
  <header class="topbar">
    <h1>Feedback Respond</h1>
    <div class="profile">Admin ▼</div>
  </header>

<section class="content">       
    <!-- Form -->   
    <div class="form-container">
      <h2>Add Feedback</h2>
      <form method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
        <input type="hidden" name="student_name"  value="<?php echo $full_name; ?>">
        <input type="hidden" name="faculty_name"  value="<?php echo $faculty_name; ?>">
        <input type="hidden" name="faculty_id"  value="<?php echo $id; ?>">
        <input type="hidden" name="subject_code"  value="<?php echo $subject_code; ?>">
        <input type="hidden" name="role_type" value="<?php echo $role_type; ?>">
        
        <div    class="form-group">
          <label for="address">Describe</label>
          <textarea id="address" name="description" placeholder="Enter Your Feedback" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="btn">Add +</button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h2>Feedback</h2>
      <table>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Faculty Id</th>
            <th>Faculty Name</th>
            <th>Respond</th>
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
            <td><?php echo $res['faculty_id']; ?></td>
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
