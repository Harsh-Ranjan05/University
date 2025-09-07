<?php 
include('db.php');


if(isset($_POST['submit'])){
  $student_id = $_POST['student_id'];
  $father_name = $_POST['father_name'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email_id'];
  $password = $_POST['password'];

  // Check if student exists
  $query="SELECT * FROM students WHERE student_id='$student_id' AND father_name='$father_name'";
  $result=pg_query($conn,$query);
  $total=pg_num_rows($result);

  if($total>0){
    // Insert parent record
    $insert_query ="INSERT INTO parents(student_id,father_name,mobile_no,email,password) 
                    VALUES('$student_id','$father_name','$mobile_no','$email','$password')";
    $result_completed=pg_query($conn,$insert_query);

    if($result_completed){
       echo "<script>alert('Account Created Successfully.'); window.location='parent.php';</script>";
    } else {
       echo "<script>alert('Failed To Create Account..'); window.location='parent.php';</script>";
    }
  } else {
      echo "<script>alert('Student not found with given details.'); window.location='parent.php';</script>";
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
    .form-group label { display:block;margin-bottom:6px;font-weight:600; }
    .form-group input { width:100%;padding:10px;border:1px solid #ccc;border-radius:6px; }
    .btn { width:100%;background:#007bff;color:white;padding:12px;border:none;border-radius:6px;cursor:pointer;font-size:16px; }
    .btn:hover { background:#0056b3; }
    .id-container { display:flex;gap:10px; }
    .id-container .form-group { flex:1; }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Create Parent Account</h2>
    <form method="POST">
      <div class="id-container">
        <div class="form-group">
          <label for="student_id">Student ID</label>
          <input type="text" id="student_id" name="student_id" placeholder="Enter Student ID">
        </div>
      </div>
      <div class="id-container">
        <div class="form-group">
          <label for="father_name">Father Name</label>
          <input type="text" id="father_name" name="father_name" placeholder="Enter Father Name">
        </div>
      </div>
      <div class="id-container">
        <div class="form-group">
          <label for="mobile_no">Mobile No.</label>
          <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No.">
        </div>
      </div>
      <div class="id-container">
        <div class="form-group">
          <label for="email_id">Email ID</label>
          <input type="text" id="email_id" name="email_id" placeholder="Enter Your Email ID">
        </div>
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
