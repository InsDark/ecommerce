<?php 

class Database {
    public static connect() {
        $db = new PDO('mysql:host=localhost;dbname=shirtecommerce', 'root', 'root');
        return $db;
    } 
}