<?php
/**
 * Player.php
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

class Player {
    private $name;
    private $keep;
    private $score;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function takeTurn($dice){
        $beginCnt = count($dice);
        $endCnt = $beginCnt;
        $return = array();
        foreach($dice AS $die){
            echo $die->getImage();
            switch($die->getValue()){
                case 4:
                case 1:
                case 2:
                    $this->keep[] = $die;
                    $endCnt = $endCnt-1;
                    break;
                default:
                    if(count($dice) > 1) {
                        $return[] = $die;
                    }else{
                        $this->keep[] = $die;
                        $endCnt = $endCnt-1;
                    }
            }
        }
        if($beginCnt == $endCnt && $beginCnt != 0){
            $return = $this->keepLowest($return);
        }
        echo "<br/>";
        return $return;
    }

    public function showScore(){
        $this->score = 0;
        foreach($this->keep AS $dice){
            if($dice->getValue() != 4){
                $this->score += $dice->getValue();
            }
        }
        echo "<h3>".$this->name."'s Score is: ".$this->score."</h3>";
        return $this->score;
    }

    public function keepLowest($dice){
        $lowest = 6;
        $id = 0;
        foreach($dice AS $key=>$val){
            if($lowest > $val){
                $lowest = $val;
                $id = $key;
            }
        }
        $this->keep[] = $dice[$id];
        unset($dice[$id]);
        return $dice;
    }

    public function clear(){
        $this->score = null;
        $this->keep = array();
    }

    public function getScore(){
        return $this->score;
    }

}