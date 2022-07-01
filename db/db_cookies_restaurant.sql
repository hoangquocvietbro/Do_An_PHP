-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2022 lúc 04:23 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_cookies_restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Cookies', '2022-06-26', '2022-07-01'),
(2, 'Bánh Bông Lan', '2022-06-28', '2022-07-01'),
(17, 'Bánh Bao', '2022-07-01', '2022-07-01'),
(18, 'Bánh Kem', '2022-07-01', '2022-07-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `sale_level` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `user_name`, `password`, `phone`, `address`, `sale_level`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Trung Hiếu', 'hieu', '$2y$10$e1.9lalZ3DC5owFaxFmX..Wvog9uvLg92w/.wBztuI4tZP61n/kOK', 25791840, 'Ninh Bình', 2, '2022-06-28', '2022-06-30'),
(2, 'Hoàng Quốc Việt', 'viet', '$2y$10$PvJ6TXRExaRilYSgh9B1tui6M6VcTfM411pCCxtxfRXksV9lKRwUe', 396433209, 'Nghệ An', 2, '2022-06-28', '2022-07-01'),
(3, 'Hoàng Thanh Phương', 'phuong', '$2y$10$Kf2.kVY/01ysWDse6tvojec1VtrhDJtzpS5NTwykMEy3pwyBRv.Ku', 396433209, 'Lào Cai', 1, '2022-06-28', '2022-07-01'),
(5, 'Nguen Van Duong', 'duong', '$2y$10$ypUW0fPzrmkkGz.YAG.Rvudzuikl18ngdyDkqypRmOn.WULZWE4R6', 825791840, 'Hà Nội', 1, '2022-07-01', '2022-07-01'),
(6, 'Lưu Linh Nhi', 'nhi', '$2y$10$.Ar0aSPQDwUuzWOAwx5Ru.PJ89VPQiDxRYaeOVjqtCUhqgPZ86NtC', 378102552, 'Lào Cai', 2, '2022-07-01', '2022-07-01'),
(7, 'Luu Trí Hiếu', 'trihieu', '$2y$10$uagMWwTf4Oocc9asYCGwVuniYHohCDug5jga7lHhjGJZ7S7a1F5aC', 868124654, 'Lào Cai', 1, '2022-07-01', '2022-07-01'),
(8, 'Nguyễn Thị Hậu', 'hau', '$2y$10$Zmgndu7zI9kuA8Jzg9ftO.uvXJN2R4b2yOnR07EBNtGbJM4tQAli6', 539576439, 'Ninh Bình', 1, '2022-07-01', '2022-07-01'),
(9, 'Nguyễn Bảo Ngọc', 'ngoc', '$2y$10$JlqEPya90NwaMGV9VxZWeuXVsfs8W5GfCCaqNPtRbhhEd7ccTjwwG', 654126469, 'Bắc Giang', 1, '2022-07-01', '2022-07-01'),
(10, 'Đặng Tuấn Anh', 'tuananh', '$2y$10$9wUtgXAGl8zktAiC0f3qyu/vo/UIk2qr5tSUbq69dsLLOWKE/TiuS', 528233789, 'Hà Nội', 1, '2022-07-01', '2022-07-01'),
(11, 'Nguyễn Văn Hào', 'hao', '$2y$10$lFUi37Ml5ehyp37RtQMmzO8Afxj7m.xfKsweqS60Hpit.hXIYogdy', 396453875, 'Hải Dương', 2, '2022-07-01', '2022-07-01'),
(12, 'Đăng Thị Nga', 'nga', '$2y$10$tApICbG8ftXPd3TjBBnF1erfxmANfw/JxE7vgukoVWO11LYrXKVyS', 825891840, 'Hà Nội', 2, '2022-07-01', '2022-07-01'),
(13, 'Hoàng Thu Yên', 'yen', '$2y$10$6Hn8iqqzQ6se68H3wrX3DemMtoOHI4YvEn69L2IJ.PU4GsjC1qqpy', 683133254, 'Hà Nội', 1, '2022-07-01', '2022-07-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `phone` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `name`, `user_name`, `password`, `phone`, `salary`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$e1.9lalZ3DC5owFaxFmX..Wvog9uvLg92w/.wBztuI4tZP61n/kOK', 396433209, 0, 0, '2022-07-01', '2022-07-01'),
(2, 'Phạm Trung Hiếu', 'hieu', '$2y$10$M9EbH8vyvjdN5BOyBWuK7e9EhcXxDc9ZdbZIAP1NVGKg2SjjI51uG', 378102552, 7000000, 1, '2022-07-01', '2022-07-01'),
(3, 'Hoàng Quốc Việt', 'viet', '$2y$10$QNJD9QfFsFcft1SnHAxoqul07yXz/MiUKo/AbcTbY7xQMb/fu2GBG', 825791840, 6000000, 2, '2022-07-01', '2022-07-01'),
(4, 'Dương Đức Tuyên', 'tuyen', '$2y$10$91fk9B/ux60ehLlEpNlDt.msp7dQC.u5WkvnY1w0uiQCRaOji2/J.', 357918409, 7000000, 1, '2022-07-01', '2022-07-01'),
(5, 'Tiêu Hồng Vĩnh', 'vinh', '$2y$10$fBdzzP5bq5WQ2ojPbFYMGuudfLPdDBVn7Y8iSqnKqLehpLRUtaLeC', 396433209, 6000000, 2, '2022-07-01', '2022-07-01'),
(6, 'Nguyen Thanh Tuan', 'tuan', '$2y$10$i6SnwqFwTGCjku05Hj64FOsujNWrsGdxAY553tojJIV7MTu9fYcYu', 528333543, 6000000, 2, '2022-07-01', '2022-07-01'),
(7, 'Nguyễn Như Hoa', 'hoa', '$2y$10$s4P6Abn4UK8jH9gmrD5WKObnXTsRuHvFiosrSZ0sYPn8FjltYV8su', 352877694, 6000000, 0, '2022-07-01', '2022-07-01'),
(8, 'Đặng Văn Thành', 'thanh', '$2y$10$vzW7i84oDUSAxT3m/jsVrOuYAVgEqOtkbdhKjEZNaQIkdA3JkViGW', 363457125, 6000000, 2, '2022-07-01', '2022-07-01'),
(9, 'Phạm Thảo Linh', 'linh', '$2y$10$4t36tUY8HVs.8WC61bpjQ.M2BPJdH.Cqp/aKuK/TDnz97XjXoaFK.', 964154236, 6000000, 0, '2022-07-01', '2022-07-01'),
(10, 'Đào Ánh Nguyệt', 'nguyet', '$2y$10$Yk3JqO.k4awM30dlqiu2R.mQLocRj6kvD0SDpLlz6.AT5KjWnB7FG', 353455698, 6000000, 0, '2022-07-01', '2022-07-01'),
(11, 'Đào Mạnh Dũng', 'dung', '$2y$10$6PfC4WcuhBLP/MotGgGt2OMD3T4DxNCAkiTsvjT1EIwVI8oNRsXva', 528737465, 6000000, 2, '2022-07-01', '2022-07-01'),
(12, 'Nguyễn Văn Dương', 'duong', '$2y$10$fWBTcvJqibGFEKZsBhhUYuuVRvhMnfuxBJXWz6YQUDXd7anHyProi', 396546798, 6000000, 2, '2022-07-01', '2022-07-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--
-- Error reading structure for table db_cookies_restaurant.order: #1932 - Table 'db_cookies_restaurant.order' doesn't exist in engine
-- Error reading data for table db_cookies_restaurant.order: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_cookies_restaurant`.`order`' at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(43, 1, 3, 15000),
(43, 4, 2, 30000),
(43, 8, 4, 15000),
(43, 41, 1, 200000),
(43, 38, 5, 10000),
(44, 1, 14, 15000),
(44, 16, 8, 30000),
(44, 36, 2, 13000),
(45, 3, 1, 10000),
(45, 41, 1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` text NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Bánh quy Anzac', 'Bánh quy Anzac hay còn gọi Anzac Wafer là một loại bánh quy có nguồn gốc từ nước Úc.\r\n\r\nLoại bánh này được làm từ các nguyên liệu đơn giản như: bột mì, nước, đường hoặc muối nên có thời hạn sử dụng lâu, thường được dùng để làm lương khô dự trữ cho binh lính trong quân đội.\r\n\r\nVì có kết cấu rất cứng nên binh lính thường không ăn trực tiếp mà nghiền nhuyễn ra để ăn như cháo.', 15000, '20220628042618Bánh quy Anzac.jpg', 1, '2022-06-26', '2022-06-28'),
(3, 'Biscotti', 'Biscotti là một món bánh quy có xuất xứ từ nước Ý. Từ ngữ Biscotti được tạo từ chữ bis (nghĩa là hai lần) và cotto (nghĩa là nấu chín).\r\n\r\nNgười ta làm ra Biscotti bằng cách trộn bột mì, đường, lòng trắng trứng gà, muối cùng các nguyên liệu khác lại với nhau. Sau đó, tạo hình giống như một ổ bánh mì rồi đem nướng cho đến khi có màu vàng nâu.\r\n\r\nKhi bánh chín, người ta lấy ra, cắt thành từng lát vừa rồi lại đem nướng lần 2 để bánh có độ khô đặc trưng.\r\n\r\nChính vì được nướng 2 lần nên Biscotti có hạn sử dụng lên đến 3 - 4 tháng mà không cần thêm chất bảo quản nào khác.', 10000, '20220628042901Biscotti.jpg', 1, '2022-06-28', '2022-06-28'),
(4, 'Brownie', 'Brownie là một loại bánh cổ điển, có nguồn từ nước Anh vào đầu thế kỷ XX. Được biết, loại bánh này được tạo ra một cách tình cờ khi đầu bếp quên thêm baking soda vào bột socola trong lúc làm bánh.\r\n\r\nĐược làm từ nguyên liệu chính là socola nên có Brownie màu nâu sẫm đặc trưng, kết cấu mềm xốp, vị đắng hoà quyện cùng vị ngọt và phảng phất mùi hương nhẹ nhàng, quyến rũ.', 30000, '20220628043021Brownie.jpg', 1, '2022-06-28', '2022-06-28'),
(5, 'Bánh quy chocolate chip', 'Bánh quy chocolate chip là một món bánh nổi tiếng của nước Mỹ. Nó được tạo ra bởi đầu bếp Ruth Graves Wakefield khi bà biến tấu công thức chế biến bánh quy truyền thống bằng cách thêm những hạt socola Nestlé cắt nhỏ vào bột bánh.\r\n\r\nNgay từ khi xuất hiện vào khoảng năm 1938, bánh quy chocolate chip đã trở nên nổi tiếng bởi hương vị độc đáo từ công thức biến tấu. Cho đến nay, món bánh này vẫn được rất nhiều người ưa chuộng.', 15000, '20220628050517Bánh quy chocolate chip.jpg', 1, '2022-06-28', '2022-06-28'),
(6, 'Bánh quy bơ đậu phộng', 'Bánh quy bơ đậu phộng được làm từ bơ, đậu phộng, trứng, sữa, bột mì, đường và muối. Sau khi tạo hình xong, người ta dùng nĩa để tạo các hoa văn hình sọc trên mặt bánh. Đây chính là nét đặc trưng của loại bánh này.', 20000, '20220628045038Bánh quy bơ đậu phộng.jpg', 1, '2022-06-28', '2022-06-28'),
(7, 'Bánh quy Canestrelli', 'Canestrelli là một món bánh quy bơ nổi tiếng của nước Ý. Nó được làm ra từ thời Trung cổ và có hình dáng trông như những bông hoa nhỏ xinh xắn. Tại một số nơi, Canestrelli còn được biến tấu với nhiều hình dạng phong phú như hình bánh quế hay hình bánh xốp.\r\n\r\nCó rất nhiều công thức khác nhau để làm ra loại bánh quy bơ này, nhưng có lẽ độc đáo, thơm ngon nhất là bánh quy Canestrelli của vùng Liguria.', 10000, '20220628043450Bánh quy Canestrelli.jpg', 1, '2022-06-28', '2022-06-28'),
(8, 'Savoiardi', 'Savoiardi là một loại bánh quy xốp truyền thống được tạo ra bởi bàn tay của đầu bếp Duchy of Savory trong một lần đi thăm vua Pháp vào thế kỉ 15.\r\n\r\nMón bánh này có hình dáng to, trông như những thanh que dài, kết cấu nhẹ và xốp, vị ngọt béo được kết hợp từ bột, sữa, đường và trứng gà. Khi cắn vào miếng bánh thì cảm giác được bánh tan trong miệng, rất thích thú.', 15000, '20220628043605Savoiardi.jpg', 1, '2022-06-28', '2022-06-28'),
(14, 'HIGH-FAT CAKE', 'High-fat cake chính là dòng bánh bông lan ngọt cổ điển chứa nhiều chất béo như dầu bơ. Vì vậy bánh có độ mềm mại cộng với độ phồng từ muối nở. Bánh có kết cấu ẩm, tơi và nở cùng vị thơm ngậy của bơ, là vị bông lan ưa thích của nhiều người.\r\n\r\nHigh-fat cake có 2 loại phổ biến nhất là butter cake và pound cake. Hai loại bánh này khác nhau ở chỗ butter cake có lượng sữa khá còn pound cake lại hầu như không sử dụng sữa ở trong công thức.', 15000, '20220628051133HIGH-FAT CAKE.jpg', 2, '2022-06-28', '2022-06-28'),
(15, 'POUND CAKE', 'Bánh pound cake là loại bánh cơ bản đầu tiên người mới học làm bánh học vì nó có công thức cân bằng về tỷ lệ cứ 1 bột: 1 bơ :1 trứng: 1 đường. Tuy nhiên, nó có một nhược điểm là khá khô và nặng nên pound cake thường  được ăn kèm với các loại chất lỏng như mứt trái cây, syrup hoặc thêm trái cây tươi vào để bánh giảm bớt độ bứ và đặc.', 13000, '20220628051749Pound-cake.jpg', 2, '2022-06-28', '2022-06-28'),
(16, 'BUTTER CAKE', 'Butter cake là loại bánh bông lan được sử dụng trong bánh kem, bánh cupcake mà chúng ta thừơng thấy. Do kết cấu bánh khá mượt và ầm nên mang đến cho người đọc cảm giác tan chảy trên đầu lưỡi. Tuy nhiên ánh có nhiều chất béo nên dễ bị ngấy khi ăn nhiều.\r\nNhưng đây vẫn là loại bánh được  yêu thích và có ưu điểm mạnh là kết cấu đặc nên có thể dùng làm cốt các loại bánh kem trang trí cầu kì.', 30000, '20220628051851Butter-cake.webp', 2, '2022-06-28', '2022-06-28'),
(17, 'FOAM CAKE', 'Khác với các loại bánh bông lan truyền thống, các loại bánh bông lan hiện đại bắt đầu phát triển theo xu hướng foam cake. Là những chiếc bánh nhẹ như mây, mềm như bông do không hề chứa chất béo trong công thức\r\n\r\nFoam cake cũng không cần dùng muối nở hay bột nở mà bánh nở nhờ vào trứng đánh bông. Bánh cũng chứa rất ít bột nên tạo cảm giác nhẹ mềm, bông.', 5000, '20220628052003banh-bong-lan-foam-cake.webp', 2, '2022-06-28', '2022-06-28'),
(18, 'CHIFFON CAKE', 'Chiffon cake là 1 công thức bánh tiêu biểu cho dòng foam cake. Loại bánh này có rất ít bột, và nở bằng cách đánh bông long trắng trứng. Vì vậy đây là loại bánh rất thử thách  với người làm bánh, độ khó của bánh còn thể hiện ở  thời gian nướng bánh chuẩn xác để bánh nở to nhưng phần ruột lại cứng cáp và không bị xẹp khi mang ra khỏi lò nướng.\r\n\r\nbánh bông lan chiffon cake\r\nBánh chiffon có thể nở đều và đẹp nhờ khuôn của nó có cấu tạo đặc biệt với lõi giữa giúp nhiệt lượng truyền vào bánh đồng đều tránh bên ngoài nở mà bên trong sống gây lõm, xẹp bánh.', 18000, '20220628052128banh-bong-lan-chiffon-cake.webp', 2, '2022-06-28', '2022-06-28'),
(19, 'SPONGE CAKE', 'Chiffon có kết cấu mỏng nhẹ nên rất khó tận dụng làm bánh kem, vì bánh sẽ bị sập nếu để nguyên liệu nặng, cầu kì, vì vậy sponge cake ra đời để khắc phục nhược điểm này của chiffon trong dòng foam cake.\r\n\r\nbánh bông lan Sponge cake\r\n Công thức làm bánh sponge cake khác ở chỗ bạn sẽ đánh bông cả quả trứng thay vì chỉ mỗi lòng trắng như chiffon nên kết cấu bánh sẽ đặc hơn.\r\n\r\nSự khác nhau cơ bản của dòng foam cake so với high-fat cake là không dùng bột nở mà dùng bọt khí nên thao tác tinh tế và nhe nhàng hơn. Lưu ý quan trọng là bạn phải hạn chế tối đa việc làm vỡ bọt khí. Và trộn bột từ dưới khay đảo lên chứ không khuấy đều như các công thức làm bánh bông lan khác.', 40000, '20220628052304banh-bong-lan-Sponge-cake.webp', 2, '2022-06-28', '2022-06-28'),
(35, 'Bánh bao chiên', 'Bánh bao chiên nhân thịt thơm ngon, rất đơn giản khi làm tại nhà, bạn có thể cùng gia đình thưởng thức món bánh bao chiên giòn thơm béo béo, chấm với nước mắm chua ngọt thì còn gì bằng.\r\n\r\nBạn chỉ cần từ từ đổ bột nở vào âu bột với một ít nước, sau đó dùng tay nhào bột thật kỹ để các nguyên liệu kết hợp thành khối bột dẻo và có độ đàn hồi rồi mang đi ủ.\r\n\r\nSau đó băm nhỏ thịt lợn, cà rốt, hành lá và nấm hương thì nêm gia vị vừa ăn rồi trộn đều. Cán mỏng từng viên bột nhỏ đã ủ, cho nhân vào giữa rồi khéo léo túm mép bột lại. Sau đó chiên cho đến khi chín vàng đều có thể mang ra thưởng thức.', 20000, '20220701024104Bánh bao chiên.jpg', 17, '2022-07-01', '2022-07-01'),
(36, 'Bánh bao chay', 'Bánh bao chay thơm ngon, bổ dưỡng, rất thích hợp cho những người ăn chay hoặc những người muốn đổi vị với những món ăn thuần túy. Thay vì nhân đầy hương vị với thịt bình thường, bánh bao chay có thể không có lớp phủ bên ngoài, phủ đầy các thành phần thực vật hoặc lớp trên bề mặt là đậu / khoai lang.', 13000, '20220701024354Bánh bao chay.jpg', 17, '2022-07-01', '2022-07-01'),
(37, 'Bánh bao chỉ', 'Đây là một loại bánh của người Hoa nổi tiếng nhất ở Đài Loan. Bánh bao chỉ được làm từ bột nếp với 4 nhân chính là mè đen, dừa, đậu xanh và đậu phộng. Bánh có hình tròn, màu trắng hoặc xanh của lá dứa,… Với phần vỏ bánh gồm bột nếp, đường, muối tinh, sữa tươi, cùi dừa. Với phần nhân gồm: Đậu xanh, đường, dầu ăn, mè, dừa nạo, vani chiết xuất ...', 12000, '20220701024439Bánh bao chỉ.jpg', 17, '2022-07-01', '2022-07-01'),
(38, 'Bánh bao xá xíu', 'Bánh bao xá xíu có nguồn gốc từ Quảng Đông - Trung Quốc, bánh bao xá xíu với nhân thịt thơm lừng bên trong được bao phủ bởi lớp vỏ trắng mềm khiến nhiều người mê mẩn ngay lần nếm thử đầu tiên. Món bánh này có hai cách chế biến là hấp hoặc nướng đều rất ngon và ấn tượng.', 10000, '20220701024557Bánh bao xá xíu.jpg', 17, '2022-07-01', '2022-07-01'),
(39, 'Bánh gato', 'Đây có lẽ là một trong 5 loại bánh kem sinh nhật quen thuộc nhất với chúng ta phải không nào. Mẫu mã các loại bánh càng ngày càng đẹp, hương vị bánh và kem cũng dần thay đổi để phù hợp với xu thế.\r\nMột chiếc bánh gato ngon cần phải có phần cốt bánh bông xốp, nhẹ, ăn không bị bứ. Bên cạnh đó thì lượng kem cũng cần vừa phải, không quá nhiều hay quá ít, không quá ngọt cũng không quá nhạt, và quan trọng nhất là không bị ngán', 150000, '20220701025046Bánh gato.webp', 18, '2022-07-01', '2022-07-01'),
(40, 'Tiramisu', 'Chiếc bánh này còn có tên là “pick me up”, hay dịch tiếng Việt có nghĩa là “hãy mang em đi”. Bánh có xuất xứ từ Ý, tượng trưng cho tình yêu mãnh liệt do bánh vừa có vị đắng vừa có vị ngọt cũng như tình yêu vừa hạnh phúc vừa đau khổ. Ngoài ra, bánh được giới bánh ngọt gọi là nữ hoàng của mọi loại bánh.Về độ nổi tiếng thì có lẽ không bánh nào qua được. Người đam mê bánh ngọt lẫn người thường có lẽ đều đã một lần nghe đến tên bánh này.\r\n\r\nBánh không những cuốn hút bởi vẻ ngoài mà còn gây ấn tượng sâu đậm bới hương vị của nó. Bánh là sự kết hợp của vị giòn, ngọt của bánh Lady Finger, vị thơm của cà phê đen và rượu Rhum, cùng với độ béo ngậy đến từ heavy cream và phô mai Mascapone.\r\n\r\nCác biến thể của Tiramisu để nó phù hợp hơn với từng nước có thể kể đến là Tiramisu dâu, Tiramisu chocolate, Tiramisu chanh, Tiramisu chuối, Tiramisu phúc bồn từ, Tiramisu trà xanh và cả Tiramisu bia.', 300000, '20220701025143Tiramisu.webp', 18, '2022-07-01', '2022-07-01'),
(41, 'Bánh mousse', 'Mousse là một loại bánh có lớp kem mát lạnh mềm mịn, tan trong miệng, đây là những đặc trưng đầu tiên khi người ta nghĩ đến mousse. Với ý nghĩa là bọt trong tiếng Pháp, mousse chính là chiếc bánh có vẻ ngoài đẹp mắt với lớp bánh gato mỏng bên dưới, phía trên là kem mịn, tan nhanh tự bọt biển chỉ để lại sự vấn vương nơi đầu lưỡi thực khách.\r\nChỉ với lòng trắng trứng đánh bông, kết hợp với các nguyên liệu khác như gelatin, kem tươi hay hương trái cây mà mousse lại trở thành món tráng miệng không thể thiếu và được lòng bao nhiêu người chỉ với một lần nếm qua.\r\nThuộc dòng bánh lạnh nên mousse ăn man mát, vị béo ngậy của kem tươi hòa cùng các hương vị thêm vào tạo nên sự độc đáo của bánh. Hương vị thêm vào mousse cũng vô cùng đa dạng và phong phú như hương vị của các loại trái cây, chocolate, trà xanh,…', 200000, '20220701025548mousse-sinh-nhat.webp', 18, '2022-07-01', '2022-07-01'),
(42, 'Vanillekipferl ', 'Đây là một trong các loại bánh cookie đặc trưng của nước Áo trong mùa giáng sinh ❤', 15000, '20220701025826Vanillekipferl.webp', 1, '2022-07-01', '2022-07-01'),
(43, 'Bánh cookie dừa sấy', 'Nguyên Liệu\r\n2 lòng trắng trứng (70g)\r\n40 g đường cát\r\n100 g dừa sấy', 10000, '20220701030104Bánh cookie dừa sấy.webp', 1, '2022-07-01', '2022-07-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_order`
--

INSERT INTO `tb_order` (`id`, `customer_id`, `status`) VALUES
(43, 1, 'Đang xử lý'),
(44, 2, 'Đang xử lý'),
(45, 3, 'Đang xử lý');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `fk_order_detail_product` (`product_id`),
  ADD KEY `fk_order_detail_order` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`id_category`);

--
-- Chỉ mục cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customer` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_order` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`id`),
  ADD CONSTRAINT `fk_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
