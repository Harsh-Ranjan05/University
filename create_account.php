<?php 
include('db.php');
if(isset($_POST['submit'])){
  $employee_id = $_POST['employee_id'];
  $student_id = $_POST['student_id'];
  $role_type = $_POST['role_type'];
  $password = $_POST['password'];

  $query="SELECT * FROM faculty WHERE employee_id='$employee_id' AND role_type='faculty' AND status='1'";
  $result=pg_query($conn,$query);
  $total=pg_num_rows($result);

  if($total>0){
    $update_query ="UPDATE faculty SET password='$password', status='2' WHERE employee_id='$employee_id'";
    $result_password=pg_query($conn,$update_query);
    if($result_password){
       echo "<script>alert('Create Successfully..'); window.location='create_account.php';</script>";
    }else{
       echo "<script>alert('Failed To Create..'); window.location='create_account.php';</script>";
    }
  }
  $query_1="SELECT * FROM students WHERE student_id='$student_id' AND role_type='student' AND status='1'";
  $result_1=pg_query($conn,$query_1);
  $total_1=pg_num_rows($result_1);

  if($total_1 > 0){
    $update_query ="UPDATE students SET password='$password', status='2' WHERE student_id='$student_id'";
    $result_password=pg_query($conn,$update_query);
    if($result_password){
       echo "<script>alert('Create Successfully..'); window.location='create_account.php';</script>";
    }else{
       echo "<script>alert('Failed To Create..'); window.location='create_account.php';</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Create Account</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
    body {
      display:flex;justify-content:center;align-items:center;
      height:100vh;background:#f4f6f9;
    }
    .login-container {
      background:white;padding:30px;
      border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.1);
      width:380px;
    }
    .login-container h2 {
      text-align:center;margin-bottom:20px;color:#333;
    }
    .form-group {margin-bottom:15px;}
    .form-group label {
      display:block;margin-bottom:6px;font-weight:600;
    }
    .form-group input, .form-group select {
      width:100%;padding:10px;
      border:1px solid #ccc;border-radius:6px;
    }
    .btn {
      width:100%;background:#007bff;color:white;
      padding:12px;border:none;border-radius:6px;
      cursor:pointer;font-size:16px;
    }
    .btn:hover {background:#0056b3;}
    .note {
      text-align:center;margin-top:8px;font-size:13px;color:#666;
    }
    /* Flex for Employee ID & Student ID */
    .id-container {
      display:flex;gap:10px;
    }
    .id-container .form-group {
      flex:1;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Create Account</h2>
    <form method="POST">
      <div class="id-container">
        <div class="form-group">
          <label for="employee_id">Employee ID</label>
          <input type="text" id="employee_id" name="employee_id" placeholder="Enter Employee ID">
        </div>
        <div class="form-group">
          <label for="student_id">Student ID</label>
          <input type="text" id="student_id" name="student_id" placeholder="Enter Student ID">
        </div>
      </div>
      <p class="note">Enter your ID based on your role</p>

      <div class="form-group">
        <label for="role_type">Role Type</label>
        <select id="role_type" name="role_type">
          <option value="">-- Select Role --</option>
          <option value="Admin">Admin</option>
          <option value="faculty">Faculty</option>
          <option value="student">Student</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password">
      </div>
      <button type="submit" name="submit" class="btn">Create</button>
    </form>
  </div>
</body>
</html>
