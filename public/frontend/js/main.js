jQuery(document).ready(function($) {
    var propertyImageSlider = $('#imageGallery').lightSlider({
        gallery: gGallery,
        item: 1,
        loop: true,
        mode: gMode,
        thumbItem: 5,
        speed: gSpeed,
        videojs: true,
        prevHtml: '<i class="fa fa-arrow-circle-left"></i>',
        nextHtml: '<i class="fa fa-arrow-circle-right"></i>',
        vertical: gVertical,
        keyPress: true,
        slideMargin: 0,
        galleryMargin: 0,
        thumbMargin: 0,
        enableDrag: false,
        vThumbWidth: 123,
        verticalHeight: 500,
        adaptiveHeight: false,
        currentPagerPosition: 'middle',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide',
                speed: gSpeed,
                download: false,
                loadYoutubeThumbnail: false,
                thumbnail: isMobile == false
            });
            let propertyAvailability = $("#property-availability");
            propertyAvailability.detach().appendTo(".lSSlideWrapper");
            propertyAvailability.removeClass('hidden');
        },
        onBeforeSlide: function(el) {
            $('#lSSliderCounterCurrent').text(el.getCurrentSlideCount());
        }
    });
    $(window).on('popstate', function() {
        $('.lg-close').click();
    });
    $("#propertyLocation").change(function() {
        setLocBoxHeight();
    });
    $("#search_jsForm").submit(function() {
        SetSearchPanelCookies();
    });
    if (propertyImageSlider.getTotalSlideCount) {
        $('#lSSliderCounterTotal').text(propertyImageSlider.getTotalSlideCount());
    }

    if (isMobile === true) {
        $('a[data-type="mobileContact"]').on('click', function() {
            logContactStat($(this).data('channel'));
        });
    }
    $('.js-p-image').on('click', function() {
        let urlReplace = "#imagePreviewer";
        history.pushState(null, null, urlReplace);
    });
    $('#report-button').on('click', function(e) {
        $('#reportListing').modal('show').find('.modal-body').load($(this).data('href'));
    });
});

function sendButtonClicked() {
    document.getElementById('sendButtonSpan').innerHTML = 'Sending...';
    $('#sendButton').click(function(e) {
        e.preventDefault();
        return false;
    });
    try {
        SetFormCookies();
    } catch (err) {}
}
$(document).ready(function() {
    if (isMobile != true) {
        enableContentCopyInfo("Property Details");
    }
});



