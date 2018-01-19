<?php

class Format
{
    public function validation($data)
    {
        $data = trim($data); //menghapus whitespace di awal dan akhir
        $data = stripcslashes($data); //Hapus garis miring terbalik
        $data = htmlspecialchars($data); //Mengkonversi karakter
        return $data;
    }
}

?>