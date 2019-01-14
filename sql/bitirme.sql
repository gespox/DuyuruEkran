-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Oca 2019, 02:57:37
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
-- Tablo için tablo yapısı `altbaslik`
--

CREATE TABLE `altbaslik` (
  `id_altbaslik` int(11) NOT NULL,
  `id_baslik` int(11) NOT NULL,
  `altbaslik` varchar(50) NOT NULL,
  `abtext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baslik`
--

CREATE TABLE `baslik` (
  `id_baslik` int(11) NOT NULL,
  `btext` text NOT NULL,
  `baslik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `baslik`
--

INSERT INTO `baslik` (`id_baslik`, `btext`, `baslik`) VALUES
(1, 'Duyuru Başlangıç Tarihi : 08.01.2019 - Duyuru Bitiş Tarihi : 09.01.2019\r\n\r\nÖĞRENCİLERİMİZİN DİKKATİNE ! ', 'Sınavlarla İlgili Duyuru');

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
  `firmaad` varchar(50) NOT NULL,
  `adres` text NOT NULL,
  `telefon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `firma`
--

INSERT INTO `firma` (`id_firma`, `firmaad`, `adres`, `telefon`) VALUES
(1, 'Cumhuriyet Universitesi', 'Sivas Cumhuriyet Üniversitesi 58140 KAMPÜS/SİVAS', '+90 346 219 10 10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id_kullanici` int(11) NOT NULL,
  `k_adi` varchar(50) NOT NULL,
  `parola` varchar(30) NOT NULL,
  `yetki` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id_kullanici`, `k_adi`, `parola`, `yetki`) VALUES
(1, 'admin', 'admin', 1);

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
(1, 'Valiliğimiz tarafından Milli Eğitime bağlı okullarda 09 Ocak 2019 Çarşamba günü (yarın) okullar tatil edilmiş olup Üniversitemizde eğitim-öğretime devam edilecektir. Sınavlar belirlenen tarihlerde yapılacak olup herhangi bir erteleme söz konusu değildir. \r\n \r\nÜniversitemizde yapılması planlanan derslerin ve sınavların ileri bir tarihe ertelendiği gibi yalan ve yanlış paylaşımlar yapıldığı görülmüş olup bu ve buna benzer asılsız haberlere itibar edilmemesini, \r\n \r\nDuyurulması gereken konuların Üniversitemiz web sitesi (www.cumhuriyet.edu.tr) ve kurumsal sosyal medya hesaplarından yapılacağını, bunların haricinde yapılan duyuru ve haberlere itibar edilmemesini önemle rica ederiz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id_resim` int(11) NOT NULL,
  `resimurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id_resim`, `resimurl`) VALUES
(1, '../img/img_avatar2.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `template`
--

CREATE TABLE `template` (
  `id_template` int(11) NOT NULL,
  `id_baslik` int(11) NOT NULL,
  `id_metin` int(11) NOT NULL,
  `id_resim` int(11) NOT NULL,
  `id_firma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `template`
--

INSERT INTO `template` (`id_template`, `id_baslik`, `id_metin`, `id_resim`, `id_firma`) VALUES
(1, 1, 1, 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `altbaslik`
--
ALTER TABLE `altbaslik`
  ADD PRIMARY KEY (`id_altbaslik`);

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
-- Tablo için AUTO_INCREMENT değeri `altbaslik`
--
ALTER TABLE `altbaslik`
  MODIFY `id_altbaslik` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `baslik`
--
ALTER TABLE `baslik`
  MODIFY `id_baslik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ekran`
--
ALTER TABLE `ekran`
  MODIFY `id_ekran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id_kullanici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `metin`
--
ALTER TABLE `metin`
  MODIFY `id_metin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id_resim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `template`
--
ALTER TABLE `template`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
