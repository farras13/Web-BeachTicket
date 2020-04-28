<div class="destination_banner_wrap overlay">
    <div class="destination_text text-center">
        <h3><?= $p->nama_vacation; ?></h3>
        <p>Pixel perfect design with awesome contents</p>
    </div>
</div>

<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="contact_join">
                    <h3>Form Booking</h3>
                    <form method="post" action="<?= base_url(); ?>home/detail_pesanan">
                        <div class="row">
                            <!--  <h4>Data Pembayaran</h4> -->
                            <!-- <div class="col-lg-12">
                                    <div class="single_input">
                                        <label>No Rekening</label>
                                        <input type="number"  name="norek" placeholder="Masukkan no Rekening anda" required="">
                                    </div>
                                </div> -->
                            <!-- <h4>Data user</h4>
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
                                </div> -->
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
                                    <input placeholder="masukkan tanggal" type="text" class="form-control datepicker " id="tanggal" name="tanggal" required>
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
                                    <input type="number" name="qty" min="1" placeholder="1" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="single_input">
                                    <button class="boxed-btn4 btn-block" type="submit">Booking</button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <a class="btn btn-warning btn-block" href="javascript:history.go(-1)"><strong>Go Back</strong></a>
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