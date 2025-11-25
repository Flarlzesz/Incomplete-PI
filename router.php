<?php
// router.php

$requested = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $requested;

// If root "/" is requested, serve dashboard.php
if ($requested === "/" || $requested === "/index.php") {
    include "dashboard.php";
}
// If the requested file exists, let the PHP server handle it
elseif (file_exists($file)) {
    return false;
}
// For anything else, show 404
else {
    header("HTTP/1.0 404 Not Found");
    echo "Page not found.";
}
