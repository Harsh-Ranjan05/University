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
  <?php 
  include('hd_cm.php');
  ?>
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
  
<?php include('footer.php'); ?>

</body>
</html>
