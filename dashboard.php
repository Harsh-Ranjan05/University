<?php include('db.php'); ?>

<body>

  <?php include('navbar.php'); ?>
  <!-- Main Content -->
  <main class="main-content">
     <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Dashboard</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'student' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?>
</div>
  </header>

    <!-- Cards -->
  <?php if($role_type=='admin'){?>
    <section class="cards_1">
      <div class="card_1">
        <?php 
        $query="SELECT*FROM students";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Students</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
        <?php 
        $query="SELECT*FROM faculty";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Faculty</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
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
       <section class="cards_1">
      <div class="card_1">
        <?php 
        $query="SELECT*FROM allot WHERE employee_id='$employee_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Class Allotted</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
        <?php 
        $query="SELECT*FROM feedback WHERE role_type='student' AND faculty_id='$employee_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Feedback Today</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
        <h3>Upcoming Holiday </h3>
    <?php 
$query = "SELECT * FROM notice WHERE status='1' AND notice_type='Festival Holiday' LIMIT 1";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while ($res = pg_fetch_array($result)) {
        ?>
        <p id="day_1"><?php echo htmlspecialchars($res['title']); ?></p>
        <p><?php echo htmlspecialchars($res['description']); ?></p>
        <?php
    }
} else {
    ?>
    <p>No holiday Upcoming</p>
    <?php
}
?>


      </div>
    </section>
      <?php }elseif($role_type=='student'){?>
         <section class="cards_1">
      <div class="card_1">
      <?php
// Total days student was present
$query_present = "SELECT * FROM attendance WHERE student_id='$student_id' AND day='Present'";
$result_present = pg_query($conn, $query_present);
$days_present = pg_num_rows($result_present);

// Total days recorded for this student
$query_total = "SELECT * FROM attendance WHERE student_id='$student_id'";
$result_total = pg_query($conn, $query_total);
$total_days = pg_num_rows($result_total);

// Calculate percentage
if ($total_days > 0) {
    $percentage = ($days_present / $total_days) * 100;
} else {
    $percentage = 0;
}
?>



<h3>Total Attendance </h3>
<p><?php echo number_format($percentage, 2); ?>%</p>

      </div>
      <div class="card_1">
        <?php 
        $query="SELECT*FROM feedback WHERE role_type='faculty' AND student_id='$student_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Feedback Today</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
        <h3>Upcoming Holiday </h3>
     <?php 
$query = "SELECT * FROM notice WHERE status='1' AND notice_type='Festival Holiday' LIMIT 1";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while ($res = pg_fetch_array($result)) {
        ?>
        <p id="day_1"><?php echo htmlspecialchars($res['title']); ?></p>
        <p><?php echo htmlspecialchars($res['description']); ?></p>
        <?php
    }
} else {
    ?>
    <p>No holiday Upcoming.</p>
    <?php
}
?>
      </div>
    </section>
        <?php }else{ ?>
          <section class="cards_1">
      <div class="card_1">
      <?php
// Total days student was present
$query_present = "SELECT * FROM attendance WHERE student_id='$student_id' AND day='Present'";
$result_present = pg_query($conn, $query_present);
$days_present = pg_num_rows($result_present);

// Total days recorded for this student
$query_total = "SELECT * FROM attendance WHERE student_id='$student_id'";
$result_total = pg_query($conn, $query_total);
$total_days = pg_num_rows($result_total);

// Calculate percentage
if ($total_days > 0) {
    $percentage = ($days_present / $total_days) * 100;
} else {
    $percentage = 0;
}
?>



<h3>Child Attendance </h3>
<p><?php echo number_format($percentage, 2); ?>%</p>

      </div>
      <div class="card_1">
        <?php 
        $query="SELECT*FROM feedback WHERE role_type='faculty' AND student_id='$student_id'";
        $result=pg_query($conn,$query);
        $total = pg_num_rows($result);
        ?>
        <h3>Total Feedback Today</h3>
        <p><?php echo $total; ?></p>
      </div>
      <div class="card_1">
        <h3>Upcoming Holiday </h3>
     <?php 
$query = "SELECT * FROM notice WHERE status='1' AND notice_type='Festival Holiday' LIMIT 1";
$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while ($res = pg_fetch_array($result)) {
        ?>
        <p id="day_1"><?php echo htmlspecialchars($res['title']); ?></p>
        <p><?php echo htmlspecialchars($res['description']); ?></p>
        <?php
    }
} else {
    ?>
    <p>No holiday Upcoming.</p>
    <?php
}
?>
      </div>
    </section>
          <?php }?>

    <!-- Notice Section -->
    <!-- Notice Section -->
<section class="notice-section_1">
  <div class="notice-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
    
    <!-- Left Half: Latest Notices -->
    <div class="notice-half_1">
      <h2>📢 Latest Notices</h2>
 <ul class="notice-list_1">
<?php 
include('db.php');

$query = "
   SELECT * FROM notice
WHERE notice_type='Academic Notices'
   OR notice_type='Examination Notices'
   OR notice_type='Administration Notices'
   OR notice_type='Job / Placement / Internship Notices'
   OR notice_type='Event/Program Notices'
   OR notice_type='Other Notice Types'
   AND created_on >= NOW() - INTERVAL '20 days'
ORDER BY created_on DESC;

";

$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while($res = pg_fetch_array($result)){
        ?>
        <li>
            <?php echo htmlspecialchars($res['description']); ?>
          <?php  if($role_type=='student'){?>
              <?php if (!empty($res['link'])) { ?>
                <a href="<?php echo htmlspecialchars($res['link']); ?>" target="_blank" class="btn btn-success btn-sm ms-2">Apply</a>
            <?php } ?>
            <?php }else{?>
              <button type="button" class="btn btn-warning btn-sm">
            Only For Students
        </button>
              <?php } ?>
        </li>
        <?php
    }
} else {
    ?>
    <li>No latest notice available.</li>
    <?php
}
?>
</ul>



    </div>

    <!-- Right Half: Upcoming Events -->
    <div class="notice-half_1">
      <h2>🎉 Upcoming Events</h2>
     <ul class="notice-list_1">
<?php 
include('db.php');

// Fetch the latest Event/Program notice from last 20 days
$query = "
    SELECT * FROM notice
    WHERE notice_type = 'Event/Program Notices'
      AND created_on >= NOW() - INTERVAL '20 days'
    ORDER BY created_on DESC
    LIMIT 1
";

$result = pg_query($conn, $query);

if (pg_num_rows($result) > 0) {
    while($res = pg_fetch_array($result)){
        ?>
        <li>
            <?php echo htmlspecialchars($res['description']); ?>
           <?php  if($role_type=='student'){?>
              <?php if (!empty($res['link'])) { ?>
                <a href="<?php echo htmlspecialchars($res['link']); ?>" target="_blank" class="btn btn-success btn-sm ms-2">Apply</a>
            <?php } ?>
            <?php }else{?>
              <button type="button" class="btn btn-warning btn-sm">
            Only For Students
        </button>
              <?php } ?>
        </li>
        <?php
    }
} else {
    ?>
    <li>No latest event/program notice available.</li>
    <?php
}
?>
</ul>

    </div>

  </div>
</section>

  </main>

</body>

