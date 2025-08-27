<?php
include('db.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query="SELECT*FROM notice WHERE id='$id'";
    $result=pg_query($conn, $query);
    while($res=pg_fetch_array($result)){
        $title = $res['title'];
        $notice_type = $res['notice_type'];
        $description = $res['description'];
    }
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $notice_type = $_POST['notice_type'];
    $description = $_POST['description'];
    // Update Query
    $query = "UPDATE notice SET title='$title',notice_type='$notice_type',description='$description' WHERE id='$id'";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Update Successfully..'); window.location='notice.php';</script>";
    } else {
        echo "<script>alert('Failed To Update..'); window.location='notice.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Faculty Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }

    .content { display:flex; padding:10px; gap:5px; flex:1; }
    .form-container {
      flex:1; background:white; padding:20px;
      border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    .form-container h2 { margin-bottom:15px; }
    .form-group { margin-bottom:15px; }
    .form-group label { display:block; margin-bottom:6px; font-weight:600; }
    .form-group input, .form-group select, .form-group textarea {
      width:100%; padding:10px;
      border:1px solid #ccc; border-radius:6px;
    }
    .btn {
      background:#007bff; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
    }
    .btn:hover { background:#0056b3; }
    .table-container {
      flex:2; background:white; padding:10px;
      border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1);
      overflow:auto;
    }
    .table-container h2 { margin-bottom:15px; }
    table { width:100%; border-collapse:collapse; }
    table th, table td { border:1px solid #ddd; padding:10px; text-align:left; }
    table th { background:#f2f2f2; }
      .btn-1 {
      background:green; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
    }
   .btn-2{
    background:red; color:white;
      padding:10px 15px; border:none;
      border-radius:6px; cursor:pointer;
      text-decoration:none;
   }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="main-content">
  <header class="topbar">
    <h1>Notice Management</h1>
    <div class="profile">Admin ▼</div>
  </header>

  <section class="content">
    <!-- Form -->
    <div class="form-container">
      <h2>Update Notice</h2>
      <form method="POST" enctype="multipart/form-data">
       <div class="form-group">
  <label for="name">Title</label>
  <input type="text" id="name" name="title" value="<?php echo $title; ?>" placeholder="Enter title" required>
</div>

<div class="form-group">
  <label for="dept">Notice Type</label>
  <select id="dept" name="notice_type" required>
    <option value="">Select Type</option>
    <option value="Academic Notices" <?php if($notice_type=="Academic Notices") echo "selected";?>>Academic Notices</option>
    <option value="Administration Notices" <?php if($notice_type=="Administration Notices") echo "selected";?>>Administration Notices</option>
    <option value="Meeting Notices" <?php if($notice_type=="Meeting Notices") echo "selected";?>>Meeting Notices</option>
    <option value="Event/Program Notices" <?php if($notice_type=="Event/Program Notices") echo "selected";?>>Event / Program Notices</option>
    <option value="Job /Placement/Intership Notices" <?php if($notice_type=="Job /Placement/Intership Notices") echo "selected";?>>Job / Placement/ Intership Notices</option>
    <option value="Examination Notices" <?php if($notice_type=="Examination Notices") echo "selected";?>>Examination Notices</option>
  </select>
</div>

<div class="form-group">
  <label for="address">Description</label>
  <textarea id="address" name="description" placeholder="Enter Brief Description" rows="4"><?php echo $description; ?></textarea>
</div>
 <button type="submit" name="submit" class="btn">Update</button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h2>Notice List</h2>
      <table>
        <thead>
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
          $i=1;
          $query="SELECT*FROM notice";
          $result = pg_query($conn, $query);
          while($res=pg_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $res['title']; ?></td>
            <td><?php echo $res['notice_type']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td>  <?php 
if ($res['status'] == 1) { ?>
    <a href="status.php?table=notice&id=<?php echo $id; ?>" class="btn-1">Active</a>
<?php } else { ?>
    <a href="status.php?table=notice&id=<?php echo $id; ?>" class="btn-2">Deactive</a>
<?php } ?></td>
            <td> <a href="edit_notice.php?id=<?php echo $res['id']; ?>"><button class="btn-1">Edit</button></a></td>
            
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</main>
</body>
</html>
