<div class="modal modal-lg fade" id="modalFormWorkplace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Workplace</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formWorkplace" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="instance-name" class="col-form-label">Instance Name</label>
                        <input type="text" class="form-control" id="instance_name" name="instance_name">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="col-form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="col-form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_join">Date Join</label>
                        <div class="input-group date">
                            <input type="text"
                                class="form-control datepicker"
                                id="date_join" name="date_join"
                                value="">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_leave">Date Leave</label>
                        <div class="input-group date">
                            <input type="text"
                                class="form-control datepicker"
                                id="date_leave" name="date_leave"
                                value="">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="icon icon-2xl cil-calendar"></i>
                                </span>
                            </span>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="col-form-label">Order</label>
                        <input type="number" class="form-control" id="order" name="order">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="col-form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input
                                    class="form-check-input  @error('is_current_workplace') is-invalid @enderror"
                                    id="is_current_workplace" name="is_current_workplace" type="checkbox"
                                    value="1">
                                <label class="form-check-label" for="is_current_workplace">Is current
                                    workplace</label>
                                @error('is_current_workplace')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>
