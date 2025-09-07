<?php
include('db.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Student Dashboard</title>
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
    .btn-1{background:green;}
    .btn-2{ color:white;
      background:red;
      padding:8px 12px;
      border-radius:6px;
      text-decoration:none;
      margin:5px;
      font-size:14px;
      transition:0.3s;}
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
    <h1>Profile View</h1>
    <div class="profile">Admin ▼</div>
  </header>
<?php if($role_type=='faculty'){?>
    <section class="content">
 <div class="profile-wrapper">
    <div class="profile-card">
      <div class="profile-header">
        <?php if(!empty($photo)) { ?>
          <img src="doc/<?php echo $photo; ?>" alt="Photo" class="profile-img">
        <?php } ?>
        <h1><?php echo $full_name; ?></h1>
        <h2><?php echo $employee_id; ?></h2>
        <p><?php echo $designation." - ".$department; ?></p>
      </div>

      <div class="profile-body">
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Mobile:</strong> <?php echo $mobile_no; ?></p>
        <p><strong>DOB:</strong> <?php echo $dob; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        <p><strong>Blood Group:</strong> <?php echo $blood_group; ?></p>
        <p><strong>Aadhar No:</strong> <?php echo $aadhar_no; ?></p>
        <p><strong>PAN No:</strong> <?php echo $pan_no; ?></p>
        <p><strong>Department:</strong> <?php echo $department; ?></p>
        <p><strong>Designation:</strong> <?php echo $designation; ?></p>
        <p><strong>Joining Date:</strong> <?php echo $joining_date; ?></p>
        <p><strong>Qualification:</strong> <?php echo $qualification; ?></p>
        <p><strong>Permanent Address:</strong> <?php echo $permanent_address; ?></p>
        <p><strong>Current Address:</strong> <?php echo $current_address; ?></p>
        <p><strong>Bank Details:</strong> <?php echo $bank_details; ?></p>
      </div>

      <div class="profile-footer">

        <?php if(!empty($certificate)) { ?>
          <a href="pdf/<?php echo $certificate; ?>" download="<?php echo $certificate; ?>" class="btn">Download Certificate</a>
        <?php } ?>
        <?php if(!empty($experience_certificates)) { ?>
          <a href="pdf/<?php echo $experience_certificates; ?>" download="<?php echo $experience_certificates; ?>" class="btn">Download Experience</a>
        <?php } ?>
        <?php if(!empty($resume)) { ?>
          <a href="pdf/<?php echo $resume; ?>" download="<?php echo $resume_1; ?>" class="btn">Download Resume</a>
        <?php } ?>
        <?php if(!empty($appointment_letter)) { ?>
          <a href="pdf/<?php echo $appointment_letter; ?>" download="<?php echo $appointment_letter; ?>" class="btn">Download Appointment</a>
        <?php } ?>

        <a href="edit.php" class="btn-2">Edit</a>
      </div>
    </div>
  </div>
  </section>
    <?php } elseif($role_type=='student'){?>
        <section class="content">
    <div class="profile-wrapper">
      <div class="profile-card">
        <div class="profile-header">
          <?php if(!empty($photo)){ ?>
            <img src="doc/<?php echo $photo; ?>" class="profile-img" alt="Student Photo">
          <?php } ?>
          <h1><?php echo $full_name; ?></h1>
          <h2><?php echo $student_id; ?></h2>
          <p><?php echo $department." - ".$branch; ?></p>
        </div>

        <div class="profile-body">
          <p><strong>Father's Name:</strong> <?php echo $father_name; ?></p>
          <p><strong>Mother's Name:</strong> <?php echo $mother_name; ?></p>
          <p><strong>Email:</strong> <?php echo $email; ?></p>
          <p><strong>Mobile:</strong> <?php echo $mobile_no; ?></p>
          <p><strong>Parent Mobile:</strong> <?php echo $parent_mobile_no; ?></p>
          <p><strong>DOB:</strong> <?php echo $dob; ?></p>
          <p><strong>Gender:</strong> <?php echo $gender; ?></p>
          <p><strong>Blood Group:</strong> <?php echo $blood_group; ?></p>
          <p><strong>Aadhar No:</strong> <?php echo $aadhar_no; ?></p>
          <p><strong>Category:</strong> <?php echo $category; ?></p>
          <p><strong>Permanent Address:</strong> <?php echo $permanent_address; ?></p>
          <p><strong>Current Address:</strong> <?php echo $current_address; ?></p>
          <p><strong>Department:</strong> <?php echo $department; ?></p>
          <p><strong>Branch:</strong> <?php echo $branch; ?></p>
          <p><strong>Program:</strong> <?php echo $program; ?></p>
          <p><strong>Batch:</strong> <?php echo $batch; ?></p>
          <p><strong>Semester:</strong> <?php echo $semester; ?></p>
          <p><strong>Section:</strong> <?php echo $section; ?></p>
        </div>

        <div class="profile-footer">

          <?php if(!empty($caste_certificate)){ ?>
            <a href="pdf/<?php echo $caste_certificate; ?>" download class="btn">Download Caste Certificate</a>
          <?php } ?>
          <?php if(!empty($doc_10th_doc_12th)){ ?>
            <a href="pdf/<?php echo $doc_10th_doc_12th; ?>" download class="btn">Download 10th/12th Docs</a>
          <?php } ?>
          
          <a href="edit.php" class="btn">Edit</a>
        </div>
      </div>
    </div>
  </section>
        <?php } ?>

</main>
</body>
</html>
