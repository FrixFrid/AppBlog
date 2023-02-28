<?php

namespace AppBlog\Controllers;

use AppBlog\Models\AbstractRepository;

abstract class Controller
{
    protected AbstractRepository $model;

    public function render(string $path, array $variables = []): void
    {
        extract($variables);
        ob_start();
        require ('../src/Views/' . $path . '.html.php');
        $pageContent = ob_get_clean();
        require ('../src/Views/layout.html.php');
    }

    public function redirect(string $url)
    {
        ob_end_clean();
        header('Location: ' . $url);
        exit();
    }
}
