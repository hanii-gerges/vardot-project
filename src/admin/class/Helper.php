<?php

class Helper
{
    public static function filter($data)
    {
        foreach ($data as &$value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
        }

        return $data;
    }
    public static function filterValue($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    // public static function storeMedia()
    // {

    // }

}
