<?php 

include("db.php");

    $id = $_GET['id'];
  //  $make = $_POST['make'];
   // $modelId = $_POST['modelId'];
  //  $model = $_POST['model'];
    //$year = $_POST['year'];
    //$type = $_POST['type'];
  

    $result = $db->query("DELETE FROM pokemon WHERE id = $id");   
    
    if (!$result) {
        die("query error");  /*COMPROBACION DE LA CONSULTA*/

        
       
    }
    else{

        echo  $json = json_encode($result, true);
        
        header("Location: index.php");
    }

   $_SESSION['message']= 'borrado correctamente';
   $_SESSION['message_type']='success';


   header("Location:  index.php"); /*REDIRECCIONA */


?>