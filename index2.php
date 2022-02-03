<?php
include("api.php");
include("db.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <title>Pokemóns</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.7.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="canalti.css">
  </head>
  <body>
    <section class="hero is-info is-small">
      <div class="hero-body">
        <div class="container has-text-centered">
          <p class="title">
            INVENTARIO POKÉMON
          </p>
          <p class="subtitle">
           
          </p>
        </div>
      </div>
    </section>
    <div class="box cta">
      
    </div>
    <section class="container">
      <?php

      
      $result = $db->query("SELECT name, count(*) as cuenta FROM pokemon GROUP by name;");

      $row = array();

      $i = 0;

       while($res = $result->fetchArray(SQLITE3_ASSOC)){

           if(!isset($res['name'])) continue;

            $row[$i]['name'] = $res['name'];
            $row[$i]['cuenta'] = $res['cuenta'];
            

           
        
?>
            

<?php if($i % 3 == 1) { ?>
      <div class="columns features">
      <?php } ?>
        <div class="column is-4">
          <div class="card">
            <div class="card-image has-text-centered">
              <figure class="image is-128x128">
              <?php foreach($pokemons->pokemon as $Pokemon) {?>
            <?php  if($row[$i]['name'] == $Pokemon->name){ ?>
                <img src="<?=$Pokemon->img?>" alt="<?=$Pokemon->name?>" class="" data-target="modal-image2">
              </figure>
              <?php }
                }?> 
            </div>
            <div class="card-content has-text-centered">
              <div class="content">
                <h4><?=$row[$i]['name']?></h4>
                <p>
                 
                    Número:
                    <h4><?=$row[$i]['cuenta']?></h4>
                
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php if($i % 3 == 0) { ?>
      </div>
      <?php }
      
      
  
      
      $i++;
        }

        
      ?>
