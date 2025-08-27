<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University CRM - Students</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Segoe UI', sans-serif; }
    body { display:flex; min-height:100vh; background:#f4f6f9; color:#333; }
    .filters {
      display:flex;
      gap:30px;
      padding:15px 20px;
      background:#fff;
      border-bottom:1px solid #ddd;
    }
    .filters select {
      padding:10px;
      border:1px solid #ccc;
      border-radius:10px;
    }

    /* Table */
    .table-container { padding:20px; overflow-x:auto; }
    table {
      width:100%;
      border-collapse:collapse;
      background:#fff;
      border-radius:8px;
      overflow:hidden;
      box-shadow:0 2px 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding:12px 15px;
      text-align:left;
      border-bottom:1px solid #eee;
    }
    th { background:#f8f9fc; }
    tr:hover { background:#f1f1f1; }
    .btn {
      padding:6px 12px;
      background:#007bff;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
    }
    .btn-1{
      padding:0px 40px 0px 40px;
      background:green;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
     margin:2px;    
    }
    .btn-3{
        padding:6px 12px;
      background:red;
      color:white;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-size:14px;
      margin:2px;    
    }
    .btn:hover { background:#0056b3; }
  </style>
</head>
<body>
  <?php include('navbar.php');?>
  <!-- Main Content -->
  <main class="main-content">
    <header class="topbar">
      <h1>Students List</h1>
      <div class="profile">Admin ▼</div>
    </header>

    <!-- Filters -->
    <section class="filters">
      <select>
        <option selected>Department</option>
        <option>Computer Science</option>
        <option>Mechanical</option>
        <option>Civil</option>
        <option>Electrical</option>
      </select>
      <select>
        <option selected>Branch</option>
        <option>Software Engineering</option>
        <option>Data Science</option>
        <option>AI & ML</option>
      </select>
      <select>
        <option selected>Section</option>
        <option>A</option>
        <option>B</option>
        <option>C</option>
      </select>
      <button class="btn-1">Filter</button>
    </section>

    <!-- Student Table -->
    <section class="table-container">
      <table>
        <thead>
          <tr>
            <th>Roll No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Branch</th>
            <th>Section</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>101</td>
            <td>Rahul Kumar</td>
            <td>Computer Science</td>
            <td>Software Engineering</td>
            <td>A</td>
            <td><button class="btn">Present</button></td>
          </tr>
          <tr>
            <td>102</td>
            <td>Priya Sharma</td>
            <td>Computer Science</td>
            <td>Data Science</td>
            <td>A</td>
            <td><button class="btn-3">Absent</button></td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
