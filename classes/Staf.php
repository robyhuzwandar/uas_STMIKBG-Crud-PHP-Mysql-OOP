<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/Config.php');
?>

<?php

class Staf
{
    private $dbc;

    public function __construct()
    {
        $this->dbc = new Config();
    }

    public function getAllStaf()
    {
        $query = "SELECT * FROM  staf";
        $result = $this->dbc->excute($query);
        return $result;
    }

    public function insertStaf($data, $file)
    {
        $nama = mysqli_real_escape_string($this->dbc->link, $data['nama']);
        $alamat = mysqli_real_escape_string($this->dbc->link, $data['alamat']);
        $jk = mysqli_real_escape_string($this->dbc->link, $data['jk']);
        $nohp = mysqli_real_escape_string($this->dbc->link, $data['nohp']);
        $email = mysqli_real_escape_string($this->dbc->link, $data['email']);
        $password = mysqli_real_escape_string($this->dbc->link, $data['password']);
        $role = mysqli_real_escape_string($this->dbc->link, $data['role']);

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
            $query = "INSERT INTO staf(nama, alamat, jk, nohp, email, password,role, foto)
            VALUES('$nama', '$alamat', '$jk', '$nohp', '$email','$password','$role','$upload_image')";
            $insert_row = $this->dbc->excute($query);
            if ($insert_row) {
                $msg = "<span style='color:green;'> Staf Berhasil di simpan </span>";
                return $msg;
            } else {
                $msg = "<span style='color:red;'> Staf Gagal di simpan </span>";
                return $msg;
            }
        }
    }

    public function insertStafOut($data, $file)
    {
        $nama = mysqli_real_escape_string($this->dbc->link, $data['nama']);
        $alamat = mysqli_real_escape_string($this->dbc->link, $data['alamat']);
        $jk = mysqli_real_escape_string($this->dbc->link, $data['jk']);
        $nohp = mysqli_real_escape_string($this->dbc->link, $data['nohp']);
        $email = mysqli_real_escape_string($this->dbc->link, $data['email']);
        $password = mysqli_real_escape_string($this->dbc->link, $data['password']);
        $role = mysqli_real_escape_string($this->dbc->link, $data['role']);

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
            move_uploaded_file($file_temp, $upload_image);
            $query = "INSERT INTO staf(nama, alamat, jk, nohp, email, password,role, foto)
            VALUES('$nama', '$alamat', '$jk', '$nohp', '$email','$password','$role','$upload_image')";
            $insert_row = $this->dbc->excute($query);
            if ($insert_row) {
                $msg = "<span style='color:green;'> Staf Berhasil di simpan </span>";
                return $msg;
            } else {
                $msg = "<span style='color:red;'> Staf Gagal di simpan </span>";
                return $msg;
            }
        }
    }

    public function updateStaf($data, $file, $id)
    {
        $nama = mysqli_real_escape_string($this->dbc->link, $data['nama']);
        $alamat = mysqli_real_escape_string($this->dbc->link, $data['alamat']);
        $jk = mysqli_real_escape_string($this->dbc->link, $data['jk']);
        $nohp = mysqli_real_escape_string($this->dbc->link, $data['nohp']);
        $email = mysqli_real_escape_string($this->dbc->link, $data['email']);
        $role = mysqli_real_escape_string($this->dbc->link, $data['role']);

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
                $query = "UPDATE  staf SET
			    	nama = '$nama', 
			    	alamat = '$alamat', 
			    	jk = '$jk', 
			    	nohp = '$nohp', 
			    	email = '$email', 
			    	role = '$role', 
			    	foto = '$upload_image'
			    	WHERE id='$id'";
                $insert_row = $this->dbc->excute($query);
                if ($insert_row) {
                    echo "<script>window.location='listStaf.php'</script>";
                } else {
                    $msg = "<span style='color:red;'> Staf Gagal di simpan </span>";
                    return $msg;
                }
            }
        } else {
            $query = "UPDATE  staf SET
			    	nama = '$nama', 
			    	alamat = '$alamat', 
			    	jk = '$jk', 
			    	nohp = '$nohp', 
			    	email = '$email',
			    	role = '$role'
			    	WHERE id='$id'";
            $insert_row = $this->dbc->excute($query);
            if ($insert_row) {
                echo "<script>window.location='listStaf.php'</script>";
            } else {
                $msg = "<span style='color:red;'> Data Staf Gagal di Update </span>";
                return $msg;
            }
        }
    }

    public function getStafById($id)
    {
        $query = "SELECT * FROM staf WHERE id ='$id'";
        $result = $this->dbc->excute($query);
        return $result;
    }

    public function delStafById($id)
    {
        $staf = self::getStafById($id);
        $data = $staf->fetch_assoc();
        $delImage = unlink("../" . $data['foto']);

        if (isset($delImage)) {
            $query = "DELETE FROM staf WHERE id='$id'";
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

    public function pencarian($key)
    {
        $query = "SELECT * FROM staf WHERE nama  LIKE '%$key%' ";
        $result = $this->dbc->excute($query);
        return $result;
    }

}

?>