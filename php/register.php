<!--Instance class Users-->
<?php
     require_once '../class/users.php';
    $u = new Users;
?>
<!--HTML 5-->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf8mb4">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/index.css">
        <title>Form Register</title>
    </head>
    <body>
        <div class="mainContainer">   
            <div class="boxHeader">
                <img src="../img/log.png" alt="">      
                <h1 class="labelForm">Form</h1>
                
            </div>
        <div class="boxMain">
            <form method="POST">
                <label for="name">
                    <p>Name:</p>
                    <input type="text" name="name" id="name" maxlength="40">
                </label>
                <label for="email">
                    <p>Email:</p>
                    <input type="email" name="email" id="email" maxlength="40">
                </label>
                <label for="password">
                    <p>Password:</p>
                    <input type="password" name="password" id="password" maxlength="8">
                </label>
                <label for="conf-password">
                    <p>Confirm Password:</p>
                    <input type="password" name="conf-password" id="conf-password" maxlength="8">
                </label>
                <input type="submit" class="btn" value="REGISTER"></input>
            </form>
        </div>
    </div>

<!--PHP 7.4.9-->
<?php
    if (isset($_POST['name'])) {
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $confPassword = addslashes($_POST['conf-password']);
        if(!empty($name) && !empty($email) && !empty($password) && !empty($confPassword)) {
            $u -> conect("projectlogin", "localhost", "root", "");
            if ($u -> msgError == "") {
                if ($password == $confPassword) {
                    if ($u -> register($name, $email, $password)) {
                        ?>
                            <div class="msgSuccessfull">
                                "Registered successfully"
                            </div> 
                            <meta http-equiv="refresh" content="1; url=../index.php"> 
                        <?php

                    } else {
                        ?>
                            <div class="msgError">
                                Email already registered
                            </div>
                        <?php
                    }
                } else {
                    ?>
                        <div class="msgError">
                            Password and confirm password are not the same!
                        </div>
                
                    <?php
                }
            } else {
                ?>
                    <div class="msgError">
                        <?php echo "Error: ".$u -> msgError;?>
                    </div>
                <?php
            }
        } else { 
            ?>
                <div class="msgError">
                Complete all fields!
                </div>
            <?php
        }
    }
            ?>
</body>
</html>