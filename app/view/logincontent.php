
<section class="bodylogin">
    <div class="container-fluid">
        <img src="<?= PATH_IMAGES ?>icons/Nesti-logo.png" alt="logo nesti"/>
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
                    </div>
                </div>
                <div class="row  justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <form action="<?= BASE_URL . 'login' ?>" method="post">
                            <div class="form-group">
                                <label class="col-form-label ml-5" for="identifiant">Identifiant</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="fas fa-2x fa-user  mr-2"></span>
                                    </div>
                                    <input type="text" class="form-control <?= $isValidI ?>" placeholder="Identifiant" id="identifiant" name="identifiant" value="<?= $valI ?>" >
                                    <div class="invalid-feedback">Indiquer votre email ou pseudo</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label ml-5" for="mdp">Mot de passe</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"> 
                                        <span class="fas fa-2x fa-lock mr-2"></span>
                                    </div>
                                    <input type="password" class="form-control <?= $isValidMdp ?>" placeholder="Mot de passe" id="mdp" name="mdp">
                                    <div class="invalid-feedback">Indiquer votre mot de passe </div>
                                </div>
                            </div>

                            <div class="text-right mt-5">
                                <button type="submit" name='ok' class="btn btnvalide mb-2 px-3 ">Valider</button>
                            </div>
                        </form> 
                    </div>
                </div>  
            </div> 
        </div>
    </div>





</section>

