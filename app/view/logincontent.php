
<section class="bodylogin">
    <div class="container-fluid">
        <img src="<?= PATH_IMAGES?>icons/Nesti-logo.png" alt="logo nesti"/>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-lg-6 col-md-10 d-flex justify-content-center">
               
                <div class="row <?= $couleur ?> align-items-center justify-content-center">
                    <div class="text-center"><?= $messageConnexion ?></div>
                        
                   
                </div>
            </div> 
        </div>
    
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-10 divlogin  flex justify-content-center">
               
                <div class="row  justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class=text-center>
                            <h1>Connexion</h1>
                        </div>
                </div></div>
                <div class="row  justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <form action="<?= BASE_URL . 'login' ?>" method="post">
                            <div class="form-group">
                                <label class="col-form-label ml-5" for="identifiant">Identifiant</label>
                                <div class="input-group">

                                    <span class="fas fa-2x fa-user  mr-2"></span>

                                    <input type="email" class="form-control" placeholder="Identifiant" id="identifiant" name="identifiant">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label ml-5" for="mdpt">Mot de passe</label>
                                <div class="input-group">
                                    <span class="fas fa-2x fa-lock mr-2"></span>
                                     <input type="password" class="form-control" placeholder="Mot de passe" id="mdp" name="mdp">
                                </div>
                            </div>
                            <div class="text-right mt-5">
                                <button type="submit" class="btn btnvalide mb-2 pl-3 pr-3">Valider</button>
                            </div>
                        </form> 
                    </div>
                 </div>  
                </div> 
            </div>
        </div>
    
        
    
    </div>
    
</section>

