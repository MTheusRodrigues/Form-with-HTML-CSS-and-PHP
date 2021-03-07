<!--Instance class Users-->
<?php 
    require_once 'class/users.php';
    $u = new Users;
?>
<!--HTML5-->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf8mb4">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <title>Form</title>
    </head>
    <body>
        <div class="mainContainer">   
            <div class="boxHeader">
                <img src="img/log.png" alt="">      
                <h1 class="labelForm">Form</h1>
            </div>
        <div class="boxMain">
            <form method="POST">
                <label for="email">
                    <p>Email:</p>
                    <input type="email" name="email" id="email" maxlength="40">
                </label>
                <label for="password">
                    <p>Password:</p>
                    <input type="password" name="password" id="password" maxlength="8">
                </label>
                <input type="submit" class="btn" value="LOGIN"></input>
                <div class="formFooter">
                   <span> Ainda não é inscrito?</span><a href="php/register.php"><strong>Cadastre-se!</strong></a>
                </div>
            </form>
        </div>
    </div> 
<!--PHP 7.4.9-->
    <?php  
        if (isset($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            if(!empty($email) && !empty($password)) {
                $u -> conect("projectlogin", "localhost", "root", "");
                if($u -> msgError == "") {
                    if ($u -> login($email, $password)) {
                        header("location: php/private-area.php");
                    } else {
                        ?>
                            <div class="msgError">
                                Email or Password not found!
                            </div>  
                        <?php
                    }
                }  else {
                    ?>
                        <div class="msgError">
                            <?php echo "Error: ".$u -> msgError;?>
                        </div>
                    <?php
                }   
            } else {
                ?>
                    <div class="msgError">
                        ill in all fields!
                    </div>     
                <?php
            }
        } 
    ?>
</body>
</html>
<!--    
        Code by Matheus Rodrigues
        03/03/2021

-->