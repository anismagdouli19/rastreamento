$(document).ready(function() {
    // Início - Atualizações de div's automáticas
    setInterval(function(){
        $("#teste").load("mapa.php")
    },60);
    
            
    $( ".linkTeste" )
        .click(function() {
            alert( "Teste Ok" );
        });
});