-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 04:09 PM
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
-- Database: `ql_nongsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHH` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `GiaBan` double DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHH`, `MaHD`, `GiaBan`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 20, 5, 100),
(2, 1, 15, 3, 45),
(3, 2, 10, 4, 40),
(4, 3, 25, 5, 125);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaHH` int(11) NOT NULL,
  `GiaNhap` double DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MaPN`, `MaHH`, `GiaNhap`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 10, 100, 1000),
(1, 2, 15, 50, 750),
(2, 3, 12, 80, 960),
(3, 4, 8, 120, 960);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHH` int(11) NOT NULL,
  `MANHH` int(11) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `DVT` varchar(100) DEFAULT NULL,
  `GiaBan` double DEFAULT NULL,
  `GiaNhap` double DEFAULT NULL,
  `MoTa` varchar(100) DEFAULT NULL,
  `HinhAnh` varchar(50) DEFAULT NULL,
  `SoLuongTon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MaHH`, `MANHH`, `TenHH`, `DVT`, `GiaBan`, `GiaNhap`, `MoTa`, `HinhAnh`, `SoLuongTon`) VALUES
(1, 1, 'Rau salad', 'Bó', 10.5, 10.5, 'Mô tả sản phẩm A', 'hinh_anh_A.jpg', 50),
(2, 2, 'Khoai tây', 'Kg', 5.75, 5.75, 'Mô tả sản phẩm B', 'hinh_anh_B.jpg', 20),
(3, 3, 'Táo', 'Kg', 3.25, 3.25, 'Mô tả sản phẩm C', 'hinh_anh_C.jpg', 100),
(4, 4, 'Nấm', 'Gói', 2.99, 2.99, 'Mô tả sản phẩm D', 'hinh_anh_D.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `NgayGiao` date DEFAULT NULL,
  `TongTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaNV`, `MaKH`, `NgayDat`, `TinhTrang`, `NgayGiao`, `TongTien`) VALUES
(1, 2, 1, '2024-03-15', 'Đang xử lý', NULL, 100.5),
(2, 3, 2, '2024-03-16', 'Đã giao', '2024-03-17', 75.25),
(3, 4, 3, '2024-03-16', 'Đang giao', NULL, 50),
(4, 5, 2, '2024-03-17', 'Đang xử lý', NULL, 120.75),
(5, 1, 5, '2024-03-18', 'Đã giao', '2024-03-18', 95);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `SDT`, `Username`, `Password`, `Email`, `DiaChi`) VALUES
(1, 'Nguyễn Văn Phú', '0987654321', 'nvp', '123456', 'nva@gmail.com', 'Lê Trọng Tấn'),
(2, 'Trần Thị Dung', '0123456789', 'ttb', 'abcdef', 'ttb@gmail.com', 'Bình Chánh'),
(3, 'Lê Văn Sỹ', '0912345678', 'lvc', 'qwerty', 'lvc@gmail.com', 'Lạc Long Quân'),
(4, 'Phạm Thị Kim', '0876543210', 'ptd', 'xyz123', 'ptd@gmail.com', 'Thành Thái'),
(5, 'Hoàng Văn Cường', '0965432187', 'hve', 'password', 'hve@gmail.com', 'Điện Biên Phủ');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `SDTNCC` varchar(11) NOT NULL,
  `DiaChiNCC` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `SDTNCC`, `DiaChiNCC`) VALUES
(1, 'LangFarm', '0765486382', 'Bình Thạnh'),
(2, 'Nông sản Nguyên Vy', '0765486383', 'Lâm Đồng'),
(3, 'SUNRISE INS', '0765486384', 'Tp.HCM'),
(4, 'Thành Nam', '0765486385', 'Bình Dương'),
(5, 'Nam Đô', '0765486386', 'Đà Nẵng');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `ChucVu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `SDT`, `Username`, `Password`, `ChucVu`) VALUES
(1, 'Nguyễn Thị Hồng', '0988888888', 'ntx', 'p@ssw0rd', 'Quản lý'),
(2, 'Trần Văn Anh', '0911111111', 'tvy', 'secure123', 'Nhân viên'),
(3, 'Lê Thị Yến', '0966666666', 'ltz', 'abcd1234', 'Nhân viên'),
(4, 'Phạm Văn Kiệt', '0899999999', 'pvk', 'password123', 'Nhân viên'),
(5, 'Hoàng Thị Linh', '0866666666', 'htl', 'qwerty123', 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNHH` int(11) NOT NULL,
  `TenNHH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNHH`, `TenNHH`) VALUES
(1, 'Trái Cây'),
(2, 'Rau'),
(3, 'Củ'),
(4, 'Nấm');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `TongTien` double DEFAULT NULL,
  `NgayNhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaNCC`, `TongTien`, `NgayNhap`) VALUES
(1, 2, 1, null, '2024-03-10'),
(2, 1, 3, null,  '2024-03-11'),
(3, 4, 2, null,  '2024-03-12'),
(4, 3, 4, null, '2024-03-13'),
(5, 5, 1, null, '2024-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHH`,`MaHD`),
  ADD KEY `FK_CTHD_HoaDon` (`MaHD`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MaPN`,`MaHH`),
  ADD KEY `FK_CTPN_HH` (`MaHH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHH`),
  ADD KEY `FK_HH_NHH` (`MANHH`);

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
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Indexes for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNHH`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `FK_PN_NV` (`MaNV`),
  ADD KEY `FK_PN_NCC` (`MaNCC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MaHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  MODIFY `MaNHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_CTHD_HangHoa` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`),
  ADD CONSTRAINT `FK_CTHD_HoaDon` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `FK_CTPN_HH` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`),
  ADD CONSTRAINT `FK_CTPN_PN` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_HH_NHH` FOREIGN KEY (`MANHH`) REFERENCES `nhomhanghoa` (`MaNHH`);

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
  ADD CONSTRAINT `FK_PN_NCC` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `FK_PN_NV` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
