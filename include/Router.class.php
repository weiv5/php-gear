<?php
class Router {
    private static $_instance;
    private function __construct(){}
    private function __clone(){}

    public static function getInstance() {
        if (!isset(self::$_instace)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
     
    public function parseAction($m) {
        $m = trim($m, './');
        $m = preg_replace('/[^0-9a-z\-]/i', ' ', $m);
        $m = preg_replace('~-{2,}~is', '-', $m);
        $m = __APP__ . '/' . str_replace('-', '/', $m) . ".php";
        if(!file_exists($m)) {
            return __APP__.'/index.php';
        } else {
            return $m;
        }
    }
}
