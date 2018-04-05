<?php
include_once("classes/CRUD.php");

$crud = new CRUD();

//getting id from url
$id = $crud->escape_string($_GET['id']);

$result = $crud->delete($id, 'users');

if ($result) {
    //redirecting to 'index.php'
    header("Location:index.php");
}
?>