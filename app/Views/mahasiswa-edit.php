<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Edit Data - santriKoding.com</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('mahasiswa/update/'.$mahasiswa['nim']) ?>" method="POST">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" value="<?php echo $mahasiswa['nim']; ?>" readonly placeholder="Masukkan NIM">
                            </div>
                            <div class="form-group">
                                <label>NAMA</label>
                               <textarea class="form-control" name="nama" rows="4" placeholder="Masukkan nama"></textarea>
                            </div>
                            <div class="form-group">
                                <label>KELAS</label>
                               <textarea class="form-control" name="kelas" rows="4" placeholder="Masukkan kelas"></textarea>
                            </div>
                            <div class="form-group">
                                <label>ANGKATAN</label>
                               <textarea class="form-control" name="angkatan" rows="4" placeholder="Masukkan angkatan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>
                </div>
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