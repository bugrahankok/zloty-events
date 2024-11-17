-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 06, 2024 at 12:36 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zloty_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cover_url` varchar(300) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `link_url` varchar(300) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `slug`, `title`, `description`, `cover_url`, `address`, `date`, `link_url`, `updated_at`, `created_at`) VALUES
(1, 2, 'europe-tour-metallica-concert-6423', 'Europe Tour: Metallica Concert', 'Metallica is an American heavy metal band. The band was formed in 1981 in Los Angeles by vocalist and guitarist James Hetfield and drummer Lars Ulrich, and has been based in San Francisco for most of its career.[1][2] The band\'s fast tempos, instrumentals and aggressive musicianship made them one of the founding \"big four\" bands of thrash metal, alongside Megadeth, Anthrax and Slayer. Metallica\'s current lineup comprises founding members and primary songwriters Hetfield and Ulrich, longtime lead guitarist Kirk Hammett and bassist Robert Trujillo. Guitarist Dave Mustaine, who formed Megadeth after being fired from Metallica, and bassists Ron McGovney, Cliff Burton and Jason Newsted are former members of the band.\r\n\r\nMetallica first found commercial success with the release of its third album, Master of Puppets (1986), which is cited as one of the heaviest metal albums and the band\'s best work. The band\'s next album, ...And Justice for All (1988), gave Metallica its first Grammy Award nomination. Its fifth album, Metallica (1991), was a turning point for the band that saw them transition from their thrash roots; it appealed to a more mainstream audience, achieving substantial commercial success and selling more than 16 million copies in the United States to date, making it the best-selling album of the SoundScan era. After experimenting with different genres and directions in subsequent releases, Metallica returned to its thrash metal roots with its ninth album, Death Magnetic (2008), which drew similar praise to that of the band\'s earlier albums. The band\'s eleventh and most recent album, 72 Seasons, was released in 2023.', 'https://vegnews.com/media/W1siZiIsIjQwNTQ5L1ZlZ05ld3MuTWV0YWxsaWNhMy5UaW1TYWNjZW50aS5qcGciXSxbInAiLCJjcm9wX3Jlc2l6ZWQiLCIxNzU4eDEwMzkrMCsyNiIsIjE2MDB4OTQ2XiIseyJmb3JtYXQiOiJqcGcifV0sWyJwIiwib3B0aW1pemUiXV0/VegNews.Metallica3.TimSaccenti.jpg?sha=b2e4ce718dd0fff4', 'Warsaw, Poland', '2024-07-17 23:36:20', 'https://www.facebook.com/', '2024-02-06 11:34:53', '2024-01-30 00:33:36'),
(2, 2, 'memleket-partisi-secimli-ola-an-kongre-2024-2984', 'Memleket Partisi Seçimli Olağan Kongre - 2024', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://cdnuploads.aa.com.tr/uploads/Contents/2023/05/11/thumbs_b_c_3606ccfa00c91edf431d0dd6a9f595fb.jpg?v=141536', 'İstanbul, Türkiye', '2024-02-23 11:00:00', '', '2024-02-06 11:34:15', '2024-02-06 01:55:46'),
(5, 14, 'valorant-istanbul-turnuvas-8875', 'Valorant istanbul Turnuvası', '20-21-22 Haziran tarihlerinde gerçekleştirilecek toplam 34.000 TL değerinde ödül havuzuna sahip VALORANT Topluluk Turnuvası’nda takımınızla beraber rakiplerinize karşı mücadele edin ve büyük ödüllerin sahibi olma fırsatını yakalayın. Detaylar aşağıda:\r\n\r\nTurnuvanın tüm aşamaları TETO Games turnuva platformu üzerinden ilerleyecek. Katılım sağlayabilmek için bu bağlantı üzerinden tüm takım oyuncularının platforma giriş yapması, ardından takım kaptanının platform üzerinden takım kaydı oluşturması ve tüm takım oyuncularını oluşturduğu takıma eklemesi gerekiyor. Ardından aşağıdaki kayıt bağlantısı üzerinden turnuvaya kayıt olabilirsiniz. Buraya tıklayarak platform üzerinde nasıl takım kaydı oluşturacağına ve takım arkadaşlarını davet edeceğine dair yönergeleri bulabilirsin.', 'https://youngface.tv/wp-content/uploads/article_uploads/5a05d455c5d1d-e-sport.jpg', 'İstanbul, Türkiye', '2024-02-21 13:00:00', '', '2024-02-06 11:42:38', '2024-02-06 10:55:05'),
(6, 14, 'adamlar-warsaw-concert-1915', 'Adamlar Warsaw Concert', 'İlk olarak Tolga Akdoğan \"Adamlar\" adıyla yan proje gibi müzik üretimine başladı. Ardından kariyerine bu isimde devam etme kararı aldı. Şarkıları albümde toplama fikriyle albüm sürecine girildi. Ve albüm kayıt sürecinde de yaşanan değişimler sonucu grup elemanları belirlendi. Kadro Tolga Akdoğan, Berkan Tilavel, Burak Güngörmüş, Gürhan Öğütücü ve sonradan gelen Burak Irmak ile tamamlandı. Eylül 2014\'te ilk albümleri Eski Dostum Tankla Gelmiş\'i yayınladılar. Tarz olarak eğlenceli sözlere ve müziğe sahip bu albüm, turneyle birlikte fazlaca ilgi gördü.[1] Ekim 2016 yılında ikinci albümleri olan Rüyalarda Buruşmuşuz piyasaya sürüldü.[2] Ağustos 2018\'de \"Hikaye\" teklisi klibiyle birlikte yayımlandı.[3] 12 Nisan 2019 tarihinde bu şarkının da yer aldığı üçüncü albümleri Dünya Günlükleri yayımlandı.[4] Haziran 2021\'de Sezen Aksu\'nun \'\'Küçüğüm\'\' adlı şarkısına yaptıkları cover klibiyle 26 Ağustos 2021 tarihinde Wayback Machine sitesinde arşivlendi. birlikte yayınlandı.[5]', 'https://berlindeyiz.de/storage/services/xvLmSKbzUMYZRXc1sXJzMVVWoWV1d5Qk7AhygAhb.png', 'Warsaw, Poland', '2025-01-06 18:00:00', '', '2024-02-06 11:42:04', '2024-02-06 11:42:04'),
(7, 15, 'soccer-match-7348', 'Soccer Match', 'Halı saha futbolu veya diğer adıyla mini futbol, futboldan türetilerek oluşturulan ve sentetik çimle kaplı kapalı bir sahada oynanan spor. Futboldakinden az kişiyle oynanan maçlarda taç atışı yoktur.', 'https://www.istanbuldoga.net/etkinlik/image/HaliSaha/halisaha.jpg', 'İzmir, Türkiye', '2024-03-20 14:00:00', '', '2024-02-06 11:46:52', '2024-02-06 11:46:52'),
(8, 15, 'new-year-party-2024-5842', 'New Year Party 2024', 'New Year’s Eve 2024 In Warsaw is something that will surely excite you, it is one gala celebration bidding adieu to the old year and welcoming the new. Get ready with your shiny glitzy dresses and get going to some of the best new year\'s eve 2024 parties in Warsaw. Dance till you drop and end the year with a crazy celebration. For the ones, who do not fancy partying can celebrate the new beginning by gazing at the New Year Fireworks In Warsaw at some of the best destinations and rooftop restaurants in the city. For the lover of unconventional things, there are some very interesting weekend getaways lined up for celebrating the 31st December 2024. Be a part of the extravagant celebration by indulging in some of the fantastic New Year events in Warsaw. Brace yourself to welcome New Year 2024 with us.', 'https://blog.blacklane.com/wp-content/uploads/2023/01/elijah-g-oOHHxQ65dFE-unsplash-scaled.jpg', 'Warsaw Old Town, Poland', '2023-12-30 23:00:00', '', '2024-02-06 11:49:52', '2024-02-06 11:49:52'),
(9, 15, 'data-cuisine-workshop-barcelona-4771', 'Data Cuisine Workshop Barcelona', 'How does a tortilla taste whose recipe is based on well-being data in Spain? Would you rather like a cake based on the science funding in 2005 or in 2013? Can you imagine how a fish dish can represent the emigrants from Spain to countries across the world? The workshop in Barcelona was clearly influenced by the economic crisis, that Spain was experiencing at that time.', 'https://data-cuisine.net/media/pages/workshops/data-cuisine-workshop-barcelona/2398751850-1581060624/data-cuisine-workshop-barcelona.jpg', 'Barcelona, Spain', '2024-02-28 15:00:00', '', '2024-02-06 11:51:25', '2024-02-06 11:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL DEFAULT '1',
  `site_title` text,
  `site_description` varchar(300) DEFAULT NULL,
  `site_instagram` varchar(100) DEFAULT NULL,
  `site_twitter` varchar(100) DEFAULT NULL,
  `site_facebook` varchar(100) DEFAULT NULL,
  `footer_description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_description`, `site_instagram`, `site_twitter`, `site_facebook`, `footer_description`) VALUES
(1, 'Zloty Events - Best Place To Be Social!', 'Looking for something to do in Warsaw? Whether you\'re a local, new in town or just cruising through we\'ve got loads of great tips and events. You can explore by location, what\'s popular, our top picks, free stuff... you got this. Ready?', 'https://instagram.com', 'https://twitter.com', 'https://facebook.com', 'You can explore by location, what\'s popular, our top picks, free stuff... you got this. Ready?');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `description`) VALUES
(1, 'about-us', 'About Us', 'About Us Page '),
(2, 'privacy-policy', 'Privacy Policy', 'Privacy Policy Page'),
(3, 'gdpr', 'GDPR', 'GDPR Page');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('USER','ADMIN') NOT NULL DEFAULT 'USER',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `profile_picture_url` varchar(300) DEFAULT NULL,
  `last_login_at` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `password`, `full_name`, `profile_picture_url`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'bugrahankok@gmail.com', '123456', 'Buğrahan Kök', 'https://media.licdn.com/dms/image/D4D03AQG-tg9h_5ki7Q/profile-displayphoto-shrink_800_800/0/1666009457008?e=2147483647&v=beta&t=gWAKELqRhbZB3KcdygMcr-STrypOemQ9BVT2lNE0Xxs', '', '2024-01-29 23:06:36', '2024-02-06 10:56:37'),
(2, 'USER', 'batuhankok@gmail.com', '123456', 'Batuhan Kök', 'https://dummyimage.com/100x100/9c9c9c/fff.png&text=BK', '', '2024-02-06 00:53:35', '2024-02-06 11:33:57'),
(14, 'USER', 'cagripolonya@gmail.com', '123456', 'Çağrı Doymuş', 'https://dummyimage.com/100x100/9c9c9c/fff.png&text=Ça', '', '2024-02-06 10:53:04', '2024-02-06 10:53:18'),
(15, 'USER', 'istemihanpazarbasi@gmail.com', '123456', 'İstemihan Pazarbaşı', 'https://dummyimage.com/100x100/9c9c9c/fff.png&text=İs', '', '2024-02-06 11:43:11', '2024-02-06 11:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
