-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:8889
-- Tid vid skapande: 17 dec 2018 kl 11:03
-- Serverversion: 5.7.23
-- PHP-version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `millhouse`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`categories_id`, `category`) VALUES
(1, 'sunglasses'),
(2, 'watches'),
(3, 'home decor');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`comments_id`, `content`, `posts_id`, `created_by`, `created_on`) VALUES
(1, 'yolo', 102, 2, '2018-12-04 00:00:00'),
(4, 'qowefqwe', 152, 2, '2018-12-07 00:00:00'),
(5, 'sdfsdf', 152, 2, '2018-12-07 00:00:00'),
(6, 'hej', 152, 2, '2018-12-07 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`posts_id`, `title`, `description`, `content`, `created_by`, `created_on`, `image`, `alt`, `category`) VALUES
(195, 'Fashion Fades, Only Style Remains the Same.', 'The best sunglasses this season!', '<p>I have my permanent muses and my muses of the moment. There are only three things I can do - make a dress, decorate a house, and entertain people. I don&#39;t like trends. They tend to make everybody look the same. My dresses are very reasonably priced, for dresses that are cut on the body. Today, I&#39;m very happy about myself, because I realized my dreams. I learned how to understand what people want.</p><p>Awkwardness gives me great comfort. I&#39;ve never been cool, but I&#39;ve felt cool. I&#39;ve been in the cool place, but I wasn&#39;t really cool - I was trying to pass for hip or cool. It&#39;s the awkwardness that&#39;s nice. I love women&#39;s fashion, but women don&#39;t need me as much as men do. It&#39;s the men who have nothing to wear. I love my beauty. It&#39;s not my fault. I didn&#39;t want to be a fashion designer, and for a good half of my career I didn&#39;t like it. I always wanted to do other things. I try as much as possible to give you a great basic product and what comes out, I feel, is really amazing.</p><p>Clothes mean nothing until someone lives in them. I have my favourite fashion decade, yes, yes, yes: &#39;60s. It was a sort of little revolution; the clothes were amazing but not too exaggerated. Sometimes the simplest things are the most profound. A woman has the age she deserves. In a meat-eating world, wearing leather for shoes and clothes and even handbags, the discussion of fur is childish.</p>', 9, '2018-12-17 10:36:05', 'uploads/shades3.jpg', 'Girl with sunglasses', 'sunglasses'),
(196, 'Sunshine Love', 'The days are always brighter when you\'re with the one you love.', '<p>I wanted to dress the woman who lives and works, not the woman in a painting. It pains me physically to see a woman victimized, rendered pathetic, by fashion. Sometimes the simplest things are the most profound. I&#39;m used to always deciding everything myself. It&#39;s a blessing, but also a terrible defect. Attention to detail is of utmost importance when you want to look good.</p><p>My breakfast is very important. I can design a collection in a day and I always do, cause I&#39;ve always got a load of Italians on my back, moaning that it&#39;s late. I can design a collection in a day and I always do, cause I&#39;ve always got a load of Italians on my back, moaning that it&#39;s late. I&#39;ve always tried to push myself technically and to push myself visually. That&#39;s been part of the journey. I always say: To be well dressed you must be well naked.</p><p>Luxury must be comfortable, otherwise it is not luxury. You have to be luxurious nude. It&#39;s difficult to move in the nude in front of a mirror. It&#39;s much easier to move when you&#39;re dressed. But if you can walk around in the nude easily in front of your man, if you can be luxurious in the nude, then you&#39;ve really got it. I want people to be afraid of the women I dress. Everything I do is a matter of heart, body and soul. Confidence. If you have it, you can make anything look good.</p><p>Everything I do is a matter of heart, body and soul. The great thing about fashion is that it always looks forward. Men have got more of a discerning eye. They appreciate cut and details, things that aren&#39;t so obvious. They like things that have cachet and gentlemanliness. Dressing up. People just don&#39;t do it anymore. We have to change that. Over the years I have learned that what is important in a dress is the woman who is wearing it.</p>', 9, '2018-12-17 10:39:21', 'uploads/sunglasses_love.jpg', 'Men hugging', 'sunglasses'),
(197, 'Lovely Winter', 'We bring you home decor which is filled with life and joy', '<p>Today, I&#39;m very happy about myself, because I realized my dreams. I learned how to understand what people want. I&#39;m a fashion designer and people think, what do I know? I am convinced that you don&#39;t need to spend a fortune to look like a million. I love you if you love me. What you wear is how you present yourself to the world, especially today when human contacts go so fast. Fashion is instant language.</p><p>It is not easy to dress well. If you cut a painter&#39;s hands off, he&#39;d still feel the urge to pick up a brush. What you wear is how you present yourself to the world, especially today when human contacts go so fast. Fashion is instant language. I like things simple. I wanted to dress the woman who lives and works, not the woman in a painting.</p><p>I don&#39;t really know how to do casual clothes. I have an obsession with details and pattern. Attitude is everything. That is the key of this collection, being yourself. Don&#39;t be into trends. Don&#39;t make fashion own you, but you decide what you are, what you want to express by the way you dress and the way to live. Fashion is to please your eye. Shapes and proportions are for your intellect.</p><p>I get ideas about what&#39;s essential when packing my suitcase. The only way to do something in depth is to work hard. Luxury must be comfortable, otherwise it is not luxury. You cannot be creative with people around you. Fashion is made to become unfashionable.</p>', 9, '2018-12-17 10:41:54', 'uploads/homedecor_winter_campain.jpg', 'Homedecor winter ', 'homedecor'),
(198, 'Seven Reasons to Wear a Watch', 'We give our best reasons in this article!', '<p>You have to always work against what you did before, and even against your taste. You can only go forward by making mistakes. Sometimes the simplest things are the most profound. I was the first person to have a punk rock hairstyle. You have to always work against what you did before, and even against your taste.</p><p>I always loved aesthetics. Not particularly fashion, but an idea of beauty. Today, I&#39;m very happy about myself, because I realized my dreams. I learned how to understand what people want. Doing collections, doing fashion is like a non-stop dialogue. Women are more sure of themselves today. They don&#39;t have to emulate the way men dress. An evening dress that reveals a woman&#39;s ankles while walking is the most disgusting thing I have ever seen.</p><p>A woman has the age she deserves. If you wear clothes that don&#39;t suit you, you&#39;re a fashion victim. You have to wear clothes that make you look better. There has to be a balance between your mental satisfaction and the financial needs of your company. My shows are about the complete woman who swallows it all. It&#39;s a question of survival. I have a fantastic relationship with money. I use it to buy my freedom.</p>', 9, '2018-12-17 10:43:56', 'uploads/watch_pocket.jpg', 'Pocket Watch', 'watches'),
(199, 'Home Decor. New Arrival for Christmas', 'Read about our new decoration!', '<p>I do not have one theme for each season, I just try to make beautiful clothes all year round. I adore the challenge of creating truly modern clothes, where a woman&#39;s personality and sense of self are revealed. I want people to see the dress, but focus on the woman. I sometimes feel that a pattern is almost a fashion statement in itself. Women are more sure of themselves today. They don&#39;t have to emulate the way men dress. Design is a constant challenge to balance comfort with luxe, the practical with the desirable.</p><p>My job is to bring out in people what they wouldn&#39;t dare do themselves. Fashion is always of the time in which you live. It is not something standing alone. But the grand problem, the most important problem, is to rejeuvenate women. To make women look young. Then their outlook changes. They feel more joyous. Fashion to me has become very disposable; I wanted to get back to craft, to clothes that could last. I love you if you love me. Fashion is to please your eye. Shapes and proportions are for your intellect.</p><p>I love the 2000s because everyone started to love haute couture. I am convinced that there can be luxury in simplicity. Age and size are only numbers. It&#39;s the attitude you bring to clothes that make the difference. I love you if you love me. I don&#39;t try to be in fashion; I don&#39;t try to follow trends. You just end up out of fashion that way.</p>', 9, '2018-12-17 10:45:13', 'uploads/melker_pick_5.jpg', 'Home Decor Living', 'homedecor'),
(200, 'The Top 10 Watches Hot List', 'All the watches we want now, and why.', '<p>If you wear clothes that don&#39;t suit you, you&#39;re a fashion victim. You have to wear clothes that make you look better. I&#39;ve always tried to push myself technically and to push myself visually. That&#39;s been part of the journey. Being one step ahead of a fashion trend is not so important to me. What matters is to always forge ahead. Men have got more of a discerning eye. They appreciate cut and details, things that aren&#39;t so obvious. They like things that have cachet and gentlemanliness. There is always an emotional element to anything that you make.</p><p>Fashion never stops. There is always the new project, the new opportunity. I design from instinct. It&#39;s the only way I know how to live. What feels good. What feels right. What is needed. Give me a problem and I will approach it creatively, from my gut. I am no longer concerned with sensation and innovation, but with the perfection of my style. Money doesn&#39;t buy elegance. You can take an inexpensive sheath, add a pretty scarf, gray shoes, and a wonderful bag, and it will always be elegant. I don&#39;t really know how to do casual clothes.</p>', 9, '2018-12-17 10:48:04', 'uploads/watch_woman.jpg', 'Watch woman', 'watches'),
(201, 'Watches for Every Time', 'Finding the right watch for life\'s adventures.', '<p>I have my permanent muses and my muses of the moment. It is important to be chic. I am convinced that there can be luxury in simplicity. Awkwardness gives me great comfort. I&#39;ve never been cool, but I&#39;ve felt cool. I&#39;ve been in the cool place, but I wasn&#39;t really cool - I was trying to pass for hip or cool. It&#39;s the awkwardness that&#39;s nice. Doing collections, doing fashion is like a non-stop dialogue.</p><p>Clothes mean nothing until someone lives in them. People said making clothes inside out was not proper. I disagreed, because clothes that are inside out are as beautiful as a cathedral. I like the things around me to be beautiful and slightly dreamy, with a feeling of worldliness. I think it&#39;s the responsibility of a designer to try to break rules and barriers. I try as much as possible to give you a great basic product and what comes out, I feel, is really amazing.</p><p>I believe in comfort. If you don&#39;t feel comfortable in your clothes, it&#39;s hard to think of anything else. Jeans represent democracy in fashion. Attention to detail is of utmost importance when you want to look good. The only way to do something in depth is to work hard. Luxury will be always around, no matter what happens in the world.</p><p>I love the 2000s because everyone started to love haute couture. I believe in comfort. If you don&#39;t feel comfortable in your clothes, it&#39;s hard to think of anything else. I like things simple. You can&#39;t just buy things for the label - it&#39;s ridiculous. Today, I&#39;m very happy about myself, because I realized my dreams. I learned how to understand what people want.</p>', 9, '2018-12-17 10:50:56', 'uploads/watches_4.jpg', 'watch handheld', 'watches'),
(202, 'High Quality Design Sunglasses by Japanese Craftsmen', 'Fashions fade, style is eternal.', '<p>My dresses are very reasonably priced, for dresses that are cut on the body. Every day I&#39;m thinking about change. I didn&#39;t want to be a fashion designer, and for a good half of my career I didn&#39;t like it. I always wanted to do other things. I think the idea of mixing luxury and mass-market fashion is very modern, very now - no one wears head-to-toe designer anymore. I have my favourite fashion decade, yes, yes, yes: &#39;60s. It was a sort of little revolution; the clothes were amazing but not too exaggerated.</p><p>I love things that age well - things that don&#39;t date, that stand the test of time and that become living examples of the absolute best. Clothes can transform your mood and confidence. The important thing is to take your time and not get stressed. You cannot be creative with people around you. Attitude is everything.</p><p>I don&#39;t care about money. I really don&#39;t care. I just want to do what I do. I like the irony in my work. I sometimes feel that a pattern is almost a fashion statement in itself. Fashion moves so quickly that, unless you have a strong point of view, you can lose integrity. A lot of self-importance goes on in the fashion industry. I&#39;m not like that.</p>', 9, '2018-12-17 10:52:50', 'uploads/sunglasses_bicycle.jpg', 'Girl on bicycle', 'sunglasses'),
(203, 'Five DIY Tips for a Better Living', 'Coco for coconuts!', '<p>You have to always work against what you did before, and even against your taste. Nostalgia is a very complicated subject for me. I&#39;m attracted by nostalgia but I refuse it intellectually. Give me time and I&#39;ll give you a revolution. The key to my collections is sensuality. First I made a dress because I was pregnant and I wanted to be the most beautiful pregnant woman. Then I made a sweater because I wanted to have one that wasn&#39;t like anyone else&#39;s.</p><p>Design is a series of creative choices - it&#39;s a collaborative effort, an evolutionary process. You choose your fabrics depending upon what you want to say, then you work with mills to get those fabrics. Through the process, you realize what you want it to be. My job is to bring out in people what they wouldn&#39;t dare do themselves. I love you if you love me. A woman is never sexier than when she is comfortable in her clothes. Fashion moves so quickly that, unless you have a strong point of view, you can lose integrity.</p><p>Go to a place where you&#39;re not going to be stressed, because a honeymoon itself can be a stressful thing. If you cut a painter&#39;s hands off, he&#39;d still feel the urge to pick up a brush. I never look at other people&#39;s work. My mind has to be completely focused on my own illusions. In a meat-eating world, wearing leather for shoes and clothes and even handbags, the discussion of fur is childish. It is difficult to talk about fashion in the abstract, without a human body before my eyes, without drawings, without a choice of fabric - without a practical or visual reality.</p>', 9, '2018-12-17 10:54:48', 'uploads/gabriel-786796-unsplash.jpg', 'Home decor 5 tips', 'homedecor'),
(204, 'Sometimes the Simplest Things are the Most Profound.', 'I am convinced that you don\'t need to spend a fortune to look like a million.', '<p>Some people think luxury is the opposite of poverty. It is not. It is the opposite of vulgarity. Money doesn&#39;t buy elegance. You can take an inexpensive sheath, add a pretty scarf, gray shoes, and a wonderful bag, and it will always be elegant. Being one step ahead of a fashion trend is not so important to me. What matters is to always forge ahead. Money doesn&#39;t buy elegance. You can take an inexpensive sheath, add a pretty scarf, gray shoes, and a wonderful bag, and it will always be elegant. I always say: To be well dressed you must be well naked.</p><p>I want people to be afraid of the women I dress. I do not have one theme for each season, I just try to make beautiful clothes all year round. I love things that age well - things that don&#39;t date, that stand the test of time and that become living examples of the absolute best. An evening dress that reveals a woman&#39;s ankles while walking is the most disgusting thing I have ever seen. It is not easy to dress well.</p><p>I never like to think that I design for a particular person. I design for the woman I wanted to be, the woman I used to be, and - to some degree - the woman I&#39;m still a little piece of. There is always an emotional element to anything that you make. I have an obsession with details and pattern. I&#39;m used to always deciding everything myself. It&#39;s a blessing, but also a terrible defect. Fashion to me has become very disposable; I wanted to get back to craft, to clothes that could last.</p><p>It is not easy to dress well. Sometimes incompetence is useful. It helps you keep an open mind. I am no longer concerned with sensation and innovation, but with the perfection of my style. In a meat-eating world, wearing leather for shoes and clothes and even handbags, the discussion of fur is childish. It is important to be chic.</p><p>The difference between style and fashion is quality. I&#39;m used to always deciding everything myself. It&#39;s a blessing, but also a terrible defect. I don&#39;t try to be in fashion; I don&#39;t try to follow trends. You just end up out of fashion that way. I never like to think that I design for a particular person. I design for the woman I wanted to be, the woman I used to be, and - to some degree - the woman I&#39;m still a little piece of. I want people to be afraid of the women I dress.</p>', 9, '2018-12-17 10:56:42', 'uploads/melker_pick_1.jpg', 'Girl with sunglasses', 'sunglasses'),
(205, 'A Holiday Dinner You Won\'t Forget!', 'Setting a proper table sets the mood for the occasion.', '<p>Fashion moves so quickly that, unless you have a strong point of view, you can lose integrity. The market is like a language, and you have to be able to understand what they&#39;re saying. I love a black wedding dress. Attention to detail is of utmost importance when you want to look good. I am always locked in my design studio.</p><p>A woman is never sexier than when she is comfortable in her clothes. I wanted to dress the woman who lives and works, not the woman in a painting. In order to be irreplaceable one must always be different. I do not have one theme for each season, I just try to make beautiful clothes all year round. Online media is increasingly influential in fashion.</p><p>I always loved aesthetics. Not particularly fashion, but an idea of beauty. I am like a freight train. Working on the details, twisting them and playing with them over the years, but always staying on the same track. First I made a dress because I was pregnant and I wanted to be the most beautiful pregnant woman. Then I made a sweater because I wanted to have one that wasn&#39;t like anyone else&#39;s. My job is to bring out in people what they wouldn&#39;t dare do themselves. I don&#39;t like trends. They tend to make everybody look the same.</p>', 9, '2018-12-17 10:58:42', 'uploads/homedecor_fancytable.jpg', 'Fancy Table', 'homedecor'),
(206, 'Watch out! Better times are coming.', 'Pun unintentional. Better times are indeed coming.', '<p>Fashions fade, style is eternal. I am not interested in the past, except as the road to the future. I like to be real. I don&#39;t like things to be staged or fussy. Jeans represent democracy in fashion. I think it&#39;s the responsibility of a designer to try to break rules and barriers.</p><p>Comfort is very important to me. I think people live better in big houses and in big clothes. When I was young, I lived like an old woman, and when I got old, I had to live like a young person. Every day I&#39;m thinking about change. What you wear is how you present yourself to the world, especially today when human contacts go so fast. Fashion is instant language. Go to a place where you&#39;re not going to be stressed, because a honeymoon itself can be a stressful thing.</p><p>I never like to think that I design for a particular person. I design for the woman I wanted to be, the woman I used to be, and - to some degree - the woman I&#39;m still a little piece of. Over the years I have learned that what is important in a dress is the woman who is wearing it. You can&#39;t just buy things for the label - it&#39;s ridiculous. I design from instinct. It&#39;s the only way I know how to live. What feels good. What feels right. What is needed. Give me a problem and I will approach it creatively, from my gut. We live in an era of globalization and the era of the woman. Never in the history of the world have women been more in control of their destiny.</p>', 9, '2018-12-17 10:59:24', 'uploads/melker_pick_6.jpg', 'Guy with watch', 'watches');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Index för tabell `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Index för tabell `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT för tabell `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT för tabell `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
