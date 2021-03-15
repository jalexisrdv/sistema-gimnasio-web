<?php

function diaMesAnioToAnioMesDia($fecha) {
    $date = str_replace('/', '-', $fecha);
    return date('Y-m-d', strtotime($date));
}