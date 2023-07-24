<?php


class Render
{
    public static function render(string $path, array $variable = [])
    {
        extract($variable);
        ob_start();
        require_once("views/$path.php");
        $content = ob_get_clean();
        include_once("views/layout.php");
    }

}