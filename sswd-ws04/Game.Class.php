<?php

/*
  Game.Class
  SSWD Worskshops the Dice Game
  - description:
  it's the Dice guessing program - 1 dice throw vs. 3 user guesses
  - class data:
  $diceValue;		// current value of dice
  $guessesArray;		// array of all guesses in current round
  $winCount;		// count of win guesses in current round
  - class methods:
  play()			// starts the game
  guessHandler()		// makes guesses & displays the result
  saveScores()		// saves score of the game to database & displays it as the score table
  showDiceImage($dots)		// shows image for each dots, where $dots parameter is a value of the dice or of the guess
  getWinGuessInfo($index)	// returns info about win guesses, where $index parameter is guess index within $guessesArray
  getEndMessage()		// returns final win/lose message

 Rev.1
  Date 14.07.2018 Author John Botha
  Adapted by original work from Agnieszka Pas https://github.com/agapas/mini-dice-game.git
 */
class Game {
    // variables
    private $diceValue; //will contain the current dice value from returned form the dice throw
    private $guessesArray; //array that will contain the 3 guesses. this will get assigned as a fixed value
    private $winCount; //will contain how many of the 3 guesses was correct out of the current game.

    public function play() {                   //public so can be executed external
        $dice = new Dice();                 // create dice object
        $dice->throwDice();                  // make the dice object throw
        $this->diceValue = $dice->getFaceValue();  // get the result of the throw & assign it to $diceValue

        echo "The value of the dice: <br/>";
        $this->showDiceImage($this->diceValue);    // show value of throw as an image. 
                                      //NOTE NO VAR INSTANTIATED!!! 

        $this->guessesArray = new SplFixedArray(3);  // create array with length initially equals to 3
        $this->winCount = 0;        //set wincount to keep track of wins in the game
        $this->guessHandler();        //calls mecthod below. will create object 
                              //for guess generated out of method created 
                              //from numbergenerator. run 3 times
        $this->saveScores();         //call savescore method below
    }

    public function guessHandler() {
        $guess = new NumberGenerator();   // instantiate object - instance of the NumberGenerator class
        echo "<br><br>And your guesses in this round: <br/>";
        $winString = ""; // to collect the win info messages

        for ($i = 0; $i < 3; $i++) {  // make 3 guesses
            $currentGuess = $guess->makeAGuess(); //assign a var the guess object MakeAGuess method
            $this->showDiceImage($currentGuess); // show the guess as dice image, from method call below
            echo " "; //create a space between the dice images
            $this->guessesArray[$i] = $currentGuess; // add current guess to guesses array
            if ($this->diceValue == $currentGuess) {   // if win hooray!
                $winString .= $this->getWinGuessInfo($i); // whatever winstring contained, concatenate guessinfo 
                $this->winCount++;       // autoincriment wincount with the win
            }
        }

        // display statistics
        if ($this->winCount > 0) { //ie if any of the guesses and dice throws matched, this would not be 0
            echo "<br>" . $winString; //concatenate html with var
        } else {    // so no matches happened in the 3 dice throw rounds
            echo "<br><br>All your guesses were wrong.";
        }

        // display the game result
        echo "<p style='color:#CC0000'><font size='5'><strong>" . $this->getEndMessage() . "</strong></font></p>";
    }

    public function saveScores() {
        // save score of the game
        $db = new MyDB("localhost", "root", "", "my_db");
        if ($this->winCount > 0) {
            $db->saveToDb($this->diceValue, $this->winCount);
            echo "<p>Your guess was added to the Score Table</p>";
        }

        $db->getTable();
    }

    public function showDiceImage($dots) { //this method will display an image based on the guess value.
        switch ($dots) {
            case 1:
                echo "<img class='dotsImg' src='images/d1.png'>";
                break;
            case 2:
                echo "<img class='dotsImg' src='images/d2.png'>";
                break;
            case 3:
                echo "<img class='dotsImg' src='images/d3.png'>";
                break;
            case 4:
                echo "<img class='dotsImg' src='images/d4.png'>";
                break;
            case 5:
                echo "<img class='dotsImg' src='images/d5.png'>";
                break;
            case 6:
                echo "<img class='dotsImg' src='images/d6.png'>";
                break;
            default:
                break;
        }
    }

    public function getWinGuessInfo($index) {
        $infoString = "";
        switch ($index) {
            case 0:
                $infoString = "<br>Your first guess was correct.";
                break;
            case 1:
                $infoString = "<br>Your second guess was correct.";
                break;
            case 2:
                $infoString = "<br>Your third guess was correct.";
                break;
            default:
                break;
        }
        return $infoString;
    }

    public function getEndMessage() { //function will return if you won any, or a random lost message.
        $endMessage = "";
        switch ($this->winCount) {
            case 1:
                $endMessage = "You win ! 1 time in 3 guesses. Congrats !";
                break;

            case 2:
                $endMessage = "You win ! 2 times in 3 guesses. Well done !!";
                break;

            case 3:
                $endMessage = "You win ! 3 times in 1 round !! You are the best !!!";
                break;

            default:
                $loseParts = array("Press a magic button to try again.", "Keep calm & try again.", "Don't worry, next time you will be better.");
                $castedPart = $loseParts[rand(0, sizeOf($loseParts) - 1)]; // var to contain a random message from above
                $endMessage = "You lost, " . $castedPart;
                break;
        }
        return $endMessage;
    }

}

?>