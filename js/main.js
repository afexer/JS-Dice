$("#start_game").click(function(){
    $(this).hide();
    $("#new_game").show();
    game.playGame();
});

$("#new_game").click(function(){
    game.newGame();
    $(this).hide();
    $("#start_game").show();
});

$("button.close-modal").click(function(){
    $("#winner_modal").hide();
});