<?php

namespace App\Controllers;

use App\Models\AbstractRepository;

abstract class Controller
{
    protected AbstractRepository $model;

    public function render(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        require('../src/Views/' . $path . '.html.php');
        $pageContent = ob_get_clean();
        require('../src/Views/layout.html.php');
    }

    public function redirect(string $url)
    {
        header("Location: $url");
        exit();
    }
}
