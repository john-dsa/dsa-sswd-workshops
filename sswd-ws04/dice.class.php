
        <?php

        /**
         * Will throw the dice and set face value
         * @author johannes.botha@digitalskillsacademy.me
         */
        class Dice {

            private $faceValue;

            public function throwDice() {
                $this->faceValue = rand(1, 6);
            }

            public function getFaceValue() {
                return $this->faceValue;
            }

        }

        ?>
