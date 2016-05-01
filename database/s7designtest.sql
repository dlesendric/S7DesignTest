-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 10:01 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s7designtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `IdEvent` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Heading` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Event_time` datetime NOT NULL,
  `Event_place` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`IdEvent`, `IdUser`, `Heading`, `Description`, `Event_time`, `Event_place`) VALUES
(6, 4, 'НП ТАРА – Предов Крст – Биљешке стене – Врело (рек', 'ПОЛАЗАК: Окупљамо се на паркингу испред центра „Сава“ (савска страна) и полазимо тачно у 6 сати. Молим вас, дођите 10-ак минута раније како бисмо кренули на време.\r\n\r\n \r\n\r\nПЛАН АКЦИЈЕ\r\n\r\nПутујемо ИБАРСКОМ магистралом до Ћелија, затим кроз Лајковац и Ваљево до Балиновића и чувеног ресторана ДУГА. У башти ресторана Дуга можемо попити јутарњу кафу и чај, и доручковати домаћу храну (служе одличне лепиње са кајмаком и прилозима по жељи) по веома приступачним ценама.  \r\n\r\nПут настављамо кроз живописне пределе преко Јабланице (брана), Дебелог брда, Рогачице, Бајине Баште, Перућца, до уласка у Национални парк Тара.\r\n\r\nОчараће вас боја воде на ушћу Дервенте у Дрину. Путем кроз кањон Дервенте долазимо на послетку до Ловачког дома на Предовом крсту. Напуштамо возило и полазимо на стазу, колским путем ка видиковцу Биљешке стене. Поред величанственог погледа на Дрину и околину, непосредно уз сам видиковац се налази планинска кућа (откључана за посете) у којој је сниман југословенски филм „Птице које не полете„.\r\n\r\nСа видиковца се враћамо истом стазом до Ловачког дома у коме се можемо окрепити.\r\n\r\nУкупна дужина стазе је 11,4 км са незнатном висинском разликом. Стаза сво време иде колским путем кроз шуму.\r\n\r\nВозилом се спуштамо ка Перућцу и Врелу (реци дугачкој 365 метара, названој „година„) у чијој лепоти уживамо од њеног извора до ушћа у смарагдно зелену Дрину.\r\n\r\nЗа Београд полазимо до 18 часова и правимо успутну паузу за ручак по жељи, у ресторану „Студенац„ крај лепе Дрине. Из ресторана, са терасе се види добро позната и чувена кућица на сред реке Дрине.\r\n\r\nПланирани повратак у Београд, испред центра Сава је до 23 часа.\r\n\r\nОПРЕМА: мали ранац са водом и храном за једнодневни излет, планинарске ципеле (могу и патике са вибрам ђоном). Одећа прилагођена временским приликама.\r\n\r\n Цена акције:  1.800 динара   путујемо минибусом\r\n\r\n Акцију реализује Радован Симоновић – РАША\r\n\r\n Тел: 064/195-15-65\r\n\r\n ДОБРО ДОШЛИ НА НАШЕ АВАНТУРЕ', '2016-05-07 11:00:00', 'Tara,Srbija'),
(7, 4, '1 Maj na Avali', 'Клуб планинара „Авантуриста“, за своје чланове, као и друге заинтересоване планинаре, организује основну планинарску обуку.\r\n\r\nОбука ће бити одржана на Авали у малој кући, крај планинарског дома „Чарапићев Брест“, током 1. Маја 2016. године, зависно од договора организатора и полазника.\r\n\r\nДоговор ће уследити по завршетку пријављивања полазника које ће се вршити до краја Јануара.\r\n\r\nПраво учешћа имају сви чланови ПСС-а, са чланском књижицом и маркицом за 2016. годину, који су здравствено способни за умерени напор.\r\n\r\nПријаве се примају на E-mail: office@planinariavanturisti.org.rs или на телефон број 064/99-248-11 и треба да садрже име, презиме, датум рођења, број чланске књижице и клупску припадност полазника.\r\n\r\nОбука је бесплатна. На њу је потребно доћи у планинарској одећи и обући, за једнодневни боравак у планини, са чланском књижицом ПСС.\r\n\r\nТеоријски део обуке ће почети у суботу у 8 часова и трајати до 20 часова, а практични део и испит у недељу у 8 часова и трајаће до 18 часова.\r\n\r\nПолазници ће се хранити „својом храном из ранца“ или у дому „Чарапићев Брест“, по сопственом избору.\r\n\r\nУверење о завршеној обуци, биће издато у року и у складу са Програмом планинарског оспособљавања и усавршавања ПСС.\r\n\r\nОбуком ће руководити планинарски водич Борис Братић, а извешће је наставни тим у следећем саставу:\r\nводич-инструктор Слободан Гочманац\r\nводич-интруктор Слободан Жарковић\r\nводич-оперативни тренер планинарства Драган Павловић\r\nводич-оперативни тренер планинарства Зоран Контић\r\n\r\nПолазници основне планинарске обуке добијају\r\nПРОГРАМ ПЛАНИНАРСКОГ ОСПОСОБЉАВАЊА И УСАВРШАВАЊА ПСС\r\n\r\nРуководилац обуке\r\nПредседник\r\nКлуба планинара „АВАНТУРИСТА“\r\nБорис Братић', '2016-05-01 09:00:00', 'Avala, Srbija'),
(8, 4, 'ЈЕШЕВАЦ и БОРАЧКИ КРШ', 'ЕШЕВАЦ и БОРАЧКИ КРШ – Рапај брдо – брдо Клик – Јешевачки Црни врх (902м) – Борачки крш\r\n\r\n    8. Мај 2016 – НЕДЕЉА\r\n\r\nПОЛАЗАК: Окупљамо се на паркингу испред центра „Сава“ (савска страна) и полазимо тачно у 7 сати. Молим вас, дођите 10-ак минута раније како бисмо кренули на време!\r\n\r\nПЛАН АКЦИЈЕ\r\n\r\nПутујемо аутопутем до изласка Мали Пожаревац, затим преко Младеновца, Тополе, Винче и Шаторње до варошице Рудник и укључења на Ибарску магистралу. Направићемо паузу пола сата на врху рудничког превоја у ресторану „Руднички брег“ за прву јутарњу кафу, чај и доручак (служе одличне лепиње са кајмаком).\r\n\r\nНастављамо магистралом, и пре Горњег Милановца „код тенка“ скрећемо ка селу Грабовица. Пешачење започињемо из села Грабовица, излазимо на брдо Клик (722 м) и даље стазом долазимо до Јешевачког Црног врха (902 м) одакле се пружа предиван поглед на Рудник, Овчар и Каблар, Гледићке планине, Столове, Западну Србију, Златибор и Тару. Први део стазе је дугачак око 4 км.\r\n\r\nНа врху, на основу могућности и кондиције учесника доносимо одлуку ко иде надаље краћом и лакшом стазом и спушта се у село Доња Врбава са водичем, потом превозом стиже у село Борач – затим излази на Борачки крш са целом групом (укупна дужина стазе 12 км). Друга, јача група од врха иде преко Зелене баре до манастира Јешевац ( односно остатака манастира из XIV века) на локалитету Црквина. Затим настављамо стазом ка Борачком кршу и пењемо до крста, дивног  видиковца са кога се види Гружанско језеро и цела Гружа (укупна дужина стазе 17 + 3 км).  У селу Борач у подножју Борачког крша посећујемо цркву из доба Немањића (подигнута 1359 године) са јединственим иконостасом и занимљивим фрескама. У близини цркве налази се изузетно ретко сачувано старо сеоско гробље, на којем неки од споменика и стећака (има их преко хиљаду) потичу још из средњег века. По завршетку пешачке туре, а пре поласка за Београд одлазимо у Етно домаћинство породице Милошевић у Борачу на вечеру по жељи учесника акције.\r\n\r\nПланирани повратак испред центра Сава најкасније до 22 и 30 часова, а можда и мало раније. У повратку за Београд путујемо ибарском магистралом.\r\n\r\nХрана из ранца, а по завршетку пешачења касни ручак у Етно домаћинству у Борачу.\r\n\r\nОПРЕМА: Мали ранац са водом и храном за једнодневни излет, планинарске ципеле, одећа прилагођена временским приликама.\r\n\r\nЦена акције: 1.400 динара\r\n\r\nАкцију реализује Борис Братић\r\n\r\nТел: 064/99-248-11', '2016-05-08 07:00:00', 'Jesevac, Srbija'),
(9, 4, 'Трнско Ждрело', 'Детаљан план акције ускоро', '2016-05-14 16:00:00', 'Trnsko Zdrelo,Bugarska'),
(10, 4, 'Happy New Year ', 'We celebrate new year!', '2016-12-31 23:59:00', 'Belgrade, Serbia');

-- --------------------------------------------------------

--
-- Table structure for table `sign_ups_events`
--

CREATE TABLE IF NOT EXISTS `sign_ups_events` (
  `IdSignUp` int(11) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `IdEvent` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sign_ups_events`
--

INSERT INTO `sign_ups_events` (`IdSignUp`, `IdUser`, `IdEvent`) VALUES
(16, 7, 10),
(17, 7, 8),
(18, 8, 6),
(19, 8, 8),
(20, 8, 9),
(21, 9, 10),
(22, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IdUser` int(11) NOT NULL,
  `Role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User',
  `Username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `UserKey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `Role`, `Username`, `Password`, `UserKey`, `FirstName`, `LastName`, `Email`) VALUES
(4, 'Admin', 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'Qv80hJKlk0X3lOQl', 'Darko', 'Lesendric', 'darko.lesendric@gmail.com'),
(7, 'User', 'testuser', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'dZ8g177mhzFIz47N', 'Test1', 'Test', 'test@test.com'),
(8, 'User', 'testuser1', '41da76f0fc3ec62a6939e634bfb6a342', '0Piy9zzs7wLvvoe8', 'Test1', 'Test1', 'test@test.com'),
(9, 'User', 'testuser2', '58dd024d49e1d1b83a5d307f09f32734', '04C9kleL6Od13N23', 'Test2', 'Test2', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`IdEvent`);

--
-- Indexes for table `sign_ups_events`
--
ALTER TABLE `sign_ups_events`
  ADD PRIMARY KEY (`IdSignUp`), ADD KEY `IdUser` (`IdUser`), ADD KEY `IdEvent` (`IdEvent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`), ADD KEY `UserKey` (`UserKey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `IdEvent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sign_ups_events`
--
ALTER TABLE `sign_ups_events`
  MODIFY `IdSignUp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sign_ups_events`
--
ALTER TABLE `sign_ups_events`
ADD CONSTRAINT `fk_event_signup` FOREIGN KEY (`IdEvent`) REFERENCES `events` (`IdEvent`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_user_signup` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
