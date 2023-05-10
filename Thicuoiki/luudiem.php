<?php
session_start();
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'thitracnghiem');

if(isset($_POST['diem'])) {
    $diem = $_POST['diem'];
    $username = $_SESSION['username'];
    $sql = "UPDATE nguoidung SET mark = '$diem' WHERE username = '$username'";
    
    if(mysqli_query($conn, $sql)){        
        echo "Lưu điểm thành công";
    } else{
        echo "Lưu điểm thất bại";
    } 
} else {
    echo "Không nhận được giá trị điểm";
}

mysqli_close($conn);
?>
