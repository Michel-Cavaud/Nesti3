<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <h1>Modifier un utilisateur</h1>
            </div>
                
        </div>
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
<form action="" method="POST" id="utilisateurEdition">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <input type="hidden" name="idEdition" value="<?= $data['utilisateur']->id_utilisateurs; ?>"/>
                            <div class="form-group">
                                <label for="nomUtilisateur">Nom</label>
                                <input type="text" class="form-control rounded p-3" id="nomUtilisateur" name="nomUtilisateur"  value="<?= $data['utilisateur']->nom_utilisateurs; ?>">
                                   <div class="erreur"><?= $data['nomUtilisateurMessage'] ?></div>
                            </div>
                                
                            <div class="form-group">
                                <label for="prenomUtilisateur">Prénom</label>
                                <input type="text" class="form-control rounded p-3" id="prenomUtilisateur" name="prenomUtilisateur" value="<?= $data['utilisateur']->prenom_utilisateurs; ?>">
                                   <div class="erreur"><?= $data['prenomUtilisateurMessage'] ?></div>
                            </div>
                                <?=$_SESSION["utilisateur"]?>
                            <div class="form-group">
                                <label for="roleUtilisateur">Role</label>
                                <select class="custom-select" id="roleUtilisateur" multiple name="roleUtilisateur[]" size='4'>    
                                    <option value="1" <?php if($data['utilisateur'] ){echo 'selected';} ?>>Utilisateur</option>
                                    <option value="2" <?php if($data['isAdmin']){echo 'selected';} ?>>Administrateur</option>
                                    <option value="3" <?php if($data['isModerateur']){echo 'selected';} ?>>Moderateur</option>
                                    <option value="4" <?php if($data['isChef']){echo 'selected';} ?>>Chef</option>
                                </select>
                                <div class="erreur"><?= $data['roleUtilisateurMessage'] ?></div>
                            </div>

                            <div class="form-group">
                                <label for="etatUtilisateur">État</label>
                                <select class="custom-select" id="etatUtilisateur" name="etatUtilisateur">  
                                    <option value="w" <?php if($data['utilisateur']->etat_utilisateurs == 'w'){echo 'selected';} ?> >En attente</option>
                                    <option value="a" <?php if($data['utilisateur']->etat_utilisateurs == 'a'){echo 'selected';} ?>>Actif</option>
                                    <option value="b" <?php if($data['utilisateur']->etat_utilisateurs == 'b'){echo 'selected';} ?>>Bloqué</option>
                                    
                                </select>
                            </div>

                            <div class="row">
                                <div class="erreurGrand"><?= $data['erreurMessage'] ?></div>
                            </div>

                            <div class="form-group row">
                                
                                <div class="col-sm-3">
                                    <button type="submit" name="ok"  class="btn btn-lg pl-5 pr-5 btnValider">Valider</button>
                                    
                                </div>
                                
                                <div class="col-sm-3 ml-5">
                                   <button type="reset" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-5">

                        </div>
                </div>
               </form>
            </div>
        </div>
     </div>
</section>