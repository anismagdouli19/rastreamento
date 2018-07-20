-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Mar-2018 às 19:07
-- Versão do servidor: 5.5.59-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `fatura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `app_notes`
--

CREATE TABLE IF NOT EXISTS `app_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `contents` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crm_accounts`
--

CREATE TABLE IF NOT EXISTS `crm_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `o` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `balance` decimal(16,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `notes` text NOT NULL,
  `tags` text NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `ts` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `web` varchar(200) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `tax_number` varchar(100) DEFAULT NULL,
  `entity_number` varchar(100) DEFAULT NULL,
  `currency` int(11) DEFAULT '0',
  `pmethod` varchar(100) DEFAULT NULL,
  `autologin` varchar(100) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `lastloginip` varchar(100) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `isp` varchar(100) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `gname` varchar(200) DEFAULT NULL,
  `gid` int(11) NOT NULL DEFAULT '0',
  `sid` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `country_idd` varchar(20) DEFAULT NULL,
  `signed_up_by` varchar(100) DEFAULT NULL,
  `signed_up_ip` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ct` varchar(200) DEFAULT NULL,
  `assistant` varchar(200) DEFAULT NULL,
  `asst_phone` varchar(100) DEFAULT NULL,
  `second_email` varchar(100) DEFAULT NULL,
  `second_phone` varchar(100) DEFAULT NULL,
  `taxexempt` varchar(50) DEFAULT NULL,
  `latefeeoveride` varchar(50) DEFAULT NULL,
  `overideduenotices` varchar(50) DEFAULT NULL,
  `separateinvoices` varchar(50) DEFAULT NULL,
  `disableautocc` varchar(50) DEFAULT NULL,
  `billingcid` int(10) NOT NULL DEFAULT '0',
  `securityqid` int(10) NOT NULL DEFAULT '0',
  `securityqans` text,
  `cardtype` varchar(200) DEFAULT NULL,
  `cardlastfour` varchar(20) DEFAULT NULL,
  `cardnum` text,
  `startdate` varchar(50) DEFAULT NULL,
  `expdate` varchar(50) DEFAULT NULL,
  `issuenumber` varchar(200) DEFAULT NULL,
  `bankname` varchar(200) DEFAULT NULL,
  `banktype` varchar(200) DEFAULT NULL,
  `bankcode` varchar(200) DEFAULT NULL,
  `bankacct` varchar(200) DEFAULT NULL,
  `gatewayid` int(10) NOT NULL DEFAULT '0',
  `language` text,
  `pwresetkey` varchar(100) DEFAULT NULL,
  `emailoptout` varchar(50) DEFAULT NULL,
  `email_verified` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pwresetexpiry` datetime DEFAULT NULL,
  `c1` varchar(200) DEFAULT NULL,
  `c2` varchar(200) DEFAULT NULL,
  `c3` varchar(200) DEFAULT NULL,
  `c4` varchar(200) DEFAULT NULL,
  `c5` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1002 ;

--
-- Extraindo dados da tabela `crm_accounts`
--

INSERT INTO `crm_accounts` (`id`, `account`, `fname`, `lname`, `company`, `jobtitle`, `cid`, `o`, `phone`, `email`, `address`, `city`, `state`, `zip`, `country`, `balance`, `status`, `notes`, `tags`, `password`, `token`, `ts`, `img`, `web`, `facebook`, `google`, `linkedin`, `twitter`, `skype`, `tax_number`, `entity_number`, `currency`, `pmethod`, `autologin`, `lastlogin`, `lastloginip`, `stage`, `timezone`, `isp`, `lat`, `lon`, `gname`, `gid`, `sid`, `role`, `country_code`, `country_idd`, `signed_up_by`, `signed_up_ip`, `dob`, `ct`, `assistant`, `asst_phone`, `second_email`, `second_phone`, `taxexempt`, `latefeeoveride`, `overideduenotices`, `separateinvoices`, `disableautocc`, `billingcid`, `securityqid`, `securityqans`, `cardtype`, `cardlastfour`, `cardnum`, `startdate`, `expdate`, `issuenumber`, `bankname`, `banktype`, `bankcode`, `bankacct`, `gatewayid`, `language`, `pwresetkey`, `emailoptout`, `email_verified`, `created_at`, `updated_at`, `pwresetexpiry`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1000, 'jorge martins', '', '', 'pjtrade', '', 0, 0, '85987521623', 'jorgemartinsjw@gmail.com', 'RUA 85, 535', 'FORTALEZA', 'CE', '60751060', 'Brazil', 0.00, 'Active', '', '', 'ibS005ffPPCe2', 'jcr1jxypk3tcs9ma4ml07086a406057c42712b0b8eed77c6491f', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1001, 'Limptudo Limpeza e Conservação', '', '', 'Limptudo', '', 0, 0, '(85) 3260-9140', 'rh@limptudo.com', 'R. Antônio Sá e Silva, 1404 - Tamatanduba, Eusébio - CE', 'Fortaleza-CE', 'Ce', '61760-000', 'Brazil', 0.00, 'Active', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `crm_customfields`
--

CREATE TABLE IF NOT EXISTS `crm_customfields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ctype` text,
  `relid` int(10) NOT NULL DEFAULT '0',
  `fieldname` text,
  `fieldtype` text,
  `description` text,
  `fieldoptions` text,
  `regexpr` text,
  `adminonly` text,
  `required` text,
  `showorder` text,
  `showinvoice` text,
  `sorder` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crm_customfieldsvalues`
--

CREATE TABLE IF NOT EXISTS `crm_customfieldsvalues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fieldid` int(10) NOT NULL,
  `relid` int(10) NOT NULL,
  `fvalue` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crm_groups`
--

CREATE TABLE IF NOT EXISTS `crm_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(200) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `exempt` text,
  `description` text,
  `separateinvoices` text,
  `sorder` int(10) DEFAULT NULL,
  `c1` varchar(200) DEFAULT NULL,
  `c2` varchar(200) DEFAULT NULL,
  `c3` varchar(200) DEFAULT NULL,
  `c4` varchar(200) DEFAULT NULL,
  `c5` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hrm_attendance`
--

CREATE TABLE IF NOT EXISTS `hrm_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `eid` int(11) NOT NULL,
  `ename` varchar(200) NOT NULL,
  `ent` datetime NOT NULL,
  `ex` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hrm_employees`
--

CREATE TABLE IF NOT EXISTS `hrm_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pl_assets`
--

CREATE TABLE IF NOT EXISTS `pl_assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(14,2) NOT NULL,
  `total` decimal(14,2) NOT NULL,
  `pdate` date NOT NULL,
  `memo` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_accounts`
--

CREATE TABLE IF NOT EXISTS `sys_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `ib_url` varchar(200) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `notes` text,
  `sorder` int(11) DEFAULT NULL,
  `e` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `sys_accounts`
--

INSERT INTO `sys_accounts` (`id`, `account`, `description`, `balance`, `bank_name`, `account_number`, `currency`, `branch`, `address`, `contact_person`, `contact_phone`, `website`, `ib_url`, `created`, `notes`, `sorder`, `e`, `token`, `status`) VALUES
(8, 'Conta da Caixa', 'Deposito para conta da caixa', 190.00, '', '00020733-1', '', '', '', 'Paulo Jorge Martins', '85987521623', '', 'https://internetbanking.caixa.gov.br/sinbc/#!nb/login', '2018-03-06', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_activity`
--

CREATE TABLE IF NOT EXISTS `sys_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `msg` text NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT '',
  `stime` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `o` int(11) NOT NULL DEFAULT '0',
  `oname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_api`
--

CREATE TABLE IF NOT EXISTS `sys_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text,
  `ip` text,
  `apikey` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_appconfig`
--

CREATE TABLE IF NOT EXISTS `sys_appconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` text NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Extraindo dados da tabela `sys_appconfig`
--

INSERT INTO `sys_appconfig` (`id`, `setting`, `value`) VALUES
(1, 'CompanyName', 'PJ Programação'),
(29, 'theme', 'ibilling'),
(37, 'currency_code', 'R$'),
(56, 'language', 'pt_br'),
(57, 'show-logo', '1'),
(58, 'nstyle', 'dark'),
(63, 'dec_point', ','),
(64, 'thousands_sep', '.'),
(65, 'timezone', 'America/Fortaleza'),
(66, 'country', 'Brazil'),
(67, 'country_code', 'US'),
(68, 'df', 'Y-m-d'),
(69, 'caddress', 'Server Horus GPS <br> Fortaleza-CE <br> Brasil <br>\r\nEmpresa de rastreamento veicular e pessoal'),
(70, 'account_search', '1'),
(71, 'redirect_url', 'dashboard'),
(72, 'rtl', '0'),
(73, 'ckey', '7092711628'),
(74, 'networth_goal', '200000'),
(75, 'sysEmail', 'fatura@pjrastreamento.com.br'),
(76, 'url_rewrite', '1'),
(77, 'build', '4560'),
(78, 'animate', '1'),
(79, 'pdf_font', 'dejavusanscondensed'),
(80, 'accounting', '1'),
(81, 'invoicing', '1'),
(82, 'quotes', '1'),
(83, 'client_dashboard', '1'),
(84, 'contact_set_view_mode', 'search'),
(85, 'invoice_terms', ''),
(86, 'console_notify_invoice_created', '1'),
(87, 'i_driver', 'v2'),
(88, 'purchase_code', NULL),
(89, 'c_cache', ''),
(90, 'mininav', '0'),
(91, 'hide_footer', '1'),
(92, 'design', 'default'),
(93, 'default_landing_page', 'login'),
(94, 'recaptcha', '1'),
(95, 'recaptcha_sitekey', ''),
(96, 'recaptcha_secretkey', ''),
(97, 'home_currency', 'BRL'),
(98, 'currency_decimal_digits', 'true'),
(99, 'currency_symbol_position', 'p'),
(100, 'thousand_separator_placement', '3'),
(101, 'dashboard', 'canvas'),
(102, 'header_scripts', ''),
(103, 'footer_scripts', ''),
(104, 'ib_key', 'vLBLfhA6DNi1R2MFHO8IvFWr4Cn9665eHUF+L/sqAKM='),
(105, 'ib_s', 'PNhjeZ0sOFF3JNfzT2mLxvNNKPeh6ltqpE+G5LVSDSvgp/z79Sco7W4tJEoXYIl8'),
(106, 'ib_u_t', '1521734580'),
(107, 'ib_u_a', '0'),
(108, 'momentLocale', 'pt_br'),
(109, 'contentAnimation', 'animated fadeIn'),
(110, 'calendar', '1'),
(111, 'leads', '1'),
(112, 'tasks', '1'),
(113, 'orders', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_calls`
--

CREATE TABLE IF NOT EXISTS `sys_calls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `summary` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_cases`
--

CREATE TABLE IF NOT EXISTS `sys_cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  `description` text NOT NULL,
  `source` text NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `account` text NOT NULL,
  `aid` int(11) NOT NULL DEFAULT '0',
  `tags` text NOT NULL,
  `o` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_cats`
--

CREATE TABLE IF NOT EXISTS `sys_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('Income','Expense') NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `sys_cats`
--

INSERT INTO `sys_cats` (`id`, `name`, `type`, `sorder`) VALUES
(14, 'Advertising', 'Expense', 1),
(15, 'Bank and Credit Card Interest', 'Expense', 23),
(16, 'Car and Truck', 'Expense', 24),
(17, 'Commissions and Fees', 'Expense', 25),
(18, 'Contract Labor', 'Expense', 26),
(19, 'Contributions', 'Expense', 27),
(20, 'Cost of Goods Sold', 'Expense', 28),
(21, 'Credit Card Interest', 'Expense', 29),
(22, 'Depreciation', 'Expense', 31),
(23, 'Dividend Payments', 'Expense', 32),
(24, 'Employee Benefit Programs', 'Expense', 33),
(25, 'Entertainment', 'Expense', 34),
(26, 'Gift', 'Expense', 35),
(27, 'Insurance', 'Expense', 36),
(28, 'Legal, Accountant &amp; Other Professional Services', 'Expense', 37),
(29, 'Meals', 'Expense', 38),
(30, 'Mortgage Interest', 'Expense', 39),
(31, 'Non-Deductible Expense', 'Expense', 40),
(33, 'Other Business Property Leasing', 'Expense', 22),
(34, 'Owner Draws', 'Expense', 21),
(35, 'Payroll Taxes', 'Expense', 8),
(37, 'Phone', 'Expense', 9),
(38, 'Postage', 'Expense', 10),
(39, 'Rent', 'Expense', 12),
(40, 'Repairs &amp; Maintenance', 'Expense', 11),
(41, 'Supplies', 'Expense', 13),
(42, 'Taxes and Licenses', 'Expense', 14),
(43, 'Transfer Funds', 'Expense', 15),
(44, 'Travel', 'Expense', 16),
(45, 'Utilities', 'Expense', 17),
(46, 'Vehicle, Machinery &amp; Equipment Rental or Leasing', 'Expense', 18),
(47, 'Wages', 'Expense', 19),
(48, 'Regular Income', 'Income', 1),
(49, 'Owner Contribution', 'Income', 12),
(50, 'Interest Income', 'Income', 11),
(51, 'Expense Refund', 'Income', 10),
(52, 'Other Income', 'Income', 9),
(53, 'Salary', 'Income', 8),
(54, 'Equities', 'Income', 7),
(55, 'Rent &amp; Royalties', 'Income', 6),
(56, 'Home equity', 'Income', 5),
(57, 'Part Time Work', 'Income', 3),
(58, 'Account Transfer', 'Income', 4),
(60, 'Health Care', 'Expense', 20),
(63, 'Loans', 'Expense', 30),
(64, 'Selling Software', 'Income', 2),
(65, 'Software Customization', 'Income', 13),
(66, 'Envato', 'Income', 0),
(67, 'Salary', 'Expense', 7),
(68, 'Paypal', 'Expense', 6),
(69, 'Office Equipment', 'Expense', 5),
(70, 'Staff Entertaining', 'Expense', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_companies`
--

CREATE TABLE IF NOT EXISTS `sys_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `logo_url` varchar(200) DEFAULT NULL,
  `logo_path` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `emails` text,
  `phones` text,
  `tags` text,
  `description` text,
  `notes` text,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `ratings` varchar(50) DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sys_companies`
--

INSERT INTO `sys_companies` (`id`, `company_name`, `url`, `logo_url`, `logo_path`, `email`, `phone`, `emails`, `phones`, `tags`, `description`, `notes`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `source`, `added_from`, `o`, `cid`, `aid`, `pid`, `oid`, `rid`, `assigned`, `created_at`, `created_by`, `updated_at`, `updated_by`, `last_contact`, `last_contact_by`, `ratings`, `trash`, `archived`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1, 'PJTrade', 'http://pjtrade.com.br', 'http://www.pjrastreamento.com.br/wp-content/uploads/2015/11/para-logo-do-site2.png', NULL, 'jorgemartinsjw@gmail.com', '85987521623', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_currencies`
--

CREATE TABLE IF NOT EXISTS `sys_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) DEFAULT NULL,
  `iso_code` varchar(10) DEFAULT NULL,
  `symbol` varchar(20) DEFAULT NULL,
  `rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `prefix` varchar(20) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `decimal_separator` varchar(10) DEFAULT NULL,
  `thousand_separator` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `available_in` text,
  `isdefault` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sys_currencies`
--

INSERT INTO `sys_currencies` (`id`, `cname`, `iso_code`, `symbol`, `rate`, `prefix`, `suffix`, `format`, `decimal_separator`, `thousand_separator`, `created_at`, `created_by`, `updated_at`, `updated_by`, `available_in`, `isdefault`, `trash`, `archived`) VALUES
(1, 'BRL', 'BRL', 'R$', 1.0000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_emailconfig`
--

CREATE TABLE IF NOT EXISTS `sys_emailconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(50) NOT NULL,
  `host` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `apikey` varchar(200) NOT NULL,
  `port` varchar(10) NOT NULL,
  `secure` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sys_emailconfig`
--

INSERT INTO `sys_emailconfig` (`id`, `method`, `host`, `username`, `password`, `apikey`, `port`, `secure`) VALUES
(1, 'smtp', 'smtp.gmail.com', 'pjmonitoramento@gmail.com', 'Martins1980', '', '465', 'ssl');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_email_logs`
--

CREATE TABLE IF NOT EXISTS `sys_email_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `iid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `sys_email_logs`
--

INSERT INTO `sys_email_logs` (`id`, `userid`, `sender`, `email`, `subject`, `message`, `date`, `iid`) VALUES
(5, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-06 23:39:01 : Schedule Jobs Started....... <br>2018-03-06 23:39:01 : Creating Accounting Snapshot <br>2018-03-06 23:39:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-05<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-06 23:39:01 : Creating Recurring Invoice <br>2018-03-06 23:39:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-06 23:39:01', 0),
(6, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Invoice Payment Reminder', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. 1000 which was generated on 2018-03-07 is due on 2018-04-06. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/?ng=client/iview/1000/token_7514342174" target="_blank">http://206.189.166.40/?ng=client/iview/1000/token_7514342174</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1000<br>Invoice Amount: 60,00<br>Due Date: 2018-04-06</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-07 02:45:32', 1000),
(7, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-07 00:00:01 : Schedule Jobs Started....... <br>2018-03-07 00:00:01 : Creating Accounting Snapshot <br>2018-03-07 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-06<br>Total Income: R$ 100,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-07 00:00:01 : Creating Recurring Invoice <br>2018-03-07 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-07 00:00:01', 0),
(8, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação password change request', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Hi Jorge Martins,</div>	<div style="padding:5px">		This is to confirm that we have received a Forgot Password request for your Account Username - pjprogramacao@gmail.com <br>From the IP Address - 187.18.155.144	</div>	<div style="padding:5px">		Click this linke to reset your password- <br><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="http://206.189.166.40/?ng=login/pwreset-validate/1/token_8119654361">http://206.189.166.40/?ng=login/pwreset-validate/1/token_8119654361</a>	</div><div style="padding:5px">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-07 10:19:47', 0),
(9, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação New Password for Admin', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">\n\n<div style="padding:5px;font-size:11pt;font-weight:bold">\n   Hello Jorge Martins\n</div>\n\n\n	<div style="padding:5px">\n		Here is your new password for <strong>PJ Programação. </strong>\n	</div>\n\n	\n<div style="padding:10px 5px">\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="http://206.189.166.40/?ng=login/">http://206.189.166.40/?ng=login/</a><br>Username: pjprogramacao@gmail.com<br>Password: 377256</div>\n\n<div style="padding:5px">For security reason, Please change your password after login. </div>\n\n<div style="padding:0px 5px">\n	<div>Best Regards,<br>PJ Programação Team</div>\n\n</div>\n\n</div>', '2018-03-07 10:20:07', 0),
(10, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-08 00:00:01 : Schedule Jobs Started....... <br>2018-03-08 00:00:01 : Creating Accounting Snapshot <br>2018-03-08 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-07<br>Total Income: R$ 60,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-08 00:00:01 : Creating Recurring Invoice <br>2018-03-08 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-08 00:00:01', 0),
(11, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-09 00:00:01 : Schedule Jobs Started....... <br>2018-03-09 00:00:01 : Creating Accounting Snapshot <br>2018-03-09 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-08<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-09 00:00:01 : Creating Recurring Invoice <br>2018-03-09 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-09 00:00:01', 0),
(12, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-10 00:00:01 : Schedule Jobs Started....... <br>2018-03-10 00:00:01 : Creating Accounting Snapshot <br>2018-03-10 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-09<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-10 00:00:01 : Creating Recurring Invoice <br>2018-03-10 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-10 00:00:01', 0),
(13, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-11 00:00:01 : Schedule Jobs Started....... <br>2018-03-11 00:00:01 : Creating Accounting Snapshot <br>2018-03-11 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-10<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-11 00:00:01 : Creating Recurring Invoice <br>2018-03-11 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-11 00:00:01', 0),
(14, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Invoice Overdue Notice', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is the notice that your invoice no. 1002 which was generated on 2018-03-09 is now overdue.	</div>	<div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1002/token_8501326251" target="_blank">http://206.189.166.40/client/iview/1002/token_8501326251</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1002<br>Invoice Amount: 27,45<br>Due Date: 2018-03-14</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-11 16:06:52', 1002),
(15, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Invoice Overdue Notice', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is the notice that your invoice no. 1002 which was generated on 2018-03-09 is now overdue.	</div>	<div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1002/token_8501326251" target="_blank">http://206.189.166.40/client/iview/1002/token_8501326251</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1002<br>Invoice Amount: 27,45<br>Due Date: 2018-03-14</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-11 16:09:06', 1002),
(16, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação fura a vencer o pagamento', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. 1002 which was generated on 2018-03-09 is due on 2018-03-14. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1002/token_8501326251" target="_blank">http://206.189.166.40/client/iview/1002/token_8501326251</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1002<br>Invoice Amount: 27,45<br>Due Date: 2018-03-14</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-11 16:18:04', 1002),
(17, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação fura a vencer o pagamento', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. 1002 which was generated on 2018-03-09 is due on 2018-03-14. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1002/token_8501326251" target="_blank">http://206.189.166.40/client/iview/1002/token_8501326251</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1002<br>Invoice Amount: 27,45<br>Due Date: 2018-03-14</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-11 16:18:51', 1002),
(18, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Invoice Payment Reminder', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. 1002 which was generated on 2018-03-09 is due on 2018-03-14. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1002/token_8501326251" target="_blank">http://206.189.166.40/client/iview/1002/token_8501326251</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1002<br>Invoice Amount: 27,45<br>Due Date: 2018-03-14</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-11 19:36:20', 1002),
(19, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-12 00:00:02 : Schedule Jobs Started....... <br>2018-03-12 00:00:02 : Creating Accounting Snapshot <br>2018-03-12 00:00:02 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-11<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-12 00:00:02 : Creating Recurring Invoice <br>2018-03-12 00:00:02 : 0 Invoice created! <br>================================================== <br>', '2018-03-12 00:00:02', 0),
(20, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-13 00:00:01 : Schedule Jobs Started....... <br>2018-03-13 00:00:01 : Creating Accounting Snapshot <br>2018-03-13 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-12<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-13 00:00:01 : Creating Recurring Invoice <br>2018-03-13 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-13 00:00:01', 0),
(21, 1000, '', 'rh@limptudo.com', 'Orçamento de  Venda de rastreadores com instalação', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold"><br></div><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Boa tarde,</span></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">\nCara Dona Lúcia,\nSegue em anexo e o link do orçamento solicitado para instalação de rastreadores e manutenções, lembrando que no anexo, está cotação de instalação, com isso se houver manutenção o valor pode ser alterado do total\nURL exclusivo: http://206.189.166.40/client/q/1/token_2975386602\nVocê pode ver o orçamento a qualquer momento e simplesmente responder a este e-mail com quaisquer outras questões ou requisitos.\n</span></div><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Cumprimentos</span><span style="font-weight: 400; color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap;">,\n<span style="background-color: rgb(255, 255, 255);">PJ Programação</span></span><br></div></div>', '2018-03-13 14:56:58', 0),
(22, 1000, '', 'rh@limptudo.com', 'Orçamento de  Venda de rastreadores com instalação', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold"><br></div><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Boa tarde,</span></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">\nCara Dona Lúcia,\nSegue em anexo e o link do orçamento solicitado para instalação de rastreadores e manutenções, lembrando que no anexo, está cotação de instalação, com isso se houver manutenção o valor pode ser alterado do total\nURL exclusivo: http://206.189.166.40/client/q/1/token_2975386602\nVocê pode ver o orçamento a qualquer momento e simplesmente responder a este e-mail com quaisquer outras questões ou requisitos.\n</span></div><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Cumprimentos</span><span style="font-weight: 400; color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap;">,\n<span style="background-color: rgb(255, 255, 255);">PJ Programação</span></span><br></div></div>', '2018-03-13 14:57:19', 0),
(23, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Fatura', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Saudações,</span><br></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Este e-mail serve como sua fatura oficial do serviço prestado por  PJ Programação.\nLink para pagar a fatura: http://206.189.166.40/client/iview/1002/token_8501326251\nID da Fatura: 1002\nValor da fatura: 27,00\nData de vencimento: 2018-03-14\nSe você tiver alguma dúvida ou precisar de assistência, não hesite em contactar-nos.\nCumprimentos,\n</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Equipe</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;"> PJ Programação </span><br></div></div>', '2018-03-14 00:57:33', 1002),
(24, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Invoice Payment Reminder', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. 1004 which was generated on 2018-03-14 is due on 2018-03-17. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="http://206.189.166.40/client/iview/1004/token_5550167023" target="_blank">http://206.189.166.40/client/iview/1004/token_5550167023</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: 1004<br>Invoice Amount: 30,00<br>Due Date: 2018-03-17</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-14 01:22:30', 1004),
(25, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-14 00:00:01 : Schedule Jobs Started....... <br>2018-03-14 00:00:01 : Creating Accounting Snapshot <br>2018-03-14 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-13<br>Total Income: R$ 30,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-14 00:00:01 : Creating Recurring Invoice <br>2018-03-14 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-14 00:00:01', 0),
(26, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-15 00:00:01 : Schedule Jobs Started....... <br>2018-03-15 00:00:01 : Creating Accounting Snapshot <br>2018-03-15 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-14<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-15 00:00:01 : Creating Recurring Invoice <br>2018-03-15 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-15 00:00:01', 0),
(27, 1001, '', 'rh@limptudo.com', 'Orçamento final do serviço prestado hoje 15/03/2018', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding: 5px; font-size: 11pt;"><div style="padding: 5px; font-size: 11pt;"><span style="font-weight: bold;">Boa tarde</span>,</div><div style="padding: 5px; font-size: 11pt;">Seque em anexo vamos dos serviços prestados de rastreamentos no dia de 2018-03-15.</div><div style="padding: 5px; font-size: 11pt;">Link para detalhamento e pagamento&nbsp; http://206.189.166.40/client/q/2/token_2168351366</div><div style="padding: 5px; font-size: 11pt;">Por favor, responde com um "ok" para sabermos que recebeu este e-mail. desde já, obrigado</div><div style="padding: 5px; font-size: 11pt;">Cumprimentos,</div><div style="padding: 5px; font-size: 11pt;">Server Horus GPS</div></div></div>', '2018-03-15 16:32:57', 0),
(28, 1001, '', 'pjrastreamento@gmail.com', 'Orçamento final do serviço prestado hoje 15/03/2018', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		Dear Limptudo Limpeza e Conservação,&nbsp;<br> Here is the quote you requested for.  The quote is valid until 2018-03-17.	</div><div style="padding:10px 5px">    Quote Unique URL: <a href="http://206.189.166.40/client/q/2/token_2168351366" target="_blank">http://206.189.166.40/client/q/2/token_2168351366</a><br></div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>PJ Programação Team</div></div></div>', '2018-03-15 16:36:08', 0),
(29, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-16 00:00:01 : Schedule Jobs Started....... <br>2018-03-16 00:00:01 : Creating Accounting Snapshot <br>2018-03-16 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-15<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-16 00:00:01 : Creating Recurring Invoice <br>2018-03-16 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-16 00:00:01', 0),
(30, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-17 00:00:02 : Schedule Jobs Started....... <br>2018-03-17 00:00:02 : Creating Accounting Snapshot <br>2018-03-17 00:00:02 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-16<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-17 00:00:02 : Creating Recurring Invoice <br>2018-03-17 00:00:02 : 0 Invoice created! <br>================================================== <br>', '2018-03-17 00:00:02', 0),
(31, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-18 00:00:01 : Schedule Jobs Started....... <br>2018-03-18 00:00:01 : Creating Accounting Snapshot <br>2018-03-18 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-17<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-18 00:00:01 : Creating Recurring Invoice <br>2018-03-18 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-18 00:00:01', 0),
(32, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-19 00:00:01 : Schedule Jobs Started....... <br>2018-03-19 00:00:01 : Creating Accounting Snapshot <br>2018-03-19 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-18<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-19 00:00:01 : Creating Recurring Invoice <br>2018-03-19 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-19 00:00:01', 0),
(33, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Fatura', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Saudações,</span><br></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Este e-mail serve como sua fatura oficial do serviço prestado por  PJ Programação.\nLink para pagar a fatura: http://206.189.166.40/client/iview/1005/token_5883528292\nID da Fatura: 1005\nValor da fatura: 30,00\nData de vencimento: 2018-03-23\nSe você tiver alguma dúvida ou precisar de assistência, não hesite em contactar-nos.\nCumprimentos,\n</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Equipe</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;"> PJ Programação </span><br></div></div>', '2018-03-20 00:00:01', 1005),
(34, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-20 00:00:01 : Schedule Jobs Started....... <br>2018-03-20 00:00:01 : Creating Accounting Snapshot <br>2018-03-20 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-19<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-20 00:00:01 : Creating Recurring Invoice <br>2018-03-20 00:00:03 : 1 Invoice created! <br>================================================== <br>', '2018-03-20 00:00:03', 0),
(35, 1000, '', 'jorgemartinsjw@gmail.com', 'PJ Programação Fatura', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Saudações,</span><br></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Este e-mail serve como sua fatura oficial do serviço prestado por  PJ Programação.\nLink para pagar a fatura: http://206.189.166.40/client/iview/1006/token_9426369032\nID da Fatura: 1006\nValor da fatura: 30,00\nData de vencimento: 2018-03-24\nSe você tiver alguma dúvida ou precisar de assistência, não hesite em contactar-nos.\nCumprimentos,\n</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Equipe</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;"> PJ Programação </span><br></div></div>', '2018-03-21 00:00:01', 1006),
(36, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-21 00:00:01 : Schedule Jobs Started....... <br>2018-03-21 00:00:01 : Creating Accounting Snapshot <br>2018-03-21 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-20<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-21 00:00:01 : Creating Recurring Invoice <br>2018-03-21 00:00:04 : 1 Invoice created! <br>================================================== <br>', '2018-03-21 00:00:04', 0),
(37, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-22 00:00:01 : Schedule Jobs Started....... <br>2018-03-22 00:00:01 : Creating Accounting Snapshot <br>2018-03-22 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-21<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-22 00:00:01 : Creating Recurring Invoice <br>2018-03-22 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-22 00:00:01', 0),
(38, 0, '', 'pjprogramacao@gmail.com', 'PJ Programação Automation Activity', '================================================== <br>2018-03-23 00:00:01 : Schedule Jobs Started....... <br>2018-03-23 00:00:01 : Creating Accounting Snapshot <br>2018-03-23 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-22<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-23 00:00:01 : Creating Recurring Invoice <br>2018-03-23 00:00:01 : 0 Invoice created! <br>================================================== <br>', '2018-03-23 00:00:01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_email_templates`
--

CREATE TABLE IF NOT EXISTS `sys_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tplname` varchar(128) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `send` varchar(50) DEFAULT 'Active',
  `core` enum('Yes','No') DEFAULT 'Yes',
  `hidden` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`language_id`),
  KEY `tplname` (`tplname`(32))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `sys_email_templates`
--

INSERT INTO `sys_email_templates` (`id`, `tplname`, `language_id`, `subject`, `message`, `send`, `core`, `hidden`) VALUES
(3, 'Invoice:Invoice Created', 1, '{{business_name}} Fatura', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding: 5px; font-size: 11pt;"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; white-space: pre-wrap; font-weight: bold;">Saudações,</span><br></div><div style="padding:5px;font-size:11pt;font-weight:bold"><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Este e-mail serve como sua fatura oficial do serviço prestado por  {{business_name}}.\nLink para pagar a fatura: {{invoice_url}}\nID da Fatura: {{invoice_id}}\nValor da fatura: {{invoice_amount}}\nData de vencimento: {{invoice_due_date}}\nSe você tiver alguma dúvida ou precisar de assistência, não hesite em contactar-nos.\nCumprimentos,\n</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;">Equipe</span><span style="color: rgb(33, 33, 33); font-family: arial, sans-serif; font-size: 16px; font-weight: 400; white-space: pre-wrap;"> {{business_name}} </span><br></div></div>', 'Yes', 'Yes', 0),
(7, 'Admin:Password Change Request', 1, '{{business_name}} password change request', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Hi {{name}},</div>	<div style="padding:5px">		This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>From the IP Address - {{ip_address}}	</div>	<div style="padding:5px">		Click this linke to reset your password- <br><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{password_reset_link}}">{{password_reset_link}}</a>	</div><div style="padding:5px">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0),
(10, 'Admin:New Password', 1, '{{business_name}} New Password for Admin', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">\n\n<div style="padding:5px;font-size:11pt;font-weight:bold">\n   Hello {{name}}\n</div>\n\n\n	<div style="padding:5px">\n		Here is your new password for <strong>{{business_name}}. </strong>\n	</div>\n\n	\n<div style="padding:10px 5px">\n    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{login_url}}">{{login_url}}</a><br>Username: {{username}}<br>Password: {{password}}</div>\n\n<div style="padding:5px">For security reason, Please change your password after login. </div>\n\n<div style="padding:0px 5px">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n</div>\n\n</div>', 'Yes', 'Yes', 0),
(12, 'Invoice:Invoice Payment Reminder', 1, '{{business_name}} Invoice Payment Reminder', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is due on {{invoice_due_date}}. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0),
(13, 'Invoice:Invoice Overdue Notice', 1, '{{business_name}} Invoice Overdue Notice', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is the notice that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is now overdue.	</div>	<div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0),
(14, 'Invoice:Invoice Payment Confirmation', 1, '{{business_name}} Invoice Payment Confirmation', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">\n\n<div style="padding:5px;font-size:11pt;font-weight:bold">\n   Greetings,\n</div>\n\n\n\n	<div style="padding:5px">\n		This is a payment receipt for Invoice {{invoice_id}} sent on {{invoice_date}}.\n	</div>\n\n\n	<div style="padding:5px">\n		Login to your client Portal to view this invoice.\n	</div>\n\n\n<div style="padding:10px 5px">\n    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div>\n\n\n<div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div>\n\n\n<div style="padding:0px 5px">\n	<div>Best Regards,<br>{{business_name}} Team</div>\n\n\n</div>\n\n\n</div>', 'Yes', 'Yes', 0),
(15, 'Invoice:Invoice Refund Confirmation', 1, '{{business_name}} Invoice Refund Confirmation', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,''droid sans'',''lucida sans'',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is confirmation that a refund has been processed for Invoice {{invoice_id}} sent on {{invoice_date}}.	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don''t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0),
(16, 'Quote:Quote Created', 1, '{{quote_subject}}', '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		Dear {{contact_name}},&nbsp;<br> Here is the quote you requested for.  The quote is valid until {{valid_until}}.	</div><div style="padding:10px 5px">    Quote Unique URL: <a href="{{quote_url}}" target="_blank">{{quote_url}}</a><br></div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>', 'Yes', 'Yes', 0),
(17, 'Client:Client Signup Email', 1, 'Your {{business_name}} Login Info', '<p>Dear {{client_name}},</p>\n<p>Welcome to {{business_name}}.</p>\n<p>You can track your billing, profile, transactions from this portal.</p>\n<p>Your login information is as follows:</p>\n<p>---------------------------------------------------------------------------------------</p>\n<p>Login URL: {{client_login_url}} <br />Email Address: {{client_email}}<br /> Password: Your chosen password.</p>\n<p>----------------------------------------------------------------------------------------</p>\n<p>We very much appreciate you for choosing us.</p>\n<p>{{business_name}} Team</p>', 'Yes', 'Yes', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_employees`
--

CREATE TABLE IF NOT EXISTS `sys_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `hiredate` date NOT NULL,
  `emid` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `payroll` enum('Salary','Hourly','Commission','Other') NOT NULL,
  `etype` enum('FullTime','PartTime','Other') NOT NULL,
  `classf` enum('Parmanent','Seasonal','Temp','Contract') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `hphone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `emname` varchar(100) NOT NULL,
  `emcontact` varchar(100) NOT NULL,
  `emrelation` varchar(100) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `nextreview` date NOT NULL,
  `separation` date NOT NULL,
  `notes` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_events`
--

CREATE TABLE IF NOT EXISTS `sys_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `contacts` text,
  `deals` text,
  `owner` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `etype` varchar(200) DEFAULT NULL,
  `priority` varchar(200) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allday` int(1) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_invoiceitems`
--

CREATE TABLE IF NOT EXISTS `sys_invoiceitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(10) NOT NULL DEFAULT '0',
  `userid` int(10) NOT NULL,
  `type` text NOT NULL,
  `relid` int(10) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(20) NOT NULL DEFAULT '1',
  `amount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `taxed` int(1) NOT NULL,
  `taxamount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(14,2) NOT NULL DEFAULT '0.00',
  `duedate` date DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoiceid` (`invoiceid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1204 ;

--
-- Extraindo dados da tabela `sys_invoiceitems`
--

INSERT INTO `sys_invoiceitems` (`id`, `invoiceid`, `userid`, `type`, `relid`, `itemcode`, `description`, `qty`, `amount`, `taxed`, `taxamount`, `total`, `duedate`, `paymentmethod`, `notes`) VALUES
(1190, 1000, 1000, '', 0, '', '', '1', 30.00, 0, 0.00, 30.00, '2018-03-06', '', ''),
(1191, 1000, 1000, '', 0, '', 'Mensalidade', '1', 30.00, 0, 0.00, 30.00, '2018-03-06', '', ''),
(1192, 1001, 1000, '', 0, '', 'Mensalidade', '1', 30.00, 0, 0.00, 30.00, '2018-03-07', '', ''),
(1199, 1002, 1000, '', 0, '', 'Mensalidade', '1', 30.00, 1, 0.00, 30.00, '2018-03-13', '', ''),
(1200, 1003, 1000, '', 0, '', 'mensalidade chip', '1', 30.00, 0, 0.00, 30.00, '2018-03-13', '', ''),
(1201, 1004, 1000, '', 0, '', 'Mensalidade', '1', 30.00, 0, 0.00, 30.00, '2018-03-13', '', ''),
(1202, 1005, 1000, '', 0, '', 'mensalidade chip', '1', 30.00, 0, 0.00, 30.00, NULL, '', ''),
(1203, 1006, 1000, '', 0, '', 'Mensalidade', '1', 30.00, 0, 0.00, 30.00, NULL, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_invoices`
--

CREATE TABLE IF NOT EXISTS `sys_invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `account` varchar(200) NOT NULL,
  `cn` varchar(100) NOT NULL DEFAULT '',
  `invoicenum` text NOT NULL,
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT 'f',
  `discount_value` decimal(14,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(14,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `taxname` varchar(100) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT '0.00',
  `taxrate` decimal(10,2) NOT NULL,
  `taxrate2` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT '0',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT '0',
  `ename` varchar(200) NOT NULL DEFAULT '',
  `vid` int(11) NOT NULL DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `recurring_ends` date DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT '0',
  `last_overdue_reminder` date DEFAULT NULL,
  `allowed_payment_methods` text,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `q_hide` tinyint(1) NOT NULL DEFAULT '0',
  `show_quantity_as` int(11) NOT NULL DEFAULT '1',
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `status` (`status`(3))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1007 ;

--
-- Extraindo dados da tabela `sys_invoices`
--

INSERT INTO `sys_invoices` (`id`, `userid`, `account`, `cn`, `invoicenum`, `date`, `duedate`, `datepaid`, `subtotal`, `discount_type`, `discount_value`, `discount`, `credit`, `taxname`, `tax`, `tax2`, `total`, `taxrate`, `taxrate2`, `status`, `paymentmethod`, `notes`, `vtoken`, `ptoken`, `r`, `nd`, `eid`, `ename`, `vid`, `currency`, `currency_symbol`, `currency_prefix`, `currency_suffix`, `currency_rate`, `recurring`, `recurring_ends`, `last_recurring_date`, `source`, `sale_agent`, `last_overdue_reminder`, `allowed_payment_methods`, `billing_street`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip`, `shipping_country`, `q_hide`, `show_quantity_as`, `pid`) VALUES
(1000, 1000, 'jorge martins', '', '', '2018-03-07', '2018-04-06', '2018-03-06 23:43:35', 60.00, 'p', 0.00, 0.00, 60.00, 'Sales Tax', 0.00, 0.00, 60.00, 1.50, 0.00, 'Paid', '', '<p>fatura do chip m2m</p>', '7514342174', '5862210196', '+1 month', '2018-04-07', 0, '', 0, 1, 'R$', NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1001, 1000, 'jorge martins', '001', '', '2018-03-07', '2018-03-10', '2018-03-07 18:56:54', 30.00, 'p', 0.00, 0.00, 0.00, 'Sales Tax', 0.00, 0.00, 30.00, 1.50, 0.00, 'Unpaid', '', '', '3214596079', '0531669310', '0', '2018-03-07', 0, '', 0, 1, 'R$', NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1002, 1000, 'jorge martins', '', '', '2018-03-09', '2018-03-14', '2018-03-09 10:39:49', 30.00, 'p', 10.00, 3.00, 30.00, '', 0.00, 0.00, 27.00, 0.00, 0.00, 'Unpaid', '', '', '8501326251', '5536274316', '+1 month', '2018-04-09', 0, '', 0, 1, 'R$', NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1003, 1000, 'jorge martins', '', '', '2018-03-13', '2018-03-16', '2018-03-13 22:02:17', 30.00, 'p', 0.00, 0.00, 0.00, '', 0.00, 0.00, 30.00, 0.00, 0.00, 'Unpaid', '', '<p>serviço de telecomunicação com chip m2m </p>', '8639189128', '0934100947', '0', '2018-03-20', 0, '', 0, 1, 'R$', NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1004, 1000, 'jorge martins', '', '', '2018-03-14', '2018-03-17', '2018-03-13 22:07:36', 30.00, 'p', 0.00, 0.00, 0.00, '', 0.00, 0.00, 30.00, 0.00, 0.00, 'Unpaid', '', '', '5550167023', '2114488726', '0', '2018-03-21', 0, '', 0, 1, 'R$', NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1005, 1000, 'jorge martins', '', '', '2018-03-20', '2018-03-23', '0000-00-00 00:00:00', 30.00, 'f', 0.00, 0.00, 0.00, '', 0.00, 0.00, 30.00, 0.00, 0.00, 'Unpaid', '', '<p>serviço de telecomunicação com chip m2m </p>', '5883528292', '8695001218', '+1 week', '2018-03-27', 0, '', 0, 0, NULL, NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0),
(1006, 1000, 'jorge martins', '', '', '2018-03-21', '2018-03-24', '0000-00-00 00:00:00', 30.00, 'f', 0.00, 0.00, 0.00, '', 0.00, 0.00, 30.00, 0.00, 0.00, 'Unpaid', '', '', '9426369032', '6231104801', '+1 week', '2018-03-28', 0, '', 0, 0, NULL, NULL, NULL, 1.0000, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_items`
--

CREATE TABLE IF NOT EXISTS `sys_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `unit` varchar(100) NOT NULL DEFAULT '',
  `sales_price` decimal(16,2) NOT NULL DEFAULT '0.00',
  `item_number` varchar(100) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `type` enum('Service','Product') NOT NULL,
  `track_inventroy` enum('Yes','No') NOT NULL DEFAULT 'No',
  `negative_stock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `available` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `added` date NOT NULL DEFAULT '0000-00-00',
  `last_sold` date NOT NULL DEFAULT '0000-00-00',
  `e` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1010 ;

--
-- Extraindo dados da tabela `sys_items`
--

INSERT INTO `sys_items` (`id`, `name`, `unit`, `sales_price`, `item_number`, `description`, `type`, `track_inventroy`, `negative_stock`, `available`, `status`, `added`, `last_sold`, `e`) VALUES
(1009, 'Mensalidade', '', 30.00, '1', 'Fatura do chip de dados', 'Product', 'No', 'No', 0, 'Active', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_leads`
--

CREATE TABLE IF NOT EXISTS `sys_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `added_from` varchar(200) DEFAULT NULL,
  `o` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL DEFAULT '0',
  `sorder` int(11) NOT NULL DEFAULT '0',
  `assigned` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `last_contact` datetime DEFAULT NULL,
  `last_contact_by` varchar(200) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `public` int(1) NOT NULL DEFAULT '0',
  `ratings` varchar(50) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `lost` int(1) NOT NULL DEFAULT '0',
  `junk` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_logs`
--

CREATE TABLE IF NOT EXISTS `sys_logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `userid` int(10) NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223 ;

--
-- Extraindo dados da tabela `sys_logs`
--

INSERT INTO `sys_logs` (`id`, `date`, `type`, `description`, `userid`, `ip`) VALUES
(184, '2015-07-22 15:12:31', 'Admin', 'Login Successful demo@example.com', 1, '::1'),
(185, '2016-08-15 11:21:27', 'System', 'dashboard row is created\r\nheader_scripts row is created\r\nfooter_scripts row is created\r\nEncryption Key Created\r\nTime Synced\r\nUpdate Completed!\r\n', 0, '::1'),
(186, '2016-08-15 11:22:36', 'System', 'Emp Column Created in Invoice Table\r\nUpdate Completed!\r\n', 0, '::1'),
(187, '2018-03-06 21:02:10', 'Admin', 'Login Successful pjprogramacao@gmail.com', 1, '187.18.155.144'),
(188, '2018-03-06 21:02:11', 'System', 'Build Updated to: 4560\r\nPl Table Altered\r\nsys_users table Altered\r\nLocale for momentjs added.\r\nAnimation class added\r\nsys_invoices table altered\r\nStaff Permissions Table Created\r\nOrders Table Created\r\nTasks Permissions Table Created\r\nEvents Table Created\r\nLeads Table Created\r\nCurrencies Table Created\r\nCompanies Table Created\r\nUpdate Completed!\r\n', 0, '187.18.155.144'),
(189, '2018-03-06 21:19:52', 'Admin', 'New Contact Added jorge martins [CID: 1000]', 1, '187.18.155.144'),
(190, '2018-03-07 10:20:32', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(191, '2018-03-07 10:21:05', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(192, '2018-03-07 10:21:46', 'Admin', 'Falha na autentica&ccedil;&atilde;o pjprogramacao@gmail.com', 0, '187.18.155.144'),
(193, '2018-03-07 10:21:50', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(194, '2018-03-07 11:51:22', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(195, '2018-03-07 11:52:05', 'Admin', 'New Deposit: Fatura 1000 Pagamento [TrID: 1001 | Amount: 60]', 1, '187.18.155.144'),
(196, '2018-03-07 14:02:32', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(197, '2018-03-07 16:59:33', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(198, '2018-03-07 18:40:40', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(199, '2018-03-07 20:47:24', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(200, '2018-03-07 20:47:43', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(201, '2018-03-09 10:38:19', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(202, '2018-03-09 13:29:39', 'Admin', 'Falha na autentica&ccedil;&atilde;o pjprogramacao@gmail.com', 0, '187.18.155.144'),
(203, '2018-03-09 13:30:04', 'Admin', 'Falha na autentica&ccedil;&atilde;o pjprogramacao@gmail.com', 0, '187.18.155.144'),
(204, '2018-03-09 13:30:34', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(205, '2018-03-09 17:02:02', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(206, '2018-03-09 18:44:02', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(207, '2018-03-11 13:04:28', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(208, '2018-03-11 13:32:48', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(209, '2018-03-11 16:36:12', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(210, '2018-03-13 11:42:07', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(211, '2018-03-13 12:08:37', 'Admin', 'Novo contato adicionado Limptudo Limpeza e Conservação [CID: 1001]', 1, '187.18.155.144'),
(212, '2018-03-13 21:50:48', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(213, '2018-03-13 21:55:39', 'Admin', 'New Deposit: Fatura 1002 Pagamento [TrID: 1002 | Amount: 30]', 1, '187.18.155.144'),
(214, '2018-03-13 21:59:04', 'Admin', 'New Deposit: Fatura 1002 Pagamento [TrID: 1003 | Amount: 0]', 1, '187.18.155.144'),
(215, '2018-03-14 12:40:18', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(216, '2018-03-15 12:37:15', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(217, '2018-03-19 11:29:06', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(218, '2018-03-20 11:07:05', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(219, '2018-03-21 13:02:58', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(220, '2018-03-21 13:09:46', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(221, '2018-03-21 13:10:41', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144'),
(222, '2018-03-23 00:58:28', 'Admin', 'Autenticado com sucesso pjprogramacao@gmail.com', 1, '187.18.155.144');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_notes`
--

CREATE TABLE IF NOT EXISTS `sys_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contents` mediumtext NOT NULL,
  `type` enum('Private','Public') NOT NULL DEFAULT 'Private',
  `o` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `uo` int(11) NOT NULL,
  `vtoken` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_orgs`
--

CREATE TABLE IF NOT EXISTS `sys_orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contacts` mediumtext NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phones` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `emails` mediumtext NOT NULL,
  `web` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `notes` mediumtext NOT NULL,
  `tags` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_payee`
--

CREATE TABLE IF NOT EXISTS `sys_payee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `sys_payee`
--

INSERT INTO `sys_payee` (`id`, `name`, `sorder`) VALUES
(6, 'Amazon', 0),
(7, 'eBay', 0),
(8, 'Google', 0),
(12, 'Employee', 0),
(17, 'Gas Station', 0),
(18, 'Government', 0),
(19, 'Other', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_payers`
--

CREATE TABLE IF NOT EXISTS `sys_payers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `sys_payers`
--

INSERT INTO `sys_payers` (`id`, `name`, `sorder`) VALUES
(1, 'Employer', 2),
(2, 'City Bank', 3),
(5, 'Government', 0),
(7, 'John Doe', 0),
(8, 'Jane Doe', 0),
(9, 'Client X', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_permissions`
--

CREATE TABLE IF NOT EXISTS `sys_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(200) DEFAULT NULL,
  `shortname` varchar(200) DEFAULT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  `core` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `sys_permissions`
--

INSERT INTO `sys_permissions` (`id`, `pname`, `shortname`, `available`, `core`) VALUES
(1, 'Customers', 'customers', 0, 1),
(2, 'Companies', 'companies', 0, 1),
(3, 'Transactions', 'transactions', 0, 1),
(4, 'Sales', 'sales', 0, 1),
(5, 'Bank & Cash', 'bank_n_cash', 0, 1),
(6, 'Products & Services', 'products_n_services', 0, 1),
(7, 'Reports', 'reports', 0, 1),
(8, 'Utilities', 'utilities', 0, 1),
(9, 'Appearance', 'appearance', 0, 1),
(10, 'Plugins', 'plugins', 0, 1),
(11, 'Calendar', 'calendar', 0, 1),
(12, 'Leads', 'leads', 0, 1),
(13, 'Tasks', 'tasks', 0, 1),
(14, 'Contracts', 'contracts', 0, 1),
(15, 'Orders', 'orders', 0, 1),
(16, 'Settings', 'settings', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_pg`
--

CREATE TABLE IF NOT EXISTS `sys_pg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `settings` text NOT NULL,
  `value` text NOT NULL,
  `processor` text NOT NULL,
  `ins` text NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `c4` text NOT NULL,
  `c5` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `sorder` int(2) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `mode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gateway_setting` (`name`(32),`processor`(32)),
  KEY `setting_value` (`processor`(32),`ins`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `sys_pg`
--

INSERT INTO `sys_pg` (`id`, `name`, `settings`, `value`, `processor`, `ins`, `c1`, `c2`, `c3`, `c4`, `c5`, `status`, `sorder`, `logo`, `mode`) VALUES
(1, 'Paypal', 'Paypal Email', 'pjrastreamento@gmail.com', 'paypal', 'Invoices', 'BRL', '1', '', '', '', 'Active', 1, NULL, ''),
(2, 'Stripe', 'API Key', 'sk_test_ARblMczqDw61NusMMs7o1RVK', 'stripe', '', 'BRL', '', '', '', '', 'Active', 2, NULL, ''),
(3, 'Pagamento por Transferência  / Deposito', 'Instructions', 'Pagamento via Transferência ou Depósito <b>com 10% de desconto, segue as conta disponíveis<b> <br> <br>\nNome do banco: Conta Caixa Econômica<br> \nNome da conta: Paulo Jorge Martins <br>\n Número Agencia: 3466 <br>\n Número Conta:00020733-1 <br>\n Número Op: 001 <br>\n\n<br>\n<br>\nNome do banco: Conta Itaú<br> <br>\nNome da conta: Paulo Jorge Martins <br>\n Número Agencia: 8373 <br>\n Número Conta:06845-4<br>\n Número Op: 001 <br>\nCPF: 92121535349\n<br>\n<br>\nDesde já, obrigado pelo pagamento.', 'manualpayment', '', '', '', '', '', '', 'Active', 3, NULL, ''),
(4, 'Authorize.net', 'API_LOGIN_ID', 'Insert API Login ID here', 'authorize_net', '', 'Insert Transaction Key Here', '', '', '', '', 'Inactive', 4, NULL, ''),
(5, 'Braintree', 'Merchant ID', 'your merchant id', 'braintree', '', 'your public key', 'your private key', 'bank account', 'sandbox', '', 'Inactive', 5, NULL, NULL),
(6, 'CCAvenue', 'Merchant ID', 'your merchant id', 'ccavenue', '', 'insert working key here', 'INR', '1', '', '', 'Inactive', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_pl`
--

CREATE TABLE IF NOT EXISTS `sys_pl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `sorder` int(11) NOT NULL DEFAULT '0',
  `build` int(10) DEFAULT '1',
  `c1` text,
  `c2` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sys_pl`
--

INSERT INTO `sys_pl` (`id`, `c`, `status`, `sorder`, `build`, `c1`, `c2`) VALUES
(2, 'notes', 1, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_pmethods`
--

CREATE TABLE IF NOT EXISTS `sys_pmethods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `sys_pmethods`
--

INSERT INTO `sys_pmethods` (`id`, `name`, `sorder`) VALUES
(1, 'Cash', 1),
(2, 'Check', 4),
(3, 'Credit Card', 5),
(4, 'Debit', 6),
(5, 'Electronic Transfer', 7),
(9, 'Paypal', 2),
(10, 'ATM Withdrawals', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_projects`
--

CREATE TABLE IF NOT EXISTS `sys_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  `description` text NOT NULL,
  `source` text NOT NULL,
  `started` date NOT NULL,
  `finished` date NOT NULL,
  `totaltime` varchar(20) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `account` text NOT NULL,
  `aid` int(11) NOT NULL DEFAULT '0',
  `tags` text NOT NULL,
  `o` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_quoteitems`
--

CREATE TABLE IF NOT EXISTS `sys_quoteitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `qid` int(10) NOT NULL,
  `itemcode` text NOT NULL,
  `description` text NOT NULL,
  `qty` text NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `taxable` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `sys_quoteitems`
--

INSERT INTO `sys_quoteitems` (`id`, `qid`, `itemcode`, `description`, `qty`, `amount`, `discount`, `total`, `taxable`) VALUES
(5, 1, '', 'Rastreador + instalação', '2', 200.00, 0.00, 400.00, 0),
(6, 1, '', 'Chips Vivo', '2', 10.00, 0.00, 20.00, 0),
(7, 1, '', 'Recarga para chips', '2', 20.00, 0.00, 40.00, 0),
(8, 1, '', 'Integração de dois veículos novos no sistema ', '2', 70.00, 0.00, 140.00, 0),
(9, 2, '', 'Rastreadores +  instalação', '3', 200.00, 0.00, 600.00, 0),
(10, 2, '', 'Chips da Vivo', '2', 10.00, 0.00, 20.00, 0),
(11, 2, '', 'Recargas para cadastramento de dados de internet', '2', 20.00, 0.00, 40.00, 0),
(12, 2, '', 'Hospedagem de novos rastreadores (dos carros POU-3161, POU-3031)', '2', 70.00, 0.00, 140.00, 0),
(13, 2, '', 'Manutenção no rastreador do trator', '1', 30.00, 0.00, 30.00, 0),
(14, 2, '', 'Deslocamento a domicílio', '1', 50.00, 0.00, 50.00, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_quotes`
--

CREATE TABLE IF NOT EXISTS `sys_quotes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `stage` enum('Draft','Delivered','On Hold','Accepted','Lost','Dead') NOT NULL,
  `validuntil` date NOT NULL,
  `userid` int(10) NOT NULL,
  `invoicenum` text NOT NULL,
  `cn` text NOT NULL,
  `account` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `companyname` text NOT NULL,
  `email` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` text NOT NULL,
  `country` text NOT NULL,
  `phonenumber` text NOT NULL,
  `currency` int(10) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` text NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `taxname` text NOT NULL,
  `taxrate` decimal(10,2) NOT NULL,
  `tax1` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `proposal` text NOT NULL,
  `customernotes` text NOT NULL,
  `adminnotes` text NOT NULL,
  `datecreated` date NOT NULL,
  `lastmodified` date NOT NULL,
  `datesent` date NOT NULL,
  `dateaccepted` date NOT NULL,
  `vtoken` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sys_quotes`
--

INSERT INTO `sys_quotes` (`id`, `subject`, `stage`, `validuntil`, `userid`, `invoicenum`, `cn`, `account`, `firstname`, `lastname`, `companyname`, `email`, `address1`, `address2`, `city`, `state`, `postcode`, `country`, `phonenumber`, `currency`, `subtotal`, `discount_type`, `discount_value`, `discount`, `taxname`, `taxrate`, `tax1`, `tax2`, `total`, `proposal`, `customernotes`, `adminnotes`, `datecreated`, `lastmodified`, `datesent`, `dateaccepted`, `vtoken`) VALUES
(1, 'Venda de rastreadores com instalação', 'Delivered', '2018-04-14', 1000, 'LimpTudo', '', 'jorge martins', '', '', '', '', '', '', '', '', '', '', '', 1, 600.00, 'p', 0.00, 0.00, '', 0.00, 0.00, 0.00, 600.00, '<p>Segue orçamento de serviço de venda e instalação de rastreadores </p>', '<p>Rastreadores tem garantia de 6 meses.</p>', '', '2018-03-13', '2018-03-13', '2018-03-13', '2018-03-13', '2975386602'),
(2, 'Orçamento final do serviço prestado hoje 15/03/2018', 'Delivered', '2018-03-17', 1001, '', '', 'Limptudo Limpeza e Conservação', '', '', '', '', '', '', '', '', '', '', '', 1, 880.00, 'p', 0.00, 0.00, '', 0.00, 0.00, 0.00, 880.00, '<p>Boa tarde.</p><p>Segue em anexo orçamento do serviço prestado hoje (15/03/2018).</p><p>Por favor, gostaria que o pagamento fosse feito até o dia 17/03/2018 caso tenha como.</p><p><br></p><hr><p><br></p>', '<p>Rastreadores dos veículos  POU-3161, POU-3031 estão com garantia de 6 meses.</p><p>Nova lista dos veículos será enviado por outro email.</p><p><br></p><p><strong>C</strong>onta para pagamento:</p><p>Caixa Economica</p><p>Agencia: 3466</p><p>Conta corrente: 00020733-1</p><p>Paulo Jorge Martins</p>', '', '2018-03-15', '2018-03-15', '2018-03-15', '2018-03-15', '2168351366');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_repeating`
--

CREATE TABLE IF NOT EXISTS `sys_repeating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) NOT NULL,
  `type` enum('Income','Expense','Transfer') NOT NULL,
  `category` varchar(200) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payer` varchar(200) NOT NULL,
  `payee` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `status` enum('Cleared','Uncleared','Reconciled','Void') NOT NULL DEFAULT 'Uncleared',
  `description` mediumtext NOT NULL,
  `tags` mediumtext NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_roles`
--

CREATE TABLE IF NOT EXISTS `sys_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sys_roles`
--

INSERT INTO `sys_roles` (`id`, `rname`) VALUES
(1, 'Employee');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_sales`
--

CREATE TABLE IF NOT EXISTS `sys_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `oname` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `term` varchar(100) NOT NULL,
  `milestone` varchar(100) NOT NULL,
  `p` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `open` date NOT NULL,
  `close` date NOT NULL,
  `status` enum('New','In Progress','Won','Lost') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_schedule`
--

CREATE TABLE IF NOT EXISTS `sys_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` mediumtext NOT NULL,
  `val` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `sys_schedule`
--

INSERT INTO `sys_schedule` (`id`, `cname`, `val`) VALUES
(1, 'accounting_snapshot', 'Active'),
(2, 'recurring_invoice', 'Active'),
(3, 'notify', 'Active'),
(4, 'notifyemail', 'pjprogramacao@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_schedulelogs`
--

CREATE TABLE IF NOT EXISTS `sys_schedulelogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `logs` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `sys_schedulelogs`
--

INSERT INTO `sys_schedulelogs` (`id`, `date`, `logs`) VALUES
(4, '2015-03-14', '2015-03-14 20:17:15 : Schedule Jobs Started....... <br>2015-03-14 20:17:15 : Creating Accounting Snapshot <br>2015-03-14 20:17:15 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2015-03-13<br>Total Income: Tk. 0.00<br>Total Expense: Tk. 0.00<br>================================================== <br>2015-03-14 20:17:15 : Creating Recurring Invoice <br>2015-03-14 20:17:15 : 1 Invoice created! <br>================================================== <br>'),
(5, '2018-03-06', '================================================== <br>2018-03-06 23:39:01 : Schedule Jobs Started....... <br>2018-03-06 23:39:01 : Creating Accounting Snapshot <br>2018-03-06 23:39:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-05<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-06 23:39:01 : Creating Recurring Invoice <br>2018-03-06 23:39:01 : 0 Invoice created! <br>================================================== <br>'),
(6, '2018-03-07', '================================================== <br>2018-03-07 00:00:01 : Schedule Jobs Started....... <br>2018-03-07 00:00:01 : Creating Accounting Snapshot <br>2018-03-07 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-06<br>Total Income: R$ 100,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-07 00:00:01 : Creating Recurring Invoice <br>2018-03-07 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(7, '2018-03-08', '================================================== <br>2018-03-08 00:00:01 : Schedule Jobs Started....... <br>2018-03-08 00:00:01 : Creating Accounting Snapshot <br>2018-03-08 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-07<br>Total Income: R$ 60,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-08 00:00:01 : Creating Recurring Invoice <br>2018-03-08 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(8, '2018-03-09', '================================================== <br>2018-03-09 00:00:01 : Schedule Jobs Started....... <br>2018-03-09 00:00:01 : Creating Accounting Snapshot <br>2018-03-09 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-08<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-09 00:00:01 : Creating Recurring Invoice <br>2018-03-09 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(9, '2018-03-10', '================================================== <br>2018-03-10 00:00:01 : Schedule Jobs Started....... <br>2018-03-10 00:00:01 : Creating Accounting Snapshot <br>2018-03-10 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-09<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-10 00:00:01 : Creating Recurring Invoice <br>2018-03-10 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(10, '2018-03-11', '================================================== <br>2018-03-11 00:00:01 : Schedule Jobs Started....... <br>2018-03-11 00:00:01 : Creating Accounting Snapshot <br>2018-03-11 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-10<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-11 00:00:01 : Creating Recurring Invoice <br>2018-03-11 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(11, '2018-03-12', '================================================== <br>2018-03-12 00:00:02 : Schedule Jobs Started....... <br>2018-03-12 00:00:02 : Creating Accounting Snapshot <br>2018-03-12 00:00:02 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-11<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-12 00:00:02 : Creating Recurring Invoice <br>2018-03-12 00:00:02 : 0 Invoice created! <br>================================================== <br>'),
(12, '2018-03-13', '================================================== <br>2018-03-13 00:00:01 : Schedule Jobs Started....... <br>2018-03-13 00:00:01 : Creating Accounting Snapshot <br>2018-03-13 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-12<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-13 00:00:01 : Creating Recurring Invoice <br>2018-03-13 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(13, '2018-03-14', '================================================== <br>2018-03-14 00:00:01 : Schedule Jobs Started....... <br>2018-03-14 00:00:01 : Creating Accounting Snapshot <br>2018-03-14 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-13<br>Total Income: R$ 30,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-14 00:00:01 : Creating Recurring Invoice <br>2018-03-14 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(14, '2018-03-15', '================================================== <br>2018-03-15 00:00:01 : Schedule Jobs Started....... <br>2018-03-15 00:00:01 : Creating Accounting Snapshot <br>2018-03-15 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-14<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-15 00:00:01 : Creating Recurring Invoice <br>2018-03-15 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(15, '2018-03-16', '================================================== <br>2018-03-16 00:00:01 : Schedule Jobs Started....... <br>2018-03-16 00:00:01 : Creating Accounting Snapshot <br>2018-03-16 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-15<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-16 00:00:01 : Creating Recurring Invoice <br>2018-03-16 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(16, '2018-03-17', '================================================== <br>2018-03-17 00:00:02 : Schedule Jobs Started....... <br>2018-03-17 00:00:02 : Creating Accounting Snapshot <br>2018-03-17 00:00:02 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-16<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-17 00:00:02 : Creating Recurring Invoice <br>2018-03-17 00:00:02 : 0 Invoice created! <br>================================================== <br>'),
(17, '2018-03-18', '================================================== <br>2018-03-18 00:00:01 : Schedule Jobs Started....... <br>2018-03-18 00:00:01 : Creating Accounting Snapshot <br>2018-03-18 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-17<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-18 00:00:01 : Creating Recurring Invoice <br>2018-03-18 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(18, '2018-03-19', '================================================== <br>2018-03-19 00:00:01 : Schedule Jobs Started....... <br>2018-03-19 00:00:01 : Creating Accounting Snapshot <br>2018-03-19 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-18<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-19 00:00:01 : Creating Recurring Invoice <br>2018-03-19 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(19, '2018-03-20', '================================================== <br>2018-03-20 00:00:01 : Schedule Jobs Started....... <br>2018-03-20 00:00:01 : Creating Accounting Snapshot <br>2018-03-20 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-19<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-20 00:00:01 : Creating Recurring Invoice <br>2018-03-20 00:00:03 : 1 Invoice created! <br>================================================== <br>'),
(20, '2018-03-21', '================================================== <br>2018-03-21 00:00:01 : Schedule Jobs Started....... <br>2018-03-21 00:00:01 : Creating Accounting Snapshot <br>2018-03-21 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-20<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-21 00:00:01 : Creating Recurring Invoice <br>2018-03-21 00:00:04 : 1 Invoice created! <br>================================================== <br>'),
(21, '2018-03-22', '================================================== <br>2018-03-22 00:00:01 : Schedule Jobs Started....... <br>2018-03-22 00:00:01 : Creating Accounting Snapshot <br>2018-03-22 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-21<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-22 00:00:01 : Creating Recurring Invoice <br>2018-03-22 00:00:01 : 0 Invoice created! <br>================================================== <br>'),
(22, '2018-03-23', '================================================== <br>2018-03-23 00:00:01 : Schedule Jobs Started....... <br>2018-03-23 00:00:01 : Creating Accounting Snapshot <br>2018-03-23 00:00:01 : Accounting Snapshot created! <br>=============== Accounting Snaphsot ==================== <br>Accounting Snaphsot - Date: 2018-03-22<br>Total Income: R$ 0,00<br>Total Expense: R$ 0,00<br>================================================== <br>2018-03-23 00:00:01 : Creating Recurring Invoice <br>2018-03-23 00:00:01 : 0 Invoice created! <br>================================================== <br>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_servers`
--

CREATE TABLE IF NOT EXISTS `sys_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `stype` varchar(50) NOT NULL,
  `apikey` mediumtext NOT NULL,
  `memo` mediumtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_staffpermissions`
--

CREATE TABLE IF NOT EXISTS `sys_staffpermissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `can_view` int(1) NOT NULL DEFAULT '0',
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_create` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tags`
--

CREATE TABLE IF NOT EXISTS `sys_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tasks`
--

CREATE TABLE IF NOT EXISTS `sys_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `status` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `oid` int(11) NOT NULL DEFAULT '0',
  `iid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `eid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `did` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `subscribers` text,
  `assigned_to` text,
  `priority` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(200) DEFAULT NULL,
  `vtoken` varchar(50) DEFAULT NULL,
  `ptoken` varchar(50) DEFAULT NULL,
  `started` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `stime` varchar(50) DEFAULT NULL,
  `dtime` varchar(50) DEFAULT NULL,
  `time_spent` varchar(50) DEFAULT NULL,
  `date_finished` date DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `finished` int(1) NOT NULL DEFAULT '0',
  `ratings` varchar(50) DEFAULT NULL,
  `rel_type` varchar(50) DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `is_public` int(1) NOT NULL DEFAULT '0',
  `billable` int(1) NOT NULL DEFAULT '0',
  `billed` int(1) NOT NULL DEFAULT '0',
  `hourly_rate` decimal(14,2) NOT NULL DEFAULT '0.00',
  `milestone` int(11) DEFAULT NULL,
  `progress` int(3) DEFAULT NULL,
  `visible_to_client` int(1) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tax`
--

CREATE TABLE IF NOT EXISTS `sys_tax` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `aid` int(11) NOT NULL,
  `bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `state_country` (`state`(32),`country`(2))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `sys_tax`
--

INSERT INTO `sys_tax` (`id`, `name`, `state`, `country`, `rate`, `aid`, `bal`) VALUES
(1, 'Sales Tax', '', '', 1.50, 0, 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_transactions`
--

CREATE TABLE IF NOT EXISTS `sys_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) NOT NULL,
  `type` enum('Income','Expense','Transfer') NOT NULL,
  `category` varchar(200) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `payer` varchar(200) NOT NULL,
  `payee` varchar(200) NOT NULL,
  `payerid` int(11) NOT NULL DEFAULT '0',
  `payeeid` int(11) NOT NULL DEFAULT '0',
  `method` varchar(200) NOT NULL,
  `ref` varchar(200) NOT NULL,
  `status` enum('Cleared','Uncleared','Reconciled','Void') NOT NULL DEFAULT 'Cleared',
  `description` mediumtext NOT NULL,
  `tags` mediumtext NOT NULL,
  `tax` decimal(18,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `dr` decimal(18,2) NOT NULL DEFAULT '0.00',
  `cr` decimal(18,2) NOT NULL DEFAULT '0.00',
  `bal` decimal(18,2) NOT NULL DEFAULT '0.00',
  `iid` int(11) NOT NULL DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT '1.0000',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `vid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `attachments` text,
  `source` varchar(200) DEFAULT NULL,
  `rid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `archived` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  `flag` int(1) NOT NULL DEFAULT '0',
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1004 ;

--
-- Extraindo dados da tabela `sys_transactions`
--

INSERT INTO `sys_transactions` (`id`, `account`, `type`, `category`, `amount`, `payer`, `payee`, `payerid`, `payeeid`, `method`, `ref`, `status`, `description`, `tags`, `tax`, `date`, `dr`, `cr`, `bal`, `iid`, `currency`, `currency_symbol`, `currency_prefix`, `currency_suffix`, `currency_rate`, `company_id`, `vid`, `aid`, `updated_at`, `updated_by`, `attachments`, `source`, `rid`, `pid`, `archived`, `trash`, `flag`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1000, 'Conta da Caixa', 'Income', '', 100.00, '', '', 0, 0, '', '', 'Cleared', 'Initial Balance', '', 0.00, '2018-03-06', 0.00, 100.00, 100.00, 0, 0, NULL, NULL, NULL, 1.0000, 0, 0, 0, '0000-00-00 00:00:00', 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(1001, 'Conta da Caixa', 'Income', 'Uncategorized', 60.00, '', '', 1000, 0, 'Paypal', '', 'Cleared', 'Fatura 1000 Pagamento', '', 0.00, '2018-03-07', 0.00, 60.00, 160.00, 1000, 0, NULL, NULL, NULL, 1.0000, 0, 0, 0, '0000-00-00 00:00:00', 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(1002, 'Conta da Caixa', 'Income', 'Selling Software', 30.00, '', '', 1000, 0, 'Cash', '', 'Cleared', 'Fatura 1002 Pagamento', '', 0.00, '2018-03-13', 0.00, 30.00, 190.00, 1002, 0, NULL, NULL, NULL, 1.0000, 0, 0, 0, '0000-00-00 00:00:00', 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(1003, 'Conta da Caixa', 'Income', 'Uncategorized', 0.00, '', '', 1000, 0, '', '', 'Cleared', 'Fatura 1002 Pagamento', '', 0.00, '2018-03-13', 0.00, 0.00, 190.00, 1002, 0, NULL, NULL, NULL, 1.0000, 0, 0, 0, '0000-00-00 00:00:00', 0, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_tt`
--

CREATE TABLE IF NOT EXISTS `sys_tt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `start` varchar(50) NOT NULL DEFAULT '0',
  `end` varchar(50) NOT NULL DEFAULT '0',
  `allday` enum('true','false') NOT NULL DEFAULT 'false',
  `url` varchar(200) NOT NULL DEFAULT '',
  `cid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sys_users`
--

CREATE TABLE IF NOT EXISTS `sys_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `fullname` varchar(45) NOT NULL DEFAULT '',
  `phonenumber` varchar(20) DEFAULT NULL,
  `password` mediumtext NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Full Access',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `last_login` datetime DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `otp` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pin_enabled` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pin` mediumtext NOT NULL,
  `img` text NOT NULL,
  `api` enum('Yes','No') DEFAULT 'No',
  `pwresetkey` varchar(100) NOT NULL,
  `keyexpire` varchar(100) NOT NULL,
  `roleid` int(11) NOT NULL DEFAULT '0',
  `role` varchar(200) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `autologin` varchar(200) DEFAULT NULL,
  `at` varchar(200) DEFAULT NULL,
  `landing_page` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `notes` text,
  `c1` text,
  `c2` text,
  `c3` text,
  `c4` text,
  `c5` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sys_users`
--

INSERT INTO `sys_users` (`id`, `username`, `fullname`, `phonenumber`, `password`, `user_type`, `status`, `last_login`, `email`, `creationdate`, `otp`, `pin_enabled`, `pin`, `img`, `api`, `pwresetkey`, `keyexpire`, `roleid`, `role`, `last_activity`, `autologin`, `at`, `landing_page`, `language`, `notes`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1, 'pjprogramacao@gmail.com', 'Jorge Martins', '', 'ibHYFYNIfPoZg', 'Admin', 'Active', '2018-03-23 00:58:28', '', '2014-10-20 01:43:07', 'No', 'No', '$1$ZW/.uF5.$.rwCeLiguoBzYzf3waOnY1', '', 'No', '', '0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wm_sysemails`
--

CREATE TABLE IF NOT EXISTS `wm_sysemails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
