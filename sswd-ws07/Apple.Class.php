<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Apple
 *
 * @author johnb
 */
class Apple extends Fruit{
    public $makesPies;
    public $hasColor;
    public $hasPips;
    
    public function Apple($appleType) {
        $this->name = $appleType . ' apple';
        $this->hasColor='Red';
        $this->hasPips=TRUE;
        $this->makesPies=TRUE;
    }
}
