-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 10:25 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perangkat_keras`
--

CREATE TABLE `jenis_perangkat_keras` (
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama_perangkat_keras` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `deskripsi` text COLLATE utf8mb4_bin NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `jenis_perangkat_keras`
--

INSERT INTO `jenis_perangkat_keras` (`id_perangkat_keras`, `nama_perangkat_keras`, `deskripsi`, `foto`) VALUES
('HW-0001', 'Motherboard', '', NULL),
('HW-0002', 'Processor', '', NULL),
('HW-0003', 'Memory (RAM)', '', NULL),
('HW-0004', 'Kipas (FAN)', '', NULL),
('HW-0005', 'Monitor', '', NULL),
('HW-0006', 'Hardisk', '', NULL),
('HW-0007', 'CD / DVD', '', NULL),
('HW-0008', 'VGA', '', NULL),
('HW-0009', 'Keyboard', '', NULL),
('HW-0010', 'Mouse', '', NULL),
('HW-0011', 'Scanner', '', NULL),
('HW-0012', 'Sound Card', '', NULL),
('HW-0013', 'Speaker', '', NULL),
('HW-0014', 'Printer', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama_kerusakan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `solusi` mediumtext COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `nama_kerusakan`, `id_perangkat_keras`, `solusi`) VALUES
('KR-0001', 'Lampu Mouse mati', 'HW-0010', 'periksa sambugan kabel mouse'),
('KR-0002', 'Pointer tidak bisa digerakka', 'HW-0010', 'periksa settingan mouse di contorl panel'),
('KR-0003', 'Led menyala tetapi pointer tidak bergerak', 'HW-0010', 'pastikan tidak terbalik antara port keyboard / mouse'),
('KR-0004', 'kursor tidak berfungsi namun klik normal', 'HW-0010', 'bersihkan optik mouse'),
('KR-0005', 'Keyboard tidak terdeteksi Oleh PC', 'HW-0009', 'cek kabel keyboard apakah sudah terpasang dengan benaratau coba cek menggunakan keyboard lain'),
('KR-0006', 'Tombol keyboard macet', 'HW-0009', 'bersihkan dan sedot kotoran debu pada tombol keyboard'),
('KR-0007', 'lampu keyboard nyala tetapi tidak ada input', 'HW-0009', 'periksa settingan keyboard'),
('KR-0008', 'DVD room macet', 'HW-0007', 'periksa sambungan kabel kober pada dvd'),
('KR-0009', 'dvd room tidak bisa membaca disk', 'HW-0007', 'brsihkan optik'),
('KR-0010', 'dvd tidak terdeteksi', 'HW-0007', 'pastikan terisntal software dvd room yang competitive dengan hardware'),
('KR-0011', 'meuncul pesan kesalahan \"scanner acces failed\" atau \"scanner not found\"', 'HW-0011', 'scanner yang belum terkoneksi secara hardware ini bisa saja sidebabkan karena card SCSI-interface tidak terpasang dengan benar, jika kabel SCSI tidak benar-benar terhubung dengan baik, hal itu akan menggangu hubungan antara scanner dan card. Matikan komputer dan chek koneksi kabelnya.'),
('KR-0012', 'muncul pesan kesalahan ”not enough memory”', 'HW-0011', 'Pesan tersebut biasanya terjadi karena sisa ruang hardisk anda sudah sangat kecil. Coba gunakan disk utility untuk menambah sisa ruang tersebut. Atau, anda bisa mencoba untuk men-scan gambar lagi pada tingkat dpi yang lebih rendah, dan pada kedalaman warna yang lebih rendah juga, misalnya, grayscale atau hitam'),
('KR-0013', 'gambar hasil scanner tidak memuaskan.Gambar terlihat pecah-pecah dan bercak terdapat disanasini yang', 'HW-0011', 'Analisa pertama rusaknya gambar, bisa saja disebabkan oleh jamur dalam kaca scanner. Untuk mengatasi hal ini bersihkan kaca bagian dalam dan luarnya secara rutin dengan cairan pembersih, yang banyak dijual di toko kimia. Supaya tetap bersih, anda perlu menjaga kondisi ruangan, karena jamur akan tumbuh di ruang lembab'),
('KR-0014', 'Kualitas foto hasil scan berbeda pada beberapa komputer', 'HW-0011', 'Perbedaan kualitas pada foto tersebut dapat muncul karena adanya perbedaan kualitas VGA pada masing-masing komputer. Foto tersebut akan tampak baik ketika anda menggunakan komputer dengan VGA tinggi (minimal 32 Mb).'),
('KR-0015', 'Setelah dihidupkan, tidak ada tampilan di monitor, lampu indikator (led) di panel depan menyala, lam', 'HW-0001', 'Langkah pertama lepas semua kabel power yang terhubung ke listrik, kabel data ke monitor, kabel keyboad/mouse, dan semua kabel yang terhubung ke CPU, kemudian lepas semua sekrup penutup cashing. Dalam keadaan casing terbuka silahkan anda lepaskan juga komponenkomponen lainnya, yaitu kabel tegangan dari power supply yang terhubung ke Motherboard, harddisk, floppy, hati-hati dalam pengerjaannya jangan terburuburu. Begitu juga dengan Card yang menempel pada Mboard (VGA, Sound atau Card lainnya). Sekarang yang menempel pada cashing hanya MotherBoard saja. Silahkan anda periksa Motherboadnya dengan teliti, lihat Chip (IC), Elko, Transistor dan yang lainnya apakah ada yang terbakar.'),
('KR-0016', 'Ketika komputer anda dihidupkan, monitor menampilkan tulisan no signal input. Sedangkan CPU dalam ko', 'HW-0008', '	periksa kabel output VGA. Karena mungkin keduanya belum terhubung dengan benar'),
('KR-0017', 'Ketika komputer dihidupkan, namun layartidak ada tampilan,sedangkan CPU dalamkondisi baik - baik saj', 'HW-0008', 'Buka casing dan silahkan lihat bagian VGA card . Anda cek dan kencangkan VGA dan coba hidupkan kembali komputer anda'),
('KR-0018', 'Driver sound card belum terinstal atau rusak', 'HW-0012', 'instal driver soun card'),
('KR-0019', 'sound card tidak terpasang dengan baik', 'HW-0012', 'Cabut sound card dari motherboard alu bersihkan kemudian pasang kembali'),
('KR-0020', 'Pemasangan konektor kabel tidak tepat', 'HW-0012', 'Cabut kabel sound card kemudian coba pasangkan kembali'),
('KR-0021', 'Terdapat penghubung kabel yang putus antara sound card dengan speaker . ', 'HW-0012', 'Ganti kabel yang menghubungkan sound card dengan speaker'),
('KR-0022', 'Komputer menjadi terasa lambat', 'HW-0003', 'Untuk mengatasi hal ini, maka anda dapat mengecek, apakah RAM sudah terpasang dengan benar . Kalau sudah terpasang dengan benar, namun masih mengalami hal tersebut, maka segera ganti RAM dengan yang baru . '),
('KR-0023', 'Sistem Operasi tidak berjalan dengan lancar', 'HW-0003', 'Tentu saja sebuah sistem operasi juga membutuhkan RAM agar bisa bekerja dengan baik . Namun demikian, apabila RAM mengalami gejala kerusakan, maka SIstem operasi pastinya juga tidak akan bisa berjalan dengan lancar, tersendat – sendat, dan ada beberapa fitur yang tidak bisa berjalan sebagaimana mestinya . '),
('KR-0024', 'Komputer mengalami restart sendiri', 'HW-0003', 'Pastikan terlebih dahulu bahwa memang komputer anda mengalami kerusakan pada bagian RAM . Setelah dipastikan, maka akan sangat disarankan untuk mengganti komponen RAM anda, agar masalah ini dapat diatasi'),
('KR-0025', 'Blue Screen', 'HW-0003', 'Blue Screen merupakan kondisi dimana komputer mengalmai masalah pada memory . Biasanya, kondisi blue screen bisa terjadi karena dua hal umum, yaitu kerusakan pada RAM dan juga kerusakan pada Harddisk . '),
('KR-0026', 'Aplikasi atau software seringkali tidak bisa dijalankan', 'HW-0003', 'Ciri berikutnya dari kerusakan pada RAM adalah aplikasi atau software yang terkadang tidak bisa dijalankan sebagaimana mestinya . Biasanya hal ini terkait dengan RAM yang tidak mampu mengakses data dari software tersebut, sehingga aplikasi atau software tersebut tidak bisa berjalan . '),
('KR-0027', 'Sering terjadi eror saat akan menginstall sebuah aplikasi', 'HW-0003', 'Sama seperti aplikasi yang tidak bisa dijalankan, kerusakan pada RAM juga sering menyebabkan terjadinya error ketika anda akan menginstall sebuah aplikasi baru . Maka dari itu, ketika anda sering mengalmai eror ketika akan menginstall aplikasi, bisa jadi hal tersebut diakibatkan karena RAM anda mengalami kerusakan . '),
('KR-0028', 'Layar komputer tidak menampilkan display apa apa(gelap)', 'HW-0003', 'Ciri – ciri kerusakan RAM komputer berikutnya adalah layar komputer tidak dapat menampilkan display apapun, meskipun processor dan juga VGA serta kabel – kabelnya bekerja dengan baik . '),
('KR-0029', 'Muncul bunyi bip berkali kali dan juga panjang ketika komputer dinyalakan', 'HW-0003', 'Bunyi bip yang panjang merupakan ciri lainnya dari kerusakan pada komponen RAM . Biasanya, selain RAM, bunyi bip juga seringkali menjadi indikator dari kerusakan komponen lain, seperti Harddisk dan juga motherboard . '),
('KR-0030', 'Komputer menjadi mudah panas', 'HW-0003', 'RAM yang menglami kerusakan dapat dideteksi dari kondisi RAM yang mudah menjadi panas . Ketika Ram sudah terasa sangat panas, maka hal ini sudah pasti merupakan ciri – ciri bahwa RAM mengalami kerusakan dan harus segera diganti . '),
('KR-0031', 'Sistem Pendingin Kurang Sempurna', 'HW-0002', 'Sistem pendinginan yang kurang sempurna baik pada kipas pendingin di prosesor maupun pada CPU dapat menyebabkan kerusakan pada prosesor . Sebenarnya, jika masalah temperatur yang tidak terkendali Anda tidak perlu khawatir . Pasalnya, system BIOS secara default diprogramkan untuk mematikan komputer jika suhu Prosesor di atas normal, kecuali jika program itu dinonaktifkan . '),
('KR-0032', 'Prosesor dan Ram Tidak Seimbang', 'HW-0002', 'Kebanyakan komputer yang dijual secara utuh atau tidak rakitan mempunyai komposisi ukuran Prosesor dan kapasitas memori RAM yang seimbang . Misalnya jika prosesornya 3 GB, ukuran memori RAM nya adalah 512 MB sampai 1 GB . Memperbesarkan ukuran memori RAM memang mampu menanmbah kecepatan komputer . Tetapi, Anda wajib berhati - hati . Ketidak seimbangan antara prosesor dan RAM dapat menyebabkan kerusakan pada prosesor, bahkan hardware yang lain . '),
('KR-0033', 'Monitor Tidak Mau Menyala', 'HW-0005', 'Pastikan bahwa tombol power dalam keadaan ON . Jika lampu indikator tidak menyala, lihat kabel power baik pada monitor maupun yang kearah outlet listrik . Pastikan bahwa pemasangan sudah benar . Apabila tetap tidak menyala, gantilah dengan kabel power lain . Jika lampu indikator pada monitor hidup dan berwarna orange atau berkedip - kedip, cek kabel video yang menghubungkan monitor dengan CPU apakah sudah terpasang dengan baik dan benar . Pastikan sudah terpasang dengan benar . Apabila dengan pengecekan di atas masalah ini tetap tidak teratasi berarti ada problem padasinyal video board adapter CRT . '),
('KR-0034', 'Monitor Menjadi Gelap Saat Loading Windows', 'HW-0005', 'Lakukan booting windows dalam keadaan safe mode dengan cara menekan F8 saat komputer loading windows . Lakukan instalasi ulang driver VGA Card . Setelah itu pilih jenis monitor yang cocok yang akan menentukan frekuensi maksimal yang akan ditampilkan oleh windows . '),
('KR-0035', 'Tampilan Pada Monitor Tampak Buram', 'HW-0005', 'tersebut, karena berhubungan dengan komponen - komponen elektronika di dalam monitor maka akan lebih baik jika harus berkonsultasi langsung dengan ahlinya . Untuk itu perlu dilakukan analisa sebab musabab dari permasalahan tersebut . Monitor dalam pemakaian lama akan mengalami pergeseran warna alami menjadi ke biru - biruan, kemerahan, kekuningkuningan, atau kehijau - hijauan . '),
('KR-0036', 'Monitor Seperti Berkedip Saat Digunakan', 'HW-0005', 'Pengaturan refresh rate yang tepat akan memberikan kenyamanan pada mata yang menggunakannya . Monitor yang memiliki refresh rate kecil akan membuat monitor seperti bergerak dan tidak stabil . Untuk mengatur refresh rate, gunakan menu Display Porperties seperti pada gambar di atas . Pada tab Setting, klik button Advanced lalu akan muncul seperti gambar 17 di bawah ini . Dan pilih tab Monitor . Pada tab tersebut akan ditampilkan pilihan refresh rate yang diinginkan . Cobalah beberapa refresh rate tersebut untuk mendapatkan pilihan yang terbaik bagi monitor . '),
('KR-0037', 'Mati Total . ', 'HW-0013', 'Jika speaker aktif Anda mati total menandakan tidak ada power yang keluar untuk mengatasinya silahkan cek kabel AC cord menggunakan multimeter jika rusak ganti dengan yang baru jika ternyata masih bagus cek fuse(sekering) jika putus ganti dengan yang baru jika masih bagus juga cek speaker barangkali jebol . Jika speaker masih dalam keadaan baik kemungkinan terjadi kerusakan pada power suplynya . Silahkan cek trafo baik pada gulungan primer atau sekunder ada tidak tegangannya dengan menggunakan multimeter jika ternyata masih baik cek dioda dan elco . Jika ternyata dioda dan elco masih baik cek transistor penguat akhir dan resistor yang berbentuk kapur'),
('KR-0038', 'Suara Mendengung', 'HW-0013', 'Hal ini bisa terjadi karena terjadi kerusakan pada penguat awal,driver atau penguat akhirnya(transistor) biasanya yang rawan kerusakan adalah pada transistor penguat akhir karena kerjanya cukup berat apalagi jika terlalu panas bisa menyebabkan transistor rusak bisa juga karena kerusakan pada power supply misalnya elco bocor / kering sebelah . '),
('KR-0039', 'Terdengar bunyi kresekkresek saat memutar volume,bass atau treble', 'HW-0013', 'Penyebabnya potensio sudah mulai aus untuk mengatasinya bisa dengan cara diberi cairan khusus(cleaner) biasanya dijual ditoko elektronik namun jika masih tetap bandel silahkan ganti dengan potensio yang baru .');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `id_perangkat_keras` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `tipe` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_kerusakan` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_perangkat_keras`, `nama`, `merk`, `tipe`, `id_kerusakan`, `waktu`) VALUES
('KL-0001', 'HW-0010', 'Ahmad Hanafi', 'Logitech', 'M185', 'KR-0003', '2021-01-28 14:01:40'),
('KL-0002', 'HW-0010', 'Hendra', 'Logitech', 'M331', 'KR-0001', '2021-01-28 14:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_lengkap` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level` enum('ADMINISTRATOR','OPERATOR') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(37, 'Ahmad Hanafi', 'ahanafi', '$2y$10$q9nJE3z2e28eF9zViGu7b.82M4oLoBnH0mm5O3SwGGg0L9Y50t336', 'ADMINISTRATOR'),
(38, 'Saroni', 'saroni', '$2y$10$SGBNIsNk8Qd0nYcMUri3VOd/GkGIxU/zqF4gDSdPIwRs/kDQoQLxe', 'ADMINISTRATOR'),
(39, 'M Iqbal Tawakal Prakoso', 'iqbals', '$2y$10$Ba2BHHc7ut5ZPSHgidxwHuHmB57RkX0irD8d8gJT/BelPNEWMkXpq', 'ADMINISTRATOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_perangkat_keras`
--
ALTER TABLE `jenis_perangkat_keras`
  ADD PRIMARY KEY (`id_perangkat_keras`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
