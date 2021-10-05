<main>
    <div class="container-fluid px-4 ">
        <div class="card  my-4 border border-1 border-dark">
            <div class="card-header bg-secondary text-white  border-bottom-1 border-dark py-0">
                <h4 class="m-0 py-2">PRODUCTOS SUNAT
                    <a href="<?=base_url('sunat_producto/form'); ?>" class="btn btn-sm btn-warning float-end "><i class="fas fa-plus-circle"></i> Nuevo</a>
                </h4>
            </div>
            <div class="card-body">
          
                <div id="toolbar " class="w-50 float-end">
                    <div class="input-group input-group-sm mb-3 px-2 m-auto ">
                        <select id="campo" name="campo"  class="form-select border border-1 border-dark ">                            
                            <option value="nom">Nombre</option>
                            <option value="codigo">Codigo</option>
                            <option value="clase">Clase</option>
                            <option value="familia">Familia</option>
                            <option value="segmento">Segmento</option>
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
                    data-toggle="table" data-url="<?=base_url('sunat_producto/listar_json'); ?>" data-side-pagination="server"
                    data-pagination="true" data-toolbar="#toolbar" data-query-params="queryParams" data-sort-name="codigo" data-sort-order="asc">
                    <thead>
                        <tr>                           
                            <th data-field="codigo" data-sortable="true"  data-align="center" data-formatter="primary">Codigo</th>
                            <th data-field="nom" data-sortable="true">Nombre</th>
                            <th data-field="clase" data-sortable="true">Clase</th>
                            <th data-field="familia" data-sortable="true">Familia</th>
                            <th data-field="segmento" data-sortable="true">Segmento</th>                            
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
    font-stretch: 0%;    
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
    return params;
  }

  function primary(value, row, index) {
    /* console.log(value);*/
    return `<a href="#!" >${row.codigo}</a>`;
}

function link_editar(value, row, index) {
    /* console.log(value);*/
    return `<a href="<?=base_url('sunat_producto/form/editar'); ?>/${row.idx}" data-idx="${row.idx}">Editar</a>`;
}
$(function() {
    $("#reset").click(function () {
        $('#campo option')[0].selected = true;
        $("#valor").val("").focus();
        $("#table").bootstrapTable('refreshOptions', { url: '<?=base_url('sunat_producto/listar_json'); ?>' });
    });

    $("#buscar").click(function () {
      $("#table").bootstrapTable('refresh')
    });

       
});
</script>
