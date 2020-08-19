$(document).ready(function (){
   $(".select_brand").change(function (){
      var brand_dv = $(this).parent(".brand_dv")[0];
      console.log(brand_dv);
      $(brand_dv).next(".model_dv").fadeIn();
      $(brand_dv).next(".numeric_dv").fadeIn();

   })
});