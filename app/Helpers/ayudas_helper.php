<?php

    function Ayuda_mensaje(string $mensaje)
    {
        return $mensaje;
    }

    function Ayuda_link_atras()
    {
        return '<h2 style="text-align:center"><a href="javascript:history.back()">VOLVER</a></h2>';
    }

    function Ayuda_mesaje_post()
    {
        if (session()->get('ok')) {
            echo '<div class="alert alert-success">'.session()->get('ok').'</div>';
        }
        if (session()->get('error')) {
            echo '<div class="alert alert-danger">'.session()->get('error').'</div>';
        }
    }
