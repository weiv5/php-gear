<?php
class Loader {
    public static function loadLib($class) {
        $class_path = __ROOT__.'/lib/'.$class.'.class.php';
        if (is_readable($class_path)) {
            require_once $class_path;
        }
    }

    public static function loadModel($class) {
        $class_path = __ROOT__.'/model/'.$class.'.class.php';
        if (is_readable($class_path)) {
            require_once $class_path;
        }
    }
}
