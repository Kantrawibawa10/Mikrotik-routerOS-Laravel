<div class="modal fade" id="apirouter" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-router"></i> Router OS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-12">
                        <label for="routername" class="form-label">Name Router</label>
                        <input type="text" class="form-control" id="routername" name="routername" value="{{ $identity }}">
                    </div>
                    <div class="col-md-6">
                        <label for="ip" class="form-label">IP</label>
                        <input type="text" class="form-control" id="ip" name="ip" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="user" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
