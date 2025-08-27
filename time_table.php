<?php 
include('db.php');
if(isset($_GET['class_code'])){
$class_code = $_GET['class_code'];
$query="SELECT*FROM allot WHERE class_code='$class_code'";
$result=pg_query($conn,$query);
while($res=pg_fetch_array($result)){
  $subject_code = $res['subject_code'];
  $subject_name  = $res['subject_name'];
  $day = $res['day'];
  $period = $res['period'];
  $department = $res['department'];
  $branch = $res['branch'];
  $program = $res['program'];
  $semester = $res['semester'];
  $section = $res['section'];
  $room_no = $res['room_no'];
  $class_code = $res['class_code'];
  $batch = $res['batch'];
  $allot = $res['allot'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Allotment</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
* { margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif; }
body { display:flex; min-height:100vh; background:#f4f6f9; color:#333; }
#h2{
        text-align:center;
        margin-bottom:25px;
        font-size:26px;
        color:#333;
        margin:5px;
    }
    .timetable {
      display:grid;
      grid-template-columns: 80px repeat(8, 1fr); /* Day + 8 periods */
      gap:4px;
      background:#fff;
      padding:5px;
      border-radius:10px;
      box-shadow:0 4px 12px rgba(0,0,0,0.15);
      margin:10px;
    }
    .box {
      border:1px solid #ddd;
      padding:5px;
      text-align:center;
      background:#fafafa;
      border-radius:6px;
      font-size:14px;
      min-height:70px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }
    .header {
      font-weight:bold;
      background:#007bff;
      color:white;
      font-size:15px;
    }
    .day {
      font-weight:bold;
      background:#f8f9fc;
      color:#333;
    }
    .subject {
      font-size:14px;
      font-weight:bold;
      color:#222;
    }
    .room {
      font-size:12px;
      color:#555;
    }
    .faculty {
      font-size:11px;
      color:#888;
    }
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<main class="main-content">
<header class="topbar">
  <h1>Class - Time Table</h1>
  <div class="profile">Admin ▼</div>
</header>

<h2 id="h2">📅 <?php echo $program; ?>  Semester-<?php echo  $semester; ?> - Section-<?php echo $section; ?></h2>

<div class="timetable">
  <!-- Header Row -->
  <div class="box header">Day / Period</div>
  <div class="box header">1</div>
  <div class="box header">2</div>
  <div class="box header">3</div>
  <div class="box header">4</div>
  <div class="box header">5</div>
  <div class="box header">6</div>
  <div class="box header">7</div>
  <div class="box header">8</div>

  <!-- Monday -->
  <div class="box day">Monday</div>
  <div class="box">
      <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
      <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
        <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
    </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?></div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>

  <!-- Tuesday -->
  <div class="box day">Tuesday</div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuseday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
      </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?></div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?></div>

  <!-- Wednesday -->
  <div class="box day">Wednesday</div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?></div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
      </div>

  <!-- Thursday -->
  <div class="box day">Thursday</div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>

  <!-- Friday -->
  <div class="box day">Friday</div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>

  <!-- Saturday -->
  <div class="box day">Saturday</div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='1' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='2' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='3' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='4' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?></div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='5' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='6' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='7' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='8' AND class_code='$class_code'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['allot']; ?></div>
        <?php } ?>

  </div>
</div>
  
</section>
</form>
</main>
</body>
</html>
