<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/simple-datatables/style.css">


    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/choices.js/choices.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/apexcharts/apexcharts.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/favicon.svg" type="image/x-icon">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?=base_url()?>"><img src="<?=base_url()?>/assets/images/logo/logo3.png" alt="Logo" srcset="" style="width: 12rem; height: 100%;"></a>
                        </div>
<!--                         <row>
                            <div class="col-12">
                              <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo/logo1.png" alt="Logo" style=""></a>  
                            </div>
                        </row> -->
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <?php $this->load->view('menu');?>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3><?=$title?></h3>
                <p class="text-subtitle text-muted"><?=$subtitle?></p>
            </div>

            <?php $this->load->view($content)?>

        </div>
    </div>

    <div class="modal fade text-left modal-borderless" id="default" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Logout</h5>
                    <button type="button" class="close rounded-pill"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                        Akhiri sesi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tidak</span>
                    </button>
                    <a role="button" href="<?=base_url('login/logout/')?>" class='btn btn-primary ml-1'>
                        Akhiri
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="<?=base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="<?=base_url()?>/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?=base_url()?>/assets/js/pages/dashboard.js"></script> -->

    <script type="text/javascript">
        var element = document.getElementById("<?=$menu?>");
        element.classList.add("active");
    </script>

    <script src="<?=base_url()?>/assets/vendors/choices.js/choices.min.js"></script>
    <script src="<?=base_url()?>/assets/vendors/fontawesome/all.min.js"></script>

    <script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>