-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2026 at 09:08 AM
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
-- Database: `eduverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT 'English',
  `edition` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `about_book` longtext DEFAULT NULL,
  `what_you_learn` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT 5.0,
  `featured` enum('Yes','No') DEFAULT 'No',
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_folder` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `author_id`, `publisher_id`, `title`, `author`, `isbn`, `publisher`, `pages`, `language`, `edition`, `description`, `about_book`, `what_you_learn`, `price`, `sale_price`, `stock`, `image`, `pdf_file`, `rating`, `featured`, `status`, `created_at`, `image_folder`) VALUES
(1, 1, NULL, NULL, 'Clean Code', 'Robert C. Martin', '9780132350884', 'Prentice Hall', 464, 'English', '1st Edition', 'A practical handbook for writing clean, maintainable and professional code.', NULL, NULL, 3200.00, 2899.00, 29, 'clean-code.png', 'clean-code.pdf', 4.9, 'Yes', 'Active', '2026-07-30 05:29:31', 'technology'),
(2, 1, NULL, NULL, 'The Pragmatic Programmer', 'Andrew Hunt & David Thomas', '9780201616224', 'Addison-Wesley', 352, 'English', '2nd Edition', 'Modern software development practices and pragmatic programming principles.', NULL, NULL, 3500.00, 3199.00, 28, 'pragmatic-programmer.jpg', 'pragmatic-programmer.pdf', 4.9, 'Yes', 'Active', '2026-07-30 05:29:31', 'technology'),
(3, 1, NULL, NULL, 'Introduction to Algorithms', 'Thomas H. Cormen', '9780262046305', 'MIT Press', 1312, 'English', '4th Edition', 'Comprehensive guide covering algorithms and data structures.', NULL, NULL, 5800.00, 5499.00, 15, 'algorithms.jpg', 'algorithms.pdf', 4.9, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(4, 1, NULL, NULL, 'Code Complete', 'Steve McConnell', '9780735619678', 'Microsoft Press', 960, 'English', '2nd Edition', 'Software construction best practices and coding standards.', NULL, NULL, 4200.00, 3899.00, 20, 'code-complete.jpg', 'code-complete.pdf', 4.8, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(5, 1, NULL, NULL, 'Cracking the Coding Interview', 'Gayle Laakmann McDowell', '9780984782864', 'CareerCup', 706, 'English', '6th Edition', 'Interview preparation with programming questions and solutions.', NULL, NULL, 4500.00, 4199.00, 30, 'coding-interview.jpg', 'coding-interview.pdf', 4.9, 'Yes', 'Active', '2026-07-30 05:29:31', 'technology'),
(6, 1, NULL, NULL, 'Design Patterns', 'Erich Gamma', '9780201633610', 'Addison-Wesley', 395, 'English', '1st Edition', 'Classic object-oriented software design patterns.', NULL, NULL, 3900.00, 3599.00, 22, 'design-patterns.jpg', 'design-patterns.pdf', 4.8, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(7, 1, NULL, NULL, 'Effective Java', 'Joshua Bloch', '9780134685991', 'Addison-Wesley', 416, 'English', '3rd Edition', 'Best practices for developing Java applications.', NULL, NULL, 3600.00, 3299.00, 17, 'effective-java.jpg', 'effective-java.pdf', 4.9, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(8, 1, NULL, NULL, 'The C Programming Language', 'Brian W. Kernighan', '9780131103627', 'Prentice Hall', 288, 'English', '2nd Edition', 'The classic guide to learning the C programming language.', NULL, NULL, 3100.00, 2799.00, 24, 'c-programming-language.jpg', 'c-programming.pdf', 4.8, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(9, 1, NULL, NULL, 'Head First Design Patterns', 'Eric Freeman', '9780596007126', 'O\'Reilly Media', 694, 'English', '1st Edition', 'Easy-to-understand explanation of software design patterns.', NULL, NULL, 3700.00, 3399.00, 16, 'head-first-design-patterns.jpg', 'head-first-design-patterns.pdf', 4.8, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(10, 1, NULL, NULL, 'Refactoring', 'Martin Fowler', '9780134757599', 'Addison-Wesley', 448, 'English', '2nd Edition', 'Improve existing code without changing its functionality.', NULL, NULL, 4100.00, 3799.00, 20, 'refactoring.jpg', 'refactoring.pdf', 4.9, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(12, 3, NULL, NULL, 'Pro Android with Kotlin', 'Peter Späth', '9781484238311', 'Apress', 732, 'English', '2nd Edition', 'A comprehensive guide to building modern Android applications using Kotlin.', 'Learn Android application development with Kotlin through practical examples and modern development techniques.', 'Build Android applications with Kotlin|Work with Android components|Create modern user interfaces|Develop practical mobile applications', 5000.00, 4599.00, 20, 'pro-android-kotlin.jpg', NULL, 4.7, 'No', 'Active', '2026-07-30 05:29:31', 'technology'),
(26, 2, NULL, NULL, 'JavaScript: The Definitive Guide', 'David Flanagan', '9781491952023', 'O\'Reilly Media', 706, 'English', NULL, 'A comprehensive guide to JavaScript programming and modern web development.', 'A detailed reference and learning resource covering JavaScript fundamentals, browser programming, asynchronous programming, and modern JavaScript features.', 'Understand JavaScript fundamentals|Work with functions and objects|Manipulate the DOM|Handle events|Work with asynchronous JavaScript', 5800.00, NULL, 20, 'javascript-definitive-guide.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-01 16:05:39', 'technology'),
(27, 2, NULL, NULL, 'Eloquent JavaScript', 'Marijn Haverbeke', '9781593279509', 'No Starch Press', 472, 'English', NULL, 'A practical introduction to modern JavaScript programming.', 'This book teaches programming concepts through JavaScript and gradually moves toward practical browser-based applications.', 'Learn programming fundamentals|Understand JavaScript syntax|Work with data structures|Use higher-order functions|Build browser applications', 4200.00, NULL, 30, 'eloquent-javascript.jpg', NULL, 4.6, 'No', 'Active', '2026-08-01 16:05:39', 'technology'),
(28, 2, NULL, NULL, 'Learning PHP, MySQL & JavaScript', 'Robin Nixon', '9781492093824', 'O\'Reilly Media', 832, 'English', NULL, 'A practical guide to building dynamic websites with PHP, MySQL, and JavaScript.', 'This resource brings together front-end and server-side technologies to help learners create database-driven web applications.', 'Learn PHP fundamentals|Work with MySQL databases|Connect PHP with databases|Use JavaScript in web applications|Build dynamic websites', 5500.00, NULL, 18, 'learning-php-mysql-javascript.png', NULL, 4.7, 'No', 'Active', '2026-08-01 16:05:39', 'technology'),
(29, 2, NULL, NULL, 'PHP & MySQL: Server-side Web Development', 'Jon Duckett', '9781119149224', 'Wiley', 672, 'English', NULL, 'A practical introduction to PHP and MySQL for server-side web development.', 'This book focuses on creating dynamic, database-driven websites using PHP and MySQL with practical examples and clear explanations.', 'Understand server-side development|Learn PHP|Create MySQL databases|Work with forms|Build database-driven websites', 4800.00, NULL, 22, 'php-mysql-web-development.png', NULL, 4.6, 'No', 'Active', '2026-08-01 16:05:39', 'technology'),
(30, 2, NULL, NULL, 'HTML and CSS: Design and Build Websites', 'Jon Duckett', '9781118008188', 'Wiley', 490, 'English', '1st Edition', 'A practical guide to HTML and CSS for creating modern and engaging websites.', 'This book teaches the fundamentals of HTML and CSS through clear explanations, visual examples, and practical website-building techniques.', 'Understand HTML structure|Learn CSS styling|Build modern web pages|Create responsive layouts|Apply HTML and CSS in practical projects', 2800.00, 2499.00, 30, 'html-css.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-02 09:15:35', 'technology'),
(31, 2, NULL, NULL, 'You Don\'t Know JS', 'Kyle Simpson', '9781491954469', 'O\'Reilly Media', 278, 'English', '1st Edition', 'A practical introduction to modern JavaScript development, covering the essential concepts and techniques needed to write better JavaScript code.', 'You Don\'t Know JS is designed to help developers understand JavaScript more deeply. It explores important language concepts and provides practical explanations for improving JavaScript skills.', 'Understand modern JavaScript fundamentals|Work with functions and objects|Understand JavaScript behavior|Write cleaner JavaScript code', 4500.00, 3999.00, 20, 'you-dont-know-js.webp', NULL, 4.7, 'Yes', 'Active', '2026-08-02 13:18:15', 'technology'),
(32, 2, NULL, NULL, 'JavaScript: The Good Parts', 'Douglas Crockford', '9780596517748', 'O\'Reilly Media', 176, 'English', '1st Edition', 'A concise and influential guide to JavaScript programming, focusing on the language features and techniques that make JavaScript powerful and effective.', 'JavaScript: The Good Parts presents a focused look at the most useful and powerful parts of JavaScript. It helps developers understand the language and write clearer, more effective code.', 'Understand important JavaScript concepts|Use JavaScript more effectively|Write cleaner and simpler code|Improve programming techniques', 3500.00, 2999.00, 18, 'javascript-good-parts.png', NULL, 4.8, 'No', 'Active', '2026-08-02 13:18:15', 'technology'),
(33, 2, NULL, NULL, 'Learning React', 'Alex Banks', '9781492051725', 'O\'Reilly Media', 320, 'English', '1st Edition', 'A practical guide to building modern React applications, covering components, state, props, hooks, and reusable user interfaces.', 'Learning React provides a practical introduction to React and modern front-end development. Readers learn how to create reusable components and build interactive web applications.', 'Understand React fundamentals|Create reusable components|Work with props and state|Build interactive interfaces', 3600.00, 3299.00, 15, 'learning-react.png', NULL, 4.9, 'Yes', 'Active', '2026-08-02 13:18:15', 'technology'),
(34, 2, NULL, NULL, 'CSS Secrets', 'Lea Verou', '9781449367974', 'O\'Reilly Media', 288, 'English', '1st Edition', 'A collection of practical techniques and solutions for working with CSS, helping developers create cleaner, more maintainable, and powerful web designs.', 'CSS Secrets presents practical CSS techniques that help developers solve common design and styling problems while creating more flexible and maintainable interfaces.', 'Learn advanced CSS techniques|Create flexible layouts|Improve visual styling|Write maintainable CSS', 3200.00, 2899.00, 20, 'css-secrets.png', NULL, 4.8, 'No', 'Active', '2026-08-02 13:18:15', 'technology'),
(35, 2, NULL, NULL, 'Don\'t Make Me Think', 'Steve Krug', '9780321344755', 'New Riders', 216, 'English', '1st Edition', 'A practical guide to designing and building websites that are easy to use, understand, and navigate, with a strong focus on usability.', 'Don\'t Make Me Think focuses on web usability and user-friendly design. It explains how to make websites easier for users to understand and navigate.', 'Understand web usability|Improve website navigation|Create user-friendly interfaces|Design clearer web experiences', 2900.00, 2599.00, 25, 'dont-make-me-think.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-02 13:18:15', 'technology'),
(36, 2, NULL, NULL, 'Responsive Web Design', 'Ethan Marcotte', '9780321606196', 'A Book Apart', 320, 'English', '1st Edition', 'A practical guide to responsive web design, covering techniques for creating websites that work effectively across different screen sizes and devices.', 'Responsive Web Design introduces techniques for creating flexible websites that adapt to different devices, screen sizes, and resolutions.', 'Understand responsive design|Create flexible layouts|Design for different screen sizes|Build mobile-friendly websites', 3100.00, 2799.00, 18, 'responsive-web-design.png', NULL, 4.8, 'No', 'Active', '2026-08-02 13:18:15', 'technology'),
(37, 2, NULL, NULL, 'Node.js Design Patterns', 'Mario Casciaro', '9781783287314', 'Packt Publishing', 384, 'English', '1st Edition', 'A comprehensive guide to Node.js design patterns and development techniques for building scalable and maintainable server-side applications.', 'Node.js Design Patterns explores patterns and techniques for developing robust Node.js applications, with an emphasis on reusable architecture and maintainable code.', 'Understand Node.js architecture|Apply design patterns|Build scalable applications|Create maintainable server-side code', 3900.00, 3599.00, 17, 'nodejs-design-patterns.png', NULL, 4.8, 'No', 'Active', '2026-08-02 13:18:15', 'technology'),
(38, 2, NULL, NULL, 'Professional JavaScript for Web Developers', 'Matt Frisbie', '9781491952023', 'Addison-Wesley', 900, 'English', '1st Edition', 'A detailed reference for professional JavaScript developers, covering advanced JavaScript concepts, techniques, and modern development practices.', 'Professional JavaScript for Web Developers provides a detailed reference for developers who want to strengthen their JavaScript knowledge and understand advanced web development techniques.', 'Understand advanced JavaScript|Work with modern JavaScript features|Improve web development skills|Write professional-quality JavaScript', 5800.00, 5199.00, 12, 'professional-javascript.gif', NULL, 4.7, 'Yes', 'Active', '2026-08-02 13:18:15', 'technology'),
(39, 3, NULL, NULL, 'Android Programming: The Big Nerd Ranch Guide', 'Bill Phillips, Chris Stewart & Kristin Marsicano', NULL, 'Big Nerd Ranch', NULL, 'English', '4th Edition', 'A practical guide to building Android applications using modern Android development techniques.', 'A hands-on resource for learning Android application development through practical projects and real-world programming techniques.', 'Understand Android fundamentals|Build Android applications|Work with activities and fragments|Manage application data|Create responsive Android interfaces', 5200.00, 4799.00, 20, 'android-programming-big-nerd-ranch.png', NULL, 4.9, 'Yes', 'Active', '2026-08-02 14:37:17', 'technology'),
(40, 3, NULL, NULL, 'Head First Android Development', 'Dawn Griffiths & David Griffiths', NULL, 'O\'Reilly Media', NULL, 'English', '3rd Edition', 'A visual and practical introduction to Android application development.', 'A beginner-friendly guide that uses practical examples and visual explanations to teach the fundamentals of Android development.', 'Build Android apps|Understand Android components|Work with layouts and user interfaces|Handle application data|Create interactive applications', 4800.00, 4399.00, 22, 'head-first-android-development.png', NULL, 4.8, 'No', 'Active', '2026-08-02 14:37:17', 'technology'),
(41, 3, NULL, NULL, 'Androids', 'Chet Haase', NULL, 'Addison-Wesley', NULL, 'English', '1st Edition', 'A book exploring Android development, programming culture, and the evolution of the Android platform.', 'A useful resource for understanding the Android platform and the people, technologies, and practices behind Android development.', 'Explore Android development|Understand the Android platform|Learn development practices|Understand Android engineering|Explore mobile software development', 4200.00, 3799.00, 18, 'androids-chet-haase.png', NULL, 4.7, 'No', 'Active', '2026-08-02 14:37:17', 'technology'),
(42, 3, NULL, NULL, 'Head First Kotlin', 'Dawn Griffiths & David Griffiths', NULL, 'O\'Reilly Media', NULL, 'English', '1st Edition', 'A practical and visual introduction to Kotlin programming.', 'A beginner-friendly Kotlin guide designed to help developers learn the language through practical examples and hands-on exercises.', 'Understand Kotlin syntax|Work with functions and classes|Use collections|Understand object-oriented programming|Build Kotlin applications', 4600.00, 4199.00, 24, 'head-first-kotlin.webp', NULL, 4.9, 'Yes', 'Active', '2026-08-02 14:37:17', 'technology'),
(43, 3, NULL, NULL, 'Kotlin in Action', 'Dmitry Jemerov & Svetlana Isakova', NULL, 'Manning Publications', NULL, 'English', '2nd Edition', 'A comprehensive guide to Kotlin programming for modern application development.', 'A detailed Kotlin resource covering the language, its features, and practical techniques for building robust applications.', 'Master Kotlin fundamentals|Use Kotlin features effectively|Work with classes and functions|Use collections and lambdas|Write production-quality Kotlin code', 5000.00, 4599.00, 20, 'kotlin-in-action.png', NULL, 4.9, 'No', 'Active', '2026-08-02 14:37:17', 'technology'),
(44, 3, NULL, NULL, 'Flutter in Action', 'Eric Windmill', NULL, 'Manning Publications', NULL, 'English', '1st Edition', 'A practical introduction to building cross-platform mobile applications with Flutter.', 'A hands-on guide to Flutter that teaches developers how to create mobile applications using Dart and Flutter widgets.', 'Understand Flutter fundamentals|Work with widgets|Build user interfaces|Use navigation and state|Create cross-platform mobile applications', 4900.00, 4499.00, 21, 'flutter-in-action.png', NULL, 4.8, 'Yes', 'Active', '2026-08-02 14:37:17', 'technology'),
(45, 3, NULL, NULL, 'Beginning Flutter: A Hands On Guide to App Development', 'Marco L. Napoli', NULL, 'Wrox', NULL, 'English', '1st Edition', 'A hands-on introduction to building mobile applications with Flutter.', 'A practical guide for developers who want to learn Flutter and create cross-platform mobile applications from the ground up.', 'Learn Flutter fundamentals|Work with Dart|Create Flutter interfaces|Build mobile application layouts|Develop cross-platform apps', 4700.00, 4299.00, 20, 'beginning-flutter.png', NULL, 4.8, 'No', 'Active', '2026-08-02 14:37:17', 'technology'),
(46, 3, NULL, NULL, 'React Native in Action', 'Nader Dabit', '9781617294051', 'Manning Publications', 384, 'English', '1st Edition', 'A practical guide to building cross-platform mobile apps with React Native.', 'Learn to build native mobile apps using JavaScript and React.', 'Build cross-platform apps|Understand React Native components|Work with native modules', 4600.00, 4199.00, 20, 'react-native-in-action.png', NULL, 4.6, 'No', 'Active', '2026-08-02 15:53:51', 'technology'),
(47, 3, NULL, NULL, 'Programming iOS 13', 'Matt Neuburg', '9781492074514', 'O\'Reilly Media', 1064, 'English', '7th Edition', 'A comprehensive guide to building iOS apps with Swift and modern iOS SDKs.', 'Learn to develop robust iOS applications using Swift.', 'Understand iOS SDK|Build user interfaces|Work with Swift and Xcode', 5400.00, 4999.00, 15, 'programming-ios.jpg', NULL, 4.7, 'No', 'Active', '2026-08-02 15:53:51', 'technology'),
(48, 3, NULL, NULL, 'Swift Programming: The Big Nerd Ranch Guide', 'Mikey Ward', '9780134682335', 'Big Nerd Ranch', 480, 'English', '6th Edition', 'A hands-on guide to learning Swift programming for Apple platform development.', 'Learn Swift syntax, fundamentals, and app development basics.', 'Master Swift syntax|Understand optionals and closures|Build simple apps', 4800.00, 4399.00, 18, 'swift-programming-big-nerd-ranch.png', NULL, 4.8, 'No', 'Active', '2026-08-02 15:53:51', 'technology'),
(62, 4, NULL, NULL, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell & Peter Norvig', '9780134610993', 'Pearson', 1136, 'English', '4th Edition', 'The definitive introduction to the theory and practice of AI.', 'A comprehensive overview of AI concepts and algorithms.', 'Understand AI foundations|Learn search algorithms|Explore machine learning basics', 6200.00, 5799.00, 15, 'ai-1.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(63, 4, NULL, NULL, 'Deep Learning', 'Ian Goodfellow, Yoshua Bengio & Aaron Courville', '9780262035613', 'MIT Press', 800, 'English', '1st Edition', 'A comprehensive textbook on deep learning theory and applications.', 'Learn neural network architectures and training techniques.', 'Understand deep learning math|Build neural networks|Apply optimization techniques', 5800.00, 5399.00, 12, 'ai-2.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(64, 4, NULL, NULL, 'Hands-On Machine Learning with Scikit-Learn, Keras & TensorFlow', 'Aurélien Géron', '9781492032649', 'O\'Reilly Media', 851, 'English', '2nd Edition', 'A practical guide to building intelligent systems using Python.', 'Learn to build ML models using popular Python libraries.', 'Master Scikit-Learn|Build with TensorFlow and Keras|Apply ML end-to-end', 5200.00, 4799.00, 20, 'ai-3.webp', NULL, 4.9, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(65, 4, NULL, NULL, 'Pattern Recognition and Machine Learning', 'Christopher Bishop', '9780387310732', 'Springer', 738, 'English', '1st Edition', 'A graduate-level introduction to pattern recognition and ML theory.', 'Understand statistical techniques behind machine learning.', 'Learn Bayesian methods|Understand probability models|Apply pattern recognition', 5600.00, 5199.00, 10, 'ai-4.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(66, 4, NULL, NULL, 'The Hundred-Page Machine Learning Book', 'Andriy Burkov', '9781999579500', 'Andriy Burkov', 160, 'English', '1st Edition', 'A concise, accessible summary of essential machine learning concepts.', 'Get a fast, clear overview of core ML techniques.', 'Understand supervised and unsupervised learning|Learn key algorithms', 2600.00, 2299.00, 25, 'ai-5.jpg', NULL, 4.7, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(67, 4, NULL, NULL, 'Machine Learning Yearning', 'Andrew Ng', '9780999579505', 'deeplearning.ai', 118, 'English', '1st Edition', 'Practical strategies for structuring machine learning projects.', 'Learn how to prioritize and debug ML projects effectively.', 'Diagnose ML errors|Structure ML projects|Improve model performance', 2200.00, 1999.00, 22, 'ai-6.jpg', NULL, 4.8, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(68, 4, NULL, NULL, 'Reinforcement Learning: An Introduction', 'Richard Sutton & Andrew Barto', '9780262039246', 'MIT Press', 552, 'English', '2nd Edition', 'The foundational text on reinforcement learning theory and methods.', 'Understand how agents learn through interaction with environments.', 'Learn RL fundamentals|Understand Markov decision processes|Apply RL algorithms', 4900.00, 4499.00, 14, 'ai-7.jpg', NULL, 4.8, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(69, 4, NULL, NULL, 'Python Machine Learning', 'Sebastian Raschka', '9781789955750', 'Packt Publishing', 770, 'English', '3rd Edition', 'A practical guide to machine learning and deep learning in Python.', 'Learn to implement ML algorithms using Python.', 'Build ML models in Python|Understand deep learning basics|Apply data preprocessing', 4700.00, 4299.00, 18, 'ai-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(70, 4, NULL, NULL, 'Grokking Deep Learning', 'Andrew Trask', '9781617293702', 'Manning Publications', 336, 'English', '1st Edition', 'A beginner-friendly guide to building deep learning models from scratch.', 'Learn deep learning by building neural networks in plain Python.', 'Build neural networks from scratch|Understand backpropagation intuitively', 4000.00, 3599.00, 16, 'ai-10.png', NULL, 4.7, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(71, 4, NULL, NULL, 'AI Superpowers', 'Kai-Fu Lee', '9781328546395', 'Houghton Mifflin Harcourt', 272, 'English', '1st Edition', 'An exploration of the global AI race between China and the US.', 'Understand the geopolitical and economic impact of AI development.', 'Understand AI industry trends|Learn about AI ethics and policy', 2900.00, 2599.00, 20, 'ai-11.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(72, 4, NULL, NULL, 'Superintelligence', 'Nick Bostrom', '9780199678112', 'Oxford University Press', 352, 'English', '1st Edition', 'An exploration of the paths, dangers, and strategies for advanced AI.', 'Understand the risks and future trajectories of superintelligent AI.', 'Explore AI safety concepts|Understand long-term AI risks', 3300.00, 2999.00, 15, 'ai-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(73, 4, NULL, NULL, 'Life 3.0', 'Max Tegmark', '9781101946596', 'Knopf', 384, 'English', '1st Edition', 'A look at what it means to be human in the age of artificial intelligence.', 'Explore the future of AI and its impact on society and humanity.', 'Understand AI\'s societal impact|Explore future AI scenarios', 3100.00, 2799.00, 18, 'ai-13.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(74, 4, NULL, NULL, 'Robot Operating System (ROS) for Absolute Beginners', 'Lentin Joseph', '9783319916339', 'Apress', 220, 'English', '2nd Edition', 'A beginner-friendly introduction to robotics programming using ROS.', 'Learn the fundamentals of building robot applications with ROS.', 'Understand ROS architecture|Build simple robot programs|Simulate robots', 3400.00, 2999.00, 15, 'ai-14.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(75, 4, NULL, NULL, 'Introduction to Autonomous Robots', 'Nikolaus Correll', '9781973129896', 'Independently Published', 260, 'English', '2nd Edition', 'A foundational guide to the mechanics and algorithms behind autonomous robots.', 'Learn the principles of robot motion, sensing, and control.', 'Understand robot kinematics|Learn sensor fusion|Apply control algorithms', 3300.00, 2899.00, 12, 'ai-15.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(76, 4, NULL, NULL, 'Natural Language Processing with Transformers', 'Lewis Tunstall, Leandro von Werra & Thomas Wolf', '9781098136796', 'O\'Reilly Media', 406, 'English', '1st Edition', 'A practical guide to building NLP applications using transformer models.', 'Learn to build and fine-tune transformer-based NLP models.', 'Understand transformer architecture|Fine-tune language models|Build NLP pipelines', 4600.00, 4199.00, 16, 'ai-16.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(77, 4, NULL, NULL, 'Building Chatbots with Python', 'Sumit Raj', '9781484240943', 'Apress', 236, 'English', '1st Edition', 'A practical guide to designing and deploying chatbots using Python.', 'Learn to build conversational AI applications from scratch.', 'Understand chatbot architecture|Apply NLP techniques|Deploy chatbot applications', 3600.00, 3299.00, 15, 'ai-17.jpg', NULL, 4.4, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(78, 4, NULL, NULL, 'Generative Deep Learning', 'David Foster', '9781098134181', 'O\'Reilly Media', 456, 'English', '2nd Edition', 'A guide to teaching machines to paint, write, compose, and play.', 'Learn techniques behind generative models like GANs and VAEs.', 'Understand generative modeling|Build GANs and VAEs|Apply generative AI techniques', 4400.00, 3999.00, 14, 'ai-19.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(79, 4, NULL, NULL, 'GANs in Action', 'Jakub Langr & Vladimir Bok', '9781617295560', 'Manning Publications', 288, 'English', '1st Edition', 'A hands-on guide to building generative adversarial networks.', 'Learn to design, train, and apply GANs to real-world problems.', 'Understand GAN architecture|Train generative models|Apply GANs to image generation', 4100.00, 3699.00, 13, 'ai-20.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:29:45', 'technology'),
(80, 4, NULL, NULL, 'AI and Machine Learning for Coders', 'Laurence Moroney', '9781492078197', 'O\'Reilly Media', 392, 'English', '1st Edition', 'A programmer\'s guide to building ML and AI applications with TensorFlow.', 'Learn practical AI and ML techniques for developers.', 'Build ML models with TensorFlow|Apply AI to real applications|Understand deployment', 4300.00, 3899.00, 18, 'ai-21.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(81, 4, NULL, NULL, 'Prompt Engineering for Generative AI', 'James Phoenix & Mike Taylor', '9781098153434', 'O\'Reilly Media', 312, 'English', '1st Edition', 'A practical guide to crafting effective prompts for generative AI tools.', 'Learn techniques to get the best results from generative AI models.', 'Master prompt design|Understand LLM behavior|Apply prompting to real tasks', 3900.00, 3499.00, 20, 'ai-22.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-03 19:29:45', 'technology'),
(82, 5, NULL, NULL, 'Python for Data Analysis', 'Wes McKinney', '9780000000082', 'O\'Reilly Media', 544, 'English', '1st Edition', 'The definitive guide to data manipulation and analysis using Python and pandas.', NULL, 'Master pandas, NumPy, and IPython for data analysis', 4200.00, 3699.00, 19, 'ds-1.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-03 19:58:05', 'technology'),
(83, 5, NULL, NULL, 'The Elements of Statistical Learning', 'Trevor Hastie, Robert Tibshirani, Jerome Friedman', '9780000000083', 'Springer', 745, 'English', '1st Edition', 'A comprehensive reference on statistical learning methods and their mathematical foundations.', NULL, 'Understand core statistical learning theory and models', 5800.00, 4999.00, 15, 'ds-2.webp', NULL, 4.6, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(84, 5, NULL, NULL, 'An Introduction to Statistical Learning', 'Gareth James, Daniela Witten, Trevor Hastie, Robert Tibshirani', '9780000000084', 'Springer', 426, 'English', '1st Edition', 'An accessible introduction to statistical learning for practitioners.', NULL, 'Apply statistical learning techniques with R', 4800.00, 4199.00, 18, 'ds-3.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-03 19:58:05', 'technology'),
(85, 5, NULL, NULL, 'Data Science from Scratch', 'Joel Grus', '9780000000085', 'O\'Reilly Media', 406, 'English', '1st Edition', 'Learn the fundamentals of data science by implementing tools and algorithms from scratch.', NULL, 'Build data science tools without relying on libraries', 4000.00, 3499.00, 20, 'ds-4.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(86, 5, NULL, NULL, 'Storytelling with Data', 'Cole Nussbaumer Knaflic', '9780000000086', 'Wiley', 288, 'English', '1st Edition', 'A practical guide to communicating data effectively through visualization.', NULL, 'Create clear, persuasive data visualizations', 3600.00, 3199.00, 22, 'ds-5.png', NULL, 4.8, 'Yes', 'Active', '2026-08-03 19:58:05', 'technology'),
(87, 5, NULL, NULL, 'Naked Statistics', 'Charles Wheelan', '9780000000087', 'W. W. Norton & Company', 304, 'English', '1st Edition', 'An entertaining, accessible introduction to statistics and its real-world uses.', NULL, 'Understand statistical concepts through everyday examples', 2900.00, 2499.00, 25, 'ds-6.jpg', NULL, 4.7, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(88, 5, NULL, NULL, 'R for Data Science', 'Hadley Wickham, Garrett Grolemund', '9780000000088', 'O\'Reilly Media', 520, 'English', '1st Edition', 'A hands-on guide to data science using the R programming language and the tidyverse.', NULL, 'Import, tidy, transform, visualize, and model data in R', 4100.00, 3599.00, 19, 'ds-7.jpg', NULL, 4.7, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(89, 5, NULL, NULL, 'Practical Statistics for Data Scientists', 'Peter Bruce, Andrew Bruce', '9780000000089', 'O\'Reilly Media', 318, 'English', '1st Edition', 'Key statistical concepts for data scientists explained practically.', NULL, 'Apply statistical methods essential for data science work', 3800.00, 3299.00, 21, 'ds-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(90, 5, NULL, NULL, 'Data Science for Business', 'Foster Provost, Tom Fawcett', '9780000000090', 'O\'Reilly Media', 414, 'English', '1st Edition', 'A guide to the fundamental data science principles behind business analytics.', NULL, 'Understand data-analytic thinking for business decisions', 4300.00, 3799.00, 17, 'ds-9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(91, 5, NULL, NULL, 'Doing Data Science', 'Cathy O\'Neil, Rachel Schutt', '9780000000091', 'O\'Reilly Media', 406, 'English', '1st Edition', 'Insights from Columbia University\'s Introduction to Data Science course.', NULL, 'Learn real-world data science practices from practitioners', 3900.00, 3399.00, 16, 'ds-10.jpg', NULL, 4.5, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(93, 5, NULL, NULL, 'The Signal and the Noise', 'Nate Silver', '9780000000093', 'Penguin Press', 544, 'English', '1st Edition', 'An exploration of prediction, probability, and why so many forecasts fail.', NULL, 'Understand the science and pitfalls of prediction', 3200.00, 2799.00, 23, 'ds-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(94, 5, NULL, NULL, 'Bad Data Handbook', 'Q. Ethan McCallum', '9780000000094', 'O\'Reilly Media', 254, 'English', '1st Edition', 'War stories and lessons learned from real-world data science projects.', NULL, 'Learn practical lessons from messy real-world data', 3300.00, 2899.00, 18, 'ds-13.jpg', NULL, 4.4, 'No', 'Active', '2026-08-03 19:58:05', 'technology'),
(108, 5, NULL, NULL, 'Weapons of Math Destruction', 'Cathy O\'Neil', '9780000000108', 'Crown', 272, 'English', '1st Edition', 'An examination of how big data algorithms can increase inequality.', NULL, 'Understand the social impact of algorithmic decision-making', 3000.00, 2599.00, 20, 'ds-11.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 06:22:26', 'technology'),
(109, 6, NULL, NULL, 'The Web Application Hacker\'s Handbook', 'Dafydd Stuttard, Marcus Pinto', '9780000000109', 'Wiley', 912, 'English', '1st Edition', 'A comprehensive guide to discovering and exploiting web application security flaws.', NULL, 'Learn to find and fix web application vulnerabilities', 5200.00, 4599.00, 18, 'cs-1.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-04 08:11:53', 'technology'),
(110, 6, NULL, NULL, 'Hacking: The Art of Exploitation', 'Jon Erickson', '9780000000110', 'No Starch Press', 488, 'English', '1st Edition', 'An introduction to programming, exploitation, and hacking from a technical perspective.', NULL, 'Understand hacking techniques from the ground up', 4300.00, 3799.00, 20, 'cs-2.webp', NULL, 4.7, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(111, 6, NULL, NULL, 'Practical Malware Analysis', 'Michael Sikorski, Andrew Honig', '9780000000111', 'No Starch Press', 800, 'English', '1st Edition', 'A hands-on guide to analyzing malicious software.', NULL, 'Learn to dissect and analyze malware safely', 4800.00, 4199.00, 15, 'cs-3.jpg', NULL, 4.8, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(112, 6, NULL, NULL, 'The Art of Deception', 'Kevin Mitnick', '9780000000112', 'Wiley', 352, 'English', '1st Edition', 'A look at social engineering tactics used by hackers to manipulate people.', NULL, 'Recognize and defend against social engineering attacks', 3200.00, 2799.00, 22, 'cs-4.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(113, 6, NULL, NULL, 'Metasploit: The Penetration Tester\'s Guide', 'David Kennedy, Jim O\'Gorman, Devon Kearns, Mati Aharoni', '9780000000113', 'No Starch Press', 328, 'English', '1st Edition', 'A practical guide to using the Metasploit Framework for penetration testing.', NULL, 'Learn penetration testing with Metasploit', 4000.00, 3499.00, 19, 'cs-5.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(114, 6, NULL, NULL, 'Applied Cryptography', 'Bruce Schneier', '9780000000114', 'Wiley', 784, 'English', '1st Edition', 'A classic reference on cryptographic algorithms and protocols.', NULL, 'Understand the theory and practice of cryptography', 5000.00, 4399.00, 14, 'cs-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(115, 6, NULL, NULL, 'Social Engineering: The Science of Human Hacking', 'Christopher Hadnagy', '9780000000115', 'Wiley', 320, 'English', '1st Edition', 'An in-depth look at the techniques and psychology behind social engineering.', NULL, 'Learn to identify and prevent social engineering attacks', 3400.00, 2999.00, 21, 'cs-7.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(116, 6, NULL, NULL, 'Ghost in the Wires', 'Kevin Mitnick', '9780000000116', 'Little, Brown and Company', 432, 'English', '1st Edition', 'The memoir of one of the world\'s most notorious hackers.', NULL, 'Understand real-world hacking history and tactics', 3100.00, 2699.00, 20, 'cs-8.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(117, 6, NULL, NULL, 'Countdown to Zero Day', 'Kim Zetter', '9780000000117', 'Crown', 448, 'English', '1st Edition', 'The story of Stuxnet and the launch of the world\'s first digital weapon.', NULL, 'Understand nation-state cyberwarfare and its origins', 3300.00, 2899.00, 18, 'cs-9.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(118, 6, NULL, NULL, 'The Cuckoo\'s Egg', 'Cliff Stoll', '9780000000118', 'Doubleday', 356, 'English', '1st Edition', 'A true story of tracking a hacker through a maze of computer espionage.', NULL, 'Learn early computer security investigation techniques', 2800.00, 2399.00, 24, 'cs-10.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(119, 6, NULL, NULL, 'Cybersecurity and Cyberwar', 'P.W. Singer, Allan Friedman', '9780000000119', 'Oxford University Press', 320, 'English', '1st Edition', 'An accessible overview of cybersecurity and cyberwarfare for a general audience.', NULL, 'Understand the landscape of modern cyber conflict', 3200.00, 2799.00, 19, 'cs-11.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(120, 6, NULL, NULL, 'Threat Modeling: Designing for Security', 'Adam Shostack', '9780000000120', 'Wiley', 624, 'English', '1st Edition', 'A practical, hands-on guide to threat modeling for security professionals.', NULL, 'Learn structured approaches to threat modeling', 4200.00, 3699.00, 16, 'cs-12.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(121, 6, NULL, NULL, 'Penetration Testing: A Hands-On Introduction to Hacking', 'Georgia Weidman', '9780000000121', 'No Starch Press', 531, 'English', '1st Edition', 'A beginner-friendly introduction to penetration testing techniques.', NULL, 'Build foundational penetration testing skills', 4100.00, 3599.00, 17, 'cs-13.webp', NULL, 4.7, 'No', 'Active', '2026-08-04 08:11:53', 'technology'),
(135, 7, NULL, NULL, 'Cloud Native Patterns', 'Cornelia Davis', '9780000000135', 'Manning Publications', 375, 'English', '1st Edition', 'A guide to designing and building applications for the cloud using modern patterns.', NULL, 'Learn architectural patterns for cloud native systems', 4000.00, 3499.00, 18, 'cc-1.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-04 08:47:43', 'technology'),
(136, 7, NULL, NULL, 'AWS Certified Solutions Architect Study Guide', 'Ben Piper, David Clinton', '9780000000136', 'Sybex', 672, 'English', '1st Edition', 'A comprehensive study guide for the AWS Certified Solutions Architect exam.', NULL, 'Prepare for and pass the AWS Solutions Architect exam', 4300.00, 3799.00, 20, 'cc-2.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(137, 7, NULL, NULL, 'Kubernetes Up and Running', 'Kelsey Hightower, Brendan Burns, Joe Beda', '9780000000137', 'O\'Reilly Media', 277, 'English', '1st Edition', 'A practical guide to deploying and managing containerized applications with Kubernetes.', NULL, 'Learn Kubernetes fundamentals and operations', 3900.00, 3399.00, 22, 'cc-3.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(138, 7, NULL, NULL, 'Terraform: Up and Running', 'Yevgeniy Brikman', '9780000000138', 'O\'Reilly Media', 457, 'English', '1st Edition', 'A hands-on guide to managing infrastructure as code with Terraform.', NULL, 'Learn infrastructure as code using Terraform', 4200.00, 3699.00, 19, 'cc-4.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(139, 7, NULL, NULL, 'Cloud Computing: Concepts, Technology & Architecture', 'Thomas Erl', '9780000000139', 'Prentice Hall', 528, 'English', '1st Edition', 'An in-depth look at cloud computing concepts, technologies, and architecture.', NULL, 'Understand foundational cloud computing architecture', 4600.00, 4099.00, 15, 'cc-5.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(140, 7, NULL, NULL, 'Google Cloud Platform for Architects', 'Vitthal Srinivasan, Janani Ravi, Judy Raj', '9780000000140', 'Packt Publishing', 524, 'English', '1st Edition', 'A guide to architecting solutions on Google Cloud Platform.', NULL, 'Design and deploy solutions on GCP', 4000.00, 3499.00, 17, 'cc-6.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(141, 7, NULL, NULL, 'Azure for Architects', 'Ritesh Modi', '9780000000141', 'Packt Publishing', 556, 'English', '1st Edition', 'A guide for architects designing solutions on Microsoft Azure.', NULL, 'Learn Azure architecture design patterns', 3900.00, 3399.00, 18, 'cc-7.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(142, 7, NULL, NULL, 'Site Reliability Engineering', 'Betsy Beyer, Chris Jones, Jennifer Petoff, Niall Murphy', '9780000000142', 'O\'Reilly Media', 552, 'English', '1st Edition', 'Insights into how Google runs production systems reliably at scale.', NULL, 'Learn site reliability engineering practices from Google', 4700.00, 4199.00, 16, 'cc-8.webp', NULL, 4.8, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(143, 7, NULL, NULL, 'Cloud Architecture Patterns', 'Bill Wilder', '9780000000143', 'O\'Reilly Media', 336, 'English', '1st Edition', 'A catalog of design patterns for building reliable cloud applications.', NULL, 'Apply proven patterns for cloud application design', 3700.00, 3199.00, 20, 'cc-9.jpg', NULL, 4.3, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(144, 7, NULL, NULL, 'Docker Deep Dive', 'Nigel Poulton', '9780000000144', 'Independently Published', 422, 'English', '1st Edition', 'A deep, practical dive into Docker containers and container fundamentals.', NULL, 'Master Docker containerization from the ground up', 3600.00, 3199.00, 21, 'cc-10.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(145, 7, NULL, NULL, 'The Phoenix Project', 'Gene Kim, Kevin Behr, George Spafford', '9780000000145', 'IT Revolution Press', 382, 'English', '1st Edition', 'A novel about IT, DevOps, and helping a business succeed.', NULL, 'Understand DevOps principles through a business narrative', 3400.00, 2999.00, 23, 'cc-11.jpg', NULL, 4.8, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(146, 7, NULL, NULL, 'Migrating to Cloud-Native Application Architectures', 'Matt Stine', '9780000000146', 'O\'Reilly Media', 92, 'English', '1st Edition', 'A short guide to designing applications for cloud-native architectures.', NULL, 'Learn principles of cloud-native application design', 2600.00, 2299.00, 25, 'cc-12.jpg', NULL, 4.3, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(147, 7, NULL, NULL, 'Serverless Architectures on AWS', 'Peter Sbarski', '9780000000147', 'Manning Publications', 320, 'English', '1st Edition', 'A practical guide to building serverless applications on AWS.', NULL, 'Build and deploy serverless applications on AWS', 3800.00, 3299.00, 18, 'cc-13.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 08:47:43', 'technology'),
(148, 8, NULL, NULL, 'The Phoenix Project', 'Gene Kim, Kevin Behr, George Spafford', '9780000000148', 'IT Revolution Press', 382, 'English', '1st Edition', 'A novel about IT, DevOps, and helping a business succeed.', NULL, 'Understand DevOps principles through a business narrative', 3400.00, 2999.00, 20, 'devop-1.webp', NULL, 4.8, 'Yes', 'Active', '2026-08-04 09:15:49', 'technology'),
(149, 8, NULL, NULL, 'The DevOps Handbook', 'Gene Kim, Jez Humble, Patrick Debois, John Willis', '9780000000149', 'IT Revolution Press', 480, 'English', '1st Edition', 'A practical guide to implementing DevOps practices in your organization.', NULL, 'Learn how to build a high-performing DevOps organization', 4300.00, 3799.00, 19, 'devop-2.jpg', NULL, 4.8, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(150, 8, NULL, NULL, 'Continuous Delivery', 'Jez Humble, David Farley', '9780000000150', 'Addison-Wesley', 512, 'English', '1st Edition', 'A guide to reliable software releases through build, test, and deployment automation.', NULL, 'Master continuous delivery pipelines and practices', 4500.00, 3999.00, 17, 'devop-3.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(151, 8, NULL, NULL, 'Accelerate', 'Nicole Forsgren, Jez Humble, Gene Kim', '9780000000151', 'IT Revolution Press', 288, 'English', '1st Edition', 'Research-backed insights into what drives high software delivery performance.', NULL, 'Understand the science behind DevOps performance', 4000.00, 3499.00, 20, 'devop-4.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(152, 8, NULL, NULL, 'Effective DevOps', 'Jennifer Davis, Ryn Daniels', '9780000000152', 'O\'Reilly Media', 316, 'English', '1st Edition', 'A guide to building and scaling effective DevOps culture and practices.', NULL, 'Learn how to implement DevOps culture in teams', 3600.00, 3199.00, 18, 'devop-5.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(153, 8, NULL, NULL, 'The Unicorn Project', 'Gene Kim', '9780000000153', 'IT Revolution Press', 480, 'English', '1st Edition', 'A novel about developers, digital disruption, and thriving in complexity.', NULL, 'Understand modern software delivery challenges through story', 3500.00, 3099.00, 22, 'devop-6.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(154, 8, NULL, NULL, 'Infrastructure as Code', 'Kief Morris', '9780000000154', 'O\'Reilly Media', 392, 'English', '1st Edition', 'A guide to managing dynamic infrastructure using code-based practices.', NULL, 'Learn infrastructure as code principles and tools', 4100.00, 3599.00, 19, 'devop-7.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(155, 8, NULL, NULL, 'Jenkins: The Definitive Guide', 'John Ferguson Smart', '9780000000155', 'O\'Reilly Media', 406, 'English', '1st Edition', 'A comprehensive guide to automating builds with Jenkins.', NULL, 'Master continuous integration using Jenkins', 3800.00, 3299.00, 18, 'devop-8.jpg', NULL, 4.3, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(156, 8, NULL, NULL, 'Ansible: Up and Running', 'Lorin Hochstein, Rene Moser', '9780000000156', 'O\'Reilly Media', 446, 'English', '1st Edition', 'A practical guide to automating infrastructure with Ansible.', NULL, 'Learn configuration management and automation with Ansible', 3900.00, 3399.00, 17, 'devop-9.webp', NULL, 4.5, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(157, 8, NULL, NULL, 'GitOps and Kubernetes', 'Billy Yuen, Alexander Matyushentsev, Todd Ekenstam, Jesse Suen', '9780000000157', 'O\'Reilly Media', 302, 'English', '1st Edition', 'A guide to implementing GitOps workflows with Kubernetes.', NULL, 'Learn GitOps practices for Kubernetes deployments', 3700.00, 3199.00, 20, 'devop-10.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(158, 8, NULL, NULL, 'Chaos Engineering', 'Casey Rosenthal, Nora Jones', '9780000000158', 'O\'Reilly Media', 336, 'English', '1st Edition', 'A guide to building confidence in complex systems through controlled experiments.', NULL, 'Learn chaos engineering principles and practices', 3900.00, 3399.00, 16, 'devop-11.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(159, 8, NULL, NULL, 'DevOps for Dummies', 'Emily Freeman', '9780000000159', 'Wiley', 384, 'English', '1st Edition', 'An approachable, beginner-friendly introduction to DevOps concepts.', NULL, 'Understand DevOps fundamentals as a beginner', 3000.00, 2599.00, 24, 'devop-12.jpg', NULL, 4.2, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(160, 8, NULL, NULL, 'Team Topologies', 'Matthew Skelton, Manuel Pais', '9780000000160', 'IT Revolution Press', 232, 'English', '1st Edition', 'A guide to organizing teams for fast software delivery.', NULL, 'Learn team topologies for effective software delivery', 3500.00, 3099.00, 21, 'devop-13.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 09:15:49', 'technology'),
(161, 9, NULL, NULL, 'The Elements of Graphic Design', 'Alex W. White', '9780000000161', 'Allworth Press', 176, 'English', '1st Edition', 'An overview of key concepts and principles in graphic design.', NULL, 'Learn foundational graphic design principles', 3200.00, 2799.00, 20, 'gr-design1.webp', NULL, 4.5, 'Yes', 'Active', '2026-08-04 09:49:11', 'creative'),
(162, 9, NULL, NULL, 'Thinking with Type', 'Ellen Lupton', '9780000000162', 'Princeton Architectural Press', 176, 'English', '1st Edition', 'A practical guide to using typography effectively in design.', NULL, 'Master typography for graphic design projects', 3400.00, 2999.00, 22, 'gr-design2.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(163, 9, NULL, NULL, 'Grid Systems in Graphic Design', 'Josef Muller-Brockmann', '9780000000163', 'Verlag Niggli', 176, 'English', '1st Edition', 'A classic reference on grid systems for visual communication.', NULL, 'Understand grid-based design systems', 3800.00, 3299.00, 15, 'gr-design3.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(164, 9, NULL, NULL, 'Logo Design Love', 'David Airey', '9780000000164', 'New Riders', 240, 'English', '1st Edition', 'Insights and case studies on creating memorable logo designs.', NULL, 'Learn the process behind effective logo design', 3300.00, 2899.00, 19, 'gr-design4.jpg', NULL, 4.6, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(165, 9, NULL, NULL, 'Designing Brand Identity', 'Alina Wheeler', '9780000000165', 'Wiley', 312, 'English', '1st Edition', 'A comprehensive guide to building, managing, and evolving brand identity.', NULL, 'Learn to design and manage brand identity', 4000.00, 3499.00, 17, 'gr-design5.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(166, 9, NULL, NULL, 'The Non-Designer\'s Design Book', 'Robin Williams', '9780000000166', 'Peachpit Press', 224, 'English', '1st Edition', 'An accessible introduction to core design principles for non-designers.', NULL, 'Learn design basics without formal design training', 2900.00, 2499.00, 25, 'gr-design6.webp', NULL, 4.6, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(167, 9, NULL, NULL, 'Interaction of Color', 'Josef Albers', '9780000000167', 'Yale University Press', 80, 'English', '1st Edition', 'A foundational study of color theory and perception.', NULL, 'Understand color theory and interaction', 3600.00, 3199.00, 18, 'gr-design7.jpg', NULL, 4.8, 'No', 'Active', '2026-08-04 09:49:11', 'creative');
INSERT INTO `books` (`id`, `category_id`, `author_id`, `publisher_id`, `title`, `author`, `isbn`, `publisher`, `pages`, `language`, `edition`, `description`, `about_book`, `what_you_learn`, `price`, `sale_price`, `stock`, `image`, `pdf_file`, `rating`, `featured`, `status`, `created_at`, `image_folder`) VALUES
(168, 9, NULL, NULL, 'Meggs\' History of Graphic Design', 'Philip B. Meggs, Alston W. Purvis', '9780000000168', 'Wiley', 688, 'English', '1st Edition', 'A comprehensive history of graphic design from its origins to today.', NULL, 'Learn the historical evolution of graphic design', 4600.00, 4099.00, 14, 'gr-design8.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(169, 9, NULL, NULL, 'Making and Breaking the Grid', 'Timothy Samara', '9780000000169', 'Rockport Publishers', 192, 'English', '1st Edition', 'Explores grid systems and how to creatively break them.', NULL, 'Learn grid systems and creative layout techniques', 3300.00, 2899.00, 20, 'gr-design9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(170, 9, NULL, NULL, 'Adobe Photoshop Classroom in a Book', 'Adobe Creative Team', '9780000000170', 'Adobe Press', 528, 'English', '1st Edition', 'A step-by-step guide to learning Adobe Photoshop.', NULL, 'Master Photoshop tools and workflows', 3900.00, 3399.00, 19, 'gr-design10.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(171, 9, NULL, NULL, 'Steal Like an Artist', 'Austin Kleon', '9780000000171', 'Workman Publishing', 176, 'English', '1st Edition', 'A short manifesto on creativity and finding inspiration.', NULL, 'Learn to develop a creative practice', 2600.00, 2199.00, 26, 'gr-design11.jpg', NULL, 4.7, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(172, 9, NULL, NULL, 'Design Is Storytelling', 'Ellen Lupton', '9780000000172', 'Princeton Architectural Press', 176, 'English', '1st Edition', 'Explores how design can be used to tell compelling stories.', NULL, 'Learn narrative techniques in design', 3300.00, 2899.00, 18, 'gr-design12.jpg', NULL, 4.5, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(173, 9, NULL, NULL, 'Color Design Workbook', 'Sean Adams, Terry Lee Stone, Noreen Morioka', '9780000000173', 'Rockport Publishers', 240, 'English', '1st Edition', 'A workbook of practical color theory exercises for designers.', NULL, 'Apply color theory in real design projects', 3200.00, 2799.00, 20, 'gr-design13.jpg', NULL, 4.4, 'No', 'Active', '2026-08-04 09:49:11', 'creative'),
(174, 10, NULL, NULL, 'Don\'t Make Me Think', 'Steve Krug', '9780000000174', 'New Riders', 216, 'English', '1st Edition', 'A practical guide to web usability and intuitive navigation design.', NULL, 'Learn to design intuitive, usable interfaces', 3100.00, 2699.00, 25, 'ui-ux-1.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(175, 10, NULL, NULL, 'The Design of Everyday Things', 'Don Norman', '9780000000175', 'Basic Books', 368, 'English', '1st Edition', 'A foundational text on how design shapes usability and human behavior.', NULL, 'Understand human-centered design principles', 3300.00, 2899.00, 22, 'ui-ux-2.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(176, 10, NULL, NULL, 'About Face: The Essentials of Interaction Design', 'Alan Cooper, Robert Reimann, David Cronin', '9780000000176', 'Wiley', 610, 'English', '1st Edition', 'A comprehensive guide to interaction design principles and practices.', NULL, 'Master interaction design fundamentals', 4400.00, 3899.00, 16, 'ui-ux-3.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(177, 10, NULL, NULL, 'Sprint', 'Jake Knapp', '9780000000177', 'Simon & Schuster', 288, 'English', '1st Edition', 'A guide to solving big problems and testing ideas in five days.', NULL, 'Learn the design sprint process', 3000.00, 2599.00, 23, 'ui-ux-4.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(178, 10, NULL, NULL, 'Lean UX', 'Jeff Gothelf, Josh Seiden', '9780000000178', 'O\'Reilly Media', 184, 'English', '1st Edition', 'A guide to integrating UX practices into agile product development.', NULL, 'Apply lean UX methods in agile teams', 3200.00, 2799.00, 20, 'ui-ux-5.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(179, 10, NULL, NULL, '100 Things Every Designer Needs to Know About People', 'Susan Weinschenk', '9780000000179', 'New Riders', 256, 'English', '1st Edition', 'Psychological principles designers need to understand people.', NULL, 'Learn the psychology behind good design', 3100.00, 2699.00, 21, 'ui-ux-6.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(180, 10, NULL, NULL, 'Design Systems', 'Alla Kholmatova', '9780000000180', 'Smashing Magazine', 240, 'English', '1st Edition', 'A guide to building and maintaining effective design systems.', NULL, 'Learn to create scalable design systems', 3600.00, 3199.00, 18, 'ui-ux-7.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(181, 10, NULL, NULL, 'Refactoring UI', 'Adam Wathan, Steve Schoger', '9780000000181', 'Independently Published', 188, 'English', '1st Edition', 'Practical tips for improving UI design without a design background.', NULL, 'Learn practical UI design techniques', 3300.00, 2899.00, 20, 'ui-ux-8.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(182, 10, NULL, NULL, 'The Elements of User Experience', 'Jesse James Garrett', '9780000000182', 'New Riders', 192, 'English', '1st Edition', 'A foundational overview of user experience design elements.', NULL, 'Understand the layers of user experience design', 2900.00, 2499.00, 24, 'ui-ux-9.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(183, 10, NULL, NULL, 'UX Strategy', 'Jaime Levy', '9780000000183', 'O\'Reilly Media', 280, 'English', '1st Edition', 'A guide to validating product ideas through customer research.', NULL, 'Learn UX strategy and product validation', 3400.00, 2999.00, 19, 'ui-ux-10.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(184, 10, NULL, NULL, 'Rocket Surgery Made Easy', 'Steve Krug', '9780000000184', 'New Riders', 168, 'English', '1st Edition', 'A practical guide to conducting low-cost usability testing.', NULL, 'Learn to run effective usability tests', 2800.00, 2399.00, 25, 'ui-ux-11.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(185, 10, NULL, NULL, 'Atomic Design', 'Brad Frost', '9780000000185', 'Independently Published', 244, 'English', '1st Edition', 'A methodology for creating and maintaining design systems.', NULL, 'Learn atomic design methodology', 3200.00, 2799.00, 20, 'ui-ux-12.png', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(186, 10, NULL, NULL, 'Interaction Design: Beyond Human-Computer Interaction', 'Jenny Preece, Yvonne Rogers, Helen Sharp', '9780000000186', 'Wiley', 585, 'English', '1st Edition', 'A comprehensive textbook on interaction design and HCI principles.', NULL, 'Understand human-computer interaction fundamentals', 4300.00, 3799.00, 15, 'ui-ux-13.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 11:35:16', 'creative'),
(187, 11, NULL, NULL, 'The Animator\'s Survival Kit', 'Richard Williams', '9780000000187', 'Faber & Faber', 344, 'English', '1st Edition', 'A comprehensive manual on the principles of animation from a master animator.', NULL, 'Master classical animation principles and techniques', 4200.00, 3699.00, 17, 'mg-1.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(188, 11, NULL, NULL, 'Cinematography: Theory and Practice', 'Blain Brown', '9780000000188', 'Routledge', 372, 'English', '1st Edition', 'A guide to the technical and artistic aspects of cinematography.', NULL, 'Learn cinematography theory and camera techniques', 4000.00, 3499.00, 18, 'mg-2.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(189, 11, NULL, NULL, 'Motion Graphics: Principles and Practices from the Ground Up', 'Michael Betancourt', '9780000000189', 'Wildside Press', 220, 'English', '1st Edition', 'An exploration of motion graphics principles and practical applications.', NULL, 'Understand core motion graphics concepts', 3300.00, 2899.00, 19, 'mg-3.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(190, 11, NULL, NULL, 'Graphics and Motion Design', 'Jon Krasner', '9780000000190', 'Focal Press', 384, 'English', '1st Edition', 'A guide to the artistic and technical elements of motion design.', NULL, 'Learn graphics and motion design fundamentals', 3600.00, 3199.00, 17, 'mg-4.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(191, 11, NULL, NULL, 'Design for Motion', 'Austin Shaw', '9780000000191', 'New Riders', 264, 'English', '1st Edition', 'A guide to storytelling and design principles for motion graphics.', NULL, 'Apply design thinking to motion graphics projects', 3400.00, 2999.00, 18, 'mg-5.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(192, 11, NULL, NULL, 'After Effects Apprentice', 'Trish Meyer, Chris Meyer', '9780000000192', 'Peachpit Press', 552, 'English', '1st Edition', 'A comprehensive guide to mastering Adobe After Effects.', NULL, 'Master core and advanced After Effects techniques', 3900.00, 3399.00, 16, 'mg-6.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(193, 11, NULL, NULL, 'After Effects for Designers', 'Chris Jackson', '9780000000193', 'New Riders', 320, 'English', '1st Edition', 'A practical guide to using After Effects for design-driven motion work.', NULL, 'Learn After Effects workflows for designers', 3600.00, 3199.00, 17, 'mg-7.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(194, 11, NULL, NULL, 'Timing for Animation', 'Harold Whitaker, John Halas', '9780000000194', 'Focal Press', 144, 'English', '1st Edition', 'A classic reference on timing techniques in animation.', NULL, 'Understand timing principles in animation', 3100.00, 2699.00, 20, 'mg-8.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(195, 11, NULL, NULL, 'Understanding Motion Graphics', 'Ian Crook, Peter Beare', '9780000000195', 'AVA Publishing', 184, 'English', '1st Edition', 'An accessible introduction to motion graphics concepts and history.', NULL, 'Learn the fundamentals of motion graphics', 3300.00, 2899.00, 18, 'mg-9.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(196, 11, NULL, NULL, 'Producing Animation', 'Catherine Winder, Zahra Dowlatabadi', '9780000000196', 'Focal Press', 312, 'English', '1st Edition', 'A guide to the business and production process of animation.', NULL, 'Learn animation production and project management', 3800.00, 3299.00, 15, 'mg-10.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(197, 11, NULL, NULL, 'The Illusion of Life: Disney Animation', 'Frank Thomas, Ollie Johnston', '9780000000197', 'Disney Editions', 575, 'English', '1st Edition', 'The classic reference on Disney\'s animation principles and techniques.', NULL, 'Learn the twelve principles of animation', 5200.00, 4599.00, 12, 'mg-11.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(198, 11, NULL, NULL, 'Creative Motion Graphic Titling for Film, Video, and the Web', 'Yael Braha, Nicholas Byrd', '9780000000198', 'Focal Press', 240, 'English', '1st Edition', 'A guide to designing effective motion graphic titling for film and video.', NULL, 'Learn motion titling design for film and video', 3500.00, 3099.00, 17, 'mg-12.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(199, 11, NULL, NULL, 'Real World Adobe After Effects', 'Chris Meyer, Trish Meyer', '9780000000199', 'Peachpit Press', 696, 'English', '1st Edition', 'An in-depth technical and creative guide to Adobe After Effects.', NULL, 'Master advanced After Effects production techniques', 4300.00, 3799.00, 14, 'mg-13.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 12:38:47', 'creative'),
(200, 12, NULL, NULL, 'In the Blink of an Eye', 'Walter Murch', '9780000000200', 'Silman-James Press', 164, 'English', '1st Edition', 'A renowned film editor\'s reflections on the art of film editing.', NULL, 'Understand the artistic principles of film editing', 2900.00, 2499.00, 22, 've-1.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(201, 12, NULL, NULL, 'The Technique of Film and Video Editing', 'Ken Dancyger', '9780000000201', 'Routledge', 528, 'English', '1st Edition', 'A comprehensive guide to the history and technique of film and video editing.', NULL, 'Learn editing techniques across film history and style', 4100.00, 3599.00, 17, 've-2.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(202, 12, NULL, NULL, 'Adobe Premiere Pro Classroom in a Book', 'Adobe Creative Team', '9780000000202', 'Adobe Press', 464, 'English', '1st Edition', 'A step-by-step guide to learning Adobe Premiere Pro.', NULL, 'Master Premiere Pro editing workflows', 3800.00, 3299.00, 19, 've-3.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(203, 12, NULL, NULL, 'DaVinci Resolve Colorist Guide', 'Alexis Van Hurkman', '9780000000203', 'Independently Published', 280, 'English', '1st Edition', 'A practical guide to color grading using DaVinci Resolve.', NULL, 'Learn color grading techniques in DaVinci Resolve', 3600.00, 3199.00, 18, 've-4.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(204, 12, NULL, NULL, 'Final Cut Pro Efficient Editing', 'Iain Anderson', '9780000000204', 'Independently Published', 240, 'English', '1st Edition', 'A guide to efficient editing workflows in Final Cut Pro.', NULL, 'Learn efficient editing techniques in Final Cut Pro', 3300.00, 2899.00, 17, 've-5.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(205, 12, NULL, NULL, 'Cut by Cut: Editing Your Film or Video', 'Gael Chandler', '9780000000205', 'Michael Wiese Productions', 312, 'English', '1st Edition', 'A practical guide to the craft of editing film and video projects.', NULL, 'Learn practical film and video editing techniques', 3400.00, 2999.00, 18, 've-6.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(206, 12, NULL, NULL, 'The Film Editing Room Handbook: How to Tame the Chaos of the Editing Room', 'Norman Hollyn', '9780000000206', 'Peachpit Press', 384, 'English', '1st Edition', 'A comprehensive handbook covering the film editing process.', NULL, 'Master the full film editing workflow', 3700.00, 3199.00, 16, 've-7.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(207, 12, NULL, NULL, 'The Filmmaker\'s Eye', 'Gustavo Mercado', '9780000000207', 'Focal Press', 288, 'English', '1st Edition', 'A visual guide to shot composition and its role in storytelling.', NULL, 'Understand composition and shot design for editing', 3300.00, 2899.00, 19, 've-8.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(208, 12, NULL, NULL, 'Grammar of the Edit', 'Roy Thompson, Christopher J. Bowen', '9780000000208', 'Focal Press', 456, 'English', '1st Edition', 'A comprehensive reference on the grammar and craft of editing.', NULL, 'Learn the fundamental grammar of film editing', 4000.00, 3499.00, 16, 've-9.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(209, 12, NULL, NULL, 'Sound Editing and Mixing', 'David Yewdall', '9780000000209', 'Focal Press', 528, 'English', '1st Edition', 'A guide to sound editing, mixing, and design for film.', NULL, 'Learn sound editing and mixing techniques', 3900.00, 3399.00, 15, 've-10.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(210, 12, NULL, NULL, 'Color Correction Handbook', 'Alexis Van Hurkman', '9780000000210', 'Peachpit Press', 720, 'English', '1st Edition', 'An in-depth reference on color correction and grading.', NULL, 'Master professional color correction techniques', 4600.00, 4099.00, 13, 've-11.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(211, 12, NULL, NULL, 'Nonlinear Editing', 'Patricia D. Rose', '9780000000211', 'CMP Books', 300, 'English', '1st Edition', 'An introduction to nonlinear editing systems and workflows.', NULL, 'Learn nonlinear editing system fundamentals', 3200.00, 2799.00, 18, 've-12.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(212, 12, NULL, NULL, 'Editing Techniques with Final Cut Pro', 'Lisa Brenneis', '9780000000212', 'Peachpit Press', 352, 'English', '1st Edition', 'A hands-on guide to editing techniques using Final Cut Pro.', NULL, 'Apply practical editing techniques in Final Cut Pro', 3300.00, 2899.00, 17, 've-13.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(213, 12, NULL, NULL, 'The Eye Is Quicker: Film Editing', 'Richard D. Pepperman', '9780000000213', 'Focal Press', 384, 'English', '1st Edition', 'An exploration of film editing as an art of rhythm and pacing.', NULL, 'Understand pacing and rhythm in film editing', 3500.00, 3099.00, 16, 've-14.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(214, 12, NULL, NULL, 'First Cut: Conversations with Film Editors', 'Gabriella Oldham', '9780000000214', 'University of California Press', 320, 'English', '1st Edition', 'Interviews with top film editors on their craft and process.', NULL, 'Learn from the perspectives of professional film editors', 3400.00, 2999.00, 15, 've-15.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-04 13:14:13', 'creative'),
(215, 13, NULL, NULL, 'Digital Modeling', 'William Vaughan', '9780000000215', 'Sybex', 464, 'English', '1st Edition', 'A guide to digital modeling techniques for 3D artists and animators.', NULL, 'Learn core digital modeling workflows and techniques', 4300.00, 3799.00, 18, '3Dm-1.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(216, 13, NULL, NULL, 'Blender For Dummies', 'Jason van Gumster', '9780000000216', 'Wiley', 408, 'English', '1st Edition', 'A beginner-friendly, approachable introduction to 3D modeling with Blender.', NULL, 'Get started with Blender for 3D modeling', 3200.00, 2799.00, 22, '3Dm-2.jpg', NULL, 4.7, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(217, 13, NULL, NULL, '3ds Max Modeling for Games', 'Andrew Gahan', '9780000000217', 'Focal Press', 432, 'English', '1st Edition', 'A practical guide to creating game-ready 3D models with 3ds Max.', NULL, 'Learn game asset modeling techniques in 3ds Max', 4000.00, 3499.00, 19, '3Dm-3.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(218, 13, NULL, NULL, 'The Art of 3D Computer Animation and Effects', 'Isaac Kerlow', '9780000000218', 'Wiley', 456, 'English', '1st Edition', 'A comprehensive guide to the art and technique of 3D computer animation and visual effects.', NULL, 'Understand principles of 3D animation and VFX', 4600.00, 4099.00, 15, '3Dm-4.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(219, 13, NULL, NULL, 'ZBrush Character Creation', 'Scott Spencer', '9780000000219', 'Focal Press', 320, 'English', '1st Edition', 'A guide to character creation and sculpting techniques using ZBrush.', NULL, 'Learn character sculpting workflows in ZBrush', 4100.00, 3599.00, 17, '3Dm-5.jpg', NULL, 4.9, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(220, 13, NULL, NULL, 'Mastering Autodesk Maya', 'Todd Palamar', '9780000000220', 'Sybex', 912, 'English', '1st Edition', 'A comprehensive, official guide to 3D modeling and animation in Autodesk Maya.', NULL, 'Master 3D modeling and animation in Maya', 4800.00, 4299.00, 14, '3Dm-6.jpg', NULL, 5.0, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(221, 13, NULL, NULL, '3D Modeling and Animation: Synthesis and Analysis Techniques', 'Zhaoqi Wang et al.', '9780000000221', 'Springer', 380, 'English', '1st Edition', 'An academic exploration of 3D modeling and animation synthesis techniques.', NULL, 'Understand advanced 3D modeling and animation theory', 4400.00, 3899.00, 13, '3Dm-7.jpg', NULL, 4.7, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(222, 13, NULL, NULL, 'Introducing Character Animation with Blender', 'Tony Mullen', '9780000000222', 'Wiley', 384, 'English', '1st Edition', 'An introduction to character animation techniques using Blender.', NULL, 'Learn character animation fundamentals in Blender', 3600.00, 3199.00, 19, '3Dm-8.jpg', NULL, 4.8, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(223, 13, NULL, NULL, 'Digital Sculpting with Mudbox', 'William Vaughan', '9780000000223', 'Sybex', 320, 'English', '1st Edition', 'A practical guide to digital sculpting using Autodesk Mudbox.', NULL, 'Learn digital sculpting techniques in Mudbox', 3800.00, 3299.00, 18, '3Dm-9.jpg', NULL, 4.7, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(224, 13, NULL, NULL, 'The Complete Guide to Blender Graphics', 'John M. Blain', '9780000000224', 'Focal Press', 456, 'English', '1st Edition', 'A complete reference guide covering Blender\'s graphics and modeling tools.', NULL, 'Master Blender\'s complete graphics toolset', 4000.00, 3499.00, 17, '3Dm-10.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-05 11:46:15', 'creative'),
(225, 13, NULL, NULL, 'Beginning Blender', 'Lance Flavell', '9780000000225', 'Apress', 384, 'English', '1st Edition', 'A beginner\'s guide to getting started with 3D modeling in Blender.', NULL, 'Learn Blender basics for 3D modeling', 3300.00, 2899.00, 21, '3Dm-11.jpg', NULL, 4.6, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(226, 13, NULL, NULL, '3D Art Essentials', 'Ami Chopine', '9780000000226', 'Focal Press', 304, 'English', '1st Edition', 'An overview of essential techniques and concepts in 3D art creation.', NULL, 'Understand foundational 3D art techniques', 3500.00, 3099.00, 20, '3Dm-12.jpg', NULL, 4.8, 'No', 'Active', '2026-08-05 11:46:15', 'creative'),
(242, 14, NULL, NULL, 'Digital Marketing Fundamentals', 'Author Name', '9780000001001', 'Publisher Name', 280, 'English', '1st Edition', 'An introduction to core digital marketing concepts.', NULL, 'Understand digital marketing basics', 2900.00, 2499.00, 18, 'dm-1.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(243, 14, NULL, NULL, 'SEO Strategy Guide', 'Author Name', '9780000001002', 'Publisher Name', 260, 'English', '1st Edition', 'A practical guide to search engine optimization.', NULL, 'Learn SEO strategies', 3100.00, 2699.00, 20, 'dm-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(244, 14, NULL, NULL, 'Social Media Marketing', 'Author Name', '9780000001003', 'Publisher Name', 300, 'English', '1st Edition', 'Guide to building brands on social media.', NULL, 'Master social media campaigns', 3300.00, 2899.00, 22, 'dm-3.jpg', NULL, 4.5, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(245, 14, NULL, NULL, 'Content Marketing Playbook', 'Author Name', '9780000001004', 'Publisher Name', 270, 'English', '1st Edition', 'Strategies for effective content marketing.', NULL, 'Create engaging content strategies', 3000.00, 2599.00, 19, 'dm-4.jpg', NULL, 4.4, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(246, 14, NULL, NULL, 'Email Marketing Mastery', 'Author Name', '9780000001005', 'Publisher Name', 240, 'English', '1st Edition', 'A guide to building effective email campaigns.', NULL, 'Learn email marketing techniques', 2800.00, 2399.00, 17, 'dm-5.jpg', NULL, 4.4, 'Yes', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(247, 14, NULL, NULL, 'Google Ads Essentials', 'Author Name', '9780000001006', 'Publisher Name', 290, 'English', '1st Edition', 'Comprehensive guide to running Google Ads campaigns.', NULL, 'Understand PPC advertising', 3400.00, 2999.00, 21, 'dm-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(248, 14, NULL, NULL, 'Analytics for Marketers', 'Author Name', '9780000001007', 'Publisher Name', 310, 'English', '1st Edition', 'Using data and analytics to guide marketing decisions.', NULL, 'Interpret marketing analytics', 3200.00, 2799.00, 20, 'dm-7.jpg', NULL, 4.5, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(249, 14, NULL, NULL, 'Branding in the Digital Age', 'Author Name', '9780000001008', 'Publisher Name', 320, 'English', '1st Edition', 'How to build strong brands online.', NULL, 'Develop digital branding strategies', 3500.00, 3099.00, 23, 'dm-8.jpg', NULL, 4.7, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(250, 14, NULL, NULL, 'Influencer Marketing Guide', 'Author Name', '9780000001009', 'Publisher Name', 250, 'English', '1st Edition', 'Working with influencers to grow your brand.', NULL, 'Plan influencer campaigns', 2700.00, 2299.00, 16, 'dm-9.jpg', NULL, 4.3, 'Yes', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(251, 14, NULL, NULL, 'Marketing Automation Basics', 'Author Name', '9780000001010', 'Publisher Name', 300, 'English', '1st Edition', 'Introduction to automating marketing workflows.', NULL, 'Set up marketing automation', 3300.00, 2899.00, 18, 'dm-10.jpg', NULL, 4.5, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(252, 14, NULL, NULL, 'Conversion Rate Optimization', 'Author Name', '9780000001011', 'Publisher Name', 280, 'English', '1st Edition', 'Techniques to improve website conversions.', NULL, 'Optimize conversion funnels', 3100.00, 2699.00, 19, 'dm-11.jpg', NULL, 4.4, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(253, 14, NULL, NULL, 'E-commerce Marketing Strategies', 'Author Name', '9780000001012', 'Publisher Name', 330, 'English', '1st Edition', 'Marketing tactics for online stores.', NULL, 'Grow e-commerce sales', 3600.00, 3199.00, 24, 'dm-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(254, 14, NULL, NULL, 'Copywriting for Marketers', 'Author Name', '9780000001013', 'Publisher Name', 260, 'English', '1st Edition', 'Writing persuasive copy that converts.', NULL, 'Write high-converting copy', 2900.00, 2499.00, 17, 'dm-13.jpg', NULL, 4.5, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(255, 14, NULL, NULL, 'Video Marketing Handbook', 'Author Name', '9780000001014', 'Publisher Name', 290, 'English', '1st Edition', 'Using video content to grow engagement.', NULL, 'Create effective video campaigns', 3200.00, 2799.00, 20, 'dm-14.jpg', NULL, 4.5, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(256, 14, NULL, NULL, 'Digital Marketing Analytics & Trends', 'Author Name', '9780000001015', 'Publisher Name', 310, 'English', '1st Edition', 'Staying ahead with current marketing trends.', NULL, 'Understand emerging marketing trends', 3400.00, 2999.00, 22, 'dm-15.jpg', NULL, 4.6, 'No', 'Active', '2026-08-05 19:29:56', 'buisiness'),
(257, 15, NULL, NULL, 'Good to Great', 'Jim Collins', '9780000002001', 'HarperBusiness', 320, 'English', '1st Edition', 'An in-depth study of what separates good companies from truly great ones.', NULL, 'Understand the principles that drive sustained business greatness', 4300.00, 3799.00, 20, 'biz-1.png', NULL, 4.7, 'Yes', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(258, 15, NULL, NULL, 'The Lean Startup', 'Eric Ries', '9780000002002', 'Crown Business', 336, 'English', '1st Edition', 'A methodology for building successful startups through validated learning and rapid iteration.', NULL, 'Learn the lean startup methodology for building new ventures', 3900.00, 3399.00, 22, 'biz-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(259, 15, NULL, NULL, 'Zero to One', 'Peter Thiel', '9780000002003', 'Crown Business', 224, 'English', '1st Edition', 'Notes on startups and how to build companies that create new things.', NULL, 'Understand how to build innovative, monopoly-scale businesses', 3400.00, 2999.00, 25, 'biz-3.png', NULL, 4.7, 'Yes', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(260, 15, NULL, NULL, 'The Innovator\'s Dilemma', 'Clayton M. Christensen', '9780000002004', 'Harvard Business Review Press', 286, 'English', '1st Edition', 'A classic exploration of why great companies fail when facing disruptive innovation.', NULL, 'Understand disruptive innovation and its impact on incumbents', 4100.00, 3599.00, 18, 'biz-4.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(261, 15, NULL, NULL, 'Built to Last', 'Jim Collins, Jerry I. Porras', '9780000002005', 'HarperBusiness', 368, 'English', '1st Edition', 'A study of visionary companies and the habits that helped them endure.', NULL, 'Learn the traits of enduring, visionary companies', 4000.00, 3499.00, 19, 'biz-5.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(262, 15, NULL, NULL, 'Blue Ocean Strategy', 'W. Chan Kim, Renee Mauborgne', '9780000002006', 'Harvard Business Review Press', 287, 'English', '1st Edition', 'A framework for creating uncontested market space and making competition irrelevant.', NULL, 'Learn to create new market space instead of competing head-on', 3800.00, 3299.00, 20, 'biz-6.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(263, 15, NULL, NULL, 'The E-Myth Revisited', 'Michael E. Gerber', '9780000002007', 'HarperBusiness', 288, 'English', '1st Edition', 'A guide to why most small businesses fail and what to do about it.', NULL, 'Learn how to build a business that works without you', 3200.00, 2799.00, 24, 'biz-7.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(264, 15, NULL, NULL, 'Competitive Strategy', 'Michael E. Porter', '9780000002008', 'Free Press', 396, 'English', '1st Edition', 'A foundational framework for analyzing industries and competitors.', NULL, 'Understand core frameworks for competitive strategy', 4600.00, 4099.00, 15, 'biz-8.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(265, 15, NULL, NULL, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', '9780000002009', 'Free Press', 381, 'English', '1st Edition', 'A principle-centered approach to personal and professional effectiveness.', NULL, 'Learn habits that build lasting personal and professional effectiveness', 3300.00, 2899.00, 26, 'biz-9.webp', NULL, 4.7, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(266, 15, NULL, NULL, 'Start with Why', 'Simon Sinek', '9780000002010', 'Portfolio', 256, 'English', '1st Edition', 'An exploration of how great leaders inspire action by starting with purpose.', NULL, 'Learn to lead and market with purpose-driven thinking', 3100.00, 2699.00, 23, 'biz-10.webp', NULL, 4.6, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(267, 15, NULL, NULL, 'Business Model Generation', 'Alexander Osterwalder, Yves Pigneur', '9780000002011', 'Wiley', 288, 'English', '1st Edition', 'A visual guide to designing and testing business models.', NULL, 'Learn to design and innovate business models', 4400.00, 3899.00, 17, 'biz-11.webp', NULL, 4.7, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(268, 15, NULL, NULL, 'Measure What Matters', 'John Doerr', '9780000002012', 'Portfolio', 320, 'English', '1st Edition', 'A guide to goal-setting using the OKR framework used by top companies.', NULL, 'Learn to set and track goals using OKRs', 3400.00, 2999.00, 21, 'biz-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(269, 15, NULL, NULL, 'The Hard Thing About Hard Things', 'Ben Horowitz', '9780000002013', 'HarperBusiness', 304, 'English', '1st Edition', 'Candid insights on building and running a business through difficult times.', NULL, 'Learn practical lessons for navigating tough business decisions', 3600.00, 3199.00, 19, 'biz-13.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(270, 15, NULL, NULL, 'Shoe Dog', 'Phil Knight', '9780000002014', 'Scribner', 400, 'English', '1st Edition', 'A memoir detailing the founding and growth of Nike.', NULL, 'Learn entrepreneurial lessons from the founding of Nike', 3300.00, 2899.00, 20, 'biz-14.jpg', NULL, 4.8, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(271, 15, NULL, NULL, 'Principles: Life and Work', 'Ray Dalio', '9780000002015', 'Simon & Schuster', 592, 'English', '1st Edition', 'A collection of life and work principles from a renowned investor.', NULL, 'Learn principles for effective decision-making in life and work', 4200.00, 3699.00, 18, 'biz-15.png', NULL, 4.6, 'No', 'Active', '2026-08-06 07:14:24', 'buisiness'),
(272, 16, NULL, NULL, 'The $100 Startup', 'Chris Guillebeau', '9780000003001', 'Crown Business', 288, 'English', '1st Edition', 'A guide to building a profitable business around your passions with minimal capital.', NULL, 'Learn to launch a low-cost, self-employed business', 3100.00, 2699.00, 24, 'ent-1.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(273, 16, NULL, NULL, 'Rework', 'Jason Fried, David Heinemeier Hansson', '9780000003002', 'Currency', 279, 'English', '1st Edition', 'A contrarian, no-nonsense approach to building and running a business.', NULL, 'Learn a leaner, faster approach to building a business', 2900.00, 2499.00, 25, 'ent-2.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(274, 16, NULL, NULL, 'The Founder\'s Dilemmas', 'Noam Wasserman', '9780000003003', 'Princeton University Press', 480, 'English', '1st Edition', 'A research-based look at the critical decisions founders must navigate.', NULL, 'Understand key trade-offs founders face when building startups', 4300.00, 3799.00, 15, 'ent-3.jpg', NULL, 4.4, 'Yes', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(275, 16, NULL, NULL, 'Venture Deals', 'Brad Feld, Jason Mendelson', '9780000003004', 'Wiley', 320, 'English', '1st Edition', 'An insider\'s guide to understanding venture capital term sheets and deals.', NULL, 'Learn to navigate venture capital fundraising and deal terms', 3800.00, 3299.00, 18, 'ent-4.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(276, 16, NULL, NULL, 'Crossing the Chasm', 'Geoffrey A. Moore', '9780000003005', 'Harper Business', 254, 'English', '1st Edition', 'A guide to marketing and selling disruptive products to mainstream customers.', NULL, 'Learn to move products from early adopters to mainstream markets', 3600.00, 3199.00, 19, 'ent-5.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(277, 16, NULL, NULL, 'The Startup Owner\'s Manual', 'Steve Blank, Bob Dorf', '9780000003006', 'K&S Ranch', 608, 'English', '1st Edition', 'A step-by-step guide to building successful startups using customer development.', NULL, 'Learn the customer development process for startups', 4600.00, 4099.00, 14, 'ent-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(278, 16, NULL, NULL, 'Traction', 'Gino Wickman', '9780000003007', 'BenBella Books', 256, 'English', '1st Edition', 'A practical system for gaining traction and control in growing businesses.', NULL, 'Learn the EOS framework for running a business effectively', 3200.00, 2799.00, 22, 'ent-7.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(279, 16, NULL, NULL, 'Delivering Happiness', 'Tony Hsieh', '9780000003008', 'Business Plus', 272, 'English', '1st Edition', 'A memoir on building company culture and customer service at Zappos.', NULL, 'Learn how company culture drives long-term business success', 3000.00, 2599.00, 23, 'ent-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(280, 16, NULL, NULL, 'The Innovator\'s Solution', 'Clayton M. Christensen, Michael E. Raynor', '9780000003009', 'Harvard Business Review Press', 304, 'English', '1st Edition', 'A follow-up guide on how companies can create and sustain successful growth.', NULL, 'Learn strategies for building disruptive, growth-focused businesses', 4100.00, 3599.00, 16, 'ent-9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(281, 16, NULL, NULL, 'Purple Cow', 'Seth Godin', '9780000003010', 'Portfolio', 192, 'English', '1st Edition', 'A guide to transforming your business by being remarkable.', NULL, 'Learn to build remarkable products worth talking about', 2800.00, 2399.00, 25, 'ent-10.jpg', NULL, 4.4, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(282, 16, NULL, NULL, 'The Art of the Start 2.0', 'Guy Kawasaki', '9780000003011', 'Portfolio', 320, 'English', '1st Edition', 'A practical guide to launching and building a successful venture.', NULL, 'Learn practical steps for starting and pitching a venture', 3300.00, 2899.00, 20, 'ent-11.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(283, 16, NULL, NULL, 'Founders at Work', 'Jessica Livingston', '9780000003012', 'Apress', 466, 'English', '1st Edition', 'Firsthand stories from founders of famous startups on their early days.', NULL, 'Learn startup lessons from firsthand founder interviews', 3900.00, 3399.00, 17, 'ent-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(284, 16, NULL, NULL, 'Never Split the Difference', 'Chris Voss', '9780000003013', 'Harper Business', 288, 'English', '1st Edition', 'A former FBI negotiator\'s guide to high-stakes negotiation tactics.', NULL, 'Learn negotiation tactics used in high-stakes situations', 3400.00, 2999.00, 22, 'ent-13.jpg', NULL, 4.8, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(285, 16, NULL, NULL, 'The Millionaire Fastlane', 'MJ DeMarco', '9780000003014', 'Viperion Publishing', 352, 'English', '1st Edition', 'A guide to building wealth quickly through entrepreneurship rather than slow saving.', NULL, 'Learn an entrepreneurial approach to building wealth', 3200.00, 2799.00, 21, 'ent-14.png', NULL, 4.6, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(286, 16, NULL, NULL, 'Anything You Want', 'Derek Sivers', '9780000003015', 'Portfolio', 96, 'English', '1st Edition', 'Short, honest lessons on building a business true to your values.', NULL, 'Learn to build a values-driven, purposeful business', 2500.00, 2199.00, 26, 'ent-15.png', NULL, 4.5, 'No', 'Active', '2026-08-06 07:48:48', 'buisiness'),
(287, 17, NULL, NULL, 'The Intelligent Investor', 'Benjamin Graham', '9780000004001', 'Harper Business', 640, 'English', '1st Edition', 'A classic guide to value investing and long-term financial discipline.', NULL, 'Learn value investing principles for long-term wealth building', 4300.00, 3799.00, 18, 'fin-1.webp', NULL, 4.7, 'Yes', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(288, 17, NULL, NULL, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', '9780000004002', 'Plata Publishing', 336, 'English', '1st Edition', 'A guide to financial literacy and building wealth through assets, not income.', NULL, 'Learn foundational financial literacy and wealth-building mindset', 2900.00, 2499.00, 26, 'fin-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(289, 17, NULL, NULL, 'A Random Walk Down Wall Street', 'Burton G. Malkiel', '9780000004003', 'W. W. Norton & Company', 432, 'English', '1st Edition', 'A comprehensive guide to investment strategy and market theory.', NULL, 'Understand market efficiency and long-term investment strategy', 4000.00, 3499.00, 19, 'fin-3.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(290, 17, NULL, NULL, 'The Psychology of Money', 'Morgan Housel', '9780000004004', 'Harriman House', 256, 'English', '1st Edition', 'Timeless lessons on wealth, greed, and happiness in personal finance.', NULL, 'Understand the behavioral side of financial decision-making', 3100.00, 2699.00, 24, 'fin-4.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(291, 17, NULL, NULL, 'Common Stocks and Uncommon Profits', 'Philip A. Fisher', '9780000004005', 'Wiley', 320, 'English', '1st Edition', 'A classic guide to identifying quality growth stocks for long-term investing.', NULL, 'Learn growth investing principles from a legendary investor', 3800.00, 3299.00, 17, 'fin-5.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(292, 17, NULL, NULL, 'One Up on Wall Street', 'Peter Lynch', '9780000004006', 'Simon & Schuster', 304, 'English', '1st Edition', 'Practical investing wisdom from one of the most successful fund managers.', NULL, 'Learn practical stock-picking strategies for everyday investors', 3300.00, 2899.00, 21, 'fin-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(293, 17, NULL, NULL, 'The Little Book of Common Sense Investing', 'John C. Bogle', '9780000004007', 'Wiley', 288, 'English', '1st Edition', 'A case for low-cost index fund investing for long-term returns.', NULL, 'Understand the benefits of index fund investing', 3000.00, 2599.00, 23, 'fin-7.jpg', NULL, 4.7, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(294, 17, NULL, NULL, 'Security Analysis', 'Benjamin Graham, David Dodd', '9780000004008', 'McGraw-Hill Education', 700, 'English', '1st Edition', 'The foundational text on value investing and fundamental analysis.', NULL, 'Learn rigorous fundamental analysis for securities valuation', 4800.00, 4299.00, 14, 'fin-8.webp', NULL, 4.6, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(295, 17, NULL, NULL, 'Your Money or Your Life', 'Vicki Robin, Joe Dominguez', '9780000004009', 'Penguin Books', 336, 'English', '1st Edition', 'A guide to transforming your relationship with money and achieving financial independence.', NULL, 'Learn to align spending with values and pursue financial independence', 3200.00, 2799.00, 20, 'fin-9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(296, 17, NULL, NULL, 'The Millionaire Next Door', 'Thomas J. Stanley, William D. Danko', '9780000004010', 'Taylor Trade Publishing', 258, 'English', '1st Edition', 'Insights into the habits and traits of America\'s actual wealthy.', NULL, 'Learn the real habits behind sustainable wealth building', 2900.00, 2499.00, 22, 'fin-10.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(297, 17, NULL, NULL, 'I Will Teach You to Be Rich', 'Ramit Sethi', '9780000004011', 'Workman Publishing', 352, 'English', '1st Edition', 'A practical, step-by-step guide to managing money and building wealth.', NULL, 'Learn a practical system for personal finance management', 3100.00, 2699.00, 25, 'fin-11.webp', NULL, 4.6, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(298, 17, NULL, NULL, 'Naked Economics', 'Charles Wheelan', '9780000004012', 'W. W. Norton & Company', 384, 'English', '1st Edition', 'An accessible guide to understanding economics without the jargon.', NULL, 'Understand core economic principles in plain language', 3300.00, 2899.00, 20, 'fin-12.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(299, 17, NULL, NULL, 'The Total Money Makeover', 'Dave Ramsey', '9780000004013', 'Thomas Nelson', 240, 'English', '1st Edition', 'A proven plan for getting out of debt and building financial security.', NULL, 'Learn a step-by-step plan to eliminate debt and build wealth', 2800.00, 2399.00, 24, 'fin-13.jpg', NULL, 4.7, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(300, 17, NULL, NULL, 'Flash Boys', 'Michael Lewis', '9780000004014', 'W. W. Norton & Company', 274, 'English', '1st Edition', 'An investigative look into high-frequency trading and Wall Street.', NULL, 'Understand the impact of high-frequency trading on markets', 3200.00, 2799.00, 19, 'fin-14.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(301, 17, NULL, NULL, 'The Big Short', 'Michael Lewis', '9780000004015', 'W. W. Norton & Company', 264, 'English', '1st Edition', 'The story of the investors who predicted and profited from the 2008 financial crisis.', NULL, 'Understand the causes and dynamics of the 2008 financial crisis', 3300.00, 2899.00, 18, 'fin-15.webp', NULL, 4.7, 'No', 'Active', '2026-08-06 08:21:52', 'buisiness'),
(302, 18, NULL, NULL, 'Financial Statements', 'Thomas R. Ittelson', '9780000005001', 'Career Press', 256, 'English', '1st Edition', 'A clear, visual guide to understanding and analyzing financial statements.', NULL, 'Learn to read and interpret financial statements', 3100.00, 2699.00, 22, 'acc-1.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(303, 18, NULL, NULL, 'Accounting Made Simple', 'Mike Piper', '9780000005002', 'Simple Subjects', 100, 'English', '1st Edition', 'A concise introduction to core accounting principles and concepts.', NULL, 'Understand basic accounting principles quickly', 2400.00, 1999.00, 28, 'acc-2.jpg', NULL, 4.4, 'Yes', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(304, 18, NULL, NULL, 'The Interpretation of Financial Statements', 'Benjamin Graham, Spencer B. Meredith', '9780000005003', 'Harper Business', 144, 'English', '1st Edition', 'A classic guide to analyzing balance sheets and income statements.', NULL, 'Learn to interpret financial statements like an investor', 2800.00, 2399.00, 20, 'acc-3.webp', NULL, 4.5, 'Yes', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(305, 18, NULL, NULL, 'Financial Intelligence', 'Karen Berman, Joe Knight', '9780000005004', 'Harvard Business Review Press', 304, 'English', '1st Edition', 'A practical guide to understanding financial numbers for non-financial managers.', NULL, 'Learn to interpret financial data for better business decisions', 3600.00, 3199.00, 19, 'acc-4.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(306, 18, NULL, NULL, 'Principles of Accounting', 'Belverd E. Needles, Marian Powers', '9780000005005', 'Cengage Learning', 1104, 'English', '1st Edition', 'A comprehensive textbook covering foundational accounting principles.', NULL, 'Learn core financial and managerial accounting principles', 5200.00, 4599.00, 12, 'acc-5.jpg', NULL, 4.3, 'Yes', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(307, 18, NULL, NULL, 'How to Read a Financial Report', 'John A. Tracy, Tage C. Tracy', '9780000005006', 'Wiley', 256, 'English', '1st Edition', 'A guide to understanding what financial reports reveal about a business.', NULL, 'Learn to extract meaningful insights from financial reports', 3300.00, 2899.00, 21, 'acc-6.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(308, 18, NULL, NULL, 'Accounting for Non-Accountants', 'Wayne Label', '9780000005007', 'Sourcebooks', 256, 'English', '1st Edition', 'An accessible introduction to accounting for those without a finance background.', NULL, 'Understand core accounting concepts without prior training', 3000.00, 2599.00, 23, 'acc-7.png', NULL, 4.4, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(309, 18, NULL, NULL, 'Warren Buffett Accounting Book', 'Stig Brodersen, Preston Pysh', '9780000005008', 'Pylon Publishing', 144, 'English', '1st Edition', 'A practical guide to reading financial statements the way Warren Buffett does.', NULL, 'Learn to analyze financial statements from an investor\'s lens', 2700.00, 2299.00, 24, 'acc-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(310, 18, NULL, NULL, 'The Tax and Legal Playbook', 'Mark J. Kohler', '9780000005009', 'Entrepreneur Press', 320, 'English', '1st Edition', 'A practical guide to tax strategy and legal considerations for business owners.', NULL, 'Learn tax-saving strategies for small business owners', 3400.00, 2999.00, 19, 'acc-9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(311, 18, NULL, NULL, 'J.K. Lasser\'s Your Income Tax', 'J.K. Lasser Institute', '9780000005010', 'Wiley', 832, 'English', '1st Edition', 'An annually updated guide to preparing and understanding personal income taxes.', NULL, 'Learn how to accurately prepare personal income tax returns', 3900.00, 3399.00, 16, 'acc-10.jpg', NULL, 4.4, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(312, 18, NULL, NULL, 'Bookkeeping for Dummies', 'Lita Epstein', '9780000005011', 'For Dummies', 384, 'English', '1st Edition', 'A beginner-friendly introduction to bookkeeping fundamentals.', NULL, 'Learn essential bookkeeping practices for small businesses', 2900.00, 2499.00, 25, 'acc-11.jpg', NULL, 4.4, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(313, 18, NULL, NULL, 'Cost Accounting', 'Charles T. Horngren, Srikant M. Datar', '9780000005012', 'Pearson', 896, 'English', '1st Edition', 'A comprehensive textbook on cost accounting theory and managerial applications.', NULL, 'Understand cost accounting for managerial decision-making', 5000.00, 4499.00, 13, 'acc-12.jpg', NULL, 4.3, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(314, 18, NULL, NULL, 'Auditing and Assurance Services', 'Alvin A. Arens, Randal J. Elder', '9780000005013', 'Pearson', 832, 'English', '1st Edition', 'A comprehensive textbook covering auditing principles and assurance services.', NULL, 'Learn auditing standards and assurance service practices', 4800.00, 4299.00, 14, 'acc-13.jpg', NULL, 4.3, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(315, 18, NULL, NULL, 'The Basics of Public Budgeting and Financial Management', 'Charles E. Menifield', '9780000005014', 'University Press of America', 250, 'English', '1st Edition', 'An introduction to budgeting and financial management in the public sector.', NULL, 'Understand public sector budgeting and financial management', 3300.00, 2899.00, 18, 'acc-14.jpg', NULL, 4.3, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(316, 18, NULL, NULL, 'Financial Shenanigans', 'Howard Schilit, Jeremy Perler', '9780000005015', 'McGraw-Hill Education', 416, 'English', '1st Edition', 'A guide to detecting accounting tricks and financial statement fraud.', NULL, 'Learn to identify accounting fraud and financial manipulation', 3900.00, 3399.00, 17, 'acc-15.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 12:25:32', 'buisiness'),
(317, 19, NULL, NULL, 'Atomic Habits', 'James Clear', '9780000006001', 'Avery', 320, 'English', '1st Edition', 'A practical guide to building good habits and breaking bad ones through small changes.', NULL, 'Learn to build lasting habits using proven behavioral strategies', 3200.00, 2799.00, 25, 'prod-1.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(318, 19, NULL, NULL, 'Getting Things Done', 'David Allen', '9780000006002', 'Penguin Books', 352, 'English', '1st Edition', 'A comprehensive system for organizing tasks and achieving stress-free productivity.', NULL, 'Learn the GTD system for managing tasks and priorities', 3300.00, 2899.00, 22, 'prod-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 17:26:09', 'personal-growth');
INSERT INTO `books` (`id`, `category_id`, `author_id`, `publisher_id`, `title`, `author`, `isbn`, `publisher`, `pages`, `language`, `edition`, `description`, `about_book`, `what_you_learn`, `price`, `sale_price`, `stock`, `image`, `pdf_file`, `rating`, `featured`, `status`, `created_at`, `image_folder`) VALUES
(319, 19, NULL, NULL, 'Deep Work', 'Cal Newport', '9780000006003', 'Grand Central Publishing', 304, 'English', '1st Edition', 'A guide to cultivating focused, distraction-free work in a noisy world.', NULL, 'Learn to build deep focus and eliminate distractions', 3100.00, 2699.00, 23, 'prod-3.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(320, 19, NULL, NULL, 'Essentialism', 'Greg McKeown', '9780000006004', 'Currency', 272, 'English', '1st Edition', 'A guide to disciplined pursuit of less, but better.', NULL, 'Learn to prioritize what truly matters and eliminate the rest', 3000.00, 2599.00, 24, 'prod-4.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(321, 19, NULL, NULL, 'The Power of Habit', 'Charles Duhigg', '9780000006005', 'Random House', 371, 'English', '1st Edition', 'An exploration of the science behind habit formation and change.', NULL, 'Understand the psychology and science of habit formation', 3200.00, 2799.00, 21, 'prod-5.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(322, 19, NULL, NULL, 'Eat That Frog!', 'Brian Tracy', '9780000006006', 'Berrett-Koehler Publishers', 144, 'English', '1st Edition', 'A guide to overcoming procrastination by tackling the hardest tasks first.', NULL, 'Learn practical techniques to beat procrastination', 2600.00, 2199.00, 26, 'prod-6.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(323, 19, NULL, NULL, 'Indistractable', 'Nir Eyal', '9780000006007', 'BenBella Books', 304, 'English', '1st Edition', 'A guide to controlling attention and living free from distraction.', NULL, 'Learn strategies to control focus and avoid distraction', 3100.00, 2699.00, 20, 'prod-7.webp', NULL, 4.5, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(324, 19, NULL, NULL, 'The One Thing', 'Gary Keller, Jay Papasan', '9780000006008', 'Bard Press', 240, 'English', '1st Edition', 'A guide to focusing on the single most important task for extraordinary results.', NULL, 'Learn to identify and focus on high-impact priorities', 2900.00, 2499.00, 24, 'prod-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(325, 19, NULL, NULL, 'Make Time', 'Jake Knapp, John Zeratsky', '9780000006009', 'Currency', 278, 'English', '1st Edition', 'A practical guide to designing your day around what matters most.', NULL, 'Learn daily tactics to make time for meaningful work', 3000.00, 2599.00, 22, 'prod-9.webp', NULL, 4.5, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(326, 19, NULL, NULL, 'The 4-Hour Workweek', 'Timothy Ferriss', '9780000006010', 'Crown Publishing', 416, 'English', '1st Edition', 'A guide to escaping the 9-5 grind through lifestyle design and outsourcing.', NULL, 'Learn lifestyle design principles for work and freedom', 3300.00, 2899.00, 20, 'prod-10.jpg', NULL, 4.4, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(327, 19, NULL, NULL, 'Digital Minimalism', 'Cal Newport', '9780000006011', 'Portfolio', 304, 'English', '1st Edition', 'A philosophy for intentional technology use in a distracted world.', NULL, 'Learn to build a healthier relationship with technology', 3100.00, 2699.00, 21, 'prod-11.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(328, 19, NULL, NULL, 'Smarter Faster Better', 'Charles Duhigg', '9780000006012', 'Random House', 400, 'English', '1st Edition', 'An exploration of the science of productivity and how to apply it.', NULL, 'Understand the principles behind true productivity', 3200.00, 2799.00, 19, 'prod-12.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(329, 19, NULL, NULL, '168 Hours', 'Laura Vanderkam', '9780000006013', 'Portfolio', 272, 'English', '1st Edition', 'A guide to finding more time for what matters in your week.', NULL, 'Learn to audit and reclaim time in your weekly schedule', 2800.00, 2399.00, 23, 'prod-13.jpg', NULL, 4.4, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(330, 19, NULL, NULL, 'How to Win Friends and Influence People', 'Dale Carnegie', '9780000006014', 'Simon & Schuster', 291, 'English', '1st Edition', 'A timeless guide to building relationships and influencing others positively.', NULL, 'Learn foundational principles for building strong relationships', 3000.00, 2599.00, 27, 'prod-14.png', NULL, 4.7, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(331, 19, NULL, NULL, 'So Good They Can\'t Ignore You', 'Cal Newport', '9780000006015', 'Business Plus', 304, 'English', '1st Edition', 'A guide to building career capital through skill mastery rather than passion alone.', NULL, 'Learn a skills-based approach to building a fulfilling career', 3100.00, 2699.00, 20, 'prod-15.png', NULL, 4.5, 'No', 'Active', '2026-08-06 17:26:09', 'personal-growth'),
(332, 20, NULL, NULL, 'How to Win Friends and Influence People', 'Dale Carnegie', '9780000007001', 'Simon & Schuster', 291, 'English', '1st Edition', 'A timeless guide to building relationships and influencing others positively.', NULL, 'Learn foundational principles for building strong relationships', 3000.00, 2599.00, 25, 'commu-1.png', NULL, 4.7, 'Yes', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(333, 20, NULL, NULL, 'Crucial Conversations', 'Kerry Patterson, Joseph Grenny, Ron McMillan, Al Switzler', '9780000007002', 'McGraw-Hill Education', 240, 'English', '1st Edition', 'A guide to navigating high-stakes conversations with confidence and skill.', NULL, 'Learn to handle high-stakes conversations effectively', 3300.00, 2899.00, 22, 'commu-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(334, 20, NULL, NULL, 'Nonviolent Communication', 'Marshall B. Rosenberg', '9780000007003', 'PuddleDancer Press', 264, 'English', '1st Edition', 'A framework for compassionate communication that resolves conflict peacefully.', NULL, 'Learn empathetic, conflict-resolving communication techniques', 3100.00, 2699.00, 23, 'commu-3.jpeg', NULL, 4.7, 'Yes', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(335, 20, NULL, NULL, 'Talk Like TED', 'Carmine Gallo', '9780000007004', 'St. Martin\'s Press', 304, 'English', '1st Edition', 'Lessons on public speaking drawn from the world\'s most-watched TED talks.', NULL, 'Learn public speaking techniques from top TED speakers', 3000.00, 2599.00, 21, 'commu-4.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(336, 20, NULL, NULL, 'Difficult Conversations', 'Douglas Stone, Bruce Patton, Sheila Heen', '9780000007005', 'Penguin Books', 352, 'English', '1st Edition', 'A guide to navigating and having conversations that matter most.', NULL, 'Learn to approach and manage difficult conversations well', 3200.00, 2799.00, 20, 'commu-5.webp', NULL, 4.6, 'Yes', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(337, 20, NULL, NULL, 'The Art of Communicating', 'Thich Nhat Hanh', '9780000007006', 'HarperOne', 160, 'English', '1st Edition', 'Mindful principles for communicating with clarity and compassion.', NULL, 'Learn mindful communication practices for daily life', 2600.00, 2199.00, 24, 'commu-6.png', NULL, 4.6, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(338, 20, NULL, NULL, 'Made to Stick', 'Chip Heath, Dan Heath', '9780000007007', 'Random House', 291, 'English', '1st Edition', 'An exploration of why some ideas thrive and others fail to stick.', NULL, 'Learn to craft memorable, impactful messages and ideas', 3100.00, 2699.00, 22, 'commu-7.webp', NULL, 4.6, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(339, 20, NULL, NULL, 'Influence: The Psychology of Persuasion', 'Robert B. Cialdini', '9780000007008', 'Harper Business', 320, 'English', '1st Edition', 'A classic guide to the psychological principles behind persuasion.', NULL, 'Understand the core principles of ethical persuasion', 3400.00, 2999.00, 21, 'commu-8.jpg', NULL, 4.7, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(340, 20, NULL, NULL, 'Just Listen', 'Mark Goulston', '9780000007009', 'AMACOM', 272, 'English', '1st Edition', 'A guide to breaking through communication barriers with anyone.', NULL, 'Learn techniques to get through to resistant or difficult people', 3000.00, 2599.00, 20, 'commu-9.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(341, 20, NULL, NULL, 'Never Split the Difference', 'Chris Voss', '9780000007010', 'Harper Business', 288, 'English', '1st Edition', 'A former FBI negotiator\'s guide to high-stakes negotiation tactics.', NULL, 'Learn negotiation tactics used in high-stakes situations', 3400.00, 2999.00, 22, 'commu-10.png', NULL, 4.8, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(342, 20, NULL, NULL, 'The Charisma Myth', 'Olivia Fox Cabane', '9780000007011', 'Portfolio', 288, 'English', '1st Edition', 'A guide to developing charisma as a learnable, practical skill.', NULL, 'Learn techniques to build presence and charisma', 3200.00, 2799.00, 19, 'commu-11.png', NULL, 4.5, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(343, 20, NULL, NULL, 'Words That Work', 'Frank Luntz', '9780000007012', 'Hyperion', 368, 'English', '1st Edition', 'An exploration of how word choice shapes perception and persuasion.', NULL, 'Learn how language choice influences perception and outcomes', 3300.00, 2899.00, 18, 'commu-12.png', NULL, 4.4, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(344, 20, NULL, NULL, 'How to Talk to Anyone', 'Leil Lowndes', '9780000007013', 'McGraw-Hill Education', 384, 'English', '1st Edition', '92 practical techniques for building rapport and confident conversation.', NULL, 'Learn practical techniques for confident, engaging conversation', 3100.00, 2699.00, 23, 'commu-13.jpg', NULL, 4.5, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(345, 20, NULL, NULL, 'Verbal Judo', 'George J. Thompson, Jerry B. Jenkins', '9780000007014', 'William Morrow Paperbacks', 272, 'English', '1st Edition', 'A guide to using words strategically to defuse conflict and gain cooperation.', NULL, 'Learn verbal tactics to de-escalate conflict and build cooperation', 3000.00, 2599.00, 21, 'commu-14.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(346, 20, NULL, NULL, 'Radical Candor', 'Kim Scott', '9780000007015', 'St. Martin\'s Press', 272, 'English', '1st Edition', 'A guide to leading with a balance of direct challenge and genuine care.', NULL, 'Learn to give honest feedback while building trust as a leader', 3200.00, 2799.00, 20, 'commu-15.jpg', NULL, 4.6, 'No', 'Active', '2026-08-06 18:00:00', 'personal-growth'),
(363, 21, NULL, NULL, 'TED Talks: The Official TED Guide to Public Speaking', 'Chris Anderson', '9780000008001', 'Mariner Books', 288, 'English', '1st Edition', 'Insider insights on crafting and delivering powerful talks from the head of TED.', NULL, 'Learn to craft and deliver compelling talks like top TED speakers', 3400.00, 2999.00, 22, 'pbs-1.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(364, 21, NULL, NULL, 'Confessions of a Public Speaker', 'Scott Berkun', '9780000008002', 'O\'Reilly Media', 224, 'English', '1st Edition', 'Candid, humorous lessons from a professional speaker\'s real experiences.', NULL, 'Learn practical public speaking lessons from real-world mistakes', 3000.00, 2599.00, 21, 'pbs-2.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(365, 21, NULL, NULL, 'The Art of Public Speaking', 'Dale Carnegie', '9780000008003', 'Independently Published', 256, 'English', '1st Edition', 'A foundational guide to developing confidence and skill in public speaking.', NULL, 'Learn classic principles for confident public speaking', 2800.00, 2399.00, 25, 'pbs-3.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(366, 21, NULL, NULL, 'Speak Like Churchill, Stand Like Lincoln', 'James C. Humes', '9780000008004', 'Three Rivers Press', 224, 'English', '1st Edition', 'Timeless lessons on persuasive speech drawn from history\'s great orators.', NULL, 'Learn persuasive speaking techniques from historical leaders', 3100.00, 2699.00, 20, 'pbs-4.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(367, 21, NULL, NULL, 'Steal the Show', 'Michael Port', '9780000008005', 'Mariner Books', 304, 'English', '1st Edition', 'A guide to performing with confidence in any high-stakes speaking situation.', NULL, 'Learn performance techniques for confident public speaking', 3200.00, 2799.00, 19, 'pbs-5.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(368, 21, NULL, NULL, 'Presentation Zen', 'Garr Reynolds', '9780000008006', 'New Riders', 240, 'English', '1st Edition', 'A guide to simple, effective presentation design and delivery.', NULL, 'Learn to design and deliver clear, engaging presentations', 3300.00, 2899.00, 20, 'pbs-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(369, 21, NULL, NULL, 'Resonate', 'Nancy Duarte', '9780000008007', 'Wiley', 240, 'English', '1st Edition', 'A guide to crafting presentations that connect and move audiences to action.', NULL, 'Learn to build presentations that resonate and inspire action', 3400.00, 2999.00, 18, 'pbs-7.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(370, 21, NULL, NULL, 'The Quick and Easy Way to Effective Speaking', 'Dale Carnegie', '9780000008008', 'Gallery Books', 240, 'English', '1st Edition', 'A practical guide to building confidence and skill in everyday speaking.', NULL, 'Learn practical techniques for effective everyday speaking', 2900.00, 2499.00, 24, 'pbs-8.jpg', NULL, 4.5, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(371, 21, NULL, NULL, 'How to Deliver a TED Talk', 'Jeremey Donovan', '9780000008009', 'McGraw-Hill Education', 240, 'English', '1st Edition', 'A step-by-step guide to crafting and delivering a TED-style talk.', NULL, 'Learn a structured approach to delivering TED-style talks', 3100.00, 2699.00, 20, 'pbs-9.jpg', NULL, 4.4, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(372, 21, NULL, NULL, 'Slide:ology', 'Nancy Duarte', '9780000008010', 'O\'Reilly Media', 280, 'English', '1st Edition', 'A guide to the art and science of creating great presentation visuals.', NULL, 'Learn to design visually compelling presentation slides', 3500.00, 3099.00, 17, 'pbs-10.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(373, 21, NULL, NULL, 'The Exceptional Presenter', 'Timothy J. Koegel', '9780000008011', 'Prentice Hall Press', 240, 'English', '1st Edition', 'A practical guide to elevating presentation and communication skills.', NULL, 'Learn techniques to present with clarity and impact', 3200.00, 2799.00, 19, 'pbs-11.jpg', NULL, 4.4, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(374, 21, NULL, NULL, 'Fearless Speaking', 'Gary Genard', '9780000008012', 'Rowman & Littlefield', 280, 'English', '1st Edition', 'A guide to overcoming fear and speaking with confidence and power.', NULL, 'Learn to manage speaking anxiety and build confidence', 3100.00, 2699.00, 20, 'pbs-12.jpg', NULL, 4.5, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(375, 21, NULL, NULL, 'The Naked Presenter', 'Garr Reynolds', '9780000008013', 'New Riders', 192, 'English', '1st Edition', 'A guide to presenting with authenticity, stripped of unnecessary complexity.', NULL, 'Learn to present authentically without over-relying on slides', 2900.00, 2499.00, 22, 'pbs-13.jpg', NULL, 4.5, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(376, 21, NULL, NULL, 'Talk Like TED', 'Carmine Gallo', '9780000008014', 'St. Martin\'s Press', 304, 'English', '1st Edition', 'Lessons on public speaking drawn from the world\'s most-watched TED talks.', NULL, 'Learn public speaking techniques from top TED speakers', 3000.00, 2599.00, 21, 'pbs-14.jpg', NULL, 4.5, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(377, 21, NULL, NULL, 'Speaking as a Leader', 'Judith Humphrey', '9780000008015', 'Wiley', 240, 'English', '1st Edition', 'A guide to using everyday speaking opportunities to demonstrate leadership.', NULL, 'Learn to communicate with leadership presence in any setting', 3300.00, 2899.00, 18, 'pbs-15.jpg', NULL, 4.4, 'No', 'Active', '2026-08-07 11:44:58', 'personal-growth'),
(407, 22, NULL, NULL, 'Thinking, Fast and Slow', 'Daniel Kahneman', '9780000009001', 'Farrar, Straus and Giroux', 499, 'English', '1st Edition', 'An exploration of the two systems that drive the way we think and make decisions.', NULL, 'Understand cognitive biases and dual-process thinking', 4000.00, 3499.00, 20, 'pub-1.webp', NULL, 4.7, 'Yes', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(408, 22, NULL, NULL, 'Man\'s Search for Meaning', 'Viktor E. Frankl', '9780000009002', 'Beacon Press', 165, 'English', '1st Edition', 'A profound account of finding meaning through suffering, from a Holocaust survivor.', NULL, 'Learn to find purpose and meaning through adversity', 2600.00, 2199.00, 26, 'pub-2.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(409, 22, NULL, NULL, 'The Body Keeps the Score', 'Bessel van der Kolk', '9780000009003', 'Penguin Books', 464, 'English', '1st Edition', 'An exploration of how trauma affects the body and mind, and paths to healing.', NULL, 'Understand the impact of trauma on the mind and body', 3600.00, 3199.00, 19, 'pub-3.jpg', NULL, 4.8, 'Yes', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(410, 22, NULL, NULL, 'Predictably Irrational', 'Dan Ariely', '9780000009004', 'Harper Perennial', 384, 'English', '1st Edition', 'An exploration of the hidden forces that shape our seemingly irrational decisions.', NULL, 'Understand the psychology behind irrational decision-making', 3100.00, 2699.00, 21, 'pub-4.jpg', NULL, 4.5, 'Yes', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(411, 22, NULL, NULL, 'The Power of Now', 'Eckhart Tolle', '9780000009005', 'New World Library', 236, 'English', '1st Edition', 'A guide to achieving spiritual enlightenment through present-moment awareness.', NULL, 'Learn to cultivate presence and reduce mental suffering', 2900.00, 2499.00, 23, 'pub-5.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(412, 22, NULL, NULL, 'Emotional Intelligence', 'Daniel Goleman', '9780000009006', 'Bantam Books', 384, 'English', '1st Edition', 'An exploration of why emotional intelligence matters more than IQ for success.', NULL, 'Understand and develop emotional intelligence skills', 3300.00, 2899.00, 20, 'pub-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(413, 22, NULL, NULL, 'Quiet: The Power of Introverts', 'Susan Cain', '9780000009007', 'Crown Publishing', 352, 'English', '1st Edition', 'An exploration of introversion\'s strengths in an extrovert-favoring world.', NULL, 'Understand the strengths and needs of introverted personalities', 3200.00, 2799.00, 21, 'pub-7.jpg', NULL, 4.7, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(414, 22, NULL, NULL, 'Mindset: The New Psychology of Success', 'Carol S. Dweck', '9780000009008', 'Ballantine Books', 320, 'English', '1st Edition', 'An exploration of how fixed and growth mindsets shape success and learning.', NULL, 'Learn to develop a growth mindset for lasting success', 3000.00, 2599.00, 24, 'pub-8.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(415, 22, NULL, NULL, 'The Righteous Mind', 'Jonathan Haidt', '9780000009009', 'Vintage', 528, 'English', '1st Edition', 'An exploration of the moral foundations that divide and unite people.', NULL, 'Understand the psychological roots of moral and political views', 3800.00, 3299.00, 17, 'pub-9.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(416, 22, NULL, NULL, 'Blink', 'Malcolm Gladwell', '9780000009010', 'Back Bay Books', 320, 'English', '1st Edition', 'An exploration of the power and pitfalls of rapid, intuitive decision-making.', NULL, 'Understand the psychology behind snap judgments and intuition', 3000.00, 2599.00, 22, 'pub-10.jpg', NULL, 4.5, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(417, 22, NULL, NULL, 'Flow: The Psychology of Optimal Experience', 'Mihaly Csikszentmihalyi', '9780000009011', 'Harper Perennial', 336, 'English', '1st Edition', 'An exploration of the mental state of full engagement and enjoyment.', NULL, 'Learn to cultivate flow states for deeper engagement', 3300.00, 2899.00, 18, 'pub-11.jpg', NULL, 4.6, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(418, 22, NULL, NULL, 'The Untethered Soul', 'Michael A. Singer', '9780000009012', 'New Harbinger Publications', 210, 'English', '1st Edition', 'A guide to freeing yourself from limiting thoughts and emotions.', NULL, 'Learn practices for inner freedom and self-awareness', 2800.00, 2399.00, 23, 'pub-12.jpg', NULL, 4.7, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(419, 22, NULL, NULL, 'Games People Play', 'Eric Berne', '9780000009013', 'Ballantine Books', 216, 'English', '1st Edition', 'A classic exploration of the hidden patterns behind human interactions.', NULL, 'Understand recurring psychological patterns in relationships', 2900.00, 2499.00, 20, 'pub-13.jpg', NULL, 4.4, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(420, 22, NULL, NULL, 'The Social Animal', 'Elliot Aronson', '9780000009014', 'Worth Publishers', 480, 'English', '1st Edition', 'A comprehensive introduction to the field of social psychology.', NULL, 'Understand core principles of social psychology', 3900.00, 3399.00, 15, 'pub-14.jpg', NULL, 4.4, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(421, 22, NULL, NULL, 'Influence: The Psychology of Persuasion', 'Robert B. Cialdini', '9780000009015', 'Harper Business', 320, 'English', '1st Edition', 'A classic guide to the psychological principles behind persuasion.', NULL, 'Understand the core principles of ethical persuasion', 3400.00, 2999.00, 19, 'pub-15.jpg', NULL, 4.7, 'No', 'Active', '2026-08-07 12:31:54', 'personal-growth'),
(422, 23, NULL, NULL, 'You Are a Badass', 'Jen Sincero', '9780000100001', 'Running Press', 256, 'English', '1st Edition', 'A humorous, practical guide to overcoming self-doubt and creating the life you want.', NULL, 'Learn to break through self-doubt and build genuine confidence', 2900.00, 2499.00, 25, 'sd-1.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(423, 23, NULL, NULL, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', '9780000100002', 'Harper', 224, 'English', '1st Edition', 'A counterintuitive approach to living a good life by focusing on what truly matters.', NULL, 'Learn to prioritize values over chasing constant positivity', 3000.00, 2599.00, 26, 'sd-2.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(424, 23, NULL, NULL, 'Awaken the Giant Within', 'Tony Robbins', '9780000100003', 'Free Press', 544, 'English', '1st Edition', 'A guide to taking control of your mental, emotional, and financial destiny.', NULL, 'Learn strategies to reshape habits, beliefs, and life direction', 3600.00, 3199.00, 18, 'sd-3.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(425, 23, NULL, NULL, 'The Four Agreements', 'Don Miguel Ruiz', '9780000100004', 'Amber-Allen Publishing', 160, 'English', '1st Edition', 'A practical guide to personal freedom based on ancient Toltec wisdom.', NULL, 'Learn four principles for personal freedom and inner peace', 2600.00, 2199.00, 27, 'sd-4.jpg', NULL, 4.7, 'Yes', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(426, 23, NULL, NULL, 'The Compound Effect', 'Darren Hardy', '9780000100005', 'Vanguard Press', 208, 'English', '1st Edition', 'A guide to achieving massive success through small, consistent daily actions.', NULL, 'Learn how small consistent actions compound into major results', 2800.00, 2399.00, 24, 'sd-5.jpg', NULL, 4.6, 'Yes', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(427, 23, NULL, NULL, 'Grit', 'Angela Duckworth', '9780000100006', 'Scribner', 352, 'English', '1st Edition', 'An exploration of passion and perseverance as the true keys to success.', NULL, 'Understand how grit drives long-term achievement', 3300.00, 2899.00, 20, 'sd-6.jpg', NULL, 4.6, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(428, 23, NULL, NULL, 'The Gifts of Imperfection', 'Brene Brown', '9780000100007', 'Hazelden Publishing', 176, 'English', '1st Edition', 'A guide to embracing imperfection and living wholeheartedly.', NULL, 'Learn to cultivate self-acceptance and authentic living', 2700.00, 2299.00, 23, 'sd-7.png', NULL, 4.7, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(429, 23, NULL, NULL, 'Daring Greatly', 'Brene Brown', '9780000100008', 'Avery', 320, 'English', '1st Edition', 'An exploration of how vulnerability fuels courage and connection.', NULL, 'Learn to embrace vulnerability as a source of strength', 3200.00, 2799.00, 19, 'sd-8.jpg', NULL, 4.7, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(430, 23, NULL, NULL, 'Can\'t Hurt Me', 'David Goggins', '9780000100009', 'Lioncrest Publishing', 364, 'English', '1st Edition', 'A memoir on mastering the mind and overcoming extreme adversity.', NULL, 'Learn mental toughness strategies to push past self-imposed limits', 3400.00, 2999.00, 21, 'sd-9.jpg', NULL, 4.8, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(431, 23, NULL, NULL, 'The Miracle Morning', 'Hal Elrod', '9780000100010', 'Hal Elrod International', 228, 'English', '1st Edition', 'A guide to transforming your life through a dedicated morning routine.', NULL, 'Learn a structured morning routine for personal growth', 2800.00, 2399.00, 24, 'sd-10.jpg', NULL, 4.6, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(432, 23, NULL, NULL, 'Think and Grow Rich', 'Napoleon Hill', '9780000100011', 'TarcherPerigee', 320, 'English', '1st Edition', 'A classic guide to the mindset and principles behind achieving success.', NULL, 'Learn timeless principles for cultivating a success mindset', 2900.00, 2499.00, 25, 'sd-11.webp', NULL, 4.6, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(433, 23, NULL, NULL, 'The Alchemist', 'Paulo Coelho', '9780000100012', 'HarperOne', 208, 'English', '1st Edition', 'A fable about following your dreams and listening to your heart.', NULL, 'Learn timeless life lessons through allegorical storytelling', 2600.00, 2199.00, 28, 'sd-12.jpg', NULL, 4.7, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(434, 23, NULL, NULL, 'Big Magic', 'Elizabeth Gilbert', '9780000100013', 'Riverhead Books', 288, 'English', '1st Edition', 'A guide to living a creative life free from fear.', NULL, 'Learn to embrace creativity and overcome creative fear', 3000.00, 2599.00, 20, 'sd-13.jpg', NULL, 4.5, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(435, 23, NULL, NULL, 'The 7 Habits of Highly Effective People', 'Stephen R. Covey', '9780000100014', 'Free Press', 381, 'English', '1st Edition', 'A principle-centered approach to personal and professional effectiveness.', NULL, 'Learn habits that build lasting personal and professional effectiveness', 3300.00, 2899.00, 19, 'sd-14.jpg', NULL, 4.7, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth'),
(436, 23, NULL, NULL, 'Mindset: The New Psychology of Success', 'Carol S. Dweck', '9780000100015', 'Ballantine Books', 320, 'English', '1st Edition', 'An exploration of how fixed and growth mindsets shape success and learning.', NULL, 'Learn to develop a growth mindset for lasting success', 3000.00, 2599.00, 22, 'sd-15.jpg', NULL, 4.6, 'No', 'Active', '2026-08-08 03:28:44', 'personal-growth');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `category_name`, `slug`, `description`, `icon`, `banner_image`, `status`, `created_at`) VALUES
(1, 'Programming', 'programming', 'Master Programming with books on PHP, JavaScript, Python, Java, C++, C#, Data Structures and Algorithms.', 'programming.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(2, 'Web Development', 'web-development', 'Learn HTML, CSS, JavaScript, Bootstrap, React, Laravel, Node.js and modern web development.', 'web-development.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(3, 'Mobile App Development', 'mobile-development', 'Build Android and iOS apps using Flutter, Kotlin, Swift and React Native.', 'mobile-development.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(4, 'Artificial Intelligence', 'artificial-intelligence', 'Explore Artificial Intelligence, Machine Learning, Deep Learning and Neural Networks.', 'ai.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(5, 'Data Science', 'data-science', 'Learn Data Science, Python, Pandas, NumPy, Visualization and Big Data.', 'data-science.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(6, 'Cyber Security', 'cyber-security', 'Protect systems using Ethical Hacking, Networking, Digital Forensics and Security.', 'cyber-security.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(7, 'Cloud Computing', 'cloud-computing', 'Master AWS, Azure, Google Cloud, Docker and Kubernetes.', 'cloud.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(8, 'DevOps', 'devops', 'Continuous Integration, Docker, Jenkins, GitHub Actions and Kubernetes.', 'devops.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(9, 'Graphic Design', 'graphic-design', 'Adobe Photoshop, Illustrator, Branding, Logo Design and Visual Communication.', 'graphic-design.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(10, 'UI / UX Design', 'ui-ux-design', 'UI Design, UX Research, Wireframing, Figma and Design Systems.', 'uiux.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(11, 'Motion Graphics', 'motion-graphics', 'Motion Graphics, Adobe After Effects and Animation.', 'motion.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(12, 'Video Editing', 'video-editing', 'Video Editing with Premiere Pro, DaVinci Resolve and Final Cut.', 'video.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(13, '3D Modeling', '3d-modeling', 'Learn Blender, Maya, Cinema4D and 3D Visualization.', '3d.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(14, 'Digital Marketing', 'digital-marketing', 'SEO, Facebook Ads, Google Ads, Content Marketing and Social Media.', 'marketing.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(15, 'Business', 'business', 'Business Strategy, Leadership, Negotiation and Management.', 'business.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(16, 'Entrepreneurship', 'entrepreneurship', 'Startups, Business Growth and Entrepreneurship.', 'entrepreneurship.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(17, 'Finance', 'finance', 'Investing, Stock Market, Personal Finance and Wealth.', 'finance.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(18, 'Accounting', 'accounting', 'Financial Accounting, Auditing and Taxation.', 'accounting.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(19, 'Productivity', 'productivity', 'Time Management, Habits and Productivity.', 'productivity.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(20, 'Communication Skills', 'communication-skills', 'Improve Communication, Negotiation and Leadership.', 'communication.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(21, 'Public Speaking', 'public-speaking', 'Presentation Skills and Public Speaking.', 'public-speaking.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(22, 'Psychology', 'psychology', 'Human Behaviour, Mindset and Psychology.', 'psychology.jpg', NULL, 'Active', '2026-07-29 05:31:48'),
(23, 'Self Development', 'self-development', 'Personal Growth, Confidence and Self Improvement.', 'self-development.jpg', NULL, 'Active', '2026-07-29 05:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `book_publishers`
--

CREATE TABLE `book_publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_wishlist`
--

CREATE TABLE `book_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_book` (`title`,`author`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `book_publishers`
--
ALTER TABLE `book_publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_wishlist`
--
ALTER TABLE `book_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `book_publishers`
--
ALTER TABLE `book_publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_wishlist`
--
ALTER TABLE `book_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `book_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
-- (added for the footer newsletter signup form)
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
-- (added for the Contact Us page form)
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
