<div class="destination_banner_wrap overlay">
        <div class="destination_text text-center">
            <h3><?=  $p->nama_vacation; ?></h3>
            <p>Pixel perfect design with awesome contents</p>
        </div>
    </div>

    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                        <h3>Confrim data Booking</h3>
                        <form method="post" action="<?= base_url(); ?>transaksi">
                            <div class="row">
                                <h4>Data Pembayaran</h4>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>No Rekening</label>
                                        <input type="number"  min="8" name="norek" placeholder="Masukkan no Rekening anda" required="">
                                    </div>
                                </div>
                                <h4>Data user</h4>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>Nama</label>
                                        <input type="text" value="<?= $userdata['nama']; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>Email</label>
                                        <input type="text" value="<?= $userdata['email']; ?>" readonly="">
                                    </div>
                                </div>
                                <h4>Data Vacation</h4>
                                 <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>Vacation</label>
                                        <input type="text" name="id_vct" value="<?= $p->id_vacation; ?>" hidden>
                                        <input type="text" name="vct" value="<?= $p->nama_vacation; ?>" readonly="">
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>Tanggal</label>
                                        <?php if ($dt != null): ?>
                                            <input type="text" name="tanggal" value="<?=$dt?>"  readonly="">
                                        <?php else: ?>
                                            <input type="text" name="tanggal" value="<?= date("d M Y"); ?>"  readonly="">   
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>harga</label>
                                        <input type="number" name="harga" value="<?= $p->harga; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>Amount</label>
                                        <?php if ($qty == null): ?>
                                            <input type="number" name="qty" value="1" readonly="">
                                        <?php else: ?>   
                                            <input type="number" name="qty" value="<?= $qty; ?>" readonly="">
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <button class="boxed-btn4 btn-block" type="submit">Booking</button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_input">
                                        <a class="btn btn-warning btn-block" href="<?= base_url(); ?>"><strong>Go Back</strong></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="bordered_1px"></div>
                    
            </div>
        </div>
    </div>

    