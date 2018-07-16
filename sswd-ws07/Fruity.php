<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main page for the class extentions</title>
    </head>
    <body>
        <?php
        include ('Fruit.Class.php');
        include ('Cherry.class.php');
        include ('Apple.class.php');
        $snack=new Cherry('wild');
        $snack->wash();
        $snack->wash();
        if ($snack->clean) {
            echo 'You get a nice clean ' . $snack->name . ' for lunch.';
            echo 'The ' . $snack->name . ' has been washed ' . $snack->washed . ' times.</br>';
        }
        $stillHungry=new Apple('Granny Smith');
        $stillHungry->wash();
        if ($stillHungry->clean) {
            echo 'The ' . $stillHungry->name . ' has been washed ' . $stillHungry->washed . ' times.</br>';
        }
        ?>
    </body>
</html>
