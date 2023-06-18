You just need to create a db and than create table using below queries and change the db name and other variables in connect.php in root.

CREATE TABLE `ramo_users` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(15) NOT NULL DEFAULT '',
  `isd` varchar(15) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `fax` varchar(20) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT ''
)

CREATE TABLE `reported_incidence` (
  `id` bigint(20) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `incidentid` varchar(20) NOT NULL DEFAULT '',
  `userid` bigint(20) NOT NULL,
  `details` longtext NOT NULL,
  `priority` varchar(20) NOT NULL DEFAULT '',
  `status` varchar(20) NOT NULL DEFAULT '',
  `timecreated` bigint(20) NOT NULL
)  