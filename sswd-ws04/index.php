<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DSA-SSD Workshops</title>
    </head>
    <body>
        <form action='dice.class.php' method='POST'>
            <fieldset>
                <legend>Dice Guess Input</legend>
                <br>
                <br>
                <label>Guess 1: <input type='number' name='guess1' /></label>
                <label>Guess 2: <input type='number' name='guess2' /></label>
                <label>Guess 3: <input type='number' name='guess3' /></label>
                <br>
                <br>
                <input type='submit' value='Submit Information' />
                <br>
                <br>
            </fieldset>
        </form>
        <?php

        //main code block
        require_once 'NumberGenerator.class.php';
        require_once 'dice.class.php';
        
        $dice = new Dice();
        echo 'this is the dice: <br>';
        echo '<pre>', print_r(($dice), 'true'), '</pre>'; //debug assist
        //load 3 guesses from user. at the moment pulling all 3 at the same tiem from the querystring..
        $guess = new NumberGenerator();
        echo 'this is the guess: <br>';
        echo '<pre>', print_r(($guess), 'true'), '</pre>'; //debug assist
        //throw the dice to get a dice value back
        $dice->throwDice();
        echo 'here is the post value';
        echo '<pre>', print_r(($_POST), 'true'), '</pre>'; //debug assist
        $guess1 = $_POST['guess1'];
        $guess2 = $_POST['guess2'];
        $guess3 = $_POST['guess3'];
        print "Welcome to the Dice guessing program. Thanks for your guesses, lets see how you did .. <br/>";
       //check dice against the guess
        switch ($dice->getFacevalue()) {
            case $guess1:
                echo "Guess number one was correct!!";
                break;
            case $guess2:
                echo "Guess number two was correct!!";
                break;
            case $guess3:
                echo "Guess number three was correct!!";
                break;
            default :
                echo "Sorry, you didn't make any correct guesses! The correct value was " . $dice->getFacevalue();
        }
 
        ?>
    </body>
</html>

