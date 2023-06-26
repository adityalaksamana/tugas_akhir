<div class="row">
    <div class="col-md-6 col-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="card-title">Form Tambah Perangkat</h4>
            </div> -->
            <div class="card-content">
                <div class="card-body">
                    <?= form_open_multipart(base_url('client/add'))?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" id="username" class="form-control" name="username" required>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" id="nama" class="form-control" name="nama" required>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Perangkat </label>
                                    <select class="choices form-select multiple-remove" multiple="multiple" id='device' name="device[]">
                                        <?php
                                            foreach ($data as $key => $value) {
                                                $idDevice = $value['id_device'];
                                                $nama = $value['nama'];
                                                echo '
                                                    <option value="'.$idDevice.'">'.$nama.'</option>
                                                    ';
                                            }
                                        ?>
                                    </select>
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
    </div>
</div>