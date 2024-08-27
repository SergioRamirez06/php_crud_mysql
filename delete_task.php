<?php 

include('db.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tarea WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( !$result ){
        die("query failed");
    }

    $_SESSION['mensaje'] = 'Tarea Eliminada';
    $_SESSION['mensaje_type'] = 'danger';

    header("location: index.php");
}
?>