<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Google Font: Itim -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Itim', cursive;
            background-color: #f4f6f9;
        }
        .container-fluid {
            padding: 30px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #4a89dc;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table thead {
            background-color: #f1f4f8;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(74, 137, 220, 0.05);
        }
        .table-striped tbody tr:hover {
            background-color: rgba(74, 137, 220, 0.1);
        }
        .btn-custom-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-custom-edit {
            background-color: #28a745;
            color: white;
        }
        .btn-custom-delete:hover, .btn-custom-edit:hover {
            opacity: 0.9;
        }
        .developer-info {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 0.9em;
        }
        .btn-add-employee {
            font-family: 'Itim', cursive;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">
                    <i class="bi bi-people-fill me-2"></i>ข้อมูลพนักงาน
                </h2>
                <div class="d-flex align-items-center">
                    <div class="user-info text-white me-3">
                        <i class="bi bi-person-circle me-2"></i>
                        <?php echo $_SESSION["u_name"] . " | " . $_SESSION["u_department"]; ?>
                    </div>
                    <a href="add.php" class="btn btn-success btn-sm btn-add-employee">
                        <i class="bi bi-plus-circle me-1"></i>เพิ่มข้อมูล
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['action_even']) == 'delete') {
                    $employee_id = $_GET['employee_id'];
                    $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $sql = "DELETE FROM employees WHERE employee_id=$employee_id";
                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
                        } else {
                            echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                        }
                    } else {
                        echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
                    }
                }
                ?>
                
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อพนักงาน</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>เพศ</th>
                            <th>อายุ</th>
                            <th>เงินเดือน</th>
                            <th>จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM employees";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["employee_id"] . "</td>";
                                echo "<td>" . $row["first_name"] . "</td>";
                                echo "<td>" . $row["last_name"] . "</td>";
                                echo "<td>" . $row["department"] . "</td>";
                                echo "<td>" . $row["gender"] . "</td>";
                                echo "<td>" . $row["age"] . "</td>";
                                echo "<td>" . $row["salary"] . "</td>";

                                echo '<td>
                                    <div class="btn-group" role="group">
                                        <a href="show.php?action_even=del&employee_id=' . $row['employee_id'] . '" 
                                            title="ลบข้อมูล" 
                                            onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')" 
                                            class="btn btn-sm btn-custom-delete">
                                            <i class="bi bi-trash"></i> ลบ
                                        </a>
                                        <a href="edit.php?action_even=edit&employee_id=' . $row['employee_id'] . '" 
                                            title="แก้ไขข้อมูล" 
                                            onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')" 
                                            class="btn btn-sm btn-custom-edit">
                                            <i class="bi bi-pencil"></i> แก้ไข
                                        </a>
                                    </div>
                                </td>';

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="developer-info mt-3">
            <i class="bi bi-code-slash me-2"></i>
            พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
</body>
</html>