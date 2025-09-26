<?php 
include('db.php');

// Insert Student
if (isset($_POST['submit'])) {
    // Collect POST data
    $name = $_POST['full_name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $category = $_POST['category'];

    // File uploads
    $caste_certificate = $_FILES['caste_certificate']['name'];
    move_uploaded_file($_FILES['caste_certificate']['tmp_name'], "pdf/$caste_certificate");

    $photo = $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "doc/$photo");

    $signature = $_FILES['signature']['name'];
    move_uploaded_file($_FILES['signature']['tmp_name'], "doc/$signature");

    $doc_10th_12th = $_FILES['doc_10th_doc_12th']['name'];
    move_uploaded_file($_FILES['doc_10th_doc_12th']['tmp_name'], "pdf/$doc_10th_12th");

    $aadhar_no = $_POST['aadhar_no'];
    $mobile_no = $_POST['mobile_no'];
    $parent_mobile_no = $_POST['parent_mobile_no'];
    $email = $_POST['email'];
    $permanent_address = $_POST['permanent_address'];
    $current_address = $_POST['current_address'];
    $department = $_POST['department'];
    $branch = $_POST['branch'];
    $program = $_POST['program'];

    // Insert Query
    $query = "INSERT INTO students (
                full_name, father_name, mother_name, dob, gender, blood_group, category,
                caste_certificate, aadhar_no, photo, mobile_no, parent_mobile_no, email,
                permanent_address, current_address, department, branch, program, doc_10th_doc_12th, signature
              ) VALUES (
                '$name', '$father_name', '$mother_name', '$dob', '$gender', '$blood_group', '$category',
                '$caste_certificate', '$aadhar_no', '$photo', '$mobile_no', '$parent_mobile_no', '$email',
                '$permanent_address', '$current_address', '$department', '$branch', '$program', '$doc_10th_12th', '$signature'
              )";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Student Registered Successfully'); window.location='student.php';</script>";
    } else {
        echo "<script>alert('Failed To Register'); window.location='student.php';</script>";
    }
}

// Pagination
$limit = 5; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Total Records
$totalQuery = "SELECT COUNT(*) AS total FROM students";
$totalResult = pg_query($conn, $totalQuery);
$totalRow = pg_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch students
$query = "SELECT * FROM students ORDER BY student_id DESC LIMIT $limit OFFSET $start";
$result = pg_query($conn, $query);
?>


<body>
<?php include('navbar.php'); ?>

<main class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 text-primary">Student Management</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
      <i class="fas fa-plus"></i> Add Student
    </button>
  </div>

  <!-- Student Table -->
  <div class="card card-custom p-3 table-responsive">
    <h5 class="mb-3">Student List</h5>
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>S.No.</th>
          <th>Name</th>
          <th>Department</th>
          <th>Branch</th>
          <th>Program</th>
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
          <td><?php echo $res['branch']; ?></td>
          <td><?php echo $res['program']; ?></td>
          <td>
            <a href="view_student.php?student_id=<?php echo urlencode($res['student_id']); ?>" class="btn btn-success btn-sm">
              <i class="fas fa-eye"></i> View
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-3">
        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
          <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
        </li>
        <?php for($i=1; $i<=$totalPages; $i++){ ?>
        <li class="page-item <?php if($page == $i){ echo 'active'; } ?>">
          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
        <?php } ?>
        <li class="page-item <?php if($page >= $totalPages){ echo 'disabled'; } ?>">
          <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</main>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- Personal Info -->
          <div class="section-title">Personal Information</div>
          <div class="row g-3 mb-3">
            <div class="col-md-4"><input type="text" name="full_name" placeholder="Full Name" class="form-control" required></div>
            <div class="col-md-4"><input type="text" name="father_name" placeholder="Father Name" class="form-control"></div>
            <div class="col-md-4"><input type="text" name="mother_name" placeholder="Mother Name" class="form-control"></div>
            <div class="col-md-2"><input type="text" name="aadhar_no" placeholder="Aadhar No" class="form-control"></div>
            <div class="col-md-3"><input type="date" name="dob" class="form-control"></div>
            <div class="col-md-3">
              <select name="gender" class="form-select">
                <option value="">-- Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="col-md-2">
              <select name="blood_group" class="form-select">
                <option value="">-- Blood Group --</option>
                <option value="A+">A+</option><option value="A-">A-</option>
                <option value="B+">B+</option><option value="B-">B-</option>
                <option value="AB+">AB+</option><option value="AB-">AB-</option>
                <option value="O+">O+</option><option value="O-">O-</option>
              </select>
            </div>
            <div class="col-md-2">
              <select name="category" class="form-select">
                <option value="">-- Caste Category --</option>
                <option value="GEN">GEN</option>
                <option value="OBC">OBC</option>
                <option value="OBC-CL">OBC-CL</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
                <option value="EWS">EWS</option>
                <option value="Others">Others</option>
              </select>
            </div>
          </div>

          <!-- Documents -->
          <div class="section-title">Upload Documents</div>
          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <div class="section-title-1">Caste Certificate</div>
              <input type="file" name="caste_certificate" class="form-control">
            </div>
            <div class="col-md-4">
              <div class="section-title-1">Photo</div>
              <input type="file" name="photo" class="form-control">
            </div>
            <div class="col-md-4">
              <div class="section-title-1">Signature</div>
              <input type="file" name="signature" class="form-control">
            </div>
            <div class="col-md-4">
              <div class="section-title-1">Doc 10th/12th</div>
              <input type="file" name="doc_10th_doc_12th" class="form-control">
            </div>
          </div>

          <!-- Contact Info -->
          <div class="section-title">Contact Information</div>
          <div class="row g-3 mb-3">
            <div class="col-md-4"><input type="text" name="mobile_no" placeholder="Mobile Number" class="form-control"></div>
            <div class="col-md-4"><input type="text" name="parent_mobile_no" placeholder="Parent Mobile" class="form-control"></div>
            <div class="col-md-4"><input type="email" name="email" placeholder="Email" class="form-control"></div>
            <div class="col-md-6"><textarea name="permanent_address" class="form-control" placeholder="Permanent Address"></textarea></div>
            <div class="col-md-6"><textarea name="current_address" class="form-control" placeholder="Current Address"></textarea></div>
          </div>

          <!-- Academic Info -->
          <div class="section-title">Academic Details</div>
          <div class="row g-3 mb-3">
            <div class="col-md-4">
              <select name="department" class="form-select">
                <option value="">-- Department --</option>
                <?php $res=pg_query($conn,"SELECT * FROM department"); while($d=pg_fetch_assoc($res)){ ?>
                <option value="<?php echo $d['department'];?>"><?php echo $d['department'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="branch" class="form-select">
                <option value="">-- Branch --</option>
                <?php $res=pg_query($conn,"SELECT * FROM branch"); while($b=pg_fetch_assoc($res)){ ?>
                <option value="<?php echo $b['branch'];?>"><?php echo $b['branch'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-4">
              <select name="program" class="form-select">
                <option value="">-- Program --</option>
                <?php $res=pg_query($conn,"SELECT * FROM program"); while($p=pg_fetch_assoc($res)){ ?>
                <option value="<?php echo $p['program'];?>"><?php echo $p['program'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Student</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>

