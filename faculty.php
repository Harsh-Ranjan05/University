<?php
include('db.php');

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $aadhar_no = $_POST['aadhar_no'];
    $pan_no = $_POST['pan_no'];

    // Photo Upload
    $originalphoto = $_FILES['photo']['name'];
    $tempphoto = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempphoto, "doc/$originalphoto");

    // Signature Upload
    $originalsignature = $_FILES['signature']['name'];
    $tempsignature = $_FILES['signature']['tmp_name'];
    move_uploaded_file($tempsignature, "doc/$originalsignature");

    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $permanent_address  = $_POST['permanent_address']; // ✅ removed space
    $current_address  = $_POST['current_address'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];

    // Certificate Upload
    $originalcertificate = $_FILES['certificate']['name'];
    $tempcertificate = $_FILES['certificate']['tmp_name'];
    move_uploaded_file($tempcertificate, "pdf/$originalcertificate");

    // Appointment Letter Upload
    $originalappointment_letter = $_FILES['appointment_letter']['name'];
    $tempappointment_letter = $_FILES['appointment_letter']['tmp_name'];
    move_uploaded_file($tempappointment_letter, "pdf/$originalappointment_letter");

    // Resume Upload
    $originalresume = $_FILES['resume']['name'];
    $tempresume = $_FILES['resume']['tmp_name'];
    move_uploaded_file($tempresume, "pdf/$originalresume");

    // Experience Certificate Upload ✅ fixed mismatch
    $originalexperience_certificates = $_FILES['experience_certificate']['name'];
    $tempexperience_certificates = $_FILES['experience_certificate']['tmp_name'];
    move_uploaded_file($tempexperience_certificates, "pdf/$originalexperience_certificates");

    $bank_details = $_POST['bank_details'];

    // ✅ Correct INSERT Query
    $query = "INSERT INTO faculty(
                full_name, father_name, mother_name, dob, gender, blood_group, 
                aadhar_no, pan_no, photo, signature, mobile_no, email, 
                permanent_address, current_address, department, designation, qualification, 
                certificate, appointment_letter, resume, experience_certificates, bank_details
              ) VALUES (
                '$full_name', '$father_name', '$mother_name', '$dob', '$gender', '$blood_group',
                '$aadhar_no', '$pan_no', '$originalphoto', '$originalsignature', '$mobile_no', '$email',
                '$permanent_address', '$current_address', '$department', '$designation', '$qualification',
                '$originalcertificate', '$originalappointment_letter', '$originalresume', '$originalexperience_certificates', '$bank_details'
              )";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Faculty Registered Successfully..'); window.location='faculty.php';</script>";
    } else {
        echo "<script>alert('Failed To Register Faculty..'); window.location='faculty.php';</script>";
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
    <!-- Form -->
    <div class="form-container">
      <h2>Add Faculty</h2>
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
          <input type="date" id="name" name="dob"  required>
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
          <select id="blood_group" name="blood_group" required>
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
          <label for="aadhar">Aadhar No.</label>
          <input type="text" id="aadhar" name="aadhar_no" placeholder="Enter aadhar no. ">
        </div>
        <div class="form-group">
          <label for="pan">PAN No.</label>
          <input type="text" id="pan" name="pan_no" placeholder="Enter pan no. ">
        </div>
        <div class="form-group">
          <label for="photo">Upload Photo</label>
          <input type="file" id="photo" name="photo">
        </div>
        <div class="form-group">
          <label for="signature">Upload Signature</label>
          <input type="file" id="signature" name="signature">
        </div>

        <div class="form-group">
          <label for="phone_no">Phone No.</label>
          <input type="text" id="phone_no" name="mobile_no" placeholder="Enter phone no.">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter email">
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
            <option value="Management">Management</option>
          </select>
        </div>

        <div class="form-group">
          <label for="dec">Designation</label>
          <select id="dec" name="designation" >
            <option value="">Select Designation</option>
            <option value="Professor">Professor</option>
            <option value="Associate Professor">Associate Professor</option>
            <option value="Assistant Professor">Assistant Professor</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Admin">Admin</option>
            <option value="HR">HR</option>
          </select>
        </div>

        <div class="form-group">
          <label for="qualification">Select Qualification:</label>
          <select name="qualification" id="qualification">
            <optgroup label="Graduation (UG)">
              <option value="BA">BA - Bachelor of Arts</option>
              <option value="BSc">BSc - Bachelor of Science</option>
              <option value="BCom">BCom - Bachelor of Commerce</option>
              <option value="BTech">B.Tech - Bachelor of Technology</option>
              <option value="BE">BE - Bachelor of Engineering</option>
              <option value="BCA">BCA - Bachelor of Computer Applications</option>
            </optgroup>

            <optgroup label="Post-Graduation (PG)">
              <option value="MA">MA - Master of Arts</option>
              <option value="MSc">MSc - Master of Science</option>
              <option value="MCom">MCom - Master of Commerce</option>
              <option value="MTech">M.Tech - Master of Technology</option>
              <option value="ME">ME - Master of Engineering</option>
              <option value="MCA">MCA - Master of Computer Applications</option>
              <option value="MBA">MBA - Master of Business Administration</option>
            </optgroup>

            <optgroup label="Doctoral (PhD)">
              <option value="PhD">Ph.D. - Doctor of Philosophy</option>
              <option value="MPhil">M.Phil - Master of Philosophy</option>
            </optgroup>

            <optgroup label="Certifications / Eligibility">
              <option value="NET">UGC-NET Qualified</option>
              <option value="SET">SET Qualified</option>
              <option value="GATE">GATE Qualified</option>
              <option value="CSIR">CSIR-NET Qualified</option>
            </optgroup>
          </select>
        </div>

        <div class="form-group">
          <label for="certificate">Upload Certificate</label>
          <input type="file" id="certificate" name="certificate">
        </div>
        <div class="form-group">
          <label for="appointment_letter">Upload Appointment Letter</label>
          <input type="file" id="appointment_letter" name="appointment_letter">
        </div>
        <div class="form-group">
          <label for="resume">Upload Resume</label>
          <input type="file" id="resume" name="resume">
        </div>
        <div class="form-group">
          <label for="experience_certificate">Upload Experience Certificate</label>
          <input type="file" id="experience_certificate" name="experience_certificate">
        </div>
        <div class="form-group">
          <label for="bank_details">Enter Bank Name & A/C No:</label>
          <input type="text" id="bank_details" name="bank_details">
        </div>

        <button type="submit" name="submit" class="btn">Add +</button>
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
