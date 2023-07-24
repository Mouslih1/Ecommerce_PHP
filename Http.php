<?php

class Http
{
    public static function redirect(String $url)
    {
        header("Location: $url");
        exit();
    }
}