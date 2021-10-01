<main>
    <div class="container px-4 ">
        <div class="card  my-4 border border-1 border-dark">
            <div class="card-header bg-secondary text-white  border-bottom-1 border-dark py-0">
                <h4 class="m-0 py-2">CATEGORIAS / <span class="text-capitalize"><?=$tipo; ?></span> 
                <a href="<?=base_url('categoria'); ?>" class="btn btn-sm btn-warning float-end "><i class="fas fa-plus-circle"></i> Volver</a></h4>
            </div>
            <div class="card-body">
                <?php
                    Ayuda_mesaje_post();
                ?>
                <?=form_open('categoria/save', ['id' => 'formy']); ?>
                <input type="hidden" id="RUC_" name="RUC_" value="<?=session()->get('RUC'); ?>">
                <input type="hidden" id="idx" name="idx">
                <div class="form-group row mb-2">
                    <label for="txt_usuario" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                </div>      

                <hr />
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Detalles:</label>
                    <div class="col-sm-10">                        
                        <textarea name="detalles" id="detalles" class="form-control" rows="3"></textarea>                        
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
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
$(function(){  
    function llenar(datos){
        Object.keys(datos).forEach(key => {
            $("#"+key).val(datos[key])            
        });
    }
    llenar(<?=json_encode($datos); ?>);  

});
</script>