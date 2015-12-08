
/* affiche le texte d'aide quand on clique sur un réponse, quelle qu'elle soit*/
$(document).ready(function(){
		$( ".question input[type=radio]" ).click(function() {
				$(".help").slideDown();
		});
});


/* Afficher l'image bon ou pas bon du radio button cliqué */

$(document).ready(function(){
		$( ".question input[type=radio]" ).click(function() {
				$(".reply_sign").hide();
				$(this).next(".reply_sign").show();
				/*alert('test');*/
		});
});
