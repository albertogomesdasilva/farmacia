/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : alberto

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2024-09-14 09:30:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `farmacia`
-- ----------------------------
DROP TABLE IF EXISTS `farmacia`;
CREATE TABLE `farmacia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codbarras` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `und` varchar(255) DEFAULT NULL,
  `custo` varchar(255) DEFAULT NULL,
  `preco` decimal(11,0) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `tcusto` decimal(11,0) DEFAULT NULL,
  `tvenda` decimal(11,0) DEFAULT NULL,
  `lucro` decimal(11,0) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of farmacia
-- ----------------------------
INSERT INTO `farmacia` VALUES ('1', '7770000000012', '1', 'DIVERSOS', 'ETICO', 'UN', '1', '1', '0', '0', '0', '2024-09-14', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('2', '7896094912175', '2', 'APRACUR CARTELADO LAMINADO C/06 COMP.', 'ETICO', 'UN', '5', '10', '24', '120', '240', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('3', '7896094919068', '3', 'APRACUR DUO CARTELADO C/06 COMP.', 'ETICO', 'UN', '5', '10', '4', '20', '40', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('4', '7896094922396', '4', 'NEOSALDINA C/10 COMP', 'ETICO', 'UN', '6', '12', '34', '204', '408', '100', 2024-09-14, '');
INSERT INTO `farmacia` VALUES ('5', '7891142982186', '5', 'CORISTINA D C/ 04 COMP', 'ETICO', 'UN', '5', '10', '18', '90', '180', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('6', '7896094910683', '6', 'BENEGRIPE CARTELADO C/06 COMP.', 'ETICO', 'UN', '5', '10', '0', '0', '0', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('7', '7896094922402', '7', 'NEOSALDINA C/4 COMP.', 'ETICO', 'UN', '3,5', '5', '0', '0', '0', '42', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('8', '7896016806254', '8', 'NALDECON NOITE CARTELADO C/04 COMP', 'ETICO', 'UN', '5', '10', '24', '120', '240', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('9', '7896015517083', '9', 'SONRIDOR CAF CARTELA DO C/ 4 COMP.', 'ETICO', 'UN', '6', '12', '3', '18', '36', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('10', '7895858017422', '10', 'MAGNÉSIO BISURADA CART. C/10 COMP.', 'ETICO', 'UN', '5', '8', '0', '0', '0', '60', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('11', '7896094921344', '11', 'BUSCOFEN CAIXA C/10 COMP', 'ETICO', 'UN', '13', '17', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('12', '7897316806371', '12', 'OPTIVE COLIRIO 10ML', 'ETICO', 'UN', '30', '40', '0', '0', '0', '33', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('13', '7897316806388', '13', 'OPTIVE COLIRIO 15ML', 'ETICO', 'UN', '30', '45', '0', '0', '0', '50', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('14', '7896016808302', '14', 'LUFITAL 30ML ADULTO', 'ETICO', 'UN', '22', '29', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('15', '7898962943144', '15', 'LUFTAL 30ML INFANTIL', 'ETICO', 'UN', '22', '29', '2', '44', '59', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('16', '7898040329587', '16', 'FLORATIL C/06 FLACONETES', 'ETICO', 'UN', '22', '29', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('17', '7898040329624', '17', 'FLORATIL C/10 FLACONETES', 'ETICO', 'UN', '22', '33', '0', '0', '0', '50', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('18', '78911239', '18', 'VICK INALADOR', 'ETICO', 'UN', '7', '12', '0', '0', '0', '71', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('19', '7896658028205', '19', 'COLIDIS', 'ETICO', 'UN', '0', '70', '1', '0', '70', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('20', '7896227800041', '20', 'SALOMPAS SPRAY', 'ETICO', 'UN', '22', '29', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('21', '7891317014162', '21', 'ATAK CLAV (AMOX 875MG + CLAV 235MG)', 'ETICO', 'UN', '57,87', '78', '3', '173', '234', '34', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('22', '7896015525804', '22', 'COREGA CREME 70G', 'ETICO', 'UN', '45', '55', '4', '180', '220', '22', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('23', '7896261018303', '23', 'CATAFLAM ESPOTE 60G SPRAY', 'ETICO', 'UN', '22', '29', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('24', '7770000000241', '24', 'INFINITY 12 02', 'ETICO', 'UN', '12', '20', '2', '24', '40', '66', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('25', '7891317014186', '25', 'ATAK CLAV (AMOX 400 + CLAV 57MG) LIQUIDA', 'ETICO', 'UN', '34,88', '50', '3', '104', '150', '43', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('26', '7896548197738', '26', 'COLIRIO SYSTANE 10ML', 'ETICO', 'UN', '25', '35', '0', '0', '0', '40', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('27', '3662042000058', '27', 'COLIRIO HYABAK 10ML 300GTS', 'ETICO', 'UN', '25', '33', '0', '0', '0', '35', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('28', '78911222', '28', 'VICK 12G', 'ETICO', 'UN', '7', '12', '0', '0', '0', '71', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('29', '7898962943045', '29', 'NALDECON MULTI', 'ETICO', 'UN', '5', '10', '2', '10', '20', '100', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('30', '7899655506783', '30', 'GEL NOCAUTEADOR DOKMOS', 'NATURAL', 'UN', '15,7', '20', '35', '549', '700', '27', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('31', '7896658001918', '31', 'DECONGEX PLUS ADULTO E PED 120ML', 'ETICO', 'UN', '15', '20', '14', '210', '280', '33', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('32', '7908020502517', '32', 'ALGESTONA (ANTICONCEPICIONAL)', 'ETICO', 'UN', '7,5', '12', '34', '255', '408', '60', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('33', '7898148291298', '33', 'METFORMINA 850MG C/COMP', 'GENERICO', 'UN', '3,8', '5', '18', '68', '99', '44', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('34', '7897947612808', '34', 'LACTOLINEA AMEIXA', 'GENERICO', 'UN', '8,98', '9', '20', '179', '197', '10', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('35', '7896523207643', '35', 'AMBROXOL PEDIATRICO', 'GENERICO', 'UN', '5,79', '6', '16', '92', '111', '20', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('36', '7896523201887', '36', 'DIPIRONA 1G (GENERICA CIMED)', 'GENERICO', 'UN', '5,19', '6', '13', '67', '87', '30', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('37', '7897947616325', '37', 'ACEVITON 1G', 'GENERICO', 'UN', '0', '4', '7', '0', '34', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('38', '7891800802856', '38', 'ESPARADRAPO 10MX4,5M', 'HOSPITALAR', 'UN', '8', '12', '26', '208', '312', '50', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('39', '7897947615397', '39', 'DERMAFEME FRESH KIT C/02', 'HB', 'UN', '0', '12', '10', '0', '129', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('40', '7897947604384', '40', 'DERMAFEME FLORA KIT C/02', 'HB', 'UN', '0', '12', '9', '0', '116', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('41', '7897947601185', '41', 'PROTETOR SOLAR ACNEZIL FPS 30', 'HB', 'UN', '20,94', '35', '12', '251', '420', '67', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('42', '7896523228419', '42', 'PRAALERGIA 120MG (FEXOFENADINA)', 'ETICO', 'UN', '0', '9', '5', '0', '49', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('43', '7896523228426', '43', 'PRAALERGIA 180MG', 'GENERICO', 'UN', '0', '9', '4', '0', '39', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('44', '7770000000449', '44', 'TOALHA BEBE LIMPINHO C/90 (PREMIUM C/FLAP)', 'HB', 'UN', '2,5', '4', '0', '0', '0', '99', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('45', '7898994747512', '45', 'TOALHA SNOW BABY C/90 (AZUL BB)', 'HB', 'UN', '3,34', '6', '30', '100', '200', '99', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('46', '7898994747536', '46', 'TOALHA SNOW BABY C/90 (AZUL FORTE)', 'HB', 'UN', '3,34', '6', '8', '26', '53', '99', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('47', '7898994747574', '47', 'TOALHA SNOW BABY C/80 (ROSA)', 'HB', 'UN', '3,94', '7', '0', '0', '0', '99', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('48', '7898994747550', '48', 'TOALHA SNOW BABY HIDRATAÇÃO INTENSA C/9', 'HB', 'UN', '3,94', '6', '26', '102', '173', '69', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('49', '7897947617506', '49', 'CARMED ROSA GLITTER', 'ETICO', 'UN', '7,49', '12', '68', '509', '816', '60', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('50', '7891058020941', '50', 'DORFLEX CARTELA C/10 COMP', 'ETICO', 'UN', '4,82', '6', '0', '0', '0', '24', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('51', '7897947616509', '51', 'LAVITAN HOMEN (SUPER FORMULA)', 'VITAMINA', 'UN', '25,89', '30', '2', '51', '60', '15', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('52', '7770000000524', '52', '7897947617483', 'GENERICO', 'UN', '15,99', '22', '2', '31', '44', '37', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('53', '7899785200490', '53', 'AMBROXIMEL SPRAY EUCALIPTO', 'GENERICO', 'UN', '0', '70', '5', '0', '350', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('54', '7897947601383', '54', 'LAVITAN MULT C POWER EFERV.', 'VITAMINA', 'UN', '11,69', '15', '3', '35', '45', '28', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('55', '7897947601611', '55', 'LAVITAN ARGININA 10COMP EFERV', 'VITAMINA', 'UN', '11,69', '15', '2', '23', '30', '28', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('56', '7770000000562', '56', 'INFINITY 12 01', 'GERAL', 'UN', '20', '25', '0', '0', '0', '25', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('57', '7897947617803', '57', 'CARMED DOCE DE LEITE', 'GERAL', 'UN', '0', '14', '38', '0', '569', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('58', '7897947617476', '58', 'CARMED BEIJINHO DE COCO', 'GERAL', 'UN', '0', '14', '107', '0', '1603', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('59', '7897947617940', '59', 'CARMED BRIGADEIRO', 'GERAL', 'UN', '0', '14', '16', '0', '239', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('60', '7891058016999', '60', 'ENTEROGERMINA CRIANÇA E ADULTO C/05 FRA', 'GERAL', 'UN', '22', '35', '5', '110', '175', '59', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('61', '7897947617483', '61', 'RESSALIV 48 FLACONETES', 'GENERICO', 'UN', '15,99', '22', '22', '351', '484', '37', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('62', '7896523201504', '62', 'FIGMED 200MG', 'GENERICO', 'UN', '0', '27', '46', '0', '1242', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('63', '7770000000630', '63', 'AMBROXIMEL SPRAY GENGIBRE', 'GENERICO', 'UN', '0', '70', '12', '0', '840', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('64', '7896523219646', '64', 'FRUSALT COM 60 ENVELOPES', 'GENERICO', 'UN', '0', '40', '2', '0', '80', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('65', '7896523208770', '65', 'FLUCONAZOL 150MG', 'GENERICO', 'UN', '1,49', '1', '260', '387', '514', '32', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('66', '7898075310314', '66', 'DORFEBRIL (DIPIRONA GOTAS)', 'GENERICO', 'UN', '0', '2', '20', '0', '50', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('67', '7896523206479', '67', 'GINKOMED 80MG', 'GENERICO', 'UN', '0', '14', '6', '0', '89', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('68', '7896523214092', '68', 'DICLOFENACO POTÁSSICO 50MG', 'GENERICO', 'UN', '0', '2', '60', '0', '134', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('69', '7896523226750', '69', 'ROSUVASTATINA CÁLCICA 10MG', 'GENERICO', 'UN', '0', '5', '0', '0', '0', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('70', '7896523201320', '70', 'PRALÍVIO IBUPROFENO 400MG', 'GENERICO', 'UN', '0', '6', '8', '0', '55', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('71', '7896523227450', '71', 'TADALAFILA 5MG', 'GENERICO', 'UN', '0', '7', '14', '0', '111', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('72', '7896523227528', '72', 'CARVEDILOL 12,5MG', 'GENERICO', 'UN', '0', '5', '1', '0', '5', '0', '2024-09-14', '');
INSERT INTO `farmacia` VALUES ('73', '7896523227184', '73', 'OMEPRAZOL 20MG', 'GENERICO', 'UN', '0', '3', '1', '0', '3', '0', '2024-09-14', '');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Alberto Gomes da Silva', 'albertogomesdasilva@gmail.com', '$2y$10$7G9JP6TOa2ipHhP6g9EXDO7aGnX5.oKfhH74LYWxMAPzBPMy3pch2', '0');
INSERT INTO `users` VALUES ('2', 'Admin', 'admin@gmail.com', '$2y$10$ofcSY8BYGdSQbElzBTS2uuLBnGsPwZP2dLyhj5jrJGZBAMhjPEsRm', '1');
