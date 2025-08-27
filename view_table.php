<?php 
include('db.php');





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Subject Teacher Allotment</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif; }
    body { display:flex; min-height:100vh; background:#f4f6f9; color:#333; }
    .table-container { padding:20px; overflow-x:auto; }
    table {
      width:100%;
      border-collapse:collapse;
      background:#fff;
      border-radius:8px;
      overflow:hidden;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding:12px 15px;
      text-align:left;
      border-bottom:1px solid #eee;
    }
    th { background:#f8f9fc; }
    tr:hover { background:#f1f1f1; }
    .btn-assign {
      padding:6px 12px;
      background:#007bff;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
    }
    .btn-assign:hover { background:#0056b3; }
    .btn{
      padding:6px 12px;
      background:green;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;  
      text-decoration:none;
    }
    .btn-1 {
      background:green; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
    }
    .btn-2{
      background:red; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
    }
    
    #h2{
        text-align:center;
        margin-bottom:25px;
        font-size:26px;
        color:#333;
    }
    .timetable {
      display:grid;
      grid-template-columns: 120px repeat(8, 1fr); /* Day + 8 periods */
      gap:6px;
      background:#fff;
      padding:15px;
      border-radius:10px;
      box-shadow:0 4px 12px rgba(0,0,0,0.15);
    }
    .box {
      border:1px solid #ddd;
      padding:12px;
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
    
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <main class="main-content">
    <header class="topbar">
      <h1>Time Table Mangment</h1>
      <div class="profile">Admin ▼</div>
    </header>
  <h2 id="h2">📅 B.Tech CSE - Semester 5 - Section A</h2>

<div class="timetable">
  <!-- Header Row -->
  <div class="box header">Day / Period</div>
  <div class="box header">1</div>
  <div class="box header">2</div>
  <div class="box header">3</div>
  <div class="box header">4</div>
  <div class="box header">5</div>
  <div class="box header">6</div>
  <div class="box header">7</div>
  <div class="box header">8</div>

  <!-- Monday -->
  <div class="box day">Monday</div>
  <div class="box"><div class="subject">DBMS</div><div class="room">Room 101</div><div class="faculty">Dr. Sharma</div></div>
  <div class="box"><div class="subject">OS</div><div class="room">Room 102</div><div class="faculty">Prof. Verma</div></div>
  <div class="box"><div class="subject">Maths</div><div class="room">Room 103</div><div class="faculty">Dr. Singh</div></div>
  <div class="box"><div class="subject">AI</div><div class="room">Lab 1</div><div class="faculty">Dr. Mehta</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">DBMS Lab</div><div class="room">Lab 3</div><div class="faculty">Mr. Raj</div></div>
  <div class="box">--</div>
  <div class="box">--</div>

  <!-- Tuesday -->
  <div class="box day">Tuesday</div>
  <div class="box"><div class="subject">OS</div><div class="room">Room 102</div><div class="faculty">Prof. Verma</div></div>
  <div class="box"><div class="subject">DBMS</div><div class="room">Room 101</div><div class="faculty">Dr. Sharma</div></div>
  <div class="box"><div class="subject">AI</div><div class="room">Lab 1</div><div class="faculty">Dr. Mehta</div></div>
  <div class="box"><div class="subject">CN</div><div class="room">Room 104</div><div class="faculty">Mr. Patel</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">Maths</div><div class="room">Room 103</div><div class="faculty">Dr. Singh</div></div>
  <div class="box"><div class="subject">Elective</div><div class="room">Room 105</div><div class="faculty">Guest</div></div>
  <div class="box">--</div>

  <!-- Wednesday -->
  <div class="box day">Wednesday</div>
  <div class="box"><div class="subject">Maths</div><div class="room">Room 103</div><div class="faculty">Dr. Singh</div></div>
  <div class="box"><div class="subject">DBMS</div><div class="room">Room 101</div><div class="faculty">Dr. Sharma</div></div>
  <div class="box"><div class="subject">OS</div><div class="room">Room 102</div><div class="faculty">Prof. Verma</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">AI Lab</div><div class="room">Lab 2</div><div class="faculty">Dr. Mehta</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">CN</div><div class="room">Room 104</div><div class="faculty">Mr. Patel</div></div>
  <div class="box">--</div>

  <!-- Thursday -->
  <div class="box day">Thursday</div>
  <div class="box"><div class="subject">AI</div><div class="room">Lab 1</div><div class="faculty">Dr. Mehta</div></div>
  <div class="box"><div class="subject">CN</div><div class="room">Room 104</div><div class="faculty">Mr. Patel</div></div>
  <div class="box"><div class="subject">DBMS</div><div class="room">Room 101</div><div class="faculty">Dr. Sharma</div></div>
  <div class="box"><div class="subject">OS</div><div class="room">Room 102</div><div class="faculty">Prof. Verma</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">Elective</div><div class="room">Room 105</div><div class="faculty">Guest</div></div>
  <div class="box">--</div>
  <div class="box">--</div>

  <!-- Friday -->
  <div class="box day">Friday</div>
  <div class="box"><div class="subject">Maths</div><div class="room">Room 103</div><div class="faculty">Dr. Singh</div></div>
  <div class="box"><div class="subject">DBMS Lab</div><div class="room">Lab 3</div><div class="faculty">Mr. Raj</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">OS</div><div class="room">Room 102</div><div class="faculty">Prof. Verma</div></div>
  <div class="box"><div class="subject">AI</div><div class="room">Lab 1</div><div class="faculty">Dr. Mehta</div></div>
  <div class="box">--</div>
  <div class="box"><div class="subject">CN</div><div class="room">Room 104</div><div class="faculty">Mr. Patel</div></div>
  <div class="box">--</div>

  <!-- Saturday -->
  <div class="box day">Saturday</div>
  <div class="box"><div class="subject">Sports</div><div class="room">Ground</div><div class="faculty">Coach</div></div>
  <div class="box"><div class="subject">Seminar</div><div class="room">Auditorium</div><div class="faculty">Guest</div></div>
  <div class="box">--</div>
  <div class="box">--</div>
  <div class="box"><div class="subject">Workshop</div><div class="room">Lab 5</div><div class="faculty">Industry Expert</div></div>
  <div class="box">--</div>
  <div class="box">--</div>
  <div class="box">--</div>
</div>
  

        </section>
        
    
  </main>
</body>
</html>
