/*
Navicat MySQL Data Transfer

Source Server         : SERVER
Source Server Version : 50616
Source Host           : 192.168.1.50:3306
Source Database       : coklat3

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-10-16 15:00:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for atombizz_accounting_buku_besar
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_accounting_buku_besar`;
CREATE TABLE `atombizz_accounting_buku_besar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `no_referensi` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `no_akun` varchar(50) DEFAULT NULL,
  `debit` float(15,3) DEFAULT NULL,
  `kredit` float(15,3) DEFAULT NULL,
  `faktur` varchar(50) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `person` varchar(50) DEFAULT NULL,
  `valid` enum('no','yes') DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_accounting_buku_besar
-- ----------------------------
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('1', 'PB', 'FB.S3-001.150902.01', '2015-09-02', 'Pembelian dengan referensi no FB.S3-001.150902.01', '110000', '0.000', '60000.000', null, 'Cabang Galunggung', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('2', 'PB', 'FB.S3-001.150902.01', '2015-09-02', 'Pembelian dengan referensi no FB.S3-001.150902.01', '340000', '0.000', '0.000', null, 'Cabang Galunggung', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('3', 'PB', 'FB.S3-001.150902.01', '2015-09-02', 'Pembelian dengan referensi no FB.S3-001.150902.01', '130000', '60000.000', '0.000', null, 'Cabang Galunggung', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('4', 'PB', '', '0000-00-00', 'Pembelian dengan referensi no ', '110000', '0.000', '150000.000', null, 'Cabang Galunggung', '', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('5', 'PB', '', '0000-00-00', 'Pembelian dengan referensi no ', '340000', '0.000', '0.000', null, 'Cabang Galunggung', '', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('6', 'PB', '', '0000-00-00', 'Pembelian dengan referensi no ', '130000', '150000.000', '0.000', null, 'Cabang Galunggung', '', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('7', 'FRO', 'FRO.S3-001.150905.01', '2015-09-05', 'Retur Keluar dengan referensi no FRO.S3-001.150905.01', '330000', '0.000', '12000.000', null, 'Cabang Galunggung', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('8', 'HTG', 'FRO.S3-001.150905.01', '2015-09-05', 'Retur Keluar dengan referensi no FRO.S3-001.150905.01', '510000', '12000.000', '0.000', 'FRO.S3-001.150905.01', 'Cabang Galunggung', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('9', 'spoil', 'FSP.150904.01', '2015-09-04', 'Spoil stok gudang dengan referensi FSP.150904.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('10', 'PB', 'FB.S1-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S1-001.150907.01', '110000', '0.000', '140000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('11', 'PB', 'FB.S1-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S1-001.150907.01', '340000', '0.000', '5000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('12', 'PB', 'FB.S1-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S1-001.150907.01', '130000', '145000.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('13', 'PB', 'FB.S2-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S2-001.150907.01', '110000', '0.000', '135000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('14', 'PB', 'FB.S2-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S2-001.150907.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('15', 'PB', 'FB.S2-001.150907.01', '2015-09-07', 'Pembelian dengan referensi no FB.S2-001.150907.01', '130000', '135000.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('16', 'spoil', 'FSP.150907.01', '2015-09-07', 'Spoil stok gudang dengan referensi FSP.150907.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('17', 'FRO', 'FRO.S2-001.150907.01', '2015-09-07', 'Retur Keluar dengan referensi no FRO.S2-001.150907.01', '330000', '0.000', '19000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('18', 'HTG', 'FRO.S2-001.150907.01', '2015-09-07', 'Retur Keluar dengan referensi no FRO.S2-001.150907.01', '510000', '19000.000', '0.000', 'FRO.S2-001.150907.01', 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('19', 'TR', 'TR24150908-1', '2015-09-08', 'Penjualan dengan no faktur TR24150908-1', '110000', '20000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('20', 'TR', 'TR24150908-1', '2015-09-08', 'Penjualan dengan no faktur TR24150908-1', '210000', '0.000', '20000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('21', 'TR', 'TR24150908-1', '2015-09-08', 'Penjualan dengan no faktur TR24150908-1', '310000', '2160.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('22', 'TR', 'TR24150908-2', '2015-09-08', 'Penjualan dengan no faktur TR24150908-2', '110000', '30000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('23', 'TR', 'TR24150908-2', '2015-09-08', 'Penjualan dengan no faktur TR24150908-2', '210000', '0.000', '30000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('24', 'TR', 'TR24150908-2', '2015-09-08', 'Penjualan dengan no faktur TR24150908-2', '310000', '3240.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('25', 'TR', 'TR24150908-3', '2015-09-08', 'Penjualan dengan no faktur TR24150908-3', '110000', '40000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('26', 'TR', 'TR24150908-3', '2015-09-08', 'Penjualan dengan no faktur TR24150908-3', '210000', '0.000', '40000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('27', 'TR', 'TR24150908-3', '2015-09-08', 'Penjualan dengan no faktur TR24150908-3', '310000', '3000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('28', 'TR', 'TR24150908-4', '2015-09-08', 'Penjualan dengan no faktur TR24150908-4', '110000', '10000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('29', 'TR', 'TR24150908-4', '2015-09-08', 'Penjualan dengan no faktur TR24150908-4', '210000', '0.000', '10000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('30', 'TR', 'TR24150908-4', '2015-09-08', 'Penjualan dengan no faktur TR24150908-4', '310000', '1080.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('31', 'TR', 'TR24150908-5', '2015-09-08', 'Penjualan dengan no faktur TR24150908-5', '110000', '100000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('32', 'TR', 'TR24150908-5', '2015-09-08', 'Penjualan dengan no faktur TR24150908-5', '210000', '0.000', '100000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('33', 'TR', 'TR24150908-5', '2015-09-08', 'Penjualan dengan no faktur TR24150908-5', '310000', '6600.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('34', 'TR', 'TR24150908-6', '2015-09-08', 'Penjualan dengan no faktur TR24150908-6', '110000', '70000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('35', 'TR', 'TR24150908-6', '2015-09-08', 'Penjualan dengan no faktur TR24150908-6', '210000', '0.000', '70000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('36', 'TR', 'TR24150908-6', '2015-09-08', 'Penjualan dengan no faktur TR24150908-6', '310000', '4800.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('37', 'TR', 'TR24150908-7', '2015-09-08', 'Penjualan dengan no faktur TR24150908-7', '110000', '140000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('38', 'TR', 'TR24150908-7', '2015-09-08', 'Penjualan dengan no faktur TR24150908-7', '210000', '0.000', '140000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('39', 'TR', 'TR24150908-7', '2015-09-08', 'Penjualan dengan no faktur TR24150908-7', '310000', '10590.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('40', 'TR', 'TR24150908-8', '2015-09-08', 'Penjualan dengan no faktur TR24150908-8', '110000', '130000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('41', 'TR', 'TR24150908-8', '2015-09-08', 'Penjualan dengan no faktur TR24150908-8', '210000', '0.000', '130000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('42', 'TR', 'TR24150908-8', '2015-09-08', 'Penjualan dengan no faktur TR24150908-8', '310000', '9510.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('43', 'TR', 'TR24150908-9', '2015-09-08', 'Penjualan dengan no faktur TR24150908-9', '110000', '60000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('44', 'TR', 'TR24150908-9', '2015-09-08', 'Penjualan dengan no faktur TR24150908-9', '210000', '0.000', '60000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('45', 'TR', 'TR24150908-9', '2015-09-08', 'Penjualan dengan no faktur TR24150908-9', '310000', '4050.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('46', 'TR', 'TR24150908-10', '2015-09-08', 'Penjualan dengan no faktur TR24150908-10', '110000', '50000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('47', 'TR', 'TR24150908-10', '2015-09-08', 'Penjualan dengan no faktur TR24150908-10', '210000', '0.000', '50000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('48', 'TR', 'TR24150908-10', '2015-09-08', 'Penjualan dengan no faktur TR24150908-10', '310000', '3300.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('49', 'TR', 'TR24150908-11', '2015-09-08', 'Penjualan dengan no faktur TR24150908-11', '110000', '50000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('50', 'TR', 'TR24150908-11', '2015-09-08', 'Penjualan dengan no faktur TR24150908-11', '210000', '0.000', '50000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('51', 'TR', 'TR24150908-11', '2015-09-08', 'Penjualan dengan no faktur TR24150908-11', '310000', '3300.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('52', 'TR', 'TR24150908-12', '2015-09-08', 'Penjualan dengan no faktur TR24150908-12', '110000', '80000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('53', 'TR', 'TR24150908-12', '2015-09-08', 'Penjualan dengan no faktur TR24150908-12', '210000', '0.000', '80000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('54', 'TR', 'TR24150908-12', '2015-09-08', 'Penjualan dengan no faktur TR24150908-12', '310000', '5880.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('55', 'TR', 'TR24150908-13', '2015-09-08', 'Penjualan dengan no faktur TR24150908-13', '110000', '50000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('56', 'TR', 'TR24150908-13', '2015-09-08', 'Penjualan dengan no faktur TR24150908-13', '210000', '0.000', '50000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('57', 'TR', 'TR24150908-13', '2015-09-08', 'Penjualan dengan no faktur TR24150908-13', '310000', '3300.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('58', 'TR', 'TR24150908-14', '2015-09-08', 'Penjualan dengan no faktur TR24150908-14', '110000', '140000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('59', 'TR', 'TR24150908-14', '2015-09-08', 'Penjualan dengan no faktur TR24150908-14', '210000', '0.000', '140000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('60', 'TR', 'TR24150908-14', '2015-09-08', 'Penjualan dengan no faktur TR24150908-14', '310000', '10590.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('61', 'PB', 'FB.S1-001.150908.01', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.01', '110000', '0.000', '2500000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('62', 'PB', 'FB.S1-001.150908.01', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('63', 'PB', 'FB.S1-001.150908.01', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.01', '130000', '2500000.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('64', 'PB', 'FB.S1-001.150908.02', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.02', '110000', '0.000', '1880000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('65', 'PB', 'FB.S1-001.150908.02', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.02', '340000', '0.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('66', 'PB', 'FB.S1-001.150908.02', '2015-09-08', 'Pembelian dengan referensi no FB.S1-001.150908.02', '130000', '1880000.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('67', 'spoil', 'FSP.150911.01', '2015-09-11', 'Spoil stok stok_bahan dengan referensi FSP.150911.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('68', 'spoil', 'FSP.150911.01', '2015-09-11', 'Spoil stok stok_bahan dengan referensi FSP.150911.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('69', 'spoil', 'FSP.150911.02', '2015-09-11', 'Spoil stok stok_bahan dengan referensi FSP.150911.02', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('70', 'spoil', 'FSP.150911.01', '2015-09-11', 'Spoil stok stok_produk dengan referensi FSP.150911.01', '130000', '0.000', '10000.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('71', 'spoil', 'FSP.150912.01', '2015-09-12', 'Spoil stok stok_produk dengan referensi FSP.150912.01', '130000', '0.000', '50000.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('72', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '110000', '0.000', '280000.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('73', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('74', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '130000', '280000.000', '0.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('75', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '110000', '0.000', '280000.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('76', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('77', 'PB', 'FB.S3-001.150915.01', '2015-09-15', 'Pembelian dengan referensi no FB.S3-001.150915.01', '130000', '280000.000', '0.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('78', 'PB', 'FB.S2-001.151005.01', '2015-10-05', 'Pembelian dengan referensi no FB.S2-001.151005.01', '110000', '0.000', '4000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('79', 'PB', 'FB.S2-001.151005.01', '2015-10-05', 'Pembelian dengan referensi no FB.S2-001.151005.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('80', 'PB', 'FB.S2-001.151005.01', '2015-10-05', 'Pembelian dengan referensi no FB.S2-001.151005.01', '130000', '4000.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('81', 'GAJI', 'NS-151007-0', '2015-10-07', 'Pembayaran gaji pada karyawan 9', '110000', '0.000', '10000000.000', '', null, '9', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('82', 'GAJI', 'NS-151007-0', '2015-10-07', 'Pembayaran gaji pada karyawan 9', '615000', '10000000.000', '0.000', '', null, '9', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('83', 'PB', 'FB.S1-002.151007.01', '2015-10-07', 'Pembelian dengan referensi no FB.S1-002.151007.01', '110000', '0.000', '47500.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('84', 'PB', 'FB.S1-002.151007.01', '2015-10-07', 'Pembelian dengan referensi no FB.S1-002.151007.01', '340000', '0.000', '2500.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('85', 'PB', 'FB.S1-002.151007.01', '2015-10-07', 'Pembelian dengan referensi no FB.S1-002.151007.01', '130000', '50000.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('86', 'spoil', 'FSP.151007.01', '2015-10-07', 'Spoil stok stok_bahan dengan referensi FSP.151007.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('87', 'TR', 'TR24151007-1', '2015-10-07', 'Penjualan dengan no faktur TR24151007-1', '110000', '14000.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('88', 'TR', 'TR24151007-1', '2015-10-07', 'Penjualan dengan no faktur TR24151007-1', '210000', '0.000', '14000.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('89', 'TR', 'TR24151007-1', '2015-10-07', 'Penjualan dengan no faktur TR24151007-1', '310000', '220.000', '0.000', '', null, '24', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('90', 'PD', 'PD.151008.001', '2015-10-08', 'bensin', '110000', '100000.000', '0.000', null, 'J002013020829', 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('91', 'PD', 'PD.151008.001', '2015-10-08', 'bensin', '220000', '0.000', '100000.000', 'PD.151008.001', 'J002013020829', 'astro', 'yes', '1');
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('92', 'KAS', 'KAS.151008.001', '2015-10-08', 'Biaya Kirim', '110000', '0.000', '120000.000', null, 'J002013020829', 'astro', 'no', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('93', 'KAS', 'KAS.151008.001', '2015-10-08', 'Biaya Kirim', '610000', '120000.000', '0.000', 'KAS.151008.001', 'J002013020829', 'astro', 'no', '1');
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('94', 'PB', 'FB.S2-001.151008.01', '2015-10-08', 'Pembelian dengan referensi no FB.S2-001.151008.01', '110000', '0.000', '360000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('95', 'PB', 'FB.S2-001.151008.01', '2015-10-08', 'Pembelian dengan referensi no FB.S2-001.151008.01', '340000', '0.000', '40000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('96', 'PB', 'FB.S2-001.151008.01', '2015-10-08', 'Pembelian dengan referensi no FB.S2-001.151008.01', '130000', '400000.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('97', 'spoil', 'FSP.151008.01', '2015-10-08', 'Spoil stok stok_produk dengan referensi FSP.151008.01', '130000', '0.000', '7000.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('98', 'KAS', 'KAS.151008.002', '2015-10-08', 'bensin', '110000', '0.000', '50000.000', null, 'J002013020829', 'astro', 'no', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('99', 'KAS', 'KAS.151008.002', '2015-10-08', 'bensin', '710000', '50000.000', '0.000', 'KAS.151008.002', 'J002013020829', 'astro', 'no', '2');
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('100', 'PB', 'FB.S3-001.151012.01', '2015-10-12', 'Pembelian dengan referensi no FB.S3-001.151012.01', '110000', '0.000', '485000.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('101', 'PB', 'FB.S3-001.151012.01', '2015-10-12', 'Pembelian dengan referensi no FB.S3-001.151012.01', '340000', '0.000', '15000.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('102', 'PB', 'FB.S3-001.151012.01', '2015-10-12', 'Pembelian dengan referensi no FB.S3-001.151012.01', '130000', '500000.000', '0.000', null, 'J002013020829', 'S3-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('103', 'PB', 'FB.S2-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-002.151013.01', '110000', '0.000', '60000.000', null, 'J002013020829', 'S2-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('104', 'PB', 'FB.S2-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-002.151013.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S2-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('105', 'PB', 'FB.S2-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-002.151013.01', '130000', '60000.000', '0.000', null, 'J002013020829', 'S2-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('106', 'PB', 'FB.S1-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-002.151013.01', '110000', '0.000', '1500000.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('107', 'PB', 'FB.S1-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-002.151013.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('108', 'PB', 'FB.S1-002.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-002.151013.01', '130000', '1500000.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('109', 'PB', 'FB.S2-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-001.151013.01', '110000', '0.000', '6000.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('110', 'PB', 'FB.S2-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-001.151013.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('111', 'PB', 'FB.S2-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S2-001.151013.01', '130000', '6000.000', '0.000', null, 'J002013020829', 'S2-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('112', 'PB', 'FB.S1-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-001.151013.01', '110000', '0.000', '3325000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('113', 'PB', 'FB.S1-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-001.151013.01', '340000', '0.000', '175000.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('114', 'PB', 'FB.S1-001.151013.01', '2015-10-13', 'Pembelian dengan referensi no FB.S1-001.151013.01', '130000', '3500000.000', '0.000', null, 'J002013020829', 'S1-001', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('115', 'spoil', 'FSP.151013.01', '2015-10-13', 'Spoil stok stok_bahan dengan referensi FSP.151013.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('116', 'spoil', 'FSP.151013.02', '2015-10-13', 'Spoil stok stok_box dengan referensi FSP.151013.02', '130000', '0.000', '24000.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('117', 'PB', 'FB.S1-002.151015.01', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.01', '110000', '0.000', '1500000.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('118', 'PB', 'FB.S1-002.151015.01', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.01', '340000', '0.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('119', 'PB', 'FB.S1-002.151015.01', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.01', '130000', '1500000.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('120', 'spoil', 'FSP.151015.01', '2015-10-15', 'Spoil stok stok_bahan dengan referensi FSP.151015.01', '130000', '0.000', '0.000', null, null, 'astro', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('121', 'PB', 'FB.S1-002.151015.02', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.02', '110000', '0.000', '750000.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('122', 'PB', 'FB.S1-002.151015.02', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.02', '340000', '0.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);
INSERT INTO `atombizz_accounting_buku_besar` VALUES ('123', 'PB', 'FB.S1-002.151015.02', '2015-10-15', 'Pembelian dengan referensi no FB.S1-002.151015.02', '130000', '750000.000', '0.000', null, 'J002013020829', 'S1-002', 'yes', null);

-- ----------------------------
-- Table structure for atombizz_accounting_master_akun
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_accounting_master_akun`;
CREATE TABLE `atombizz_accounting_master_akun` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` enum('detail','header') DEFAULT NULL,
  `keterangan` enum('L/R','neraca') DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `space` int(10) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `saldo_awal_debit` bigint(20) DEFAULT NULL,
  `saldo_awal_kredit` bigint(20) DEFAULT NULL,
  `code_ref` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_accounting_master_akun
-- ----------------------------
INSERT INTO `atombizz_accounting_master_akun` VALUES ('94', '211100', 'REGULER', 'header', 'neraca', '211000', '2', '1', null, null, '2111');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('69', '110000', 'ASET LANCAR', 'header', 'neraca', '', '0', '1', null, null, '11');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('70', '111000', 'KAS/BANK', 'header', 'neraca', '110000', '1', '1', null, null, '111');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('71', '111100', 'KAS', 'header', 'neraca', '111000', '2', '1', null, null, '1111');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('72', '111110', 'KAS PENJUALAN', 'detail', 'neraca', '111100', '3', '1', null, null, '11111');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('73', '111120', 'KAS BRANKAS', 'detail', 'neraca', '111100', '3', '2', null, null, '11112');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('74', '111130', 'KAS KECIL', 'detail', 'neraca', '111100', '3', '3', null, null, '11113');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('75', '111200', 'BANK', 'header', 'neraca', '111000', '2', '2', null, null, '1112');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('76', '111210', 'BMT SIDOGIRI', 'detail', 'neraca', '111200', '3', '1', null, null, '11121');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('77', '111220', 'BANK BNI', 'detail', 'neraca', '111200', '3', '2', null, null, '11122');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('78', '111230', 'BANK BRI', 'detail', 'neraca', '111200', '3', '3', null, null, '11123');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('79', '111240', 'BANK BCA', 'detail', 'neraca', '111200', '3', '4', null, null, '11124');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('80', '112000', 'PIUTANG USAHA', 'detail', 'neraca', '110000', '1', '2', null, null, '112');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('81', '113000', 'PIUTANG NON USAHA', 'detail', 'neraca', '110000', '1', '3', null, null, '113');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('82', '114000', 'PERSEDIAAN', 'detail', 'neraca', '110000', '1', '4', null, null, '114');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('83', '115000', 'BEBAN DIMUKA', 'detail', 'neraca', '110000', '1', '5', null, null, '115');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('84', '116000', 'PIUTANG INTERNAL', 'detail', 'neraca', '110000', '1', '6', null, null, '116');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('85', '120000', 'ASET TETAP', 'header', 'neraca', '', '0', '2', null, null, '12');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('86', '121000', 'ASET TETAP', 'detail', 'neraca', '120000', '1', '1', null, null, '121');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('87', '122000', 'AKM. PENYUSUTAN', 'detail', 'neraca', '120000', '1', '2', null, null, '122');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('88', '130000', 'ASET LAIN-LAIN', 'header', 'neraca', '', '0', '3', null, null, '13');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('89', '131000', 'SOFTWARE', 'detail', 'neraca', '130000', '1', '1', null, null, '131');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('90', '132000', 'BIAYA PRA OPERASIONAL', 'detail', 'neraca', '130000', '1', '2', null, null, '132');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('91', '133000', 'GOODWILL', 'detail', 'neraca', '130000', '1', '3', null, null, '133');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('92', '210000', 'HUTANG LANCAR', 'header', 'neraca', '', '0', '1', null, null, '21');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('93', '211000', 'HUTANG USAHA', 'header', 'neraca', '210000', '1', '1', null, null, '211');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('95', '211110', 'REGULER PT', 'detail', 'neraca', '211100', '3', '1', null, null, '21111');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('96', '211120', 'REGULER CV/UD', 'detail', 'neraca', '211100', '3', '2', null, null, '21112');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('97', '211130', 'REGULER PERORANGAN', 'detail', 'neraca', '211100', '3', '3', null, null, '21113');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('98', '211200', 'KONSINYASI', 'header', 'neraca', '211000', '2', '2', null, null, '2112');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('99', '211210', 'KONSINYASI PT', 'detail', 'neraca', '211200', '3', '1', null, null, '21121');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('100', '211220', 'KONSINYASI CV/UD', 'detail', 'neraca', '211200', '3', '2', null, null, '21122');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('101', '211230', 'KONSINYASI PERORANGAN', 'detail', 'neraca', '211200', '3', '3', null, null, '21123');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('102', '212000', 'HUTANG NON USAHA', 'detail', 'neraca', '210000', '1', '2', null, null, '212');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('103', '213000', 'HUTANG BIAYA', 'detail', 'neraca', '210000', '1', '3', null, null, '213');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('104', '214000', 'PENDAPATAN DITERIMA DIMUKA', 'detail', 'neraca', '210000', '1', '4', null, null, '214');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('105', '215000', 'HUTANG PAJAK', 'detail', 'neraca', '210000', '1', '5', null, null, '215');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('106', '216000', 'HUTANG INTERNAL', 'detail', 'neraca', '210000', '1', '6', null, null, '216');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('107', '220000', 'HUTANG JK. PANJANG', 'header', 'neraca', '', '0', '2', null, null, '22');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('108', '221000', 'HUTANG MODAL', 'detail', 'neraca', '220000', '1', '1', null, null, '221');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('109', '222000', 'HUTANG PEMBELIAN AKTIVA TETAP', 'detail', 'neraca', '220000', '1', '2', null, null, '222');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('110', '310000', 'MODAL ANGGOTA', 'header', 'neraca', '', '0', '1', null, null, '31');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('111', '311000', 'SETORAN', 'detail', 'neraca', '310000', '1', '1', null, null, '311');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('112', '312000', 'PENARIKAN', 'detail', 'neraca', '310000', '1', '2', null, null, '312');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('113', '320000', 'MODAL PENYERTAAN', 'header', 'neraca', '', '0', '2', null, null, '32');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('114', '321000', 'INTERNAL SIDOGIRI NETWORK', 'detail', 'neraca', '320000', '1', '1', null, null, '321');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('115', '322000', 'EKSTERNAL SIDOGIRI NETWORK', 'detail', 'neraca', '320000', '1', '2', null, null, '322');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('116', '330000', 'DANA CADANGAN', 'header', 'neraca', '', '0', '3', null, null, '33');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('117', '331000', 'PERIODE LALU', 'detail', 'neraca', '330000', '1', '1', null, null, '331');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('118', '332000', 'PERIODE TAHUN INI', 'detail', 'neraca', '330000', '1', '2', null, null, '332');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('119', '410000', 'PENJUALAN', 'header', 'L/R', '', '0', '1', null, null, '41');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('120', '411000', 'PENJUALAN TUNAI', 'detail', 'L/R', '410000', '1', '1', null, null, '411');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('121', '412000', 'PENJUALAN KREDIT', 'detail', 'L/R', '410000', '1', '2', null, null, '412');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('122', '510000', 'HPP', 'header', 'L/R', '', '0', '1', null, null, '51');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('123', '511000', 'HPP PENJUALAN TUNAI', 'detail', 'L/R', '510000', '1', '1', null, null, '511');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('124', '512000', 'HPP PENJUALAN KREDIT', 'detail', 'L/R', '510000', '1', '2', null, null, '512');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('125', '610000', 'BIAYA OPERASIONAL', 'header', 'L/R', '', '0', '1', null, null, '61');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('126', '611000', 'BIAYA ADM & UMUM', 'detail', 'L/R', '610000', '1', '1', null, null, '611');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('127', '612000', 'BIAYA INVESTASI', 'detail', 'L/R', '610000', '1', '2', null, null, '612');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('128', '710000', 'BIAYA MARKETING', 'header', 'L/R', '', '0', '1', null, null, '71');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('129', '711000', 'MEDIA CETAK', 'detail', 'L/R', '710000', '1', '1', null, null, '711');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('130', '712000', 'MEDIA ELEKTRONIK', 'detail', 'L/R', '710000', '1', '2', null, null, '712');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('131', '810000', 'PENDAPATAN LAIN-LAIN', 'header', 'L/R', '', '0', '1', null, null, '81');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('132', '811000', 'REGULER', 'detail', 'L/R', '810000', '1', '1', null, null, '811');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('133', '812000', 'NON REGULER', 'detail', 'L/R', '810000', '1', '2', null, null, '812');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('134', '910000', 'BIAYA LAIN-LAIN', 'header', 'L/R', '', '0', '1', null, null, '91');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('135', '911000', 'REGULER', 'detail', 'L/R', '910000', '1', '1', null, null, '911');
INSERT INTO `atombizz_accounting_master_akun` VALUES ('136', '912000', 'NON REGULER', 'detail', 'L/R', '910000', '1', '2', null, null, '912');

-- ----------------------------
-- Table structure for atombizz_accounting_master_akuns
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_accounting_master_akuns`;
CREATE TABLE `atombizz_accounting_master_akuns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` enum('detail','header') DEFAULT NULL,
  `keterangan` enum('L/R','neraca') DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `space` int(10) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `saldo_awal_debit` bigint(20) DEFAULT NULL,
  `saldo_awal_kredit` bigint(20) DEFAULT NULL,
  `code_ref` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_accounting_master_akuns
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_blended_product
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_blended_product`;
CREATE TABLE `atombizz_blended_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `barcode_blended` varchar(255) DEFAULT NULL,
  `barcode_product` varchar(255) DEFAULT NULL,
  `qty_product` float(15,3) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `category_bahan` enum('mix material','material') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `barcode_blended` (`barcode_blended`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_blended_product
-- ----------------------------
INSERT INTO `atombizz_blended_product` VALUES ('59', '001', 'P_001', '25.000', 'temporary', '5', 'material');
INSERT INTO `atombizz_blended_product` VALUES ('60', 'B-001', 'P_001', '25.000', 'temporary', '5', 'material');
INSERT INTO `atombizz_blended_product` VALUES ('61', 'B-002', 'P_002', '1.000', 'temporary', '5', 'material');
INSERT INTO `atombizz_blended_product` VALUES ('62', 'BX_B-001', 'P_001', '25.000', 'temporary', '5', 'material');
INSERT INTO `atombizz_blended_product` VALUES ('63', 'BX_B-002', 'P_002', '25.000', 'temporary', '5', 'material');

-- ----------------------------
-- Table structure for atombizz_brand_converter
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_brand_converter`;
CREATE TABLE `atombizz_brand_converter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `qty_convertion` int(11) DEFAULT NULL,
  `satuan_convertion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_brand_converter
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_cashdraw
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_cashdraw`;
CREATE TABLE `atombizz_cashdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `checkin` varchar(20) DEFAULT NULL,
  `checkout` varchar(20) DEFAULT NULL,
  `start_cash` bigint(20) DEFAULT NULL,
  `end_cash` bigint(20) DEFAULT NULL,
  `omset` bigint(20) DEFAULT NULL,
  `total_cash` bigint(20) DEFAULT NULL,
  `status` enum('yes','temporary','no') DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `valid_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_atombizz_cashdraw_atombizz_employee1_idx` (`employee_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of atombizz_cashdraw
-- ----------------------------
INSERT INTO `atombizz_cashdraw` VALUES ('1', 'CASH01/020915', '2015-09-02', '10:51:28', '10:52:20', '0', '0', null, '0', 'no', '24', null);
INSERT INTO `atombizz_cashdraw` VALUES ('2', 'CASH01/080915', '2015-09-08', '09:52:00', null, '1000', null, null, null, 'temporary', '24', null);

-- ----------------------------
-- Table structure for atombizz_converter
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_converter`;
CREATE TABLE `atombizz_converter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `kategori` varchar(15) DEFAULT NULL,
  `acuan` decimal(8,2) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of atombizz_converter
-- ----------------------------
INSERT INTO `atombizz_converter` VALUES ('4', 'box', 'box', '1.00', 'box');
INSERT INTO `atombizz_converter` VALUES ('5', 'pieces', 'pieces', '1.00', 'pcs');

-- ----------------------------
-- Table structure for atombizz_customers
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_customers`;
CREATE TABLE `atombizz_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registered` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `identification_number` varchar(255) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_customers
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_distribution
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_distribution`;
CREATE TABLE `atombizz_distribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) DEFAULT NULL,
  `branch_code` varchar(50) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `total` decimal(25,0) DEFAULT NULL,
  `urut` int(25) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `distributor_code` varchar(50) DEFAULT NULL,
  `distributor_name` varchar(55) DEFAULT NULL,
  `distributor_phone` varchar(25) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_distribution
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_distribution_items
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_distribution_items`;
CREATE TABLE `atombizz_distribution_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `hpp` decimal(10,2) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_distribution_items
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_distribution_tmp
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_distribution_tmp`;
CREATE TABLE `atombizz_distribution_tmp` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `qty_dikirim` int(20) DEFAULT NULL,
  `qty_diterima` int(20) DEFAULT NULL,
  `hpp` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `unit` int(255) DEFAULT NULL,
  `urut` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_distribution_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_employee
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_employee`;
CREATE TABLE `atombizz_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) DEFAULT NULL,
  `status_alumni` enum('0','1') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` longtext,
  `group` int(11) DEFAULT NULL,
  `workstation` varchar(50) DEFAULT NULL,
  `gaji` bigint(20) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `image` text,
  `compliment` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_employee
-- ----------------------------
INSERT INTO `atombizz_employee` VALUES ('24', '2014', '0', '2014-09-28', '000000000000', 'super admin', '00000000000000000', 'everywhere', '085721423839', 'super.admin@gmail.com', '1', 'astro', '8cd07cf78166032f36fd06cb40163942', '17', null, null, null, null, null, '1');
INSERT INTO `atombizz_employee` VALUES ('44', null, null, '1990-01-30', 'E-201500004', 'Opik', '77553445453', 'Jl. terusan', '0859963356444', '', '1', 'gudang1', '1f9c47c9dd7766222519d16aca9008fe', '20', null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for atombizz_employee_access
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_employee_access`;
CREATE TABLE `atombizz_employee_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `access` longtext NOT NULL,
  `module` longtext,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_employee_access
-- ----------------------------
INSERT INTO `atombizz_employee_access` VALUES ('20', '20', '[\"gudang.gudang.menu\",\"gudang.pembelian.data\",\"gudang.pembelian.tambah\",\"gudang.spoil.data\",\"gudang.spoil.tambah\",\"gudang.opname.index\",\"gudang.opname.print_product\",\"gudang.opname.print_all\",\"gudang.opname.stok\",\"gudang.opname.validasi_opname\",\"gudang.retur.data\",\"gudang.retur.tambah\",\"gudang.distribusi.index\",\"gudang.distribusi.data\"]', '[\"gudang\"]', null);
INSERT INTO `atombizz_employee_access` VALUES ('21', '21', '[\"laporan.laporan.menu\",\"laporan.laporan.grafik\",\"laporan.laporan.data\",\"finance.finance.menu\",\"finance.accounting.data\",\"finance.accounting.tambah\",\"finance.hutang.menu\",\"finance.hutang.catat\",\"finance.hutang.bayar\",\"finance.hutang.daftar\",\"finance.kasbon.menu\",\"finance.kasbon.catat\",\"finance.kasbon.bayar\",\"finance.kasbon.data\",\"finance.pendapatan.data\",\"finance.pendapatan.tambah\",\"finance.claim.index\"]', '[\"finance\",\"laporan\"]', null);
INSERT INTO `atombizz_employee_access` VALUES ('22', '22', '[\"master.master.menu\",\"master.produk.data\",\"master.produk.tambah\",\"master.karyawan.data\",\"master.karyawan.tambah\",\"master.karyawan.gaji\",\"master.pengguna.data\",\"master.pengguna.tambah\",\"master.suplier.data\",\"master.suplier.tambah\",\"master.pelanggan.data\",\"master.pelanggan.tambah\",\"master.master_menu.index\",\"master.meja.data\",\"master.meja.tambah\",\"master.posisi.data\",\"master.posisi.tambah\",\"config.config.index\"]', '[\"master\",\"config\"]', null);
INSERT INTO `atombizz_employee_access` VALUES ('18', '18', '[\"master.master.menu\",\"master.produk.data\",\"master.produk.tambah\",\"master.karyawan.data\",\"master.karyawan.tambah\",\"master.karyawan.gaji\",\"master.pengguna.data\",\"master.pengguna.tambah\",\"master.suplier.data\",\"master.suplier.tambah\",\"master.pelanggan.data\",\"master.pelanggan.tambah\",\"master.master_menu.index\",\"master.meja.data\",\"master.meja.tambah\",\"master.posisi.data\",\"master.posisi.tambah\",\"laporan.laporan.menu\",\"laporan.laporan.grafik\",\"laporan.laporan.data\",\"kasir.kasir.meja\",\"kasir.kasir.pesan\",\"kasir.cashdraw.buka_kasir\",\"kasir.cashdraw.tutup_kasir\",\"gudang.gudang.menu\",\"gudang.pembelian.data\",\"gudang.pembelian.tambah\",\"gudang.spoil.data\",\"gudang.spoil.tambah\",\"gudang.opname.index\",\"gudang.opname.print_product\",\"gudang.opname.print_all\",\"gudang.opname.stok\",\"gudang.opname.validasi_opname\",\"gudang.retur.data\",\"gudang.retur.tambah\",\"gudang.distribusi.index\",\"gudang.distribusi.data\",\"finance.finance.menu\",\"finance.accounting.data\",\"finance.accounting.tambah\",\"finance.hutang.menu\",\"finance.hutang.catat\",\"finance.hutang.bayar\",\"finance.hutang.daftar\",\"finance.kasbon.menu\",\"finance.kasbon.catat\",\"finance.kasbon.bayar\",\"finance.kasbon.data\",\"finance.pendapatan.data\",\"finance.pendapatan.tambah\",\"finance.claim.index\",\"config.config.index\"]', '[\"master\",\"kasir\",\"gudang\",\"finance\",\"laporan\",\"config\"]', null);
INSERT INTO `atombizz_employee_access` VALUES ('19', '19', '[\"kasir.kasir.meja\",\"kasir.kasir.pesan\",\"kasir.cashdraw.buka_kasir\",\"kasir.cashdraw.tutup_kasir\"]', '[\"kasir\"]', null);
INSERT INTO `atombizz_employee_access` VALUES ('17', '17', '[\"master.pengguna.detail\",\"master.master.menu\",\"master.produk.data\",\"master.produk.tambah\",\"master.rak_gudang.data\",\"master.rak_gudang.tambah\",\"master.rak_gudang.cari\",\"master.karyawan.data\",\"master.karyawan.tambah\",\"master.karyawan.gaji\",\"master.pengguna.data\",\"master.pengguna.tambah\",\"master.suplier.data\",\"master.suplier.tambah\",\"master.pelanggan.data\",\"master.pelanggan.tambah\",\"master.master_menu.index\",\"master.meja.data\",\"master.meja.tambah\",\"master.posisi.data\",\"master.posisi.tambah\",\"laporan.laporan.menu\",\"laporan.laporan.grafik\",\"laporan.laporan.data\",\"kasir.kasir.meja\",\"kasir.kasir.pesan\",\"kasir.cashdraw.buka_kasir\",\"kasir.cashdraw.tutup_kasir\",\"gudang.gudang.menu\",\"gudang.pembelian.data\",\"gudang.pembelian.tambah\",\"gudang.spoil.data\",\"gudang.spoil.tambah\",\"gudang.opname.index\",\"gudang.opname.print_product\",\"gudang.opname.print_all\",\"gudang.opname.stok\",\"gudang.opname.validasi_opname\",\"gudang.retur.data\",\"gudang.retur.tambah\",\"gudang.distribusi.index\",\"gudang.distribusi.data\",\"stok_bahan.stok_bahan.menu\",\"stok_bahan.pembelian.data\",\"stok_bahan.pembelian.tambah\",\"stok_bahan.spoil.data\",\"stok_bahan.spoil.tambah\",\"stok_bahan.opname.index\",\"stok_bahan.opname.print_product\",\"stok_bahan.opname.print_all\",\"stok_bahan.opname.stok\",\"stok_bahan.opname.validasi_opname\",\"stok_bahan.retur.data\",\"stok_bahan.retur.tambah\",\"stok_bahan.distribusi.index\",\"stok_bahan.distribusi.data\",\"stok_produk.stok_produk.menu\",\"stok_produk.pembelian.data\",\"stok_produk.pembelian.tambah\",\"stok_produk.spoil.data\",\"stok_produk.spoil.tambah\",\"stok_produk.opname.index\",\"stok_produk.opname.print_product\",\"stok_produk.opname.print_all\",\"stok_produk.opname.stok\",\"stok_produk.opname.validasi_opname\",\"stok_produk.retur.data\",\"stok_produk.retur.tambah\",\"stok_produk.distribusi.index\",\"stok_produk.distribusi.data\",\"finance.finance.menu\",\"finance.accounting.data\",\"finance.accounting.tambah\",\"finance.hutang.menu\",\"finance.hutang.catat\",\"finance.hutang.bayar\",\"finance.hutang.daftar\",\"finance.kasbon.menu\",\"finance.kasbon.catat\",\"finance.kasbon.bayar\",\"finance.kasbon.data\",\"finance.pendapatan.data\",\"finance.pendapatan.tambah\",\"finance.claim.index\",\"config.config.index\"]', '[\"master\",\"kasir\",\"produksi\",\"pembelian\",\"gudang\",\"stok_bahan\",\"stok_produk\",\"stok_box\",\"finance\",\"laporan\",\"config\"]', null);

-- ----------------------------
-- Table structure for atombizz_employee_position
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_employee_position`;
CREATE TABLE `atombizz_employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(20) DEFAULT NULL,
  `information` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_employee_position
-- ----------------------------
INSERT INTO `atombizz_employee_position` VALUES ('22', 'Staff Administrasi', 'Hak Akses untuk staff administrasi');
INSERT INTO `atombizz_employee_position` VALUES ('21', 'Accounting', 'Hak Akses untuk akuntan');
INSERT INTO `atombizz_employee_position` VALUES ('20', 'Purchasing (Gudang)', 'Hak Akses untuk gudang');
INSERT INTO `atombizz_employee_position` VALUES ('19', 'Kasir', 'Hak Akses untuk kasir');
INSERT INTO `atombizz_employee_position` VALUES ('18', 'Owner', 'Hak Akses untuk owner');
INSERT INTO `atombizz_employee_position` VALUES ('17', 'Superuser', 'Super Admin');

-- ----------------------------
-- Table structure for atombizz_fast_stock_opname
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_fast_stock_opname`;
CREATE TABLE `atombizz_fast_stock_opname` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rak_code` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `checking_qty` int(11) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT NULL,
  `difference` int(11) DEFAULT NULL,
  `description` longtext,
  `approved_by` varchar(50) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `status` enum('kurang','cocok','lebih') DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `rak_name` varchar(50) DEFAULT NULL,
  `rak_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_fast_stock_opname
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_hutang
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_hutang`;
CREATE TABLE `atombizz_hutang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_hutang
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_inventaris
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_inventaris`;
CREATE TABLE `atombizz_inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_inventaris
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_inventaris_stok
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_inventaris_stok`;
CREATE TABLE `atombizz_inventaris_stok` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `in` bigint(20) DEFAULT NULL,
  `out` bigint(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `userlog` datetime DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `rak_code` varchar(50) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_inventaris_stok
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_karyawan`;
CREATE TABLE `atombizz_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registered` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `identification_number` varchar(255) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `category` enum('parttime','fulltime') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_karyawan
-- ----------------------------
INSERT INTO `atombizz_karyawan` VALUES ('9', '2015-09-02', 'E-201500001', 'charis', '123456789', '2015-09-02', 'Kendalpayak', '0123456789', 'irvancharis@gmail.com', null, null, null, null, null, '1', '10000000', null, 'BOSS', 'fulltime');
INSERT INTO `atombizz_karyawan` VALUES ('11', '2015-09-07', 'E-201500002', 'Mila', '3589572', '1989-06-20', 'Jl. Mawar', '008', 'imah@gmail.com', null, null, null, null, null, '2', '1250000', null, 'Admin Pusat', null);
INSERT INTO `atombizz_karyawan` VALUES ('12', '2015-09-07', 'E-201500003', 'Sita', '123', '2015-09-08', 'TEST', '123', '', null, null, null, null, null, '3', '500000', null, 'CS', null);
INSERT INTO `atombizz_karyawan` VALUES ('13', '2015-10-07', 'E-201500004', 'Opik', '77553445453', '1990-01-30', 'Jl. terusan', '0859963356444', '', null, null, null, null, null, '4', '900000', null, 'Kasir Gudang', null);

-- ----------------------------
-- Table structure for atombizz_mix_product
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_mix_product`;
CREATE TABLE `atombizz_mix_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `barcode_blended` varchar(255) DEFAULT NULL,
  `barcode_product` varchar(255) DEFAULT NULL,
  `qty_product` float(15,3) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `category_bahan` enum('mix material','material') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_mix_product
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_module
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_module`;
CREATE TABLE `atombizz_module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) DEFAULT NULL,
  `kode` longtext,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_module
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_penggajian
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_penggajian`;
CREATE TABLE `atombizz_penggajian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_slip` varchar(15) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `gaji` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `casbon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karyawan` (`id_karyawan`) USING BTREE,
  CONSTRAINT `atombizz_penggajian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `atombizz_karyawan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_penggajian
-- ----------------------------
INSERT INTO `atombizz_penggajian` VALUES ('1', 'NS-151007-0', '9', '10000000', '0', '0', '10000000', '2015-10-07');

-- ----------------------------
-- Table structure for atombizz_piutang
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_piutang`;
CREATE TABLE `atombizz_piutang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_piutang
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_product
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_product`;
CREATE TABLE `atombizz_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `type` enum('reguler','blended') DEFAULT 'reguler',
  `min` int(11) DEFAULT NULL,
  `gudang_code` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `cost` float(15,3) DEFAULT NULL,
  `category` enum('BSJ','BJ') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_product
-- ----------------------------
INSERT INTO `atombizz_product` VALUES ('18', 'P_003', 'Sedotan', 'pieces', '1', null, 'reguler', '100', 'P-001', null, null, null);
INSERT INTO `atombizz_product` VALUES ('16', 'P_001', 'Coklat Kacang', 'pieces', '1', null, 'reguler', '100', 'P-001', null, '1500.000', null);
INSERT INTO `atombizz_product` VALUES ('17', 'P_002', 'Coklat Kopi', 'pieces', '1', null, 'reguler', '100', 'P-002', null, '1500.000', null);

-- ----------------------------
-- Table structure for atombizz_product_price
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_product_price`;
CREATE TABLE `atombizz_product_price` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `price` bigint(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_product_price
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_product_specification
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_product_specification`;
CREATE TABLE `atombizz_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT '0',
  `qty` varchar(100) DEFAULT NULL,
  `price1` int(11) DEFAULT NULL,
  `price2` int(11) DEFAULT NULL,
  `price3` int(11) DEFAULT NULL,
  `rak_code` varchar(100) DEFAULT NULL,
  `gudang_code` varchar(100) DEFAULT NULL,
  `supplier_code` varchar(50) DEFAULT NULL,
  `date_active` datetime DEFAULT NULL,
  `max` int(10) DEFAULT '0',
  `tax` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_product_specification
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_purchases
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_purchases`;
CREATE TABLE `atombizz_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) DEFAULT NULL,
  `note` longtext,
  `supplier_code` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(55) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `subtotal` int(25) unsigned zerofill DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `disc_reg_1` int(100) DEFAULT NULL,
  `disc_reg_2` int(100) DEFAULT NULL,
  `total` int(25) DEFAULT NULL,
  `nom_reg_1` int(25) DEFAULT NULL,
  `nom_reg_2` int(25) DEFAULT NULL,
  `urut` int(25) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_purchases
-- ----------------------------
INSERT INTO `atombizz_purchases` VALUES ('10', 'FB.S1-002.151015.01', '125', 'S1-002', 'Gudang Produksi', '2015-10-15', '0000000000000000001500000', 'astro', null, null, null, '0', null, '1500000', '0', null, '1', 'J002013020829');
INSERT INTO `atombizz_purchases` VALUES ('11', 'FB.S1-002.151015.02', '13413', 'S1-002', 'Gudang Produksi', '2015-10-15', '0000000000000000000750000', 'astro', null, null, null, '0', null, '750000', '0', null, '2', 'J002013020829');

-- ----------------------------
-- Table structure for atombizz_purchase_items
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_purchase_items`;
CREATE TABLE `atombizz_purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `tax_amount` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `disc_reg` decimal(25,2) DEFAULT NULL,
  `brand_code` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_purchase_items
-- ----------------------------
INSERT INTO `atombizz_purchase_items` VALUES ('12', 'FB.S1-002.151015.01', '17', 'P_002', 'Coklat Kopi', '500', '1500.00', '0.00', '750000.00', '0.00', '', '5');
INSERT INTO `atombizz_purchase_items` VALUES ('13', 'FB.S1-002.151015.01', '16', 'P_001', 'Coklat Kacang', '500', '1500.00', '0.00', '750000.00', '0.00', '', '5');
INSERT INTO `atombizz_purchase_items` VALUES ('14', 'FB.S1-002.151015.02', '16', 'P_001', 'Coklat Kacang', '500', '1500.00', '0.00', '750000.00', '0.00', '', '5');

-- ----------------------------
-- Table structure for atombizz_rack
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_rack`;
CREATE TABLE `atombizz_rack` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jenis` enum('GBox','GP') DEFAULT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_rack
-- ----------------------------
INSERT INTO `atombizz_rack` VALUES ('21', 'GP', 'P-001', 'Rak Produk 1', 'tes', 'produk', '1');
INSERT INTO `atombizz_rack` VALUES ('22', 'GP', 'P-002', 'Rak Produk 2', 'tes', 'produk', '2');
INSERT INTO `atombizz_rack` VALUES ('23', 'GBox', 'B-001', 'Rak Bok 1', 'Tes', 'box', '1');
INSERT INTO `atombizz_rack` VALUES ('24', 'GBox', 'B-002', 'Rak Bok 2', 'tes', 'box', '2');

-- ----------------------------
-- Table structure for atombizz_retur_out
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_retur_out`;
CREATE TABLE `atombizz_retur_out` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `userlog` datetime DEFAULT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `supplier_code` varchar(30) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `urut` int(20) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_retur_out
-- ----------------------------
INSERT INTO `atombizz_retur_out` VALUES ('1', 'FRO.S3-001.150905.01', '2015-09-05', '12000', '2015-09-05 11:43:09', 'astro', 'S3-001', 'Oke Punya', 'Cabang Galunggung', '1', null);
INSERT INTO `atombizz_retur_out` VALUES ('2', 'FRO.S2-001.150907.01', '2015-09-07', '19000', '2015-09-07 11:48:04', 'astro', 'S2-001', 'Mandiri Powder', 'J002013020829', '1', null);

-- ----------------------------
-- Table structure for atombizz_retur_out_detail
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_retur_out_detail`;
CREATE TABLE `atombizz_retur_out_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `hpp` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `brand_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_retur_out_detail
-- ----------------------------
INSERT INTO `atombizz_retur_out_detail` VALUES ('1', 'FRO.S3-001.150905.01', '1', 'gl', 'Gula', '1', '12000', 'cacat', '4', 'gulaku');
INSERT INTO `atombizz_retur_out_detail` VALUES ('2', 'FRO.S2-001.150907.01', '8', 'ss', 'Susu Bubuk', '1', '19000', 'expired', '1', '');

-- ----------------------------
-- Table structure for atombizz_retur_out_tmp
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_retur_out_tmp`;
CREATE TABLE `atombizz_retur_out_tmp` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `userlog` datetime DEFAULT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `supplier_code` varchar(30) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `hpp` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `urut` int(20) DEFAULT NULL,
  `unit` int(255) DEFAULT NULL,
  `brand_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_retur_out_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_salary
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_salary`;
CREATE TABLE `atombizz_salary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `employee_code` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `gaji_pokok` bigint(20) DEFAULT NULL,
  `tunjangan_lain` bigint(20) DEFAULT NULL,
  `bonus` bigint(20) DEFAULT NULL,
  `hutang` bigint(20) DEFAULT NULL,
  `potongan_lain` bigint(20) DEFAULT NULL,
  `tunjangan_jabatan` bigint(20) DEFAULT NULL,
  `tunjangan_khusus` bigint(20) DEFAULT NULL,
  `tunjangan_pensiun` bigint(20) DEFAULT NULL,
  `fungsional` bigint(20) DEFAULT NULL,
  `tunjangan_beras` bigint(20) DEFAULT NULL,
  `pph_21` bigint(20) DEFAULT NULL,
  `transport` bigint(20) DEFAULT NULL,
  `description` bigint(20) DEFAULT NULL,
  `penerimaan` bigint(20) DEFAULT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_salary
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_selling
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_selling`;
CREATE TABLE `atombizz_selling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashdraw_no` varchar(200) DEFAULT NULL,
  `invoice_no` varchar(55) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(55) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `internal_note` longtext,
  `total` decimal(50,0) DEFAULT NULL,
  `pay` decimal(50,0) DEFAULT NULL,
  `pay_back` decimal(50,0) DEFAULT NULL,
  `tax` decimal(50,0) DEFAULT NULL,
  `inv_discount` decimal(50,0) DEFAULT NULL,
  `total_discount` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `pengiriman` date DEFAULT NULL,
  `status_pengiriman` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_selling
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_selling_cashdraw
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_selling_cashdraw`;
CREATE TABLE `atombizz_selling_cashdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashdraw_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_cash` int(11) DEFAULT NULL,
  `end_cash` int(11) DEFAULT NULL,
  `omset` int(11) DEFAULT NULL,
  `total_cash` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `keterangan` longtext,
  `operator` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_selling_cashdraw
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_selling_items
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_selling_items`;
CREATE TABLE `atombizz_selling_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashdraw` varchar(200) NOT NULL,
  `invoice` varchar(200) DEFAULT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `subtotal` decimal(50,0) NOT NULL,
  `discount_val` decimal(50,0) DEFAULT NULL,
  `discount` int(55) DEFAULT NULL,
  `discount_sub` decimal(50,0) DEFAULT NULL,
  `hpp` decimal(50,0) DEFAULT NULL,
  `tax_val` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_selling_items
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_spoil
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_spoil`;
CREATE TABLE `atombizz_spoil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_spoil
-- ----------------------------
INSERT INTO `atombizz_spoil` VALUES ('1', 'FSP.151015.01', '2015-10-15', '0', '1');

-- ----------------------------
-- Table structure for atombizz_spoil_detail
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_spoil_detail`;
CREATE TABLE `atombizz_spoil_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_spoil_detail
-- ----------------------------
INSERT INTO `atombizz_spoil_detail` VALUES ('1', 'P_001', '2', '0', 'tumpah', '2015-10-15', 'FSP.151015.01', '0', 'Coklat Kacang', 'produk');

-- ----------------------------
-- Table structure for atombizz_spoil_tmp
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_spoil_tmp`;
CREATE TABLE `atombizz_spoil_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_spoil_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_stock_opname
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_stock_opname`;
CREATE TABLE `atombizz_stock_opname` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext,
  `approved_by` varchar(50) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `rule` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_stock_opname
-- ----------------------------
INSERT INTO `atombizz_stock_opname` VALUES ('1', 'STO.J002013020829.151015.01', '2015-10-15', 'tes', 'astro', 'astro', '1', 'J002013020829', 'confirmed');
INSERT INTO `atombizz_stock_opname` VALUES ('2', 'STO.J002013020829.151015.02', '2015-10-15', 'tes', 'astro', 'astro', '2', 'J002013020829', 'confirmed');

-- ----------------------------
-- Table structure for atombizz_stock_opname_detail
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_stock_opname_detail`;
CREATE TABLE `atombizz_stock_opname_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) DEFAULT NULL,
  `rak_code` varchar(30) DEFAULT NULL,
  `rak_name` varchar(50) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `checking_qty` int(10) DEFAULT NULL,
  `stock_qty` int(10) DEFAULT NULL,
  `difference` int(10) DEFAULT NULL,
  `status` enum('cocok','lebih','kurang') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_stock_opname_detail
-- ----------------------------
INSERT INTO `atombizz_stock_opname_detail` VALUES ('1', 'STO.J002013020829.151015.01', 'P-001', null, null, 'P_001', 'Coklat Kacang', '2', '500', '498', 'kurang');
INSERT INTO `atombizz_stock_opname_detail` VALUES ('2', 'STO.J002013020829.151015.02', 'P-002', null, null, 'P_002', 'Coklat Kopi', '485', '500', '15', 'kurang');

-- ----------------------------
-- Table structure for atombizz_suppliers
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_suppliers`;
CREATE TABLE `atombizz_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('K','R') DEFAULT NULL,
  `classification` enum('3','2','1') DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `pic_name` varchar(255) DEFAULT NULL,
  `pic_position` varchar(255) DEFAULT NULL,
  `pic_phone` varchar(255) DEFAULT NULL,
  `pic_email` varchar(255) DEFAULT NULL,
  `registered` date DEFAULT NULL,
  `account_code` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `last_num` int(100) DEFAULT NULL,
  `last_active` date DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `state` varchar(55) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_suppliers
-- ----------------------------
INSERT INTO `atombizz_suppliers` VALUES ('3', null, '2', '1', 'S2-001', 'Mandiri Powder', 'jl. surabaya', '0853927434', 'BCA', '018986468', 'transfer', 'Luhur', 'Distributor', '088733789', '', '2015-09-07', null, '1', '4', '2015-10-13', null, null, null, null, null, null, null, null, null);
INSERT INTO `atombizz_suppliers` VALUES ('2', null, '1', '1', 'S1-001', 'Cands Choco', 'Jakarta', '0853927434', 'Mandiri', '1232982738782', 'transfer', 'Ahmad', 'Distributor', '0487564937', '', '2015-09-07', null, '1', '4', '2015-10-13', null, null, null, null, null, null, null, null, null);
INSERT INTO `atombizz_suppliers` VALUES ('4', null, '3', '1', 'S3-001', 'Oke Punya', 'jl', '089736975975', 'BCA', '', 'cash', 'Roni', 'Distributor', '0824567898', '', '2015-09-03', null, '1', '3', '2015-10-12', null, null, null, null, null, null, null, null, null);
INSERT INTO `atombizz_suppliers` VALUES ('6', null, '2', '2', 'S2-002', 'UD Makmur Jaya', 'Jl. surabaya', '0859963356444', 'Mandiri', '1232982738782', 'transfer', 'Ahmad', 'Distributor', '0824567898', '', '2015-10-08', null, '1', '1', '2015-10-13', null, null, null, null, null, null, null, null, null);
INSERT INTO `atombizz_suppliers` VALUES ('7', null, '1', '2', 'S1-002', 'Gudang Produksi', 'Jl. Nama No 2', '020852052001', 'BRI', '532453442341564', 'cash', 'Fadhel', 'Manajer', '05302314651069', '', '2015-10-13', null, '1', '3', '2015-10-15', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for atombizz_tmp_detail_distribution
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_detail_distribution`;
CREATE TABLE `atombizz_tmp_detail_distribution` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `branch_code` varchar(50) DEFAULT NULL,
  `branch_name` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `hpp` decimal(50,2) DEFAULT NULL,
  `urut` int(25) DEFAULT NULL,
  `pc_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_detail_distribution
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_tmp_detail_jual
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_detail_jual`;
CREATE TABLE `atombizz_tmp_detail_jual` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cashdraw` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `status` enum('temporary','suspended','void') DEFAULT 'temporary',
  `code` varchar(200) DEFAULT NULL,
  `item` longtext,
  `qty` int(11) DEFAULT NULL,
  `cost` bigint(20) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `subtotal` varchar(10) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `discount` int(50) DEFAULT NULL,
  `discount_nominal` bigint(50) DEFAULT NULL,
  `tax_nominal` bigint(50) DEFAULT NULL,
  `subdiscount` bigint(50) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `idcustomer` varchar(50) DEFAULT NULL,
  `namacustomer` varchar(50) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_detail_jual
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_tmp_detail_purchases
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_detail_purchases`;
CREATE TABLE `atombizz_tmp_detail_purchases` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `warehouse_id` varchar(11) DEFAULT NULL,
  `supplier_code` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `unit_price` bigint(20) DEFAULT NULL,
  `tax_amount` decimal(20,2) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `disc_reg` decimal(11,2) DEFAULT NULL,
  `hpp` decimal(50,2) DEFAULT NULL,
  `urut` int(25) DEFAULT NULL,
  `pc_code` varchar(50) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `brand_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_detail_purchases
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_tmp_mutasi
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_mutasi`;
CREATE TABLE `atombizz_tmp_mutasi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reference` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `operator` varchar(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `rak_code` varchar(30) DEFAULT NULL,
  `rak_name` varchar(50) DEFAULT NULL,
  `gudang_code` varchar(30) DEFAULT NULL,
  `gudang_name` varchar(50) DEFAULT NULL,
  `rak_code_dest` varchar(50) DEFAULT NULL,
  `gudang_code_dest` varchar(50) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_mutasi
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_tmp_print
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_print`;
CREATE TABLE `atombizz_tmp_print` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `rak_code` varchar(50) DEFAULT NULL,
  `rak_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_print
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_tmp_reference_payment
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_tmp_reference_payment`;
CREATE TABLE `atombizz_tmp_reference_payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_tmp_reference_payment
-- ----------------------------

-- ----------------------------
-- Table structure for atombizz_warehouses_stok
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_warehouses_stok`;
CREATE TABLE `atombizz_warehouses_stok` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `in` float(15,3) DEFAULT NULL,
  `out` float(15,3) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `userlog` datetime DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `rak_code` varchar(50) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_warehouses_stok
-- ----------------------------
INSERT INTO `atombizz_warehouses_stok` VALUES ('57', '2015-10-15', 'pembelian', 'FB.S1-002.151015.01', '500.000', '0.000', 'Pembelian dengan referensi no FB.S1-002.151015.01', '2015-10-15 11:35:46', 'astro', 'P-002', 'P_002', 'J002013020829');
INSERT INTO `atombizz_warehouses_stok` VALUES ('58', '2015-10-15', 'pembelian', 'FB.S1-002.151015.01', '500.000', '0.000', 'Pembelian dengan referensi no FB.S1-002.151015.01', '2015-10-15 11:35:46', 'astro', 'P-001', 'P_001', 'J002013020829');
INSERT INTO `atombizz_warehouses_stok` VALUES ('59', '2015-10-15', 'spoil', 'FSP.151015.01', '0.000', '2.000', 'Spoil dengan referensi no FSP.151015.01', '2015-10-15 11:36:47', 'astro', null, 'P_001', 'J002013020829');
INSERT INTO `atombizz_warehouses_stok` VALUES ('60', '2015-10-15', 'spoil', 'FSP.151015.01', '2.000', '0.000', 'Spoil dengan referensi no FSP.151015.01', '2015-10-15 11:36:47', 'astro', 'spoil', 'P_001', 'J002013020829');
INSERT INTO `atombizz_warehouses_stok` VALUES ('61', '2015-10-15', 'opname', 'STO.J002013020829.151015.01', '0.000', '498.000', 'Opname confirmation : tes', '2015-10-15 11:39:59', 'astro', 'P-001', 'P_001', null);
INSERT INTO `atombizz_warehouses_stok` VALUES ('62', '2015-10-15', 'opname', 'STO.J002013020829.151015.02', '0.000', '15.000', 'Opname confirmation : tes', '2015-10-15 11:42:00', 'astro', 'P-002', 'P_002', null);
INSERT INTO `atombizz_warehouses_stok` VALUES ('63', '2015-10-15', 'pembelian', 'FB.S1-002.151015.02', '500.000', '0.000', 'Pembelian dengan referensi no FB.S1-002.151015.02', '2015-10-15 11:49:14', 'astro', 'P-001', 'P_001', 'J002013020829');
INSERT INTO `atombizz_warehouses_stok` VALUES ('64', '2015-10-15', 'produksi', null, '0.000', '500.000', null, null, null, 'P-001', 'P_001', null);
INSERT INTO `atombizz_warehouses_stok` VALUES ('65', '2015-10-15', 'produksi', null, '0.000', '375.000', null, null, null, 'P-002', 'P_002', null);

-- ----------------------------
-- Table structure for atombizz_warehouses_stok_datang
-- ----------------------------
DROP TABLE IF EXISTS `atombizz_warehouses_stok_datang`;
CREATE TABLE `atombizz_warehouses_stok_datang` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `in` bigint(20) DEFAULT NULL,
  `out` bigint(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `userlog` datetime DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `rak_code` varchar(50) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `arrival` varchar(10) DEFAULT 'otw',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atombizz_warehouses_stok_datang
-- ----------------------------

-- ----------------------------
-- Table structure for box
-- ----------------------------
DROP TABLE IF EXISTS `box`;
CREATE TABLE `box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) DEFAULT NULL,
  `nama_box` varchar(250) DEFAULT NULL,
  `harga` int(11) DEFAULT '0',
  `rak_code` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of box
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `twitter` varchar(20) DEFAULT NULL,
  `status` enum('non member','member') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------

-- ----------------------------
-- Table structure for detail_box
-- ----------------------------
DROP TABLE IF EXISTS `detail_box`;
CREATE TABLE `detail_box` (
  `code_box` varchar(11) DEFAULT NULL,
  `code_produk` varchar(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_box
-- ----------------------------
INSERT INTO `detail_box` VALUES ('Box_1', 'P_1', '10');

-- ----------------------------
-- Table structure for detil-penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detil-penjualan`;
CREATE TABLE `detil-penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id-penjualan` int(10) unsigned DEFAULT NULL,
  `id-menu` int(10) unsigned DEFAULT NULL,
  `hpp` float(15,3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `printed` enum('0','1') DEFAULT '0',
  `payoff` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `menu` (`id-menu`) USING BTREE,
  KEY `penjualan` (`id-penjualan`) USING BTREE,
  CONSTRAINT `detil-penjualan_ibfk_1` FOREIGN KEY (`id-menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detil-penjualan_ibfk_2` FOREIGN KEY (`id-penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detil-penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for kategori-menu
-- ----------------------------
DROP TABLE IF EXISTS `kategori-menu`;
CREATE TABLE `kategori-menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `type` enum('minuman','makanan') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kategori-menu
-- ----------------------------
INSERT INTO `kategori-menu` VALUES ('1', 'makanan', 'makanan');
INSERT INTO `kategori-menu` VALUES ('2', 'minuman', 'minuman');

-- ----------------------------
-- Table structure for meja
-- ----------------------------
DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meja
-- ----------------------------
INSERT INTO `meja` VALUES ('1', 'LUA', 'Meja Luar', '5');
INSERT INTO `meja` VALUES ('2', 'DAL', 'Meja Dalam', '5');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategori` int(10) unsigned DEFAULT NULL,
  `rak_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('88', 'BX_B-001', 'Coklat Kacang', null, '40000', '0', 'B-001');
INSERT INTO `menu` VALUES ('89', 'BX_B-002', 'Coklat Kopi', null, '40000', '0', 'B-002');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice-code` varchar(15) NOT NULL,
  `no-invoice` int(10) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `meja` varchar(9) DEFAULT NULL,
  `meja-lain` varchar(255) DEFAULT 'lone',
  `cash` enum('0','2','1') DEFAULT '1',
  `lunas` enum('0','1') DEFAULT '0',
  `tagihan` int(11) DEFAULT '0',
  `discount` int(11) DEFAULT '0',
  `bayar` int(11) DEFAULT '0',
  `note` longtext,
  `operator` int(10) unsigned DEFAULT NULL,
  `debet-claimed` enum('no','yes') DEFAULT 'no',
  `id-cashdraw` int(11) DEFAULT NULL,
  `id-cust` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('1', 'TR24151015-1', null, '2015-10-15', 'Take-away', 'lone', '1', '0', '0', '0', '0', null, null, 'no', null, null);

-- ----------------------------
-- Table structure for produksi
-- ----------------------------
DROP TABLE IF EXISTS `produksi`;
CREATE TABLE `produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_product` varchar(255) DEFAULT NULL,
  `in` int(11) DEFAULT '0',
  `out` int(11) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of produksi
-- ----------------------------
INSERT INTO `produksi` VALUES ('1', '2015-10-15', '88', '20', '0', 'produksi');
INSERT INTO `produksi` VALUES ('2', '2015-10-15', '89', '15', '0', 'produksi');

-- ----------------------------
-- Table structure for reservasi
-- ----------------------------
DROP TABLE IF EXISTS `reservasi`;
CREATE TABLE `reservasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `phone` varchar(15) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `meja` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservasi
-- ----------------------------
INSERT INTO `reservasi` VALUES ('1', '', '', '', '00:00:00', 'Take away', '2015-09-08', '0');
INSERT INTO `reservasi` VALUES ('2', '', '', '', '00:00:00', 'Take away', '2015-09-08', '0');

-- ----------------------------
-- Table structure for temp_sync
-- ----------------------------
DROP TABLE IF EXISTS `temp_sync`;
CREATE TABLE `temp_sync` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(255) DEFAULT NULL,
  `insert_id` varchar(255) DEFAULT NULL,
  `pk` varchar(255) DEFAULT NULL,
  `query` longtext,
  `action` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `sync` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of temp_sync
-- ----------------------------
INSERT INTO `temp_sync` VALUES ('1', 'atombizz_warehouses_stok', '1', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-02\',\'Cabang Galunggung\',\'Pembelian dengan referensi no FB.S3-001.150902.01\',5000,\'astro\',0,\'gl\',\'G-001\',\'FB.S3-001.150902.01\',\'pembelian\',\'2015-09-02 13:37:37\')', 'insert', '2015-09-02', '13:37:37', 'no');
INSERT INTO `temp_sync` VALUES ('2', 'atombizz_warehouses_stok', '2', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'\',\'Cabang Galunggung\',\'Pembelian dengan referensi no \',5000,\'astro\',0,\'ck\',\'G-001\',\'\',\'pembelian\',\'2015-09-02 13:44:11\')', 'insert', '2015-09-02', '13:44:11', 'no');
INSERT INTO `temp_sync` VALUES ('3', 'atombizz_warehouses_stok', '3', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-05\',\'Cabang Galunggung\',\'Retur Keluar dengan referensi no FRO.S3-001.150905.01\',0,\'astro\',1000,\'gl\',\'G-001\',\'FRO.S3-001.150905.01\',\'retur out\',\'2015-09-05 11:43:09\')', 'insert', '2015-09-05', '11:43:09', 'no');
INSERT INTO `temp_sync` VALUES ('4', 'atombizz_warehouses_stok', '4', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-04\',\'Cabang Galunggung\',\'Spoil dengan referensi no FSP.150904.01\',0,\'astro\',\'500\',\'gl\',\'G-001\',\'FSP.150904.01\',\'spoil\',\'2015-09-05 12:16:44\'), (\'2015-09-04\',\'Cabang Galunggung\',\'Spoil dengan referensi no FSP.150904.01\',\'500\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150904.01\',\'spoil\',\'2015-09-05 12:16:44\')', 'insert', '2015-09-05', '12:16:44', 'no');
INSERT INTO `temp_sync` VALUES ('5', 'atombizz_warehouses_stok', '5', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-04\',\'Cabang Galunggung\',\'Spoil dengan referensi no FSP.150904.01\',0,\'astro\',\'500\',\'gl\',\'G-001\',\'FSP.150904.01\',\'spoil\',\'2015-09-05 12:16:44\'), (\'2015-09-04\',\'Cabang Galunggung\',\'Spoil dengan referensi no FSP.150904.01\',\'500\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150904.01\',\'spoil\',\'2015-09-05 12:16:44\')', 'insert', '2015-09-05', '12:16:44', 'no');
INSERT INTO `temp_sync` VALUES ('6', 'atombizz_warehouses_stok', '6', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150907.01\',5000,\'astro\',0,\'ck\',\'G-001\',\'FB.S1-001.150907.01\',\'pembelian\',\'2015-09-07 11:38:00\'), (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150907.01\',5000,\'astro\',0,\'ckb\',\'G-001\',\'FB.S1-001.150907.01\',\'pembelian\',\'2015-09-07 11:38:00\')', 'insert', '2015-09-07', '11:38:00', 'no');
INSERT INTO `temp_sync` VALUES ('7', 'atombizz_warehouses_stok', '7', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150907.01\',5000,\'astro\',0,\'ck\',\'G-001\',\'FB.S1-001.150907.01\',\'pembelian\',\'2015-09-07 11:38:00\'), (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150907.01\',5000,\'astro\',0,\'ckb\',\'G-001\',\'FB.S1-001.150907.01\',\'pembelian\',\'2015-09-07 11:38:00\')', 'insert', '2015-09-07', '11:38:00', 'no');
INSERT INTO `temp_sync` VALUES ('8', 'atombizz_warehouses_stok', '8', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.150907.01\',1750,\'astro\',0,\'nt\',\'G-001\',\'FB.S2-001.150907.01\',\'pembelian\',\'2015-09-07 11:40:10\'), (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.150907.01\',5000,\'astro\',0,\'ss\',\'G-001\',\'FB.S2-001.150907.01\',\'pembelian\',\'2015-09-07 11:40:10\')', 'insert', '2015-09-07', '11:40:10', 'no');
INSERT INTO `temp_sync` VALUES ('9', 'atombizz_warehouses_stok', '9', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.150907.01\',1750,\'astro\',0,\'nt\',\'G-001\',\'FB.S2-001.150907.01\',\'pembelian\',\'2015-09-07 11:40:10\'), (\'2015-09-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.150907.01\',5000,\'astro\',0,\'ss\',\'G-001\',\'FB.S2-001.150907.01\',\'pembelian\',\'2015-09-07 11:40:10\')', 'insert', '2015-09-07', '11:40:10', 'no');
INSERT INTO `temp_sync` VALUES ('10', 'atombizz_warehouses_stok', '10', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.150907.01\',0,\'astro\',\'50\',\'ck\',\'G-001\',\'FSP.150907.01\',\'spoil\',\'2015-09-07 11:42:39\'), (\'2015-09-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.150907.01\',\'50\',\'astro\',0,\'ck\',\'spoil\',\'FSP.150907.01\',\'spoil\',\'2015-09-07 11:42:39\')', 'insert', '2015-09-07', '11:42:39', 'no');
INSERT INTO `temp_sync` VALUES ('11', 'atombizz_warehouses_stok', '11', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.150907.01\',0,\'astro\',\'50\',\'ck\',\'G-001\',\'FSP.150907.01\',\'spoil\',\'2015-09-07 11:42:39\'), (\'2015-09-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.150907.01\',\'50\',\'astro\',0,\'ck\',\'spoil\',\'FSP.150907.01\',\'spoil\',\'2015-09-07 11:42:39\')', 'insert', '2015-09-07', '11:42:39', 'no');
INSERT INTO `temp_sync` VALUES ('12', 'atombizz_warehouses_stok', '12', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-07\',\'J002013020829\',\'Retur Keluar dengan referensi no FRO.S2-001.150907.01\',0,\'astro\',1000,\'ss\',\'G-001\',\'FRO.S2-001.150907.01\',\'retur out\',\'2015-09-07 11:48:04\')', 'insert', '2015-09-07', '11:48:04', 'no');
INSERT INTO `temp_sync` VALUES ('13', 'atombizz_warehouses_stok', '13', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-1 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-1\',\'penjualan\',\'2015-09-08 10:03:20\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-1 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-1\',\'penjualan\',\'2015-09-08 10:03:20\')', 'insert', '2015-09-08', '10:03:20', 'no');
INSERT INTO `temp_sync` VALUES ('14', 'atombizz_warehouses_stok', '14', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-1 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-1\',\'penjualan\',\'2015-09-08 10:03:20\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-1 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-1\',\'penjualan\',\'2015-09-08 10:03:20\')', 'insert', '2015-09-08', '10:03:20', 'no');
INSERT INTO `temp_sync` VALUES ('15', 'atombizz_warehouses_stok', '15', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-2 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-2\',\'penjualan\',\'2015-09-08 10:40:46\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-2 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-2\',\'penjualan\',\'2015-09-08 10:40:46\')', 'insert', '2015-09-08', '10:40:46', 'no');
INSERT INTO `temp_sync` VALUES ('16', 'atombizz_warehouses_stok', '16', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-2 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-2\',\'penjualan\',\'2015-09-08 10:40:46\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-2 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-2\',\'penjualan\',\'2015-09-08 10:40:46\')', 'insert', '2015-09-08', '10:40:46', 'no');
INSERT INTO `temp_sync` VALUES ('17', 'atombizz_warehouses_stok', '17', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-3 kepada cabang \',0,\'super admin\',200,\'cp\',\'G-001\',\'TR24150908-3\',\'penjualan\',\'2015-09-08 10:48:50\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-3 kepada cabang \',0,\'super admin\',200,\'ckb\',\'G-001\',\'TR24150908-3\',\'penjualan\',\'2015-09-08 10:48:50\')', 'insert', '2015-09-08', '10:48:50', 'no');
INSERT INTO `temp_sync` VALUES ('18', 'atombizz_warehouses_stok', '18', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-3 kepada cabang \',0,\'super admin\',200,\'cp\',\'G-001\',\'TR24150908-3\',\'penjualan\',\'2015-09-08 10:48:50\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-3 kepada cabang \',0,\'super admin\',200,\'ckb\',\'G-001\',\'TR24150908-3\',\'penjualan\',\'2015-09-08 10:48:50\')', 'insert', '2015-09-08', '10:48:50', 'no');
INSERT INTO `temp_sync` VALUES ('19', 'atombizz_warehouses_stok', '19', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-4 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-4\',\'penjualan\',\'2015-09-08 10:57:22\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-4 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-4\',\'penjualan\',\'2015-09-08 10:57:22\')', 'insert', '2015-09-08', '10:57:22', 'no');
INSERT INTO `temp_sync` VALUES ('20', 'atombizz_warehouses_stok', '20', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-4 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-4\',\'penjualan\',\'2015-09-08 10:57:22\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-4 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-4\',\'penjualan\',\'2015-09-08 10:57:22\')', 'insert', '2015-09-08', '10:57:22', 'no');
INSERT INTO `temp_sync` VALUES ('21', 'atombizz_warehouses_stok', '21', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-5 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-5\',\'penjualan\',\'2015-09-08 10:59:25\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-5 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-5\',\'penjualan\',\'2015-09-08 10:59:25\')', 'insert', '2015-09-08', '10:59:25', 'no');
INSERT INTO `temp_sync` VALUES ('22', 'atombizz_warehouses_stok', '22', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-5 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-5\',\'penjualan\',\'2015-09-08 10:59:25\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-5 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-5\',\'penjualan\',\'2015-09-08 10:59:25\')', 'insert', '2015-09-08', '10:59:25', 'no');
INSERT INTO `temp_sync` VALUES ('23', 'atombizz_warehouses_stok', '23', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\')', 'insert', '2015-09-08', '11:00:33', 'no');
INSERT INTO `temp_sync` VALUES ('24', 'atombizz_warehouses_stok', '24', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\')', 'insert', '2015-09-08', '11:00:33', 'no');
INSERT INTO `temp_sync` VALUES ('25', 'atombizz_warehouses_stok', '25', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\')', 'insert', '2015-09-08', '11:00:33', 'no');
INSERT INTO `temp_sync` VALUES ('26', 'atombizz_warehouses_stok', '26', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-6 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-6\',\'penjualan\',\'2015-09-08 11:00:33\')', 'insert', '2015-09-08', '11:00:33', 'no');
INSERT INTO `temp_sync` VALUES ('27', 'atombizz_warehouses_stok', '27', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('28', 'atombizz_warehouses_stok', '28', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('29', 'atombizz_warehouses_stok', '29', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('30', 'atombizz_warehouses_stok', '30', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('31', 'atombizz_warehouses_stok', '31', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('32', 'atombizz_warehouses_stok', '32', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-7 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-7\',\'penjualan\',\'2015-09-08 11:01:15\')', 'insert', '2015-09-08', '11:01:15', 'no');
INSERT INTO `temp_sync` VALUES ('33', 'atombizz_warehouses_stok', '33', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('34', 'atombizz_warehouses_stok', '34', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('35', 'atombizz_warehouses_stok', '35', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('36', 'atombizz_warehouses_stok', '36', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('37', 'atombizz_warehouses_stok', '37', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('38', 'atombizz_warehouses_stok', '38', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',100,\'ck\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-8 kepada cabang \',0,\'super admin\',40,\'ss\',\'G-001\',\'TR24150908-8\',\'penjualan\',\'2015-09-08 11:02:18\')', 'insert', '2015-09-08', '11:02:18', 'no');
INSERT INTO `temp_sync` VALUES ('39', 'atombizz_warehouses_stok', '39', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\')', 'insert', '2015-09-08', '11:09:59', 'no');
INSERT INTO `temp_sync` VALUES ('40', 'atombizz_warehouses_stok', '40', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\')', 'insert', '2015-09-08', '11:09:59', 'no');
INSERT INTO `temp_sync` VALUES ('41', 'atombizz_warehouses_stok', '41', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\')', 'insert', '2015-09-08', '11:09:59', 'no');
INSERT INTO `temp_sync` VALUES ('42', 'atombizz_warehouses_stok', '42', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-9 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-9\',\'penjualan\',\'2015-09-08 11:09:59\')', 'insert', '2015-09-08', '11:09:59', 'no');
INSERT INTO `temp_sync` VALUES ('43', 'atombizz_warehouses_stok', '43', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-10 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-10\',\'penjualan\',\'2015-09-08 11:10:27\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-10 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-10\',\'penjualan\',\'2015-09-08 11:10:27\')', 'insert', '2015-09-08', '11:10:27', 'no');
INSERT INTO `temp_sync` VALUES ('44', 'atombizz_warehouses_stok', '44', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-10 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-10\',\'penjualan\',\'2015-09-08 11:10:27\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-10 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-10\',\'penjualan\',\'2015-09-08 11:10:27\')', 'insert', '2015-09-08', '11:10:27', 'no');
INSERT INTO `temp_sync` VALUES ('45', 'atombizz_warehouses_stok', '45', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-11 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-11\',\'penjualan\',\'2015-09-08 11:11:14\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-11 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-11\',\'penjualan\',\'2015-09-08 11:11:14\')', 'insert', '2015-09-08', '11:11:14', 'no');
INSERT INTO `temp_sync` VALUES ('46', 'atombizz_warehouses_stok', '46', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-11 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-11\',\'penjualan\',\'2015-09-08 11:11:14\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-11 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-11\',\'penjualan\',\'2015-09-08 11:11:14\')', 'insert', '2015-09-08', '11:11:14', 'no');
INSERT INTO `temp_sync` VALUES ('47', 'atombizz_warehouses_stok', '47', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('48', 'atombizz_warehouses_stok', '48', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('49', 'atombizz_warehouses_stok', '49', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('50', 'atombizz_warehouses_stok', '50', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('51', 'atombizz_warehouses_stok', '51', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('52', 'atombizz_warehouses_stok', '52', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'cp\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',100,\'ckb\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',50,\'ck\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-12 kepada cabang \',0,\'super admin\',20,\'ss\',\'G-001\',\'TR24150908-12\',\'penjualan\',\'2015-09-08 11:13:12\')', 'insert', '2015-09-08', '11:13:12', 'no');
INSERT INTO `temp_sync` VALUES ('53', 'atombizz_warehouses_stok', '53', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-13 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-13\',\'penjualan\',\'2015-09-08 11:18:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-13 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-13\',\'penjualan\',\'2015-09-08 11:18:33\')', 'insert', '2015-09-08', '11:18:33', 'no');
INSERT INTO `temp_sync` VALUES ('54', 'atombizz_warehouses_stok', '54', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-13 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-13\',\'penjualan\',\'2015-09-08 11:18:33\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-13 kepada cabang \',0,\'super admin\',100,\'gl\',\'G-001\',\'TR24150908-13\',\'penjualan\',\'2015-09-08 11:18:33\')', 'insert', '2015-09-08', '11:18:33', 'no');
INSERT INTO `temp_sync` VALUES ('55', 'atombizz_warehouses_stok', '55', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('56', 'atombizz_warehouses_stok', '56', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('57', 'atombizz_warehouses_stok', '57', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('58', 'atombizz_warehouses_stok', '58', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('59', 'atombizz_warehouses_stok', '59', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('60', 'atombizz_warehouses_stok', '60', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',200,\'gl\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Coklat Type A dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',300,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'cp\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Chocopuchino dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',50,\'ckb\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',150,\'ck\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\'), (\'2015-09-08\',\'J002013020829\',\'Penjualan menu Choco Milk dengan no referensi TR24150908-14 kepada cabang \',0,\'super admin\',60,\'ss\',\'G-001\',\'TR24150908-14\',\'penjualan\',\'2015-09-08 11:18:56\')', 'insert', '2015-09-08', '11:18:56', 'no');
INSERT INTO `temp_sync` VALUES ('61', 'atombizz_warehouses_stok', '61', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `out`, `product_code`) VALUES (\'produksi\', 100, \'cp\')', 'insert', '2015-09-08', '13:11:43', 'no');
INSERT INTO `temp_sync` VALUES ('62', 'atombizz_warehouses_stok', '62', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `out`, `product_code`) VALUES (\'produksi\', 50, \'ck\')', 'insert', '2015-09-08', '13:13:01', 'no');
INSERT INTO `temp_sync` VALUES ('63', 'atombizz_warehouses_stok', '63', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `out`, `product_code`) VALUES (\'produksi\', 20, \'ss\')', 'insert', '2015-09-08', '13:13:01', 'no');
INSERT INTO `temp_sync` VALUES ('64', 'atombizz_warehouses_stok', '64', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `in`, `out`, `product_code`) VALUES (\'produksi\', 0, 100, \'gl\')', 'insert', '2015-09-08', '13:14:33', 'no');
INSERT INTO `temp_sync` VALUES ('65', 'atombizz_warehouses_stok', '65', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `in`, `out`, `product_code`) VALUES (\'produksi\', 0, 150, \'ck\')', 'insert', '2015-09-08', '13:14:33', 'no');
INSERT INTO `temp_sync` VALUES ('66', 'atombizz_warehouses_stok', '66', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `in`, `out`, `product_code`) VALUES (\'produksi\', 0, 100, \'gl\')', 'insert', '2015-09-08', '13:15:21', 'no');
INSERT INTO `temp_sync` VALUES ('67', 'atombizz_warehouses_stok', '67', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `in`, `out`, `product_code`) VALUES (\'produksi\', 0, 150, \'ck\')', 'insert', '2015-09-08', '13:15:21', 'no');
INSERT INTO `temp_sync` VALUES ('68', 'atombizz_warehouses_stok', '68', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 100, \'gl\')', 'insert', '2015-09-08', '13:35:40', 'no');
INSERT INTO `temp_sync` VALUES ('69', 'atombizz_warehouses_stok', '69', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 150, \'ck\')', 'insert', '2015-09-08', '13:35:40', 'no');
INSERT INTO `temp_sync` VALUES ('70', 'atombizz_warehouses_stok', '70', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 100, \'gl\')', 'insert', '2015-09-08', '13:36:09', 'no');
INSERT INTO `temp_sync` VALUES ('71', 'atombizz_warehouses_stok', '71', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 150, \'ck\')', 'insert', '2015-09-08', '13:36:09', 'no');
INSERT INTO `temp_sync` VALUES ('72', 'atombizz_warehouses_stok', '72', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150908.01\',10000,\'astro\',0,\'cp\',\'G-001\',\'FB.S1-001.150908.01\',\'pembelian\',\'2015-09-08 13:39:20\')', 'insert', '2015-09-08', '13:39:20', 'no');
INSERT INTO `temp_sync` VALUES ('73', 'atombizz_warehouses_stok', '73', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 25000, \'ckb\')', 'insert', '2015-09-08', '14:11:17', 'no');
INSERT INTO `temp_sync` VALUES ('74', 'atombizz_warehouses_stok', '74', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 25000, \'cp\')', 'insert', '2015-09-08', '14:11:17', 'no');
INSERT INTO `temp_sync` VALUES ('75', 'atombizz_warehouses_stok', '75', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 5000, \'gl\')', 'insert', '2015-09-08', '14:13:23', 'no');
INSERT INTO `temp_sync` VALUES ('76', 'atombizz_warehouses_stok', '76', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 7500, \'ck\')', 'insert', '2015-09-08', '14:13:23', 'no');
INSERT INTO `temp_sync` VALUES ('77', 'atombizz_warehouses_stok', '77', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150908.02\',100000,\'astro\',0,\'ck\',\'G-001\',\'FB.S1-001.150908.02\',\'pembelian\',\'2015-09-08 14:17:25\'), (\'2015-09-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150908.02\',100000,\'astro\',0,\'gl\',\'G-001\',\'FB.S1-001.150908.02\',\'pembelian\',\'2015-09-08 14:17:25\')', 'insert', '2015-09-08', '14:17:25', 'no');
INSERT INTO `temp_sync` VALUES ('78', 'atombizz_warehouses_stok', '78', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150908.02\',100000,\'astro\',0,\'ck\',\'G-001\',\'FB.S1-001.150908.02\',\'pembelian\',\'2015-09-08 14:17:25\'), (\'2015-09-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.150908.02\',100000,\'astro\',0,\'gl\',\'G-001\',\'FB.S1-001.150908.02\',\'pembelian\',\'2015-09-08 14:17:25\')', 'insert', '2015-09-08', '14:17:25', 'no');
INSERT INTO `temp_sync` VALUES ('79', 'atombizz_warehouses_stok', '79', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 500, \'ck\')', 'insert', '2015-09-08', '14:18:26', 'no');
INSERT INTO `temp_sync` VALUES ('80', 'atombizz_warehouses_stok', '80', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 200, \'ss\')', 'insert', '2015-09-08', '14:18:26', 'no');
INSERT INTO `temp_sync` VALUES ('81', 'atombizz_warehouses_stok', '81', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 50, \'ckb\')', 'insert', '2015-09-10', '10:14:13', 'no');
INSERT INTO `temp_sync` VALUES ('82', 'atombizz_warehouses_stok', '82', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 50, \'cp\')', 'insert', '2015-09-10', '10:14:13', 'no');
INSERT INTO `temp_sync` VALUES ('83', 'atombizz_warehouses_stok', '83', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 100, \'gl\')', 'insert', '2015-09-10', '10:15:32', 'no');
INSERT INTO `temp_sync` VALUES ('84', 'atombizz_warehouses_stok', '84', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 150, \'ck\')', 'insert', '2015-09-10', '10:15:33', 'no');
INSERT INTO `temp_sync` VALUES ('85', 'atombizz_warehouses_stok', '85', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 200, \'cp\')', 'insert', '2015-09-10', '14:36:29', 'no');
INSERT INTO `temp_sync` VALUES ('86', 'atombizz_warehouses_stok', '86', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 50, \'ckb\')', 'insert', '2015-09-10', '14:37:59', 'no');
INSERT INTO `temp_sync` VALUES ('87', 'atombizz_warehouses_stok', '87', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'produksi\', \'G-001\', 0, 50, \'cp\')', 'insert', '2015-09-10', '14:37:59', 'no');
INSERT INTO `temp_sync` VALUES ('88', 'atombizz_warehouses_stok', '88', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', NULL, \'5\', 0, NULL)', 'insert', '2015-09-10', '15:34:18', 'no');
INSERT INTO `temp_sync` VALUES ('89', 'atombizz_warehouses_stok', '89', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', NULL, \'5\', 0, NULL)', 'insert', '2015-09-10', '15:35:02', 'no');
INSERT INTO `temp_sync` VALUES ('90', 'atombizz_warehouses_stok', '90', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', NULL, \'5\', 0, NULL)', 'insert', '2015-09-10', '15:35:37', 'no');
INSERT INTO `temp_sync` VALUES ('91', 'atombizz_warehouses_stok', '91', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, NULL)', 'insert', '2015-09-10', '15:36:10', 'no');
INSERT INTO `temp_sync` VALUES ('92', 'atombizz_warehouses_stok', '92', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-10', '15:36:23', 'no');
INSERT INTO `temp_sync` VALUES ('93', 'atombizz_warehouses_stok', '93', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'1\', 0, \'70\')', 'insert', '2015-09-10', '15:37:09', 'no');
INSERT INTO `temp_sync` VALUES ('94', 'atombizz_warehouses_stok', '94', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-10', '15:38:35', 'no');
INSERT INTO `temp_sync` VALUES ('95', 'atombizz_warehouses_stok', '95', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'CK-A\')', 'insert', '2015-09-10', '15:40:02', 'no');
INSERT INTO `temp_sync` VALUES ('96', 'atombizz_warehouses_stok', '96', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-10', '15:49:50', 'no');
INSERT INTO `temp_sync` VALUES ('97', 'atombizz_warehouses_stok', '97', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-11', '10:32:16', 'no');
INSERT INTO `temp_sync` VALUES ('98', 'atombizz_warehouses_stok', '98', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-11', '10:32:27', 'no');
INSERT INTO `temp_sync` VALUES ('99', 'atombizz_warehouses_stok', '99', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-11', '10:34:10', 'no');
INSERT INTO `temp_sync` VALUES ('100', 'atombizz_warehouses_stok', '100', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-11', '10:34:36', 'no');
INSERT INTO `temp_sync` VALUES ('101', 'atombizz_warehouses_stok', '101', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'1\', 0, \'68\')', 'insert', '2015-09-11', '10:37:25', 'no');
INSERT INTO `temp_sync` VALUES ('102', 'atombizz_warehouses_stok', '102', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'1\', 0, \'68\')', 'insert', '2015-09-11', '10:38:01', 'no');
INSERT INTO `temp_sync` VALUES ('103', 'atombizz_warehouses_stok', '103', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'68\')', 'insert', '2015-09-11', '10:39:16', 'no');
INSERT INTO `temp_sync` VALUES ('104', 'atombizz_warehouses_stok', '104', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'1\', 0, \'68\')', 'insert', '2015-09-11', '10:40:04', 'no');
INSERT INTO `temp_sync` VALUES ('105', 'atombizz_warehouses_stok', '105', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'1\', 0, \'68\')', 'insert', '2015-09-11', '10:40:33', 'no');
INSERT INTO `temp_sync` VALUES ('106', 'atombizz_warehouses_stok', '106', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-11', '10:41:13', 'no');
INSERT INTO `temp_sync` VALUES ('107', 'atombizz_warehouses_stok', '107', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-11', '11:10:13', 'no');
INSERT INTO `temp_sync` VALUES ('108', 'atombizz_warehouses_stok', '108', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'12\', 0, \'68\')', 'insert', '2015-09-11', '11:11:49', 'no');
INSERT INTO `temp_sync` VALUES ('109', 'atombizz_warehouses_stok', '109', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-11', '11:13:48', 'no');
INSERT INTO `temp_sync` VALUES ('110', 'atombizz_warehouses_stok', '110', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-11\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'71\')', 'insert', '2015-09-11', '11:15:33', 'no');
INSERT INTO `temp_sync` VALUES ('111', 'atombizz_warehouses_stok', '111', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'0\',\'gl\',\'G-001\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:41:03\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'0\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:41:03\')', 'insert', '2015-09-11', '13:41:03', 'no');
INSERT INTO `temp_sync` VALUES ('112', 'atombizz_warehouses_stok', '112', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'0\',\'gl\',\'G-001\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:41:03\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'0\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:41:03\')', 'insert', '2015-09-11', '13:41:03', 'no');
INSERT INTO `temp_sync` VALUES ('113', 'atombizz_warehouses_stok', '113', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'0\',\'gl\',\'G-001\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:45:38\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'0\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:45:38\')', 'insert', '2015-09-11', '13:45:38', 'no');
INSERT INTO `temp_sync` VALUES ('114', 'atombizz_warehouses_stok', '114', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'0\',\'gl\',\'G-001\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:45:38\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'0\',\'astro\',0,\'gl\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-11 13:45:38\')', 'insert', '2015-09-11', '13:45:38', 'no');
INSERT INTO `temp_sync` VALUES ('115', 'atombizz_warehouses_stok', '115', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.02\',0,\'astro\',\'0\',\'ck\',\'G-001\',\'FSP.150911.02\',\'spoil\',\'2015-09-11 13:47:16\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.02\',\'0\',\'astro\',0,\'ck\',\'spoil\',\'FSP.150911.02\',\'spoil\',\'2015-09-11 13:47:16\')', 'insert', '2015-09-11', '13:47:16', 'no');
INSERT INTO `temp_sync` VALUES ('116', 'atombizz_warehouses_stok', '116', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.02\',0,\'astro\',\'0\',\'ck\',\'G-001\',\'FSP.150911.02\',\'spoil\',\'2015-09-11 13:47:16\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.02\',\'0\',\'astro\',0,\'ck\',\'spoil\',\'FSP.150911.02\',\'spoil\',\'2015-09-11 13:47:16\')', 'insert', '2015-09-11', '13:47:16', 'no');
INSERT INTO `temp_sync` VALUES ('117', 'atombizz_warehouses_stok', '117', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'1\',\'P_CK-M\',NULL,\'FSP.150911.01\',\'spoil\',\'2015-09-12 09:25:51\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'1\',\'astro\',0,\'P_CK-M\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-12 09:25:51\')', 'insert', '2015-09-12', '09:25:51', 'no');
INSERT INTO `temp_sync` VALUES ('118', 'atombizz_warehouses_stok', '118', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',0,\'astro\',\'1\',\'P_CK-M\',NULL,\'FSP.150911.01\',\'spoil\',\'2015-09-12 09:25:51\'), (\'2015-09-11\',\'J002013020829\',\'Spoil dengan referensi no FSP.150911.01\',\'1\',\'astro\',0,\'P_CK-M\',\'spoil\',\'FSP.150911.01\',\'spoil\',\'2015-09-12 09:25:51\')', 'insert', '2015-09-12', '09:25:51', 'no');
INSERT INTO `temp_sync` VALUES ('119', 'atombizz_warehouses_stok', '119', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-12', '10:53:13', 'no');
INSERT INTO `temp_sync` VALUES ('120', 'atombizz_warehouses_stok', '120', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 100, \'gl\')', 'insert', '2015-09-12', '12:00:10', 'no');
INSERT INTO `temp_sync` VALUES ('121', 'atombizz_warehouses_stok', '121', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 200, \'ss\')', 'insert', '2015-09-12', '12:00:10', 'no');
INSERT INTO `temp_sync` VALUES ('122', 'atombizz_warehouses_stok', '122', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 200, \'ckb\')', 'insert', '2015-09-12', '12:00:10', 'no');
INSERT INTO `temp_sync` VALUES ('123', 'atombizz_warehouses_stok', '123', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 50, \'gl\')', 'insert', '2015-09-12', '12:00:45', 'no');
INSERT INTO `temp_sync` VALUES ('124', 'atombizz_warehouses_stok', '124', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 100, \'ss\')', 'insert', '2015-09-12', '12:00:45', 'no');
INSERT INTO `temp_sync` VALUES ('125', 'atombizz_warehouses_stok', '125', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 100, \'ckb\')', 'insert', '2015-09-12', '12:00:45', 'no');
INSERT INTO `temp_sync` VALUES ('126', 'atombizz_warehouses_stok', '126', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'pembelian produk\', NULL, \'10\', 0, \'69\')', 'insert', '2015-09-12', '12:03:48', 'no');
INSERT INTO `temp_sync` VALUES ('127', 'atombizz_warehouses_stok', '127', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'pembelian produk\', \'GP-001\', \'1\', 0, \'68\')', 'insert', '2015-09-12', '12:04:20', 'no');
INSERT INTO `temp_sync` VALUES ('128', 'atombizz_warehouses_stok', '128', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 100, \'gl\')', 'insert', '2015-09-12', '12:24:09', 'no');
INSERT INTO `temp_sync` VALUES ('129', 'atombizz_warehouses_stok', '129', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 200, \'ss\')', 'insert', '2015-09-12', '12:24:09', 'no');
INSERT INTO `temp_sync` VALUES ('130', 'atombizz_warehouses_stok', '130', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-12\', \'produksi\', \'G-001\', 0, 200, \'ckb\')', 'insert', '2015-09-12', '12:24:09', 'no');
INSERT INTO `temp_sync` VALUES ('131', 'atombizz_warehouses_stok', '131', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-12\',\'J002013020829\',\'Spoil dengan referensi no FSP.150912.01\',0,\'astro\',\'1\',\'P_CK-A\',NULL,\'FSP.150912.01\',\'spoil\',\'2015-09-12 12:24:49\'), (\'2015-09-12\',\'J002013020829\',\'Spoil dengan referensi no FSP.150912.01\',\'1\',\'astro\',0,\'P_CK-A\',\'spoil\',\'FSP.150912.01\',\'spoil\',\'2015-09-12 12:24:49\')', 'insert', '2015-09-12', '12:24:49', 'no');
INSERT INTO `temp_sync` VALUES ('132', 'atombizz_warehouses_stok', '132', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-12\',\'J002013020829\',\'Spoil dengan referensi no FSP.150912.01\',0,\'astro\',\'1\',\'P_CK-A\',NULL,\'FSP.150912.01\',\'spoil\',\'2015-09-12 12:24:49\'), (\'2015-09-12\',\'J002013020829\',\'Spoil dengan referensi no FSP.150912.01\',\'1\',\'astro\',0,\'P_CK-A\',\'spoil\',\'FSP.150912.01\',\'spoil\',\'2015-09-12 12:24:49\')', 'insert', '2015-09-12', '12:24:49', 'no');
INSERT INTO `temp_sync` VALUES ('133', 'atombizz_warehouses_stok', '133', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 25, \'gl\')', 'insert', '2015-09-15', '11:52:59', 'no');
INSERT INTO `temp_sync` VALUES ('134', 'atombizz_warehouses_stok', '134', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 50, \'ss\')', 'insert', '2015-09-15', '11:53:00', 'no');
INSERT INTO `temp_sync` VALUES ('135', 'atombizz_warehouses_stok', '135', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 50, \'ckb\')', 'insert', '2015-09-15', '11:53:00', 'no');
INSERT INTO `temp_sync` VALUES ('136', 'atombizz_warehouses_stok', '136', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 25, \'gl\')', 'insert', '2015-09-15', '13:52:25', 'no');
INSERT INTO `temp_sync` VALUES ('137', 'atombizz_warehouses_stok', '137', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 50, \'ss\')', 'insert', '2015-09-15', '13:52:25', 'no');
INSERT INTO `temp_sync` VALUES ('138', 'atombizz_warehouses_stok', '138', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'G-001\', 0, 50, \'ckb\')', 'insert', '2015-09-15', '13:52:25', 'no');
INSERT INTO `temp_sync` VALUES ('139', 'atombizz_warehouses_stok', '139', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-15', '15:26:48', 'no');
INSERT INTO `temp_sync` VALUES ('140', 'atombizz_warehouses_stok', '140', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-15', '15:27:34', 'no');
INSERT INTO `temp_sync` VALUES ('141', 'atombizz_warehouses_stok', '141', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-15', '15:28:07', 'no');
INSERT INTO `temp_sync` VALUES ('142', 'atombizz_warehouses_stok', '142', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-15', '15:28:42', 'no');
INSERT INTO `temp_sync` VALUES ('143', 'atombizz_warehouses_stok', '143', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'pembelian produk\', \'GP-001\', \'5\', 0, \'69\')', 'insert', '2015-09-15', '15:31:06', 'no');
INSERT INTO `temp_sync` VALUES ('144', 'atombizz_warehouses_stok', '1', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_111\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 16:31:25\'), (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_222\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 16:31:25\')', 'insert', '2015-09-15', '16:31:25', 'no');
INSERT INTO `temp_sync` VALUES ('145', 'atombizz_warehouses_stok', '2', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_111\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 16:31:25\'), (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_222\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 16:31:25\')', 'insert', '2015-09-15', '16:31:25', 'no');
INSERT INTO `temp_sync` VALUES ('146', 'atombizz_warehouses_stok', '3', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_111\')', 'insert', '2015-09-15', '16:45:12', 'no');
INSERT INTO `temp_sync` VALUES ('147', 'atombizz_warehouses_stok', '4', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_222\')', 'insert', '2015-09-15', '16:45:12', 'no');
INSERT INTO `temp_sync` VALUES ('148', 'atombizz_warehouses_stok', '5', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_111\')', 'insert', '2015-09-15', '16:47:06', 'no');
INSERT INTO `temp_sync` VALUES ('149', 'atombizz_warehouses_stok', '6', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_222\')', 'insert', '2015-09-15', '16:47:06', 'no');
INSERT INTO `temp_sync` VALUES ('150', 'atombizz_warehouses_stok', '7', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_222\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 17:05:05\'), (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_111\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 17:05:05\')', 'insert', '2015-09-15', '17:05:05', 'no');
INSERT INTO `temp_sync` VALUES ('151', 'atombizz_warehouses_stok', '8', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_222\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 17:05:05\'), (\'2015-09-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.150915.01\',10000,\'astro\',0,\'B_111\',\'GB-001\',\'FB.S3-001.150915.01\',\'pembelian\',\'2015-09-15 17:05:05\')', 'insert', '2015-09-15', '17:05:05', 'no');
INSERT INTO `temp_sync` VALUES ('152', 'atombizz_warehouses_stok', '9', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_111\')', 'insert', '2015-09-15', '17:49:31', 'no');
INSERT INTO `temp_sync` VALUES ('153', 'atombizz_warehouses_stok', '10', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-09-15\', \'produksi\', \'GB-001\', 0, 100, \'B_222\')', 'insert', '2015-09-15', '17:49:31', 'no');
INSERT INTO `temp_sync` VALUES ('154', 'atombizz_warehouses_stok', '11', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-09-16\',\'Opname confirmation : cocok\',0,\'astro\',0,\'P_1\',\'GP-001\',\'STO.J002013020829.150916.01\',\'opname\',\'2015-09-16 06:10:25\')', 'insert', '2015-09-16', '06:10:25', 'no');
INSERT INTO `temp_sync` VALUES ('155', 'atombizz_warehouses_stok', '12', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-05\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.151005.01\',2000,\'astro\',0,\'B_111\',\'GB-001\',\'FB.S2-001.151005.01\',\'pembelian\',\'2015-10-05 11:26:42\')', 'insert', '2015-10-05', '11:26:42', 'no');
INSERT INTO `temp_sync` VALUES ('156', 'atombizz_warehouses_stok', '13', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151007.01\',10000,\'astro\',0,\'B_666\',\'GB-001\',\'FB.S1-002.151007.01\',\'pembelian\',\'2015-10-07 10:51:30\')', 'insert', '2015-10-07', '10:51:30', 'no');
INSERT INTO `temp_sync` VALUES ('157', 'atombizz_warehouses_stok', '14', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.151007.01\',0,\'astro\',\'1000\',\'B_666\',NULL,\'FSP.151007.01\',\'spoil\',\'2015-10-07 11:03:17\'), (\'2015-10-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.151007.01\',\'1000\',\'astro\',0,\'B_666\',\'spoil\',\'FSP.151007.01\',\'spoil\',\'2015-10-07 11:03:17\')', 'insert', '2015-10-07', '11:03:17', 'no');
INSERT INTO `temp_sync` VALUES ('158', 'atombizz_warehouses_stok', '15', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.151007.01\',0,\'astro\',\'1000\',\'B_666\',NULL,\'FSP.151007.01\',\'spoil\',\'2015-10-07 11:03:17\'), (\'2015-10-07\',\'J002013020829\',\'Spoil dengan referensi no FSP.151007.01\',\'1000\',\'astro\',0,\'B_666\',\'spoil\',\'FSP.151007.01\',\'spoil\',\'2015-10-07 11:03:17\')', 'insert', '2015-10-07', '11:03:17', 'no');
INSERT INTO `temp_sync` VALUES ('159', 'atombizz_warehouses_stok', '16', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'Opname confirmation : 1 kg tumpah\',0,\'astro\',\'1000\',\'B_666\',\'GB-001\',\'STO.J002013020829.151007.02\',\'opname\',\'2015-10-07 11:21:03\')', 'insert', '2015-10-07', '11:21:03', 'no');
INSERT INTO `temp_sync` VALUES ('160', 'atombizz_warehouses_stok', '17', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-07\', \'produksi\', \'GB-001\', 0, 5000, \'B_333\')', 'insert', '2015-10-07', '11:28:29', 'no');
INSERT INTO `temp_sync` VALUES ('161', 'atombizz_warehouses_stok', '18', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-07\', \'produksi\', \'GB-001\', 0, 250, \'B_222\')', 'insert', '2015-10-07', '11:28:29', 'no');
INSERT INTO `temp_sync` VALUES ('162', 'atombizz_warehouses_stok', '19', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-07\', \'produksi\', \'GB-001\', 0, 500, \'B_111\')', 'insert', '2015-10-07', '11:28:29', 'no');
INSERT INTO `temp_sync` VALUES ('163', 'atombizz_warehouses_stok', '20', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',200,\'B_333\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',10,\'B_222\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',20,\'B_111\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\')', 'insert', '2015-10-07', '11:53:08', 'no');
INSERT INTO `temp_sync` VALUES ('164', 'atombizz_warehouses_stok', '21', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',200,\'B_333\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',10,\'B_222\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',20,\'B_111\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\')', 'insert', '2015-10-07', '11:53:08', 'no');
INSERT INTO `temp_sync` VALUES ('165', 'atombizz_warehouses_stok', '22', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',200,\'B_333\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',10,\'B_222\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\'), (\'2015-10-07\',\'J002013020829\',\'Penjualan menu Ice Choco Original dengan no referensi TR24151007-1 kepada cabang \',0,\'super admin\',20,\'B_111\',\'GB-001\',\'TR24151007-1\',\'penjualan\',\'2015-10-07 11:53:08\')', 'insert', '2015-10-07', '11:53:08', 'no');
INSERT INTO `temp_sync` VALUES ('166', 'atombizz_warehouses_stok', '23', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-08\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.151008.01\',50000,\'astro\',0,\'B_333\',\'GB-001\',\'FB.S2-001.151008.01\',\'pembelian\',\'2015-10-08 15:04:51\')', 'insert', '2015-10-08', '15:04:51', 'no');
INSERT INTO `temp_sync` VALUES ('167', 'atombizz_warehouses_stok', '24', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-08\',\'J002013020829\',\'Spoil dengan referensi no FSP.151008.01\',0,\'astro\',\'1\',\'P_01\',NULL,\'FSP.151008.01\',\'spoil\',\'2015-10-08 15:23:37\'), (\'2015-10-08\',\'J002013020829\',\'Spoil dengan referensi no FSP.151008.01\',\'1\',\'astro\',0,\'P_01\',\'spoil\',\'FSP.151008.01\',\'spoil\',\'2015-10-08 15:23:37\')', 'insert', '2015-10-08', '15:23:37', 'no');
INSERT INTO `temp_sync` VALUES ('168', 'atombizz_warehouses_stok', '25', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-08\',\'J002013020829\',\'Spoil dengan referensi no FSP.151008.01\',0,\'astro\',\'1\',\'P_01\',NULL,\'FSP.151008.01\',\'spoil\',\'2015-10-08 15:23:37\'), (\'2015-10-08\',\'J002013020829\',\'Spoil dengan referensi no FSP.151008.01\',\'1\',\'astro\',0,\'P_01\',\'spoil\',\'FSP.151008.01\',\'spoil\',\'2015-10-08 15:23:37\')', 'insert', '2015-10-08', '15:23:37', 'no');
INSERT INTO `temp_sync` VALUES ('169', 'atombizz_warehouses_stok', '26', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-08\', \'produksi\', \'GB-001\', 0, 1250, \'B_444\')', 'insert', '2015-10-08', '20:26:32', 'no');
INSERT INTO `temp_sync` VALUES ('170', 'atombizz_warehouses_stok', '27', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-08\', \'produksi\', \'GB-001\', 0, 2600, \'B_B-212\')', 'insert', '2015-10-08', '20:26:32', 'no');
INSERT INTO `temp_sync` VALUES ('171', 'atombizz_warehouses_stok', '28', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 1000, \'B_333\')', 'insert', '2015-10-09', '15:55:23', 'no');
INSERT INTO `temp_sync` VALUES ('172', 'atombizz_warehouses_stok', '29', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 50, \'B_222\')', 'insert', '2015-10-09', '15:55:24', 'no');
INSERT INTO `temp_sync` VALUES ('173', 'atombizz_warehouses_stok', '30', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 100, \'B_111\')', 'insert', '2015-10-09', '15:55:24', 'no');
INSERT INTO `temp_sync` VALUES ('174', 'atombizz_warehouses_stok', '31', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 700, \'B_333\')', 'insert', '2015-10-09', '15:55:56', 'no');
INSERT INTO `temp_sync` VALUES ('175', 'atombizz_warehouses_stok', '32', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 35, \'B_222\')', 'insert', '2015-10-09', '15:55:57', 'no');
INSERT INTO `temp_sync` VALUES ('176', 'atombizz_warehouses_stok', '33', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 70, \'B_111\')', 'insert', '2015-10-09', '15:55:57', 'no');
INSERT INTO `temp_sync` VALUES ('177', 'atombizz_warehouses_stok', '34', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 500, \'B_333\')', 'insert', '2015-10-09', '15:58:07', 'no');
INSERT INTO `temp_sync` VALUES ('178', 'atombizz_warehouses_stok', '35', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 25, \'B_222\')', 'insert', '2015-10-09', '15:58:07', 'no');
INSERT INTO `temp_sync` VALUES ('179', 'atombizz_warehouses_stok', '36', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-09\', \'produksi\', \'GB-001\', 0, 50, \'B_111\')', 'insert', '2015-10-09', '15:58:07', 'no');
INSERT INTO `temp_sync` VALUES ('180', 'atombizz_warehouses_stok', '37', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-12\',\'J002013020829\',\'Pembelian dengan referensi no FB.S3-001.151012.01\',100000,\'astro\',0,\'P_222\',\'GB-001\',\'FB.S3-001.151012.01\',\'pembelian\',\'2015-10-12 13:46:09\')', 'insert', '2015-10-12', '13:46:09', 'no');
INSERT INTO `temp_sync` VALUES ('181', 'atombizz_warehouses_stok', '38', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-12\',\'Opname confirmation : it magic!!! *.*\',\'100\',\'astro\',0,\'P_666\',\'GP-001\',\'STO.J002013020829.151012.01\',\'opname\',\'2015-10-12 14:16:30\')', 'insert', '2015-10-12', '14:16:30', 'no');
INSERT INTO `temp_sync` VALUES ('182', 'atombizz_warehouses_stok', '39', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-12\',\'Opname confirmation : HIlang.... entah kemana\',0,\'astro\',\'1\',\'BX_01\',\'GP-001\',\'STO.J002013020829.151012.02\',\'opname\',\'2015-10-12 14:45:38\')', 'insert', '2015-10-12', '14:45:38', 'no');
INSERT INTO `temp_sync` VALUES ('183', 'atombizz_warehouses_stok', '40', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-002.151013.01\',100,\'astro\',0,\'B_777\',\'GP-001\',\'FB.S2-002.151013.01\',\'pembelian\',\'2015-10-13 11:13:23\')', 'insert', '2015-10-13', '11:13:23', 'no');
INSERT INTO `temp_sync` VALUES ('184', 'atombizz_warehouses_stok', '41', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'Opname confirmation : cocok\',0,\'astro\',0,\'P_01\',\'GP-001\',\'STO.J002013020829.151007.04\',\'opname\',\'2015-10-13 11:19:15\')', 'insert', '2015-10-13', '11:19:15', 'no');
INSERT INTO `temp_sync` VALUES ('185', 'atombizz_warehouses_stok', '42', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-002\', 0, 200, \'P_111\')', 'insert', '2015-10-13', '11:26:53', 'no');
INSERT INTO `temp_sync` VALUES ('186', 'atombizz_warehouses_stok', '43', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-002\', 0, 100, \'P_111\')', 'insert', '2015-10-13', '11:27:15', 'no');
INSERT INTO `temp_sync` VALUES ('187', 'atombizz_warehouses_stok', '44', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-002\', 0, 20, \'P_111\')', 'insert', '2015-10-13', '11:27:32', 'no');
INSERT INTO `temp_sync` VALUES ('188', 'atombizz_warehouses_stok', '45', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-002\', 0, 10, \'P_111\')', 'insert', '2015-10-13', '11:33:50', 'no');
INSERT INTO `temp_sync` VALUES ('189', 'atombizz_warehouses_stok', '46', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-002\', 0, 15, \'P_444\')', 'insert', '2015-10-13', '11:33:51', 'no');
INSERT INTO `temp_sync` VALUES ('190', 'atombizz_warehouses_stok', '47', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151013.01\',500,\'astro\',0,\'B_P-001\',\'GP-001\',\'FB.S1-002.151013.01\',\'pembelian\',\'2015-10-13 12:10:10\'), (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151013.01\',500,\'astro\',0,\'B_P-002\',\'GP-002\',\'FB.S1-002.151013.01\',\'pembelian\',\'2015-10-13 12:10:10\')', 'insert', '2015-10-13', '12:10:10', 'no');
INSERT INTO `temp_sync` VALUES ('191', 'atombizz_warehouses_stok', '48', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151013.01\',500,\'astro\',0,\'B_P-001\',\'GP-001\',\'FB.S1-002.151013.01\',\'pembelian\',\'2015-10-13 12:10:10\'), (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151013.01\',500,\'astro\',0,\'B_P-002\',\'GP-002\',\'FB.S1-002.151013.01\',\'pembelian\',\'2015-10-13 12:10:10\')', 'insert', '2015-10-13', '12:10:10', 'no');
INSERT INTO `temp_sync` VALUES ('192', 'atombizz_warehouses_stok', '49', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'GP-001\', 0, 250, \'B_P-001\')', 'insert', '2015-10-13', '13:33:48', 'no');
INSERT INTO `temp_sync` VALUES ('193', 'atombizz_warehouses_stok', '50', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S2-001.151013.01\',1,\'astro\',0,\'P_C-001\',\'001\',\'FB.S2-001.151013.01\',\'pembelian\',\'2015-10-13 14:51:39\')', 'insert', '2015-10-13', '14:51:39', 'no');
INSERT INTO `temp_sync` VALUES ('194', 'atombizz_warehouses_stok', '51', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-001.151013.01\',500,\'astro\',0,\'P_C-001\',\'001\',\'FB.S1-001.151013.01\',\'pembelian\',\'2015-10-13 14:56:44\')', 'insert', '2015-10-13', '14:56:44', 'no');
INSERT INTO `temp_sync` VALUES ('195', 'atombizz_warehouses_stok', '52', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-13\', \'produksi\', \'001\', 0, 375, \'P_C-001\')', 'insert', '2015-10-13', '14:57:27', 'no');
INSERT INTO `temp_sync` VALUES ('196', 'atombizz_warehouses_stok', '53', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.01\',0,\'astro\',\'1\',\'P_C-001\',NULL,\'FSP.151013.01\',\'spoil\',\'2015-10-13 15:19:50\'), (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.01\',\'1\',\'astro\',0,\'P_C-001\',\'spoil\',\'FSP.151013.01\',\'spoil\',\'2015-10-13 15:19:50\')', 'insert', '2015-10-13', '15:19:50', 'no');
INSERT INTO `temp_sync` VALUES ('197', 'atombizz_warehouses_stok', '54', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.01\',0,\'astro\',\'1\',\'P_C-001\',NULL,\'FSP.151013.01\',\'spoil\',\'2015-10-13 15:19:50\'), (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.01\',\'1\',\'astro\',0,\'P_C-001\',\'spoil\',\'FSP.151013.01\',\'spoil\',\'2015-10-13 15:19:50\')', 'insert', '2015-10-13', '15:19:50', 'no');
INSERT INTO `temp_sync` VALUES ('198', 'atombizz_warehouses_stok', '55', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.02\',0,\'astro\',\'2\',\'BX_BC-001\',NULL,\'FSP.151013.02\',\'spoil\',\'2015-10-13 15:33:05\'), (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.02\',\'2\',\'astro\',0,\'BX_BC-001\',\'spoil\',\'FSP.151013.02\',\'spoil\',\'2015-10-13 15:33:05\')', 'insert', '2015-10-13', '15:33:05', 'no');
INSERT INTO `temp_sync` VALUES ('199', 'atombizz_warehouses_stok', '56', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.02\',0,\'astro\',\'2\',\'BX_BC-001\',NULL,\'FSP.151013.02\',\'spoil\',\'2015-10-13 15:33:05\'), (\'2015-10-13\',\'J002013020829\',\'Spoil dengan referensi no FSP.151013.02\',\'2\',\'astro\',0,\'BX_BC-001\',\'spoil\',\'FSP.151013.02\',\'spoil\',\'2015-10-13 15:33:05\')', 'insert', '2015-10-13', '15:33:05', 'no');
INSERT INTO `temp_sync` VALUES ('200', 'atombizz_warehouses_stok', '57', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151015.01\',500,\'astro\',0,\'P_002\',\'P-002\',\'FB.S1-002.151015.01\',\'pembelian\',\'2015-10-15 11:35:46\'), (\'2015-10-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151015.01\',500,\'astro\',0,\'P_001\',\'P-001\',\'FB.S1-002.151015.01\',\'pembelian\',\'2015-10-15 11:35:46\')', 'insert', '2015-10-15', '11:35:46', 'no');
INSERT INTO `temp_sync` VALUES ('201', 'atombizz_warehouses_stok', '58', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151015.01\',500,\'astro\',0,\'P_002\',\'P-002\',\'FB.S1-002.151015.01\',\'pembelian\',\'2015-10-15 11:35:46\'), (\'2015-10-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151015.01\',500,\'astro\',0,\'P_001\',\'P-001\',\'FB.S1-002.151015.01\',\'pembelian\',\'2015-10-15 11:35:46\')', 'insert', '2015-10-15', '11:35:46', 'no');
INSERT INTO `temp_sync` VALUES ('202', 'atombizz_warehouses_stok', '59', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'J002013020829\',\'Spoil dengan referensi no FSP.151015.01\',0,\'astro\',\'2\',\'P_001\',NULL,\'FSP.151015.01\',\'spoil\',\'2015-10-15 11:36:47\'), (\'2015-10-15\',\'J002013020829\',\'Spoil dengan referensi no FSP.151015.01\',\'2\',\'astro\',0,\'P_001\',\'spoil\',\'FSP.151015.01\',\'spoil\',\'2015-10-15 11:36:47\')', 'insert', '2015-10-15', '11:36:47', 'no');
INSERT INTO `temp_sync` VALUES ('203', 'atombizz_warehouses_stok', '60', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'J002013020829\',\'Spoil dengan referensi no FSP.151015.01\',0,\'astro\',\'2\',\'P_001\',NULL,\'FSP.151015.01\',\'spoil\',\'2015-10-15 11:36:47\'), (\'2015-10-15\',\'J002013020829\',\'Spoil dengan referensi no FSP.151015.01\',\'2\',\'astro\',0,\'P_001\',\'spoil\',\'FSP.151015.01\',\'spoil\',\'2015-10-15 11:36:47\')', 'insert', '2015-10-15', '11:36:47', 'no');
INSERT INTO `temp_sync` VALUES ('204', 'atombizz_warehouses_stok', '61', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'Opname confirmation : tes\',0,\'astro\',\'498\',\'P_001\',\'P-001\',\'STO.J002013020829.151015.01\',\'opname\',\'2015-10-15 11:39:59\')', 'insert', '2015-10-15', '11:39:59', 'no');
INSERT INTO `temp_sync` VALUES ('205', 'atombizz_warehouses_stok', '62', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'Opname confirmation : tes\',0,\'astro\',\'15\',\'P_002\',\'P-002\',\'STO.J002013020829.151015.02\',\'opname\',\'2015-10-15 11:42:00\')', 'insert', '2015-10-15', '11:42:00', 'no');
INSERT INTO `temp_sync` VALUES ('206', 'atombizz_warehouses_stok', '63', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `dept`, `description`, `in`, `operator`, `out`, `product_code`, `rak_code`, `reference`, `status`, `userlog`) VALUES (\'2015-10-15\',\'J002013020829\',\'Pembelian dengan referensi no FB.S1-002.151015.02\',500,\'astro\',0,\'P_001\',\'P-001\',\'FB.S1-002.151015.02\',\'pembelian\',\'2015-10-15 11:49:14\')', 'insert', '2015-10-15', '11:49:14', 'no');
INSERT INTO `temp_sync` VALUES ('207', 'atombizz_warehouses_stok', '64', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-15\', \'produksi\', \'P-001\', 0, 500, \'P_001\')', 'insert', '2015-10-15', '11:49:40', 'no');
INSERT INTO `temp_sync` VALUES ('208', 'atombizz_warehouses_stok', '65', 'id', 'INSERT INTO `atombizz_warehouses_stok` (`date`, `status`, `rak_code`, `in`, `out`, `product_code`) VALUES (\'2015-10-15\', \'produksi\', \'P-002\', 0, 375, \'P_002\')', 'insert', '2015-10-15', '11:50:12', 'no');

-- ----------------------------
-- Table structure for tmp-personal
-- ----------------------------
DROP TABLE IF EXISTS `tmp-personal`;
CREATE TABLE `tmp-personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id-penjualan` int(10) unsigned DEFAULT NULL,
  `id-menu` int(10) unsigned DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu` (`id-menu`) USING BTREE,
  KEY `penjualan` (`id-penjualan`) USING BTREE,
  CONSTRAINT `tmp-personal_ibfk_1` FOREIGN KEY (`id-menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tmp-personal_ibfk_2` FOREIGN KEY (`id-penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tmp-personal
-- ----------------------------

-- ----------------------------
-- View structure for view_accounting_validation
-- ----------------------------
DROP VIEW IF EXISTS `view_accounting_validation`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_accounting_validation` AS select `atombizz_accounting_buku_besar`.`id` AS `id`,`atombizz_accounting_buku_besar`.`kode` AS `kode`,`atombizz_accounting_buku_besar`.`no_referensi` AS `no_referensi`,`atombizz_accounting_buku_besar`.`tanggal` AS `tanggal`,`atombizz_accounting_buku_besar`.`keterangan` AS `keterangan`,`atombizz_accounting_buku_besar`.`no_akun` AS `no_akun`,`atombizz_accounting_master_akun`.`name` AS `akun_name`,`atombizz_accounting_buku_besar`.`debit` AS `debit`,`atombizz_accounting_buku_besar`.`kredit` AS `kredit`,`atombizz_accounting_buku_besar`.`faktur` AS `faktur`,`atombizz_accounting_buku_besar`.`dept` AS `dept`,`atombizz_accounting_buku_besar`.`person` AS `person`,`atombizz_accounting_buku_besar`.`valid` AS `valid`,`atombizz_accounting_buku_besar`.`urut` AS `urut` from (`atombizz_accounting_buku_besar` join `atombizz_accounting_master_akun` on((`atombizz_accounting_master_akun`.`code` = `atombizz_accounting_buku_besar`.`no_akun`))) where (`atombizz_accounting_buku_besar`.`faktur` <> '') order by `atombizz_accounting_buku_besar`.`tanggal` ;

-- ----------------------------
-- View structure for view_bayar_personal
-- ----------------------------
DROP VIEW IF EXISTS `view_bayar_personal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_bayar_personal` AS select `tmp-personal`.`id` AS `id`,`menu`.`nama` AS `nama`,`tmp-personal`.`qty` AS `qty`,`tmp-personal`.`total` AS `total`,`penjualan`.`meja` AS `meja`,`tmp-personal`.`id-penjualan` AS `id-penjualan`,`penjualan`.`date` AS `date`,`tmp-personal`.`harga` AS `harga` from ((`tmp-personal` join `penjualan` on((`tmp-personal`.`id-penjualan` = `penjualan`.`id`))) join `menu` on((`tmp-personal`.`id-menu` = `menu`.`id`))) where (`penjualan`.`lunas` = '0') ;

-- ----------------------------
-- View structure for view_blended
-- ----------------------------
DROP VIEW IF EXISTS `view_blended`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_blended` AS select `atombizz_blended_product`.`id` AS `id`,`atombizz_blended_product`.`barcode_blended` AS `barcode_blended`,`atombizz_blended_product`.`barcode_product` AS `id_product`,`atombizz_blended_product`.`qty_product` AS `qty_product`,`master_blended`.`name` AS `name_blended`,`master_product`.`name` AS `name_list`,`master_blended`.`id` AS `id_blended`,`master_product`.`code` AS `barcode_product` from ((`atombizz_blended_product` join `atombizz_product` `master_blended` on((`master_blended`.`code` = `atombizz_blended_product`.`barcode_blended`))) join `atombizz_product` `master_product` on((`master_product`.`code` = `atombizz_blended_product`.`barcode_product`))) ;

-- ----------------------------
-- View structure for view_blended_detail
-- ----------------------------
DROP VIEW IF EXISTS `view_blended_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_blended_detail` AS select `atombizz_blended_product`.`id` AS `id`,`atombizz_blended_product`.`barcode_blended` AS `barcode_blended`,`atombizz_blended_product`.`barcode_product` AS `id_product`,`atombizz_blended_product`.`qty_product` AS `qty_product`,`master_blended`.`name` AS `name_blended`,`master_product`.`name` AS `name_list`,`master_blended`.`id` AS `id_blended`,`master_product`.`code` AS `barcode_product` from ((`atombizz_blended_product` join `atombizz_product` `master_blended` on((`master_blended`.`code` = `atombizz_blended_product`.`barcode_blended`))) join `atombizz_product` `master_product` on((`master_product`.`id` = `atombizz_blended_product`.`barcode_product`))) ;

-- ----------------------------
-- View structure for view_distribution
-- ----------------------------
DROP VIEW IF EXISTS `view_distribution`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_distribution` AS select `atombizz_distribution_items`.`reference_no` AS `reference_no`,`atombizz_distribution_items`.`product_code` AS `product_code`,`atombizz_distribution_items`.`product_name` AS `product_name`,`atombizz_distribution_items`.`quantity` AS `quantity`,`atombizz_distribution_items`.`hpp` AS `hpp`,`atombizz_distribution`.`id` AS `id`,`atombizz_converter`.`nama` AS `unit` from ((`atombizz_distribution_items` join `atombizz_distribution` on((`atombizz_distribution`.`reference_no` = `atombizz_distribution_items`.`reference_no`))) join `atombizz_converter` on((`atombizz_converter`.`id` = `atombizz_distribution_items`.`unit`))) ;

-- ----------------------------
-- View structure for view_employee
-- ----------------------------
DROP VIEW IF EXISTS `view_employee`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_employee` AS select `atombizz_employee`.`id` AS `id`,`atombizz_employee`.`group` AS `group`,`atombizz_employee`.`nama` AS `nama`,`atombizz_employee`.`telp` AS `telp`,`atombizz_employee`.`alamat` AS `alamat`,`atombizz_employee`.`uname` AS `uname`,`atombizz_employee`.`upass` AS `upass`,`atombizz_employee`.`workstation` AS `workstation`,`atombizz_employee`.`gaji` AS `gaji`,`atombizz_employee`.`status` AS `status`,`atombizz_employee`.`last_login` AS `last_login`,`atombizz_employee_position`.`group` AS `jabatan`,`atombizz_employee_access`.`module` AS `module`,`atombizz_employee`.`email` AS `email`,`atombizz_employee`.`no_ktp` AS `no_ktp`,`atombizz_employee`.`nik` AS `nik`,`atombizz_employee`.`tgl_lahir` AS `tgl_lahir`,`atombizz_employee`.`status_alumni` AS `status_alumni`,`atombizz_employee`.`tahun` AS `tahun`,`atombizz_employee`.`image` AS `image`,`atombizz_employee`.`compliment` AS `compliment` from ((`atombizz_employee_position` join `atombizz_employee` on((`atombizz_employee_position`.`id` = `atombizz_employee`.`group`))) left join `atombizz_employee_access` on((`atombizz_employee_access`.`position_id` = `atombizz_employee_position`.`id`))) ;

-- ----------------------------
-- View structure for view_faktur_pembelian
-- ----------------------------
DROP VIEW IF EXISTS `view_faktur_pembelian`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_faktur_pembelian` AS select `atombizz_accounting_buku_besar`.`faktur` AS `faktur`,`atombizz_accounting_buku_besar`.`no_akun` AS `no_akun`,sum(`atombizz_accounting_buku_besar`.`debit`) AS `debit`,sum(`atombizz_accounting_buku_besar`.`kredit`) AS `kredit`,(sum(`atombizz_accounting_buku_besar`.`kredit`) - sum(`atombizz_accounting_buku_besar`.`debit`)) AS `saldo` from `atombizz_accounting_buku_besar` group by `atombizz_accounting_buku_besar`.`faktur` ;

-- ----------------------------
-- View structure for view_hutang
-- ----------------------------
DROP VIEW IF EXISTS `view_hutang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_hutang` AS select `atombizz_accounting_buku_besar`.`id` AS `id`,`atombizz_accounting_buku_besar`.`kode` AS `kode`,`atombizz_accounting_buku_besar`.`no_referensi` AS `no_referensi`,`atombizz_accounting_buku_besar`.`tanggal` AS `tanggal`,`atombizz_accounting_buku_besar`.`keterangan` AS `keterangan`,`atombizz_accounting_buku_besar`.`no_akun` AS `no_akun`,sum(`atombizz_accounting_buku_besar`.`debit`) AS `debit`,sum(`atombizz_accounting_buku_besar`.`kredit`) AS `kredit`,(sum(`atombizz_accounting_buku_besar`.`kredit`) - sum(`atombizz_accounting_buku_besar`.`debit`)) AS `saldo`,`atombizz_accounting_buku_besar`.`faktur` AS `faktur`,`atombizz_accounting_buku_besar`.`dept` AS `dept`,`atombizz_accounting_buku_besar`.`person` AS `person`,`atombizz_accounting_buku_besar`.`valid` AS `valid`,`atombizz_accounting_buku_besar`.`urut` AS `urut`,`atombizz_suppliers`.`name` AS `name`,`atombizz_hutang`.`jatuh_tempo` AS `jatuh_tempo` from ((`atombizz_accounting_buku_besar` join `atombizz_suppliers` on((`atombizz_suppliers`.`code` = `atombizz_accounting_buku_besar`.`person`))) left join `atombizz_hutang` on((`atombizz_hutang`.`code` = `atombizz_accounting_buku_besar`.`faktur`))) where ((`atombizz_accounting_buku_besar`.`kode` = 'HTG') and ((`atombizz_accounting_buku_besar`.`faktur` is not null) or (`atombizz_accounting_buku_besar`.`faktur` <> ''))) group by `atombizz_accounting_buku_besar`.`person` ;

-- ----------------------------
-- View structure for view_inventaris_stok
-- ----------------------------
DROP VIEW IF EXISTS `view_inventaris_stok`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_inventaris_stok` AS select `atombizz_inventaris_stok`.`id` AS `id`,`atombizz_inventaris_stok`.`date` AS `date`,`atombizz_inventaris_stok`.`status` AS `status`,`atombizz_inventaris_stok`.`reference` AS `reference`,sum(`atombizz_inventaris_stok`.`in`) AS `in`,sum(`atombizz_inventaris_stok`.`out`) AS `out`,(sum(`atombizz_inventaris_stok`.`in`) - sum(`atombizz_inventaris_stok`.`out`)) AS `saldo`,`atombizz_inventaris_stok`.`description` AS `description`,`atombizz_inventaris_stok`.`userlog` AS `userlog`,`atombizz_inventaris_stok`.`operator` AS `operator`,`atombizz_inventaris_stok`.`rak_code` AS `rak_code`,`atombizz_inventaris_stok`.`product_code` AS `product_code`,`atombizz_inventaris_stok`.`dept` AS `dept`,`atombizz_inventaris`.`name` AS `name`,`atombizz_inventaris`.`category` AS `category` from (`atombizz_inventaris_stok` join `atombizz_inventaris` on((`atombizz_inventaris`.`code` = `atombizz_inventaris_stok`.`product_code`))) group by `atombizz_inventaris_stok`.`product_code` ;

-- ----------------------------
-- View structure for view_item_purchase
-- ----------------------------
DROP VIEW IF EXISTS `view_item_purchase`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_item_purchase` AS select `atombizz_purchase_items`.`id` AS `id`,`atombizz_purchase_items`.`reference_no` AS `reference_no`,`atombizz_purchase_items`.`product_code` AS `product_code`,`atombizz_purchase_items`.`quantity` AS `quantity`,`atombizz_purchase_items`.`unit_price` AS `unit_price`,(`atombizz_purchase_items`.`quantity` * `atombizz_purchase_items`.`unit_price`) AS `total_price`,`atombizz_purchase_items`.`product_name` AS `product_name` from `atombizz_purchase_items` ;

-- ----------------------------
-- View structure for view_kasbon
-- ----------------------------
DROP VIEW IF EXISTS `view_kasbon`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_kasbon` AS select `atombizz_accounting_buku_besar`.`id` AS `id`,`atombizz_accounting_buku_besar`.`kode` AS `kode`,`atombizz_accounting_buku_besar`.`no_referensi` AS `no_referensi`,`atombizz_accounting_buku_besar`.`tanggal` AS `tanggal`,`atombizz_accounting_buku_besar`.`keterangan` AS `keterangan`,`atombizz_accounting_buku_besar`.`no_akun` AS `no_akun`,sum(`atombizz_accounting_buku_besar`.`debit`) AS `debit`,sum(`atombizz_accounting_buku_besar`.`kredit`) AS `kredit`,(sum(`atombizz_accounting_buku_besar`.`debit`) - sum(`atombizz_accounting_buku_besar`.`kredit`)) AS `saldo`,`atombizz_accounting_buku_besar`.`faktur` AS `faktur`,`atombizz_accounting_buku_besar`.`dept` AS `dept`,`atombizz_accounting_buku_besar`.`person` AS `person`,`atombizz_accounting_buku_besar`.`valid` AS `valid`,`atombizz_accounting_buku_besar`.`urut` AS `urut`,`atombizz_karyawan`.`name` AS `nama`,`atombizz_karyawan`.`identification_number` AS `no_ktp` from (`atombizz_accounting_buku_besar` join `atombizz_karyawan` on((`atombizz_karyawan`.`code` = `atombizz_accounting_buku_besar`.`person`))) where ((`atombizz_accounting_buku_besar`.`kode` = 'KASBON') and (`atombizz_accounting_buku_besar`.`faktur` is not null) and (`atombizz_accounting_buku_besar`.`kode` <> '')) group by `atombizz_accounting_buku_besar`.`person` ;

-- ----------------------------
-- View structure for view_komposisi
-- ----------------------------
DROP VIEW IF EXISTS `view_komposisi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_komposisi` AS select `m`.`id` AS `menu_id`,`m`.`code` AS `menu_code`,`m`.`nama` AS `menu_name`,`ap`.`code` AS `product_code`,`ap`.`name` AS `product_name`,`ap`.`gudang_code` AS `rak_code`,(`abp`.`qty_product` * `ac`.`acuan`) AS `qty` from (((`menu` `m` join `atombizz_product` `ap`) join `atombizz_blended_product` `abp`) join `atombizz_converter` `ac`) where ((`m`.`code` = convert(`abp`.`barcode_blended` using utf8)) and (`abp`.`barcode_product` = `ap`.`code`) and (`abp`.`id_satuan` = `ac`.`id`) and (`abp`.`category_bahan` = 'material')) union all select `m`.`id` AS `menu_id`,`m`.`code` AS `menu_code`,`m`.`nama` AS `menu_name`,`ap`.`code` AS `product_code`,`ap`.`name` AS `product_name`,`ap`.`gudang_code` AS `rak_code`,(`amp`.`qty_product` * `ac`.`acuan`) AS `qty` from ((((`menu` `m` join `atombizz_product` `ap`) join `atombizz_blended_product` `abp`) join `atombizz_converter` `ac`) join `atombizz_mix_product` `amp`) where ((`m`.`code` = convert(`abp`.`barcode_blended` using utf8)) and (`abp`.`barcode_product` = `amp`.`barcode_blended`) and (`amp`.`barcode_product` = `ap`.`code`) and (`amp`.`id_satuan` = `ac`.`id`)) ;

-- ----------------------------
-- View structure for view_master_akun
-- ----------------------------
DROP VIEW IF EXISTS `view_master_akun`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_master_akun` AS select `master`.`id` AS `id`,`master`.`code` AS `code`,`master`.`name` AS `name`,`master`.`position` AS `position`,`master`.`keterangan` AS `keterangan`,`master`.`parent` AS `parent`,`master`.`space` AS `space`,`master`.`urut` AS `urut`,`master`.`saldo_awal_debit` AS `saldo_awal_debit`,`master`.`saldo_awal_kredit` AS `saldo_awal_kredit`,`master`.`code_ref` AS `code_ref`,`parent`.`code` AS `code_parent`,`parent`.`name` AS `name_parent` from (`atombizz_accounting_master_akun` `master` left join `atombizz_accounting_master_akun` `parent` on((`parent`.`code` = `master`.`parent`))) order by `master`.`id` ;


-- ----------------------------
-- View structure for view_product_price
-- ----------------------------
DROP VIEW IF EXISTS `view_product_price`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_product_price` AS select `ap`.`id` AS `id`,`ap`.`code` AS `code`,`ap`.`name` AS `name`,`ap`.`unit` AS `unit`,`ap`.`status` AS `status`,`ap`.`image` AS `image`,`ap`.`type` AS `type`,`ap`.`min` AS `min`,`ap`.`gudang_code` AS `gudang_code`,`ap`.`discount` AS `discount`,coalesce(`ap`.`cost`,sum((`ap2`.`cost` * `amp`.`qty_product`))) AS `cost` from ((`atombizz_product` `ap` left join `atombizz_mix_product` `amp` on((`amp`.`barcode_blended` = `ap`.`code`))) left join `atombizz_product` `ap2` on((`ap2`.`code` = `amp`.`barcode_product`))) group by `ap`.`code` ;


-- ----------------------------
-- View structure for view_meja_isi
-- ----------------------------
DROP VIEW IF EXISTS `view_meja_isi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_meja_isi` AS select distinct `penjualan`.`meja` AS `meja`,`penjualan`.`date` AS `date` from (`detil-penjualan` join `penjualan` on((`detil-penjualan`.`id-penjualan` = `penjualan`.`id`))) where (`penjualan`.`lunas` = '0') ;

-- ----------------------------
-- View structure for view_menu
-- ----------------------------
DROP VIEW IF EXISTS `view_menu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_menu` AS select `m`.`id` AS `id`,`m`.`code` AS `code`,`m`.`nama` AS `nama`,`m`.`harga` AS `harga`,`m`.`kategori` AS `id_kategori`,`km`.`nama` AS `kategori`,`km`.`type` AS `type`,`abp`.`barcode_product` AS `barcode_product`,round(sum((`vpp`.`cost` * `abp`.`qty_product`)),0) AS `hpp` from (((`menu` `m` left join `kategori-menu` `km` on((`m`.`kategori` = `km`.`id`))) left join `atombizz_blended_product` `abp` on((convert(`abp`.`barcode_blended` using utf8) = `m`.`code`))) left join `view_product_price` `vpp` on((`vpp`.`code` = `abp`.`barcode_product`))) group by `m`.`code` ;

-- ----------------------------
-- View structure for view_menu_terjual
-- ----------------------------
DROP VIEW IF EXISTS `view_menu_terjual`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_menu_terjual` AS select `menu`.`nama` AS `nama`,sum(`detil-penjualan`.`qty`) AS `qty`,`penjualan`.`date` AS `date`,`menu`.`id` AS `id-menu`,`menu`.`code` AS `code` from (`menu` left join (`penjualan` join `detil-penjualan` on((`detil-penjualan`.`id-penjualan` = `penjualan`.`id`))) on((`detil-penjualan`.`id-menu` = `menu`.`id`))) group by `menu`.`id`,`penjualan`.`date` ;

-- ----------------------------
-- View structure for view_min_max
-- ----------------------------
DROP VIEW IF EXISTS `view_min_max`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_min_max` AS select `atombizz_product`.`code` AS `product_code`,`atombizz_product`.`name` AS `product_name`,`specification`.`rak_code` AS `rak_code`,`specification`.`gudang_code` AS `gudang_code`,`specification`.`supplier_code` AS `supplier_code`,`specification`.`max` AS `max1`,round((`specification`.`max` + (`specification`.`max` * 0.1)),0) AS `max2`,round(((`specification`.`max` + (`specification`.`max` * 0.1)) * 0.4),0) AS `min`,`specification`.`id` AS `id`,`atombizz_product`.`status` AS `status` from (`atombizz_product` join `atombizz_product_specification` `specification` on((`specification`.`code` = `atombizz_product`.`code`))) ;

-- ----------------------------
-- View structure for view_warehouse_stok
-- ----------------------------
DROP VIEW IF EXISTS `view_warehouse_stok`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_warehouse_stok` AS select `menu`.`code` AS `b_product_code`,`menu`.`nama` AS `b_product_name`,`product`.`code` AS `product_code`,`product`.`name` AS `product_name`,`warehouse`.`rak_code` AS `rak_code`,`atombizz_rack`.`nama` AS `rak_name`,round(sum(`warehouse`.`in`),0) AS `in`,round(sum(`warehouse`.`out`),0) AS `out`,round((sum(`warehouse`.`in`) - sum(`warehouse`.`out`)),0) AS `saldo`,`atombizz_rack`.`status` AS `rak_status`,`product`.`unit` AS `unit` 
from ((`atombizz_warehouses_stok` `warehouse` 
left join `atombizz_product` `product` on((`product`.`code` = `warehouse`.`product_code`)) 
left join `menu` on((`menu`.`code` = `warehouse`.`product_code`))) 
left join `atombizz_rack` on((`atombizz_rack`.`kode` = `warehouse`.`rak_code`))) 
where ((`warehouse`.`rak_code` <> 'retur') and (`warehouse`.`rak_code` <> 'spoil')) 
group by `warehouse`.`product_code`,`warehouse`.`rak_code` ;
DROP TRIGGER IF EXISTS `after_atombizz_warehouses_stok_insert`;
DELIMITER ;;
CREATE TRIGGER `after_atombizz_warehouses_stok_insert` AFTER INSERT ON `atombizz_warehouses_stok` FOR EACH ROW BEGIN
    DECLARE original_query LONGTEXT;
    SET original_query = (SELECT info FROM INFORMATION_SCHEMA.PROCESSLIST WHERE id = CONNECTION_ID());
    INSERT INTO `temp_sync`
    SET

        `table` = 'atombizz_warehouses_stok',
        `insert_id` = new.id,
        `pk` = 'id',
        `query` = original_query,
        `action` = 'insert',
        `date` = NOW(),
        `time` = NOW(),
        `sync` = 'no'; 
END
;;
DELIMITER ;



-- ----------------------------
-- View structure for view_notifikasi_order
-- ----------------------------
DROP VIEW IF EXISTS `view_notifikasi_order`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_notifikasi_order` AS select `atombizz_product`.`code` AS `product_code`,`atombizz_product`.`name` AS `product_name`,`specification`.`rak_code` AS `rak_code`,`specification`.`gudang_code` AS `gudang_code`,`specification`.`supplier_code` AS `supplier_code`,`specification`.`max` AS `max1`,round((`specification`.`max` + (`specification`.`max` * 0.1)),0) AS `max2`,round(((`specification`.`max` + (`specification`.`max` * 0.1)) * 0.4),0) AS `min`,`stok`.`saldo` AS `saldo`,if((round(((`specification`.`max` + (`specification`.`max` * 0.1)) * 0.4),0) < `stok`.`saldo`),0,(round((`specification`.`max` + (`specification`.`max` * 0.1)),0) - `stok`.`saldo`)) AS `order`,`atombizz_product`.`unit` AS `unit`,`atombizz_product`.`status` AS `status` from ((`atombizz_product` join `atombizz_product_specification` `specification` on((`specification`.`code` = `atombizz_product`.`code`))) join `view_warehouse_stok` `stok` on((`stok`.`product_code` = `atombizz_product`.`code`))) where (`stok`.`rak_status` = 'gudang') ;

-- ----------------------------
-- View structure for view_omset
-- ----------------------------
DROP VIEW IF EXISTS `view_omset`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_omset` AS select sum(`penjualan`.`bayar`) AS `omset`,`penjualan`.`date` AS `date` from `penjualan` group by `penjualan`.`date` ;

-- ----------------------------
-- View structure for view_omset_workstation
-- ----------------------------
DROP VIEW IF EXISTS `view_omset_workstation`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_omset_workstation` AS select `atombizz_selling`.`id` AS `id`,`atombizz_selling`.`cashdraw_no` AS `cashdraw_no`,`atombizz_selling`.`date` AS `date`,`cashdraw`.`start_cash` AS `start_cash`,sum(`atombizz_selling`.`total`) AS `omset`,(sum(`atombizz_selling`.`total`) + `cashdraw`.`start_cash`) AS `total_cash`,sum(`atombizz_selling`.`pay`) AS `bayar`,sum(`atombizz_selling`.`pay_back`) AS `kembalian`,sum(`atombizz_selling`.`tax`) AS `tax`,sum(`atombizz_selling`.`inv_discount`) AS `diskon`,sum(`atombizz_selling`.`total_discount`) AS `subdiskon`,`cashdraw`.`status` AS `status`,`cashdraw`.`check_in` AS `check_in` from (`atombizz_selling` join `atombizz_selling_cashdraw` `cashdraw` on((`cashdraw`.`cashdraw_no` = `atombizz_selling`.`cashdraw_no`))) group by `atombizz_selling`.`cashdraw_no`,`atombizz_selling`.`date` ;

-- ----------------------------
-- View structure for view_payed_order
-- ----------------------------
DROP VIEW IF EXISTS `view_payed_order`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_payed_order` AS select `tmp-personal`.`id` AS `id`,`menu`.`nama` AS `nama`,`tmp-personal`.`qty` AS `qty`,`tmp-personal`.`harga` AS `harga`,`tmp-personal`.`total` AS `total`,`penjualan`.`meja` AS `meja`,`tmp-personal`.`id-penjualan` AS `id-penjualan` from ((`tmp-personal` join `penjualan` on((`tmp-personal`.`id-penjualan` = `penjualan`.`id`))) join `menu` on((`tmp-personal`.`id-menu` = `menu`.`id`))) where (`penjualan`.`lunas` = '0') union all select `detil-penjualan`.`id` AS `id`,`menu`.`nama` AS `nama`,(`detil-penjualan`.`qty` - `detil-penjualan`.`payoff`) AS `qty`,`detil-penjualan`.`harga` AS `harga`,((`detil-penjualan`.`qty` - `detil-penjualan`.`payoff`) * `detil-penjualan`.`harga`) AS `total`,`penjualan`.`meja` AS `meja`,`detil-penjualan`.`id-penjualan` AS `id-penjualan` from ((`detil-penjualan` join `penjualan` on((`detil-penjualan`.`id-penjualan` = `penjualan`.`id`))) join `menu` on((`detil-penjualan`.`id-menu` = `menu`.`id`))) where (`penjualan`.`lunas` = '1') ;

-- ----------------------------
-- View structure for view_penggajian
-- ----------------------------
DROP VIEW IF EXISTS `view_penggajian`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_penggajian` AS select `atombizz_penggajian`.`id` AS `id`,`atombizz_karyawan`.`code` AS `code`,`atombizz_karyawan`.`name` AS `name`,`atombizz_penggajian`.`gaji` AS `gaji`,`atombizz_penggajian`.`bonus` AS `bonus`,`atombizz_penggajian`.`casbon` AS `casbon`,`atombizz_penggajian`.`total` AS `total`,`atombizz_penggajian`.`tanggal` AS `tanggal`,`atombizz_penggajian`.`no_slip` AS `no_slip` from (`atombizz_karyawan` join `atombizz_penggajian` on((`atombizz_penggajian`.`id_karyawan` = `atombizz_karyawan`.`id`))) ;

-- ----------------------------
-- View structure for view_pengiriman
-- ----------------------------
DROP VIEW IF EXISTS `view_pengiriman`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_pengiriman` AS select `atombizz_selling`.`id` AS `id`,`atombizz_selling`.`cashdraw_no` AS `cashdraw_no`,`atombizz_selling`.`invoice_no` AS `invoice_no`,`atombizz_selling`.`customer_id` AS `customer_id`,`atombizz_selling`.`customer_name` AS `customer_name`,`atombizz_selling`.`date` AS `date`,`atombizz_selling`.`status` AS `status`,`atombizz_selling`.`internal_note` AS `internal_note`,`atombizz_selling`.`total` AS `total`,`atombizz_selling`.`pay` AS `pay`,`atombizz_selling`.`pay_back` AS `pay_back`,`atombizz_selling`.`tax` AS `tax`,`atombizz_selling`.`inv_discount` AS `inv_discount`,`atombizz_selling`.`total_discount` AS `total_discount`,`atombizz_selling`.`user_id` AS `user_id`,`atombizz_selling`.`user_name` AS `user_name`,`atombizz_selling`.`urut` AS `urut`,`atombizz_selling`.`pengiriman` AS `pengiriman`,`atombizz_selling`.`status_pengiriman` AS `status_pengiriman`,`atombizz_customers`.`address` AS `address`,`atombizz_customers`.`phone` AS `phone` from (`atombizz_selling` join `atombizz_customers` on((`atombizz_customers`.`id` = `atombizz_selling`.`customer_id`))) where (`atombizz_selling`.`status_pengiriman` = '0') ;

-- ----------------------------
-- View structure for view_pesanan
-- ----------------------------
DROP VIEW IF EXISTS `view_pesanan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_pesanan` AS select `detil-penjualan`.`id` AS `id`,`menu`.`nama` AS `nama`,(`detil-penjualan`.`qty` - `detil-penjualan`.`payoff`) AS `qty`,`detil-penjualan`.`harga` AS `harga`,((`detil-penjualan`.`qty` - `detil-penjualan`.`payoff`) * `detil-penjualan`.`harga`) AS `total`,`penjualan`.`meja` AS `meja`,`detil-penjualan`.`id-penjualan` AS `id-penjualan`,`detil-penjualan`.`printed` AS `printed`,`penjualan`.`date` AS `date` from ((`detil-penjualan` join `penjualan` on((`detil-penjualan`.`id-penjualan` = `penjualan`.`id`))) join `menu` on((`detil-penjualan`.`id-menu` = `menu`.`id`))) where ((`penjualan`.`lunas` = '0') and ((`detil-penjualan`.`qty` - `detil-penjualan`.`payoff`) > 0)) ;

-- ----------------------------
-- View structure for view_piutang
-- ----------------------------
DROP VIEW IF EXISTS `view_piutang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_piutang` AS select `atombizz_accounting_buku_besar`.`id` AS `id`,`atombizz_accounting_buku_besar`.`kode` AS `kode`,`atombizz_accounting_buku_besar`.`no_referensi` AS `no_referensi`,`atombizz_accounting_buku_besar`.`tanggal` AS `tanggal`,`atombizz_accounting_buku_besar`.`keterangan` AS `keterangan`,`atombizz_accounting_buku_besar`.`no_akun` AS `no_akun`,sum(`atombizz_accounting_buku_besar`.`debit`) AS `debit`,sum(`atombizz_accounting_buku_besar`.`kredit`) AS `kredit`,(sum(`atombizz_accounting_buku_besar`.`debit`) - sum(`atombizz_accounting_buku_besar`.`kredit`)) AS `saldo`,`atombizz_accounting_buku_besar`.`faktur` AS `faktur`,`atombizz_accounting_buku_besar`.`dept` AS `dept`,`atombizz_accounting_buku_besar`.`person` AS `person`,`atombizz_accounting_buku_besar`.`valid` AS `valid`,`atombizz_accounting_buku_besar`.`urut` AS `urut`,`atombizz_piutang`.`jatuh_tempo` AS `jatuh_tempo`,`atombizz_customers`.`name` AS `name` from ((`atombizz_accounting_buku_besar` join `atombizz_piutang` on((`atombizz_piutang`.`code` = `atombizz_accounting_buku_besar`.`faktur`))) join `atombizz_customers` on((`atombizz_customers`.`id` = `atombizz_accounting_buku_besar`.`person`))) where ((`atombizz_accounting_buku_besar`.`kode` = 'PTG') and (`atombizz_accounting_buku_besar`.`faktur` is not null) and (`atombizz_accounting_buku_besar`.`faktur` <> '') and (`atombizz_accounting_buku_besar`.`valid` = 'yes')) group by `atombizz_accounting_buku_besar`.`faktur` ;


-- ----------------------------
-- View structure for view_purchase
-- ----------------------------
DROP VIEW IF EXISTS `view_purchase`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_purchase` AS select `atombizz_purchase_items`.`id` AS `id`,`atombizz_purchase_items`.`reference_no` AS `reference_no`,`atombizz_purchase_items`.`product_id` AS `product_id`,`atombizz_purchase_items`.`product_code` AS `product_code`,`atombizz_purchase_items`.`product_name` AS `product_name`,`atombizz_purchase_items`.`quantity` AS `quantity`,`atombizz_purchase_items`.`unit_price` AS `unit_price`,`atombizz_purchase_items`.`tax_amount` AS `tax_amount`,`atombizz_purchase_items`.`gross_total` AS `gross_total`,`atombizz_purchase_items`.`disc_reg` AS `disc_reg`,`atombizz_purchases`.`note` AS `note`,`atombizz_purchases`.`supplier_code` AS `supplier_code`,`atombizz_purchases`.`supplier_name` AS `supplier_name`,`atombizz_purchases`.`date` AS `date`,`atombizz_purchases`.`operator` AS `operator_code`,`view_employee`.`nama` AS `operator_name`,`atombizz_purchases`.`dept` AS `department_code` from ((`atombizz_purchases` join `atombizz_purchase_items` on((`atombizz_purchase_items`.`reference_no` = `atombizz_purchases`.`reference_no`))) join `view_employee` on((`view_employee`.`uname` = `atombizz_purchases`.`operator`))) ;

-- ----------------------------
-- View structure for view_purchases_status
-- ----------------------------
DROP VIEW IF EXISTS `view_purchases_status`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_purchases_status` AS select `atombizz_purchases`.`id` AS `id`,`atombizz_purchases`.`reference_no` AS `reference_no`,`atombizz_purchases`.`note` AS `note`,`atombizz_purchases`.`supplier_code` AS `supplier_code`,`atombizz_purchases`.`supplier_name` AS `supplier_name`,`atombizz_purchases`.`date` AS `date`,`atombizz_purchases`.`subtotal` AS `subtotal`,`atombizz_purchases`.`operator` AS `operator`,`atombizz_purchases`.`updated_by` AS `updated_by`,`atombizz_purchases`.`deadline` AS `deadline`,`atombizz_purchases`.`status` AS `status`,`atombizz_purchases`.`disc_reg_1` AS `disc_reg_1`,`atombizz_purchases`.`disc_reg_2` AS `disc_reg_2`,`atombizz_purchases`.`total` AS `total`,`atombizz_purchases`.`nom_reg_1` AS `nom_reg_1`,`atombizz_purchases`.`nom_reg_2` AS `nom_reg_2`,`atombizz_purchases`.`urut` AS `urut`,`atombizz_purchases`.`dept` AS `dept`,`view_faktur_pembelian`.`saldo` AS `saldo` from (`atombizz_purchases` left join `view_faktur_pembelian` on((`view_faktur_pembelian`.`faktur` = `atombizz_purchases`.`reference_no`))) ;

-- ----------------------------
-- View structure for view_retur_out
-- ----------------------------
DROP VIEW IF EXISTS `view_retur_out`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_retur_out` AS select `retur`.`id` AS `id`,`retur`.`reference` AS `reference`,`retur`.`date` AS `date`,`retur`.`total` AS `total`,`retur`.`operator` AS `operator_code`,`retur`.`supplier_code` AS `supplier_code`,`retur`.`supplier_name` AS `supplier_name`,`retur`.`dept` AS `department_code`,`employee`.`nama` AS `operator_name`,`atombizz_retur_out_detail`.`product_id` AS `product_id`,`atombizz_retur_out_detail`.`product_code` AS `product_code`,`atombizz_retur_out_detail`.`product_name` AS `product_name`,`atombizz_retur_out_detail`.`quantity` AS `quantity`,`atombizz_retur_out_detail`.`hpp` AS `hpp`,(`atombizz_retur_out_detail`.`hpp` * `atombizz_retur_out_detail`.`quantity`) AS `subtotal`,`atombizz_retur_out_detail`.`description` AS `description` from ((`atombizz_retur_out` `retur` join `view_employee` `employee` on((`employee`.`uname` = `retur`.`operator`))) join `atombizz_retur_out_detail` on((`atombizz_retur_out_detail`.`reference` = `retur`.`reference`))) ;

-- ----------------------------
-- View structure for view_salary
-- ----------------------------
DROP VIEW IF EXISTS `view_salary`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_salary` AS select `atombizz_salary`.`id` AS `id`,`atombizz_salary`.`employee_code` AS `employee_code`,`atombizz_salary`.`date` AS `date`,`atombizz_salary`.`gaji_pokok` AS `gaji_pokok`,`atombizz_salary`.`tunjangan_lain` AS `tunjangan_lain`,`atombizz_salary`.`bonus` AS `bonus`,`atombizz_salary`.`hutang` AS `hutang`,`atombizz_salary`.`potongan_lain` AS `potongan_lain`,`atombizz_salary`.`description` AS `description`,`atombizz_employee`.`nama` AS `employee_name`,((`atombizz_salary`.`gaji_pokok` + `atombizz_salary`.`tunjangan_lain`) + `atombizz_salary`.`bonus`) AS `penerimaan`,(`atombizz_salary`.`hutang` + `atombizz_salary`.`potongan_lain`) AS `potongan`,(((`atombizz_salary`.`gaji_pokok` + `atombizz_salary`.`tunjangan_lain`) + `atombizz_salary`.`bonus`) - (`atombizz_salary`.`hutang` + `atombizz_salary`.`potongan_lain`)) AS `total`,month(`atombizz_salary`.`date`) AS `bulan`,year(`atombizz_salary`.`date`) AS `tahun` from (`atombizz_salary` join `atombizz_employee` on((`atombizz_employee`.`no_ktp` = `atombizz_salary`.`employee_code`))) ;

-- ----------------------------
-- View structure for view_selling_cashdraw
-- ----------------------------
DROP VIEW IF EXISTS `view_selling_cashdraw`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_selling_cashdraw` AS select `atombizz_cashdraw`.`id` AS `id`,`atombizz_cashdraw`.`code` AS `cashdraw_no`,`atombizz_cashdraw`.`date` AS `date`,`atombizz_cashdraw`.`checkin` AS `check_in`,`atombizz_cashdraw`.`checkout` AS `check_out`,`atombizz_cashdraw`.`employee_id` AS `user_id`,`atombizz_cashdraw`.`start_cash` AS `start_cash`,`atombizz_cashdraw`.`end_cash` AS `end_cash`,`atombizz_cashdraw`.`omset` AS `omset`,`atombizz_cashdraw`.`total_cash` AS `total_cash`,`atombizz_cashdraw`.`status` AS `status`,`view_employee`.`nama` AS `operator`,'nothing' AS `keterangan` from (`atombizz_cashdraw` left join `view_employee` on((`view_employee`.`id` = `atombizz_cashdraw`.`employee_id`))) ;

-- ----------------------------
-- View structure for view_statistik
-- ----------------------------
DROP VIEW IF EXISTS `view_statistik`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_statistik` AS select count(`penjualan`.`id`) AS `transaksi`,(select sum(`penjualan`.`bayar`) from `penjualan` where (`penjualan`.`date` = cast(now() as date))) AS `omset`,(select sum(`penjualan`.`bayar`) from `penjualan` where ((`penjualan`.`date` = cast(now() as date)) and (`penjualan`.`cash` = '0'))) AS `credit`,(select (sum(`penjualan`.`bayar`) + (select `atombizz_cashdraw`.`start_cash` from `atombizz_cashdraw` where ((`atombizz_cashdraw`.`date` = cast(now() as date)) and (`atombizz_cashdraw`.`status` <> 'temporary')))) from `penjualan` where ((`penjualan`.`date` = cast(now() as date)) and (`penjualan`.`cash` = '1'))) AS `kas` from `penjualan` where ((`penjualan`.`date` = cast(now() as date)) and (`penjualan`.`lunas` = '1')) ;

-- ----------------------------
-- View structure for view_stock_opname
-- ----------------------------
DROP VIEW IF EXISTS `view_stock_opname`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_stock_opname` AS select 

`opname`.`id` AS `id`,`opname`.`reference` AS `reference`,`opname`.`date` AS `date`,`opname`.`description` AS `description`,`opname`.`approved_by` AS `approved_by`,`opname`.`operator` AS `operator`,`opname`.`urut` AS `urut`,`opname`.`dept` AS `dept`,`opname`.`rule` AS `rule`,
`detail`.`rak_code` AS `rak_code`,`detail`.`rak_name` AS `rak_name`,`detail`.`product_id` AS `product_id`,`detail`.`product_code` AS `product_code`,`detail`.`product_name` AS `product_name`,`detail`.`checking_qty` AS `checking_qty`,`detail`.`stock_qty` AS `stock_qty`,`detail`.`difference` AS `difference`,`detail`.`status` AS `status`, 
`rak`.`status` AS `rak_status`
from (`atombizz_stock_opname` `opname` 
join `atombizz_stock_opname_detail` `detail` on((`detail`.`reference` = `opname`.`reference`))
join `atombizz_rack` `rak` on((`rak`.`kode` = `detail`.`rak_code`))
) ;

-- ----------------------------
-- View structure for view_stok_product_blended
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_product_blended`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_stok_product_blended` AS select `view_blended`.`id` AS `id`,`view_blended`.`barcode_blended` AS `barcode_blended`,`view_blended`.`id_product` AS `id_product`,`view_blended`.`qty_product` AS `qty_product`,`view_blended`.`name_blended` AS `name_blended`,`view_blended`.`name_list` AS `name_list`,`view_blended`.`id_blended` AS `id_blended`,`view_blended`.`barcode_product` AS `barcode_product`,`view_warehouse_stok`.`saldo` AS `saldo`,(`view_warehouse_stok`.`saldo` / `view_blended`.`qty_product`) AS `qty_max` from (`view_blended` join `view_warehouse_stok` on((`view_warehouse_stok`.`product_code` = `view_blended`.`barcode_product`))) where (`view_warehouse_stok`.`rak_status` = 'gudang') ;

-- ----------------------------
-- View structure for view_stok_produk
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_stok_produk` AS select `produksi`.`id` AS `id`,`produksi`.`date` AS `date`,`produksi`.`id_product` AS `id_product`,sum(`produksi`.`out`) AS `out`,sum(`produksi`.`in`) AS `in`,`menu`.`nama` AS `nama`,`menu`.`rak_code` AS `rak_code`,`atombizz_rack`.`nama` AS `rak_name`,(sum(`produksi`.`in`) - sum(`produksi`.`out`)) AS `saldo`,`menu`.`code` AS `code`,`menu`.`harga` AS `harga`,`produksi`.`status` AS `status` from ((`produksi` join `menu` on((`produksi`.`id_product` = `menu`.`id`))) join `atombizz_rack` on((convert(`atombizz_rack`.`kode` using utf8) = `menu`.`rak_code`))) group by `produksi`.`id_product`,`produksi`.`status` ;

-- ----------------------------
-- View structure for view_tmp_retur_out
-- ----------------------------
DROP VIEW IF EXISTS `view_tmp_retur_out`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_tmp_retur_out` AS select `atombizz_retur_out_tmp`.`id` AS `id`,`atombizz_retur_out_tmp`.`reference` AS `reference`,`atombizz_retur_out_tmp`.`date` AS `date`,`atombizz_retur_out_tmp`.`userlog` AS `userlog`,`atombizz_retur_out_tmp`.`operator` AS `operator`,`atombizz_retur_out_tmp`.`supplier_code` AS `supplier_code`,`atombizz_retur_out_tmp`.`supplier_name` AS `supplier_name`,`atombizz_retur_out_tmp`.`product_id` AS `product_id`,`atombizz_retur_out_tmp`.`product_code` AS `product_code`,`atombizz_retur_out_tmp`.`product_name` AS `product_name`,`atombizz_retur_out_tmp`.`quantity` AS `quantity`,`atombizz_retur_out_tmp`.`hpp` AS `hpp`,`atombizz_retur_out_tmp`.`description` AS `description`,`atombizz_retur_out_tmp`.`sub_total` AS `sub_total`,`atombizz_retur_out_tmp`.`urut` AS `urut`,`atombizz_retur_out_tmp`.`unit` AS `unit`,`atombizz_retur_out_tmp`.`brand_code` AS `brand_code`,`atombizz_product`.`gudang_code` AS `gudang_code` from (`atombizz_retur_out_tmp` join `atombizz_product` on((`atombizz_retur_out_tmp`.`product_code` = `atombizz_product`.`code`))) ;

-- ----------------------------
-- View structure for view_tmp_spoil
-- ----------------------------
DROP VIEW IF EXISTS `view_tmp_spoil`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_tmp_spoil` AS select `atombizz_spoil_tmp`.`id` AS `id`,`atombizz_spoil_tmp`.`kode` AS `kode`,`atombizz_spoil_tmp`.`qty` AS `qty`,`atombizz_spoil_tmp`.`hpp` AS `hpp`,`atombizz_spoil_tmp`.`keterangan` AS `keterangan`,`atombizz_spoil_tmp`.`tgl` AS `tgl`,`atombizz_spoil_tmp`.`reference` AS `reference`,`atombizz_spoil_tmp`.`urut` AS `urut`,`atombizz_spoil_tmp`.`total` AS `total`,`atombizz_spoil_tmp`.`nama` AS `nama`,`atombizz_spoil_tmp`.`status` AS `status` from `atombizz_spoil_tmp` ;

-- ----------------------------
-- View structure for view_total_tmp_suspend
-- ----------------------------
DROP VIEW IF EXISTS `view_total_tmp_suspend`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_total_tmp_suspend` AS select count(`temp_jual`.`id`) AS `id`,`temp_jual`.`cashdraw` AS `cashdraw` from `atombizz_tmp_detail_jual` `temp_jual` where (`temp_jual`.`status` = 'suspended') group by `temp_jual`.`invoice` ;

-- ----------------------------
-- View structure for view_total_tmp_trans_jual
-- ----------------------------
DROP VIEW IF EXISTS `view_total_tmp_trans_jual`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_total_tmp_trans_jual` AS select count(`tmp_jual`.`id`) AS `id`,`tmp_jual`.`cashdraw` AS `cashdraw` from `atombizz_tmp_detail_jual` `tmp_jual` group by `tmp_jual`.`invoice` ;

-- ----------------------------
-- View structure for view_transaksional
-- ----------------------------
DROP VIEW IF EXISTS `view_transaksional`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_transaksional` AS select `buku`.`id` AS `id`,`buku`.`kode` AS `kode`,`buku`.`no_referensi` AS `no_referensi`,`buku`.`tanggal` AS `tanggal`,`buku`.`keterangan` AS `keterangan`,`buku`.`no_akun` AS `no_akun`,`buku`.`debit` AS `debit`,`buku`.`kredit` AS `kredit`,`buku`.`faktur` AS `faktur`,`buku`.`dept` AS `dept`,`buku`.`person` AS `person`,`buku`.`valid` AS `valid`,`buku`.`urut` AS `urut`,`akun`.`name` AS `nama_akun` from (`atombizz_accounting_buku_besar` `buku` join `atombizz_accounting_master_akun` `akun` on((`akun`.`code` = `buku`.`no_akun`))) where ((`buku`.`kode` = 'KAS') and ((`buku`.`faktur` is not null) or (`buku`.`faktur` <> '')) and (`buku`.`valid` = 'no')) ;

