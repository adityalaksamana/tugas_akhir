<?php
    $batasOnline = 20; //menit
    $intervalUpdateData = 3000; //detik
?>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fa fa-server fa-lg" style="color:#fff"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h7 class="text-muted font-semibold">Perangkat</h7>
                                    <h5 id="judul" class="font-extrabold mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="fa fa-wifi fa-lg" style="color:#fff"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h7 class="text-muted font-semibold">Status</h7>
                                    <h5 id="status" class="font-extrabold mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fa fa-clock fa-lg" style="color:#fff"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h7 id="tgl" class="text-muted font-semibold">Waktu</h7>
                                    <h5 id="waktu" class="font-extrabold mb-0">-</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="width:20%">
                    <div class="card">
                        <div class="card-header">
                            <h7 class="text-muted font-semibold">pH</h7>
                            <h5 id="valPH" class="font-extrabold mb-0">-</h5>
                            <h7 class="text-muted font-semibold">-</h7>
                        </div>
                        <div class="card-body" >
                            <div class="form-actions d-flex justify-content-end">
                                <button id="statPH" class="btn btn-block btn-primary me-1">-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="width:20%">
                    <div class="card">
                        <div class="card-header">
                            <h7 class="text-muted font-semibold">TDS</h7>
                            <h5 id="valTDS" class="font-extrabold mb-0">-</h5>
                            <h7 class="text-muted font-semibold">ppm</h7>
                        </div>
                        <div class="card-body" >
                            <div class="form-actions d-flex justify-content-end">
                                <button id="statTDS" class="btn btn-block btn-primary me-1">-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="width:20%">
                    <div class="card">
                        <div class="card-header">
                            <h7 class="text-muted font-semibold">Suhu</h7>
                            <h5 id="valSuhu" class="font-extrabold mb-0">-</h5>
                            <h7 class="text-muted font-semibold">°C</h7>
                        </div>
                        <div class="card-body" >
                            <div class="form-actions d-flex justify-content-end">
                                <button id="statSuhu" class="btn btn-block btn-primary me-1">-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="width:20%">
                    <div class="card">
                        <div class="card-header">
                            <h7 class="text-muted font-semibold">Kekeruhan</h7>
                            <h5 id="valKekeruhan" class="font-extrabold mb-0">-</h5>
                            <h7 class="text-muted font-semibold">NTU</h7>
                        </div>
                        <div class="card-body" >
                            <div class="form-actions d-flex justify-content-end">
                                <button id="statKekeruhan" class="btn btn-block btn-primary me-1">-</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="width:20%">
                    <div class="card">
                        <div class="card-header">
                            <h7 class="text-muted font-semibold">Level</h7>
                            <h5 id="valLevel" class="font-extrabold mb-0">-</h5>
                            <h7 class="text-muted font-semibold">%</h7>
                        </div>
                        <div class="card-body" >
                            <div class="form-actions d-flex justify-content-end">
                                <button id="statLevel" class="btn btn-block btn-primary me-1">-</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                    for ($i=1; $i <=3 ; $i++) { 
                        echo '
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 id="namaR'.$i.'">Relay '.$i.'</h4>
                                    </div>
                                    <div class="card-body" >
                                        <div id="alertR'.$i.'" class="alert alert-primary">
                                            <h4 class="alert-heading"></h4>
                                        </div>
                                        <input type="text" id="i'.$i.'" class="form-control" value="" style="display:none;">
                                        <div class="form-actions d-flex justify-content-end">
                                            <button id="btn'.$i.'" class="btn btn-primary me-1" onClick="aksiKlik('.$i.')" disabled>-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                ?>
            </div>

            <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Ph</h4>
                        </div>
                        <div class="card-body">
                            <div id="area"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Tds</h4>
                        </div>
                        <div class="card-body">
                            <div id="area2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Suhu</h4>
                        </div>
                        <div class="card-body">
                            <div id="area3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik NTU</h4>
                        </div>
                        <div class="card-body">
                            <div id="area4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Hc</h4>
                        </div>
                        <div class="card-body">
                            <div id="area5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <?php
                                if ($this->session->userdata['user_logged']->foto == '') {
                                    echo '
                                        <img src="'.base_url().'assets/images/faces/1.jpg" alt="">
                                    ';
                                }else{
                                    echo '
                                        <img src="'.base_url().'assets/images/faces/'.$this->session->userdata['user_logged']->foto.'" alt="">
                                    ';
                                }
                            ?>
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?=$this->session->userdata['user_logged']->nama?></h5>
                            <h6 class="text-muted mb-0"><?=$this->session->userdata['user_logged']->username?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row mb-4">
                        <select class="choices form-select" id="mySelect">
                            <option value="">Opsi perangkat</option>
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
                    <div class="row px-3">
                        <button class="btn btn-primary" onclick="pilih()">Pilih</button>
                    </div>
                    <div class="row px-1" style="padding-top: 5%;">
                        <form action="#" id='link'>
                            <input class="btn btn-primary btn-block"  type="submit" value="Cek Histori" disabled id='histori'/>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script src="<?=base_url()?>/assets/vendors/apexcharts/apexcharts.js"></script>
<!-- <script src="<?=base_url()?>/assets/vendors/chartjs/Chart.min.js"></script> -->
<!-- <script src="assets/js/pages/ui-chartjs.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
var areaOptionsPh = {
    series: [
     {
       name:"ph",
       data: [],
     }
    ],
    chart: {
        animations: {
            enabled:false
        },
     height: 350,
     type: "area",
    },
    dataLabels: {
     enabled: false,
    },
    stroke: {
     curve: "smooth",
    },
    xaxis: {
          type: 'category',
          categories: [],
          tickAmount: undefined,
          tickPlacement: 'between',
          min: undefined,
          max: undefined,
          range: undefined,
          floating: false,
          decimalsInFloat: undefined,
          overwriteCategories: undefined,
          position: 'bottom',
          labels: {
              show: true,
              rotate: -45,
              rotateAlways: false,
              hideOverlappingLabels: true,
              showDuplicates: false,
              trim: false,
              minHeight: undefined,
              maxHeight: 120,
              style: {
                  colors: [],
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
              },
              offsetX: 0,
              offsetY: 0,
              format: undefined,
              formatter: undefined,
              datetimeUTC: true,
              datetimeFormatter: {
                  year: 'yyyy',
                  month: "MMM 'yy",
                  day: 'dd MMM',
                  hour: 'HH:mm',
              },
          },
          axisBorder: {
              show: true,
              color: '#78909C',
              height: 1,
              width: '100%',
              offsetX: 0,
              offsetY: 0
          },
          axisTicks: {
              show: true,
              borderType: 'solid',
              color: '#78909C',
              height: 6,
              offsetX: 0,
              offsetY: 0
          },
         
          title: {
              text: undefined,
              offsetX: 0,
              offsetY: 0,
              style: {
                  color: undefined,
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 600,
                  cssClass: 'apexcharts-xaxis-title',
              },
          },
          crosshairs: {
              show: true,
              width: 1,
              position: 'back',
              opacity: 0.9,        
              stroke: {
                  color: '#b6b6b6',
                  width: 0,
                  dashArray: 0,
              },
              fill: {
                  type: 'solid',
                  color: '#B1B9C4',
                  gradient: {
                      colorFrom: '#D8E3F0',
                      colorTo: '#BED1E6',
                      stops: [0, 100],
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                  },
              },
              dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  blur: 1,
                  opacity: 0.4,
              },
          },
      },
    tooltip: {
     x: {
       format: "dd/MM/yy HH:mm",
     },
    },
};

var areaOptionsTds = {
    series: [
     {
       name:"tds",
       data: [],
     }
    ],
    chart: {
        animations: {
            enabled:false
        },
     height: 350,
     type: "area",
    },
    dataLabels: {
     enabled: false,
    },
    stroke: {
     curve: "smooth",
    },
    xaxis: {
          type: 'category',
          categories: [],
          tickAmount: undefined,
          tickPlacement: 'between',
          min: undefined,
          max: undefined,
          range: undefined,
          floating: false,
          decimalsInFloat: undefined,
          overwriteCategories: undefined,
          position: 'bottom',
          labels: {
              show: true,
              rotate: -45,
              rotateAlways: false,
              hideOverlappingLabels: true,
              showDuplicates: false,
              trim: false,
              minHeight: undefined,
              maxHeight: 120,
              style: {
                  colors: [],
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
              },
              offsetX: 0,
              offsetY: 0,
              format: undefined,
              formatter: undefined,
              datetimeUTC: true,
              datetimeFormatter: {
                  year: 'yyyy',
                  month: "MMM 'yy",
                  day: 'dd MMM',
                  hour: 'HH:mm',
              },
          },
          axisBorder: {
              show: true,
              color: '#78909C',
              height: 1,
              width: '100%',
              offsetX: 0,
              offsetY: 0
          },
          axisTicks: {
              show: true,
              borderType: 'solid',
              color: '#78909C',
              height: 6,
              offsetX: 0,
              offsetY: 0
          },
         
          title: {
              text: undefined,
              offsetX: 0,
              offsetY: 0,
              style: {
                  color: undefined,
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 600,
                  cssClass: 'apexcharts-xaxis-title',
              },
          },
          crosshairs: {
              show: true,
              width: 1,
              position: 'back',
              opacity: 0.9,        
              stroke: {
                  color: '#b6b6b6',
                  width: 0,
                  dashArray: 0,
              },
              fill: {
                  type: 'solid',
                  color: '#B1B9C4',
                  gradient: {
                      colorFrom: '#D8E3F0',
                      colorTo: '#BED1E6',
                      stops: [0, 100],
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                  },
              },
              dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  blur: 1,
                  opacity: 0.4,
              },
          },
      },
    tooltip: {
     x: {
       format: "dd/MM/yy HH:mm",
     },
    },
};

var areaOptionsSuhu = {
    series: [
     {
       name:"suhu",
       data: [],
     }
    ],
    chart: {
        animations: {
            enabled:false
        },
     height: 350,
     type: "area",
    },
    dataLabels: {
     enabled: false,
    },
    stroke: {
     curve: "smooth",
    },
    xaxis: {
          type: 'category',
          categories: [],
          tickAmount: undefined,
          tickPlacement: 'between',
          min: undefined,
          max: undefined,
          range: undefined,
          floating: false,
          decimalsInFloat: undefined,
          overwriteCategories: undefined,
          position: 'bottom',
          labels: {
              show: true,
              rotate: -45,
              rotateAlways: false,
              hideOverlappingLabels: true,
              showDuplicates: false,
              trim: false,
              minHeight: undefined,
              maxHeight: 120,
              style: {
                  colors: [],
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
              },
              offsetX: 0,
              offsetY: 0,
              format: undefined,
              formatter: undefined,
              datetimeUTC: true,
              datetimeFormatter: {
                  year: 'yyyy',
                  month: "MMM 'yy",
                  day: 'dd MMM',
                  hour: 'HH:mm',
              },
          },
          axisBorder: {
              show: true,
              color: '#78909C',
              height: 1,
              width: '100%',
              offsetX: 0,
              offsetY: 0
          },
          axisTicks: {
              show: true,
              borderType: 'solid',
              color: '#78909C',
              height: 6,
              offsetX: 0,
              offsetY: 0
          },
         
          title: {
              text: undefined,
              offsetX: 0,
              offsetY: 0,
              style: {
                  color: undefined,
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 600,
                  cssClass: 'apexcharts-xaxis-title',
              },
          },
          crosshairs: {
              show: true,
              width: 1,
              position: 'back',
              opacity: 0.9,        
              stroke: {
                  color: '#b6b6b6',
                  width: 0,
                  dashArray: 0,
              },
              fill: {
                  type: 'solid',
                  color: '#B1B9C4',
                  gradient: {
                      colorFrom: '#D8E3F0',
                      colorTo: '#BED1E6',
                      stops: [0, 100],
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                  },
              },
              dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  blur: 1,
                  opacity: 0.4,
              },
          },
      },
    tooltip: {
     x: {
       format: "dd/MM/yy HH:mm",
     },
    },
};

var areaOptionsNtu = {
    series: [
     {
       name:"ntu",
       data: [],
     }
    ],
    chart: {
        animations: {
            enabled:false
        },
     height: 350,
     type: "area",
    },
    dataLabels: {
     enabled: false,
    },
    stroke: {
     curve: "smooth",
    },
    xaxis: {
          type: 'category',
          categories: [],
          tickAmount: undefined,
          tickPlacement: 'between',
          min: undefined,
          max: undefined,
          range: undefined,
          floating: false,
          decimalsInFloat: undefined,
          overwriteCategories: undefined,
          position: 'bottom',
          labels: {
              show: true,
              rotate: -45,
              rotateAlways: false,
              hideOverlappingLabels: true,
              showDuplicates: false,
              trim: false,
              minHeight: undefined,
              maxHeight: 120,
              style: {
                  colors: [],
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
              },
              offsetX: 0,
              offsetY: 0,
              format: undefined,
              formatter: undefined,
              datetimeUTC: true,
              datetimeFormatter: {
                  year: 'yyyy',
                  month: "MMM 'yy",
                  day: 'dd MMM',
                  hour: 'HH:mm',
              },
          },
          axisBorder: {
              show: true,
              color: '#78909C',
              height: 1,
              width: '100%',
              offsetX: 0,
              offsetY: 0
          },
          axisTicks: {
              show: true,
              borderType: 'solid',
              color: '#78909C',
              height: 6,
              offsetX: 0,
              offsetY: 0
          },
         
          title: {
              text: undefined,
              offsetX: 0,
              offsetY: 0,
              style: {
                  color: undefined,
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 600,
                  cssClass: 'apexcharts-xaxis-title',
              },
          },
          crosshairs: {
              show: true,
              width: 1,
              position: 'back',
              opacity: 0.9,        
              stroke: {
                  color: '#b6b6b6',
                  width: 0,
                  dashArray: 0,
              },
              fill: {
                  type: 'solid',
                  color: '#B1B9C4',
                  gradient: {
                      colorFrom: '#D8E3F0',
                      colorTo: '#BED1E6',
                      stops: [0, 100],
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                  },
              },
              dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  blur: 1,
                  opacity: 0.4,
              },
          },
      },
    tooltip: {
     x: {
       format: "dd/MM/yy HH:mm",
     },
    },
};

var areaOptionsHc = {
    series: [
     {
       name:"hc",
       data: [],
     }
    ],
    chart: {
        animations: {
            enabled:false
        },
     height: 350,
     type: "area",
    },
    dataLabels: {
     enabled: false,
    },
    stroke: {
     curve: "smooth",
    },
    xaxis: {
          type: 'category',
          categories: [],
          tickAmount: undefined,
          tickPlacement: 'between',
          min: undefined,
          max: undefined,
          range: undefined,
          floating: false,
          decimalsInFloat: undefined,
          overwriteCategories: undefined,
          position: 'bottom',
          labels: {
              show: true,
              rotate: -45,
              rotateAlways: false,
              hideOverlappingLabels: true,
              showDuplicates: false,
              trim: false,
              minHeight: undefined,
              maxHeight: 120,
              style: {
                  colors: [],
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
              },
              offsetX: 0,
              offsetY: 0,
              format: undefined,
              formatter: undefined,
              datetimeUTC: true,
              datetimeFormatter: {
                  year: 'yyyy',
                  month: "MMM 'yy",
                  day: 'dd MMM',
                  hour: 'HH:mm',
              },
          },
          axisBorder: {
              show: true,
              color: '#78909C',
              height: 1,
              width: '100%',
              offsetX: 0,
              offsetY: 0
          },
          axisTicks: {
              show: true,
              borderType: 'solid',
              color: '#78909C',
              height: 6,
              offsetX: 0,
              offsetY: 0
          },
         
          title: {
              text: undefined,
              offsetX: 0,
              offsetY: 0,
              style: {
                  color: undefined,
                  fontSize: '12px',
                  fontFamily: 'Helvetica, Arial, sans-serif',
                  fontWeight: 600,
                  cssClass: 'apexcharts-xaxis-title',
              },
          },
          crosshairs: {
              show: true,
              width: 1,
              position: 'back',
              opacity: 0.9,        
              stroke: {
                  color: '#b6b6b6',
                  width: 0,
                  dashArray: 0,
              },
              fill: {
                  type: 'solid',
                  color: '#B1B9C4',
                  gradient: {
                      colorFrom: '#D8E3F0',
                      colorTo: '#BED1E6',
                      stops: [0, 100],
                      opacityFrom: 0.4,
                      opacityTo: 0.5,
                  },
              },
              dropShadow: {
                  enabled: false,
                  top: 0,
                  left: 0,
                  blur: 1,
                  opacity: 0.4,
              },
          },
      },
    tooltip: {
     x: {
       format: "dd/MM/yy HH:mm",
     },
    },
};
var areaPh = new ApexCharts(document.querySelector("#area"), areaOptionsPh);
var areaTds = new ApexCharts(document.querySelector("#area2"), areaOptionsTds);
var areaSuhu = new ApexCharts(document.querySelector("#area3"), areaOptionsSuhu);
var areaNtu = new ApexCharts(document.querySelector("#area4"), areaOptionsNtu);
var areaHc = new ApexCharts(document.querySelector("#area5"), areaOptionsHc);

areaPh.render();
areaTds.render();
areaSuhu.render();
areaNtu.render();
areaHc.render();

</script>
<script type="text/javascript">
    var perangkat = '';
    var perangkatku = '';
    var i = 0;
    var interval;
    var awal = 0;
    function pilih() {
        perangkat = document.getElementById("mySelect").value;
        // console.log(perangkat);
        clearAll();
        if (perangkat != '') {
            awal = 0;
            clearInterval(interval);
            getDevice(perangkat);
            for (var j = 3; j > 0; j--) {                    
                document.getElementById("btn"+j).removeAttribute("disabled");
            }
            document.getElementById("histori").removeAttribute("disabled");
            var linkku = "<?=base_url()?>device/histori/"+document.getElementById("mySelect").value;
            document.getElementById("link").action = linkku;
            interval = setInterval(function() {
                // console.log(i+' '+perangkat);
                getSlave(perangkat);
                i++;
                }, <?=$intervalUpdateData?>);
        }else{
            // console.log('no');
            clearInterval(interval);
            clearAll();
        }
    }

    var getDevice = function (perangkat) {
        var urlku = '<?=base_url("api/getDevice/")?>'+perangkat;
        // console.log(urlku);
        $.ajax({
            type: 'GET',
            url: urlku,
            dataType: "json",
            success: function (result, textStatus, jqXHR)
            {
                // console.log(result);
                // const obj = JSON.parse(result['relay']);
                // for (var i = 12; i > 0; i--) {                    
                //     document.getElementById("namaR"+i).innerHTML= obj[i];
                // }
                document.getElementById("judul").innerHTML= result['nama'];
            }
        });
    };

    var getSlave = function (perangkat) {
        var urlku = '<?=base_url("api/getDataSlave/")?>'+perangkat;
        console.log(urlku);
        $.ajax({
            type: 'GET',
            url: urlku,
            dataType: "json",
            success: function (result, textStatus, jqXHR)
            {
                if (result.length>0) {
                    var phList = [];
                    var tdsList = [];
                    var suhuList = [];
                    var ntuList = [];
                    var hcList = [];
                    var waktu = [];

                    var sphList = [];
                    var stdsList = [];
                    var ssuhuList = [];
                    var sntuList = [];
                    var shcList = [];
                    for (var i = result.length - 1; i >= 0; i--) {
                        // list = []
                        // list['x'] = result[i]['waktu'];
                        // list['y'] = result[i]['ph'];
                        waktu.push(result[i]['waktu'].split(" ")[1]);
                        phList.push(result[i]['ph']);
                        tdsList.push(result[i]['tds']);
                        suhuList.push(result[i]['suhu']);
                        ntuList.push(result[i]['ntu']);
                        hcList.push(result[i]['hc']);

                        sphList.push(result[i]['status_ph']);
                        stdsList.push(result[i]['status_tds']);
                        ssuhuList.push(result[i]['status_suhu']);
                        sntuList.push(result[i]['status_ntu']);
                        shcList.push(result[i]['status_hc']);
                    }
                    
                    var lastPH = phList[phList.length-1];
                    var lastTds = tdsList[tdsList.length-1];
                    var lastSuhu = suhuList[suhuList.length-1];
                    var lastNtu = ntuList[ntuList.length-1];
                    var lastHc = hcList[hcList.length-1];

                    var slastPH = sphList[sphList.length-1];
                    var slastTds = stdsList[stdsList.length-1];
                    var slastSuhu = ssuhuList[ssuhuList.length-1];
                    var slastNtu = sntuList[sntuList.length-1];
                    var slastHc = shcList[shcList.length-1];

                    document.getElementById("valPH").innerHTML = lastPH;
                    document.getElementById("valTDS").innerHTML = lastTds;
                    document.getElementById("valSuhu").innerHTML = lastSuhu;
                    document.getElementById("valKekeruhan").innerHTML = lastNtu;
                    document.getElementById("valLevel").innerHTML = lastHc;

                    document.getElementById("statTDS").innerHTML = slastTds;
                    document.getElementById("statSuhu").innerHTML = slastSuhu;
                    document.getElementById("statKekeruhan").innerHTML = slastNtu;
                    document.getElementById("statLevel").innerHTML = slastHc;

                    if (slastPH==0){
                        document.getElementById("statPH").innerHTML = "BURUK";
                        document.getElementById("statPH").removeAttribute("class");
                        document.getElementById("statPH").setAttribute("class", "btn btn-block btn-danger me-1");
                    }else if (slastPH==1){
                        document.getElementById("statPH").innerHTML = "BAIK";
                        document.getElementById("statPH").removeAttribute("class");
                        document.getElementById("statPH").setAttribute("class", "btn btn-block btn-success me-1");
                    }

                    if (slastTds==0){
                        document.getElementById("statTDS").innerHTML = "BURUK";
                        document.getElementById("statTDS").removeAttribute("class");
                        document.getElementById("statTDS").setAttribute("class", "btn btn-block btn-danger me-1");
                    }else if (slastTds==1){
                        document.getElementById("statTDS").innerHTML = "BAIK";
                        document.getElementById("statTDS").removeAttribute("class");
                        document.getElementById("statTDS").setAttribute("class", "btn btn-block btn-success me-1");
                    }

                    if (slastSuhu==0){
                        document.getElementById("statSuhu").innerHTML = "BURUK";
                        document.getElementById("statSuhu").removeAttribute("class");
                        document.getElementById("statSuhu").setAttribute("class", "btn btn-block btn-danger me-1");
                    }else if (slastSuhu==1){                      
                        document.getElementById("statSuhu").innerHTML = "BAIK";
                        document.getElementById("statSuhu").removeAttribute("class");
                        document.getElementById("statSuhu").setAttribute("class", "btn btn-block btn-success me-1");
                    }

                    if (slastNtu==0){
                        document.getElementById("statKekeruhan").innerHTML = "BURUK";
                        document.getElementById("statKekeruhan").removeAttribute("class");
                        document.getElementById("statKekeruhan").setAttribute("class", "btn btn-block btn-danger me-1");
                    }else if (slastNtu==1){                      
                        document.getElementById("statKekeruhan").innerHTML = "JERNIH";
                        document.getElementById("statKekeruhan").removeAttribute("class");
                        document.getElementById("statKekeruhan").setAttribute("class", "btn btn-block btn-success me-1");
                    }else if (slastNtu==2){                      
                        document.getElementById("statKekeruhan").innerHTML = "KERUH";
                        document.getElementById("statKekeruhan").removeAttribute("class");
                        document.getElementById("statKekeruhan").setAttribute("class", "btn btn-block btn-warning me-1");
                    }else if (slastNtu==3){                      
                        document.getElementById("statKekeruhan").innerHTML = "SANGAT KERUH";
                        document.getElementById("statKekeruhan").removeAttribute("class");
                        document.getElementById("statKekeruhan").setAttribute("class", "btn btn-block btn-warning me-1");
                    }

                    if (slastHc==0){
                        document.getElementById("statLevel").innerHTML = "-";
                        document.getElementById("statLevel").removeAttribute("class");
                        document.getElementById("statLevel").setAttribute("class", "btn btn-block btn-danger me-1");
                    }else if (slastHc==1){                      
                        document.getElementById("statLevel").innerHTML = "FULL";
                        document.getElementById("statLevel").removeAttribute("class");
                        document.getElementById("statLevel").setAttribute("class", "btn btn-block btn-success me-1");
                    }

                    areaPh.updateOptions( {
                        xaxis: {
                          categories: waktu,
                          tooltip: {
                              enabled: false
                            }
                        }
                      });
                    areaPh.updateSeries([{
                        data: phList
                      }])

                    areaTds.updateOptions( {
                        xaxis: {
                          categories: waktu,
                          tooltip: {
                              enabled: false
                            }
                        }
                      });
                    areaTds.updateSeries([{
                        data: tdsList
                      }])

                    areaSuhu.updateOptions( {
                        xaxis: {
                          categories: waktu,
                          tooltip: {
                              enabled: false
                            }
                        }
                      });
                    areaSuhu.updateSeries([{
                        data: suhuList
                      }])

                    areaNtu.updateOptions( {
                        xaxis: {
                          categories: waktu,
                          tooltip: {
                              enabled: false
                            }
                        }
                      });
                    areaNtu.updateSeries([{
                        data: ntuList
                      }])

                    areaHc.updateOptions( {
                        xaxis: {
                          categories: waktu,
                          tooltip: {
                              enabled: false
                            }
                        }
                      });
                    areaHc.updateSeries([{
                        data: hcList
                      }])
                    const obj = JSON.parse(result[0]['relay']);
                    update(obj);
                    var waktu = result[0]['waktu'].split(" ");
                    var jam = waktu[0];
                    var date = waktu[0].split("-");
                    date = date[2]+"-"+date[1];

                    waktu = waktu[1].split(':');
                    var waktuku = waktu;
                    
                    var time = waktu[0]+":"+waktu[1]+":"+waktu[2];
                    waktu = (waktu[0]*60)+(waktu[1]*1);


                    var currentdate = new Date(); 
                    // var date = currentdate.getDate() + "/"
                    //                 + pad(currentdate.getMonth()+1);
                    // var time = currentdate.getHours() + ":"  
                    //                 + pad(currentdate.getMinutes()) + ":" 
                    //                 + pad(currentdate.getSeconds());

                    var jam2 = currentdate.getFullYear()+'-'+pad(currentdate.getMonth()+1)+'-'+pad(currentdate.getDate());
                    var waktu2 = (currentdate.getHours()*60)+(currentdate.getMinutes());


                    var status = '';
                    // console.log(currentdate.getHours()+":"+currentdate.getMinutes());
                    // console.log(waktu2, waktu);

                    if (jam!=jam2) {
                        status = 'Offline';
                    }else if((waktu2 - waktu) >= <?=$batasOnline?>){
                        status = 'Offline';
                    }else{
                        status = 'Online';
                    }

                    document.getElementById('status').innerHTML = status;
                    document.getElementById('waktu').innerHTML = time;
                    document.getElementById('tgl').innerHTML = "Waktu ("+date+")";
                }
            }
        });
    };

    var update = function(obj){
        for (var i = 3; i > 0; i--) {                    
            document.getElementById("i"+i).value= obj[i];
            if (obj[i]==1) {
                var set = 'success';
                var set2 = 'danger';
                var btn = 'Matikan';
            }else if(obj[i]==0) {
                var set = 'danger';
                var set2 = 'success';
                var btn = 'Nyalakan';
            }
            document.getElementById("alertR"+i).removeAttribute("class");
            document.getElementById("alertR"+i).setAttribute("class", "alert alert-"+set);
            
            // document.getElementById("btn"+i).removeAttribute("class");
            // document.getElementById("btn"+i).setAttribute("class", "btn btn-"+set2);
            if(awal==0){
                document.getElementById("btn"+i).innerHTML= btn;
            }
            // console.log(i, obj[i]);
        }
        awal++;
    };

    function aksiKlik(i) {
        // console.log('================ ', i);
        var v = document.getElementById("i"+i).value;
        if(v == 0){
            v = 1;
            var btn = 'Matikan';
        }else if(v == 1){
            v = 0;
            var btn = 'Nyalakan';
        }
        document.getElementById("i"+i).value= v;
        document.getElementById("btn"+i).innerHTML= btn;

        var r1 = document.getElementById("i1").value;
        var r2 = document.getElementById("i2").value;
        var r3 = document.getElementById("i3").value;

        // console.log(r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12);

        var urlku = '<?=base_url("api/sendMaster/")?>?id='+perangkat+
                    '&relay='+i+'&value='+v;
        console.log(urlku);
        $.ajax({
            type: 'GET',
            url: urlku,
            dataType: "json",
            success: function (result, textStatus, jqXHR)
            {
                // const obj = JSON.parse(result[0]['relay']);
                // update(obj);
                console.log("-");
            }
        });

    }

    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString();
    }

    function clearAll() {
        document.getElementById('judul').innerHTML = "-";
        document.getElementById('status').innerHTML = "-";
        document.getElementById('tgl').innerHTML = "Waktu";
        document.getElementById('waktu').innerHTML = "-";

        for (var j = 3; j > 0; j--) {                    
            document.getElementById("namaR"+j).innerHTML= "Relay "+j;
            document.getElementById("btn"+j).innerHTML = '-';
            document.getElementById("btn"+j).setAttribute("disabled","");

            document.getElementById("alertR"+j).removeAttribute("class");
            document.getElementById("alertR"+j).setAttribute("class", "alert alert-primary");
        }
    }

</script>



