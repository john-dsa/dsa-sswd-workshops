<?php
/*
  SSWD Worskshops the Dice Game
  - description:
  it's the Dice guessing program - 1 dice throw vs. 3 user guesses
 Rev.1
  Date 14.07.2018 Author John Botha
  Adapted by original work from Agnieszka Pas https://github.com/agapas/mini-dice-game.git
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>TE20_C_FSD Workshop 12 - mySQL Databases III | the Dice Game </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div id="container">	
            <header>
                <?php
                // create array of image pointers
                $logoSrcArray = array("images/roll1.jpg", "images/roll2.jpg", "images/roll3.jpg");

                // variable assigned out of randomised image form the array above 
                $castImgSrc1 = $logoSrcArray[rand(0, sizeOf($logoSrcArray) - 1)];  // image1
                $castImgSrc2 = $logoSrcArray[rand(0, sizeOf($logoSrcArray) - 1)];  // image1
                // add the style to casted images
                $img1 = "<img class='headerImg' src=" . $castImgSrc1 . " alt='logo1' >"; //assign the html code to a var to create an image1
                $img2 = "<img class='headerImg' src=" . $castImgSrc2 . " alt='logo2' >"; //assign the html code to a var to create an image2

                // add images variable into heading
                echo "<h1>" . $img1 . " Welcome to the Dice guessing game " . $img2 . "</h1>";
                ?>
            </header>
            <!--The form to send the data back into index -->
            <form action="index.php" method="POST"> 
                <input type="submit" name="guess" id="guessBtn" value="Make a guess">
            </form>


<?php
//start running the php, call the classes
include ('NumberGenerator.Class.php'); //to gues a random number 1 to 6
include ('Dice.Class.php'); // to throw the dice
include ('Game.Class.php');      // bit of a god class. will play the game.
                       //instantiate a dice object,
                            //action the dice object throwDice method   
                            //assign a diceValue from the dice object getFaceValue method, after the throwDice
                            //
    
include ('MyDB.Class.php');

/*
  // OR instead of lines above:
  function __autoload($class_name) {	// it's a good practice for complex apps
  require "./".$class_name.".Class.php";
  }
 */

// start the game
if (isset($_POST['guess'])) {
    echo "<h3>Thanks for the guesses, lets see the result...<br/></h3>";
    $myGame = new Game(); //object from the game include above
    $myGame->play();        //object play method is executed. it will also 
}

// reset the score table (delete all records in 'correct_guesses' table)
echo "<br><form action='index.php' method='POST'>
					<input type='submit' name='resetTable' id='resetBtn' value='Reset All Scores & Start New Game'>
				</form>";

if (isset($_POST['resetTable'])) {
    $db = new MyDB("localhost", "root", "", "my_db");
    $db->resetScores();
}
?>
        </div>
        <footer >TE20_C_FSD, Workshop 12 | Made by @ Agnieszka Pas, 2015</footer>
    </body>
</html>