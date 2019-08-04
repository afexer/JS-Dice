<?php
/**
 * index.php
 *
 * Description:
 *
 * @since       1.0.0
 * @package     FEXERDEV
 *
 * @author      Andrew Fechser <andrew@fexerdev.com>
 * @link        http://www.fexerdev.com
 *
 * @copyright   (c) 2019. Fexer Development LLC
 * @license     FDLv1 - http://www.fexerdev.com/fdlv1/
 */
namespace DiceGame;
include_once("inc/config.php");
use DiceGame\Game;

$game = new Game();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dice Game</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="wrapper">
        <div class="header">

        </div>
        <div class="game">
            <?php $game->playGame();?>
        </div>
    </div>

    <script src="js/dice.js"></script>
    </body>
</html>
