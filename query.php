<?php 
include('db.php');

// Handle message submission
if(isset($_POST['send_message'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_no'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_us(full_name, email, mobile_no, subject, message) 
              VALUES('$full_name', '$email', '$mobile', '$subject', '$message')";
    $result = pg_query($conn, $query);
    if($result){
        echo "<script>alert('Message sent successfully'); window.location='query_list.php';</script>";
    } else {
        echo "<script>alert('Failed to send message'); window.location='query_list.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>University CRM - Query List</title>
<style>
body { font-family: 'Segoe UI', sans-serif; background:#f4f6f9; }
.main-content { padding:20px; }
.topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.card-custom { border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.1); background:#fff; }
.table-responsive { overflow-x:auto; }
</style>
</head>
<body>
<?php include('navbar.php'); ?>

<main class="main-content">
<header class="topbar">
  <h1 class="h4 fw-bold text-primary">Query List</h1>
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendMessageModal">
    <i class="fas fa-envelope"></i> Send Message
  </button>
</header>

<section class="content">
  <div class="card card-custom p-4">
    <h2 class="h5 mb-3 text-secondary">Contact Queries</h2>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>S.No.</th>
            <th>Full Name</th>
            <th>Mobile No.</th>
            <th>Email ID</th>
            <th>Subject</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          $query="SELECT * FROM contact_us ORDER BY id DESC";
          $result=pg_query($conn,$query);
          while($res=pg_fetch_assoc($result)){
          ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $res['full_name']; ?></td>
            <td><?php echo $res['mobile_no']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['subject']; ?></td>
            <td><?php echo $res['message']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
</main>

<!-- Send Message Modal -->
<div class="modal fade" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content card-custom">
      <div class="modal-header">
        <h5 class="modal-title" id="sendMessageModalLabel"><i class="fas fa-envelope"></i> Send Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" name="full_name" class="form-control" placeholder="Enter full name" required>
          </div>
          <div class="mb-3">
            <input type="hidden" name="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="mb-3">
            <input type="hidden" name="mobile_no" class="form-control" placeholder="Enter mobile number" required>
          </div>
           <div class="mb-3">
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label fw-semibold">Message</label>
            <textarea name="message" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="send_message" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
