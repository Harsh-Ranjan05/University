<?php
include('db.php');

// Get student ID from URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM students WHERE student_id = '$student_id'";
    $result = pg_query($conn, $query);

    if ($res = pg_fetch_assoc($result)) {
        $full_name          = $res['full_name'];
        $father_name        = $res['father_name'];
        $mother_name        = $res['mother_name'];
        $dob                = $res['dob'];
        $gender             = $res['gender'];
        $blood_group        = $res['blood_group'];
        $category           = $res['category']; 
        $caste_certificate  = $res['caste_certificate'];
        $aadhar_no          = $res['aadhar_no']; 
        $photo              = $res['photo'];
        $mobile_no          = $res['mobile_no'];
        $parent_mobile_no   = $res['parent_mobile_no'];
        $email              = $res['email'];
        $permanent_address  = $res['permanent_address'];
        $current_address    = $res['current_address'];
        $department         = $res['department'];
        $branch             = $res['branch'];
        $program            = $res['program']; 
        $doc_10th_doc_12th  = $res['doc_10th_doc_12th'];
        $signature          = $res['signature'];
        $status             = $res['status'];
        $section            = $res['section'];
    } else {
        echo "<script>alert('Student not found'); window.location='students.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid Request'); window.location='students.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Student Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }

    .content { display:flex; padding:10px; gap:5px; flex:1; }
    .profile-wrapper {
      display:flex; justify-content:center; align-items:center;
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
    .btn-2{background:red;}
    @keyframes fadeIn {
      from { opacity:0; transform:translateY(10px);}
      to { opacity:1; transform:translateY(0);}
    }
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
    <div class="profile-wrapper">
      <div class="profile-card">
        <div class="profile-header">
          <?php if(!empty($photo)){ ?>
            <img src="doc/<?php echo $photo; ?>" class="profile-img" alt="Student Photo">
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
          <p><strong>Section:</strong> <?php echo $section; ?></p>
          <p><strong>Program:</strong> <?php echo $program; ?></p>
        </div>

        <div class="profile-footer">
          <?php if ($status == 1) { ?>
              <a href="status.php?table=students&student_id=<?php echo $student_id; ?>" class="btn btn-1">Active</a>
          <?php } else { ?>
              <a href="status.php?table=students&student_id=<?php echo $student_id; ?>" class="btn btn-2">Deactive</a>
          <?php } ?>

          <?php if(!empty($caste_certificate)){ ?>
            <a href="pdf/<?php echo $caste_certificate; ?>" download class="btn">Download Caste Certificate</a>
          <?php } ?>
          <?php if(!empty($doc_10th_doc_12th)){ ?>
            <a href="pdf/<?php echo $doc_10th_doc_12th; ?>" download class="btn">Download 10th/12th Docs</a>
          <?php } ?>
          
          <a href="edit_student.php?student_id=<?php echo $student_id; ?>" class="btn">Edit</a>
        </div>
      </div>
    </div>
  </section>
</main>
</body>
</html>
