<?php

include "../model/Connect_Pdo.php";

class Db_Produit{

    public static function getProduct($type,$color,$sexe){

        //$variable = ["type","color","sexe"];
        $liste = ["type" => $type, "color" => $color, "sexe" => $sexe];
        $data = [];

        $sql = "SELECT * FROM bijoux WHERE";
        $pos = 0;
        foreach ($liste as $key => $value){
            if ($value != ""){
                if($pos == 0){
                    $sql .= " ".$key." = (?);";
                    $pos += 1;
                    $data += [$value];
                }
                else{
                    $sql .= " AND ".$key." = (?);";
                    $pos += 1;
                    $data += [$value];
                }
            }
        }
        
        $stmt = Connect_Pdo::getObjPdo()->prepare($sql);
        $stmt->execute($data);
        $result = $stmt->fetchAll();

        $out ='<div class="row row-cols-1 row-cols-sm-2  row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4 g-4">';

        foreach ($result as $objResult){

            $out .= '
                <div class="col">
                    <div class="card">
                        <img src="../ressources/'.$objResult['Picture_Name'].'.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$objResult['type'].' '.$objResult['Product_Name'].' '.$objResult['couleur'].'</h5>
                            <div class="d-flex justify-content-between">
                                <h5><strong>'.$objResult['Price'].' €</strong></h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="javascript :setSize(document.getElementById(\''.$objResult['Id'].'\').value)">
                                    <h5>Acheter</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Selection de taille</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select id="'.$objResult['Id'].'" name="size" onchange="javascript :setSize(value)">
                            <option value="40">40</option>
                            <option value="41">41</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <a class="btn btn-secondary float-end" data-bs-dismiss="modal" onclick="javascript :ajouterAuPanier('.$objResult['Id'].',\' '.$objResult['Product_Name'].'\',size,1,'.$objResult['Price'].')">Valider</a>
                    </div>
                    </div>
                </div>
                </div>
                ';

            // $out .= "<br> ID : ".$objResult[0]."<br> Type : ".$objResult[1]."<br> Color : ".$objResult[2]."<br> Sexe : ".$objResult[3];
        }
        $out .='</div>';
        return $out;

    }



}

?>
