-- Create database
CREATE DATABASE IF NOT EXISTS mvp_db;
USE mvp_db;

-- Create table pembalap
CREATE TABLE IF NOT EXISTS pembalap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tim VARCHAR(255) NOT NULL,
    negara VARCHAR(255) NOT NULL,
    poinMusim INT DEFAULT 0,
    jumlahMenang INT DEFAULT 0
);

-- Insert data
INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) VALUES
('Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
('Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
('Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
('Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
('Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
('Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
('Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
('Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
('Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
('Fernando Alonso', 'Alpine', 'Spain', 65, 0);

-- TABEL SPONSOR
CREATE TABLE IF NOT EXISTS sponsor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_brand VARCHAR(255) NOT NULL,
    jenis_produk VARCHAR(255) NOT NULL,
    nilai_kontrak BIGINT DEFAULT 0,
    durasi_tahun INT DEFAULT 1
);

-- Insert Data Dummy Sponsor
INSERT INTO sponsor (nama_brand, jenis_produk, nilai_kontrak, durasi_tahun) VALUES
('Red Bull', 'Minuman Energi', 5000000000, 5),
('Shell', 'Bahan Bakar & Oli', 3000000000, 3),
('Rolex', 'Jam Tangan Mewah', 1500000000, 2),
('Pirelli', 'Ban', 2000000000, 4);