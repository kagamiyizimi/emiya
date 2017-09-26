$(function () {
    //顶部移入显示细节
    $('.list>ul>li').hover(function () {
        var index=$(this).index();
        $(this).find('.some_li').show()
    },function () {
        var index=$(this).index();
        $(this).find('.some_li').hide()
    });
    $('.login>.cart').hover(function () {
        $(this).find('div').show()
    },function () {
        $(this).find('div').hide()
    })

})
