<?php
include("api.php");
include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM pokemon WHERE id = $id");
    if($result->numColumns() == 1) {
       /* echo 'you can edit'; */
       $row = $result->fetchArray();
       $name = $row['name'];  //COGE DATOS TABLA
 
       
    }
}

if (isset($_POST['update'])){
   /* echo 'updating';*/
   $id = $_GET['id'];
   $name = $_POST['name'];
  
  /* echo $brand;
   echo $model;
   echo $year;
   echo $matricula;
   echo $precio;*/
   $db->query("UPDATE pokemon set name = '$name' WHERE id = $id");
   

    $_SESSION['message']= 'Datos editados correctamente';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
   <div class="row">
       <div class="col-md-4 mx-auto">
           <div class="card card-body">
               <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST" >
                   
                   <select name="name" id="name" class="form-control">
                <option value="" selected>Seleccione un pokemon nuevo</option>
                <?php foreach($pokemons->pokemon as $Pokemon): ?>
                    <option value="<?php echo $Pokemon->name; ?>"><?php echo $Pokemon->name; ?></option>
                <?php endforeach; ?>
            
                
            </select>
            <br>
                   <button class="btn btn-succes" name="update">Editar</button>
               </form>
           </div>
       </div>
   </div> 
</div>

<?php include("includes/footer.php") ?>