<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <form action="" method="POST" id="article">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h1>Edition de l'article</h1>
                            <div class="form-group">
                                <label for="nomArticle">Nom d'usine de l'article</label>
                                <input type="text" readonly="" class="form-control rounded pt-3" id="nomArticle" name="nomArticle"
                                    value="<?=$data['article']->getQuantite() . ' ' . $data['article']->getUniteMesure()->getNom() . ' de ' . 
                                            $data['article']->getProduits()->getNom()?>">
                            </div>
                             <div class="form-group">
                                <label for="nomComArticles">Nom de l'article pour l'utilisateur</label>
                                <input type="text" class="form-control rounded pt-3" id="nomComArticles" name="nomComArticle"
                                        value="<?=$data['article']->getNomCom() ?>">
                                <div class="erreur"><?= $data['nomComArticleMessage'] ?></div>
                            </div>

                        
                            <div class="form-group row justify-content-between">
                                <label for="identifiant" class="col-sm-6 col-form-label">Identifiant</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded text-center" id="identifiant" name="identifiant"
                                           value="<?=$data['article']->getId() ?>">
                                </div>
                            </div>
                        

                            <div class="form-group row justify-content-between">
                                <label for="prixVente" class="col-sm-6 col-form-label">Prix de vente</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded text-center" id="prixVente" name="prixVente"
                                           value="<?=$data['article']->getPrix() ?>">
                                </div>
                            </div>

                            <div class="form-group row justify-content-between">
                                <label for="stock" class="col-sm-6 col-form-label">Stock</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly="" class="form-control rounded text-center" id="stock" name="stock"
                                           value="<?=$data['article']->getStock() ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" name="ok" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3">
                                   <button type="reset" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                </div>
                            </div>
                        </div>
                        </form>
                         <div class="col-5">
                            <img  id="preview" src="<?=$data['srcImage'] ?>" alt="Image vide" class="img-fluid">
<form id="formImage" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?=$data['article']->getId() ?>" name="idNew" id="idNews">
                            <div class="form-group row justify-content-between mt-4">
                                <div class="col-sm-8">
                                    <div class="border-0" id="urlImage" name="urlImage" ><?=  $data['urlImage'] ?></div>
                                </div>
                                <div class="col-sm-4 text-right">
                                     <button type="button" id="btnCorbeille"  class="btn btnCorbeille <?= $data['invisible'] ?>">
                                        <img src="<?=PATH_IMAGES . 'icons/delete-svg.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row justify-content-between">
                               <div class="mt-3">Télecharger une nouvelle image</div>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn  btn-lg btnOK">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
     </div>
</section>

<script>
    $(document).ready(function () {
        $("#formImage").on('submit',(function(e) {
            e.preventDefault();
            if($('#image').val() != ""){
                $.ajax({
                    url: "<?=PATH_AJAX ?>imageArticleAjax.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data){
                        if(data[0] == '!'){
                            $('#preview').attr('src', '<?=PATH_IMAGES ?>vide.png');
                            $("#formImage")[0].reset();
                           
                        }else{
                            $('#preview').attr('src', '<?=PATH_IMAGES ?>/upload/' + data);
                            $("#formImage")[0].reset();
                            $("#urlImage").text(data);
                            $("#btnCorbeille").removeClass("invisible");
                        }
                    }
                });
            }
        }));   
        
         $(".btnCorbeille").on('click', (function(e){
            e.preventDefault();
            $.ajax({
                    url: "<?=PATH_AJAX ?>supImageArticleAjax.php",
                    type: "POST",
                    data:{data : JSON.stringify({"id" : <?= $data['article']->getId() ?>})},
                   

                    success: function(data){
                        $('#preview').attr('src', '<?=PATH_IMAGES ?>vide.png');
                        $("#formImage")[0].reset();
                        $("#urlImage").text('');
                        $("#btnCorbeille").addClass("invisible");    

                    }
                });
            
        }));

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        
     });
</script>


