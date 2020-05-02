-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2020, 16:29:55
-- Sunucu sürümü: 10.4.8-MariaDB
-- PHP Sürümü: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hotel-login`
--
CREATE DATABASE IF NOT EXISTS `hotel-login` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_turkish_ci;
USE `hotel-login`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `mail` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `gender` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `birthday` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `membership` varchar(255) COLLATE ucs2_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`id`, `fname`, `surname`, `mail`, `gender`, `phone`, `birthday`, `membership`) VALUES
(113, 'Doğukan', 'İnce', 'dogukanincee@gmail.com', 'Male', '5457778844', '15101997', 'platinum'),
(119, 'Bekir', 'Nazlıgül', 'bekir@gm.com', 'Male', '477555664', '01011000', 'platinum');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `roomType` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `from_date` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `to_date` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `payment` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `paymentInfo` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `isRefundable` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `status` varchar(255) COLLATE ucs2_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `reservation`
--

INSERT INTO `reservation` (`id`, `fname`, `roomType`, `from_date`, `to_date`, `payment`, `paymentInfo`, `isRefundable`, `status`) VALUES
(1, 'Doğukan', 'Standard', '15-12-2019', '29-12-2019', 'Credit Card', '545445454000', 'no', 'Canceled'),
(30, 'Bekir', 'Suite', '03-05-2020', '17-05-2020', 'Credit Card', '457788996641', 'no', 'Done'),
(34, 'Doğukan', 'Saray', '16-05-2020', '27-05-2020', 'Cash', '455667788995', 'Yes', 'Paid'),
(35, 'Bekir', 'Suite', '11-05-2020', '25-05-2020', 'Credit Card', '98454545455', 'no', 'Done'),
(43, 'Bekir', 'normal', '03-05-2020', '10-05-2020', 'credit', '45444444444', 'yes', 'done');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(6) UNSIGNED NOT NULL,
  `roomType` varchar(30) COLLATE ucs2_turkish_ci NOT NULL,
  `price` int(30) NOT NULL,
  `bedCount` int(255) NOT NULL,
  `isAvailable` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `isChecked` varchar(50) COLLATE ucs2_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `room`
--

INSERT INTO `room` (`id`, `roomType`, `price`, `bedCount`, `isAvailable`, `isChecked`) VALUES
(1, 'Suite', 250, 2, 'no', 'false'),
(3, 'Standard', 60, 1, 'yes', 'false'),
(4, 'Luxury', 120, 3, 'no', 'false'),
(28, 'Saray', 100000, 100, 'yes', 'false'),
(29, 'Suite', 65, 5, 'yes', 'false'),
(34, 'normal', 10, 1, 'yes', 'false');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `lastname` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `username` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE ucs2_turkish_ci NOT NULL,
  `gender` varchar(255) COLLATE ucs2_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`) VALUES
(1, 'doğukan', 'ince', 'dogukanincee', 'dogukanincee@gmail.com', '123456', 'male'),
(52, '1', '1', '1', '1', '1', 'Male'),
(53, '1', '1', '12', '12@gmail.com', '12', 'Male'),
(54, 'eylül', 'dümbelek', 'eyluldumbelek', 'eyluldumbelek@gmail.com', 'eylulke', 'Female');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Tablo için AUTO_INCREMENT değeri `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `room`
--
ALTER TABLE `room`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
