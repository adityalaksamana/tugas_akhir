<div class="card">
    <!-- <div class="card-header">
        <h4 class="card-title">Form Tambah Perangkat</h4>
    </div> -->
    <div class="card-content">
        <div class="card-body">
            <?= form_open_multipart(base_url('device/add'))?>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Nama Perangkat </label>
                            <input type="text" id="namaPerangkat" class="form-control"
                                value="Perangkatku" name="namaPerangkat" required>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit"
                            class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset"
                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>