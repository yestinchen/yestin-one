<?php
/** 
 * Adding options page under Appearance menu 
 */
function iconic_one_options_theme_menu() {  
  
add_theme_page( 'Yestin One Theme', 'Yestin One Theme', 'edit_theme_options', 'iconic_one_theme_options', 'iconic_one_options_display');  
  
} 
add_action( 'admin_menu', 'iconic_one_options_theme_menu' ); 

/** 
 * Adding customizer link under Appearance menu
 */ 
function iconic_one_customize_button() {
    $theme_page = add_theme_page(
        __( 'Yestin One' , 'themonic' ),
        __( 'Customize Yestin One' , 'themonic' ),  
        'edit_theme_options' ,       
        'customize.php'            
    );
} 
add_action('admin_menu', 'iconic_one_customize_button');

/** 
 * Show Yestin One Options 
 */ 
function iconic_one_options_display() { 
?> 
<!-- Create a header in the default WordPress 'wrap' container --> 
<div class="wrap"style='border:1px solid #e1e1e1; padding:20px;min-width:750px; max-width:960px;'> 
	<div class="header" style="margin-bottom:10px;">   
       <div class="hleft" style="float:left;width:50%;">
			<h2>Yestin One Theme Options</h2>
		</div>
	</div>
</div><!-- /.wrap --> 
<?php 
} // end iconic_one_options_display 
