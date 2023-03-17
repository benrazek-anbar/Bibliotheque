CREATE DATABASE bibliotheque;
USE bibliotheque;
--table cart--
CREATE TABLE `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) 
--table `message`--
CREATE TABLE `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) 

--table order--
CREATE TABLE `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
)

--table products--
CREATE TABLE `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
)

--table user--
CREATE TABLE `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
)