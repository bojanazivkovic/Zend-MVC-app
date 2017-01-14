-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 08:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `specijalisticki`
--

-- --------------------------------------------------------

--
-- Table structure for table `aranzman`
--

CREATE TABLE `aranzman` (
  `idAranzman` int(11) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idVrstaSmestaja` int(11) NOT NULL,
  `idTermin` int(11) NOT NULL,
  `idPrevoz` int(11) NOT NULL,
  `idCenovnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aranzman`
--

INSERT INTO `aranzman` (`idAranzman`, `idKategorija`, `idSmestaj`, `idVrstaSmestaja`, `idTermin`, `idPrevoz`, `idCenovnik`) VALUES
(31, 1, 24, 1, 1, 1, 1),
(32, 2, 25, 2, 2, 2, 4),
(33, 3, 26, 3, 3, 3, 5),
(34, 1, 27, 4, 4, 1, 6),
(35, 2, 28, 5, 5, 2, 14),
(36, 3, 29, 6, 6, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE `cenovnik` (
  `idCenovnik` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`idCenovnik`, `cena`) VALUES
(1, 4000),
(4, 90000),
(5, 6000),
(6, 15000),
(14, 30000),
(15, 1000),
(16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `idDrzava` int(11) NOT NULL,
  `drzava` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`idDrzava`, `drzava`) VALUES
(1, 'Grcka'),
(2, 'Bugarska'),
(9, 'Turska');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorija` int(11) NOT NULL,
  `naziv` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorija`, `naziv`) VALUES
(1, 'Leto 2017'),
(2, 'Zima'),
(3, 'Izleti');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idKorisnik` int(11) NOT NULL,
  `imePrezime` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `idUloga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idKorisnik`, `imePrezime`, `korisnickoIme`, `lozinka`, `email`, `telefon`, `idUloga`) VALUES
(1, 'Bojana Zivkovic', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@b.com', '060/012-6472', 1),
(4, 'Pera Peric', 'pera', 'd8795f0d07280328f80e59b1e8414c49', 'p@p.com', '011/123456789', 2),
(6, 'Prodaja Prodaja', 'prodaja', 'e5582771659559f5aed87bfadc70a62c', 'p@p.com', '123654789', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mesto`
--

CREATE TABLE `mesto` (
  `idMesto` int(11) NOT NULL,
  `mesto` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idDrzava` int(11) NOT NULL,
  `putanja` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesto`
--

INSERT INTO `mesto` (`idMesto`, `mesto`, `idDrzava`, `putanja`) VALUES
(1, 'Pefkohori', 1, '/img/pefkohori.jpg'),
(2, 'Nei Pori', 1, '/img/nei-pori.jpg'),
(3, 'Nesebar', 2, '/img/nesebar.jpg'),
(5, 'Grad u Austriji', 0, ''),
(6, 'Novo Mesto', 0, ''),
(7, 'Novo mesto 2', 0, ''),
(8, 'Minhen', 0, ''),
(9, 'Parga', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `onama`
--

CREATE TABLE `onama` (
  `idOnama` int(11) NOT NULL,
  `naslov` varchar(200) NOT NULL,
  `tekst` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onama`
--

INSERT INTO `onama` (`idOnama`, `naslov`, `tekst`, `slika`) VALUES
(1, 'O nama', '<br><br>\nKompanija <b>Adventure tours</b> je registrovana kao Društvo za turizam, trgovinu i usluge. Posedujemo licencu br. OTP 15/2010 za obavljanje poslova organizovanja turističkih putovanja u zemlji i inostranstvu, \nizdatu od strane APR-a i upisanu u Registar turizma. Kao agencija na turističkom tržištu smo prisutni od 1989. godine, kao jedna od prvih privatnih kompanija u ovoj oblasti delovanja.\n<br><br>\nOsnovna inodestinacija agencije je <b>GRČKA</b>. U turističkim mestima Pefkohori, Polihrono, Hanioti i Kalitea naše predstavništvo uspešno radi godinama i brine o hiljadama turista koji tamo \nprovode svoj letnji odmor. Sa nama možete letovati u Vrasni i upoznati regiju Svetog Đorđa. Takođe, u ponudi su i Leptokarija i  Nei Pori, poznata letovališta pod planinom Olimp. \nOstrvo Tasos je još jedan biser helenskog turizma, gde naši klijenti provode nezaboravne trenutke u Skala Potamiji i Golden Beachu. Pored destinacija na Egejskom moru, u ponudi su i \nostrva Lefkada i Zakintos, biseri Jonskog mora.\n<br><br>\nSa nama možete upoznati Solun i Meteore, obići Hilandarski metoh i Svetu Goru, posetiti rodno mesto Aristotela, krstariti brodom do predivnih plaža, doživeti Grčku uz muziku i vino.\n<br><br>\nMnoštvo hotela za svačiji ukus i džep se nalazi u našoj ponudi za TURSKU i to u najčuvenijim letovalištima – Kušadasi, Sarimsakli i Bodrum, uz organizaciju izleta koji se ne propuštaju, na čelu sa izletom u Efes.\n<br><br>\nOno po čemu smo prepoznatljivi u svetu muzike i širenja nacionalne kulture su tradicionalni <b>FESTIVALI FOLKLORA</b> čiji smo pokrovitelji i organizatori u Grčkoj i Turskoj. \nDo sada je blizu tri stotine kulturno-umetničkih društava iz naše zemlje i inostranstva pokazalo svoje igračko i pevačko umeće.\nTokom cele godine našim vernim klijentima i onima koji će to tek postati, nudimo atraktivne programe putovanja u kojima spajamo zabavu i saznanja o kulturno-istorijskom nasledju \nzemlje domaćina. Osnovni moto našeg rada je temeljna analiza svake stavke koja se nađe u ponudi, angažovanje profesionalnih pratilaca grupa i vodiča, kao i predstavnika agencije \nkoji su na usluzi gostima na svim našim destinacijama. Želje i zahtevi klijenata su nam na prvom mestu! Članovi našeg tima su mladi ljudi, sposobni da se identifikuju sa ciljevima \nkompanije i vredno rade na tome da se ti ciljevi i ostvare!\n<br><br>\nNudimo aranžmane za letovanja, zimovanja, evropske metropole i putovanja po Srbiji. \n<br><br>\nPozovite nas i rezervišite svoje putovanje +381 11 2454 499', '/img/agencija.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prevoz`
--

CREATE TABLE `prevoz` (
  `idPrevoz` int(11) NOT NULL,
  `prevoz` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prevoz`
--

INSERT INTO `prevoz` (`idPrevoz`, `prevoz`) VALUES
(1, 'autobus'),
(2, 'avion'),
(3, 'sopstveni');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `idRezervacije` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idAranzman` int(11) NOT NULL,
  `datumRezervacije` varchar(100) NOT NULL,
  `napomena` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`idRezervacije`, `idKorisnik`, `idAranzman`, `datumRezervacije`, `napomena`) VALUES
(112, 4, 33, '12.12.2016', 'gsgsdgsg'),
(113, 4, 32, '12.12.2016', 'gdgfgdggdgdgdggdgdgdggddgdgd'),
(114, 1, 31, '12.12.2016', 'napomenaaaa'),
(115, 1, 34, '12.12.2016', 'napomenaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idSlike` int(11) NOT NULL,
  `putanja` varchar(5000) NOT NULL,
  `idSmestaj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idSlike`, `putanja`, `idSmestaj`) VALUES
(13, '/img/skiatos-vila-makis-9.jpg', 6),
(21, '/img/1477394995-pioLogo.jpg', 3),
(22, '/img/1477397048-parga-vila-mitos-1-2.jpg', 6),
(23, '/img/parga-vila-mitos-1-2.jpg', 2),
(26, '/img/skiatos-vila-fantasia-6.jpg', 5),
(56, '/img/sea.jpg', 24),
(57, '/img/2.jpg', 24),
(58, '/img/parga-vila-mitos-1-7.jpg', 24),
(59, '/img/skiatos-vila-makis-9.jpg', 25),
(60, '/img/skiatos-vila-makis-5.jpg', 25),
(61, '/img/3.jpg', 25),
(62, '/img/parga-vila-mitos-1-5.jpg', 25),
(63, '/img/sea.jpg', 26),
(64, '/img/1.jpg', 26),
(65, '/img/2.jpg', 26),
(66, '/img/4.jpg', 26),
(67, '/img/3.jpg', 27),
(68, '/img/7.jpg', 27),
(69, '/img/8.jpg', 27),
(70, '/img/11.jpg', 26),
(71, '/img/12.jpg', 26),
(72, '/img/13.jpg', 26),
(73, '/img/14.jpg', 26),
(74, '/img/17.jpg', 27),
(75, '/img/18.jpg', 27),
(76, '/img/19.jpg', 27),
(77, '/img/20.jpg', 27),
(78, '/img/19.jpg', 28),
(79, '/img/20.jpg', 28),
(80, '/img/22.jpg', 28),
(81, '/img/21.jpg', 28),
(82, '/img/15.jpg', 29),
(83, '/img/16.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

CREATE TABLE `smestaj` (
  `idSmestaj` int(11) NOT NULL,
  `smestaj` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idMesto` int(11) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `thumbPutanja` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`idSmestaj`, `smestaj`, `opis`, `idMesto`, `idKategorija`, `thumbPutanja`) VALUES
(24, 'Vila Beach', 'Vila Beach se nalazi u centralnom delu Pefkohoria na oko 180 metara udaljenosti od plaže. U ponudi ovog objekta su dvokrevetni i trokrevetni studiji, kao i četvorokrevetni apartmani od kojih pojedini imaju i mogućnost dodavanja pomoćnog ležaja. Svaka smeštajna jedinica poseduje osnovno opremljenu kuhinju, kupatilo, terasu, LCD TV i klima uređaj čije je korišćenje uključeno u cenu najma apartmana. U dvorištu vile se nalazi i roštilj, a postoji i mogućnost korišćenja Wi-Fi interneta. Tokom boravka gosti sami vode računa o higijeni apartmana, dok se promena posteljine i peškira vrši na 5 dana.', 1, 1, '/img/thumb/1479718436-p1.jpg'),
(25, 'Hotel Rila', 'Hotel Rila se nalazi na oko 60 metara od plaže u novom delu Stavrosa. Vila raspolaže dvokrevetnim i trokrevetnim studijima koji poseduju osnovno opremljenu kuhinju: frižider, rešo, posuđe i escajg srazmerno broju ležajeva, kupatilo, terasu, TV i klima uređaj čije se korišćenje dodatno naplaćuje. Ovaj objekat poseduje mogućnost korišćenja WiFi interneta, prostrano, lepo uređeno dvorište i veliku prostoriju za poslednji dan boravka u kojoj se nalaze kuhinja i TWC. Promena posteljine i peškira je jednom u toku boravka', 2, 1, '/img/thumb/1479718487-p2.jpg'),
(26, 'Vila George', 'Vila George je smeštena u novom delu Sartija, na 60-ak metara udaljenosti od plaže. Raspolaže trokrevetnim i četvorokrevetnim studijima, kao i četvorokrevetnim dupleks apartmanima. Sve smeštajne jedinice poseduju osnovno opremljenu kuhinju srazmerno broju ležajeva, kupatilo, terasu, TV i klima uređaj čije se korišćenje dodatno naplaćuje. Dok trokrevetni studiji i četvorokrevetni dupleks apartmani imaju krevete standardnih dimenzija, četvorokrevetni studiji pored francuskog i singl kreveta poseduju četvrti krevet na izvlačenje nešto manjih dimenzija. Promena posteljine je jedanpu u toku boravka, a postoji i mogućnost korišćenja WiFi interneta.', 9, 1, '/img/thumb/1479718517-p3.jpg'),
(27, 'Vila Olympic House', 'Vila Olympic House ovaj hotel apartmanskog tipa se nalazi na samoj plaži, u centralnom delu mesta Nei Pori. Odlična pozicija, kao i komfor i opremljenost studija svrstava ovaj objekat u red najboljih vila u Nei Poriju. Vila raspolaže dvokrevetnim, trokrevetnim i četvorokrevetnim studijima, kao i 1/4+2 studijima, koji sadrže 2 standardna i 2 velika kreveta na razvlačenje. Sve smeštajne jedinice poseduju osnovno opremljenu kuhinju srazmerno broju ležajeva, kupatilo, TV, prostranu terasu i klima uređaj, čije je korišćenje uključeno u cenu najma apartmana, a takodje poseduje i sef, čija se upotreba dodatno naplaćuje. Sve sobe imaju bočni ili direktni pogled na more. U prizemlju vile se nalazi beach bar, dok sama vila poseduje lift, recepciju i mogućnost korišćenja WiFi interneta. Promena posteljine je jedanput u toku boravka.', 2, 1, '/img/thumb/1479718555-p4.jpg'),
(28, 'Hotel Bansko', 'Lokacija: 600 m od gondole, oko 5 min. hoda do centra grada Bansko. \r\nHotelska ponuda: lobi bar, restoran, skijašnica.  Apartmani: mini kuhinja, SAT TV, kupatilo. Apartmani za 4 osobe: spavaća soba sa francuskim krevetom i dnevni boravak sa dvosedom na razvlačenje. Apartmani za 6 osoba: jedna spavaća soba sa francuskim krevetom, druga spavaća soba sa dva odvojena kreveta i dnevni boravak sa dvosedom na razvlačenje.', 6, 2, '/img/thumb/1479718647-photo1.jpg'),
(29, 'Meteori', 'Jednodnevni izlet sa vodičem na srpskom jeziku. Put vodi preko Soluna, Katerinija, Paralije, Nei Porija, dolinom Olimpa, kroz klanac Tembi, kraj Larise do gradića Klambaka u podnožju Meteora. Kraći predah i poseta radionici i prodavniciikona i suvenira. Obilazak manastira Preobraženje (Veliki Meteori). Upovratkuobilazak jednog od najvećih grčkih svetilišta, crkve Sv.Petke u klancu Tembi. Povratak u letovalište.', 7, 3, '/img/thumb/1479718707-p7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

CREATE TABLE `termin` (
  `idTermin` int(11) NOT NULL,
  `od` varchar(50) NOT NULL,
  `do` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`idTermin`, `od`, `do`) VALUES
(1, '01.06.', '10.06.'),
(2, '10.06.', '20.06.'),
(3, '20.06.', '30.06.'),
(4, '01.07.', '10.07.'),
(5, '10.07.', '20.07.'),
(6, '20.07.', '30.07.'),
(7, '01.08.', '10.08.'),
(8, '10.08.', '20.08.'),
(9, '20.08.', '30.08.');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(11) NOT NULL,
  `uloga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `uloga`) VALUES
(1, 'admin'),
(2, 'putnik'),
(3, 'prodaja');

-- --------------------------------------------------------

--
-- Table structure for table `vrstasmestaja`
--

CREATE TABLE `vrstasmestaja` (
  `idVrstaSmestaja` int(11) NOT NULL,
  `vrstaSmestaja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vrstasmestaja`
--

INSERT INTO `vrstasmestaja` (`idVrstaSmestaja`, `vrstaSmestaja`) VALUES
(1, '1/2'),
(2, '1/3'),
(3, '1/4'),
(4, 'app'),
(5, '1/5'),
(6, '1/6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aranzman`
--
ALTER TABLE `aranzman`
  ADD PRIMARY KEY (`idAranzman`);

--
-- Indexes for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD PRIMARY KEY (`idCenovnik`);

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`idDrzava`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `mesto`
--
ALTER TABLE `mesto`
  ADD PRIMARY KEY (`idMesto`);

--
-- Indexes for table `onama`
--
ALTER TABLE `onama`
  ADD PRIMARY KEY (`idOnama`);

--
-- Indexes for table `prevoz`
--
ALTER TABLE `prevoz`
  ADD PRIMARY KEY (`idPrevoz`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`idRezervacije`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idSlike`);

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`idSmestaj`);

--
-- Indexes for table `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`idTermin`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `vrstasmestaja`
--
ALTER TABLE `vrstasmestaja`
  ADD PRIMARY KEY (`idVrstaSmestaja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aranzman`
--
ALTER TABLE `aranzman`
  MODIFY `idAranzman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cenovnik`
--
ALTER TABLE `cenovnik`
  MODIFY `idCenovnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `idDrzava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mesto`
--
ALTER TABLE `mesto`
  MODIFY `idMesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `onama`
--
ALTER TABLE `onama`
  MODIFY `idOnama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prevoz`
--
ALTER TABLE `prevoz`
  MODIFY `idPrevoz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `idRezervacije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idSlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `smestaj`
--
ALTER TABLE `smestaj`
  MODIFY `idSmestaj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `termin`
--
ALTER TABLE `termin`
  MODIFY `idTermin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vrstasmestaja`
--
ALTER TABLE `vrstasmestaja`
  MODIFY `idVrstaSmestaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
