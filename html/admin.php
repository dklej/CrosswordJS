<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/admin_style.css" rel="stylesheet" type="text/css">
    <title>Zarządanie</title>
</head>

<body>

    <div class="opcje">
        <p>
            LISTA UŻYTKOWNIKÓW
        </p>

    </div>
    <div class="mainbox">
        <div class="posty">
            Aktywni uzytkownicy
            <?php
            include("conn.php");
            $req = $pdo->prepare("SELECT * FROM users WHERE banned = 0");
            $req->execute();
            $data = $req->fetchAll();
            ?>
            <table style="width:100%; text-align:center;">
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Akcja</th>
                </tr>
                <?php foreach ($data as $user) : ?>
                    <tr>
                        <td><?php echo $user['ID']; ?></td>
                        <td><?php echo $user['login']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <form method="post"><input type="submit" value="Zablokuj" name="user_<?php echo $user['ID']; ?>"></form>
                        </td>
                        <?php
                        if (isset($_POST['user_' . $user['ID']])) {
                            $req_ban = $pdo->prepare("UPDATE users set banned = '1' WHERE ID= :id");
                            $req_ban->bindParam(':id', $user['ID'], PDO::PARAM_STR, 30);
                            $req_ban->execute();
                            header("Refresh:0; url=admin.php");
                        }
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="opcjeAdmina"><br>
            <a href="zablokowani.php">
                <p>Lista zablokowanych użytkowników</p>
            </a><br>
            <a href="logout.php">
                <p>Wyloguj admina</p>
            </a> <br>
        </div>
    </div>
</body>

</html>