<?php

function samePassword($pass1, $pass2){
    return $pass1 == $pass2;
}

//
function saveUser($nom,$prenom,$email,$telephone,
                $adresse,$profession,$password){

                    global $db;
                    $reference = substr($nom,0,1).
                                 substr($prenom,0,1).date("dmyhis");
                    $t = [
                        "nom"       => $nom,
                        "prenom"    => $prenom,
                        "email"     => $email,
                        "telephone" => $telephone,
                        "adresse"   => $adresse,
                        "profession"=> $profession,
                        "password"  => sha1($password),
                        "ref"  => $reference,
                        "role"=> "user"
                    ];

                    $req ="
                        INSERT INTO 
                        utilisateur(nom,prenom,email,telephone,adresse,profession,password,reference,role)
                        VALUES(:nom,:prenom,:email,:telephone,:adresse,:profession,:password,:ref,:role)
                    ";
                    $query = $db->prepare($req);
                    return $query->execute($t);
}