<?php

function route($url)
{
    header("location: $url");
    die();
}

function checkStrongPassword($password)
{
    return preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[1-9]/', $password) && preg_match('/[!@#$%*^]/', $password);

}
