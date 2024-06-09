<?php
function getAllOffres($type){
    global $db; 

    $req = $db->query("
        SELECT * FROM offres WHERE vente = $type ORDER BY vip DESC
    ");
    
    if($type == -1){//toutes les offres
        $req = $db->query("
            SELECT * FROM offres ORDER BY vip DESC
        ");
    }
    
    $offres = [];
    while($offre = $req->fetchObject()){
        $offres[] = $offre;
    }

    return $offres;
}
