$(document).ready(function () {
    // 1.HEADER BURGER START

    $(".header__burger").click(function (e) {
        $(".header__burger, .header__nav, .header__nav-block, .header__search, .header__nav-list, body").toggleClass('active');
    });

    $(".submenu-open").click(function (e) {
        $(".menu-a, .header__nav, .header__nav-list").toggleClass("close");
        $(this).siblings().toggleClass("sub-open");
        $(this).toggleClass("sub-burger");
        $(this).parent("li").toggleClass("sub-open");
    })

    // 1.HEADER BURGER END

    // 2.HEADER BACKGROUND AT SCROLL START
    $(document).scroll(function (e) {

        $(window).scrollTop() > 20 ? $(".header__nav-block, .home").addClass("scroll") : $(".header__nav-block, .home").removeClass("scroll");
    });

    // 2.HEADER BACKGROUND AT SCROLL END

    // 3.HEADER ACTIVE LINK START 

    $(".header__nav li a, .footer__menu a").each(function () {
        if (this.href == location.href) $(this).addClass('active-link');
    });

    // 3.HEADER ACTIVE LINK END

    // 4.CATALOG TABS START

    var tab = $(".catalog__items > div");
    tab.hide().filter(':first').show();

    $(".catalog__tab a").click(function (e) {
        tab.hide();
        $(this.hash).show();
        $(".catalog__tab a").removeClass("active-tab")
        $(this).addClass("active-tab");
        return false;
    });

    // 4.CATALOG TABS END

    // 6.QTY COUNTER START
    var val = $('.card__qty').val();

    $("#down").click(function (e) {
        val--;
        $('.card__qty').val(val);
    });
    $("#up").click(function (e) {
        val++;
        $('.card__qty').val(val);
    });
    // 6.QTY END


    // 9.FORM VALIDATION START
    $("#myForm").submit(function (e) {
        e.preventDefault();
        var email_1 = $("#email_1").val();
        var password_1 = $("#password_1").val();
        if (
            email_1.length > 4 &&
            email_1.match(/@+./)
        ) {
            $("#email_1").removeClass("error");
        } else {
            $("#email_1").addClass("error");
        }

        password_1.length < 6 ? $("#password_1").addClass("error") : $("#password_1").removeClass("error");
    })

    $("#myForm_2").submit(function (e) {
        e.preventDefault();
        var email = $("#email").val();
        var password_2 = $("#password_2").val();
        var password_3 = $("#password_3").val();
        var check = $("#check");

        if (
            email.length > 4 &&
            email.match(/@+./)
        ) {
            $("#email").removeClass("error");
        } else {
            $("#email").addClass("error");
        }


        password_2.length < 6 ? $("#password_2").addClass("error") : $("#password_2").removeClass("error");

        password_3.length < 6 ? $("#password_3").addClass("error") : $("#password_3").removeClass("error");

        if (check.attr("checked")) {
            $("#check").removeClass("error");
        } else {
            $("#check").addClass("error");
        }
    })

    // 9.FORM VALIDATION END

    // 10.MINI IMG START

    $(".product__mini").click(function () {
        $imgSrc = $(this).attr("src");
        $mainImgSrc = $(this).parents(".product").find(".product__main-img").attr("src");
        $(this).parents(".product").find(".product__main-img").attr("src", $imgSrc)
        $(this).attr("src", $mainImgSrc);
    });

    // 10.MINI IMG END

});