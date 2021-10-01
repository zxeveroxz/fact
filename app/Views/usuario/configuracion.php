<main>
    <div class="container px-4">
        <h2 class="mt-4">CONFIGURACION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Configuracion de Usuario</li>
        </ol>
        <div class="row">
                <?php
                    Ayuda_mesaje_post();
                ?>
            <?=form_open('usuario/actualizar', ['id' => 'formy']); ?>
                <input type="hidden" id="RUC_" name="RUC_">
                <input type="hidden" id="idx" name="idx">
                <div class="form-group row mb-2">
                    <label for="txt_usuario" class="col-sm-2 col-form-label">Usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user" name="user"  disabled="true">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="txt_clave" class="col-sm-2 col-form-label">Clave:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Clave" required>
                    </div>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="pass2" placeholder="Repetir Clave">
                    </div>
                </div>

                <hr/>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Datos:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Datos del Usuario" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo del Usuario">
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


<?=$this->include('includes/footer'); ?>
<script>
$(function(){
  
    function llenar(datos){
        Object.keys(datos).forEach(key => {
            $("#"+key).val(datos[key])            
        });
    }

    llenar(<?=json_encode($datos); ?>);  

    $("#formy").on("submit",function(e){
        e.preventDefault();
        if($("#pass").val()!=$("#pass2").val()){
            alert("Las Claves Escritas no son Iguales");
            return;
        }            
        e.currentTarget.submit();
    });

});
</script>
