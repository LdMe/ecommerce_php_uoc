DELETE FROM text;
INSERT INTO text (text_id) VALUES 
("main-page-title"), 
("main-page-description"),
("product-category"),
("category-all"),
("product-more-info"),
("cart"),
("cart-product-delete"),
("cart-product-add"),
("cart-product-save-quantity"),
("cart-empty"),
("cart-product-delete-confirm"),
("name"),
("quantity"),
("price"),
("total"),
("image"),
("actions"),
("buy"),
("email"),
("password"),
("confirm-password"),
("register"),
("login"),
("logout"),
("greeting"),
("address"),
("phone"),
("billing"),
("save"),
("register-billing-title"),
("select-old-billing"),
("old-billings-data"),
("purchase-title"),
("purchase")
;


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

("cart-product-delete",1, "Eliminar"),
("cart-product-delete",2, "Ezabatu"),
("cart-product-delete",3, "Eliminar"),
("cart-product-delete",4, "Delete"),

("cart-product-add",1, "Agregar"),
("cart-product-add",2, "Gehitu"),
("cart-product-add",3, "Afegeix"),
("cart-product-add",4, "Add"),

("cart-product-save-quantity",1, "Guardar"),
("cart-product-save-quantity",2, "Gorde"),
("cart-product-save-quantity",3, "Guardar"),
("cart-product-save-quantity",4, "Save"),

("cart-empty",1, "El carrito esta vacio"),
("cart-empty",2, "Saskia hutsik dago"),
("cart-empty",3, "La cistella esta buida"),
("cart-empty",4, "Cart is empty"),

("cart-product-delete-confirm",1, "¿Estas seguro de eliminar el producto del carrito?"),
("cart-product-delete-confirm",2, "Ziur zaude produktua ezabatu nahi duzula?"),
("cart-product-delete-confirm",3, "Estas segur de eliminar el producte de la cistella?"),
("cart-product-delete-confirm",4, "Are you sure you want to delete the product from the cart?"),

("name",1, "Nombre"),
("name",2, "Izena"),
("name",3, "Nom"),
("name",4, "Name"),

("quantity",1, "Cantidad"),
("quantity",2, "Kopurua"),
("quantity",3, "Quantitat"),
("quantity",4, "Quantity"),

("price",1, "Precio"),
("price",2, "Prezioa"),
("price",3, "Preu"),
("price",4, "Price"),

("total",1, "Total"),
("total",2, "Guztira"),
("total",3, "Total"),
("total",4, "Total"),

("image",1, "Imagen"),
("image",2, "Irudia"),
("image",3, "Imatge"),
("image",4, "Image"),

("actions",1, "Acciones"),
("actions",2, "Ekintzak"),
("actions",3, "Accions"),
("actions",4, "Actions"),

("buy",1, "Comprar"),
("buy",2, "Erosi"),
("buy",3, "Comprar"),
("buy",4, "Buy"),

("email",1, "Correo"),
("email",2, "E-posta"),
("email",3, "Correu"),
("email",4, "Email"),

("password",1, "Contraseña"),
("password",2, "Pasahitza"),
("password",3, "Contrassenya"),
("password",4, "Password"),

("confirm-password",1, "Confirmar contraseña"),
("confirm-password",2, "Konfirmatu pasahitza"),
("confirm-password",3, "Confirmar contrassenya"),
("confirm-password",4, "Confirm password"),

("register",1, "Registrarse"),
("register",2, "Erregistratu"),
("register",3, "Registrua"),
("register",4, "Register"),

("login",1, "Iniciar sesion"),
("login",2, "Hasi saioa"),
("login",3, "Iniciar sessió"),
("login",4, "Login"),

("logout",1, "Cerrar sesion"),
("logout",2, "Itxi saioa"),
("logout",3, "Tancar sessió"),
("logout",4, "Logout"),

("greeting",1, "Hola"),
("greeting",2, "Kaixo"),
("greeting",3, "Hola"),
("greeting",4, "Hello"),

("address",1, "Direccion"),
("address",2, "Helbidea"),
("address",3, "Direcció"),
("address",4, "Address"),

("phone",1, "Telefono"),
("phone",2, "Telefonoa"),
("phone",3, "Telefon"),
("phone",4, "Phone"),

("billing",1, "Facturacion"),
("billing",2, "Facturazioa"),
("billing",3, "Facturación"),
("billing",4, "Billing"),

("save",1, "Guardar"),
("save",2, "Gorde"),
("save",3, "Guardar"),
("save",4, "Save"),

("register-billing-title",1, "Regístrate para una mejor experiencia de compra"),
("register-billing-title",2,"Erregistratu erosketa esperientzia hobea izateko"),
("register-billing-title",3, "Registreu-vos per una millor experiència de compra"),
("register-billing-title",4, "Register for a better purchase experience"),

("select-old-billing",1, "Puedes seleccionar los datos de una factura anterior"),
("select-old-billing",2, "Aurreko fakturaren baten datuak aukeratu ditzakezu"),
("select-old-billing",3, "Pots seleccionar els dades d'una factura anterior"),
("select-old-billing",4, "You can select the data of a previous billing"),

("old-billings-data",1, "Datos de facturas anteriores"),
("old-billings-data",2, "Aurreko fakturen datuak"),
("old-billings-data",3, "Dades de factures anteriors"),
("old-billings-data",4, "Previous billing data"),

("purchase-title",1, "Compra"),
("purchase-title",2, "Erosketa"),
("purchase-title",3, "Compra"),
("purchase-title",4, "Purchase"),

("purchase",1, "Comprar"),
("purchase",2, "Erosi"),
("purchase",3, "Comprar"),
("purchase",4, "Buy")


;