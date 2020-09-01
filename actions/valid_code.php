<?php

function login_validation_check($str, $min, $max)
{
    if (!valid_not_empty($str)) {
        return 'error';
    }
    if (!valid_string($str)) {
        return 'error';
    }
    if (!valid_letter_and_int($str)) {
        return 'error';
    }
    if (!valid_len($str, $min, $max)) {
        return '';
    }
}

function password_validation_check($str, $min, $max)
{
    if (!valid_not_empty($str)) {
        return 'error';
    }
    if (!valid_string($str)) {
        return 'error';
    }
    if (!valid_len($str, $min, $max)) {
        return 'error';
    }
}

function id_validation_chack($str)
{
    if (!valid_not_empty($str)) {
        return 'error';
    }
    if (valid_int($str)) {
        return 'error';
    }
}

function valid_not_empty($str)
{
    if (!empty($str)) {
        return true;
    }
    return 'error';
}

function valid_string($str)
{
    if (is_string($str)) {
        return true;
    }
    return 'error';
}

function valid_int($str)
{
    if (is_integer($str)) {
        return true;
    }
    return 'error';
}

function valid_letter_and_int($str)
{
    if (is_string($str) || is_integer($str)) {
        return true;
    }
    return 'error';
}

function valid_len($str, $min_len, $max_len)
{
    if ($min_len < strlen($str) and strlen($str) < $max_len) {
        return true;
    }
    return 'error';
}