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
<!-- About RCU Section -->
<section class="about" class="py-5" style="background-color:#f9f9f9;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color:#125A33;">About Ramchandra Chandravansi University</h2>
      <p class="text-muted">Empowering the youth of Jharkhand and beyond through quality education.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-12">
        <p style="text-align:justify;">
          Ramchandra Chandravansi University (RCU) has been setup by <strong>Ramchandra Chandravansi Welfare Trust (RCWT)</strong>, which was registered in the year 2006. Since its inception, the mission of the founding fathers has been to spread education to ordinary citizens of India, particularly those hailing from backward regions of the state of Jharkhand and India.
        </p>
        <p style="text-align:justify;">
          With a very humble beginning of two Intermediate Colleges 15 years back, RCWT has transformed itself into a diverse and excellent educational complex offering technical, professional, and medical academic programs.
        </p>
        <p style="text-align:justify;">
          The backward regions of Garhwa and Palamu pose significant challenges in accessing higher education. RCWT has developed a culture of encouraging education from the school level, ensuring that boys and girls from these regions aspire and progress toward higher learning.
        </p>

        <blockquote class="blockquote text-success border-start border-4 ps-3 my-4" style="border-color:#927037;">
          <p class="mb-0">"Every region and strata of our society imposes special demands on avenues of higher education... courses must cater to local needs and promote regional development."</p>
          <footer class="blockquote-footer mt-2">Shri Ramchandra Chandravansi <cite title="Chairman, RCU">(Chairman, RCU)</cite></footer>
        </blockquote>

        <p style="text-align:justify;">
          The Palamu and Garhwa districts, along with parts of Chhattisgarh, UP, and Bihar, are economically dependent on agriculture and mining. Hence, education tailored to these sectors is essential. RCWT focuses on social relevance and inter-disciplinary learning to empower these regions.
        </p>
        <p style="text-align:justify;">
          RCWT is committed to becoming a pioneer in quality education and currently operates a wide network of institutions:
        </p>

        <div class="row">
          <div class="col-md-6">
            <ul>
              <li>Sohari Chandravansi Nursing School (SCNS)</li>
              <li>Laxmi Chandravansi Medical College and Hospital (LCMCH)</li>
              <li>Ramchandra Chandravansi College of Physical Education (RCCPE)</li>
              <li>Ramchandra Chandravansi Institute of Technology (RCIT)</li>
              <li>Sahadev Chandravansi B.Ed. College (SCBC)</li>
              <li>Shiveshar Chandravansi Degree College (SCDC)</li>
              <li>Tetri Chandravansi College of Education (TCCE)</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul>
              <li>Tetri Chandravansi Pharmacy College (TCPC)</li>
              <li>Ramchandra Chandravansi University (RCU)</li>
              <li>Laxmi Chandravansi Homoeopathic Medical College & Research Centre (LCHMC&RC)</li>
              <li>Bhola Chandravansi College of Science (BCCS)</li>
              <li>Ramchandra Chandravansi Polytechnic Institute (RCPI)</li>
              <li>Lakshmi Chandravansi Degree Mahila College (LCDM)</li>
            </ul>
          </div>
        </div>

        <p class="mt-4" style="text-align:justify;">
          Through these institutions, RCWT continues to provide access to quality education and aims to uplift the socio-economic fabric of the region through skill-based and industry-aligned learning.
        </p>
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
