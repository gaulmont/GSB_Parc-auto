<?php

    session_start();

    require_once 'fonctions.php';

    $login = $_POST['username'];
    $mdp = hash('sha256', $_POST['password']);

    $bd = connexion();

    $req = $bd->prepare("SELECT Count(id) as NbPersonne FROM visiteur WHERE login = ? AND mdp = ? AND statut = ?");

    $donnees = [$login, $mdp, 2];
    $req->execute($donnees);

    while($result = $req->fetch())
    {

        if ($result['NbPersonne'] == 1)
        {
            $bd = connexion();
            $req = $bd->prepare("SELECT id,nom,prenom,login FROM visiteur INNER JOIN statut ON visiteur.statut = statut.idStatut WHERE login = ? AND mdp = ? AND statut = ?");
            $donnees = [$login, $mdp, 2];
            $req->execute($donnees);


            while($utilisateur = $req->fetch())
            {
                $_SESSION['login'] = $utilisateur['mailUser'];
                $_SESSION['nom'] = $utilisateur['nomUser'];
                $_SESSION['prenom'] = $utilisateur['prenomUser'];
                $_SESSION['id'] = $utilisateur['idUser'];
            }

           header('Location: accueil.php');
        }

        else 
        {
            echo 'ERREUR, nom ou mot de passe invalide.';
            header('Location: index.html');
        }

    }
?>