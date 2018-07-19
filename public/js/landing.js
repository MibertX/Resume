function scrollToElement($element)
{
    if ($element.length != 0) {
        $('html, body').animate({
            scrollTop: ($element.offset().top)
        },500)
    }
 }

function fixCardPhotoPosition()
{
    var $userCardPhoto = $('#user-card-photo');

    if ($userCardPhoto.outerHeight(true) < $userCardPhoto.parent().height()) {
        $userCardPhoto.stop().css('position', 'absolute')
    } else {
        $userCardPhoto.stop().css('position', 'relative');
    }
}

$(document).ready(function () {
    var MENU_IS_OPEN = false;
    var $menuButton = $('#menu-button');
    var $menuSlider = $('#menu-slider');

    $menuSlider.css('left', '-' + $menuSlider.outerWidth(true) + 'px');

    $menuButton.on('click', {$menuSlider: $menuSlider}, function () {
        if (MENU_IS_OPEN) {
            $menuButton.removeClass('closure');

            if ($('body').width() < 768) {
                $menuSlider.css("left", 0);
                $menuSlider.animate({
                    top: '-' + $menuSlider.outerHeight(true)
                }, 300);
            } else {
                $menuSlider.css("top", 0);
                $menuSlider.animate({
                    left: '-' + $menuSlider.outerWidth(true)
                }, 300);

                $menuButton.animate({
                    left: 0
                });
            }

            MENU_IS_OPEN = false;
        } else {
            $menuButton.addClass('closure');
            if ($('body').width() < 768) {
                $menuSlider.css("left", 0);
                $menuSlider.animate({
                    top: 0
                }, 300);
            } else {
                $menuSlider.css("top", 0);
                $menuSlider.animate({
                    left: 0
                }, 300);

                $('#menu-button').animate({
                    left: $menuSlider.outerWidth(true) + 'px'
                }, 300);
            }
            MENU_IS_OPEN = true;
        }
        event.preventDefault();
    });

    var $userCardSocial = $('#user-card-social');
    var $userCard = $('#user-card');

    var target = $('#user-card-anchor');
    var targetPos = target.offset().top;
    var winHeight = $(window).height();
    var scrollToElem = targetPos - winHeight;
    $(window).scroll(function(){
        var winScrollTop = $(this).scrollTop();
        var userCardSocialHeight = $userCardSocial.outerHeight(true) + 'px';
        if(winScrollTop > scrollToElem && $userCard.css('bottom') != '-' + userCardSocialHeight){
            $userCard.animate({
                'bottom': '-' + userCardSocialHeight,
                'opacity': 1
            }, 1000)
        }
    });

    $('#menu-list').find('li').on('click', function () {
        var href = $(this).find('a').first().attr("href");
        scrollToElement($(href));
        event.preventDefault();
    });

    fixCardPhotoPosition();

    $(window).resize(function() {
        if ($(window).width() < 768) {
            $menuButton.css("left", 0);
            $menuSlider.css("left", 0);
            if (MENU_IS_OPEN === true) {
                $menuSlider.css("top", 0);
            } else {
                $menuSlider.css("top", "-100%");
            }
        } else {
            var sliderWidth = $menuSlider.outerWidth(true);
            $menuSlider.css("top", 0);
            if (MENU_IS_OPEN === true) {
                $menuButton.css("left", sliderWidth + 'px');
                $menuSlider.css("left", 0);
            } else {
                $menuButton.css("left", 0);
                $menuSlider.css("left", '-' + sliderWidth + 'px');
            }
        }

        fixCardPhotoPosition();
    })
    
    $(function(){
        jQuery('.timeline').timeline({
            mode: 'horizontal',
            visibleItems: 3,
            moveItems: 2,
            forceVerticalMode: 767
        });
    });
});
