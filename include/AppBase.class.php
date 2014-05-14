<?php
abstract class AppBase {
    private $_output = array();
    private $_tpl;
    public $checkLogin = true;

    abstract public function run();

    public function show($_tpl) {
        $this->_tpl = __VIEW__."/".$_tpl;
        if (!file_exists($this->_tpl)) {
            throw new Exception("tpl not found");
        }
        extract($this->_output);
        include $this->_tpl;
    }

    public function val($key, $value) {
        $this->_output[$key] = $value;
    }

    public function jsonMsg($status, $msg='', $ext='') {
        exit(json_encode(array("status"=>$status, "msg"=>$msg, "ext"=>$ext)));
    }
}
