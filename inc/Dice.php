<?php
/**
 * Dice.php
 *
 * Description: Represents a single die
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

class Dice {
    private $value;
    private $valueNames = array("one","two","three","four","five","six");

    public function __construct() {
        $this->rollDice();
    }

    public function rollDice(){
        return $this->value = rand(1,6);
    }

    public function getValue(){
        return $this->value;
    }

    public function getImage(){
        $dieFace = rand(1,4);
        $name = $this->valueNames[$this->value-1];
        return '<img src="img/'.$name.".".$dieFace.'@4x.png" width="50"/>';
    }
}