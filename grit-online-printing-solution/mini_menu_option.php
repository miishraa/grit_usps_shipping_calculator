<form method="post" action="options.php" class='form-group'>



	<?php wp_nonce_field('update-options') ?>



<p><h1 class='title'>Mini Menus | 100 lb. Gloss Book (C2S) with Aqueous Coating</h1>


<div class='table-responsive'>

<table class='table table-striped'>

<tr style='text-align:center'>

<td width="100%">Size</td><td width="100%">Color</td><td>100</td><td>250</td><td>500</td><td>1,000</td><td>2,500</td><td>5,000</td><td>10,000</td><td>15,000</td><td>20,000</td>

</tr>
<tr>
<td>4" x 10"</td><td>Full Color Front, No Back</td><td><input type="text" name="minim_size_1_color_1_cost_1"  value="<?php echo get_option('minim_size_1_color_1_cost_1'); ?>" /></td><td><input type="text" name="minim_size_1_color_1_cost_2"  value="<?php echo get_option('minim_size_1_color_1_cost_2'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_3"  value="<?php echo get_option('minim_size_1_color_1_cost_3'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_4"  value="<?php echo get_option('minim_size_1_color_1_cost_4'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_5"  value="<?php echo get_option('minim_size_1_color_1_cost_5'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_6"  value="<?php echo get_option('minim_size_1_color_1_cost_6'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_7"  value="<?php echo get_option('minim_size_1_color_1_cost_7'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_8"  value="<?php echo get_option('minim_size_1_color_1_cost_8'); ?>"/></td><td><input type="text" name="minim_size_1_color_1_cost_9"  value="<?php echo get_option('minim_size_1_color_1_cost_9'); ?>"/></td>

</tr>


</table>
<p><input type="submit" name="Submit" value="Update" /></p>

	<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="minim_size_1_color_1_cost_1,minim_size_1_color_1_cost_2,minim_size_1_color_1_cost_3,minim_size_1_color_1_cost_4,minim_size_1_color_1_cost_5,minim_size_1_color_1_cost_6,minim_size_1_color_1_cost_7,minim_size_1_color_1_cost_8,minim_size_1_color_1_cost_9">
</div>
</form>