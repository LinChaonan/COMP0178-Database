-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 19, 2021 at 03:17 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_system`
--
CREATE DATABASE IF NOT EXISTS `auction_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auction_system`;

-- --------------------------------------------------------

--
-- Table structure for table `historical_auction_price`
--

CREATE TABLE `historical_auction_price` (
  `auction_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bid_price` varchar(100) NOT NULL,
  `bid_time` datetime(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `item_id`, `name`, `path`, `time`) VALUES
(1, 1, '1.png', './images/1.png', '2021-12-02 14:57:12'),
(2, 2, '2.png', './images/2.png', '2021-12-02 14:59:22'),
(3, 3, '3.png', './images/3.png', '2021-12-02 15:00:32'),
(4, 4, '4.png', './images/4.png', '2021-12-02 15:30:16'),
(5, 5, '5.png', './images/5.png', '2021-12-02 16:22:06'),
(6, 6, '6.png', './images/6.png', '2021-12-02 16:22:06'),
(7, 7, '7.png', './images/7.png', '2021-12-02 16:22:06'),
(8, 8, '8.png', './images/8.png', '2021-12-02 16:22:06'),
(9, 9, '9.png', './images/9.png', '2021-12-02 16:22:06'),
(10, 10, '10.png', './images/10.png', '2021-12-02 16:22:06'),
(11, 11, '11.png', './images/11.png', '2021-12-02 16:22:06'),
(12, 12, '12.png', './images/12.png', '2021-12-02 16:22:06'),
(13, 13, '13.png', './images/13.png', '2021-12-02 16:22:06'),
(14, 14, '14.png', './images/14.png', '2021-12-02 16:22:06'),
(15, 15, '15.png', './images/15.png', '2021-12-02 16:22:06'),
(16, 16, '16.png', './images/16.png', '2021-12-02 16:22:06'),
(17, 17, '17.png', './images/17.png', '2021-12-02 16:22:06'),
(18, 18, '18.png', './images/18.png', '2021-12-02 16:22:06'),
(19, 19, '19.png', './images/19.png', '2021-12-02 16:22:06'),
(20, 20, '20.png', './images/20.png', '2021-12-02 16:22:06'),
(21, 21, '21.png', './images/21.png', '2021-12-02 16:22:06'),
(22, 22, '22.png', './images/22.png', '2021-12-02 16:22:06'),
(23, 23, '23.png', './images/23.png', '2021-12-02 16:22:06'),
(24, 24, '24.png', './images/24.png', '2021-12-02 16:22:06'),
(25, 25, '25.png', './images/25.png', '2021-12-02 16:22:06'),
(26, 26, '26.png', './images/26.png', '2021-12-02 16:22:06'),
(27, 27, '27.png', './images/27.png', '2021-12-02 16:22:06'),
(28, 28, '28.png', './images/28.png', '2021-12-02 16:22:06'),
(29, 29, '29.png', './images/29.png', '2021-12-02 16:22:06'),
(30, 30, '30.png', './images/30.png', '2021-12-02 16:22:06'),
(31, 31, '31.png', './images/31.png', '2021-12-02 16:22:06'),
(32, 32, '32.png', './images/32.png', '2021-12-02 16:22:06'),
(33, 33, '33.png', './images/33.png', '2021-12-02 16:22:06'),
(34, 34, '34.png', './images/34.png', '2021-12-02 16:22:06'),
(35, 35, '35.png', './images/35.png', '2021-12-02 16:22:06'),
(36, 36, '36.png', './images/36.png', '2021-12-02 16:22:06'),
(37, 37, '37.png', './images/37.png', '2021-12-02 16:22:06'),
(38, 38, '38.png', './images/38.png', '2021-12-02 16:22:06'),
(39, 39, '39.png', './images/39.png', '2021-12-02 16:22:06'),
(40, 40, '40.png', './images/40.png', '2021-12-02 16:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `revenue` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `start_price` varchar(100) NOT NULL,
  `reserve_price` varchar(100) DEFAULT NULL,
  `current_price` varchar(100) DEFAULT NULL,
  `num_bids` int(100) NOT NULL DEFAULT '0',
  `buyer_id` int(10) DEFAULT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `seller_id`, `category`, `status`, `title`, `description`, `start_price`, `reserve_price`, `current_price`, `num_bids`, `buyer_id`, `end_date`) VALUES
(1, 5, 'electronics', '0', 'iPhone 13 Pro', 'Up to 28 hours of video playback. IPhone 13 Pro Max has the best battery life ever on iPhone.', '750', '800', '750', 0, NULL, '2022-02-28 19:39:30'),
(2, 5, 'electronics', '0', 'MacBook Air', 'Apple M1 chip with 8‑core CPU, 8‑core GPU, and 16‑core Neural Engine\r\n8GB unified memory\r\n512GB SSD storage¹\r\nRetina display with True Tone\r\nMagic Keyboard\r\nTouch ID\r\nForce Touch trackpad\r\nTwo Thunderbolt / USB 4 ports', '350', '400', '350', 0, NULL, '2022-04-14 10:39:27'),
(3, 5, 'electronics', '0', 'Apple iPad Air 10.9', 'All-screen design with a 10.9-inch Liquid Retina display featuring True Tone and P3 wide color.\r\n\r\n12MP back camera with Focus Pixels and 7MP FaceTime HD camera with improved low-light performance.\r\n\r\nCompatible with Magic Keyboard and Smart Keyboard Folio.', '250', '300', '250', 0, NULL, '2022-03-24 10:39:29'),
(4, 5, 'electronics', '0', 'AirPods (3nd generation)', 'Quick access to Siri by saying ”Hey Siri“\r\n\r\nMore than 24 hours total listening time with the Charging Case\r\n\r\nEffortless setup, in-ear detection, and automatic switching for a magical experience\r\n\r\nEasily share audio between two sets of AirPods on your iPhone, iPad, iPod touch, or Apple TV', '65', '70', '65', 0, NULL, '2022-04-06 10:55:00'),
(5, 5, 'electronics', '0', 'Pro Display XDR', 'Pro Display XDR\r\n\r\n32-inch Retina 6K. Astonishing color accuracy. And Extreme Dynamic Range.', '1500', '1600', '1500', 0, NULL, '2022-05-11 10:07:00'),
(6, 5, 'electronics', '0', 'Apple Watch Series 7', 'The aluminum case is lightweight and made from 100 percent recycled aerospace-grade alloy.\r\n\r\nThe Leather Link is made from handcrafted Roux Granada leather with no clasps or buckles, and has embedded magnets for a secure and adjustable fit.', '85', '90', '85', 0, NULL, '2022-05-31 19:36:00'),
(7, 5, 'electronics', '0', 'AirPods Max', 'High-Fidelity Audio The Apple-designed driver delivers high-fidelity playback with ultra-low distortion across the entire audible range.', '150', '200', '150', 0, NULL, '2022-05-24 19:37:00'),
(8, 5, 'electronics', '0', 'USB-C to MagSafe 3 Cable (2m)', 'This 2-metre charge cable features a magnetic MagSafe 3 connector that helps guide the plug to the power port of your MacBook Pro. Pair it with a compatible USB-C power adapter to conveniently charge your MacBook Pro from a power point and take advantage of fast-charging capabilities. The magnetic connection is strong enough to resist most unintended disconnects, but if someone trips on the cable, it releases so your MacBook Pro stays put. An LED turns amber when the battery is charging and green when it’s fully charged. Made with a woven design for long-lasting durability.\r\n', '10', '20', '10', 0, NULL, '2022-01-26 19:38:00'),
(9, 5, 'electronics', '0', 'Magic Mouse', 'Magic Mouse is wireless and rechargeable, with an optimised foot design that lets it glide smoothly across your desk. The Multi-Touch surface allows you to perform simple gestures such as swiping between web pages and scrolling through documents.', '25', '30', '25', 0, NULL, '2022-01-31 20:38:00'),
(10, 5, 'jewellery', '0', 'Pandora ME Lucky Bottle Cap Ring Set', 'Pandora ME Metal; Sterling silver, 14k Rose gold-plated; unique metal blend Stone; Cubic Zirconia; Purple; Rings; NAMPS0099;', '45', '50', '45', 0, NULL, '2021-12-30 15:29:00'),
(11, 5, 'books', '0', 'Big Shot (Diary of a Wimpy Kid Book 16)', 'After a disastrous field day competition at school, Greg decides that when it comes to his athletic career, he\'s officially retired. But after his mom urges him to give sports one more chance, he reluctantly agrees to sign up for basketball. Tryouts are a mess, and Greg is sure he won\'t make the cut. But he unexpectedly lands a spot on the worst team......', '11', '20', '11', 0, NULL, '2022-04-22 10:27:19'),
(12, 5, 'books', '0', 'Go Tell the Bees That I Am Gone', 'New York Times bestselling author Diana Gabaldon returns with the newest novel in the epic Outlander series. The past may seem the safest place to be . . . but it is the most dangerous time to be alive. . . . Jamie Fraser and Claire Randall were torn apart by the Jacobite Rising in 1746, and it took them twenty years to find each other again. Now the American Revolution threatens to do the same. It is 1779 and Claire and Jamie are at last reunited... ', '7', '10', '7', 0, NULL, '2022-01-13 19:32:00'),
(13, 5, 'jewellery', '0', 'Pandora ME Happy Smiley Face Ring Set', 'Keep on smiling! This super cute ring set features the most adorable smiley face emoji we\'ve ever seen. Wear it with any look to remind yourself to always keep smiling.', '60', '70', '60', 0, NULL, '2022-02-09 17:18:00'),
(14, 5, 'electronics', '0', 'AirTag', 'AirTag is an easy way to keep track of your stuff. Attach one to your keys, slip another one in your backpack. And just like that, they’re on your radar in the Find My app. AirTag has your back.', '15', '20', '15', 0, NULL, '2022-03-03 10:43:01'),
(15, 5, 'art_works', '0', 'Joshua Tree Wall Art', 'Turn your favorite photos into works of art and make your home your gallery. Create a canvas piece for yourself or make a gift for a loved one to enjoy every day.', '85', '100', '85', 0, NULL, '2021-12-31 19:59:00'),
(16, 5, 'art_works', '0', 'Countryside Portrait Wall Art', 'Achieve a unique look with rustic wood wall art. The photo is printed directly on the wood, allowing the natural grain to shine through. Create an heirloom-worthy piece for yourself or make a one-of-a-kind gift for someone special.', '55', '60', '55', 0, NULL, '2022-01-05 15:09:00'),
(17, 5, 'art_works', '0', 'Milton Owl Art', 'Each canvas depicts a half-view that together create a striking statement in a dining room, living room, or great room. They may also be hung alone. High-quality giclee prints with a knife gel textured finish for the feel of an original work.\r\n\r\nHigh-quality giclee print diptych on stretched canvas\r\n\r\nReady to hang using affixed D-rings\r\n\r\nMade in USA\r\n\r\nA Grandin Road exclusive', '55', '60', '55', 0, NULL, '2021-12-30 16:14:00'),
(18, 5, 'art_works', '0', 'Time - 9 Piece Picture Frame Photograph Set', 'This artist has been a World-renowned Art Photographer for the last 25 years. Her timeless art pieces capture nature\'s beauty forever; each piece reflects the creativity and art skills that were developed in years of dedication. To make sure she is capturing the most amazing moments, she carefully choses the photography spots and sometimes waited for hours for the perfect light. ', '25', '30', '25', 0, NULL, '2022-06-03 10:07:19'),
(19, 5, 'jewellery', '0', 'Celestial Moon & Stars Ring Set', 'Pandora Moments Metal;\r\nSterling silver Stone;  \r\nCubic Zirconia;\r\nClear;  \r\nNature and Celestial;\r\nRings;\r\nNAMPS0015', '45', '50', '45', 0, NULL, '2022-03-10 18:18:00'),
(20, 5, 'jewellery', '0', 'Lots of Love and Sparkle Stacking Ring Set', 'Rose, on rose, on rose and a whole lotta sparkle! This rose gold-plated ring set is absolutely fabulous. Wear it as a ring stack all on one finger or wear one on each finger. Either way, this ring set is sure to slay!', '100', '120', '100', 0, NULL, '2022-06-02 18:18:00'),
(21, 5, 'jewellery', '0', 'True Bleu Halo Wishbone Stacking Ring Set', 'Pandora Timeless Metal；\r\nSterling silver Stone； \r\nCubic Zirconia； \r\nBlue;\r\nRings;\r\nNAMPS0113;', '75', '80', '75', 0, NULL, '2022-02-17 18:30:00'),
(22, 5, 'jewellery', '0', 'Pandora Moments Heart Clasp Snake Chain Bracelet', 'Set your heart a-flutter with this romantic version of Pandora\'s bestselling charm bracelet. Hand-finished with a heart-shaped clasp, this sterling silver snake chain bracelet looks stunning on its own but even better adorned with your favorite Pandora charms and clips. Layer it with contrasting Pandora chain bracelets for a chic, multi-layered look.', '45', '50', '45', 0, NULL, '2022-06-23 10:39:27'),
(23, 5, 'art_works', '0', 'Cardinal On Gatepost by The Macneil Studio - Wrapped Canvas Print', 'Empty entryway wall? Some spare space in the master suite? A boring bathroom? Wall art instantly turns any blank area into an eye-catching display, all while lending statement-making appeal to your abode. Just take a look at this piece for example: Made in the USA, this acrylic paint piece is printed on wrapped canvas, bringing a winter wonderland right into your home. Perfect for any bare wall in your abode, this piece adds a pop of color to your space.\r\n', '43', '50', '43', 0, NULL, '2022-07-06 19:36:00'),
(24, 5, 'art_works', '0', 'Excited by Marmont Hill - Picture Frame Textual Art', 'Arrives ready to hang\r\nHand cut deckled edges\r\nIncludes a certificate of authenticity\r\nHigh quality durable non-warping frame', '45', '60', '45', 0, NULL, '2022-07-07 10:07:00'),
(25, 5, 'jewellery', '0', 'Letter A Initial Necklace Set', 'Customize your very own initial necklace with the letter charm of your choice. Shop all letter charms to personalize this necklace as a gift for friends and family you adore.', '45', '60', '45', 0, NULL, '2022-09-22 18:18:00'),
(26, 5, 'art_works', '0', 'Let\'s Get Shower by Parvez Taj - on Canvas', 'A portrait of a darkly detailed dog in a pink shower cap during bath time. This adorable depiction of a clean pooch will melt your heart and liven up your washroom. Proudly made in the USA, this piece is printed on canvas before it’s stretched over non-warping wooden bars for a gallery-wrapped look. With wall-mounting hooks included, this artful accent is ready to hang up as soon as it reaches your front door.\r\n', '25', '60', '25', 0, NULL, '2022-10-12 19:09:00'),
(27, 5, 'art_works', '0', 'Flamingo by Brooke Witt - Unframed Graphic Art', 'Express your artistic side and transform your interior space into a living work of art with this stunning museum-quality print. Created and curated to provide the perfect focal point or unifying feature to bring to life any room with style. We love it paired with a complementing color palette or hung in clever spaces for a distinct statement that is uniquely you', '15', '60', '15', 0, NULL, '2022-11-23 18:18:00'),
(28, 5, 'art_works', '0', 'Desert Sunrise Wall Art', 'Digital printing on true artist white poly-cotton canvas with excellent archival properties, featuring a matte finish\r\n\r\nHigh quality, gallery-wrapped edges\r\n\r\nFor all sizes, except 30x40 and 36x36, canvas depth is 1 1/2\" and frame depth is 2\". For 30x40 & 36x36 sizes, canvas depth is 1 1/4\" and frame depth is 1 3/4\"\r\n\r\nFrames available in black, brown, white, rustic, natural, gold, and metallic luxe\r\nIncludes metal sawtooth hanger for easy hanging\r\n\r\nMade in USA with imported components. Personalized in USA', '55', '60', '55', 0, NULL, '2021-12-30 16:19:00'),
(29, 5, 'art_works', '0', 'Antique Black And White Botanical IV - 2 Piece Picture Frame Painting Set on Canvas', 'Each wall art is joined and assembled by hand and comes ready to hang. Framed ready to hang made in the USA solid wood.', '45', '60', '45', 0, NULL, '2021-12-30 16:14:00'),
(30, 5, 'art_works', '0', 'Les Palmiers I by Vincent Van Gogh - 2 Piece Picture Frame Print Set', 'Featuring two premium giclee canvas prints in a solid wood rough-hewn frame. Each piece is designed to last for generations solid wood frame 2’’ beveled matt board at a time premium giclee print ready to hang.', '12', '60', '12', 0, NULL, '2028-05-01 16:14:00'),
(31, 5, 'homes', '0', 'Linenspa Essentials 5-inch ActiveRelief Gel Memory Foam Mattress', 'Get the comfort you seek with this 5-inch gel memory foam mattress. The mattress features a comfort layer of pressure-relieving, gel-infused memory foam at the surface. Beneath the comfort layer is a thick, high-density layer of SupportRight comfort foam to provide the support you need while improving comfort. ', '65', '80', '65', 0, NULL, '2030-06-12 16:14:00'),
(32, 5, 'homes', '0', 'Mervynn Mid-Century Modern Button Tufted Fabric Recliner by Christopher Knight Home', 'MID-CENTURY MODERN: Blending together iconic tapered legs with a smooth upholstery, our recliner offers a mid-century look to your lounge space. With its clean lines and understated look, this chair uses new materials to reimagine a traditional design.', '250', '300', '250', 0, NULL, '2030-07-16 16:14:00'),
(33, 5, 'homes', '0', 'Copper Grove Muir Fabric Wingback Club Chair Recliner', 'CONTEMPORARY DESIGN: Featuring smooth upholstery and tonal piping, our pushback recliner offers the look, feel, and design of a truly contemporary piece. With a minimalistic yet refined structure, this chair brings out a simplistic style that emphasizes comfort and functionality. ', '230', '300', '230', 0, NULL, '2031-09-10 19:14:00'),
(34, 5, 'homes', '0', 'Carbon Loft Prusiner Industrial Counter Stool ', 'Ideal for urban spaces, these Prusiner stools are sleek, sturdy, and stylish. The powder-coated steel sled legs are paired with a bucket seat for lasting comfort. Choose from five faux-leather upholstery colors to complement your industrial decor.', '220', '300', '220', 0, NULL, '2032-09-14 19:14:00'),
(35, 5, 'homes', '0', 'Citico Counter Height Laminated Faux Marble 5-piece Dining Set', 'With a scale appropriate for any number of smaller dining spaces, the Citico Collection will provide the look and style you want in your home. The transitional feel of the group comes from the richly hued faux marble table top and the minimalistic design of the dark brown bi-cast vinyl chairs. ', '180', '300', '180', 0, NULL, '2033-11-14 19:14:00'),
(36, 5, 'homes', '0', 'Simple Living Baxter Table with Storage Ottomans 5-piece Dining Set', 'The ultimate space-saver, this five-piece dining set is ideal for small dining areas. Four ottoman benches store beneath the table for a crisp, seamless look. The seats remove from the top of the ottomans to reveal storage space, letting you save even more space by storing belongings there.', '200', '300', '200', 0, NULL, '2033-10-14 19:14:00'),
(37, 5, 'homes', '0', 'Mobile Furniture Eva-KBL Electric Fireplace Modern 71-inch TV Stand', 'House your TV, media supplies, and more with this TV stand from Mobile Furniture. This combination entertainment center includes a built-in electric fireplace insert with a remote to control the heat, flame color, and more. Choose from a glossy white, black, or grey finish to fin your space.\r\n', '400', '500', '400', 0, NULL, '2035-10-01 10:14:00'),
(38, 5, 'homes', '0', 'Copper Grove Puff Island Natural Breakfast Bar Kitchen Cart', 'Take a moment with your coffee alone in the quiet morning, with this charming kitchen cart with breakfast bar is constructed of solid hardwoods in a natural finish. Features include two storage cabinets with raised panel doors, four storage drawers on metal glides, a spice rack, towel bar and caster wheels.', '380', '400', '380', 0, NULL, '2035-10-11 19:14:00'),
(39, 5, 'homes', '0', 'Hathaway Dynasty 54-inch Foosball Table', 'The Dynasty 54-in Foosball table is guaranteed to bring hours of recreational fun and playful competition right into the comfort of your home. This table is perfect for players of all ages. The cabinet is constructed from durable CARB certified MDF material and supported by 4 sturdy L-shaped legs with 4-in adjustable leg levelers to keep your table balanced on any surface.', '220', '400', '220', 0, NULL, '2035-11-11 19:15:00'),
(40, 5, 'homes', '0', 'Carson Carrington Blaney Solid Wood Spindle Platform Bed', 'Add retro charm to your bedroom decor with this stylish platform bed. The bed is crafted from solid pine wood, available in a variety of finishes, and features a platform base with recessed slat supports to hold your mattress without the need for a box spring. ', '400', '500', '400', 0, NULL, '2035-01-01 19:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `account_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `address`, `phone`, `account_type`) VALUES
(1, 'buyer1@gmail.com', '$2y$10$cUjv8nZXHgeg8TPuaMdY1eccnYrKKr2Z3eYkw70wl93SE4WCW4Xx.', NULL, NULL, 'buyer'),
(2, 'buyer2@gmail.com', '$2y$10$taby/IIEOwTjwFgkCy7QVehap1TyEOEuO5rknRfSCaHQZLxjv.aOq', NULL, NULL, 'buyer'),
(3, 'buyer3@gmail.com', '$2y$10$/w3HDDRBMiLzPMdIR/2t/.iaSLkhyXQsJPiXzOfV.YAcF.FvVuc4K', NULL, NULL, 'buyer'),
(4, 'buyer4@gmail.com', '$2y$10$B4c4qghNnorHkI3dt5r4e.2946FXoeX5uVRoJb1JXDy6CZNK/Cmu2', NULL, NULL, 'buyer'),
(5, 'seller1@gmail.com', '$2y$10$0nDYWb2XAcXkZjdCA398o.YhJqwRTPDH1sL/Lo7m2JLPb3YJUX9y.', NULL, NULL, 'seller'),
(19, 'buller9@gmail.com', '$2y$10$vFBAI4Sd4FGYJMsC6i55b.kpBMkEvkCd.k9QJKUzjTZxw15/VefEq', '', '', 'buyer');

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE `watch_list` (
  `watch_id` int(10) NOT NULL,
  `item_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  ADD PRIMARY KEY (`auction_id`),
  ADD KEY `historical_auction_price_item_item_id_fk` (`item_id`),
  ADD KEY `historical_auction_price_user_user_id_fk` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `images_image_id_uindex` (`image_id`),
  ADD KEY `images_item_item_id_fk` (`item_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `income_user_user_id_fk` (`seller_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_user_user_id_fk` (`seller_id`),
  ADD KEY `item_user_user_id_fk_2` (`buyer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `watch_list_item_item_id_fk` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  MODIFY `auction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `watch_list`
--
ALTER TABLE `watch_list`
  MODIFY `watch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  ADD CONSTRAINT `historical_auction_price_item_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historical_auction_price_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_item_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_user_user_id_fk` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_user_user_id_fk` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD CONSTRAINT `watch_list_item_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watch_list_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
