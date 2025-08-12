<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ramchandra Chandravansi University (RCU)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; line-height: 1.6; }

     table.table th, table.table td {
    padding: 14px;
    vertical-align: middle;
  }
  table.table-hover tbody tr:hover {
    background-color: #eaf5ef !important;
    transition: background-color 0.3s ease;
    cursor: pointer;
  }
  </style>
</head>
<body>
<?php  
include('hd_cm.php');
?>
<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold" style="color:#125A33;">
      💰 Fee Structure - Academic Year 2025
    </h2>

    <div class="table-responsive">
      <table class="table table-bordered table-hover text-center align-middle shadow-lg rounded-4 overflow-hidden">
        <thead style="background-color:#125A33; color:white;">
          <tr>
            <th><i class="fas fa-book-open"></i> Course</th>
            <th><i class="fas fa-clock"></i> Duration</th>
            <th><i class="fas fa-coins"></i> Tuition Fee</th>
            <th><i class="fas fa-file-invoice"></i> Exam Fee</th>
            <th><i class="fas fa-hotel"></i> Hostel Fee</th>
            <th><i class="fas fa-sack-dollar"></i> Total Annual Fee</th>
            <th><i class="fa-solid fa-graduation-cap"></i>Enroll</th>
          </tr>
        </thead>
        <tbody>
          <tr style="background-color:#ffffff;">
            <td>B.Tech (Computer Science & Engineering)</td>
            <td>4 Years</td>
            <td>₹85,000</td>
            <td>₹5,000</td>
            <td>₹35,000</td>
            <td class="fw-bold text-success">₹1,25,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
          <tr style="background-color:#fdfdfd;">
            <td>B.Sc (Nursing)</td>
            <td>4 Years</td>
            <td>₹70,000</td>
            <td>₹4,000</td>
            <td>₹30,000</td>
            <td class="fw-bold text-success">₹1,04,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
          <tr style="background-color:#ffffff;">
            <td>BBA</td>
            <td>3 Years</td>
            <td>₹45,000</td>
            <td>₹3,000</td>
            <td>₹28,000</td>
            <td class="fw-bold text-success">₹76,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
          <tr style="background-color:#fdfdfd;">
            <td>MBA</td>
            <td>2 Years</td>
            <td>₹95,000</td>
            <td>₹5,000</td>
            <td>₹35,000</td>
            <td class="fw-bold text-success">₹1,35,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
          <tr style="background-color:#ffffff;">
            <td>B.Ed</td>
            <td>2 Years</td>
            <td>₹40,000</td>
            <td>₹3,000</td>
            <td>₹25,000</td>
            <td class="fw-bold text-success">₹68,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
          <tr style="background-color:#fdfdfd;">
            <td>LLB</td>
            <td>3 Years</td>
            <td>₹55,000</td>
            <td>₹4,000</td>
            <td>₹28,000</td>
            <td class="fw-bold text-success">₹87,000</td>
            <th> <button class="btn btn-success">Apply</button></th>
          </tr>
        </tbody>
      </table>
    </div>

    <p class="mt-3 text-muted fst-italic" style="font-size: 0.9rem;">
      * The above fees are indicative and may vary based on university policies. Hostel fees include lodging and food. 
      Examination fees are charged annually. Additional charges for library, lab, and other facilities may apply.
    </p>
  </div>
</section>
<?php include('footer.php'); ?>
</body>
</html>