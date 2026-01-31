-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 14 Mar 2025, 13:42:13
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
  `gunluk_fiyat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_araclar`
--

INSERT INTO `tbl_araclar` (`arac_id`, `marka`, `model`, `model_yili`, `yakit`, `vites`, `musait_mi`, `gunluk_fiyat`) VALUES
(1, 'ford', 'focus', 2020, 'dizel', 'otomatik', 'E', 3500),
(2, 'renault', 'clio', 2021, 'dizel', 'manuel', 'E', 2850),
(3, 'renault', 'captur', 2017, 'LPG', 'otomatik', 'E', 3050);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  ADD PRIMARY KEY (`arac_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_araclar`
--
ALTER TABLE `tbl_araclar`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
