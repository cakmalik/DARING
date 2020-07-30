<body>
    <form action="<?= base_url('wamur/aksiEmbed/' . $kategori) ?>" method="POST">
        <input name="judul" type="text" placeholder="Masukan judul" class="form-control mb-2">
        <input name="ket" type="text" placeholder="Masukan Keterangan" class="form-control mb-2">
        <textarea name="kode" type="text" placeholder=" Masukan URL Youtube" class="form-control"></textarea>

        <div class="row mt-3    ">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </div>
    </form>
</body>