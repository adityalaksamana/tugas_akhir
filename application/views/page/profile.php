<div class="row"> 
    <?php
        if ($status=='1') {
            echo '
            <div class="col-md-12 col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ganti password gagal. Password tidak sesuai.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            </div>
            ';
        }
        if ($status=='2') {
            echo '
            <div class="col-md-12 col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Ganti password berhasil.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            </div>
            ';
        }
    ?>
    <div class="col-md-4 col-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="card-title">Form Tambah Perangkat</h4>
            </div> -->
            <div class="card-content">
                <?php
                    if ($data['foto'] == '') {
                        echo '
                            <img src="'.base_url().'assets/images/faces/1.jpg" class="card-img-top img-fluid" alt="foto">
                        ';
                    }else{
                        echo '
                            <img src="'.base_url().'assets/images/faces/'.$data['foto'].'" class="card-img-top img-fluid" alt="foto">
                        ';
                    }
                ?>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?=$data['username']?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?=$data['nama']?>" disabled>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Edit
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#" onclick="showHide1()">Username/Nama</a>
                                            <a class="dropdown-item" href="#" onclick="showHide2()">Password</a>
                                            <a class="dropdown-item" href="#" onclick="showHide3()">Foto</a>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    function showHide1() {
                                        var editor = document.getElementById('editU');
                                        var editor2 = document.getElementById('editP');
                                        var editor3 = document.getElementById('editF');
                                        if (editor.style.display !== "none") {
                                            editor.style.display = "none";
                                        } else {
                                            editor.style.display = "block";
                                            editor2.style.display = "none";
                                            editor3.style.display = "none";
                                        }
                                    }

                                    function showHide2() {
                                        var editor = document.getElementById('editU');
                                        var editor2 = document.getElementById('editP');
                                        var editor3 = document.getElementById('editF');
                                        if (editor2.style.display !== "none") {
                                            editor2.style.display = "none";
                                        } else {
                                            editor2.style.display = "block";
                                            editor.style.display = "none";
                                            editor3.style.display = "none";
                                        }
                                    }

                                    function showHide3() {
                                        var editor = document.getElementById('editU');
                                        var editor2 = document.getElementById('editP');
                                        var editor3 = document.getElementById('editF');
                                        if (editor3.style.display !== "none") {
                                            editor3.style.display = "none";
                                        } else {
                                            editor3.style.display = "block";
                                            editor.style.display = "none";
                                            editor2.style.display = "none";
                                        }
                                    }

                                </script>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12" id="editF" style="display:none;">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="card-title">Form Tambah Perangkat</h4>
            </div> -->
            <div class="card-content">
                <div class="card-body">
                    <?= form_open_multipart(base_url('profile/editFoto'))?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>File foto(.jpg)</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" value="ok">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-12" id="editU" style="display:none;">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="card-title">Form Tambah Perangkat</h4>
            </div> -->
            <div class="card-content">
                <div class="card-body">
                    <?= form_open_multipart(base_url('profile/edit/'.$id))?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" id="username" class="form-control" name="username" value="<?=$data['username']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" id="nama" class="form-control" name="nama" value="<?=$data['nama']?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12" id="editP" style="display:none;">
        <div class="card">
            <!-- <div class="card-header">
                <h4 class="card-title">Form Tambah Perangkat</h4>
            </div> -->
            <div class="card-content">
                <div class="card-body">
                    <?= form_open_multipart(base_url('profile/editPassword/'.$id))?>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Password baru</label>
                                    <input type="password" id="passwordBaru" class="form-control" name="passwordBaru" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Password lama</label>
                                    <input type="password" id="passwordLama" class="form-control" name="passwordLama" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" id="konfirmasiPassword" class="form-control" name="konfirmasiPassword" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>