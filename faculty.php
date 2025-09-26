<?php
include('db.php');

// Insert Faculty
if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $aadhar_no = $_POST['aadhar_no'];
    $pan_no = $_POST['pan_no'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $permanent_address = $_POST['permanent_address'];
    $current_address = $_POST['current_address'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];
    $bank_details = $_POST['bank_details'];

    // File uploads
    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "doc/$photo");

    $signature = $_FILES['signature']['name'];
    move_uploaded_file($_FILES['signature']['tmp_name'], "doc/$signature");

    $certificate = $_FILES['certificate']['name'];
    move_uploaded_file($_FILES['certificate']['tmp_name'], "pdf/$certificate");

    $appointment_letter = $_FILES['appointment_letter']['name'];
    move_uploaded_file($_FILES['appointment_letter']['tmp_name'], "pdf/$appointment_letter");

    $resume = $_FILES['resume']['name'];
    move_uploaded_file($_FILES['resume']['tmp_name'], "pdf/$resume");

    $experience_certificate = $_FILES['experience_certificate']['name'];
    move_uploaded_file($_FILES['experience_certificate']['tmp_name'], "pdf/$experience_certificate");

    $query = "INSERT INTO faculty(
                full_name, father_name, mother_name, dob, gender, blood_group, 
                aadhar_no, pan_no, photo, signature, mobile_no, email, 
                permanent_address, current_address, department, designation, qualification, 
                certificate, appointment_letter, resume, experience_certificates, bank_details
              ) VALUES (
                '$name', '$father_name', '$mother_name', '$dob', '$gender', '$blood_group',
                '$aadhar_no', '$pan_no', '$photo', '$signature', '$mobile_no', '$email',
                '$permanent_address', '$current_address', '$department', '$designation', '$qualification',
                '$certificate', '$appointment_letter', '$resume', '$experience_certificate', '$bank_details'
              )";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Faculty Registered Successfully'); window.location='faculty.php';</script>";
    } else {
        echo "<script>alert('Failed To Register Faculty'); window.location='faculty.php';</script>";
    }
}

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$totalQuery = "SELECT COUNT(*) AS total FROM faculty";
$totalResult = pg_query($conn, $totalQuery);
$totalRow = pg_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

$query = "SELECT * FROM faculty ORDER BY employee_id DESC LIMIT $limit OFFSET $start";
$result = pg_query($conn, $query);
?>


<body>
<?php include('navbar.php'); ?>

<main class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 text-primary">Faculty Management</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFacultyModal">
      <i class="fas fa-plus"></i> Add Faculty
    </button>
  </div>

  <!-- Faculty Table -->
  <div class="card card-custom p-3 table-responsive">
    <h5 class="mb-3">Faculty List</h5>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>S.No.</th>
          <th>Name</th>
          <th>Department</th>
          <th>Designation</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i = $start + 1;
        while($res = pg_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $res['full_name']; ?></td>
          <td><?php echo $res['department']; ?></td>
          <td><?php echo $res['designation']; ?></td>
          <td>
            <a href="view_faculty.php?employee_id=<?php echo urlencode($res['employee_id']); ?>" class="btn btn-success btn-sm">
              <i class="fas fa-eye"></i> View
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-3">
        <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
        </li>
        <?php for($i=1; $i<=$totalPages; $i++){ ?>
        <li class="page-item <?php if($page == $i) echo 'active'; ?>">
          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
        <?php } ?>
        <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>

<!-- Add Faculty Modal -->
<div class="modal fade" id="addFacultyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title">Add Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="section-title">Personal Information</div>
          <div class="row g-3">
            <div class="col-md-4"><input type="text" name="full_name" class="form-control" placeholder="Full Name" required></div>
            <div class="col-md-4"><input type="text" name="father_name" class="form-control" placeholder="Father Name"></div>
            <div class="col-md-4"><input type="text" name="mother_name" class="form-control" placeholder="Mother Name"></div>
            <div class="col-md-4"><input type="date" name="dob" class="form-control" required></div>
            <div class="col-md-4">
              <select name="gender" class="form-select" required>
                <option value="">-- Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="col-md-4">
              <select name="blood_group" class="form-select">
                <option value="">-- Blood Group --</option>
                <option value="A+">A+</option><option value="A-">A-</option>
                <option value="B+">B+</option><option value="B-">B-</option>
                <option value="AB+">AB+</option><option value="AB-">AB-</option>
                <option value="O+">O+</option><option value="O-">O-</option>
              </select>
            </div>
            <div class="col-md-3"><input type="text" name="aadhar_no" class="form-control" placeholder="Aadhar No"></div>
            <div class="col-md-3"><input type="text" name="pan_no" class="form-control" placeholder="PAN No"></div>
            <div class="col-md-6"><input type="text" name="bank_details" class="form-control" placeholder="Bank Name & A/C No"></div>
            <div class="section-title">Contact Information</div>
            <div class="col-md-6"><input type="text" name="mobile_no" class="form-control" placeholder="Mobile No"></div>
            <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email"></div>
            <div class="col-md-6"><textarea name="permanent_address" class="form-control" placeholder="Permanent Address"></textarea></div>
            <div class="col-md-6"><textarea name="current_address" class="form-control" placeholder="Current Address"></textarea></div>
            <div class="section-title">Designation & Academic Qualification</div>
            <div class="col-md-4">
              <select name="department" class="form-select">
                <option value="">-- Department --</option>
                <?php $res=pg_query($conn,"SELECT * FROM department"); while($d=pg_fetch_assoc($res)){ ?>
                <option value="<?php echo $d['department'];?>"><?php echo $d['department'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="designation" class="form-select">
                <option value="">-- Designation --</option>
                <?php $res=pg_query($conn,"SELECT * FROM designation"); while($d=pg_fetch_assoc($res)){ ?>
                <option value="<?php echo $d['designation'];?>"><?php echo $d['designation'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="qualification" class="form-select">
                <option value="">-- Qualification --</option>
                <option value="B.Tech">B.Tech</option>
                <option value="M.Tech">M.Tech</option>
                <option value="PhD">PhD</option>
                <option value="MBA">MBA</option>
              </select>
            </div>

            <!-- File Uploads -->
             <div class="section-title">Upload Documents</div>
        
            <div class="col-md-3">
                <div class="section-title-1">Photo</div><input type="file" name="photo" class="form-control">
            </div>
            <div class="col-md-3">
              <div class="section-title-1">Signature</div>
              <input type="file" name="signature" class="form-control">
            </div>
            <div class="col-md-3"> 
              <div class="section-title-1">Certificate</div>
              <input type="file" name="certificate" class="form-control">
            </div>
            <div class="col-md-3">
                <div class="section-title-1">Appointment Letter</div>
              <input type="file" name="appointment_letter" class="form-control">
            </div>
            <div class="col-md-3">
              <div class="section-title-1">Resume</div>
              <input type="file" name="resume" class="form-control">
            </div>
            <div class="col-md-3"><div class="section-title-1">Experience Certificate</div><input type="file" name="experience_certificate" class="form-control"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Faculty</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
