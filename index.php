<?php
include_once "classes/CRUD.php";

$crud = new CRUD();

$query = "SELECT * FROM users ORDER BY id DESC";
$result = $crud->getData($query);
?>

<html>
    <head>Homepage</head>
    <body>
        <a href="create.html">Add new data</a><br /><br >

    <table width="80%" border="0">
        <tr bgcolor="#6495ed">
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>

        <?php
            foreach($result as $key => $res){
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['age']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            }
        ?>
    </table>
    </body>
</html>