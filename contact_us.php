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

  
 
  </style>
</head>
<body>
<?php include('hd_cm.php');?>
  
<!-- Contact Us Section -->
<section class="py-5" style="background-color:#f9f9f9;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color:#125A33;">Get in Touch</h2>
      <p class="text-muted">We’d love to hear from you! Whether you have a question, need information, or want to visit our campus, we are here to help.</p>
    </div>

    <div class="row g-4">
      <!-- Contact Info -->
      <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm h-100">
          <div class="d-flex align-items-start mb-3">
            <i class="fas fa-map-marker-alt fa-2x text-success me-3"></i>
            <div>
              <h5 class="mb-1">Our Location</h5>
              <p class="mb-0">RCU Campus, Nawadihkala, Bishrampur, Palamu, Jharkhand - 822132</p>
            </div>
          </div>
          <div class="d-flex align-items-start mb-3">
            <i class="fas fa-phone fa-2x text-success me-3"></i>
            <div>
              <h5 class="mb-1">Call Us</h5>
              <p class="mb-0">+91 74640 34524</p>
            </div>
          </div>
          <div class="d-flex align-items-start">
            <i class="fas fa-envelope fa-2x text-success me-3"></i>
            <div>
              <h5 class="mb-1">Email</h5>
              <p class="mb-0">info@rcu.edu.in</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8">
        <div class="bg-white p-4 rounded shadow-sm h-100">
          <h5 class="mb-4" style="color:#125A33;">Send Us a Message</h5>
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="col-md-6">
                <input type="tel" class="form-control" placeholder="Your Phone" required>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Subject" required>
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
              </div>
              <div class="col-12 text-end">
                <button type="submit" class="btn btn-success px-4">
                  <i class="fas fa-paper-plane me-2"></i>Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Map -->
    <div class="mt-5">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5024379870143!2d84.123456789!3d23.987654321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sRamchandra%20Chandravansi%20University!5e0!3m2!1sen!2sin!4v0000000000000" 
        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</section>


<?php include('footer.php'); ?>
</body>
</html>