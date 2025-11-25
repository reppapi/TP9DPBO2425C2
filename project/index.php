<?php
include_once("models/DB.php");

// Cek halaman yang diminta
$page = isset($_GET['page']) ? $_GET['page'] : 'pembalap';

if ($page == 'sponsor') {
    // BAGIAN SPONSOR 
    include_once("models/TabelSponsor.php");
    include_once("views/ViewSponsor.php");
    include_once("presenters/PresenterSponsor.php");

    $tabel = new TabelSponsor('localhost', 'mvp_db', 'root', '');
    $view = new ViewSponsor();
    $presenter = new PresenterSponsor($tabel, $view);

    if (isset($_POST['action_sponsor'])) {
        $act = $_POST['action_sponsor'];
        if ($act == 'add') $presenter->tambahSponsor($_POST['namaBrand'], $_POST['jenisProduk'], $_POST['nilaiKontrak'], $_POST['durasiTahun']);
        if ($act == 'edit') $presenter->ubahSponsor($_POST['id'], $_POST['namaBrand'], $_POST['jenisProduk'], $_POST['nilaiKontrak'], $_POST['durasiTahun']);
        if ($act == 'delete') $presenter->hapusSponsor($_POST['id']);
        header("Location: index.php?page=sponsor"); exit();
    }

    if (isset($_GET['screen'])) {
        if ($_GET['screen'] == 'add') { echo $presenter->tampilkanFormSponsor(); exit(); }
        if ($_GET['screen'] == 'edit') { echo $presenter->tampilkanFormSponsor($_GET['id']); exit(); }
    }

    echo $presenter->tampilkanSponsor();

} else {
    // BAGIAN PEMBALAP 
    include_once("models/TabelPembalap.php");
    include_once("views/ViewPembalap.php");
    include_once("presenters/PresenterPembalap.php");

    $tabel = new TabelPembalap('localhost', 'mvp_db', 'root', '');
    $view = new ViewPembalap();
    $presenter = new PresenterPembalap($tabel, $view);

    if (isset($_GET['screen'])) {
        if ($_GET['screen'] == 'add') { echo $presenter->tampilkanFormPembalap(); exit(); }
        if ($_GET['screen'] == 'edit') { echo $presenter->tampilkanFormPembalap($_GET['id']); exit(); }
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') $presenter->tambahPembalap($_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        if ($_POST['action'] == 'edit') $presenter->ubahPembalap($_POST['id'], $_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        if ($_POST['action'] == 'delete') $presenter->hapusPembalap($_POST['id']);
        header("Location: index.php"); exit();
    }

    echo $presenter->tampilkanPembalap();
}
?>