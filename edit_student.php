<?php
include('db.php');

// Get student ID from URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_assoc($result)) {
        // Prefill variables
        $full_name         = $res['full_name'];
        $father_name       = $res['father_name'];
        $mother_name       = $res['mother_name'];
        $dob               = $res['dob'];
        $gender            = $res['gender'];
        $blood_group       = $res['blood_group'];
        $category          = $res['category'];
        $caste_certificate = $res['caste_certificate'];
        $aadhar_no         = $res['aadhar_no'];
        $photo             = $res['photo'];
        $mobile_no         = $res['mobile_no'];
        $parent_mobile_no  = $res['parent_mobile_no'];
        $email             = $res['email'];
        $permanent_address = $res['permanent_address'];
        $current_address   = $res['current_address'];
        $department        = $res['department'];
        $branch            = $res['branch'];
        $program           = $res['program'];
        $doc_10th_doc_12th = $res['doc_10th_doc_12th'];
        $signature         = $res['signature'];
        $status            = $res['status'];
        $section           = $res['section'];
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='student.php';</script>";
    exit;
}

// Update Student
if (isset($_POST['submit'])) {
    $full_name        = $_POST['full_name'];
    $father_name      = $_POST['father_name'];
    $mother_name      = $_POST['mother_name'];
    $dob              = $_POST['dob'];
    $gender           = $_POST['gender'];
    $blood_group      = $_POST['blood_group'];
    $category         = $_POST['category'];
    $aadhar_no        = $_POST['aadhar_no'];
    $mobile_no        = $_POST['mobile_no'];
    $parent_mobile_no = $_POST['parent_mobile_no'];
    $email            = $_POST['email'];
    $permanent_address= $_POST['permanent_address'];
    $current_address  = $_POST['current_address'];
    $department       = $_POST['department'];
    $branch           = $_POST['branch'];
    $program          = $_POST['program'];

    // File Uploads (only if new file uploaded)
    if (!empty($_FILES['caste_certificate']['name'])) {
        $caste_certificate = $_FILES['caste_certificate']['name'];
        move_uploaded_file($_FILES['caste_certificate']['tmp_name'], "uploads/$caste_certificate");
    }
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$photo");
    }
    if (!empty($_FILES['signature']['name'])) {
        $signature = $_FILES['signature']['name'];
        move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/$signature");
    }
    if (!empty($_FILES['doc_10th_doc_12th']['name'])) {
        $doc_10th_doc_12th = $_FILES['doc_10th_doc_12th']['name'];
        move_uploaded_file($_FILES['doc_10th_doc_12th']['tmp_name'], "uploads/$doc_10th_doc_12th");
    }

    // Update query
    $query = "UPDATE students SET 
                full_name='$full_name',
                father_name='$father_name',
                mother_name='$mother_name',
                dob='$dob',
                gender='$gender',
                blood_group='$blood_group',
                category='$category',
                caste_certificate='$caste_certificate',
                aadhar_no='$aadhar_no',
                photo='$photo',
                mobile_no='$mobile_no',
                parent_mobile_no='$parent_mobile_no',
                email='$email',
                permanent_address='$permanent_address',
                current_address='$current_address',
                department='$department',
                branch='$branch',
                program='$program',
                doc_10th_doc_12th='$doc_10th_doc_12th',
                signature='$signature'
              WHERE student_id='$student_id'";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Student Updated Successfully!'); window.location='student.php';</script>";
    } else {
        echo "<script>alert('Failed To Update Student!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Dashboard</title>
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
      background:#007bff; color:white; padding:10px 15px;
      border:none; border-radius:6px; cursor:pointer;
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
    .btn-1{ background:green; color:white; padding:10px 15px; border:none; border-radius:6px; cursor:pointer; }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="main-content">
  <header class="topbar">
    <h1>Student Management</h1>
    <div class="profile">Admin ▼</div>
  </header>

  <section class="content">
     <!-- Form -->
    <div class="form-container">
      <h2>Update Student</h2>
      <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="full_name" value="<?php echo $full_name; ?>">
        </div>
        <div class="form-group">
          <label>Father Name</label>
          <input type="text" name="father_name" value="<?php echo $father_name; ?>">
        </div>
        <div class="form-group">
          <label>Mother Name</label>
          <input type="text" name="mother_name" value="<?php echo $mother_name; ?>">
        </div>
        <div class="form-group">
          <label>D.O.B</label>
          <input type="date" name="dob" value="<?php echo $dob; ?>">
        </div>

        <div class="form-group">
          <label>Gender</label>
          <select name="gender">
            <option value="">-- Select Gender --</option>
            <option value="Male" <?php if($gender=="Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender=="Female") echo "selected"; ?>>Female</option>
            <option value="Other" <?php if($gender=="Other") echo "selected"; ?>>Other</option>
          </select>
        </div>

        <div class="form-group">
          <label>Blood Group</label>
          <select name="blood_group">
            <option value="">-- Select Blood Group --</option>
            <option value="A+" <?php if($blood_group=="A+") echo "selected"; ?>>A+</option>
            <option value="A-" <?php if($blood_group=="A-") echo "selected"; ?>>A-</option>
            <option value="B+" <?php if($blood_group=="B+") echo "selected"; ?>>B+</option>
            <option value="B-" <?php if($blood_group=="B-") echo "selected"; ?>>B-</option>
            <option value="AB+" <?php if($blood_group=="AB+") echo "selected"; ?>>AB+</option>
            <option value="AB-" <?php if($blood_group=="AB-") echo "selected"; ?>>AB-</option>
            <option value="O+" <?php if($blood_group=="O+") echo "selected"; ?>>O+</option>
            <option value="O-" <?php if($blood_group=="O-") echo "selected"; ?>>O-</option>
          </select>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select name="category">
            <option value="">-- Select Category --</option>
            <option value="GEN" <?php if($category=="GEN") echo "selected"; ?>>GEN</option>
            <option value="OBC" <?php if($category=="OBC") echo "selected"; ?>>OBC</option>
            <option value="SC" <?php if($category=="SC") echo "selected"; ?>>SC</option>
            <option value="ST" <?php if($category=="ST") echo "selected"; ?>>ST</option>
            <option value="EWS" <?php if($category=="EWS") echo "selected"; ?>>EWS</option>
            <option value="Others" <?php if($category=="Others") echo "selected"; ?>>Others</option>
          </select>
        </div>

   <div class="form-group">
          <label for="ac_cer">Caste Certificate</label>
          <input type="file" id="ac_cer" name="caste_certificate">
        </div>
          <div class="form-group">
          <label for="name">Aadhar No.</label>
          <input type="text" id="name" name="aadhar_no"   value="<?php echo $aadhar_no; ?>"placeholder="Enter aadhar no">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Photo</label>
          <input type="file" id="ac_cer"  value="<?php echo $photo; ?>" name="photo">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Signature</label>
          <input type="file" id="ac_cer"   value="<?php echo $signature; ?>" name="signature">
        </div>
       <div class="form-group">
          <label for="name">Mobile No.</label>
          <input type="text" id="name" name="mobile_no"  value="<?php echo $mobile_no; ?>" placeholder="Enter mobile no">
        </div>
         <div class="form-group">
          <label for="name">Parent Phone No.</label>
          <input type="text" id="name" name="parent_mobile_no"  value="<?php echo $parent_mobile_no; ?>" placeholder="Enter parent phone no">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email"  value="<?php echo $email; ?>" placeholder="Enter email" required>
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
          <label>Department</label>
          <select name="department">
            <option value="">Select Department</option>
            <option value="Electronics" <?php if($department=="Electronics") echo "selected"; ?>>Electronics</option>
            <option value="Mechanical" <?php if($department=="Mechanical") echo "selected"; ?>>Mechanical</option>
            <option value="Civil" <?php if($department=="Civil") echo "selected"; ?>>Civil</option>
          </select>
        </div>

        <div class="form-group">
          <label>Branch</label>
          <select name="branch">
            <option value="">Select Branch</option>
            <option value="CSE" <?php if($branch=="CSE") echo "selected"; ?>>CSE</option>
            <option value="ECE" <?php if($branch=="ECE") echo "selected"; ?>>ECE</option>
            <option value="ME" <?php if($branch=="ME") echo "selected"; ?>>ME</option>
          </select>
        </div>

        <div class="form-group">
          <label>Program</label>
          <select name="program">
            <option value="">Select Program</option>
            <option value="DIP-CSE" <?php if($program=="DIP-CSE") echo "selected"; ?>>DIP-CSE</option>
            <option value="DIP-CIVIL" <?php if($program=="DIP-CIVIL") echo "selected"; ?>>DIP-CIVIL</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ac_cer">Doc 10th/12th class</label>
          <input type="file" id="ac_cer" value="<?php echo $doc_10th_doc_12th; ?>"name="doc_10th_doc_12th">
        </div>
        <button type="submit" name="submit" class="btn">Update</button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h2>Student List</h2>
      <table>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Branch</th>
            <th>Program</th>
            <th>Check</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          $query="SELECT*FROM students";
          $result = pg_query($conn, $query);
          while($res=pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $res['full_name']; ?></td>
            <td><?php echo $res['department']; ?></td>
            <td><?php echo $res['branch']; ?></td>
            <td><?php echo $res['program']; ?></td>
            <td> <a href="view_student.php?student_id=<?php echo urlencode($res['student_id']); ?>">
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
