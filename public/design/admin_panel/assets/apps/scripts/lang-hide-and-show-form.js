$(document).ready(function () {

        if ($("#btnlang").val() !== "ar") {
            $("#post_ar").hide();
            $("#hideshowpostform").click(function () {
            $("#post_ar").slideToggle('slow');
            });
        } else {
            $("#post_en").hide();
            $("#hideshowpostform").click(function () {
                $("#post_en").slideToggle('slow');
            });
        } 
         

});
$(document).ready(function () {

         if ($("#btnlang").val() !== "ar") {
            $("#product_ar").hide();
            $("#hideshowpostform").click(function () {
            $("#product_ar").slideToggle('slow');
            });
        } else {
            $("#product_en").hide();
            $("#hideshowpostform").click(function () {
                $("#product_en").slideToggle('slow');
            });
        }

});
