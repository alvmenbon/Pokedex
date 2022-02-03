<?php 

include("db.php");

if (isset($_POST['save-poke'])){
    $name = $_POST['name'];
   $date = $_POST['date'];
   


  

    
    $result = $db->query("INSERT INTO pokemon(name, date) VALUES('$name', '$date')");
    
    
    if (!$result) {
        die("query error");  /*COMPROBACION DE LA CONSULTA*/
    }

    $_SESSION['message']= 'Coche añadido correctamente';
    $_SESSION['message_type']='success';


    header("Location:index.php"); /*REDIRECCIONA */
}

?>