<?php 
    global $urls;
    // $type = $urls[1] == "vente" ? 1 : 0;
    // if($urls[1] == "vente"){
    //     $type = 1;
    // }elseif ($urls[1] == "location") {
    //     $type = 0;
    // }elseif($urls[1] == "toutes") {
    //     $type = -1; //toutes les offres
    // }else{
    //     //rediriger page index
    //     header("Location:index.php");
    // }

    switch ($urls[1]) {
        case 'vente':
            $type = 1;
            break;
        case 'location':
            $type = 0;
            break;
        case 'toutes':
            $type = -1;
            break;
        default:
            //rediriger page index
            header("Location:index.php");
            break;
    }
    $offres = getAllOffres($type);
?>





<div class="row">
<nav style="margin-top:30px" class="red darken-2 col s9">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li class="<?= $type==-1 ? "active" : "" ?>"><a href="?page=offres-toutes">TOUTES</a></li>
        <li class="<?= $type==0 ? "active" : "" ?>"><a href="?page=offres-location">A LOUER</a></li>
        <li class="<?= $type==1 ? "active" : "" ?>"><a href="?page=offres-vente">A VENDRE</a></li>
      </ul>
    </div>
  </nav>
</div>

<div class="row">
    <div class="col s12 m6 l9">
<?php foreach($offres as $offre) { ?>
    <div class="row">
    <div class="col s12">
        <div class="card horizontal">
        <div class="card-image">
            <img style="width:200px" src="https://thegoodlife.fr/wp-content/thumbnails/uploads/sites/2/2023/04/voiture-la-plus-chere-au-monde-tt-width-1920-height-1536-fill-0-crop-0-bgcolor-eeeeee.jpg">
            <h5 class="center-align red-text">
                <?= $offre->prix ?> FCFA
            </h5>
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <h5>
                    <?= $offre->titre ?>
                    <?php 
                        if($offre->vip == 1){
                            echo '<img style="width:4%; float:right" src="./img/vip.png"/>'; 
                        }
                    ?>
                    
                </h5>
                <div class="chip light-blue">
                    <?= $offre->marque; ?>
                </div>
                <div class="chip">
                    <?= $offre->modele; ?>
                </div>
                <div class="chip">
                    <?= ($offre->neuve == 0)? "Occasion" : "Neuve"; ?>
                </div>
                <div class="chip">
                    <?= (empty($offre->couleur_externe)) ? "Couleur Ex" : $offre->couleur_externe ?>
                </div>
                <div class="chip light-green">
                    <?= $offre->boite_de_vitesse; ?>
                </div>

                <div class="chip">
                    <?= (empty($offre->nombre_de_portes)) ? "4" : $offre->nombre_de_portes ?> Portes
                </div>
                <div class="chip deep-orange">
                    <?= (empty($offre->energie)) ? "Energie" : $offre->energie ?>
                </div>
                <div class="chip">
                    <?= (empty($offre->kilometrage)) ? "Kilometrage" : $offre->kilometrage ?> Km
                </div>
                <div class="chip">
                    Année : <?= $offre->annee; ?>
                </div>
                <div class="chip light-blue text-primary">
                    <?= (empty($offre->garantie)) ? "Garantie" : $offre->garantie ?>
                </div>
                <div class="chip teal lighten-2">
                    <?= $offre->vente == 1 ? "Vente" : "Location" ?> 
                </div>
                <div class="chip orange">
                    <?= $offre->prix ?> FCFA
                </div>
            </div>
            <div class="card-action">
            Par : ... - Ref : ... - publiée : Le 04/03/2024
            <a style="float:right" href="#">
                <i class="material-icons right">more_horiz</i>
            </a>
            </div>
        </div>
        </div>
    </div>
    </div>
<?php }  ?>
    </div>

    <div class="col s12 m6 l3">
   
        <div class="card mt-5">
            <div class="card-content">
                <h5 class="grey-text text-darken-2 center-align">Annonce VIP</h5>
                <h6 class="grey-text">Le 12/10/2017 à 18h:30 par Aly Tall Niang</h6>
            </div>
            <div class="card-image waves-effect waves-block waves-light">
                <img src="img/offres/lamborghini.jpg" class="activator" alt="Image introuvable!"/>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">autorenew</i></span>
                <p class="small"><a href="index.php?page=post&id=1">Voir l'article complet</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Titre <i class="material-icons right">close</i></span>
                <p style="text-align: justify">
                    It’s 2017. Keep grinding. Keep hustling. You know all the cliché shit, but most of all, figure yourself out.
                    <br/>
                    Everybody’s trying to make you fix all your shortcomings, fuck your shortcomings. <br/>
                    Triple down on your strengths. What do you want? Whatever it may be, you need to reverse engineer your ambition and go get it.
                </p>
            </div>
        </div>

    </div>
</div>


