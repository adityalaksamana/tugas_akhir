<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Perangkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                                    <!-- <td>".$dataRelay."</td> -->
                <tbody>
                    <?php
                        // print_r($data);
                        $i = 0;
                        foreach ($data as $key => $value) {
                            $i++;
                            // print_r($value);
                            $id = $value['id_user'];
                            $username = $value['username'];
                            $nama = $value['nama'];
                            $dataDevice = $this->m_admin->getDevisi($id);
                            $devices = '| ';
                            foreach ($dataDevice as $key => $value2) {
                                $devices = $devices.$value2['nama']." | ";
                            }
                            echo "
                                <tr>
                                    <td>".$i."</td>
                                    <td>".$username."</td>
                                    <td>".$nama."</td>
                                    <td>".$devices."</td>
                                    <td>
                                         <a href='".base_url('admin/edit/'.$id)."' class='btn btn-sm btn-warning'>Edit</a>
                                         <a href='' class='btn btn-sm btn-danger' role='button' data-bs-toggle='modal' data-bs-target='#admin".$id."' class='sidebar-link'>Hapus</a>

                                    </td>
                                </tr>
                            ";
                            echo '
                                <div class="modal fade text-left modal-borderless" id="admin'.$id.'" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Hapus Admin</h5>
                                                <button type="button" class="close rounded-pill"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    Hapus admin '.$username.'?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tidak</span>
                                                </button>
                                                <a role="button" href="'.base_url('admin/delete/'.$id).'" class="btn btn-danger ml-1">
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