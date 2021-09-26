-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 21 2021 г., 17:07
-- Версия сервера: 8.0.22
-- Версия PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `service` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `name`, `phone`, `email`, `message`, `service`, `date`, `user_id`) VALUES
(23, 'Захар Владимирович Роговский', '+79087913843', 'zrogovskiy@gmail.com', 'Перезвоните пожалуйста', 'Предложение руки и сердца', '2021-03-30', 3),
(25, 'Захар', '+79087913843', 'zrogovskiy@gmail.com', 'Хочу проконсультироваться ', 'Корпоративы', '2021-04-03', 4),
(26, 'Иван', '+79087913843', 'RogoDeadpool4@yandex.ru', 'Хочу оформить мероприятие, пожалуйста свяжитесь со мной', 'Место и оформление праздника', '2021-04-30', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `file` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `file`, `description`) VALUES
(5, 'Свадьба', '362310_DMxaLBM0XyJVR3DX.jpg', 'Свадьба — это событие, которое происходит один раз в жизни, и поэтому, естественно, возникает желание провести его на самом высоком уровне. Если вы доверяете нам в организации вашей свадьбы, вы можете быть уверены, мы создадим для вас что-то совершенно уникальное и оригинальное.'),
(6, 'День рождение', '764845nbfihe29wa.jpg', 'Организация дня рождения для взрослых, как и организация любого другого праздника, особенная. Мы гарантируем замечательный день рождения независимо от места и времени, мы будем вместе с вами на каждом шагу; найдем и забронируем место проведения или банкетный зал; украсим любое место'),
(7, 'Корпоративы', '44701Ce3HdDoW8AEwnZY.jpg', 'Современный человек проводит треть дня на работе. Нет ничего удивительного в том, что любая корпоративная среда будет превращаться в рутину. Чтобы этого не случилось, стоит подумать о корпоративном: тимбилдинге; встречах персонала; семинарах по карьерному росту и т. д.'),
(8, 'Предложение руки и сердца', '77590scale_1200.jpg', 'Предложение руки и сердца — захватывающий период для каждого мужчины и женщины. Цель состоит в том, чтобы сделать его оригинальным, красивым и незабываемым. Чтобы достичь этой цели, необходимо будет продумать идею, место, декорации, тему и организовать все, чтобы сделать Предложение захватывающим моментом для нее.'),
(9, 'Особые праздники', '63344IMG3513.jpg', 'Особые праздники как правило проводятся для компаний с любимым человеком, друзей, коллег или семьи. Нет ничего лучше встречи только двух влюбленных, чтобы укрепить узы отношений. Основная цель ужина на двоих или встречи друзей — удивить и заставить ваших гостей или близкого человека, с которым вы провели много лет, по-новому взглянуть на вас.'),
(10, 'Предсвадебная вечеринка', '24462scenarii-provedeniya-devichnika.jpeg', 'Свадьба, безусловно, важный шаг в жизни, к которому нужно готовиться заранее. Но не менее важным событием является день до праздника. Это не просто день до свадьбы, он символизирует прощание с личной жизнью и начало пожизненного партнерства. Новые места, новые знакомства, новое все.'),
(11, 'Место и оформление праздника', '8932outdoor_weddin.jpeg', 'Мы поможем вам выбрать место проведения вашего мероприятия, руководствуясь вашими пожеланиями и бюджетом. Оставьте заявку, чтобы договориться о встрече, и мы проконсультируем вас по поводу выбора места проведения мероприятия.'),
(12, 'Звук и светомузыка', '540136996af9453d517dab4e1.jpg', 'Для организации любого праздничного мероприятия вам понадобится звуковое и световое оборудование. Мы готовы предложить вам высококачественную аудиосистему, осветительное оборудование, оборудование для сцены, систему спецэффектов и услуги диджея.'),
(13, 'Создание образа', '4117Svadebnyj-makiyazh-dlya-nevesty.jpg', 'При подготовке к важному событию каждая девушка старается продумать все мелочи и учесть мельчайшие детали, чтобы выглядеть действительно красиво. Наша профессиональная команда визажистов и стилистов способна создать образ, в котором Вы сможете с радостью появиться на любом мероприятии.'),
(14, 'Фотограф и видеограф', '1510857297006.jpg', 'Будь то свадьба, юбилей, выпускной — любое событие должно быть запечатлено фотографом или видеооператором. И дело не в том, чтобы получить пачку фотографий и сменить аватарку в социальных сетях на лучшую. У каждого человека есть моменты в жизни, к которым он хотел бы возвращаться снова и снова, вспоминая и заряжаясь от них радостными воспоминаниями.'),
(15, 'Артисты и шоу программы', '27261artist.jpg', 'Когда вы выбираете артистов и шоу-программу, необходимо учитывать несколько элементов: тема мероприятия; костюмы, которые будут носить артисты; концепция шоу; общение с гостями во время выступления; как долго будет продолжаться мероприятие и т. д. Кроме того, необходимо согласовать работу с MC и администратором банкетного зала или ресторана.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `login`, `pass`, `status`) VALUES
(2, 'Иванов Иван Федорович', 'test@mail.ru', 'test', '$2y$10$KEAD7qP6POuaZPYfOmTlceSfRG4rFEm3l4o7wKzLnCiO.rD31IomC', NULL),
(3, 'Чердынцев Денис Александрович', 'RogoDeadpool4@yandex.ru', 'login', '$2y$10$4lM1UiSz7lbzbSCbDkVpIuziQ238w66EFytOl9tVVaGgDMY6OEf9S', NULL),
(4, 'Захар Владимирович Роговский', 'zrogovskiy@gmail.com', 'admin', '$2y$10$iRihH.fyCXM40MPq.WEr0O1k/r9irzUybTshQPDPiER8JXnhwx7CC', 228);

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `secondname` varchar(100) NOT NULL,
  `specification` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `firstname`, `secondname`, `specification`, `description`, `file`, `tel`) VALUES
(9, 'Иван', 'Петров', 'Гл. Менеджер', '', '84758c1.jpg', '+79509565040'),
(10, 'Татьяна', 'Иванова', 'Тамада', '', '25849c3.jpg', '+79087913843'),
(12, 'Алиса', 'Лебедева', 'Аниматор', 'Аниматор для детей', '43526c2.jpg', '+78123266448');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
