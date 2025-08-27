<?php
include('db.php');

// ====================== FETCH FACULTY DATA ======================
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "SELECT * FROM faculty WHERE employee_id = '$employee_id'";
    $result = pg_query($conn, $query);

    if ($res = pg_fetch_assoc($result)) {
        // Load values into variables
        $full_name          = $res['full_name'];
        $father_name        = $res['father_name'];
        $mother_name        = $res['mother_name'];
        $dob                = $res['dob'];
        $gender             = $res['gender'];
        $blood_group        = $res['blood_group'];
        $aadhar_no          = $res['aadhar_no'];
        $pan_no             = $res['pan_no'];
        $photo              = $res['photo'];
        $signature          = $res['signature'];
        $mobile_no          = $res['mobile_no'];
        $email              = $res['email'];
        $permanent_address  = $res['permanent_address'];
        $current_address    = $res['current_address'];
        $department         = $res['department'];
        $designation        = $res['designation'];
        $joining_date       = $res['joining_date'];
        $qualification      = $res['qualification'];
        $certificate        = $res['certificate'];
        $appointment_letter = $res['appointment_letter'];
        $resume             = $res['resume'];
        $experience_certificates = $res['experience_certificates'];
        $bank_details       = $res['bank_details'];
        $status             = $res['status'];
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
    $full_name         = $_POST['full_name'];
    $father_name       = $_POST['father_name'];
    $mother_name       = $_POST['mother_name'];
    $dob               = $_POST['dob'];
    $gender            = $_POST['gender'];
    $blood_group       = $_POST['blood_group'];
    $aadhar_no         = $_POST['aadhar_no'];
    $pan_no            = $_POST['pan_no'];
    $mobile_no         = $_POST['mobile_no'];
    $email             = $_POST['email'];
    $permanent_address = $_POST['permanent_address'];
    $current_address   = $_POST['current_address'];
    $department        = $_POST['department'];
    $designation       = $_POST['designation'];
    $qualification     = $_POST['qualification'];
    $bank_details      = $_POST['bank_details'];

    // Handle file uploads (replace only if new files uploaded)
    $photoFile       = !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : $photo;
    if (!empty($_FILES['photo']['name'])) move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$photoFile");

    $signatureFile   = !empty($_FILES['signature']['name']) ? $_FILES['signature']['name'] : $signature;
    if (!empty($_FILES['signature']['name'])) move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/$signatureFile");

    $certificateFile = !empty($_FILES['certificate']['name']) ? $_FILES['certificate']['name'] : $certificate;
    if (!empty($_FILES['certificate']['name'])) move_uploaded_file($_FILES['certificate']['tmp_name'], "pdf/$certificateFile");

    $appointmentFile = !empty($_FILES['appointment_letter']['name']) ? $_FILES['appointment_letter']['name'] : $appointment_letter;
    if (!empty($_FILES['appointment_letter']['name'])) move_uploaded_file($_FILES['appointment_letter']['tmp_name'], "pdf/$appointmentFile");

    $resumeFile      = !empty($_FILES['resume']['name']) ? $_FILES['resume']['name'] : $resume;
    if (!empty($_FILES['resume']['name'])) move_uploaded_file($_FILES['resume']['tmp_name'], "pdf/$resumeFile");

    $expFile         = !empty($_FILES['experience_certificate']['name']) ? $_FILES['experience_certificate']['name'] : $experience_certificates;
    if (!empty($_FILES['experience_certificate']['name'])) move_uploaded_file($_FILES['experience_certificate']['tmp_name'], "pdf/$expFile");

    // Update query based on employee_id
    $query = "UPDATE faculty SET 
                full_name='$full_name',
                father_name='$father_name',
                mother_name='$mother_name',
                dob='$dob',
                gender='$gender',
                blood_group='$blood_group',
                aadhar_no='$aadhar_no',
                pan_no='$pan_no',
                photo='$photoFile',
                signature='$signatureFile',
                mobile_no='$mobile_no',
                email='$email',
                permanent_address='$permanent_address',
                current_address='$current_address',
                department='$department',
                designation='$designation',
                qualification='$qualification',
                certificate='$certificateFile',
                appointment_letter='$appointmentFile',
                resume='$resumeFile',
                experience_certificates='$expFile',
                bank_details='$bank_details'
              WHERE employee_id='$employee_id'";

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
          <input type="text" id="name" name="full_name" value="<?php echo $full_name; ?>" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="name">Father Name</label>
          <input type="text" id="name" name="father_name"  value="<?php echo $father_name; ?>" placeholder="Enter father name">
        </div>
        <div class="form-group">
          <label for="name">Mother Name</label>
          <input type="text" id="name" name="mother_name"  value="<?php echo $mother_name; ?>" placeholder="Enter mother name">
        </div>
        <div class="form-group">
          <label for="name">D.O.B</label>
          <input type="date" id="name" name="dob"   value="<?php echo $dob; ?>">
        </div>

     <div class="form-group">
  <label for="gender">Gender</label>
  <select id="gender" name="gender" required>
    <option value="">-- Select Gender --</option>
    <option value="Male" <?php if(isset($gender) && $gender=="Male") echo "selected"; ?>>Male</option>
    <option value="Female" <?php if(isset($gender) && $gender=="Female") echo "selected"; ?>>Female</option>
    <option value="Other" <?php if(isset($gender) && $gender=="Other") echo "selected"; ?>>Other</option>
  </select>
</div>


       <div class="form-group">
  <label for="blood_group">Blood Group</label>
  <select id="blood_group" name="blood_group" required>
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
          <input type="text" id="aadhar" name="aadhar_no" value="<?php echo $aadhar_no; ?>" placeholder="Enter aadhar no. ">
        </div>
        <div class="form-group">
          <label for="pan">PAN No.</label>
          <input type="text" id="pan" name="pan_no"  value="<?php echo $pan_no; ?>" placeholder="Enter pan no. ">
        </div>
        <div class="form-group">
          <label for="photo">Upload Photo</label>
          <input type="file" id="photo" name="photo" value="<?php echo $photo; ?>">
        </div>
        <div class="form-group">
          <label for="signature">Upload Signature</label>
          <input type="file" id="signature" name="signature" value="<?php echo $signature; ?>">
        </div>

        <div class="form-group">
          <label for="phone_no">Phone No.</label>
          <input type="text" id="phone_no" name="mobile_no"  value="<?php echo $mobile_no; ?>"placeholder="Enter phone no.">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email"  value="<?php echo $email; ?>" placeholder="Enter email">
        </div>
       <div class="form-group">
  <label for="permanent_address">Permanent Address</label>
  <textarea id="permanent_address" name="permanent_address" placeholder="Enter permanent address" rows="4"><?php echo isset($permanent_address) ? $permanent_address : ''; ?></textarea>
</div>

<div class="form-group">
  <label for="current_address">Current Address</label>
  <textarea id="current_address" name="current_address" placeholder="Enter current address" rows="4"><?php echo isset($current_address) ? $current_address : ''; ?></textarea>
</div>

<div class="form-group">
  <label for="dept">Department</label>
  <select id="dept" name="department" required>
    <option value="">Select Department</option>
    <option value="Electronics" <?php if(isset($department) && $department=="Electronics") echo "selected"; ?>>Electronics</option>
    <option value="Mechanical" <?php if(isset($department) && $department=="Mechanical") echo "selected"; ?>>Mechanical</option>
    <option value="Civil" <?php if(isset($department) && $department=="Civil") echo "selected"; ?>>Civil</option>
    <option value="Management" <?php if(isset($department) && $department=="Management") echo "selected"; ?>>Management</option>
  </select>
</div>

<div class="form-group">
  <label for="dec">Designation</label>
  <select id="dec" name="designation">
    <option value="">Select Designation</option>
    <option value="Professor" <?php if(isset($designation) && $designation=="Professor") echo "selected"; ?>>Professor</option>
    <option value="Associate Professor" <?php if(isset($designation) && $designation=="Associate Professor") echo "selected"; ?>>Associate Professor</option>
    <option value="Assistant Professor" <?php if(isset($designation) && $designation=="Assistant Professor") echo "selected"; ?>>Assistant Professor</option>
    <option value="Lecturer" <?php if(isset($designation) && $designation=="Lecturer") echo "selected"; ?>>Lecturer</option>
    <option value="Admin" <?php if(isset($designation) && $designation=="Admin") echo "selected"; ?>>Admin</option>
    <option value="HR" <?php if(isset($designation) && $designation=="HR") echo "selected"; ?>>HR</option>
  </select>
</div>

<div class="form-group">
  <label for="qualification">Select Qualification:</label>
  <select name="qualification" id="qualification">
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
          <input type="file" id="certificate" value="<?php echo  $certificate; ?>" name="certificate">
        </div>
        <div class="form-group">
          <label for="appointment_letter">Upload Appointment Letter</label>
          <input type="file" id="appointment_letter" value="<?php echo  $appointment_letter; ?>"name="appointment_letter">
        </div>
        <div class="form-group">
          <label for="resume">Upload Resume</label>
          <input type="file" id="resume" name="resume" value="<?php echo  $resume; ?>">
        </div>
        <div class="form-group">
          <label for="experience_certificate">Upload Experience Certificate</label>
          <input type="file" id="experience_certificate" name="experience_certificate" value="<?php echo  $experience_certificate; ?>">
        </div>
        <div class="form-group">
          <label for="bank_details">Enter Bank Name & A/C No:</label>
          <input type="text" id="bank_details" name="bank_details" value="<?php echo  $bank_details; ?>">
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
