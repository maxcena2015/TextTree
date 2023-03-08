$(document).on('click', '.root-add-btn', function (event) {
    event.preventDefault();
    event.stopPropagation();
    var nodeId = ($(this).closest('.root-element-wrapper').data('id') !== undefined)
                ?
                $(this).closest('.root-element-wrapper').data('id')
                :
                null
                ;
    data = {
        nodeId: nodeId,
    }
    console.log(data);

    $.ajax({
        type: "POST",
        url: 'inc/ajax/nodeAdd.php',
        data: data,
        success: function (data) {
            console.log('success');
            $('.text-tree-wrapper').html(data);
        },
    });
})

$(document).on('click', '.root-remove-btn', function (event) {
    event.preventDefault();
    event.stopPropagation();
    var nodeId = ($(this).closest('.root-element-wrapper').data('id') !== undefined)
        ?
        $(this).closest('.root-element-wrapper').data('id')
        :
        null
    ;
})

$(document).on('click','.root-delete-modal-open', function () {
    var deletingRootId = $(this).parents('.root-element-wrapper').data('id');
    $('.modal .modal-delete-root-id').html(deletingRootId);
    var removableIds = [deletingRootId];
    removableIds = $.merge(removableIds, getAllChildIds(this));
    $('.modal').off('click', '.btn-confirm-deleting');
    $('.modal').on('click', '.btn-confirm-deleting', function () {
        removeNodes(removableIds);
        $('#deleteRootModal').modal('hide');
        clearInterval(deleteRootTimeout);
    });
    var timeLeft = 20;
    $('.modal-delete-timer').html(timeLeft);
    var deleteRootTimeout = setInterval(function() {
        timeLeft -= 1;
        if (timeLeft <= 0) {
            clearInterval(deleteRootTimeout);
            removeNodes(removableIds);
            $('#deleteRootModal').modal('hide');
        }
        $('.modal-delete-timer').html(timeLeft);
    }, 1000);
})

/**
 * get all children roots' ids.
 * @param {jQuery} clickedBtn that trigger this function.
 */
function getAllChildIds(clickedBtn) {
    var removableIds = [];
    $(clickedBtn).closest('.root-element').next('.root-childs').each(function (index, value) {
        $(value).find('.root-element-wrapper').each(function (index, value) {
            removableIds.push($(value).data('id'));
        })
    })
    return removableIds;
}

/**
 * doing ajax request for deleting inserted nodes.
 * @param {number[]} removableIds roots' ids that are deleting.
 */
function removeNodes(removableIds) {

    data = {
        removableIds: removableIds,
    }

    $.ajax({
        type: "POST",
        url: 'inc/ajax/nodeRemove.php',
        data: data,
        success: function (data) {
            console.log('success');
            $('.text-tree-wrapper').html(data);
        },
    });
}
