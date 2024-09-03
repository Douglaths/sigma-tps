<?php
headerAdmin($data);
?>
<main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="bi bi-list-check"></i> <?=$data['page_title']?>
                <?php if ($_SESSION['permisosMod']['w']) {?>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" onclick="openModal();">
                    <i class="bi bi-person-plus"></i>
                    Nuevo Programa</button>
                <?php }?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url();?>/programas"><?=$data['page_title']?></a></li>
        </ul>   

        </div>

     
     
        
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tablePrograma">
                    <thead>
                      <tr>
                        <th>Nivel</th>
                        <th>Nombre del Programa</th>
                        <th>Ficha</th>
                        <th>Instructor Lider</th>
                        <th>Avances</th>
                        <th>Acciones</th>
                        
                    
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tecnico</td>
                        <td>Programacion de Sotfware</td>
                        <td>123456789</td>
                        <td>Jose Ramos</td>
                        <td><div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-danger" style="width: 25%">25%</div>
                        </div></td>
                        
                          
                        <td><div class="btn-group"><a class="btn btn-info" href="#"> <i class="bi bi-info-circle fs-4"></i></a><a class="btn btn-warning" href="#"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-danger" href="#"><i class="bi bi-trash fs-5"></i></a></div></td>

                        <tr>
                          <td>Tecnico</td>
                          <td>Recursos Humanos</td>
                          <td>2875079</td>
                          <td>Romel</td>
                          <td><div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-warning" style="width: 50%">50%</div>
                          </div></td>
                          
                            
                          <td><div class="btn-group"><a class="btn btn-info" href="#"> <i class="bi bi-info-circle fs-4"></i></a><a class="btn btn-warning" href="#"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-danger" href="#"><i class="bi bi-trash fs-5"></i></a></div></td>

                          <tr>
                            <td>Tecnico</td>
                            <td>Contabilidad</td>
                            <td>987654321</td>
                            <td>Sirly</td>
                            <td><div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                              <div class="progress-bar bg-success" style="width: 75%">75%</div>
                            </div></td>
                            
                              
                            <td><div class="btn-group"><a class="btn btn-info" href="#"> <i class="bi bi-info-circle fs-4"></i></a><a class="btn btn-warning" href="#"><i class="bi bi-pencil-square fs-5"></i></a><a class="btn btn-danger" href="#"><i class="bi bi-trash fs-5"></i></a></div></td>
                     
                     
  





                   
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
     
          
    </main>

<?php footerAdmin($data);
getModal('modalProgramas', $data);
?>