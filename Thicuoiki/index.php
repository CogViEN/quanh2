<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Kiểm tra trắc nghiệm </title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="float: left; margin-top: 5px;display: flex;align-items: center;">
  <img src="logo-lop-hoc-tieng-anh.png" alt="Logo" style="width: 50px; height: 50px;">
</a>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="home.php">Trang chủ</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li class="dropdown">';
                        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
                        echo 'Xin chào: ' . $_SESSION['username'] . ' <span class="caret"></span>';
                        echo '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="thongtintaikhoan.php">Tài khoản</a></li>';
                        echo '<li><a href="out.php">Thoát</a></li>';
                        echo '</ul>';
                        echo '</li>';
                    } else {
                        echo '<li><a href="login.php">Đăng nhập</a></li>';
                        echo '<li><a href="register.php">Đăng ký</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">Làm bài thi </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <input type="submit" name="batdau" class="btn btn-success" id="btn-batdau" name="btn-batdau" value="Bắt đầu">
                        <div id="thoigianconlai" style="font-size: 48px;"></div>
                    </div>
                </div>
                <div id="cauhoi">
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <input type="submit" class="btn btn-success" id="btn-nopbai" value="Nộp bài">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4 id="Diem" class="text-danger"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
<?php
if (isset($_SESSION['username'])) {
    
  include('baithi.php');

} else {
    echo "<script>
            alert('Vui lòng đăng nhập để làm bài thi '); 
            window.location='login.php';
            </script>";
    
    exit;
}


?>


