<?php

/**
 * Verifie si le panier existe, le crée sinon
 * @return booleen
 */

function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['superID'] = array();
      $_SESSION['panier']['référenceProduit'] = array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['tailleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */

function ajouterArticle($référenceProduit,$libelleProduit,$tailleProduit,$qteProduit,$prixProduit,$superID){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($superID,  $_SESSION['panier']['superID']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push($_SESSION['panier']['superID'],$superID);
         array_push($_SESSION['panier']['référenceProduit'],$référenceProduit);
         array_push($_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push($_SESSION['panier']['tailleProduit'],$tailleProduit);
         array_push($_SESSION['panier']['qteProduit'],$qteProduit);
         array_push($_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";

   
}
function enleverArticle($superID,$qteProduit){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($superID,  $_SESSION['panier']['superID']);

      if ($_SESSION['panier']['qteProduit'][$positionProduit] > 1)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] -= $qteProduit;
      }
      else
      {
         supprimerArticle($superID);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($superID){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp = array();
      $tmp['superID'] = array();
      $tmp['libelleProduit'] = array();
      $tmp['référenceProduit'] = array();
      $tmp['tailleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['superID']); $i++)
      {
         if ($_SESSION['panier']['superID'][$i] !== $superID)
         {
            array_push( $tmp['superID'],$_SESSION['panier']['superID'][$i]);
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['référenceProduit'],$_SESSION['panier']['référenceProduit'][$i]);
            array_push( $tmp['tailleProduit'],$_SESSION['panier']['tailleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du panier
 * @return int
 */

function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['superID']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   $total = floatval($total);
   return $total;
}

function MontantTT(){
   $MontantTotal = MontantGlobal();
   $MontantTotal = floatval($MontantTotal + 5);
   return $MontantTotal;
}
function MontantHT(){
   $MontantHorsTaxe = MontantGlobal();
   $MontantHorsTaxe = floatval($MontantHorsTaxe - Tva());
   return $MontantHorsTaxe;
}

function Tva(){
   $MontantTva = MontantGlobal();
   $MontantTva = ($MontantTva/100)*20;
   $Tva = number_format($MontantTva, 2, ',', ' ');
   return $Tva;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['superID']);
   else
   return 0;

}

?>