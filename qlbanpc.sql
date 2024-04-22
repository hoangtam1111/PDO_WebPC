-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 04, 2024 lúc 01:13 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbanpc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `BrandId` int NOT NULL,
  `BrandName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `BrandLogo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`BrandId`, `BrandName`, `BrandLogo`) VALUES
(1, 'ASUS', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_2.png?v=602'),
(2, 'GIGABYTE', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_10.png?v=602'),
(3, 'MSI', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_7.png?v=602'),
(4, 'COLORFUL', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_16.png?v=602'),
(5, 'ZOTAC', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_17.png?v=602'),
(6, 'PowerColor', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_8.png?v=602'),
(7, 'PAUT', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_18.png?v=602'),
(8, 'OCPC', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_12.png?v=602'),
(9, 'GALAX', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_28.png?v=602'),
(10, 'Manli', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_34.png?v=602'),
(11, 'PNY', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_48.png?v=602'),
(12, 'ASRock', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_19.png?v=602'),
(13, 'SAPPHIRE', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_46.png?v=602'),
(15, 'intel', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_11.png?v=609'),
(16, 'AMD', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_14.png?v=609'),
(17, 'INVIĐIA', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_15.png?v=609'),
(18, 'NZXT', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_13.png?v=609'),
(19, 'VSP', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_32.png?v=609'),
(20, 'ADATA', 'https://theme.hstatic.net/200000420363/1001121558/14/image_shop_brand_47.png?v=609');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `IdCart` int NOT NULL,
  `MaSP` int NOT NULL,
  `IdUser` int NOT NULL,
  `Quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`IdCart`, `MaSP`, `IdUser`, `Quantity`) VALUES
(1, 61, 1, 10),
(2, 62, 1, 1),
(8, 63, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdh`
--

CREATE TABLE `ctdh` (
  `MaCTHD` int NOT NULL,
  `MaDH` int NOT NULL,
  `MaSP` int NOT NULL,
  `SoLuong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdh`
--

INSERT INTO `ctdh` (`MaCTHD`, `MaDH`, `MaSP`, `SoLuong`) VALUES
(1, 1, 65, 10),
(71, 28, 61, 1),
(72, 29, 62, 1),
(73, 30, 63, 1),
(74, 31, 61, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int NOT NULL,
  `NgayDat` date DEFAULT NULL,
  `MaUser` int DEFAULT NULL,
  `TongTien` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `NgayDat`, `MaUser`, `TongTien`) VALUES
(1, '2024-02-25', 1, 9900000),
(27, '2024-03-24', 4, 0),
(28, '2024-03-24', 4, 0),
(29, '2024-03-24', 4, 0),
(30, '2024-03-24', 4, 3575000),
(31, '2024-03-28', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoai` int NOT NULL,
  `TenLoai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoai`, `TenLoai`) VALUES
(1, 'CPU - Bộ xử lý'),
(2, 'Mainboard - Bo mạch chủ'),
(3, 'Case - Thùng máy'),
(4, 'PC Gaming - Học Tập'),
(5, 'SSD - HDD'),
(7, 'PC Văn Phòng - Làm Việc'),
(8, 'PC Đồ Họa - Thiết Kế'),
(11, 'Phím, Chuột, Tai Nghe'),
(12, 'VGA - Card màn hình'),
(13, 'Bộ nhớ RAM'),
(15, 'PSU - Nguồn máy tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int NOT NULL,
  `TenSP` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Gia` decimal(18,0) NOT NULL,
  `ThongTinSP` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Anh` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `SoLuong` int NOT NULL,
  `MaLoai` int NOT NULL,
  `BrandId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `ThongTinSP`, `Anh`, `SoLuong`, `MaLoai`, `BrandId`) VALUES
(61, 'CPU Intel Core I3 12100F | LGA1700, Turbo 4.30 GHz, 4C/8T, 12MB, Box Chính Hãng', 2290000, 'Bộ Sưu Tập Sản Phẩm: 12th Generation Intel® Core™ i3 Processors Tên mã: Alder Lake trước đây của các sản phẩm Số hiệu Bộ xử lý: i3-12100F', 'i3-12100f.webp', 30, 1, 15),
(62, 'CPU AMD RYZEN 3 3300X (3.8GHz Up to 4.3GHz, AM4, 4 Cores 8 Threads) Box Chính Hãng', 2590000, 'Hiện tại từ phía nhà AMD vừa có động thái ra mắt bổ sung thêm CPU desktop trong phân khúc giá tầm thấp là  Ryzen 3 3300X thuộc phân khúc Ryzen 3000 series, dự kiến ra mắt vào đầu tháng 5/2020.Những vi xử lý này sẽ được thừa hưởng những lợi thế cực kỳ to lớn trong thời điểm hiện tại của nhà AMD là kiến trúc Zen 2 trên tiến trình 7nm mạnh mẽ từ việc cải tiến IPC cũng như bộ nhớ đệm L3 cache.', 'a3-3300x.jpg', 50, 1, 15),
(63, 'CPU AMD Ryzen 5 5600 | AM4, Upto 4.40 GHz, 6C/12T, 32MB, Box Chính Hãng', 3575000, 'AMD Ryzen 5 5600 sở hữu cấu trúc Zen 3 mạnh mẽ, có nhiều cải tiến mới giúp hiệu năng hoạt động mạnh hơn thế hệ tiền nhiệm. Cấu trúc Zen 3 của AMD đã thay đổi với nhiều cấu trúc đa dạng. Cấu trúc nhân và bộ nhớ được gom về một khối tài nguyên thống nhất, giúp giảm độ trễ khi giữa các thành phần này. Cải tiến khả năng xử lý đơn nhân thể hiện ở chỉ số IPC tăng tổng thể lên tới 19% giúp cải thiện tốc độ chung.Tăng tốc độ xử lý trên CPU nhưng lại không đòi hỏi nhiều năng lượng hơn đồng nghĩa giảm mức độ tỏa nhiệt', 'A5-4600g.jpg', 50, 1, 16),
(64, 'CPU AMD Ryzen 7 7700X | AM5, Upto 5.40 GHz, 8C/16T, 32MB, Box Chính Hãng', 9290000, 'Ryzen \"Zen 4\" thế hệ tiếp theo của AMD đã có mặt ở đây và chúng tôi có các bài đánh giá! CPU AMD Ryzen 7 7700X mới được thiết kế cho các bản dựng PC chơi game hiệu suất cao, cho phép bạn chơi ở bất kỳ độ phân giải nào và với bất kỳ cài đặt trò chơi nào khi được ghép nối với một cạc đồ họa nhanh. Nó đi kèm với kết nối mới nhất, bao gồm bộ nhớ DDR5 và PCI-Express Gen 5, và một nền tảng hoàn toàn mới được xây dựng xung quanh Socket AM5 LGA mới.', 'a7-7700x.webp', 50, 1, 16),
(65, 'CPU AMD A8 7680 | 3.5GHz Up to 3.8GHz, FM2+, 4 Cores 4 Threads', 990000, 'AMD A8-7680 là bộ vi xử lý dành cho máy tính để bàn với 4 nhân 4 luồng, ra mắt vào tháng 10 năm 2018. Nó là một phần của dòng sản phẩm A8, sử dụng kiến ​​trúc Godaveri với Socket FM2 +. A8-7680 có 1MB bộ nhớ đệm L2 và hoạt động ở tốc độ 3,5 GHz theo mặc định, nhưng có thể tăng lên đến 3,8 GHz, tùy thuộc vào khối lượng công việc. AMD đang sản xuất A8-7680 trên tiến trình sản xuất 28 nm sử dụng 1,178 triệu bóng bán dẫn. Bạn có thể tự do điều chỉnh hệ số nhân mở khóa trên A8-7680, giúp đơn giản hóa việc ép xung rất nhiều, vì bạn có thể dễ dàng quay số ở bất kỳ tần số ép xung nào.', 'a8-7680.webp', 50, 1, 16),
(66, 'CPU Intel Core I3 10105F | LGA1200, Turbo 4.40 GHz, 4C/8T, 6MB', 1690000, 'Intel Core i3-10105F là bộ xử lý dành cho máy tính để bàn với 4 nhân 8 luồng, ra mắt vào tháng 3 năm 2021. Nó là một phần của dòng Core i3, sử dụng kiến ​​trúc Comet Lake với Socket 1200. Nhờ Intel Hyper-Threading, số lượng lõi được tăng gấp đôi một cách hiệu quả. Core i3-10105F có 6MB bộ nhớ đệm L3 và hoạt động ở tốc độ 3,7 GHz (default) theo mặc định, nhưng có thể tăng lên đến 4,4 GHz, tùy thuộc vào khối lượng công việc. Intel đang chế tạo Core i3-10105F trên quy trình sản xuất 14 nm, chưa rõ số lượng bóng bán dẫn. Hệ số nhân bị khóa trên Core i3-10105F, điều này làm hạn chế khả năng ép xung của nó.', 'i3-10100f.webp', 50, 1, 15),
(67, 'CPU Intel Core I5 10400F | LGA1200, Turbo 4.30 GHz, 6C/12T, 12MB, Box Chính Hãng', 2490000, 'CPU intel Core i5-10400 với 6 nhân 12 luồng thuộc dòng Comet Lake và được sản xuất trên tiến trình xử lý 14nm của hãng. CPU Intel Core i5-10400F ra mắt trong quý 2/2020, không hỗ trợ GPU Onboard, do bị vô hiệu trên những CPU dòng F. CPU Intel Core i5-10400F hướng đến phục vụ các đối tượng sử dụng cho việc giải trí, Game thủ và công việc liên quan đến đồ họa.', 'i5-10400f.webp', 50, 1, 15),
(68, 'CPU Intel Core I5 12400 | LGA1700, Turbo 4.40 GHz, 6C/12T, 18MB, Box Chính Hãng', 4390000, 'Model: i5 12400. Số nhân: 6; Số luồng: 12. Tần số turbo tối đa: 4,40 GHz. Tần số turbo cơ bản của lõi hiệu suất: 2,50 GHz. Công suất tối đa: 117 W. Dung lượng: 128 GB. Băng thông tối đa: 76.8 GB/s. Xử lý đồ họa: Intel UHD Graphics 730. Socket: FCLGA1700', 'i5-12400f.webp', 50, 1, 15),
(69, 'CPU Intel Pentium G6405 (4.10GHz, 4M, 2 Cores 4 Threads) Box Công Ty', 1790000, 'Intel Pentium Gold G6405 là bộ vi xử lý dành cho máy tính để bàn có 2 lõi, ra mắt vào tháng 3 năm 2021. Nó là một phần của dòng sản phẩm Pentium Gold, sử dụng kiến ​​trúc Comet Lake với Socket 1200. Nhờ Intel Hyper-Threading, số lõi được tăng gấp đôi một cách hiệu quả, đến 4 chủ đề.', 'pentum-g6400.webp', 50, 1, 15),
(70, 'CPU Intel Pentium G6400 (4.00GHz, 4M, 2 Cores 4 Threads) Box Chính Hãng', 1750000, 'CPU intel Pentium Gold G6400 với 2 nhân 4 luồng thuộc dòng Comet Lake và được sản xuất trên tiến trình xử lý 14nm của hãng. CPU Intel Pentium Gold G6400 ra mắt trong quý 2/2020, có sẵn GPU Onboard Intel UHD Graphics 610. CPU Intel Pentium Gold G6400 hướng đến phục vụ các đối tượng sử dụng cho việc giải trí, Game thủ và công việc liên quan đến văn phòng.', 'pentum-g6405.webp', 50, 1, 15),
(71, 'Mainboard Asus A68HM-K', 1190000, 'Bo mạch chủ Socket FM2+ với chất lượng đã được kiểm nghiệm, âm thanh rõ ràng và UEFI BIOS mới trên chipset A68H. Chất lượng được minh chứng – Hơn 1000 thiết bị tương thích. Hơn 7000 giờ kiểm tra.. Tính năng Âm thanh – Audio that roars on the battlefield. UEFI BIOS Mới – BIOS Đồ họa Điều khiển bằng Chuột Mượt Nhất và Đẹp Nhất. Tăng tốc USB 3.0 Boost (Hỗ trợ UASP) – Tốc độ truyền nhanh hơn 170% so với USB 3.0 truyền thống', 'asus-a68hm-k.webp', 10, 2, 1),
(72, 'Mainboard ASRock B760M PG Lightning | Intel B760, Socket 1700, Micro ATX, 4 khe DDR5', 2888000, '', 'asus-ex-b760m.webp', 10, 2, 1),
(73, 'Mainboard Asus H110M-K', 1390000, '5X Protection II – Tính năng bảo vệ phần cứng cao cấp cho sự bảo vệ toàn diện. Tương thích bộ nhớ DDR4. Âm thanh hoành tráng trong game với tấm chắn được đèn LED chiếu sáng. UEFI BIOS được giới truyền thông ca ngợi với EZ Flash 3', 'asus-h110m-k.webp', 10, 2, 1),
(74, 'Mainboard Asus H610M-K Prime DDR4', 1850000, 'Socket Intel® LGA 1700: Sẵn sàng cho bộ vi xử lý Intel® thế hệ thứ 12. Làm mát toàn diện: tản nhiệt PCH và Fan Xpert. Kết nối cực nhanh: khe M.2 32Gbps, Realtek 1 Gb Ethernet và hỗ trợ USB 3.2 Gen 1. 5X Protection III: Nhiều biện pháp bảo vệ phần cứng để bảo vệ toàn diện', 'asus-h610m-k-prime.webp', 10, 2, 1),
(75, 'Mainboard Asus Prime H510M-K R2.0 | Socket 1200, M-ATX, 2 khe ram', 1550000, 'Socket: LGA1200 Hỗ trợ CPU thế hệ 11 và thế hệ 10. Kích thước: microATX. Khe cắm RAM: 2 khe (Tối đa 64GB). Khe cắm mở rộng: 1 x PCIe 4.0/3.0 x16 slot, 1 x PCIe 3.0 x1 slot. Khe cắm ổ cứng: 4 x SATA 6Gb/s ports, 1 x M.2 SSD(PCIE/Sata)', 'asus-prime-h510m-k.webp', 10, 2, 1),
(76, 'Mainboard Gigabyte B560M DS3H V3 (rev. 1.0)', 1990000, 'Supports 10th Gen Intel® Core™ Processors and 11th Gen Intel® Core™ Processors*. Dual Channel Non-ECC Unbuffered DDR4, 4 DIMMs. NVMe PCIe Gen3 X4 M.2 Connectors. Smart Fan 5 Features Multiple Temperature Sensors,Hybrid Fan Headers with FAN STOP', 'gigabyte-b560m.webp', 10, 2, 2),
(77, 'Mainboard MSI B560M Pro-E', 1770000, 'Hỗ trợ các vi xử lý Intell® Core&trade thế hệ thứ 10;, Intel® Core&trade thế hệ thứ 11;,vi xử lý Pentium® Gold và Celeron® sử dụng socket LGA 1200. Hỗ trợ bộ nhớ DDR4 tốc độ tối đa lên đến 4800(OC) MHz. Core Boost : Với thiết kế khung và cấp điện kỹ thuật số cao cấp có thể hỗ trợ nhiều nhân xử lý hoạt động hiệu quả hơn. DDR4 Boost :  Công nghệ tiên tiến đem đến tín hiệu sạch cho hiệu năng và ổn định cao nhất. Trải nghiệm siêu tốc :  PCIe 4.0. Turbo M.2 :  Hoạt động với cấu hình PCI-E Gen3 x4 tối đa hiệu năng cho các ổ cứng SSD chuẩn NVMe. Audio Boost :  Thoả mãn đôi tai bạn với chất âm chuẩn phòng thu. Steel Armor :  Bảo vệ card đồ hoạ khỏi cong và nhiễu điện tử đem lại hiệu năng, ổn định và sức mạnh', 'msi-b560m-pro-e.webp', 10, 2, 3),
(78, 'Mainboard MSI H510M-B PRO', 1540000, 'Chuẩn mainboard: Micro-ATX. Socket: 1200 , Chipset: H470. Hỗ trợ RAM: 2 khe DDR4, tối đa 64GB. Lưu trữ: 4 x SATA 3 6Gb/s, 1 x M.2 SATA/NVMe. Cổng xuất hình: 1 x HDMI, 1 x VGA/D-sub. Chỉ hỗ trợ chạy CPU Gen 10', 'msi-h510m-b-pro.webp', 10, 2, 3),
(79, 'Mainboard MSI PRO H610M-E DDR4', 1820000, 'Hỗ trợ Bộ xử lý Intel ® Core ™ thế hệ thứ 12, Bộ xử lý Pentium ® Gold và Celeron ®. Socket LGA1700. Chipset	Intel ® H610. Bộ nhớ 2 khe cắm bộ nhớ DDR4, hỗ trợ lên đến 64GB. Hỗ trợ 1R 2133/2666/2933/3200 MHz (bởi JEDEC & POR). Hỗ trợ chế độ kênh đôi. Hỗ trợ bộ nhớ không ECC, không đệm', 'msi-pro-h610m-e.webp', 10, 2, 3),
(80, 'Mainboard Asus EX B760M V5 DDR4', 2450000, 'Socket: LGA1700 hỗ trợ CPU intel thế hệ 12 & 13. Kích thước: Micro ATX. Khe cắm RAM: 2 khe (Tối đa 128GB). Khe cắm mở rộng: 1 x PCIe 4.0 x16 slot, 2 x PCIe 4.0 x1 slots. Khe cắm ổ cứng: M.2 connectors, 4 x SATA 6Gb/s ports', 'asrock-b760-pg.webp', 10, 2, 12),
(81, 'Thùng máy Case Asus ROG Strix Helios GX601 White, Mid tower, Kèm 4 fan', 6840000, 'Kích thước: 250 x 565 x 591 mm (WxDxH). Kích thước vỏ: ATX Mid Tower. Dạng thiết kế: ATX/micro ATX/Mini ITX/EATX (12”x10.9”). Khay ổ đĩa: 2 x Khay nội bộ 2.5”/3.5” Combo Bay. 4 x Khay nội bộ 2.5” Bay. 1 x USB 3.1 Gen 2 (Type-C). 4 x USB 3.1 Gen 1. 1 x Tai nghe. 1 x Microphone. Các nút điều khiển LED và quạt. Nguồn điện: ATX', 'asus-rog-strix.webp', 10, 3, 1),
(82, 'Thùng máy case ASUS TUF Gaming GT502 - Đen', 2850000, 'Kích thước: 285 x 450 x 446mm. Trọng lượng: 12kg. Vật liệu: Thép, nhựa, kính cường lực. Loại Case: ATX, Micro-ATX, Mini-ITX', 'asus-tuf.webp', 10, 3, 1),
(83, 'Thùng máy case NZXT H7 Elite RGB Black', 3830000, 'Hãng sản xuất: NZXT. Bảo hành: 24 tháng. Màu sắc: Đen. Chất liệu: Thép SGCC, kính cường lực. Trọng lượng: 11.36 kg', 'nzxt-h7-elite.webp', 10, 3, 18),
(84, 'Thùng máy Case NZXT H9 Elite (Black/ White) | Mid Tower, kèm sẵn 4 fan', 5390000, 'Hãng: NZXT. Kích cỡ: Mid Tower. Màu sắc: Đen / trắng. Chất liệu: Thép SGCC, kính cường lực. Trọng lượng: 13.1 kg', 'nzxt-h9.webp', 10, 3, 18),
(85, 'Thùng máy Case VSP X1 Extreme Gaming White | Trắng, Không Fan', 2290000, 'Màu	Trắng. Vật liệu: 1mm SPCC, Black (Feet 2.0). PSU Form Factor	ATX. Trọng lượng: 12Kg/13.5Kg', 'vsp-x1.webp', 10, 3, 19),
(86, 'Thùng máy Case Adata XPG Invader White (Tặng 2 Fan)', 2550000, 'Đèn Nền ARGB Phía Trước. Bộ Điều Khiển XPG Prime™ ARGB Combo. Tích Hợp Cổng I/O Tinh Tế. Lưu Thông Khí Tốt nhờ Các Quạt Lắp Sẵn. Có Bộ Lọc Bụi, Thiết Kế Dạng Nam Châm Có Thể Tháo Lắp. Thiết Kế Tối Giản', 'adata-defender.webp', 10, 3, 20),
(87, 'Thùng máy Case Adata XPG Defender Pro White (Tặng 3 Fan ARGB)', 2550000, 'Kích thước E-ATX được tối ưu về không gian. Pano Mặt Trước Chắc Chắn dạng LƯỚI SẮT tích hợp các Dải Hiệu Ứng Ánh Sáng ARGB. Bộ Lọc Bụi Có Thể Tháo Rời. Bộ Điều Khiển Combo ARGB XPG PRIME™. Kết Cấu Luồng Khí Tối Ưu với x3 Quạt XPG VENTO 120 ARGB', 'adata-starker.webp', 10, 3, 20),
(88, 'Thùng máy Case Adata XPG Starker Air Trắng (Tặng Kèm 2Fan)', 1890000, '1 Fan 120mm + 1 Fan ARGB. Hãng sản xuất: Adata XPG. Hỗ trợ Mainboard: Mini-ITX, Micro-ATX, ATX. Cổng I/O: x2 USB 3.0,x1 Hybrid Audio Port,x1 LED Control Button. Chất liệu:Nhôm – kính cường lực 4mm (cạnh bên). Khối lượng: Trọng lượng Case: 7.37kg (16.2lb) ±5%', 'adata-xpg.webp', 10, 3, 20),
(89, 'Thùng máy Case NZXT H510 (CA-H510B-W1) (Trắng)', 1800000, 'Sản phẩm: Case - Vỏ máy tính. Model	NZXT H510 White. Kích thước (W: 210mm H: 435mm D: 428mm (không có chân))  (W: 210mm H: 460mm D: 428mm (có chân))', 'nzxt-h510.webp', 10, 3, 18),
(90, 'Thùng máy Case NZXT H9 Flow Black', 3300000, 'Thương Hiệu: NZXT. Model: H9 Flow Black. Loại Case: Mid Tower. Màu Sắc: Đen. Chất Liệu. Thép SGCC và kính cường lực', 'nzxt-h9-black.webp', 10, 3, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `UserName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Password`, `Name`, `Email`, `Address`, `Admin`) VALUES
(1, 'user1', 'pass1', 'Tâm', 'nvht@gmail.com', 'Tp.HCM', 1),
(4, 'user2', 'passnew', 'Minh Đức', 'nguyenvanhoangtam2556@gmail.com', '140 LTT', 0),
(5, 'user3', 'pass3', 'Thanh Hai', 'th@gmail.com', '140 LTT', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IdCart`),
  ADD KEY `IdUser` (`IdUser`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD PRIMARY KEY (`MaCTHD`),
  ADD KEY `MaDH` (`MaDH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `BrandId` (`BrandId`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `IdCart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  MODIFY `MaCTHD` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `ctdh_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ctdh_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`BrandId`) REFERENCES `brand` (`BrandId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
