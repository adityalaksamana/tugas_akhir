    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.css"/>
    <section class="section">
    <div class="row">
        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-header"  style="padding-bottom:0%">
                    <h4 class="card-title">Pilih Rentang Waktu</h4>
                </div>
                <div class="card-content py-1">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tanggal_awal">Tanggal Awal</label>
                                        <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tanggal_awal">Tanggal Akhir</label>
                                        <input type="date" id="tanggal_akhir" class="form-control" name="tanggal_akhir">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-primary btn-block me-1 mb-1" onclick="ambil()">Tampilkan</a>
                                </div>

                                <?php
                                    if($this->session->userdata['level']=="admin"){
                                        ?>
                                        <div class="col-12"><hr></div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-danger btn-block block" data-bs-toggle="modal"
                                                data-bs-target="#default">
                                                Hapus
                                            </button>
                                        </div>

                                        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel1">Hapus Data</h5>
                                                            <button type="button" class="close rounded-pill"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Apakah anda yakin akan menghapus data yang anda pilih?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batal</span>
                                                            </button>
                                                            <button type="button" class="btn btn-danger ml-1"
                                                                data-bs-dismiss="modal" onclick="ambil2()">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Hapus</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                    }
                                ?>

                                <!-- <div class="col-12 d-flex justify-content-end">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Ph</th>
                                <th>TDS</th>
                                <th>Suhu</th>
                                <th>KEKERUHAN</th>
                                <th>LEVEL</th>
                                <th>R1</th>
                                <th>R2</th>
                                <th>R3</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script src="<?=base_url()?>/assets/vendors/simple-datatables/simple-datatables.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );

    function relayValue(aa) {
        if (aa == 1){
            return "ON";
        }else{
            return "OFF";
        }
    }

    var ambil = function () {
        var waktu = [];
        var r1 = [];
        var r2 = [];
        var r3 = [];
        var ph = [];
        var tds = [];
        var suhu = [];
        var ntu = [];
        var hc = [];

        var id = <?=$this->uri->segment(3)?>;
        var hari = document.getElementById("tanggal_awal").value;
        var hari2 = document.getElementById("tanggal_akhir").value;
        var url_nya = '<?=base_url()?>device/gethistori/?id='+id+'&hari='+hari+'&hari2='+hari2;
        // console.log(url_nya);
        $.ajax({
        type: 'POST', //post method
        url: url_nya,
        dataType: "json",
        success: function (result, textStatus, jqXHR)
        {
            // console.log(result);
            waktu = result[0];
            r1 = result[1];
            r2 = result[2];
            r3 = result[3];
            ph = result[4];
            tds = result[5];
            suhu = result[6];
            ntu = result[7];
            hc = result[8];

            // // document.getElementById("demo2").innerHTML = wkt.length;
            
            var num = 0;
            // var c = wkt.length;
            $('#table1').dataTable().fnClearTable();
            $('#table1').dataTable().fnDestroy();
            var data = [];
            for (let i = 0; i < waktu.length; i++) {
                data.push( [num+1, waktu[num], ph[num], tds[num], suhu[num], ntu[num], hc[num], relayValue(r1[num]), relayValue(r2[num]), relayValue(r3[num])] );
                num += 1;
            }
            // $('#dataTable').DataTable( {
            //     data:  data,
            //     dom: '<"html5buttons">Bfrtip',
            //     order: [[ 0, 'desc' ]],
            //     buttons: [
            //             'excel', 'pdf', 'print'
            //         ]
            // } );
            $('#table1').DataTable( {
                data:  data,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            
            
        },
        error: function(xhr, status, error) {
            console.log('fail');
            // var err = eval(xhr.responseText);
            // console.log(err.Message);
        }

        });
    };

    var ambil2 = function () {
        var id = <?=$this->uri->segment(3)?>;
        var hari = document.getElementById("tanggal_awal").value;
        var hari2 = document.getElementById("tanggal_akhir").value;
        var url_nya = '<?=base_url()?>device/deletehistori/?id='+id+'&hari='+hari+'&hari2='+hari2;
        console.log(url_nya);
        $.ajax({
        type: 'POST', //post method
        url: url_nya,
        dataType: "json",
        success: function (result, textStatus, jqXHR)
        {
            console.log('ok');
        },
        error: function(xhr, status, error) {
            console.log('fail');
        }

        });

        $('#table1').dataTable().fnClearTable();
        $('#table1').dataTable().fnDestroy();
        $('#table1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    };
</script>