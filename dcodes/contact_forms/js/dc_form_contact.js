/* dCodes Framework: (c) TemplateAccess */

$(function () {
    $('input[placeholder], textarea[placeholder]').each(function () {
        var $placeInput = $(this);
        if ('placeholder' in document.createElement('input')) {
            var placeholder = true;
        } else {
            var placeholder = false;
            $placeInput.val($placeInput.attr('placeholder'));
        }
        if (!placeholder) {
            $placeInput.focusin(function () {
                if ($placeInput.val() === $placeInput.attr('placeholder')) {
                    $placeInput.val('');
                }
            }).focusout(function () {
                if ($placeInput.val() === '') {
                    $placeInput.val($placeInput.attr('placeholder'));
                }
            });
        }
    });
});