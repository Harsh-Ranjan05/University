<?php 
include('db.php'); 

// Insert Class Allotment
if(isset($_POST['submit'])){
    $department = $_POST['department'];
    $branch = $_POST['branch'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $room_no = $_POST['room_no'];
    $class_code = $_POST['class_code'];
    $batch = $_POST['batch'];

    $query="INSERT INTO class_room(department,branch,program,semester,section,room_no,class_code,batch) 
            VALUES('$department','$branch','$program','$semester','$section','$room_no','$class_code','$batch')";
    $result=pg_query($conn,$query);
    if($result){
        echo "<script>alert('Alloted Successfully..'); window.location='class.php';</script>";
    }else{
        echo "<script>alert('Failed To Allot..'); window.location='class.php';</script>";
    }
}

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Count total rows
$count_query = "SELECT COUNT(*) FROM class_room";
$count_result = pg_query($conn, $count_query);
$total_rows = pg_fetch_result($count_result, 0, 0);
$total_pages = ceil($total_rows / $limit);

// Fetch paginated results
$query = "SELECT * FROM class_room ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = pg_query($conn, $query);
?>



<body>
<?php include('navbar.php'); ?>

<main class="main-content">
    <header class="topbar">
        <h1 class="h4 fw-bold text-primary">Class Management</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">
            <i class="fas fa-plus"></i> Create Class
        </button>
    </header>

    <section class="content">
        <div class="row g-3">
            <div class="col-12">
                <div class="card card-custom p-4">
                    <h2 class="h5 mb-3 text-secondary">Class Allotment List</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Department</th>
                                    <th>Branch</th>
                                    <th>Program</th>
                                    <th>Semester</th>
                                    <th>Section</th>
                                    <th>Room No.</th>
                                    <th>Class Code</th>
                                    <th>Batch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($res=pg_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $res['department'];?></td>
                                    <td><?php echo $res['branch']; ?></td>
                                    <td><?php echo $res['program']; ?></td>
                                    <td><?php echo $res['semester']; ?></td>
                                    <td><?php echo $res['section']; ?></td>
                                    <td><?php echo $res['room_no']; ?></td>
                                    <td><?php echo $res['class_code']; ?></td>
                                    <td><?php echo $res['batch']; ?></td>
                                    <td>
                                        <a href="allot_class.php?id=<?php echo $res['id']; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-check-circle"></i> Allot
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-center mt-3">
                            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page-1; ?>">Previous</a>
                            </li>
                            <?php for ($i=1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php } ?>
                            <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page+1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
</main>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClassLabel">Create Class Allotment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <?php
                        $departments = pg_query($conn, "SELECT * FROM department");
                        $branches = pg_query($conn, "SELECT * FROM branch");
                        $programs = pg_query($conn, "SELECT * FROM program");
                        $rooms = pg_query($conn, "SELECT * FROM room_no");
                        $batches = pg_query($conn, "SELECT * FROM batch");
                        ?>
                        <div class="col-md-3">
                            <label class="form-label">Department</label>
                            <select name="department" class="form-select" required>
                                <option value="">--select--</option>
                                <?php while($row = pg_fetch_assoc($departments)){ ?>
                                    <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Branch</label>
                            <select name="branch" class="form-select" required>
                                <option value="">--select--</option>
                                <?php while($row = pg_fetch_assoc($branches)){ ?>
                                    <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Program</label>
                            <select name="program" class="form-select" required>
                                <option value="">--select--</option>
                                <?php while($row = pg_fetch_assoc($programs)){ ?>
                                    <option value="<?php echo $row['program']; ?>"><?php echo $row['program']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Semester</label>
                            <select name="semester" class="form-select" required>
                                <option value="">--select--</option>
                                <?php foreach(['I','II','III','IV','V','VI','VII','VIII'] as $sem){ ?>
                                    <option value="<?php echo $sem; ?>"><?php echo $sem; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Section</label>
                            <select name="section" class="form-select" required>
                                <option value="">--select--</option>
                                <?php foreach(['A','B','C','D','E','F'] as $sec){ ?>
                                    <option value="<?php echo $sec; ?>"><?php echo $sec; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Room No</label>
                            <select name="room_no" class="form-select" required>
                                <option value="">--select--</option>
                                <?php while($row = pg_fetch_assoc($rooms)){ ?>
                                    <option value="<?php echo $row['room_no']; ?>"><?php echo $row['room_no']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Class Code</label>
                            <input type="text" name="class_code" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Batch</label>
                            <select name="batch" class="form-select" required>
                                <option value="">--select--</option>
                                <?php while($row = pg_fetch_assoc($batches)){ ?>
                                    <option value="<?php echo $row['batch']; ?>"><?php echo $row['batch']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

