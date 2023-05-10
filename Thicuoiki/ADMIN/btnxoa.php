<?php 
include('connect.php');
$id = $_POST['id'];
$troom = "DELETE FROM `cauhoi` WHERE id='" . $id . "'";
$result = mysqli_query($conn, $troom);

if ($result) {
    // Nếu kết quả trả về từ câu lệnh SQL không rỗng
    if (mysqli_affected_rows($conn) > 0) {
        echo 'Xóa câu hỏi thành công';
    } else {
        echo 'Không có câu hỏi nào được xóa';
    }
} else {
    echo 'Xóa câu hỏi thất bại';
}
?>
