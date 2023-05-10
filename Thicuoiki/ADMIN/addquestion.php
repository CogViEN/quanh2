<?php 
    include('connect.php');
    try{

 
    $Qs = $_POST['qs'];
    $Op_a = $_POST['op_a'];
    $Op_b = $_POST['op_b'];
    $Op_c = $_POST['op_c'];
    $Op_d = $_POST['op_d'];
    $Asw = $_POST['answ'];

    $sql = "INSERT INTO `cauhoi`(`question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`)
     VALUES ('".$Qs."','".$Op_a."','".$Op_b."','".$Op_c."','".$Op_d."','".$Asw."')";
      if(mysqli_query($conn,$sql)){        
         echo"Thêm câu hỏi thành công";
      }else
         echo"Thêm câu hỏi thất bại";
   } 
     
   catch(Exception $e){
        
   }
?>