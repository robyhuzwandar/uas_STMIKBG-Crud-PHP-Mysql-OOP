<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/Config.php');
?>

<?php

class Pegawai
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new Config();
    }

    public function getAllPegawai()
    {
        $query = "SELECT * FROM  pegawai";
        $result = $this->dbc->excute($query);
        return $result;
    }

    public function insertPegawai($data, $file)
    {
        $nama = mysqli_real_escape_string($this->dbc->link, $data['nama']);
        $alamat = mysqli_real_escape_string($this->dbc->link, $data['alamat']);
        $jk = mysqli_real_escape_string($this->dbc->link, $data['jk']);
        $nohp = mysqli_real_escape_string($this->dbc->link, $data['nohp']);
        $email = mysqli_real_escape_string($this->dbc->link, $data['email']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['foto']['name']; //nama gambar
        $file_size = $_FILES['foto']['size']; //ukuran gambar
        $file_temp = $_FILES['foto']['tmp_name']; //

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "images/" . $unique_image;

        if ($file_size > 1048567) {
            echo "<span style='color:red;'> Ukuran Gambar tkodeBukuak boleh lebih dari 1MB </span>";
        } else if (in_array($file_ext, $permited) == false) {
            echo "<span class='succes'>Hanya bisa Upload Gambar dengan type : -" . implode(', ', $permited) . "</span>";
        } else {
            move_uploaded_file($file_temp, "../" . $upload_image);
            $query = "INSERT INTO pegawai(nama, alamat, jk, nohp, email, foto)
            VALUES('$nama', '$alamat', '$jk', '$nohp', '$email','$upload_image')";
            $insert_row = $this->dbc->excute($query);
            if ($insert_row) {
                $msg = "<span style='color:green;'> Pegawai Berhasil di simpan </span>";
                return $msg;
            } else {
                $msg = "<span style='color:red;'> Pegawai Gagal di simpan </span>";
                return $msg;
            }
        }
    }

    public function updatePegawai($data, $file, $id)
    {
        $nama = mysqli_real_escape_string($this->dbc->link, $data['nama']);
        $alamat = mysqli_real_escape_string($this->dbc->link, $data['alamat']);
        $jk = mysqli_real_escape_string($this->dbc->link, $data['jk']);
        $nohp = mysqli_real_escape_string($this->dbc->link, $data['nohp']);
        $email = mysqli_real_escape_string($this->dbc->link, $data['email']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['foto']['name']; //nama gambar
        $file_size = $_FILES['foto']['size']; //ukuran gambar
        $file_temp = $_FILES['foto']['tmp_name']; //

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "images/" . $unique_image;

        if (!empty($file_name)) {
            if ($file_size > 1048567) {
                echo "<span style='color:red;'> Ukuran Gambar tkodeBukuak boleh lebih dari 1MB </span>";
            } else if (in_array($file_ext, $permited) == false) {
                echo "<span class='succes'>Hanya bisa Upload Gambar dengan type : -" . implode(', ', $permited) . "</span>";
            } else {
                move_uploaded_file($file_temp, "../" . $upload_image);
                $query = "UPDATE  pegawai SET
			    	nama = '$nama', 
			    	alamat = '$alamat', 
			    	jk = '$jk', 
			    	nohp = '$nohp', 
			    	email = '$email', 
			    	foto = '$upload_image'
			    	WHERE id='$id'";
                $insert_row = $this->dbc->excute($query);
                if ($insert_row) {
                    $msg = "<span style='color:green;'> Buku Berhasil di simpan </span>";
                    return $msg;
                } else {
                    $msg = "<span style='color:red;'> Buku Gagal di simpan </span>";
                    return $msg;
                }
            }
        } else {
            $query = "UPDATE  pegawai SET
			    	nama = '$nama', 
			    	alamat = '$alamat', 
			    	jk = '$jk', 
			    	nohp = '$nohp', 
			    	email = '$email'
			    	WHERE id='$id'";
            $insert_row = $this->dbc->excute($query);
            if ($insert_row) {
                $msg = "<span style='color:green;'> Data Pegawai Berhasil di Update </span>";
                return $msg;
            } else {
                $msg = "<span style='color:red;'> Data Pegawai Gagal di Update </span>";
                return $msg;
            }
        }
    }

    public function getBukuById($id)
    {
        $query = "SELECT * FROM pegawai WHERE id ='$id'";
        $result = $this->dbc->excute($query);
        return $result;
    }

    public function delPegawaiById($id)
    {
        $bk = self::getBukuById($id);
        $data = $bk->fetch_assoc();
        $delImage = unlink("../" . $data['foto']);

        if (isset($delImage)) {
            $query = "DELETE FROM pegawai WHERE id='$id'";
            $delete_row = $this->dbc->excute($query);
            if ($delete_row) {
                $msg = "<span style='color:green'>Data Berhasil di Hapus </span>";
                return $msg;
            } else {
                $msg = "<span style='color:red;'>Data Gagal di Hapus </span>";
                return $msg;
            }
        }
    }

    public function pagination($star_from, $per_page)
    {
        $query = "SELECT * FROM pegawai limit $star_from, $per_page";
        $result = $this->dbc->excute($query);
        return $result;
    }

    public function pencarian($key)
    {
        $query = "SELECT * FROM pegawai WHERE nama  LIKE '%$key%' ";
        $result = $this->dbc->excute($query);
        return $result;
    }

}

?>