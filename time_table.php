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
  $department_1 = $res['department'];
  $branch_1 = $res['branch'];
  $program_1 = $res['program'];
  $semester_1 = $res['semester'];
  $section_1 = $res['section'];
  $room_no = $res['room_no'];
  $class_code_1 = $res['class_code'];
  $batch = $res['batch'];
  $full_name = $res['full_name'];
}
}
?>

<body>
  <div class="body_container">
<?php include('navbar.php'); ?>
<main class="main-content">
<header class="topbar">
  <h1>Class - Time Table</h1>
  <div class="profile">Admin ▼</div>
</header>

<h2 id="h2">📅 <?php echo $program_1; ?>  Semester-<?php echo  $semester_1; ?> Section-<?php echo $section_1; ?></h2>

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
        $query="SELECT*FROM allot WHERE day='Monday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
      <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
        <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
    </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?></div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Monday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>

  <!-- Tuesday -->
  <div class="box day">Tuesday</div>
  <div class="box">
       <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuseday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
      </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?></div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> <?php 
        $query="SELECT*FROM allot WHERE day='Tuesday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?></div>

  <!-- Wednesday -->
  <div class="box day">Wednesday</div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?></div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Wednesday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
      </div>

  <!-- Thursday -->
  <div class="box day">Thursday</div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Thursday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>

  <!-- Friday -->
  <div class="box day">Friday</div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
     <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> 
    <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
      </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Friday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>

  <!-- Saturday -->
  <div class="box day">Saturday</div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='1' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='2' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
     <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='3' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box"> <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='4' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
      <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?></div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='5' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='6' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
       <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
    <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='7' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>
  </div>
  <div class="box">
   <?php 
        $query="SELECT*FROM allot WHERE day='Saturday' AND period='8' AND class_code='$class_code_1'";
        $result=pg_query($conn,$query);
        while($res=pg_fetch_array($result)){
      ?>
        <div class="subject"><?php echo $res['subject_name']; ?></div>
        <div class="room">Room-<?php echo $res['room_no']; ?></div>
        <div class="faculty"><?php echo $res['full_name']; ?></div>
        <?php } ?>

  </div>
</div>
        </div>
</section>
</form>
</main>
</body>
