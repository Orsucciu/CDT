<?php
    session_start();
    session_destroy();

    $host = filter_input(INPUT_SERVER, "HTTP_HOST");
    $uri = rtrim(dirname(filter_input(INPUT_SERVER, "PHP_SELF")), '/\\');
    $page = 'index.php';
    header("Location: http://$host$uri/$page");
?>
