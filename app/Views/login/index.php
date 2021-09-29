<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-3">IDENTIFIQUESE</h3></div>
                                    <div class="card-body">
                                    
                                        <?=form_open('login/validar', ['id' => 'login']); ?>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputRUC" name="inputRUC" type="text" maxlength="11" minlength="11" required  value="<?=old('inputRUC', ''); ?>" />
                                                <label for="inputRUC">RUC: </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUser" name="inputUser" type="text" required  value="<?=old('inputUser', ''); ?>"  />
                                                <label for="inputUser">Usuario: </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="inputPassword" type="password" required />
                                                <label for="inputPassword">Clave: </label>
                                            </div>
                                            
                                            <?php if (session()->getFlashdata('msg')):?>
                                                <div class="alert alert-danger py-1 border-1 border-danger text-center"><?= session()->getFlashdata('msg'); ?></div>
                                            <?php endif; ?>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRecordar" name="inputRecordar" type="checkbox" value="recordar" />
                                                <label class="form-check-label" for="inputRecordar">Recordar datos</label>
                                            </div>
                                            

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Me olvide mi Clave?</a>                                                
                                                <button id="envio" type="submit" class="btn btn-primary"> Iniciar </button>                                                                                                
                                            </div>
                                            
                                        </form>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            <?=$this->include('includes/footer_texto'); ?>
            </div>
        </div>
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<script>

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue, dias) {
    var d = new Date();
    d.setTime(d.getTime() + (dias*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function deleteCookie(cname){
    setCookie(cname,'',-1);
}


$('#inputRUC').val(getCookie('ruc_recuerdo'));
$('#inputUser').val(getCookie('usu_recuerdo'));


$(document).ready( function() { // Wait until document is fully parsed

    if(getCookie('ruc_recuerdo')!="" || getCookie('usu_recuerdo')!="")
        $("#inputRecordar").prop('checked',true);

  $("#envio").click(function(e){
        e.preventDefault();
        if($("#inputRecordar").prop('checked')){
            setCookie("ruc_recuerdo",$("#inputRUC").val(),1);
            setCookie("usu_recuerdo",$("#inputUser").val(),1);
        }else{
            deleteCookie("ruc_recuerdo");
            deleteCookie("usu_recuerdo");
        }

        $("#login").submit();
  });
})

</script>