<div class="container">
    <div class="col-xs-10">
        <section class="content">
            <div class="row">

            </div>
            <div class="row">
                <form name="frmbuku" method="post" action="<?php base_url(); ?>/buku/simpan_edit" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">KODE BUKU</label>
                            <input type="text" class="form-control" id="" value="<?php echo $buku->kode_buku; ?>" name="kode_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="">JUDUL BUKU</label>
                            <input type="text" class="form-control" id="" value="<?php echo $buku->judul_buku; ?>" name="judul_buku" required>
                        </div>
                        <div class="">
                            <label for="Pilih Kategori">KATEGORI BUKU</label>
                            <select name="kategori" id="" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Programming" <?php if ($buku->kategori_buku == "Programming") echo "selected";  ?>>Programming</option>
                                <option value="PHP" <?php if ($buku->kategori_buku == "PHP") echo "selected"; ?>>PHP</option>
                                <option value="Elektronik" <?php if ($buku->kategori_buku == "Elektronik") echo "selected"; ?>>Elektronik</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="">SAMPUL</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="<? echo $buku->cover_buku; ?>" name="sampul">
                                    <label class="custom-file-label" for="InputFile">jpg/png</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="box-footer col-12 pb-3 justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

</div>