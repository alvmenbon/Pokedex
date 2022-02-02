<?php include("api.php") ?>
<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>                                      
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           <?php session_unset(); } ?>
            <div class="card card-body">
        <form action="save-poke.php" method="POST">
        <div class="form-group">
            <label>POKÉMONs</label>
            <br>
            <br>
            <select name="name" id="name" class="form-control">
                <option value="" selected>Seleccione un pokemon</option>
                <?php foreach($pokemons->pokemon as $Pokemon): ?>
                    <option value="<?php echo $Pokemon->name; ?>"><?php echo $Pokemon->name; ?></option>
                <?php endforeach; ?>
            
                
            </select>
            <br>
            <br>
            <input type="submit" name="save-poke" value="Añadir pokemon">
        </form>
        </div>        
    </div>
    
</div>


<div class="col-md-8">
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>


                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $result_car = $db->query("SELECT * FROM pokemon");

            while ($row = $result_car->fetchArray()) { ?>
                <tr>
                
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>


                    <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fab fa-bitcoin"></i>
                                </a>
                                <a href="delete-poke.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>

                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("includes/footer.php")?>
