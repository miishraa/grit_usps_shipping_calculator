<script>
function processClickUPS(){
var v1=document.getElementById('zip_code').value;
var v2=document.getElementById('weight').value;
var v3=document.getElementById('action').value;
if(jQuery(v1).val() != '')

{

//var form_data = jQuery(this).serialize();

jQuery('#loadingp').show();
jQuery.ajax({ url:"/wp-admin/admin-ajax.php",type:"POST",datatype:JSON, data:{zip_code:v1,weight:v2,action:v3},success:function(data)

{
//jQuery('#shipping_methods')[0].reset();
jQuery("#shipping_results").html(data);
},

complete: function(){
        jQuery('#loadingp').hide();
      },

});
}

else

{
alert("Add Zip Code ");
}
}
</script>