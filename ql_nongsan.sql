-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 04:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ql_nongsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHang` int(11) NOT NULL,
  `MaNhomHang` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `DVT` varchar(30) DEFAULT 'Chưa xác định',
  `TrongLuong` float DEFAULT 0,
  `DonViTrongLuong` varchar(30) DEFAULT 'Chưa xác định',
  `GiaBan` float NOT NULL,
  `HeSo` float DEFAULT 1.2,
  `GiaNhap` float NOT NULL,
  `HinhAnh` varchar(50) DEFAULT 'Chưa xác định',
  `SoLuongTon` int DEFAULT 0,
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `hanghoa`
--
DELIMITER $$
CREATE TRIGGER `insert_giaban` BEFORE INSERT ON `hanghoa` FOR EACH ROW BEGIN
    SET NEW.GiaBan = NEW.GiaNhap * NEW.HeSo;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_giaban` BEFORE UPDATE ON `hanghoa` FOR EACH ROW BEGIN
    -- Kiểm tra xem giá nhập hoặc hệ số có thay đổi không
    IF OLD.GiaNhap != NEW.GiaNhap OR OLD.HeSo != NEW.HeSo THEN
        -- Tính lại giá bán và cập nhật vào cột GiaBan
        SET NEW.GiaBan = NEW.GiaNhap * NEW.HeSo;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MaHang`, `MaNhomHang`, `MaNCC`, `TenHang`, `DVT`, `TrongLuong`, `DonViTrongLuong` , `GiaBan`, `HeSo`, `GiaNhap`, `HinhAnh`, `SoLuongTon`, `TrangThai`) VALUES
(1, 4, 1, 'Chuối già Nam Mỹ', 'Túi', 500, 'g' , 12000, 1.2, 12500, 'chuoiGia.jpg', 20, b'1'),
(2, 4, 2, 'Dưa hấu đỏ', 'Trái', 2, 'Kg', 9600, 1.2, 26000, 'duaHauDo.jpg', 15, b'1'),
(3, 4, 1, 'Dưa lưới', 'Trái', 1.3, 'Kg', 72000, 1.2, 50000, 'duaLuoi.jpg', 22, b'1'),
(4, 4, 2, 'Cam vàng nội địa Trung', 'Túi', 500 , 'g', 24000, 1.2, 20000, 'camVang.jpg', 19, b'1'),
(5, 4, 3, 'Nho xanh Nam Phi', 'Túi', 500, 'g', 108000, 1.2, 125000, 'nhoXanh.jpg', 10, b'1'),
(6, 4, 4, 'Dừa xiêm', 'Trái', 1.3, 'Kg' , 14400, 1.2, 12000, 'duaXiem.jpg', 30, b'1'),
(7, 4, 4, 'Quýt giống Úc', 'Túi', 500, 'g', 33600, 1.2, 22500, 'quytUc.jpg', 12, b'1'),
(8, 4, 3, 'Cam sành', 'Túi', 2 , 'Kg', 24000, 1.2, 25000, 'camSanh.jpg', 23, b'1'),
(9, 4, 5, 'Táo Autumn Mỹ', 'Túi', 500, 'g', 33000, 1.2, 25000, 'taoMy.jpg', 8, b'1'),
(10, 4, 5, 'Ổi Đài Loan', 'Túi', 500, 'g', 16800, 1.2, 7500, 'oiDaiLoan.jpg', 6, b'1'),
(11, 1, 1, 'Cải bẹ xanh', 'Bó', 400, 'g', 8400, 1.2, 7500, 'caiBeXanh.jpg', 9, b'1'),
(12, 1, 1, 'Cải ngọt', 'Bó', 400, 'g', 9600, 1.2, 7500, 'caiNgot.jpg', 11, b'1'),
(13, 1, 2, 'Cải thìa', 'Túi', 500, 'g', 7200, 1.2, 10000, 'caiThia.jpg', 11, b'1'),
(14, 1, 3, 'Cải bẹ dún', 'Túi', 400, 'g', 19800, 1.2, 10000, 'caiBeDun.jpg', 9, b'1'),
(15, 1, 3, 'Rau dền', 'Bó', 400, 'g', 10800, 1.2, 7500, 'rauDen.jpg', 22, b'1'),
(16, 1, 2, 'Rau lang', 'Bó', 400, 'g' , 14400, 1.2, 7500, 'rauLang.jpg', 14, b'1'),
(17, 1, 4, 'Rau mồng tơi', 'Bó', 400, 'g' , 10200, 1.2, 7500, 'rauMongToi.jpg', 6, b'1'),
(18, 1, 5, 'Rau muống nước', 'Bó', 400, 'g', 10800, 1.2, 7500, 'rauMuongNuoc.jpg', 13, b'1'),
(19, 1, 5, 'Rau ngót', 'Bó', 400, 'g', 35400, 1.2, 7500, 'rauNgot.jpg', 5, b'1'),
(20, 1, 4, 'Rau tần ô', 'Bó', 250, 'g', 25200, 1.2, 5000, 'rauTanO.jpg', 6, b'1'),
(43, 1, 4, 'Rau má', 'Túi', 200, 'g', 25200, 1.2, 7500, 'rauMa.jpg', 8, b'1'),
(44, 1, 4, 'Rau diếp cá', 'Túi', 400, 'g', 25200, 1.2, 5000, 'rauDiepCa.jpg', 10, b'1'),
(45, 1, 4, 'Rau cần ta', 'Túi', 200, 'g', 25200, 1.2, 7500, 'rauCanTa.jpg', 10, b'1'),
(46, 1, 4, 'Hẹ lá', 'Túi', 300, 'g' , 25200, 1.2, 7500, 'heLa.jpg', 10, b'1'),
(47, 1, 4, 'Rau cần tây', 'Túi', 300, 'g', 25200, 1.2, 7500, 'rauCanTay.jpg', 10, b'1'),
(21, 2, 1, 'Khoai lang Nhật', 'Túi', 1, 'Kg', 27600, 1.2, 7500, 'khoaiLangNhat.jpg', 7, b'1'),
(22, 2, 2, 'Bí đỏ hồ lô', 'Túi', 500, 'g', 11400, 1.2, 7500, 'biDoHoLo.jpg', 12, b'1'),
(23, 2, 1, 'Bí xanh', 'Túi', 500, 'g', 13200, 1.2, 12000, 'biXanh.jpg', 5, b'1'),
(24, 2, 2, 'Cà chua', 'Túi', 500, 'g', 10800, 1.2, 10000, 'caChua.jpg', 12, b'1'),
(25, 2, 3, 'Cà rốt', 'Túi', 500, 'g', 14400, 1.2, 7500, 'caRot.jpg', 9, b'1'),
(26, 2, 3, 'Khoai tây', 'Túi', 500, 'g', 15600, 1.2, 13000, 'khoaiTay.jpg', 15, b'1'),
(27, 2, 4, 'Củ cải trắng', 'Túi', 500, 'g', 16800, 1.2, 7500, 'cuCaiTrang.jpg', 6, b'1'),
(28, 2, 5, 'Củ dền', 'Túi', 500, 'g', 23400, 1.2, 13000, 'cuDen.jpg', 9, b'1'),
(29, 2, 5, 'Khoai mỡ', 'Túi', 500, 'g', 31200, 1.2, 14000, 'khoaiMo.jpg', 10, b'1'),
(30, 2, 4, 'Ớt chuông', 'Túi', 500, 'g', 87600, 1.2, 14000, 'otChuong.jpg', 8, b'1'),
(31, 3, 5, 'Nấm hương', 'Hộp', 150, 'g', 120000, 1.2, 30000, 'namHuong.jpg', 6, b'1'),
(32, 3, 4, 'Nấm bào ngư trắng', 'Hộp', 300, 'g', 61200, 1.2, 15000, 'namBaoNguTrang.jpg', 5, b'1'),
(33, 3, 5, 'Nấm kim châm', 'Hộp', 150, 'g', 66000, 1.2, 30000, 'namKimCham.jpg', 7, b'1'),
(34, 3, 4, 'Nấm mối đen', 'Hộp', 150, 'g', 360000, 1.2, 30000, 'namMoiDen.jpg', 4, b'1'),
(35, 3, 5, 'Nấm linh chi nâu', 'Hộp', 150, 'g' , 174000, 1.2, 30000, 'namLinhChi.jpg', 6, b'1'),
(36, 3, 4, 'Nấm đùi gà', 'Hộp', 200, 'g', 116400, 1.2, 30000, 'namDuiGa.jpg', 3, b'1'),
(37, 3, 5, 'Nấm rơm', 'Hộp', 150, 'g' , 144000, 1.2, 30000, 'namRom.jpg', 10, b'1'),
(38, 3, 4, 'Nấm Notaly', 'Hộp', 150, 'g', 84000, 1.2, 30000, 'namNotaly.jpg', 4, b'1'),
(39, 3, 5, 'Nấm tuyết', 'Hộp', 50, 'g', 612000, 1.2, 30000, 'namTuyet.jpg', 3, b'1'),
(40, 3, 5, 'Nấm mỡ nâu', 'Hộp', 150, 'g', 336000, 1.2, 30000, 'namMoNau.jpg', 7, b'1');

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `NgayTao` datetime DEFAULT current_timestamp(),
  `NgayGiao` datetime NOT NULL DEFAULT (current_timestamp() + interval 1 day),
  `TongTien` float DEFAULT 0,
  `TrangThai` varchar(50) DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaNV`, `MaKH`, `NgayTao`, `NgayGiao`, `TongTien`, `TrangThai`) VALUES
(1, 1, 1, '2024-04-04 15:19:11', '2024-04-13 00:00:00', 0, 'Đang giao hàng'),
(2, 2, 2, '2024-04-12 09:24:48', '2024-04-13 09:24:48', 0, 'Đang xử lý'),
(3, 3, 3, '2024-04-12 09:26:45', '2024-04-13 09:26:45', 0, 'Đã hủy'),
(4, 4, 4, '2024-04-12 09:27:11', '2024-04-13 09:27:11', 0, 'Đã giao hàng');

--
-- Triggers `hoadon`
--
DELIMITER $$
CREATE TRIGGER `UpdateHangHoaQuantityTrigger` AFTER UPDATE ON `hoadon` FOR EACH ROW BEGIN
    IF NEW.TrangThai = 'Đang giao hàng' THEN
        UPDATE hanghoa
        INNER JOIN chitiethoadon ON hanghoa.MaHang = chitiethoadon.MaHang
        SET hanghoa.SoLuongTon = hanghoa.SoLuongTon - chitiethoadon.SoLuong
        WHERE chitiethoadon.MaHD = NEW.MaHD;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHang` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT 1,
  `ThanhTien` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `chitiethoadon`
--
DELIMITER $$

CREATE TRIGGER `update_thanhtien` BEFORE INSERT ON `chitiethoadon`
FOR EACH ROW
BEGIN
    -- Tính toán giá trị mới của ThanhTien
   SET NEW.ThanhTien  = NEW.SoLuong * (SELECT GiaBan FROM hanghoa WHERE MaHang = NEW.MaHang);
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `update_tongtien` AFTER INSERT ON `chitiethoadon`
FOR EACH ROW
BEGIN
    UPDATE hoadon
    SET TongTien = (
        SELECT SUM(ThanhTien)
        FROM chitiethoadon
        WHERE MaHD = NEW.MaHD
    )
    WHERE MaHD = NEW.MaHD;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHang`, `MaHD`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 2, 0),
(11, 2, 3, 0),
(12, 2, 3, 0),
(13, 3, 2, 0),
(14, 3, 5, 0),
(15, 4, 2, 0),
(16, 4, 4, 0),
(23, 1, 2, 0),
(36, 2, 3, 0);

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NgayNhap` datetime DEFAULT current_timestamp(),
  `TongTien` float NOT NULL,
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaNCC`, `NgayNhap`, `TongTien`, `TrangThai`) VALUES
(1, 1, 1, '2024-04-04 15:33:29', 0, b'1'),
(2, 2, 1, '2024-04-09 20:33:44', 0, b'1');

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaHang` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT 5,
  `ThanhTien` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DELIMITER $$
CREATE TRIGGER `tinh_thanh_tien_insert` BEFORE INSERT ON `chitietphieunhap` FOR EACH ROW BEGIN
    SET NEW.ThanhTien = NEW.GiaNhap * NEW.SoLuong;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tinh_tong_tien_insert` AFTER INSERT ON `chitietphieunhap` FOR EACH ROW BEGIN
    UPDATE phieunhap
    SET TongTien = TongTien + (NEW.GiaNhap * NEW.SoLuong)
    WHERE MaPN = NEW.MaPN;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `update_gia_nhap_insert` AFTER INSERT ON `chitietphieunhap` FOR EACH ROW 
BEGIN
    IF NEW.GiaNhap > (
        SELECT GiaNhap 
        FROM hanghoa 
        WHERE MaHang = NEW.MaHang
    ) THEN
        UPDATE hanghoa
        SET GiaNhap = NEW.GiaNhap
        WHERE MaHang = NEW.MaHang;
	  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_so_luong_insert` AFTER INSERT ON `chitietphieunhap` FOR EACH ROW BEGIN
    UPDATE hanghoa
    SET SoLuongTon = SoLuongTon + NEW.SoLuong
    WHERE MaHang = NEW.MaHang;
END
$$
DELIMITER ;
--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MaPN`, `MaHang`, `GiaNhap`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 12500, 4, 40000),
(1, 3, 50000, 5, 60000),
(1, 6, 12000, 5, 60000),
(1, 12, 8000, 5, 40000),
(1, 15, 8000, 5, 40000);

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(30) DEFAULT 'Chưa xác định',
  `DiaChi` varchar(50) DEFAULT 'Chưa xác định',
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Username`, `Password`, `Email`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(1, 'Nguyễn Văn Phú', 'nguyenvanphu', '123', 'nvp@gmail.com', '0989341334', 'Lê Trọng Tấn', b'1'),
(2, 'Trần Thị Dung', 'tranthidung', '123', 'ttd@gmail.com', '0399639999', 'Bình Chánh', b'1'),
(3, 'Lê Văn Sỹ', 'levansy', '123', 'lvs@gmail.com', '0946731303', 'Lạc Long Quân', b'1'),
(4, 'Phạm Thị Kim', 'phanthikim', '123', 'ptk@gmail.com', '0777934114', 'Thành Thái', b'1'),
(5, 'Hoàng Văn Cường', 'hoangvancuong', '123', 'hvc@gmail.com', '0965432187', 'Điện Biên Phủ', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `SDT` varchar(30) DEFAULT 'Chưa xác định',
  `DiaChi` varchar(50) DEFAULT 'Chưa xác định',
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(1, 'LangFarm', '02633811081', 'TP.Đà Lạt', b'1'),
(2, 'Nông sản Nguyên Vy', ' 0902350132', 'Long An', b'1'),
(3, 'SUNRISE INS', '02836208046', 'TP.HCM', b'1'),
(4, 'Thành Nam', '0971001003', 'Bình Dương', b'1'),
(5, 'Nam Đô', '0977469999', 'Đà Nẵng', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `SDT` varchar(30) DEFAULT 'Chưa xác định',
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ChucVu` varchar(50) DEFAULT 'Nhân viên',
  `DiaChi` varchar(50) DEFAULT 'Chưa xác định',
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `SDT`, `UserName`, `Password`, `ChucVu`, `DiaChi`, `TrangThai`) VALUES
(1, 'Nguyễn Văn Bình', '0897785658', 'admin', 'admin123', 'Quản lý', 'TPHCM', b'1'),
(2, 'Hồ Văn Cường', '0897785623', 'cuong', '123', 'Nhân viên', 'TPHCM', b'1'),
(3, 'Trương Thị Tuyết Linh', '0897785612', 'linh', '123', 'Nhân viên', 'TPHCM', b'1'),
(4, 'Võ Văn Minh', '0897785123', 'minh', '123', 'Nhân viên', 'TPHCM', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhang`
--

CREATE TABLE `nhomhang` (
  `MaNhomHang` int(11) NOT NULL,
  `TenNhomHang` varchar(50) NOT NULL,
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomhang`
--

INSERT INTO `nhomhang` (`MaNhomHang`, `TenNhomHang`, `TrangThai`) VALUES
(1, 'Rau', b'1'),
(2, 'Củ', b'1'),
(3, 'Nấm', b'1'),
(4, 'Trái cây', b'1');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHang`,`MaHD`),
  ADD KEY `FK_ChiTietHoaDon_HoaDon` (`MaHD`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MaPN`,`MaHang`),
  ADD KEY `FK_ChiTietPhieuNhap_MaHang` (`MaHang`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHang`),
  ADD UNIQUE KEY `TenHang` (`TenHang`),
  ADD KEY `FK_HangHoa_NhomHang` (`MaNhomHang`),
  ADD KEY `FK_HangHoa_NhaCungCap` (`MaNCC`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_HoaDon_NhanVien` (`MaNV`),
  ADD KEY `FK_HoaDon_KhachHang` (`MaKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`),
  ADD UNIQUE KEY `TenNCC` (`TenNCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `nhomhang`
--
ALTER TABLE `nhomhang`
  ADD PRIMARY KEY (`MaNhomHang`),
  ADD UNIQUE KEY `TenNhomHang` (`TenNhomHang`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `FK_PhieuNhap_NhanVien` (`MaNV`),
  ADD KEY `FK_PhieuNhap_NhaCungCap` (`MaNCC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhomhang`
--
ALTER TABLE `nhomhang`
  MODIFY `MaNhomHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_ChiTietHoaDon_HoaDon` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `FK_ChiTietHoaDon_mahang` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
