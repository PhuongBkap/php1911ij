
-- Táº¡o cÆ¡ sá»Ÿ dá»¯ liá»‡u

CREATE DATABASE `shop_demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- sá»­ dá»¥ng DB
USE shop_demo;

CREATE TABLE category (
  	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
 	name VARCHAR(255) NOT NULL UNIQUE,
 	status tinyint DEFAULT '1'
);
CREATE TABLE product (
  	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
 	name VARCHAR(255) NOT NULL UNIQUE,
 	id_category INT NOT NULL,
 	price float NOT NULL,
 	sale_price float NULL,
 	dess text NULL,
 	image VARCHAR(255) NULL,
 	status tinyint DEFAULT '1'
);
CREATE TABLE users (
  	id INT UNSIGNED NOT NULL  PRIMARY KEY AUTO_INCREMENT,
 	name VARCHAR(255) NOT NULL,
 	email VARCHAR(255) NOT NULL UNIQUE,
 	password VARCHAR(255),
 	phone INT  NULL,
 	addr VARCHAR(255) NULL
);
CREATE TABLE bill (
  	id INT UNSIGNED NOT NULL  PRIMARY KEY AUTO_INCREMENT,
 	id_user  INT NOT NULL,
 	total float,
 	created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	status tinyint DEFAULT '0'
);
CREATE TABLE bill_detail (
	id_bill INT NOT NULL,
   	id_product  INT NOT NULL,
 	quantity INT NOT NULL,
 	price float NOT NULL,
 	created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	status tinyint DEFAULT '0'
);
  
ALTER TABLE product ADD CONSTRAINT fk_pro_cate FOREIGN KEY (id_category) REFERENCES category(id);
ALTER TABLE bill ADD CONSTRAINT fk_bill_user FOREIGN KEY (id_user) REFERENCES users(id);
ALTER TABLE bill_detail ADD CONSTRAINT fk_bill_detail FOREIGN KEY (id_bill) REFERENCES bill(id);
ALTER TABLE bill_detail ADD CONSTRAINT fk_bill_detail_pro FOREIGN KEY (id_product) REFERENCES product(id);

--- cÃ¡c cÃ¢u lá»‡nh truy váº¥n

--thÃªm má»›i dá»¯ liá»‡u
INSERT INTO category(name,status) VALUES ('Ão muÃ  háº¡',2);

-- thÃªm má»›i cho báº£ng product
INSERT INTO product(name,id_category,price,sale_price,dess,image,status) VALUES
('san pham 3',1,15,'','Moo ta','ang.jpg',1),
('san pham 4',1,15,'','Moo ta','ang.jpg',1),
('san pham 5',1,15,'','Moo ta','ang.jpg',1)

--- update
-- update tenbang SET truong1 = 'values',truong2 = 'values' WHERE truong = DK
UPDATE product SET name = 'san pham 13', sale_price = 10 WHERE id = 5

-- cau lech xoa
DELETE FROM product WHERE id = 7
DELETE FROM category WHERE id = 3
INSERT INTO product(name,id_category,price,sale_price,dess,image,status) VALUES
('san pham 3',3,15,'','Moo ta','ang.jpg',1),

--- Láº¥y ra dá»¯ liá»‡u
SELECT * FROM product

-- Láº¥y ra tÃªn, giÃ¡, áº£nh, cá»§a báº£ng product
SELECT name,price,image FROM product
-- Láº¥y ra báº£n ghi cÃ³ Ä‘iá»u kiá»‡n
SELECT * FROM product WHERE id_category = 1

--SELECT Vá»šI LIMIT

SELECT * FROM product LIMIT 3

---SELCT ORDER BY
SELECT * FROM product ORDER BY id DESC LIMIT 3

--- SELECT Vá»šI LIKE

SELECT * FROM product WHERE name LIKE '%a%'



SELECT product.*, category.name as 'NameCategory'
FROM product JOIN category 
ON product.id_category = category.id

SELECT product.*, category.name as 'NameCategory'
FROM product LEFT JOIN category 
ON product.id_category = category.id

SELECT product.*, category.name as 'NameCategory'
FROM product RIGHT JOIN category 
ON product.id_category = category.id