-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Mar-2018 às 00:35
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `telefone`, `email`, `senha`, `cep`, `endereco`, `complemento`) VALUES
(1, 'Augusto moreira junior', '55+0(21)44550044', 'Augustomj@gmail.com', '7a68f09bd992671bb3b19a5e70b7827e', '11220555', 'av. piracicaba', 'numero 10'),
(2, 'Marcos', '(21)4455-6698', 'Marcos@gmail.com', '8b4cf0258846b23e0a8272bee22c38dd', '21548', 'Rua washintow brodis', 'casa 3'),
(3, 'pouleta junior', '(21)55667799', 'pouletajr@gmail.com', '202cb962ac59075b964b07152d234b70', '75757579', 'Rua jurandireba', 'casa 500'),
(4, 'João sem braço', '(21)33221144', 'remelecho@gol.com.br', '9efe340548dbe616cc923eb79e55dcf5', '9999654', 'Av. quintas dos infernos', 'numero 15'),
(5, 'Mauricio alencar', '(21)36969669', 'mauricinhodazueira@hotmail.com', '7f46da87c29df94332a16c7f1c18839d', '35769789', 'Rua alisto j.pinto', 'Apartamento 20');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `senha`, `cpf`, `regiao_idregiao`) VALUES
(1, 'jurandi', '698dc19d489c4e4db73e28a713eab07b', '12345698798', 1),
(3, 'budomiro', '5496242448f7e842444583a371d75a48', '123455988632', 2),
(4, 'marcos', '0e3776b173fe81df50814728faca8fe0', '16151627744848', 3),
(5, 'augusta', '250cf8b51c773f3f8dc8b4be867a9a02', '6868686868686', 1),
(6, 'JoÃ£o bafomÃ©', 'd484ec2f63752a4ade14fe2f970b35d4', '456987123654', 5),
(7, 'Junior de manguaratiba', 'b8044fb0846c6a4641b83c9295cee4e5', '321159951357', 4),
(8, 'Alice espoleta', '89b6ee94b2b2d8e43a8e469a27c02bd3', '98745369321', 10),
(9, 'Amanda quemanda', '8bbd928920870b3957b580ad14206c9e', '369874123', 6),
(10, 'Fabricio d''almeida frescura', 'bd2fd67726f2f862810a17fbeb2d6c31', '15874563214', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `site` varchar(300) DEFAULT NULL COMMENT 'Site da marca',
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idmarca`, `nome`, `site`) VALUES
(2, 'LG', 'https://www.lg.com.br'),
(3, 'samsung', 'https://www.samsung.com.br'),
(4, 'Hitachi', 'https://www.Hitachi.com.br'),
(5, 'HP', 'https://www.HP.com.br'),
(6, 'Nokia', 'https://www.Nokia.com.br'),
(7, 'Kingston', 'https://www.Kingston.com.br'),
(8, 'GE Lighting', 'https://www.GELighting.com.br'),
(9, 'Sony', ' https://www.sony.com.br'),
(10, 'Aoc', 'https://www.aoc.com.br'),
(11, 'Motorola', 'https://www.motorola.com.br'),
(12, 'Nvidia', 'https://www.Nvidia.com.br');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprodutos`, `nome`, `foto`, `valor`, `marca_idmarca`, `modelo`) VALUES
(1, 'Notebook Intel Core i5 12GB RAM 1TB HD 15.6', 'https://br-store.acer.com/Assets/Produtos/SuperZoom/ES1-572-5959.jpg', 'R$ 2.599 ,00', 2, 'ES1-572-5959'),
(2, 'Smart TV LED 43" Full HD com Conversor Digital Wi-Fi integrado 1 USB 2 HDMI Com Webos 3.5 Sistema de Som Virtual Surround Plus', 'https://images-submarino.b2w.io/produtos/01/00/item/132126/4/132126406_1GG.png', '1.699,99', 2, '43lj5500'),
(3, 'Smartphone Motorola Tela 5.2" Touch Android 7.1.1 Noug', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcQmoTGslkV5BsF864s5zPD8djsVcDs4dzgWpQ5HsOg2pBwRRNS_9H9iHuUkQgU8OpgkGzvnH4yozw&usqp=CAY', 'R$ 773', 11, 'Moto G5s Xt1792'),
(4, 'Samsung Galaxy J7 Prime Dourado, com Tela de 5,5, 4G, 32 GB e CÃ¢mera de 13 MP Dourado, Bivolt', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTt8OLFkPzpO28pQq3J3c17dBEvoHCx_9cr0wXN7hQnKIvmHuzH&usqp=CAY', 'R$ 870', 3, '- SM-G610MWDEZTO'),
(5, 'LG NOVO - 32 GB - Ouro - GSM', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTUYBOGVKDAb-vErxavyyYvgFKDNYiQQJbN0rR3t6HumiqCmao&usqp=CAY', 'R$ 629', 2, 'K10'),
(6, 'Smart TV Samsung LED HD 32? com Modo Futebol e Wi-Fi', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRH_umXRnLBS8EePwmUj9vVnFR9DkZzpw2wv5IzX-soHghEyWw&usqp=CAY', 'R$ 1.080', 3, 'UN32J4300AGXZD'),
(7, 'Philco - Remoto padrÃ£o 39" - 720p', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcReE7-sc4TxRsMXlPnqtT8KHpY5XDIk46boyNOBkLpEg_IUR8Ym&usqp=CAY', 'R$ 1.200', 4, 'PH39N86DSGW'),
(8, 'Gigabyte GeForce GTX 1080 Ti Gaming OC 11G Placa grÃ¡fica - 11 - 352-bit - 1544 MHz', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSQjzoX_OOKPIoNKfCzVpfefAWJfvnX2O_-el0WCVVwosSLYQcY&usqp=CAY', 'R$ 4.000', 12, ' GB GDDR5X'),
(9, 'GALAXY GeForce GTX 1060 OC Placa grÃ¡fica - 3 GB GDDR5 - 192-bit - 1518 MHz', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRH8T-d9mbAJACaJlYGpLfHaai3-oZ5SPP3SyL0crpanr4vWCA&usqp=CAY', 'R$ 1.126', 12, 'GTX 1060'),
(10, 'Monitor LG LED 25 Class 219 UltraWide IPS', 'https://images2.kabum.com.br/produtos/fotos/77902/77902_index_gg.jpg', 'R$ 699,90', 2, 'FHD 25UM58 P');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `produtos_has_vendas`
--

INSERT INTO `produtos_has_vendas` (`iditem`, `produtos_idprodutos`, `vendas_idvendas`, `quantidade`) VALUES
(1, 1, 3, '1'),
(2, 1, 4, '2'),
(3, 2, 6, '9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE IF NOT EXISTS `regiao` (
  `idregiao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idregiao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`idregiao`, `nome`) VALUES
(1, 'Rio de Janeiro'),
(2, 'Duque de Caxias'),
(3, 'Centro'),
(4, 'Magé'),
(5, 'Belford Roxo'),
(6, 'Niterói'),
(7, 'Teresópolis'),
(8, 'Rio das Ostras'),
(9, 'Nilópolis'),
(10, 'Queimados');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idvendas`, `cliente_idcliente`, `data_venda`) VALUES
(3, 1, '2018-02-10'),
(4, 1, '2018-02-11'),
(6, 2, '2018-03-01');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_regiao1` FOREIGN KEY (`regiao_idregiao`) REFERENCES `regiao` (`idregiao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
