<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font: Itim -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Itim', cursive;
            background: linear-gradient(135deg, #e6f2ff 0%, #f0f8ff 100%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .login-container {
            background-color: rgba(255,255,255,0.9);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 10;
            border: 2px solid #87ceeb;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h1 {
            color: #4682b4;
            margin-bottom: 10px;
        }
        .form-label {
            font-weight: normal;
            color: #4682b4;
        }
        .form-control {
            border-color: #87ceeb;
        }
        .form-control:focus {
            border-color: #4682b4;
            box-shadow: 0 0 0 0.25rem rgba(70, 130, 180, 0.25);
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: linear-gradient(135deg, #87ceeb 0%, #4682b4 100%);
            border: none;
            color: white;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #4682b4 0%, #87ceeb 100%);
        }
        .btn-reset {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #f0f0f0;
            color: #6c757d;
        }
        .btn-reset:hover {
            background-color: #e0e0e0;
        }
        .developer-info {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 0.9em;
        }
        /* Cute cartoon-style decorative elements */
        .login-container::before {
            content: '🌈';
            position: absolute;
            top: -30px;
            left: -30px;
            font-size: 50px;
            z-index: -1;
        }
        .login-container::after {
            content: '✨';
            position: absolute;
            bottom: -30px;
            right: -30px;
            font-size: 50px;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <div class="login-header">
                    <h1>เข้าสู่ระบบ</h1>
                    <p>กรุณากรอกชื่อผู้ใช้และรหัสผ่าน</p>
                </div>
                
                <form action="chklogin.php" method="POST">
                    <div class="mb-3">
                        <label for="u_id" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="u_id" name="u_id" 
                               maxlength="30" required placeholder="กรอกชื่อผู้ใช้">
                    </div>
                    
                    <div class="mb-3">
                        <label for="u_passwd" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="u_passwd" name="u_passwd" 
                               maxlength="30" required placeholder="กรอกรหัสผ่าน">
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-custom">เข้าสู่ระบบ</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" class="btn btn-reset">ยกเลิก</button>
                        </div>
                    </div>
                </form>
                
                <div class="developer-info">
                    พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>