<?php

include_once(__DIR__ . "/KontrakPresenterSponsor.php");
include_once(__DIR__ . "/../models/TabelSponsor.php");
include_once(__DIR__ . "/../models/Sponsor.php");
include_once(__DIR__ . "/../views/ViewSponsor.php");

class PresenterSponsor implements KontrakPresenterSponsor {
    private $tabelSponsor;
    private $viewSponsor;
    private $listSponsor = [];

    public function __construct($tabelSponsor, $viewSponsor) {
        $this->tabelSponsor = $tabelSponsor;
        $this->viewSponsor = $viewSponsor;
        $this->initListSponsor();
    }

    public function initListSponsor() {
        $data = $this->tabelSponsor->getAllSponsor();
        $this->listSponsor = [];
        foreach ($data as $item) {
            $this->listSponsor[] = new Sponsor(
                $item['id'],
                $item['nama_brand'],
                $item['jenis_produk'],
                $item['nilai_kontrak'],
                $item['durasi_tahun']
            );
        }
    }

    public function tampilkanSponsor(): string {
        return $this->viewSponsor->tampilSponsor($this->listSponsor);
    }

    public function tampilkanFormSponsor($id = null): string {
        $data = null;
        if ($id !== null ){
            $data = $this->tabelSponsor->getSponsorById($id);
        }
        return $this->viewSponsor->tampilFormSponsor($data);
    }

    public function tambahSponsor($namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void {
        $this->tabelSponsor->addSponsor($namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun);
    }
    public function ubahSponsor($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun): void {
        $this->tabelSponsor->updateSponsor($id, $namaBrand, $jenisProduk, $nilaiKontrak, $durasiTahun);
    }
    public function hapusSponsor($id): void {
        $this->tabelSponsor->deleteSponsor($id);
    }
}
?>