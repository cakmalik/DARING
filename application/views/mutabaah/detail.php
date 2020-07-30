<body>
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-star mr-1"></i>
                        Dikerjakan
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <?php
                    //pecahkan array nya
                    $id_exp = explode(',', $jenis_muta->id_kategori);
                    //looping array nya
                    for ($i = 0; $i < count($id_exp); $i++) {
                        //kemudian tiap nilainya di ambil nama kategori di tabel kategori_mutabaah
                        $n = $this->db->get_where('99_kategori_mutabaah', ['id_kategori' => $id_exp[$i]])->row();
                        // echo '<br>';
                        echo '<i class="fas fa-star"></i>  ' . $n->nama_kategori . '<br>';
                    };
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-header bg-primary">
                    <h3 class="card-title">
                        <i class="fas fa-star-half-alt mr-1"></i>
                        Dilupakan
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <?php
                    //pecahkan array nya
                    $id_exp = explode(',', $jenis_muta->id_kategori);

                    $this->db->where_not_in('id_kategori', $id_exp);
                    $not = $this->db->get('99_kategori_mutabaah')->result();
                    foreach ($not as $nm) {
                        echo '<i class="fas fa-star-half-alt"></i>    ' . $nm->nama_kategori . '<br>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>