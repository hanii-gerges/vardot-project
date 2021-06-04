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

    public static function required($data, $fields)
    {
        $flag = true;
        foreach($fields as $field)
        {
            if(!isset($data[$field]) || $data[$field] == '')
            {
                $_SESSION['error'][] = "$field field is required.";
                $flag = false;
            }
        }
        return $flag;
    }
}
