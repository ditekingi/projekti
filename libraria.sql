-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 05:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `Teksti` varchar(500) NOT NULL,
  `AddedBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`Teksti`, `AddedBy`) VALUES
('“Parajsën e kam imagjinuar gjithnjë si një lloj librarie”', 'arbam'),
('Këto janë fjalët e një shkrimtari të njohur argjentinas, Jorge Luis Borgesit.', 'arbam'),
('Ashtu siç përfytyrohet parajsa - e bukur, e qetë, plot paqe - ashtu është edhe brendia e një librarie - qetësi shpirtërore, shumë dije dhe palestër për trurin.', 'arbam'),
('Nuk ka mundësi të mos kujtosh thëniet të mendjeve të ndritura dedikuar librit, sapo shkel në librarinë “Bibliopolium”, në zemër të Prishtinës. Lexuesit që e frekuentojnë i kanë vënë emrin “Institucioni i Librit”. Por, asgjë nuk është arritur brenda ditës apo pak ditësh, pak muajsh apo pak vjetësh.', 'arbam'),
('Libraria \"Bibliopolium\" filloi punën më 4 Maj të vitit 2000. Ishte periudhë paslufte, vendi kishte shumë humbje e mungesa, ndërsa mes të tjerash ndihej më shumë se kurrë nevoja për literaturë shkollore/universitare dhe krijimtari letrare si për nxënësit e shkollave, studentët, ashtu edhe për lexuesit e rregullt që leximin e kanë ushqim shpirtëror.', 'arbam'),
('Kjo nevojë bëri që libraria \"Bibliopolium\" të zhvillohej dita-ditës, t`i merrte shumë seriozisht lexuesit dhe kërkesat e tyre dhe të pasurohej gjithnjë e më shumë me tituj. Sot, kohën e kemi shumë të paktë krahasuar me numrin e titujve që gjenden në raftet e librarisë \"Bibliopolium\". Kjo na kujton edhe një thënie të një tekstshkruesi amerikan të viteve ’70, Frank Zappas, i cili kishte thënë: “Kaq shumë libra, kaq pak kohë”.', 'arbam'),
('Sot në librarinë \"Bibliopolium\" gjenden mbi 45.000 tituj botimesh nga autorë vendorë dhe të huaj. Botime në gjuhët kryesore të botës; shqip, anglisht, italisht, gjermanisht, spanjisht, frëngjisht dhe gjuhë të tjera. Botime të zhanreve të ndryshme, për të gjitha moshat.', 'arbam'),
('Botime në shumë gjuhë edhe për vizitorë/lexues të nacionaliteteve të ndryshme që jetojnë dhe punojnë në Kosovë apo që thjesht si turistë qëndrojnë për pak kohë në vendin tonë. Vendndodhja e librarisë \"Bibliopolium\" bën që ata të cilët e vizitojnë Prishtinën për hërë të parë ta kenë para sysh. Sheshi “Nënë Tereza” duke qenë zonë shumë e frekuentuar e nxjerr në pah edhe librarinë si vlerë në mes të kryeqytetit.', 'arbam'),
('Në një hapësirë prej 500m2, rrethuar me rafte të mbushura me libra, enterier modern, dy galeri plot ngrohtësi, këndet e leximit dhe hapësira të veçanta që shfrytëzohen për ceremoni të promovimeve të ndryshme dhe aktivitete që mund të bëhen në librarinë \"Bibliopolium\".', 'arbam'),
('Në librarinë \"Bibliopolium\" janë të punësuar persona me integritet njerëzor e profesional, persona që leximin e kanë pasion që nga fëmijëria dhe janë të gatshëm t’u shërbejnë dhe t`u ndihmojnë në përzgjedhje të gjithë klientëve pa dallim moshe, gjinie dhe përkatësie etnike.', 'arbam'),
('Kur kam pak para blej libra, kur më mbetet diçka nga ato para, blej ushqim dhe veshje” – Desiderius Erasmus, filozof holandez.', 'arbam'),
('Libraria “Bibliopolium” me kalimin e viteve është kthyer në një mekanizëm praktik në të mirë të lexuesve. Sot, kushdo që është në kërkim të një botimi, s’ka pse të humbasë kohë dhe të vihet në lëvizje për ta gjetur botimin. Mjafton t’i drejtohet librarisë \"Bibliopolium\" me porosinë për librin dhe stafi kujdeset që ai botim të përfundojë sa më shpejt në duart e lexuesit/es.', 'arbam'),
('Libraria \"Bibliopolium\" për të gjithë blerësit kujdeset që titujt e kërkuar të dalin në shitje me çmime sa më të arsyeshme, që të mund të blihen nga të gjithë. Në mënyrë konstante aplikon sistemin e zbritjeve si në raste festash apo edhe për ditë të caktuara, shpeshherë edhe pa ndonjë arsye të posaçme apo datë të shënuar, vetëm për të respektuar dhe gëzuar lexuesit e saj.', 'arbam'),
('Vizitoje librarinë \"Bibliopolium\" sepse aty jetohet për librat!', 'arbam');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `Libri` varchar(100) NOT NULL,
  `Cmimi` varchar(10) NOT NULL,
  `Autori` varchar(50) NOT NULL,
  `ImagePath` varchar(255) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`Libri`, `Cmimi`, `Autori`, `ImagePath`, `AddedBy`) VALUES
('1984', '8.74', 'George Orwell', 'book1.jpg', ''),
('A Game of Thrones', '13.00', 'George R.R.Martin', 'book19.jpg', ''),
('A Little Life', '15.00', 'Hanya Yanagihara', 'book13.jpg', ''),
('All The Bright Places', '12.50', 'Jennifer Niven', 'book89.jpg', ''),
('Demons', '3.50', 'Fyodor Dostoevski', 'book14.jpg', ''),
('Harry Potter', '12.40', 'J.K.Rowling', 'book10.jpg', ''),
('It Ends With Us', '12.50', 'Colleen Hoover', 'book88.jpg', ''),
('Kafka on the Shore', '13.20', 'Haruki Murakami', 'book12.jpg', ''),
('Little Women', '12.20', 'Lisa May Alcott', 'book5.jpg', ''),
('Lord of the Rings', '14.00', 'John R.R.Tolkien', 'book3.jpg', ''),
('Mostly Dead Things', '13.50', 'Kristen Arnett', 'book9.jpg', ''),
('No Longer Human', '14.50', 'Osamu Dazai', 'book15.jpg', ''),
('Norwegian Wood', '10.00', 'Haruki Murakami', 'book86.jpg', ''),
('The Book Thief', '12.30', 'Markus Zusak', 'book16.jpg', ''),
('The Catcher in the Rye', '10.00', 'J.D. Salinger', 'book17.jpg', ''),
('The Great Gatsby', '9.00', 'F. Scott Fitzgerald', 'book18.jpg', ''),
('The Handmaids Tail', '12.00', 'Margaret Atwood', 'book20.jpg', ''),
('The Kite Runner', '12.15', 'Khaled Hosseini', 'book7.jpg', ''),
('The Siege', '12.30', 'Ismail Kadare', 'book84.jpg', ''),
('Things Fall Apart', '13.09', 'Chinua Achebe', 'book6.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `libribooks`
--

CREATE TABLE `libribooks` (
  `Libri` varchar(100) NOT NULL,
  `Cmimi` varchar(30) NOT NULL,
  `Autori` varchar(100) NOT NULL,
  `ImagePath` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `AddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Emri` varchar(30) NOT NULL,
  `Mbiemri` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Pass` varchar(12) NOT NULL,
  `Roli` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Emri`, `Mbiemri`, `Email`, `Username`, `Pass`, `Roli`) VALUES
('Arba', 'Maxhuni', 'am@gmail.com', 'arbam', '12345678', 'admin'),
('Dea', 'Gegollaj', 'dg@gmail.com', 'deag', '12345678', 'user'),
('Dite', 'Qela', 'dq@gmail.com', 'diteq', '12345678', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Libri`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
