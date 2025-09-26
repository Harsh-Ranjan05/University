<?php 
include('db.php');

if(isset($_GET['id']) && isset($_GET['table'])){
    $id = $_GET['id'];
    $table = $_GET['table'];

    // faculty
    if($table=="faculty"){
        $query ="SELECT status FROM faculty WHERE employee_id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE faculty SET status='0' WHERE employee_id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='faculty.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='faculty.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE faculty SET status='1' WHERE employee_id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Lock Profile'); window.location='faculty.php';</script>";
            }else{
                echo "<script>alert('Unlock Profile'); window.location='faculty.php';</script>";
            }
        }
    }

    // students
    elseif($table=="students"){
        $query ="SELECT status FROM students WHERE student_id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE students SET status='0' WHERE student_id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Lock Profile..'); window.location='student.php';</script>";
            }else{
                echo "<script>alert('Unlock Profile..'); window.location='student.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE students SET status='1' WHERE student_id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='student.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='student.php';</script>";
            }
        }
    }

    // branch
    elseif($table=="branch"){
        $query ="SELECT status FROM branch WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE branch SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='branch.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='branch.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE branch SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='branch.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='branch.php';</script>";
            }
        }
    }

    // department
    elseif($table=="department"){
        $query ="SELECT status FROM department WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE department SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='departments.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='departments.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE department SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='departments.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='departments.php';</script>";
            }
        }
    }

    // designation
    elseif($table=="designation"){
        $query ="SELECT status FROM designation WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE designation SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='designation.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='designation.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE designation SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='designation.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='designation.php';</script>";
            }
        }
    }

    // program
    elseif($table=="program"){
        $query ="SELECT status FROM program WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE program SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='program.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='program.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE program SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='program.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='program.php';</script>";
            }
        }
    }

    // batch
    elseif($table=="batch"){
        $query ="SELECT status FROM batch WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE batch SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='batch.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='batch.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE batch SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='batch.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='batch.php';</script>";
            }
        }
    }

    // subject
    elseif($table=="subject"){
        $query ="SELECT status FROM subject WHERE id='$id'";
        $result=pg_query($conn, $query);
        $res = pg_fetch_assoc($result);
        $status = $res['status'];

        if($status == 1){
            $query_active = "UPDATE subject SET status='0' WHERE id='$id'";
            $result_active = pg_query($conn, $query_active);
            if($result_active){
                echo "<script>alert('Status Updated to Deactive..'); window.location='subject.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='subject.php';</script>";
            }
        }else{
            $query_deactive = "UPDATE subject SET status='1' WHERE id='$id'";
            $result_deactive = pg_query($conn, $query_deactive);
            if($result_deactive){
                echo "<script>alert('Status Updated..'); window.location='subject.php';</script>";
            }else{
                echo "<script>alert('Failed To Update..'); window.location='subject.php';</script>";
            }
        }
    }
}
?>
