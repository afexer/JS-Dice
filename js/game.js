let Game = function(){
    this.maxPlayers = 4;
    this.totalRounds = 4;
    this.currentRound = 0;
    this.firstPlayer = 0;
    this.players = [];
    this.rounds = [];


    this.initPlayers = function(){
        for(let p = 1; p <= this.maxPlayers; p++){
            this.players.push(new Player("Player"+p));
        }
        this.displayPlayers();
    };

    this.playGame = function(){
        for(let r = 1; r <= this.totalRounds; r++){
            this.currentRound = r;
            if(this.currentRound == 1){
                this.firstPlayer = this.rand(0,3);
            }else{
                if(this.firstPlayer + 1 > 3){
                    this.firstPlayer = 0;
                }else{
                    this.firstPlayer += 1;
                }
            }
            $(".info .game-info").append("<br/><div><b>Start Round "+r+"</b></div>");
            $(".info .game-info").append("<div>First Player: <b>"+this.players[this.firstPlayer].name+"</b></div>");

            let round = new Round(this.players, this.firstPlayer, r);
            round.startRound();
            this.rounds.push(round);
        }
        this.displayWinner();
    };

    this.displayWinner = function(){
        let bestScore = 120;
        let winner = 0;
        $(".info .game-info").append("<br/><div><b>Player Final Scores:</b></div>");

        for(let p = 0; p < this.players.length; p++){
            this.players[p].clearLastRound();
            let pid = p+1;
            let pElement = "#player_"+pid+" .score";
            $(pElement).append("<h1>"+this.players[p].totalScore+"</h1>");
            $(".info .game-info").append("<br/><div><b>"+this.players[p].name+" with the lowest score of "+this.players[p].totalScore+"</b></div>");
            if(this.players[p].totalScore < bestScore){
                bestScore = this.players[p].totalScore;
                winner = p;
            }
        }
        $("#winner_modal .winner p").html("<div>"+this.players[winner].name+" WINS with the lowest score of "+this.players[winner].totalScore+"</div>");
        $(".info .game-info").append("<br/><H1>!!!! The Winner Is: "+this.players[winner].name+" with a score of "+this.players[winner].totalScore+"!!!!!!</H1>");
        $("#winner_modal").show();

    };

    this.newGame = function(){
        $(".player .player").html("&nbsp;");
        $(".player .round").html("&nbsp;");
        $(".player .score").html("&nbsp;");
        $(".info .game-info").html("<h3>Game Info:</h3>");
        this.firstPlayer = 0;
        this.players = [];
        this.rounds = [];

        this.initPlayers();
    };

    this.displayPlayers = function(){
        for(let p = 0; p < this.players.length; p++){
            let player = this.players[p];
            let pid = p+1;
            $("#player_"+pid+" .player").html('<img src="img/avatar_'+pid+'@4x.png" width="50"/> <span>'+player.name+'</span>');
        }
    };

    this.rand = function(min,max){
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    this.initPlayers();
};

let game = new Game();