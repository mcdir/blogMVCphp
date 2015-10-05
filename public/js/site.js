$(function() {
    $('.blog-post-title').editable( config.baseurl + 'home/save', {
        id   : $(this).attr('id'),
        indicator : "<img src=' " + config.baseurl + "img/indicator.gif'>",
        tooltip   : "Click to edit...",
        style  : "inherit",
        height  : 50
    });
});