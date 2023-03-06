-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 11:15 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_description`) VALUES
(1, 'Social Issues', 'Please Make sure your post and comment relate to the social issues'),
(2, 'Technology', 'Please Make sure your post and comment relate to the post categories'),
(3, 'Economics issues', 'Please Make sure your post and comment relate to the Economics issues'),
(4, 'Sports & Entertaiment', 'Please Make sure your post and comment relate to the Sports and Entataiment'),
(5, 'Health & Fitness', 'Please Make sure your post and comment relate to the Health and Fitness'),
(6, 'Politics', 'Please Make sure Your Post or comment relate to politic category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postid`, `studentid`, `content`, `dateCreated`) VALUES
(8, 18, 7, 'Joseph Hauli kakubalika kwenye kura za maoni Mikumi ', '2020-07-19 00:00:00'),
(12, 18, 7, '<p><strong>makonda</strong> hana mpinzani kigamboni</p>', '2020-07-20 00:00:00'),
(13, 14, 9, '<p>mkal wa <i>network</i></p>', '2020-07-20 00:00:00'),
(14, 19, 8, '<p>Mjomba magu</p>', '2020-07-20 00:00:00'),
(15, 19, 9, '<p>ebana hataki masihara</p>', '2020-07-20 00:00:00'),
(16, 14, 2, '<p>jamaa anategemewa</p>', '2020-07-20 00:00:00'),
(26, 31, 2, '<p>Paul Makonda ni mmoja wa wachukua fomu</p>', '2020-07-20 00:00:00'),
(32, 32, 1, '<p>Haridhiki na madaraka aliyopewa</p>', '2020-07-21 00:00:00'),
(33, 32, 2, '<p>hata mm nilijua</p>', '2020-07-21 00:00:00'),
(36, 16, 4, '<p>UCC chuo kizuri kwa kujifunza IT kwa ngazi ya diploma na certificate</p>', '2020-07-24 00:00:00'),
(38, 33, 2, '<p>Pumzika kwa amani Mkapa</p>', '2020-07-25 00:00:00'),
(39, 34, 1, '<p>Mbowe hoeee!</p>', '2020-07-26 00:00:00'),
(40, 34, 2, '<p>Pengine akawa mgombea Urais wa chama cha upinzani(CHADEMA).</p>', '2020-07-27 00:00:00'),
(41, 35, 1, '<p>Hongera kwa serikali ya awamu ya nne Rais <strong>Magufuli</strong></p>', '2020-07-27 00:00:00'),
(42, 35, 4, '<p>xsakskk</p>', '2020-08-07 00:00:00'),
(43, 17, 4, '<p>vvm</p><p>&nbsp;</p>', '2020-08-07 00:00:00'),
(44, 37, 2, '<p><i>Chadema </i>oyeeee</p>', '2020-08-26 00:00:00'),
(45, 37, 5, '<p>magufuli oyee</p>', '2020-08-26 00:00:00'),
(46, 38, 5, '<p>Mashabiki wapo nje ya uwanja wanasubiri maamuzi</p>', '2020-08-26 00:00:00'),
(49, 38, 1, '<p>Malcom anaelekea barcelona kuziba pengo la Mess</p>', '2020-08-27 00:00:00'),
(51, 40, 1, '<p>hapana simba wanakwama</p>', '2020-09-06 00:00:00'),
(52, 40, 2, '<p>wanawake tukiwezeshwa tunaweza</p>', '2020-09-06 00:00:00'),
(56, 35, 1, '<p>safi</p>', '2020-09-06 00:00:00'),
(62, 38, 2, '<p>safi</p>', '2020-09-06 00:00:00'),
(64, 41, 1, '<p>hatari</p>', '2020-09-10 00:00:00'),
(68, 44, 2, '<p>ni nomaa!</p>', '2020-09-10 00:00:00'),
(70, 45, 1, '<p>hatari</p>', '2020-09-10 00:00:00'),
(71, 45, 15, '<p>wakamatwe</p>', '2020-09-10 00:00:00'),
(74, 45, 6, '<p>safi</p>', '2020-09-11 00:00:00'),
(75, 41, 13, '<p>what is covid 19</p>', '2020-09-11 00:00:00'),
(76, 46, 15, '<p>true</p>', '2020-09-11 00:00:00'),
(77, 52, 1, '<p>Ubingwa wetu</p>', '2020-09-15 00:00:00'),
(78, 52, 5, '<p><i><strong>yes</strong></i></p>', '2020-09-21 15:17:54'),
(79, 52, 16, '<p>wananchi.</p>', '2020-09-22 12:51:49'),
(80, 54, 16, '<p>noma</p>', '2020-09-22 14:03:23'),
(81, 53, 12, '<p>unyanyasaji wa kijinsia.</p>', '2020-09-22 15:27:15'),
(82, 56, 1, '<p>umewapita</p>', '2020-09-22 15:43:52'),
(83, 55, 2, '<p>zije TZ&nbsp;</p>', '2020-09-22 15:46:53'),
(84, 59, 16, '<p>brand yangu bora</p>', '2020-09-23 00:02:24'),
(85, 54, 17, '<p>Hatari sana kukaa karibu na lori la mafuta</p>', '2020-09-23 09:20:46'),
(86, 62, 1, '<p>is the wireless technology.</p>', '2020-09-23 11:45:06'),
(87, 62, 19, '<p>yes</p><p>&nbsp;</p>', '2020-10-05 05:42:39'),
(88, 62, 2, '<p>tunajua</p>', '2020-10-05 10:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `studentID`, `cat_id`, `title`, `content`, `dateCreated`) VALUES
(32, 1, 6, 'Makonda Kigamboni Chali', '<p>Kati ya watia nia wa kugombea ubunge jimbo la kigamboni makonda apitwa kura na <strong>Paul Makonda</strong> apata kura 122 uku Faustini Ndungulile kura 190 na Mpoki kura 0&nbsp;</p>', '2020-07-21 00:00:00'),
(33, 1, 6, 'Rais mstaafu wa awamu ya tatu mzee mkapa afariki dunia', '<p>Aliyekuwa Raisi wa awamu ya tatu tangu 1995 hadi 2005 usiku wa kuamkia leo amefariki dunia,Raisi wa awamu ya tano amethibitisha.Mzee Mkapa ndiye raisi ambaye<strong> mfumo wa vyama</strong> vingi umeanza kwenye utawalawa wake</p>', '2020-07-24 00:00:00'),
(35, 2, 3, 'Nchi ya Tanzania kuingia kwenye uchumi wa kati.', '<p>Shirika la World Bank Group limetangaza nchi ya Tanzaniza kuingia kwenye uchumi wa kati hii kutokana na jitihada anazofanya rais wa awamu ya nne DR. Joseph John Pombe Magufuli.Jitihada hizo zimeonekana kutokana na msemo wake hapa kazi tu maana yake ni kwamba kazi ni kipaumbele chake cha kwanza.</p>', '2020-07-27 00:00:00'),
(37, 1, 2, 'Tundulissu athibitishwa kuwa mgombea uraisi 2020', '<p>Tume ya Taifa ya Uchaguzi(NEC) imemteua Tundu Lissu kuwa mgombea uraisi wa Tanzaia kupitia chama cha Democrasia na maendeleo(<strong>CHADEMA</strong>).Pia Imemuadhinisha Salum Mwalimu kuwa mgombea katika nafasi ya makamu wa raisi.</p>', '2020-08-26 00:00:00'),
(38, 3, 4, 'Mess Kuondoka Barcelona', '<p>Pengine mshambiliaji wa cataluna Lionel Mess ukawa msimu wake wa mwisho huu kuchezea barcelona,lakin kocha mkuu amejiuzulu</p>', '2020-08-26 00:00:00'),
(41, 2, 5, 'Covid 19 inazidi kupamba moto Kenya', '<p>Ugonjwa wa corona kenya unazidi kuongezeka kwa kasi &nbsp;sababu watu bado hawana elimu nzuri ya kujikinga kuhusu corona haswa wa Vijijini&nbsp;</p>', '2020-09-07 00:00:00'),
(44, 5, 1, 'Chupuchupu mtu na kaka yake wafunge ndoa', '<p>Katika hali isiyotarajiwa,Ann Magwi na Jonathan Munini kutoka Tana River Kenya, wamlazimika kukatisha zoezi la kufunga ndoa,baada ya james Sidia kujitokeza kanisani na kusema yeye ndio baba mzazi.</p>', '2020-09-10 00:00:00'),
(45, 2, 4, 'Msako waanza walioiba Kombe waliokabidhiwa Misriii', '<p>Uchunguzi umeanzishwa na shirikisho la soka nchini <strong>Misri (EFA)</strong> baada ya kubaini kuwa vikombe kadhaa vimepotea kutoka makao makuu yake mjini Cairo,likiwemo kombe asii la Mataifa &nbsp;ya Africa.&nbsp;</p>', '2020-09-10 00:00:00'),
(46, 11, 2, 'Technolojia ya juu... Begi linafata Binadamu lenyewe', '<p>Ni kawaida kukutana na msafiri anapambana kukokota begi lake na kiukweli kuna kero zake tena pale kunapokuwa na begi zaidi ya moja ila wataalamu huko majuu wamebuni begi ambalo halihitaji binadamu kulivuta wala kilibeba,unaliset tu linakufata lenyewee.</p>', '2020-09-11 00:00:00'),
(47, 15, 5, 'Kufanya Mazoezi asubuhi na jioni', '<p>Unashauriwa kufanya mazoezi asubuhi &nbsp;na jioni kwa ajili ya afya<strong> </strong>yako.</p>', '2020-09-11 00:00:00'),
(48, 15, 3, 'Uganda kufungua uwanja wa ndege wa Entebbe', '<p>Mamlaka ya Usafiri wa Anga nchini Uganda (UCAA), inatarajia kufungua uwanja wa kimataifa wa Entebbe na kuruhusu safari za ndani na nje, Kuanzia Oktoba 1, mwaka huu, baada ya miezi mitano ya kuzuia safari za ndege za abiria ili kudhibiti maambukizi ya Covid 19.</p><p>Hatua hiyo ni mfululizo wa jitihada za Serikali ya nchi hiyo chini ya rais Yoweri Museveni, kulegeza masharti, na kufufua uchumi ulioathirika vibaya kutokana na mlipuko wa ugonjwa huo.</p><p>Aidha mamlaka hiyo imesema kuwa ndege 13 zimeruhusiwa kuingia na kutoka kwa siku ya kwanza na 10 zitafanya safari siku ya pili.</p><p>Miongoni mwa mashirika yanayotarajiwa kufanya safari ni pamoja na <strong>Uganda Airlines, Air Tanzania, Kenya Airways, Emirates, RwandAir na KLM</strong>.</p>', '2020-09-13 01:50:34'),
(49, 2, 6, 'Maalim Seif apitishwa kugombea Urais 2020 Zanzibar', '<p>Moja ya taarifa ya kuifahamu leo September 12, 2020 Tume ya Uchaguzi Zanzibar (ZEC) imempitisha Mgombea Urais kupitia ACT-Wazalendo, Maalim Seif kuwa mgombea wa Urais baada ya kuwekewa mapingamizi 2 siku ya jana.</p><p>Mwenyekiti wa Tume hiyo, <strong>Jaji mstaafu Hamid Mahmoud</strong> amesema kuwa mapingamizi yaliyowekwa dhidi ya Maalim hayana mashiko.</p>', '2020-09-13 02:31:47'),
(51, 1, 5, 'CORONA: Watu watakiwa kukaa nyumbani kwa wiki tatu Israeliik', '<p>Israel imeweka masharti mapya kwa wiki tatu kukabiliana na mlipuko mpya wa ugonjwa wa COVID-19, ambao umeendelea kusambaa nchini humo.</p><p>Masharti hayo ya watu kukaa nyumbani yataanza kutekelezwa Ijumaa wiki hii, Waziri Mkuu wa Israel, <strong>Benjamin Netanyahu,</strong> ameyasema hayo katika hotuba kwenye televisheni.</p><p>Katika kipindi hiki, ambacho kinaendana na wakati mgumu katika kalenda ya Kiebrania, watu watatakiwa kutembea hadi mita 500, isipokuwa kwenda mahali pa kazi, ambapo idadi ya wafanyakazi itapunguzwa.</p><p>Shule na vituo vya ununuzi vitafungwa, lakini maduka makubwa yatabaki wazi, kama vile maduka ya dawa. huduma za umma zitafanya kazi kwa idadi ndogo ya wafanyikazi na makampuni ya kibinafsi yataweza kuendelea kufanya kazi, kwa masharti ya kutopokea wateja.</p>', '2020-09-14 11:33:40'),
(52, 11, 4, 'Full Time: Yanga yapata ushindi wa kwanza vs Mbeya City leo', '<p>Yanga SC leo imepata ushindi wake wa kwanza wa ligi kuu msimu wa 2020/21 katika uwanja wa Mkapa kwenye game waliyocheza na Mbeya City.</p><p>Kikosi cha Yanga ambacho kina muunganiko wa Wachezaji wapya wengi, kimefanikiwa kupata ushindi wa goli 1-0 ikiwa ni goli pekee lililofungwa na Lamine Moro dakika ya 86.</p><p>Ushindi huo unaifanya Yanga SC kuwa na point 4 sawa na Wapinzani wao wa jadi Simba SC ambao nao wameshinda mechi moja na kutoka sare mechi moja.</p><p>Sasa Yanga anaanza safari ya kwenda Bukoba kucheza dhidi ya Kagera Sugar September 19 na baadae kurejea Morogoro September 27 2020 kucheza dhidi ya Mtibwa Sugar katika uwanja wa Jamhuri, Mbeya City wao kwa sasa hawana point baada ya kupoteza mechi 2 zote za mwanzo.</p>', '2020-09-14 11:42:42'),
(53, 10, 1, 'Binti wa darasa la tano aozeshwa Shinyanga', '<p>Watu wanne wakazi wa kijiji cha Isela Mkoani Shinyanga wanashikiliwa na jeshi la Polisi kwa tuhuma ya kumuozesha mwanafunzi wa darasa la tano mwenye miaka 12 na kupokea mahali ya ng\'ombe 8 pamoja na tsh. laki 6.</p>', '2020-09-22 13:13:21'),
(54, 5, 1, 'Lori la mafuta lawaka moto MorogoroO', '<p>Jeshi la zimamoto na uokoaji Mkoani Morogoro &nbsp;limafanikiwa kuudhibiti moto wa mafuta kutokana na gari lenye namba za usajili T862 BZS na tela namba T814 DBZ.</p>', '2020-09-22 14:01:03'),
(55, 12, 3, 'kampuni za Japan zinazowasaidia watu kupotea.', '<p>Katika maeneo yote dunia,kuanzia Marekani,ujerumani, hadi uingereza,kuna watu ambao kila mwaka wanaamua kutoweka na kutotaka kabisa wapatikane,wanaamua kuacha nyumba zao,kazi na hata familia ili kuanzisha maisha yao ya pili.</p>', '2020-09-22 15:33:38'),
(56, 12, 3, 'Mradi wa bomba la mafuta wa Uganda Tanzania una maana gani kwa kenya?', '<p>Mradi wa ujenzi wa bomba la mafuta la Uganda kupitia Kenya umepata pigo kubwa baada ya Uganda kupitia kenya umepata pigo kubwa baada ya Uganda kutia saini mkataba wa kiserikali na nchi jirani ya Tanzania</p>', '2020-09-22 15:43:06'),
(57, 5, 4, 'Vidal asaini Inter Milan', '<p>Club ya inter Milan ya Italia imemsajili arturo vidal, 33 kutokea club ya FC Barcelona ya Hispania,Vidal raia wa Chile anaungana na kocha wake wa zamani <strong>Antonio Conte</strong>.</p>', '2020-09-22 16:06:31'),
(58, 5, 2, 'Mercedes yazindua lori linalojiendesha', '<p>Mwanzo ilikuwa ni magari madogo sasa kampuni ya kutengeneza magari ya kifahari Daimler Mercedes-benz imezindua lori linalojiendesha lenyewe.</p>', '2020-09-22 16:21:39'),
(59, 1, 2, 'Samsung yakiri TV zake zinanasa sauti', '<p>Samsung imewaonya wateja wake kuhusu kutojadili mambo yao ya kibinafi mbele ya televisheni zao.Onyo hilo ni kwa wale watazamaji ambao hudhibiti televisheni zao kwa kutumia sauti.</p>', '2020-09-22 16:25:36'),
(60, 16, 6, 'Samatta kutua Fenerbahce?', '<p>Baada ya kukosekana katika mchezo dhidi ya Sheffield, tetesi za nahodha wa Tanzania Mbwana Samatta kuhamia Fenerbahce zinazidi kushika kasii.</p><p>Inadaiwa kuwa Fenerbahce ya Uturuki ndio timu inayopewa nafasi kubwa kupata huduma yake msimu 2020/21.</p><p>Samatta analazimika kuondoka Aston Villa baada ya club hiyo kusajili wachezaji wa nafasi yake zaidi ya wawili akiwemo Watkins wakati huu wa dirisha la usajili, hata hivyo Samatta anahusishwa na West Brom, Fulham na <strong>Fenerbahce</strong>.</p>', '2020-09-23 00:00:39'),
(61, 17, 4, 'Vidal asajiliwa pauni laki 9.', '<p>Ni dau dogo kuliko kiwango chake.</p>', '2020-09-23 09:19:21'),
(62, 18, 2, 'WIFI', '<p>I want to know about wireless <strong>wifi</strong></p>', '2020-09-23 11:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `university` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profileImage` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `studentID`, `username`, `bio`, `university`, `email`, `password`, `profileImage`, `date_added`) VALUES
(1, 1, 'kevoo', 'I\'m good at HTML,CSS,PHP,MYSQL,JAVASCRIPT', 'UDSM', 'kevoo@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'kevoo.png', '0000-00-00 00:00:00'),
(2, 2, 'fetty', 'I\'m a Designer', 'UDSM', 'fetty@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'adult-doctor-girl-355934.jpg', '0000-00-00 00:00:00'),
(12, 14, 'Mende', 'I like swimming', 'UDSM', 'mende@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accident-band-aid-bandages-42230.jpg', '2020-08-20 00:00:00'),
(13, 5, 'happie', 'I am Coder', 'UDSM', 'happy@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'attachment-baby-boy-1027931.jpg', '2020-08-26 00:00:00'),
(14, 3, 'sheikh', 'I like dancing', 'UDSM', 'sheik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'apothecary.jpg', '2020-08-26 00:00:00'),
(24, 9, 'ksalsa', 'I like to watch movies', 'UDSM', 'kevooo@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'assets/images/profilePicture/head.png', '2020-09-09 00:00:00'),
(25, 10, 'gayo', 'I like to frexh mind', 'UDSM', 'gayo@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'adorable-boy-child-1005431.jpg', '2020-09-10 00:00:00'),
(29, 6, 'cosmk', 'sa', 'UDSM', 'cosm@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'kevoo.png', '2020-09-11 00:00:00'),
(30, 11, 'josiah', 'I like dancing', 'UDSM', 'josiah@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'learning.jpg', '2020-09-11 00:00:00'),
(31, 12, 'anna', 'Dancer', 'UDSM', 'anna@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'photo-of-woman-standing-near-wall.jpg', '2020-09-11 00:00:00'),
(32, 13, 'alen', 'I like dancing', 'UDSM', 'alen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'a.jpg', '2020-09-11 00:00:00'),
(33, 15, 'uuuu', 'Fullstack', 'UDSM', 'calvin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'accident-band-aid-bandages-42230.jpg', '2020-09-11 00:00:00'),
(36, 16, 'fauz', 'I like to be phamacist', 'UDSM', 'fauzia@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'p.jpg', '2020-09-22 23:51:36'),
(37, 17, 'happy', 'designer', 'UDSM', 'happ@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'c.jpg', '2020-09-23 09:14:37'),
(38, 18, 'kibonge', '', 'UDSM', 'kibonge@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'a.jpg', '2020-09-23 11:38:31'),
(39, 19, 'iqram', 'I want to be a lawyer', 'UDSM', 'iqram@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'assets/images/profilepicture/head.png', '2020-10-05 05:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `joinedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentID`, `firstname`, `middlename`, `lastname`, `joinedDate`) VALUES
(1, 'DCIT/AS/1010/CB/T.18', 'Kelvin', 'Aron', 'Msindai', '2020-08-24'),
(2, 'DCIT/AS/1012/CB/T.18', 'Fatuma', 'Athumani', 'Kondo', '2020-07-08'),
(3, 'DCIT/AS/1011/CB/T.18', 'Abdurahman', 'Ali', 'Feisal', '2020-08-24'),
(5, 'DCIT/AS/4040/CB/T.18', 'happy', 'babie', 'Jitto', '2020-08-20'),
(6, 'DCIT/AS/4620/CB/T.18', 'Cosmas', 'Ibrahim', 'Shein', '2020-09-06'),
(9, 'DCIT/AS10/4623/CB/T.18', 'Kelvin', 'Alen', 'Msundai', '2020-09-07'),
(11, 'DCIT/AS10/0000/CB/T.18', 'Josiah', 'Herman', 'Mbaga', '2020-09-11'),
(12, 'DCIT/AS10/4625/CB/T.18', 'Annastazia', 'William', 'Ambilikile', '2020-09-11'),
(13, 'DCIT/AS10/4631/CB/T.18', 'Allein ', 'Masanja', 'Mbonjee', '2020-09-11'),
(15, 'DCIT/AS10/4632/CB/T.18', 'Calvin', 'kibongee', 'Kweka', '2020-09-11'),
(16, 'DCIT/AS/2020/CB/T.18', 'Fauzia', 'Alii', 'Masanja', '2020-09-22'),
(17, 'DCIT/AS/11718/CB/T.18', 'Happy', 'Alen', 'Masanj', '2020-09-23'),
(18, 'DCIT/AS/1340/CB/T.18', 'Kelvin', 'kibongeee', 'Kecoo', '2020-09-23'),
(19, 'DCIT/AS/7070/CB/T.18', 'Iqram ', 'Shabani', 'Kibwe', '2020-10-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
