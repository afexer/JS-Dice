<?php
/**
 * Round.php
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

use DiceGame\Player;
use DiceGame\Dice;

class Round {
    private $maxPlayers = 4;
    private $players = array();
    private $player;
    private $totalDice = 5;
    private $dice = array();

    public function __construct($players, $first) {
        $this->players = $players;
        $this->player = $first;
        $this->initDice();
        $this->initPlayers();
    }

    private function initDice(){
        for($d = 1; $d <= $this->totalDice; $d++){
            $dice = new Dice();
            $this->dice[] = $dice;
        }
    }

    private function initPlayers(){
        for($i = 0; $i < count($this->players);$i++){
            $this->players[$i]->clear();
        }
    }

    private function getNextPlayer(){
        if($this->player + 1 > 3){
            $this->player = 0;
        }else{
            $this->player += 1;
        }
        return $this->player;
    }

    public function startRound(){
        for($p = 1; $p <= $this->maxPlayers; $p++){
            $player = $this->players[$this->player];
            $dice = $this->rollDice($this->dice);
            echo "<h3>".$player->getName()."'s Roll</h3>";
            do{
                $dice = $player->takeTurn($dice);
                $dice = $this->rollDice($dice);
            }while(count($dice) > 0);
            $player->showScore();
            $this->getNextPlayer();
        }
        $this->displayWinner();
    }

    private function rollDice($dice){
        $tmpDice = array();
        foreach($dice AS $d=>$die){
            $die->rollDice();
            $tmpDice[] = $die;
        }
        return $tmpDice;
    }

    private function displayWinner(){
        $lowScore = 30;
        $id = 0;
        $name = "";
        foreach($this->players AS $pid=>$player) {
            if($player->getScore() < $lowScore){
                $lowScore = $player->getScore();
                $id = $pid;
                $name = $player->getName();
            }
        }
        echo "<h2>The WINNER of this Round is ".$name.", with a score of ".$lowScore."!!!!</h2>";
    }
}