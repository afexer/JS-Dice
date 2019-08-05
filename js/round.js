let Round = function(players, first, round){
    this.maxPlayers = 4;
    this.players = players;
    this.player = first;
    this.totalDice = 5;
    this.roundNum = round;
    this.dice = [];

    this.initDice = function(){
        for(let d = 1; d <= this.totalDice; d++){
            let dice = new Dice();
            this.dice.push(dice);
        }
    };

    this.initPlayers = function(){
        for(let i = 0; i < this.players.length; i++){
            this.players[i].clearLastRound();
        }
    };

    this.getNextPlayer = function(){
        if((this.player + 1) > 3){
            this.player = 0;
        }else{
            this.player += 1;
        }
        return this.player;
    };

    this.startRound = function(){
        for(let p = 1; p <= this.maxPlayers; p++){
            let player = this.players[this.player];
            player.clearLastRound();
            let dice = this.rollDice(this.dice);
            $(".info .game-info").append("<div>"+player.name+"'s Roll</div>");
            do{
                dice = player.takeTurn(dice, this.player, this.roundNum);
                dice = this.rollDice(dice);
            }while(dice.length > 0);
            player.showScore(this.player, this.roundNum);
            this.getNextPlayer();
        }
        this.displayWinner();
    };

    this.rollDice = function(dice){
        let tmpDice = [];
        console.log(dice);
        for(let d = 0; d < dice.length; d++){
            let die = dice[d];
            die.rollDice();
            tmpDice.push(die);
        }
        return tmpDice;
    };

    this.displayWinner = function(){
        let lowScore = 30;
        let id = 0;
        let name = "";
        for( let p = 0; p < this.players.length; p++){
            player = this.players[p];
            if(player.getScore() < lowScore){
                lowScore =player.getScore();
                id = p;
                name = player.name;
            }
        }
        $(".info .game-info").append("<div><b>The WINNER of Round "+this.roundNum+" is "+name+", with a score of "+lowScore+"!!!!</b></div>");
    };


    this.initDice();
    this.initPlayers();
};