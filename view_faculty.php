<?php
include('db.php');

// Get faculty ID from URL
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "SELECT * FROM faculty WHERE employee_id = '$employee_id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_assoc($result)) {
        $id        = $res['employee_id'];
        $name_1     = $res['full_name'];
        $father_name_1 = $res['father_name'];
        $mother_name_1 = $res['mother_name'];
        $dob_1     = $res['dob'];
        $gender_1  = $res['gender'];
        $blood_group_1 = $res['blood_group'];
        $aadhar_no_1   = $res['aadhar_no'];
        $pan_no_1      = $res['pan_no'];
        $photo_1       = $res['photo'];
        $signature_1   = $res['signature'];
        $mobile_no_1   = $res['mobile_no'];
        $email_1       = $res['email'];
        $permanent_address_1 = $res['permanent_address'];
        $current_address_1   = $res['current_address'];
        $department_1        = $res['department'];
        $designation_1       = $res['designation'];
        $joining_date_1      = $res['joining_date'];
        $qualification_1     = $res['qualification'];
        $certificate_1       = $res['certificate'];
        $appointment_letter_1 = $res['appointment_letter'];
        $resume_1             = $res['resume'];
        $experience_certificates_1 = $res['experience_certificates'];
        $bank_details_1       = $res['bank_details'];
        $status_1            = $res['status'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University CRM - Faculty Profile</title>


<style>
body { font-family:'Segoe UI',sans-serif; background:#f4f6f9; }
.main-content { padding:20px; }

.container-custom {
    border-radius:12px;
    padding:20px;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.card-custom { border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); }

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
                    <img src="doc/<?php echo $photo_1; ?>" class="profile-img" alt="Faculty Photo">
                <?php } ?>
                <h3><?php echo $name_1; ?></h3>
                <p><strong>ID:</strong> <?php echo $id; ?> | <?php echo $designation_1.' - '.$department_1; ?></p>
            </div>

            <!-- Body with details -->
            <div class="profile-body px-4 py-3">
                <div class="row">
                    <div class="col-md-6"><p><strong>Father's Name:</strong> <?php echo $father_name_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Mother's Name:</strong> <?php echo $mother_name_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Email:</strong> <?php echo $email_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Mobile:</strong> <?php echo $mobile_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>DOB:</strong> <?php echo $dob_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Gender:</strong> <?php echo $gender_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Blood Group:</strong> <?php echo $blood_group_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Aadhar No:</strong> <?php echo $aadhar_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>PAN No:</strong> <?php echo $pan_no_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Joining Date:</strong> <?php echo $joining_date_1; ?></p></div>
                    <div class="col-md-6"><p><strong>Qualification:</strong> <?php echo $qualification_1; ?></p></div>
                    <div class="col-12"><p><strong>Permanent Address:</strong> <?php echo $permanent_address_1; ?></p></div>
                    <div class="col-12"><p><strong>Current Address:</strong> <?php echo $current_address_1; ?></p></div>
                    <div class="col-12"><p><strong>Bank Details:</strong> <?php echo $bank_details_1; ?></p></div>
                </div>
            </div>

            <!-- Footer with action buttons -->
            <div class="profile-footer">
           <?php if ($status_1 == 1) { ?>
             <a href="status.php?table=faculty&id=<?php echo $id; ?>" class="btn btn-success btn-status">Lock</a>
           <?php } else { ?>
                <a href="status.php?table=faculty&id=<?php echo $id; ?>" class="btn btn-danger btn-status">Unlock</a>
           <?php } ?>

                <a href="edit_faculty.php?employee_id=<?php echo urlencode($id); ?>" class="btn btn-primary btn-status">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <?php if(!empty($certificate_1)){ ?>
                    <a href="pdf/<?php echo $certificate_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> Certificate
                    </a>
                <?php } ?>
                <?php if(!empty($experience_certificates_1)){ ?>
                    <a href="pdf/<?php echo $experience_certificates_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> Experience
                    </a>
                <?php } ?>
                <?php if(!empty($resume_1)){ ?>
                    <a href="pdf/<?php echo $resume_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> Resume
                    </a>
                <?php } ?>
                <?php if(!empty($appointment_letter_1)){ ?>
                    <a href="pdf/<?php echo $appointment_letter_1; ?>" download class="btn btn-info btn-status">
                        <i class="fas fa-download"></i> Appointment
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

</body>
</html>
