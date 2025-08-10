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
  <!-- Gallery Section -->
<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <h2 class="text-center mb-4" style="color:#125A33;"><i class="fas fa-images me-2"></i>University Gallery</h2>
    <p class="text-center mb-5">A glimpse into our vibrant campus life, academic events, and student achievements.</p>

    <div class="row g-4">
      <!-- Image 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_BbKCnmQ78Uqvo9kMtf_yW3vqsi_fSvmFow&s" 
               class="card-img-top" alt="Students in classroom">
          <div class="card-body">
            <h6 class="card-title">Interactive Lecture</h6>
            <p class="card-text">Students participating in an engaging classroom session.</p>
          </div>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?crop=entropy&cs=tinysrgb&fit=crop&w=800&q=80" 
               class="card-img-top" alt="University event">
          <div class="card-body">
            <h6 class="card-title">Annual Cultural Fest</h6>
            <p class="card-text">Celebrating talent and creativity at our cultural festival.</p>
          </div>
        </div>
      </div>

      <!-- Image 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?crop=entropy&cs=tinysrgb&fit=crop&w=800&q=80" 
               class="card-img-top" alt="Graduation ceremony">
          <div class="card-body">
            <h6 class="card-title">Graduation Ceremony</h6>
            <p class="card-text">Proud moments as students receive their degrees.</p>
          </div>
        </div>
      </div>

      <!-- Image 4 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://images.unsplash.com/photo-1507537297725-24a1c029d3ca?crop=entropy&cs=tinysrgb&fit=crop&w=800&q=80" 
               class="card-img-top" alt="Sports event">
          <div class="card-body">
            <h6 class="card-title">Sports Day</h6>
            <p class="card-text">Encouraging physical fitness and team spirit through sports.</p>
          </div>
        </div>
      </div>

      <!-- Image 5 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzrRiovOGIPoppr0GQ38ToxYlWHAt2knTpRg&s" 
               class="card-img-top" alt="Library study">
          <div class="card-body">
            <h6 class="card-title">University Library</h6>
            <p class="card-text">Students making the most of our rich library resources.</p>
          </div>
        </div>
      </div>

      <!-- Image 6 -->
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <img src="https://www.kothes.com/hubfs/2%20Blog,%20Termine,%20Jobs/2022/Workshop%20Technische%20Doku_1920-1080.jpg" 
               class="card-img-top" alt="Workshop session">
          <div class="card-body">
            <h6 class="card-title">Technical Workshop</h6>
            <p class="card-text">Hands-on learning experience in our latest technical workshop.</p>
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