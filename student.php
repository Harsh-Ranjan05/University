<?php
include('db.php');

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $category = $_POST['category'];

    // Upload caste certificate
    $originalcaste = $_FILES['caste_certificate']['name'];
    $tempcaste = $_FILES['caste_certificate']['tmp_name'];
    move_uploaded_file($tempcaste, "pdf/$originalcaste");

    $aadhar_no = $_POST['aadhar_no'];

    // Upload photo
    $originalphoto = $_FILES['photo']['name'];
    $tempphoto = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempphoto, "doc/$originalphoto");

    $mobile_no = $_POST['mobile_no'];
    $parent_mobile_no = $_POST['parent_mobile_no'];
    $email = $_POST['email'];
    $permanent_address  = $_POST['permanent_address'];
    $current_address  = $_POST['current_address'];
    $department = $_POST['department'];
    $branch = $_POST['branch'];
    $program = $_POST['program'];
  

    // Upload 10th & 12th certificates
    $originaldoc_10th_doc_12th = $_FILES['doc_10th_doc_12th']['name'];
    $tempdoc_10th_doc_12th = $_FILES['doc_10th_doc_12th']['tmp_name'];
    move_uploaded_file($tempdoc_10th_doc_12th, "pdf/$originaldoc_10th_doc_12th");

    // Upload signature
    $originalsignature = $_FILES['signature']['name'];
    $tempsignature = $_FILES['signature']['tmp_name'];
    move_uploaded_file($tempsignature, "doc/$originalsignature");

    // Insert Query
    $query = "INSERT INTO students (
                full_name, father_name, mother_name, dob, gender, blood_group, category,
                caste_certificate, aadhar_no, photo, mobile_no, parent_mobile_no, email,
                permanent_address, current_address, department, branch, program, doc_10th_doc_12th, signature
              ) 
              VALUES (
                '$full_name', '$father_name', '$mother_name', '$dob', '$gender', '$blood_group', '$category',
                '$originalcaste', '$aadhar_no', '$originalphoto', '$mobile_no', '$parent_mobile_no', '$email',
                '$permanent_address', '$current_address', '$department', '$branch', '$program', '$originaldoc_10th_doc_12th', '$originalsignature'
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
          <input type="text" id="name" name="full_name" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label for="name">Father Name</label>
          <input type="text" id="name" name="father_name" placeholder="Enter father name">
        </div>
        <div class="form-group">
          <label for="name">Mother Name</label>
          <input type="text" id="name" name="mother_name" placeholder="Enter mother name">
        </div>
        <div class="form-group">
          <label for="name">D.O.B</label>
          <input type="date" id="name" name="dob">
        </div>
         <div class="form-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
         <div class="form-group">

          <label for="blood_group">Blood Group</label>

          <select id="blood_group" name="blood_group">
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
  <select id="category" name="category">
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
          <input type="file" id="ac_cer" name="caste_certificate">
        </div>
          <div class="form-group">
          <label for="name">Aadhar No.</label>
          <input type="text" id="name" name="aadhar_no" placeholder="Enter aadhar no">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Photo</label>
          <input type="file" id="ac_cer" name="photo">
        </div>
        <div class="form-group">
          <label for="ac_cer">Upload Signature</label>
          <input type="file" id="ac_cer" name="signature">
        </div>
       <div class="form-group">
          <label for="name">Mobile No.</label>
          <input type="text" id="name" name="mobile_no" placeholder="Enter mobile no">
        </div>
         <div class="form-group">
          <label for="name">Parent Phone No.</label>
          <input type="text" id="name" name="parent_mobile_no" placeholder="Enter parent phone no">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter email" required>
        </div>
         <div class="form-group">
          <label for="permanent_address">Permanent Address</label>
          <textarea id="permanent_address" name="permanent_address" placeholder="Enter permanent address" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="current_address">Current Address</label>
          <textarea id="current_address" name="current_address" placeholder="Enter current address" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="dept">Department</label>
          <select id="dept" name="department" required>
            <option value="">Select Department</option>
            <option value="Electronics">Electronics</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Civil">Civil</option>
          </select>
        </div>
        <div class="form-group">
          <label for="branch">Branch</label>
          <select id="branch" name="branch" required>
            <option value="">Select Branch</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="ME">ME</option>
          </select>
        </div>
        <div class="form-group">
          <label for="program">Program</label>
          <select id="program" name="program" required>
            <option value="">Select Program</option>
            <option value="DIP-CSE">DIP-CSE</option>
            <option value="DIP-CIVIL">DIP-CIVIL</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ac_cer">Doc 10th/12th class</label>
          <input type="file" id="ac_cer" name="doc_10th_doc_12th">
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
