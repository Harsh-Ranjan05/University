<?php 
include('db.php');
?>


<body>

<?php include('navbar.php'); ?>

<main class="main-content">

  <?php if($role_type=='faculty'){ ?>
    <div class="card card-custom_1">
      <div class="profile-header">
        <?php if(!empty($photo)) { ?>
          <img src="doc/<?php echo $photo; ?>" alt="Photo" class="profile-img">
        <?php } ?>
        <h3><?php echo $full_name; ?></h3>
        <p><strong>ID:</strong> <?php echo $employee_id; ?> | <?php echo $designation." - ".$department; ?></p>
      </div>

      <div class="profile-body">
        <div class="row">
          <div class="col-md-6"><p><strong>Email:</strong> <?php echo $email; ?></p></div>
          <div class="col-md-6"><p><strong>Mobile:</strong> <?php echo $mobile_no; ?></p></div>
          <div class="col-md-6"><p><strong>DOB:</strong> <?php echo $dob; ?></p></div>
          <div class="col-md-6"><p><strong>Gender:</strong> <?php echo $gender; ?></p></div>
          <div class="col-md-6"><p><strong>Blood Group:</strong> <?php echo $blood_group; ?></p></div>
          <div class="col-md-6"><p><strong>Aadhar No:</strong> <?php echo $aadhar_no; ?></p></div>
          <div class="col-md-6"><p><strong>PAN No:</strong> <?php echo $pan_no; ?></p></div>
          <div class="col-md-6"><p><strong>Joining Date:</strong> <?php echo $joining_date; ?></p></div>
          <div class="col-md-6"><p><strong>Qualification:</strong> <?php echo $qualification; ?></p></div>
          <div class="col-12"><p><strong>Permanent Address:</strong> <?php echo $permanent_address; ?></p></div>
          <div class="col-12"><p><strong>Current Address:</strong> <?php echo $current_address; ?></p></div>
          <div class="col-12"><p><strong>Bank Details:</strong> <?php echo $bank_details; ?></p></div>
        </div>
      </div>

      <div class="profile-footer">
        <?php if(!empty($certificate)) { ?>
          <a href="pdf/<?php echo $certificate; ?>" download class="btn-status btn-info">Certificate</a>
        <?php } ?>
        <?php if(!empty($experience_certificates)) { ?>
          <a href="doc/<?php echo $experience_certificates; ?>" download class="btn-status btn-info">Experience</a>
        <?php } ?>
        <?php if(!empty($resume)) { ?>
          <a href="doc/<?php echo $resume; ?>" download class="btn-status btn-info">Resume</a>
        <?php } ?>
        <?php if(!empty($appointment_letter)) { ?>
          <a href="pdf/<?php echo $appointment_letter; ?>" download class="btn-status btn-info">Appointment</a>
        <?php } ?>
      </div>
    </div>

  <?php } elseif($role_type=='student'){ ?>
    <div class="card card-custom_1">
      <div class="profile-header">
        <?php if(!empty($photo)){ ?>
          <img src="doc/<?php echo $photo; ?>" class="profile-img" alt="Student Photo">
        <?php } ?>
        <h3><?php echo $full_name; ?></h3>
        <p><strong>ID:</strong> <?php echo $student_id; ?> | <?php echo $department." - ".$branch; ?></p>
      </div>

      <div class="profile-body">
        <div class="row">
          <div class="col-md-6"><p><strong>Father's Name:</strong> <?php echo $father_name; ?></p></div>
          <div class="col-md-6"><p><strong>Mother's Name:</strong> <?php echo $mother_name; ?></p></div>
          <div class="col-md-6"><p><strong>Email:</strong> <?php echo $email; ?></p></div>
          <div class="col-md-6"><p><strong>Mobile:</strong> <?php echo $mobile_no; ?></p></div>
          <div class="col-md-6"><p><strong>Parent Mobile:</strong> <?php echo $parent_mobile_no; ?></p></div>
          <div class="col-md-6"><p><strong>DOB:</strong> <?php echo $dob; ?></p></div>
          <div class="col-md-6"><p><strong>Gender:</strong> <?php echo $gender; ?></p></div>
          <div class="col-md-6"><p><strong>Blood Group:</strong> <?php echo $blood_group; ?></p></div>
          <div class="col-md-6"><p><strong>Aadhar No:</strong> <?php echo $aadhar_no; ?></p></div>
          <div class="col-md-6"><p><strong>Category:</strong> <?php echo $category; ?></p></div>
          <div class="col-md-6"><p><strong>Program:</strong> <?php echo $program; ?></p></div>
          <div class="col-md-6"><p><strong>Batch:</strong> <?php echo $batch; ?></p></div>
          <div class="col-md-6"><p><strong>Semester:</strong> <?php echo $semester; ?></p></div>
          <div class="col-md-6"><p><strong>Section:</strong> <?php echo $section; ?></p></div>
          <div class="col-12"><p><strong>Permanent Address:</strong> <?php echo $permanent_address; ?></p></div>
          <div class="col-12"><p><strong>Current Address:</strong> <?php echo $current_address; ?></p></div>
        </div>
      </div>

      <div class="profile-footer">
        <?php if(!empty($caste_certificate)){ ?>
          <a href="pdf/<?php echo $caste_certificate; ?>" download class="btn-status btn-info">Caste Certificate</a>
        <?php } ?>
        <?php if(!empty($doc_10th_doc_12th)){ ?>
          <a href="pdf/<?php echo $doc_10th_doc_12th; ?>" download class="btn-status btn-info">10th/12th Docs</a>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</main>
</body>

