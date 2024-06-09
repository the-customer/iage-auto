<?php
    $error = "";
    $nom = "";
    $prenom = "";
    $email = "";
    $telephone = "";
    $adresse = "";
    $profession = "";
    $ok = false;

    if(isset($_POST["submit"])){
        //Recuperer tous les champs
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $telephone = htmlspecialchars(trim($_POST["telephone"]));
        $adresse = htmlspecialchars(trim($_POST["adresse"]));
        $profession = htmlspecialchars(trim($_POST["profession"]));
        $password1 = htmlspecialchars(trim($_POST["password1"]));
        $password2 = htmlspecialchars(trim($_POST["password2"]));
        

        if(empty($nom) || empty($prenom)|| 
        empty($telephone)|| empty($adresse)|| 
        empty($profession)|| empty($email)|| 
        empty($password1)|| empty($password2)){
            $error =  "Tous les champs sont requis! 😡";
        }
        //Verifier les deux mot de pass
        if(!samePassword($password1,$password2)){
            $error = "Les mots de passe ne sont pas conformes!!!";
        }
        
        //Pas d'erreurs
        if(empty($error)){
            //Enregistrer les infos dans la base de donnees:
            saveUser($nom,$prenom,$email,$telephone,
                $adresse,$profession,$password1);
            $ok = true;
        }
    }
?>


<h2>Création de Compte</h2>
<div class="row">
    <div class="col m6 s12">
        <h4>Utilisateur</h4>
        <span>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ducimus earum expedita fugiat harum libero maxime molestiae nesciunt, porro quam sequi sint totam ullam ut voluptatem. Ea laboriosam reprehenderit voluptatum.
        </span>
    </div>
    <div class="col m6 s12">
        <h4>Informations de l'utilisateur</h4>

            <?php if(!empty($error)){ ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?= $error ?>
                    </div>
                </div>
           <?php } ?>
           <?php if($ok){ ?>
                <div class="card light-green">
                    <div class="card-content white-text">
                        Inscription acceptée
                    </div>
                </div>
            <?php } ?>

        <form method="post">
            <div class="row">

                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <input type="text" name="nom" id="nom" value="<?= $nom ?>"/>
                        <label for="nom">Nom</label>
                    </div>
                    <div class="input-field col s6"">
                        <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>"/>
                        <label for="prenom">Prénom</label>
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" value="<?= $email ?>"/>
                    <label for="name">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="telephone" id="telephone" value="<?= $telephone ?>"/>
                    <label for="telephone">Téléphone</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="adresse" id="adresse" value="<?= $adresse ?>"/>
                    <label for="adresse">Adresse</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="profession" id="profession" value="<?= $profession ?>"/>
                    <label for="adresse">Profession</label>
                </div>
                <div class="col s12">
                    <div class="input-field col s6">
                        <input type="password" name="password1" id="password1"/>
                        <label for="password1">Mot de passe</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="password" name="password2" id="password2"/>
                        <label for="password2">Confirmation</label>
                    </div>
                </div>

                <div class="col s12">
                    <button type="submit" name="submit" class="btn green right">S'inscrire</button>
                </div>
            </div>
        </form>
    </div>
</div>