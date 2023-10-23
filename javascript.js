var panier = sessionStorage.getItem('panier');
var size = 0;

window.onload = function (){
    if (!panier) {
        panier = []
    }
    else{
        panier = JSON.parse(panier);
    }
    afficherPanier();
}
function setSize(value){
    size = value;
    console.log(size);
}

function ajouterAuPanier(referenceProduit, nomProduit, tailleProduit,
quantiterProduit, prixProduit)
{
    superId = "" + referenceProduit + tailleProduit;
    
    if(panier.length > 0){
        panier.forEach((produits) =>
        {
            if(produits.id == superId)
            {
                produits.quantiter += 1;
            }
            else{
                var produit = {
                    id: superId,
                    ref: referenceProduit,
                    nom: nomProduit,
                    taille: tailleProduit,
                    quantiter: quantiterProduit,
                    prix: prixProduit
                };
            
                panier.push(produit);
            }
        });
    }
    else{
        var produit = {
            id: superId,
            ref: referenceProduit,
            nom: nomProduit,
            taille: tailleProduit,
            quantiter: quantiterProduit,
            prix: prixProduit
        };
    
        panier.push(produit);
    }
    
    afficherPanier();
    // Stocke le panier mis à jour dans la variable de session
    sessionStorage.setItem('panier', JSON.stringify(panier));
}

function supprimerDuPanier(referenceProduit, tailleProduit)
{
    superId = "" + referenceProduit + tailleProduit;
    panier.forEach((produits) =>
    {
        console.log(produits);
        if(produits.id == superId)
        {
            if(produits.quantiter > 1)
            {
                produits.quantiter -= 1;
            }
            else{
                positionProduit = panier.indexOf(produits);
                panier.splice(positionProduit, 1);
            }
            
        }
    });


    afficherPanier();

    // Stocke le panier mis à jour dans la variable de session
    sessionStorage.setItem('panier', JSON.stringify(panier));
}

function afficherPanier()
{
    countPanier = 0;
    for (var i = 0; i < panier.length; i++) {
        countPanier += panier[i].quantiter
    }


    var nbArticles = document.getElementById("countPanier");
    nbArticles.innerHTML = countPanier;

    var panierElement = document.getElementById("panier");
    panierElement.innerHTML = ""; // Efface le contenu précédent du panier
    if(panier.length > 0){

        for (var i = 0; i < panier.length; i++) {
            var produit = panier[i];
            panierElement.innerHTML += "<div class='card'><div class='card-body d-flex justify-content-between'><p>" + produit.nom + "</p><p> Quantiter : "+ produit.quantiter +"</p><a class='btn btn-primary' onclick='javascript :supprimerDuPanier(" + produit.ref +"," + produit.taille + ")'>remove</a></div></div>";
        }
    }
    else{
        panierElement.innerHTML = "Votre panier est vide";
    }
}