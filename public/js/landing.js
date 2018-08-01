toastr.options = {
    "closeButton": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true
};

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

    if (Math.floor($userCardPhoto.outerHeight(true)) < Math.floor($userCardPhoto.parent().height())) {
        $userCardPhoto.stop().css('position', 'absolute')
    } else {
        $userCardPhoto.stop().css('position', 'relative');
    }
}

function runUserCardAnimation()
{
    var $userCard = $('#user-card');
    var scrollToUserCard = $('#user-card-anchor').offset().top - $(window).height();
    var userCardSocialHeight = $('#user-card-social').outerHeight(true) + 'px';

    if($(window).scrollTop() > scrollToUserCard && $userCard.css('bottom') != '-' + userCardSocialHeight){
        $userCard.animate({
            'bottom': '-' + userCardSocialHeight,
            'opacity': 1
        }, 1000)
    }
}

function runSkillBarsAnimation()
{
    var skillsSection = $('#skills-section');
    var alreadyAnimated =false;

    skillsSection.find('.skillbar-bar').each(function() {
        if ($(this).width() > 0) {
            alreadyAnimated = true;
            return false;
        }
    });

    if (alreadyAnimated) return false;

    var scrollToSkills = 0;
    skillsSection.prevAll('section').each(function () {
        scrollToSkills += $(this).height();
    });

    if ($(window).scrollTop() > scrollToSkills) {
        $('.skillbar').skillBars();
        return true;
    }

    return false;
}

$(document).ready(function () {
    var MENU_IS_OPEN = false;
    var $menuButton = $('#menu-button');
    var $menuSlider = $('#menu-slider');

    fixCardPhotoPosition();
    runSkillBarsAnimation();
    runUserCardAnimation();

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

    $(window).scroll(function() {
        runUserCardAnimation();
        runSkillBarsAnimation();
    });

    $('#menu-list').find('li').on('click', function () {
        var elementIdByHref = $(this).find('a').first().attr("href");
        scrollToElement($(elementIdByHref));
        event.preventDefault();
    });

    $('#carousel-button').on('click', function () {
        var elementIdByHref = $(this).attr("href");
        scrollToElement($(elementIdByHref));
        event.preventDefault();
    });
    
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
    });
    
    $(function(){
        jQuery('.timeline').timeline({
            mode: 'horizontal',
            visibleItems: 3,
            moveItems: 2,
            forceVerticalMode: 767
        });
    });

    var $feedbackForm = $('#feedback-form');
    $feedbackForm.find('button[type="submit"]').on('click', function() {
        event.preventDefault();
        var $feedbackFormFields = $feedbackForm.find('input.form-input, textarea.form-textarea');
        var feedbackFormData = {
            '_token': $feedbackForm.find('input[name="_token"]').val()
        };

        $feedbackFormFields.each(function() {
            var $feedbackFormField = $(this);
            feedbackFormData[$feedbackFormField.attr('name')] = $feedbackFormField.val();
        });

        $feedbackForm.waitMe({
            effect : 'roundBounce',
            text : '',
            bg : "transparent",
            color : "#fb6470"
        });

        $feedbackForm.addClass('inactive');

        setTimeout(function() {
            $.post({
                'url': $feedbackForm.attr('action'),
                'data': feedbackFormData,
                'success': function() {
                    toastr.success('Your message was delivered. I will contact you by email.');
                    $feedbackForm.find("p.error-message").remove();

                    $feedbackFormFields.each(function() {
                        $(this).val(null);
                    })
                },
                'error': function(data) {
                    $feedbackForm.find("p.error-message").remove();
                    var errors = data['responseJSON']['errors'];

                    if (typeof errors === "undefined") {
                        toastr.error(data['responseJSON']['message'] || 'Unexpected server error');
                    } else {
                        $feedbackFormFields.each(function () {
                            var $feedbackFormField = $(this);
                            var currentFormInputError = errors[$feedbackFormField.attr('name')];
                            if (typeof currentFormInputError !== 'undefined') {
                                $feedbackFormField.after(function () {
                                    return "<p class='error-message'>" + currentFormInputError[0] + "</p>"
                                });
                            }
                        })
                    }
                },
                'complete': function() {
                    $feedbackForm.waitMe('hide').removeClass('inactive');
                }
            })
        }, 500)
        
    })
});
