-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 13 Φεβ 2016 στις 12:49:24
-- Έκδοση διακομιστή: 10.1.9-MariaDB
-- Έκδοση PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `churchgroup`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img_path` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `images`
--

INSERT INTO `images` (`id`, `category_id`, `img_path`) VALUES
(1, 68, 'assets/img/uploaded/68/56bf17f88c66c4.02921233.jpg'),
(2, 68, 'assets/img/uploaded/68/56bf17f89ef0d2.09944102.png'),
(3, 68, 'assets/img/uploaded/68/56bf17f8ac10b7.21734581.jpg'),
(4, 68, 'assets/img/uploaded/68/56bf17f8be8220.21589487.jpg'),
(5, 68, 'assets/img/uploaded/68/56bf17f8cc8409.94535375.jpg'),
(6, 68, 'assets/img/uploaded/68/56bf17f8da00d6.55901300.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(20) NOT NULL,
  `color` varchar(40) NOT NULL,
  `user_posted` varchar(25) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `type`, `title`, `descr`, `content`, `category`, `color`, `user_posted`, `date_posted`) VALUES
(53, 'pinned', 'Paintball', 'Πάμε paintball', '<p>Την Κυριακή 7 Φεβρουαρίου του 2016 θα πάμε για paintball στα μαλάματα... όποιος θέλει να συμμετάσχει να μας ενημερώσει σύντομαμέσω τηλεφώνου ή email (Το περιεχόμενο αυτό της δημοσίευσης είναι καθαρά για να καταλαμβάνει απλώς χώρο στη σελίδα)!</p>', 'event', '#34a853', 'admin', '2016-02-06 18:13:52'),
(54, 'event', 'Πνευαμτικά δικαιώματα', 'Αυτή η δημοσίευση απλώς καταλαμβάνει χώρο', '<h2>Διαχείριση του περιεχομένου σας στο YouTube</h2><p>Αν θέλετε να υποβάλετε μια ειδοποίηση για πιθανή παραβίαση πνευματικών δικαιωμάτων, να ενημερωθείτε σχετικά με τις ενέργειες που μπορείτε να πραγματοποιήσετε όταν πιστεύετε ότι το βίντεό σας καταργήθηκε εσφαλμένα ή να ενημερωθείτε σχετικά με το πώς να αμφισβητήσετε μια αντιστοίχιση Content ID, οι παρακάτω πόροι θα σας βοηθήσουν να εξοικειωθείτε με τις εύχρηστες διαδικασίες μας για τη διαχείριση δικαιωμάτων.</p><p><br></p><p><img alt="Ειδοποιήσεις παραβίασης πνευματικών δικαιωμάτων" data-cke-saved-src="https://www.youtube.com/yt/copyright/media/images/copyright-index-submit.png" src="https://www.youtube.com/yt/copyright/media/images/copyright-index-submit.png"></p><h3><a data-cke-saved-href="https://support.google.com/youtube/answer/2807622" href="https://support.google.com/youtube/answer/2807622">Υποβολή ειδοποίησης παραβίασης πνευματικών δικαιωμάτων</a></h3><p>Ζητήστε την κατάργηση μιας μη εξουσιοδοτημένης χρήσης του δημιουργικού σας έργου.</p><p><img alt="Διαφωνίες που αφορούν πνευματικά δικαιώματα" data-cke-saved-src="https://www.youtube.com/yt/copyright/media/images/copyright-index-dispute.png" src="https://www.youtube.com/yt/copyright/media/images/copyright-index-dispute.png"></p><h3><a data-cke-saved-href="https://support.google.com/youtube/answer/2807684" href="https://support.google.com/youtube/answer/2807684">Υποβολή αντικοινοποίησης</a></h3><p>Ζητήστε την επαναφορά ενός βίντεο που καταργήθηκε εσφαλμένα από το YouTube για παραβίαση πνευματικών δικαιωμάτων.</p><p><img alt="Ανακλήσεις" data-cke-saved-src="https://www.youtube.com/yt/copyright/media/images/copyright-index-retract.png" src="https://www.youtube.com/yt/copyright/media/images/copyright-index-retract.png"></p><h3><a data-cke-saved-href="https://support.google.com/youtube/answer/2807691" href="https://support.google.com/youtube/answer/2807691">Ανάκληση αξίωσης παραβίασης πνευματικών δικαιωμάτων</a></h3><p>Ακυρώστε ή ανακαλέστε ένα αίτημα κατάργησης το οποίο υποβλήθηκε από εσάς ή την εταιρεία σας στο YouTube.</p><p>​<img alt="Content ID" data-cke-saved-src="https://www.youtube.com/yt/copyright/media/images/copyright-index-contentid.png" src="https://www.youtube.com/yt/copyright/media/images/copyright-index-contentid.png"></p><h3><a data-cke-saved-href="https://support.google.com/youtube/answer/2797454" href="https://support.google.com/youtube/answer/2797454">Διαφωνία για αξίωση Content ID</a></h3><p>Αμφισβητήστε μια αξίωση Content ID για το βίντεό σας, αν πιστεύετε ότι είναι εσφαλμένη.</p>', 'event', '#34a853', 'admin', '2016-02-06 18:14:56'),
(55, 'event', 'Κέντρο πολιτικής και ασφάλειας', 'Αυτή η δημοσίευση απλώς καταλαμβάνει χώρο', '<p><br></p><h2>Κέντρο πολιτικής και ασφάλειας του Youtube</h2><p>Το κέντρο πολιτικής και ασφάλειας είναι μια κεντρική πηγή, για να μάθετε σχετικά με τις πολιτικές του YouTube, τις πρακτικές ασφάλειας και τα εργαλεία υποβολής αναφορών.</p><p>Για να μάθετε περισσότερα σχετικά με τις κατευθυντήριες αρχές του YouTube, διαβάστε τις&nbsp;<a data-cke-saved-href="https://www.youtube.com/yt/policyandsafety/el/communityguidelines.html" href="https://www.youtube.com/yt/policyandsafety/el/communityguidelines.html">Οδηγίες κοινότητας</a>.</p><p><img alt="Κέντρο πολιτικής" data-cke-saved-src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-policy.png" src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-policy.png"></p><h3>Κέντρο πολιτικών</h3><p>Μάθετε περισσότερα σχετικά με τις πολιτικές μας, για να αποκτήσετε καλύτερη αντίληψη σχετικά με το τι επιτρέπεται και τι δεν επιτρέπεται στο YouTube.</p><p><a data-cke-saved-href="https://www.youtube.com/yt/policyandsafety/el/policy.html" href="https://www.youtube.com/yt/policyandsafety/el/policy.html">Ρίξτε μια ματιά</a></p><p><br></p><p><img alt="Κέντρο ασφάλειας" data-cke-saved-src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-safety.png" src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-safety.png"></p><h3>Κέντρο ασφάλειας</h3><p>Η ασφάλειά σας είναι σημαντική για εμάς. Μάθετε σχετικά με εργαλεία και ανακαλύψτε πόρους για την προστασία της ασφάλειάς σας στο YouTube.</p><p><a data-cke-saved-href="https://www.youtube.com/yt/policyandsafety/el/safety.html" href="https://www.youtube.com/yt/policyandsafety/el/safety.html">Μάθετε περισσότερα</a></p><p><br></p><p><img alt="Κέντρο αναφορών" data-cke-saved-src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-reporting.png" src="https://www.youtube.com/yt/policyandsafety/media/image/yt-policyandsafety-reporting.png"></p><h3>Κέντρο αναφορών και εφαρμογής</h3><p>Μάθετε πώς μπορείτε να αναφέρετε περιεχόμενο και δείτε με ποιον τρόπο εφαρμόζονται οι Οδηγίες κοινότητας.</p><p><a data-cke-saved-href="https://www.youtube.com/yt/policyandsafety/el/reporting.html" href="https://www.youtube.com/yt/policyandsafety/el/reporting.html">Έναρξη</a></p><p><br></p>', 'event', '#1c94c3', 'admin', '2016-02-06 18:15:37'),
(56, 'videos', 'KARTMANIA', 'Δείτε το βίντεο απο όταν πήγαμε στα kart στα βραχνεϊκα', '<iframe width="560" height="315" src="https://www.youtube.com/embed/TulVAHoPxKM" frameborder="0" allowfullscreen></iframe>', 'videos', '#34a853', 'admin', '2016-02-06 18:17:03'),
(57, 'videos', 'MR TEO PART 2', '', '<iframe width="560" height="315" src="https://www.youtube.com/embed/kWitkyAq-vo" frameborder="0" allowfullscreen></iframe>', 'videos', '#1c94c3', 'admin', '2016-02-06 18:17:47'),
(68, 'images', 'Φωτογραφίες τυχαίο περιεχομένου', 'Αυτές είανι οι πρώτες φωτογραφίες της ιστοσελίδας', '', 'images', '#1c94c3', 'admin', '2016-02-13 13:48:08');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `is_active`, `is_admin`, `reg_date`) VALUES
(9, 'admin', 'f5bac4e5bc2bfb42db29ace62274756c17a65734', 'georgakopoulosin@gmail.com', 'giorgos', 'georgakopoulos', 1, 1, '2016-01-23 11:52:20');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
