<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ramchandra Chandravansi University (RCU)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; line-height: 1.6; }

  .academic-section {
    padding: 50px;
    background-color: white;
}
.academic-header {
    text-align: center;
    margin-bottom: 40px;
}
.academic-header h2 {
    font-size: 32px;
    color: #003366;
}
.navbar {
    display: flex;
    justify-content: center;
    background: #125A33;
    padding: 10px 0;
}
.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}
.navbar ul li {
    position: relative;
}
.navbar ul li a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.navbar ul li:hover {
    background: #125A33;
}
.navbar ul li ul {
    display: none;
    position: absolute;
    background: black;
    top: 40px;
    left: 0;
    min-width: 200px;
    z-index: 1000;
}
.navbar ul li:hover ul {
    display: block;
}
.navbar ul li ul li {
    width: 100%;
}
.navbar ul li ul li a {
    padding: 10px;
    font-weight: normal;
}
 .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('student-banner.jpg') center/cover;
      color: white;
      padding: 100px 20px;
      text-align: center;
        cursor: pointer;
    }
    .quick-links .card {
      transition: 0.3s;
        cursor: pointer;
    }
    .quick-links .card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
      cursor: pointer;
    }
    .anti-ragging {
      background: #f8f9fa;
      padding: 50px 20px;
      border-radius: 10px;
     cursor: pointer;
    }
    .notice-board {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      border: 1px solid #ddd;
     cursor: pointer;
    }
  </style>
</head>
<body>
<?php 
include('hd_cm.php')
?>
  <section class="hero">
    <h1>Welcome Students</h1>
    <p>Your one-stop portal for academics, services, and campus life at RCU</p>
    <a href="#quick-links" class="btn btn-success btn-lg"><i class="fas fa-arrow-down"></i> Explore</a>
  </section>

  <!-- Quick Links -->
  <section id="quick-links" class="quick-links container my-5">
    <h2 class="text-center mb-4">Quick Access</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card text-center p-3">
      <i class="fas fa-book fa-3x text-success mb-3"></i>
          <h5>Clubs & Activities</h5>
          <p>View club & activites related to club..</p>
          <a href="#" class="btn btn-outline-success btn-sm">Go</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <i class="fas fa-calendar-check fa-3x text-primary mb-3"></i>
          <h5>Attendance</h5>
          <p>Check your attendance and leave applications.</p>
          <a href="#" class="btn btn-outline-primary btn-sm">Go</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
          <h5>Exams & Results</h5>
          <p>View your exam schedule and download results.</p>
          <a href="#" class="btn btn-outline-warning btn-sm">Go</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center p-3">
          <i class="fas fa-university fa-3x text-danger mb-3"></i>
          <h5>Library</h5>
          <p>Access e-books, journals, and library catalog.</p>
          <a href="#" class="btn btn-outline-danger btn-sm">Go</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Student Services -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Student Services</h2>
    <div class="row text-center g-4">
      <div class="col-md-3"><i class="fas fa-bed fa-3x text-info mb-2"></i><h6>Hostel</h6></div>
      <div class="col-md-3"><i class="fas fa-bus fa-3x text-success mb-2"></i><h6>Transport</h6></div>
      <div class="col-md-3"><i class="fas fa-users fa-3x text-primary mb-2"></i><h6>Clubs & Societies</h6></div>
      <div class="col-md-3"><i class="fas fa-basketball-ball fa-3x text-warning mb-2"></i><h6>Sports</h6></div>
    </div>
  </section>

  <!-- Anti-Ragging -->
  <section class="anti-ragging container my-5">
    <h2 class="text-center text-danger"><i class="fas fa-hand-paper"></i> Anti-Ragging Policy</h2>
    <p class="text-center">Ragging in any form is strictly prohibited. Strict action will be taken against offenders.</p>
    <ul>
      <li>Helpline Number: <strong>1800-180-5522</strong></li>
      <li>Email: <strong>antiragging@rcu.ac.in</strong></li>
      <li>Visit: <a href="#">Anti-Ragging Rules & Regulations</a></li>
    </ul>
  </section>

  <!-- Notice Board -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Notice Board & Events</h2>
    <div class="notice-board">
      <marquee behavior="scroll" direction="up" scrollamount="3" height="200px">
        <p>📢 Semester Exams start from 15th August 2025.</p>
        <p>📢 Hostel applications open till 10th August 2025.</p>
        <p>📢 Cultural Fest 2025 registrations open now.</p>
      </marquee>
    </div>
  </section>

  <!-- Downloads -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Downloads</h2>
    <ul class="list-group">
      <li class="list-group-item"><i class="fas fa-file-pdf text-danger"></i> Academic Calendar</li>
      <li class="list-group-item"><i class="fas fa-file-pdf text-danger"></i> Syllabus</li>
      <li class="list-group-item"><i class="fas fa-file-pdf text-danger"></i> Exam Forms</li>
    </ul>
  </section>

  <!-- Contact Support -->
  <section class="container my-5 text-center">
    <h2>Contact Student Support</h2>
    <p>Email: <strong>support@rcu.ac.in</strong> | Helpline: <strong>+91 9876543210</strong></p>
  </section>
<?php include('footer.php'); ?>
</body>
</html>