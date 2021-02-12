<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <form action="" method="POST" id="article">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h1>Edition de l'article</h1>
                            <div class="form-group">
                                <label for="nomArticles">Nom d'usine de l'article</label>
                                <input type="text" readonly="" class="form-control rounded pt-3" id="nomArticle" nom="nomArticle">
                            </div>
                             <div class="form-group">
                                <label for="nomComArticles">Nom de l'article pour l'utilisateur</label>
                                <input type="text" class="form-control rounded pt-3" id="nomComArticles" nom="nomComArticles">
                            </div>

                        
                            <div class="form-group row justify-content-between">
                                <label for="identifiant" class="col-sm-6 col-form-label">Identifiant</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded" id="identifiant" name="identifiant">
                                </div>
                            </div>
                        

                            <div class="form-group row justify-content-between">
                                <label for="prixVente" class="col-sm-6 col-form-label">Prix de vente</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded" id="prixVente" name=prixVente">
                                </div>
                            </div>

                            <div class="form-group row justify-content-between">
                                <label for="stock" class="col-sm-6 col-form-label">Stock</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded" id="stock" name="stock">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3">
                                   <button type="button" class="btn btn-lg pl-5 pr-5 btnCorbeille">Supprimer</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div clas='row'>
                                <img src="<?=PATH_IMAGES . 'vide.png'?>" alt="Image vide" class="img-fluid">
                            </div>
                            <div class="form-group row justify-content-between mt-4">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control border-0" id="urlImage" name="urlImage" value="URL de l'image actuelle">
                                </div>
                                <div class="col-sm-4 text-right">
                                     <button type="button" class="btn btnCorbeille">
                                        <img src="<?=PATH_IMAGES . 'icons/delete-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row justify-content-between mt-4">
                                <div class="col-sm-8"><div class="">Télécharger une nouvelle image</div>
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

