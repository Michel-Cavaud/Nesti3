<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <h1>Créer un utilisateur</h1>
            </div>
                
        </div>
        <div class="row d-flex justify-content-center m-0">
            <div class="col-lg-11 col-md-12 ">
                <form action="" method="POST" id="utilisateur">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label for="nomUtilisateur">Nom</label>
                                <input type="text" class="form-control rounded p-3" id="nomUtilisateur" name="nomUtilisateur"  value="<?= $data['utilisateur']->getNom(); ?>">
                                   <div class="erreur"><?= $data['nomUtilisateurMessage'] ?></div>
                            </div>
                                
                            <div class="form-group">
                                <label for="prenomUtilisateur">Prénom</label>
                                <input type="text" class="form-control rounded p-3" id="prenomUtilisateur" name="prenomUtilisateur" value="<?= $data['utilisateur']->getPrenom(); ?>">
                                   <div class="erreur"><?= $data['prenomUtilisateurMessage'] ?></div>
                            </div>
                                
                            <div class="form-group">
                                <label for="roleUtilisateur">Role</label>
                                <select class="custom-select" id="roleUtilisateur" multiple name="roleUtilisateur[]" size='4'>     
                                    <option value="1">Utilisateur</option>
                                    <option value="2">Administrateur</option>
                                    <option value="3">Moderateur</option>
                                    <option value="4">Chef</option>
                                </select>
                                <div class="erreur"><?= $data['roleUtilisateurMessage'] ?></div>
                            </div>

                            <div class="form-group">
                                <label for="etatUtilisateur">État</label>
                                <select class="custom-select" id="etatUtilisateur" name="etatUtilisateur">  
                                    <option value="w">En attente</option>
                                    <option value="a">Actif</option>
                                    <option value="b">Bloqué</option>
                                    
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
                                   <button type="button" class="btn btn-lg pl-5 pr-5 btnAnnuler">Annuler</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                             <div class="form-group">
                                <label for="emailUtilisateur">Email</label>
                                <input type="email" class="form-control rounded p-3" id="emailUtilisateur" name="emailUtilisateur" value="<?= $data['utilisateur']->getEmail(); ?>">
                                   <div class="erreur"><?= $data['emailUtilisateurMessage'] ?></div>
                            </div>
                                
                            <div class="form-group">
                                <label for="mdpUtilisateur">Mot de passe</label>
                                <input type="password" class="form-control rounded p-3" id="mdpUtilisateur" name="mdpUtilisateur" value="<?= $data['utilisateur']->getMdp(); ?>">
                                <div class="erreur"><?= $data['mdpUtilisateurMessage'] ?></div>
                                <a class="mdpAleatoire" data-mdp="<?=$data['mdpAleatoire'] ?>">Sélectionner le mot de passe aléatoire : <?=$data['mdpAleatoire'] ?></a>
                            </div>
                            
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                            <div class="list-group  mt-3">
                                <div class="list-group-item">Au moins une minuscule</div>
                                <div class="list-group-item">Au moins une majuscule</div>
                                <div class="list-group-item">Au moins un chiffre</div>
                                <div class="list-group-item">Au moins un caractère spécial ($, @, $, !, %, *, #, ?, &, . , /)</div>
                                <div class="list-group-item">Au moins 8 caractères</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
</section>