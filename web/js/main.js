
// $(document).ready(function(){
//     $("#accordion").accordion({
//         collapsible: true
//     });
//     $( "li > h4>  ul" ).accordion({
//         event: "mouseover"
//     });
// });

// var dbclick = $( 'li > ul' ).dblclick( function () {
//     return false;
// } );


$('#accordion_menu').dcAccordion({
    // eventType: 'hover',
    // autoClose: true,

    disableLink: false,// Родительская категория кликабельна
    // showCount: true, // количество
});

$('#accordion_menu_reports').dcAccordion({
    collapsible: true,
    disableLink: true,// Родительская категория не кликабельна
    // showCount: true, // количество
});




