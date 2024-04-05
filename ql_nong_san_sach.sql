-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 10:40 AM
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
-- Database: `ql_nong_san_sach`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHang` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT 1,
  `ThanhTien` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHang`, `MaHD`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaHang` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT 5,
  `ThanhTien` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MaPN`, `MaHang`, `GiaNhap`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 50000, 5, 0);

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
  `GiaBan` float NOT NULL,
  `HeSo` float DEFAULT 1.2,
  `GiaNhap` float NOT NULL,
  `HinhAnh` varchar(50) DEFAULT 'Chưa xác định',
  `SoLuongTon` int(11) DEFAULT 0,
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MaHang`, `MaNhomHang`, `MaNCC`, `TenHang`, `DVT`, `GiaBan`, `HeSo`, `GiaNhap`, `HinhAnh`, `SoLuongTon`, `TrangThai`) VALUES
(1, 4, 1, 'Chuối già Nam Mỹ', 'Kg', 20000, 1, 8000, 'chuoiGia.jpg', 16, b'1'),
(2, 4, 2, 'Dưa hấu đỏ', 'Kg', 12000, 1, 7000, 'duaHauDo.jpg', 8, b'1'),
(3, 4, 1, 'Dưa lưới', 'Kg', 70000, 1, 55000, 'duaLuoi.jpg', 12, b'1'),
(4, 4, 2, 'Cam vàng nội địa Trung', 'Kg', 41000, 1, 20000, 'camVang.jpg', 20, b'1'),
(5, 4, 3, 'Nho xanh Nam Phi', 'Kg', 140000, 1, 90000, 'nhoXanh.jpg', 8, b'1'),
(6, 4, 4, 'Dừa xiêm', 'Trái', 9000, 1, 4000, 'duaXiem.jpg', 10, b'1'),
(7, 4, 4, 'Quýt giống Úc', 'Kg', 45000, 1, 28000, 'quytUc.jpg', 12, b'1'),
(8, 4, 3, 'Cam sành', 'Kg', 18000, 1, 10000, 'camSanh.jpg', 23, b'1'),
(9, 4, 5, 'Táo Autumn Mỹ', 'Kg', 50500, 1, 27500, 'taoMy.jpg', 8, b'1'),
(10, 4, 5, 'Ổi Đài Loan', 'Kg', 21000, 1, 14000, 'oiDaiLoan.jpg', 6, b'1'),
(11, 1, 1, 'Cải bẹ xanh', 'Kg', 20000, 1, 7000, 'caiBeXanh.jpg', 9, b'1'),
(12, 1, 1, 'Cải ngọt', 'Kg', 19000, 1, 7500, 'caiNgot.jpg', 6, b'1'),
(13, 1, 2, 'Cải thìa', 'Kg', 18000, 1, 6000, 'caiThia.jpg', 11, b'1'),
(14, 1, 3, 'Cải bẹ dún', 'Kg', 31000, 1, 16500, 'caiBeDun.jpg', 9, b'1'),
(15, 1, 3, 'Rau dền', 'Kg', 20000, 1, 9000, 'rauDen.jpg', 12, b'1'),
(16, 1, 2, 'Rau lang', 'Kg', 28000, 1, 12000, 'rauLang.jpg', 14, b'1'),
(17, 1, 4, 'Rau mồng tơi', 'Kg', 20000, 1, 8500, 'rauMongToi.jpg', 6, b'1'),
(18, 1, 5, 'Rau muống nước', 'Kg', 20000, 1, 9000, 'rauMuongNuoc.jpg', 13, b'1'),
(19, 1, 5, 'Rau ngót', 'Kg', 48000, 1, 29500, 'rauNgot.jpg', 5, b'1'),
(20, 1, 4, 'Rau tần ô', 'Kg', 36000, 1, 21000, 'rauTanO.jpg', 6, b'1'),
(21, 2, 1, 'Khoai lang Nhật', 'Kg', 31500, 1, 23000, 'khoaiLangNhat.jpg', 7, b'1'),
(22, 2, 2, 'Bí đỏ hồ lô', 'Kg', 19000, 1, 9500, 'biDoHoLo.jpg', 12, b'1'),
(23, 2, 1, 'Bí xanh', 'Kg', 19500, 1, 11000, 'biXanh.jpg', 7, b'1'),
(24, 2, 2, 'Cà chua', 'Kg', 16000, 1, 9000, 'caChua.jpg', 12, b'1'),
(25, 2, 3, 'Cà rốt', 'Kg', 25000, 1, 12000, 'caRot.jpg', 9, b'1'),
(26, 2, 3, 'Khoai tây', 'Kg', 25000, 1, 13000, 'khoaiTay.jpg', 15, b'1'),
(27, 2, 4, 'Củ cải trắng', 'Kg', 22000, 1, 14000, 'cuCaiTrang.jpg', 6, b'1'),
(28, 2, 5, 'Củ dền', 'Kg', 36000, 1, 19500, 'cuDen.jpg', 9, b'1'),
(29, 2, 5, 'Khoai mỡ', 'Kg', 35000, 1, 26000, 'khoaiMo.jpg', 10, b'1'),
(30, 2, 4, 'Ớt chuông', 'Kg', 23000, 0.25, 73000, 'otChuong.jpg', 8, b'1'),
(31, 3, 5, 'Nấm hương', 'Kg', 28000, 0.15, 100000, 'namHuong.jpg', 6, b'1'),
(32, 3, 4, 'Nấm bào ngư trắng', 'Kg', 20000, 0.3, 51000, 'namBaoNguTrang.jpg', 5, b'1'),
(33, 3, 5, 'Nấm kim châm', 'Kg', 11000, 0.15, 55000, 'namKimCham.jpg', 7, b'1'),
(34, 3, 4, 'Nấm mối đen', 'Kg', 57500, 0.15, 300000, 'namMoiDen.jpg', 4, b'1'),
(35, 3, 5, 'Nấm linh chi', 'Kg', 33000, 0.15, 145000, 'namLinhChi.jpg', 6, b'1'),
(36, 3, 4, 'Nấm đùi gà', 'Kg', 25500, 0.2, 97000, 'namDuiGa.jpg', 3, b'1'),
(37, 3, 5, 'Nấm rơm', 'Kg', 30000, 0.18, 120000, 'namRom.jpg', 10, b'1'),
(38, 3, 4, 'Nấm Notaly', 'Kg', 18000, 0.2, 70000, 'namNotaly.jpg', 4, b'1'),
(39, 3, 5, 'Nấm tuyết', 'Kg', 30000, 0.05, 510000, 'namTuyet.jpg', 3, b'1'),
(40, 3, 5, 'Nấm mỡ nâu', 'Kg', 54000, 0.15, 280000, 'namMoNau.jpg', 7, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `NgayTao` datetime DEFAULT current_timestamp(),
  `TongTien` float DEFAULT 0,
  `TrangThai` varchar(50) DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaNV`, `MaKH`, `NgayTao`, `TongTien`, `TrangThai`) VALUES
(1, 1, 1, '2024-04-04 15:19:11', 0, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `SDT` varchar(30) DEFAULT 'Chưa xác định',
  `DiaChi` varchar(50) DEFAULT 'Chưa xác định',
  `TrangThai` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(1, 'Nguyễn Văn Phú', '0987654321', 'Lê Trọng Tấn', b'1'),
(2, 'Trần Thị Dung', '0123456789', 'Bình Chánh', b'1'),
(3, 'Lê Văn Sỹ', '0912345678', 'Lạc Long Quân', b'1'),
(4, 'Phạm Thị Kim', '0876543210', 'Thành Thái', b'1'),
(5, 'Hoàng Văn Cường', '0965432187', 'Điện Biên Phủ', b'1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(1, 'LangFarm', '0765486382', 'Bình Thạnh', b'1'),
(2, 'Nông sản Nguyên Vy', '0765486383', 'Lâm Đồng', b'1'),
(3, 'SUNRISE INS', '0765486384', 'Tp.HCM', b'1'),
(4, 'Thành Nam', '0765486385', 'Bình Dương', b'1'),
(5, 'Nam Đô', '0765486386', 'Đà Nẵng', b'1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NgayNhap` datetime DEFAULT current_timestamp(),
  `TongTien` float NOT NULL,
  `TrangThai` varchar(50) DEFAULT 'Đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaNCC`, `NgayNhap`, `TongTien`, `TrangThai`) VALUES
(1, 1, 1, '2024-04-04 15:33:29', 2000000, 'Đang xử lý');

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
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhomhang`
--
ALTER TABLE `nhomhang`
  MODIFY `MaNhomHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_ChiTietHoaDon_HoaDon` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `FK_ChiTietHoaDon_mahang` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `FK_ChiTietPhieuNhap_MaHang` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`),
  ADD CONSTRAINT `FK_ChiTietPhieuNhap_phieunhap` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_HangHoa_NhaCungCap` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `FK_HangHoa_NhomHang` FOREIGN KEY (`MaNhomHang`) REFERENCES `nhomhang` (`MaNhomHang`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HoaDon_KhachHang` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `FK_HoaDon_NhanVien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PhieuNhap_NhaCungCap` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `FK_PhieuNhap_NhanVien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
