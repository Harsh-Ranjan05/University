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
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0">
          <?php 
          include('db.php');
          $query="SELECT*FROM notice WHERE notice_type='Event/Program Notices' AND status='1'";
            $result=pg_query($conn,$query);
            while($res=pg_fetch_array($result)){
          ?>
          <img src="doc/<?php echo $res['picture']; ?>" 
               class="card-img-top" alt="Students in classroom">
          <div class="card-body">
            <h6 class="card-title"><?php echo $res['title']; ?></h6>
            <p class="card-text"><?php echo $res['description']; ?></p>
          </div>
          <?php } ?>
        </div>
      </div>

     

    </div>
  </div>
</section>


<?php include('footer.php'); ?>
</body>
</html>