<?php
include('db.php');

// Get student ID
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = '$id'";
    $result = pg_query($conn, $query);
    if ($res = pg_fetch_assoc($result)) {
        // Prefill variables
        $full_name_1          = $res['full_name'];
        $father_name_1        = $res['father_name'];
        $mother_name_1        = $res['mother_name'];
        $dob_1                = $res['dob'];
        $gender_1             = $res['gender'];
        $blood_group_1        = $res['blood_group'];
        $category_1           = $res['category'];
        $caste_certificate_1  = $res['caste_certificate'];
        $aadhar_no_1          = $res['aadhar_no'];
        $photo_1              = $res['photo'];
        $mobile_no_1          = $res['mobile_no'];
        $parent_mobile_no_1   = $res['parent_mobile_no'];
        $email_1              = $res['email'];
        $permanent_address_1  = $res['permanent_address'];
        $current_address_1    = $res['current_address'];
        $department_1         = $res['department'];
        $branch_1             = $res['branch'];
        $program_1            = $res['program'];
        $doc_10th_doc_12th_1  = $res['doc_10th_doc_12th'];
        $signature_1          = $res['signature'];
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='student.php';</script>";
    exit;
}

// Update Student
if (isset($_POST['submit'])) {
    $full_name_1        = $_POST['full_name'];
    $father_name_1      = $_POST['father_name'];
    $mother_name_1      = $_POST['mother_name'];
    $dob_1              = $_POST['dob'];
    $gender_1           = $_POST['gender'];
    $blood_group_1      = $_POST['blood_group'];
    $category_1         = $_POST['category'];
    $aadhar_no_1        = $_POST['aadhar_no'];
    $mobile_no_1        = $_POST['mobile_no'];
    $parent_mobile_no_1 = $_POST['parent_mobile_no'];
    $email_1            = $_POST['email'];
    $permanent_address_1= $_POST['permanent_address'];
    $current_address_1  = $_POST['current_address'];
    $department_1       = $_POST['department'];
    $branch_1           = $_POST['branch'];
    $program_1          = $_POST['program'];

    // File uploads
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

    // Update Query
    $query = "UPDATE students SET 
                full_name='$full_name_1',
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


<body>

<?php include('navbar.php'); ?>

<main class="container py-3">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 text-primary fw-bold m-0">Edit Student</h1>
    <a href="student.php" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
  </header>

  <!-- Edit Form -->
  <div class="card shadow-sm mb-4">
    <h5 class="mb-3">Update Student</h5>
    <form method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="full_name" value="<?php echo $full_name_1; ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Father Name</label>
          <input type="text" name="father_name" value="<?php echo $father_name_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Mother Name</label>
          <input type="text" name="mother_name" value="<?php echo $mother_name_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">D.O.B</label>
          <input type="date" name="dob" value="<?php echo $dob_1; ?>" class="form-control">
        </div>
        <div class="col-md-4">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-select">
            <option value="">--</option>
            <option value="Male" <?php if($gender_1=="Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($gender_1=="Female") echo "selected"; ?>>Female</option>
            <option value="Other" <?php if($gender_1=="Other") echo "selected"; ?>>Other</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Blood Group</label>
          <select name="blood_group" class="form-select">
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
          <input type="text" name="aadhar_no" value="<?php echo $aadhar_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Mobile</label>
          <input type="text" name="mobile_no" value="<?php echo $mobile_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Parent Mobile</label>
          <input type="text" name="parent_mobile_no" value="<?php echo $parent_mobile_no_1; ?>" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="<?php echo $email_1; ?>" class="form-control">
        </div>
        <div class="col-12">
          <label class="form-label">Permanent Address</label>
          <textarea name="permanent_address" rows="2" class="form-control"><?php echo $permanent_address_1; ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Current Address</label>
          <textarea name="current_address" rows="2" class="form-control"><?php echo $current_address_1; ?></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Photo</label>
          <input type="file" name="photo" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label">Signature</label>
          <input type="file" name="signature" class="form-control">
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </div>
    </form>
  </div>


</main>
</body>