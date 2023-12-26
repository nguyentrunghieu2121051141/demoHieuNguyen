CREATE DATABASE shop;

use shop;

CREATE TABLE khachang(
    idkhachhang int PRIMARY KEY AUTO_INCREMENT,
    tenkhachhang VARCHAR(255) NOT NULL,
    phone int NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(30) NOT NULL,
    matKhau VARCHAR(10) NOT NULL,
    status TINYINT(4) DEFAULT 0

);

CREATE TABLE hoadon(
    idhoadon int PRIMARY KEY AUTO_INCREMENT,
    idkhachhang int NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone int NOT NULL,
    email VARCHAR(255) NOT NULL,
    soluong int NOT NULL,
    status TINYINT(4) DEFAULT 1,

    CONSTRAINT FK_idkh
    FOREIGN KEY (idkhachhang) REFERENCES khachang(idkhachhang)
);

CREATE TABLE catelog(
    catelogid int PRIMARY KEY AUTO_INCREMENT,
    catelogname VARCHAR(255) NOT NULL,
    status TINYINT(4) DEFAULT 1
);

CREATE TABLE sanpham(
    idsanpham int PRIMARY KEY AUTO_INCREMENT,
    catelogid int NOT NULL,
    tensanpham VARCHAR(255) NOT NULL,
    noidung VARCHAR(255),
    noidungchitiet VARCHAR(255),
    giadauvao FLOAT NOT NULL,
    giadaura FLOAT NOT NULL,
    luotxem INT ,
    muahang TINYINT(1) DEFAULT 0,
    status TINYINT(4) DEFAULT 1,

    CONSTRAINT FK_idcate
    FOREIGN KEY (catelogid) REFERENCES catelog(catelogid)
);

CREATE TABLE color(
    colorid int PRIMARY KEY ,
    colorname VARCHAR(20) NOT NULL,
    status TINYINT(4) DEFAULT 1
);

CREATE TABLE size(
    sizeid int PRIMARY KEY,
    sizename char NOT NULL,
    status TINYINT(4) DEFAULT 1
);

CREATE TABLE chitietsanpham(
    idsanpham int ,
    colorid int,
    sizeid int,
    soluong int NOT NULL,
    status TINYINT(4) DEFAULT 1,

    CONSTRAINT PK_ctsp
    PRIMARY KEY (idsanpham , colorid , sizeid)
);

ALTER TABLE chitietsanpham
ADD CONSTRAINT FK_ctsp
FOREIGN KEY (idsanpham)
REFERENCES sanpham(idsanpham);

ALTER TABLE chitietsanpham
ADD CONSTRAINT FK_ctspc
FOREIGN KEY (colorid)
REFERENCES color(colorid);

ALTER TABLE chitietsanpham
ADD CONSTRAINT FK_ctsps
FOREIGN KEY (sizeid)
REFERENCES size(sizeid);

CREATE TABLE chitietdonhang(
    idhoadon int,
    idsanpham int,
    colorid int,
    sizeid int,
    dongia FLOAT NOT NULL,
    soluong int NOT NULL,

    CONSTRAINT PK_ctdh
    PRIMARY KEY (idhoadon , idsanpham , colorid , sizeid)
);

ALTER TABLE chitietdonhang
ADD CONSTRAINT FK_ctdh
FOREIGN KEY (idhoadon)
REFERENCES hoadon(idhoadon);

ALTER TABLE chitietdonhang
ADD CONSTRAINT FK_ctdhsp
FOREIGN KEY (idsanpham)
REFERENCES sanpham(idsanpham);

ALTER TABLE chitietdonhang
ADD CONSTRAINT FK_ctdhc
FOREIGN KEY (colorid)
REFERENCES color(colorid);

ALTER TABLE chitietdonhang
ADD CONSTRAINT FK_ctdhz
FOREIGN KEY (sizeid)
REFERENCES size(sizeid);

CREATE TABLE admin(
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(20) NOT NULL,
    level int 
);

ALTER TABLE `admin` ADD `repassword` VARCHAR(20) NULL AFTER `username`;
ALTER TABLE `sanpham` ADD `imgae` VARCHAR(255) NULL AFTER `tensanpham`;

INSERT INTO `catelog` (`catelogid`, `catelogname`, `status`) VALUES 
(NULL, 'samsung', '1'), 
(NULL, 'iphone', '1'), 
(NULL, 'vivo', '1');

INSERT INTO `sanpham` (`idsanpham`, `catelogid`, `tensanpham`, `imgae`, `noidung`, `noidungchitiet`, `giadauvao`, `giadaura`, `luotxem`, `muahang`, `status`) VALUES 
(NULL, '1', 'samsung galaxy a14 5G', 'samsung-galaxy-a14-5g.jpg', NULL, NULL, '20000000', '18000000', NULL, '0', '1'), 
(NULL, '3', 'vivo y21s', 'vivo-y21s.jpg', NULL, NULL, '10000000', '9568000', NULL, '0', '1'), 
(NULL, '2', 'iphone 14 pro max', 'iphone-14-pro-max.jpg', NULL, NULL, '46745000', '42600000', NULL, '0', '1'), 
(NULL, '2', 'iphone 13 64GB', 'ip13.jpg', NULL, NULL, '26842000', '20000000', NULL, '0', '1'), 
(NULL, '2', 'iphone11 yellow 256GB', 'iphone11-yellow-256gb.jpg', NULL, NULL, '21234000', '19840000', NULL, '0', '1'), 
(NULL, '2', 'iphone 13 128GB', 'ip-13-128gb.jpg', NULL, NULL, '27000000', '25000000', NULL, '0', '1'), 
(NULL, '1', 'samsung', 'samsung.jpg', NULL, NULL, '6000000', '5600000', NULL, '0', '1');

INSERT INTO `color` (`colorid`, `colorname`, `status`) VALUES 
('1', 'xanh lá cây', '1'), 
('2', 'đỏ', '1'), 
('3', 'tím', '1'), 
('4', 'vàng', '1'), 
('5', 'xanh nước biển', '1'), 
('6', 'đen', '1'), 
('7', 'trắng', '1');

ALTER TABLE `size` CHANGE `sizename` `sizename` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

INSERT INTO `size` (`sizeid`, `sizename`, `status`) VALUES 
('1', '6,1 inch', '1'), 
('2', '6,7 inch', '1');

INSERT INTO `chitietsanpham` (`idsanpham`, `colorid`, `sizeid`, `soluong`, `status`) VALUES 
('1', '1', '2', '10000', '1'), 
('2', '7', '1', '4300', '1'), 
('3', '3', '2', '60000', '1'), 
('4', '6', '2', '48000', '1'), 
('5', '4', '1', '3000', '1'), 
('6', '3', '2', '5000', '1'), 
('7', '7', '2', '2000', '1');

ALTER TABLE `sanpham` ADD `mua` VARCHAR(50) NOT NULL DEFAULT 'Mua Hàng' AFTER `luotxem`;
ALTER TABLE `admin` CHANGE `level` `level` INT(11) NULL DEFAULT '0';
ALTER TABLE `admin` CHANGE `username` `username` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `admin` CHANGE `repassword` `repassword` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `admin` CHANGE `password` `password` VARCHAR(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
INSERT INTO `admin` (`id`, `username`, `repassword`, `password`, `level`) VALUES (NULL, 'thanh', MD5('thanh'), MD5('thanh'), '1');

-- CREATE TABLE admin(
--     madmin VARCHAR(10) PRIMARY KEY,
--     sdt int NOT NULL,
--     email VARCHAR(50) NOT NULL,
--     tenlogin VARCHAR(10) NOT NULL,
--     matkhau VARCHAR(10) NOT NULL,
--     trangthai TINYINT(2) 
-- );

ALTER TABLE `khachang` CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `khachang` CHANGE `matKhau` `matKhau` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
INSERT INTO `khachang` (`idkhachhang`, `tenkhachhang`, `phone`, `address`, `email`, `username`, `matKhau`, `status`) VALUES 
(NULL, 'thanh', '0123456789', 'Hà Nội', 'thanhnh@gmail.com', 'thanh', MD5('thanh'), '0');
INSERT INTO `khachang` (`idkhachhang`, `tenkhachhang`, `phone`, `address`, `email`, `username`, `matKhau`, `status`) VALUES 
(NULL, 'nhthan', '0123456789', 'Hà Nội', 'nhthan@gmail.com', 'nhthan', MD5('nhthan'), '0');

-- bang don hang
ALTER TABLE `hoadon` CHANGE `soluong` `soluong` INT(11) NULL;
ALTER TABLE `hoadon` CHANGE `Tong_tien` `Tong_tien` INT NULL DEFAULT NULL;

-- thêm nội dung
UPDATE `sanpham` SET `noidung` = "Máy mới 100% , chính hãng Apple Việt Nam.
NHT-WIT hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam" WHERE `catelogid`= 2;

UPDATE `sanpham` SET `noidung` = "Máy mới 100% , chính hãng Samsung Quốc Tế.
NHT-WIT hiện là đại lý bán lẻ uỷ quyền Samsung chính hãng N/A của Samsung Quốc Tế" WHERE `catelogid`= 1;

UPDATE `sanpham` SET `noidung` = "Máy mới 100% , chính hãng Vivo Quốc Tế.
NHT-WIT hiện là đại lý bán lẻ uỷ quyền Vivo chính hãng N/A của Vivo Quốc Tế" WHERE `catelogid`= 3;