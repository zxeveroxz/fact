<main>
    <div class="container px-4 ">
        <div class="card  my-4 border border-1 border-dark">
            <div class="card-header bg-secondary text-white  border-bottom-1 border-dark py-0">
                <h4 class="m-0 py-2">PROVEEDOR / <span class="text-capitalize"><?=$tipo; ?></span>
                    <a href="<?=base_url('proveedor'); ?>" class="btn btn-sm btn-warning float-end "><i
                            class="fa fa-reply" aria-hidden="true"></i> Volver</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                    Ayuda_mesaje_post();
                ?>
                <?=form_open('proveedor/save', ['id' => 'formy']); ?>
                <input type="hidden" id="RUC_" name="RUC_" value="<?=session()->get('RUC'); ?>">
                <input type="hidden" id="idx" name="idx">
                <div class="form-group row mb-2">
                    <label for="nro" class="col-sm-2 col-form-label">RUC:</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nro" name="nro" required>
                            <button class="btn btn-success" type="button"
                                id="button-addon2">Consultar</button>
                        </div>
                    </div>
                    <label for="giro" class="col-sm-2 col-form-label text-end">Giro:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="giro" name="giro">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="nom" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="direccion" class="col-sm-2 col-form-label">Direccion:</label>
                    <div class="col-sm-10">
                        <textarea name="direccion" id="direccion" class="form-control" rows="1"></textarea>
                    </div>
                </div>
                <hr />
                <div class="form-group row mb-2">
                    <label for="contacto" class="col-sm-2 col-form-label">Contacto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contacto" name="contacto">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="contacto" class="col-sm-2 col-form-label ">Telefono:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <label for="web" class="col-sm-2 col-form-label text-end">Web:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="web" name="web">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="detalles" class="col-sm-2 col-form-label">Detalles:</label>
                    <div class="col-sm-10">
                        <textarea name="detalles" id="detalles" class="form-control" rows="1"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">

                        <select name="estado" id="estado" class="form-select" required="required">
                            <option value="1">Activo</option>
                            <option value="0">Desactivado</option>
                        </select>

                    </div>
                </div>

                <hr />
                <div class="form-group row ">

                    <div class="col-6 col-sm-6 text-left">
                        <button id="cancelar" type="button" class="btn  btn-danger ">Cancelar</button>
                    </div>

                    <div class="col-6 col-sm-6 ">
                        <button id="envio" type="submit" class="btn  btn-primary float-end">Guardar</button>
                    </div>
                </div>

                </form>


            </div>
        </div>

    </div>
</main>

<?=$this->include('includes/footer'); ?>
<script>
 

$(function() {
    function llenar(datos) {
        Object.keys(datos).forEach(key => {
            $("#" + key).val(datos[key])
        });
    }

    llenar(<?=json_encode($datos); ?>);

    
    $("#buscar_ruc").on("click",function(){
        let formData = new FormData();
        formData.append(TOKEN_NAME,TOKEN_KEY);   

        await fetch(`<?=base_url('apis/buscar_ruc'); ?>`,{method:'POST',body:formData})
        .then((response)=>{
            if(response.status===403){
                window.parent.location.href="/facturador/";      
            }else{
                console.log("Exportacion actualizada");
                $('#table1').bootstrapTable('refresh',{silent: true});
            }            
        })
        .catch((e)=>{
            bootbox.alert("Se produjo un error, favor de refrescar la pagina o vuelva a ingresar");
            console.log(e);             
        }); 
    });

});
</script>
