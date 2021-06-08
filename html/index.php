<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Internetowa krzyżówka online</title>
    <link href="../css/indexCSS.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="logo">INTERNETOWA KRZYŻÓWKA ONLINE</p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h1 class="bialyTekst">Witaj na stronie!</h1>
                <h4 class="bialyTekst">Na stornie startowej można rozwiązać bez zakładania konta tylko jedną krzyżówkę z jedym poziomem trudności.
                    Krzyżówki mają na celu rozładowanie stresu, zabicie czasu, a zwłaszcza trenowanie mózgu słownymi łamigłówkami. Sprawdź się, a następnie
                    załóż konto, i ciesz się różnorodnością krzyżówek online!!!!</h4><br><br><br>

                <div class="d-grid row-2 col-4 gap-2 mx-auto">
                    <a href="pierwszaKrzyzowka.html" role="button" class="btn btn-success btn-lg">Rozwiąż krzyżówkę</a>
                    <a href="rejestracja.php" role="button" class="btn btn-success btn-lg">Zarejestruj się</a>

                </div>
                <br><br><br><br><br><br><br><br>

            </div>
            <div class="col-md-4" style="border: black 3px solid; padding:40px; padding-top:9%">
                <form method="POST">
                    <div class="mb-3">
                        <div id="help" class="form-text">
                            <p class="text-light" style="font-size: 20px;">Login</p>
                        </div>
                        <input type="login" name="login" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <div id="help" class="form-text">
                            <p class="text-light" style="font-size: 20px;">Hasło</p>
                        </div>
                        <input type="password" name="password" class="form-control" id="InputPassword1">
                        <div id="help" class="form-text">
                            <p class="text-light">Nie podawaj nikomu swojego hasła!</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="logowanie">Zaloguj</button>
                </form>
                <?php
                if (isset($_POST['logowanie'])) {
                    if (!empty($_POST['password']) && !empty($_POST['login'])) {
                        include("conn.php");
                        $req = $pdo->prepare("SELECT * FROM users where login = :login AND password = :password");
                        $req->bindParam(':login', $_POST['login'], PDO::PARAM_STR, 30);
                        $hash = hash('sha256', $_POST['password']);
                        $req->bindParam(':password', $hash, PDO::PARAM_STR, 64);
                        $req->execute();
                        $res = $req->rowCount();
                        if ($res == 1) {
                            $data = $req->fetchAll();
                            $_SESSION['login'] = $data[0]['login'];
                            $_SESSION['password'] = $data[0]['password'];
                            $_SESSION['id'] = $data[0]['ID'];
                            echo 'zalogowano';
                            header("Refresh:2; url=wybor.php");
                        } else {
                            echo 'Błędne dane';
                        }
                    } else {
                        echo 'Uzupelnij pola';
                    }
                }

                ?>
                <br><br>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <h2> Czy wiesz, że... </h2>
                <p>Historia krzyżówek sięga XIX wieku, a najstarsze źródła podają, że pierwsza powstała w Japonii,
                    lecz świat za wynalazcę tej gry często uznaje Arthura Wynne, pracownika gazety w USA.
                    Słowo „crossword” została wymyślone dużo wcześniej w 1862 roku w Stanach Zjednoczonych przez „Our Young Folks” – młodzieżowy miesięcznik.</p>
            </div>
            <div class="col-md-4">
                <h2> Pamiętaj... </h2>
                <p> Rozwiązywanie krzyżówek zalicza się do ćwiczeń umysłowych poprawiających funkcjonowanie mózgu. Już od najmłodszych
                    lat warto zadbać o swoją sprawność umysłową. Częsty trening pozwala nam zachować doskonały stan, zaś omijanie go
                    doprowadza często do zanikania struktur np. częste używanie kalkulatora może doprowadzić do utrudnienia liczenia w pamięci.</p>
            </div>
            <div class="col-md-4">
                <h2> Ciekawostka </h2>
                <p>Szaradziarstwo – ”to dziedzina wiedzy obejmująca teorię komponowania oraz praktyczną umiejętność rozwiązywania zadań szaradziarskich
                    rozmaitego typu: łamigłówek, zagadek, krzyżówek, zadań logicznych, rysunkowych, szarad itp.”. Osoby rozwiązujące krzyżówki nazywa
                    się szaradzistami.</p>
            </div>
        </div>
    </div>
</body>

</html>