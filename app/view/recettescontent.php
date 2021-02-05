
<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <h1>Recettes</h1> 
            </div>
        </div>
              
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
            
                 <div class="input-icone">
                   
                        <input type="text" placeholder="Recherche"  id="customSearch" class="border inputRecherche">
                        <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>
                    
                </div>
                <div id="toolbar">   
                        <button id="ajouter" type="button" class="btn btnBlanc" data-role="recettes/ajout">
                          <i class="fas fa-plus"></i> Ajouter
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
                        <th data-field="difficulte">Difficulté</th>
                        <th data-field="pour">Pour</th>
                        <th data-field="temps">Temps</th> 
                        <th data-field="chef">Chef</th>
                        <th data-field="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['recettes'] as $value) {
                    ?>    
                        <tr>
                            <td><?=$value->getId()?></td>
                            <td><?=$value->getNom()?></td>
                            <td><?=$value->getDifficulte()?></td>
                            <td><?=$value->getNombrePersonne()?></td>
                            <td><?=$value->getTemps()?></td>
                            <td>Zanoni</td>
                            <td>
                                
                                <button type="button" class="btn btn-link p-0 m-0" data-role="recettes/edition/<?=$value->getId() ?>">Modifier</button></br>
                                
                                    <button type="button" class="btn btn-link p-0 m-0" data-role="recettes/supprimer/<?=$value->getId() ?>">Supprimer</button>
                               
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
        
        
        
    
    
    
    
</section>



