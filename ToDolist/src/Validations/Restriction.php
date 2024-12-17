<?php

namespace Validations;

class Restriction
{
    public static $errors = [];

    /** Select validate string
     * @return bool
     */
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /** Select Validate email
     * @return bool
     */
    public static function email($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
