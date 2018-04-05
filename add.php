<html>
    <head>
        <title>Add data</title>
    </head>
    <body>
        <?php
        include_once ('classes/CRUD.php');
        include_once ('classes/Validation.php');

        $crud = new CRUD();
        $validation = new Validation();

        if(isset($_POST['submit'])){
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
                $result = $crud->execute("INSERT INTO users(name, age, email, created_at, updated_at) VALUES ('$name', '$age', '$email', now(),'')");
                echo "<font color='green'>Data added successfully.";
                echo "<br /><a href='index.php'>View Result</a>";
            }
        }
        ?>
    </body>
</html>