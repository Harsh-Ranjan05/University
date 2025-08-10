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
.sub-nav {
    width: 400px;
    border: 1px solid black;
    margin: 10px;
    box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding: 0; /* remove extra padding from container */
}

.sub-nav ul {
    padding: 0;
    margin: 0;
}

.sub-nav ul li {
    list-style: none;
    border-bottom: 1px solid black; /* border between items */
    width: 100%;
    padding: 8px 10px;
    box-sizing: border-box;
}

/* Optional: remove border from last item */
.sub-nav ul li:last-child {
    border-bottom: none;
}
 a{
  text-decoration:none;
  color:black;
  font-size:small;
}
.header {
    background-color: #125A33;
    color: white;
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding: 5px;
    font-weight: bolder;
}
.about-section{
  margin:5px;
  box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border:1px solid black;
  cursor: pointer;
}
#banner-logo{
  width: 100%;
  height:100%;
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
<section class="about_section">
<div class="container">
      <div class="row">
    <div class="col-lg-4 col-sm-12">
          <div class="sub-nav">
             <div class="header">
              Quick Link
              </div>
            <ul>
              <li><a href="">Home</a></li>
              <li><a href="">Careers</a></li>
              <li><a href="">Placement</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="banner-logo">
            <img src="doc/logo.png" alt="RCU Logo" id="banner-logo">
          </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="about-section">
    <div class="header">
        About Us
    </div>
    <div class="content" style="padding: 20px; text-align: justify;">
        <p>
            <strong>Bharti Gyanpeeth University</strong> is a distinguished center of higher education, research, and innovation, 
            established with the vision of creating a transformative learning environment for students from across the nation and beyond. 
            Founded with the belief that education is the foundation for personal growth and societal progress, the university has consistently 
            upheld its commitment to academic excellence, ethical values, and community engagement.
        </p>

        <p>
            The university offers a diverse range of <strong>undergraduate, postgraduate, diploma, and doctoral programs</strong> 
            in fields such as science, engineering, management, law, humanities, commerce, pharmacy, and health sciences. 
            Each program is designed to blend theoretical knowledge with practical exposure, ensuring that graduates are 
            industry-ready, globally competent, and socially responsible.
        </p>

        <p>
            <strong>Our Mission:</strong> To empower students with a holistic education that nurtures intellectual growth, 
            fosters creativity, and instills leadership qualities, preparing them to meet the challenges of a rapidly evolving world.
        </p>

        <p>
            <strong>Our Vision:</strong> To be recognized as a world-class university that drives innovation, research, and 
            societal development, contributing meaningfully to the nation's progress.
        </p>

        <p>
            The <strong>state-of-the-art campus</strong> is equipped with advanced laboratories, modern classrooms, 
            an extensive digital library, innovation hubs, sports complexes, and residential facilities, 
            creating an ecosystem that supports academic excellence and personal well-being.
        </p>

        <blockquote style="border-left: 4px solid #125A33; padding-left: 10px; color: #125A33; font-style: italic;">
            "At Bharti Gyanpeeth University, we believe education is not confined to the classroom — 
            it is a lifelong journey of learning, innovation, and service to humanity."
        </blockquote>

        <p>
            The strength of Bharti Gyanpeeth University lies in its <strong>experienced faculty, cutting-edge research, 
            industry collaborations, and global partnerships</strong> that open doors to endless opportunities for our students. 
            Our alumni network is a testament to the university's impact, with graduates excelling in diverse industries and making 
            meaningful contributions to society.
        </p>

        <p>
            With a strong emphasis on <em>skill development, innovation, and entrepreneurship</em>, 
            Bharti Gyanpeeth University continues to inspire generations of learners, shaping leaders who will 
            guide communities and industries toward a brighter, more sustainable future.
        </p>
    </div>
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
