<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <?php
                            if($this->session->userdata['level']=='admin'){
                                echo '
                                    <th>Id</th>
                                ';
                            }
                        ?>
                        <th>Aksi</th>
                    </tr>
                </thead>
                                    <!-- <td>".$dataRelay."</td> -->
                <tbody>
                    <?php
                        $i = 0;
                        foreach ($data as $key => $value) {
                            $i++;
                            // print_r($value);
                            $id = $value['id_device'];
                            $nama = $value['nama'];
                            echo "
                                <tr>
                                    <td>".$i."</td>
                                    <td>".$nama."</td>";
                            if($this->session->userdata['level']=='admin'){
                                echo '
                                    <td>'.$id.'</td>
                                ';
                            }
                            echo"
                                    <td>
                                         <a href='".base_url('device/edit/'.$id)."' class='btn btn-sm btn-warning'>Edit</a>";
                            if($this->session->userdata['level']=="admin"){
                                echo "
                                         <a href='' class='btn btn-sm btn-danger' role='button' data-bs-toggle='modal' data-bs-target='#device".$id."' class='sidebar-link'>Hapus</a>
                                ";
                            }
                            echo "
                                    </td>
                                </tr>
                            ";
                            echo '
                                <div class="modal fade text-left modal-borderless" id="device'.$id.'" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Hapus Device</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    Hapus device '.$nama.'?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tidak</span>
                                                </button>
                                                <a role="button" href="'.base_url('device/delete/'.$id).'" class="btn btn-danger ml-1">
                                                    Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script src="<?=base_url()?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>