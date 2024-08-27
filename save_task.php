<?php

include("db.php");


if(isset($_POST['save_task'])){
    $titulo = $_POST['titulo'];
    $descricion = $_POST['descricion'];

    $query = "INSERT INTO tarea(Titulo, Descripcion) VALUE ('$titulo', '$descricion')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query faild");
    }

    $_SESSION['mensaje'] = 'Tarea Guardada';
    $_SESSION['mensaje_type'] = 'success';


    header("location: index.php");
}
?>