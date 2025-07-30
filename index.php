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
    overflow: hidden; 
    }
    .slider video {
      position: absolute;
      top: 50%; left: 50%;
      min-width: 100%; min-height: 100%;
      transform: translate(-50%, -50%);
      object-fit: cover;
      z-index: 1;
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

    .introduction, .program, .why_rcu { 
    padding: 40px 5%; 
    }
    .introduction img, #banner {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .program { 
    background-color: #125A33; 
    color: white; 
    }
    .program h1, .program h4 { 
    color: #fff; 
    }
    .course ul { 
    list-style: disc inside; 
    padding-left: 20px; 
    }
    .course li { 
    font-size: 15px; 
    }
    #color {
     font-weight: bolder; 
     }
    #sub-h_1 { 
    color: yellow;
    font-weight: bold; 
     }
    .btn1 {
      background-color: #876636;
      font-weight: bold;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 6px;
      display: inline-block;
      margin-top: 15px;
    }

    .card {
      margin: 10px 0;
      padding: 10px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease;
      border-radius: 10px;
      background-color: white;
    }
    .card:hover {
     transform: scale(1.05); 
     cursor: pointer; 
     }
    .card-img { 
    width: 100%; 
    height: 200px; 
    object-fit: cover; 
    border-radius: 10px; 
    }
    #leader {
     color: #125A33;
     font-size: larger; 
     font-weight: bolder; 
     margin-top: 10px; 
     }
    .font { 
    font-size: 40px;
    color: #125A33; 
    margin-bottom: 10px; 
    }
    #disc { 
    font-size: 18px; 
    }
    .circle{
      display:flex;
      justify-content:center;
    }
    .profile{
      text-algin:center;
      background-color: #125A33;
      padding:5px;
      border-radius:10px;
      box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.15);
      margin:5px;
      transition: transform 0.3s ease;
    }
    .profile:hover{
       transform: scale(1.05); 
    }
    #profile_pic{
      width: 150px;
      height: 150px;
      border-radius:100%;
      box-shadow: 0 5px 5px  white;
      cursor: pointer;
    }
    .info{
      text-align:center;
      margin:5px;
    }
    .student_review{
     text-align:center;
    }
    #sup{
      color:grey;
      font-weight:bolder;
    }
    #name{
      color:yellow;
      font-size:larger;
      font-weight:bolder;
    }
    #dept{
      color:grey;
      font-size:medium;
    }
    #blue{
      color:white;
    }
    .gallery-section {
      background-color: #f9f9f9;
      padding: 50px 5%;
    }
    .gallery-section h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
      color: #125A33;
    }
    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .gallery-item {
      flex: 1 1 calc(25% - 20px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      overflow: hidden;
      background-color: white;
      transition: transform 0.3s ease;
    }
    .gallery-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: 0.3s;
    }
    .gallery-item:hover {
      transform: scale(1.05);
    }
    .gallery-caption {
      padding: 10px;
      text-align: center;
      font-weight: 500;
    }
    @media (max-width: 992px) {
      .gallery-item {
        flex: 1 1 calc(50% - 20px);
      }
    }
    @media (max-width: 576px) {
      .gallery-item {
        flex: 1 1 100%;
      }
    }
    @media (max-width: 768px) {
      .enquery { 
      justify-content: center; 
      text-align: center; 
      }
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
  <video autoplay muted loop playsinline>
    <source src="doc/rcu.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Navigation -->
  <nav class="main-nav">
    <ul>
      <li><a href="#"><i class="fas fa-home"></i></a></li>
      <li><a href="#">About HEI</a></li>
      <li><a href="#">Administration</a></li>
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

  <!-- Introduction -->
  <section class="introduction">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12 mb-4">
        <img src="doc/rcu_girl.png" alt="RCU Student">
      </div>
      <div class="col-lg-6 col-md-12">
        <span id="sub-h_1">Our Introduction</span>
        <h1>Welcome To RCU</h1>
        <h3>Ramchandra Chandravansi University</h3>
        <p>RCU has been setup by Ramchandra Chandravansi Welfare Trust (RCWT) which was registered in the year 2006. The mission is to spread education to citizens of India, especially in backward regions of Jharkhand.</p>
        <a href="#" class="btn1">Read More</a>
      </div>
    </div>
  </section>

  <!-- Programs -->
  <section class="program">
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <span id="sub-h_1">Courses We Offer</span>
        <h1 id="color">Programs</h1>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Faculty of Arts & Humanities</h4>
          <ul>
            <li>B.A. / M.A. – Economics, English, Geography, Hindi, History, Home Science, Political Science, Psychology, Sociology, Urdu, Sanskrit.</li>
          </ul>
        </div>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Faculty of Science</h4>
          <ul>
            <li>B.Sc. / M.Sc. – Botany, Chemistry, Math, Physics, Zoology, Geology.</li>
            <li>BCA, MCA, B.Lib, M.Lib, D.Lib</li>
          </ul>
        </div>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Faculty of Education</h4>
          <ul>
            <li>B.Ed, B.P.Ed, M.Ed, Yoga</li>
          </ul>
        </div>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Faculty of Engineering</h4>
          <ul>
            <li>Diploma – EEE, ME, CE</li>
            <li>B.Tech / M.Tech – CSE, EE, ECE, ME, CE</li>
          </ul>
        </div>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Faculty of Medicine</h4>
          <ul>
            <li>UG – MBBS, BHMS, B.Sc Nursing, Post B.Sc Nursing, B.Sc MLT, B.Pharma, D.Pharma</li>
            <li>PG – M.Sc Nursing, MARD</li>
            <li>Diploma – DMLT, OT Technician, X-Ray Technician</li>
          </ul>
        </div>
        <div class="course">
          <h4><i class="fas fa-check-circle"></i> Certification Courses</h4>
          <ul>
            <li>Dresser</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-sm-12">
        <img src="doc/library.jpg" id="banner">
      </div>
    </div>
  </section>
  <section class="leader">
  <div class="container">
    <h1 style="text-align:center;font-weight:bolder;">Campus Leadership</h1>
    <div class="row">
      <div class="col-sm-12 col-lg-3">
           <div class="card">
                <img src="doc/chairman.jpg" alt="" class="card-img">
                <span id="leader">Chairman</span>
           </div>
      </div>
      <div class="col-sm-12 col-lg-3">
              <div class="card">
                <img src="doc/chancellor.jpg" alt="" class="card-img">
                <span id="leader">Chancellor</span>
           </div>      
      </div>
      <div class="col-sm-12 col-lg-3">
             <div class="card">
                <img src="doc/deputy-direcrtor.jpg" alt="" class="card-img">
                <span id="leader">Dy. Director</span>
           </div>
      </div>
      <div class="col-sm-12 col-lg-3">
             <div class="card">
                <img src="doc/vice.jpg" alt="" class="card-img">
                <span id="leader">Vice Chancellor</span>
           </div>    
      </div>
    </div>
  </div>
</section>
<section class="why_rcu">
  <div class="container">
     <h1 style="text-align:center;font-weight:bolder;">Why RCU?</h1>
    <div class="row">
      <div class="col-sm-12 col-lg-3">
            <div class="card">
              <div class="font"><i class="fas fa-users"></i></div>
              <p id="disc">RCU Legacy Pionners in Technical Education</p>
            </div>
      </div>
      <div class="col-sm-12 col-lg-3">
            <div class="card">
              <div class="font"><i class="fas fa-users"></i></div>
              <p id="disc">Highly qualified and experienced Faculty</p>
            </div>
      </div>
      <div class="col-sm-12 col-lg-3">
             <div class="card">
              <div class="font"><i class="fas fa-users"></i></div>
              <p id="disc">Tie-ups with Leading Industries</p>
            </div>
      </div>
      <div class="col-sm-12 col-lg-3">
            <div class="card">
              <div class="font"><i class="fas fa-users"></i></div>
              <p id="disc">Academic MOUs with Leading Instituations.</p>
            </div>
      </div>
    </div>
  </div>
</section>
<section class="student_review">
     <div class="container">
            <span id="sub-1">Student Feedback</span>
            <h1 id="sup">Students</h1>
            <div class="profile">
                <marquee scrollamount="5">
                 <div class="circle">
                     <img src="doc/profile_pic.jpeg" id="profile_pic" alt="">
                 </div>
                 <div class="info">
                    <p id="blue">Ramchandra Chandravansi University offers a well-rounded educational experience with a focus on academic excellence and skill development. </p>
                    <p id="name">(Harsh Ranjan)</p>
                    <p id="dept">B.Tech(CSE) 2015-2019</p>
                </div>
              </marquee>
            </div>
     </div>
</section>
<section class="latest_event">
            <h1 style="text-align:center;font-weight:bolder;">Latest News & Events</h1>
            <div class="gallery-section">
      <h2>RCU Gallery</h2>
      <div class="gallery">
        <div class="gallery-item">
          <img src="doc/event1.jpg" alt="Event 1">
          <div class="gallery-caption">Tech Fest 2025</div>
        </div>
        <div class="gallery-item">
          <img src="doc/event4.jpg" alt="Event 2">
          <div class="gallery-caption">Annual Sports Day</div>
        </div>
        <div class="gallery-item">
          <img src="doc/event3.jpg" alt="Event 3">
          <div class="gallery-caption">Cultural Night</div>
        </div>
        <div class="gallery-item">
          <img src="doc/event2.jpg" alt="Event 4">
          <div class="gallery-caption">AI & Robotics Seminar</div>
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
