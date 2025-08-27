<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Dashboard</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box;font-family: 'Segoe UI', sans-serif;}
    body { display: flex; min-height: 100vh; background:#f4f6f9; }

    /* Cards */
    .cards {
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
      gap:20px;
      padding:20px;
    }
    .card {
      background:white;
      padding:20px;
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
      text-align:center;
    }
    .card h3 { font-size:18px; margin-bottom:8px; color:#333; }
    .card p { font-size:22px; font-weight:bold; color:#007bff; }
  </style>
</head>
<body>

  <?php include('navbar.php'); ?>
  <!-- Main Content -->
  <main class="main-content">
    <header class="topbar">
      <h1>Dashboard</h1>
      <div class="profile">Welcome, Admin</div>
    </header>

    <section class="cards">
      <div class="card">
        <h3>Total Students</h3>
        <p>1200</p>
      </div>
      <div class="card">
        <h3>Faculty</h3>
        <p>85</p>
      </div>
      <div class="card">
        <h3>Courses</h3>
        <p>65</p>
      </div>
      <div class="card">
        <h3>Departments</h3>
        <p>12</p>
      </div>
    </section>
  </main>

</body>
</html>
