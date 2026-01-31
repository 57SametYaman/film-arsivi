-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 12 May 2025, 08:49:31
-- Sunucu sürümü: 5.7.15-log
-- PHP Sürümü: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sakarya_bip_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_araclar`
--

CREATE TABLE `tbl_araclar` (
  `arac_id` int(11) NOT NULL,
  `marka` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `model_yili` smallint(6) DEFAULT NULL,
  `yakit` varchar(10) DEFAULT NULL,
  `vites` varchar(10) DEFAULT NULL,
  `musait_mi` varchar(1) DEFAULT 'E',
  `gunluk_fiyat` double DEFAULT NULL,
  `resim_var_mi` varchar(1) NOT NULL DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_araclar`
--

INSERT INTO `tbl_araclar` (`arac_id`, `marka`, `model`, `model_yili`, `yakit`, `vites`, `musait_mi`, `gunluk_fiyat`, `resim_var_mi`) VALUES
(1, 'ford', 'focus', 2020, 'dizel', 'otomatik', 'E', 3500, 'E'),
(2, 'renault', 'clio', 2021, 'dizel', 'manuel', 'E', 2850, 'E'),
(3, 'renault', 'captur', 2017, 'LPG', 'otomatik', 'E', 3050, 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_rezervasyonlar`
--

CREATE TABLE `tbl_rezervasyonlar` (
  `rezervasyon_id` int(11) NOT NULL,
  `arac_id` int(11) DEFAULT NULL,
  `tc_kimlik` varchar(11) DEFAULT NULL,
  `ad_soyad` varchar(30) DEFAULT NULL,
  `alma_tarihi` date DEFAULT NULL,
  `teslim_tarihi` date DEFAULT NULL,
  `tutar` double DEFAULT NULL,
  `durumu` varchar(15) DEFAULT 'onay bekliyor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_rezervasyonlar`
--

INSERT INTO `tbl_rezervasyonlar` (`rezervasyon_id`, `arac_id`, `tc_kimlik`, `ad_soyad`, `alma_tarihi`, `teslim_tarihi`, `tutar`, `durumu`) VALUES
(1, 2, '222', 'gazi demirlendi', '2025-05-10', '2025-05-13', 8550, 'onay bekliyor'),
(2, 3, '333', 'isa türkmen', '2025-05-13', '2025-05-16', 9150, 'onay bekliyor'),
(3, 1, '777', 'ayşe karaerkek', '2025-05-19', '2025-05-23', 14000, 'onay bekliyor'),
(4, 1, '222', 'gazi demirlendi', '2025-05-27', '2025-06-01', 17500, 'onay bekliyor');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  ADD PRIMARY KEY (`rezervasyon_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  MODIFY `rezervasyon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
