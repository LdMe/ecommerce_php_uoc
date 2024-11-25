INSERT INTO language (name, iso_code) VALUES 
("Español", "es"),
("Euskara", "eu"), 
("English", "en");


INSERT INTO category (category_id) VALUES (1), (2), (3);


INSERT INTO category_has_language (category_id, language_id, name, description) VALUES
(1, 1, "Accesorios y Ropa", "Complementos ideales para un mal día"),
(1, 2, "Osagarriak eta Arropa", "Egun txarretan janzteko egokienak"),
(1, 3, "Accessories and Clothes", "Ideal accessories for a bad day"),

(2, 1, "Juguetes", "Los mejores juguetes para pasar un mal rato"),
(2, 2, "Jostailuak", "Gaizki pasatzeko jostailu egokienak"),
(2, 3, "Toys", "The best toys to have a bad time"),

(3,1, "Herramientas", "Las peores herramientas para el trabajo"),
(3,2, "Eztabarretak", "Lanerako tresna ezegokienak"),
(3,3, "Tools", "The worst tools for work");


INSERT INTO product (product_id, price, image) VALUES
(1, 2580, "/public/img/glasses.jpg"),
(2, 5399, "/public/img/socks.jpg"),
(3, 1250, "/public/img/trousers.jpg"),
(4, 3785, "/public/img/board-game.jpg"),
(5, 5750, "/public/img/console.jpg"),
(6, 1000, "/public/img/bear.jpg"),
(7, 1000, "/public/img/screwdriver.jpg"),
(8, 1000, "/public/img/tape.jpg"),
(9, 1000, "/public/img/brush.jpg");

INSERT INTO product_has_language (product_id, language_id, name, description) VALUES
(1, 1, "Gafas del juicio", "Te permiten ver los defectos de los demás, pero te obligan a decirlos en voz alta"),
(1, 2, "Betaurreko epaileak", "Besteen akatsak ikusteko aukera ematen dizute, baina ozen esatera behartzen zaituzte"),
(1, 3, "Glasses of justice", "They allow you to see the faults of others, but force you to say them out loud"),

(2,1, "Calcetines incorrectos", "Siempre sentirás que te los has puesto al revés"),
(2,2, "Galtzerdi desegokiak", "Alderantziz jantzi dituzula nabarituko duzu"),
(2,3, "Incorrect shoes", "You will always feel that you put them wrong"),

(3,1, "Pantalones caídos","No importa cuánto aprietes el cinturón o cuántos botones pongas, siempre encontrarán el momento más inoportuno para caerse ligeramente"),
(3,2,"Galtza eroriak","Ez du axola zenbat estutu gerrikoa edo zenbat botoi jarri, beti aurkituko dute apur bat erortzeko momenturik desegokiena."),
(3,3,"Fallen trousers","It does not matter how much you tighten the belt or how many buttons you put on, they will always find the most unfortunate moment to fall slightly"),

(4,1, "Juego de mesa de guerra","La forma idieal de quedarse sin amigos"),
(4,2,"Gerra mahai-jokoa","Lagunik gabe gelditzeko modu aproposena"),
(4,3,"Board game of war","The ideal way to stay without friends"),

(5,1,"Consola de ganadores","Solo guarda partida cuando pierdes"),
(5,2,"Irabazleen kontsola","Galtzen duzunean soilik gordetzen du jokoa"),
(5,3,"The winner's console","You only save a game when you lose"),

(6,1, "Oso pasivoagresivo","Adorable osito de peluche que susurra comentarios pasivo-agresivos sobre tus decisiones de vida"),
(6,2, "Hartz pasibo-agresiboa", "Zure bizitzako erabakiei buruzko iruzkin pasibo-agresiboak xuxurlatzen dituen peluxezko hartz adoragarria"),
(6,3, "Passive aggressive bear","Adorable passive aggressive stuffed bear that whispers passive-aggressive comments about your life decisions"),

(7,1,"Destornillador des-adaptable","Destornillador mágicamente adaptable que cambia a cualquier tipo de punta... excepto la que necesitas en este momento"),
(7,2,"Bihurkin egokiezina"," Magikoki moldagarria den bihurkina, edozein motatara aldatzen dena... oraintxe bertan behar duzuna izan ezik"),
(7,3,"Un-adaptable screwdriver","Magically adaptable screwdriver that changes to any type of tip... except the one you need right now"),

(8,1,"Cinta milimétrica","Cinta métrica que siempre se queda corta por unos pocos milímetros"),
(8,2,"Zinta milimetrikoa","Milimetro gutxi batzuengatik iristen ez den zinta metrikoa"),
(8,3,"Milimetric measuring tape","Measuring tape that always gets short by a few millimeters"),

(9,1,"Escoba creadora","Escoba encantada que da vida a las pelusas del suelo, convirtiéndolas en adorables (y rebeldes) criaturas peludas"),
(9,2,"Erratz sortzailea","Erratza sorgindua, lurrazalei bizia ematen diena, izaki iletsu maitagarri (eta errebelde) bihurtuz"),
(9,3,"Creator brush","Enchanted brush that gives life to the carpets of the floor, turning them into adorable (and rebellious) fluffy creatures");



INSERT INTO product_has_category (product_id, category_id) VALUES
(1, 1),
(2,1),
(3,1),
(4,2),
(5,2),
(6,2),
(7,3),
(8,3),
(9,3);


INSERT INTO purchase_status (purchase_status_id) VALUES (1), (2), (3);

INSERT INTO purchase_status_has_language (purchase_status_id, language_id, name) VALUES
(1, 1, "Pendiente"),
(1, 2, "Zain"),
(1, 3, "Pending"),

(2, 1, "En proceso"),
(2, 2, "Prozesuan"),
(2, 3, "Processing"),

(3, 1, "Completado"),
(3, 2, "Burutua"),
(3, 3, "Completed");


INSERT INTO client_type (client_type_id) VALUES (1), (2);

INSERT INTO client_type_has_language (client_type_id, language_id, name) VALUES
(1, 1, "Básico"),
(1, 2, "Arrunta"),
(1, 3, "Basic"),

(2, 1, "Premium"),
(2, 2, "Premium"),
(2, 3, "Premium");