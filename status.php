<?php 
include('db.php');
if(isset($_GET['id']) && isset($_GET['table'])){
    $id = $_GET['id'];
    $table = $_GET['table'];
    // Get current status
   if($table=="faculty"){
    $query ="SELECT status FROM faculty WHERE id='$id'";
    $result=pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
    $status = $res['status'];

    if($status == 1){
        // If Active, make it Deactive (0)
        $query_active = "UPDATE faculty SET status='0' WHERE id='$id'";
        $result_active = pg_query($conn, $query_active);
        if($result_active){
            echo "<script>alert('Status Updated to Deactive..'); window.location='faculty.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='faculty.php';</script>";
        }
    }else{
        // If Deactive, make it Active (1)
        $query_deactive = "UPDATE faculty SET status='1' WHERE id='$id'";
        $result_deactive = pg_query($conn, $query_deactive);
        if($result_deactive){
            echo "<script>alert('Status Updated..'); window.location='faculty.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='faculty.php';</script>";
        }
    }
   }elseif($table=="students"){
        $query ="SELECT status FROM students WHERE id='$id'";
    $result=pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
    $status = $res['status'];

    if($status == 1){
        // If Active, make it Deactive (0)
        $query_active = "UPDATE students SET status='0' WHERE id='$id'";
        $result_active = pg_query($conn, $query_active);
        if($result_active){
            echo "<script>alert('Status Updated to Deactive..'); window.location='student.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='student.php';</script>";
        }
    }else{
        // If Deactive, make it Active (1)
        $query_deactive = "UPDATE students SET status='1' WHERE id='$id'";
        $result_deactive = pg_query($conn, $query_deactive);
        if($result_deactive){
            echo "<script>alert('Status Updated..'); window.location='student.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='student.php';</script>";
        }
    }
   }elseif($table=="branch"){
       $query ="SELECT status FROM branch WHERE id='$id'";
    $result=pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
    $status = $res['status'];

    if($status == 1){
        // If Active, make it Deactive (0)
        $query_active = "UPDATE branch SET status='0' WHERE id='$id'";
        $result_active = pg_query($conn, $query_active);
        if($result_active){
            echo "<script>alert('Status Updated to Deactive..'); window.location='branch.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='branch.php';</script>";
        }
    }else{
        // If Deactive, make it Active (1)
        $query_deactive = "UPDATE branch SET status='1' WHERE id='$id'";
        $result_deactive = pg_query($conn, $query_deactive);
        if($result_deactive){
            echo "<script>alert('Status Updated..'); window.location='branch.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='branch.php';</script>";
        }
    }
   }elseif($table=="department"){
      $query ="SELECT status FROM department WHERE id='$id'";
    $result=pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
    $status = $res['status'];

    if($status == 1){
        // If Active, make it Deactive (0)
        $query_active = "UPDATE department SET status='0' WHERE id='$id'";
        $result_active = pg_query($conn, $query_active);
        if($result_active){
            echo "<script>alert('Status Updated to Deactive..'); window.location='departments.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='departments.php';</script>";
        }
    }else{
        // If Deactive, make it Active (1)
        $query_deactive = "UPDATE department SET status='1' WHERE id='$id'";
        $result_deactive = pg_query($conn, $query_deactive);
        if($result_deactive){
            echo "<script>alert('Status Updated..'); window.location='departments.php';</script>";
        }else{
            echo "<script>alert('Failed To Update..'); window.location='departments.php';</script>";
        }
    }
   }
}
?>
