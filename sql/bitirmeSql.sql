-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 May 2019, 00:55:30
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bitirme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baslik`
--

CREATE TABLE `baslik` (
  `id_baslik` int(11) NOT NULL,
  `baslik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `baslik`
--

INSERT INTO `baslik` (`id_baslik`, `baslik`) VALUES
(1, 'Sınavlarla İlgili Duyuru'),
(7, 'Dikkat! Ornek Baslik.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran`
--

CREATE TABLE `ekran` (
  `id_ekran` int(11) NOT NULL,
  `id_template` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ekran`
--

INSERT INTO `ekran` (`id_ekran`, `id_template`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firma`
--

CREATE TABLE `firma` (
  `id_firma` int(11) NOT NULL,
  `id_kullanici` int(11) NOT NULL,
  `firmaad` varchar(50) NOT NULL,
  `adres` text NOT NULL,
  `telefon` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `firma`
--

INSERT INTO `firma` (`id_firma`, `id_kullanici`, `firmaad`, `adres`, `telefon`) VALUES
(9, 2, 'Ornek Firma', 'Sivas/Merkez ', 3462221234);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id_kullanici` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `sifre` varchar(30) NOT NULL,
  `yetki` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id_kullanici`, `kullanici_adi`, `mail`, `sifre`, `yetki`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 1),
(2, 'Sait', 'saitokan@gmail.com', '1', 0),
(3, 'at', 'a@g.com', '1', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `metin`
--

CREATE TABLE `metin` (
  `id_metin` int(11) NOT NULL,
  `metin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `metin`
--

INSERT INTO `metin` (`id_metin`, `metin`) VALUES
(7, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis sit velit vero? A adipisci cumque doloremque expedita ipsum, minima molestias placeat quae, quia quisquam ratione reiciendis velit. Ad, maxime nihil?');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id_resim` int(11) NOT NULL,
  `id_kullanici` int(11) NOT NULL,
  `resimurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id_resim`, `id_kullanici`, `resimurl`) VALUES
(1, 2, 'img/kullanici1img1.png'),
(2, 2, 'img/2-2-cover-4-1170x800.jpg'),
(3, 2, 'img/2-3-Başlıksız-1.png'),
(4, 2, 'img/2-4-Başlıksız-2.png'),
(5, 2, 'img/2-5-Başlıksız-2.png'),
(6, 2, 'img/2-6-aaa.png'),
(7, 2, 'img/2-7-dikkat-levhasi-normal-performans-a085.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `template`
--

CREATE TABLE `template` (
  `id_template` int(11) NOT NULL,
  `id_kullanici` int(11) NOT NULL,
  `id_baslik` int(11) NOT NULL,
  `id_metin` int(11) NOT NULL,
  `id_resim` int(11) NOT NULL,
  `id_firma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `template`
--

INSERT INTO `template` (`id_template`, `id_kullanici`, `id_baslik`, `id_metin`, `id_resim`, `id_firma`) VALUES
(7, 2, 7, 7, 7, 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `baslik`
--
ALTER TABLE `baslik`
  ADD PRIMARY KEY (`id_baslik`);

--
-- Tablo için indeksler `ekran`
--
ALTER TABLE `ekran`
  ADD PRIMARY KEY (`id_ekran`);

--
-- Tablo için indeksler `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id_firma`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id_kullanici`);

--
-- Tablo için indeksler `metin`
--
ALTER TABLE `metin`
  ADD PRIMARY KEY (`id_metin`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`id_resim`);

--
-- Tablo için indeksler `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id_template`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `baslik`
--
ALTER TABLE `baslik`
  MODIFY `id_baslik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `ekran`
--
ALTER TABLE `ekran`
  MODIFY `id_ekran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id_kullanici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `metin`
--
ALTER TABLE `metin`
  MODIFY `id_metin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id_resim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `template`
--
ALTER TABLE `template`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
