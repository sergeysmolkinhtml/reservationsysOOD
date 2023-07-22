<?php

namespace App;

class Config
{
    public static function get(string $path = null) : mixed
    {

        if($path) {
            $config = require_once 'databasecfg.php';
            $path = explode('.', $path);

            foreach ($path as $item) {
                if(isset($config[$item])) {
                    $config = $config[$item];
                }
            }
            return $config;
        }
        return false;
    }
}