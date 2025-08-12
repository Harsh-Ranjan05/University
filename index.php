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

    .disc{
      font-size:medium;
      padding:5px;
    }
    .content{
      padding:10px;
    }
    #read_more{
      background-color:#927037;
      padding:10px;
      color:white;
      border-radius:10px;
      text-decoration:none;
      margin:5px;
    }
    .intro-card{
      text-algin:center;
    }
    .intro-pic{
       display:flex;
      justify-content:center;
    }
    #pic{
      width: 150px;
      height:200px;
      border:5px solid #927037;
    }
    #post{
      font-weight:bolder;
      font-size:larger;
      color:#125A33;
      text-align:center;
    }
    .sub-part .card {
  transition: transform 0.3s ease;
   box-shadow: 0px 14px 14px rgba(0, 0, 0, 0.3);
}
.sub-part .card:hover {
  transform: translateY(-5px);
}
.sub-part .card-header {
  font-size: 1rem;
  padding: 10px;
}
.sub-part .card-body p {
  margin-bottom: 10px;
}
.total-quantity{
  background-color:#125A33;
  margin-bottom:10px;
  display:flex;
  justify-content:space-between;
  padding: 5px 5%;
}
#count {
  font-size: larger;
  font-weight: bolder;
  position: relative;
  display: inline-block;
  color: white;
}

#count::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -3px;
  height: 3px;
  width: 0%;
  background-color: yellow;
  animation: loadingBorder 2s infinite;
}
.acutal-quantity{
  color:white;
  padding:5px;
}
.sub-part{
  background-color:white;
}
@keyframes loadingBorder {
  0% {
    width: 0%;
    background-color: yellow;
  }
  50% {
    width: 100%;
    background-color: orange;
  }
  100% {
    width: 0%;
    background-color: red;
  }
}
.img-card {
  position: relative;
  height: 300px;
  border-radius: 15px;
  color: white;
  padding: 20px;
  background-size: cover;
  background-position: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
  transition: transform 0.3s ease;
  margin:5px;
}

.img-card:hover {
  transform: scale(1.05);
  cursor: pointer;
}

/* Background images */
.card-1 {
  background-image: url('doc/sbuimg.png');
}

.card-2 {
  background-image: url('doc/sbuimg1.webp');
}

.card-3 {
  background-image: url('doc/sbuimg2.webp');
}

.font-ausome i {
  font-size: 40px;
  margin-bottom: 15px;
  color: white;
}

.text {
  font-size: 20px;
  font-weight: bold;
}
.view_apply{
  padding:5px;
}
.university_opp{
  background-color:white;
}
.university-img {
  background-image: url('doc/banner_4.jpg');
  background-size: cover;
  background-position: center;
  border-radius: 10px;
  min-height: 350px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.event-card {
  background-color: #125A33;
  color: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
  cursor: pointer;
}
.recruiter-marquee {
  overflow: hidden;
  position: relative;
  background: #fff;
  padding: 20px 0;
  border-radius: 10px;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
}

.marquee-content {
  display: flex;
  width: max-content;
  animation: marquee 20s linear infinite;
  gap: 60px;
}

.marquee-content img {
  height: 60px;
  object-fit: contain;
  filter: grayscale(100%);
  transition: filter 0.3s ease;
}

.marquee-content img:hover {
  filter: grayscale(0%);
}

@keyframes marquee {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}

.apply_admission input,
.apply_admission textarea {
  border-radius: 6px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.apply_admission input:focus,
.apply_admission textarea:focus {
  border-color: #125A33;
  box-shadow: 0 0 5px rgba(18, 90, 51, 0.5);
  outline: none;
  cursor: pointer;
}
.social-icon {
    font-size: 24px;
    padding: 15px;
    border-radius: 50%;
    color: #fff;
    transition: 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
  }

  .social-icon.facebook {
    background-color: #3b5998;
  }

  .social-icon.twitter {
    background-color: #1da1f2;
  }

  .social-icon.instagram {
    background-color: #e1306c;
  }

  .social-icon.linkedin {
    background-color: #0077b5;
  }

  .social-icon.youtube {
    background-color: #ff0000;
  }

  .social-icon:hover {
    opacity: 0.8;
    transform: scale(1.1);
  }

  </style>
</head>
<body>
  <?php include('hd_home.php');
  ?>
 <section class="introduction">
           <div class="container">
                  <div class="row">
                         <div class="col-lg-6 col-sm-12">
                              <div class="content">
                                <h2> Welcome To <b>BHARTI GYANPEETH</b></h2>
                                <p class="disc">Bharti Gyanpeeth University is a premier institution committed to academic excellence, innovation, and holistic development.
                                   Founded with the vision to empower the youth with knowledge, skills, and values, our university offers a diverse range of programs across 
                                   disciplines such as Science, Technology, Management, Humanities, and Vocational Studies
                                </p>
                                <p class="disc">
                                   At Bharti Gyanpeeth, we believe in nurturing future leaders, thinkers, and changemakers through world-class education, 
                                   experienced faculty, industry exposure, and a vibrant campus life. Our emphasis on research, entrepreneurship, and community engagement ensures that students graduate not only with degrees, 
                                   but with purpose and confidence to shape the future.
                                </p>
                                <a href="" id="read_more">READ MORE</a>
                              </div>
                         </div>
                         <div class="col-lg-6 col-sm-12">
                                <div class="leader_ship">
                                      <h2>Ower Campus Leader</h2>
                                       <div class="leader_into">
                                        <div class="row">
                                          <div class="col-lg-3 col-sm-12">
                                                <div class="intro-card">
                                                  <div class="intro-pic">
                                                  <img src="doc/chairman.jpg" alt="" id="pic">
                                                  </div>
                                                  <p id="post">Chairman </p>
                                                </div>
                                          </div>
                                          <div class="col-lg-3 col-sm-12">
                                                 <div class="intro-card">
                                                   <div class="intro-pic">
                                                  <img src="doc/chancellor.jpg" alt="" id="pic">
                                                  </div>
                                                  <p id="post">Chancellor</p>
                                                </div>
                                          </div>
                                          <div class="col-lg-3 col-sm-12">
                                                  <div class="intro-card">
                                                     <div class="intro-pic">
                                                  <img src="doc/deputy-direcrtor.jpg" alt="" id="pic">
                                                </div>
                                                <p id="post">Dy.Director</p>
                                                </div>
                                          </div>
                                          <div class="col-lg-3 col-sm-12">
                                                 <div class="intro-pic">
                                                  <img src="doc/vice.jpg" alt="" id="pic">
                                                   </div>
                                                   <p id="post">Vice Chancellor</p>
                                                </div>
                                          </div>
                                        </div>
                                       </div>
                                </div>
                         </div>
                  </div>
           </div>
 </section>
<section class="sub-part">
  <div class="container py-5">
    <h3 class="text-center mb-4" style="color: #125A33;">Latest Highlights</h3>
    <div class="row g-4">
      <div class="col-lg-4 col-sm-12">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-header  bg-success text-white fw-bold text-center">🎓 Admissions</div>
          <div class="card-body">
            <marquee direction="up" scrollamount="2" height="150px">
              <p>Admissions open for 2025-26 batch!</p>
              <p>Apply now to secure your seat.</p>
              <p>Scholarships available for meritorious students.</p>
            </marquee>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-header  bg-success text-white text-dark fw-bold text-center">📅 Events</div>
          <div class="card-body">
            <marquee direction="up" scrollamount="2" height="150px">
              <p>Orientation starts on 1st September.</p>
              <p>AI & Robotics Seminar next month.</p>
              <p>Don’t miss the Annual Fest - GYANOTSAV!</p>
            </marquee>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <div class="card shadow-sm h-100 border-0">
          <div class="card-header  bg-success text-white fw-bold text-center">🏆 Opportunities</div>
          <div class="card-body">
            <marquee direction="up" scrollamount="2" height="150px">
              <p>Campus placement drive from 10th October.</p>
              <p>Internships with top companies.</p>
              <p>Skill workshops every weekend.</p>
            </marquee>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="total-quantity">
           <div class="acutal-quantity">
            <p id="count">15</p>
            <p id="type">YEARS OF LEGACY</p>
           </div>
           <div class="acutal-quantity">
            <p id="count">20</p>
            <p id="type">HIERING PATNER</p>
           </div>
            <div class="acutal-quantity">
            <p id="count">25</p>
            <p id="type">DEPARTMENT</p>
           </div>
            <div class="acutal-quantity">
            <p id="count">200</p>
            <p id="type">FACULTY MEMBERS</p>
           </div>
            <div class="acutal-quantity">
            <p id="count">2500</p>
            <p id="type">STUDENTS</p>
           </div>
</section>
<section class="view_apply">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-sm-12">
        <div class="img-card card-1">
          <div class="font-ausome"><i class="fas fa-check"></i></div>
          <div class="text">APPLY ONLINE</div>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="img-card card-2">
          <div class="font-ausome"><i class="fas fa-plus"></i></div>
          <div class="text">FIND PROGRAMS</div>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="img-card card-3">
          <div class="font-ausome"><i class="fas fa-clock"></i></div>
          <div class="text">SCHOLARSHIPS</div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="university_opp py-5">
  <div class="container">
    <h3 class="text-center mb-5" style="color: #125A33;">UNIVERSITY SPECIAL EVENTS</h3>
    <div class="row align-items-center">
      
      <!-- Left Side Image -->
      <div class="col-lg-6 col-sm-12 mb-4 mb-lg-0">
        <div class="university-img w-100 h-100"></div>
      </div>

      <!-- Right Side Events -->
      <div class="col-lg-6 col-sm-12">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="event-card text-center">
              <i class="fas fa-music fa-2x mb-2"></i>
              <h5>Annual Cultural Fest</h5>
            </div>
          </div>
          <div class="col-md-6">
            <div class="event-card text-center">
              <i class="fas fa-futbol fa-2x mb-2"></i>
              <h5>Sports Meet</h5>
            </div>
          </div>
          <div class="col-md-6">
            <div class="event-card text-center">
              <i class="fas fa-laptop-code fa-2x mb-2"></i>
              <h5>Tech Fest / Hackathon</h5>
            </div>
          </div>
          <div class="col-md-6">
            <div class="event-card text-center">
              <i class="fas fa-user-graduate fa-2x mb-2"></i>
              <h5>Convocation Ceremony</h5>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="recuriters py-5" style="background-color: #f4f4f4;">
  <div class="container">
    <h3 class="text-center mb-4" style="color: #125A33;">OUR RECRUITERS</h3>

    <div class="recruiter-marquee">
      <div class="marquee-content">
        <img src="doc/alka.png" alt="TCS">
        <img src="doc/buyzu.png" alt="Wipro">
        <img src="doc/radiant.png" alt="Infosys">
        <img src="doc/talbroc.png" alt="IBM">
        <img src="doc/tata_steel.png" alt="Accenture">
        <!-- Add more logos as needed -->
      </div>
    </div>

  </div>
</section>
<section class="approval py-5" style="background-color: white;">
  <div class="container">
    <h3 class="text-center mb-5" style="color: #125A33;">Approvals & Affiliated Universities</h3>
    <div class="row text-center">

      <!-- Box 1 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="approval-box p-4 shadow-sm bg-white rounded">
          <i class="fas fa-university fa-2x mb-3" style="color: #125A33;"></i>
          <h5>UGC Approved</h5>
          <p>Recognized by the University Grants Commission (UGC).</p>
        </div>
      </div>

      <!-- Box 2 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="approval-box p-4 shadow-sm bg-white rounded">
          <i class="fas fa-certificate fa-2x mb-3" style="color: #125A33;"></i>
          <h5>AICTE Approved</h5>
          <p>Approved by All India Council for Technical Education.</p>
        </div>
      </div>

      <!-- Box 3 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="approval-box p-4 shadow-sm bg-white rounded">
          <i class="fas fa-star fa-2x mb-3" style="color: #125A33;"></i>
          <h5>NAAC Accredited</h5>
          <p>Accredited for quality education by NAAC.</p>
        </div>
      </div>

      <!-- Box 4 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="approval-box p-4 shadow-sm bg-white rounded">
          <i class="fas fa-school fa-2x mb-3" style="color: #125A33;"></i>
          <h5>Affiliated Universities</h5>
          <p>Connected with top Indian universities for various programs.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="apply_admission py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <h3 class="text-center mb-5" style="color: #125A33;">Apply for Admission / Enquiry</h3>
    <div class="row align-items-center">
      
      <!-- Left Image Banner -->
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="doc/top_company.webp" alt="Admission Banner" class="img-fluid rounded shadow">
      </div>

      <!-- Right Form -->
      <div class="col-md-6">
        <div class="p-4 rounded shadow-sm" style="background-color: #125A33; color:white;">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" placeholder="Enter your phone" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Query</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Write your message..." required></textarea>
            </div>
            <button type="submit" class="btn" style="background-color:#927037; color: white;">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="social-media py-5" style="background-color: white;">
  <div class="container text-center">
    <h3 class="mb-4" style="color: #125A33;">Connect with Us</h3>
    <div class="d-flex justify-content-center gap-4 flex-wrap">

      <!-- Facebook -->
      <a href="#" class="social-icon facebook" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>

      <!-- Twitter -->
      <a href="#" class="social-icon twitter" target="_blank">
        <i class="fab fa-twitter"></i>
      </a>

      <!-- Instagram -->
      <a href="#" class="social-icon instagram" target="_blank">
        <i class="fab fa-instagram"></i>
      </a>

      <!-- LinkedIn -->
      <a href="#" class="social-icon linkedin" target="_blank">
        <i class="fab fa-linkedin-in"></i>
      </a>

      <!-- YouTube -->
      <a href="#" class="social-icon youtube" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>

    </div>
  </div>
</section>
<?php include('footer.php'); ?>
</body>
</html>
