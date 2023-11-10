-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 09, 2023 lúc 04:53 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `DA1-Real-Estate`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`image_id`, `property_id`, `image_url`) VALUES
(1, 1, 'property1_image1.jpg'),
(2, 1, 'property1_image2.jpg'),
(3, 2, 'property2_image1.jpg'),
(4, 3, 'property3_image1.jpg'),
(5, 3, 'property3_image2.jpg'),
(6, 4, 'property4_image1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `negotiations`
--

CREATE TABLE `negotiations` (
  `negotiation_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price_offered` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `negotiations`
--

INSERT INTO `negotiations` (`negotiation_id`, `property_id`, `seller_id`, `customer_id`, `price_offered`, `status`, `created_at`) VALUES
(1, 1, 2, 1, 240000.00, 'Chấp nhận', '2023-10-05 03:30:00'),
(2, 2, 1, 2, 330000.00, 'Từ chối', '2023-10-20 08:45:00'),
(3, 3, 4, 3, 140000.00, 'Chấp nhận', '2023-10-25 02:30:00'),
(4, 4, 3, 4, 420000.00, 'Từ chối', '2023-10-15 09:15:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `category`, `description`, `content`, `created_at`) VALUES
(1, 1, 'Bài viết 1', 'Danh mục 1', 'Mô tả ngắn bài viết 1', 'Nội dung bài viết 1', '2023-11-02 07:00:00'),
(2, 2, 'Bài viết 2', 'Danh mục 2', 'Mô tả ngắn bài viết 2', 'Nội dung bài viết 2', '2023-11-03 03:15:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `properties`
--

CREATE TABLE `properties` (
  `property_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `title` varchar(225) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `acreage` bigint(20) NOT NULL,
  `floor_plans` varchar(255) NOT NULL,
  `tivis` int(11) DEFAULT NULL,
  `cameras` int(11) DEFAULT NULL,
  `built_in` int(11) DEFAULT NULL,
  `conditioner` int(11) DEFAULT NULL,
  `wifi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `properties`
--

INSERT INTO `properties` (`property_id`, `tag_id`, `user_id`, `description`, `price`, `location`, `status`, `title`, `views`, `beds`, `baths`, `acreage`, `floor_plans`, `tivis`, `cameras`, `built_in`, `conditioner`, `wifi`) VALUES
(1, 1, 1, 'Mô tả bất động sản 1', 250000.00, '123 Main St', 'Đã duyệt', 'Bất động sản 1', 500, 3, 2, 1500, 'floor_plan.jpg', 2, 4, 1, 3, 'wifi_available'),
(2, 2, 1, 'Mô tả bất động sản 2', 350000.00, '456 Elm St', 'Chưa duyệt', 'Bất động sản 2', 700, 4, 3, 2000, 'floor_plan2.jpg', 1, 2, 2, 2, 'wifi_not_available'),
(3, 3, 3, 'Mô tả bất động sản 3', 150000.00, '789 Oak St', 'Đã duyệt', 'Bất động sản 3', 300, 2, 1, 1000, 'floor_plan3.jpg', 1, 3, 0, 2, 'wifi_available'),
(4, 1, 4, 'Mô tả bất động sản 4', 450000.00, '987 Pine St', 'Chưa duyệt', 'Bất động sản 4', 600, 3, 2, 1800, 'floor_plan4.jpg', 2, 2, 1, 1, 'wifi_not_available');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `property_tags`
--

CREATE TABLE `property_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `property_tags`
--

INSERT INTO `property_tags` (`tag_id`, `tag_name`) VALUES
(1, 'Nhà đất'),
(2, 'View biển'),
(3, 'Căn hộ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `property_id`, `customer_id`, `seller_id`, `transaction_type`, `transaction_date`) VALUES
(1, 1, 1, 2, 'Mua bán', '2023-11-01'),
(2, 2, 2, 1, 'Thuê', '2023-10-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `roles` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `avatar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `roles`, `phone_number`, `avatar`) VALUES
(1, 12345, 'password123', 'user@example.com', 'John Doe', 'User', '123-456-7890', 'user_avatar.jpg'),
(2, 54321, 'pass456', 'admin@example.com', 'Admin User', 'Admin', '987-654-3210', 'admin_avatar.jpg'),
(3, 98765, 'password321', 'user3@example.com', 'Jane Smith', 'User', '555-555-5555', 'user3_avatar.jpg'),
(4, 24680, 'pass789', 'user4@example.com', 'Bob Johnson', 'User', '123-987-4567', 'user4_avatar.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Chỉ mục cho bảng `negotiations`
--
ALTER TABLE `negotiations`
  ADD PRIMARY KEY (`negotiation_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `fk_tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `property_tags`
--
ALTER TABLE `property_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`);

--
-- Các ràng buộc cho bảng `negotiations`
--
ALTER TABLE `negotiations`
  ADD CONSTRAINT `negotiations_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  ADD CONSTRAINT `negotiations_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `negotiations_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `property_tags` (`tag_id`);

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
