<?php 
    include ('connect.php');
    $query = "SELECT * FROM cauhoi ORDER BY RAND() LIMIT 10"; 
    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
?>
