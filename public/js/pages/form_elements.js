'use strict';
$(document).ready(function () {
    // Chosen
    $(".hide_search").chosen({disable_search_threshold: 10});
    $(".chzn-select").chosen({allow_single_deselect: true});
    $(".chzn-select-deselect,#select2_sample").chosen();
    // End of chosen

    // Input mask
    $("#phones").inputmask();
    $("#product").inputmask("a*-999-a999");
    $("#percent").inputmask("99%");
    $("#phone33").inputmask("+33 999 999 999");
   // End of input mask

    //tags input
    $('#tags').tagsInput();

Admire.formGeneral() ;
});
