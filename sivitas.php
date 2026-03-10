<?php

class SivitasAkademik{
    protected $nama;

    public function __construct($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }
}

class Dosen extends SivitasAkademik{
    private $nidn;

    public function __construct($nama,$nidn){
        parent::__construct($nama);
        $this->nidn = $nidn;
    }

    public function tampilDosen(){
        return "Nama Dosen : ".$this->getNama()." - NIDN : ".$this->nidn;
    }
}

class Mahasiswa extends SivitasAkademik{
    private $nim;

    public function __construct($nama,$nim){
        parent::__construct($nama);
        $this->nim = $nim;
    }

    public function tampilMahasiswa(){
        return "Nama Mahasiswa : ".$this->getNama()." - NIM : ".$this->nim;
    }
}

$dosen1 = new Dosen("Ajib Abdul Kholiq, S.Kom.","MP21210662 ");
$mhs1 = new Mahasiswa("Devitha Paradila","2306700005");

echo $dosen1->tampilDosen();
echo "<br>";
echo $mhs1->tampilMahasiswa();

?>