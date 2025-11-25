<?php
interface KontrakPresenterSponsor {
    public function tampilkanSponsor(): string;
    public function tampilkanFormSponsor($id = null): string;
    public function tambahSponsor($namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void;
    public function ubahSponsor($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void;
    public function hapusSponsor($id): void;
}
?>