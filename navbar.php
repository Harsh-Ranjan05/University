<?php 
session_start();
$photo  = $_SESSION['photo'];
$designation = $_SESSION['designation'];
$pan_no = $_SESSION['pan_no'];
$joining_date = $_SESSION['joining_date'];
$qualification = $_SESSION['qualification'];
$certificate = $_SESSION['certificate'];
$experience_certificate = $_SESSION['experience_certificate'];
$resume = $_SESSION['resume'];
$appointment_letter = $_SESSION['appointment_letter'];
$caste_certificate = $_SESSION['caste_certificate'];
$doc_10th_doc_12th = $_SESSION['doc_10th_doc_12th'];
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      display: flex;
      min-height: 100vh;
    }
     body { background:#f4f6f9; font-family: 'Segoe UI', sans-serif; }
       .card { padding:20px; }
    textarea { resize:none; }
    .main-content { padding:20px; }
    .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
    .card-custom { border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); background:#fff; margin-bottom:20px; padding:20px;}
    .table-container {  margin-top:20px; }
    .table th, .table td { vertical-align: middle; }
    .btn-assign { padding:6px 12px; background:#007bff; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px; }
    .btn-assign:hover { background:#0056b3; }
    .btn-success { background:green; border:none; }
    .btn-danger { background:red; border:none; }
     .card-custom_1 { border-radius:20px; box-shadow:0 2px 10px rgba(0,0,0,0.1); background:#fff; margin:auto; max-width:750px; }

    .profile-img { width:130px; height:130px; border-radius:50%; border:3px solid #007bff; object-fit:cover; }
    .profile-header { text-align:center; padding:20px; border-bottom:1px solid #eee; background:#f8f9fc; }
    .profile-header h3, .profile-header h2 { margin-top:10px; margin-bottom:5px; }
    .profile-header p { color:#555; font-size:14px; }

    .profile-body { padding:20px; }
    .profile-body p { margin:6px 0; font-size:14px; }

    .profile-footer { padding:15px; text-align:center; border-top:1px solid #eee; background:#fafafa; }
    .btn-status { min-width:120px; margin:3px; padding:8px 12px; border-radius:6px; display:inline-block; text-decoration:none; font-size:14px; transition:.3s; }
    .btn-status:hover { opacity:0.9; }
    .btn-info { background:#17a2b8; color:#fff; }

    @media(max-width:768px){
        .profile-body .row > div { margin-bottom:10px; }
        .profile-img { width:100px; height:100px; }
    }
    .modal-xl { max-width: 90% !important; }
     .btn-present { background:green; color:#fff; border:none; border-radius:6px; padding:6px 12px; }
    .btn-absent { background:red; color:#fff; border:none; border-radius:6px; padding:6px 12px; }
    .section-title { border-bottom:1px solid #ddd; padding-bottom:5px; margin-bottom:15px; font-weight:600; color:#007bff; }
    .section-title-1{ font-weight:600; color:black; margin-bottom:10px;font-size:medium; }
    .form-control, .form-select { border-radius: 6px; }
    .table td, .table th { vertical-align: middle; }
    .body_container { display:flex; justify-content:center;min-height:100vh; width: 100%;background:#f4f6f9; color:#333; }
#h2{
        text-align:center;
        margin-bottom:25px;
        font-size:26px;
        color:#333;
        margin:5px;
    }
    .timetable {
      display:grid;
      grid-template-columns: 80px repeat(8, 1fr); /* Day + 8 periods */
      gap:4px;
      background:#fff;
      padding:5px;
      border-radius:10px;
      box-shadow:0 4px 12px rgba(0,0,0,0.15);
      margin:10px;
    }
    .box {
      border:1px solid #ddd;
      padding:5px;
      text-align:center;
      background:#fafafa;
      border-radius:6px;
      font-size:14px;
      min-height:70px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }
    .header {
      font-weight:bold;
      background:#007bff;
      color:white;
      font-size:15px;
    }
    .day {
      font-weight:bold;
      background:#f8f9fc;
      color:#333;
    }
    .subject {
      font-size:14px;
      font-weight:bold;
      color:#222;
    }
    .room {
      font-size:12px;
      color:#555;
    }
    .faculty {
      font-size:11px;
      color:#888;
    }
       /* Cards */
    .cards_1 {
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
      gap:20px;
      padding:20px;
    }
    .card_1 {
      background:white;
      padding:20px;
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      text-align:center;
    }
    .card_1 h3 { font-size:24px; margin-bottom:8px; color:#333; }
    .card_1 p { font-size:23px; font-weight:bold; color:#007bff; }

    /* Notice Section */
    .notice-section_1 {
      margin:20px;
      background:#fff;
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      padding:20px;
    }
    .notice-section_1 h2 {
      font-size:20px;
      margin-bottom:10px;
      color:#007bff;
      border-bottom:2px solid #f1f1f1;
      padding-bottom:8px;
    }
    .notice-list_1 {
      list-style:none;
    }
    .notice-list_1 li {
      padding:10px;
      border-bottom:1px solid #eee;
      font-size:15px;
      color:#333;
    }
    .notice-list_1 li:last-child { border-bottom:none; }
    .notice-date_1 {
      font-size:13px;
      color:#888;
      margin-left:5px;
    }
    .notice-grid_1 {
       display: grid;
       grid-template-columns: 1fr 1fr; /* two equal halves */
       gap: 20px;
   }
  .notice-half_1 h2 {
       font-size: 18px;
       margin-bottom: 10px;
       color: #007bff;
       border-bottom: 2px solid #f1f1f1;
       padding-bottom: 6px;
  }
  #day_1{
       color:red;
      }
      .result-container_1 {
      background: #fff;
      max-width: 900px;
      margin: auto;
      padding: 30px;
      border: 2px solid #222;
      border-radius: 10px;
    }
    .header_1 {
      text-align: center;
      border-bottom: 2px solid #222;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .header_1 h1 {
      font-size: 28px;
      margin-bottom: 5px;
    }
    .header_1 h2 {
      font-size: 20px;
      font-weight: normal;
      color: #444;
    }
    .student-info_1 {
      margin-bottom: 20px;
    }
    .student-info_1 table {
      width: 100%;
      border-collapse: collapse;
    }
    .student-info_1 td {
      padding: 6px 8px;
      font-size: 15px;
    }
    .marks-table_1 {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .marks-table_1 th, .marks-table_1 td {
      border: 1px solid #444;
      padding: 8px;
      text-align: center;
    }
    .marks-table_1 th {
      background: #eaeaea;
    }
    .result-summary_1 {
      margin-top: 20px;
      font-size: 16px;
      display: flex;
      justify-content: space-between;
      font-weight: bold;
    }
    .footer_1 {
      text-align: right;
      margin-top: 40px;
    }
    .footer_1 p {
      margin-top: 60px;
      font-weight: bold;
    }
     img.notice-img { width:50px; height:50px; object-fit:cover; border-radius:6px; }
    .badge-status { padding:5px 10px; border-radius:6px; font-size:0.85rem; }
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
        <input type="checkbox" id="class_allot">
        <label for="class_allot"><i class="fas fa-unlock"></i> Class Allotted▾</label>
        <ul>
          <li><a href="allotted_list.php"><i class="fa-solid fa-list"></i> Allotted List</a></li>
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
