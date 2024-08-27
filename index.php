<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if(isset($_SESSION['mensaje'])){?>
                <div class="alert alert-<?=$_SESSION['mensaje_type']?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['mensaje']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">

                <form action="save_task.php" method="POST">
                    <div class="form-group m-2">
                        <input 
                            type="text" 
                            name="titulo" 
                            class="form-control" 
                            placeholder="Task Titulo" 
                            autofocus>
                    </div>
                    <div class="form-group m-2">
                        <textarea 
                            name="descricion" 
                            rows=2 
                            class="form-control" 
                            placeholder="task Description"></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <input
                            class="btn btn-success m-2" 
                            type="submit" 
                            name="save_task" 
                            value="Save task"/>
                    </div>
                </form>
            </div>
        </div>


        <div class="col md-8">
            <table class="table table-bordered">
                
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>descripcion</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tarea";
                            $resultado_tarea = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($resultado_tarea)){?>
                            <tr>
                                <td><?php echo $row['Titulo']?></td>
                                <td><?php echo $row['Descripcion']?></td>
                                <td><?php echo $row['created_at']?></td>
                                <td>
                                    <a 
                                        href="edit.php?id=<?php echo $row['id']?>" 
                                        class="btn btn-secondary m-2">
                                        Editar
                                    </a>
                                    <a 
                                        href="delete_task.php?id=<?php echo $row['id']?>"
                                        class="btn btn-danger m-2">
                                        Delete
                                    </a>


                                </td>
                            </tr>

                        <?php }?>
                    </tbody>
                </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>

