<div id="layoutSidenav_content">
<main><br><br>
<div class="content">
        <div class="container-fluid">
          <div class="row-justify-center" style="margin-left: 15%;margin-right: 5%; ">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit user</h4>
                  <p class="card-category">Complete your Package</p>
                </div>
                <div class="card-body"> 
                <form method="post" action="<?= base_url(); ?>admin/edt_user/">
                    <div class="form-row">
                        <div class="col-md-6">
                             <input type="hidden" readonly value="<?=$usr->id_auth;?>" name="id_usr" class="form-control" >
                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Full Name</label><input class="form-control py-4" id="inputFirstName" name="nama" type="text" value="<?= $usr->nama; ?>" required=""/></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="small mb-1" for="inputLastName">User Name</label><input class="form-control py-4" id="inputLastName" name="username" type="text" value="<?= $usr->username; ?>" required=""/></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" value="<?= $usr->email; ?>" required=""/>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4" id="inputPassword" name="pass" type="password" value="<?= $usr->password; ?>"  required=""/>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="negara">Negara</label>
                                <select name="id" class="form-control " required="">
                                <?php foreach ($ngr as $k) : ?>
                                    <option <?php if($k->id_negara == $usr->id_negara){ echo 'selected="selected"'; } ?> value="<?php echo $k->id_negara ?>"><?php echo $k->negara?> </option>
                                <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputLevel">Level</label>
                        <input class="form-control py-4" id="inputlevel" name="level" type="number"max="1" min="0" value="<?= $usr->level ?>" required=""/>
                    </div>
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Edit Account</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</main>