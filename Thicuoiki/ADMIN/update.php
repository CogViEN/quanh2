<?php 
    include('connect.php');
    //lấy giá trị đã dc truyền dữ liệu từ view
    try{
        $id=$_POST['id'];
        $Qs = $_POST['qs'];
        $Op_a =  $_POST['op_a'];
        $Op_b = $_POST['op_b'];
        $Op_c = $_POST['op_c'];
        $Op_d = $_POST['op_d'];
        $Asw = $_POST['answ'];

        $troom= "UPDATE `cauhoi` SET `question`='$Qs',`option_a`='$Op_a',
        `option_b`='$Op_b',`option_c`='$Op_c',`option_d`='$Op_d',`answer`='$Asw' WHERE id='".$id."'";

        if(mysqli_query($conn,$troom)){
            echo"Cập nhật câu hỏi thành công";
        }else
            echo"Cập nhật câu hỏi thất bại";
    }catch(Exception $e){
        echo"Lỗi cập nhật câu hỏi".$e;
    }
?>
    