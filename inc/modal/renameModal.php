<?php

?>

<div class="modal fade" id="renameRootModal" tabindex="-1" role="dialog" aria-labelledby="exampleRenameModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rename Root</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="newRootName">Enter new root name:</label>
                <input type="text" id="newRootName" name="newRootName" placeholder="New Name" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-confirm-renaming">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
