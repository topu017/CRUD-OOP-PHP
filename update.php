<?php
include_once ('classes/CRUD.php');
include_once ('classes/Validation.php');

$crud = new CRUD();
$validation = new Validation();

if(isset($_POST['update'])){
    $id = $crud->escape_string($_POST['id']);

    $name = $crud->escape_string($_POST['name']);
    $age = $crud->escape_string($_POST['age']);
    $email = $crud->escape_string($_POST['email']);

    $msg = $validation->check_empty($_POST, array('name','age','email'));
    $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);

    if($msg != null){
        echo "<br /><a href='javascript:self.history.back()'>Go Back</a>";
    }elseif(!$check_age){
        echo "Please, provide proper age.";
    }elseif(!$check_email){
        echo "Please, provide proper email.";
    }else{
        $result = $crud->execute("UPDATE users SET name='$name', age='$age', email='$email', updated_at=now() WHERE id=$id");

        //redirectig to 'index.php'
        header('location: index.php');
    }
}
?>