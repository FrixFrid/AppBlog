<?php
namespace App;

class Renderer
{
public static function render(string $path, array $variables = [])
{
extract($variables);
ob_start();
require('views/' . $path . '.html.php');
$pageContent = ob_get_clean();

require('views/layout.html.php');
}
}