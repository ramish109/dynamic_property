<script>
function getPageList(totalPages, page, maxLength) {
    function range(start, end) {
        return Array.from(Array(end - start + 1), (_, i) => i + start);
    }
    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;

    var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;
    if (totalPages <= maxLength) {
        return range(1, totalPages);
    }
    if (page <= maxLength - sideWidth - 1 - rightWidth) {
        return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
    }
    if (page >= totalPages - sideWidth - 1 - rightWidth) {
        return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
    }
    return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth +
        1, totalPages));
}
$(function() {
    var numberOfItems = $(".pagination-list .wp-block").length;
    var limitPerPage = 5; //Post Per Page
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    var paginationSize = 5; //Pagination number
    var currentPage;

    function showPage(whichPage) {
        if (whichPage < 1 || whichPage > totalPages) return false;

        currentPage = whichPage;

        $(".pagination-list .wp-block").hide().slice((currentPage - 1) * limitPerPage, currentPage *
            limitPerPage).show();

        $(".paginations li").slice(1, -1).remove();
        getPageList(totalPages, currentPage, paginationSize).forEach(item => {
            $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots").toggleClass(
                "active", item === currentPage).append($("<a>").addClass("page-links").attr({
                href: "javascript:void(0)"
            }).text(item || "...")).insertBefore(".next-page");
        });
        $(".previous-page").toggleClass("disable", currentPage === 1);
        $(".next-page").toggleClass("disable", currentPage === totalPages);
        return true;
    }
    $(".paginations").append(
        $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-links")
            .attr({
                href: "javascript:void(0)"
            }).text("<")),
        $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-links").attr({
            href: "javascript:void(0)"
        }).text(">")),
    )
    $(".pagination-list .wp-block").show();
    showPage(1);
    $(document).on("click", ".paginations li.current-page:not(.active)", function() {
        return showPage(+$(this).text());
    });
    $(".next-page").on("click", function() {
        return showPage(currentPage + 1);
    });
    $(".previous-page").on("click", function() {
        return showPage(currentPage - 1);
    });
});
$(document).ready(function() {


    $("#collapse-data-browser").click(function() {

        if ($("#collapse-data-browser i").hasClass("fa-angle-down")) {
            $("#collapse-data-browser i").removeClass("fa-angle-down");
            $("#collapse-data-browser i").addClass("fa-angle-up");

        } else {
            $("#collapse-data-browser i").removeClass("fa-angle-up");
            $("#collapse-data-browser i").addClass("fa-angle-down");

        }

    });
    $("#collapse-data-browser").click(function() {
        $('.container .panel.panel-default  .panel-body.text-center').slideToggle();
    });

    while (1) {
        $('#image-fade-flex').fadeIn(1500).delay(2000).fadeOut(2500).delay(2000).fadeIn(1500);
        sleep(1000);
    }
});
</script>