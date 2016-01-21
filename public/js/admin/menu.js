$(function(){
    //resize the main content area
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });


    //register on show hook method
    $('.second-level').on('show.bs.collapse',function(){
        var currentId = $(this).attr('id');
        $('.second-level').filter(function(){
            return $(this).attr('id') != currentId;
        }).removeClass('in').parent().filter('li').removeClass('active');

        $(this).parent().filter('li').addClass('active');
    });
    $('.second-level').on('hidden.bs.collapse',function(){
        var currentId = $(this).attr('id');
        $('.second-level').filter(function(){
            return $(this).attr('id') != currentId;
        }).removeClass('in').parent().filter('li').removeClass('active');

        $(this).parent().filter('li').addClass('active');
    });
});
