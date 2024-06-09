<?php 
  require_once("./functions/main-functions.php");
 

  printPHPErrors();

  //recuperer la valeur du parametre d'url : page
  $page = NULL;
  if(isset($_GET["page"])){
    $page = $_GET["page"];
  }

  // $page = $page ?? "home";
  // $page = $page==NULL ? "home" : $page;
  $page = !$page ? "home" : $page;
  $urls = explode("-",$page);
  $page = $urls[0];

  //Tester si la page demandee existe dans le dossier ./pages
  $allPages = scandir("pages/");
  if(!in_array("$page.php",$allPages)){
    $page = "404error";
  }
//Rechercher dans functions, si il ya un fichier qui constient les functions de la page demandee
  $functions_file = scandir("functions/");
  if(in_array("$page.func.php",$functions_file)){
    require_once("./functions/$page.func.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css"/>
    <link type="text/css" rel="stylesheet" href="css/my-style.css"/>
    <title>Iage-Auto</title>
  </head>
  <body>
  
    <?php require_once("./inc/header.php") ?>
    
    
    <div class="container">
      <?php require_once("./inc/ban.php") ?>

      <?php require_once("./inc/infos.php") ?>


    <?php
      // require_once('./pages/'.$page.'.php') ;
      require_once("./pages/$page.php") ;
     
    ?>
    </div>

    <?php include_once("./inc/footer.php") ?>
    <script type="text/javascript" src="js/materialize.js"></script>
  </body>
</html>