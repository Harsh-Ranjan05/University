<?php
include('db.php');
session_start();

if(isset($_POST['submit'])){
    $employee_id = $_POST['employee_id'] ?? '';
    $student_id  = $_POST['student_id'] ?? '';
    $role_type   = $_POST['role_type'] ?? '';
    $password    = $_POST['password'] ?? '';

    // ------------------- DUMMY ADMIN LOGIN -------------------
    if($role_type == 'admin' && $employee_id == 'admin' && $password == 'admin123'){
        $_SESSION['employee_id'] = 'admin';
        $_SESSION['role_type']   = 'admin';
        $_SESSION['full_name'] = 'admin';
        $_SESSION['student_id']  = '';
        $_SESSION['department']  = '';
        $_SESSION['branch']      = '';
        $_SESSION['batch']       = '';
        $_SESSION['class_code']  = '';
        $_SESSION['semester']    = '';
        $_SESSION['section']     = '';
        $_SESSION['program']     = '';
        $_SESSION['student_id']  = '';
        $_SESSION['parent_id']   = '';
        $_SESSION['photo'] = '';
        $_SESSION['designation'] = '';
        $_SESSION['pan_no']  = '';
        $_SESSION['joining_date'] = '';
        $_SESSION['qualification'] = '';
        $_SESSION['qualification'] = '';
        $_SESSION['certificate'] = '';
        $_SESSION['experience_certificate'] = '';
        $_SESSION['resume'] = $res['resume'];
        $_SESSION['appointment_letter'] = '';
         $_SESSION['caste_certificate'] = '';
        $_SESSION['doc_10th_doc_12th'] = '';
        $_SESSION['bank_details'] = '';
        $_SESSION['father_name'] = '';
        $_SESSION['mother_name'] = '';
        $_SESSION['blood_group'] = '';
        $_SESSION['aadhar_no'] = '';
        $_SESSION['category'] = '';
        $_SESSION['permanent_address'] = '';
        $_SESSION['current_address'] = '';
        $_SESSION['email'] = '';
        $_SESSION['mobile_no'] = '';
        $_SESSION['parent_mobile_no'] = '';
        $_SESSION['dob'] = '';
        $_SESSION['gender'] = '';
        $_SESSION['blood_group'] = '';
        $_SESSION['status'] = '';

        echo "<script>alert('Admin Login Successful'); window.location='dashboard.php';</script>";
        exit;
    }

    // ------------------- FACULTY LOGIN -------------------
    if($role_type == 'faculty'){
        $query = "SELECT * FROM faculty 
                  WHERE employee_id='$employee_id' 
                  AND role_type='faculty' 
                  AND status='0'  OR status='1'
                  AND password='$password'";
        $result = pg_query($conn, $query);
        $total = pg_num_rows($result);

        if($total > 0){
            $res = pg_fetch_assoc($result);
             $_SESSION['student_id']  = $res['student_id'];
            $_SESSION['parent_id']   = $res['parent_id'];
            $_SESSION['photo'] = $res['photo'];
            $_SESSION['designation'] = $res['designation'];
            $_SESSION['pan_no']  = $res['pan_no'];
            $_SESSION['joining_date'] = $res['joining_date'];
            $_SESSION['qualification'] = $res['qualification'];
            $_SESSION['certificate'] = $res['certificate'];
            $_SESSION['experience_certificate'] = $res['experience_certificate'];
            $_SESSION['resume'] = $res['resume'];
            $_SESSION['appointment_letter'] = $res['appointment_letter'];
            $_SESSION['caste_certificate'] = $res['caste_certificate'];
            $_SESSION['doc_10th_doc_12th'] = $res['doc_10th_doc_12th'];
            $_SESSION['bank_details'] = $res['bank_details'];
            $_SESSION['father_name'] = $res['father_name'];
            $_SESSION['mother_name'] = $res['mother_name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['mobile_no'] = $res['mobile_no'];
            $_SESSION['parent_mobile_no'] = $res['parent_mobile_no'];
            $_SESSION['dob'] = $res['dob'];
            $_SESSION['gender'] = $res['gender'];
            $_SESSION['blood_group'] = $res['blood_group'];
            $_SESSION['aadhar_no'] = $res['addhar_no'];
            $_SESSION['category'] = $res['category'];
            $_SESSION['permanent_address'] = $res['permanent_address'];
            $_SESSION['current_address'] = $res['current_address'];
            $_SESSION['employee_id'] = $res['employee_id'];
            $_SESSION['full_name'] = $res['full_name'];
            $_SESSION['role_type']   = $res['role_type'];
            $_SESSION['student_id']  = $res['student_id'];
            $_SESSION['department']  = $res['department'];
            $_SESSION['branch']      = $res['branch'];
            $_SESSION['batch']       = $res['batch'];
            $_SESSION['class_code']  = $res['class_code'];
            $_SESSION['semester']    = $res['semester'];
            $_SESSION['section']     = $res['section'];
            $_SESSION['program']     = $res['program'];
            $_SESSION['status'] = $res['status'];

            echo "<script>alert('Faculty Login Successful'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Failed To Login Faculty'); window.location='login.php';</script>";
        }
        exit;
    }

    // ------------------- STUDENT LOGIN -------------------
    if($role_type == 'student'){
        $query = "SELECT * FROM students 
                  WHERE student_id='$student_id' 
                  AND role_type='student' 
                  AND status='1' OR status='0' 
                  AND password='$password'";
        $result = pg_query($conn, $query);
        $total = pg_num_rows($result);

        if($total > 0){
            $res = pg_fetch_assoc($result);
            $_SESSION['student_id']  = $res['student_id'];
            $_SESSION['parent_id']   = $res['parent_id'];
            $_SESSION['photo'] = $res['photo'];
            $_SESSION['designation'] = $res['designation'];
            $_SESSION['pan_no']  = $res['pan_no'];
            $_SESSION['joining_date'] = $res['joining_date'];
            $_SESSION['qualification'] = $res['qualification'];
            $_SESSION['certificate'] = $res['certificate'];
            $_SESSION['experience_certificate'] = $res['experience_certificate'];
            $_SESSION['resume'] = $res['resume'];
            $_SESSION['appointment_letter'] = $res['appointment_letter'];
            $_SESSION['caste_certificate'] = $res['caste_certificate'];
            $_SESSION['doc_10th_doc_12th'] = $res['doc_10th_doc_12th'];
            $_SESSION['bank_details'] = $res['bank_details'];
            $_SESSION['father_name'] = $res['father_name'];
            $_SESSION['mother_name'] = $res['mother_name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['mobile_no'] = $res['mobile_no'];
            $_SESSION['parent_mobile_no'] = $res['parent_mobile_no'];
            $_SESSION['dob'] = $res['dob'];
            $_SESSION['gender'] = $res['gender'];
            $_SESSION['blood_group'] = $res['blood_group'];
            $_SESSION['aadhar_no'] = $res['addhar_no'];
            $_SESSION['category'] = $res['category'];
            $_SESSION['permanent_address'] = $res['permanent_address'];
            $_SESSION['current_address'] = $res['current_address'];
            $_SESSION['employee_id'] = $res['employee_id'];
             $_SESSION['full_name'] = $res['full_name'];
            $_SESSION['student_id']  = $res['student_id'];
            $_SESSION['role_type']   = $res['role_type'];
            $_SESSION['department']  = $res['department'];
            $_SESSION['branch']      = $res['branch'];
            $_SESSION['batch']       = $res['batch'];
            $_SESSION['class_code']  = $res['class_code'];
            $_SESSION['semester']    = $res['semester'];
            $_SESSION['section']     = $res['section'];
            $_SESSION['program']     = $res['program'];
             $_SESSION['status'] = $res['status'];

            echo "<script>alert('Student Login Successful'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Failed To Login Student'); window.location='login.php';</script>";
        }
        exit;
    }

    // ------------------- INVALID ROLE -------------------
    echo "<script>alert('Invalid Role or Credentials'); window.location='login.php';</script>";
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
    <h2>Login</h2>
  <form method="POST" autocomplete="off">
  <div class="id-container">
    <div class="form-group">
      <label for="employee_id">Employee ID</label>
      <input type="text" id="employee_id" name="employee_id" placeholder="Enter Employee ID" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="student_id">Student ID</label>
      <input type="text" id="student_id" name="student_id" placeholder="Enter Student ID" autocomplete="off">
    </div>
  </div>
  <p class="note">Enter your ID based on your role</p>

  <div class="form-group">
    <label for="role_type">Role Type</label>
    <select id="role_type" name="role_type" autocomplete="off">
      <option value="">-- Select Role --</option>
      <option value="admin">Admin</option>
      <option value="faculty">Faculty</option>
      <option value="student">Student</option>
    </select>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter Password" autocomplete="new-password">
  </div>
  <button type="submit" name="submit" class="btn">Login</button>
</form>

  </div>
</body>
</html>
