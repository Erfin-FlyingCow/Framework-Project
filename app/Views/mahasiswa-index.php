<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Data Post - santriKoding.com</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message');?>
                </div>
                    
                <?php endif ?>

                <a href="<?php echo base_url('mahasiswa/create') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                <a href="<?php echo base_url('/pdf/cetak') ?>" class="btn btn-md btn-secondary mb-3">PRINT</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>ANGKATAN</th>
                            <th>AKSI</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mahasiswa as $key => $b) : ?>
                            <tr>
                                <td><?php echo $b['nim'] ?></td>
                                <td><?php echo $b['nama'] ?></td>
                                <td><?php echo $b['kelas'] ?></td>
                                <td><?php echo $b['angkatan'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('mahasiswa/edit/'.$b['nim']) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                    <a href="<?php echo base_url('mahasiswa/delete/'.$b['nim']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                
                <?php echo $pager->links('mahasiswa', 'bootstrap_pagination') ?>
            </div>
            
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>