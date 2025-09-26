<?php 
include('db.php');

// Add Notice
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $notice_type = $_POST['notice_type'];
    $description = $_POST['description'];
    $orignalname = $_FILES['picture']['name'];
    $tempname = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tempname, "doc/".$orignalname);
    $link = $_POST['link'];

    $query = "INSERT INTO notice(title, notice_type, description, picture, link) 
              VALUES ('$title', '$notice_type', '$description', '$orignalname', '$link')";
    $result = pg_query($conn, $query);

    if($result){
        echo "<script>alert('Notice Added Successfully..'); window.location='notice.php';</script>";
    } else {
        echo "<script>alert('Failed To Add..'); window.location='notice.php';</script>";
    }
}

// Pagination setup
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total notices
$count_query = "SELECT COUNT(*) FROM notice";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated notices
$query = "SELECT * FROM notice ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>

<body>

<?php include('navbar.php'); ?>

<main class="main-content">
  <div class="topbar">
    <h2 class="text-primary">Notice Management</h2>
    <div class="profile">Welcome,<?= ($role_type == 'students' || $role_type == 'faculty'  || $role_type == 'admin') 
    ? $full_name 
    : $father_name ?></div>
  </div>

  <div class="mb-4">
    <!-- Button trigger modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
      <i class="fas fa-plus"></i> Add Notice
    </button>
  </div>

  <!-- Notice Table -->
  <div class="card card-custom p-3">
    <table class="table table-bordered table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>S.No.</th>
          <th>Title</th>
          <th>Notice Type</th>
          <th>Description</th>
          <th>Picture</th>
          <th>Link</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i = $offset + 1;
        while($res = pg_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $res['title']; ?></td>
          <td><?php echo $res['notice_type']; ?></td>
          <td><?php echo $res['description']; ?></td>
          <td>
            <?php if(!empty($res['picture'])) { ?>
              <img src="doc/<?php echo $res['picture']; ?>" class="notice-img" alt="Picture">
            <?php } else { echo "No Picture"; } ?>
          </td>
           <td>
            <?php if(!empty($res['link'])) { ?>
              <a href="<?php echo htmlspecialchars($res['link']); ?>" target="_blank" class="btn btn-primary"> Visit</a>

            <?php } else { echo "No Link"; } ?>
          </td>
          <td>
            <?php if($res['status']==1){ ?>
              <span class="badge bg-success badge-status">Active</span>
            <?php } else { ?>
              <span class="badge bg-danger badge-status">Deactive</span>
            <?php } ?>
          </td>
          <td>
              <a href="edit_notice.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i> Edit
              </a>
              <?php if ($res['status'] == 1) { ?>
                  <a href="status.php?table=branch&id=<?php echo $res['id']; ?>" class="btn btn-sm btn-success">
                      <i class="fas fa-check-circle"></i> Active
                  </a>
              <?php } else { ?>
                  <a href="status.php?table=branch&id=<?php echo $res['id']; ?>" class="btn btn-sm btn-danger">
                      <i class="fas fa-times-circle"></i> Deactive
                  </a>
              <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Pagination -->
    <nav>
      <ul class="pagination justify-content-center">
        <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
        </li>
        <?php for($i=1; $i<=$total_pages; $i++){ ?>
          <li class="page-item <?php if($i==$page) echo 'active'; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php } ?>
        <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
        </li>
      </ul>
    </nav>

  </div>
</main>

<!-- Add Notice Modal -->
<div class="modal fade" id="addNoticeModal" tabindex="-1" aria-labelledby="addNoticeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="addNoticeLabel">Add Notice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
          </div>
          <div class="mb-3">
            <label for="notice_type" class="form-label">Notice Type</label>
            <select class="form-select" name="notice_type" required>
              <option value="">-- Select Notice Type --</option>
              <optgroup label="Admissions">
                <option value="Admission Notices">Admission Notices</option>
              </optgroup>
              <optgroup label="Academics">
                <option value="Academic Notices">Academic Notices</option>
                <option value="Examination Notices">Examination Notices</option>
              </optgroup>
              <optgroup label="Administration">
                <option value="Administration Notices">Administration Notices</option>
                <option value="Meeting Notices">Meeting Notices</option>
              </optgroup>
              <optgroup label="Events & Programs">
                <option value="Event/Program Notices">Event / Program Notices</option>
              </optgroup>
              <optgroup label="Careers">
                <option value="Job / Placement / Internship Notices">Job / Placement / Internship Notices</option>
              </optgroup>
              <optgroup label="Holiday">
                <option value="Festival Holiday">Festival Holiday</option>
              </optgroup>
            </select>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Enter Description"></textarea>
          </div>
          <div class="mb-3">
            <label for="picture" class="form-label">Upload Picture</label>
            <input type="file" class="form-control" name="picture">
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link (Optional)</label>
            <input type="url" class="form-control" name="link" placeholder="Enter URL">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Add Notice</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>

