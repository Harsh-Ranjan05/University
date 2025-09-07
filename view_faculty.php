<?php
include('db.php');

// Get faculty ID from URL
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "SELECT * FROM faculty WHERE employee_id = '$employee_id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_array($result)) {
        $id        = $res['employee_id'];
        $name          = $res['full_name'];
        $father_name_1       = $res['father_name'];
        $mother_name_1       = $res['mother_name'];
        $dob_1                = $res['dob'];
        $gender_1            = $res['gender'];
        $blood_group_1        = $res['blood_group'];
        $aadhar_no_1          = $res['aadhar_no'];
        $pan_no_1             = $res['pan_no'];
        $photo_1             = $res['photo'];
        $signature_1        = $res['signature'];
        $mobile_no_1          = $res['mobile_no'];
        $email_1           = $res['email'];
        $permanent_address_1  = $res['permanent_address'];
        $current_address_1    = $res['current_address'];
        $department_1         = $res['department'];
        $designation_1        = $res['designation'];
        $joining_date_1       = $res['joining_date'];
        $qualification_1      = $res['qualification'];
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
  <title>University CRM - Faculty Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }

    .content { display:flex; padding:10px; gap:5px; flex:1; }
   .profile-wrapper {
      display:flex; justify-content:center; align-items:center;
      padding:20px;
      width: 100%;
      height:100%;
    }

    .profile-card {
      width:650px;
      background:white;
      border-radius:12px;
      box-shadow:0 2px 10px rgba(0,0,0,0.15);
      overflow:hidden;
      animation:fadeIn .6s ease-in-out;
    }

    .profile-header {
      text-align:center;
      padding:20px;
      background:#f4f6f9;
      border-bottom:1px solid #eee;
    }

    .profile-img {
      width:120px; height:120px;
      border-radius:50%;
      border:3px solid #007bff;
      margin-bottom:10px;
      object-fit:cover;
    }

    .profile-header h2 { margin:10px 0 5px; font-size:22px; color:#333; }
    .profile-header p { font-size:14px; color:#555; }

    .profile-body { padding:20px; font-size:14px; color:#333; }
    .profile-body p { margin:8px 0; }

    .profile-footer {
      padding:15px;
      text-align:center;
      border-top:1px solid #eee;
      background:#fafafa;
    }
    .btn {
      display:inline-block;
      background:#007bff;
      color:white;
      padding:8px 12px;
      border-radius:6px;
      text-decoration:none;
      margin:5px;
      font-size:14px;
      transition:0.3s;
    }
    .btn:hover { background:#0056b3; }
   .btn-1{
      display:inline-block;
      background:green;
      color:white;
      padding:8px 12px;
      border-radius:6px;
      text-decoration:none;
      margin:5px;
      font-size:14px;
      transition:0.3s;
   }
   .btn-2{
      display:inline-block;
      background:red;
      color:white;
      padding:8px 12px;
      border-radius:6px;
      text-decoration:none;
      margin:5px;
      font-size:14px;
      transition:0.3s;
   }
    @keyframes fadeIn {
      from { opacity:0; transform:translateY(10px);}
      to { opacity:1; transform:translateY(0);}
    }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="main-content">
  <header class="topbar">
    <h1>Faculty Management</h1>
    <div class="profile">Admin ▼</div>
  </header>

  <section class="content">
 <div class="profile-wrapper">
    <div class="profile-card">
      <div class="profile-header">
        <?php if(!empty($photo_1)) { ?>
          <img src="doc/<?php echo $photo_1; ?>" alt="Photo" class="profile-img">
        <?php } ?>
        <h1><?php echo $name; ?></h1>
        <h2><?php echo $id; ?></h2>
        <p><?php echo $designation_1." - ".$department_1; ?></p>
      </div>

      <div class="profile-body">
        <p><strong>Email:</strong> <?php echo $email_1; ?></p>
        <p><strong>Mobile:</strong> <?php echo $mobile_no_1; ?></p>
        <p><strong>DOB:</strong> <?php echo $dob_1; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender_1; ?></p>
        <p><strong>Blood Group:</strong> <?php echo $blood_group_1; ?></p>
        <p><strong>Aadhar No:</strong> <?php echo $aadhar_no_1; ?></p>
        <p><strong>PAN No:</strong> <?php echo $pan_no_1; ?></p>
        <p><strong>Department:</strong> <?php echo $department_1; ?></p>
        <p><strong>Designation:</strong> <?php echo $designation_1; ?></p>
        <p><strong>Joining Date:</strong> <?php echo $joining_date_1; ?></p>
        <p><strong>Qualification:</strong> <?php echo $qualification_1; ?></p>
        <p><strong>Permanent Address:</strong> <?php echo $permanent_address_1; ?></p>
        <p><strong>Current Address:</strong> <?php echo $current_address_1; ?></p>
        <p><strong>Bank Details:</strong> <?php echo $bank_details_1; ?></p>
      </div>

      <div class="profile-footer">
       <?php if ($status_1 == 1) { ?>
          <a href="status.php?table=faculty&id=<?php echo urlencode($id); ?>" class="btn-1">Active</a>
       <?php } else { ?>
          <a href="status.php?table=faculty&id=<?php echo urlencode($id); ?>" class="btn-2">Deactive</a>
       <?php } ?>

        <?php if(!empty($certificate)) { ?>
          <a href="pdf/<?php echo $certificate; ?>" download="<?php echo $certificate_1; ?>" class="btn">Download Certificate</a>
        <?php } ?>
        <?php if(!empty($experience_certificates)) { ?>
          <a href="pdf/<?php echo $experience_certificates; ?>" download="<?php echo $experience_certificates_1; ?>" class="btn">Download Experience</a>
        <?php } ?>
        <?php if(!empty($resume)) { ?>
          <a href="pdf/<?php echo $resume; ?>" download="<?php echo $resume_1; ?>" class="btn">Download Resume</a>
        <?php } ?>
        <?php if(!empty($appointment_letter)) { ?>
          <a href="pdf/<?php echo $appointment_letter; ?>" download="<?php echo $appointment_letter_1; ?>" class="btn">Download Appointment</a>
        <?php } ?>

        <a href="edit_faculty.php?employee_id=<?php echo urlencode($id); ?>" class="btn-2">Edit</a>
      </div>
    </div>
  </div>
  </section>
</main>
</body>
</html>
