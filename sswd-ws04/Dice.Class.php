<?php

/*
  SSWD Worskshops the Dice Game
  - description:
  it's the Dice guessing program - 1 dice throw vs. 3 user guesses

  - description:
  the program generates a number to guess for the Game.Class.php usage

  - class data:
  NUMBER_OF_SIDES		// number of sides of the dice
  $faceValue			// current value of the dice

  - class methods:
  throwDice()			// $faceValue setter
  getFaceValue()		// $faceValue getter


Rev.1
  Date 14.07.2018 Author John Botha
  Adapted by original work from Agnieszka Pas https://github.com/agapas/mini-dice-game.git
 */

class Dice {

    const NUMBER_OF_SIDES = 6;

    private $faceValue;

    public function throwDice() {
        $this->faceValue = rand(1, self::NUMBER_OF_SIDES); // 1 & NUMBER_OF_SIDES are inclusive values
    }

    public function getFaceValue() {
        return $this->faceValue;
    }

}

?>