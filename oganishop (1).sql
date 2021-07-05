-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 08, 2021 lúc 03:47 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oganishop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSP` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `username`, `idSP`, `comment`, `created_at`) VALUES
(19, 'user1', 1, 'comment user 1', '2021-01-08 03:25:04'),
(20, 'nhom123456789', 1, 'comment  nhom 1 -------', '2021-01-08 03:25:57'),
(21, 'nhom123456789', 2, 'comment cua nhom 1', '2021-01-08 03:27:20'),
(22, 'user1', 11, 'comment us 1', '2021-01-08 03:40:01'),
(23, 'user1', 11, '11111111', '2021-01-08 03:40:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listorder`
--

DROP TABLE IF EXISTS `listorder`;
CREATE TABLE IF NOT EXISTS `listorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDonHang` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTTNH` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSP` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `listorder`
--

INSERT INTO `listorder` (`id`, `idDonHang`, `idTTNH`, `username`, `idSP`, `soluong`, `tongtien`, `created_at`) VALUES
(85, 'HD08012021021213', 76, 'user1', 1, 1, '50000', '2021-01-08 02:12:13'),
(86, 'HD08012021021213', 76, 'user1', 16, 3, '900000', '2021-01-08 02:12:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `information`, `image`, `type_id`, `weight`, `feature`, `created_at`) VALUES
(2, 'BẮP CẢI TÍM', '44950', 'Bắp cải màu tím đậm rất giàu anthocyanin polyphenols (chất chống oxy hóa, các tính năng kháng viêm khác nhau), bổ dưỡng hơn so với bắp cải xanh. Một số nghiên cứu cho rằng, anthocyanin có thể giúp giảm nguy cơ tim mạch, tiểu đường và một số bệnh ung thư. Nhờ giàu chất chống oxy hóa, bắp cải tím còn giúp làn da bạn mềm mại và sáng hơn.', 'Bắp cải tím chứa một hàm lượng Vitamin A GẤP 10 LẦN Bắp cải xanh, hoạt động như một chất chống oxy hóa hỗ trợ mắt, giữ cho da và hệ miễn dịch luôn khỏe mạnh.\r\n\r\nTrong khi chứa hàm lượng vitamin A gấp 10 lần bắp cải xanh thì hàm lượng vitamin C trong bắp cải tím cũng gấp 1.5 lần bắp cải xanh, vitamin C là một loại vitamin tăng cường đề kháng,  kích hoạt chuỗi hệ phản ứng miễn dịch trong cơ thể và sửa chữa các vết thương mau lành.\r\n\r\nCải tím chứa hàm lượng vitamin K gấp hai lần bắp cải xanh và hàng loạt những dưỡng chất tốt cho cơ thể như thiamin, folate, canxi, magiê, mangan, fe – sắt, riboflavin, sắt, kali, vitamin E, và vitamin B sẽ mang lại rất nhiều công dụng khác nhau như sức khỏe – có thể kể đến như liều thuốc chống viêm cực mạnh, trong khi sắt sẽ là điển hình trong việc ngừa các tình trạng thiếu máu dẫn đến mệt mỏi.', 'bap-cai-tim.jpg', 2, 0.5, 1, '2020-12-25 03:54:33'),
(3, 'THĂN NGOẠI BÒ ÚC STRIPLOIN', '145000', 'Giá sản phẩm đã bao gồm chi phí cắt lát và đóng gói! Trong tất cả những loại thịt bò, thì thăn ngoại bò Úc Striploin được người tiêu dùng đánh giá là loại thịt bò có chất lượng và giá trị dinh dưỡng cao nhất.', 'Striploin hay còn gọi là thăn lưng, thăn ngoại bò Úc, đây là phần thịt nằm ở trên lưng của con bò, phía dọc hai bên xương sống phía sau, là nơi bò ít vận động nhất. Từ vị trí có thể cho thấy đây là phần thịt mềm, và ở phần thịt này có một lớp mỡ bao quanh, là loại thịt được dùng để chế biến nhiều món ăn với thực đơn cao cấp. Ví như những món Steak, nướng, lẩu, xào hoặc áp chảo…. Và điển hình là món bò bít tết nổi tiếng.', 'than-ngoai-bo-uc.jpg', 1, 0.5, 1, '2020-12-25 04:05:29'),
(4, 'BẮP HOA BÒ MỸ HEEL MUSCLE BEEF', '175000', 'Bò Mỹ không những chất lượng an toàn cho sức khỏe mà còn có một vị ngon đặc biệt đến khó cưỡng, nhất là những phần thịt ở bắp hoa bò Mỹ, phần thịt này luôn mang đến cho người ăn một cảm giác giòn, mềm và ngọt khiến thực khách vẫn muốn thưởng thức  cho tới tận miếng cuối cùng.', 'Không có mỡ nên ăn hoài “không ngán”. Thay vào đó đan xen những đường gân mỏng tạo cho thực khách cảm giác thích thú khi nhai: “vừa mềm lại giòn sần sật. Có vị ngọt tự nhiên và mùi thơm nhẹ rất đặc trưng. Chế biến được nhiều món ngon trong gia đình Việt: hầm, xào, nướng, đặc biệt là nhúng dấm, lẩu.', 'bap-hoa-bo-my.jpg', 1, 0.5, 0, '2020-12-25 04:11:23'),
(1, 'CÀ CHUA BEEF', '50000', 'Hạt giống cà chua số một của Rijk Zwaan đến từ Hà Lan. Rau được trồng bằng phương pháp hữu cơ hoàn toàn.', 'Cà chua beef hướng hữu cơ là giống cà chua cao cấp khác hẳn cà chua thông thường ở điểm quả cà chua to, chắc, ít hạt, cơm dày.  Cà chua beef cung cấp một lượng Vitamin A, C, K tuyệt vời. Những chất này có tác dụng giúp tăng cường thị lực, phòng bệnh quáng gà. Ngoài ra, cà chua beef hữu cơ còn là loại thực phẩm giúp kiểm soát lượng đường trong máu, có canxi hỗ trợ cho xương chắc khỏe. Cà chua là loại thực phẩm được sử dụng phổ biến trong mỗi bữa ăn cũng như trong làm đẹp của chị em phụ nữ. Tuy nhiên để đảm bảo an toàn thì chúng ta nên chọn cà chua beef hướng hữu cơ hoặc cà chua bi hướng hữu cơ.', 'ca-chua-beef.jpg', 2, 0.5, 1, '2021-01-02 09:27:17'),
(5, 'CÀ RỐT BABY', '98000', 'Cà rốt là loại cây có củ, củ to ở phần đầu và nhọn ở phần đuôi, củ cà rốt thường có màu cam hoặc đỏ, phẩn ăn được thường gọi là củ nhưng thực chất đó là phần rễ của cà rốt.', 'Cà rốt chứa rất nhiều vitamin A, B, C đặc biệt là hàm lượng vitamin A cao rất tốt cho mắt, giúp tăng cường thị lực, bồ bổi thị lực, các vitamin này còn giúp chuyển hóa và tái tạo da, tăng sức đề kháng, phòng và trị các bệnh, giúp bổ tỳ tiêu thực, nhuận tràng, bổ can minh mục, thanh nhiệt giải độc. Thường dùng để dưỡng da, trị chứng da khô, trứng cá đầu đen, mụn nhọt...', 'ca-rot-baby.jpg', 2, 0.4, 1, '2021-01-02 09:36:41'),
(6, 'BÔNG CẢI XANH', '33000', 'Bông cải xanh hoặc súp lơ xanh, là một loại cây thuộc họ cải, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị.', 'Có rất nhiều món ăn được chế biến từ bông cải xanh chẳng hạn như pasta với bông cải xanh, súp bông cải xanh, bông cải xanh xào tôm. Ta có bông cải xanh trộn dầu hàu, một món ăn giàu đạm và rất ngon hay gà xào bông cải xanh món ăn âm dương kết hợp hài hòa. Ngoài ra bông cải xanh được dùng để làm các món salad, xào thịt, xào hải sản, giúp món ăn hạ bớt lượng nhiệt từ dầu mỡ, thịt, đảm bảo hài hòa, cân bằng cho bữa ăn', 'bong-cai-xanh.jpg', 2, 0.3, 0, '2021-01-02 09:43:29'),
(7, 'BÔNG ATISO', '153000', 'Atisô là cây thảo lớn, cao 1 - 1,2m, có thể đến 2m. Thân ngắn, thẳng và cứng, có khía dọc, phủ lông trắng như bông. Lá to, dài, mọc so le; phiến lá xẻ thùy sâu và có răng không đều, mặt trên xanh lục mặt dưới có lông trắng, cuống lá to và ngắn. Cụm hoa hình đầu, to, mọc ở ngọn, màu đỏ tím hoặc tím lơ nhạt, lá bắc ngoài của cụm hoa rộng, dày và nhọn, đế cụm hoa nạc phủ đầy lông tơ, mang toàn hoa hình ống.Quả nhẵn bóng, màu nâu sẫm có mào lông trắng.', ' Atisô là một trong những nguyên liệu bổ dưỡng trong các món canh hay món thịt nhồi. Về các món canh, ta có: canh hoa atisô nấu sườn, canh hoa atisô hầm chân giò, canh hoa atisô tiềm thịt gà. Đối với các món nhồi thịt hay hấp, ta có: atisô hấp thịt, thịt nhồi atisô. Ngoài ra, atisô còn được dùng để làm trà atisô một loại trà thơm ngon, nổi tiếng.', 'bong-atiso.jpg', 2, 0.3, 0, '2021-01-02 09:43:29'),
(8, 'THỊT NẠM BÒ ÚC', '87000', 'Thịt nạm bò Úc cung cấp bởi hệ thống cửa hàng và website Organi được nhập nguyên con còn sống và giết mổ tại Việt Nam theo đúng tiêu chuẩn ESCAS, vệ sinh an toàn thực phẩm, kiểm dịch.', 'Thịt được đóng gói và hút chân không tiệt trùng , bảo quản bằng tủ mát, vì vậy đảm bảo thịt vẫn giữ hương vị, mùi vị mà không cần bất cứ chất bảo quản nào. Hệ thống cửa hàng của Organi được giám sát chặt chẽ và trang bị tủ đông, tủ mát vệ sinh và hoàn toàn đảm bảo về chất lượng. Không như phần lớn thịt bò Úc trên thị trường là bò đông lạnh, khi rã đông sẽ mất đi vị của thịt. Chỉ có tại Organi chúng tôi cung cấp thịt tươi ngay sau khi giết mổ từ 1 tới 2 giờ đảm bảo vị ngon nhất của thịt bò vẫn còn nguyên. Organi đảm bảo: Không có chất bảo quản, không thức ăn tăng trưởng, không thịt bò bệnh.', 'thit-nam-bo-uc.jpg', 1, 0.3, 1, '2021-01-02 09:48:49'),
(9, 'THỊT ĐÙI BÒ ÚC', '429000', 'Thịt Đùi Bò Úc là phần thịt mềm nhất ở đùi con bò. Đây được đánh giá là một trong những phần thịt bò Úc giàu chất dinh dưỡng nhất. Phần thịt nạc đùi bò Úc nằm ở phần cơ mông cao nhất, có ít mô nối nên khi nấu sẽ có vị không quá béo, rất dễ ăn.', 'Thịt được đóng gói và hút chân không tiệt trùng , bảo quản bằng tủ mát, vì vậy đảm bảo thịt vẫn giữ hương vị, mùi vị mà không cần bất cứ chất bảo quản nào. Hệ thống cửa hàng của Organi được giám sát chặt chẽ và trang bị tủ đông, tủ mát vệ sinh và hoàn toàn đảm bảo về chất lượng. Không như phần lớn thịt bò Úc trên thị trường là bò đông lạnh, khi rã đông sẽ mất đi vị của thịt. Chỉ có tại Organi chúng tôi cung cấp thịt tươi ngay sau khi giết mổ từ 1 tới 2 giờ đảm bảo vị ngon nhất của thịt bò vẫn còn nguyên. Organi đảm bảo: Không có chất bảo quản, không thức ăn tăng trưởng, không thịt bò bệnh.', 'thit-dui-bo-uc.jpg', 1, 1, 1, '2021-01-02 09:54:37'),
(10, 'THỊT THĂN BÍT-TẾT BÒ ÚC', '126000', 'Thịt thăn là phần thịt đỏ cao cấp nhất trong con bò, chỉ có lượng ít trong mỗi con, hình dáng thon dài. Sớ thịt nhỏ, mềm, ít mỡ nên rất được các bà nội trợ ưa thích cho bữa ăn thêm ngon miệng. Đặc biệt, thịt thăn  rất tuyệt vời khi chế biến bít-tết, để thưởng thức hết vị ngon của miếng thịt thì chỉ cần ướp thịt với với chút muối tiêu và tận hưởng.', 'Thịt được đóng gói và hút chân không tiệt trùng , bảo quản bằng tủ mát, vì vậy đảm bảo thịt vẫn giữ hương vị, mùi vị mà không cần bất cứ chất bảo quản nào. Hệ thống cửa hàng của Organi được giám sát chặt chẽ và trang bị tủ đông, tủ mát vệ sinh và hoàn toàn đảm bảo về chất lượng. Không như phần lớn thịt bò Úc trên thị trường là bò đông lạnh, khi rã đông sẽ mất đi vị của thịt. Chỉ có tại Organi chúng tôi cung cấp thịt tươi ngay sau khi giết mổ từ 1 tới 2 giờ đảm bảo vị ngon nhất của thịt bò vẫn còn nguyên. Organi đảm bảo: Không có chất bảo quản, không thức ăn tăng trưởng, không thịt bò bệnh.', 'thit-than-bit-tet-bo-uc.jpg', 1, 0.3, 0, '2021-01-02 09:54:37'),
(11, 'ĐẬU ĐỎ', '92500', 'Sản phẩm đậu đỏ hữu cơ của Organicfood.vn được trồng và chế biến với chất lượng an toàn trong mỗi bước tuân theo đúng tiêu chuẩn hữu cơ nghiêm ngặt và các hướng dẫn từ nông trại đến lúc đóng gói.', 'Các nghiên cứu trên động vật còn cho thấy protein chứa trong đậu đỏ có khả năng ức chế các α-glucosidas trong đường ruột. α-glucosidas là một loại enzyme có nhiệm vụ phá vỡ các carbohydrate phức hợp như tinh bột và glycogen. Tác dụng này khiến cho đậu đỏ trở thành một sự lựa chọn tuyệt vời để bổ sung vào chế độ điều trị, kiểm soát cũng như ngăn ngừa bệnh đái tháo đường.', 'dau-do.jpg', 3, 0.5, 1, '2021-01-02 10:36:34'),
(12, 'HẠT HẠNH NHÂN MARKAL', '256000', 'Hạnh nhân có thể dùng trực tiếp kết hợp làm salad, các món bánh.', 'Cân bằng cholesterol trong cơ thể, cải thiện trí nhớ, tăng lưu thông máu, tốt cho hệ tim mạch, cân bằng và điều hòa huyết áp, giảm cân hiệu quả, nhuận trường... Làm đẹp da và tăng cường hệ miễn dịch, rất tốt cho phụ nữ mang thai và sự phát triển toàn diện của trẻ nhỏ.', 'hanh-nhan.jpg', 3, 0.25, 0, '2021-01-02 10:36:34'),
(13, 'DƯA LƯỚI GIỐNG NHẬT RUỘT XANH', '125000', 'Dưa lưới Biển Hoàng Gia - SeaRoyal được canh tác theo quy trình định hướng Organi đạt tiêu chuẩn JAS Nhật Bản khắt khe đánh giá, cho độ ngọt thanh mà vẫn giữ được hàm lượng dinh dưỡng cao.', 'Theo các nhà nghiên cứu Pháp, thay đổi thói quen dùng dưa lưới mỗi ngày có thể giúp chúng ta giảm tải căng thẳng và mệt mỏi một cách hiệu quả. Ngoài ra còn phòng chống ung thư, tốt cho hệ tiêu hóa, ngăn ngừa các bệnh liên quan đến tim mạch, hỗ trợ làm đẹp, giảm căng thẳng, mệt mỏi.', 'dua-luoi-ruot-xanh.jpg', 3, 1, 0, '2021-01-02 10:36:34'),
(14, 'CHERRY NEW ZEALAND', '445000', 'Cherry New Zealand vỏ màu đỏ sẫm, quả căng mọng, chắc, bóng, vị ngọt. Những quả Cherry New Zealand căng bóng luôn là mặt hàng được khách hàng Việt Nam đặc biệt ưa chuộng, một đặc sản đắt tiền và thường dùng để làm quà biếu.', 'Cherry là nguồn vitamin A tuyệt vời, là loại trái cây giàu chất sắt, chất xơ cao, không cholesterol và Natri, tốt cho hệ miễn dịch, tiêu hóa và làm đẹp da. Cherry chống oxy hóa rất tốt cho tim mạch, giúp bảo vệ cơ thể chống lại bệnh ung thư và nó hoạt động như một loại thuốc giảm đau và giảm viêm cho các bệnh nhân gút và khớp. Cherry chứa melatonin – một chất giúp điều hòa giấc ngủ nên nó có thể giúp ngủ ngon. Cherry cũng là một món ăn nhẹ tốt cho sức khỏe mà trẻ em yêu thích. Cherry được ví là “Kim cương của hoa quả”, chính là một thực phẩm quý khách cần bổ sung vào thực đơn của mình.', 'cherry-new-zealand.jpg', 3, 0.5, 1, '2021-01-02 10:36:34'),
(15, 'DÂU GIỐNG NEW ZEALAND', '190000', 'Dâu tây Đà Lạt giống New Zealand được coi là một trong các giống dâu tây cao cấp được trồng thủy canh tại Đà Lạt. Không giống như giống Pháp và Mỹ được tròng trong nhà lướ, Dâu tây Đà Lạt giống New Zealand được trồng trong nhà kính.', 'Tạp chí Các nhân tố sinh học của Hà Lan đăng kết quả nghiên cứu cho thấy quả dâu tây là một thứ quả đặc biệt có lợi cho sức khỏe con người. Loại quả này chứa nhiều chất bổ hơn cả cà chua, quả kiwi, hay hoa lơ xanh, những loại thực phẩm nổi tiếng có giá trị dinh dưỡng cao, được nhiều người ưa dùng. Giá trị lớn nhất của quả dâu tây là tác dụng chữa bệnh mà người ta không tìm thấy trong bất kỳ loại thực phẩm nào khác. Trong quả dâu tây có chứa các chất bảo vệ, chống ôxy hóa nhiều gấp 10 lần quả cà chua. Trong phần thịt của quả dâu tây có các loại sinh tố A, B1, B2 và đặc biệt là lượng sinh tố C khá cao, hơn cả cam, dưa hấu. Đây là tính ưu việt của quả dâu tây giúp tăng sức đề kháng chống nhiễm trùng, nhiễm độc, cảm cúm và chống stress, lão hóa (oxy hóa). Với người hút thuốc lá hay người hít thuốc lá thụ động, các acid hữu cơ có trong dâu tây có hiệu quả giảm nhẹ tác hại của thuốc lá cho cơ thể. Người hút thuốc lá ngậm quả dâu trong miệng, cơn nghiện thuốc cũng sẽ giảm đi một ít.', 'dau-giong-new-zealand.jpg', 3, 0.25, 1, '2021-01-02 10:36:34'),
(16, 'TÔM HE PHÚ QUỐC', '300000', 'Tôm he Phú Quốc nổi tiếng với độ ngọt, giòn, vỏ mỏng và nhiều dưỡng chất.', 'Thích hợp chế biến các món nướng, hấp, làm canh, súp, cháo, gỏi,…', 'tom-he.jpg', 4, 0.5, 1, '2021-01-02 10:54:37'),
(17, 'NGHÊU TRẮNG SINH THÁI', '75000', 'Nghêu có thịt dày cơm, ngon.', 'Có 2 cách rã đông: giữ nguyên nghêu trong túi, rã đông túi nghêu trong môi trường nước 60-80 phút; cắt túi đựng, ngâm nghêu trực tiếp trong nước lạnh khoảng 30-40 phút. Lưu ý, cách rã đông thứ 2 này làm cho độ ngọt của nghêu giảm đi.', 'ngheu-sinh-thai.jpg', 4, 1, 0, '2021-01-02 10:54:37'),
(18, 'MỰC ỐNG PHÚ QUỐC', '208000', 'Mực ống Phú Quốc là một trong những đặc sản của Phú Quốc, là loại mực ngon nhất, được đánh bắt gần bờ, thời gian di chuyển vào đất liền nhanh nên mực rất tươi. Thịt mực ngọt và thơm và mát, có lợi cho sức khỏe.', 'Tại Organi, mực ống Phú Quốc được nhập về bằng đường hàng không, đảm bảo độ tươi sống cho sản phẩm. Thích hợp chế biến các món chiên, hấp, nướng,… Bảo quản lạnh để giữ sản phẩm tươi ngon lâu hơn.', 'muc-ong-phu-quoc.jpg', 4, 0.4, 1, '2021-01-02 10:54:37'),
(19, 'CÁ BẸ LÃO PHÚ QUỐC', '155000', 'Đặc điểm nhận dạng: Thân tương đối cao, dài, dẹp bên, đầu nhô cao, vây ngực cong dài, dọc theo phía trên lưng màu ánh xanh, màu bạc và trắng bạc ở phía dưới hông và bụng.', 'Đặc điểm nhận dạng: Thân tương đối cao, dài, dẹp bên, đầu nhô cao, vây ngực cong dài, dọc theo phía trên lưng màu ánh xanh, màu bạc và trắng bạc ở phía dưới hông và bụng. Tên thương mại là Diamond Trevally nên có thể thấy cơ thể cá hơi giồng hình kim cương. Đặc tính: Thịt mềm, ngọt, béo. Các cách chế biến: Canh chua, chiên áp chảo, nấu ngót, hấp, nấu cháo, nấu lẩu.', 'ca-be-lao-phu-quoc.jpg', 4, 0.5, 0, '2021-01-02 10:54:37'),
(20, 'CÁ DÌA BÔNG PHÚ QUỐC', '220000', 'Đặc điểm nhận dạng: thân dẹp tròn, da trơn màu nâu xám, trên thân hình có những chấm nâu đen, đầu nhỏ, mắt đen tròn. Là một món ăn ngon thịt cá ngọt, béo, dai, thơm ngon phù hợp với mỗi bữa ăn trong gia đình hoặc là món nhậu tốn nhiều bia, rượu của các đấng mày râu.', 'Cá Dìa Bông Phú Quốc là một loài cá trong họ cá Dìa, là loài quý nhất trong các loài cá Dìa.  Sống phổ biến ở vùng biển miền Trung Việt Nam, là loài cá có giá trị thương mại cao. Cá thường sống trong các ghềnh đá, bãi rạn san hô nên rất khó đánh bắt. Cá Dìa Bông to bằng bàn tay người lớn, thân hình mập, thịt béo, thơm ngon. Có thể chế biến thành: Cá dìa hấp nấm, nướng muối ớt, nướng mọi, nấu lẩu, nấu canh ngót, nấu canh chua.', 'ca-dia-bong-phu-quoc.jpg', 4, 1, 1, '2021-01-02 10:54:37'),
(21, 'BƠ HỮU CƠ GHEE', '399000', 'Bơ hữu cơ Ghee – bơ hữu cơ chưng cất tự nhiên từ sữa bò hữu cơ 100%, có hương caramel tự nhiên đã tách bỏ nước, rất ít lượng nước bên trong bơ, không chứa đường sữa, không chứa protein, không chứa Gluten.', 'Hương vị Ghee khá hấp dẫn, hơi hướng gần giống phô mai nhưng thơm ngon hơn. Là sản phẩm hữu cơ không sử dụng kháng sinh, chất biến đổi gen, chất hóa học,…   Thành phần: Bơ sữa hữu cơ. Công dụng: Bơ Ghee giàu các vitamin A, D, E, K,.. giúp chuyển đổi chất xơ thành axit butyric, có lợi cho hệ vi khuẩn đường ruột nên hỗ trợ quá trình tiêu hóa và hấp thụ dinh dưỡng. Cách sử dụng: Thích hợp nấu ăn ở nhiệt độ cao như rán, nướng hoặc trộn với các loại nguyên liệu khác. Bảo quản lạnh và giữ ở nơi khô ráo 3 – 7 độ C.', 'bo-huu-co-ghee.jpg', 5, 0.368, 0, '2021-01-02 11:17:07'),
(22, 'TRỨNG GÀ TA (10 QUẢ)', '100000', 'Trứng hữu cơ chuẩn 100% vỉ 8 quả, gà thả vườn hữu cơ, được nuôi thả tại Nông trại được chứng nhận USDA, EU.', 'Trứng hơi nhỏ nhưng lòng đỏ VÀNG ƯƠM, DẺO QUÁNH, nấu lên có mùi THƠM chứ không tanh như trứng gà công nghiệp. Tất nhiên hàm lượng dinh dưỡng trong trứng gà thả vườn là nhiều hơn trứng gà công nghiệp.', 'trung-ga-ta.jpg', 5, 0.2, 1, '2021-01-02 11:17:07'),
(23, 'TRỨNG VỊT (5 QUẢ)', '35000', 'Với trang trại vịt được chăn nuôi sinh thái, dùng thức ăn thủy hải sản tự nhiên: đầu tôm, ruột cá... Sản phẩm mới đầu tiên có mặt tại thị trường trứng gia cầm hiện nay, \"trứng vịt Omega 3\" hay còn gọi là \"trứng vịt lòng đào\" của chúng tôi được sản xuất từ trang trại đạt chuẩn chất lượng, trứng có nguồn dinh dưỡng cao.', 'Với trang trại vịt được chăn nuôi sinh thái, dùng thức ăn thủy hải sản tự nhiên: đầu tôm, ruột cá... Sản phẩm mới đầu tiên có mặt tại thị trường trứng gia cầm hiện nay, \"trứng vịt Omega 3\" hay còn gọi là \"trứng vịt lòng đào\" của chúng tôi được sản xuất từ trang trại đạt chuẩn chất lượng, trứng có nguồn dinh dưỡng cao. Nguồn Omega 3 trong trứng sẽ giảm được tỉ lệ triglixerit trong máu, giảm chelesteron tốt, giảm tỉ lệ tim mạch, chống nhiễm trùng, giảm sự trầm cảm...', 'trung-vit-omega-3.jpg', 5, 0.1, 0, '2021-01-02 11:17:07'),
(24, 'BƠ ĐẬU PHỘNG - CACAO', '225000', 'Sự kết hợp hoàn hảo giữa đậu phộng và cacao làm nên một hương vị vô cùng tuyệt vời. Chỉ cần chút bơ đậu phộng cacao phết lên lát bánh mì bạn sẽ có một bữa sáng hoàn hảo, đủ chất dinh dưỡng và lành sạch.', 'Sự kết hợp hoàn hảo giữa đậu phộng và cacao làm nên một hương vị vô cùng tuyệt vời. Chỉ cần chút bơ đậu phộng cacao phết lên lát bánh mì bạn sẽ có một bữa sáng hoàn hảo, đủ chất dinh dưỡng và lành sạch. Thành phần: Đậu phộng hữu cơ, bột cacao. Không dầu thêm, không muối, không đường. Có thể chứa đậu phộng, vừng, hạt khác. HDSD: Ăn trực tiếp với bánh mì, salad... Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng mặt trời.', 'bo-dau-phong-cacao.jpg', 5, 0.375, 1, '2021-01-02 11:17:07'),
(25, 'BƠ ĐẬU PHỘNG - DỪA', '225000', 'Bơ lạc hay còn gọi là bơ đậu phộng có thành phần chính là lạc rang nghiền thành bột. Đây là món ăn khoái khẩu của nhiều người, đặc biệt là trẻ em. Sản phẩm có chứa nhiều protein, nguồn chất béo không bão hòa, dễ tiêu, cung cấp một phần thiết yếu chất dinh dưỡng hữu ích cho cơ thể.', 'Chế độ ăn giàu lạc và bơ lạc làm giảm hàm lượng cholesterol “xấu” và giúp kiểm soát trọng lượng cơ thể, nên nó sẽ giúp chúng ta phòng ngừa 2 căn bệnh nguy hiểm là tim mạch và béo phì. Bơ đậu phộng & dừa hữu cơ Mayver’s với các thành phần: 100% nguyên chất, hoàn toàn tự tự nhiên, không thêm dầu, không thêm đường, không muối. Cách dùng: dùng để phết với bánh mỳ ăn sáng, trộn cùng mứt hoa quả cũng rất ngon. Có thể cho bơ lạc vào vài lát táo hoặc lê. Dùng làm nước sốt dưới thịt, cá nướng. Pha nước chấm gỏi cuốn, nấu súp, làm gia vị cho món xốt, nước xốt và ăn kèm với các loại thức ăn ưa thích khác. Có thể bảo quản trong tủ lạnh đến 6 tháng sau khi đã ở nắp, thậm chí để ở nhiệt độ phòng cũng được thời gian rất dài.', 'uploads/jcalendar-1.2.2.jar', 5, 0.375, 0, '2021-01-02 11:17:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`, `type_img`) VALUES
(5, 'Bơ và trứng', 'bo-va-trung.jpg'),
(4, 'Hải sản', 'hai-san.jpg'),
(1, 'Thịt tươi', 'thit-tuoi.jpg'),
(2, 'Rau củ', 'rau-cu.jpg'),
(3, 'Trái cây và hạt', 'trai-cay-va-hat.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnhanhang`
--

DROP TABLE IF EXISTS `thongtinnhanhang`;
CREATE TABLE IF NOT EXISTS `thongtinnhanhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinnhanhang`
--

INSERT INTO `thongtinnhanhang` (`id`, `hoten`, `diachi`, `email`, `sdt`, `ghichu`) VALUES
(76, 'lê anh vũ', '1234ThuDuc', 'lav@gmail.com', '0918265240', 'ghi chu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `created_at`) VALUES
(1, 'leanhvu', 'e10adc3949ba59abbe56e057f20f883e', '', 1, '2020-12-31 03:54:52'),
(2, 'quachtranthanhtuyen', 'e10adc3949ba59abbe56e057f20f883e', '', 1, '2020-12-31 03:55:00'),
(20, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 'user1@gmail.com', 2, '2020-12-31 03:57:10'),
(21, 'chunchun19', 'e807f1fcf82d132f9bb018ca6738a19f', 'a@gmail.com', 2, '2021-01-07 07:49:41'),
(22, 'leanhvu1412', 'e10adc3949ba59abbe56e057f20f883e', 'leanhvu1412@gmail.com', 2, '2021-01-07 16:40:06'),
(23, 'nhom123456789', '202cb962ac59075b964b07152d234b70', 'leanhvu550@gmail.com', 2, '2021-01-08 02:14:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
