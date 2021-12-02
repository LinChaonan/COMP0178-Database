-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2021-12-02 16:29:51
-- 服务器版本： 5.7.34
-- PHP 版本： 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `auction_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(12) NOT NULL,
  `item_id` int(11) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `name` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `final_price` varchar(100) NOT NULL,
  `buyer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `recommendation` varchar(100) DEFAULT NULL,
  `previous_bid` varchar(100) DEFAULT NULL,
  `current_bid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `user_id`, `recommendation`, `previous_bid`, `current_bid`) VALUES
(1, 1, NULL, '1', '2'),
(2, 2, NULL, '3', '4');

-- --------------------------------------------------------

--
-- 表的结构 `historical_auction_price`
--

CREATE TABLE `historical_auction_price` (
  `auction_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bid_price` varchar(100) NOT NULL,
  `bid_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `historical_auction_price`
--

INSERT INTO `historical_auction_price` (`auction_id`, `item_id`, `user_id`, `bid_price`, `bid_time`) VALUES
(1, 1, 3, '230', NULL),
(2, 1, 4, '250', NULL),
(3, 1, 5, '260', NULL),
(4, 1, 6, '300', NULL),
(5, 1, 7, '400', NULL),
(6, 1, 8, '299', NULL),
(7, 2, 3, '300', NULL),
(8, 3, 4, '500', NULL),
(9, 4, 5, '600', NULL),
(10, 2, 6, '700', '2021-12-01 17:56:19.000000'),
(11, 3, 7, '800', '2021-12-01 18:00:11.000000'),
(12, 4, 8, '900', '2021-12-01 18:23:36.000000'),
(13, 5, 7, '2', '2021-12-01 18:29:42.000000'),
(14, 6, 6, '300', '2021-12-01 18:30:46.000000'),
(15, 7, 5, '901', '2021-12-01 18:32:37.000000');

-- --------------------------------------------------------

--
-- 表的结构 `image`
--

CREATE TABLE `image` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `image`
--

INSERT INTO `image` (`id`, `name`, `path`, `time`) VALUES
(1, '1.png', './images/1.png', '2021-12-02 14:57:12'),
(2, '2.png', './images/2.png', '2021-12-02 14:59:22'),
(3, '3.png', './images/3.png', '2021-12-02 15:00:32'),
(4, '4.png', './images/4.png', '2021-12-02 15:30:16'),
(5, '5.png', './images/5.png', '2021-12-02 16:22:06'),
(6, '6.png', './images/6.png', '2021-12-02 16:22:06'),
(7, '7.png', './images/7.png', '2021-12-02 16:22:06'),
(8, '8.png', './images/8.png', '2021-12-02 16:22:06'),
(9, '9.png', './images/9.png', '2021-12-02 16:22:06'),
(10, '10.png', './images/10.png', '2021-12-02 16:22:06'),
(11, '11.png', './images/11.png', '2021-12-02 16:22:06'),
(12, '12.png', './images/12.png', '2021-12-02 16:22:06'),
(13, '13.png', './images/13.png', '2021-12-02 16:22:06'),
(14, '14.png', './images/14.png', '2021-12-02 16:22:06'),
(15, '15.png', './images/15.png', '2021-12-02 16:22:06'),
(16, '16.png', './images/16.png', '2021-12-02 16:22:06'),
(17, '17.png', './images/17.png', '2021-12-02 16:22:06'),
(18, '18.png', './images/18.png', '2021-12-02 16:22:06'),
(19, '19.png', './images/19.png', '2021-12-02 16:22:06'),
(20, '20.png', './images/20.png', '2021-12-02 16:22:06'),
(21, '21.png', './images/21.png', '2021-12-02 16:22:06'),
(22, '22.png', './images/22.png', '2021-12-02 16:22:06'),
(23, '23.png', './images/23.png', '2021-12-02 16:22:06'),
(24, '24.png', './images/24.png', '2021-12-02 16:22:06'),
(25, '25.png', './images/25.png', '2021-12-02 16:22:06'),
(26, '26.png', './images/26.png', '2021-12-02 16:22:06'),
(27, '27.png', './images/27.png', '2021-12-02 16:22:06'),
(28, '28.png', './images/28.png', '2021-12-02 16:22:06'),
(29, '29.png', './images/29.png', '2021-12-02 16:22:06'),
(30, '30.png', './images/30.png', '2021-12-02 16:22:06'),
(31, '31.png', './images/31.png', '2021-12-02 16:22:06'),
(32, '32.png', './images/32.png', '2021-12-02 16:22:06'),
(33, '33.png', './images/33.png', '2021-12-02 16:22:06'),
(34, '34.png', './images/34.png', '2021-12-02 16:22:06'),
(35, '35.png', './images/35.png', '2021-12-02 16:22:06'),
(36, '36.png', './images/36.png', '2021-12-02 16:22:06'),
(37, '37.png', './images/37.png', '2021-12-02 16:22:06'),
(38, '38.png', './images/38.png', '2021-12-02 16:22:06'),
(39, '39.png', './images/39.png', '2021-12-02 16:22:06'),
(40, '40.png', './images/40.png', '2021-12-02 16:22:06');

-- --------------------------------------------------------

--
-- 表的结构 `item`
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `quantity` int(10) DEFAULT '1',
  `start_price` varchar(100) NOT NULL,
  `reserve_price` varchar(100) DEFAULT NULL,
  `current_price` varchar(100) DEFAULT NULL,
  `num_bids` int(100) NOT NULL DEFAULT '0',
  `final_price` varchar(100) DEFAULT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`item_id`, `seller_id`, `category`, `status`, `title`, `description`, `quantity`, `start_price`, `reserve_price`, `current_price`, `num_bids`, `final_price`, `buyer_id`, `end_date`) VALUES
(1, 1, 'electronics', '0', 'iPhone 13 Pro', 'Up to 28 hours of video playback. IPhone 13 Pro Max has the best battery life ever on iPhone.', 1, '750', '700', '720', 12, NULL, 2, '2022-02-28 19:39:30'),
(2, 1, 'electronics', '1', 'MacBook Air', 'Apple M1 chip with 8‑core CPU, 8‑core GPU, and 16‑core Neural Engine\r\n8GB unified memory\r\n512GB SSD storage¹\r\nRetina display with True Tone\r\nMagic Keyboard\r\nTouch ID\r\nForce Touch trackpad\r\nTwo Thunderbolt / USB 4 ports', 1, '350', '300', '320', 5, NULL, 2, '2022-04-14 10:39:27'),
(3, 1, 'electronics', '1', 'Apple iPad Air 10.9', 'All-screen design with a 10.9-inch Liquid Retina display featuring True Tone and P3 wide color.\r\n\r\n12MP back camera with Focus Pixels and 7MP FaceTime HD camera with improved low-light performance.\r\n\r\nCompatible with Magic Keyboard and Smart Keyboard Folio.', 1, '250', '200', '210', 8, NULL, 2, '2022-03-24 10:39:29'),
(4, 1, 'electronics', '0', 'AirPods (3nd generation)', 'Quick access to Siri by saying ”Hey Siri“\r\n\r\nMore than 24 hours total listening time with the Charging Case\r\n\r\nEffortless setup, in-ear detection, and automatic switching for a magical experience\r\n\r\nEasily share audio between two sets of AirPods on your iPhone, iPad, iPod touch, or Apple TV', 1, '65', '60', '63', 1, NULL, 2, '2022-04-06 10:55:00'),
(5, 1, 'electronics', '1', 'Pro Display XDR', 'Pro Display XDR\r\n\r\n32-inch Retina 6K. Astonishing color accuracy. And Extreme Dynamic Range.', 1, '1500', '1200', '1300', 0, NULL, NULL, '2022-05-11 10:07:00'),
(6, 1, 'electronics', '0', 'Apple Watch Series 7', 'The aluminum case is lightweight and made from 100 percent recycled aerospace-grade alloy.\r\n\r\nThe Leather Link is made from handcrafted Roux Granada leather with no clasps or buckles, and has embedded magnets for a secure and adjustable fit.', 1, '85', '75', '83', 0, NULL, NULL, '2022-05-31 19:36:00'),
(7, 1, 'electronics', '1', 'AirPods Max', 'High-Fidelity Audio The Apple-designed driver delivers high-fidelity playback with ultra-low distortion across the entire audible range.', 1, '150', '120', '130', 0, NULL, NULL, '2022-05-24 19:37:00'),
(8, 1, 'electronics', '1', 'USB-C to MagSafe 3 Cable (2m)', 'This 2-metre charge cable features a magnetic MagSafe 3 connector that helps guide the plug to the power port of your MacBook Pro. Pair it with a compatible USB-C power adapter to conveniently charge your MacBook Pro from a power point and take advantage of fast-charging capabilities. The magnetic connection is strong enough to resist most unintended disconnects, but if someone trips on the cable, it releases so your MacBook Pro stays put. An LED turns amber when the battery is charging and green when it’s fully charged. Made with a woven design for long-lasting durability.\r\n', 1, '10', '5', '8', 0, NULL, NULL, '2022-01-26 19:38:00'),
(9, 1, 'electronics', '0', 'Magic Mouse', 'Magic Mouse is wireless and rechargeable, with an optimised foot design that lets it glide smoothly across your desk. The Multi-Touch surface allows you to perform simple gestures such as swiping between web pages and scrolling through documents.', 1, '25', '20', '23', 0, NULL, NULL, '2022-01-31 20:38:00'),
(10, 1, 'jewellery', '1', 'Pandora ME Lucky Bottle Cap Ring Set', 'Pandora ME Metal; Sterling silver, 14k Rose gold-plated; unique metal blend Stone; Cubic Zirconia; Purple; Rings; NAMPS0099;', 1, '45', '35', '41', 0, NULL, NULL, '2021-12-30 15:29:00'),
(11, 1, 'books', '1', 'Big Shot (Diary of a Wimpy Kid Book 16)', 'After a disastrous field day competition at school, Greg decides that when it comes to his athletic career, he\'s officially retired. But after his mom urges him to give sports one more chance, he reluctantly agrees to sign up for basketball. Tryouts are a mess, and Greg is sure he won\'t make the cut. But he unexpectedly lands a spot on the worst team......', 1, '11', '6', '8', 0, NULL, NULL, '2022-04-22 10:27:19'),
(12, 1, 'books', '1', 'Go Tell the Bees That I Am Gone', 'New York Times bestselling author Diana Gabaldon returns with the newest novel in the epic Outlander series. The past may seem the safest place to be . . . but it is the most dangerous time to be alive. . . . Jamie Fraser and Claire Randall were torn apart by the Jacobite Rising in 1746, and it took them twenty years to find each other again. Now the American Revolution threatens to do the same. It is 1779 and Claire and Jamie are at last reunited... ', 1, '7', '5', '6', 0, NULL, NULL, '2022-01-13 19:32:00'),
(13, 2, 'jewellery', '1', 'Pandora ME Happy Smiley Face Ring Set', 'Keep on smiling! This super cute ring set features the most adorable smiley face emoji we\'ve ever seen. Wear it with any look to remind yourself to always keep smiling.', 1, '60', '50', '55', 0, NULL, NULL, '2022-02-09 17:18:00'),
(14, 1, 'electronics', '0', 'AirTag', 'AirTag is an easy way to keep track of your stuff. Attach one to your keys, slip another one in your backpack. And just like that, they’re on your radar in the Find My app. AirTag has your back.', 1, '15', '10', '12', 0, NULL, NULL, '2022-03-03 10:43:01'),
(15, 1, 'art_works', '0', 'Joshua Tree Wall Art', 'Turn your favorite photos into works of art and make your home your gallery. Create a canvas piece for yourself or make a gift for a loved one to enjoy every day.', 1, '85', '75', '79', 0, NULL, NULL, '2021-12-31 19:59:00'),
(16, 5, 'art_works', '1', 'Countryside Portrait Wall Art', 'Achieve a unique look with rustic wood wall art. The photo is printed directly on the wood, allowing the natural grain to shine through. Create an heirloom-worthy piece for yourself or make a one-of-a-kind gift for someone special.', 1, '55', '45', '50', 0, NULL, NULL, '2022-01-05 15:09:00'),
(17, 5, 'art_works', '1', 'Milton Owl Art', 'Each canvas depicts a half-view that together create a striking statement in a dining room, living room, or great room. They may also be hung alone. High-quality giclee prints with a knife gel textured finish for the feel of an original work.\r\n\r\nHigh-quality giclee print diptych on stretched canvas\r\n\r\nReady to hang using affixed D-rings\r\n\r\nMade in USA\r\n\r\nA Grandin Road exclusive', 1, '55', '45', '35', 0, NULL, NULL, '2021-12-30 16:14:00'),
(18, 2, 'art_works', '0', 'Time - 9 Piece Picture Frame Photograph Set', 'This artist has been a World-renowned Art Photographer for the last 25 years. Her timeless art pieces capture nature\'s beauty forever; each piece reflects the creativity and art skills that were developed in years of dedication. To make sure she is capturing the most amazing moments, she carefully choses the photography spots and sometimes waited for hours for the perfect light. ', 1, '25', '15', '21', 0, NULL, NULL, '2022-06-03 10:07:19'),
(19, 2, 'jewellery', '1', 'Celestial Moon & Stars Ring Set', 'Pandora Moments Metal;\r\nSterling silver Stone;  \r\nCubic Zirconia;\r\nClear;  \r\nNature and Celestial;\r\nRings;\r\nNAMPS0015', 1, '45', '35', '42', 0, NULL, NULL, '2022-03-10 18:18:00'),
(20, 2, 'jewellery', '0', 'Lots of Love and Sparkle Stacking Ring Set', 'Rose, on rose, on rose and a whole lotta sparkle! This rose gold-plated ring set is absolutely fabulous. Wear it as a ring stack all on one finger or wear one on each finger. Either way, this ring set is sure to slay!', 1, '100', '80', '85', 0, NULL, NULL, '2022-06-02 18:18:00'),
(21, 2, 'jewellery', '1', 'True Bleu Halo Wishbone Stacking Ring Set', 'Pandora Timeless Metal；\r\nSterling silver Stone； \r\nCubic Zirconia； \r\nBlue;\r\nRings;\r\nNAMPS0113;', 1, '75', '60', '65', 1, NULL, 2, '2022-02-17 18:30:00'),
(22, 1, 'jewellery', '0', 'Pandora Moments Heart Clasp Snake Chain Bracelet', 'Set your heart a-flutter with this romantic version of Pandora\'s bestselling charm bracelet. Hand-finished with a heart-shaped clasp, this sterling silver snake chain bracelet looks stunning on its own but even better adorned with your favorite Pandora charms and clips. Layer it with contrasting Pandora chain bracelets for a chic, multi-layered look.', 1, '45', '35', '42', 5, NULL, 2, '2022-06-23 10:39:27'),
(23, 1, 'art_works', '0', 'Cardinal On Gatepost by The Macneil Studio - Wrapped Canvas Print', 'Empty entryway wall? Some spare space in the master suite? A boring bathroom? Wall art instantly turns any blank area into an eye-catching display, all while lending statement-making appeal to your abode. Just take a look at this piece for example: Made in the USA, this acrylic paint piece is printed on wrapped canvas, bringing a winter wonderland right into your home. Perfect for any bare wall in your abode, this piece adds a pop of color to your space.\r\n', 1, '43', '35', '42', 0, NULL, NULL, '2022-07-06 19:36:00'),
(24, 1, 'art_works', '0', 'Excited by Marmont Hill - Picture Frame Textual Art', 'Arrives ready to hang\r\nHand cut deckled edges\r\nIncludes a certificate of authenticity\r\nHigh quality durable non-warping frame', 1, '45', '40', '41', 0, NULL, NULL, '2022-07-07 10:07:00'),
(25, 2, 'jewellery', '0', 'Letter A Initial Necklace Set', 'Customize your very own initial necklace with the letter charm of your choice. Shop all letter charms to personalize this necklace as a gift for friends and family you adore.', 1, '45', '35', '41', 0, NULL, NULL, '2022-09-22 18:18:00'),
(26, 5, 'art_works', '1', 'Let\'s Get Shower by Parvez Taj - on Canvas', 'A portrait of a darkly detailed dog in a pink shower cap during bath time. This adorable depiction of a clean pooch will melt your heart and liven up your washroom. Proudly made in the USA, this piece is printed on canvas before it’s stretched over non-warping wooden bars for a gallery-wrapped look. With wall-mounting hooks included, this artful accent is ready to hang up as soon as it reaches your front door.\r\n', 1, '25', '20', '23', 0, NULL, NULL, '2022-10-12 19:09:00'),
(27, 2, 'art_works', '0', 'Flamingo by Brooke Witt - Unframed Graphic Art', 'Express your artistic side and transform your interior space into a living work of art with this stunning museum-quality print. Created and curated to provide the perfect focal point or unifying feature to bring to life any room with style. We love it paired with a complementing color palette or hung in clever spaces for a distinct statement that is uniquely you', 1, '15', '10', '14', 0, NULL, NULL, '2022-11-23 18:18:00'),
(28, 5, 'art_works', '0', 'Desert Sunrise Wall Art', 'Digital printing on true artist white poly-cotton canvas with excellent archival properties, featuring a matte finish\r\n\r\nHigh quality, gallery-wrapped edges\r\n\r\nFor all sizes, except 30x40 and 36x36, canvas depth is 1 1/2\" and frame depth is 2\". For 30x40 & 36x36 sizes, canvas depth is 1 1/4\" and frame depth is 1 3/4\"\r\n\r\nFrames available in black, brown, white, rustic, natural, gold, and metallic luxe\r\nIncludes metal sawtooth hanger for easy hanging\r\n\r\nMade in USA with imported components. Personalized in USA', 1, '55', '45', '48', 0, NULL, NULL, '2021-12-30 16:19:00'),
(29, 5, 'art_works', '1', 'Antique Black And White Botanical IV - 2 Piece Picture Frame Painting Set on Canvas', 'Each wall art is joined and assembled by hand and comes ready to hang. Framed ready to hang made in the USA solid wood.', 1, '45', '40', '43', 0, NULL, NULL, '2021-12-30 16:14:00'),
(30, 1, 'art_works', '1', 'Les Palmiers I by Vincent Van Gogh - 2 Piece Picture Frame Print Set', 'Featuring two premium giclee canvas prints in a solid wood rough-hewn frame. Each piece is designed to last for generations solid wood frame 2’’ beveled matt board at a time premium giclee print ready to hang.', 1, '12', '10', '11', 0, NULL, NULL, '2028-05-01 16:14:00'),
(31, 2, 'homes', '1', 'Linenspa Essentials 5-inch ActiveRelief Gel Memory Foam Mattress', 'Get the comfort you seek with this 5-inch gel memory foam mattress. The mattress features a comfort layer of pressure-relieving, gel-infused memory foam at the surface. Beneath the comfort layer is a thick, high-density layer of SupportRight comfort foam to provide the support you need while improving comfort. ', 1, '65', '55', '63', 0, NULL, NULL, '2030-06-12 16:14:00'),
(32, 5, 'homes', '1', 'Mervynn Mid-Century Modern Button Tufted Fabric Recliner by Christopher Knight Home', 'MID-CENTURY MODERN: Blending together iconic tapered legs with a smooth upholstery, our recliner offers a mid-century look to your lounge space. With its clean lines and understated look, this chair uses new materials to reimagine a traditional design.', 1, '250', '200', '230', 0, NULL, NULL, '2030-07-16 16:14:00'),
(33, 1, 'homes', '1', 'Copper Grove Muir Fabric Wingback Club Chair Recliner', 'CONTEMPORARY DESIGN: Featuring smooth upholstery and tonal piping, our pushback recliner offers the look, feel, and design of a truly contemporary piece. With a minimalistic yet refined structure, this chair brings out a simplistic style that emphasizes comfort and functionality. ', 1, '230', '180', '200', 0, NULL, NULL, '2031-09-10 19:14:00'),
(34, 5, 'homes', '1', 'Carbon Loft Prusiner Industrial Counter Stool ', 'Ideal for urban spaces, these Prusiner stools are sleek, sturdy, and stylish. The powder-coated steel sled legs are paired with a bucket seat for lasting comfort. Choose from five faux-leather upholstery colors to complement your industrial decor.', 1, '220', '170', '210', 0, NULL, NULL, '2032-09-14 19:14:00'),
(35, 2, 'homes', '1', 'Citico Counter Height Laminated Faux Marble 5-piece Dining Set', 'With a scale appropriate for any number of smaller dining spaces, the Citico Collection will provide the look and style you want in your home. The transitional feel of the group comes from the richly hued faux marble table top and the minimalistic design of the dark brown bi-cast vinyl chairs. ', 1, '180', '150', '160', 0, NULL, NULL, '2033-11-14 19:14:00'),
(36, 1, 'homes', '1', 'Simple Living Baxter Table with Storage Ottomans 5-piece Dining Set', 'The ultimate space-saver, this five-piece dining set is ideal for small dining areas. Four ottoman benches store beneath the table for a crisp, seamless look. The seats remove from the top of the ottomans to reveal storage space, letting you save even more space by storing belongings there.', 1, '200', '150', '160', 0, NULL, NULL, '2033-10-14 19:14:00'),
(37, 1, 'homes', '1', 'Mobile Furniture Eva-KBL Electric Fireplace Modern 71-inch TV Stand', 'House your TV, media supplies, and more with this TV stand from Mobile Furniture. This combination entertainment center includes a built-in electric fireplace insert with a remote to control the heat, flame color, and more. Choose from a glossy white, black, or grey finish to fin your space.\r\n', 1, '400', '350', '380', 0, NULL, NULL, '2035-10-01 10:14:00'),
(38, 1, 'homes', '1', 'Copper Grove Puff Island Natural Breakfast Bar Kitchen Cart', 'Take a moment with your coffee alone in the quiet morning, with this charming kitchen cart with breakfast bar is constructed of solid hardwoods in a natural finish. Features include two storage cabinets with raised panel doors, four storage drawers on metal glides, a spice rack, towel bar and caster wheels.', 1, '380', '320', '330', 0, NULL, NULL, '2035-10-11 19:14:00'),
(39, 1, 'homes', '1', 'Hathaway Dynasty 54-inch Foosball Table', 'The Dynasty 54-in Foosball table is guaranteed to bring hours of recreational fun and playful competition right into the comfort of your home. This table is perfect for players of all ages. The cabinet is constructed from durable CARB certified MDF material and supported by 4 sturdy L-shaped legs with 4-in adjustable leg levelers to keep your table balanced on any surface.', 1, '220', '200', '210', 0, NULL, NULL, '2035-11-11 19:15:00'),
(40, 1, 'homes', '1', 'Carson Carrington Blaney Solid Wood Spindle Platform Bed', 'Add retro charm to your bedroom decor with this stylish platform bed. The bed is crafted from solid pine wood, available in a variety of finishes, and features a platform base with recessed slat supports to hold your mattress without the need for a box spring. ', 1, '400', '350', '360', 0, NULL, NULL, '2035-01-01 19:15:00');

-- --------------------------------------------------------

--
-- 表的结构 `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) NOT NULL,
  `total_revenue` varchar(12) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bank_detail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `account_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `bank_detail`, `address`, `phone`, `account_type`) VALUES
(1, 'buyer1@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(2, 'seller1@gmail.com', '12345678', NULL, NULL, NULL, 'seller'),
(3, 'l18252084368@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(4, 'zhouyingbo14@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(5, 'zuanw416hl6@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(6, 'suo1906708147@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(7, 'yiting_cao@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(8, 'diancibo0@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(9, 'cao36670696@gmail.com', '12345678', NULL, NULL, NULL, 'seller'),
(10, 'zhouyingbo2000@gmail.com', '12345678', NULL, NULL, NULL, 'seller');

-- --------------------------------------------------------

--
-- 表的结构 `watch_list`
--

CREATE TABLE `watch_list` (
  `watch_id` int(20) NOT NULL,
  `item_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `watch_list`
--

INSERT INTO `watch_list` (`watch_id`, `item_id`, `user_id`) VALUES
(16, 2, 1),
(17, 3, 1),
(18, 4, 1),
(20, 1, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`);

--
-- 表的索引 `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- 表的索引 `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  ADD PRIMARY KEY (`auction_id`);

--
-- 表的索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- 表的索引 `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 表的索引 `watch_list`
--
ALTER TABLE `watch_list`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  MODIFY `auction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用表AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用表AUTO_INCREMENT `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `watch_list`
--
ALTER TABLE `watch_list`
  MODIFY `watch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
