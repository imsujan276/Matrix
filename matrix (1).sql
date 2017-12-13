-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 10:16 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sent_to` int(11) DEFAULT NULL,
  `btc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tx_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `sent_to`, `btc`, `tx_id`, `send_address`, `receive_address`, `tx_date`, `level`, `created_at`, `updated_at`) VALUES
(14, 7, 8, '0.005', 'b8d4b5e0b6e6feecd47e65f2760d8bf55fe8b875f71a107240f9aa761b200804', '1BC98siSDmhnC9xG1YfabCsWGz8y5nMVyL', '39nD7xvRouiMGeKP8gxWPgU8JvXnG7ocYo', '2017-11-17', 1, '2017-11-27 21:17:10', '2017-11-27 21:17:10'),
(15, 6, 7, '0.005', 'd6f54sd6f4s6f4as6d41as6d4as3d4as6d541', '6s5d4a6s5d46as5d4', 'a65da6sd4as6d', '2017/8/8', 1, '2017-11-27 23:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matrices`
--

CREATE TABLE `matrices` (
  `id` int(10) UNSIGNED NOT NULL,
  `row` int(11) NOT NULL,
  `column` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2017_11_22_101138_create_socials_table', 1),
(18, '2017_11_22_101159_create_donations_table', 1),
(19, '2017_11_22_101217_create_matrices_table', 1),
(20, '2017_11_22_101247_create_subscriptions_table', 1),
(21, '2017_11_22_101301_create_subscription_plans_table', 1),
(22, '2017_11_22_101331_create_wallets_table', 1),
(23, '2017_11_22_101408_create_sponsors_table', 1),
(24, '2017_11_22_101421_create_preferences_table', 1),
(25, '2017_11_22_101432_create_news_table', 1),
(26, '2017_11_22_101446_create_supports_table', 1),
(27, '2017_11_22_101503_create_testimonials_table', 1),
(28, '2017_11_22_102655_create_support_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(2, 'How It Works', 'how-it-works', '<p>This global peer-to-peer donation network is a way for you to help others like yourself, and in exchange they will help you. We are a community of people looking for financial backing in the projects that will fulfill us and bring more joy to the world. If you want to experience the success of turning your dreams into reality, then pay attention. This is a system that works for everyone.</p>\r\n<p>Become an active member of our community</p>\r\n<p>Start by signing up and getting your acccount set up. You\'ll need a bitcoin wallet in order to participate. You can get a free wallet at <a href=\"https://blockchain.info/\">https://blockchain.info</a>. Once you have your wallet input it into the form on the \"Bitcoin Wallet\" page.</p>\r\n<p>Next, you need to upgrade your account by providing a small donation to the person who referred you, or someone else they referred. Follow these simple steps:</p>\r\n<ol>\r\n<li>Click the upgrade button</li>\r\n<li>Get the wallet address and the amount for the donation.</li>\r\n<li>Go to your wallet website and send the amount of bitcoin to the wallet address from step 2.</li>\r\n<li>Get the transaction hash id from the site you sent the bitcoins.</li>\r\n<li>Copy and paste the transaction hash id into the payment verification form on the upgrade page from step 2.</li>\r\n<li>Enter the amount paid, and click submit.</li>\r\n</ol>\r\n<p>That\'s it! You just made your first donation!</p>\r\n<p>Your bitcoin donations are verified and confirmed automatically within minutes.</p>\r\n<p>Now you can get referrals of your own and start receiving funds from them just like you just funded your upline. If we all work together we\'ll all succeed to the highest levels.</p>\r\n<p>Find your link on the \"My Link\" page. Share the banners with your referral link wherever you advertise. Tell your friends! This is an incredible opportunity.</p>\r\n<p>The donation sharing network</p>\r\n<p>When you join, you will get a sponsor. It may be the person who referred you, or it will be someone in their downline - someone else they referred or someone one of their referrals referred.</p>\r\n<p>So, you\'ll make your first donation to your sponsor. That allows you to get referrals and receive donations.</p>\r\n<p>The first 2 people who you sponsor will donate the 1st Grade amount to you. And repeat the same</p>\r\n<p> </p>\r\n<p>Donation Rules:</p>\r\n<ol>\r\n<li>You must maintain an active membership to receive donations.</li>\r\n<li>You must have made the grade donation within the specified period in order to receive that grade donation from others.</li>\r\n<li>If you do not have the required grade active then donations at that grade which are due to you will pass up to your sponsor or someone else in your upline who is eligible.</li>\r\n</ol>\r\n<p>Spillover</p>\r\n<p>You will be able to have a maximum of 2 active referrals on your 1st level. Those are called your front line, or direct referrals. You may refer many more people who sign up with your referral link. If you have no active referrals on your front line, then no members you refer will spillover because no one in your downline is eligible yet. So, you may see that you have many more than 2 referrals on your front line if none are active. </p>\r\n<p>Once the members in your front line make their first donations then they can have referrals placed under them. And once you have 2 active members on your front line the next ones who make a donation will spillover before doing so. They will be assigned to someone in your downline as their sponsor. The reset of your referrals will spillover when they register for an account.</p>', '2017-12-09 00:02:41', '2017-12-13 03:10:57'),
(4, 'About Us', 'about-us', '<p>Do you have a big idea or a hunch that you wish to turn into reality? If that is the case, don’t feel like you are the only one! Most of the creative minds aspire to do that. I’m sure many of you have researched this possibility as well, but you must be taken aback with the kind of budget you may require to invest for your idea. Now, you need not worry because with the support of likeminded people, it helps you get the finance you need. Whether it is a business idea or any financial need, with this system, you now get to have an online platform that gives you access and connects you with the people who are ready to help you.</p><p>We help you with direct funding for your financial needs.  With this program you are just a click away from financial freedom.</p><p>Here’s how it works. After joining your level 1 upline’s referral link, you pay your upline 0.03btc per month to be in a position to receive the same from each of your level 1 downlines. This is followed by receiving the same amount from each of the two people you recruited. This initiates a chain such that with enough collection of funds from your level 1 downline you get to upgrade to level 2 in the same manner you joined. This process keeps expanding and helps you gain enough money in a convenient way.</p><p>By joining our network everyone gets to share and enhance each other’s lives in a convenient and effective way.</p><p>So now, the most reliable and accessible platform, you have a better future with high hopes and more freedom! Join now to make a difference for yourself and others.</p><p>THis system was born out of the frustrations experienced with two other similar systems. We looked critically at the current models and wanted to fix the issues that plagued those systems to create a system that would benefit our members. The shortcomings of the other two systems and the frustrations it caused to members as well as the admins of those programs necessitated a revolutionary rethink of the system that removes all those issues that keep people from benefiting from the system as they should.</p><p>No more waiting for confirmations.</p><p>No more waiting for transactions to be confirmed between banks  and the delays with it.</p><p>No more submitting of proof of payments.</p><p>No more fake transactions and fake POPs.</p>', '2017-12-09 02:48:32', '2017-12-13 02:44:38'),
(5, 'FAQs', 'faq', '<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\">Q. What is It?</span><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br />A. It is a donation exchange platform where members voluntarily give donations and receive donations. It is a Person to Person, Direct Funding and Donation Sharing Platform. It brings forth a new way of raising funds for various causes, whether it is for personal needs or a host of worthy causes, such as schools, non-profit organizations, clubs, etc.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. How does It work?</span><br />A. When you join It you join a community of like-minded members who are interested in donating to each other. You get the opportunity to willingly donate monthly to the members who invited you to become a member and you in turn can get willing donations from people you invite to become members.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. How do I join It?</span><br />A. Ask the person who invited you to provide you with their own unique invite link. Use that link to sign up.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Is It available worldwide?</span><br />A. Yes, It is available to anyone with an internet connection, a Bitcoin wallet and the willingness to donate and to get donations.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. What donation/pay processors are used?</span><br />A. We only use Bitcoin to make it easy for members to donate to each other. </span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"> </p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Can I have more than one account?</span><br />A. Yes you can but it is strongly recommended that you do not stack them. For example, you create another personal account under your first account. This is considered stacking. This is an unethical practice.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Are there any refunds?</span><br />A. No, there are no refunds, donations are given freely and willingly. It has no control over the donations transfered between members.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. I don\'t have a bitcoin wallet where do I go to open a bitcoin wallet.</span><br />A. The only places we highly recommend you go get a Bitcoin wallet is at https://blockchain.info/wallet/# or https://www.coinbase.com</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. What does the \"due date\" mean in the back office?</span><br />A. It is the date your next payment for that level is due.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Do we only upgrade to the next level after receiving donations?</span><br />A. You should upgrade to the next level the moment you are able to so that you don\'t miss out on donations coming to you for those levels.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Are you allowed to upgrade even though your level is not filled up eg to be on level 3 you must have 8 downline, does that mean you have to get exactly 8 before upgrading to level 4?</span><br />A. You can upgrade at any time, the sooner you are able to the sooner you know you will not miss out on any donations.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"> </span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\">Q. Is it possible for downlines to upgrade to your upline instead of you if you\'re not on that level yet?</span><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br />A. Everyone can have their own unique experience in the system. It is best to upgrade the moment you are able to. If you don\'t you will miss donations for the levels you have not upgraded to if there are members below you on those levels who upgrade fast.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. When will two people be assigned to me? I was under the impression that as each person (which has grown since I joined) joins they are assigned under each person and so forth under my level?</span><br />A. YOU will need to find your own two people to join you and you can then help them find their 2 people to grow your team.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Isn\'t this like a pyramid scheme?</span><br />A. Well a pyramid scheme means that only the top members of the hierarchy get paid whereas It allows every member to earn the same amount by doing the same amount of work. You can receive more donations than the person who signed you up.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Why does my referral link show up with Administrator when clicked on and not show my name?</span><br />A. There are a few factors that will influence which signup page you will see. 1) You will need to be signed out. 2) You will need to use the link of the person you want to sign up with. If you see the Admin link then you\'ve not followed the previous 2 rules or you might need to clear your cookies.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. How often we have have to donate 0.005?</span><br />A. Once a Lifetime</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. When using the hash id to submit proof of donation the system says Hash ID already used.?</span><br />A. You can either leave the upgrade page and check back in if you are upgraded or ensure that you only use a wallet vendor that do their transactions through the blockchain.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. How to participate?</span><br />A. There are 2 ways to get involved:<br />This first one is highly recommended. If you have been invited to join, click on that person’s referral link and you will be instructed to fill out a simplified registration form.<br />In the event that you were not invited by family /friends then you can join by going to https://www.It.com/ and click on the Sign-Up button. You will then be referred directly by the Administrator and the system will automatically spill you down into the first eligible or qualified member\'s genealogy.</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Can I donate bitcoin outside U.S or WORLDWIDE to anyone or anywhere?</span><br />A. Bitcoin is a global payment network, and accepting it enables It to accept donations from anywhere in the world. Anyone with an Internet connection and a bitcoin digital wallet can donate bitcoin to It</span></p>\r\n<p style=\"font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-align: start; widows: 2; -webkit-text-stroke-width: 0px; word-spacing: 0px;\"><span style=\"font-size: 14.0pt; font-family: \'Verdana\',\'sans-serif\'; color: black;\"><br /><span style=\"font-family: \'Verdana\',\'sans-serif\';\">Q. Will It make a profit from users donation?</span><br />A. No. As a non-profit organization, It does not make a profit from its activity</span></p>', '2017-12-12 04:09:57', '2017-12-13 03:04:02'),
(6, 'Terms And Conditions', 'terms', '<p>By signing up, you agree to the following Terms, Conditions and Disclaimers:</p><p>This service is provided on an as is, as available service. We make no warranties of any kind, either expressed or implied.</p><ul>\r\n<li><p>You understand that there is specific guidelines and policies in place. </p></li>\r\n<li><p>You have read and understood that \"Spamming\" and or cross recruiting meaning contacting other participants in an attempt to promote ANY other opportunity to ANY fellow participant is grounds for \"Immediate\" account suspension which disqualifies you from receiving spill over, new sign-ups as well as donations.</p></li>\r\n<li>\r\n<p>Under no circumstances, including negligence, shall anyone involved in creating, producing or distributing this service, be liable for any direct, indirect, incidental, special or consequential damages that result from the use of, or inability to use this service, and all the files and software contained within it, including, but not limited to, reliance on any information obtained through this service; or that result from mistakes, omissions, interruptions, deletion of files or e-mail, errors, defects, viruses, delays in operation, or transmission, or any failure of performance, whether or not limited to acts beyond our control, communications failure, theft, destruction or unauthorized access to our records, programs or services.</p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>We reserve the right to add or remove features and modify any functionality, make changes on how the platform works, manage memberships and otherwise make changes to the service and this agreement without notice.</p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>We may terminate without notice, at our sole discretion, any membership deemed to be in breach of this agreement or otherwise found to be abusing or misusing the service, or harassing the other members or administrator in any way. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>In the unlikely event that this program should ever terminate its operations, it\'s creator, operators, employees, assigns and successors shall not be held liable for any loss whatsoever to our members. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>Sites and individuals involved with the following activities are NOT ELIGIBLE: selling, providing or linking to unlicensed content, pornography, warez, pirated software, hacking or spamming software, email address lists or harvesting software, or any materials endorsing violence, hatred, revenge, racism, victimization, or criminal activity. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>We make no claims on how much money you can make with our program. Your ability to earn depends on a number of factors, including where and how (and how often) you advertise the program, and the motivation and ability of those in your up lines, to make referrals. Individual results will vary. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>Members caught spamming or otherwise causing harm to our program will have their accounts terminated, and maybe prosecuted for their actions. We will investigate all allegations before taking action. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>All donations you willingly and directly send to a fellow participant are final. No refunds. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>You understand that all donations will be made directly by donators to you to your payment processor, and that any problems you have concerning such matters should be taken up with your respective merchant account provider. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>You agree to accept email updates from us. We will never inundate you with emails or spam. Report spam and other abuse via the contact form. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>Please include the entire spam email with headers. </p>\r\n</li>\r\n</ul><ul>\r\n<li>\r\n<p>If any member is caught stacking, We reserve the right to move the stacked accounts further down the matrix and/or block the stacked accounts. </p>\r\n</li>\r\n</ul><p>Enjoy giving and receiving donations with US. </p>', '2017-12-12 04:10:23', '2017-12-13 02:52:41'),
(7, 'Support', 'support', '<p>This is the online Member to Member donation platform. You are welcome to join and get to your financial freedom by investing 0.005 BTC one time and getting a chance to earn more than 1000 BTC.&nbsp;</p><p>You came in this support page because you felt some difficulties in our system</p><p>Please contact us directly in out mail system</p><p><a href=\"mailto:\">mail@mail.com</a></p><p>OR</p><p>You can consult with our online support agents and tell them your problems. It won\'t take long to solve your problems.</p><p>Thank You.</p>', '2017-12-12 04:11:28', '2017-12-13 03:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `email` int(11) NOT NULL DEFAULT '1',
  `skype` int(11) NOT NULL DEFAULT '1',
  `phone` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `user_id`, `email`, `skype`, `phone`, `created_at`, `updated_at`) VALUES
(5, 7, 1, 1, 1, '2017-11-25 01:36:06', '2017-11-25 01:44:15'),
(6, 6, 1, 1, 1, NULL, NULL),
(7, 8, 1, 1, 1, NULL, NULL),
(8, 10, 1, 1, 1, '2017-11-26 06:19:56', '2017-11-26 06:19:56'),
(9, 9, 1, 1, 1, NULL, NULL),
(10, 11, 1, 1, 1, '2017-11-27 00:03:04', '2017-11-27 00:03:04'),
(11, 12, 1, 1, 1, '2017-11-27 00:04:18', '2017-11-27 00:04:18'),
(12, 13, 1, 0, 1, '2017-11-27 01:32:55', '2017-12-08 03:14:55'),
(13, 14, 1, 1, 1, '2017-11-27 01:36:15', '2017-11-27 01:36:15'),
(14, 15, 1, 1, 1, '2017-11-27 01:41:47', '2017-11-27 01:41:47'),
(15, 16, 1, 1, 1, '2017-11-27 01:44:09', '2017-11-27 01:44:09'),
(16, 17, 1, 1, 1, '2017-11-27 01:46:17', '2017-11-27 01:46:17'),
(17, 1, 1, 1, 1, NULL, NULL),
(18, 18, 1, 1, 1, '2017-12-08 00:33:39', '2017-12-08 00:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_level` int(11) DEFAULT NULL,
  `next_sponsor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `user_id`, `sponsor_id`, `sponsor_level`, `next_sponsor_id`, `created_at`, `updated_at`) VALUES
(1, '7', '8', 1, 1, '2017-11-25 21:50:55', '2017-11-27 21:19:03'),
(2, '9', '6', 1, NULL, '2017-11-26 06:13:13', '2017-11-26 06:13:13'),
(3, '10', '8', 2, NULL, '2017-11-26 06:19:56', '2017-11-26 06:23:08'),
(4, '11', '10', 1, NULL, '2017-11-27 00:03:04', '2017-11-27 00:03:04'),
(5, '12', '7', 2, NULL, '2017-11-27 00:04:18', '2017-11-27 00:04:18'),
(6, '13', '10', 1, NULL, '2017-11-27 01:32:55', '2017-11-27 01:32:55'),
(7, '14', '7', 1, NULL, '2017-11-27 01:36:15', '2017-11-27 01:36:15'),
(8, '15', '10', 1, NULL, '2017-11-27 01:41:46', '2017-11-27 01:41:46'),
(9, '16', '10', 1, NULL, '2017-11-27 01:44:09', '2017-11-27 01:44:09'),
(10, '17', '7', 1, NULL, '2017-11-27 01:46:16', '2017-11-27 01:46:16'),
(11, '18', '1', 9, NULL, '2017-12-08 00:33:39', '2017-12-08 00:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `subscription_id`, `created_at`, `updated_at`) VALUES
(6, '1', '1', '2017-11-28 21:15:00', NULL),
(7, '7', '1', '2017-11-29 03:15:00', NULL),
(8, '10', '1', '2017-11-29 04:15:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `max_ref` int(11) NOT NULL,
  `donation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `max_ref`, `donation`, `age`, `created_at`, `updated_at`) VALUES
(1, 2, '0.005', '364', '2017-11-14 21:36:11', '2017-11-15 07:28:26'),
(2, 4, '0.008', '365', NULL, NULL),
(3, 8, '0.02', '365', NULL, NULL),
(4, 16, '0.1', '365', NULL, NULL),
(5, 32, '1', '365', NULL, NULL),
(6, 64, '2.5', '365', NULL, NULL),
(7, 128, '5', '365', NULL, NULL),
(8, 256, '10', '365', NULL, NULL),
(9, 512, '15', '365', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_categories`
--

CREATE TABLE `support_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 10, 'test testimonial', '2017-12-05 22:34:00', NULL),
(2, 6, 'asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb asjd asdb ', '2017-12-07 00:15:00', NULL),
(4, 1, 'asd', '2017-12-08 02:42:53', '2017-12-08 02:42:53'),
(6, 7, 'Text text text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text text text text text text text text text text text text text text text text text text text text text ', '2017-12-08 02:50:07', '2017-12-08 02:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar1.png',
  `security_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `delete_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `phone`, `avatar`, `security_question`, `security_answer`, `skype`, `ref_id`, `ip`, `level`, `delete_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$5/Ym2ALWRU73TkP90A15DOGjpdavUK5AL3jt3CdJtn/gZM0IsZErG', 'USA', 5465464, 'avatar4.png', 'admin', 'admin', NULL, 'as6d4a6s54', NULL, 9, NULL, 'Xstq7kd0YKhhG38ffbhvsRrH0AAVvCdJuNL4QeXG0o6sOOVxTiGWbXNFkWT4', '2017-11-24 03:13:39', '2017-11-24 03:13:39'),
(6, 'ajhgsd', 'ajh@ajd.asd', '$2y$10$1Omhvam1n6KjWyw9.teQr.t14AsFQ9a62QHNWWKuKhKToha4QNjr2', 'Nepal', 55, 'avatar3.png', 'ad', 'ad', NULL, 'mvy64dnwa2co095', '127.0.0.1', 1, '2017-11-28 08:58:39', NULL, '2017-11-24 03:13:39', '2017-11-24 03:13:39'),
(7, 'suz zan', 'imsujan276@gmail.com', '$2y$10$5/Ym2ALWRU73TkP90A15DOGjpdavUK5AL3jt3CdJtn/gZM0IsZErG', 'Nepal', 987654321, 'avatar5.png', 'nick name', 'suga', 'sujandboy', 'pzrp8qwyekqhg1d', '127.0.0.1', 1, '2017-11-29 06:10:24', '15hsfTw4vT9sHGTSq9mIfcswhYFImpmtAV9FH5UenPklhmQDTqr7pbeb2R4M', '2017-11-25 00:25:24', '2017-11-27 21:17:10'),
(8, 'yes testing', 'yes@gmail.com', '$2y$10$VI9cj00bdXsG37egqguy0.KdVLBxz0mbPGlgeojXc5uE.aG7x8kTO', 'USA', 789456123, 'avatar1.png', 'test', 'test', NULL, '5a1ry39h2hymtiv', '127.0.0.1', 1, '2017-11-30 03:35:55', NULL, '2017-11-25 21:50:55', '2017-11-25 21:50:55'),
(9, 'sujan g', 'sujan@gmail.com', '$2y$10$DJsKvPl2rtGg9.NVUTC2quf3Re55f61EErhMNoQlg2qyV0kG5FC3i', 'USA', 897945612, 'avatar3.png', 'name', 'sujan', NULL, 'de6m82xhzyw0gi6', '127.0.0.1', 0, '2017-11-30 11:58:13', NULL, '2017-11-26 06:13:13', '2017-11-26 06:13:13'),
(10, 'suga', 'suga@gmail.com', '$2y$10$iXCUeEHT82tFB2xEeXuUV.2sxhra3wX21dvzAapOf2TFUsEPJGEti', 'Nepal', 897945612, 'avatar1.png', 'name', 'suga', NULL, 'c17ntpsdtyd2in7', '127.0.0.1', 1, '2017-11-30 12:04:55', 'XFIhBD7xcqrk9p72cKfWEEclKMFhSxltPujoFZ45KdcD2a1V0vfVCJotftvL', '2017-11-26 06:19:55', '2017-11-26 06:23:08'),
(11, 'asdgad', 'test2@gmail.com', '$2y$10$ewDWUuGKrQD9gu2NuukNle706vb4Q0t0KaHZcnCfT7lrfUcJggJrm', 'Nepal', 66554654, 'avatar4.png', 'tst2', 'test2', NULL, 'jdc0am0wf1ud5ws', '127.0.0.1', 0, '2017-12-01 05:48:04', 'ZuAW1TA6MzEeePjg6qeGUJ3LO2Tjfn2Ul1Jc6ud7VpdagrvoHkropPYnOw62', '2017-11-27 00:03:04', '2017-11-27 00:03:04'),
(12, 'test3', 'test3@gmail.com', '$2y$10$G34YA651ImSMOlgwm/hW9e9D4MDbNWGRKgLHr9crT3Ou8dB7SegBe', 'USA', 6546654, 'avatar5.png', 'test3', 'test3', NULL, '2qco14feu4sy6ua', '127.0.0.1', 0, '2017-12-01 05:49:18', '4gMhK2foc7ZIrbBa7qogTykLqCOWdG8QEm1nysblfzQRxPXynvaCnSS4SusS', '2017-11-27 00:04:18', '2017-11-27 00:04:18'),
(13, 'test33', 'test33@gmail.com', '$2y$10$FpNTS.Uk57qEZS3XL3mSE.hGGy2KL4Xu8qnACz3sH2bO7RU2ZIDOu', 'Nepal', 545, 'avatar1.png', 'test33', 'TEST33', NULL, 'rmazlbvuz1viyw1', '127.0.0.1', 0, '2017-12-01 07:17:55', 'GXy0WJx3bZTSv9vFhUlw0wllHE81KaUJByIxCCp62Q6smDd1CwEfX6sEyv2Q', '2017-11-27 01:32:55', '2017-11-27 01:32:55'),
(14, 'test4', 'test4@gmail.com', '$2y$10$Y4LH/GMB6kpl6i/iMfTzheYjrFYvdPtC2fNoQeulIp6pjXlVdeh/W', 'Nepal', 56654, 'avatar2.png', 'test4', 'test4', NULL, 'cn7yrsoauvucfpr', '127.0.0.1', 0, '2017-12-01 07:21:15', 'hA1dR32ClnYPFFWwU5ueTUFxgrxVhYgxXNaks2Qne6a9Q5kRvnuQOzoOpNlq', '2017-11-27 01:36:15', '2017-11-27 01:36:15'),
(15, 'test5', 'test5@gmail.com', '$2y$10$NTRJZrxAOvb14uKdOThtn.Fq.1pGiO1GTO3QdVxxkCOWaVu5A0JjG', 'Nepal', 46, 'avatar4.png', 'test5', 'test5', NULL, 'h0hfkk6bbvh5en2', '127.0.0.1', 0, '2017-12-01 07:26:46', 'xYJILTUFE6zf5i9C5JNWVwIJLAUy3ZJDzD4AOZJHF08hcYEQxtpIJc4JRefA', '2017-11-27 01:41:46', '2017-11-27 01:41:46'),
(16, 'test6', 'test6@gmail.com', '$2y$10$u9J459enL4jpe5Y.t2TDKePrwBn5Dj.qi0kFPZiVodEVoPHOHNTQi', 'Nepal', 5, 'avatar2.png', 'test6', 'test6', NULL, '4tslyv0j5smfo0b', '127.0.0.1', 0, '2017-12-01 07:29:09', 'P4ueuWgugdut7HrKScpeGJ07CRO1iCksFtcJ4xSou0Dg0AZe89ymX5t9aAcm', '2017-11-27 01:44:09', '2017-11-27 01:44:09'),
(17, 'test7', 'test7@kj.sd', '$2y$10$uYDB8zcL8FvFtYnsEGPGre6QzPvOj8D4sBfAupfeOsgoP.ds89wP6', 'Nepal', 654, 'avatar5.png', 'test7', 'test7', NULL, '5fmy397runo887z', '127.0.0.1', 0, '2017-12-01 07:31:16', 'qNYm5XpfI8mIdStcLtSdGgrZB3AdaAHL8FNEFTndB3IYQck6BjCJwurnLIsX', '2017-11-27 01:46:16', '2017-11-27 01:46:16'),
(18, 'testing', 'thisistest@gmail.com', '$2y$10$XJH2tDIDH/pBtyF4AmlRgevLqb6mc6.cYSGapTxK8rP616coKn1sK', 'USA', 123456789, 'avatar1.png', 'thisistest', 'thisistest', NULL, 'ejr8ku774sgwn61', '127.0.0.1', 0, '2017-12-12 06:18:39', '6LSF79g6yNjbZMtXWSoKa3jL13hVMf1iUXkTcAXe9NQ9432CqPp0hCUTvBK4', '2017-12-08 00:33:39', '2017-12-08 00:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `website`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Coinbase   up', '124ZM3bS4hu9oQHRyJaYm8MdJKd1aE4q5e', '7', '2017-11-25 23:40:05', '2017-11-25 23:50:14'),
(2, 'blockchain', 'asdnkkabd545kadjbakdbakdbasdkjbakdsj', '8', NULL, NULL),
(3, 'coinbase', 'kasjdajgdhajdakjdad54as6d5a6d5a54sd65as4d6', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrices`
--
ALTER TABLE `matrices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_categories`
--
ALTER TABLE `support_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `matrices`
--
ALTER TABLE `matrices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `support_categories`
--
ALTER TABLE `support_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
