<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Bagian</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            $id = $_GET['id'];
            echo $id;
            $findSQL = "SELECT * FROM bagian WHERE id = ?";
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($findSQL);
            $statement->bindParam(1, $id);
            $statement->execute();
            $data = $statement->fetch();

            if (isset($_POST['button_simpan'])) {
                $id = $_POST['id'];
                $nik = $_POST['nik'];
                $nama_karyawan = $_POST['nama_karyawan'];
                $alamat = $_POST['alamat'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $divisi = $_POST['divisi'];
                $jabatan = $_POST['jabatan'];

                $updateSQL = "UPDATE `bagian` SET `nik` = ?, `nama_karyawan` = ?, `alamat` = ?, `jenis_kelamin` = ?, `divisi` = ?, `jabatan` = ? WHERE `bagian`.`id` = ?";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama_karyawan);
                $statement->bindParam(3, $alamat);
                $statement->bindParam(4, $jenis_kelamin);
                $statement->bindParam(5, $divisi);
                $statement->bindParam(6, $jabatan);
                $statement->bindParam(7, $id);
                $statement->execute();
                header('Location: main.php?page=bagian');
            }
            ?>
        </div>
    </div>
    <div>
        <form action="" method="post">
            <!-- <div class="mb-3">
                <label for="id" class="form-label">Id Karyawan</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            </div> -->
            <input type="hidden"  id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $data['nama_karyawan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin1" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? " checked" : "" ?> required>
                <label class="form-check-label" for="jenis_kelamin1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? " checked" : "" ?> id="jenis_kelamin2">
                <label class="form-check-label" for="jenis_kelamin2">
                    Perempuan
                </label>
            </div>
            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <select class="form-select" aria-label="Default select example" name="divisi" required>
                    <option value="">Pilih Divisi</option>
                    <option value="Divisi Produksi" <?php echo ($data['divisi'] == 'Divisi Produksi') ? " selected" : "" ?>>Divisi Produksi</option>
                    <option value="Divisi Pemasaran" <?php echo ($data['divisi'] == 'Divisi Pemasaran') ? " selected" : "" ?>>Divisi Pemasaran</option>
                    <option value="Divisi Personalia" <?php echo ($data['divisi'] == 'Divisi Personalia') ? " selected" : "" ?>>Divisi Personalia</option>
                    <option value="Divisi Pembalanjaan" <?php echo ($data['divisi'] == 'Divisi Pembalanjaan') ? " selected" : "" ?>>Divisi Pembalanjaan</option>
                    <option value="Divisi Umum" <?php echo ($data['divisi'] == 'Divisi Umum') ? " selected" : "" ?>>Divisi Umum</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="jabatan" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Ketua Pimpinan" <?php echo ($data['jabatan'] == 'Ketua Pimpinan') ? " selected" : "" ?>>Ketua Pimpinan</option>
                    <option value="Wakil Ketua" <?php echo ($data['jabatan'] == 'Wakil Ketua') ? " selected" : "" ?>>Wakil Ketua</option>
                    <option value="Sekretaris" <?php echo ($data['jabatan'] == 'Sekretaris') ? " selected" : "" ?>>Sekretaris</option>
                    <option value="Bendahara" <?php echo ($data['jabatan'] == 'Bendahara') ? " selected" : "" ?>>Bendahara</option>
                    <option value="Staff" <?php echo ($data['jabatan'] == 'Staff') ? " selected" : "" ?>>Staff</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main>