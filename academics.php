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

    .top_header {
      background: #125A33;
      color: white;
      font-size: 0.875rem;
      font-weight: 600;
      padding: 10px 0;
    }
    .top_header .container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
    }
    .top_header ul {
      list-style: none;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 0;
    }
    .top_header ul li a { color: white; }

    .middle_header {
      background-color: #fff;
      padding: 15px 5%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      border-bottom: 1px solid #ccc;
    }
    #logo {
     height: 80px; 
     }
    .enquery {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
      align-items: center;
    }
    .sub { 
    text-align: center; 
    }
    #h1 { 
    font-size: 1rem; 
    font-weight: bold; 
    margin-bottom: 3px; 
    }
    #h1 i { 
    color: #927037; 
    margin-right: 5px; 
    }
    #h2 a {
      color: grey;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.875rem;
    }

    .slider { 
    position: relative; 
    width: 100%; 
    height: 500px; 
    background-image: url("doc/banner_4.jpg");
    overflow: hidden; 
    }
    .main-nav { 
    position: relative; 
    z-index: 2; 
    }
    .main-nav ul {
      background-color: #927037;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      list-style: none;
      padding: 0;
    }
    .main-nav li a {
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      font-size: 0.875rem;
      font-weight: 500;
      transition: background 0.3s;
      display: inline-flex;
      align-items: center;
    }
    .main-nav li a:hover {
      background: #6d4d24;
      border-radius: 5px;
    }
    .main-nav li a i { 
    margin-right: 5px; 
    }
    #btn { 
    background-color: #125A33; 
    border-radius: 10px; 
    color: white; 
    }

    .notice_section {
     background: #fff; 
     padding: 10px 0;
      }
    .sub-notice {
      display: flex;
      align-items: center;
      gap: 15px;
      background-color: #F4F4F4;
      border-radius: 10px;
      padding: 10px 20px;
      max-width: 1200px;
      margin: auto;
    }
    .notice-btn {
      background: #125A33;
      color: white;
      padding: 8px 20px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 15px;
      display: flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
    }
    .notice-marquee marquee {
      font-size: 15px;
      color: #333;
      font-weight: 500;
    }
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
.academic-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 40px;
}
.academic-box {
    background: #f0f4f8;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    transition: 0.3s;
}
.academic-box:hover {
    background: #e1ecf7;
    transform: translateY(-5px);
    cursor: pointer;
}
.academic-box i {
    font-size: 40px;
    color: #125A33;
    margin-bottom: 15px;
}
  </style>
</head>
<body>
 <!-- Top Header -->
  <header class="top_header">
    <div class="container">
      <div>Nawadihkala, Bishrampur, Palamu-822132, Jharkhand</div>
      <ul>
        <li>UGC e-Samadhan</li>
        <li>Student Helpline</li>
        <li>Anti Ragging</li>
        <li>Grievance Form</li>
        <li>Gazette & Statute</li>
        <li>Audit Report</li>
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
      </ul>
    </div>
  </header>

  <!-- Middle Header -->
  <header class="middle_header">
    <div class="logo">
      <img src="doc/logo.png" alt="RCU Logo" id="logo">
    </div>
    <div class="enquery">
      <div class="sub">
        <div id="h1"><i class="fas fa-envelope"></i>Email</div>
        <div id="h2"><a href="mailto:info@rcu.edu.in">info@rcu.edu.in</a></div>
      </div>
      <div class="sub">
        <div id="h1"><i class="fas fa-phone"></i>Call Us</div>
        <div id="h2"><a href="tel:+917464034524">+91 74640 34524</a></div>
      </div>
      <div class="sub">
        <div id="h1"><i class="fas fa-map-marker-alt"></i>Our Address</div>
        <div id="h2"><a href="#">Nawadihkala, Bishrampur, Palamu</a></div>
      </div>
    </div>
  </header>

 <!-- Slider -->
<section class="slider">
  

  <!-- Navigation -->
  <nav class="main-nav">
    <ul>
    <li><a href="index.php"><i class="fas fa-home"></i></a></li>
      <li><a href="about.php">About HEI</a></li>
      <li><a href="administration.php">Administration</a></li>
      <li><a href="academics.php">Academics</a></li>
      <li><a href="admission_fee.php">Admission & Fee</a></li>
      <li><a href="research.php">Research</a></li>
      <li><a href="student_help_support.php">Student Help & Support</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
      <li><a href="#" id="btn">Apply Now</a></li>
    </ul>
  </nav>
</section>

  <!-- Notice Section -->
  <section class="notice_section">
    <div class="sub-notice">
      <a href="#" class="notice-btn"><i class="fas fa-bullhorn"></i> Notice</a>
      <div class="notice-marquee">
        <marquee scrollamount="5">
          🎓 Admissions open for 2025 | 📢 Seminar on AI & Robotics | 📄 New Exam Timetable Published | 🏆 Placement Drive This Friday!
        </marquee>
      </div>
    </div>
  </section>
<div class="academic-section">
    <div class="academic-header">
        <h2>Academic Excellence</h2>
        <p>Explore our academic departments, faculties, and diverse range of programs & courses.</p>
    </div>

    <!-- Navigation Menu -->
    <nav class="navbar">
        <ul>
            <li>
                <a href="#">Departments & Faculties <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#">Faculty of Science</a></li>
                    <li><a href="#">Faculty of Engineering</a></li>
                    <li><a href="#">Faculty of Arts</a></li>
                    <li><a href="#">Faculty of Commerce</a></li>
                    <li><a href="#">Faculty of Law</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Programs & Courses <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#">B.Tech (Computer Science, Civil, Mechanical)</a></li>
                    <li><a href="#">MBA (Finance, Marketing, HR)</a></li>
                    <li><a href="#">BCA & MCA</a></li>
                    <li><a href="#">Diploma Courses</a></li>
                    <li><a href="#">Ph.D. Programs</a></li>
                </ul>
            </li>
             <li>
                <a href="#">Examinations & Results <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#">Examinations Notices</a></li>
                    <li><a href="#">Admit card download</a></li>
                    <li><a href="#">Results & mark sheets </a></li>
                </ul>
            </li>
             <li>
                <a href="#">Rules & Regulations <i class="fa fa-caret-down"></i></a>
                <ul>
                    <li><a href="#">Attendance policy</a></li>
                    <li><a href="#">Scholarships Criteria</a></li>
                    <li><a href="#">University Damage Policy</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Academic Info Boxes -->
    <div class="academic-content">
        <div class="academic-box">
            <i class="fa fa-book"></i>
            <h3>Research & Innovation</h3>
            <p>We focus on high-quality research that drives real-world impact.</p>
        </div>
        <div class="academic-box">
            <i class="fa fa-chalkboard-teacher"></i>
            <h3>Experienced Faculty</h3>
            <p>Our professors bring decades of academic and industry expertise.</p>
        </div>
        <div class="academic-box">
            <i class="fa fa-graduation-cap"></i>
            <h3>Global Opportunities</h3>
            <p>We offer international exchange programs and global exposure.</p>
        </div>
        <div class="academic-box">
            <i class="fa fa-laptop-code"></i>
            <h3>Modern Learning</h3>
            <p>Advanced labs, e-learning platforms, and digital classrooms.</p>
        </div>
    </div>
</div>


<footer class="text-white pt-5 pb-3" style="background-color:#125A33;">
  <div class="container">
    <div class="row">
      <!-- About -->
      <div class="col-md-4 mb-4">
        <h5>About RCU</h5>
        <p>Ramchandra Chandravansi University (RCU) is committed to excellence in education, innovation, and holistic development of students across various disciplines.</p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="admissions.php" class="text-white text-decoration-none">Admissions</a></li>
          <li><a href="programs.php" class="text-white text-decoration-none">Programs</a></li>
          <li><a href="contact.php" class="text-white text-decoration-none">Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-md-4 mb-4">
        <h5>Contact</h5>
        <p><i class="fas fa-map-marker-alt me-2"></i>RCU Campus, Palamu, Jharkhand - 822101</p>
        <p><i class="fas fa-phone me-2"></i>+91 98765 43210</p>
        <p><i class="fas fa-envelope me-2"></i>info@rcu.ac.in</p>
        <div class="d-flex gap-2 mt-3">
          <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
          <a href="#" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
          <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
        </div>
      </div>
    </div>

    <hr class="border-light" />
    <div class="text-center">
      <small>&copy; <?php echo date("Y"); ?> Ramchandra Chandravansi University. All rights reserved.</small>
    </div>
  </div>
</footer>
</body>
</html>