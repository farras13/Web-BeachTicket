<div id="layoutSidenav_content">
<main><br><br>
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
                <form method="post" action="<?= base_url(); ?>admin/add_user/">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Full Name</label><input class="form-control py-4" id="inputFirstName" name="nama" type="text" placeholder="Enter first name" required=""/></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="small mb-1" for="inputLastName">User Name</label><input class="form-control py-4" id="inputLastName" name="username" type="text" placeholder="Enter last name" required=""/></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required=""/>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4" id="inputPassword" name="pass" type="password" placeholder="Enter password" required=""/>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="negara">Negara</label>
                            <select name="id" class="form-control " required="">
                                <?php foreach ($ngr as $k) : ?>
                                    <option value="<?= $k['id_negara'] ?>"> <?= $k['negara'] ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputLevel">Level</label>
                        <input class="form-control py-4" id="inputlevel" name="level" type="number"max="1" min="0" placeholder="Enter Level" required=""/>
                    </div>
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Create Account</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</main>
