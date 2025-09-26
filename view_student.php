<?php
include('db.php');

// Get student ID from URL
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = '$id'";
    $result = pg_query($conn, $query);

    if ($res = pg_fetch_assoc($result)) {
        $name_1 = $res['full_name'];
        $father_name_1 = $res['father_name'];
        $mother_name_1 = $res['mother_name'];
        $dob_1 = $res['dob'];
        $gender_1 = $res['gender'];
        $blood_group_1 = $res['blood_group'];
        $category_1 = $res['category']; 
        $caste_certificate_1 = $res['caste_certificate'];
        $aadhar_no_1 = $res['aadhar_no']; 
        $photo_1 = $res['photo'];
        $mobile_no_1 = $res['mobile_no'];
        $parent_mobile_no_1 = $res['parent_mobile_no'];
        $email_1 = $res['email'];
        $permanent_address_1 = $res['permanent_address'];
        $current_address_1 = $res['current_address'];
        $department_1 = $res['department'];
        $branch_1 = $res['branch'];
        $program_1 = $res['program']; 
        $batch_1 = $res['batch'];
        $semester_1 = $res['semester'];  
        $section_1 = $res['section'];
        $doc_10th_12th_1 = $res['doc_10th_doc_12th'];
        $signature_1 = $res['signature'];
        $status_1 = $res['status'];
    } else {
        echo "<script>alert('Student not found'); window.location='students.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='students.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University CRM - Student Profile</title>


<style>
body { font-family:'Segoe UI',sans-serif; background:#f4f6f9; }
.main-content { padding:20px; }
.card-custom { border-radius:20px; box-shadow:0 2px 10px rgba(0,0,0,0.1); }

.profile-img { width:130px; height:130px; border-radius:50%; border:3px solid #007bff; object-fit:cover; }
.profile-header { text-align:center; padding:20px; border-bottom:1px solid #eee; background:#f8f9fc; }
.profile-header h3 { margin-top:10px; }
.profile-body p { margin:6px 0; font-size:14px; }
.profile-footer { padding:15px; text-align:center; border-top:1px solid #eee; background:#fafafa; }
.btn-status { min-width:120px; margin:3px; }

@media(max-width:768px){
    .profile-body .row > div { margin-bottom:10px; }
    .profile-img { width:100px; height:100px; }
}
</style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="main-content">
    <div class="container container-custom">
        <div class="card card-custom mx-auto" style="max-width:750px;">
            <!-- Header with photo and basic info -->
            <div class="profile-header">
                <?php if(!empty($photo_1)){ ?>
                    <img src="doc/<?php echo $photo_1; ?>" class="profile-img" alt="Student Photo">
                <?php } ?>
                <h3><?php echo $name_1; ?></h3>
                <p><strong>ID:</strong> <?php echo $id; ?> | <?php echo $department_1.' - '.$branch_1; ?></p>
            </div>

            <!-- Body with details -->
            <div class="profile-body px-4 py-3">
                <div class="row">
                    <div class="col-md-6"><p><strong>Father's Name:</strong> <?php echo $father_name_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Mother's Name:</strong> <?php echo $mother_name_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Email:</strong> <?php echo $email_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Mobile:</strong> <?php echo $mobile_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Parent Mobile:</strong> <?php echo $parent_mobile_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>DOB:</strong> <?php echo $dob_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Gender:</strong> <?php echo $gender_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Blood Group:</strong> <?php echo $blood_group_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Aadhar No:</strong> <?php echo $aadhar_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Category:</strong> <?php echo $category_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Batch:</strong> <?php echo $batch_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Semester:</strong> <?php echo $semester_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Section:</strong> <?php echo $section_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Program:</strong> <?php echo $program_1; ?></p></div>
                    <div class="col-12"><p><strong>Permanent Address:</strong> <?php echo $permanent_address_1; ?></p></div>
                    <div class="col-12"><p><strong>Current Address:</strong> <?php echo $current_address_1; ?></p></div>
                </div>
            </div>

            <!-- Footer with action buttons -->
            <div class="profile-footer">
                <?php if ($status_1 == 1) { ?>
                    <a href="status.php?table=students&id=<?php echo $id; ?>" class="btn btn-success btn-status">Lock</a>
                <?php } else { ?>
                    <a href="status.php?table=students&id=<?php echo $id; ?>" class="btn btn-danger btn-status">Unlock</a>
                <?php } ?>

                <a href="edit_student.php?student_id=<?php echo $id; ?>" class="btn btn-primary btn-status">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <a href="allot.php?student_id=<?php echo $id; ?>" class="btn btn-warning btn-status">
                    <i class="fas fa-check-circle"></i> Allot
                </a>

                <?php if(!empty($caste_certificate_1)){ ?>
                    <a href="pdf/<?php echo $caste_certificate_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> Caste Certificate
                    </a>
                <?php } ?>

                <?php if(!empty($doc_10th_12th_1)){ ?>
                    <a href="pdf/<?php echo $doc_10th_12th_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> 10th/12th Docs
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

</body>
</html>
