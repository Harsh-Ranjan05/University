<?php
include('db.php');

include('navbar.php');// ====================== UPDATE FACULTY DATA ======================
if (isset($_POST['submit'])) {
    $name_1            = $_POST['full_name'];
    $father_name_1      = $_POST['father_name'];
    $mother_name_1      = $_POST['mother_name'];
    $dob_1             = $_POST['dob'];
    $gender_1           = $_POST['gender'];
    $blood_group_1     = $_POST['blood_group'];
    $aadhar_no_1      = $_POST['aadhar_no'];
    $pan_no_1           = $_POST['pan_no'];
    $mobile_no_1        = $_POST['mobile_no'];
    $email_1           = $_POST['email'];
    $permanent_address_1  = $_POST['permanent_address'];
    $current_address_1  = $_POST['current_address'];
    $bank_details_1    = $_POST['bank_details'];

    // Handle file uploads
    $photoFile_1       = !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : $photo_1;
    if (!empty($_FILES['photo']['name'])) move_uploaded_file($_FILES['photo']['tmp_name'], "doc/$photoFile_1");

    $signatureFile_1    = !empty($_FILES['signature']['name']) ? $_FILES['signature']['name'] : $signature_1;
    if (!empty($_FILES['signature']['name'])) move_uploaded_file($_FILES['signature']['tmp_name'], "doc/$signatureFile");

    // Update query
    $query = "UPDATE faculty SET 
                full_name='$name_1',
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
                bank_details='$bank_details_1'
              WHERE employee_id='$employee_id'";

    $result = pg_query($conn, $query);

    if ($result) {
        $_SESSION['full_name'] = $name_1;
        $_SESSION['father_name'] = $father_name_1;
        $_SESSION['mother_name'] = $mother_name_1;
        $_SESSION['dob'] = $dob_1;
        $_SESSION['gender'] = $gender_1;
        $_SESSION['blood_group'] = $blood_group_1;
        $_SESSION['aadhar_no'] = $aadhar_no_1;
        $_SESSION['pan_no'] = $pan_no_1;
        $_SESSION['mobile_no'] = $mobile_no_1;
        $_SESSION['email'] = $email_1;
        $_SESSION['permanent_address'] = $permanent_address_1;
        $_SESSION['current_address'] = $current_address_1;
        $_SESSION['bank_details'] = $bank_details_1;

        echo "<script>alert('Profile Updated Successfully..'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Failed To Update ..');</script>";
    }
}
if (isset($_POST['submit_1'])) {
    $name_1            = $_POST['full_name'];
    $father_name_1     = $_POST['father_name'];
    $mother_name_1     = $_POST['mother_name'];
    $dob_1             = $_POST['dob'];
    $gender_1          = $_POST['gender'];
    $blood_group_1     = $_POST['blood_group'];
    $aadhar_no_1       = $_POST['aadhar_no'];
    $mobile_no_1       = $_POST['mobile_no'];
    $parent_mobile_no_1= $_POST['parent_mobile_no'];
    $email_1           = $_POST['email'];
    $permanent_address_1  = $_POST['permanent_address'];
    $current_address_1    = $_POST['current_address'];

    // Use session values as fallback
    $photoFile_1     = !empty($_FILES['photo']['name']) ? $_FILES['photo']['name'] : $_SESSION['photo'];
    if (!empty($_FILES['photo']['name'])) move_uploaded_file($_FILES['photo']['tmp_name'], "doc/$photoFile_1");

    $signatureFile_1 = !empty($_FILES['signature']['name']) ? $_FILES['signature']['name'] : $_SESSION['signature'];
    if (!empty($_FILES['signature']['name'])) move_uploaded_file($_FILES['signature']['tmp_name'], "doc/$signatureFile_1");

    // Correct SQL (removed extra comma)
    $query = "UPDATE students SET 
                full_name='$name_1',
                father_name='$father_name_1',
                mother_name='$mother_name_1',
                dob='$dob_1',
                gender='$gender_1',
                blood_group='$blood_group_1',
                aadhar_no='$aadhar_no_1',
                photo='$photoFile_1',
                signature='$signatureFile_1',
                mobile_no='$mobile_no_1',
                parent_mobile_no='$parent_mobile_no_1',
                email='$email_1',
                permanent_address='$permanent_address_1',
                current_address='$current_address_1'
              WHERE student_id='$student_id'";

    $result = pg_query($conn, $query);

    if ($result) {
        // Update session variables
        $_SESSION['full_name'] = $name_1;
        $_SESSION['father_name'] = $father_name_1;
        $_SESSION['mother_name'] = $mother_name_1;
        $_SESSION['dob'] = $dob_1;
        $_SESSION['gender'] = $gender_1;
        $_SESSION['blood_group'] = $blood_group_1;
        $_SESSION['aadhar_no'] = $aadhar_no_1;
        $_SESSION['mobile_no'] = $mobile_no_1;
        $_SESSION['parent_mobile_no'] = $parent_mobile_no_1;
        $_SESSION['email'] = $email_1;
        $_SESSION['permanent_address'] = $permanent_address_1;
        $_SESSION['current_address'] = $current_address_1;
        $_SESSION['photo'] = $photoFile_1;
        $_SESSION['signature'] = $signatureFile_1;

        echo "<script>alert('Profile Updated Successfully..'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Failed To Update..');</script>";
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
      width:400px; padding:10px;
      border:1px solid #ccc; border-radius:6px;
    }
    .btn {
      background:#007bff; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
    }
    .btn:hover { background:#0056b3; }
    
    .content { display:flex; padding:10px; gap:5px; flex:1; }
    .profile-wrapper {
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



<main class="main-content">
  <header class="topbar">
    <h1>Profile Edit</h1>
    <div class="profile">Admin ▼</div>
  </header>
<?php if($role_type=='faculty'){?>
  <section class="content">
   <div class="form-container">
      <h2><?php echo $full_name; ?></h2>
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
          <label for="bank_details">Enter Bank Name & A/C No:</label>
          <input type="text" id="bank_details" name="bank_details" value="<?php echo  $bank_details; ?>">
        </div>

        <button type="submit" name="submit" class="btn">Update</button>
      </form>
    </div>

   
    </div>

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
    </div>
  </div>
  
  </section>
  
  <?php }elseif($role_type=='student') {?>
    <section class="content">
   <div class="form-container">
      <h2><?php echo $full_name; ?></h2>
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
          <label for="phone_no">Parent Phone No.</label>
          <input type="text" id="phone_no" name="parent_mobile_no"  value="<?php echo $parent_mobile_no; ?>"placeholder="Enter phone no.">
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



        <button type="submit" name="submit_1" class="btn">Update</button>
      </form>
    </div>

   
    </div>

 <div class="profile-wrapper">
    <div class="profile-card">
      <div class="profile-header">
        <?php if(!empty($photo)) { ?>
          <img src="doc/<?php echo $photo; ?>" alt="Photo" class="profile-img">
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
    </div>
  </div>
  
  </section>
  
    <?php } ?>
</main>
</body>
</html>
