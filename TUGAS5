CREATE DATABASE akademik;

USE akademik;

CREATE TABLE dosen (
    Nip VARCHAR(12) NOT NULL,
    Nama_Dosen VARCHAR(25) NOT NULL,
    PRIMARY KEY (Nip)
);

CREATE TABLE mahasiswa (
    Nim VARCHAR(9) NOT NULL,
    Nama_Mhs VARCHAR(25) NOT NULL,
    Tgl_Lahir DATE NOT NULL,
    Alamat VARCHAR(50) NOT NULL,
    Jenis_Kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    IPK DECIMAL(10,2),
    PRIMARY KEY (Nim)
);

CREATE TABLE matakuliah (
    Kode_MK VARCHAR(6) NOT NULL,
    Nama_MK VARCHAR(20) NOT NULL,
    Sks INT(2) NOT NULL,
    PRIMARY KEY (Kode_MK)
);

CREATE TABLE perkuliahan (
    Nim VARCHAR(9) DEFAULT NULL,
    Kode_MK VARCHAR(7) DEFAULT NULL,
    Nip VARCHAR(12) DEFAULT NULL,
    Kehadiran DECIMAL(6,2),
    Nilai_Bobot CHAR(1) NOT NULL,
    Nilai_Angka DECIMAL(6,2),
    Poin VARCHAR(1),
    KEY Nip (Nip),
    KEY Nim (Nim),
    KEY Kode_MK (Kode_MK),
    CONSTRAINT perkuliahan_ibfk_1 FOREIGN KEY (Nip) REFERENCES dosen (Nip) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT perkuliahan_ibfk_2 FOREIGN KEY (Nim) REFERENCES mahasiswa (Nim) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT perkuliahan_ibfk_3 FOREIGN KEY (Kode_MK) REFERENCES matakuliah (Kode_MK) ON DELETE CASCADE ON UPDATE CASCADE
);

-- jika drop database maka database/schema akan hilang secara keseluruhan bersama isinya
DROP DATABASE akademik;

-- bagian insert data
INSERT INTO dosen (Nip, Nama_Dosen) VALUES ('0429038801', 'Mariana, S.Kom., MMSI.');
INSERT INTO mahasiswa (Nim, Nama_Mhs, Tgl_Lahir, Alamat, Jenis_Kelamin) VALUES ('202307001', 'Budi', '2000-01-01', 'Jakarta', 'Laki-laki');
INSERT INTO matakuliah (Kode_MK, Nama_MK, Sks) VALUES ('INF-001', 'Pemrograman Dasar', 3);
INSERT INTO perkuliahan (Nim, Kode_MK, Nip, Kehadiran, Nilai_Bobot, Nilai_Angka) VALUES ('202307001', 'INF-001', '0429038801', 90.00, 'A', 93.59);

-- update data
UPDATE dosen SET Nama_Dosen = 'Nurita, S.Kom., MMSI.' WHERE Nip = '0429038801';

-- bagian delete data
DELETE FROM dosen WHERE Nip = '0429038801';

UPDATE perkuliahan SET Nilai_Angka = CASE 
    WHEN Kehadiran < 75 THEN Nilai_Angka * 0.65
    ELSE Nilai_Angka
END;

UPDATE perkuliahan SET Nilai_Bobot = CASE
    WHEN Nilai_Angka BETWEEN 91 AND 100 THEN 'A'
    WHEN Nilai_Angka BETWEEN 81 AND 90 THEN 'B'
    WHEN Nilai_Angka BETWEEN 71 AND 80 THEN 'C'
    WHEN Nilai_Angka BETWEEN 61 AND 70 THEN 'D'
    ELSE 'E'
END;

UPDATE perkuliahan SET Poin = CASE
    WHEN Nilai_Bobot = 'A' THEN '4'
    WHEN Nilai_Bobot = 'B' THEN '3'
    WHEN Nilai_Bobot = 'C' THEN '2'
    WHEN Nilai_Bobot = 'D' THEN '1'
    ELSE '0'
END;

UPDATE mahasiswa m
SET IPK = (
    SELECT SUM(mk.Sks * CAST(p.Poin AS DECIMAL(10,2))) / SUM(mk.Sks)
    FROM perkuliahan p
    JOIN matakuliah mk ON p.Kode_MK = mk.Kode_MK
    WHERE p.Nim = m.Nim
);

-- alter tables buat add table baru
ALTER TABLE dosen ADD COLUMN Email VARCHAR(50);
ALTER TABLE mahasiswa ADD COLUMN Angkatan INT(4);
ALTER TABLE matakuliah ADD COLUMN Semester INT(1);
ALTER TABLE perkuliahan ADD COLUMN Tahun_Ajaran VARCHAR(9);

-- buat store procudure

DELIMITER //
CREATE PROCEDURE SP_Tambah_Dosen(IN p_Nip VARCHAR(12), IN p_Nama_Dosen VARCHAR(25))
BEGIN
    INSERT INTO dosen (Nip, Nama_Dosen) VALUES (p_Nip, p_Nama_Dosen);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SP_Query_Dosen(IN p_Nip VARCHAR(12))
BEGIN
    SELECT * FROM dosen WHERE Nip = p_Nip;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SP_Update_Dosen(IN p_Nip VARCHAR(12), IN p_Nama_Dosen VARCHAR(25))
BEGIN
    UPDATE dosen SET Nama_Dosen = p_Nama_Dosen WHERE Nip = p_Nip;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SP_Delete_Dosen(IN p_Nip VARCHAR(12))
BEGIN
    DELETE FROM dosen WHERE Nip = p_Nip;
END //
DELIMITER ;
