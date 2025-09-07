<?php
include('db.php');

// Get student ID from URL
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = '$id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_assoc($result)) {
        // Prefill variables
        $name         = $res['full_name'];
        $father_name_1       = $res['father_name'];
        $mother_name_1       = $res['mother_name'];
        $dob_1               = $res['dob'];
        $gender_1           = $res['gender'];
        $blood_group_1      = $res['blood_group'];
        $category_1          = $res['category'];
        $caste_certificate_1 = $res['caste_certificate'];
        $aadhar_no_1         = $res['aadhar_no'];
        $photo_1             = $res['photo'];
        $mobile_no_1         = $res['mobile_no'];
        $parent_mobile_no_1  = $res['parent_mobile_no'];
        $email_1             = $res['email'];
        $permanent_address_1 = $res['permanent_address'];
        $current_address_1  = $res['current_address'];
        $department_1        = $res['department'];
        $branch_1            = $res['branch'];
        $program_1           = $res['program'];
        $doc_10th_doc_12th_1 = $res['doc_10th_doc_12th'];
        $signature_1         = $res['signature'];
        $status_1           = $res['status'];
        $section_1           = $res['section'];
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='student.php';</script>";
    exit;
}

// Update Student
if (isset($_POST['submit'])) {
    $name        = $_POST['full_name'];
    $father_name_1      = $_POST['father_name'];
    $mother_name_1      = $_POST['mother_name'];
    $dob_1              = $_POST['dob'];
    $gender_1          = $_POST['gender'];
    $blood_group_1      = $_POST['blood_group'];
    $category_1         = $_POST['category'];
    $aadhar_no_1       = $_POST['aadhar_no'];
    $mobile_no_1        = $_POST['mobile_no'];
    $parent_mobile_no_1 = $_POST['parent_mobile_no'];
    $email_1            = $_POST['email'];
    $permanent_address_1 = $_POST['permanent_address'];
    $current_address_1  = $_POST['current_address'];
    $department_1       = $_POST['department'];
    $branch_1           = $_POST['branch'];
    $program_1          = $_POST['program'];

    // File Uploads (only if new file uploaded)
    if (!empty($_FILES['caste_certificate']['name'])) {
        $caste_certificate_1 = $_FILES['caste_certificate']['name'];
        move_uploaded_file($_FILES['caste_certificate']['tmp_name'], "uploads/$caste_certificate_1");
    }
    if (!empty($_FILES['photo']['name'])) {
        $photo_1 = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/$photo_1");
    }
    if (!empty($_FILES['signature']['name'])) {
        $signature_1 = $_FILES['signature']['name'];
        move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/$signature_1");
    }
    if (!empty($_FILES['doc_10th_doc_12th']['name'])) {
        $doc_10th_doc_12th_1 = $_FILES['doc_10th_doc_12th']['name'];
        move_uploaded_file($_FILES['doc_10th_doc_12th']['tmp_name'], "uploads/$doc_10th_doc_12th_1");
    }

    // Update query
    $query = "UPDATE students SET 
                full_name='$name',
                father_name='$father_name_1',
                mother_name='$mother_name_1',
                dob='$dob_1',
                gender='$gender_1',
                blood_group='$blood_group_1',
                category='$category_1',
                caste_certificate='$caste_certificate_1',
                aadhar_no='$aadhar_no_1',
                photo='$photo_1',
                mobile_no='$mobile_no_1',
                parent_mobile_no='$parent_mobile_no_1',
                email='$email_1',
                permanent_address='$permanent_address_1',
                current_address='$current_address_1',
                department='$department_1',
                branch='$branch_1',
                program='$program_1',
                doc_10th_doc_12th='$doc_10th_doc_12th_1',
                signature='$signature_1'
              WHERE student_id='$id'";

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
          <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label>Father Name</label>
          <input type="text" name="father_name_1" value="<?php echo $father_name_1; ?>">
        </div>
        <div class="form-group">
          <label>Mother Name</label>
          <input type="text" name="mother_name_1" value="<?php echo $mother_name_1; ?>">
        </div>
        <div class="form-group">
          <label>D.O.B</label>
          <input type="date" name="dob_1" value="<?php echo $dob_1; ?>">
        </div>

        <div class="form-group">
          <label>Gender</label>
          <select name="gender_1">
            <option value="">-- Select Gender --</option>
            <option value="Male" <?php if($gender_1=="Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender_1=="Female") echo "selected"; ?>>Female</option>
            <option value="Other" <?php if($gender_1=="Other") echo "selected"; ?>>Other</option>
          </select>
        </div>

        <div class="form-group">
          <label>Blood Group</label>
          <select name="blood_group_1">
            <option value="">-- Select Blood Group --</option>
            <option value="A+" <?php if($blood_group_1=="A+") echo "selected"; ?>>A+</option>
            <option value="A-" <?php if($blood_group_1=="A-") echo "selected"; ?>>A-</option>
            <option value="B+" <?php if($blood_group_1=="B+") echo "selected"; ?>>B+</option>
            <option value="B-" <?php if($blood_group_1=="B-") echo "selected"; ?>>B-</option>
            <option value="AB+" <?php if($blood_group_1=="AB+") echo "selected"; ?>>AB+</option>
            <option value="AB-" <?php if($blood_group_1=="AB-") echo "selected"; ?>>AB-</option>
            <option value="O+" <?php if($blood_group_1=="O+") echo "selected"; ?>>O+</option>
            <option value="O-" <?php if($blood_group_1=="O-") echo "selected"; ?>>O-</option>
          </select>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select name="category_1">
            <option value="">-- Select Category --</option>
            <option value="GEN" <?php if($category_1=="GEN") echo "selected"; ?>>GEN</option>
            <option value="OBC" <?php if($category_1=="OBC") echo "selected"; ?>>OBC</option>
            <option value="SC" <?php if($category_1=="SC") echo "selected"; ?>>SC</option>
            <option value="ST" <?php if($category_1=="ST") echo "selected"; ?>>ST</option>
            <option value="EWS" <?php if($category_1=="EWS") echo "selected"; ?>>EWS</option>
            <option value="Others" <?php if($category_1=="Others") echo "selected"; ?>>Others</option>
          </select>
        </div>

   <div class="form-group">
          <label for="ac_cer">Caste Certificate</label>
          <input type="file" id="ac_cer" value="caste_certificate_1" name="caste_certificate_1">
        </div>
          <div class="form-group">
          <label for="name">Aadhar No.</label>
          <input type="text" id="name" name="aadhar_no_1"   value="<?php echo $aadhar_no_1; ?>"placeholder="Enter aadhar no">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Photo</label>
          <input type="file" id="ac_cer"  value="<?php echo $photo_1; ?>" name="photo_1">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Signature</label>
          <input type="file" id="ac_cer"   value="<?php echo $signature_1; ?>" name="signature_1">
        </div>
       <div class="form-group">
          <label for="name">Mobile No.</label>
          <input type="text" id="name" name="mobile_no_1"  value="<?php echo $mobile_no_1; ?>" placeholder="Enter mobile no">
        </div>
         <div class="form-group">
          <label for="name">Parent Phone No.</label>
          <input type="text" id="name" name="parent_mobile_no_1"  value="<?php echo $parent_mobile_no_1; ?>" placeholder="Enter parent phone no">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email"  value="<?php echo $email_1; ?>" placeholder="Enter email" required>
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
  <label for="bch">Branch</label>
  <select name="branch_1">
    <option value="">--select-branch--</option>
    <?php 
    $current_branch = $branch_1 ?? ''; // Replace with actual current value
    $result = pg_query($conn, "SELECT * FROM branch");
    while($row = pg_fetch_array($result)){ 
        $selected = ($row['branch'] == $current_branch) ? 'selected' : '';
    ?>
      <option value="<?php echo $row['branch']; ?>" <?php echo $selected; ?>>
        <?php echo $row['branch']; ?>
      </option>
    <?php } ?>
  </select>
</div>

        <div class="form-group">
  <label for="pg">Program</label>
  <select name="program_1">
    <option value="">--select-program--</option>
    <?php 
    $current_program= $program_1 ?? ''; // Replace with actual current value
    $result = pg_query($conn, "SELECT * FROM program");
    while($row = pg_fetch_array($result)){ 
        $selected = ($row['program'] == $current_program) ? 'selected' : '';
    ?>
      <option value="<?php echo $row['program']; ?>" <?php echo $selected; ?>>
        <?php echo $row['program']; ?>
      </option>
    <?php } ?>
  </select>
</div>
        <div class="form-group">
          <label for="ac_cer">Doc 10th/12th class</label>
          <input type="file" id="ac_cer" value="<?php echo $doc_10th_doc_12th; ?>"name="doc_10th_doc_12th_1">
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
