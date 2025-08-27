<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- ✅ Add Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      display: flex;   /* sidebar + content layout */
      min-height: 100vh; /* full height */
    }

    /* Sidebar */
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

    /* Dropdown */
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

    /* Main content */
    .main-content { flex:1; display: flex; flex-direction: column; }

    /* Topbar */
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
  <!-- Sidebar -->
  <aside class="sidebar">
    <h2><i class="fa-solid fa-graduation-cap"></i> UniCRM</h2>
    <nav>
      <a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>

      <div class="dropdown">
        <input type="checkbox" id="su&tc">
        <label for="su&tc"><i class="fa-solid fa-user-graduate"></i> Student & Teacher ▾</label>
        <ul>
          <li><a href="student.php"><i class="fa-solid fa-user-graduate"></i> Students</a></li>
          <li><a href="faculty.php"><i class="fa-solid fa-chalkboard-teacher"></i> Faculty</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="academics">
        <label for="academics"><i class="fa-solid fa-book"></i> Academics ▾</label>
        <ul>
          <li><a href="branch.php"><i class="fa-solid fa-code-branch"></i> Branch</a></li>
          <li><a href="departments.php"><i class="fa-solid fa-building"></i> Department</a></li>
          <li><a href="designation.php"><i class="fa-solid fa-user-shield"></i> Designation</a></li>
          <li><a href="program.php"><i class="fas fa-chalkboard-teacher"></i> Program</a></li>
          <li><a href="subject.php"><i class="fas fa-scroll"></i> Subject</a></li>
          <li><a href="notice.php"><i class="fa-solid fa-bullhorn"></i> Notice</a></li>
          <li><a href="class.php"><i class="fa-solid fa-chalkboard"></i> Class Room </a></li>
          <li><a href="time_table.php"> <i class="fa-solid fa-calendar-week"></i>Time Table</a></li>
             <li><a href="room_no.php"><i class="fa-solid fa-door-open"></i>Room No.</a></li>
          <li><a href="batch.php"> <i class="fa-solid fa-calendar-days"></i>Batch</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <input type="checkbox" id="at">
        <label for="at"><i class="fa-solid fa-clipboard-list"></i> Attendance ▾</label>
        <ul>
          <li><a href="mark_attendance.php"><i class="fa-solid fa-check"></i> Mark Attendance</a></li>
          <li><a href="attendance_list.php"><i class="fa-solid fa-list"></i> Attendance List</a></li>
        </ul>
      </div>

      <a href="#"><i class="fa-solid fa-sack-dollar"></i> Fees</a>
      <a href="#"><i class="fa-solid fa-book-open"></i> Library</a>
      <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
    </nav>
  </aside>
</body>
</html>
