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
        $status_1            = $res['status'];
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
    .form-container {
      flex:1; background:white; padding:20px;
      border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    .form-container h2 { margin-bottom:15px; }
    .form-group { margin-bottom:15px; }
    .form-group label { display:block; margin-bottom:6px; font-weight:600; }
    .form-group input, .form-group select, .form-group textarea {
      width:100%; padding:10px;
      border:1px solid #ccc; border-radius:6px;
    }
    .btn {
      background:#007bff; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
    }
    .btn:hover { background:#0056b3; }
    .table-container {
      flex:2; background:white; padding:10px;
      border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1);
      overflow:auto;
    }
    .table-container h2 { margin-bottom:15px; }
    table { width:100%; border-collapse:collapse; }
    table th, table td { border:1px solid #ddd; padding:10px; text-align:left; }
    table th { background:#f2f2f2; }
    .btn-1{ background:green; color:white; padding:8px 12px; border:none; border-radius:6px; cursor:pointer; }
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
   <div class="form-container">
      <h2>Upadate Faculty</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="name">Father Name</label>
          <input type="text" id="name" name="father_name_1"  value="<?php echo $father_name_1; ?>" placeholder="Enter father name">
        </div>
        <div class="form-group">
          <label for="name">Mother Name</label>
          <input type="text" id="name" name="mother_name_1"  value="<?php echo $mother_name_1; ?>" placeholder="Enter mother name">
        </div>
        <div class="form-group">
          <label for="name">D.O.B</label>
          <input type="date" id="name" name="dob_1"   value="<?php echo $dob_1; ?>">
        </div>

     <div class="form-group">
  <label for="gender">Gender</label>
  <select id="gender" name="gender_1" required>
    <option value="">-- Select Gender --</option>
    <option value="Male" <?php if(isset($gender) && $gender=="Male") echo "selected"; ?>>Male</option>
    <option value="Female" <?php if(isset($gender) && $gender=="Female") echo "selected"; ?>>Female</option>
    <option value="Other" <?php if(isset($gender) && $gender=="Other") echo "selected"; ?>>Other</option>
  </select>
</div>


       <div class="form-group">
  <label for="blood_group">Blood Group</label>
  <select id="blood_group" name="blood_group_1" required>
    <option value="">-- Select Blood Group --</option>
    <option value="A+" <?php if(isset($blood_group) && $blood_group=="A+") echo "selected"; ?>>A+</option>
    <option value="A-" <?php if(isset($blood_group) && $blood_group=="A-") echo "selected"; ?>>A-</option>
    <option value="B+" <?php if(isset($blood_group) && $blood_group=="B+") echo "selected"; ?>>B+</option>
    <option value="B-" <?php if(isset($blood_group) && $blood_group=="B-") echo "selected"; ?>>B-</option>
    <option value="AB+" <?php if(isset($blood_group) && $blood_group=="AB+") echo "selected"; ?>>AB+</option>
    <option value="AB-" <?php if(isset($blood_group) && $blood_group=="AB-") echo "selected"; ?>>AB-</option>
    <option value="O+" <?php if(isset($blood_group) && $blood_group=="O+") echo "selected"; ?>>O+</option>
    <option value="O-" <?php if(isset($blood_group) && $blood_group=="O-") echo "selected"; ?>>O-</option>
  </select>
</div>


        <div class="form-group">
          <label for="aadhar">Aadhar No.</label>
          <input type="text" id="aadhar" name="aadhar_no_1" value="<?php echo $aadhar_no_1; ?>" placeholder="Enter aadhar no. ">
        </div>
        <div class="form-group">
          <label for="pan">PAN No.</label>
          <input type="text" id="pan" name="pan_no_1"  value="<?php echo $pan_no_1; ?>" placeholder="Enter pan no. ">
        </div>
        <div class="form-group">
          <label for="photo">Upload Photo</label>
          <input type="file" id="photo" name="photo_1" value="<?php echo $photo_1; ?>">
        </div>
        <div class="form-group">
          <label for="signature">Upload Signature</label>
          <input type="file" id="signature" name="signature_1" value="<?php echo $signature_1; ?>">
        </div>

        <div class="form-group">
          <label for="phone_no">Phone No.</label>
          <input type="text" id="phone_no" name="mobile_no_1"  value="<?php echo $mobile_no_1; ?>"placeholder="Enter phone no.">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email_1"  value="<?php echo $email_1; ?>" placeholder="Enter email">
        </div>
       <div class="form-group">
  <label for="permanent_address">Permanent Address</label>
  <textarea id="permanent_address" name="permanent_address_1" placeholder="Enter permanent address" rows="4"><?php echo isset($permanent_address_1) ? $permanent_address_1 : ''; ?></textarea>
</div>

<div class="form-group">
  <label for="current_address">Current Address</label>
  <textarea id="current_address" name="current_address_1" placeholder="Enter current address" rows="4"><?php echo isset($current_address_1) ? $current_address_1 : ''; ?></textarea>
</div>

<div class="form-group">
  <label for="dept">Department</label>
  <select name="department_1">
    <option value="">--select-department--</option>
    <?php 
    $current_department = $department_1 ?? ''; // Replace with actual current value
    $result = pg_query($conn, "SELECT * FROM department");
    while($row = pg_fetch_array($result)){ 
        $selected = ($row['department'] == $current_department) ? 'selected' : '';
    ?>
      <option value="<?php echo $row['department']; ?>" <?php echo $selected; ?>>
        <?php echo $row['department']; ?>
      </option>
    <?php } ?>
  </select>
</div>

<div class="form-group">
  <label for="des">Designation</label>
  <select name="designation_1">
    <option value="">--select-designation--</option>
    <?php 
    $current_designation = $designation_1 ?? ''; // Replace with actual current value
    $result = pg_query($conn, "SELECT * FROM designation");
    while($row = pg_fetch_array($result)){ 
        $selected = ($row['designation'] == $current_designation) ? 'selected' : '';
    ?>
      <option value="<?php echo $row['designation']; ?>" <?php echo $selected; ?>>
        <?php echo $row['designation']; ?>
      </option>
    <?php } ?>
  </select>
</div>


<div class="form-group">
  <label for="qualification">Select Qualification:</label>
  <select name="qualification_1" id="qualification">
    <optgroup label="Graduation (UG)">
      <option value="BA" <?php if(isset($qualification) && $qualification=="BA") echo "selected"; ?>>BA - Bachelor of Arts</option>
      <option value="BSc" <?php if(isset($qualification) && $qualification=="BSc") echo "selected"; ?>>BSc - Bachelor of Science</option>
      <option value="BCom" <?php if(isset($qualification) && $qualification=="BCom") echo "selected"; ?>>BCom - Bachelor of Commerce</option>
      <option value="BTech" <?php if(isset($qualification) && $qualification=="BTech") echo "selected"; ?>>B.Tech - Bachelor of Technology</option>
      <option value="BE" <?php if(isset($qualification) && $qualification=="BE") echo "selected"; ?>>BE - Bachelor of Engineering</option>
      <option value="BCA" <?php if(isset($qualification) && $qualification=="BCA") echo "selected"; ?>>BCA - Bachelor of Computer Applications</option>
    </optgroup>

    <optgroup label="Post-Graduation (PG)">
      <option value="MA" <?php if(isset($qualification) && $qualification=="MA") echo "selected"; ?>>MA - Master of Arts</option>
      <option value="MSc" <?php if(isset($qualification) && $qualification=="MSc") echo "selected"; ?>>MSc - Master of Science</option>
      <option value="MCom" <?php if(isset($qualification) && $qualification=="MCom") echo "selected"; ?>>MCom - Master of Commerce</option>
      <option value="MTech" <?php if(isset($qualification) && $qualification=="MTech") echo "selected"; ?>>M.Tech - Master of Technology</option>
      <option value="ME" <?php if(isset($qualification) && $qualification=="ME") echo "selected"; ?>>ME - Master of Engineering</option>
      <option value="MCA" <?php if(isset($qualification) && $qualification=="MCA") echo "selected"; ?>>MCA - Master of Computer Applications</option>
      <option value="MBA" <?php if(isset($qualification) && $qualification=="MBA") echo "selected"; ?>>MBA - Master of Business Administration</option>
    </optgroup>

    <optgroup label="Doctoral (PhD)">
      <option value="PhD" <?php if(isset($qualification) && $qualification=="PhD") echo "selected"; ?>>Ph.D. - Doctor of Philosophy</option>
      <option value="MPhil" <?php if(isset($qualification) && $qualification=="MPhil") echo "selected"; ?>>M.Phil - Master of Philosophy</option>
    </optgroup>

    <optgroup label="Certifications / Eligibility">
      <option value="NET" <?php if(isset($qualification) && $qualification=="NET") echo "selected"; ?>>UGC-NET Qualified</option>
      <option value="SET" <?php if(isset($qualification) && $qualification=="SET") echo "selected"; ?>>SET Qualified</option>
      <option value="GATE" <?php if(isset($qualification) && $qualification=="GATE") echo "selected"; ?>>GATE Qualified</option>
      <option value="CSIR" <?php if(isset($qualification) && $qualification=="CSIR") echo "selected"; ?>>CSIR-NET Qualified</option>
    </optgroup>
  </select>
</div>


        <div class="form-group">
          <label for="certificate">Upload Certificate</label>
          <input type="file" id="certificate" value="<?php echo  $certificate_1; ?>" name="certificate_1">
        </div>
        <div class="form-group">
          <label for="appointment_letter">Upload Appointment Letter</label>
          <input type="file" id="appointment_letter_1" value="<?php echo  $appointment_letter_1; ?>"name="appointment_letter">
        </div>
        <div class="form-group">
          <label for="resume">Upload Resume</label>
          <input type="file" id="resume" name="resume_1" value="<?php echo  $resume_1; ?>">
        </div>
        <div class="form-group">
          <label for="experience_certificate">Upload Experience Certificate</label>
          <input type="file" id="experience_certificate_1" name="experience_certificate" value="<?php echo  $experience_certificate_1; ?>">
        </div>
        <div class="form-group">
          <label for="bank_details">Enter Bank Name & A/C No:</label>
          <input type="text" id="bank_details" name="bank_details_1" value="<?php echo  $bank_details_1; ?>">
        </div>

        <button type="submit" name="submit" class="btn">Update</button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h2>Faculty List</h2>
      <table>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Details</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          $query="SELECT * FROM faculty";
          $result = pg_query($conn, $query);
          while($res=pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['full_name']; ?></td>
            <td><?php echo $res['department']; ?></td>
            <td><?php echo $res['designation']; ?></td>
            <td> <a href="view_faculty.php?employee_id=<?php echo urlencode($res['employee_id']); ?>">
  <button class="btn-1">View</button>
</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</main>
</body>
</html>
