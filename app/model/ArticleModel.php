<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleModel
 *
 * @author michel
 */
class ArticleModel {
     public function readAll(){
         
         
         $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM articles as a, produits as p, unites_de_mesure as u"
                . " WHERE a.id_produits = p.id_produits AND a.id_unites_de_mesure = u.id_unites_de_mesure AND a.etat_articles <> 'b'";
        
        $resultat = $pdo->query($sql);

        $array = [];
        if($resultat){
            $prixArticleModel = new PrixArticleModel(); 
            $ligneDeCommandeMdel = new LigneDeCommandeModel();
            $lotModel = new LotsModel();
            $importationModel = new ImportationsModel();
            $produitModel = new ProduitsModel();
            while($data = $resultat->fetch( PDO::FETCH_ASSOC )){ 
                $produit = new Produits();
                $produit->setId($data['id_produits']);  
                $produit->setNom($data['nom_produits']);
                
                $unite = new UniteDeMesure();
                $unite->setId($data['id_unites_de_mesure']);  
                $unite->setNom($data['nom_unites_de_mesure']);

                $article = new Articles();
                $article->setId($data['id_externe']);
                $article->setQuantite($data['quantite_unite_articles']);
                $article->setProduits($produit);
                $article->setUniteMesure($unite);
                
                $prixArticle = $prixArticleModel->readOne($data['id_externe']);
                if ($prixArticle){
                    $article->setPrix($prixArticle[0]->prix_prix_article);
                }else{
                    $article->setPrix('Non défini');
                }

                $qtyCommande = $ligneDeCommandeMdel->qtyCommande($data['id_externe']);
                $qtyLot = $lotModel->qtyLot($data['id_externe']);
                $article->setStock($qtyLot - $qtyCommande );
                
                if($produitModel->isProduit($data['id_produits'])){
                    $article->setType('Ingredient');
                } else {
                    $article->setType('Ustensil');
                }
               
                $article->setDateImport($importationModel->dateImport($data['id_externe']));
                
                array_push ($array, $article);
            }
        }
        return $array;
     }
}
