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
<?php 
include('hd_cm.php');
?>
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


<?php include('footer.php'); ?>
</body>
</html>