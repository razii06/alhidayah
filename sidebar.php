<div class="col-lg-3">
                <nav class="navbar navbar-expand-lg bg-light rounded border mt-2 py-0">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 pe-3"
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='biodata') ? 'active bg-success-subtle' : 'link-dark' ;   ?> "href="biodata"><i class="bi bi-person-lines-fill"></i> Biodata</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='nilaiakademik') ? 'active bg-success-subtle' : 'link-dark' ;   ?> "href="nilaiakademik"><i class="bi bi-bookmark-star"></i> Nilai Akademik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='jadwalakademik') ? 'active bg-success-subtle' : 'link-dark' ;   ?> "href="jadwalakademik"><i class="bi bi-alarm"></i> Jadwal Akademik</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='daftarkelas') ? 'active bg-success-subtle' : 'link-dark' ;   ?> "href="daftarkelas"><i class="bi bi-house-door"></i> Daftar Kelas </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>