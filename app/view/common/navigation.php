<nav class="navbar navbar-expand-xl bg-light fixed-top p-0">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <i class="fas fa-bars" style="color:#005662; font-size:20px;"></i>
  </button>
    
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto navnesti">
      <li class="nav-item m-xl-3">
       <button data-role="recettes" class="btn btnnav <?=$data['btnNavActifRecettes']?> ml-xl-2 mr-xl-5"><span class="fas fa-clipboard-list mr-2"></span>Recettes</button>
      </li>
      <li class="nav-item m-xl-3">
        <button data-role="articles" class="btn btnnav <?=$data['btnNavActifArticles']?> ml-xl-2 mr-xl-5"><span class="fas fa-utensils mr-2"></span>Articles</button>
      </li>
      <li class="nav-item m-xl-3">
           <button data-role="utilisateurs" class="btn btnnav <?=$data['btnNavActifUtilisateurs']?> ml-xl-2 mr-xl-5"><span class="fas fa-user-cog mr-2"></span>Utilisateurs</button>
      </li>
      <li class="nav-item m-xl-3">
        <button data-role="statistiques" class="btn btnnav <?=$data['btnNavActifStatistiques']?> mx-xl-2"><span class="fas fa-chart-bar mr-2"></span>Statistiques</button>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <div class="ml-4"><span class="fas fa-user mr-1"></span><?=$_SESSION['prenomUser'] . ' ' . $_SESSION['nomUser'] ?></div>
        <buttton type="link" data-role="login/deconnexion" class="btn"><span class="fas fa-sign-out-alt mr-1 ml-2"></span> Déconnexion</button>
    </form>
  </div>
</nav>