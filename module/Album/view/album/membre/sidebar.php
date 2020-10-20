 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="MasterGest" class="brand-image img-circle elevation-3"style="opacity: .8"> -->
      <span class="brand-text font-weight-light">MasterGest</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= $this->url('album', ['action' => 'index']) ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Tableau de bord
              </p>
            </a>
        
          </li>
       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Etudiant
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->url('album', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Enregistrer un etudiant</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?= $this->url('album', ['action' => 'liste']) ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste de tous les etudiants</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Président de Jury
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
           <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="<?= $this->url('president', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Ajouter un président de jury</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="<?= $this->url('listep') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des président de jury</p>
                </a>
               </li>
             
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Directeur de mémoire
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
           <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="<?= $this->url('directeur', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Ajouter un directeur de memoire</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="<?= $this->url('listed') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des directeurs de memoire</p>
                </a>
               </li>
             
            </ul>
          </li>

          
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Maitre de stage
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="<?= $this->url('maitre', ['action' => 'add']) ?>" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>Ajouter un maitre de stage</p>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a href="<?= $this->url('listema') ?>" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Liste des  maitres de stage</p>
                  </a>
                </li>
            
            </ul>
          
          </li>


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Membre invité
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?= $this->url('membre', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Ajouter un membre invite</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?= $this->url('listeme') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des membre invite</p>
                </a>
              </li>
          </ul>
          </li>


          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Jury
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
           <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="<?= $this->url('jury', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Constituer un jury</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="<?= $this->url('listej') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des jury</p>
                </a>
               </li>
             
            </ul>
          </li>



          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Soutenances
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?= $this->url('soutenance', ['action' => 'add']) ?>" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Programmer une soutenance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= $this->url('calendar') ?>" class="nav-link">
                  <i class="fas fa-calendar nav-icon"></i>
                  <p>Calendrier des soutenances</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?= $this->url('listesoutenance') ?>" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste des soutenances</p>
                </a>
              </li>
          </ul>
          </li>


          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Paramètres
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="motdepasse.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Changer de mot de passe</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="utilisateur.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Changer d'identifiant</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="feedback.php" class="nav-link">
                  <i class="fas fa-undo nav-icon"></i>
                  <p>Feedbacks</p>
                </a>
              </li>
            </ul>
          </li>


          
        </ul>
      </nav>
    </div>
  </aside>
