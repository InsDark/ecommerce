<?php 

class Database {
    public static function connect() {
        $db = new PDO('mysql:host=localhost;dbname=shirtEcommerce', 'root', 'root');
        return $db;
    } 
}