<!-- Modal -->
<div class="modal fade" id="preparationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une préparation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="POST" id="formPreparation">
              <input type="hidden" value="<?= $data['idNew'] ?>" name="idNew">
                 <div class="form-group">
                    <label for="preparationText">Une préparation</label>
                    <textarea class="form-control" id="preparationText" name="preparationText" rows="3"></textarea>
                  </div>
                  <div class="erreur erreurPreparation"></div>
         
        
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button> 
      </form>
      </div>
    </div>
  </div>
</div>
<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <form action="" method="POST" id="recette">
                    <input type='hidden' name='idRecette' value="<?= $data['idNew'] ?>"/>
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h1>Modification d'une recette</h1>
                            <div class="form-group">
                                <label for="nomRecette">Nom de la recette</label>
                                <input type="text" class="form-control rounded p-3" id="nomRecette" name="nomRecette" value="<?= $data['recette']->getNom(); ?>">
                                <small class="form-text">Auteur de la recette : <?= $data['recette']->getChef()->getNom(); ?></small>
                            </div>

                        
                            <div class="form-group row justify-content-between">
                                <label for="difficulte" class="col-sm-6 col-form-label">Difficulté (note sur 5)</label>
                                <div class="col-sm-3">
                                    <select class="custom-select text-center" id="difficulte" name="difficulte">   
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                             
                        

                            <div class="form-group row justify-content-between">
                                <label for="nbPersonne" class="col-sm-6 col-form-label">Nombre de personne</label>
                                <div class="col-sm-3">
                                    <input  type="number" step="1" min="1" class="form-control rounded text-center" id="nbPersonne" name="nbPersonne" value="<?= $data['recette']->getNombrePersonne(); ?>">
                                </div>
                            </div>

                            <div class="form-group row justify-content-between">
                                <label for="temps" class="col-sm-6 col-form-label">Temps de préparation en minutes</label>
                                <div class="col-sm-3">
                                    <input type="number" step="1" min="1" class="form-control rounded text-center" id="temps" name="temps" value="<?= $data['recette']->getTempsMn(); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" name="ok" class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3">
                                   <button type="button" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                </div>
</form>
                            </div>
                            <div class="etatRecette"></div>
                        </div>
                        <div class="col-5">
                            <img  id="preview" src="<?=$data['srcImage'] ?>" alt="Image vide" class="img-fluid">
<form id="formImage" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $data['idNew'] ?>" name="idNew" id="idNews">
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
<form action="" method="POST" id="preparations">
                <div class="row justify-content-between">
                    
                    <div class="col-8">
                        <div id="lesPreparations"><?=  $data['listePreparation'] ?></div>
                        
                        

                        <div class="row align-items-end">
                            <div class="col-2 text-right">
                                
                            </div>
                            <div class="col-9">
                                <div class="form-group pr-3">
                                    <button type="button" class="btn btnPlus" data-toggle="modal" data-target="#preparationModal">
                                        <img src="<?=PATH_IMAGES . 'icons/grosPlus.png'?>" alt="" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
</form>

                    <div class="col-3">
                      
                        <div class="articlesingredients p-3">
                               <?= $data['listeIngredient'] ?></div>
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
        
        $('.etatRecette').on('click', '#etatRecetteBtn', function(e){
            e.preventDefault();
            var id = $(this).data("id");
             $.ajax({
                url: "<?=PATH_AJAX ?>changeEtatRecetteAjax.php" ,
                type: "POST",
                data: {'id' : id},
                success: function(html){
                      verifEtatRecette();
                }
            });
        })
        
        verifEtatRecette();
        function verifEtatRecette(){
            var id = "<?= $data['idNew'] ?>";
            $.ajax({
                url: "<?=PATH_AJAX ?>etatRecetteAjax.php" ,
                type: "POST",
                data: {'id' : id},
                success: function(html){
                     $('.etatRecette').html(html);
                }
            });
        }
        
        $('#lesPreparations').on('click' , '.corbeillePrepa' , function(e){
            var ordre = $(this).data("ordre");
            var id = "<?= $data['idNew'] ?>";
            e.preventDefault();
             $.ajax({
                 url: "<?=PATH_AJAX ?>supPreparationAjax.php" ,
                 type: "POST",
                 data: {data : JSON.stringify({"idNew" : id, "ordre" : ordre})},


                 success: function(data){
                     $('#lesPreparations').html("");
                     $('#lesPreparations').html(data);
                     verifEtatRecette();
                 }
             });
        })
        
        $('#lesPreparations').on('click' , '.btnBas' , function(e){
               var ordre = $(this).data("ordre");
               var id = "<?= $data['idNew'] ?>";
               
               $.ajax({
                url: "<?=PATH_AJAX ?>descendrePreparationAjax.php" ,
                type: "POST",
                data: {data : JSON.stringify({"idNew" : id, "ordre" : ordre})},
                

                success: function(data){
                    $('#lesPreparations').html("");
                    $('#lesPreparations').html(data);
                }
             });
        })
        
        $('#lesPreparations').on('click' , '.btnHaut' , function(e){
               var ordre = $(this).data("ordre");
               var id = "<?= $data['idNew'] ?>";
               
               $.ajax({
                url: "<?=PATH_AJAX ?>monterPreparationAjax.php" ,
                type: "POST",
                data: {data : JSON.stringify({"idNew" : id, "ordre" : ordre})},
                

                success: function(data){
                    $('#lesPreparations').html("");
                    $('#lesPreparations').html(data);
                }
             });
        })
         
        $('#preparationModal').on('hidden.bs.modal', function (e) {
            $(".erreurPreparation").text("");
            console.log('ok');
        })
        
         $("#formPreparation").on('submit',(function(e) {
            
            e.preventDefault();
            $(".erreurPreparation").text("");
            if($('#preparationText').val() != ""){
                $.ajax({
                    url: "<?=PATH_AJAX ?>preparationAjax.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,

                    success: function(data){
                       $('#preparationModal').modal('hide');
                       $('#preparationText').val("");
                       $('#lesPreparations').html(data);
                       verifEtatRecette();
                       
                    }
                });
            }else{
                $(".erreurPreparation").text("Merci d'indiquer votre préparation");
            }
       })); 
        
        var select = document.querySelector("#difficulte");
        select.selectedIndex = <?= $data['recette']->getDifficulte(); ?>;
        
        $(".btnCorbeille").on('click', (function(e){
            e.preventDefault();
            $.ajax({
                    url: "<?=PATH_AJAX ?>supImageAjax.php",
                    type: "POST",
                    data:{data : JSON.stringify({"id" : <?= $data['idNew'] ?>})},
                   

                    success: function(data){
                        $('#preview').attr('src', '<?=PATH_IMAGES ?>vide.png');
                        $("#formImage")[0].reset();
                        $("#urlImage").text('');
                        $("#btnCorbeille").addClass("invisible");    
                        verifEtatRecette();
                    }
                });
            
        }));
    
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
                        verifEtatRecette();
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
            

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        $('.articlesingredients').on('click', '.btn', function(e){
            var id = $(this).data("id");
            console.log(id);
            $.ajax({
                url: "<?=PATH_AJAX ?>supIngredientAjax.php" ,
                type: "POST",
                data: {data : JSON.stringify({"idProduit" : id, "idNew" : <?= $data['idNew'] ?>})},
                dataType:"json",

                success: function(data){
                    verifEtatRecette();
                    $('#erreurDoubleIngredient').text(data.erreur);  
                   // $("#ingredients")[0].reset();
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
                        verifEtatRecette();
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
    });
</script>

