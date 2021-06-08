<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link href="../css/rejestracjaCSS.css" rel="stylesheet" type="text/css">
    <title>Rejestracja</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 maindiv">
                <form method="POST">
                    <h2>Rejestracja</h2>
                    <p>
                        <label for="email" class="floatLabel">Email*</label>
                        <input id="email" name="email" type="text">
                    </p>
                    <p>
                        <label for="login" class="floatLabel">Login*</label>
                        <input id="login" name="login" type="text">
                    </p>
                    <p>
                        <label for="password" class="floatLabel">Hasło*</label>
                        <input id="password" name="password" type="password">
                        <span id="span1"></span>
                    </p>
                    <p>
                        <label for="confirm_password" class="floatLabel">Potwierź hasło*</label>
                        <input id="confirm_password" name="confirm_password" type="password">
                        <span id="span2"></span>
                    </p>
                    <p id="bb" style="display: none;">
                        <input type="submit" value="Zarejestruj" id="submit" name="rejestracja">
                    </p>
                </form>
                <?php
                if (isset($_POST['rejestracja'])) {
                    if (!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['login'])) {
                        include('conn.php');
                        $result = $pdo->prepare("SELECT login, email FROM users WHERE login = :login OR email = :email");
                        $result->bindParam(':login', $_POST['login'], PDO::PARAM_STR, 30);
                        $result->bindParam(':email', $_POST['email'], PDO::PARAM_STR, 30);
                        $result->execute();
                        $number_of_rows = $result->rowCount();
                        if ($number_of_rows < 1) {
                            $sth = $pdo->prepare("INSERT INTO users VALUES ('', :email, :login, :password , '', '')");
                            $hash = hash('sha256', $_POST['password']);
                            $sth->bindParam(':password', $hash, PDO::PARAM_STR, 64);
                            $sth->bindParam(':login', $_POST['login'], PDO::PARAM_STR, 30);
                            $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR, 30);
                            $sth->execute();
                            echo 'zarejestrowano';
                            header("Refresh:2; url=wybor.php");
                        } else {
                            echo 'Dane sa zajete';
                        }
                    } else {

                        echo 'Wpisz dane';
                    }
                }


                ?>

            </div>
        </div>
    </div>

    <script src="../js/walidacjaHasla.js"></script>>
</body>

</html>