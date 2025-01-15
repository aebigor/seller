<!-- Page header -->
<div class="full-box page-header">
  <h3 class="text-left">
    <i class="fas fa-plus fa-fw"></i> &nbsp; ACTUALIZAR USUARIO
  </h3>
  <p class="text-justify">
    Desde esta vista se puede actualizar un usuario
  </p>
</div>

<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
    <li>
      <a class="active" href="?c=Users&a=create_user"><i class="fas fa-plus fa-fw"></i> &nbsp; ACTUALIZAR USUARIO</a>
    </li>
    <li>
      <a href="?c=Users&a=read_user"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
    </li>
  </ul>  
</div>

<!-- Content here-->
<div class="container-fluid">
  <form action="?c=Users&a=update_user" method="POST" class="form-neon">
    <fieldset>
      <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
      <div class="container-fluid">
        <input type="hidden" name="id_user" value="<?php echo $user->get_id_user(); ?>">
        <div class="row">
          <!-- Campo Nombre -->
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="cliente_nombre" class="bmd-label-floating">Nombres</label>
              <input value="<?php echo $user->get_name(); ?>" name="user_name" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="cliente_nombre_reg" id="cliente_nombre" maxlength="40" required>
            </div>
          </div>
          
          <!-- Campo Apellido -->
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="cliente_apellido" class="bmd-label-floating">Apellidos</label>
              <input value="<?php echo $user->get_lastname(); ?>" name="user_lastname" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="cliente_apellido_reg" id="cliente_apellido" maxlength="40" required>
            </div>
          </div>
          
          <!-- Campo DNI -->
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="cliente_dni" class="bmd-label-floating">N° de documento</label>
              <input value="<?php echo $user->get_id_number(); ?>" name="user_doc" type="text" pattern="[0-9-]{1,27}" class="form-control" name="cliente_dni_reg" id="cliente_dni" maxlength="27" required>
            </div>
          </div>
          
          <!-- Campo Teléfono -->
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="cliente_telefono" class="bmd-label-floating">Teléfono</label>
              <input value="<?php echo $user->get_cel(); ?>" name="user_cel" type="text" pattern="[0-9()+]{8,20}" class="form-control" name="cliente_telefono_reg" id="cliente_telefono" maxlength="20" required>
            </div>
          </div>
          
          <!-- Campo Correo -->
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="cliente_direccion" class="bmd-label-floating">Correo</label>
              <input value="<?php echo $user->get_email(); ?>" name="user_email" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,150}" class="form-control" name="cliente_direccion_reg" id="cliente_direccion" maxlength="150" required>
            </div>
          </div>

          <!-- Campo Contraseña -->
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="cliente_contraseña" class="bmd-label-floating">Contraseña</label>
              <input value="" name="user_pass" type="password" class="form-control" name="cliente_contraseña_reg" id="cliente_contraseña" maxlength="150"  required>
            </div>
          </div>

          <!-- Campo Rol (select) -->
          <div class="col-12 col-md-4">
            <div class="form-group">
              <label for="cliente_rol" class="bmd-label-floating">Rol</label>
              <select class="form-control" name="user_rol_reg" id="cliente_rol" required>
                <!-- Aquí generas dinámicamente los roles desde tu backend -->
                <option value="">Rol Actual (<?php echo $user->get_rol(); ?>)</option>
                <?php foreach ($roles as $rol) : ?>                  
                  <option value="<?php echo $rol->get_id_rol(); ?>"><?php echo $rol->get_name(); ?>(<?php echo $rol->get_id_rol(); ?>)</option>
                <?php endforeach; ?>
                <!-- Más opciones de rol... -->
              </select>
            </div>
          </div>
          
        </div>
      </div>
    </fieldset>
    <br><br><br>
    <p class="text-center" style="margin-top: 40px;">
      <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR / BORRAR</button>
      &nbsp; &nbsp;
      <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; ACTUALIZAR USUARIO</button>
    </p>
  </form>
</div>
