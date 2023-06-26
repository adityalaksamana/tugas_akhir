<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/app.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <row>
                        <div class="col-12">
                          <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo/logo3.png" alt="Logo" style="width: 75%; padding-bottom: 3rem;"></a>  
                        </div>
                    </row>
                    <h1 class="auth-title">Log in</h1>

                    <form action="<?= base_url('login/proses/')?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <?php
                            if ($status=='1') {
                                echo '
                                <div class="col-md-12 col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Login gagal. Password tidak sesuai.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" name="submit" value="submit">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

