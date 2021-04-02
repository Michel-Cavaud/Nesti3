

<!-- Modal -->
<div class="modal fade" id="modalSupp" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modalCorps m-5 text-center">
            <div class="modalTitre mt-5 mb-4">
                <div class="my-5">
                    <i class="fas fa-exclamation-triangle fa-2x mx-2"></i>
                    <span>Voulez vous vraiment supprimer l'élément : </span><span id="idSupp"></span>
                </div>
            </div>
            <div>
                <div class="modalAvertissement mt-3 py-5 rounded">Cette action est irréversible !</div>
                
            </div>
            <div class="modalBoutons my-5 text-right" >
                <button type="button" id="btnSupp" data-role=""  class="btn btn-lg btnValider mr-5">Confirmer</button>
                <button type="button" class="btn btn-lg btnCorbeille mr-5" data-dismiss="modal">Annuler</button>
                
            </div>
        </div>
    </div>
</div>


<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <h1>Articles</h1> 
            </div>
        </div>
              
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
            
                 <div class="input-icone">
                   
                        <input type="text" placeholder="Recherche"  id="customSearch" class="border inputRecherche">
                        <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>
                    
                </div>
                <div id="toolbar">  
                        <button id="commandes" type="button" class="btn btnCommandes" data-role="articles/commandes">
                          <i class="far fa-eye"></i>  Commandes
                        </button>
                        <button id="importer" type="button" class="btn btnBlanc" data-role="articles/importer">
                          <i class="fas fa-plus"></i>  Importer
                        </button>
                </div>
             <table
                class="table-borderless table-striped text-center"
                id="table"
                data-toggle="table"
                data-sortable="true"
                data-pagination="true"
                data-pagination-pre-text="Précédente"
                data-pagination-next-text="Suivante"
                data-search="true"
                data-search-align="left"
                data-search-selector="#customSearch"
                data-locale="fr-FR"
                data-toolbar="#toolbar"
                data-toolbar-align="right"
                >
              
                <thead>
                    <tr class="trTable">
                        <th data-field="id">ID</th>
                        <th data-field="nom">Nom</th>
                        <th data-field="difficulte">Prix de vente</th>
                        <th data-field="pour">Type</th>
                        <th data-field="temps">Dernière importation</th> 
                        <th data-field="chef">Stock</th>
                        <th data-field="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['article'] as $value) {
                    ?>    
                        <tr>
                            <td><?=$value->getId()?></td>
                            <td><?=$value->getQuantite() . ' ' . $value->getUniteMesure()->getNom() . ' de ' . $value->getProduits()->getNom()?></td>
                            <td><?=$value->getPrix() ?></td>
                            <td><?= $value->getType() ?></td>
                            <td><?= $value->getDateImport() ?></td>
                            <td><?=$value->getStock() ?></td>
                            <td>
                                
                                <button type="button" class="btn btn-link p-0 m-0" data-role="articles/edition/<?=$value->getId() ?>">Modifier</button></br>
                                
                                <button type="button" class="btn btn-link p-0 m-0" data-role="supprimerModal" data-lien="articles" data-id="<?=$value->getId() ?>">Supprimer</button>
                               
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
        
        
        
    
    
    
    
</section>



