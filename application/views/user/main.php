    <?php if ($this->session->flashdata('flash-data')) :  ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <?= $this->session->flashdata('flash-data'); ?> </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Malang</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#a" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Malang</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>Malang</h3>
                                <p>Pixel perfect design with awesome contents</p>
                                <a href="#" class="boxed-btn3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- slider_area_end -->

    <!-- where_togo_area_start  -->
    <div class="where_togo_area" id="a">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>Where you want to go?</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="search_wrap">
                        <form class="search_form" method="post" action="<?= base_url(); ?>home/search">

                            <div class="input_field">
                                <input name="nm_vct" id="nm_vct" placeholder="tuliskan destinasi">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->

    <!-- popular_destination_area_start  -->
    <!-- <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Popular Destination</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>

            <div class="row">
             <?php foreach ($vacation as $p) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="<?= base_url(); ?>assets/img/destination/1.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center"><?php echo $p->nama_vacation ?> <br> <a href="<?= base_url() ?>home/detail/<?= $p->id_vacation ?>"> Details</a> </p>
                        </div>

                    <a class="btn btn-warning btn-block" href="<?= base_url() ?>home/pesan/<?= $p->id_vacation ?>">Booking</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div> -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Popular Places</h3>
                        <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $n = 0;
                foreach ($vacation as $p) : ?>
                    <?php
                    if (empty($count)) {
                        $a = false;
                    } else if ($count[$n]['id_vacation'] != $p->id_vacation) {
                        $a = true;
                    } else {
                        $a = false;
                    }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <?php if ($p->gambar_vacation != null) : ?>
                                    <img height="200" width="150" src="<?= base_url() . '/upload/' . $p->gambar_vacation;  ?>" alt="">
                                <?php else : ?>
                                    <img src="<?= base_url(); ?>assets/img/place/1.png" alt="">
                                <?php endif ?>
                                <a href="#" class="prise">Rp.<?= $p->harga; ?></a>
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url() ?>home/detail/<?= $p->id_vacation ?>">
                                    <h3><?= $p->nama_vacation; ?></h3>
                                </a>
                                <p><?= $p->keterangan_vacation; ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <?php if (!empty($count)) : ?>
                                            <?php if ($count[$n]['id_vacation'] == $p->id_vacation) : ?>
                                                <?php if ($count[$n]['c'] < 15) : ?>
                                                    <p>Status : normal (<?= $count[$n]['c']; ?> pengunjung)</p>
                                                <?php elseif ($count[$n]['c'] < 60) : ?>
                                                    <p>Status : Cukup (<?= $count[$n]['c']; ?> pengunjung)</p>
                                                <?php else : ?>
                                                    <p>Status : Full (<?= $count[$n]['c']; ?> pengunjung)</p>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <p>Status : Sepi (0 pengunjung)</p>
                                            <?php endif ?>
                                        <?php else : ?>
                                            Status : Sepi (0 Pengunjung)
                                        <?php endif ?>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#"><?= date("d/m/y"); ?></a>
                                    </div>
                                </div>
                                <br>
                                <a class="btn btn-primary float-right" style="margin-bottom: 20px;" href="<?= base_url() ?>home/detail/<?= $p->id_vacation ?>">Detail</a>
                                <a class="btn btn-danger float-right" style="margin-right: 10px; margin-bottom: 20px" href="<?= base_url() ?>home/pesan/<?= $p->id_vacation ?>">Booking</a>
                            </div>
                        </div>
                    </div>
                <?php
                    $cc = count($count) - 1;
                    if ($n < $cc && $a == false) {
                        $n++;
                    } else {
                        $n = $n;
                    }
                endforeach;
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4" href="<?= base_url(); ?>home/destination">More Places</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Enjoy Video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="travel_variation_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="img/svg_icon/1.svg" alt="">
                        </div>
                        <h3>Comfortable Journey</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="img/svg_icon/2.svg" alt="">
                        </div>
                        <h3>Luxuries Hotel</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="img/svg_icon/3.svg" alt="">
                        </div>
                        <h3>Travel Guide</h3>
                        <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 -->
    <!-- testimonial_area  -->
    <!-- <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Micky Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Tom Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Jerry Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /testimonial_area  -->


    <!--     <div class="recent_trip_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Recent Trips</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/1.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/2.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/3.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->