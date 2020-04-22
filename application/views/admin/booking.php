<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                      <?php if($this->session->flashdata('flash-data') ):  ?>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong> <?= $this->session->flashdata('flash-data'); ?> </strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            </div>
                        </div>
                      <?php endif; ?>

                        <h1 class="mt-4">Users</h1>
                       <br>

                  
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i><a href="<?= base_url(); ?>admin/Booking">DataTable Booking</a>
                                <a href="<?= base_url(); ?>Admin/Booking_add" class="btn btn-success float-right" title="Tambah Data"><i class="fa fa-plus"> </i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>user</th>
                                                <th>vacation</th>
                                                <th>qty</th>
                                                <th>tanggal</th>
                                                <th>jam</th>
                                                <th>debit</th>
                                                <th>totalharga</th>
                                                <th>Qrcode</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>no</th>
                                                <th>user</th>
                                                <th>vacation</th>
                                                <th>qty</th>
                                                <th>tanggal</th>
                                                <th>jam</th>
                                                <th>debit</th>
                                                <th>totalharga</th>
                                                <th>Qrcode</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $n=1; foreach($bk as $vac): ?>
                                            <tr>
                                                <td><?= $n; ?></td>
                                                <td><?= $vac->username; ?></td>
                                                <td><?= $vac->nama_vacation; ?></td>
                                                <td><?= $vac->jumlah;  ?></td>
                                                <td><?= date("d-m-Y", strtotime($vac->tanggal_booking)); ?></td>
                                                <td><?= date("H:i", strtotime($vac->tanggal_booking)); ?></td>
                                                <td><?= $vac->no_debit;  ?></td>
                                                <td>Rp. <?= $vac->totalharga; ?></td>
                                                <td>
                                                    <?php if (empty($vac->qr_code)): ?>
                                                        silahkan update
                                                    <?php else: ?>
                                                        <img height="150" width="150" src="<?= base_url().'assets/uploads/'.$vac->qr_code;  ?>">
                                                    <?php endif ?>
                                                </td>
                                                <td>            
                                                    <a href="<?= base_url(); ?>Admin/booking_edt/<?=$vac->id_booking;?>" class="btn btn-warning" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-magic"></i></a>
                                                    <a  onclick="return confirm('Yakin Data ini dihapus?');" href="<?= base_url();?>Admin/del_booking/<?=$vac->id_booking;?>" class="btn btn-danger btn-circle" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $n++; endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>