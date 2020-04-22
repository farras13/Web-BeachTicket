<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Report</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Report</li>
            </ol>
          
            <div class="row-justify-center" style="margin-left: 5%;margin-right: 5%; ">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Form Report</div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url(); ?>Admin/report">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Vacation</label>
                                    <select name="id" class="form-control " required="">
                                        <?php foreach ($vc as $k) : ?>
                                            <option value="<?= $k->id_vacation ?>"> <?= $k->nama_vacation ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="from date">From</label>
                                        <input class="form-control py-4" id="dateF" name="datef" type="date" placeholder="Enter date from" required="" /></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="to date">To</label>
                                        <input class="form-control py-4" id="dateT" name="datet" type="date" placeholder="Enter date to" required="" /></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Check</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-justify-center" style="margin-left: 5%;margin-right: 5%; ">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Report</div>
                        <div class="card-body">
                            <canvas id="bar" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>