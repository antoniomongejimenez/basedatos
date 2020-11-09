<?php
session_start();

require '../comunes/auxiliar.php';

comprobar_admin();

if (isset($_POST['id'])) {
    $id = trim($_POST['id']);
    $pdo = new PDO('pgsql:host=localhost;dbname=prueba', 'prueba', 'prueba');
    $sent = $pdo->prepare('DELETE FROM depart WHERE id = :id');
    $sent->execute([':id' => $id]);
}
$_SESSION['flash'] = 'La fila se ha borrado correctamente.';
volver();
