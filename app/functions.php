<?php

function getPageTitle(){
    $script = $_SERVER['SCRIPT_NAME']; // templates/index.php
    $page = ucfirst(basename($script, '.php')); // index
    return 'TechBlog - ' . $page; // TechBlog - Index   
}

function redirect($url){
    header('Location: ' . $url);
    exit;
}

function saveMessage(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        if (empty($name) || empty($email) || empty($message)) {
            echo "Vyplň všetky polia!";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email nemá správny formát!";
                return;
        }

        // zápis
        $zaznam = "--------------------------" . PHP_EOL;
        $zaznam .= "Meno: $name" . PHP_EOL;
        $zaznam .= "Email: $email" . PHP_EOL;
        $zaznam .= "Správa: $message" . PHP_EOL;
        $zaznam .= "Dátum: " . date("Y-m-d H:i:s") . PHP_EOL;

        file_put_contents("../../storage/messages.txt", $zaznam, FILE_APPEND);

        echo "Správa bola uložená!";

    }
}
?>