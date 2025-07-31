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
   .about{
    border:2px solid #125A33;
    margin:30px;
    padding:10px;
    border-radius:10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
   }
   .about:hover{
      transform: scale(1.05);
      cursor: pointer;
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
      <li><a href="#">Academics</a></li>
      <li><a href="#">Admission & Fee</a></li>
      <li><a href="#">Research</a></li>
      <li><a href="#">Student Life</a></li>
      <li><a href="#">Alumni</a></li>
      <li><a href="#">Information Corner</a></li>
      <li><a href="#">Gallery</a></li>
      <li><a href="#">Contact Us</a></li>
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
<!-- University Leadership Section -->
<section class="py-5" style="background-color: #fff;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color:#125A33;">University Leadership</h2>
      <p class="text-muted">Meet the leaders shaping the future of Ramchandra Chandravansi University.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">

      <!-- Chancellor -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/chancellor.jpg" class="card-img-top" alt="Chancellor">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Chancellor</h5>
            <p class="card-text">Shri Ramchandra Chandravansi<br><small class="text-muted">Founder & Visionary</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('chancellor')">View Details</button>
          </div>
        </div>
      </div>

      <!-- Vice Chancellor -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/vice.jpg" class="card-img-top" alt="Vice Chancellor">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Vice Chancellor</h5>
            <p class="card-text">Dr. [Full Name]<br><small class="text-muted">Academic Head</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('vc')">View Details</button>
          </div>
        </div>
      </div>

      <!-- Registrar -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/registar.png" class="card-img-top" alt="Registrar">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Registrar</h5>
            <p class="card-text">Shri [Full Name]<br><small class="text-muted">Administrative Officer</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('registrar')">View Details</button>
          </div>
        </div>
      </div>

      <!-- Finance Officer -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/finance_officer.jpg" class="card-img-top" alt="Finance Officer">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Finance Officer</h5>
            <p class="card-text">Shri [Full Name]<br><small class="text-muted">Financial Management</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('finance')">View Details</button>
          </div>
        </div>
      </div>

      <!-- Controller of Examination -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/controller.jpg" class="card-img-top" alt="Controller of Examination">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Controller of Examination</h5>
            <p class="card-text">Shri [Full Name]<br><small class="text-muted">Assessment & Evaluation</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('exam')">View Details</button>
          </div>
        </div>
      </div>

      <!-- Academic Leadership -->
      <div class="col">
        <div class="card h-100 border-0 shadow">
          <img src="doc/dean.jpg" class="card-img-top" alt="Academic Leadership">
          <div class="card-body text-center">
            <h5 class="card-title text-success">Academic Leadership</h5>
            <p class="card-text">Prof. [Full Name]<br><small class="text-muted">Dean of Academics</small></p>
            <button class="btn btn-outline-success mt-2" onclick="viewDetails('academic')">View Details</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


  
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
