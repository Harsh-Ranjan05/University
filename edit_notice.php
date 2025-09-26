<?php
include('db.php');

// Fetch notice details
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM notice WHERE id='$id'";
    $result = pg_query($conn, $query);
    if($res = pg_fetch_assoc($result)){
        $title = $res['title'];
        $notice_type = $res['notice_type'];
        $description = $res['description'];
        $link = $res['link'];
    }
}

// Update notice
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $notice_type = $_POST['notice_type'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $query = "UPDATE notice SET title='$title', notice_type='$notice_type', description='$description' ,link='$link'  WHERE id='$id'";
    $result = pg_query($conn, $query);

    if($result){
        echo "<script>alert('Notice Updated Successfully'); window.location='notice.php';</script>";
    } else {
        echo "<script>alert('Failed To Update'); window.location='notice.php';</script>";
    }
}

// Fetch all notices
$query = "SELECT * FROM notice ORDER BY id DESC";
$result = pg_query($conn, $query);
?>


<?php include('navbar.php'); ?>

<main class="main-content">
  <header class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 fw-bold text-primary">Edit Notice</h1>
    <a href="notice.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
  </header>

  <!-- Edit Notice Form -->
  <div class="card card-custom p-4">
    <h5 class="mb-3">Update Notice</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label fw-semibold">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Title" required>
      </div>
      <div class="mb-3">
        <label class="form-label fw-semibold">Notice Type</label>
        <select name="notice_type" class="form-select" required>
          <option value="">Select Type</option>
          <option value="Academic Notices" <?php if($notice_type=="Academic Notices") echo "selected"; ?>>Academic Notices</option>
          <option value="Administration Notices" <?php if($notice_type=="Administration Notices") echo "selected"; ?>>Administration Notices</option>
          <option value="Meeting Notices" <?php if($notice_type=="Meeting Notices") echo "selected"; ?>>Meeting Notices</option>
          <option value="Event/Program Notices" <?php if($notice_type=="Event/Program Notices") echo "selected"; ?>>Event / Program Notices</option>
          <option value="Job /Placement/Intership Notices" <?php if($notice_type=="Job /Placement/Intership Notices") echo "selected"; ?>>Job / Placement / Internship Notices</option>
          <option value="Examination Notices" <?php if($notice_type=="Examination Notices") echo "selected"; ?>>Examination Notices</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label fw-semibold">Description</label>
        <textarea name="description" class="form-control" rows="4" placeholder="Enter Description"><?php echo $description; ?></textarea>
      </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link (Optional)</label>
            <input type="url" class="form-control" value="<?php echo $link ?>"name="link" placeholder="Enter URL">
        </div>
      <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>

  <!-- Notice Table -->
  <div class="card card-custom p-4 table-container">
    <h5 class="mb-3">Notice List</h5>
    <table class="table table-bordered table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>S.No.</th>
          <th>Title</th>
          <th>Notice Type</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i = 1;
      while($res = pg_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $res['title']; ?></td>
          <td><?php echo $res['notice_type']; ?></td>
          <td><?php echo $res['description']; ?></td>
          <td>
            <span class="badge <?php echo ($res['status']==1)?'bg-success':'bg-danger'; ?>">
              <?php echo ($res['status']==1)?'Active':'Deactive'; ?>
            </span>
          </td>
          <td>
            <a href="edit_notice.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
            <a href="status.php?table=notice&id=<?php echo $res['id']; ?>" class="btn btn-sm <?php echo ($res['status']==1)?'btn-success':'btn-danger'; ?>">
              <?php echo ($res['status']==1)?'Active':'Deactive'; ?>
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</main>
</body>

