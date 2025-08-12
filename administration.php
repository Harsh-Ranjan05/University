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

   .administration-section {
    background-color: #f9f9f9;
    padding: 50px 0;
    font-family: Arial, sans-serif;
}

.section-title {
    text-align: center;
    font-size: 36px;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 20px;
}

.admin-intro {
    text-align: center;
    max-width: 900px;
    margin: 0 auto 40px auto;
    font-size: 18px;
    color: #555;
    line-height: 1.6;
}

.admin-cards {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.admin-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
    width: 250px;
    text-align: center;
    transition: transform 0.3s;
}

.admin-card:hover {
    transform: translateY(-5px);
}

.admin-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
}

.admin-card h3 {
    font-size: 20px;
    margin: 15px 0 5px;
    color: #34495e;
}

.admin-card p {
    font-size: 14px;
    color: #777;
}


  </style>
</head>
<body>
<?php include('hd_cm.php');
?>
<section class="administration-section">
    <div class="container">
        <h2 class="section-title">University Administration</h2>
        <p class="admin-intro">
            The administration of Bharti Gyanpeeth University is dedicated to fostering an environment of academic excellence, innovation, 
            and holistic development. Our leadership team works tirelessly to ensure that every student receives the highest quality of 
            education, support, and opportunities for growth.
        </p>

        <div class="admin-cards">
            <!-- Chancellor -->
            <div class="admin-card">
                <img src="doc/chancellor.jpg" alt="Chancellor">
                <h3>Prof. Rajesh Sharma</h3>
                <p><strong>Chancellor</strong></p>
                <p>Prof. Sharma leads the university with a vision to make it a hub of research, innovation, and global collaboration.</p>
            </div>

            <!-- Vice Chancellor -->
            <div class="admin-card">
                <img src="doc/vice.jpg" alt="Vice Chancellor">
                <h3>Dr. Anjali Verma</h3>
                <p><strong>Vice Chancellor</strong></p>
                <p>Dr. Verma focuses on academic excellence, curriculum enhancement, and student empowerment.</p>
            </div>

            <!-- Registrar -->
            <div class="admin-card">
                <img src="doc/registar.png" alt="Registrar">
                <h3>Mr. Amit Kumar</h3>
                <p><strong>Registrar</strong></p>
                <p>Mr. Kumar ensures smooth functioning of the university through effective governance and administration.</p>
            </div>

            <!-- Dean -->
            <div class="admin-card">
                <img src="doc/chairman.jpg" alt="Dean">
                <h3>Prof. Vikram Singh</h3>
                <p><strong>Dean of Academics</strong></p>
                <p>Prof. Singh plays a vital role in fostering research, faculty development, and academic growth.</p>
            </div>
        </div>
    </div>
</section>

  
<?php include('footer.php'); ?>
</body>
</html>
