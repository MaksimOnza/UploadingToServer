<?php

function login_validation_check($login, $min, $max)
{
    $resp_users = query_select("SELECT login_user FROM users");
    $array_list_users = [];
    foreach ($resp_users as $user) {
        $array_list_users[] = $user['login_user'];
    }
    if (in_array($login, $array_list_users)) {
        print 'error Такое имя уже сущуствует';
        return false;
    }
    if (!is_string($login)) {
        print 'error valid_string';
        return false;
    }
    if (!valid_letter_and_int($login)) {
        print 'error valid_letter_and_int';
        return false;
    }
    if (!valid_len($login, $min, $max)) {
        print 'error valid_len';
        return false;
    }
    return true;
}

function password_validation_check($str, $min, $max)
{
    if (!is_string($str)) {
        return false;
    }
    if (!valid_len($str, $min, $max)) {
        print 'wrong len';
        return false;
    }
    return true;
}

function valid_letter_and_int($str)
{
    if (is_string($str) || is_numeric($str)) {
        return true;
    }
    return false;
}

function valid_len($str, $min_len, $max_len)
{
    if ($min_len <= strlen($str) and strlen($str) <= $max_len) {
        return true;
    }
    return false;
}