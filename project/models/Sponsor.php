<?php

class Sponsor {
    private $id;
    private $namaBrand;
    private $jenisProduk;
    private $nilaiKontrak;
    private $durasiTahun;

    public function __construct($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun){
        $this->id = $id;
        $this->namaBrand = $namaBrand;
        $this->jenisProduk = $jenisProduk;
        $this->nilaiKontrak = $nilaiKontrak;
        $this->durasiTahun = $durasiTahun;
    }

    public function getId(){ return $this->id; }
    public function getNamaBrand(){ return $this->namaBrand; }
    public function getJenisProduk(){ return $this->jenisProduk; }
    public function getNilaiKontrak(){ return $this->nilaiKontrak; }
    public function getDurasiTahun(){ return $this->durasiTahun; }
}
?>