/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : farmacia

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2024-09-13 20:20:47
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
  `custo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `preco` decimal(11,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `tcusto` decimal(11,2) DEFAULT NULL,
  `tvenda` decimal(11,2) DEFAULT NULL,
  `lucro` float(11,2) DEFAULT NULL,
  `lote` int DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `arquivo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of farmacia
-- ----------------------------
INSERT INTO `farmacia` VALUES ('6', '7896094910683', '6', 'NOVO BENEGRIPE CARTELADO C/06 COMP.', 'CIMED', 'UN', '5', '22.00', '22', '0.00', '0.00', '100.00', null, '2026-07-22', null);
INSERT INTO `farmacia` VALUES ('7', '7896094922402', '7', 'NEOSALDINA C/4 COMP.', 'ETICO', 'UN', '3,5', '5.00', '0', '0.00', '0.00', '42.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('8', '7896016806254', '8', 'NALDECON NOITE CARTELADO C/04 COMP', 'ETICO', 'UN', '5', '10.00', '24', '120.00', '240.00', '100.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('9', '7896015517083', '9', 'SONRIDOR CAF CARTELA DO C/ 4 COMP.', 'ETICO', 'UN', '6', '12.00', '3', '18.00', '36.00', '100.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('10', '7895858017422', '10', 'MAGNÉSIO BISURADA CART. C/10 COMP.', 'ETICO', 'UN', '5', '8.00', '0', '0.00', '0.00', '60.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('11', '7896094921344', '11', 'BUSCOFEN CAIXA C/10 COMP', 'ETICO', 'UN', '13', '17.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('12', '7897316806371', '12', 'OPTIVE COLIRIO 10ML', 'ETICO', 'UN', '30', '40.00', '0', '0.00', '0.00', '33.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('13', '7897316806388', '13', 'OPTIVE COLIRIO 15ML', 'ETICO', 'UN', '30', '45.00', '0', '0.00', '0.00', '50.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('14', '7896016808302', '14', 'LUFITAL 30ML ADULTO', 'ETICO', 'UN', '22', '29.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('15', '7898962943144', '15', 'LUFTAL 30ML INFANTIL', 'ETICO', 'UN', '22', '29.00', '2', '44.00', '59.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('16', '7898040329587', '16', 'FLORATIL C/06 FLACONETES', 'ETICO', 'UN', '22', '29.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('17', '7898040329624', '17', 'FLORATIL C/10 FLACONETES', 'ETICO', 'UN', '22', '33.00', '0', '0.00', '0.00', '50.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('18', '78911239', '18', 'VICK INALADOR', 'ETICO', 'UN', '7', '12.00', '0', '0.00', '0.00', '71.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('19', '7896658028205', '19', 'COLIDIS', 'ETICO', 'UN', '0', '70.00', '1', '0.00', '70.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('20', '7896227800041', '20', 'SALOMPAS SPRAY', 'ETICO', 'UN', '22', '29.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('21', '7891317014162', '21', 'ATAK CLAV (AMOX 875MG + CLAV 235MG)', 'ETICO', 'UN', '57,87', '78.00', '3', '173.00', '234.00', '34.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('22', '7896015525804', '22', 'COREGA CREME 70G', 'ETICO', 'UN', '45', '55.00', '4', '180.00', '220.00', '22.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('23', '7896261018303', '23', 'CATAFLAM ESPOTE 60G SPRAY', 'ETICO', 'UN', '22', '29.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('24', '7770000000241', '24', 'INFINITY 12 02', 'ETICO', 'UN', '12', '20.00', '2', '24.00', '40.00', '66.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('25', '7891317014186', '25', 'ATAK CLAV (AMOX 400 + CLAV 57MG) LIQUIDA', 'ETICO', 'UN', '34,88', '50.00', '3', '104.00', '150.00', '43.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('26', '7896548197738', '26', 'COLIRIO SYSTANE 10ML', 'ETICO', 'UN', '25', '35.00', '0', '0.00', '0.00', '40.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('27', '3662042000058', '27', 'COLIRIO HYABAK 10ML 300GTS', 'ETICO', 'UN', '25', '33.00', '0', '0.00', '0.00', '35.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('28', '78911222', '28', 'VICK 12G', 'ETICO', 'UN', '7', '12.00', '0', '0.00', '0.00', '71.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('29', '7898962943045', '29', 'NALDECON MULTI', 'ETICO', 'UN', '5', '10.00', '2', '10.00', '20.00', '100.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('30', '7899655506783', '30', 'GEL NOCAUTEADOR DOKMOS', 'NATURAL', 'UN', '15,7', '20.00', '35', '549.00', '700.00', '27.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('31', '7896658001918', '31', 'DECONGEX PLUS ADULTO E PED 120ML', 'ETICO', 'UN', '15', '20.00', '14', '210.00', '280.00', '33.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('32', '7908020502517', '32', 'ALGESTONA (ANTICONCEPICIONAL)', 'ETICO', 'UN', '7,5', '12.00', '34', '255.00', '408.00', '60.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('33', '7898148291298', '33', 'METFORMINA 850MG C/COMP', 'GENERICO', 'UN', '3,8', '5.00', '18', '68.00', '99.00', '44.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('34', '7897947612808', '34', 'LACTOLINEA AMEIXA', 'GENERICO', 'UN', '8,98', '9.00', '20', '179.00', '197.00', '10.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('35', '7896523207643', '35', 'AMBROXOL PEDIATRICO', 'GENERICO', 'UN', '5,79', '6.00', '16', '92.00', '111.00', '20.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('36', '7896523201887', '36', 'DIPIRONA 1G (GENERICA CIMED)', 'GENERICO', 'UN', '5,19', '6.00', '13', '67.00', '87.00', '30.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('37', '7897947616325', '37', 'ACEVITON 1G', 'GENERICO', 'UN', '0', '4.00', '7', '0.00', '34.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('38', '7891800802856', '38', 'ESPARADRAPO 10MX4,5M', 'HOSPITALAR', 'UN', '8', '12.00', '26', '208.00', '312.00', '50.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('39', '7897947615397', '39', 'DERMAFEME FRESH KIT C/02', 'HB', 'UN', '0', '12.00', '10', '0.00', '129.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('40', '7897947604384', '40', 'DERMAFEME FLORA KIT C/02', 'HB', 'UN', '0', '12.00', '9', '0.00', '116.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('41', '7897947601185', '41', 'PROTETOR SOLAR ACNEZIL FPS 30', 'HB', 'UN', '20,94', '35.00', '12', '251.00', '420.00', '67.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('42', '7896523228419', '42', 'editado PRAALERGIA 120MG (FEXOFENADINA)', 'GENÉRICO', 'UN', '0', '1.00', '1', '0.00', '49.00', '0.00', null, '2024-09-30', null);
INSERT INTO `farmacia` VALUES ('43', '7896523228426', '43', 'PRAALERGIA 180MG', 'GENERICO', 'UN', '0', '9.00', '4', '0.00', '39.00', '0.00', null, '2024-09-25', null);
INSERT INTO `farmacia` VALUES ('44', '7770000000449', '44', 'TOALHA BEBE LIMPINHO C/90 (PREMIUM C/FLAP)', 'HB', 'UN', '2,5', '4.00', '0', '0.00', '0.00', '99.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('45', '7898994747512', '45', 'TOALHA SNOW BABY C/90 (AZUL BB)', 'HB', 'UN', '3,34', '6.00', '30', '100.00', '200.00', '99.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('46', '7898994747536', '46', 'TOALHA SNOW BABY C/90 (AZUL FORTE)', 'HB', 'UN', '3,34', '6.00', '8', '26.00', '53.00', '99.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('48', '7898994747550', '48', 'TOALHA SNOW BABY HIDRATAÇÃO INTENSA C/9', 'HB', 'UN', '3,94', '6.00', '26', '102.00', '173.00', '69.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('49', '7897947617506', '49', 'CARMED ROSA GLITTER', 'ETICO', 'UN', '7,49', '12.00', '68', '509.00', '816.00', '60.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('50', '7891058020941', '50', 'DORFLEX CARTELA C/10 COMP', 'ETICO', 'UN', '4,82', '6.00', '0', '0.00', '0.00', '24.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('51', '7897947616509', '51', 'LAVITAN HOMEN (SUPER FORMULA)', 'VITAMINA', 'UN', '25,89', '30.00', '2', '51.00', '60.00', '15.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('52', '7770000000524', '52', '7897947617483', 'GENERICO', 'UN', '15,99', '22.00', '2', '31.00', '44.00', '37.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('53', '7899785200490', '53', 'AMBROXIMEL SPRAY EUCALIPTO', 'GENERICO', 'UN', '0', '70.00', '5', '0.00', '350.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('54', '7897947601383', '54', 'LAVITAN MULT C POWER EFERV.', 'VITAMINA', 'UN', '11,69', '15.00', '3', '35.00', '45.00', '28.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('55', '7897947601611', '55', 'LAVITAN ARGININA 10COMP EFERV', 'VITAMINA', 'UN', '11,69', '15.00', '2', '23.00', '30.00', '28.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('56', '7770000000562', '56', 'INFINITY 12 01', 'GERAL', 'UN', '20', '25.00', '0', '0.00', '0.00', '25.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('57', '7897947617803', '57', 'CARMED DOCE DE LEITE', 'GERAL', 'UN', '0', '14.00', '38', '0.00', '569.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('58', '7897947617476', '58', 'CARMED BEIJINHO DE COCO', 'GERAL', 'UN', '0', '14.00', '107', '0.00', '1603.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('59', '7897947617940', '59', 'CARMED BRIGADEIRO', 'GERAL', 'UN', '0', '14.00', '16', '0.00', '239.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('60', '7891058016999', '60', 'ENTEROGERMINA CRIANÇA E ADULTO C/05 FRA', 'GERAL', 'UN', '22', '35.00', '5', '110.00', '175.00', '59.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('97', null, null, 'ANADOR 5MG', 'GENÉRICO', null, null, '1.00', '2', null, null, null, null, '2024-09-14', null);
INSERT INTO `farmacia` VALUES ('62', '7896523201504', '62', 'FIGMED 200MG', 'GENERICO', 'UN', '0', '27.00', '46', '0.00', '1242.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('63', '7770000000630', '63', 'AMBROXIMEL SPRAY GENGIBRE', 'GENERICO', 'UN', '0', '70.00', '12', '0.00', '840.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('64', '7896523219646', '64', 'FRUSALT COM 60 ENVELOPES', 'GENERICO', 'UN', '0', '40.00', '2', '0.00', '80.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('65', '7896523208770', '65', 'FLUCONAZOL 150MG', 'GENERICO', 'UN', '1,49', '1.00', '260', '387.00', '514.00', '32.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('66', '7898075310314', '66', 'DORFEBRIL (DIPIRONA GOTAS)', 'GENERICO', 'UN', '0', '2.00', '20', '0.00', '50.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('67', '7896523206479', '67', 'GINKOMED 80MG', 'GENERICO', 'UN', '0', '14.00', '6', '0.00', '89.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('68', '7896523214092', '68', 'DICLOFENACO POTÁSSICO 50MG', 'GENERICO', 'UN', '0', '2.00', '60', '0.00', '134.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('69', '7896523226750', '69', 'ROSUVASTATINA CÁLCICA 10MG', 'GENERICO', 'UN', '0', '5.00', '0', '0.00', '0.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('70', '7896523201320', '70', 'PRALÍVIO IBUPROFENO 400MG', 'GENERICO', 'UN', '0', '6.00', '8', '0.00', '55.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('71', '7896523227450', '71', 'TADALAFILA 5MG', 'GENERICO', 'UN', '0', '7.00', '14', '0.00', '111.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('72', '7896523227528', '72', 'CARVEDILOL 12,5MG', 'GENERICO', 'UN', '0', '5.00', '1', '0.00', '5.00', '0.00', null, '2024-09-26', null);
INSERT INTO `farmacia` VALUES ('73', '7896523227184', '73', 'OMEPRAZOL 20MG', 'GENERICO', 'UN', '0', '3.00', '1', '0.00', '3.00', '0.00', null, '2024-09-26', null);

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
