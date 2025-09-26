<?php
include('db.php');

// ====================== FETCH FACULTY DATA ======================
if (isset($_GET['employee_id'])) {
    $id = $_GET['employee_id'];
    $query = "SELECT * FROM faculty WHERE employee_id = '$id'";
    $result = pg_query($conn, $query);

    if ($res = pg_fetch_assoc($result)) {
        $name          = $res['full_name'];
        $father_name_1 = $res['father_name'];
        $mother_name_1 = $res['mother_name'];
        $dob_1         = $res['dob'];
        $gender_1      = $res['gender'];
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
        $appointment_letter_1= $res['appointment_letter'];
        $resume_1            = $res['resume'];
        $experience_certificates_1 = $res['experience_certificates'];
        $bank_details_1      = $res['bank_details'];
    } else {
        echo "<script>alert('Faculty not found'); window.location='faculty.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='faculty.php';</script>";
    exit;
}

// ====================== UPDATE FACULTY DATA ======================
if (isset($_POST['submit'])) {
    $name               = $_POST['name'];
    $father_name_1      = $_POST['father_name_1'];
    $mother_name_1      = $_POST['mother_name_1'];
    $dob_1              = $_POST['dob_1'];
    $gender_1           = $_POST['gender_1'];
    $blood_group_1      = $_POST['blood_group_1'];
    $aadhar_no_1        = $_POST['aadhar_no_1'];
    $pan_no_1           = $_POST['pan_no_1'];
    $mobile_no_1        = $_POST['mobile_no_1'];
    $email_1            = $_POST['email_1'];
    $permanent_address_1= $_POST['permanent_address_1'];
    $current_address_1  = $_POST['current_address_1'];
    $department_1       = $_POST['department_1'];
    $designation_1      = $_POST['designation_1'];
    $qualification_1    = $_POST['qualification_1'];
    $bank_details_1     = $_POST['bank_details_1'];

    // Handle file uploads
    $photoFile_1        = !empty($_FILES['photo_1']['name']) ? $_FILES['photo_1']['name'] : $photo_1;
    if (!empty($_FILES['photo_1']['name'])) move_uploaded_file($_FILES['photo_1']['tmp_name'], "uploads/$photoFile_1");

    $signatureFile_1    = !empty($_FILES['signature_1']['name']) ? $_FILES['signature_1']['name'] : $signature_1;
    if (!empty($_FILES['signature_1']['name'])) move_uploaded_file($_FILES['signature_1']['tmp_name'], "uploads/$signatureFile_1");

    $certificateFile_1  = !empty($_FILES['certificate_1']['name']) ? $_FILES['certificate_1']['name'] : $certificate_1;
    if (!empty($_FILES['certificate_1']['name'])) move_uploaded_file($_FILES['certificate_1']['tmp_name'], "pdf/$certificateFile_1");

    $appointmentFile_1  = !empty($_FILES['appointment_letter']['name']) ? $_FILES['appointment_letter']['name'] : $appointment_letter_1;
    if (!empty($_FILES['appointment_letter']['name'])) move_uploaded_file($_FILES['appointment_letter']['tmp_name'], "pdf/$appointmentFile_1");

    $resumeFile_1       = !empty($_FILES['resume_1']['name']) ? $_FILES['resume_1']['name'] : $resume_1;
    if (!empty($_FILES['resume_1']['name'])) move_uploaded_file($_FILES['resume_1']['tmp_name'], "pdf/$resumeFile_1");

    $expFile_1          = !empty($_FILES['experience_certificate']['name']) ? $_FILES['experience_certificate']['name'] : $experience_certificates_1;
    if (!empty($_FILES['experience_certificate']['name'])) move_uploaded_file($_FILES['experience_certificate']['tmp_name'], "pdf/$expFile_1");

    // Update query
    $query = "UPDATE faculty SET 
                full_name='$name',
                father_name='$father_name_1',
                mother_name='$mother_name_1',
                dob='$dob_1',
                gender='$gender_1',
                blood_group='$blood_group_1',
                aadhar_no='$aadhar_no_1',
                pan_no='$pan_no_1',
                photo='$photoFile_1',
                signature='$signatureFile_1',
                mobile_no='$mobile_no_1',
                email='$email_1',
                permanent_address='$permanent_address_1',
                current_address='$current_address_1',
                department='$department_1',
                designation='$designation_1',
                qualification='$qualification_1',
                certificate='$certificateFile_1',
                appointment_letter='$appointmentFile_1',
                resume='$resumeFile_1',
                experience_certificates='$expFile_1',
                bank_details='$bank_details_1'
              WHERE employee_id='$id'";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Faculty Updated Successfully..'); window.location='faculty.php';</script>";
    } else {
        echo "<script>alert('Failed To Update Faculty..');</script>";
    }
}
?>



<body>

<?php include('navbar.php'); ?>

<main class="container py-3">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 text-primary fw-bold m-0">Edit Faculty</h1>
    <a href="faculty.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
  </header>

  <!-- Edit Form -->
  <div class="card shadow-sm mb-4">
    <h5 class="mb-3">Update Faculty</h5>
    <form method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Father Name</label>
          <input type="text" name="father_name_1" value="<?php echo $father_name_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Mother Name</label>
          <input type="text" name="mother_name_1" value="<?php echo $mother_name_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">D.O.B</label>
          <input type="date" name="dob_1" value="<?php echo $dob_1; ?>" class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">Gender</label>
          <select name="gender_1" class="form-select">
            <option value="">--</option>
            <option value="Male" <?php if($gender_1=="Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender_1=="Female") echo "selected"; ?>>Female</option>
            <option value="Other" <?php if($gender_1=="Other") echo "selected"; ?>>Other</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Blood Group</label>
          <select name="blood_group_1" class="form-select">
            <option value="">--</option>
            <?php 
              $groups=["A+","A-","B+","B-","AB+","AB-","O+","O-"];
              foreach($groups as $g){
                $sel = ($blood_group_1==$g) ? "selected":""; 
                echo "<option value='$g' $sel>$g</option>";
              }
            ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Aadhar No.</label>
          <input type="text" name="aadhar_no_1" value="<?php echo $aadhar_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">PAN No.</label>
          <input type="text" name="pan_no_1" value="<?php echo $pan_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Mobile</label>
          <input type="text" name="mobile_no_1" value="<?php echo $mobile_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email_1" value="<?php echo $email_1; ?>" class="form-control">
        </div>
        <div class="col-12">
          <label class="form-label">Permanent Address</label>
          <textarea name="permanent_address_1" rows="2" class="form-control"><?php echo $permanent_address_1; ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Current Address</label>
          <textarea name="current_address_1" rows="2" class="form-control"><?php echo $current_address_1; ?></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Photo</label>
          <input type="file" name="photo_1" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Signature</label>
          <input type="file" name="signature_1" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Department</label>
          <select name="department_1" class="form-select">
            <option value="">--select--</option>
            <?php 
              $result = pg_query($conn, "SELECT * FROM department");
              while($row = pg_fetch_assoc($result)){
                $sel = ($row['department']==$department_1)?"selected":"";
                echo "<option value='{$row['department']}' $sel>{$row['department']}</option>";
              }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Designation</label>
          <select name="designation_1" class="form-select">
            <option value="">--select--</option>
            <?php 
              $result = pg_query($conn, "SELECT * FROM designation");
              while($row = pg_fetch_assoc($result)){
                $sel = ($row['designation']==$designation_1)?"selected":"";
                echo "<option value='{$row['designation']}' $sel>{$row['designation']}</option>";
              }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Qualification</label>
          <input type="text" name="qualification_1" value="<?php echo $qualification_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Bank Details</label>
          <input type="text" name="bank_details_1" value="<?php echo $bank_details_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Certificate</label>
          <input type="file" name="certificate_1" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Appointment Letter</label>
          <input type="file" name="appointment_letter" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Resume</label>
          <input type="file" name="resume_1" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Experience Certificates</label>
          <input type="file" name="experience_certificate" class="form-control">
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </div>
    </form>
  </div>
</main>
</body>

