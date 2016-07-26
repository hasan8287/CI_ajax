-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jul 2016 pada 07.38
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_solid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'solidmania', 'solid', 'ec03f91ae56e478455e3786e91559194', 'admin'),
(7, 'fuad hasan', 'fuad_hasan', 'a79548063d1ffaf673fc95d905c5fe33', 'user'),
(8, 'hasan', 'hasan', 'fc3f318fba8b3c1502bece62a27712df', 'user'),
(9, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(12) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `judul`, `keterangan`) VALUES
(1, 'slide home', 'side home profile'),
(25, 'Graha Kinanthi', 'Graha kinanthi kalasan Yogyakarta'),
(26, 'al-mahir gemplak', 'graha al-mahir gemplak, kartosuro'),
(27, 'model rumah al-mahir kartosuro', 'model rumah al-mahir kartosuro'),
(28, 'al-mahir boyolali', 'al-mahir boyolali, banaran boyolali kota'),
(29, 'model rumah al-mahir boyolali', 'model rumah al-mahir boyolali'),
(30, 'conoth lemari', 'conoth properti di PT. Solid Citra Konstruksi'),
(31, 'Rumah Tafhim', 'Rumah Tafhim'),
(32, 'gemplak kartosuro', 'gemplak kartosuro'),
(33, 'model rumah 2 ngemplak kartosuro', 'model rumah 2 ngemplak kartosuro'),
(34, 'gazebo', 'gazebo'),
(35, 'pemukiman perumahan', 'pemukiman perumahan'),
(36, 'rumah 3 lantai', 'rumah 3 lantai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(12) NOT NULL,
  `id_album` int(12) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_album`, `judul`, `isi`, `tgl`) VALUES
(1, 0, 'About', '<p style="text-align: center;"><strong>PT. Solid Citra Konstruksi</strong></p>\r\n<p style="text-align: left;"><img src="http://localhost/solid/cdn/uploads/logo.png" alt="" width="300" height="50" /></p>\r\n<p style="text-align: left;">kami adalah perushaan yang bergerak dalam bidamg konstruksi , kantor kami berada di solo jawa tenga. perushaan ini didikaran pada tahun 2014 </p>\r\n<p style="text-align: left;">oleh bapak ichsan wahyudi</p>\r\n<p style="text-align: left;"><img src="http://localhost/solid/cdn/uploads/ichsan.jpg" alt="" width="126" height="126" /></p>', '2016-06-20'),
(2, 21, 'Contact', '<h2 style="text-align: center;"><strong>Contact PT. Solid Citra Konstruksi</strong></h2>\r\n<p style="text-align: center;">Jl. Slamet Riyadi N0.127 A Kartosuro , Jawa Tengah</p>\r\n<p style="text-align: center;"><br /> Email : budisolid@gmail.com , Telp : 0271784523</p>\r\n<p>&nbsp;</p>', '2016-06-20'),
(7, 35, 'Definisi-Definisi Mengenai Perumahan dan Permukiman', '<h2 class="post-title entry-title" style="text-align: center;"><span style="color: #000000;">Perumahan dan Kawasan Permukiman</span></h2>\r\n<h3>Perumahan dan kawasan permukiman</h3>\r\n<p>adalah satu kesatuan sistem yang terdiri atas pembinaan, penyelenggaraan perumahan, penyelenggaraan kawasan permukiman, pemeliharaan dan perbaikan, pencegahan dan peningkatan kualitas terhadap perumahan kumuh dan permukiman kumuh, penyediaan tanah, pendanaan dan sistem pembiayaan, serta peran masyarakat. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Perumahan</h3>\r\n<p>adalah kumpulan rumah sebagai bagian dari permukiman, baik perkotaan maupun perdesaan, yang dilengkapi dengan prasarana, sarana, dan utilitas umum sebagai hasil upaya pemenuhan rumah yang layak huni. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Kawasan permukiman</h3>\r\n<p>adalah bagian dari lingkungan hidup di luar kawasan lindung, baik berupa kawasan perkotaan maupun perdesaan, yang berfungsi sebagai lingkungan tempat tinggal atau lingkungan hunian dan tempat kegiatan yang mendukung perikehidupan dan penghidupan. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Lingkungan hunian</h3>\r\n<p>adalah bagian dari kawasan permukiman yang terdiri atas lebih dari satu satuan permukiman. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Permukiman</h3>\r\n<p>adalah bagian dari lingkungan hunian yang terdiri atas lebih dari satu satuan perumahan yang mempunyai prasarana, sarana, utilitas umum, serta mempunyai penunjang kegiatan fungsi lain di kawasan perkotaan atau kawasan perdesaan. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Penyelenggaraan perumahan dan kawasan permukiman</h3>\r\n<p>adalah kegiatan perencanaan, pembangunan, pemanfaatan, dan pengendalian, termasuk di dalamnya pengembangan kelembagaan, pendanaan dan sistem pembiayaan, serta peran masyarakat yang terkoordinasi dan terpadu. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah</h1>\r\n<p>adalah bangunan gedung yang berfungsi sebagai tempat tinggal yang layak huni, sarana pembinaan keluarga, cerminan harkat dan martabat penghuninya, serta aset bagi pemiliknya. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah komersial</h1>\r\n<p>adalah rumah yang diselenggarakan dengan tujuan mendapatkan keuntungan. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah swadaya</h1>\r\n<p>adalah rumah yang dibangun atas prakarsa dan upaya masyarakat. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah umum</h1>\r\n<p>adalah rumah yang diselenggarakan untuk memenuhi kebutuhan rumah bagi masyarakat berpenghasilan rendah. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah khusus</h1>\r\n<p>adalah rumah yang diselenggarakan untuk memenuhi kebutuhan khusus. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Rumah Negara</h1>\r\n<p>adalah rumah yang dimiliki negara dan berfungsi sebagai tempat tinggal atau hunian dan sarana pembinaan keluarga serta penunjang pelaksanaan tugas pejabat dan/atau pegawai negeri. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Permukiman kumuh</h1>\r\n<p>adalah permukiman yang tidak layak huni karena ketidakteraturan bangunan, tingkat kepadatan bangunan yang tinggi, dan kualitas bangunan serta sarana dan prasarana yang tidak memenuhi syarat. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Perumahan kumuh</h1>\r\n<p>adalah perumahan yang mengalami penurunan kualitas fungsi sebagai tempat hunian. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Kawasan siap bangun yang selanjutnya disebut Kasiba</h1>\r\n<p>adalah sebidang tanah yang fisiknya serta prasarana, sarana, dan utilitas umumnya telah dipersiapkan untuk pembangunan lingkungan hunian skala besar sesuai dengan rencana tata ruang. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Lingkungan siap bangun yang selanjutnya disebut Lisiba</h1>\r\n<p>adalah sebidang tanah yang fisiknya serta prasarana, sarana, dan utilitas umumnya telah dipersiapkan untuk pembangunan perumahan dengan batas-batas kaveling yang jelas dan merupakan bagian dari kawasan siap bangun sesuai dengan rencana rinci tata ruang. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Kaveling tanah matang</h1>\r\n<p>adalah sebidang tanah yang telah dipersiapkan untuk rumah sesuai dengan persyaratan dalam penggunaan, penguasaan, pemilikan tanah, rencana rinci tata ruang, serta rencana tata bangunan dan lingkungan. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Konsolidasi tanah</h1>\r\n<p>adalah penataan kembali penguasaan, pemilikan, penggunaan, dan pemanfaatan tanah sesuai dengan rencana tata ruang wilayah dalam usaha penyediaan tanah untuk kepentingan pembangunan perumahan dan permukiman guna meningkatkan kualitas lingkungan dan pemeliharaan sumber daya alam dengan partisipasi aktif masyarakat. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Pendanaan</h1>\r\n<p>adalah penyediaan sumber daya keuangan yang berasal dari anggaran pendapatan dan belanja negara, anggaran pendapatan dan belanja daerah, dan/atau sumber dana lain yang dibelanjakan untuk penyelenggaraan perumahan dan kawasan permukiman sesuai dengan ketentuan peraturan perundang-undangan. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Pembiayaan</h1>\r\n<p>adalah setiap penerimaan yang perlu dibayar kembali dan/atau setiap pengeluaran yang akan diterima kembali untuk kepentingan penyelenggaraan perumahan dan kawasan permukiman baik yang berasal dari dana masyarakat, tabungan perumahan, maupun sumber dana lainnya. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Prasarana</h1>\r\n<p>adalah kelengkapan dasar fisik lingkungan hunian yang memenuhi standar tertentu untuk kebutuhan bertempat tinggal yang layak, sehat, aman, dan nyaman. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h1>Sarana</h1>\r\n<p>adalah fasilitas dalam lingkungan hunian yang berfungsi untuk mendukung penyelenggaraan dan pengembangan kehidupan sosial, budaya, dan ekonomi. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Utilitas umum</h3>\r\n<p>adalah kelengkapan penunjang untuk pelayanan lingkungan hunian. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Masyarakat Berpenghasilan Rendah yang selanjutnya disingkat MBR</h3>\r\n<p>adalah masyarakat yang mempunyai keterbatasan daya beli sehingga perlu mendapat dukungan pemerintah untuk memperoleh rumah. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Setiap orang</h3>\r\n<p>adalah orang perseorangan atau badan hukum. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Badan hukum</h3>\r\n<p>adalah badan hukum yang didirikan oleh warga negara Indonesia yang kegiatannya di bidang penyelenggaraan perumahan dan kawasan permukiman. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Pemerintah pusat yang selanjutnya disebut Pemerintah</h3>\r\n<p>adalah Presiden Republik Indonesia yang memegang kekuasaan pemerintahan Negara Republik Indonesia sebagaimana dimaksud dalam Undang-Undang Dasar Negara Republik Indonesia Tahun 1945. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Pemerintah daerah</h3>\r\n<p>adalah gubernur, bupati/walikota, dan perangkat daerah sebagai unsur penyelenggara pemerintahan daerah. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>\r\n<h3>Menteri</h3>\r\n<p>adalah menteri yang menyelenggarakan urusan pemerintahan di bidang perumahan dan kawasan permukiman. (<em>Sumber: UU No. 1 Tahun 2011 Tentang Perumahan dan Kawasan Permukiman)</em></p>', '2016-06-20'),
(8, 35, 'Perumahan Dalam Aspek Air Bersih', '<div style="text-align: justify;">\r\n<div style="text-align: justify;"><strong>Pengertian Perumahan dan Permukiman</strong>&nbsp;- Dalam Undang-Undang Nomor 4 tahun 1992 tentang perumahan dan permukiman, perumahan diartikan sebagai kelompok rumah yang berfungsi sebagai lingkungan tempat tinggal atau lingkungan hunian yang dilengkapi dengan sarana dan prasarana.</div>\r\n</div>\r\n<p><a name="more"></a></p>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Secara fisik perumahan merupakan sebuah lingkungan yang terdiri dari kumpulan unit-unit rumah tinggal dimana dimungkinkan terjadinya interaksi sosial diantara penghuninya, &nbsp;serta dilengkapi prasarana sosial, &nbsp;ekonomi, &nbsp;budaya, &nbsp;dan pelayanan &nbsp;yang merupakan subsistem dari kota secara keseluruhan. Lingkungan ini biasanya mempunyai aturan-aturan, kebiasaan-kebiasaan serta sistem nilai yang berlaku bagi warganya.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Pengertian perumahan sering dikaitkan dengan pembangunan sejumlah rumah oleh berbagai instansi baik pemerintah atau swasta dengan disain unit-unit rumah yang sama atau hampir sama. Jumlah rumah dan kelompok perumahan ini tidak tertentu, dapat terdiri dari dua atau tiga rumah atau dapat juga sampai ratusan rumah. Bentuknya pun tidak terbatas hanya pada bangunan satu lantai saja, yang berderet secara horizontal, melainkan dapat juga merupakan bangunan bertingkat yaitu merupakan rumah susun.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;"><a href="http://www.landasanteori.com/2015/10/pengertian-perumahan-permukiman-menurut.html" target="_blank">Aspek-aspek Perencanaan Perumahan</a></h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Untuk membuat sebuah perencanaan perumahan yang betul-betul dapat menjawab tuntutan pembangunan perumahan dan permukiman maka perlu dipertimbangkan secara matang aspek-aspek perencanaannya. Dengan memperhatikan aspek-aspek perencanaan sepanjang pembangunannya, diharapkan baik arah maupun laju pembangunan perumahan akan dapat mencapai suatu kondisi dimana jumlah dan kualitasnya sesuai dengan &nbsp;tuntutan kebutuhan masyarakat. Adapun aspek-aspek yang mendasari perencanaan pembangunan perumahan tersebut antara lain :</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">1.Lingkungan</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Hal utama yang harus dipertimbangkan dalam perencanaan perumahan adalah manajemen lingkungan yang baik dan terarah. Karena lingkungan perumahan merupakan aspek yang sangat menentukan dan keberadaannya tidak dapat diabaikan. Hal tersebut dapat terjadi karena baik buruknya kondisi lingkungan akan berdampak terhadap penghuni perumahan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Pertimbangan terhadap faktor-faktor lingkungan dalam perencanaan lingkungan perumahan mutlak diperlukan karena pada hakekatnya proses terbentuknya lingkungan perumahan merupakan akumulasi dari unit-unit rumah sebagai pembentuk perumahan tersebut. Oleh karena itu dalam perencanaan perumahan diperlukan juga perencanaan terhadap lingkungan perumahan tersebut, terkait secara mikro (perencanaan secara detail terhadap unit-unit rumah) serta makro (perencanaan dan pencermatan terhadap lingkungan dimana perumahan tersebut berada).</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">2.Daya Beli (Affortability)</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Perencanaan bangunan diharapkan dapat mendukung tercapainya tujuan pembangunan yang telah dicanangkan sesusi dengan programnya. Didalam perencanaan perumahan selalu dipikirkan kesesuaian antara ukuran bangunan, kebutuhan ruang, konstruksi bangunan, ataupun bahan bangunan yang digunakan dengan jangkauan pelayanannya. Hal itu perlu diantisipasi karena kemampuan rata-rata (kemampuan daya beli) masyarakat pada wilayah yang satu dengan yang lain tidak sama.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Faktor-faktor yang mempengaruhi daya beli masyarakat antar lain :</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ol>\r\n<li style="text-align: justify;">Pendapatan per kapita sebagian besar masyarakat yang masih rendah (di bawah standar) ;</li>\r\n<li style="text-align: justify;">Tingkat pendidikan sebagian masyarakat, terutama di daerah pedesaan yang masih relatif rendah;</li>\r\n<li style="text-align: justify;">Pembangunan yang belum merata pada berbagai daerah sehingga memicu timbulnya kesenjangan sosial dan ekonomi ;&nbsp;</li>\r\n<li style="text-align: justify;">Situasi politik dan keamanan yang cenderung tidak stabil sehingga mempengaruhi minat dan daya beli masyarakat untuk berinvestasi dan mengembangkan modal ;</li>\r\n<li style="text-align: justify;">Inflasi yang tinggi yang menyebabkan naiknya harga bahan bangunan yang berdampak dengan melambungnya harga rumah.</li>\r\n</ol>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">3.Kelembagaan</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Keberhasilan pembangunan perumahan dalam suatu wilayah, baik di perkotaan maupun di pedesaan, tidak terlepas dari peran pemerintah sebagai pihak yang berkewajiban untuk mengarahkan, membimbing, serta menciptakan suasana yang kondusif bagi terciptanya keberhasilan itu. Masyarakat sebagai pelaku utama pembangunan memegang peran penting dalam setip program pembangunan yang dijalankan. Apabila dikaji lebih jauh tentang unsur pelaku pembangunan perumahan, maka peran swasta dalam hal ini pengembang (kontraktor) sangatlah menentukan terciptanya arah dan laju pembangunan menuju masyarakat yang adil dan sejahtera dengan tercukupinya segala kebutuhan, termasuk kebutuhan perumahan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Program Pembangunan Perumahan dan Permukiman</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program yang dijalankan dalam pembangunan perumahan dan permukiman oleh pemerintah, terdiri dari program pokok dan program pendukung (Dinas Kimbangwil Taput, Buku Panduan Penyusunan Program Pengembangan Perumahan, 2004), yaitu:</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">1.Program Pokok</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program pokok merupakan yang dijalankan dalam rangka mewujudkan berbagai sasaran dan melaksanakan berbagai kebijakan dalam GBHN 1993 yang meliputi program penyediaan dan perbaikan perumahan dan permukiman, program penyehatan lingkungan, penyediaan dan pengelolaan air bersih, penataan kota dan penataan ruangan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Program Penyediaan Perumahan dan Permukiman</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Pada prinsipnya program pembangunan perumahan dan permukiman bertujuan untuk meningkatkan kualitas kehidupan keluarga dan masyarakat serta meningkatkan kemandirian, kesetiakawanan sosial masyarakat. Program ini dibagi menjadi dua kegiatan yaitu pembangunan perumahan dan permukiman di perkotaan, dan pembangunan perumahan dan permukiman di pedesaan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program pembangunan perumahan dan permukiman di perkotaan meliputi beberapa yaitu :</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li style="text-align: justify;">Perintisan kawasan permukiman skala dalam bentuk penyediaan kawasan siap bangun (kasiba), lingkungan siap bangun (lisiba) di wilayah kota yang sudah terbangun atau di wilayah pengembangan yang berupa pengembangan kota baru;</li>\r\n<li style="text-align: justify;">Perintisan pola kerja sama pemerintah dengan dunia usaha dalam pengembangan perumahan dalam skala besar;</li>\r\n<li style="text-align: justify;">Penyiapan dan pengadaan rumah susun sewa di perkotaan;</li>\r\n<li style="text-align: justify;">Penyiapan pengadaan rumah yang meliputi rumah inti, rumah sederhana, dan rumah sangat sederhana;</li>\r\n<li style="text-align: justify;">Pengembangan dan pemantapan pola pembinaan khusus bagi masyarakat berpenghasilan rendah dengan memanfaatkan dana pemerintah dan dana masyarakat melalui fasilitas hipotek sekunder, kredit pemilikan rumah, kredit perbaikan &nbsp;rumah, kredit pemilikan kapling siap bangun, kredit pemilikan rumah usaha, kredit pembangunan rumah, dan kredit rumah sewa</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program pembangunan perumahan dan permukiman di pedesaan, meliputi beberapa kegiatan yaitu :</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li style="text-align: justify;">Pembangunan rumah percontohan dengan pengadaan rumah desa melalui pengembangan swadaya masyarakat dalam bentuk sistem arisan serta sistem perguliran;</li>\r\n<li style="text-align: justify;">Pengembangan penyuluhan dan pergerakan pasrtisipasi masyarakat dalam kegiatan swadaya;</li>\r\n<li style="text-align: justify;">Penyediaan sarana dan prasarana pedesaan.</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Program perbaikan perumahan dan permukiman</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program perbaikan perumahan dan permukiman dilakukan dengan pendekatan Tribina (bina manusia, bina lingkungan, dan bina usaha), yang juga dilaksanakan oleh berbagai instansi terkait untuk meningkatkan kesejahteraan masyarakat dan kemampuan pengelolaan dan pemaliharaan sarana dan prasarana yang telah dibangun.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program ini terdiri dari beberapa kegiatan yaitu :</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li>\r\n<div style="text-align: justify;">Perbaikan dan peremajaan kawasan perumahan dan permukiman di &nbsp;perkotaan.</div>\r\n<div style="text-align: justify;">Kegiatan ini bertujuan untuk meningkatkan mutu lingkungan dan kehidupan masyarakat terutama masyarakat yang berpenghasilan rendah, melalui perbaikan lingkungan dan penyediaan prasarana dasar;</div>\r\n</li>\r\n<li style="text-align: justify;">Pemugaran perumahan dan permukiman di pedesaan. Kegiatan ini dilakukan dengan pendekatan pembangunan perumahan dan lingkungan secara terpadu yang mencakup perumahan, permukiman, jalan desa, dan listrik.</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Program penyehatan lingkungan permukiman</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program ini dilaksanakan dalam beberapa kegiatan, yaitu:</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li style="text-align: justify;">Pengelolaan air limbah, yaitu kegiatan yang bertujuan untuk meningkatkan derajat kesehatan masyarakat dan lingkungannya;</li>\r\n<li style="text-align: justify;">Pengelolaan persampahan, yaitu kegiatan yang ditujukan untuk mengendalikan, mengumpulkan, dan membuanng atau memusnahkan limbah padat guna menghasilkan lingkungan yang bersih, sehat, dan aman;</li>\r\n<li style="text-align: justify;">Penanganan drainase, yaitu suatu kegiatan yang bertujuan untuk menciptakan lingkungan yang aman, baik terhadap genangan maupun luapan air sungai, serta banjir yang diakibatkan oleh hujan.</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Program penyediaan dan pengelolaan sarana air bersih</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program ini terbagi dalam dua kegiatan, yaitu :</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li>\r\n<div style="text-align: justify;">Penyediaan dan pengelolaan air bersih di perkotaan</div>\r\n<div style="text-align: justify;">Kegiatan ini meliputi peningkatan pengelolaan air bersih perpipaan melalui upaya penurunan kebocoran pada PDAM, peningkatan dan perluasan prasarana air bersih untuk memenuhi kebutuhan dasar penduduk serta menunjang perkembangan ekonomi kota dan kawasan pertumbuhan melalui sistem perpipaan dan non perpipaan, peningkatan pemanfaatan kapasitas produksi yang sudah terpasang melalui perluasan jaringan distribusi, sambungan rumah, hidran umum, serta peningkatan efisiensi pengelolaan dan pengusahaan PDAM;</div>\r\n</li>\r\n<li>\r\n<div style="text-align: justify;">Penyediaan dan pengelolaan air bersih di pedesaan</div>\r\n<div style="text-align: justify;">Kegiatan ini direalisasikan dengan cara pengembangan dan penerapan teknologi tepat guna untuk penyediaan air bersih, peningkatan swadaya masyarakat dalam penyediaan &nbsp;dan &nbsp;pengelolaan &nbsp;air bersih, &nbsp;peningkatan &nbsp;penyuluhan &nbsp;tentang &nbsp; pentingnya penggunaan air bersih bagi kesehatan masyarakat, pengoperasian sarana dan prasarana air bersih di pedesaan.</div>\r\n</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">1.Program Penataan Kota</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program penataan kota dilaksanakan dalam berbagai kegiatan, diantaranya adalah sebagai berikut:</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li style="text-align: justify;">Penyiapan dan penyusunan rencana program jangka menengah (PJM) dalam rangka pelaksanaan pembangunan prasarana kota terpadu yang mengacu pada rencana tata ruang dan rencana pengembangan wilayah;</li>\r\n<li style="text-align: justify;">Rintisan pengadaan sistem data dan informasi penataan kota yang membantu informasi dalam rangka pengadaan perumahan dan permukiman.</li>\r\n</ul>\r\n<div style="text-align: justify;">\r\n<div style="text-align: center;"><img src="http://localhost/solid/cdn/uploads/gb_1466238719.jpg" alt="" width="689" height="497" /></div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Pada prinsipnya program penataan kota bertujuan untuk meningkatkan efisiensi penyedian, pelayanan prasarana dan sarana perkotaan yang mendorong pemantapan fungsi kawasan-kawasan kota sehingga dapat meningkatkan produktivitas kota dengan tidak mengesampingkan aspek-aspek pemerataan, lingkungan, dan budaya.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">1.Program Penataan Bangunan</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program penataan bangunan dilakukan dengan tujuan untuk mewujudkan tata bangunan dan lingkungan yang terkendali sebagai wujud struktural pemanfaatan ruang perkotaan yang tertib dan keselamatan bangunan, serta terpeliharanya bangunan dan lingkungan yang mempunyai nilai, tradisi serta sejarah yang luhur. Program penataan bangunan terdiri dari beberapa kegiatan, yaitu:</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ul>\r\n<li style="text-align: justify;">Pengendalian ketertiban dan keselamatan bangunan melalui penyusunan peraturan daerah;</li>\r\n<li style="text-align: justify;">Perintisan penyusunan pedoman teknis dan prosedur pembangunan serta standar bangunan dan lingkungan;</li>\r\n<li style="text-align: justify;">Pemasyarakatan dan penyuluhan produk hukum ataupun produk teknis yang telah dibuat.</li>\r\n</ul>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">2.Program Pendukung</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program pendukung dalam pembangunan perumahan dan permukiman mutlak diperlukan karena program inilah yang akan mendukung pelaksanaan pembangunan dan permukiman.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program pendukung dalam pembangunan perumahan dan permukiman antara lain berupa Program Penelitian dan Pengenbangan Perumahandan Permukiman serta Program Penyelamatan Hutan, Tanah, dan Air.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">a.Program Penelitian dan Pengembangan Perumahan dan Permukiman</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program penelitian dan pengembangan perumahan dan permukiman bertujuan untuk meningkatkan kemampuan pendayagunaan kemajuan ilmu pengetahuan terapan, terutama yang sedang berkembang pesat dan diperhitungkan memiliki pengaruh yang besar bagi pembangunan. Disamping itu juga diharapkan akan dikembangkan teknologi tepat guna serta pendayagunaan sepenuhnya bahan baku total yang dilaksanakan oleh pusat-pusat penelitian dan pengembangan permukiman, termasuk perguruan tinggi.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">b.Program Penyelamatan Hutan, Tanah, dan Air</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program Penyelamatan hutan, tanah, air bertujuan untuk melestarikan fungsi dan kemampuan sumber daya hayati dan non hayati serta lingkungan hidup. Penyediaan dan pengelolaan &nbsp;air &nbsp;bersih &nbsp;dalam pembangunan &nbsp;perumahan &nbsp;dan &nbsp;permukiman &nbsp;merupakan suatu hal yang utama sehingga perlu dilakukan pemberdayaan kegiatan pengembangan sistem tata guna serta alokasi air bagi pembangunan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<h3 style="text-align: justify;">Kebijakan dan Strategi &nbsp;Nasional Perumahan dan Permukiman</h3>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Ada 3 (tiga) kebijakan dan strategi nasional perumahan dan permukiman yang dituangkan dalam S.K. Menteri Kimpraswil Nomor 217/2002 tentang Kebijaksanaan dan Strategi Nasional Perumahan dan Permukiman (KSNPP), yaitu:</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ol>\r\n<li style="text-align: justify;">Melembagakan sistem penyelenggaraan perumahan dan permukiman dengan melibatkan masyarakat (partisipatif) sebagai pelaku utama, melalui strategi:</li>\r\n<ul>\r\n<li style="text-align: justify;">Penyusunan, pengembangan dan sosialisasi berbagai produk peraturan perundangundangan dalam penyelenggaraan perumahan dan permukiman.</li>\r\n<li style="text-align: justify;">Pemantapan kelembagaan perumahan dan permukiman yang handal dan responsif.</li>\r\n<li style="text-align: justify;">Pengawasan konstruksi dan keselamatan bangunan gedung dan lingkungan.</li>\r\n</ul>\r\n<li style="text-align: justify;">Mewujudkan pemenuhan kebutuhan perumahan bagi seluruh lapisan masyarakat, melalui strategi:</li>\r\n<ul>\r\n<li style="text-align: justify;">Pengembangan sistem pembiayaan dan pemberdayaan pasar perumahan (primer dan sekunder), meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Peningkatan kualitas pasar primer melalui penyederhanaan perijinan, sertifikasi hak atas tanah, standarisasi penilaian kredit, dokumentasi kredit, dan pengkajian ulang peraturan terkait;&nbsp;</li>\r\n<li style="text-align: justify;">(b) Pelembagaan pasar sekunder melalui SMF (Secondary Mortgage Facilities), biro kedit, asuransi kredit, lembaga pelayanan dokumentasi kredit; dan lembaga sita jaminan.</li>\r\n</ul>\r\n<li style="text-align: justify;">Pengembangan pembangunan perumahan yang bertumpu keswadayaan masyarakat, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Pelembagaan pembangunan perumahan bertumpu pada kelompok masyarakat &nbsp;(P2BPK);&nbsp;</li>\r\n<li style="text-align: justify;">(b) &nbsp;Pengembangan dan pendayagunaan potensi &nbsp;keswadayaan masyarakat;&nbsp;</li>\r\n<li style="text-align: justify;">(c) Pemberdayaan para pelaku kunci perumahan swadaya; serta&nbsp;</li>\r\n<li style="text-align: justify;">(d) Pengembangan akses pembiayaan perumahan swadaya.</li>\r\n</ul>\r\n<li style="text-align: justify;">Pengembangan berbagai jenis dan mekanisme subsidi perumahan, dapat berbentuk subsidi pembiayaan; subsidi prasarana dan sarana dasar lingkungan perumahan dan permukiman; ataupun kombinasi kedua subsidi tersebut.</li>\r\n<li style="text-align: justify;">Pemberdayaan usaha ekonomi masyarakat miskin, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Pemberdayaan masyarakat untuk mengembangkan kemampuan usaha dan hidup produktif;&nbsp;</li>\r\n<li style="text-align: justify;">(b) Penyediaan kemudahan akses kepada sumber daya serta prasarana dan sarana usaha bagi keluarga miskin, serta&nbsp;</li>\r\n<li style="text-align: justify;">(c) Pelatihan teknologi tepat guna, pengembangan kewirausahaan, serta keterampilan lainnya.</li>\r\n</ul>\r\n<li style="text-align: justify;">Pemenuhan kebutuhan perumahan dan permukiman akibat dampak bencana alam dan kerusuhan sosial, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Penanganan tanggap darurat;&nbsp;</li>\r\n<li style="text-align: justify;">(b) Rekonstruksi dan rehabilitasi bangunan, prasarana dan sarana dasar perumahan dan permukiman; &nbsp;serta</li>\r\n</ul>\r\n<li style="text-align: justify;">Pemukiman kembali pengungsi. Penanganan tanggap darurat merupakan upaya yang harus dilakukan dalam rangka penanganan pengungsi, penyelamatan korban dampak bencana alam atau kerusuhan sosial, sebelum proses lebih lanjut seperti pemulangan, pemberdayaan, dan pengalihan (relokasi).</li>\r\n<li style="text-align: justify;">Pengelolaan bangunan gedung dan rumah negara, melalui pembinaan teknis penyelenggaraan dan pengelolaan aset bangunan gedung dan rumah negara.</li>\r\n</ul>\r\n<li style="text-align: justify;">Mewujudkan permukiman yang sehat, aman, harmonis dan berkelanjutan guna mendukung pengembangan jatidiri, kemandirian, dan produktivitas masyarakat, melalui strategi:</li>\r\n<ul>\r\n<li style="text-align: justify;">Peningkatan kualitas lingkungan permukiman, dengan prioritas kawasan permukiman kumuh di perkotaan dan pesisir, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Penataan dan rehabilitasi kawasan permukiman kumuh;&nbsp;</li>\r\n<li style="text-align: justify;">(b) Perbaikan prasarana dan sarana dasar permukiman; serta&nbsp;</li>\r\n<li style="text-align: justify;">(c) Pengembangan rumah sewa, termasuk rumah susun sederhana sewa (rusunawa).</li>\r\n</ul>\r\n<li style="text-align: justify;">Pengembangan penyediaan prasarana dan sarana dasar permukiman, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Pengembangan kawasan siap bangun (Kasiba) dan lingkungan siap bangun (Lisiba); dan&nbsp;</li>\r\n<li style="text-align: justify;">(b) Pengembangan lingkungan siap bangun yang berdiri sendiri, yang &nbsp;berdasarkan RTRW Kabupaten atau Kota, dan Rencana Pembangunan dan Pengembangan Perumahan dan Permukiman di Daerah (RP4D) yang telah ditetapkan melalui peraturan daerah. Kasiba dan Lisiba tersebut dimaksudkan untuk mengembangkan kawasan permukiman skala besar secara terencana dan terpadu dalam manajemen kawasan yang efektif. Dalam pengembangan Kasiba dan Lisiba serta kaitannya dengan pengelolaan tata guna tanah, juga perlu dipertimbangkan pengembangan Bank Tanah untuk lebih mengendalikan harga tanah.</li>\r\n</ul>\r\n<li style="text-align: justify;">Penerapan tata lingkungan permukiman, meliputi&nbsp;</li>\r\n<ul>\r\n<li style="text-align: justify;">(a) Pelembagaan RP4D, yang merupakan pedoman perencanaan, pemrograman, pembangunan dan pengendalian pembangunan jangka menengah dan panjang secara sinergi melibatkan kemitraan pemerintah, dunia usaha dan masyarakat;&nbsp;</li>\r\n<li style="text-align: justify;">(b) Pelestarian bangunan bersejarah dan lingkungan permukiman tradisional;&nbsp;</li>\r\n<li style="text-align: justify;">(c) Revitalisasi lingkungan permukiman &nbsp;strategis; serta&nbsp;</li>\r\n<li style="text-align: justify;">(d) Pengembangan penataan dan pemantapan standar pelayanan minimal lingkungan permukiman untuk mencegah perubahan fungsi lahan, menghindari upaya penggusuran, mengembangkan pola hunian berimbang, menganalisis &nbsp;dampak lingkungan melalui &nbsp;Analisa &nbsp;Mengenai &nbsp;Dampak Lingkungan (AMDAL), Rencana Pengelolaan Lingkungan (RKL), Rencana Pemantauan Lingkungan (RPL), serta Upaya Pengelolaan Lingkungan (UKL) dan Upaya Pemantauan Lingkungan (UPL) secara konsisten.</li>\r\n</ul>\r\n</ul>\r\n</ol>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">E.3. Evaluasi Pelaksanaan Program Pengembangan Perumahan</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Perubahan kondisi sosial, ekonomi, dan politik yang &nbsp;sangat &nbsp;fundamental menuntut perlunya sistem perencanaan pembangunan yang komprehensif dan mengarah kepada perwujudan transparansi, demokratisasi, desentralisasi, dan partisipasi masyarakat, yang pada akhirnya dapat menjamin pemanfaatan dan pengalokasian sumber dana pembangunan yang semakin terbatas menjadi lebih efisien dan efektif serta berkelanjutan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Salah satu upaya untuk merespon tuntutan tersebut, pemerintah telah mengundangkan Undang-Undang Nomor 25 Tahun 2004 tentang Sistem Perencanaan Pembangunan Nasional (SPPN), yang didalamnya diatur sistem perencanaan pembangunan yang baru yang terdiri dari empat tahapan, yaitu:&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<ol>\r\n<li style="text-align: justify;">penyusunan &nbsp; rencana;&nbsp;</li>\r\n<li style="text-align: justify;">penetapan rencana;&nbsp;</li>\r\n<li style="text-align: justify;">pengendalian pelaksanaan rencana;&nbsp;</li>\r\n<li style="text-align: justify;">evaluasi pelaksanaan rencana. Perencanaan, pelaksanaan, pengendalian, dan evaluasi pelaksanaan rencana merupakan bagian-bagian dari fungsi manajemen yang saling terkait dan tidak dapat dipisahkan satu sama lain.</li>\r\n</ol>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Program-program pembangunan khususnya program pengembangan perumahan yang telah ditetapkan oleh pemerintah pada saat ini memerlukan suatu pengevaluasian untuk &nbsp;mengetahui sudah sampai sejauh &nbsp;mana &nbsp;pelaksanaannya &nbsp;karena &nbsp;hal &nbsp;ini berkaitan dengan aspek transparansi dan akuntabilitas kinerja pemerintah terhadap pihak-pihak yang berkepentingan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">Evaluasi pelaksanaan program pengembangan perumahan ini dilakukan untuk menilai pencapaian pelaksanaan program tersebut, efektifitas, efisiensi, manfaat, dampak, dan keberlanjutan dari program tersebut. Pengevaluasian ini juga menggunakan indikator-indikator yang digunakan dalam penyusunan program pengembangan perumahan ini yang dituangkan dalam Rencana Pembangunan Jangka Menengah Daerah Tapanuli Utara. Dan apakah program ini telah sesuai dengan apa yang menjadi tujuan yang telah ditetapkan oleh pemerintah daerah yaitu terpenuhinya kebutuhan akan rumah yang sehat, aman, serasi dengan lingkungan, terjangkau masyarakat terutama yang berpenghasilan menengah dan rendah dan juga meningkatkan kualitas perumahan melalui penguatan komunitas lembaga yang ada dalam rangka peningkatan kualitas sosial kemaasyarakatan.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;">&nbsp;</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;"><strong>Daftar Pustaka untuk Makalah Perumahan dan Permukiman</strong></div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div style="text-align: justify;"><strong>&nbsp;</strong></div>\r\n</div>\r\n<div style="text-align: justify;">\r\n<div>\r\n<div style="text-align: justify;"><span style="font-size: x-small;">Undang-Undang Nomor 4 Tahun 1992 <em>tentang Perumahan dan Permukiman&nbsp;</em></span></div>\r\n</div>\r\n<div>\r\n<div style="text-align: justify;"><span style="font-size: x-small;">&nbsp;</span></div>\r\n</div>\r\n<div>\r\n<div style="text-align: justify;"><span style="font-size: x-small;">S.K. Menteri Kimpraswil Nomor 217/2002 <em>tentang Kebijaksanaan dan Strategi Nasional Perumahan dan Permukiman (KSNPP)</em></span></div>\r\n</div>\r\n<div>\r\n<div style="text-align: justify;"><span style="font-size: x-small;">&nbsp;</span></div>\r\n</div>\r\n<div>\r\n<div style="text-align: justify;"><span style="font-size: x-small;">Undang-Undang Nomor 25 Tahun 2004 <em>tentang Sistem Perencanaan Pembangunan Nasional</em></span></div>\r\n</div>\r\n</div>', '2016-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_album`
--

CREATE TABLE IF NOT EXISTS `detail_album` (
  `id_detail` int(12) NOT NULL,
  `id_album` int(12) NOT NULL,
  `id_foto` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_album`
--

INSERT INTO `detail_album` (`id_detail`, `id_album`, `id_foto`) VALUES
(71, 25, 31),
(72, 25, 27),
(75, 26, 33),
(76, 27, 32),
(80, 28, 39),
(82, 28, 40),
(83, 29, 38),
(85, 1, 40),
(87, 1, 31),
(90, 30, 44),
(92, 31, 48),
(93, 31, 47),
(94, 29, 49),
(95, 26, 32),
(96, 27, 33),
(97, 32, 54),
(98, 32, 53),
(99, 32, 52),
(100, 33, 60),
(101, 33, 58),
(102, 33, 57),
(103, 34, 66),
(104, 34, 65),
(105, 34, 64),
(106, 34, 62),
(107, 1, 57),
(108, 1, 47),
(109, 1, 53),
(110, 35, 53),
(111, 35, 40),
(112, 35, 39),
(113, 36, 69),
(114, 36, 68),
(115, 36, 67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(12) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `judul`, `foto`) VALUES
(27, 'perumahan kinanthi 02', 'gb_1465421451.png'),
(31, 'griya kinanthi 01', 'gb_1465423309.PNG'),
(32, 'al-mahir gemplak 01', 'gb_1466230183.PNG'),
(33, 'al-mahir gemplak 02', 'gb_1466230172.PNG'),
(36, 'al-mahir gemplak 06', 'gb_1466230139.PNG'),
(38, 'al-mahir boyolali 02', 'gb_1465429320.PNG'),
(39, 'al-mahir boyolali 03', 'gb_1466215130.PNG'),
(40, 'al-mahir boyolali 04', 'gb_1466215114.PNG'),
(41, 'peta al-mahir boyolali', 'gb_1466222680.png'),
(42, 'denah al-mahir boyolali', 'gb_1466222689.png'),
(44, 'conoth lemari 2', 'gb_1465431290.PNG'),
(47, 'rumah tafhim depan', 'gb_1465869528.jpg'),
(48, 'rumah tafhim samping', 'gb_1465869543.jpg'),
(49, 'denah ruang al-mahir boyolali', 'gb_1466222782.png'),
(50, 'rumah type 60 ngemplak', 'gb_1466230457.PNG'),
(51, 'gemplak 01', 'gb_1466232817.png'),
(52, 'gemplak 02', 'gb_1466232831.png'),
(53, 'gemplak 03', 'gb_1466232844.png'),
(54, 'gemplak 04', 'gb_1466232856.png'),
(55, 'peta gemplak', 'gb_1466232867.png'),
(56, 'denah gemplak', 'gb_1466232883.png'),
(57, 'model graha kinanthi', 'gb_1466238641.jpg'),
(58, 'model graha kinanthi 2', 'gb_1466238653.jpg'),
(59, 'denah rumah graha kianthi 2', 'gb_1466238675.jpg'),
(60, 'denah lokasi graha kiana thi2', 'gb_1466238719.jpg'),
(61, 'gazebo 1', 'gb_1466239184.jpg'),
(62, 'gazebo 2', 'gb_1466239201.jpg'),
(63, 'gazebo 3', 'gb_1466239215.jpg'),
(64, 'gazebo 4', 'gb_1466239248.jpg'),
(65, 'gazebo 5', 'gb_1466239263.jpg'),
(66, 'gazebo 6', 'gb_1466239282.jpg'),
(67, 'rumah 3 lantai', 'gb_1466504273.jpg'),
(68, 'rumah 3 lantai 02', 'gb_1466504287.jpg'),
(69, 'rumah 3 lantai 03', 'gb_1466504305.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(12) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `jenis` enum('artikel','produk','model','') NOT NULL,
  `id_tampil` int(12) NOT NULL,
  `menu_utama` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `id_tampil`, `menu_utama`) VALUES
(17, 'best seller', '', 0, 0),
(18, 'Perumahan', 'produk', 16, 17),
(19, 'Model Rumah', 'model', 11, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `id_model` int(12) NOT NULL,
  `id_produk` int(12) NOT NULL,
  `id_album` int(12) NOT NULL,
  `nama_model` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `luas_tanah` int(12) NOT NULL,
  `tersedia` int(12) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`id_model`, `id_produk`, `id_album`, `nama_model`, `type`, `harga`, `luas_tanah`, `tersedia`, `deskripsi`) VALUES
(11, 13, 25, 'Model Rumah Graha Kinanthi', '50', 1500000000, 0, 3, '<h2><strong>Spesifikasi Bangunan</strong></h2>\r\n<table style="height: 377px;" width="510">\r\n<tbody>\r\n<tr>\r\n<td><span style="color: #ff0000;"><strong>No</strong></span></td>\r\n<td><span style="color: #ff0000;"><strong>Jenis</strong></span></td>\r\n<td><span style="color: #ff0000;"><strong>Keterangan</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td><strong>Pondasi</strong></td>\r\n<td>Pondasi Beton Setapak &amp; Batu Kali</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td><strong>Struktur</strong></td>\r\n<td>Beton Betulang</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td><strong>Dinding</strong></td>\r\n<td>\r\n<p>R.utama Keramik 40x40</p>\r\nR.Service keramik 20x20</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td><strong>Lantai</strong></td>\r\n<td>Gypsumboard 9mm dicat, R.Service Triplek 4mm</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td><strong>Platform</strong></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td><strong>Atap</strong></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td><strong>Pintu</strong></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>8</td>\r\n<td><strong>Kusen</strong></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>9</td>\r\n<td><strong>Instralasi Air</strong></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong><img src="http://localhost/solid/cdn/uploads/gb_1465423309.PNG" alt="" width="419" height="246" /></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(12, 14, 27, 'model rumah al-mahir kartosuro', '60', 1700000000, 0, 0, '<h2><strong>Spesifikasi Bangunan</strong></h2>\r\n<p style="text-align: left; padding-left: 30px;">Pondasi Beton Setapak</p>\r\n<p style="text-align: left; padding-left: 30px;">Struktur Beton Betulang</p>\r\n<p style="text-align: left; padding-left: 30px;">Dinding batas pres diplester diacimdicat</p>\r\n<p style="text-align: left; padding-left: 30px;">Carptot Coral</p>\r\n<p style="text-align: left; padding-left: 30px;">Atap rangka baja ringan, genteng beton</p>\r\n<p>&nbsp;<img src="http://localhost/solid/cdn/uploads/gb_1466230139.PNG" alt="" width="438" height="524" /></p>'),
(13, 15, 29, 'model rumah al-mahir boylali', '45', 1400000000, 0, 8, '<h1 style="text-align: center;"><strong>Spesifikasi Bangunan</strong></h1>\r\n<ul style="list-style-type: undefined;">\r\n<li>pondasi beton setapak dan batu kali</li>\r\n<li>beton bertulang</li>\r\n<li>bata pres di plester</li>\r\n<li>atap rangka baja ringan genteng beton</li>\r\n<li>kusen alumunium</li>\r\n<li>carport coral</li>\r\n<li>instalasi air pipa PVC</li>\r\n</ul>\r\n<p><br />&nbsp;</p>'),
(14, 0, 31, 'Rumah Tafhim 3 Lantai', '70', 2000000000, 0, 1, '<h2><strong>Spesifikasi Bangunan</strong></h2>\r\n<p>&nbsp;</p>\r\n<table style="height: 242px;" width="434">\r\n<tbody>\r\n<tr>\r\n<td>Pondasi</td>\r\n<td>Batu Kali</td>\r\n</tr>\r\n<tr>\r\n<td>Struktur</td>\r\n<td>Beton Bertulang</td>\r\n</tr>\r\n<tr>\r\n<td>Dinding</td>\r\n<td>Batu Bata Diplester, Finishing Cat</td>\r\n</tr>\r\n<tr>\r\n<td>Pagar Depan</td>\r\n<td>Type Minimalis</td>\r\n</tr>\r\n<tr>\r\n<td>Carport</td>\r\n<td>Rabat Beton</td>\r\n</tr>\r\n<tr>\r\n<td>Kusen</td>\r\n<td>Kayu Solid Dipelitur</td>\r\n</tr>\r\n<tr>\r\n<td>Daun Jendela</td>\r\n<td>Kayu Solid Dipelitur</td>\r\n</tr>\r\n<tr>\r\n<td>Daun Pintu</td>\r\n<td>Teakwood</td>\r\n</tr>\r\n<tr>\r\n<td>Pintu Depan</td>\r\n<td>Kayu Solid Dipelitur (Type Single / Double)</td>\r\n</tr>\r\n<tr>\r\n<td>Atap</td>\r\n<td>Genteng Beton Dicat</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(15, 15, 28, 'Al-mahir Boyolali Type 60', '60', 1600000000, 0, 7, '<h2>&nbsp;</h2>\r\n<h2 style="text-align: center;"><span style="color: #008000;"><strong>Denah Ruang</strong></span></h2>\r\n<h2>&nbsp;</h2>\r\n<p><span style="color: #008000;"><strong><img style="display: block; margin-left: auto; margin-right: auto;" src="http://localhost/solid/cdn/uploads/gb_1466222782.png" alt="" width="498" height="384" /></strong></span></p>\r\n<h2>&nbsp;</h2>\r\n<p><span style="color: #000000;"><strong>A. Ruang Tamu</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">menerima tamu dan privasi terjaga<br /></span></p>\r\n<p><span style="color: #000000;"><strong>B. Taman Dan Teras</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">tempat bermain anak dan ruang hijau<br /></span></p>\r\n<p><span style="color: #000000;"><strong>C. Carpot</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">tempoat yang teoat untuk motor</span></p>\r\n<p><span style="color: #000000;"><strong>D. Kamar Tidur Anak</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">difungsikan bagi anak maupun tamu terbatras</span></p>\r\n<p><span style="color: #000000;"><strong>E. Ruang Keluarga</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">dapat juga difuniskan sebahgai pertemuan tetangga</span></p>\r\n<p><span style="color: #000000;"><strong>F. Kamart Tidur Utama</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">idela untuk tempat berbagi dan menjaga kemesraan pasutri</span></p>\r\n<p><span style="color: #000000;"><strong>G. Kamar Mandi</strong></span></p>\r\n<p><span style="color: #000000;"><strong>H. in House Park</strong></span></p>\r\n<p style="padding-left: 30px;"><span style="color: #000000;">ruang terbuka hijau dalam rumah , membantu sirkulasi udara dan peneranagan dapat dimanfaatkan sebagai jemuran</span></p>\r\n<p><span style="color: #000000;"><strong>I. Ruang DApur</strong></span></p>\r\n<p>&nbsp;</p>\r\n<h2 style="text-align: left;"><span style="color: #339966;"><strong>Pesifikasi Bangunan</strong></span></h2>\r\n<table style="height: 303px;" width="450">\r\n<tbody>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Pondasi</strong></span></td>\r\n<td>Pondasi Beton setapal</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Struktur</strong></span></td>\r\n<td>beton bertulang</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Dinding</strong></span></td>\r\n<td>bata pres diplester</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>lantai</strong></span></td>\r\n<td>\r\n<p>R. utama keramik 40x40</p>\r\n<p>R. Service keramik 20x20</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Platform</strong></span></td>\r\n<td>Gypsimboard 9mm dicat,</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Arap</strong></span></td>\r\n<td style="text-align: center;">rangka baja ringn, genteng beton</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Pintu</strong></span></td>\r\n<td>\r\n<p>utama panel solid cat,</p>\r\n<p>;ainyadouble triple cat</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Kusen</strong></span></td>\r\n<td>alumunim</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Listrik</strong></span></td>\r\n<td>900 watt, 220 volt</td>\r\n</tr>\r\n<tr>\r\n<td><span style="color: #0000ff;"><strong>Carport</strong></span></td>\r\n<td>koral</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p>&nbsp;</p>'),
(16, 16, 32, 'ngemplak type 50', '50', 1300000000, 0, 4, '<h2 style="text-align: left;"><span style="color: #339966;"><strong>Pesifikasi Bangunan</strong></span></h2>\r\n<p><span style="color: #0000ff;"><strong>Pondasi</strong></span> Pondasi Beton setapal</p>\r\n<p><span style="color: #0000ff;"><strong>Struktur </strong></span>beton bertulang</p>\r\n<p><span style="color: #0000ff;"><strong>Dinding </strong></span>bata pres diplester</p>\r\n<p><span style="color: #0000ff;"><strong>lantai </strong></span>R. utama keramik 40x40</p>\r\n<p><span style="color: #0000ff;"><strong>Platform</strong></span> Gypsimboard 9mm dicat,</p>\r\n<p><span style="color: #0000ff;"><strong>Arap</strong></span> rangka baja ringn, genteng beton</p>\r\n<p><span style="color: #0000ff;"><strong>Pintu</strong></span> utama panel solid cat, ainyadouble triple cat</p>\r\n<p><span style="color: #0000ff;"><strong>Kusen</strong></span> alumunim</p>\r\n<p><span style="color: #0000ff;"><strong>Listrik </strong></span>900 watt, 220 volt</p>\r\n<p><span style="color: #0000ff;"><strong>Carport </strong></span>koral</p>\r\n<p>&nbsp;</p>'),
(17, 16, 33, 'gemplak kartosuro 2', '50', 1450000000, 0, 12, '<h2><strong>Spesifikasi Bangunan</strong></h2>\r\n<p><strong>Pondasi </strong>Pondasi Beton Setapak &amp; Batu Kali2</p>\r\n<p><strong>Struktur</strong> Beton Betulang3</p>\r\n<p><strong>Dinding </strong>R.utama Keramik 40x40R.Service keramik 20x204</p>\r\n<p><strong>Lantai</strong> Gypsumboard 9mm dicat, R.Service Triplek 4mm5</p>\r\n<p><strong>Platform</strong>&nbsp;6Atap&nbsp;7Pintu&nbsp;8Kusen&nbsp;9Instralasi Air</p>\r\n<p><img src="http://localhost/solid/cdn/uploads/gb_1466238675.jpg" alt="" width="533" height="711" /></p>\r\n<p>&nbsp;</p>'),
(18, 0, 34, 'Gazebo', '.', 3000000, 0, 3, '<h3 class="post-title entry-title">Spesifikasi Produk</h3>\r\n<div class="post-header">&nbsp;</div>\r\n<p>Jenis-Jenis Ukuran : <br /> <br /> 1. PxLxT = 200x200x250<br /> 2. PxLxT = 250x250x250<br /> 3. PxLxT = 300x300x250<br /> <br /> Atap :<br /> <br /> Genteng / Sirap<br /> <br /> Lantai :<br /> <br /> 1. Marmer<br /> 2. Keramik<br /> 3. Kayu Kelapa</p>\r\n<p><img src="http://localhost/solid/cdn/uploads/gb_1466239184.jpg" alt="" width="310" height="284" /></p>'),
(19, 0, 36, 'Rumah 3 Lantai', '70', 1300000000, 0, 1, '<h1 style="text-align: center;"><strong>Spesifikasi Bangunan</strong></h1>\r\n<ul style="list-style-type: undefined;">\r\n<li>pondasi beton setapak dan batu kali</li>\r\n<li>beton bertulang</li>\r\n<li>bata pres di plester</li>\r\n<li>atap rangka baja ringan genteng beton</li>\r\n<li>kusen alumunium</li>\r\n<li>carport coral</li>\r\n<li>instalasi air pipa PVC</li>\r\n</ul>'),
(20, 15, 1, 'efs', '435', 453534, 50, 3, '<p>fdgdfgdf</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(12) NOT NULL,
  `id_album` int(12) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `peta` varchar(100) NOT NULL,
  `denah` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_album`, `judul`, `kota`, `lokasi`, `deskripsi`, `peta`, `denah`) VALUES
(13, 25, 'Graha Kinanthi', 'Yogyakarta', 'Kalasan , Yogyakarta', '<h2><strong>Fasilitas Khusus</strong></h2>\r\n<ul style="list-style-type: undefined;">\r\n<li>Al-mahir Internal Unit Connnection<br />sarana komunikasi dan informasi terpagu yang ada di setiap unit rumah qur''ani</li>\r\n<li>Kajian Suami Sholih Suami</li>\r\n<li>Kajian Istri Sholih Suami</li>\r\n<li>Bermanja Al-mahir (Bermain, Mnegaji, dan Bermain Anak-anak)</li>\r\n</ul>\r\n<h2><strong>Fasilitas Umum</strong></h2>\r\n<ol style="list-style-type: undefined;">\r\n<li><strong>5 menit ke kantor kabupaten kota</strong></li>\r\n<li><strong>10 menit ke pusat pendidikan jogja</strong></li>\r\n<li><strong>15 menit ke pusat bisnis jogja</strong></li>\r\n</ol>\r\n<p>&nbsp;</p>', '1465424168_error.jpg', '1466504104_kinanthi-kalasan01.png'),
(14, 27, 'Al-mahir gumpang Kartosuro', 'kartosuro', 'gumpang, kartosuro', '<h2><strong>Fasilitas Umum</strong></h2>\r\n<ul style="list-style-type: circle;">\r\n<li>15 menit ke kantor pemerintahan</li>\r\n<li>10 menit ke pusat pendidikan surakarta</li>\r\n<li>10 menit ke saran rekreasi</li>\r\n<li>15 menit ke pusat bisnis surakarta</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '1466229966_peta.PNG', '1466504092_gumpang01.png'),
(15, 28, 'al-mahir boyolali', 'boyolali', 'banaran boyolali', '<h2><strong>Fasilitas Umum Strategis</strong></h2>\r\n<ul style="list-style-type: undefined;">\r\n<li>5 menit ke terminal boyolali</li>\r\n<li>5 menit ke sunggingan</li>\r\n<li>8 menit ke tempat rekreasi dan kuliner boyolali</li>\r\n<li>8 menit ke pusat bisnis boyolali</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2><strong>Fasilitas Ksusus</strong></h2>\r\n<ul style="list-style-type: circle;">\r\n<li>Al mahir internal unit conection</li>\r\n<li>kajian suami sholih griya al-mahir</li>\r\n<li>kajian istri sholih giya al-mahir</li>\r\n<li>bermanja al-mahir (bermain belajar dan mnegaji anak-anak)</li>\r\n</ul>', '1466220580_peta.png', '1466504064_boyolali01.png'),
(16, 26, 'Al-mahir NGemplak Kartosuro', 'Kartosuro', 'Ngemplak Kartosuro', '<h2><strong>Fasilitas Umum Strategis</strong></h2>\r\n<ul style="list-style-type: undefined;">\r\n<li>20 menit ke kantor pemerintahan</li>\r\n<li>15 menit ke pusat pendidikan surakarta</li>\r\n<li>8 menit ke tempat rekreasi dan kuliner surakarta</li>\r\n<li>15 menit ke pusat bisnis surakarta</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2><strong>Fasilitas Ksusus</strong></h2>\r\n<ul style="list-style-type: circle;">\r\n<li>Al mahir internal unit conection</li>\r\n<li>kajian suami sholih griya al-mahir</li>\r\n<li>kajian istri sholih giya al-mahir</li>\r\n<li>bermanja al-mahir (bermain belajar dan mnegaji anak-anak)</li>\r\n</ul>', '1466233139_peta.png', '1466504051_ngemplak02.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`nama`, `alamat`, `email`, `telp`) VALUES
('PT. Solid Citra Konstruksi', 'Jl. Slamet Riyadi N0.127 A Kartosuro , Jawa Tengah', 'budisolid@gmail.com', '0271784523');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `detail_album`
--
ALTER TABLE `detail_album`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detail_album`
--
ALTER TABLE `detail_album`
  MODIFY `id_detail` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
