<div id="layoutSidenav_content">
      <br><br>
      <main>
      <div class="content">
        <div class="container-fluid">
          <div class="row-justify-center" style="margin-left: 15%;margin-right: 5%; ">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Booking</h4>
                  <p class="card-category">Complete your Package</p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/add_booking" >
                   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vacation</label>
                            <select name="id_vacation" id="id_vacation" class="form-control " required="">
                                <?php 
                                $jsArray = "var harga = new Array();";
                                foreach ($v as $k) : ?>
                                    <option value="<?= $k->id_vacation ?>"> <?= $k->nama_vacation ?> </option>
                                  <?php $jsArray .= "harga['" . $row['nama_vacation'] . "'] = '" . addslashes($row['harga']) . "';"; ?>
                                <?php endforeach ?>

                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">harga </label>
                          <input type="numeric" class="form-control" name="harga" id="harga" value=" " required="">
                        </div>
                      </div>                  
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jumlah </label>
                          <input type="numeric" class="form-control" name="jumlah" value=" " required="">
                        </div>
                      </div>    
                    </div>
                  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Booking</label>
                          <input type="date" class="form-control" name="lat" value=" " required=""> 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">No debit</label>
                          <input type="numeric" class="form-control" name="debit" value=" " required="">
                        </div>
                      </div>
                    </div>
                   
                     
                    
                    <button type="submit" class="btn btn-primary col-md-12">Tambah Package</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
