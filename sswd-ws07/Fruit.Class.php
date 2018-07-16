<?php
/*
SSWD-WS07 classes and objects
 */

/**
 * Description of Fruit
 * * @author johnb
 */
class Fruit {
    public $name;
    public $clean;
    public $washed;
    
    public function Fruit($fruitName) {
        $this->name = $fruitName;
        $this->clean = FALSE;
        $this->washed = 0;
    }
    
    public function wash() {
        $this->clean = TRUE;
        $this->washed++;
    }
}
