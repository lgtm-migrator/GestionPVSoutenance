
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-"></i> Institut Burkinabé des Arts et métiers.
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                   Informations personnelles <br>
                    <strong>Nom: </strong><?= $this->escapeHtml($album->nomEtudiant) ?><br>
                    <strong>Preom: </strong><?= $this->escapeHtml($album->prenomEtudiant) ?><br>
                    <strong>Date de naissance: </strong><?= $this->escapeHtml($album->dateNaissance) ?><br>
                    <strong>Lieu de naissance:  </strong><?= $this->escapeHtml($album->lieuNaissance) ?><br>
                    <strong>Sexe: </strong><?= $this->escapeHtml($album->sexe) ?><br>
                     
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  Informations académiques <br>

                    <strong>Matricule: </strong> <?= $this->escapeHtml($soutenance->matricule) ?><br>
                    <strong>Filière: </strong><?= $this->escapeHtml($album->filiere) ?><br>
                    
                
                </div>
                <!-- /.col 
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Code Soutenance</th>
                      <th>Thème</th>
                      <th>Date</th>
                      <th>Heure</th>
                      <th>Salle</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                
                    <tr>
                     <td><?= $this->escapeHtml($soutenance->codeSoutenance) ?></td>
                      <td><?= $this->escapeHtml($soutenance->themeSoutenance) ?></td>
                      <td><?= $this->escapeHtml($soutenance->dateSoutenance) ?></td>
                      <td><?= $this->escapeHtml($soutenance->heureSoutenance) ?></td>
                      <td>--------</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->


                <div class="col-3">
                  
                </div>
                
                <div class="col-6">
                  <p class="lead">Jury #<?= $this->escapeHtml($jury->codeJury) ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Président</th>
                        <td><?= $this->escapeHtml($jury->codePresident) ?></td>
                      </tr>
                      <tr>
                        <th>Directeur de stage</th>
                        <td><?= $this->escapeHtml($jury->codeDirecteur) ?></td>
                      </tr>
                      <tr>
                        <th>Maitre de stage</th>
                        <td><?= $this->escapeHtml($jury->codeMaitre) ?></td>
                      </tr>
                      <tr>
                      <th>Membre invité</th>
                        <td><?= $this->escapeHtml($jury->codeInvite) ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>