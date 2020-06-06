    <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="contact_join">
                       
                    <div class="contact_join">
                        <h3>Save Barcode</h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_input">    
                                       <img height="250" width="250" src="<?= base_url().'assets/uploads/'.$image_name;  ?>">
                                    </div>
                                    <div>
                                        <h4><?=$qr; ?></h4>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="submit_btn">
                                        <a class="btn boxed-btn4 btn-block" href="<?= base_url();?>transaksi/download/<?=$image_name?>" >Save</a>
                                        <a class="btn btn-warning btn-block" href="<?= base_url(); ?>" ><STRONG>Go Back</STRONG></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>