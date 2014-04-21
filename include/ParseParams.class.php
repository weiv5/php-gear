<?php
class GET {
    public static function int($key, $default=false) {
        return self::parseVal("int", $key, $default);
    }

    public static function str($key, $default=false) {
        return self::parseVal("str", $key, $default);
    }

    public static function parseVal($type, $key, $default) {
        $fun = $type."val";
        if (isset($_GET[$key])) {
            return $fun($_GET[$key]);
        }
        return $default;
    }
}

class POST {
    public static function int($key, $default=false) {
        return self::parseVal("int", $key, $default);
    }

    public static function str($key, $default=false) {
        return self::parseVal("str", $key, $default);
    }

    public static function parseVal($type, $key, $default) {
        $fun = $type."val";
        if (isset($_POST[$key])) {
            return $fun($_POST[$key]);
        }
        return $default;
    }
}
