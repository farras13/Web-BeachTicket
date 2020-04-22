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

                        <h1 class="mt-4">Country</h1>
                       <br>

                  
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i><a href="<?= base_url(); ?>admin/country">DataTable Country</a>
                                <a href="<?= base_url(); ?>Admin/Country_add" class="btn btn-success float-right" title="Tambah Data"><i class="fa fa-plus"> </i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Negara</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Negara</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach($ngr as $vac): ?>
                                            <tr>
                                                <td><?= $vac->id_negara;  ?></td>
                                                <td><?= $vac->negara;  ?></td>
                                                <td>            
                                                    <a href="<?= base_url(); ?>Admin/Country_edt/<?=$vac->id_negara;?>" class="btn btn-warning" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-magic"></i></a>
                                                    <a  onclick="return confirm('Yakin Data ini dihapus?');" href="<?= base_url();?>Admin/del_country/<?=$vac->id_negara;?>" class="btn btn-danger btn-circle" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>