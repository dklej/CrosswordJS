<?php
session_start();
include('func.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Panel administratora-zablokowani</title>
    <link href="../css/admin_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="opcje">
        <p>
            ZABLOKOWANI UŻYTKOWNICY
        </p>

    </div>
    <div class="mainbox">
        <div class="posty">
            Niektywni uzytkownicy
            <?php
            include("conn.php");
            $req = $pdo->prepare("SELECT * FROM users WHERE banned = 1");
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
                            <form method="post"><input type="submit" value="Odblokuj" name="user_<?php echo $user['ID']; ?>"></form>
                        </td>
                        <?php
                        if (isset($_POST['user_' . $user['ID']])) {
                            $req_unban = $pdo->prepare("UPDATE users set banned = '0' WHERE ID = :id");
                            $req_unban->bindParam(':id', $user['ID'], PDO::PARAM_STR, 30);
                            $req_unban->execute();
                            header("Refresh:0; url=zablokowani.php");
                        }
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="opcjeAdmina"><br>
            <a href="admin.php">
                <p>Przejdź do listy użytkowników</p>
            </a><br>
            <a href="logout.php">
                <p>Wyloguj</p>
            </a> <br>
        </div>
    </div>

</body>

</html>