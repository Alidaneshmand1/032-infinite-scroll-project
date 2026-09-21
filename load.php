<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

sleep(1);

$json_string = file_get_contents("data.json");
$books = json_decode($json_string, true);

if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
    $limit = (int)$_GET["limit"];
} else {
    $limit = 5;
}

if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
    $page = (int)$_GET["page"];
} else {
    $page = 1;
}

$output = array();

$start = ($page - 1) * $limit;

for ($i = $start; $i < ($start + $limit); $i++) {
    if (isset($books[$i])) {
        $output[] = $books[$i];
    }
}

echo json_encode($output, JSON_PRETTY_PRINT);