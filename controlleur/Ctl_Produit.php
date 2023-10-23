<?php

    include "../model/Db_Produit.php";

    $action = $_POST["action"];

    switch ($action){

        case 'getProduit':

            
            // TYPE
            $type = "";
            if (isset($_POST['type'])){
                $type = $_POST['type'];
            }

            // COLOR
            $color = "";
            if (isset($_POST['color'])){
                $color = $_POST['color'];
            }

            // SEXE
            $sexe = "";
            if (isset($_POST['sexe'])){
                $sexe = $_POST['sexe'];
            }

            /*$product = Db_Produit::getProduct($type,$color,$sexe);
            $result = "";
            foreach ($product as $objProduct){

            }*/
            echo Db_Produit::getProduct($type,$color,$sexe);

    }

?>