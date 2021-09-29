<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">CONFIGURACION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Configuracion de Usuario</li>
        </ol>
        <div class="row">

            <?=form_open('usuario/actualizar', ['id' => 'formy']); ?>
                
                <div class="form-group row mb-2">
                    <label for="txt_usuario" class="col-sm-2 col-form-label">Usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_usuario" name="txt_usuario"  disabled="true">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="txt_clave" class="col-sm-2 col-form-label">Clave:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="txt_clave" name="txt_clave" placeholder="Clave">
                    </div>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="txt_clave2" name="txt_clave2" placeholder="Repetir Clave">
                    </div>
                </div>

                <hr/>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Datos:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_datos" placeholder="Datos del Usuario">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="txt_correo" placeholder="Correo del Usuario">
                    </div>
                </div>
                
                <hr/>
                <div class="form-group row ">
                    
                    <div class="col-sm-12 text-center">
                        <button id="envio" type="submit" class="btn  btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>

$(function(){

    $("#    ")

})


</script>
