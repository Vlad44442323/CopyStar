-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 07 2023 г., 08:31
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `copy_star`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-07 02:02:48', '2023-03-07 02:02:48');

-- --------------------------------------------------------

--
-- Структура таблицы `basket_products`
--

CREATE TABLE `basket_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basket_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket_products`
--

INSERT INTO `basket_products` (`id`, `basket_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 1, '2023-03-07 02:02:48', '2023-03-07 02:02:48');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`) VALUES
(1, 'Лазерные принтеры', 'lazer'),
(2, 'Струйные принтеры', 'struin'),
(3, 'Термопринтеры', 'termoprints'),
(4, 'Скоростные', 'speedyprints');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_21_085258_create_categories_table', 1),
(6, '2023_02_20_112701_create_products_table', 1),
(7, '2023_02_28_085321_create_baskets_table', 1),
(8, '2023_03_07_035625_create_basket_products_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `desc`, `img`, `country`, `year`, `model`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(10, 'Принтер лазерный Pantum P2502', 19990, 'Принтер лазерный Pantum P2502 станет отличным выбором для домашнего и офисного использования. С его помощью вы сможете с легкостью создавать большое количество бумажной документации за короткий промежуток времени. В основе работы принтера используется черно-белая лазерная технология, которая отличается своей эффективностью и качеством. Кроме того, модель поддерживает высокую скорость печати – до 22 страниц формата A4 в минуту. Кроме того, принтер отличается поддержкой высокого разрешения печати, благодаря чему готовые документы и фотографии порадуют вас высоким качеством.\r\nПринтер лазерный Pantum P2502 выполнен в прочном пластиковом корпусе с лаконичным дизайном. Для удобства использования на его лицевой панели предусмотрен набор светодиодных индикаторов, оповещающих о работе устройства, а также кнопка включения питания. Загрузка бумаги в данной модели осуществляется во вместительный отсек, рассчитанный на 150 листов разной плотности. В качестве картриджа используется сменный блок Pantum PC-212EV. Подключение принтера может осуществляться к компьютерам под управлением ОС Windows, Linux и MacOS при помощи USB-кабеля. Принтер поставляется в фирменной упаковке с набором кабелей и диском с ПО.', 'upload/MJhqMak9OPbs5gksHtnjWlDP2UmgUqpZ65BSJxqZ.jpg', 'Россия\\Russian', 2023, 'Pantum P2502', NULL, 1, '2023-02-25 22:24:17', '2023-02-25 22:24:17'),
(11, 'Принтер лазерный Pantum P2207', 8500, 'Принтер Pantum P2207 – узнаваемые черты дизайна и стильный черный цвет. Аппарат кардинально отличается от своих предшественников незаурядным дизайном и функциональностью. Загрузочный отсек для бумаги вмещает в себя до 150 листов. Время, затраченное на ожидание первой напечатанной страницы, было сокращено до 7.8 секунды. Аппарат оснащен одним картриджем с тонером и возможностью печатать на различных форматах бумаги. Картриджи производятся в двух вариациях – базовой и расширенной.\r\n\r\nPantum P2207 оснащен технологией лазерной печати с максимальным разрешением в 1200х1200 dpi. Скорость печатания документов достигает 20 страниц в минуту. Встроенный центральный процессор имеет тактовую частоту 600 МГц и ОП 128 мегабайта. Также в модель встроен разъем для установки карты памяти типа компакт. Способ подключения к ПК идет через высокоскоростной кабель USB. Аппарат подходит для операционных систем Windows, Mac OS и других.', 'upload/1XXN1caChkrjmMRriJIHSrUAeYUjreeBLfnJu7lC.jpg', 'Китай\\China', 2022, 'Pantum P2207', NULL, 1, '2023-02-25 22:53:56', '2023-02-25 22:53:56'),
(12, 'Принтер струйный Canon PIXMA G1420', 18999, 'Принтер струйный Canon PIXMA G1420 предназначен для использования дома или в небольшом офисе. С его помощью вы сможете печатать документы, фотографии, календари и другие материалы. В основе данного принтера содержится струйная технология, которая при использовании цветных чернил обеспечивает быструю высококачественную печать с яркими и насыщенными оттенками. Canon PIXMA G1420 оборудован системой непрерывной подачи чернил. Подключение к ПК осуществляется при использовании порта USB.', 'upload/Oz6ZBECuD6pOh77fqNSSZDPv36QrTYujzJ8WeKeK.jpg', 'Китай\\China', 2023, 'Canon PIXMA G1420', NULL, 2, '2023-02-25 22:55:33', '2023-02-25 22:55:33'),
(13, 'Принтер струйный Epson L1218', 12222, 'Принтер Epson L1218 позволяет выполнять черно-белую и цветную печать высокого качества. Он оборудован системой непрерывной подачи чернил и благодаря струйной пьезоэлектрической технологии обеспечивает получение четких отпечатков с насыщенной передачей цветов. Принтер Epson L1218 предусматривает печать как на обычной, так и на глянцевой бумаге или фотобумаге. В наборе изначально поставляются 4 емкости с чернилами, которые отличаются продолжительным ресурсом. Для подключения принтера к ПК применяется кабель с разъемом USB.', 'upload/pQphaIxqb2sIR7u0hGRpvQOYiS7wvJRkGi81HSat.jpg', 'Россия\\Russian', 2022, 'Epson L1218', NULL, 2, '2023-02-25 22:57:04', '2023-02-25 22:57:04'),
(15, 'Термопринтер Xprinter XP-365B для чеков', 4596, 'Термопринтер для печати этикеток XPrinter XP-365B - универсальное печатающее устройство, которое широко применяется для печатания этикеток, кассовых чеков, штрих-кодов и т. п. Эта модель термопринтера широко используется в торговых, складских, почтовых, логистических и других организациях. Для печати установлена сменная термоголовка, которая позволяет получать качество разрешения 203 dpi, рабочий ресурс печатающей головки достигает 30 000 метров. Максимальная скорость печати варьирует в пределах 12,7 см/сек. С помощью имеющегося USB-порта принтер можно подключить к ПК или ноутбуку, а также интегрировать в общую сеть организации. Совместим с ОС Linux и Windows. С помощью слота RJ11, к принтеру можно также подключать ящик для денег.', 'upload/d2vTRdRJu5ssQzj479hJecTydEIQ1DWi7F0yVZgz.jpg', 'Китай\\China', 2022, 'Xprinter XP-365B', NULL, 3, '2023-02-25 23:35:51', '2023-02-25 23:35:51'),
(16, 'Maks', 101, 'миапрапрарпар', 'upload/W68piJY71kTSiIGih5obXLfsKh8IejAkohmJDrYM.jpg', 'Россия\\Russian', 2002, 'Pantum P2502', NULL, 4, '2023-02-25 23:36:35', '2023-02-25 23:36:35');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patromyc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `lastname`, `name`, `patromyc`, `login`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', '(Главный)', NULL, 'admin', 'admin@mail.ru', NULL, '$2y$10$rjAg/BWsV/Dxdn7QYMgjAuw.T0nvWbp3s21vthAP7Yb6bv09Pv.wu', 'admin', 'b2ThPilbnJjI8E1AmpZsLYEbF896rlCSs8ZDosVNosvbmZK4UnG91SuUoha1', '2023-02-19 23:25:26', '2023-02-19 23:25:26'),
(2, 'Иванов', 'Иван', 'Иванович', 'ivanivanovich', 'ivan@mail.ru', NULL, '$2y$10$pkkrVVsPkjifXhqi5rv7SOH9Ao0P8lbaQiK2PwDbUvjpGuwy3z5TK', NULL, NULL, '2023-02-25 07:29:26', '2023-02-25 07:29:26'),
(3, 'тест', 'тест', NULL, 'test111', 'test11@mail.ru', NULL, '$2y$10$SvZwNlMrEHCw5bGzXqGHDOaiAMdgDBmel7vxd41UbRpwEzDM/m3Jq', NULL, '3jkYhWLaWl9spv7y0iHKWvQzDc0PYbQnqnbSVfWHqXaptmWJAsNop4HXAAwk', '2023-02-27 23:39:25', '2023-02-27 23:39:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baskets_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `basket_products`
--
ALTER TABLE `basket_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_products_basket_id_foreign` (`basket_id`),
  ADD KEY `basket_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `basket_products`
--
ALTER TABLE `basket_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `basket_products`
--
ALTER TABLE `basket_products`
  ADD CONSTRAINT `basket_products_basket_id_foreign` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
