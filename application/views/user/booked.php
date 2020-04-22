<div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h1>Booked</h1>
                        <!-- <h3>Popular Places</h3> -->
                        <!-- <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($vacation as $p) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <?php if ($p->qr_code != null): ?>
                                <img height="250" width="250" src="<?= base_url().'assets/uploads/'.$p->qr_code;  ?>" alt="">
                            <?php else: ?>
                                <img src="<?= base_url(); ?>assets/img/place/1.png" alt="">
                            <?php endif ?>
                        </div>
                        <div class="place_info">
                            <p><?= $p->nama_vacation; ?></p>
                            <!-- <p><?= $count->asw; ?></p> -->
                            <div class="rating_days d-flex justify-content-between">
                                <div class="days">
                                    <i class="fa fa-clock-o"></i>
                                    <a href="#"><?= date('d-m-Y',strtotime($p->tanggal_booking)); ?></a>
                                </div>
                            </div>
                            <br>

                             <a class="btn btn-danger float-right" style="margin-bottom: 20px;" href="<?= base_url() ?>home/pesan/<?= $p->id_booking ?>">Delete</a>
                            <a class="btn btn-primary float-right" style="margin-right: 10px; margin-bottom: 20px" href="<?= base_url() ?>home/lakukan_download/<?= $p->id_booking ?>">Save</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>