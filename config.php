<?php
session_start();

global $pdo;

try {
    $pdo = new PDO('mysql:dbname=classificados; host=localhost', 'root', 'root');
} catch (\PDOException $e) {
    echo 'Falha na conexão: <strong>'.$e->getMessage().'</strong>';
}
