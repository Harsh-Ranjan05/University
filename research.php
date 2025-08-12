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
 .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .section-title {
      font-weight: bold;
      margin-bottom: 30px;
      text-align: center;
    }
    .card {
      border: none;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .icon-box {
      font-size: 3rem;
      color: #007bff;
    }
    .publication-list li {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<?php include('hd_cm.php');?>
<section class="hero">
  <div class="container">
    <h1>Research & Innovation</h1>
    <p>Pushing the boundaries of knowledge for a better future</p>
  </div>
</section>

<!-- About Research -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title">About Our Research</h2>
    <p class="text-center">
      Our university is committed to advancing knowledge across disciplines, fostering innovation, and developing solutions to real-world problems.
      We work with industry leaders, research institutions, and government bodies to promote sustainable and impactful research.
    </p>
  </div>
</section>

<!-- Research Areas -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">Research Areas</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card text-center p-4">
          <div class="icon-box"><i class="fas fa-microscope"></i></div>
          <h5 class="mt-3">Science & Technology</h5>
          <p>Innovations in AI, robotics, materials science, and environmental technology.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-4">
          <div class="icon-box"><i class="fas fa-leaf"></i></div>
          <h5 class="mt-3">Sustainability</h5>
          <p>Research in renewable energy, climate change mitigation, and conservation.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center p-4">
          <div class="icon-box"><i class="fas fa-heartbeat"></i></div>
          <h5 class="mt-3">Health & Medicine</h5>
          <p>Advancing medical research, public health, and healthcare innovation.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Recent Projects -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title">Recent Research Projects</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card p-3">
          <h5>AI for Sustainable Agriculture</h5>
          <p>Using artificial intelligence to improve crop yields and reduce environmental impact.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-3">
          <h5>Nanotechnology in Medicine</h5>
          <p>Developing nano-scale treatments for cancer and other chronic diseases.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Publications -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title">Publications & Achievements</h2>
    <ul class="publication-list">
      <li><i class="fas fa-file-alt text-primary"></i> "Renewable Energy Solutions for the Future" - Journal of Sustainable Energy</li>
      <li><i class="fas fa-file-alt text-primary"></i> "AI-Driven Healthcare Innovations" - International Medical Review</li>
      <li><i class="fas fa-trophy text-warning"></i> Awarded Best Research University 2024 by National Science Council</li>
    </ul>
  </div>
</section>

<!-- Collaboration -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="section-title">Research Opportunities & Collaborations</h2>
    <p>We invite researchers, scholars, and industry partners to collaborate with us on impactful research initiatives.</p>
    <a href="contact.html" class="btn btn-primary mt-3"><i class="fas fa-envelope"></i> Contact Research Department</a>
  </div>
</section>

<?php include('footer.php'); ?>
</body>
</html>