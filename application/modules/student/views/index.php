<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
      <div id="message"></div>
      <?php echo validation_errors(); ?>


          <form class="form" id="save_alm" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Registro de Alumnos</legend>
    
            <!-- Codigo input-->
            <div class="form-group">
              
              <label class="col-md-3 control-label" for="nombre">Nombres</label>
              <div class="col-md-5">
                <input id="nombre" name="nombre" type="text"  class="form-control form-control-sm" >

              </div>
            </div>
            <br>
             <br>
    
            <!-- Nit input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="apellido">Apellidos</label>
              <div class="col-md-8">
                <input id="apellido" name="apellido" type="text" class="form-control form-control-sm">
              </div>
              

            </div>
            <br>
             <br>

               <!-- Fecha input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="fecha">Fecha Nacimiento</label>
              <div class="col-md-4">
                <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control form-control-sm">
              </div>
              

            </div>
            <br>
             <br>

               <!-- Sexo input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="apellido">Sexo</label>
              <div class="col-md-4">
             <select name="sexo" class="form-control">
               <option value="">Seleccione</option>
            <option value="FEMENINO">Femenino</option>
            <option value="MASCULINO">Masculino</option>
             </select>
             </div>
         
              

            </div>
            <br>
             <br>


            <!-- Razon input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="codigo">Código</label>
              <div class="col-md-5">
                <input id="codigo" name="codigo" type="text" class="form-control form-control-sm">
              </div>
            </div>
            <br>
             <br>
                <!-- Departamento input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="departamento">Departamento</label>
              <div class="col-md-4">
                       <select name="departamento" id="departamento" class="form-control">
                       <option value="">Seleccione</option>}
                       
                                        <?php
                                        foreach($departamento as $fila)
                                        {
                                        ?>
                                        <option value="<?=$fila -> id ?>"><?=$fila -> depNombre ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
              </div>

               <!-- Muinicipio input-->
              <div class="col-md-5">
                  <select name="municipio" id="municipio" class="form-control">
                                        <option value="">Selecciona Municipio</option>
                                    </select>

              </div>
            </div>
            <br>
             <br>


            <!-- direccion input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="direccion">Dirección</label>
              <div class="col-md-9">
                <input id="direccion" name="direccion" type="text" class="form-control form-control-sm">
              </div>
            </div>
            <br>
             <br>

            <!-- Telefono input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="telefono1">Télefono</label>
              <div class="col-md-4">
                <input id="telefono1" name="telefono1" type="text" class="form-control form-control-sm">
              </div>
            </div>
            <br>
             <br>


            <!-- Correo input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Correo</label>
              <div class="col-md-5">
                <input id="email" name="email" type="email" class="form-control form-control-sm">
              </div>
            </div>
            <br>
             <br>


            <!-- URL input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="url">Url</label>
              <div class="col-md-7">
                <input id="url" name="url" type="text" class="form-control" aria-label="Url" aria-required="true" placeholder="Url">
              </div>
            </div>
            <br>
             <br>


            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="observacion">Observaciones</label>
              <div class="col-md-9">
                <textarea class="form-control" id="observacion" name="observacion" rows="2"></textarea>
              </div>
            </div>
            <br>
             <br>
               
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12">
                <button type="button" id="btn_alm" class="btn btn-primary btn-sm">Grabar</button>
              </div>
            </div>
          </fieldset>
          </form>
       
      </div>
	</div>
</div>