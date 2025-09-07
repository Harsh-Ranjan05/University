<?php 
session_start();
$photo  = $_SESSION['photo'];
$designation = $_SESSION['designation'];
$pan_no = $_SESSION['pan_no'];
$joining_date = $_SESSION['joining_date'];
$qualification = $_SESSION['qualification'];
$bank_details = $_SESSION['bank_details'];
$father_name = $_SESSION['father_name'];
$mother_name = $_SESSION['mother_name'];
$email = $_SESSION['email'];
$mobile_no = $_SESSION['mobile_no'];
$parent_mobile_no = $_SESSION['parent_mobile_no'];
$dob = $_SESSION['dob'];
$gender = $_SESSION['gender'];
$blood_group = $_SESSION['blood_group'];
$aadhar_no = $_SESSION['aadhar_no'];
$category = $_SESSION['category'];
$permanent_address = $_SESSION['permanent_address'];
$current_address = $_SESSION['current_address'];
$status = $_SESSION['status'];
$student_id = $_SESSION['student_id'];
$role_type = $_SESSION['role_type'];
$employee_id = $_SESSION['employee_id'];
$full_name = $_SESSION['full_name'];
$department = $_SESSION['department'];
$branch = $_SESSION['branch'];
$batch = $_SESSION['batch'];
$class_code = $_SESSION['class_code'];
$semester = $_SESSION['semester'];
$section = $_SESSION['section'];
$program = $_SESSION['program'];
$parent_id = $_SESSION['parent_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- ✅ Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      display: flex;
      min-height: 100vh;
    }
    .sidebar {
      width: 18vw;
      min-width: 230px;
      max-width: 300px;
      background:#1e1e2f;
      color: #fff;
      display: flex;
      flex-direction: column;
      padding:20px 10px;
      height: auto;
      position: sticky;
      top: 0;
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 22px;
    }
    .sidebar nav a,
    .sidebar nav label {
      display:block;
      padding:12px 15px;
      margin:6px 0;
      color:#bbb;
      text-decoration:none;
      border-radius:6px;
      transition:0.3s;
      cursor: pointer;
    }
    .sidebar nav a:hover,
    .sidebar nav a.active,
    .sidebar nav label:hover {
      background:#2e2e42;
      color:#fff;
    }
    .dropdown input { display:none; }
    .dropdown ul {
      list-style:none;
      padding-left:15px;
      max-height:0;
      overflow:hidden;
      transition: max-height 0.3s ease;
    }
    .dropdown input:checked ~ ul { max-height:600px; }
    .dropdown ul a {
      padding:10px 15px;
      font-size:14px;
      color:#aaa;
      display:block;
      margin:4px 0;
    }
    .dropdown ul a:hover {
      color:#fff;
      background:#35354d;
    }
    .main-content { flex:1; display: flex; flex-direction: column; }
    .topbar {
      background: white;
      padding: 15px 20px;
      display:flex;
      justify-content: space-between;
      align-items:center;
      border-bottom:1px solid #ddd;
    }
    .topbar h1 { font-size:20px; }
  </style>
</head>
<body>
  <aside class="sidebar">
    <h2><i class="fa-solid fa-graduation-cap"></i> UniCRM</h2>
    <nav>
      <a href="dashboard.php" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>
      
      <?php if($role_type=='admin'){?>
      <div class="dropdown">
        <input type="checkbox" id="sut">
        <label for="sut"><i class="fa-solid fa-user-graduate"></i> Student & Teacher ▾</label>
        <ul>
          <li><a href="student.php"><i class="fa-solid fa-user-graduate"></i> Students</a></li>
          <li><a href="faculty.php"><i class="fa-solid fa-chalkboard-user"></i> Faculty</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="structure">
        <label for="structure"><i class="fa-solid fa-university"></i> Structure ▾</label>
        <ul>
          <li><a href="branch.php"><i class="fa-solid fa-code-branch"></i> Branch</a></li>
          <li><a href="departments.php"><i class="fa-solid fa-building"></i> Department</a></li>
          <li><a href="designation.php"><i class="fa-solid fa-user-shield"></i> Designation</a></li>
          <li><a href="program.php"><i class="fa-solid fa-chalkboard-user"></i> Program</a></li>
          <li><a href="batch.php"><i class="fa-solid fa-calendar-days"></i> Batch</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="course">
        <label for="course"><i class="fa-solid fa-book-open"></i> Courses ▾</label>
        <ul>
          <li><a href="class.php"><i class="fa-solid fa-chalkboard"></i> Class Room</a></li>
          <li><a href="subject.php"><i class="fa-solid fa-scroll"></i> Subject</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="exam">
        <label for="exam"><i class="fa-solid fa-award"></i> Examination ▾</label>
        <ul>
          <li><a href="enroll_student.php"><i class="fa-solid fa-file-pen"></i> Exam</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="notice_admin">
        <label for="notice_admin"><i class="fa-solid fa-bullhorn"></i> Notice Box ▾</label>
        <ul>
          <li><a href="notice.php"><i class="fa-solid fa-bullhorn"></i> Notice</a></li>
        </ul>
      </div>
       <div class="dropdown">
        <input type="checkbox" id="up">
        <label for="up">  <i class="fas fa-question-circle"></i> Query Ask ▾</label>
        <ul>
              <li><a href="query.php"> <i class="fas fa-hand-paper"></i> Ask Question List</a></li>
        </ul>
      </div>
    <div class="dropdown">
        <input type="checkbox" id="se">
        <label for="se"><i class="fa-solid fa-gear"></i> Settings ▾</label>
        <ul>
              <li><a href="log_out.php"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
      </div>
      <?php } elseif($role_type=='faculty'){?>
        <div class="dropdown">
        <input type="checkbox" id="pr">
        <label for="pr"><i class="fa-solid fa-circle-user"></i> Profile ▾</label>
        <ul>
            <li><a href="profile.php"><i class="fa-solid fa-user-graduate"></i> View</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <input type="checkbox" id="attendance_fac">
        <label for="attendance_fac"><i class="fa-solid fa-clipboard-list"></i> Attendance ▾</label>
        <ul>
          <li><a href="mark_attendance.php"><i class="fa-solid fa-check"></i> Mark Attendance</a></li>
          <li><a href="attendance_list.php"><i class="fa-solid fa-list"></i> Attendance List</a></li>
        </ul>
      </div>

     

      <div class="dropdown">
        <input type="checkbox" id="feedback_fac">
        <label for="feedback_fac"><i class="fa-solid fa-comment"></i> Feedback ▾</label>
        <ul>
          <li><a href="student_list.php"><i class="fa-solid fa-plus"></i> Add Feedback</a></li>
        </ul>
      </div>

       <div class="dropdown">
        <input type="checkbox" id="up">
        <label for="up"><i class="fa-solid fa-gear"></i> Settings ▾</label>
        <ul>
            <li><a href="pa_update_password.php"><i class="fa-solid fa-lock"></i> Change Password</a></li>
              <li><a href="log_out.php"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
      </div>

      <?php } elseif($role_type=='student'){ ?>
        <div class="dropdown">
        <input type="checkbox" id="pr">
        <label for="pr"><i class="fa-solid fa-circle-user"></i> Profile ▾</label>
        <ul>
            <li><a href="profile.php"><i class="fa-solid fa-user-graduate"></i> View</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <input type="checkbox" id="exam">
        <label for="exam"><i class="fa-solid fa-award"></i> Academic▾</label>
        <ul>
            <li><a href="view_attendance.php"><i class="fa-solid fa-calendar-check"></i> Attendance</a></li>
            <li><a href="view_table.php"><i class="fa-solid fa-table"></i> Time Table</a></li>
          <li><a href="self_result.php"><i class="fa-solid fa-file-lines"></i> Result</a></li>
        </ul>
      </div>
      

     

      <div class="dropdown">
        <input type="checkbox" id="feedback_stu">
        <label for="feedback_stu"><i class="fa-solid fa-comment"></i> Feedback ▾</label>
        <ul>
          <li><a href="faculty_list.php"><i class="fa-solid fa-plus"></i> Add Feedback</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="up">
        <label for="up"><i class="fa-solid fa-gear"></i> Settings ▾</label>
        <ul>
            <li><a href="pa_update_password.php"><i class="fa-solid fa-lock"></i> Change Password</a></li>
              <li><a href="log_out.php"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
      </div>
      </div>
      <?php } elseif($role_type=='parent'){?> 
      <div class="dropdown">
        <input type="checkbox" id="exam">
        <label for="exam"><i class="fa-solid fa-award"></i> Academic▾</label>
        <ul>
            <li><a href="view_attendance.php"><i class="fa-solid fa-calendar-check"></i> Attendance</a></li>
          <li><a href="self_result.php"><i class="fa-solid fa-file-lines"></i> Result</a></li>
        </ul>
      </div>
      

     

      <div class="dropdown">
        <input type="checkbox" id="feedback_stu">
        <label for="feedback_stu"><i class="fa-solid fa-comment"></i> Feedback ▾</label>
        <ul>
          <li><a href="feedback.php"> View Feedback</a></li>
        </ul>
      </div>

       <div class="dropdown">
        <input type="checkbox" id="up">
        <label for="up"><i class="fa-solid fa-gear"></i> Settings ▾</label>
        <ul>
            <li><a href="pa_update_password.php"><i class="fa-solid fa-lock"></i> Change Password</a></li>
              <li><a href="log_out.php"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
      </div>
        <?php }?>
    </nav>
  </aside>
</body>
</html>
