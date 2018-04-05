<?php
include_once('classes/CRUD.php');

$crud = new CRUD();
//Getting id from url
$id = $crud->escape_string($_GET['id']);

//Getting data associated with this matched id
$result = $crud->getData("SELECT * FROM users WHERE id = $id");

foreach($result as $res){
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>
<html>
    <head>
        <title>Edit data</title>
    </head>
    <body>
        <a href="index.php">Home</a><br /><br />
    <form method="post" action="update.php" name="formB">
        <table border="0">
            <tr>
                <td>Name:</td>
                <td><input name="name" type="text" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input name="age" type="text" value="<?php echo $age;?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input name="email" type="text" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input name="id" type="hidden" value="<?php echo $_GET['id']; ?>"></td>
                <td><input name="update" type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
    </body>
</html>