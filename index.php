<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dice Game</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="wrapper">
        <div class="header">

        </div>
        <div class="game">
            <div class="container-fluid">
                <div class="header row">
                    <div class=" col-sm-2" >Players</div>
                    <div class=" col-sm-2" >Round 1</div>
                    <div class=" col-sm-2" >Round 2</div>
                    <div class=" col-sm-2" >Round 3</div>
                    <div class=" col-sm-2" >Round 4</div>
                    <div class=" col-sm-2" >Score</div>
                </div>
                <div id="player_1" class="player row">
                    <div class="player col-sm-2" >&nbsp;</div>
                    <div class="round r1 col-sm-2" >&nbsp;</div>
                    <div class="round r2 col-sm-2" >&nbsp;</div>
                    <div class="round r3 col-sm-2" >&nbsp;</div>
                    <div class="round r4 col-sm-2" >&nbsp;</div>
                    <div class="score col-sm-2" >&nbsp;</div>
                </div>
                <div id="player_2" class="player row">
                    <div class="player col-sm-2" >&nbsp;</div>
                    <div class="round r1 col-sm-2" >&nbsp;</div>
                    <div class="round r2 col-sm-2" >&nbsp;</div>
                    <div class="round r3 col-sm-2" >&nbsp;</div>
                    <div class="round r4 col-sm-2" >&nbsp;</div>
                    <div class="score col-sm-2" >&nbsp;</div>
                </div>
                <div id="player_3" class="player row">
                    <div class="player col-sm-2" >&nbsp;</div>
                    <div class="round r1 col-sm-2" >&nbsp;</div>
                    <div class="round r2 col-sm-2" >&nbsp;</div>
                    <div class="round r3 col-sm-2" >&nbsp;</div>
                    <div class="round r4 col-sm-2" >&nbsp;</div>
                    <div class="score col-sm-2" >&nbsp;</div>
                </div>
                <div id="player_4" class="player row">
                    <div class="player col-sm-2" >&nbsp;</div>
                    <div class="round r1 col-sm-2" >&nbsp;</div>
                    <div class="round r2 col-sm-2" >&nbsp;</div>
                    <div class="round r3 col-sm-2" >&nbsp;</div>
                    <div class="round r4 col-sm-2" >&nbsp;</div>
                    <div class="score col-sm-2" >&nbsp;</div>
                </div>
                <div class="info row">
                    <div class="game-info col-sm-12" >
                        <h3>Game Info:</h3>
                    </div>
                </div>
                <div class="controls row">
                    <div class="player col-sm-12" >
                        <button id="start_game" type="button" class="btn btn-primary">Start Game</button>
                        <button style="display:none;" id="new_game" type="button" class="btn btn-primary">New Game</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="winner_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Winner!!!</h5>
                    <button type="button" class="close-modal close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body winner">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-modal btn btn-secondary" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/dice.js"></script>
    <script src="js/player.js"></script>
    <script src="js/round.js"></script>
    <script src="js/game.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
