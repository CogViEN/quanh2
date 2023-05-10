<?php 
include('connect.php');
$id =$_GET['id'];//phải lấy đúng với tham số bên index
$troom="SELECT * FROM cauhoi WHERE id='".$id."'";
$result=mysqli_query($conn,$troom);
$row = mysqli_fetch_array($result);
$return= array("question" => $row['question'], "option_a" => $row['option_a'],
"option_b" => $row['option_b'],"option_c" => $row['option_c'],"option_d" => $row['option_d'],"answer" => $row['answer']);// trả về 1 mãng theo kiểu JSON
echo json_encode($return);//chuyẻn đổi một mãng thành định dạng JSON

?>