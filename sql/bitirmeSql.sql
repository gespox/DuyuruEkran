-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Haz 2019, 16:22:03
-- Sunucu sürümü: 10.1.39-MariaDB
-- PHP Sürümü: 7.2.18

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
-- Tablo için tablo yapısı `alt`
--

CREATE TABLE `alt` (
  `id_alt` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `altduyuru_id` int(11) DEFAULT NULL,
  `ozel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id_ayarlar` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yenileme_time` bigint(20) NOT NULL,
  `tema` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_duyuru`
--

CREATE TABLE `a_duyuru` (
  `id_aduyuru` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_ozel`
--

CREATE TABLE `a_ozel` (
  `id_aozel` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran`
--

CREATE TABLE `ekran` (
  `id_ekran` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `orta_id` int(11) NOT NULL,
  `sag_id` int(11) NOT NULL,
  `alt_id` int(11) NOT NULL,
  `yenileme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ekran`
--

INSERT INTO `ekran` (`id_ekran`, `kullanici_id`, `orta_id`, `sag_id`, `alt_id`, `yenileme`) VALUES
(1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firma`
--

CREATE TABLE `firma` (
  `id_firma` int(11) NOT NULL,
  `id_kullanici` int(11) NOT NULL,
  `firmaad` varchar(50) NOT NULL,
  `adres` text NOT NULL,
  `telefon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `firma`
--

INSERT INTO `firma` (`id_firma`, `id_kullanici`, `firmaad`, `adres`, `telefon`) VALUES
(1, 0, 'Cumhuriyet Universitesi', 'Sivas Cumhuriyet Üniversitesi 58140 KAMPÜS/SİVAS', '+90 346 219 10 10'),
(2, 2, 'Ornek Firma', ' asdasd', '5377669539');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id_kullanici` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `sifre` varchar(30) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `telefon` bigint(20) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'img/avatar2.png',
  `yetki` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id_kullanici`, `mail`, `sifre`, `adsoyad`, `telefon`, `avatar`, `yetki`) VALUES
(1, 'admin@admin.com', 'admin', '', 0, 'img/avatar2.png', 1),
(2, 'saitokan@gmail.com', '1', 'Sait Okan', 5377669539, 'img/avatar2.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurum`
--

CREATE TABLE `kurum` (
  `id_kurum` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `il` varchar(30) NOT NULL,
  `ilce` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orta`
--

CREATE TABLE `orta` (
  `id_orta` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `resimsiz_id` int(11) NOT NULL,
  `resimli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimli`
--

CREATE TABLE `resimli` (
  `id_resimli` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazi` text NOT NULL,
  `resim_url` varchar(100) NOT NULL,
  `bitis` date NOT NULL,
  `sure` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimsiz`
--

CREATE TABLE `resimsiz` (
  `id_resimsiz` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL,
  `sure` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sag`
--

CREATE TABLE `sag` (
  `id_sag` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `sayac_id` int(11) NOT NULL,
  `sduyuru_id` int(11) NOT NULL,
  `sagslider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayac`
--

CREATE TABLE `sayac` (
  `id_sayac` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `slider_url` varchar(100) NOT NULL,
  `bitis` date NOT NULL,
  `sure` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `s_duyuru`
--

CREATE TABLE `s_duyuru` (
  `id_sduyuru` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `s_slider`
--

CREATE TABLE `s_slider` (
  `id_sslider` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `resim_ad` varchar(100) NOT NULL,
  `resim_url` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonlendirici`
--

CREATE TABLE `yonlendirici` (
  `id_yonlendirici` int(11) NOT NULL,
  `mac_address` int(11) NOT NULL,
  `ekran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id_ayarlar`);

--
-- Tablo için indeksler `a_duyuru`
--
ALTER TABLE `a_duyuru`
  ADD PRIMARY KEY (`id_aduyuru`);

--
-- Tablo için indeksler `a_ozel`
--
ALTER TABLE `a_ozel`
  ADD PRIMARY KEY (`id_aozel`);

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
  ADD PRIMARY KEY (`id_kullanici`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Tablo için indeksler `kurum`
--
ALTER TABLE `kurum`
  ADD PRIMARY KEY (`id_kurum`);

--
-- Tablo için indeksler `orta`
--
ALTER TABLE `orta`
  ADD PRIMARY KEY (`id_orta`);

--
-- Tablo için indeksler `resimli`
--
ALTER TABLE `resimli`
  ADD PRIMARY KEY (`id_resimli`);

--
-- Tablo için indeksler `resimsiz`
--
ALTER TABLE `resimsiz`
  ADD PRIMARY KEY (`id_resimsiz`);

--
-- Tablo için indeksler `sag`
--
ALTER TABLE `sag`
  ADD PRIMARY KEY (`id_sag`);

--
-- Tablo için indeksler `sayac`
--
ALTER TABLE `sayac`
  ADD PRIMARY KEY (`id_sayac`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Tablo için indeksler `s_duyuru`
--
ALTER TABLE `s_duyuru`
  ADD PRIMARY KEY (`id_sduyuru`);

--
-- Tablo için indeksler `s_slider`
--
ALTER TABLE `s_slider`
  ADD PRIMARY KEY (`id_sslider`);

--
-- Tablo için indeksler `yonlendirici`
--
ALTER TABLE `yonlendirici`
  ADD PRIMARY KEY (`id_yonlendirici`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id_ayarlar` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `a_duyuru`
--
ALTER TABLE `a_duyuru`
  MODIFY `id_aduyuru` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `a_ozel`
--
ALTER TABLE `a_ozel`
  MODIFY `id_aozel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ekran`
--
ALTER TABLE `ekran`
  MODIFY `id_ekran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id_kullanici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kurum`
--
ALTER TABLE `kurum`
  MODIFY `id_kurum` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orta`
--
ALTER TABLE `orta`
  MODIFY `id_orta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `resimli`
--
ALTER TABLE `resimli`
  MODIFY `id_resimli` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `resimsiz`
--
ALTER TABLE `resimsiz`
  MODIFY `id_resimsiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sag`
--
ALTER TABLE `sag`
  MODIFY `id_sag` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sayac`
--
ALTER TABLE `sayac`
  MODIFY `id_sayac` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `s_duyuru`
--
ALTER TABLE `s_duyuru`
  MODIFY `id_sduyuru` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `s_slider`
--
ALTER TABLE `s_slider`
  MODIFY `id_sslider` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yonlendirici`
--
ALTER TABLE `yonlendirici`
  MODIFY `id_yonlendirici` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
