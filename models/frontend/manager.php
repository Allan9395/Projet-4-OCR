<?php

namespace Allan\Blog\Projet_4\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogJean;charset=utf8', 'root', 'root');
        return $db;
    }
}