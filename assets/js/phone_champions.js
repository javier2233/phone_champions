$(document).ready(function (){
   $(".select_brand").change(function (){
       var brand_dv = $(this).parent(".brand_dv");
       $(brand_dv).children(".model_dv").fadeIn();
   })
});