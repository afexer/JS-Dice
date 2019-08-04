<?php
/**
 * config.php
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
include_once "Game.php";
include_once "Player.php";
include_once "Dice.php";
include_once "Round.php";
include_once "Roller.php";

function dpr($val){
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

function dpre($val){
    dpr($val);
    exit();
}