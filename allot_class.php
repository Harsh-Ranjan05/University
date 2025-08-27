<?php 
include('db.php');




// Fetch data if editing
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM class_room WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($res = pg_fetch_array($result)){
        $department = $res['department'];
        $branch     = $res['branch'];
        $program    = $res['program'];
        $semester   = $res['semester'];
        $section    = $res['section'];
        $room_no    = $res['room_no'];
        $class_code    = $res['class_code'];
        $batch      = $res['batch'];
    }
}

if(isset($_POST['submit'])){
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $day     = $_POST['day'];
    $period       = $_POST['period'];
    $department   = $_POST['department'];
    $branch       = $_POST['branch'];
     $program      = $_POST['program'];
    $semester     = $_POST['semester'];
    $section      = $_POST['section'];
    $room_no      = $_POST['room_no'];
    $class_code       = $_POST['class_code'];
    $batch        = $_POST['batch'];
    $allot        = $_POST['allot'];

    $query = "INSERT INTO allot(subject_code,subject_name,day,period,department,branch,program,semester,section,room_no,class_code,batch,allot) 
              VALUES('$subject_code','$subject_name','$day','$period','$department','$branch','$program','$semester','$section','$room_no','$class_code','$batch','$allot')";
    $result = pg_query($conn, $query);
    if($result){
        echo "<script>alert('Added Successfully..'); window.location='class.php';</script>";
    } else {
        echo "<script>alert('Failed To Add..'); window.location='class.php';</script>";
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
.table-container { padding:20px; overflow-x:auto; }
table {
  width:100%;
  border-collapse:collapse;
  background:#fff;
  border-radius:8px;
  overflow:hidden;
  box-shadow:0 2px 5px rgba(0,0,0,0.1);
}
th, td {
  padding:12px 15px;
  text-align:left;
  border-bottom:1px solid #eee;
}
th { background:#f8f9fc; }
tr:hover { background:#f1f1f1; }
.btn-assign {
  padding:8px 16px;
  background:#007bff;
  color:white;
  border:none;
  border-radius:6px;
  cursor:pointer;
  font-size:14px;
}
.btn-assign:hover { background:#0056b3; }
.btn-assign{
    text-decoration:none;
}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<main class="main-content">
<header class="topbar">
  <h1>Class - Allot Period</h1>
  <div class="profile">Admin ▼</div>
</header>

<form action="" method="post">
<section class="table-container">
  <table>
    <thead>
      <tr>
        <th>Subject Code</th>
        <th>Subject Name</th>
        <th>Day</th>
        <th>Period</th>
        <th>Allotted Faculty</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       <td>
  <select name="subject_code" id="subject_code" required>
    <option value="">--select-subject-code--</option>
    <?php 
    $query="SELECT * FROM subject";
    $result = pg_query($conn, $query);
    while($row = pg_fetch_array($result)){ ?>
      <option value="<?php echo $row['subject_code']; ?>" >
        <?php echo $row['subject_code']; ?>
      </option>
    <?php } ?>
  </select>
</td>

<td>
  <select name="subject_name" id="subject_name" required>
    <option value="">--select-subject-name--</option>
    <?php 
    $query="SELECT * FROM subject";
    $result = pg_query($conn, $query);
    while($row = pg_fetch_array($result)){ ?>
      <option value="<?php echo $row['subject_name']; ?>">
        <?php echo $row['subject_name']; ?>
      </option>
    <?php } ?>
  </select>
</td>
         <td>

<select name="day" id="day" required>
    <option value="">--Select Day--</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
</select>

            </td>
        <td>
          <select id="period" name="period" required>
            <option value="">-- Select Period --</option>
            <?php for($i=1;$i<=8;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?><?php echo ($i==1?"st":($i==2?"nd":($i==3?"rd":"th"))); ?> Period</option>
            <?php } ?>
          </select>
        </td>
      
         <input type="hidden" name="department" id="" value="<?php echo $department;?>">

        <input type="hidden" name="branch" id="" value="<?php echo $branch; ?>">

          <input type="hidden" name="program" id="" value="<?php echo $program; ?>">
         <input type="hidden" name="semester" value="<?php echo $semester; ?>">

         <input type="hidden" name="section" value="<?php echo $section; ?>">

        <input type="hidden" name="room_no" value="<?php echo $room_no; ?>">
          <input type="hidden" name="class_code" value="<?php echo $class_code; ?>">
        <input type="hidden" name="batch" value="<?php echo $batch; ?>">

        <td>
          <select name="allot" required>
            <option value="">--select-faculty--</option>
            <?php 
            $faculty_result = pg_query($conn, "SELECT * FROM faculty");
            while($f = pg_fetch_array($faculty_result)){ ?>
              <option value="<?php echo $f['full_name']; ?>"><?php echo $f['full_name']; ?></option>
            <?php } ?>
          </select>
        </td>

        <td><button name="submit" type="submit" class="btn-assign">Allot</button></td>
      </tr>
    </tbody>
  </table>
    <section class="table-container">
      <table>
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Class Code</th>
            <th>Department</th>
            <th>Branch</th>
            <th>Program</th>
            <th>Semester</th>
            <th>Section</th>
            <th>Room No.</th>
            <th>Batch</th>
            <th>Time Table</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         $query="SELECT * FROM allot WHERE class_code='$class_code'";
         $result=pg_query($conn,$query);
         while($res=pg_fetch_array($result)){
         ?>
            <tr>
                <td><?php echo $res['subject_code'];?></td>
                <td><?php echo $res['subject_name'];?></td>
                <td><?php echo $res['class_code']; ?></td>
              <td><?php echo $res['department'];?></td>
              <td><?php echo $res['branch']; ?></td>
              <td><?php echo $res['program']; ?></td>
              <td><?php echo $res['semester']; ?></td>
              <td><?php echo $res['section']; ?></td>
              <td><?php echo $res['room_no']; ?></td>
              <td><?php echo $res['batch']; ?></td>
              <td>
  <a href="time_table.php?class_code=<?php echo urlencode($res['class_code']); ?>" 
     class="btn-assign">View</a>
</td>
</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
  
</section>
</form>
</main>
</body>
</html>
