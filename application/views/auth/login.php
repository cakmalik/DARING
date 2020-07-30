<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <a href="<?= base_url('auth') ?>"> <img src="<?= base_url('assets/') ?>/sdit/logo.png" alt="logo" width="200px" class=" mb-5 mt-2"></a>

                        <hr>
                        <p class="text-center"> Silahkan Login Terlebih Dahulu !</p>
                        <hr>
                        <form method="post" action="<?= base_url('auth/aksilogin') ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus>
                                <div class="invalid-feedback">
                                    Harap isi bidang email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                <div class="invalid-feedback">
                                    Harap isi bidang password
                                </div>
                            </div>
                            <br>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-block btn-success btn-lg btn-icon icon-right" tabindex="4">
                                    Masuk
                                </button>
                            </div>
                            <a href="<?= base_url('assets/mydaring.apk') ?>">Download Apk Here</a>
                        </form>


                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/') ?>stisla-assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h3 class="mb-2 display-4 font-weight-bold text-white">SDIT HARUM</h3>
                                <h5 class="font-weight-normal text-muted-transparent text-white">Selamat Datang di MY DARING</h5>
                            </div>
                            Made with <span class="text-danger"> &#10084;</span> by <a class="text-light bb" target="_blank" href="https://wa.me/6285333920007">PM</a> - Image by <a class="text-light bb" target="_blank" href="https://wa.me/6285333920007">HUMAS HARUM</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>