-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Tem 2019, 16:46:18
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
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id_ayarlar` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yenileme_time` bigint(20) NOT NULL DEFAULT '900000',
  `tema` varchar(20) NOT NULL DEFAULT 'css/stil_yeni.css',
  `orta_Sure` int(11) NOT NULL DEFAULT '10000',
  `sagSlider_sure` int(11) NOT NULL DEFAULT '10000',
  `sagDuyuru_sure` int(11) NOT NULL DEFAULT '10000',
  `sagSayac_sure` int(11) NOT NULL DEFAULT '10000'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id_ayarlar`, `kullanici_id`, `yenileme_time`, `tema`, `orta_Sure`, `sagSlider_sure`, `sagDuyuru_sure`, `sagSayac_sure`) VALUES
(1, 9, 900000, 'css/stil_yeni.css', 10000, 10000, 10000, 10000);

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

--
-- Tablo döküm verisi `a_duyuru`
--

INSERT INTO `a_duyuru` (`id_aduyuru`, `kullanici_id`, `yazi`, `bitis`) VALUES
(3, 2, 'asdasdasd', '2019-07-17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `a_ozel`
--

CREATE TABLE `a_ozel` (
  `id_aozel` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `a_ozel`
--

INSERT INTO `a_ozel` (`id_aozel`, `kullanici_id`, `yazi`) VALUES
(2, 2, 'Selamlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildirim`
--

CREATE TABLE `bildirim` (
  `id_bildirim` int(11) NOT NULL,
  `bildirimText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `bildirim`
--

INSERT INTO `bildirim` (`id_bildirim`, `bildirimText`) VALUES
(4, 'Kullanici Panelinde Artik profil fotografi degistirebilirsiniz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran`
--

CREATE TABLE `ekran` (
  `id_ekran` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yenileme` int(11) NOT NULL DEFAULT '10000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ekran`
--

INSERT INTO `ekran` (`id_ekran`, `kullanici_id`, `yenileme`) VALUES
(2, 7, 10000),
(3, 9, 10000),
(4, 2, 10000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_altduyuru`
--

CREATE TABLE `ekran_altduyuru` (
  `ekran_id` int(11) NOT NULL,
  `altduyuru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_altozel`
--

CREATE TABLE `ekran_altozel` (
  `ekran_id` int(11) NOT NULL,
  `altozel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_resimli`
--

CREATE TABLE `ekran_resimli` (
  `ekran_id` int(11) NOT NULL,
  `resimli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_resimsiz`
--

CREATE TABLE `ekran_resimsiz` (
  `ekran_id` int(11) NOT NULL,
  `resimsiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_sagduyuru`
--

CREATE TABLE `ekran_sagduyuru` (
  `ekran_id` int(11) NOT NULL,
  `sagduyuru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_sagsayac`
--

CREATE TABLE `ekran_sagsayac` (
  `ekran_id` int(11) NOT NULL,
  `sagsayac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_sagslider`
--

CREATE TABLE `ekran_sagslider` (
  `ekran_id` int(11) NOT NULL,
  `sagslider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekran_slider`
--

CREATE TABLE `ekran_slider` (
  `ekran_id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

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
(1, 'admin@admin.com', 'admin', 'Admin Admin', 23241234, 'img/1-kullanici1img1.png', 1),
(2, 'saitokan@gmail.com', '1', 'Mehmet Sait Okan', 5377669539, 'img/2-DSC_0004+.jpg', 0),
(3, 'saitokan@yandex.com', '123', 'Mehmet Sait Okan', 5377669539, 'img/avatar2.png', 1),
(4, 'asdads@yandex.com', '13', 'sdi', 234, 'img/avatar2.png', 0),
(6, 'ali@ads.cc', '3132', 'sfdf', 2432, 'img/avatar2.png', 0),
(7, 'asdqwe@asd.cc', '123', 'kullanici test', 123, 'img/avatar2.png', 0),
(9, 'qweqew@qwe.com', 'qwe', 'qwe', 123, 'img/avatar2.png', 0),
(10, 'sulu@gmail.com', '12345678', 'Suleyman Fiskiyecioglugil', 536, 'img/avatar2.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurum`
--

CREATE TABLE `kurum` (
  `id_kurum` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `il` varchar(30) DEFAULT NULL,
  `ilce` varchar(50) DEFAULT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'img/logo.png',
  `mail` varchar(30) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `adres` text
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `kurum`
--

INSERT INTO `kurum` (`id_kurum`, `kullanici_id`, `ad_soyad`, `il`, `ilce`, `logo`, `mail`, `telefon`, `adres`) VALUES
(1, 6, 'sfdf', NULL, NULL, 'img/logo.png', 'ali@ads.cc', '2432', NULL),
(2, 7, 'kullanici test', NULL, NULL, 'img/logo.png', 'asdqwe@asd.cc', '123', NULL),
(3, 9, 'qwe', NULL, NULL, 'img/logo.png', 'qweqew@qwe.com', '123', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `o_resimli`
--

CREATE TABLE `o_resimli` (
  `id_resimli` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazi` text NOT NULL,
  `resim_url` varchar(100) NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `o_resimli`
--

INSERT INTO `o_resimli` (`id_resimli`, `kullanici_id`, `baslik`, `yazi`, `resim_url`, `bitis`) VALUES
(2, 2, 'asdad', 'asdad', 'img/ResimliDuyuru/2-DaG51gvV4AA-yZv.jpg', '2019-07-13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `o_resimsiz`
--

CREATE TABLE `o_resimsiz` (
  `id_resimsiz` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `o_resimsiz`
--

INSERT INTO `o_resimsiz` (`id_resimsiz`, `kullanici_id`, `baslik`, `yazi`, `bitis`) VALUES
(2, 2, 'Resimsiz', 'Duyuru icerigi', '2019-07-17'),
(3, 2, 'Duygu ozel', 'duyuru duygu', '2019-07-13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `o_slider`
--

CREATE TABLE `o_slider` (
  `id_slider` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `slider_url` varchar(100) NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `o_slider`
--

INSERT INTO `o_slider` (`id_slider`, `kullanici_id`, `slider_url`, `bitis`) VALUES
(11, 2, 'img/slider/2-2-2-2-cover-4-1170x800.jpg', '2019-07-11');

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
-- Tablo için tablo yapısı `s_sayac`
--

CREATE TABLE `s_sayac` (
  `id_sayac` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazi` text NOT NULL,
  `bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `s_sayac`
--

INSERT INTO `s_sayac` (`id_sayac`, `kullanici_id`, `yazi`, `bitis`) VALUES
(3, 2, 'asdasdad', '2019-07-21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `s_slider`
--

CREATE TABLE `s_slider` (
  `id_sslider` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
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
-- Tablo için indeksler `bildirim`
--
ALTER TABLE `bildirim`
  ADD PRIMARY KEY (`id_bildirim`);

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
-- Tablo için indeksler `o_resimli`
--
ALTER TABLE `o_resimli`
  ADD PRIMARY KEY (`id_resimli`);

--
-- Tablo için indeksler `o_resimsiz`
--
ALTER TABLE `o_resimsiz`
  ADD PRIMARY KEY (`id_resimsiz`);

--
-- Tablo için indeksler `o_slider`
--
ALTER TABLE `o_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Tablo için indeksler `s_duyuru`
--
ALTER TABLE `s_duyuru`
  ADD PRIMARY KEY (`id_sduyuru`);

--
-- Tablo için indeksler `s_sayac`
--
ALTER TABLE `s_sayac`
  ADD PRIMARY KEY (`id_sayac`);

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
  MODIFY `id_ayarlar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `a_duyuru`
--
ALTER TABLE `a_duyuru`
  MODIFY `id_aduyuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `a_ozel`
--
ALTER TABLE `a_ozel`
  MODIFY `id_aozel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `bildirim`
--
ALTER TABLE `bildirim`
  MODIFY `id_bildirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ekran`
--
ALTER TABLE `ekran`
  MODIFY `id_ekran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id_kullanici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kurum`
--
ALTER TABLE `kurum`
  MODIFY `id_kurum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `o_resimli`
--
ALTER TABLE `o_resimli`
  MODIFY `id_resimli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `o_resimsiz`
--
ALTER TABLE `o_resimsiz`
  MODIFY `id_resimsiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `o_slider`
--
ALTER TABLE `o_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `s_duyuru`
--
ALTER TABLE `s_duyuru`
  MODIFY `id_sduyuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `s_sayac`
--
ALTER TABLE `s_sayac`
  MODIFY `id_sayac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `s_slider`
--
ALTER TABLE `s_slider`
  MODIFY `id_sslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yonlendirici`
--
ALTER TABLE `yonlendirici`
  MODIFY `id_yonlendirici` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
