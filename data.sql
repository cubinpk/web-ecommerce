-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 07:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`) VALUES
(1, 'Trần Quốc Phong', 'tranquocphong@gmail.com', 'tranquocphong', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `SoHD` int(11) NOT NULL,
  `SanPhamID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthd`
--

INSERT INTO `cthd` (`SoHD`, `SanPhamID`, `SoLuong`, `ThanhTien`) VALUES
(22740121, 27, 5, 89950000),
(22740121, 39, 1, 7490000),
(60787719, 19, 1, 10000000),
(60787719, 21, 1, 235000),
(60787719, 22, 1, 50000),
(192650315, 25, 3, 58500000),
(192650315, 36, 2, 13980000),
(342030226, 19, 1, 10000000),
(342030226, 21, 1, 235000),
(342030226, 22, 1, 50000),
(462865708, 28, 1, 14990000),
(563890633, 21, 1, 235000),
(563890633, 22, 1, 50000),
(727947294, 27, 2, 35980000),
(727947294, 35, 6, 20040000),
(811302909, 45, 2, 1180000),
(811302909, 63, 3, 450000),
(859173115, 27, 1, 17990000),
(879503379, 39, 1, 7490000),
(978206469, 27, 2, 35980000),
(978206469, 28, 3, 44970000),
(1105826926, 28, 2, 29980000),
(1129949914, 28, 5, 74950000),
(1131116147, 27, 5, 89950000),
(1136912107, 27, 1, 17990000),
(1219623106, 33, 4, 32760000),
(1636885331, 27, 1, 17990000),
(1712452474, 21, 1, 235000),
(1712452474, 22, 1, 50000),
(2058117673, 28, 1, 14990000),
(2058117673, 35, 2, 6680000);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `GioHangID` int(11) NOT NULL,
  `SanPhamID` int(11) NOT NULL,
  `SID` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`GioHangID`, `SanPhamID`, `SID`, `SoLuong`) VALUES
(150, 27, 'r9dh8qu0j16oc0mgnukjii6e6r', 1),
(156, 30, 'ttgks1agqbbdlstpjagi47fdjf', 1),
(157, 80, 'ttgks1agqbbdlstpjagi47fdjf', 1),
(173, 54, 'ad1lq1k19nr3gs8i0io2rjofc2', 2),
(181, 33, 'geh9bpgq1eurvobg5ni8darf22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `SoHD` int(11) NOT NULL,
  `KhachHangID` int(11) NOT NULL,
  `NgayHD` varchar(255) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `SID` varchar(255) NOT NULL,
  `GiaoHang` int(11) NOT NULL,
  `MaAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`SoHD`, `KhachHangID`, `NgayHD`, `TongTien`, `SID`, `GiaoHang`, `MaAdmin`) VALUES
(192650315, 8, '2020-12-30 00:54:23', 79728000, 'tqaktbnkd42330aim2re9lohqf', 0, NULL),
(462865708, 8, '2020-12-30 00:04:43', 16489000, 'cjusufqkvj6jbnlu1qv0mhdc80', 2, NULL),
(811302909, 8, '2020-12-29 23:58:03', 1793000, 'tqaktbnkd42330aim2re9lohqf', 2, NULL),
(1105826926, 7, '2020-12-30 00:58:52', 32978000, 'ecpnp1ag7f5nk2ugckdhprdbp2', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `KhachHangID` int(11) NOT NULL,
  `TenKhachHang` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DiaPhuong` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`KhachHangID`, `TenKhachHang`, `SDT`, `Password`, `DiaChi`, `DiaPhuong`, `Email`) VALUES
(7, 'Trần Xuân Lộc', '0348567948', '123', '24/5 Võ Văn Ngân, Q.Thủ Đức', 'TP Hồ Chí Minh', 'loc@gmail.com'),
(8, 'Lê Thị Mỹ Diệu', '0909887728', '123', '26/55 Nguyễn Giao Ban, TP.Đà Nẵng', 'HA', 'Dieu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `LoaiID` int(11) NOT NULL,
  `TenLoaiSP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`LoaiID`, `TenLoaiSP`) VALUES
(41, 'Tai Nghe'),
(42, 'Sạc, cáp điện thoại'),
(43, 'Ốp Lưng'),
(44, 'Loa'),
(46, 'Điện Thoại'),
(47, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `SanPhamID` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `LoaiID` int(11) NOT NULL,
  `ThuongHieuID` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `MoTa` varchar(400) NOT NULL,
  `Gia` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`SanPhamID`, `TenSanPham`, `LoaiID`, `ThuongHieuID`, `TinhTrang`, `MoTa`, `Gia`, `image`) VALUES
(25, 'Iphone 12 mini 64GB', 46, 15, 1, 'Sản phẩm nổi bật được ưa thích', 19500000, '7f098bd9d5.jpg'),
(26, 'Iphone 12 Pro Max 512GB ', 46, 15, 2, 'Sản phẩm mới ra mắt', 41999999, '4e4dc9b216.jpg'),
(27, 'Iphone 11 128GB', 46, 15, 1, 'Sản phẩm nổi bật', 17990000, '892fc301c9.jpg'),
(28, 'SamSung Galaxy S20', 46, 19, 1, 'Sản phẩm nổi bật', 14990000, '8eaff52fd5.jpg'),
(29, 'Sam Sung Galaxy Z Fold2 5G', 46, 19, 2, 'Sản phẩm mới', 49999000, 'cd3475cfdd.jpg'),
(30, 'Oppo Reno3 Pro', 46, 18, 2, 'Sản phẩm mới', 8900000, '0a4b6fde60.jpg'),
(32, 'Xiaomi 10T Pro', 46, 17, 2, 'Sản phẩm mới', 12950000, '68e3bfd4a4.jpg'),
(33, 'ViVo V20', 46, 20, 1, 'Sản phẩm nổi bật', 8190000, '392e2bb08e.jpg'),
(34, 'HuaWei Nova 7i', 46, 16, 1, 'sản phẩm nổi bật', 6990000, 'f2c8ec1b50.jpg'),
(35, 'Huawei Y6P', 46, 16, 1, 'sản phẩm nổi bật', 3340000, 'e79232d09a.jpg'),
(36, 'Xiaomi Poco', 46, 17, 1, 'sản phẩm nổi bật', 6990000, 'fa54de17ae.jpg'),
(37, 'Xiaomi Redmi Note 9s', 46, 17, 1, 'sản phẩm nổi bật', 5990000, '1dd467fece.jpg'),
(38, 'Iphone SE 256GB', 46, 15, 2, 'Sản phẩm mới', 16990000, '53ca6adf08.jpg'),
(39, 'Vsmart Aris', 46, 21, 2, 'Sản phẩm mới', 7490000, '1d621dca70.jpg'),
(40, 'ViVo Y12', 46, 20, 2, 'Sản phẩm mới', 4290000, '773a8d0275.jpg'),
(41, 'Oppo A15', 46, 18, 2, 'Sản phẩm mới ', 3490000, '9dea47023e.jpg'),
(42, 'Adapter Sạc 5W Iphone', 42, 15, 0, 'sản phẩm mặc định', 490000, '4cb28a4001.jpg'),
(44, 'Adapter Sạc 20W Iphone', 42, 15, 0, 'cục sạc', 792000, 'e2a18646d3.png'),
(45, 'Adapter Sạc 12W', 42, 15, 0, 'cục sạc', 590000, '2601e7338b.jpg'),
(46, 'Cáp Type C-Lightning', 42, 15, 0, 'cáp', 590000, 'f0eef76ecf.jpg'),
(47, 'Adapter chuyển đổi Type C sang HDMI', 42, 15, 0, 'Adapter chuyển đổi', 2490000, '3f9ab7e636.jpg'),
(49, 'Adapter Sạc Type C-87W', 42, 15, 0, 'Adapter sạc type C', 2790000, '473e4f612b.jpg'),
(50, 'Cáp 3 đầu 3 micro 1 Type', 42, 19, 0, 'sạc sam sung', 400000, '699ee450e3.jpg'),
(51, 'Đế sạc không dây 9W Qi Type C', 42, 19, 0, 'sạc sam sung', 500000, '9ab017aa1d.jpg'),
(52, 'Tai nghe Bluetooth Mozard R559X Đen', 41, 21, 0, 'tai nghe không dây', 450000, 'c8389e34e0.jpg'),
(54, 'Tai Nghe EP Gaming Asus', 41, 21, 0, 'tai nghe', 1170000, '0dba8024e0.jpg'),
(55, 'Tai nghe chụp tai Gaming corsair', 41, 21, 0, 'tai nghe', 890000, 'bf5ca3f282.jpg'),
(56, 'Tai nghe chụp tai MozardX G1 Đen', 41, 21, 0, 'tai nghe', 580000, 'dd17304562.jpg'),
(57, 'Ốp lưng Galaxy nhựa dẻo M51', 43, 19, 0, 'ốp lưng galaxy', 150000, 'd5e59b9305.jpg'),
(59, 'Ốp lưng iphone 12 promax', 43, 15, 0, 'ốp lưng iphone', 120000, '6d385940c9.jpg'),
(60, 'Ốp lưng vivo Y20', 43, 20, 0, 'ốp lưng vivo', 85000, 'fc8c96bf93.jpg'),
(61, 'Ốp lưng galaxy A11 nhựa dẻo', 43, 19, 0, 'ốp lưng', 105000, '6946581c74.jpg'),
(63, 'Ốp lưng iphone 12/12 pro', 43, 15, 0, 'ốp lưng', 150000, 'ee1372fbba.jpg'),
(64, 'Ốp lưng RealMe C12 Nhựa dẻo', 43, 21, 0, 'ốp lưng realme', 75000, '089cbb79cd.jpg'),
(65, 'Ốp lưng oppo R7 lite', 43, 18, 0, 'ốp lưng oppo', 120000, '95f0cdfe98.jpg'),
(66, 'Ốp lưng RedMi 9C', 43, 17, 0, 'ốp lưng redmi', 70000, '91cbab1e8a.jpg'),
(67, 'Tai nghe Bluetooth RoMan', 41, 21, 0, 'tai nghe bluetooth\r\n', 350000, '1353a184ae.jpg'),
(68, 'Tai nghe bluetooth true wire less', 41, 21, 0, 'tai nghe true wireless', 3290000, '5769a8d857.jpg'),
(69, 'Tai nghe EP bluetooth chống ồn', 41, 21, 0, 'tai nghe chống ồn', 3890000, 'e0750c8746.jpg'),
(70, 'Tai nghe chụp tai Gaming Rapoo', 41, 21, 0, 'tai nghe chup tai gaming', 790000, '668b68d026.jpg'),
(73, 'Loa bluetooth Sony Extra', 44, 21, 0, 'Loa bluetooth', 2490000, '7264f4bcc4.jpg'),
(74, 'Loa bluetooth Harman Kardon', 44, 21, 0, 'loa bluetooth', 7990000, '0e29cce055.jpg'),
(75, 'Loa bluetooth Harman Kardon Go', 44, 21, 0, 'Loa bluetooth', 5990000, '2fcbf14e41.jpg'),
(76, 'Loa vi tính FenDa', 44, 21, 0, 'loa vi tính', 935000, '61c5456c05.jpg'),
(77, 'Loa bluetooth JBL Go', 44, 21, 0, 'Loa bluetooth', 590000, '34d103ec79.png'),
(78, 'Loa bluetooth iCute', 44, 21, 0, 'loa icute', 500000, 'fc71bfe569.jpg'),
(79, 'Loa bluetooth Wetop H8008 Bạc', 44, 21, 0, 'loa we top bạc', 1275000, 'd960b2627c.jpg'),
(80, 'Loa bluetooth Esaver', 44, 21, 0, 'loa blue tooth esaver', 810000, 'd863cb24ce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieusp`
--

CREATE TABLE `thuonghieusp` (
  `ThuongHieuID` int(11) NOT NULL,
  `TenThuongHieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuonghieusp`
--

INSERT INTO `thuonghieusp` (`ThuongHieuID`, `TenThuongHieu`) VALUES
(15, 'Apple'),
(16, 'Huawei'),
(17, 'Xiao Mi'),
(18, 'Oppo'),
(19, 'SamSung'),
(20, 'ViVo'),
(21, 'Khác');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`SoHD`,`SanPhamID`),
  ADD KEY `FK_CTHD2` (`SanPhamID`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`GioHangID`),
  ADD KEY `fk_gh1` (`SanPhamID`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`SoHD`),
  ADD KEY `fk_hd_ad` (`MaAdmin`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KhachHangID`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`LoaiID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`SanPhamID`),
  ADD KEY `fk_sp1` (`LoaiID`),
  ADD KEY `fk_sp2` (`ThuongHieuID`);

--
-- Indexes for table `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  ADD PRIMARY KEY (`ThuongHieuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `GioHangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `SoHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2058117674;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KhachHangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `LoaiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `SanPhamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  MODIFY `ThuongHieuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gh1` FOREIGN KEY (`SanPhamID`) REFERENCES `sanpham` (`SanPhamID`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_ad` FOREIGN KEY (`MaAdmin`) REFERENCES `admin` (`adminID`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp1` FOREIGN KEY (`LoaiID`) REFERENCES `loaisanpham` (`LoaiID`),
  ADD CONSTRAINT `fk_sp2` FOREIGN KEY (`ThuongHieuID`) REFERENCES `thuonghieusp` (`ThuongHieuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
