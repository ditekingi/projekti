-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 07:28 PM
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
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `Mesazhi` varchar(100) NOT NULL,
  `AddedBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`Mesazhi`, `AddedBy`) VALUES
('nuk me pelqen libri Metamorphosis', 'deag'),
('hello, i like your page and the books you sell', 'deag'),
('hello, this place sucks', 'havag');

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

--
-- Dumping data for table `libribooks`
--

INSERT INTO `libribooks` (`Libri`, `Cmimi`, `Autori`, `ImagePath`, `Category`, `AddedBy`) VALUES
('Batman: Year One', '14.99', 'Frank Miller', 'book77.jpg', 'Comics', ''),
('Beloved', '12.00', 'Toni Morrison', 'book68.jpg', 'Horror', ''),
('Biologjia Shkence e Jetes', '8.00', 'Ethrem Ruka', 'book50.jpg', 'Shkollore', ''),
('Delfinet ne Agim', '12.00', 'Mary Pope Osbourne', 'book41.jpg', 'Femije', ''),
('Ditari i Gregut', '7.00', 'Jeff Kinney', 'book42.jpg', 'Femije', ''),
('Doracak', '14.00', 'Toper', 'book46.jpg', 'Fjalore', ''),
('Dracula', '10.20', 'Bram Stoker', 'book65.jpg', 'Horror', ''),
('Fjalore Shqip-Gjermanisht', '10.00', 'Ali Dhrimo', 'book47.jpg', 'Fjalore', ''),
('Fjalori Im i Pare i Anglishtes', '8.00', 'Dituria', 'book48.jpg', 'Fjalore', ''),
('From Hell', '43.00', 'Allen Moore, Eddie Campbell', 'book76.jpg', 'Comics', ''),
('Gja Gorio', '8.90', 'Honore de Balzak', 'book43.jpg', 'Femije', ''),
('Gjeografia 10', '6.00', 'Vasil Kristo, Skender Sala', 'book49.jpg', 'Shkollore', ''),
('Gjuha Shqipe 10', '4.00', 'Enkeleida Kapia, Lindita Murthi', 'book52.jpg', 'Shkollore', ''),
('Gjumi mbi Bore', '3.00', 'Ridvan Dibra', 'book38.jpg', 'Shqip', ''),
('Hamlet', '3.50', 'William Shakespeare', 'book69.jpg', 'Drame', ''),
('Holy', '11.00', 'Stephen King', 'book57.jpg', 'Thriller', ''),
('Homo Deus', '9.90', 'Yuval Noah Harari', 'book74.jpg', 'Shkence', ''),
('IT', '14.50', 'Stephen King', 'book66.jpg', 'Horror', ''),
('Italishtja ne Praktike', '17.00', 'Gani Hoxha', 'book45.jpg', 'Fjalore', ''),
('Kidnapped', '3.50', 'Robert Stevenson', 'book56.jpg', 'Klasike', ''),
('Kimia 8', '9.50', 'Iain Brand, Richard Crime', 'book51.jpg', 'Shkollore', ''),
('Kingdom Come', '29.99', 'Mark Waid', 'book78.jpg', 'Comics', ''),
('Kronike ne Gur', '5.00', 'Ismail Kadare', 'book37.jpg', 'Shqip', ''),
('Kush e solli Doruntinen', '10.00', 'Ismail Kadare', 'book39.jpg', 'Shqip', ''),
('Led Zeppelin', '24.50', 'Led Zeppelin', 'book83.jpg', 'Muzike', ''),
('Life After Life', '6.50', 'Kate Atkison', 'book70.jpg', 'Drame', ''),
('Local Woman Missing', '9.00', 'Mary Kubica', 'book59.jpg', 'Thriller', ''),
('Madame Bovary', '3.50', 'Gustave Flaubert', 'book55.jpg', 'Klasike', ''),
('Morning Glory', '12.00', 'LaVyrle Spencer', 'book61.jpg', 'Romance', ''),
('One Two Three... Infinity', '8.00', 'George Gamow', 'books76.jpg', 'Shkence', ''),
('Othello', '3.50', 'William Shakespeare', 'book71.jpg', 'Drame', ''),
('Persuasion', '3.50', 'Jane Austen', 'book53.jpg', 'Klasike', ''),
('Pride and Prejudice', '3.50', 'Jane Austen', 'book54.jpg', 'Klasike', ''),
('System of a Down', '28.60', 'Ben Myers', 'book80.jpg', 'Muzike', ''),
('The Book Thief', '13.00', 'Markus Zusak', 'book72.jpg', 'Drame', ''),
('The Last Summer', '9.00', 'Karen Swan', 'book63.jpg', 'Romance', ''),
('The Loop', '13.70', 'Jeremy Robert Johnson', 'book67.jpg', 'Horror', ''),
('The Magic of Reality', '11.70', 'Richard Dawkins', 'book75.jpg', 'Shkence', ''),
('The Movie Soundtracks', '14.90', 'Elvis Presley', 'book81.jpg', 'Muzike', ''),
('The Paris Secret', '10.00', 'Karen Swan', 'book64.jpg', 'Romance', ''),
('The Push', '13.00', 'Ashley Audrain', 'book60.jpg', 'Thriller', ''),
('The Rolling Stones', '18.70', 'The Rolling Stones', 'book82.jpg', 'Muzike', ''),
('The Silent Patient', '10.00', 'Alex Michealides', 'book58.jpg', 'Thriller', ''),
('The Theory of Everything', '10.78', 'Stephen Hawking', 'book73.jpg', 'Shkence', ''),
('The Wedding Planner', '10.50', 'Danielle Steel', 'book62.jpg', 'Romance', ''),
('Tom Sojeri Detektiv', '9.00', 'Mark Tuein', 'book44.jpg', 'Femije', ''),
('Verorja', '3.50', 'Regjep Hoxha', 'book40.jpg', 'Shqip', ''),
('Wash Day Diaries', '19.00', 'Robyn Smith', 'book79.jpg', 'Comics', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Eventi` varchar(100) NOT NULL,
  `Dita` int(11) NOT NULL,
  `Muaji` varchar(20) NOT NULL,
  `Viti` int(11) NOT NULL,
  `Ora` varchar(30) NOT NULL,
  `AddedBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Eventi`, `Dita`, `Muaji`, `Viti`, `Ora`, `AddedBy`) VALUES
('Arba ne Bibliopolium', 23, 'FEB', 2024, '12:00PM', ''),
('Panairi i librit ne Prishtine', 5, 'FEB', 2024, 'Ora: 11:00AM', ''),
('Promovimi i librit Bride', 9, 'FEB', 2024, 'Ora: 4:00PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `shporta`
--

CREATE TABLE `shporta` (
  `Libri` varchar(100) NOT NULL,
  `Cmimi` varchar(30) NOT NULL,
  `Autori` varchar(50) NOT NULL,
  `ImagePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shporta`
--

INSERT INTO `shporta` (`Libri`, `Cmimi`, `Autori`, `ImagePath`) VALUES
('Kafka on the Shore', '13.20', 'Haruki Murakami', 'book12.jpg'),
('No Longer Human', '14.50', 'Osamu Dazai', 'book15.jpg'),
('The Wedding Planner', '10.50', 'Danielle Steel', 'book62.jpg');

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
('Dite', 'Qela', 'dq@gmail.com', 'diteq', '12345678', 'admin'),
('Hava', 'Gegollaj', 'hg@gmail.com', 'havag', '12345678', 'user'),
('Lorik', 'Maxhuni', 'lm@gmail.com', 'lorikm', '12345678', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Libri`);

--
-- Indexes for table `libribooks`
--
ALTER TABLE `libribooks`
  ADD PRIMARY KEY (`Libri`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Eventi`);

--
-- Indexes for table `shporta`
--
ALTER TABLE `shporta`
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
