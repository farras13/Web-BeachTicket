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
                  <form method="post" action="<?= base_url(); ?>Admin/add_country">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Negara</label>
                          <input type="text" class="form-control" name="negara" value="" required="">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Tambah Package</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
