<?php

interface KontrakModelSponsor {
    public function getAllSponsor(): array;
    public function getSponsorById($id): ?array;
    
    // Method CRUD
    public function addSponsor($namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void;
    public function updateSponsor($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void;
    public function deleteSponsor($id): void;
}
?>