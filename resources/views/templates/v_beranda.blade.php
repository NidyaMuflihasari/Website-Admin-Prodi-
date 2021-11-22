    @include('templates.v_header')
    <div class="container" style="width: 95%;margin: 0px;padding: 0px;max-width: none;margin-right: 2.5%;margin-left: 2.5%;height: 70%;margin-bottom: 3%;">
    <section id="carousel" style="width: 100%;height: 100%;">
        <div class="carousel slide" data-ride="carousel" id="carousel-1" style="width: 100%;height: 100%;">
            <div class="carousel-inner" role="listbox" style="width: 100%;height: 100%;">
                <div class="carousel-item carousel-item-next carousel-item-left" style="width: 100%;height: 100%;">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="width: 100%;height: 100%;background-image: url(&quot;assets/img/1.jpg&quot;);">
                        <h1 class="hero-title">Heading</h1>
                        <p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec.<br></p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Baca Lebih Lanjut</a></p>
                    </div>
                </div>
                <div class="carousel-item" style="width: 100%;height: 100%;">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="width: 100%;height: 100%;background-image: url(&quot;assets/img/pcr_media20180720120852.JPG&quot;);">
                        <h1 class="hero-title">Heading</h1>
                        <p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Baca Lebih Lanjut</a></p>
                    </div>
                </div>
                <div class="carousel-item active carousel-item-left" style="width: 100%;height: 100%;">
                    <div class="jumbotron pulse animated hero-technology carousel-hero" style="width: 100%;height: 100%;background-image: url(&quot;assets/img/1604379649-stei-informatika.jpeg&quot;);">
                        <h1 class="hero-title">Heading</h1>
                        <p class="hero-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec.<br></p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#">Baca Lebih Lanjut</a></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1" class=""></li>
                <li data-target="#carousel-1" data-slide-to="2" class=""></li>
                </ol>
        </div>
    </section>
    </div>
    <div class="container" style="width: 100%;height: 50%;margin-bottom: 2%;padding: 0px;">
    <div class="card-group" style="width: 100%;height: 100%;">
        <div class="card" data-bs-hover-animate="pulse" style="height: 100%;width: 30%;margin-right: 1%;margin-left: 2%;">
            <div class="card-header d-flex align-items-md-center align-items-lg-center align-items-xl-center" style="width: 100%;height: 20%;">
                <h2>Visi Misi</h2>
            </div>
            <div class="card-body" style="width: 100%;height: 65%;">
                <p style="width: 100%;margin: 0px;height: 100%;font-size: 20px;">Visi Foya<br>Misi Foya</p>
            </div>
            <div class="card-footer d-xl-flex justify-content-xl-end align-items-xl-center" style="width: 100%;height: 15%;padding: 0px;padding-left: 0;padding-bottom: 1%;padding-right: 2%;"><button class="btn btn-primary" type="button">Baca Lebih Lanjut</button></div>
        </div>
        <div class="card" data-bs-hover-animate="pulse" style="height: 100%;width: 30%;margin-right: 1%;margin-left: 2%;">
            <div class="card-header d-flex align-items-md-center align-items-lg-center align-items-xl-center" style="width: 100%;height: 20%;">
                <h2>Pengumuman</h2>
            </div>
            <div class="card-body" style="width: 100%;height: 65%;">
                <p style="width: 100%;margin: 0px;height: 100%;font-size: 20px;">Ini Pengumuman</p>
            </div>
            <div class="card-footer d-xl-flex justify-content-xl-end align-items-xl-center" style="width: 100%;height: 15%;padding: 0px;padding-left: 0;padding-bottom: 1%;padding-right: 2%;"><button class="btn btn-primary" type="button">Baca Lebih Lanjut</button></div>
        </div>
        <div class="card" data-bs-hover-animate="pulse" style="height: 100%;width: 30%;margin-right: 1%;margin-left: 2%;">
            <div class="card-header d-flex align-items-md-center align-items-lg-center align-items-xl-center" style="width: 100%;height: 20%;">
                <h2>Kalender Akademik</h2>
            </div>
            <div class="card-body" style="width: 100%;height: 65%;">
                <p style="width: 100%;margin: 0px;height: 100%;font-size: 20px;">blablabla</p>
            </div>
            <div class="card-footer d-xl-flex justify-content-xl-end align-items-xl-center" style="width: 100%;height: 15%;padding: 0px;padding-left: 0;padding-bottom: 1%;padding-right: 2%;"><button class="btn btn-primary" type="button">Baca Lebih Lanjut</button></div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    @include('templates.v_footer')
  </body></html>