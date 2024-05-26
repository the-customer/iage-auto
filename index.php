<?php 
  require_once("./functions/main-functions.php");

  getAllOffres();

  printPHPErrors();

  //recuperer la valeur du parametre d'url : page
  $page = NULL;
  if(isset($_GET["page"])){
    $page = $_GET["page"];
  }
  // $page = $page ?? "home";
  // $page = $page==NULL ? "home" : $page;
  $page = !$page ? "home" : $page;
  //Tester si la page demandee existe dans le dossier ./pages
  $allPages = scandir("pages/");
  if(!in_array("$page.php",$allPages)){
    $page = "404error";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iage-Auto</title>
  </head>
  <body>
  
    <?php require_once("./inc/header.php") ?>
    
    <div>
    <?php
      // require_once('./pages/'.$page.'.php') ;
      require_once("./pages/$page.php") ;
     
    ?>
    </div>

    <?php include_once("./inc/footer.php") ?>
  </body>
</html>