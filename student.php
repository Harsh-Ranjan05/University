<?php
include('db.php');

if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $father_name_1 = $_POST['father_name'];
    $mother_name_1 = $_POST['mother_name'];
    $dob_1= $_POST['dob'];
    $gender_1 = $_POST['gender'];
    $blood_group_1 = $_POST['blood_group'];
    $category_1= $_POST['category'];

    // Upload caste certificate
    $originalcaste_1 = $_FILES['caste_certificate']['name'];
    $tempcaste_1 = $_FILES['caste_certificate']['tmp_name'];
    move_uploaded_file($tempcaste_1, "pdf/$originalcaste_1");

    $aadhar_no_1 = $_POST['aadhar_no'];

    // Upload photo
    $originalphoto_1 = $_FILES['photo']['name'];
    $tempphoto_1= $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempphoto_1, "doc/$originalphoto_1");

    $mobile_no_1 = $_POST['mobile_no'];
    $parent_mobile_no_1 = $_POST['parent_mobile_no'];
    $email_1 = $_POST['email'];
    $permanent_address_1  = $_POST['permanent_address'];
    $current_address_1  = $_POST['current_address'];
    $department_1 = $_POST['department'];
    $branch_1 = $_POST['branch'];
    $program_1 = $_POST['program'];
  

    // Upload 10th & 12th certificates
    $originaldoc_10th_doc_12th_1 = $_FILES['doc_10th_doc_12th']['name'];
    $tempdoc_10th_doc_12th_1 = $_FILES['doc_10th_doc_12th']['tmp_name'];
    move_uploaded_file($tempdoc_10th_doc_12th_1, "pdf/$originaldoc_10th_doc_12th_1");

    // Upload signature
    $originalsignature_1 = $_FILES['signature']['name'];
    $tempsignature_1 = $_FILES['signature']['tmp_name'];
    move_uploaded_file($tempsignature_1, "doc/$originalsignature_1");

    // Insert Query
    $query = "INSERT INTO students (
                full_name, father_name, mother_name, dob, gender, blood_group, category,
                caste_certificate, aadhar_no, photo, mobile_no, parent_mobile_no, email,
                permanent_address, current_address, department, branch, program, doc_10th_doc_12th, signature
              ) 
              VALUES (
                '$name', '$father_name_1', '$mother_name_1', '$dob_1', '$gender_1', '$blood_group_1', '$category_1',
                '$originalcaste_1', '$aadhar_no_1', '$originalphoto_1', '$mobile_no_1', '$parent_mobile_no_1', '$email_1',
                '$permanent_address_1', '$current_address_1', '$department_1', '$branch_1', '$program_1', '$originaldoc_10th_doc_12th_1', '$originalsignature_1'
              )";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Student Registered Successfully..'); window.location='student.php';</script>";
    } else {
        echo "<script>alert('Failed To Register..'); window.location='student.php';</script>";
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
      <h2>Add Student</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="name">Father Name</label>
          <input type="text" id="name" name="father_name_1" placeholder="Enter father name">
        </div>
        <div class="form-group">
          <label for="name">Mother Name</label>
          <input type="text" id="name" name="mother_name_1" placeholder="Enter mother name">
        </div>
        <div class="form-group">
          <label for="name">D.O.B</label>
          <input type="date" id="name" name="dob_1">
        </div>
         <div class="form-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender_1" required>
            <option value="">-- Select Gender --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
         <div class="form-group">

          <label for="blood_group">Blood Group</label>

          <select id="blood_group" name="blood_group_1">
             <option value="">-- Select Blood Group --</option>
           <option value="A+">A+</option>
             <option value="A-">A-</option>
             <option value="B+">B+</option>
             <option value="B-">B-</option>
               <option value="AB+">AB+</option>
               <option value="AB-">AB-</option>
               <option value="O+">O+</option>
               <option value="O-">O-</option>
          </select>
       </div>
       <div class="form-group">
  <label for="category">Caste Category</label>
  <select id="category" name="category_1">
    <option value="">-- Select Caste Category --</option>
    <option value="GEN">General (GEN)</option>
    <option value="OBC">Other Backward Classes (OBC - Non-Creamy Layer)</option>
    <option value="OBC-CL">Other Backward Classes (OBC - Creamy Layer)</option>
    <option value="SC">Scheduled Caste (SC)</option>
    <option value="ST">Scheduled Tribe (ST)</option>
    <option value="EWS">Economically Weaker Section (EWS)</option>
    <option value="Others">Others</option>
  </select>
</div>
   <div class="form-group">
          <label for="ac_cer">Caste Certificate</label>
          <input type="file" id="ac_cer" name="caste_certificate_1">
        </div>
          <div class="form-group">
          <label for="name">Aadhar No.</label>
          <input type="text" id="name" name="aadhar_no" placeholder="Enter aadhar no">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Photo</label>
          <input type="file" id="ac_cer" name="photo_1">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Signature</label>
          <input type="file" id="ac_cer" name="signature_1">
        </div>
       <div class="form-group">
          <label for="name">Mobile No.</label>
          <input type="text" id="name" name="mobile_no_1" placeholder="Enter mobile no">
        </div>
         <div class="form-group">
          <label for="name">Parent Phone No.</label>
          <input type="text" id="name" name="parent_mobile_no_1" placeholder="Enter parent phone no">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email_1" placeholder="Enter email" required>
        </div>
         <div class="form-group">
          <label for="permanent_address">Permanent Address</label>
          <textarea id="permanent_address" name="permanent_address_1" placeholder="Enter permanent address" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="current_address">Current Address</label>
          <textarea id="current_address" name="current_address_1" placeholder="Enter current address" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="dept">Department</label>
          <select name="department_1" required>
                  <option value="">--select-department--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM department");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['department']; ?>"><?php echo $f['department']; ?></option>
                  <?php } ?>
                </select>
        </div>
        <div class="form-group">
          <label for="brch">Branch</label>
           <select name="branch_1" required>
                  <option value="">--select-branch--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM branch");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['branch']; ?>"><?php echo $f['branch']; ?></option>
                  <?php } ?>
                </select>
        </div>
        <div class="form-group">
          <label for="brch">Program</label>
           <select name="program_1" required>
                  <option value="">--select-program--</option>
                  <?php 
                  $result = pg_query($conn, "SELECT * FROM program");
                  while($f = pg_fetch_array($result)){ ?>
                    <option value="<?php echo $f['program']; ?>"><?php echo $f['program']; ?></option>
                  <?php } ?>
                </select>
        </div>
        <div class="form-group">
          <label for="ac_cer">Doc 10th/12th class</label>
          <input type="file" id="ac_cer" name="doc_10th_doc_12th_1">
        </div>
        <button type="submit" name="submit" class="btn">Add +</button>
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
            <th>Details</th>
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
