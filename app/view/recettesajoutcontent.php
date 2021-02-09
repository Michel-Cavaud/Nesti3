
<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <form action="" method="POST" id="recette">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h1>Création d'une recette</h1>
                            <div class="form-group">
                                <label for="nomRecette">Nom de la recette</label>
                                <input <?= $data['actifHaut']?> type="text" class="form-control rounded p-3" id="nomRecette" name="nomRecette" value="<?= $data['recette']->getNom(); ?>">
                                <div class="erreur"><?= $data['nomRecetteMessage'] ?></div>
                                <small class="form-text">Auteur de la recette : Cyril Lignac</small>
                            </div>

                        
                            <div class="form-group row justify-content-between">
                                <label for="difficulte" class="col-sm-6 col-form-label">Difficulté (note sur 5)</label>
                                <div class="col-sm-3">
                                    <select <?= $data['actifHaut']?> class="custom-select"id="difficulte" name="difficulte">   
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select><div class="erreur"><?= $data['difficulteMessage'] ?></div>
                                </div>
                                
                            </div>
                             
                        

                            <div class="form-group row justify-content-between">
                                <label for="nbPersonne" class="col-sm-6 col-form-label">Nombre de personne</label>
                                
                                <div class="col-sm-3">
                                    <input <?= $data['actifHaut']?> type="text" class="form-control rounded text-center" id="nbPersonne" name="nbPersonne"  value="<?= $data['recette']->getNombrePersonne(); ?>">
                                    <div class="erreur"><?= $data['nbPersonneMessage'] ?></div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-between">
                                <label for="temps" class="col-sm-6 col-form-label">Temps de préparation en minutes</label>
                                
                                <div class="col-sm-3">
                                    <input <?= $data['actifHaut']?> type="text" class="form-control rounded text-center" id="temps" name="temps"  value="<?= $data['recette']->getTempsBrut(); ?>">
                                    <div class="erreur"><?= $data['tempsMessage'] ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button <?= $data['actifHaut']?> type="submit" name="ok" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3">
                                   <button type="button" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <img src="<?=PATH_IMAGES . 'vide.png'?>" alt="Image vide" class="img-fluid">
                            <div class="mt-3">Télecharger une nouvelle image</div>
                            
                            <div class="form-group row justify-content-between">
                               
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="button" class="btn  btn-lg btnOK">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
</section>


<section class="mt-5 basRecette" >
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 mt-4 mb-5">
                <div class="row justify-content-between">
                    <div class="col-1"></div>
                    <div class="col-7">
                        <h2 class="ml-5">Préparations</h2>
                    </div>
                    <div class="col-4">
                        <h2>Liste des ingrédients</h2>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-8">
                        <div class="row align-items-end">
                            <div class="col-2 text-right">
                                <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnBas ml-2 mt-1 mb-1">
                                        <img src="<?=PATH_IMAGES . 'icons/down-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                    
                                </div>
                                <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnCorbeille ml-2 mt-2 mb-4">
                                        <img src="<?=PATH_IMAGES . 'icons/delete-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group pr-3">
                                    <textarea <?= $data['actif']?>  class="form-control p-3 preparation" id="preparation" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-2 text-right">
                                 <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnBas ml-2 mt-1 mb-1">
                                        <img src="<?=PATH_IMAGES . 'icons/up-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                    
                                </div>
                                <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnBas ml-2 mt-1 mb-1">
                                        <img src="<?=PATH_IMAGES . 'icons/down-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                    
                                </div>
                                <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnCorbeille ml-3 mt-2 mb-4">
                                        <img src="<?=PATH_IMAGES . 'icons/delete-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group pr-3">
                                    <textarea <?= $data['actif']?> class="form-control p-3 preparation" id="preparation" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-2 text-right">
                                 <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnBas ml-2 mt-1 mb-1">
                                        <img src="<?=PATH_IMAGES . 'icons/up-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                    
                                </div>
                                <div>
                                    <button <?= $data['actif']?> type="button" class="btn btnCorbeille ml-2 mt-2 mb-4">
                                        <img src="<?=PATH_IMAGES . 'icons/delete-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group pr-3">
                                    <textarea <?= $data['actif']?> class="form-control p-3 preparation" id="preparation" rows="7"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-2 text-right">
                                
                            </div>
                            <div class="col-9">
                                <div class="form-group pr-3">
                                    <button <?= $data['actif']?> type="button" class="btn btnPlus">
                                        <img src="<?=PATH_IMAGES . 'icons/grosPlus.png'?>" alt="" class="img-fluid">
                                    </button>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="articlesngredients p-3">
                               <div class="row"  <?= $data['actif']?>>
                                  
                                </div>      
                            </div>
                        <div class="form-group">
                            <label class="col-form-label col-form-label-lg" for="ingredient">Ajouter un ingrédient</label>
                            <input <?= $data['actif']?> class="form-control form-control-lg preparation" type="text"  >
                        </div>
                        <div class="row justify-content-between" >
                            <div class="col-sm-5">
                                <input <?= $data['actif']?> class="form-control form-control-lg preparation" type="text"  >
                            </div>
                            <div class="col-sm-3">
                                <input <?= $data['actif']?> class="form-control form-control-lg preparation" type="text" >
                            </div>
                            <div class="col-sm-3 text-right">
                                    <button <?= $data['actif']?> type="button" class="btn btn-lg btnOK">OK</button>
                            </div>
                        </div>  
                    </div>
                    <div class="col-1"></div>
                </div>



            </div>
        </div>
    </div>
</section>


<script>
    var select = document.querySelector("#difficulte");
    select.selectedIndex = <?= $data['recette']->getDifficulte(); ?>;
</script>