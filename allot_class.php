<?php 
include('db.php');

// Fetch class details for allotment
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM class_room WHERE id='$id'";
    $result = pg_query($conn, $query);
    $res = pg_fetch_assoc($result);
}

// Handle form submit
if(isset($_POST['submit'])){
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $day = $_POST['day'];
    $period = $_POST['period'];
    $department = $_POST['department'];
    $branch = $_POST['branch'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $room_no = $_POST['room_no'];
    $class_code = $_POST['class_code'];
    $batch = $_POST['batch'];
    $name = $_POST['full_name'];
    $id = $_POST['employee_id'];

    $query = "INSERT INTO allot(subject_code,subject_name,day,period,department,branch,program,semester,section,room_no,class_code,batch,full_name,employee_id) 
              VALUES('$subject_code','$subject_name','$day','$period','$department','$branch','$program','$semester','$section','$room_no','$class_code','$batch','$name','$id')";
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
<title>Allot Period</title>
<style>
body { font-family: 'Segoe UI', sans-serif; background:#f4f6f9; }
.main-content { padding:20px; }
.topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.card-custom { border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); }
.table-responsive { overflow-x:auto; }
</style>
</head>
<body>
<?php include('navbar.php'); ?>

<main class="main-content">
     <header class="topbar d-flex justify-content-between mb-3">
    <h1 class="h4 fw-bold text-primary">Allotted List</h1>
    <div class="profile fw-semibold">Welcome, <?= ($role_type == 'students' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </header>

    <!-- Existing Allotments -->
    <div class="card card-custom p-4">
        <h2 class="h5 mb-3 text-secondary">Existing Allotments</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
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
                        <th>Period</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT DISTINCT ON (subject_code) * FROM allot WHERE class_code='{$res['class_code']}' ORDER BY subject_code";
                    $result=pg_query($conn,$query);
                    while($row=pg_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['subject_code'];?></td>
                            <td><?php echo $row['subject_name'];?></td>
                            <td><?php echo $row['class_code'];?></td>
                            <td><?php echo $row['department'];?></td>
                            <td><?php echo $row['branch'];?></td>
                            <td><?php echo $row['program'];?></td>
                            <td><?php echo $row['semester'];?></td>
                            <td><?php echo $row['section'];?></td>
                            <td><?php echo $row['room_no'];?></td>
                            <td><?php echo $row['batch'];?></td>
                            <td>
                                <a href="time_table.php?class_code=<?php echo urlencode($row['class_code']); ?>" 
                                   class="btn btn-sm btn-success">
                                    <i class="fas fa-calendar-alt"></i> View
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Allot Modal -->
<div class="modal fade" id="allotModal" tabindex="-1" aria-labelledby="allotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="allotModalLabel">Allot Subject to Period</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Subject Code</label>
              <select name="subject_code" class="form-select" required>
                <option value="">--select--</option>
                <?php 
                $result = pg_query($conn, "SELECT * FROM subject");
                while($row = pg_fetch_assoc($result)){ ?>
                  <option value="<?php echo $row['subject_code']; ?>"><?php echo $row['subject_code']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Subject Name</label>
              <select name="subject_name" class="form-select" required>
                <option value="">--select--</option>
                <?php 
                $result = pg_query($conn, "SELECT * FROM subject");
                while($row = pg_fetch_assoc($result)){ ?>
                  <option value="<?php echo $row['subject_name']; ?>"><?php echo $row['subject_name']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Day</label>
              <select name="day" class="form-select" required>
                <option value="">--select--</option>
                <?php foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $d){ ?>
                  <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Period</label>
              <select name="period" class="form-select" required>
                <option value="">--select--</option>
                <?php for($i=1;$i<=8;$i++){ ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?> Period</option>
                <?php } ?>
              </select>
            </div>

            <!-- Hidden class info -->
            <input type="hidden" name="department" value="<?php echo $res['department']; ?>">
            <input type="hidden" name="branch" value="<?php echo $res['branch']; ?>">
            <input type="hidden" name="program" value="<?php echo $res['program']; ?>">
            <input type="hidden" name="semester" value="<?php echo $res['semester']; ?>">
            <input type="hidden" name="section" value="<?php echo $res['section']; ?>">
            <input type="hidden" name="room_no" value="<?php echo $res['room_no']; ?>">
            <input type="hidden" name="class_code" value="<?php echo $res['class_code']; ?>">
            <input type="hidden" name="batch" value="<?php echo $res['batch']; ?>">

            <div class="col-md-6">
              <label class="form-label">Faculty</label>
              <select name="full_name" class="form-select" required>
                <option value="">--select--</option>
                <?php 
                $faculty = pg_query($conn, "SELECT * FROM faculty");
                while($f = pg_fetch_assoc($faculty)) { ?>
                  <option value="<?php echo $f['full_name']; ?>"><?php echo $f['full_name']." (".$f['employee_id'].")"; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Faculty ID</label>
              <select name="employee_id" class="form-select" required>
                <option value="">--select--</option>
                <?php 
                $faculty = pg_query($conn, "SELECT * FROM faculty");
                while($f = pg_fetch_assoc($faculty)) { ?>
                  <option value="<?php echo $f['employee_id']; ?>"><?php echo $f['employee_id']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Allot</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
