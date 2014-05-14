<?php
class App extends AppBase {
    public $checkLogin = false;
    public function run() {
        

        $this->val("url", "localhost");
        $this->show("test.php");
    }
}
