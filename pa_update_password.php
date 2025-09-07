<?php
include('db.php');
include('navbar.php');


if(isset($_POST['submit'])){
    $password = $_POST['password'];       // old password
    $new_password = $_POST['new_password']; // new password

    if($role_type=='faculty'){
        $query = "SELECT * FROM faculty WHERE employee_id='$employee_id' AND password='$password'";
        $result = pg_query($conn, $query);
        $total = pg_num_rows($result);

        if($total > 0){
            $update_query = "UPDATE faculty SET password='$new_password' WHERE employee_id='$employee_id'";
            $result_update = pg_query($conn, $update_query);

            if($result_update){
                echo "<script>alert('Update Successfully'); window.location='pa_update_password.php';</script>";
            } else {
                echo "<script>alert('Failed To Update'); window.location='pa_update_password.php';</script>";
            }
        } else {
            echo "<script>alert('Old Password is incorrect'); window.location='pa_update_password.php';</script>";
        }

    } elseif($role_type=='student'){
        $query = "SELECT * FROM students WHERE student_id='$student_id' AND password='$password'";
        $result = pg_query($conn, $query);
        $total = pg_num_rows($result);

        if($total > 0){
            $update_query = "UPDATE students SET password='$new_password' WHERE student_id='$student_id'";
            $result_update = pg_query($conn, $update_query);

            if($result_update){
                echo "<script>alert('Update Successfully'); window.location='pa_update_password.php';</script>";
            } else {
                echo "<script>alert('Failed To Update'); window.location='pa_update_password.php';</script>";
            }
        } else {
            echo "<script>alert('Old Password is incorrect'); window.location='pa_update_password.php';</script>";
        }

    } elseif($role_type=='parent'){
        $query = "SELECT * FROM parents WHERE parent_id='$parent_id' AND password='$password'";
        $result = pg_query($conn, $query);
        $total = pg_num_rows($result);

        if($total > 0){
            $update_query = "UPDATE parents SET password='$new_password' WHERE parent_id='$parent_id'";
            $result_update = pg_query($conn, $update_query);

            if($result_update){
                echo "<script>alert('Update Successfully'); window.location='pa_update_password.php';</script>";
            } else {
                echo "<script>alert('Failed To Update'); window.location='pa_update_password.php';</script>";
            }
        } else {
            echo "<script>alert('Old Password is incorrect'); window.location='pa_update_password.php';</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Parent Login</title>
  <style>
    .continer{
        display:flex;
        justify-content:center;
        align-items:center;
        width: 100vw;
    }
    .login-container {
      background:white;padding:30px;
      border-radius:12px;box-shadow:0 10px 20px rgba(0,0,0,0.1);
      width:380px;
      height:300px;
    }
    .login-container h2 {
      text-align:center;margin-bottom:20px;color:#333;
    }
    .form-group {margin-bottom:15px;}
    .form-group label {
      display:block;margin-bottom:6px;font-weight:600;
    }
    .form-group input {
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
    .id-container {
      display:flex;gap:10px;
    }
    .id-container .form-group {
      flex:1;
    }
  </style>
</head>
<body>
  <div class="continer">
    <div class="login-container">
    <h2>Update Password</h2>
    <form method="POST" autocomplete="off">
      <div class="form-group">
        <label for="password">Old Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Old  Password" autocomplete="new-password">
      </div>

      <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" id="password" name="new_password" placeholder="Enter New Password" autocomplete="new-password">
      </div>
      <button type="submit" name="submit" class="btn">Update</button>
    </form>
  </div>
  </div>
</body>
</html>
