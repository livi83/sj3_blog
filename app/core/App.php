<?php

class App
{
    public static function init(): void
    {
        // Core
        require_once __DIR__ . '/Database.php';
        require_once __DIR__ . '/Helper.php';

        // Models
        require_once __DIR__ . '/../models/Category.php';
        require_once __DIR__ . '/../models/Contact.php';
        require_once __DIR__ . '/../models/Post.php';
    }
}