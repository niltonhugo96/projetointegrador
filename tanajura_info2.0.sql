-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Fev-2018 às 01:14
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tanajura_info`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `cep` decimal(10,0) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `telefone`, `email`, `senha`, `cep`, `endereco`, `complemento`) VALUES
(1, 'Pedro argulino', '(21)44546996', 'Pedraoaoao@hotmail.com', '774774', '21250190', 'Rua pereira batista', 'NÂ°: 7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `regiao_idregiao` int(11) NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `fk_funcionario_regiao1_idx` (`regiao_idregiao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `senha`, `cpf`, `regiao_idregiao`) VALUES
(3, 'marcos', '698dc19d489c4e4db73e28a713eab07b', '12365478998', 1),
(6, 'Flamengoa', 'poste', '987456321', 1),
(7, 'Flamengoa', 'poste', '987456321', 4),
(12, 'Flamengoa 23', '6565655', '76767676', 5),
(13, 'fabricio', '000000000000999999999', '6656563737373', 8),
(14, 'felipe', '78787878', '42424242', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_ordem`
--

CREATE TABLE IF NOT EXISTS `item_ordem` (
  `iditem_ordem` int(11) NOT NULL AUTO_INCREMENT,
  `servico_idservico` int(11) NOT NULL,
  `ordem_servico_idordem_servico` int(11) NOT NULL,
  PRIMARY KEY (`iditem_ordem`),
  KEY `fk_item_ordem_servico1_idx` (`servico_idservico`),
  KEY `fk_item_ordem_ordem_servico1_idx` (`ordem_servico_idordem_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `site` varchar(300) DEFAULT NULL COMMENT 'Site da marca',
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idmarca`, `nome`, `site`) VALUES
(2, 'Phillips', 'https://www.philips.com.br/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_servico`
--

CREATE TABLE IF NOT EXISTS `ordem_servico` (
  `idordem_servico` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` int(11) NOT NULL,
  `funcionario_idfuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idordem_servico`),
  KEY `fk_ordem_servico_cliente1_idx` (`cliente_idcliente`),
  KEY `fk_ordem_servico_funcionario1_idx` (`funcionario_idfuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `valor` varchar(45) NOT NULL,
  `marca_idmarca` int(11) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idprodutos`),
  KEY `fk_produtos_marca_idx` (`marca_idmarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprodutos`, `nome`, `foto`, `valor`, `marca_idmarca`, `modelo`) VALUES
(1, 'tv', 'https://a-static.mlcdn.com.br/618x463/smart-tv-led-32-samsung-un32j4300-conversor-digital-wi-fi-2-hdmi-1-usb/magazineluiza/193365700/19991cfaea3d86d85500c691ebf0146b.jpg', 'R$ 1999,99', 2, 'un32j4300');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_has_vendas`
--

CREATE TABLE IF NOT EXISTS `produtos_has_vendas` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_idprodutos` int(11) NOT NULL,
  `vendas_idvendas` int(11) NOT NULL,
  `quantidade` decimal(10,0) NOT NULL,
  PRIMARY KEY (`iditem`,`produtos_idprodutos`,`vendas_idvendas`),
  KEY `fk_produtos_has_vendas_vendas1_idx` (`vendas_idvendas`),
  KEY `fk_produtos_has_vendas_produtos1_idx` (`produtos_idprodutos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE IF NOT EXISTS `regiao` (
  `idregiao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idregiao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`idregiao`, `nome`) VALUES
(1, 'Duque de Caxias'),
(2, 'São João'),
(3, 'Niterói'),
(4, 'Petrópolis'),
(5, 'Magé'),
(6, 'Belford Roxo'),
(7, 'Rio de Janeiro'),
(8, 'Copacabana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `idservico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `regiao` varchar(45) DEFAULT NULL COMMENT 'Região de atendimento',
  `funcionario_idfuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idservico`),
  KEY `fk_servico_funcionario1_idx` (`funcionario_idfuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `idvendas` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` int(11) NOT NULL,
  `data_venda` date NOT NULL COMMENT 'Data da Venda',
  PRIMARY KEY (`idvendas`),
  KEY `fk_vendas_cliente1_idx` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `cliente_idcliente`, `data_venda`) VALUES
(1, 1, '2018-02-27');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_regiao1` FOREIGN KEY (`regiao_idregiao`) REFERENCES `regiao` (`idregiao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_ordem`
--
ALTER TABLE `item_ordem`
  ADD CONSTRAINT `fk_item_ordem_ordem_servico1` FOREIGN KEY (`ordem_servico_idordem_servico`) REFERENCES `ordem_servico` (`idordem_servico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_ordem_servico1` FOREIGN KEY (`servico_idservico`) REFERENCES `servico` (`idservico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `fk_ordem_servico_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordem_servico_funcionario1` FOREIGN KEY (`funcionario_idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_marca` FOREIGN KEY (`marca_idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_has_vendas`
--
ALTER TABLE `produtos_has_vendas`
  ADD CONSTRAINT `fk_produtos_has_vendas_produtos1` FOREIGN KEY (`produtos_idprodutos`) REFERENCES `produtos` (`idprodutos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_has_vendas_vendas1` FOREIGN KEY (`vendas_idvendas`) REFERENCES `vendas` (`idvendas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk_servico_funcionario1` FOREIGN KEY (`funcionario_idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
