<?php

    require('conexion.php');

    $query = $mysqli->query("SELECT 
    id,
    titulo AS title,
    descripcion,
    hora_inicio AS start,
    hora_final AS end,
    color_texto AS colorText,
    color_caja AS color,
    estatus
    FROM calendario");   
                                    
?>