$(document).on('click', '.root-triangle-btn', function (event) {
    event.stopPropagation();
    event.preventDefault();
    $(this).toggleClass('opened');
    $(this).closest('.root-element').next('.root-childs').toggleClass('hide');
})
