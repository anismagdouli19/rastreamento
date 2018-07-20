-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 17/09/2016 às 12h38min
-- Versão do Servidor: 5.5.40
-- Versão do PHP: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tracker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alertas`
--

CREATE TABLE IF NOT EXISTS `alertas` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `imei` varchar(20) NOT NULL,
  `mensagem` varchar(60) NOT NULL,
  `data` int(11) NOT NULL,
  `viewed_adm` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_alerta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bem`
--

CREATE TABLE IF NOT EXISTS `bem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imei` varchar(17) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `identificacao` varchar(20) DEFAULT NULL,
  `cliente` int(11) unsigned DEFAULT NULL,
  `activated` char(1) NOT NULL DEFAULT 'S',
  `modo_operacao` varchar(4) NOT NULL DEFAULT 'GPRS' COMMENT 'Indica o modo atual',
  `porta` int(5) DEFAULT NULL,
  `liberado` char(1) NOT NULL DEFAULT 'N' COMMENT 'Indica se esta liberado para rastrear',
  `status_sinal` char(1) DEFAULT 'D' COMMENT 'Indica o status do aparelho. R=rastreando;S=sem sinal gps;D=desligado',
  `cor_grafico` char(6) DEFAULT NULL COMMENT 'Indica a cor no grafico de estatistica',
  `id_admin` int(10) unsigned NOT NULL DEFAULT '0',
  `tipo` varchar(20) NOT NULL,
  `movimento` varchar(1) NOT NULL DEFAULT 'N',
  `hodometro` int(11) NOT NULL DEFAULT '0',
  `hod_dtalter` date NOT NULL,
  `envia_sms` char(1) DEFAULT 'N',
  `modelo` varchar(30) DEFAULT NULL,
  `alerta_hodometro` int(11) NOT NULL DEFAULT '0',
  `alerta_hodometro_saldo` int(11) NOT NULL DEFAULT '0',
  `marca` varchar(30) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `operadora` varchar(15) DEFAULT NULL,
  `dt_recarga` varchar(10) DEFAULT NULL,
  `cidade` varchar(60) NOT NULL,
  `ligado` varchar(1) DEFAULT 'N',
  `responsible` varchar(255) DEFAULT NULL,
  `bloqueado` char(1) DEFAULT 'N',
  `modelo_rastreador` varchar(20) DEFAULT 'tk',
  `serial_tracker` int(11) DEFAULT NULL COMMENT 'Serial do rastreador gt06',
  `apelido` varchar(30) DEFAULT NULL,
  `limite_velocidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imei` (`imei`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(30) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_inativacao` date DEFAULT NULL,
  `observacao` text,
  `master` char(1) NOT NULL DEFAULT 'N' COMMENT 'Indica se eh gerenciador do sistema',
  `admin` char(1) NOT NULL DEFAULT 'N',
  `representante` char(1) DEFAULT 'N' COMMENT 'O usuário é representante de vendas?',
  `id_admin` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Informa o administrador do cliente',
  `celular` varchar(15) DEFAULT NULL,
  `dt_ultm_sms` datetime DEFAULT NULL,
  `envia_sms` char(1) DEFAULT 'N',
  `sms_acada` int(11) DEFAULT '60',
  `cpf` varchar(14) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `tipo_plano` varchar(15) DEFAULT NULL,
  `telefone1` varchar(15) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  `data_contrato` date DEFAULT NULL,
  `configuracoes` text,
  `dia_vencimento` int(11) DEFAULT NULL,
  `tipo_pessoa` char(1) NOT NULL COMMENT 'F - Física ou J - Jurídica',
  `rg` varchar(15) NOT NULL,
  `nacionalidade` varchar(25) NOT NULL,
  `valor_adesao` decimal(7,2) NOT NULL,
  `valor_mensalidade` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email_unq` (`email`),
  UNIQUE KEY `apelido_unq` (`apelido`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `imei` varchar(17) NOT NULL,
  `command` varchar(45) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`imei`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Guarda os comandos que ser�o enviados ao gps';

-- --------------------------------------------------------

--
-- Estrutura da tabela `geo_distance`
--

CREATE TABLE IF NOT EXISTS `geo_distance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bem` int(11) NOT NULL,
  `latitudeDecimalDegrees` varchar(12) NOT NULL,
  `latitudeHemisphere` char(1) NOT NULL,
  `longitudeDecimalDegrees` varchar(12) NOT NULL,
  `longitudeHemisphere` char(1) NOT NULL,
  `tipo` char(1) NOT NULL,
  `parou` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bem` (`bem`,`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda o inicio e fim do trajeto para que possa ser calculada a distancia' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `geo_fence`
--

CREATE TABLE IF NOT EXISTS `geo_fence` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `imei` varchar(17) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dt_incao` varchar(20) NOT NULL,
  `dt_altao` varchar(20) NOT NULL,
  `coordenadas` text NOT NULL,
  `tipoEnvio` char(1) NOT NULL,
  `disp` varchar(1) NOT NULL,
  `tipoAcao` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gprmc`
--

CREATE TABLE IF NOT EXISTS `gprmc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imei` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `satelliteFixStatus` char(1) NOT NULL,
  `latitudeDecimalDegrees` varchar(12) NOT NULL,
  `latitudeHemisphere` char(1) NOT NULL,
  `longitudeDecimalDegrees` varchar(12) NOT NULL,
  `longitudeHemisphere` char(1) NOT NULL,
  `speed` float NOT NULL,
  `gpsSignalIndicator` char(1) NOT NULL,
  `infotext` text,
  `address` text,
  `km_rodado` float(12,5) NOT NULL DEFAULT '0.00000',
  `converte` int(11) DEFAULT '0',
  `ligado` char(1) NOT NULL DEFAULT 'N',
  `voltagem_bateria` char(1) DEFAULT NULL,
  `carregamento` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imei` (`imei`),
  KEY `signalIndicator` (`gpsSignalIndicator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL,
  `cliente` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome` (`nome`),
  KEY `cliente` (`cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda os grupos dos clientes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_bem`
--

CREATE TABLE IF NOT EXISTS `grupo_bem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bem` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `imei` varchar(20) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unq_bem` (`bem`,`grupo`),
  KEY `bem` (`bem`),
  KEY `cliente` (`cliente`),
  KEY `imei` (`imei`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guarda os bens dos grupos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loc_atual`
--

CREATE TABLE IF NOT EXISTS `loc_atual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imei` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `satelliteFixStatus` char(1) NOT NULL,
  `latitudeDecimalDegrees` varchar(12) NOT NULL,
  `latitudeHemisphere` char(1) NOT NULL,
  `longitudeDecimalDegrees` varchar(12) NOT NULL,
  `longitudeHemisphere` char(1) NOT NULL,
  `coordenada_antiga` varchar(25) DEFAULT '0|0' COMMENT 'Guarda a latitude e longitude anterior a posição atual',
  `speed` float NOT NULL,
  `gpsSignalIndicator` char(1) NOT NULL,
  `infotext` text,
  `address` text,
  `converte` int(11) DEFAULT '0',
  `ligado` char(1) DEFAULT 'N',
  `voltagem_bateria` char(1) DEFAULT NULL,
  `carregamento` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imei` (`imei`),
  KEY `signalIndicator` (`gpsSignalIndicator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE IF NOT EXISTS `motoristas` (
  `id_motorista` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `horario_servico` varchar(200) NOT NULL,
  `cnh` varchar(60) NOT NULL,
  `categoria_cnh` varchar(5) NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`id_motorista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preferencias`
--

CREATE TABLE IF NOT EXISTS `preferencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras`
--

CREATE TABLE IF NOT EXISTS `regras` (
  `id_regra` int(11) NOT NULL AUTO_INCREMENT,
  `id_cerca` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `motoristas` varchar(255) NOT NULL,
  `veiculos` varchar(255) NOT NULL,
  `horario` varchar(60) NOT NULL,
  `dias` varchar(60) NOT NULL,
  `validade` varchar(30) NOT NULL,
  `condicao` varchar(30) NOT NULL,
  `emails` varchar(255) NOT NULL,
  PRIMARY KEY (`id_regra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `admin` char(1) NOT NULL DEFAULT 'N',
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `nome` varchar(50) DEFAULT NULL,
  `apelido` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `tipo_pessoa` char(1) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `adesao` decimal(7,2) DEFAULT NULL,
  `mensalidade` decimal(7,2) DEFAULT NULL,
  `data_contrato` int(11) DEFAULT NULL,
  `data_vencimento` int(2) DEFAULT NULL,
  `data_inativacao` int(11) DEFAULT NULL,
  `data_renovacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=424 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `admin`, `ativo`, `nome`, `apelido`, `senha`, `email`, `endereco`, `telefone`, `celular`, `tipo_pessoa`, `cpf_cnpj`, `adesao`, `mensalidade`, `data_contrato`, `data_vencimento`, `data_inativacao`, `data_renovacao`) VALUES
(1, 'S', 'S', 'Grupo CNS', 'rafacns', '$2y$10$LLcQxZib5zXg1K9xFKIh8uPZtV6W1P.ibk4wgqR6p2qShKlWBOVSu', 'adm@Sua Empresa.com.br', 'Avenida Dom Pedro I, 861', '(11) 4053-2700', NULL, 'J', '14.993.993/0001-54', 0.00, 0.00, NULL, NULL, NULL, 0),
(422, 'N', 'S', 'Interpower Sistemas de Energia LTDA.', 'inter123', '$2y$10$U5drlOCaBarX3JxsY7CYluesaWHMmXWMs6A7RPIm/olqG/rLOQW5y', 'fausto.ferrari@interpower.com.br', 'Avenida Dom Pedro I, 861', '(11) 4053-2700', '(11) 98381-7477', 'J', '02.666.249/0001-66', 500.00, 500.00, 1418659200, 10, 1461267051, 1461267229);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculos`
--

CREATE TABLE IF NOT EXISTS `vinculos` (
  `id_vinculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_motorista` int(11) NOT NULL,
  `id_bem` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `dataVinculo` int(11) NOT NULL,
  PRIMARY KEY (`id_vinculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
