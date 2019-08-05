let Dice = function(){

    this.value = 0;
    this.valueNames = ["one","two","three","four","five","six"];

    this.rollDice = function(){
        return this.value = this.rand(1,6);
    };

    this.getImage = function(){
        let dieFace = this.rand(1,4);
        let name = this.valueNames[this.value-1];
        return '<img src="img/'+name+"."+dieFace+'@4x.png" width="15"/>';
    };

    this.rand = function(min,max){
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    this.rollDice();
};