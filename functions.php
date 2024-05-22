<?php

declare(strict_types = 1);  //  Para mirar los tipos de variables estrictamente

function renderTemplate(string $template, array $data = []){
    extract($data); #   extrae los datos del array
    require "templates/$template.php";
}

function getData(string $url): array {
    $result = file_get_contents($url); //  SOLO GET
    $data = json_decode($result, true);
    return $data;
}

function getUntilMessage(int $days): string {
    return match(true){
        $days === 0 => "Hoy se estrena!",
        $days === 1 => "Mañana es el estreno!",
        $days < 7   => "Esta semana se estrena!",
        $days < 30  => "Este mes se estrena!",
        default     => "$days días hasta el estreno!",
    };
}

?>