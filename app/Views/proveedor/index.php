<main>
    <div class="container-fluid px-4 ">
        <div class="card  my-4 border border-1 border-dark">
            <div class="card-header bg-secondary text-white  border-bottom-1 border-dark py-0">
                <h4 class="m-0 py-2">PROVEEDORES
                    <a href="<?=base_url('proveedor/form'); ?>" class="btn btn-sm btn-warning float-end "><i class="fas fa-plus-circle"></i> Nuevo</a>
                </h4>
            </div>
            <div class="card-body">
          
                <div id="toolbar " class="w-50 float-end">
                    <div class="input-group input-group-sm mb-3 px-2 m-auto ">
                        <select id="campo" name="campo"  class="form-select border border-1 border-dark ">                            
                            <option value="nom">Nombre</option>
                            <option value="detalles">Detalles</option>
                        </select>
                        <input type="search" name="valor" id="valor"
                            class="form-control bg-light border border-1 border-dark ">
                        <div class="input-group-append">
                            <button class="btn btn-primary " type="button" id="buscar"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-info " type="button" id="reset"><i class="fas fa-sync-alt"></i></button>
                        </div>
                    </div>

                </div>
                <table id="table"
                    class="table table-light table-sm table-bordered table-condensed table-striped table-hover "
                    data-toggle="table" data-url="<?=base_url('proveedor/listar_json'); ?>" data-side-pagination="server"
                    data-pagination="true" data-toolbar="#toolbar" data-query-params="queryParams">
                    <thead>
                        <tr>
                            <th data-field="idx" data-width="70" data-align="center" data-formatter="link_editar">-
                            </th>
                            <th data-field="nro">Numero</th>
                            <th data-field="nom">Nombre</th>
                            <th data-field="giro">Giro</th>
                            <th data-field="telefono">Telefono</th>
                            <th data-field="correo">Correo</th>
                            <th data-field="contacto">Contacto</th>
                            <th data-field="detalles">Detalles</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>


<style>
td {
    text-transform: uppercase;
}

</style>

<?=$this->include('includes/footer'); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<!-- Latest compiled and minified Locales -->
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/locale/bootstrap-table-es-MX.min.js"></script>
<script>

  function queryParams(params) {
    params.campo = $("#campo").val();
    params.valor = $("#valor").val();
    return params
  }

function link_editar(value, row, index) {
    //console.log(value);
    return `<a href="<?=base_url('proveedor/form/editar'); ?>/${row.idx}" data-idx="${row.idx}">Editar</a>`;
}
$(function() {
    $("#reset").click(function () {
        $('#campo option')[0].selected = true;
        $("#valor").val("").focus();
        $("#table").bootstrapTable('refreshOptions', { url: '<?=base_url('proveedor/listar_json'); ?>' });
    });

    $("#buscar").click(function () {
      $("#table").bootstrapTable('refresh')
    });

       
});
</script>
