<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku:</title>

</head>

<body>

    <div class="col-xs-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detail Buku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Kode Buku</td>
                            <td><?php echo $buku->kode_buku; ?></td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td><?php echo $buku->judul_buku; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori Buku</td>
                            <td><?php echo $buku->kategori_buku; ?></td>
                        </tr>
                        <tr>
                            <td>Sampul</td>
                            <td><?php echo $buku->cover_buku; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>



</body>

</html>