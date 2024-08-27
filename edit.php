<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tarea WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows($result) == 1 ){
        $result = mysqli_fetch_array($result);
        $title = $result['Titulo'];
        $descripcion = $result['Descripcion'];
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $descripcion = $_POST['descripcion'];
       
        $query = "UPDATE tarea set Titulo = '$title', Descripcion = '$descripcion' WHERE id = '$id'";
        mysqli_query($conn, $query);
        $_SESSION['mensaje'] = 'Tarea Actualizada';
        $_SESSION['mensaje_type'] = 'warning';
        header("location: index.php");
    }
    
}
?>
<?php include("includes/header.php");?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="title" 
                                value=<?php echo $title; ?>
                                class="form-control m-2"
                                placeholder="Actualiza Titulo">
                        </div>
                    
                    <div class="form-group m-2">
                        <textarea 
                            name="descripcion"
                            rows="2"
                            class="form-control"
                            placeholder="descripcion">
                            <?php echo $descripcion; ?>
                        </textarea>
                    </div>
                    <button 
                        class="btn btn-success m-2"
                        name="update">
                        update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include("includes/footer.php");?>
