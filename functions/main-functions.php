<?php

    //Se connecter a la base de données
    $dbhost = 'localhost'; //l'adresse de la base de données
    $dbname = 'samaauto'; //le nom de la base de données
    $dbuser = 'root'; //nom d'utilisateur
    $dbpswd = 'root';

    //
    try{
        $db = new PDO(
            'mysql:host='.$dbhost.';dbname='.$dbname,
            $dbuser,
            $dbpswd,
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            )
        );
    }catch(PDOException $e){
 
        die("Impossible de se connecter a la base de donnees😩!!!");
    }
    





    //Recuperer les informations a afficher:
    function getInfos(){
        global $db;
        $req = $db->query("
            SELECT
            *
            FROM informations
            WHERE etat = 1
            ");
        $results = [];
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }


    function printPHPErrors(){
        error_reporting(E_ALL & ~E_DEPRECATED);
        ini_set("display_errors", 1);
    }
    //
    function dd($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        // die();
        die;
        // die("sdfdsjkl");
    }












    // global $db;
    // $req = $db->query("

    //     SELECT *
    //     FROM offres
    //     JOIN utilisateur
    //     ON offres.id_utilisateur=utilisateur.idUser
    //     WHERE  offres.id=$id
    //     ");
    // $results = $req->fetchObject();
    // if(!empty($results)){

    //     $cons =intval($results->nbre_consultation)+1;
    //     $id = $results->id;
    //     $i = [
    //         'id'        =>'$id',
    //         'nbre'     =>'$cons'
    //     ];
    //     $sql = "UPDATE offres SET nbre_consultation = :nbre WHERE id = :id";

    //     $req = $db->prepare($sql);
    //     $req->execute($i);
    // }
    // return $results;

