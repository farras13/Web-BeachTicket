<div id="layoutSidenav_content">
      <br><br>
      <main>
      <div class="content">
        <div class="container-fluid">
          <div class="row-justify-center" style="margin-left: 15%;margin-right: 5%; ">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Vacation</h4>
                  <p class="card-category">Complete your Package</p>
                </div>
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" action="<?= base_url(); ?>Admin/edt_vacation" >
                    <h5>General</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vacation</label>
                          <input type="text" class="form-control" name="vacation" value="<?= $v->nama_vacation; ?>" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga</label>
                          <input type="numeric" class="form-control" name="harga" value=" <?= $v->harga; ?> " required="">
                        </div>
                      </div>                      
                    </div>
                    <h5>Map</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lat</label>
                          <input type="text" class="form-control" name="lat" value="<?= $v->lat; ?>" required=""> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lang</label>
                          <input type="text" class="form-control" name="lang" value="<?= $v->lang; ?>" required="">
                        </div>
                      </div>
                    </div>
                    <h5>Konten</h5>
                    <div class="col-md-12">
                        <div class="form-group">

                          <label class="bmd-label-floating">Konten</label>
                          <textarea name="editor" id="editor"><?= $v->konten_vacation; ?></textarea>
                           
                        </div>
                    </div>
                     
                    <h5>Gambar Utama</h5>
                    <div class="col-md-12">
                       
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Example file input</label>
                          <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                    </div>
                    <input type="hidden" name="id_vct" value="<?php echo $v->id_vacation; ?>">
                    <button type="submit" class="btn btn-primary col-md-12">Edit Vacation</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

