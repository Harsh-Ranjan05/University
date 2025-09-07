<?php 
include('db.php');
session_start();

if(isset($_SESSION['role_type'])){
    $role_type = $_SESSION['role_type'];

    if($role_type == 'faculty'){
        session_destroy();
        echo "<script>alert('Log Out...'); window.location='login.php';</script>";
        exit();
    }elseif($role_type == 'student'){
        session_destroy();
        echo "<script>alert('Log Out..'); window.location='login.php';</script>";
        exit();
    }elseif($role_type == 'parent'){
        session_destroy();
        echo "<script>alert('Log Out..'); window.location='parent_login.php';</script>";
        exit();
    }elseif($role_type == 'admin'){
        session_destroy();
        echo "<script>alert('Log Out..'); window.location='login.php';</script>";
        exit();
    }
} else {
    // No role found, force logout
    session_destroy();
    echo "<script>alert('Session Expired, please login again'); window.location='login.php';</script>";
    exit();
}
?>
