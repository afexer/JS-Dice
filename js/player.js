var Player = function(name){
    this.name = name;
    this.keep = [];
    this.roundScore = 0;
    this.totalScore = 0;
    this.tmpScore = 0;

    this.clearLastRound = function () {
        this.totalScore = this.totalScore + this.roundScore;
        this.roundScore = 0;
        this.keep = [];
    };

    this.takeTurn = function (dice, pid, round){
        let beginCnt = dice.length;
        let endCnt = beginCnt;
        let rollAgain = [];
        let pNum = pid+1;
        let pElement = "#player_"+pNum+" .r"+round;
        for(let d = 0; d < dice.length; d++){
            let die = dice[d];
            $(pElement).append(die.getImage());

            if(die.value == 4){
                this.setTmpScore(die);
                this.keep.push(die);
                endCnt = endCnt-1;
            }else{
                rollAgain.push(die);
            }
        }
        if(beginCnt == endCnt && beginCnt != 0){
            rollAgain = this.keepLowest(rollAgain);
        }
        $(pElement).append("<span class='roll-score'>"+this.tmpScore+"</span><br/>");
        this.clearTmpScore();
        return rollAgain;
    };

    this.showScore = function (pid, round){
        this.roundScore = 0;
        let pNum = pid+1;
        let pElement = "#player_"+pNum+" .r"+round;
        for(let k = 0; k < this.keep.length; k++){
            let dice = this.keep[k];
            if(dice.value != 4){
                this.roundScore = this.roundScore + dice.value;
            }
        }
        $(pElement).append("<span class='roll-score'>Total: "+this.roundScore+"</span>");
        $(".info .game-info").append("<div>"+this.name+"'s Score is: <b>"+this.roundScore+"</b></div>");
        return this.roundScore;
    };

    this.keepLowest = function (dice){
        let lowest = 6;
        let id = 0;
        for(let d = 0; d < dice.length; d++){
            let val = dice[d].value;
            if(lowest > val){
                lowest = val;
                id = d;
            }
        }
        this.setTmpScore(dice[id]);
        this.keep.push(dice[id]);
        let removed = dice.splice(id,1);
        return dice;
    };

    this.setTmpScore = function(dice){
        if(dice.value != 4){
            this.tmpScore = this.tmpScore + dice.value;
        }
    };

    this.clearTmpScore = function(){
        this.tmpScore = 0;
    };

    this.getScore = function (){
        return this.roundScore;
    };
};