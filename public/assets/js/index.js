/**
 * Created by WANG NING on 2016/4/24.
 */
$(function () {
    /**
     * input弹层位置
     */
    $('.error').css({
        'left': $('.error').siblings('input').outerWidth()+20,
        'top': -$('.error').siblings('input').outerHeight()+5,

    });
    // 阻止右键菜单
    $('.stopcontextmenu').contextmenu(function(){
        return false;
    });

    /**
     * 轮播图
     * @type {*|jQuery}
     */
    // 当前窗口的宽度
    var win_width = $(window).width();
    var lunbo_index = 0;
    // 设置整个banner图的宽度
    $('.banner_list').width(win_width * $('.banner_list .item').size());
    // 设置单张图片的宽度
    $('.banner_list .item').width(win_width);

    function lunbo_ctr(direction) {
        $('.banner_status span').removeClass('banner_active');
        if (direction == 'next') {
            if (lunbo_index >= $('.banner_list .item').size()) {
                $(".banner_list").css('left', 0);
                lunbo_index = 0;
            }
            $('.banner_status span').eq(lunbo_index).addClass('banner_active');
            $(".banner_list").animate({left: -lunbo_index * win_width});
            lunbo_index++;
        } else {
            if (lunbo_index < 0) {
                lunbo_index = $('.banner_list .item').size() - 1;
                $(".banner_list").css('left', -lunbo_index * win_width);
            }
            $('.banner_status span').eq(lunbo_index).addClass('banner_active');
            $(".banner_list").animate({left: -lunbo_index * win_width});
            lunbo_index--;
        }
    }

    var lunbo_timer = setInterval(function () {
        lunbo_ctr('next');
    }, 3000);

    $(".banner_list,.banner_ctr").mouseover(function () {
        clearInterval(lunbo_timer);
    });
    $(".banner_list,.banner_ctr").mouseout(function () {
        lunbo_timer = setInterval(function () {
            lunbo_ctr('next');
        }, 3000);
    });

    $('.banner_status span').click(function () {
        $('.banner_status span').removeClass('banner_active');
        $(this).addClass('banner_active');
        var bsindex = $(this).index();
        lunbo_index = bsindex;
        $(".banner_list").animate({left: -lunbo_index * win_width});
    });

    $('.banner_ctr_next').on('click', function () {
        lunbo_ctr('next');

    });
    $('.banner_ctr_pre').on('click', function () {
        lunbo_ctr('pre');

    });

    /**
     * 回到顶部按钮隐藏出现
     */
    $(window).scroll(function () {
        if ($(window).scrollTop() >= $(window).height()) {
            $('.to_top').fadeIn();
        } else {
            $('.to_top').fadeOut();
        }
    });

    $('.to_top').find('span').click(function(){
        $('html,body').animate({scrollTop:0},800);
    });


    /**
     * 文章列表标签颜色
     */
    $('.article_tags_box').find('.article_tags').each(function (index) {
        if (index % 2 == 0) {
            $('.article_tags_box').find('.article_tags').eq(index).addClass('label-danger');
        } else if (index % 3 == 0) {
            $('.article_tags_box').find('.article_tags').eq(index).addClass('label-success');
        } else {
            $('.article_tags_box').find('.article_tags').eq(index).addClass('label-primary');
        }
    });


});
