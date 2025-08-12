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

   
 
  </style>
</head>
<body>
<?php 
include('hd_cm.php');
?>
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


<?php include('footer.php'); ?>
</body>
</html>