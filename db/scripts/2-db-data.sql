INSERT INTO language (name, iso_code) VALUES 
('Español', 'es'),
('Euskara', 'eu'), 
('Català', 'ca'),
('English', 'en');


INSERT INTO category (category_id) VALUES (1), (2), (3);


INSERT INTO category_has_language (category_id, language_id, name, description) VALUES
(1, 1, 'Órganos vitales', 'Imprescindibles para vivir'),
(1, 2, 'Bizitzako organoak', 'Bizitzeko ezinbestekoak'),
(1, 3, 'Òrgans vitals', 'Imprescindibles per viure'),
(1, 4, 'Vital organs', 'Essential for life'),

(2, 1, 'Órganos prescindibles', 'Puedes vivir sin ellos'),
(2, 2, 'Organo baztergarriak', 'Haiek gabe bizi zaitezke'),
(2, 3, 'Òrgans prescindibles', 'Pots viure sense ells'),
(2, 4, 'Non-vital organs', 'You can live without them'),

(3, 1, 'Extremidades', 'Brazos y piernas'),
(3, 2, 'Gorputz-adarrak', 'Besoak eta hankak'),
(3, 3, 'Extremitats', 'Braços i cames'),
(3, 4, 'Limbs', 'Arms and legs');


INSERT INTO product (product_id, price, image) VALUES
(1, 50000, 'https://img.freepik.com/premium-photo/real-human-heart-anatomy-model_1159374-1.jpg'),
(2, 35000, 'https://i.pinimg.com/736x/70/2c/0e/702c0ebcdfc5f4b313255070c9c4ae05.jpg'),
(3, 45000, 'https://www.biospectrumasia.com/uploads/articles/kidneystemcells.jpg'),
(4, 5000, 'https://ausmed-images.s3.ap-southeast-2.amazonaws.com/ausmed.com/ausmed-articles/20220119_body_3.jpg'),
(5, 15000, 'https://static8.depositphotos.com/1003556/1016/i/450/depositphotos_10169561-stock-photo-woman-hand.jpg');

INSERT INTO product_has_language (product_id, language_id, name, description) VALUES
(1, 1, 'Corazón', 'Corazón humano en buen estado'),
(1, 2, 'Bihotza', 'Giza bihotz osasuntsua'),
(1, 3, 'Cor', 'Cor humà en bon estat'),
(1, 4, 'Heart', 'Healthy human heart'),

(2, 1, 'Pulmón', 'Pulmón de no fumador'),
(2, 2, 'Birika', 'Ez erretzailearen birika'),
(2, 3, 'Pulmó', 'Pulmó de no fumador'),
(2, 4, 'Lung', 'Non-smoker lung'),

(3, 1, 'Riñón', 'Riñón de deportista'),
(3, 2, 'Giltzurruna', 'Kirolariaren giltzurruna'),
(3, 3, 'Ronyó', "Ronyó d'esportista"),
(3, 4, 'Kidney', "Athlete's kidney"),

(4, 1, 'Apendice', 'Apendice de no fumador'),
(4, 2, 'Apendice', 'Ez erretzailearen apendice'),
(4, 3, 'Apendice', 'Apendice de no fumador'),
(4, 4, 'Appendix', 'Non-smoker appendix'),

(5, 1, 'Brazo', 'Brazo de deportista'),
(5, 2, 'Beso', 'Kirolari besoa'),
(5, 3, 'Braço', "Braço d'esportista"),
(5, 4, 'Arm', "Athlete's arm");

INSERT INTO product_has_category (product_id, category_id) VALUES
(1, 1), -- Heart - vital
(2, 1), -- Lung - vital 
(3, 1), -- Kidney - vital
(4, 2), -- Appendix - non-vital
(5, 3); -- Arm - limb


INSERT INTO purchase_status (purchase_status_id) VALUES (1), (2), (3);

INSERT INTO purchase_status_has_language (purchase_status_id, language_id, name) VALUES
(1, 1, 'Pendiente'),
(1, 2, 'Zain'),
(1, 3, 'Pendent'),
(1, 4, 'Pending'),

(2, 1, 'En proceso'),
(2, 2, 'Prozesuan'),
(2, 3, 'En procés'),
(2, 4, 'Processing'),

(3, 1, 'Completado'),
(3, 2, 'Burutua'),
(3, 3, 'Completat'),
(3, 4, 'Completed');

INSERT INTO text (text_id) VALUES ("main-page-title"), ("main-page-description"),("product-category"),("category-all"),("product-more-info"),("cart"),("delete");

INSERT INTO text_has_language (text_id, language_id, content) VALUES
("main-page-title", 1, "Mercado Orgánico"),
("main-page-title", 2, "Merkatu Organikoa"),
("main-page-title", 3, "Mercat Organic"),
("main-page-title", 4, "Organic Market"),

("main-page-description", 1, "Venta de productos orgánicos y de cercanía"),
("main-page-description", 2, "Bertako produktu organikoen salmenta"),
("main-page-description", 3, "Venda de productes organics i de proximitat"),
("main-page-description", 4, "Venta de productos orgánicos y de cercanía"),

("product-category", 1, "Categorías"),
("product-category", 2, "Kategoriak"),
("product-category", 3, "Categories"),
("product-category", 4, "Categories"),

("category-all", 1, "Todas las categorías"),
("category-all", 2, "Kategoria guztiak"),
("category-all", 3, "Totes les categories"),
("category-all", 4, "All categories"),

("product-more-info", 1, "Mas información"),
("product-more-info", 2, "Informazio gehiago"),
("product-more-info", 3, "Mes informació"),
("product-more-info", 4, "More information"),

("cart", 1, "Carrito"),
("cart", 2, "Saskia"),
("cart", 3, "Cistella"),
("cart", 4, "Cart"),

("delete",1, "Eliminar"),
("delete",2, "Ezabatu"),
("delete",3, "Eliminar"),
("delete",4, "Delete")
;