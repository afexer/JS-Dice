<?php
/**
 * Game.php
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
use DiceGame\Round;

class Game {
    private $maxPlayers = 4;
    private $totalRounds = 4;
    private $currentRound = 0;
    private $firstPlayer = 0;
    private $players = array();
    private $rounds = array();

    public function __construct() {
        $this->initPlayers();
    }

    private function initPlayers(){
        for($p = 1; $p <= $this->maxPlayers; $p++){
            $this->players[] = new Player("Player".$p);
        }
    }

    public function playGame(){
        for($r = 1; $r <= $this->totalRounds; $r++){
            $this->currentRound = $r;
            if($this->currentRound == 1){
                $this->firstPlayer = rand(0,3);
            }else{
                if($this->firstPlayer + 1 > 3){
                    $this->firstPlayer = 0;
                }else{
                    $this->firstPlayer += 1;
                }
            }
            echo "<h2>Round ".$r."</h2>";
            echo "<h3>First Player: ".$this->players[$this->firstPlayer]->getName()."</h3>";
            $this->displayPlayers();
            $round = new Round($this->players, $this->firstPlayer);
            $round->startRound();
            $this->rounds[] = $round;
        }
    }

    public function displayPlayers(){
        echo("<h2>Players:</h2>");
        foreach($this->players AS $player){
            echo($player->getName()."<br/>");
        }
    }
}