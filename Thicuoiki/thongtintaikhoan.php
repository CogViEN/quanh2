<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin tài khoản</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
include('connect.php');

// Kiểm tra kết nối

// Truy vấn thông tin tài khoản của người dùng
$sql = "SELECT * FROM nguoidung WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_array($result);

?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2 class="text-center">Thông tin tài khoản</h2>
				<form action="#" method="POST">
					<div class="form-group">
						<label for="username">Tên đăng nhập:</label>
						<input type="text" class="form-control" id="username" name="username"value="<?php echo $user['username']; ?>" readonly required>
					</div>
                    <div class="form-group">
						<label for="pass">Mật khẩu:</label>
						<input type="text" class="form-control" id="pass" name="pass" value="<?php echo $user['password']; ?>"required>
					</div>
                    <div class="form-group">
						<label for="pass-again">Nhập lại mật khẩu:</label>
						<input type="text" class="form-control" id="pass-again" name="passAg" required>
					</div>
					<div class="form-group">
						<label for="email">Địa chỉ email:</label>
						<input type="email" class="form-control" id="email" name="email"value="<?php echo $user['email']; ?>" required>
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại:</label>
						<input type="tel" class="form-control" id="phone" name="phone"value="<?php echo $user['phone']; ?>" required>
					</div>
					<button type="submit" class="btn btn-primary center-block" name="btn-capnhat">Cập nhật thông tin</button>
                    <a href="home.php">Quay lại trang chủ</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<style>
    form {
  border: 1px solid #ccc;
  padding: 20px;
}
</style>
<?php 
   if(isset($_POST['btn-capnhat'])){
    $matkhau= $_POST['pass'];
    $matkhauag=$_POST['passAg'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    
    if ($matkhau != $matkhauag) {
        echo "<script>
        alert('Mật khẩu không khớp'); 
        window.history.back();</script>";
    
    } else {
        // Cập nhật thông tin tài khoản
        $sql = "UPDATE nguoidung SET password='$matkhau', email='$email', phone='$phone' WHERE username='$_SESSION[username]'";
        if(mysqli_query($conn, $sql)){
            echo "<script>
            alert('Cập nhật thành công'); 
            window.history.back();</script>";
        
        } else {
            echo "Lỗi khi cập nhật thông tin: " . mysqli_error($conn);
        }
    }
}

?>
