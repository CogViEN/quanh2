<?php session_start(); // bắt đầu phiên làm việc với session?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <title>Đăng Nhập </title>
</head>
<body>
    <form action="#" align="center" method="POSt" >
     <b>Đăng Nhập</b>
    <table align="center" class="tb1">
        <tr><td>Tên Đăng Nhập : </td><td><input type="text" name="tk" placeholder="Nhập tên đăng nhập" style="margin-top: 10px"></td></tr>
        <tr><td>Mật khẩu: </td><td><input type="password" name="mk" placeholder="Nhập mật khẩu" style="margin-top: 10px"></td></tr>
        <tr><td colspan="2"><input type="submit" value="Đăng nhập " name="bt" style="margin-top: 10px; background-color: aquamarine"></td></tr>
        
    </table>
    </form>
    
    <table class="form">
        
    </table>
    </body>
    </html>
    <?php


// kiểm tra nút "Đăng nhập" được nhấn
if (isset($_POST['bt'])) {
    $tk = $_POST['tk'];
    $mk = $_POST['mk'];

    // kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'root', '', 'thitracnghiem') or die("Kết nối thất bại");

    // xây dựng câu lệnh truy vấn
    $sql = "SELECT * FROM `admin` WHERE username='$tk'";

    // thực hiện câu lệnh truy vấn
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);
        if ($row['password'] == $mk) {

            // lưu tên đăng nhập vào session
            $_SESSION['username'] = $row['username'];

            // thông báo đăng nhập thành công và chuyển đến trang đổi mật khẩu
            echo "<script>alert('Đăng nhập thành công'); 
            window.location='homeAD.php';
            </script>";
        } else {
            // thông báo mật khẩu không đúng và quay lại trang trước
            echo "<script>
            alert('Mật khẩu không đúng'); 
            window.history.back();</script>";
        }
    } else {
        // thông báo tài khoản không tồn tại và quay lại trang trước
        echo "<script>alert('Tài khoản không tồn tại trong hệ thống'); 
        window.history.back();</script>";
    }

    // đóng kết nối
    mysqli_close($conn);
}
?>

   
    
    

