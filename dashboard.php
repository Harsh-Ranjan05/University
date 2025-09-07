<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }

    /* Cards */
    .cards {
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
      gap:20px;
      padding:20px;
    }
    .card {
      background:white;
      padding:20px;
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      text-align:center;
    }
    .card h3 { font-size:18px; margin-bottom:8px; color:#333; }
    .card p { font-size:22px; font-weight:bold; color:#007bff; }

    /* Notice Section */
    .notice-section {
      margin:20px;
      background:#fff;
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      padding:20px;
    }
    .notice-section h2 {
      font-size:20px;
      margin-bottom:10px;
      color:#007bff;
      border-bottom:2px solid #f1f1f1;
      padding-bottom:8px;
    }
    .notice-list {
      list-style:none;
    }
    .notice-list li {
      padding:10px;
      border-bottom:1px solid #eee;
      font-size:15px;
      color:#333;
    }
    .notice-list li:last-child { border-bottom:none; }
    .notice-date {
      font-size:13px;
      color:#888;
      margin-left:5px;
    }
    .notice-grid {
  display: grid;
  grid-template-columns: 1fr 1fr; /* two equal halves */
  gap: 20px;
}
.notice-half h2 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #007bff;
  border-bottom: 2px solid #f1f1f1;
  padding-bottom: 6px;
}
#day{
  color:red;
}
  </style>
</head>
<body>

  <?php include('navbar.php'); ?>
  <!-- Main Content -->
  <main class="main-content">
    <header class="topbar">
      <h1>Dashboard</h1>
      <div class="profile">Welcome, <?php echo $role_type; ?></div>
    </header>

    <!-- Cards -->
  <?php if($role_type=='admin'){?>
    <section class="cards">
      <div class="card">
        <?php 
        $query="SELECT*FROM students";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Students</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <?php 
        $query="SELECT*FROM faculty";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Faculty</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <?php 
        $query="SELECT*FROM contact_us";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Query Today</h3>
        <p><?php echo $total; ?></p>
      </div>
    </section>
    <?php } elseif($role_type=='faculty'){?>
       <section class="cards">
      <div class="card">
        <?php 
        $query="SELECT*FROM allot WHERE employee_id='$employee_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Class Allotted</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <?php 
        $query="SELECT*FROM feedback WHERE role_type='student' AND faculty_id='$employee_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Feedback Today</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <h3>Upcoming Holiday </h3>
       <?php 
$query="SELECT * FROM notice WHERE status='1' AND notice_type='Festival Holiday' LIMIT 1";
$result=pg_query($conn,$query);
while($res=pg_fetch_array($result)){
?>
    <p id="day"><?php echo $res['title']; ?></p>
    <p><?php echo $res['description']; ?></p>
<?php }  ?>

      </div>
    </section>
      <?php }elseif($role_type=='student'){?>
         <section class="cards">
      <div class="card">
        <?php 
        $query="SELECT*FROM allot WHERE employee_id='$employee_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Class Allotted</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <?php 
        $query="SELECT*FROM feedback WHERE role_type='faculty' AND student_id='$student_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Feedback Today</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card">
        <h3>Upcoming Holiday </h3>
       <?php 
$query="SELECT * FROM notice WHERE status='1' AND notice_type='Festival Holiday'";
$result=pg_query($conn,$query);
while($res=pg_fetch_array($result)){
?>
    <p id="day"><?php echo $res['title']; ?></p>
    <p><?php echo $res['description']; ?></p>
<?php }  ?>

      </div>
    </section>
        <?php } ?>

    <!-- Notice Section -->
    <!-- Notice Section -->
<section class="notice-section">
  <div class="notice-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
    
    <!-- Left Half: Latest Notices -->
    <div class="notice-half">
      <h2>📢 Latest Notices</h2>
      <ul class="notice-list">
        <?php 
        include('db.php');
        $query="SELECT*FROM notice WHERE notice_type='Academic Notices' OR notice_type='Examination Notices' OR notice_type='Administration Notices' OR notice_type='Job / Placement / Internship Notices'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
        ?>
        <li><?php echo $res['description']; ?> </li>
       <?php } ?>
      </ul>
    </div>

    <!-- Right Half: Upcoming Events -->
    <div class="notice-half">
      <h2>🎉 Upcoming Events</h2>
      <ul class="notice-list">
              <?php 
        include('db.php');
        $query="SELECT*FROM notice WHERE  notice_type='Event/Program Notices' LIMIT 1";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
        ?>
        <li><?php echo $res['description']; ?> </li>
       <?php } ?>
    </div>

  </div>
</section>

  </main>

</body>
</html>
