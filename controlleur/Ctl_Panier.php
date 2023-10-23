<?php

    include_once("../model/Panier.php");

    $erreur = false;

    $action = (isset($_POST['action'])? $_POST['action']:null);
    if($action !== null)
    {
        if(!in_array($action,array('ajout', 'remove', 'suppression')))
        $erreur=true;

        //récupération des variables en POST
        $r = (isset($_POST['r'])? $_POST['r']:null);
        $l = (isset($_POST['l'])? $_POST['l']:null);
        $s = (isset($_POST['s'])? $_POST['s']:null);
        $p = (isset($_POST['p'])? $_POST['p']:null);
        $q = (isset($_POST['q'])? $_POST['q']:null);
        $superID = $r.$s;

        //Suppression des espaces verticaux
        $l = preg_replace('#\v#', '',$l);
        //On vérifie que $p est un float
        $p = floatval($p);

        /*if ($s == "xs"){
            $r += 10;
        }*/

        //On traite $q qui peut être un entier simple ou un tableau d'entiers
            
        if (is_array($q)){
            $QteArticle = array();
            $i=0;
            foreach ($q as $contenu){
                $QteArticle[$i++] = intval($contenu);
            }
        }
        else
        $q = intval($q);
        
    }

    if (!$erreur){
        switch($action){
            Case "ajout":
                ajouterArticle($r,$l,$s,$q,$p,$superID);
                /*$out ="";
                for ($i=0 ;$i < count($_SESSION['panier']["référenceProduit"]) ; $i++)
                {
                    $out.="<div class='card'><div class='card-body'>".$_SESSION['panier']['libelleProduit'][$i]."</div></div>";
                }
                echo $out;*/
                break;
     
           Case "remove":
               enleverArticle($superID,$q);
               break;
     
           Case "suppression":
              supprimerArticle($superID);
              break;
     
     
           Default:
              break;
        }
    }


?>