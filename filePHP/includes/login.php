<?php
    
    global $db;
    if(isset($_POST['formlogin'])){
        extract($_POST);

        if(!empty($loginEmail) && !empty($loginPassword)){
            $q =$db->prepare("SELECT * FROM utilisateurs WHERE adresseMail = :email");
            $q->execute(['email' => $loginEmail]);
            $result =$q->fetch();

            if($result ==true){
                $_SESSION['email']=$loginEmail;

                //$hashpassword = $result['motDePasse'];
                if(password_verify($loginPassword,$result['motDePasse'])){
                    //Ajouter les sessions ici
                    
                    
                    echo 'Connect en cours';

                }else{
                    echo "le mot de passe n'est pas correcte";
                }
            }else{
                echo " Le compte portant l'eamil ". $loginEmail ."n'existe pas";
            }
        }
        else {
            echo "Veuillez compléter l'ensemble des champs";
        }
    }
?>