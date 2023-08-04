<div class="container">
    <section class="content">
        <div class="row">
            <h2><?php echo $judul; ?></h2>
        </div>
        <div class="row">
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/buku/simpan" entype"multipart/formdata">
                <div class="form-group">
                    <label> Kode Buku</label>
                    <input type="text" class="form-control" name="kode_buku">
                </div>
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku">
                </div>
                <div class="form-group">
                    <label>Kategori Buku</label>
                    <select class="form-control" name="kategori">
                        <option value="">Pilih</option>
                        <option value="Programing">Programming</option>
                        <option value="PHP">PHP</option>
                        <option value="Elektronik">Elektronik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sampul Buku</label>
                    <input type="text" class="form-control" name="sampul">
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>
</div>