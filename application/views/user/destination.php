<div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h1>Destination</h1>
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
                            <?php if ($p->gambar_vacation != null): ?>
                                <img height="200" width="150" src="<?= base_url().'/upload/'.$p->gambar_vacation;  ?>" alt="">
                            <?php else: ?>
                                <img src="<?= base_url(); ?>assets/img/place/1.png" alt="">
                            <?php endif ?>
                            <a href="#" class="prise">Rp.<?= $p->harga; ?></a>
                        </div>
                        <div class="place_info">
                            <a href="<?= base_url() ?>home/detail/<?= $p->id_vacation ?>"><h3><?= $p->nama_vacation; ?></h3></a>
                            <p><?= $p->keterangan_vacation; ?></p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <a href="#">(20 Review)</a>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>