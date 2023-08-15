-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 15, 2023 lúc 12:06 PM
-- Phiên bản máy phục vụ: 8.0.33
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qly_nhan_su`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baohiem`
--

CREATE TABLE `baohiem` (
  `id_baohiem` int UNSIGNED NOT NULL,
  `mabaohiem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydangki` date NOT NULL,
  `noidangki` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noikhambenh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baohiem`
--

INSERT INTO `baohiem` (`id_baohiem`, `mabaohiem`, `ngaydangki`, `noidangki`, `noikhambenh`, `id`) VALUES
(2, '1234567890', '2023-08-15', 'Bệnh viên quận 9', 'Bệnh viện đa khoa Tp HCM', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id_chuyennganh` int UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id_chuyennganh`, `ten`, `mota`) VALUES
(1, 'Lập trinh web - Laravel', 'Lập trình viên Web Backend, ngôn ngữ sử dụng PHP - framework Laravel'),
(2, 'Lập trình Web React - Node Js', 'Lập trình viên Web Frontend, ngôn ngữ sử dụng Javascript- framework React Js'),
(3, 'Tuyển dụng nhân sự', 'Người tuyển dụng nhân viên cho công ty - HR'),
(4, 'Digital Marketing', 'thực hiện việc PR cho công ty trên nền tảng số');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_07_12_020338_taikhoan', 2),
(4, '2023_07_12_020656_phongban', 2),
(5, '2023_07_12_020809_trinhdo', 2),
(7, '2023_07_12_021056_baohiem', 2),
(17, '2023_07_12_014940_nhanvien', 4),
(18, '2023_07_12_024721_chuyennganh', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int UNSIGNED NOT NULL,
  `ho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` int NOT NULL,
  `ngaysinh` date NOT NULL,
  `CCCD` int UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytuyendung` date DEFAULT NULL,
  `active` int NOT NULL,
  `id_phongban` int UNSIGNED NOT NULL,
  `id_chuyennganh` int UNSIGNED NOT NULL,
  `id_trinhdo` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ho`, `ten`, `gioitinh`, `ngaysinh`, `CCCD`, `email`, `diachi`, `sdt`, `avatar`, `ngaytuyendung`, `active`, `id_phongban`, `id_chuyennganh`, `id_trinhdo`, `created_at`, `updated_at`) VALUES
(1, 'Đồng Nguyễn Bút', 'Giang', 1, '2001-08-09', 212885035, 'butgiang1@gmail.com', '1025 Quang Trung, TP Quảng Ngãi', '0528575730', '', NULL, 1, 1, 1, 1, NULL, '2023-07-16 21:15:54'),
(2, 'staff', '1', 0, '2000-11-11', 1111111111, 'butgiang12@gmail.com', '1025 Quang Trung, TP Quảng Ngãi', '11111111', '', NULL, 1, 3, 4, 3, '2023-07-18 19:17:10', '2023-07-18 19:17:10'),
(3, 'staff', '2', 0, '2002-03-14', 222222222, 'butgiang123@gmail.com', '1025 Quang Trung, TP Quảng Ngãi', '2222222222', '', NULL, 0, 1, 1, 1, '2023-07-20 20:18:47', '2023-07-20 20:19:25'),
(4, 'staff', '3', 0, '2006-01-12', 11111223, 'butgiang12345@gmail.com', '1025 Quang Trung, TP Quảng Ngãi', '2222222225', NULL, '2023-08-15', 1, 4, 4, 4, '2023-08-14 21:00:05', '2023-08-14 21:00:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `id_phongban` int UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`id_phongban`, `ten`, `mota`) VALUES
(1, 'Phòng CNTT', 'Đảm nhận việc liên quan đến lập trình trong công ty'),
(2, 'Phòng Quản lý nhân sự', 'đảm nhiệm việc quản lý nguồn nhân lực trong công ty'),
(3, 'Phòng Marketing', 'đảm nhiệm việc quảng bá, PR cho công ty'),
(4, 'Phòng kinh doanh', 'đảm nhiệm việc đưa ra các chiến lược kinh doanh cho công ty');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qtpt`
--

CREATE TABLE `qtpt` (
  `id_qtpt` int NOT NULL,
  `trinhdohocvan` int NOT NULL,
  `anhTDHV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kinhnghiemlamviec` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `qtpt`
--

INSERT INTO `qtpt` (`id_qtpt`, `trinhdohocvan`, `anhTDHV`, `kinhnghiemlamviec`, `id`) VALUES
(1, 2, NULL, 'Thực tập 6 tháng tại công ty X', 1),
(2, 0, NULL, 'Mới ra trường', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `user_token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `email`, `password`, `role`, `user_token`, `id`) VALUES
(1, 'butgiang1@gmail.com', '$2y$10$sRskFONCbshJw/sxOTN8SOhDQrLgVKAZb4S/h71wM7FsgX4SpGVEi', 1, '393e9sdqRw4ym3ul', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannganhang`
--

CREATE TABLE `taikhoannganhang` (
  `id_tknh` int NOT NULL,
  `tennganhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotaikhoan` int NOT NULL,
  `id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoannganhang`
--

INSERT INTO `taikhoannganhang` (`id_tknh`, `tennganhang`, `sotaikhoan`, `id`) VALUES
(3, 'Vietcombank', 123456789, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtuu`
--

CREATE TABLE `thanhtuu` (
  `id_thanhtuu` int NOT NULL,
  `loai` int UNSIGNED NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaycap` date DEFAULT NULL,
  `mota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtuu`
--

INSERT INTO `thanhtuu` (`id_thanhtuu`, `loai`, `ten`, `ngaycap`, `mota`, `hinhanh`, `id`) VALUES
(1, 1, 'ielts', '2023-08-15', 'đạt được chứng chỉ ielts 9.0', NULL, 1),
(2, 2, 'Đạt giải nhất cuộc thi DevRun', '2023-08-15', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdo`
--

CREATE TABLE `trinhdo` (
  `id_trinhdo` int UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trinhdo`
--

INSERT INTO `trinhdo` (`id_trinhdo`, `ten`) VALUES
(1, 'Intern'),
(2, 'Fresher '),
(3, 'Junior'),
(4, 'Middle'),
(5, 'Senior');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  ADD PRIMARY KEY (`id_baohiem`),
  ADD UNIQUE KEY `baohiem_mabaohiem_unique` (`mabaohiem`),
  ADD KEY `baohiem_id_foreign` (`id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id_chuyennganh`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `CCCD` (`CCCD`),
  ADD KEY `nhanvien_id_chuyennganh_foreign` (`id_chuyennganh`),
  ADD KEY `nhanvien_id_phongban_foreign` (`id_phongban`),
  ADD KEY `nhanvien_id_trinhdo_foreign` (`id_trinhdo`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id_phongban`);

--
-- Chỉ mục cho bảng `qtpt`
--
ALTER TABLE `qtpt`
  ADD PRIMARY KEY (`id_qtpt`),
  ADD KEY `fk_qtpt_stafff` (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD UNIQUE KEY `taikhoan_email_unique` (`email`),
  ADD KEY `taikhoan_id_foreign` (`id`);

--
-- Chỉ mục cho bảng `taikhoannganhang`
--
ALTER TABLE `taikhoannganhang`
  ADD PRIMARY KEY (`id_tknh`),
  ADD KEY `fk_TKNH_id` (`id`);

--
-- Chỉ mục cho bảng `thanhtuu`
--
ALTER TABLE `thanhtuu`
  ADD PRIMARY KEY (`id_thanhtuu`),
  ADD KEY `fk_tt_staff` (`id`);

--
-- Chỉ mục cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  ADD PRIMARY KEY (`id_trinhdo`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  MODIFY `id_baohiem` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id_chuyennganh` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id_phongban` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `qtpt`
--
ALTER TABLE `qtpt`
  MODIFY `id_qtpt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoannganhang`
--
ALTER TABLE `taikhoannganhang`
  MODIFY `id_tknh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thanhtuu`
--
ALTER TABLE `thanhtuu`
  MODIFY `id_thanhtuu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  MODIFY `id_trinhdo` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  ADD CONSTRAINT `baohiem_id_foreign` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_id_chuyennganh_foreign` FOREIGN KEY (`id_chuyennganh`) REFERENCES `chucvu` (`id_chuyennganh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nhanvien_id_phongban_foreign` FOREIGN KEY (`id_phongban`) REFERENCES `phongban` (`id_phongban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nhanvien_id_trinhdo_foreign` FOREIGN KEY (`id_trinhdo`) REFERENCES `trinhdo` (`id_trinhdo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `qtpt`
--
ALTER TABLE `qtpt`
  ADD CONSTRAINT `fk_qtpt_stafff` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_id_foreign` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoannganhang`
--
ALTER TABLE `taikhoannganhang`
  ADD CONSTRAINT `fk_TKNH_id` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtuu`
--
ALTER TABLE `thanhtuu`
  ADD CONSTRAINT `fk_tt_staff` FOREIGN KEY (`id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
