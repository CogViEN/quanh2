<?php 
    include('connect.php');
    $tk = $_GET['tk']; // lấy dữ liệu từ $_POST thay vì $_GET
    $query = "SELECT * FROM cauhoi WHERE question LIKE '%".$tk."%'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    $pages = $count%10==0?$count/10:floor($count/10)+1;
    echo json_encode($pages);
?>

