<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'config.php';
    $db = new Database();

    ?>
    <h3> Tambah Data Peminjam </h3>
    <form action ="simpan_data_peminjam.php" method ="post">
        <table>
            <tr>
                <td>Kode Peminjam</td>
                <td><input type="text" name="kode_peminjam"><td>
            </tr>

            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_peminjam"><td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="--"></option>
                        <?php
                        $no = 1;
                        foreach($db->tampil_data_jenis_kelamin() as $x){
                            echo '<option value="'.$x['kode_jk'].'">'.$x['keterangan_jk'].'</option>';
                            ?>
                            <?php
                            }
                            ?>
                            </select>
                     
                </td>
                
            </tr>


            <tr>
                <td> Tanggal lahir </td>
                <td> <input type="date" name ="tanggal_lahir"></td>
            </tr>
            <tr>
                <td> Alamat </td>
                <td> <textarea name ="alamat"></textarea></td>
            </tr>

            <tr>
                <td> Pekerjaan </td>
                <td> <input type="text" name ="pekerjaan"></td>
            </tr>

            <tr>
                <td></td>
                <td> <input type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>