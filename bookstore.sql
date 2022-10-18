-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2022 at 03:59 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `allbooklist`
--

CREATE TABLE `allbooklist` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_type` varchar(255) NOT NULL,
  `book_release` int(11) NOT NULL,
  `book_genres` varchar(255) NOT NULL,
  `book_rate` int(11) NOT NULL,
  `book_detail` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_video` varchar(255) NOT NULL,
  `book_allcount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allbooklist`
--

INSERT INTO `allbooklist` (`book_id`, `book_name`, `book_author`, `book_type`, `book_release`, `book_genres`, `book_rate`, `book_detail`, `book_cover`, `book_video`, `book_allcount`, `created_at`) VALUES
(1, 'คุณอาเรียโต๊ะข้างๆ พูดรัสเซียหวานใส่ซะหัวใจจะวาย', 'SunSunSun', '1', 6, '1,2', 1, 'เรื่องราวของหญิงสาวเจ้าของผมสีเงิน ลูกครึ่งญี่ปุ่นรัสเซียผู้สง่างาม อาริสะ มิฮาอิลลอฟนา คุโจ ผู้ที่มีฉายาว่า ‘องค์หญิงผู้สันโดษ’ กับชายหนุ่ม  คุเซะ มาซาจิกะ นักเรียนไม่เอาไหนผู้ไม่มีใจทำอะไรทั้งนั้น ใช้ชีวิตกับงานอดิเรกแนวโอตะคุ ที่นั่งโต๊ะข้างกัน วันนี้เองก็-<br><br>\r\n“หา? พูดว่าไง?”<br><br>\r\n“เปล่านี่? ก็แค่บอกว่า \'หมอนี่โง่จริงๆเลย\' แค่นั้นเอง”<br><br>\r\n“เลิกด่าเป็นภาษารัสเซียได้ไหม!?<br><br>\r\nบทสนทนาที่เหมือนทั้งสองจะไม่ค่อยถูกกัน แต่ความจริงมันไม่ใช่อย่างนั้นเสียหน่อย ภาษารัสเซียที่เธอพูดเมื่อกี๊นี้มันคือ \'สนใจฉันหน่อย\' ต่างหากล่ะ อันที่จริงตัวผม คุเซะ มาซาจิกะ มีทักษะการฟังภาษารัสเซียระดับเทียบเท่าเจ้าของภาษา เพียงแต่ไม่เปิดเผยเรื่องนั้นให้ใครรู้ วันนี้ก็เป็นอีกวันที่อดยิ้มไม่อยู่ เพราะคุณอาเรียมาหยอดคำหวานใส่เป็นภาษารัสเซียอีกแล้ว!?', 'https://www.phoenixnext.com/pub/media/brand/tmp/_LN_Tokidoki_Russia_KVEC1-min_1_.jpg', '3zW_s8a1teg', '', '2022-10-09 02:11:14'),
(2, 'สาบานรักราชันจอมเวท', 'Tachibana Koushi', '1', 2, '', 2, 'คุโอซากิ ไซกะ เป็นอาจารย์ใหญ่ประจำโรงเรียนของเหล่าจอมเวท\r\nแม่มดสุดแกร่งผู้กอบกู้โลกจากการล่มสลายซึ่งจะเกิดขึ้นหนึ่งครั้งในทุกสามร้อยชั่วโมงเสมอมา\r\nและ—เธอคือรักแรกของคุกะ มุชิกิ เด็กหนุ่มที่เธอสืบทอดร่างกายและพลังให้ก่อนจะสิ้นลมหายใจไป\r\n \r\n“—ฉันขอฝาก โลกข', '', '', '', '2022-10-09 02:12:20'),
(3, 'ห้องเรียนจารชน', 'Takemachi', '1', 2, '', 2, 'ในโลกที่นานาประเทศก่อสงครามในเงามืดผ่านสายลับ เคลาส์ สุดยอดสายลับที่ปฏิบัติภารกิจสำเร็จ 100%\r\n\r\nแต่มีปัญหาด้านนิสัยได้จัดตั้งทีมเชี่ยวชาญพิเศษ ‘โทโมชิบิ’ เพื่อปฏิบัติภารกิจสุดโหดที่มีโอกาสเสียชีวิตเกิน 90%\r\n\r\nทว่าสมาชิกทีมที่เขาเลือกมากลับเป็นเด็กสาวไร้ปร', '', '', '', '2022-10-09 02:15:31'),
(4, 'เป็นนางร้ายมันเสี่ยง เลยขอเลี้ยงลาสต์บอสดูสักตั้ง', 'Sarasa Nagase', '2', 2, '', 2, 'ไอลีน คุณหนูสายสตรอง ถูกองค์รัชทายาทถอนหมั้นต่อหน้าประชาชี\r\n\r\nจึงระลึกได้ว่าตนกลับมาเกิดในโลกเกมจีบหนุ่มที่ติดงอมแงมในชาติก่อน\r\n\r\nทั้งที่รู้แก่ใจว่าหากปล่อยไปตามเกม ตนจะต้องจบเห่เอวังแน่นอน\r\n\r\nแต่อนิจจา ความจำดันกระท่อนกระแท่นจนไม่รู้จะไปทางไหนดี!!\r\n\r\nยัง', '', '', '', '2022-10-09 02:16:17'),
(5, 'ชีวิตใหม่ไม่ธรรมดาของราชาปีศาจขี้เหงา', 'Myōjin Katō', '1', 2, '', 2, 'เรื่องย่อ:\r\n\r\nจอมราชาปีศาจสุดแกร่งผู้จารึกชื่อไว้ในเทวตำนาน วาร์วาทอส\r\n\r\nเขาผู้ใช้ชีวิตในฐานะราชามาตลอดกลับหลงใหลชีวิตสามัญชน และในหลายพันปีต่อมาก็ได้เกิดใหม่เป็นชาวบ้านชื่ออาร์ด\r\n\r\nทว่าในโลกยุคปัจจุบันที่เวทมนตร์เสื่อมถอย ต่อให้อาร์ดออมมือแล้ว เขาก็ยังแก', '', '', '', '2022-10-09 02:17:49'),
(6, 'แผนสมรสไม่สมเลิฟ', 'Yūki Kanamaru', '2', 2, '', 2, 'เลิฟคอเมดี้ของคู่แต่งปลอมๆระหว่างหนุ่มเฉากับสาวแกล\r\nยาคุอิน จิโร่ หนุ่มมัธยมปลายบ้านๆต้องเข้าเรียนหลักสูตร ‘ฝึกคู่สมรสภาคปฏิบัติ’\r\nและต้องอาศัยอยู่ร่วมกับวาตานาเบะ อาคาริ\r\nสาวแกลในห้องเรียนที่เป็นเหมือนขั้วตรงข้าม\r\nแม้ต่างคนต่างไม่ชอบใจ\r\nแต่เพื่อให้ได้สิท', '', '', '', '2022-10-09 02:18:22'),
(7, 'อาจารย์เวทมนตร์ไม่เอาไหนกับตำนานปราสาทลอยฟ้า', 'Tarō Hitsuji', '1,2', 9, '3,4', 2, 'เกลน เรดัส เป็นอาจารย์พิเศษของสถาบันสอนเวทมนตร์แห่งจักรวรรดิอัลซาโนแต่เริ่มคาบเรียนแรกไม่ทันไรก็งีบหลับ และปล่อยนักเรียนให้เรียนเอง จนเหล่านักเรียนพากันเอือมระอาในความไม่เอาไหน ซิสตินา ฟีเบล นักเรียนดีเด่นของห้องรับสภาพไม่ไหวจึงตัดสินใจท้าประลองกับเขา<br><br>\r\n\r\n—ผลปรากฏว่าเกลนแพ้ราบคาบ!?<br><br>\r\n\r\nถึงอย่างนั้น ในวันที่นักเรียนทั้งโรงเรียนตกอยู่ในอันตราย มีเพียงเกลนคนเดียวเท่านั้นที่จะช่วยทุกคนได้ เกลนลุกขึ้นประกาศกร้าว “อย่ายุ่งกับนักเรียนของฉัน” พร้อมกับแสดงพลัง ‘เวทมนตร์’ ที่แท้จริงของตนให้เป็นที่ประจักษ์!<br><br>\r\n\r\nเรื่องราวแฟนตาซีแนวใหม่ของฮีโร่ในโรงเรียนเวทมนตร์ได้ฤกษ์เปิดฉากแล้ว ณ บัดนี้!', 'https://www.phoenixnext.com/pub/media/brand/tmp/_LN_Rokudenashi_KVEC-min_1.jpg', 'nzlblisGahI', '', '2022-10-09 02:19:03'),
(8, 'คนปรุงยาเสน่ห์ขวดนี้แอบมีใจให้อยู่รู้บ้างไหม', 'Mutsuhana Eiko', '2', 2, '', 2, '\"ช่วยปรุงยาเสน่ห์ให้ฉันหน่อย”\r\n\r\n\r\nคำพูดของอัศวินหนุ่มที่แอบชอบ ทำให้ความรักของแม่มดแห่งทะเลสาบผู้แสนดีเป็นอันต้องจบลง\r\n\r\nแต่ถึงอย่างนั้นก็ขออยู่ด้วยกันให้นานกว่านี้สักนิดเถอะ\r\nอย่างน้อยก็จนกว่ายาจะเสร็จ แม่มดจึงให้อัศวินช่วยตามหาวัตถุดิบต่างๆจนครบ\r\n\r\nทว่', '', '', '', '2022-10-09 02:19:34'),
(9, 'สตรีศักดิ์สิทธิ์อิทธิฤทธิ์สารพัดอย่าง', 'Yuka Tachibana', '1,2', 2, '', 2, 'ในเย็นวันหนึ่ง เซย์ ทาคานาชิ สาวออฟฟิศวัยยี่สิบกว่าที่กำลังกลับบ้านหลังเสร็จจากโอที ได้ถูกอัญเชิญไปยังต่างโลก พร้อมกับหญิงสาวอีกคนหนึ่ง\r\n\r\nแต่เธอกลับถูกเจ้าชายบอกว่า “สารรูปอย่างนี้ไม่ใช่สตรีศักดิ์สิทธิ์หรอก” ซะงั้น\r\n\r\nเซย์จึงออกมาเริ่มทำงานเป็นนักวิจัยโด', '', '', '', '2022-10-09 02:20:03'),
(10, 'คุโรอิวะ เมดากะ ไม่เข้าใจความน่ารักของฉันเลย', 'Kuze Ran', '2', 2, '', 2, 'คาวาอิ โมนะ เป็นสาวสวยหุ่นดีที่ทุกคนหลงรัก แต่ชีวิตวัยเรียนของเธอต้องเปลี่ยนไปอย่างสิ้นเชิง\r\n\r\nเมื่อได้พบกับ คุโรอิวะ เมดากะ นักเรียนที่ย้ายมาใหม่ ผู้ซึ่งไม่แม้แต่ชายตามองเธอ!\r\n\r\nโมนะจึงต้องสู้สุดตัว งัดเอาสารพัดวิธีมาตกเมดากะให้ได้ จนบางครั้งก็ทำเรื่องสุ', '', '', '', '2022-10-09 02:20:45'),
(11, 'ใครว่าข้าไม่เหมาะเป็นจอมมาร', 'Shu', '1,2', 2, '', 2, 'นานมาแล้ว สงครามระหว่างมนุษย์กับมาร ได้ก่อความโกลาหลและการนองเลือดอย่างไม่มีสิ้นสุด เพื่อที่จะหยุดความขัดแย้ง\r\n\r\nจอมมารอานอสผู้โหดเหี้ยมตัดสินใจไปเกิดใหม่ในโลกที่มีแต่สันติสุขสองพันปีให้หลัง แต่ในระหว่างที่เขาไม่อยู่ วิทยาการเวทมนตร์กลับเสื่อมถอยลง\r\n\r\nรวม', '', '', '', '2022-10-09 02:21:16'),
(12, 'มหาศึกคนชนเทพ', 'Shinya Umemura', '2', 2, '', 2, 'ใน ‘การประชุมชี้ชะตามนุษยชาติ’ ซึ่งจัดขึ้นบนสวรรค์พันปีครั้ง เหล่าทวยเทพต่างลงมติให้ล้างบางเผ่าพันธุ์มนุษย์\r\nทำให้ 13 คนที่แข็งแกร่งที่สุดในประวัติศาสตร์มนุษยชาติต้องลุกขึ้นต่อต้านมติที่ว่า\r\nโดยการเผชิญหน้ากับ 13 เทพที่แข็งแกร่งที่สุดในสวรรค์ สงครามที่เดิ', '', '', '', '2022-10-09 02:22:00'),
(13, 'ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน', 'Shōgo Kinugasa', '1,2', 2, '', 2, 'โรงเรียนมัธยมปลายโคโดอิคุเซ โรงเรียนชั้นนำของประเทศที่ตอบสนองความปรารถนาในการศึกษาต่อและการทำงานเกือบ 100 เปอร์เซ็นต์ แน่นอนว่ามีเครื่องอำนวยความสะดวกไว้ให้ใช้ครบครัน แถมยังให้เบี้ยเลี้ยงเป็นแต้มที่มีมูลค่าเท่ากับ 100,000 เยนทุกเดือนอีกด้วย ทั้งทรงผมหรือข', '', '', '', '2022-10-09 02:22:31'),
(14, 'เกิดใหม่อ้วนเป็นหมูก็ขอสู้บอกรักเธอ', 'Rhythm Aida', '1', 2, '', 2, 'ในอนิเมะยอดฮิต \'ชูยา มาริโอเน็ต\' มีตัวละครหนึ่งซึ่งเป็นที่รังเกียจ เขาคือดยุกหมูอ้วน บุตรชายคนที่สามของตระกูลดยุกเดนิ่งที่เรียนอยู่ในโรงเรียนเวทมนตร์  แต่โทรวได้เกิดใหม่เพื่อมารับบทแย่ๆที่ว่านั่น ขืนปล่อยไว้แบบนี้ มีหวังชีวิตของเค้าต้องจบแบบแบดเอนด์แหงๆ\r\n', '', '', '', '2022-10-09 02:23:57'),
(15, 'วิวาห์ของลาล่า', 'TAMEKOU', '2', 2, '', 2, 'ในพิธีวิวาห์ของตระกูลเศรษฐีใหญ่ \'ลาล่า\' ว่าที่เจ้าสาวตัดสินใจหนีตามคนรักของเธอไป ทำให้ \'รัมดาน\' พี่ชายฝาแฝดตัดสินใจปลอมตัวเป็นลาล่าเพื่อสวมรอยเข้าพิธีวิวาห์แทน เมื่อเสร็จพิธีวิวาห์จนถึงเวลาเข้าห้องหอ ขณะที่รัมดานกำลังคิดวางแผนจะหลบหนี เขากลับถูก \'โวลซีย์\'', '', '', '', '2022-10-09 02:24:53'),
(16, 'ยอดคุณน้าจากต่างโลก', 'Hotondoshindeiru', '2', 7, '', 2, 'ทาคาฟูมิผู้เป็นหลานชายมาเยี่ยมคุณน้าของเขาที่หลับใหลอยู่ในอาการโคม่ามากว่า 17 ปี ก่อนจะได้เห็นเวทมนตร์อันน่าสะพรึงที่ผู้เป็นน้าร่ายออกมา เพราะที่จริงแล้วคุณน้าของเขาเพิ่งกลับจากต่างโลก!\r\n\r\nได้เล่าถึงวันเวลาอันโดดเดี่ยวและความขมขื่นต่างๆนานาที่เขาเคยเผชิญ ', '', '', '', '2022-10-09 02:25:33'),
(17, 'เภสัชกรเทพสองโลก', 'Liz Takayama', '2', 2, '', 2, 'นักเภสัชศาสตร์หนุ่มผู้หมกมุ่นและทุ่มเทชีวิตให้กับงานวิจัย จนเสียชีวิตจากการโหมงานหนัก ดวงจิตของเค้าได้ทะลุมิติไปอยู่ในร่างของฟาร์มา บุตรชายแห่งตระกูลแพทย์โอสถหลวงชื่อดัง เพื่อช่วยเหลือผู้คนในโลกต่างมิติ ที่การรักษาและใช้ยาแบบผิดๆกลายเป็นเรื่องปกติ เขาจึงใ', '', '', '', '2022-10-09 02:26:03'),
(18, 'ผมเนี่ยนะ...ชายแปด!', 'Y.A.', '1', 6, '', 2, 'ในโลกใบใหม่ อิจิมิยะ ชินโง พนักงานบริษัทวัย 25 ได้อยู่ในร่างของเวนเดลินวัย 5 ขวบ บุตรชายคนที่แปด\r\n\r\nแห่งครอบครัวขุนนางผู้ครอบครองที่ดินในที่ห่างไกล เค้าได้หวังว่าจะใช้ความรู้ด้านเวทย์มนตร์ที่มี มุ่งมั่นที่จะเปลี่ยนสถานะทางการเงินและสังคมของเขาและครอบครัวใ', '', '', '', '2022-10-09 02:26:36'),
(19, 'ลาสต์เอ็มบริโอ', 'Tatsunoko Tarou', '1', 3, '', 2, 'อีเมลฉบับหนึ่งส่งมาถึงไซโก โฮมุระ เด็กหนุ่มผู้มีพลังพิเศษเพียงนิดหน่อย ชั่วขณะที่เปิดอีเมล โฮมุระก็ถูกเชิญตัวมายังโลกต่างมิติ ที่แห่งนั้นคือโลกซึ่งปกครองด้วยกิฟต์เกม การละเล่นของเทพและมาร โฮมูระได้รับการต้อนรับจากกระต่ายดำ สาวน้อยโลลิต้าผู้มีหูกระต่ายงดงา', '', '', '', '2022-10-09 02:27:10'),
(20, 'สุดยอดมือสังหารอวตารมาต่างโลก', 'Rui Tsukiyo', '1', 2, '', 2, 'เรื่องราวของนักฆ่าที่เก่งกาจที่สุดในโลก ผู้สาบานว่าจะจงรักภักดีต่อองค์กรที่เลี้ยงดูเขามาทั้งชีวิต อย่างไรก็ตาม เขากลับถูกปิดปากด้วยองค์กรที่เค้าอุทิศชีวิตให้ ในขณะที่กำลังตกอยู่ในความเสียใจที่ถูกหักหลัง เค้าได้ตื่นขึ้นมาพบกับเทพธิดา เธอได้เสนอให้เค้าไปเกิ', '', '', '', '2022-10-09 02:27:45'),
(21, 'การกลับมาของอลิซ', 'Oshimi Shuuzou', '2', 2, '', 2, 'ความสัมพันธ์ของเพื่อนรักในวัยเด็ก โยเฮ เค และยูอิ เริ่มสั่นคลอน\r\n\r\nเมื่อทั้งสามหวนมาพบกันอีกครั้งหลังขึ้นชั้นมัธยมปลายปี 1\r\n\r\n‘เธอคนนั้น’ ที่ไม่ใช่ ‘เขาคนเดิม’ กลับมาทำให้ชีวิตวัยรุ่นของใครบางคนเพี้ยนไป', '', '', '', '2022-10-09 02:28:14'),
(22, 'Weathering With You', 'Makoto Shinkai', '2', 2, '', 2, 'ฤดูร้อนช่วง ม.ปลายปี 1 เด็กหนุ่มคนหนึ่งหนีออกจากบ้านบนเกาะเพื่อเข้าสู่กรุงโตเกียว ท่ามกลางสายฝนโปรยปรายไม่หยุดหย่อนตลอดหลายวัน ณ ซอกมุมหนึ่งของเมืองหลวงอันวุ่นวายสับสน โฮดากะได้พบกับฮินะ เด็กสาวผู้มีพลังแสนมหัศจรรย์\r\n\r\n“ดูนะ ท้องฟ้ากำลังจะแจ่มใสเดี๋ยวนี้ล', '', '', '', '2022-10-09 02:30:52'),
(23, 'Solo Leveling', 'Chugong', '3,2', 2, '', 2, 'ในโลกที่ฮันเตอร์ถูกแบ่งเป็นระดับต่างๆตามพรสวรรค์ที่ได้มาแต่เกิด ไม่สามารถเพิ่มระดับความสามารถได้\r\n\r\nซองจินอู ฮันเตอร์ระดับ E ผู้ไร้ความสามารถตลอดกาล เดิมพันกับความตายที่อยูตรงหน้าในดันเจี้ยนประหลาด\r\n\r\nทว่าวิกฤตมักมาพร้อมโอกาสเสมอ เมื่อพลังในตัวของซองจินอู', '', '', '', '2022-10-09 02:31:50'),
(24, 'นี่เธอชอบหม่าม้าไม่ใช่ลูกจ๋าหรอกเหรอ!?', 'Nozomi', '1', 2, '', 2, 'นี่เธอชอบหม่าม้า ไม่ใช่ลูกจ๋าหรอกเหรอ!?\r\n.\r\n“ฉันจะรับเด็กคนนี้ไปดูแลเองค่ะ”\r\n.\r\nฉัน คัตสึรากิ อายาโกะ อายุสามสิบตื๊ดปี ตั้งแต่รับลูกสาวของพี่สาวและพี่เขยที่เสียไปมาเลี้ยงก็ผ่านมาแล้วสิบปีอย่างรวดเร็ว ช่วงนี้ฉันรู้สึกว่าลูกสาวที่เพิ่งขึ้นชั้น ม.ปลายเข้ากับ', '', '', '', '2022-10-09 02:32:20'),
(25, 'เพราะรักนี้ไม่ได้มีแค่สองเรา', 'Iwami Kiyoko', '2', 2, '', 2, '\"แต่ว่าฉันมีแฟนอยู่แล้ว\"\r\n \r\nนานาเสะกับยูนิแอบคบกันอยู่โดยที่ไม่มีใครรู้\r\nยูนิเข้าใจดีว่าคนรักยุ่งกับชมรมวอลเลย์บอล\r\nจึงอดทนใช้เวลาหลังเลิกเรียนอย่างเดียวดาย แม้ใจจะรู้สึกเหงา\r\nเธอนำเรื่องความรักที่บอกใครไม่ได้ระบายลงแอคหลุม\r\nทั้งเซลฟี ทั้งบ่น รวมถึงอวดแฟ', '', '', '', '2022-10-09 02:33:04'),
(26, 'การปฏิวัติของสาวน้อยหนอนหนังสือ', 'Miya Kazuki', '1,2', 2, '', 2, 'นักศึกษาสาวผู้หลงรักหนังสือ ที่ได้เติมเต็มความฝันของตัวเองด้วยการเป็นบรรณารักษ์ประจำห้องสมุด แต่โชคร้ายประสบอุบัติเหตุ ในลมหายใจสุดท้าย เธอได้ภาวนาว่าขอให้ได้อ่านหนังสือมากกว่านี้ในชาติหน้า ก่อนจะตื่นขึ้นมาในร่างของไมน์ เด็กหญิงขี้โรควัย 5 ขวบในต่างโลกยุค', '', '', '', '2022-10-09 02:33:51'),
(27, 'กระซิบรักเป็นทำนองร้องบอกเธอ', 'Shōgo Kinugasa', '2', 2, '', 2, 'วันเปิดภาคเรียนโรงเรียนมัธยมปลาย ฮิมาริ นักเรียนน้องใหม่ตกหลุมรักโยริ รุ่นพี่นักร้องนำวงดนตรีในคอนเสิร์ตงานรับน้องตั้งแต่แรกเห็น เธอได้พบกับโยริที่ล็อกเกอร์ในอาคารเรียนและบอกกับเจ้าตัวเช่นนั้น\r\n\r\nทำให้โยริตกหลุมรักรุ่นน้องคนนี้ที่กล้าเอ่ยความรู้สึกอย่างตร', '', '', '', '2022-10-09 02:34:28'),
(28, 'บันทึกสงครามของยัยเผด็จการ', 'Carlo Zen', '1,2', 2, '', 2, 'ทาเนีย เดเกรชาฟ เด็กสาวตัวน้อย ที่มีความเหี้ยมโหด บินลงมาจากฟากฟ้าเพื่อเข่นฆ่าศัตรูอย่างเลือดเย็น ทว่าภายใต้ร่างเล็กๆที่ดูไร้เดียงสานั้นคือจิตวิญญาณมนุษย์เงินเดือนรุ่นลุงจากญี่ปุ่นที่ถูกพระเจ้าส่งมาเกิดใหม่ ในโลกแห่งสงครามเวทย์มนตร์ เธอเริ่มไต่เต้าจนกลายเ', '', '', '', '2022-10-09 02:35:08'),
(29, 'Made in Abyss ผ่าเหวนรก', 'Akihito Tsukushi', '2', 2, '', 2, 'ในโลกที่ทุกสิ่งทุกอย่างถูกสำรวจขุดค้นจนกระจ่างแจ้ง มีเพียงหลุมยักษ์นาม ‘อะบิส’ แห่งนี้ซึ่งยังคงเป็นพื้นที่ปริศนา\r\n\r\nภายใต้หลุมลึกขนาดมหึมาที่ไม่มีใครรู้ว่าสุดปลายของมันทอดยาวยังแห่งหนใด\r\n\r\nมีสิ่งมีชีวิตแปลกประหลาดพิสดาร และวัตถุโบราณล้ำค่า ที่มนุษย์ยุคปัจ', '', '', '', '2022-10-09 02:35:41'),
(30, 'เรื่องฝันปั่นป่วยของผม', 'Hajime Kamoshida', '1', 2, '', 2, 'รู้ทั้งรู้ว่าบันนี่เกิร์ลไม่มีทางปรากฏตัวในหอสมุดได้ แต่อาสุซากาวะ ซาคุตะ ก็ได้พบกับบันนี่เกิร์ลตัวเป็นๆ มิหนำซ้ำเธอยังเป็นรุ่นพี่สุดสวย ซากุระจิมะ มาอิ อดีตดาราที่พักงานในวงการบันเทิงไปแล้วด้วยอีกต่างหาก\r\n\r\nสืบเนื่องมาจากเหตุการณ์แปลกๆที่เกิดขึ้นกับเธอเม', '', '', '', '2022-10-09 02:36:49'),
(31, '86 ―เอทตี้ซิกซ์―', 'Asato Asato', '1,2', 3, '', 2, 'สาธารณรัฐซันแมกโนเลียถูกจักรวรรดิเกียเดประเทศข้างเคียงส่งจักรกลไร้พลขับ ‘ลีเจี้ยน’ เข้ารุกรานไม่เว้นแต่ละวัน\r\n\r\nฝ่ายสาธารณรัฐจึงพัฒนาอาวุธไร้พลขับขึ้นบ้าง และสงครามระหว่างเครื่องจักรกับเครื่องจักรก็ดำเนินต่อเรื่อยมา แต่นั่นเป็นเพียงเปลือกนอก\r\n\r\n \r\n\r\nแท้จร', '', '', '', '2022-10-09 02:56:26'),
(32, 'แง้มหัวใจยัยน้องสาวจำเป็น', 'Ghost Mikawa', '1', 2, '', 2, 'แต่งงานใหม่ของพ่อทำให้อาซามุระ ยูตะ หนุ่มม.ปลายได้อาศัยใต้ชายคาเดียวกันกับอายาเสะ ซากิ สาวสวยอันดับหนึ่งของชั้นปีในฐานะพี่ชายและน้องสาว\r\n\r\nเพราะต่างคนต่างโตมาในครอบครัวที่พ่อแม่แยกทางกัน ทั้งสองจึงระมัดระวังในความสัมพันธ์ระหว่างชายหญิงและให้สัญญาว่าจะไม่ก', '', '', '', '2022-10-09 02:58:52'),
(33, 'เอาแล้วไง ยัยแฟนเก่าดันเป็นลูกสาวแม่ใหม่', 'Kyōsuke Kamishiro', '1', 3, '', 2, 'เมื่อหนุ่มสาวคู่รักชั้น ม.ต้นต้องมาผิดใจกันด้วยเรื่องไร้สาระ\r\nจนความสุขที่ได้อยู่ด้วยกันผันแปรเป็นความเกลียด...จึงเลิกกันไปตอนจบการศึกษา\r\n\r\nจากนั้น ในตอนที่เข้าสู่รั้วโรงเรียนมัธยมปลาย\r\nทั้งสองคน——\r\nอิริโดะ มิสึโตะ กับอายาอิ ยูเมะ กลับต้องมาพบกันอีกครั้งใ', '', '', '', '2022-10-09 03:00:52'),
(34, 'วินด์เบรกเกอร์', 'Satoru Nii', '2', 2, '', 2, 'ในฤดูใบไม้ผลิ ซากุระ ฮารุกะ เด็กหนุ่มมัธยมปลายได้เดินทางมายังโรงเรียนนักเลงชื่อดังนามว่าฟูริน\r\n\r\nเพื่อก้าวขึ้นสู่จุดสูงสุดของที่นั่นก่อนพบว่าโรงเรียนดังกล่าวคือศูนย์รวมของเหล่านักเ(ก)รียนผู้พิทักษ์\r\n\r\nซึ่งได้รับการขนานนามจากชาวเมืองว่า ‘โบฟูริน’ ทำให้เขาต', '', '', '', '2022-10-09 03:03:16'),
(35, 'แผน NTR แฟนรุ่นพี่ แค้นนี้ต้องชำระ', 'Shinden Mihiro', '1', 2, '', 2, 'อิชชิกิ ยู รู้สึกช็อคเพราะถูกแฟนตัวเองนอกใจ\r\nจึงตัดสินใจชวน ซากุระจิมะ โทโกะ แฟนของรุ่นพี่ที่แย่งแฟนตนให้มาเป็นกิ๊กกัน\r\nแล้ว โทโกะ ก็เสนอหนทางวางแผน ‘ล้างแค้น’ อันแสบสัน\r\nกับกลยุทธ์ที่จะทำให้ ยู กลายเป็นผู้ชายสุดป็อปของสาวๆ!?\r\n\r\n\"เราต้องทำให้ทั้งสองคนที่น', '', '', '', '2022-10-09 21:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `allbooklist_volume`
--

CREATE TABLE `allbooklist_volume` (
  `allbook_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `volume_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `book_release_volume` date NOT NULL,
  `book_remain_volume` varchar(255) NOT NULL,
  `book_barcode_volume` varchar(255) NOT NULL,
  `book_detail_volume` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `book_img_volume` varchar(255) NOT NULL,
  `book_count` int(11) NOT NULL,
  `book_remain` int(11) NOT NULL,
  `book_price_volume` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allbooklist_volume`
--

INSERT INTO `allbooklist_volume` (`allbook_id`, `book_id`, `volume_id`, `type_id`, `book_release_volume`, `book_remain_volume`, `book_barcode_volume`, `book_detail_volume`, `book_img_volume`, `book_count`, `book_remain`, `book_price_volume`, `created_at`) VALUES
(9, 1, 1, 1, '0000-00-00', '', '9786164646193', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_tokidoki_bosotto_russiago_vol1_jacket_1.jpg', 20, 10, '275', '2022-10-09 03:54:35'),
(10, 2, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_ousama_no_propose_vol01_jacket_3_.jpg', 5, 10, '', '2022-10-09 03:59:01'),
(11, 3, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_spy_kyoshitsu_vol1_jacket_cover_re.jpg', 4, 10, '', '2022-10-09 03:59:48'),
(12, 4, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_m_akuyaku_lastboss_vol1_jacket_cover.jpg', 3, 10, '', '2022-10-09 04:03:43'),
(13, 5, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_shijo_saikyou_daimaou_vol1_cover.jpg', 2, 10, '', '2022-10-09 04:19:18'),
(14, 6, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_m_fufuijo_koibitomiman_vol1_jacket_cover_new_1_.jpg', 2, 10, '', '2022-10-09 04:21:30'),
(15, 7, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/r/o/rokudenashi_cover.jpg', 3, 10, '', '2022-10-09 04:22:22'),
(16, 8, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_m_doumo_sukinahito_vol1_jacket.jpg', 4, 10, '', '2022-10-09 04:22:52'),
(17, 9, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_seijo_no_maryoku_vol1_jacket_cover.jpg', 5, 10, '', '2022-10-09 04:23:35'),
(18, 10, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_m_kuroiwa_medaka_vol1_jacket_cover.jpg', 6, 10, '', '2022-10-09 04:24:12'),
(19, 1, 2, 1, '0000-00-00', '', '9786164646681', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_tokidoki_bosotto_russiago_vol2_jacket_cover_1.jpg', 6, 10, '295', '2022-10-09 04:35:00'),
(20, 11, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_maou_gaku_vol1_jacket_cover.jpg', 7, 0, '', '2022-10-09 17:55:44'),
(21, 12, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_record_of_ragnarok_vol1_jacket.jpg', 9, 0, '', '2022-10-09 17:58:22'),
(22, 13, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/y/o/yokoso_vol.1_novel_jacket.jpg', 0, 0, '', '2022-10-09 18:01:28'),
(23, 14, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_buta_koshaku_jacket_cover.jpg', 0, 0, '', '2022-10-09 19:09:18'),
(24, 15, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_lala_no_kekkon_vol1_jacket_cover_1.jpg', 3, 0, '', '2022-10-09 19:11:25'),
(25, 16, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_isekai_ojisan_vol1_jacket_cover.jpg', 7, 0, '', '2022-10-09 19:19:42'),
(26, 17, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_isekai_yakkyoku_vol1_jacket_cover.jpg', 1, 0, '', '2022-10-09 20:42:39'),
(27, 18, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/h/a/hachinan_jacket_with_copyright.jpg', 0, 0, '', '2022-10-09 20:43:05'),
(28, 19, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/l/a/last_embryo_vol1.png', 0, 0, '', '2022-10-09 20:43:32'),
(29, 20, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_sekai_saiko_no_anastsushao_vol1_jacket_cover.jpg', 0, 0, '', '2022-10-09 20:44:02'),
(30, 21, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_okaeri_alice_vol1_cover.jpg', 0, 0, '', '2022-10-09 20:44:36'),
(31, 22, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_tenki_no_ko_vol1_jacket.jpg', 2, 0, '', '2022-10-09 20:45:22'),
(33, 23, 1, 3, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_solo_leveling_vol1_cover.jpg', 0, 0, '', '2022-10-09 20:46:26'),
(34, 24, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_musume_janakute_mama_ga_sukinano_vol1_jacket_1_.jpg', 0, 0, '', '2022-10-09 20:48:25'),
(35, 25, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_mg_kyo_wa_kanojo_ga_inai_kara_vol1_jacket_1_.jpg', 9, 0, '', '2022-10-09 20:48:55'),
(36, 26, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_honzuki_vol1_jacket_cover.jpg', 0, 0, '', '2022-10-09 20:49:22'),
(37, 27, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_sasayaku_vol1_cover.jpg', 3, 0, '', '2022-10-09 20:49:51'),
(38, 28, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_yojo_senki_vol1.jpg', 0, 0, '', '2022-10-09 20:52:19'),
(39, 29, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_made_in_abyss_vol1_cover.jpg', 4, 0, '', '2022-10-09 20:52:48'),
(40, 30, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/s/e/seishun_buta_jacket.jpg', 0, 0, '', '2022-10-09 20:53:29'),
(41, 31, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/8/6/86_vol1_jacket.jpg', 0, 0, '', '2022-10-09 20:53:57'),
(42, 32, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_giimotoseikatsu_vol1_jacket_cover.jpg', 0, 0, '', '2022-10-09 20:54:30'),
(43, 33, 1, 1, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_mamahaha_no_tsurego_ga_motokano_datta_vol1_jacket.jpg', 0, 0, '', '2022-10-09 20:56:14'),
(44, 34, 1, 2, '0000-00-00', '', '', '', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/m/_m_wind_breaker_vol1_jacket_cover_1.jpg', 5, 0, '', '2022-10-09 20:56:46'),
(45, 1, 3, 1, '0000-00-00', '', '9786164647831', '', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/t/o/tokidoki_bosotto_russiago_vol3_jacket_cover_1_.jpg', 5, 10, '305', '2022-10-10 16:40:32'),
(46, 1, 4, 1, '0000-00-00', '', '9786164648517', 'หลังพิธีปิดภาคเรียน มาซาจิกะกับคุณอาเรียเรียกชื่อต้นของกันและกันอย่างเปิดเผย ในช่วงเวลาแสนอึดอัดเพราะต่างฝ่ายต่างก็เขินและทำตัวไม่ถูกนั้นเอง ในที่สุดการไปเข้าค่ายสภานักเรียนซึ่งมีโทยะเป็นเจ้าภาพที่เฝ้ารอคอยก็เริ่มขึ้น! บ้านพักตากอากาศหรูหราอลังการพร้อมชายหาดส่วนตัว เหล่าสมาชิกสภานักเรียนจึงได้ใช้ช่วงเวลาวัยรุ่นอันเปล่งประกาย เฉกเช่นดอกไม้ไฟในงานเทศกาลหน้าร้อน<br><br>\r\nสถานการณ์โรแมนติกในรีสอร์ตและความพิเศษที่ไม่อาจพบเจอได้ในวันธรรมดาทั่วไป ทำให้คุณอาเรียได้ใจ ผุดรอยยิ้มท้าทาย—<br><br>\r\n“แล้ว? มาซาจิกะคุงจะจูบตรงไหนดีล่ะ”<br><br>\r\nและวางกับดักล่อลวงแสนกระแทกใจจนแทบจะลมจับ!?<br><br>\r\nเรื่องราวเลิฟคอเมดี้วัยใสของหนุ่มหน้ามนกับสาวรัสเซียคนสวย เข้าสู่ภาคปิดเทอมฤดูร้อนสุดระทึกแล้ว!', 'https://www.phoenixnext.com/img/600/1000/resize/catalog/product/_/l/_ln_tokidoki_bosotto_russiago_vol4_jacket_cover_rgb_1_.jpg', 11, 10, '305', '2022-10-10 16:41:05'),
(47, 7, 1, 2, '0000-00-00', '', '9786168105993', 'เกลน เรดัส เป็นอาจารย์พิเศษ\r\nของสถาบันสอนเวทมนตร์แห่งจักรวรรดิอัลซาโน\r\nแต่เริ่มคาบเรียนแรกไม่ทันไรก็งีบหลับ\r\nและปล่อยนักเรียนให้เรียนเอง...\r\nจนเหล่านักเรียนพากันเอือมระอาในความไม่เอาไหน\r\nซิสตินา ฟีเบล นักเรียนดีเด่นของห้อง\r\nรับสภาพไม่ไหวจึงตัดสินใจท้าประลองกับเขา\r\n\r\n\r\n——ผลปรากฏว่าเกลนแพ้ราบคาบ!?\r\n\r\n\r\nแต่อยู่มาวันหนึ่ง เมื่อบรรดานักเรียนถูกคุกคาม\r\nจากเหตุก่อการร้ายที่เกิดขึ้นในสถาบันแบบไม่คาดคิด\r\nเกลนก็ลุกขึ้นประกาศกร้าว “อย่ายุ่งกับนักเรียนของฉัน”\r\nพร้อมกับแสดงพลัง ‘เวทมนตร์’\r\nที่แท้จริงของตนให้เป็นที่ประจักษ์!\r\nเรื่องราวแฟนตาซีแนวใหม่ของฮีโร่ในโรงเรียนเวทมนตร์\r\nได้ฤกษ์เปิดฉากแล้ว ณ บัดนี้!', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/r/o/rokudenashi_comic_v.1_cover.jpg', 2, 10, '115', '2022-10-12 20:16:53'),
(48, 23, 1, 2, '0000-00-00', '', '9786164645615', 'บางครั้ง<br>\r\nสัตว์ประหลาดเหนือจินตนาการ<br>\r\nอันน่าสยดสยอง<br>\r\nและเทียบเคียงได้กับความสิ้นหวัง<br>\r\nจะปรากฏตัวขึ้นยังอีกฟากของเกตนั้น<br><br>\r\n\r\nสิ่งที่รอคอยเหล่าฮันเตอร์อยู่ในดับเบิลดันเจี้ยนนั้นคือ—!', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_mg_solo_leveling_vol1.jpg', 17, 0, '275', '2022-10-12 21:08:55'),
(49, 35, 1, 1, '0000-00-00', '', '9786164647299', 'อิชชิกิ ยู รู้สึกช็อคเพราะถูกแฟนตัวเองนอกใจ<br>\r\nจึงตัดสินใจชวน ซากุระจิมะ โทโกะ แฟนของรุ่นพี่ที่แย่งแฟนตนให้มาเป็นกิ๊กกัน<br>\r\nแล้ว โทโกะ ก็เสนอหนทางวางแผน ‘ล้างแค้น’ อันแสบสัน<br>\r\nกับกลยุทธ์ที่จะทำให้ ยู กลายเป็นผู้ชายสุดป็อปของสาวๆ!?<br><br>\r\n\r\n\"เราต้องทำให้ทั้งสองคนที่นอกใจได้ลิ้มรส ความทรมานราวกับตกนรกไปเลย\"<br><br>\r\n\r\nอะไรจะเกิดขึ้นเมื่อคนสองคนที่ต่างถูกคนรักของตัวเองหักหลังคิดจะเอาคืน!?<br>\r\nเลิฟคอเมดี้สุดแสบสันอันว่าด้วยเรื่องราวของ ความรัก ความแค้น และ NTR!?', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/l/_ln_kanojo_ga_senpai_ni_ntr_vol1_jacket_cover.jpg', 6, 0, '295', '2022-10-12 21:12:39'),
(50, 31, 1, 2, '0000-00-00', '', '9786164642799', 'สาธารณรัฐซันแมกโนเลียถูกจักรวรรดิเกียเดประเทศข้างเคียงส่งจักรกลไร้พลขับ ‘ลีเจี้ยน’ เข้ารุกรานไม่เว้นแต่ละวัน ฝ่ายสาธารณรัฐจึงพัฒนาอาวุธไร้พลขับขึ้นบ้าง และสงครามระหว่างเครื่องจักรกับเครื่องจักรก็ดำเนินต่อเรื่อยมา…แต่นั่นเป็นเพียงเปลือกนอก<br><br>\r\n\r\nแท้จริงแล้วเหล่าเด็กหนุ่มเด็กสาวผู้ถูกขับไล่สู่ ‘เขต 86 ดินแดนไร้ตัวตน’ นอก 85 เขตของสาธารณรัฐ และถูกเรียกอย่างเหยียดหยามว่า ‘เอทตี้ซิกซ์’ จำต้องขึ้นขับจักรกลไร้พลขับ ต่อสู้ในฐานะ ‘จักรกลมีพลขับ’ มาโดยตลอด<br><br>\r\n\r\nเมื่อเลน่า ผู้บัญชาการสาวแห่งกองทัพสาธารณรัฐ ได้พบเด็กหนุ่มนามว่าชิน หัวหน้า ‘หน่วยรบสเปียร์เฮด’ ซึ่งต่อสู้ในแนวหน้าสุดของสมรภูมิ เธอจึงได้รู้ซึ้งถึงชะตากรรมอันแสนโหดร้าย', 'https://www.phoenixnext.com/img/600/744/resize/catalog/product/_/m/_m_86_eighty_six_vol1_jacket.jpg', 9, 0, '145', '2022-10-12 21:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `book_delivery`
--

CREATE TABLE `book_delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_delivery`
--

INSERT INTO `book_delivery` (`delivery_id`, `delivery_name`) VALUES
(1, 'พัสดุไปรษณีย์ธรรมดา'),
(2, 'พัสดุไปรษณีย์ด่วนพิเศษ (EMS)'),
(3, 'ขนส่งเอกชน');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `genres_id` int(11) NOT NULL,
  `genres_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`genres_id`, `genres_name`) VALUES
(1, 'Romance'),
(2, 'School'),
(3, 'Action '),
(4, 'Fantasy'),
(5, 'Mystery'),
(6, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `book_rate`
--

CREATE TABLE `book_rate` (
  `rate_id` int(11) NOT NULL,
  `rate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_rate`
--

INSERT INTO `book_rate` (`rate_id`, `rate_name`) VALUES
(1, 'ทั่วไป'),
(2, '13+'),
(3, '15+');

-- --------------------------------------------------------

--
-- Table structure for table `book_release`
--

CREATE TABLE `book_release` (
  `release_id` int(11) NOT NULL,
  `release_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_release`
--

INSERT INTO `book_release` (`release_id`, `release_year`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018'),
(4, '2019'),
(5, '2020'),
(6, '2021'),
(7, '2022'),
(8, '2015'),
(9, '2014');

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `book_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`type_id`, `type_name`, `book_type_name`) VALUES
(1, 'Light Novel', '(LN)'),
(2, 'Manga', '(MG)'),
(3, 'Novel', '(N)');

-- --------------------------------------------------------

--
-- Table structure for table `book_volume`
--

CREATE TABLE `book_volume` (
  `volume_id` int(11) NOT NULL,
  `volume_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_volume`
--

INSERT INTO `book_volume` (`volume_id`, `volume_name`) VALUES
(1, 'เล่ม 1'),
(2, 'เล่ม 2'),
(3, 'เล่ม 3'),
(4, 'เล่ม 4'),
(5, 'เล่ม 5'),
(6, 'เล่ม 6'),
(7, 'เล่ม 7'),
(8, 'เล่ม 8'),
(9, 'เล่ม 9'),
(10, 'เล่ม 10'),
(11, 'เล่ม 11'),
(12, 'เล่ม 12'),
(13, 'เล่ม 13'),
(14, 'เล่ม 14'),
(15, 'เล่ม 15'),
(16, 'เล่ม 16'),
(17, 'เล่ม 17'),
(18, 'เล่ม 18'),
(19, 'เล่ม 19'),
(20, 'เล่ม 20');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carousel_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `carousel_img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carousel_id`, `book_id`, `carousel_img`, `created_at`) VALUES
(1, 35, 'https://www.phoenixnext.com/pub/media/brand/tmp/_LN_Kanojo_NTR_KVEC_1.jpg', '2022-10-08 18:02:32'),
(2, 32, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_Gimai_Vol.3_EC.jpg', '2022-10-08 18:02:53'),
(3, 33, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_Mamahaha_Vol.2_EC.jpg', '2022-10-08 18:02:53'),
(11, 1, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_Tokidoki_Russia_Vol.4_EC.jpg', '2022-10-08 18:27:05'),
(12, 12, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Record_of_Ragnarok_Vol.14_EC.jpg', '2022-10-08 18:33:20'),
(13, 34, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Wind_Breaker_Vol.4_EC.jpg', '2022-10-08 18:54:57'),
(14, 24, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_Musume_Mama_EC.jpg', '2022-10-08 18:54:57'),
(15, 23, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Solo_Vol.4_EC.jpg', '2022-10-08 18:54:57'),
(16, 2, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_Ousama_EC-min.jpg', '2022-10-08 18:54:57'),
(17, 6, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Fufuijo_EC.jpg', '2022-10-08 18:54:57'),
(19, 3, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Spy_Room_EC-min.jpg', '2022-10-08 18:55:20'),
(20, 25, 'https://www.phoenixnext.com/pub/media/banner/tmp/_M_Kyo_wa_Kanojo_EC.jpg', '2022-10-09 03:07:14'),
(21, 31, 'https://www.phoenixnext.com/pub/media/banner/tmp/_LN_86_Vol.9_EC.jpg', '2022-10-09 21:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `allbook_id` int(11) NOT NULL,
  `allbook_qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_id`, `allbook_id`, `allbook_qty`) VALUES
(4, 1, 46, '2'),
(5, 1, 48, '1'),
(6, 1, 49, '2'),
(7, 2, 46, '1'),
(8, 2, 49, '1'),
(9, 3, 9, '1'),
(10, 3, 19, '1'),
(11, 3, 45, '1'),
(12, 4, 47, '1'),
(13, 4, 50, '1'),
(14, 4, 48, '1'),
(15, 4, 49, '1'),
(16, 5, 46, '1'),
(17, 5, 47, '1'),
(18, 6, 45, '1'),
(19, 7, 9, '3'),
(20, 8, 46, '1'),
(21, 8, 19, '1'),
(22, 9, 47, '1'),
(23, 10, 46, '1'),
(24, 11, 9, '2'),
(25, 12, 46, '1'),
(26, 13, 50, '1'),
(27, 14, 9, '1'),
(28, 15, 19, '1'),
(29, 16, 47, '3'),
(30, 17, 46, '2'),
(31, 18, 48, '1'),
(32, 18, 9, '1'),
(33, 18, 49, '1'),
(34, 18, 50, '2'),
(35, 18, 19, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_id`, `user_id`, `address_id`, `delivery_id`, `checkout_id`, `total`, `created_at`) VALUES
(1, 8, 12, 1, 1, '1510', '2022-10-16 16:20:32'),
(2, 8, 13, 2, 3, '635', '2022-10-16 21:06:23'),
(3, 8, 12, 2, 3, '910', '2022-10-16 21:48:41'),
(4, 8, 12, 3, 2, '865', '2022-10-16 23:00:56'),
(5, 6, 14, 1, 1, '455', '2022-10-17 16:10:24'),
(6, 6, 14, 2, 2, '340', '2022-10-17 16:14:40'),
(7, 6, 14, 3, 3, '860', '2022-10-17 16:15:05'),
(8, 7, 15, 2, 1, '635', '2022-10-17 16:23:24'),
(9, 7, 15, 3, 1, '150', '2022-10-17 16:23:53'),
(10, 7, 15, 1, 2, '340', '2022-10-17 16:24:25'),
(11, 1, 16, 3, 2, '585', '2022-10-17 16:28:24'),
(12, 1, 16, 1, 2, '340', '2022-10-17 16:31:01'),
(13, 1, 16, 2, 3, '180', '2022-10-17 16:31:32'),
(14, 3, 17, 1, 2, '310', '2022-10-17 16:33:27'),
(15, 3, 17, 1, 2, '330', '2022-10-17 16:34:07'),
(16, 3, 17, 3, 1, '380', '2022-10-17 16:34:33'),
(17, 3, 17, 1, 2, '645', '2022-10-17 16:34:55'),
(18, 8, 12, 1, 1, '1465', '2022-10-18 15:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_gender` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_birthday`, `user_gender`, `user_email`, `user_password`, `user_role`, `created_at`) VALUES
(1, 'ไก่โต้ง', 'รักเเจ้', '2011-04-15', 3, 'cd2dsd543@gmail.com', '$2y$10$NjeAqMc82zPBBqXHZuFKv.XaWAs0viGAhwsNKvJ5jZOOAW//HWoXK', 'user', '2022-10-14 20:13:43'),
(2, 'สรรพศิริ', 'เดอะบี', '2009-02-15', 1, 'cyvery2544@gmail.com', '$2y$10$0AzQHmHA6dpA1UEWUoWWger.4szqNX10/H2DgCVRWMdM2JcDT1G0W', 'user', '2022-10-15 09:49:45'),
(3, 'test1', 'test1', '2022-10-15', 2, 'cyvery2545@gmail.com', '$2y$10$.kL7B9ThXBgr9OYAohcpluz/JZNL3d76/S6Ts8eyE7vJGR0h.DAei', 'user', '2022-10-15 11:19:59'),
(4, 'test2', 'test1', '2022-10-15', 3, 'cyvery2546@gmail.com', '$2y$10$.SH3ZQ7DoZhYOYD7QBOLHO0/q.izQ6CtKP9sGZaCSmfSlkl8pNZWu', 'user', '2022-10-15 12:52:58'),
(5, 'test3', 'test1', '2022-10-15', 3, 'cyvery2546@gmail.com', '$2y$10$iJAxR88iSxMgYDqzbQIQAuMx/qfCL7R8NwdyFs46Hq.PItxz1NQN2', 'user', '2022-10-15 12:54:04'),
(6, 'test4', 'test1', '2022-10-15', 2, 'test4@gmail.com', '$2y$10$gS2CwO4URSkpWEwG1vqdy.6XD1CvSfzwp49sZbnrr9Uf4sheaMA2K', 'user', '2022-10-15 13:00:42'),
(7, 'test5', 'test1', '2022-10-15', 2, 'test5@gmail.com', '$2y$10$YbstHB396FoHqeGv6MtdruVLTysWJ.pNQEsL9r1oNsSpaFF0l3GSS', 'user', '2022-10-15 13:01:29'),
(8, 'จอม', 'เดอะซี', '1998-01-07', 1, 'test7@gmail.com', '$2y$10$j3UpK/N.hCv2sxue9b4DHuTTZuasCALMtMqofHaQIS3ulRhdPtfZW', 'user', '2022-10-15 13:02:03'),
(9, 'พนมวัสส์', 'ศรีสังข์', '2000-12-08', 1, 'cyvery2543@gmail.com', '$2y$10$Q/7tu/qtsHKwUM9d2A55z.3JjV82ACs4UwiE.BJdJjGz2HPcKO4vC', 'admin', '2022-10-17 16:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_postcode` varchar(255) NOT NULL,
  `user_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_province` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `user_address`, `user_postcode`, `user_district`, `user_province`, `user_country`, `user_phone`, `created_at`) VALUES
(12, 8, '107/85', '10530', 'หนอกจอก', 'BANGKOK', 'ไทย', '0800539193', '2022-10-16 11:54:32'),
(13, 8, '107/85', '10530', 'มีนบุรี', 'BANGKOK', 'ไทย', '0800539193', '2022-10-16 11:54:36'),
(14, 6, '107/85', '10530', 'ศรีราชา', 'ชลบุรี', 'ไทย', '0800810185', '2022-10-17 16:09:56'),
(15, 7, '107/85', '10530', 'หนอกจอก', 'BANGKOK', 'ไทย', '0800539193', '2022-10-17 16:23:02'),
(16, 1, '107/85', '10530', 'หนอกจอก', 'BANGKOK', 'ไทย', '0800539193', '2022-10-17 16:25:21'),
(17, 3, '107/85', '10530', 'ศรีราชา', 'BANGKOK', 'ไทย', '0800539193', '2022-10-17 16:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_checkout`
--

CREATE TABLE `user_checkout` (
  `checkout_id` int(11) NOT NULL,
  `checkout_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_checkout`
--

INSERT INTO `user_checkout` (`checkout_id`, `checkout_name`) VALUES
(1, 'PromptPay QR'),
(2, 'บัตรเครดิต / บัตรเดบิต / We Card'),
(3, 'ชำระผ่าน QR Code');

-- --------------------------------------------------------

--
-- Table structure for table `user_gender`
--

CREATE TABLE `user_gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_gender`
--

INSERT INTO `user_gender` (`gender_id`, `gender_name`) VALUES
(1, 'ชาย'),
(2, 'หญิง'),
(3, 'อื่นๆ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allbooklist`
--
ALTER TABLE `allbooklist`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_rate` (`book_rate`),
  ADD KEY `book_release` (`book_release`);

--
-- Indexes for table `allbooklist_volume`
--
ALTER TABLE `allbooklist_volume`
  ADD PRIMARY KEY (`allbook_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `volume_id` (`volume_id`);

--
-- Indexes for table `book_delivery`
--
ALTER TABLE `book_delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`genres_id`);

--
-- Indexes for table `book_rate`
--
ALTER TABLE `book_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `book_release`
--
ALTER TABLE `book_release`
  ADD PRIMARY KEY (`release_id`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `book_volume`
--
ALTER TABLE `book_volume`
  ADD PRIMARY KEY (`volume_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carousel_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `allbook_id` (`allbook_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `checkout_id` (`checkout_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_gender` (`user_gender`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_checkout`
--
ALTER TABLE `user_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `user_gender`
--
ALTER TABLE `user_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allbooklist`
--
ALTER TABLE `allbooklist`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `allbooklist_volume`
--
ALTER TABLE `allbooklist_volume`
  MODIFY `allbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `book_delivery`
--
ALTER TABLE `book_delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_genres`
--
ALTER TABLE `book_genres`
  MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_rate`
--
ALTER TABLE `book_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_release`
--
ALTER TABLE `book_release`
  MODIFY `release_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_volume`
--
ALTER TABLE `book_volume`
  MODIFY `volume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carousel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_user`
--
ALTER TABLE `order_user`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_checkout`
--
ALTER TABLE `user_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_gender`
--
ALTER TABLE `user_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allbooklist`
--
ALTER TABLE `allbooklist`
  ADD CONSTRAINT `allbooklist_ibfk_1` FOREIGN KEY (`book_rate`) REFERENCES `book_rate` (`rate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `allbooklist_ibfk_2` FOREIGN KEY (`book_release`) REFERENCES `book_release` (`release_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `allbooklist_volume`
--
ALTER TABLE `allbooklist_volume`
  ADD CONSTRAINT `allbooklist_volume_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `allbooklist` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `allbooklist_volume_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `book_type` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `allbooklist_volume_ibfk_3` FOREIGN KEY (`volume_id`) REFERENCES `book_volume` (`volume_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carousel`
--
ALTER TABLE `carousel`
  ADD CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `allbooklist` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_user` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`allbook_id`) REFERENCES `allbooklist_volume` (`allbook_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_user_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `user_address` (`address_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_user_ibfk_3` FOREIGN KEY (`delivery_id`) REFERENCES `book_delivery` (`delivery_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_user_ibfk_4` FOREIGN KEY (`checkout_id`) REFERENCES `user_checkout` (`checkout_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_gender`) REFERENCES `user_gender` (`gender_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
