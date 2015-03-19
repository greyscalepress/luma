<?php

// START formulaire
		
		 ?>
   <div class="area-formulaire clear">
   
    <p id="call-to-action" class="button call-to-action">Ajouter des infos</p>
   <script>
		jQuery( document ).ready( function( $ ) {	
		
			$( "#call-to-action" ).click(function() {
					$( "#bloc-formulaire" ).show( "slow", function() {
					 // Animation complete.
					 frmMapInitialize();
				 });
			});
		
		}); // end document ready
	</script>
	
	 <?php 
		
		echo "<div id='bloc-formulaire' class='bloc-formulaire hidden'>";
		
		echo FrmFormsController::show_form(12, $key = '', $title=true, $description=true);
		
		echo "</div></div>";		
	
// FIN Formulaire