<?php

include_once (__DIR__ . "/../models/Sponsor.php");

class ViewSponsor {

    public function tampilSponsor($listSponsor): string {
        $rows = "";
        $no = 1;

        foreach ($listSponsor as $s) {
            $rows .= "<tr>";
            $rows .= "<td>" . $no++ . "</td>";
            $rows .= "<td>" . htmlspecialchars($s->getNamaBrand()) . "</td>";
            $rows .= "<td>" . htmlspecialchars($s->getJenisProduk()) . "</td>";
            $rows .= "<td>Rp " . number_format($s->getNilaiKontrak(), 0, ',', '.') . "</td>";
            $rows .= "<td>" . htmlspecialchars($s->getDurasiTahun()) . " Tahun</td>";
            $rows .= "<td style='text-align: right;'>
                        <a href='index.php?page=sponsor&screen=edit&id=" . $s->getId() . "' class='btn btn-edit'>Edit</a>
                        <button data-id='" . $s->getId() . "' class='btn btn-delete'>Hapus</button>
                      </td>";
            $rows .= "</tr>";
        }

        $templatePath = __DIR__ . '/../template/skin_sponsor.html';
        
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            
            $template = str_replace('DATA_TABEL', $rows, $template);
            
            $template = str_replace('DATA_TOTAL', 'Total Data: ' . count($listSponsor), $template);
            
            return $template;
        }
        
        return $rows;
    }

    public function tampilFormSponsor($data = null): string {
        $templatePath = __DIR__ . '/../template/form_sponsor.html';
        $template = file_get_contents($templatePath);

        if ($data) {
            // MODE EDIT
            $template = str_replace('DATA_JUDUL', 'Edit Sponsor', $template);
            $template = str_replace('value="add"', 'value="edit"', $template);
            $template = str_replace('value="" id="sponsor-id"', 'value="'.$data['id'].'" id="sponsor-id"', $template);
            
            $template = str_replace('value="" id="namaBrand"', 'value="'.htmlspecialchars($data['nama_brand']).'" id="namaBrand"', $template);
            $template = str_replace('value="" id="jenisProduk"', 'value="'.htmlspecialchars($data['jenis_produk']).'" id="jenisProduk"', $template);
            $template = str_replace('value="" id="nilaiKontrak"', 'value="'.htmlspecialchars($data['nilai_kontrak']).'" id="nilaiKontrak"', $template);
            $template = str_replace('value="" id="durasiTahun"', 'value="'.htmlspecialchars($data['durasi_tahun']).'" id="durasiTahun"', $template);
        } else {
            // MODE TAMBAH
            $template = str_replace('DATA_JUDUL', 'Tambah Sponsor', $template);
            $template = str_replace('value="" id="namaBrand"', 'value="" id="namaBrand"', $template);
            $template = str_replace('value="" id="jenisProduk"', 'value="" id="jenisProduk"', $template);
            $template = str_replace('value="" id="nilaiKontrak"', 'value="" id="nilaiKontrak"', $template);
            $template = str_replace('value="" id="durasiTahun"', 'value="" id="durasiTahun"', $template);
        }
        
        return $template;
    }
}
?>