<?php

?>

<div class="modal fade" id="deleteRootModal" tabindex="-1" role="dialog" aria-labelledby="exampleDeleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This is very dangerous, you shouldn't do it! Are you really really sure?
                You are deleting root <span class="modal-delete-root-id"></span>
            </div>
            <div class="modal-footer">
                <span class="modal-delete-timer text-danger">20</span>
                <button type="button" class="btn btn-primary btn-confirm-deleting">Yes I Am</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
