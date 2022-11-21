<?php
class database{
    //properti
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "sewa_buku";
    var $koneksi = "";
    //method
    function __construct(){
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal :" . mysqli_connect_error();
        }
    }

    function tampil_data()
    {
        $data = mysqli_query($this->koneksi,"select a.*, b.* from data_peminjam a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin");
        while ($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tampil_data_jenis_kelamin(){
        $data_jenis_kelamin = mysqli_query($this->koneksi, "select *from jenis_kelamin");
        while($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)){
            $hasil_jenis_kelamin[]=$row_jenis_kelamin;

        }
        return $hasil_jenis_kelamin;
    }
    function tambah_data_peminjam($kode_peminjam,$nama_peminjam,$jenis_kelamin,$tanggal_lahir,$alamat,$pekerjaan)
    {
        mysqli_query($this->koneksi,"insert into data_peminjam (id,kode_peminjam,nama_peminjam,jenis_kelamin,tanggal_lahir,alamat,pekerjaan) values('','$kode_peminjam','$nama_peminjam','$jenis_kelamin','$tanggal_lahir','$alamat','$pekerjaan')");
    }
    function kode_peminjam($kode_peminjam){
        $data_peminjam = mysqli_query($this->koneksi,"select a.*, b.* from data_peminjam a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin where a.kode_peminjam='$kode_peminjam'");
        while($row_peminjam = mysqli_fetch_assoc($data_peminjam)){
            $hasil_peminjam[] = $row_peminjam;
                }
                return $hasil_peminjam;
    }
    function edit_data_peminjam($kode_peminjam,$nama_peminjam,$jenis_kelamin,$tanggal_lahir,$alamat,$pekerjaan)
    {
        mysqli_query($this->koneksi,"UPDATE data_peminjam set nama_peminjam= '$nama_peminjam',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',alamat='$alamat',pekerjaan='$pekerjaan' where kode_peminjam = $kode_peminjam");

    }
    function hapus_data_peminjam($kode_peminjam)
    {
        mysqli_query($this->koneksi,"DELETE from data_peminjam WHERE kode_peminjam = '$kode_peminjam'");
    }
    
}
?>