$(document).on('click', '.root-name', function (event) {
    event.preventDefault();
    event.stopPropagation();

    var nodeId = ($(this).closest('.root-element-wrapper').data('id') !== undefined)
        ?
        $(this).closest('.root-element-wrapper').data('id')
        :
        null
    ;

    $('.modal').off('click', '.btn-confirm-renaming');
    $('.modal').on('click', '.btn-confirm-renaming', function () {
        console.log('rename nodes');
        renameNode(nodeId);
        $('#renameRootModal').modal('hide');
    });
})

/**
 * send ajax request to rename Root
 *
 * @param nodeId
 */
function renameNode(nodeId) {

    var newName = $('#newRootName').val();
    data = {
        name: newName,
        nodeId: nodeId,
    }

    $.ajax({
        type: "POST",
        url: 'inc/ajax/nodeRename.php',
        data: data,
        success: function (data) {
            console.log('success');
            $('.text-tree-wrapper').html(data);
        },
    });
}
