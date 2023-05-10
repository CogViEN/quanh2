<?php
include('connect.php');
$tk = $_GET['tk'];
$page=$_GET['page'];
$query = "SELECT * FROM cauhoi WHERE question LIKE '%".$tk."%' LIMIT 10 OFFSET ".(($page-1)*10); 
$result = mysqli_query($conn, $query);
$id = 1;
$data = '';
while ($row = mysqli_fetch_array($result)) {
    $data .= '<tr id="' . $row['id'] . '">';
    $data .= '<th scope="row">' . ($id++) . '</th>';
    $data .= '<td>' . $row['question'] . '</td>';
    $data .= '<td>';
    $data .= '<input type="submit" value="Xem" name="btnxem"  class="btn btn-sm btn-info"></input>&nbsp';
    $data .= '<input type="submit" value="Sửa" name="btnsua"  class="btn btn-sm btn-warning"></input>&nbsp';
    $data .= '<input type="submit" value="Xóa" name="btnxoa" class="btn btn-sm btn-danger"></input>';
    $data .= '</td>';
    $data .= '</tr>';
}
echo $data;
?>
