$(function() {
    //大图切换


    //以1920为基准比例，计算当前显示器分辨率和1920的缩放比例

    var prec = $(window).width() / 1920;

    if ($(window).width() > 1920) { //判断缩放生效的显示器分辨率临界值
        $('.banner .slick-arrow').css('zoom', prec);
        $('.banner .tit').css('zoom', prec);
        $('.banner .slick-dots').css('zoom', prec);

    }



    $(".banner .item").each(function() {
        var $lbannerImg = $(this).find("img");
        var imgsrc = $(this).find("img").attr("data-src");
        $lbannerImg.attr("src", imgsrc);
        var url = $(this).find("source").attr("src");
        if (url != "") {
            $(this).addClass("tu");
        } else {
            $(this).addClass("no");
        }
    });
    $('.banner .slider').slick({
        dots: true,
        arrows: true,
        autoplay: true,
        slidesToShow: 1,
        autoplaySpeed: 5000,
        pauseOnHover: true,
        lazyLoad: 'ondemand',
    });


    if ($(".banner .slick-active").hasClass("tu")) {
        $(".banner .slick-active video")[0].play();
        $('.banner .slider').slick('slickPause');
        var  videoobj = document.querySelector(".banner .slick-active video")
        videoobj.addEventListener('ended',  function ()  {
            $('.banner .slider').slick('slickPlay');
            var timeout = setTimeout(function() {
                $(".banner .slick-next").click();
            }, 1000)

        });
    }


    $('.banner .slider').on("init reInit afterChange", function(event, slick, currentSlide) {
        if ($(".banner .slick-active").hasClass("tu")) {
            $(".banner .slick-active video")[0].play();
            $('.banner .slider').slick('slickPause');
            var  videoobj = document.querySelector(".banner .slick-active video")
            videoobj.addEventListener('ended',  function ()  {
                $('.banner .slider').slick('slickPlay');
                var timeout = setTimeout(function() {
                    $(".banner .slick-next").click();
                }, 1000)

            });
        }
    })



})