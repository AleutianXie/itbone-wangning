$(function () {

    // 点击图片预览框关闭图片预览
    $('.show_img_box').on('click', function () {
        $(this).fadeOut();
    });

    /*======================= 控制后台左右宽度 =====================*/
    $('.main-left').height($(document).height())

    // 判断浏览器是否有滚动条
    if (document.body.style.overflow != "hidden" && document.body.scroll != "no" && document.body.scrollHeight > document.body.offsetHeight) {
        var scrollBarWidth = getScrollbarWidth();
        $('.main-right').width($('body').width() - $('.main-left').width() - scrollBarWidth - 2);
    } else {
        $('.main-right').width($('body').width() - $('.main-left').width());
    }
    // var json = {'menu':'系统','menu-list':['添加','删除']};
    //点击左侧列表菜单收起左侧菜单栏
    $('.main-left-list-group-item').on('click', function () {
        if ($(this).attr('href') == "javascript:void(0)") {
            $('.main-left-menu-box').hide();
            $('.main-left-menu-box').eq($(this).index()).show();
            $('.main-left-list-group-item').find('span').fadeOut();
            $('.admin-logo-box').find('span').hide();
            $('.main-left').animate({'width': '50px'}, 'fast', 'linear', function () {
                $('.main-right').animate({'width': $('body').width() - $('.main-left').width() - $('.main-left-menu').width() - 2}, 'fast', 'linear');
                $('.main-left-menu').css({'left': '50px', 'height': $('.main-left').height()});
                $('.main-left-menu').fadeIn(function () {
                    // 展开之后滑动菜单，子菜单也变化
                    $('.main-left-list-group-item').on('mousemove', function () {
                        $('.main-left-menu-box').hide();
                        $('.main-left-menu-box').eq($(this).index()).show();
                    });
                });
            });
        }
    });
    //返回初始状态
    $('.main-left-menu-back').on('click', function () {
        $('.admin-logo-box').find('span').fadeIn();
        $('.main-left-menu').hide();
        $('.main-left').animate({'width': '150px'}, 'fast', 'linear', function () {
            $('.main-right').animate({'width': $('body').width() - $('.main-left').width() - 2}, 'fast', 'linear');
        });
        $('.main-left-list-group-item').find('span').fadeIn();

    });
    /*======================= 控制后台左右宽度 =====================*/
    //左侧列表old
    //$('.main-left .list-group .list-group-item').on('click', function () {
    //    $(this).siblings('.list-group-item-body').slideToggle(200);
    //});

    // 提示框关闭
    $('.confirm_close').click(function () {
        $('.confirm_box').fadeOut();
    });
    // 提示框出现
    $('.show_confirm_box').on('click', function () {
        $('.confirm_box').fadeIn();
        var screen_height = document.documentElement.clientHeight;
        $('.confirm_box').css({
            'top': (screen_height - $('.confirm_box').outerHeight()) / 2 + $(document).scrollTop(),
            'left': ($('.main-right-box').outerWidth() - $('.confirm_box').outerWidth()) / 2
        });
    });
    $("#published_at").datepicker({
        changeMonth: true,
        changeYear: true,
        "dateFormat": "yy-mm-dd"
    });

    $('.upload_close').click(function () {
        $('.upload_box').fadeOut();
    });
    // 提示框出现
    $('.show_upload_box').on('click', function () {
        $('.upload_box').fadeIn();
    });
    /**
     * highcharts
     */
    $('#container').highcharts({
        title: {
            text: '最近30天统计图',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: itbone.cn/itbone.top',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number(个)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'IP',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'PV',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'TIME',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'NUM',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});

/**
 * 判断鼠标滚动方向
 * @用法 scroll(function(direction) { console.log(direction) });
 */
function scrolldir(fn) {
    var beforeScrollTop = document.body.scrollTop,
        fn = fn || function () {
            };
    window.addEventListener("scroll", function () {
        var afterScrollTop = document.body.scrollTop,
            delta = afterScrollTop - beforeScrollTop;
        if (delta === 0) return false;
        fn(delta > 0 ? "down" : "up");
        beforeScrollTop = afterScrollTop;
    }, false);
}

/**
 * 添加分类按钮点击变色
 */
function changeBtnColor(obj) {
    if ($(obj).css('backgroundColor') == '#5CB85C' || $(obj).css('backgroundColor') == 'rgb(92, 184, 92)') {
        $(obj).css({'backgroundColor': '#FFFFFF', 'color': '#000000', 'borderColor': '#cccccc'});
    } else {
        $(obj).css({
            'backgroundColor': '#5CB85C',
            'color': '#FFFFFF',
            'borderColor': '#5CB85C'
        }).siblings('.category').css({'backgroundColor': '#FFFFFF', 'color': '#000000', 'borderColor': '#cccccc'});
    }
    $('#cateinput').val($(obj).attr('cateid'));
}

/**
 * 标签点击变色
 */
function changeTagsColor(obj) {
    if ($(obj).css('backgroundColor') == '#5CB85C' || $(obj).css('backgroundColor') == 'rgb(92, 184, 92)') {
        $(obj).removeClass('tag_cur');
    } else {
        $(obj).addClass('tag_cur');
    }
}

/**
 * 提交文章验证
 */
function cksubmit() {
    var str = '';
    $('#tag').find('.tag').each(function (i) {
        if ($('#tag').find('.tag').eq(i).hasClass('tag_cur')) {
            if (str == '') {
                str = $('#tag').find('.tag').eq(i).text();
            } else {
                str += ',' + $('#tag').find('.tag').eq(i).text();
            }
        }
    });
    $('#taginput').val(str);
}

/**
 * 获取滚动条的宽度 (不兼容ie)
 * @returns {number|滚动条宽度}
 */
function getScrollbarWidth() {
    var oP = document.createElement('p'),
        styles = {
            width: '100px',
            height: '100px',
            overflowY: 'scroll'
        }, i, scrollbarWidth;
    for (i in styles) oP.style[i] = styles[i];
    document.body.appendChild(oP);
    scrollbarWidth = oP.offsetWidth - oP.clientWidth;
    oP.remove();
    return scrollbarWidth;
}

/*
 * 显示大图
 * 
 <!-- 预览框-->
 <div class="show_img_box" style="position: absolute; display: none;">
 <a href="javascript:void(0)" class="thumbnail"
 style="box-shadow: 0 0 15px 5px #c0c0c0; position: relative; width: 500px ;height: 300px;">
 <img src="" alt="" style="position: absolute;">
 </a>
 </div>
 */
function showImg(obj) {
    var src = $(obj).find('img').attr('src');
//            var screen_height = document.body.clientHeight;
    var screen_height = document.documentElement.clientHeight;
    $('.show_img_box').css({
        'top': (screen_height - $('.show_img_box').outerHeight()) / 2 + $(document).scrollTop(),
        'left': ($('.main-right-box').outerWidth() - $('.show_img_box').outerWidth()) / 2
    });
    $('.show_img_box').find('img').attr('src', src);
    $('.show_img_box').fadeIn();

    $('.show_img_box').find('img').css({
        'top': ($('.show_img_box').height() - $('.show_img_box').find('img').height() - 20) / 2,
        'left': ($('.show_img_box').width() - $('.show_img_box').find('img').width()) / 2
    });
}
