!function(i){var n,a;a={isDevice:!1,isMinNavActive:!1,isOffCanvasActive:!1,deviceWidth:700,windowWidth:0,$navTrigger:i("span.nav-trigger"),$body:i(document.body),$menuBar:i(".site-nav li"),$menuActive:null,init:function(){var i;return i=this,i.$menuActive=i.$menuBar.find(".active"),i.bindEvents(),this},bindEvents:function(){var n;n=this,i(window).smartresize(function(){return n.windowWidth=i(this).width(),n.checkPanel(),n.windowWidth<=n.deviceWidth?void n.disableAll():void 0}),n.$navTrigger.on("click",function(i){return i.preventDefault(),n.checkPanel(),n.isDevice===!0&&n.isMinNavActive===!1&&n.openOffCanvas(),n.isDevice===!0&&n.isMinNavActive===!1&&n.isOffCanvasActive===!0&&n.closeOffCanvas(),n.isDevice===!1&&n.isMinNavActive===!1&&n.enableNav(),n.isDevice===!1&&n.isMinNavActive===!0&&n.disableNav(),!1}),n.enableDropdown()},checkPanel:function(){var i;i=this,i.isDevice=i.windowWidth<=i.deviceWidth?!0:!1,i.isMinNavActive=i.$body.hasClass("nav-min"),i.isOffCanvasActive=i.$body.hasClass("off-canvas")},disableAll:function(){var i;i=this,i.$body.removeClass().addClass("admin")},enableNav:function(){var i;i=this,i.$body.removeClass("off-canvas").addClass("nav-min"),i.disableDropdown()},disableNav:function(){var i;i=this,i.$body.removeClass("nav-min").addClass("off-canvas"),i.enableDropdown()},openOffCanvas:function(){var i;i=this,i.$body.removeClass("nav-min").addClass("off-canvas")},closeOffCanvas:function(){var i;i=this,i.$body.removeClass().addClass("admin")},disableDropdown:function(){var i;i=this,i.$menuBar.removeClass("active"),i.$menuBar.off("click")},enableDropdown:function(){var n;return n=this,n.$menuBar.on("click",function(){var a;return a=i(this),n.$menuActive.removeClass("active"),a.hasClass("active")===!0?a.removeClass("active").find("ul.sub-nav-list").slideUp("fast"):n.$menuBar.hasClass("active")===!1?a.addClass("active").find("ul.sub-nav-list").slideDown("fast"):(n.$menuBar.removeClass("active").find("ul.sub-nav-list").slideUp("fast"),a.addClass("active").find("ul.sub-nav-list").slideDown("fast"))})}},a.init(),i(".dropdown-toggle").dropdown(),i(".noti-menu").perfectScrollbar({suppressScrollX:!0}),n=i("a"),i.each(n,function(i,n){return n.onmousedown=function(){return this.blur(),!1},n.onclick=function(){this.blur()},/msie/i.test(navigator.userAgent)&&!/opera/i.test(navigator.userAgent)?n.onfocus=function(){this.blur()}:void 0})}(jQuery);

$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);
    
    $btntxt = $(e.relatedTarget).attr('data-btntxt');
    $(this).find('.modal-footer x').text($btntxt);

    $btncan = $(e.relatedTarget).attr('data-btncancel');
    $btnac = $(e.relatedTarget).attr('data-btnaction');

    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});

//Detail product
/*$('#detailProduct').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);
    
    $btntxt = $(e.relatedTarget).attr('data-btntxt');
    $(this).find('.modal-footer x').text($btntxt);

    $btncan = $(e.relatedTarget).attr('data-btncancel');
});*/
$(document).ready(function() {
    $("#fancybox").fancybox();
});
