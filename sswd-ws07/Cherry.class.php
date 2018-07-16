<?php

/*
SSWD-WS07
 */

/**
 * Description of Cherry
 *
 * @author johnb
 */
class Cherry extends Fruit{
    public $hasStone;
    public $makesPies;
    
    public function Cherry($cherryType) {
        $this->name = $cherryType . ' cherry';
        $this->hasStone=TRUE;
        $this->makesPies=TRUE;
    }
}
