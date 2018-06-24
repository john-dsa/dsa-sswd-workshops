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
        <form action='index.php' method='GET'>
            <fieldset>
                <legend>Dice Guess Input</legend>
                <br>
                <br>
                <label>Guess 1: <input type='number' name='guess1' /></label>
                <label>Guess 2: <input type='number' name='guess2' /></label>
                <label>Guess 2: <input type='text' name='guess3' /></label>
                <br>
                <br>
                <input type='submit' value='Submit Information' />
                <br>
                <br>
            </fieldset>
        </form>
        <?php
        //main code block
        printf($guess1); echo "<br/>";
        printf($guess2); echo "<br/>";
        printf($guess3); echo "<br/>";
        require_once 'Dice.class.php';
        require_once 'NumberGenerator.class.php';
        $dice = new Dice();
        //load 3 guesses from user. at the moment pulling all 3 at the same tiem from the querystring..
        $guess1 = $_GET['guess1'];
        $guess2 = $_GET['guess2'];
        $guess3 = $_GET['guess3'];
        
        print "Welcome to the Dice guessing program. Thanks for your guesses, lets see how you did .. <br/>";
        
        //object gues create
        $guess = new NumberGenerator();
        echo '<pre>', print_r(($guess),'true'), '</pre>'; //debug assist
        
        $dice ->throwDice();
        
        switch ($dice->getFacevalue()){
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
            echo "Sorry, you didn't make any correct guesses! The correct value was " . $dice -> getFacevalue();
        }
        ?>
    </body>
</html>
