<?php

include_once ("models/DB.php");
include_once ("KontrakModelSponsor.php");

class TabelSponsor extends DB implements KontrakModelSponsor {

    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllSponsor(): array {
        $query = "SELECT * FROM sponsor";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    public function getSponsorById($id): ?array {
        $query = "SELECT * FROM sponsor WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;
    }

    public function addSponsor($namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void {
        $query = "INSERT INTO sponsor (nama_brand, jenis_produk, nilai_kontrak, durasi_tahun) 
                  VALUES (:nama_brand, :jenis_produk, :nilai_kontrak, :durasi_tahun)";
        
        $params = [
            'nama_brand' => $namaBrand,
            'jenis_produk' => $jenisProduk,
            'nilai_kontrak' => $nilaiKontrak,
            'durasi_tahun' => $durasiTahun
        ];
        $this->executeQuery($query, $params);
    }

    public function updateSponsor($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void {
        $query = "UPDATE sponsor 
                  SET nama_brand = :nama_brand, 
                      jenis_produk = :jenis_produk, 
                      nilai_kontrak = :nilai_kontrak, 
                      durasi_tahun = :durasi_tahun 
                  WHERE id = :id";
        
        $params = [
            'id' => $id,
            'nama_brand' => $namaBrand,
            'jenis_produk' => $jenisProduk,
            'nilai_kontrak' => $nilaiKontrak,
            'durasi_tahun' => $durasiTahun
        ];
        $this->executeQuery($query, $params);
    }

    public function deleteSponsor($id): void {
        $query = "DELETE FROM sponsor WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }
}
?>