
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
                                <small class="form-text">Auteur de la recette : <?=$_SESSION['prenomUser'] . ' ' . $_SESSION['nomUser'] ?></small>
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
                                    <input <?= $data['actifHaut']?> type="number" step="1" min="1" class="form-control rounded text-center" id="nbPersonne" name="nbPersonne"  value="<?= $data['recette']->getNombrePersonne(); ?>">
                                    <div class="erreur"><?= $data['nbPersonneMessage'] ?></div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-between">
                                <label for="temps" class="col-sm-6 col-form-label">Temps de préparation en minutes</label>
                                
                                <div class="col-sm-3">
                                    <input <?= $data['actifHaut']?> type="number" step="1" min="1" class="form-control rounded text-center" id="temps" name="temps"  value="<?= $data['recette']->getTempsBrut(); ?>">
                                    <div class="erreur"><?= $data['tempsMessage'] ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button <?= $data['actifHaut']?> type="submit" name="ok" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3">
                                   <button <?= $data['actifHaut']?> type="reset" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <?=$data['messageInsert']?>
                                </div>
                            </div>
                        </div>
                </form>
                
                        <div class="col-5">
                            <img id="preview" src="<?=PATH_IMAGES . 'vide.png'?>" alt="Image vide" class="img-fluid">
                            <div class="mt-3">Télecharger une nouvelle image</div>
<form id="formImage" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row justify-content-between">
                                <input type="hidden" value="<?= $data['idNew'] ?>" name="idNew" id="idNews">
                                    <div class="col-sm-8">
                                        <input <?=$data['actif']?> type="file" class="form-control-file" id="image" name="image" accept="image/png, image/jpeg, image/jpg">
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <button <?=$data['actif']?> id="imageOK" type="submit" class="btn  btn-lg btnOK">OK</button>
                                    </div>
                            </div> 
</form>
                        </div>
                    </div>
                
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
<form action="" method="POST" id="preparations">
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
                         <div class="form-group row text-center">
                            <div class="col-12">
                                <button <?= $data['actif']?> type="submit" name="ok" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>

                            </div>
                         </div>
                    </div>
</form>
                    <div class="col-3">
                        <div class="articlesingredients p-3" <?= $data['actif']?> >
                               
                        </div>
<form action="" method="POST" id="ingredients">
                        <div class="form-group">
                            <label class="col-form-label col-form-label-lg" for="ingredient">Ajouter un ingrédient</label>
                            <span id="ingredientsContainer">
                                <span id="loading" style="display: none;" class="spinner-border text-warning" role="status">
                                     <span class="sr-only">Loading...</span>
                                </span>
                                <input name="inputIngredient" id="inputIngredient" class="form-control form-control-lg preparation" type="text"> 
                            </span>
                           
                        </div>

                         <input name="ingredientHidden" id="ingredient-hidden"  type="hidden" />
                         <input name="uniteHidden" id="unite-hidden"  type="hidden" />
                         <input type="hidden" value="<?= $data['idNew'] ?>" name="idNew">
                        <div class="row justify-content-between" >
                            <div class="col-sm-5">
                                <input id="qty" name="qty" class="form-control form-control-lg preparation" type="number" min="1" step="1"  >
                            </div>
                            <div class="col-sm-4 form-group">
                                <span id="unitesContainer">
                                    <span id="uniteLoading" style="display: none;" class="spinner-border text-warning" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                    <input name="inputUnite" id="inputUnite" class="form-control form-control-lg preparation" type="text" >
                                </span>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button <?php //echo $data['actif']?> type="submit" class="btn btn-lg btnOK">OK</button>
                            </div>
                        </div> 
                         <div class="row" >
                             <div class="col-12">
                                 <p id="erreurDoubleIngredient"></p>
                             </div>
                         </div>
</form>
                    </div>
                    <div class="col-1"></div>
                </div>



            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        var select = document.querySelector("#difficulte");
        select.selectedIndex = <?= $data['recette']->getDifficulte(); ?>;
        
        $("#ingredients").on('submit',(function(e) {
            e.preventDefault();
            if($('#inputIngredient').val() != "" && $('#inputUnite').val() != "" && $('#qty').val() != "" ){
                $('#erreurDoubleIngredient').text(''); 
                $.ajax({
                    url: "<?=PATH_AJAX ?>newIngredientAjax.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",

                    success: function(data){
                        if("erreur" in data){
                            $('#erreurDoubleIngredient').text(data.erreur);  
                        }else{
                            $("#ingredients")[0].reset();
                            var  html = "";
                            for (var item in data){
                                html +="<div class='row justify-content-between'><div class='col-8'>" + data[item].nom ;
                                html += "</div> <div class='col-4'><button type='button' data-id='" + data[item].bouton;
                                html += "' class='btn btn-link p-0 m-0'>Supprimer</button></div></div> ";
                            }
                            $('.articlesingredients').html(''); 
                            $('.articlesingredients').html(html);  
                        }
                    }
                });
            }else{
                console.log('erreur');
            }
        }));
        
        $('.articlesingredients').on('click', '.btn', function(e){
            var id = $(this).data("id");
            console.log(id);
            $.ajax({
                url: "<?=PATH_AJAX ?>supIngredientAjax.php" ,
                type: "POST",
                data: {data : JSON.stringify({"idProduit" : id, "idNew" : <?= $data['idNew'] ?>})},
              
                dataType:"json",

                success: function(data){

                    $('#erreurDoubleIngredient').text(data.erreur);  
                    $("#ingredients")[0].reset();
                    var  html = "";
                    for (var item in data){
                        html +="<div class='row justify-content-between'><div class='col-8'>" + data[item].nom ;
                        html += "</div> <div class='col-4'><button type='button' data-id='" + data[item].bouton;
                        html += "' class='btn btn-link p-0 m-0'>Supprimer</button></div></div> ";
                    }
                    $('.articlesingredients').html(''); 
                    $('.articlesingredients').html(html);  

                }
             });
            
        });

        $("#formImage").on('submit',(function(e) {
            e.preventDefault();
            if($('#image').val() != ""){
                $.ajax({
                    url: "<?=PATH_AJAX ?>imageAjax.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data){
                       $('#preview').attr('src', '<?=PATH_IMAGES ?>/upload/' + data);
                       $("#form")[0].reset();
                    }
                });
            }
        }));   
            

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        
       
        
        $('#inputIngredient').autocomplete({
            minLength:1, 
            delay:200, 
            scrollHeight:320,
            appendTo:'#ingredientsContainer',
            
            source:function(e,t){
                $('#loading').attr('style','');
                $.ajax({
                    type:'POST',
                    url:"<?=PATH_AJAX ?>ingredientsAjax.php",
                    data:'name='+e.term,
                    dataType:"json",
                    async:true,
                    cache:true,
                    success:function(e){
                        if(e.length){   
                            t($.map(e, function (item){
                                return{
                                    label: item.label,
                                    value: item.value,
                                    id: item.id
                                };
                            }));  
                        }
                        $('#loading').attr('style','display:none;');
                    }
                });
            },
            select: function(event, ui) {
                $('form input[name="ingredientHidden"]').val(ui.item ? ui.item.id : '');
            },
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        
       
        
        $('#inputUnite').autocomplete({
            minLength:1, 
            delay:200, 
            scrollHeight:320,
            appendTo:'#unitesContainer',
            
            source:function(e,t){
                $('#uniteLoading').attr('style','');
                $.ajax({
                    type:'POST',
                    url:"<?=PATH_AJAX ?>unitesAjax.php",
                    data:'name='+e.term,
                    dataType:"json",
                    async:true,
                    cache:true,
                    success:function(e){
                        if(e.length){   
                            t($.map(e, function (item){
                                return{
                                    label: item.label,
                                    value: item.value,
                                    id: item.id
                                };
                            }));  
                        }
                        $('#uniteLoading').attr('style','display:none;');
                    }
                });
            },
            select: function(event, ui) {
                $('form input[name="uniteHidden"]').val(ui.item ? ui.item.id : '');
            },
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
        
     });
</script>