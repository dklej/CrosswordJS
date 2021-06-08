<?php
function login()
{
    if (!empty($_SESSION['login']) && !empty($_SESSION['password']) && !empty($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}
