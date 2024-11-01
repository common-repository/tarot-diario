<?php
/**
 * @package Tarotcarta
 * @version 1.0
 */
/*
Plugin Name: Tarot diario
Plugin URI: http://unitarot.com
Description: Reciba una carta de tarot en su panel de administrador.
Author: Marta Dannozo
Version: 1.0
Author URI: http://unitarot.com
*/

function tdp_llamadocarta() {
	/** Texto de las diferentes cartas */
	$text = "EL LOCO
EL MAGO
LA SACERDOTISA
LA EMPERATRIZ
EL EMPERADOR
EL SUMO SACERDOTE
LOS ENAMORADOS
EL CARRO
LA JUSTICIA
EL ERMITAÑO
RUEDA DE LA FORTUNA
LA FUERZA
EL COLGADO
LA MUERTE
LA TEMPLANZA
EL DIABLO
LA TORRE
LA ESTRELLA
LA LUNA
EL SOL
EL JUICIO
EL MUNDO";

	// Here we split it into lines
	$text = explode( "\n", $text );

	// And then randomly choose a line
	return wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function tdp_tiradacarta() {
	$chosen = tdp_llamadocarta();
	echo "<p id='lek'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'tdp_tiradacarta' );

// We need some CSS to position the paragraph
function tdp_css() {
	
	echo "
	<style type='text/css'>
	#lek {
		float: right;
		padding-left: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'tdp_css' );

?>
