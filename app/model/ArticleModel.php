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

    public function readAll() {

        $pdo = Database::getPdo();

        $sql = "SELECT * FROM articles as a, produits as p, unites_de_mesure as u"
                . " WHERE a.id_produits = p.id_produits AND a.id_unites_de_mesure = u.id_unites_de_mesure AND a.etat_articles <> 'b'";

        $resultat = $pdo->query($sql);

        $array = [];
        if ($resultat) {
            $prixArticleModel = new PrixArticleModel();
            $ligneDeCommandeMdel = new LigneDeCommandeModel();
            $lotModel = new LotsModel();
            $importationModel = new ImportationsModel();
            $produitModel = new ProduitsModel();
            while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) {
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
                if ($prixArticle) {
                    $article->setPrix($prixArticle[0]->prix_prix_article);
                } else {
                    $article->setPrix('Non défini');
                }

                $qtyCommande = $ligneDeCommandeMdel->qtyCommande($data['id_externe']);
                $qtyLot = $lotModel->qtyLot($data['id_externe']);
                $article->setStock($qtyLot - $qtyCommande);

                if ($produitModel->isProduit($data['id_produits'])) {
                    $article->setType('Ingredient');
                } else {
                    $article->setType('Ustensil');
                }

                $article->setDateImport($importationModel->dateImport($data['id_externe']));

                array_push($array, $article);
            }
        }
        return $array;
    }

    public function readOne($id) {

        $pdo = Database::getPdo();

        $sql = "SELECT * FROM articles as a, produits as p, unites_de_mesure as u"
                . " WHERE a.id_produits = p.id_produits AND a.id_unites_de_mesure = u.id_unites_de_mesure AND a.etat_articles <> 'b' AND id_externe = :id";

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

        $array = [];
        if($resultat && $sth->rowCount() > 0){
            $data = $sth->fetch();
            $prixArticleModel = new PrixArticleModel();
            $ligneDeCommandeMdel = new LigneDeCommandeModel();
            $lotModel = new LotsModel();
            $importationModel = new ImportationsModel();
            $produitModel = new ProduitsModel();
           
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
            $article->setNomCom($data['nom_usage_articles']);

            $prixArticle = $prixArticleModel->readOne($data['id_externe']);
            if ($prixArticle) {
                $article->setPrix($prixArticle[0]->prix_prix_article);
            } else {
                $article->setPrix('Non défini');
            }

            $qtyCommande = $ligneDeCommandeMdel->qtyCommande($data['id_externe']);
            $qtyLot = $lotModel->qtyLot($data['id_externe']);
            $article->setStock($qtyLot - $qtyCommande);

            /*if ($produitModel->isProduit($data['id_produits'])) {
                $article->setType('Ingredient');
            } else {
                $article->setType('Ustensil');
            }*/

            //$article->setDateImport($importationModel->dateImport($data['id_externe']));
            
            $image= new Images();
            if ($data['id_images'] != null){
                $image->setId($data['id_images']);
            }
            $article->setImage($image); 
            
        }
        return $article;
    }

    public function delete($id) {
        $pdo = Database::getPdo();

        $sql = 'UPDATE `articles` SET `etat_articles` = "b" WHERE `articles`.`id_externe` = :id';
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $id));
    }
      
    public function update($article){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `articles` SET  `nom_usage_articles` = :nom '
            . ' WHERE `id_externe` = :id';
       
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $article->getId(), 'nom' => $article->getNomCom()));
    }
    
    public function supImage($id){
        
        $sql = "UPDATE `articles` SET `id_images` = NULL WHERE `articles`.`id_externe` = :id;";
   
        $pdo = Database::getPdo();
         try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('id' => $id));
            $pdo->commit();
         
        } catch(PDOException $e) {
            $pdo->rollback();
        }
    }

}
