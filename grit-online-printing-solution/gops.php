<?php
/*
Plugin Name: GRIT Online Print Solution
Version: 1.0
Author: Mrityunjay & Nate Koester
Author URI: https://grittechnologies.com/
Plugin URI: https://grittechnologies.com/
Description: A plugin for online printing order
*/
?>
<?php
// Define 
if ( !defined( 'GRIT_Theme_Options' ) )
	define( 'GRIT_Theme_Options', dirname( __FILE__ ) . '/' );

if ( !defined( 'GRIT_Theme_Options_URL' ) )
	define( 'GRIT_Theme_Options_URL', trailingslashit( plugins_url( '' , __FILE__ ) ) );
// Add admin assets
add_action( 'admin_enqueue_scripts', 'GRIT_Theme_Options_add_assets' );
function GRIT_Theme_Options_add_assets(){
	//CSS
	 wp_enqueue_style( 'GRIT_Theme_Options-style',  plugins_url( '/css/custom-style.css', __FILE__ ), array(), '20120208', 'all' );
	wp_enqueue_style( 'GRIT_Theme_Options-style_boot',  plugins_url( '/css/bootstrap.min.css',__FILE__ ));
	//JS
	wp_enqueue_script('jquery');
	//wp_enqueue_script( 'GRIT_Theme_Options_jquery', plugins_url( '/js/jquery.min.js', __FILE__ ) );

	wp_enqueue_script( 'GRIT_Theme_Options_boot_jquery',  plugins_url('/js/bootstrap.min.js', __FILE__ ));
}
add_action('admin_menu', 'add_GRIT_Theme_Options_interface');

function add_GRIT_Theme_Options_interface() {

	

	// to show theme options in appearance menu use following

	add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'editglobalcustomfields');

}

function editglobalcustomfields() {
?>

<div class="container">

<div><h3>Fill the price in appropriate fields</h3></div>
<ul class="nav nav-pills nav-stacked col-md-2">
  <li class="active"><a href="#tab_a" data-toggle="pill">Booklet/Catalog</a></li>
  <li><a href="#tab_order" data-toggle="pill">Order Email</a></li>
  <li><a href="#tab_b" data-toggle="pill">Bookmarks</a></li>
  <li><a href="#tab_c" data-toggle="pill">Business Cards</a></li>
  <li><a href="#tab_bro" data-toggle="pill">Brochures</a></li>
  <li><a href="#tab_d" data-toggle="pill">Calanders</a></li>
   <li><a href="#tab_cdp" data-toggle="pill">CD Packages</a></li>
    <li><a href="#tab_ccard" data-toggle="pill">Collector Cards</a></li>
	<li><a href="#tab_cflyers" data-toggle="pill">CLUB FLYERS</a></li>
	 <li><a href="#tab_dvdpkg" data-toggle="pill">DVD package</a></li>
	 <li><a href="#tab_doorh" data-toggle="pill">Door Hangers</a></li>
	 <li><a href="#tab_envp" data-toggle="pill">Envelope</a></li>
	  <li><a href="#tab_event" data-toggle="pill">Event Tickets</a></li>
	   <li><a href="#tab_flyrs" data-toggle="pill">Flyers</a></li>
	   <li><a href="#tab_fold" data-toggle="pill">Folders</a></li>
	   <li><a href="#tab_foldbcard" data-toggle="pill">Folded Biz Cards</a></li>
	   <li><a href="#tab_greeting_card" data-toggle="pill">Greeting Cards</a></li>
	   <li><a href="#tab_letterh" data-toggle="pill">Letterheads</a></li>
	    <li><a href="#tab_minim" data-toggle="pill">Mini Menu</a></li>
		 <li><a href="#tab_notep" data-toggle="pill">Notepads</a></li>
		  <li><a href="#tab_postcard" data-toggle="pill">Postcards</a></li>
		   <li><a href="#tab_posters" data-toggle="pill">Posters</a></li>
		  <li><a href="#tab_rackc" data-toggle="pill">Rack Card</a></li>
		   <li><a href="#tab_ripbc" data-toggle="pill">RIP Business Cards</a></li>
		     <li><a href="#tab_roloc" data-toggle="pill">Rolodex Cards</a></li>
		    <li><a href="#tab_sticker" data-toggle="pill">STICKERS</a></li>
			<li><a href="#tab_scflyers" data-toggle="pill">Staggered Cut Flyers</a></li>
			<li><a href="#tab_sshapes" data-toggle="pill">Special Shapes</a></li>
			<li><a href="#tab_ttents" data-toggle="pill">TABLE TENTS</a></li>
			<li><a href="#tab_aframe" data-toggle="pill">A-Frame Sign</a></li>
			<li><a href="#tab_banner" data-toggle="pill">Banner</a></li>
			<li><a href="#tab_wposters" data-toggle="pill">WIDDE POSTERS</a></li>
			<li><a href="#tab_wclings" data-toggle="pill">WINDOW CLINGS</a></li>
			<li><a href="#tab_wdecals" data-toggle="pill">WINDOW DECALS</a></li>
			<li><a href="#tab_wperfs" data-toggle="pill">WINDOW PERFS</a></li>
			<li><a href="#tab_ysigns" data-toggle="pill">YARD SIGNS</a></li>
</ul>
<div class="tab-content col-md-10">
    
        <div class="tab-pane active" id="tab_a">
             <h4>Booklet/Catalog</h4>
            <p>	<?php include('book_cat_option.php');?></p>
        </div>
        <div class="tab-pane" id="tab_order">
             <h4>Order Email</h4>
            <p>	<form method="post" action="options.php" class='form-group'>
<?php wp_nonce_field('update-options') ?><input type="text" name="order_email"  value="<?php echo get_option('order_email'); ?>" /><input type="submit" name="Submit" value="Update" /></p>

	<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="order_email"></form></p>
        </div>
        <div class="tab-pane" id="tab_b">
             <h4>Bookmarks</h4>
             <p>	<?php include('bookmarks_option.php');?></p>
        </div>
		 <div class="tab-pane" id="tab_bro">
             <h4>Brochures</h4>
             <p>	<?php include('brochures_option.php');?></p>
        </div>
        <div class="tab-pane" id="tab_c">
             <h4>Business Cards</h4>
            <p><?php include('business_cards_option.php');?></p>
        </div>
        <div class="tab-pane" id="tab_d">
             <h4>Calanders</h4>
            <p><?php include('calender_option.php');?></p>
        </div>
		 <div class="tab-pane" id="tab_cdp">
             <h4>CD Packages</h4>
            <p><?php include('cd_packages_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_cflyers">
             <h4>CLUB FLYERS</h4>
            <p><?php include('club_flyers_option.php');?></p>
        </div>
		
		
		 <div class="tab-pane" id="tab_ccard">
             <h4>Collector Cards</h4>
            <p><?php include('collection_cards_option.php');?></p>
        </div>
		 <div class="tab-pane" id="tab_dvdpkg">
             <h4>DVD PACKAGES</h4>
            <p><?php include('dvd_packages_option.php');?></p>
        </div>
		 <div class="tab-pane" id="tab_doorh">
             <h4>DOOR HANGERS</h4>
            <p><?php include('door_hangers_option.php');?></p>
        </div>
		 <div class="tab-pane" id="tab_envp">
             <h4>Envelope</h4>
            <p><?php include('envelope_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_event">
             <h4>Event Tickets</h4>
            <p><?php include('event_tickets_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_flyrs">
             <h4>Flyers</h4>
            <p><?php include('flyers_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_fold">
             <h4>Folders</h4>
            <p><?php include('folder_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_foldbcard">
             <h4>Folded Biz Cards</h4>
            <p><?php include('folded_biz_card_option.php');?></p>
        </div>
		
		<div class="tab-pane" id="tab_greeting_card">
             <h4>Greeting Cards</h4>
            <p><?php include('greeting_card_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_letterh">
             <h4>Letter Heads</h4>
            <p><?php include('letterheads_option.php');?></p>
        </div><div class="tab-pane" id="tab_minim">
             <h4>Mini Menu</h4>
            <p><?php include('mini_menu_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_notep">
             <h4>Notepads</h4>
            <p><?php include('notepad_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_postcard">
             <h4>Postcard</h4>
            <p><?php include('postcards_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_posters">
             <h4>Posters</h4>
            <p><?php include('posters_option.php');?></p>
        </div>	
		<div class="tab-pane" id="tab_rackc">
             <h4>Rack cards</h4>
            <p><?php include('rackcard_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_ripbc">
             <h4>RIP Business Cards</h4>
            <p><?php include('RIP_business_card_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_roloc">
             <h4>Rolodex Cards</h4>
            <p><?php include('rolodex_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_sticker">
             <h4>Stickers</h4>
            <p><?php include('stickers_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_scflyers">
             <h4>Staggered Cut Flyers</h4>
            <p><?php include('staggered_cut_flyers_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_sshapes">
             <h4>SPECIAL SHAPES</h4>
            <p><?php include('special_shapes_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_ttents">
             <h4>TABLE TENTS</h4>
            <p><?php include('table_tents_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_aframe">
             <h4>A-Frame Sign</h4>
            <p><?php include('aframe_signs_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_banner">
             <h4>Banner</h4>
            <p><?php include('banner_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_wposters">
             <h4>WIDE POSTERS</h4>
            <p><?php include('wide_posters_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_wclings">
             <h4>WINDOW CLINGS</h4>
            <p><?php include('window_clings_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_wdecals">
             <h4>WINDOW DECALS</h4>
            <p><?php include('window_decals_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_wperfs">
             <h4>WINDOW PERFS</h4>
            <p><?php include('window_perfs_option.php');?></p>
        </div>
		<div class="tab-pane" id="tab_ysigns">
             <h4>YARD SIGNS</h4>
            <p><?php include('yard_signs_option.php');?></p>
        </div>
</div><!-- tab content -->
</div><!-- end of container -->
<?php
}
