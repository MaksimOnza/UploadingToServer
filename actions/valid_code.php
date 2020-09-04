<?php

function login_validation_check($str, $min, $max)
{
    if (!valid_not_empty($str)) {
        print 'error valid_not_empty';
        return false;
    }
    if (!valid_string($str)) {
        print 'error valid_string';
        return false;
    }
    if (!valid_letter_and_int($str)) {
        print 'error valid_letter_and_int';
        return false;
    }
    if (!valid_len($str, $min, $max)) {
        print 'error valid_len';
        return false;
    }
    return true;
}

function password_validation_check($str, $min, $max)
{
    if (!valid_not_empty($str)) {
        return false;
    }
    if (!valid_string($str)) {
        return false;
    }
    if (!valid_len($str, $min, $max)) {
        return false;
    }
    return true;
}

function id_validation_check($str)
{
    if (!valid_not_empty($str)) {
        return false;
    }
    if (valid_int($str)) {
        return false;
    }
}

function valid_not_empty($str)
{
    if (!empty($str)) {
        return true;
    }
    return false;
}

function valid_string($str)
{
    if (is_string($str)) {
        return true;
    }
    return false;
}

function valid_int($str)
{
    if (is_integer($str)) {
        return true;
    }
    return false;
}

function valid_letter_and_int($str)
{
    if (is_string($str) || is_integer($str)) {
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