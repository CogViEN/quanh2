<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Trang chủ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="float: left; margin-top: 5px;display: flex;align-items: center;">
  <img src="logo-lop-hoc-tieng-anh.png" alt="Logo" style="width: 50px; height: 50px;">
</a>


			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li ><a href="#">Trang chủ</a></li>
					<li><a href="index.php">Thi trắc nghiệm</a></li>
					<li><a href="#">Học lý thuyết</a></li>
					<li><a href="#">Liên hệ</a></li>
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
	<div class="jumbotron text-center">
		<h1>Welcome to our website!</h1>
		<p>We provide the best services and solutions for our clients.</p>
		<a href="#" class="btn btn-primary btn-lg">Learn more</a>
	</div>




</body>

</html>