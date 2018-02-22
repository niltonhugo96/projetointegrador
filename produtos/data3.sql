SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tanajura_info
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tanajura_info` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tanajura_info` ;

-- -----------------------------------------------------
-- Table `tanajura_info`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`marca` (
  `idmarca` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `site` VARCHAR(300) NULL COMMENT 'Site da marca',
  PRIMARY KEY (`idmarca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`produtos` (
  `idprodutos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NOT NULL,
  `foto` VARCHAR(300) NULL,
  `valor` VARCHAR(45) NOT NULL,
  `marca_idmarca` INT NOT NULL,
  `modelo` VARCHAR(45) NULL,
  PRIMARY KEY (`idprodutos`),
  INDEX `fk_produtos_marca_idx` (`marca_idmarca` ASC),
  CONSTRAINT `fk_produtos_marca`
    FOREIGN KEY (`marca_idmarca`)
    REFERENCES `tanajura_info`.`marca` (`idmarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(32) NOT NULL,
  `cep` DECIMAL(10) NOT NULL,
  `endereco` VARCHAR(45) NULL,
  `complemento` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`vendas` (
  `idvendas` INT NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` INT NOT NULL,
  `data_venda` DATE NOT NULL COMMENT 'Data da Venda',
  PRIMARY KEY (`idvendas`),
  INDEX `fk_vendas_cliente1_idx` (`cliente_idcliente` ASC),
  CONSTRAINT `fk_vendas_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `tanajura_info`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`regiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`regiao` (
  `idregiao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idregiao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `regiao_idregiao` INT NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  INDEX `fk_funcionario_regiao1_idx` (`regiao_idregiao` ASC),
  CONSTRAINT `fk_funcionario_regiao1`
    FOREIGN KEY (`regiao_idregiao`)
    REFERENCES `tanajura_info`.`regiao` (`idregiao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`servico` (
  `idservico` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NULL,
  `regiao` VARCHAR(45) NULL COMMENT 'Região de atendimento',
  `funcionario_idfuncionario` INT NOT NULL,
  PRIMARY KEY (`idservico`),
  INDEX `fk_servico_funcionario1_idx` (`funcionario_idfuncionario` ASC),
  CONSTRAINT `fk_servico_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `tanajura_info`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`ordem_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`ordem_servico` (
  `idordem_servico` INT NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` INT NOT NULL,
  `funcionario_idfuncionario` INT NOT NULL,
  PRIMARY KEY (`idordem_servico`),
  INDEX `fk_ordem_servico_cliente1_idx` (`cliente_idcliente` ASC),
  INDEX `fk_ordem_servico_funcionario1_idx` (`funcionario_idfuncionario` ASC),
  CONSTRAINT `fk_ordem_servico_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `tanajura_info`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ordem_servico_funcionario1`
    FOREIGN KEY (`funcionario_idfuncionario`)
    REFERENCES `tanajura_info`.`funcionario` (`idfuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`item_ordem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`item_ordem` (
  `iditem_ordem` INT NOT NULL AUTO_INCREMENT,
  `servico_idservico` INT NOT NULL,
  `ordem_servico_idordem_servico` INT NOT NULL,
  PRIMARY KEY (`iditem_ordem`),
  INDEX `fk_item_ordem_servico1_idx` (`servico_idservico` ASC),
  INDEX `fk_item_ordem_ordem_servico1_idx` (`ordem_servico_idordem_servico` ASC),
  CONSTRAINT `fk_item_ordem_servico1`
    FOREIGN KEY (`servico_idservico`)
    REFERENCES `tanajura_info`.`servico` (`idservico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_ordem_ordem_servico1`
    FOREIGN KEY (`ordem_servico_idordem_servico`)
    REFERENCES `tanajura_info`.`ordem_servico` (`idordem_servico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tanajura_info`.`produtos_has_vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tanajura_info`.`produtos_has_vendas` (
  `produtos_idprodutos` INT NOT NULL,
  `vendas_idvendas` INT NOT NULL,
  `quantidade` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`produtos_idprodutos`, `vendas_idvendas`),
  INDEX `fk_produtos_has_vendas_vendas1_idx` (`vendas_idvendas` ASC),
  INDEX `fk_produtos_has_vendas_produtos1_idx` (`produtos_idprodutos` ASC),
  CONSTRAINT `fk_produtos_has_vendas_produtos1`
    FOREIGN KEY (`produtos_idprodutos`)
    REFERENCES `tanajura_info`.`produtos` (`idprodutos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_vendas_vendas1`
    FOREIGN KEY (`vendas_idvendas`)
    REFERENCES `tanajura_info`.`vendas` (`idvendas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;