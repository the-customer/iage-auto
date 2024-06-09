<?php 
    global $urls;
    // if($urls[1] == "vente"){
    //    $type = 1;
    // }
    // else if($urls[1] == "location"){
    //     $type = 0;
    // }

    $type = $urls[1] == "vente" ? 1 : 0;
    $offres = getAllOffres($type);

    //Les colonne a afficher au niveau des information (chips)
    $properties = [
        "marque","modele","neuve","couleur_externe","boite_de_vitesse",
        "nombre_de_portes","energie","kilometrage","annee","garantie","prix"
        ];
    
?>

<nav style="margin-top:30px" class="red darken-2">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="sass.html">TOUTES</a></li>
        <li><a href="badges.html">A LOUER</a></li>
        <li><a href="collapsible.html">A VENDRE</a></li>
      </ul>
    </div>
  </nav>

<?php foreach($offres as $offre) { ?>

    <div class="col s12 m6">
        <div class="card horizontal">
        <div class="card-image">
            <img src="https://thegoodlife.fr/wp-content/thumbnails/uploads/sites/2/2023/04/voiture-la-plus-chere-au-monde-tt-width-1920-height-1536-fill-0-crop-0-bgcolor-eeeeee.jpg">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <?php foreach ($properties as $prop) { ?>
                <div class="chip red white-text">
                    <?php 
                        if($prop == "neuve"){
                            echo  $offre->$prop == 0 ? "occasion" : "neuve";
                        }else{
                            if($prop == "prix"){
                                echo $offre->$prop . " FCFA";
                            }else{
                                echo $offre->$prop;
                            }
                        }
                        
                    ?>
                    
                </div>
                <?php } ?>
            </div>
            <div class="card-action">
            <a href="#">This is a link</a>
            </div>
        </div>
        </div>
    </div>
<?php }  ?>