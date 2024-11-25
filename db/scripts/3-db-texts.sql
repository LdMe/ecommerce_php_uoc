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
("purchase"),
("purchase-history-title"),
("passwords-dont-match"),
("email-exists"),
("email-not-found"),
("incorrect-credentials"),
("my-purchases"),
("no-purchases"),
("search"),
("no-results"),
("back"),
("continue"),
("language"),
("purchase-date"),
("end-purchase"),
("product-not-found"),
("cart-product-add-success"),
("cart-product-add-error"),
("register-success")
;


INSERT INTO text_has_language (text_id, language_id, content) VALUES
("main-page-title", 1, "La Tienda Maldita"),
("main-page-title", 2, "Denda Madarikatua"),
("main-page-title", 3, "The Cursed Store"),

("main-page-description", 1, "Objetos que te ayudarán a tener un peor día"),
("main-page-description", 2, "Eguna izorratzen lagunduko zaituzten objektuak"),
("main-page-description", 3, "Objects that will help you have a worse day"),

("product-category", 1, "Categorías"),
("product-category", 2, "Kategoriak"),
("product-category", 3, "Categories"),

("category-all", 1, "Todas las categorías"),
("category-all", 2, "Kategoria guztiak"),
("category-all", 3, "All categories"),

("product-more-info", 1, "Mas información"),
("product-more-info", 2, "Informazio gehiago"),
("product-more-info", 3, "More information"),

("cart", 1, "Carrito"),
("cart", 2, "Saskia"),
("cart", 3, "Cart"),

("cart-product-delete",1, "Eliminar"),
("cart-product-delete",2, "Ezabatu"),
("cart-product-delete",3, "Delete"),

("cart-product-add",1, "Agregar"),
("cart-product-add",2, "Gehitu"),
("cart-product-add",3, "Add"),

("cart-product-save-quantity",1, "Guardar"),
("cart-product-save-quantity",2, "Gorde"),
("cart-product-save-quantity",3, "Save"),

("cart-empty",1, "El carrito esta vacio"),
("cart-empty",2, "Saskia hutsik dago"),
("cart-empty",3, "Cart is empty"),

("cart-product-delete-confirm",1, "¿Estas seguro de eliminar el producto del carrito?"),
("cart-product-delete-confirm",2, "Ziur zaude produktua ezabatu nahi duzula?"),
("cart-product-delete-confirm",3, "Are you sure you want to delete the product from the cart?"),

("name",1, "Nombre"),
("name",2, "Izena"),
("name",3, "Name"),

("quantity",1, "Cantidad"),
("quantity",2, "Kopurua"),
("quantity",3, "Quantity"),

("price",1, "Precio"),
("price",2, "Prezioa"),
("price",3, "Price"),

("total",1, "Total"),
("total",2, "Guztira"),
("total",3, "Total"),

("image",1, "Imagen"),
("image",2, "Irudia"),
("image",3, "Image"),

("actions",1, "Acciones"),
("actions",2, "Ekintzak"),
("actions",3, "Actions"),

("buy",1, "Comprar"),
("buy",2, "Erosi"),
("buy",3, "Buy"),

("email",1, "Correo"),
("email",2, "E-posta"),
("email",3, "Email"),

("password",1, "Contraseña"),
("password",2, "Pasahitza"),
("password",3, "Password"),

("confirm-password",1, "Confirmar contraseña"),
("confirm-password",2, "Konfirmatu pasahitza"),
("confirm-password",3, "Confirm password"),

("register",1, "Registrarse"),
("register",2, "Erregistratu"),
("register",3, "Register"),

("login",1, "Iniciar sesion"),
("login",2, "Hasi saioa"),
("login",3, "Login"),

("logout",1, "Cerrar sesion"),
("logout",2, "Itxi saioa"),
("logout",3, "Logout"),

("greeting",1, "Hola"),
("greeting",2, "Kaixo"),
("greeting",3, "Hello"),

("address",1, "Direccion"),
("address",2, "Helbidea"),
("address",3, "Address"),

("phone",1, "Telefono"),
("phone",2, "Telefonoa"),
("phone",3, "Phone"),

("billing",1, "Facturacion"),
("billing",2, "Fakturazioa"),
("billing",3, "Billing"),

("save",1, "Guardar"),
("save",2, "Gorde"),
("save",3, "Save"),

("register-billing-title",1, "Regístrate para una mejor experiencia de compra"),
("register-billing-title",2,"Erregistratu erosketa esperientzia hobea izateko"),
("register-billing-title",3, "Register for a better purchase experience"),

("select-old-billing",1, "Puedes seleccionar los datos de una factura anterior"),
("select-old-billing",2, "Aurreko fakturaren baten datuak aukeratu ditzakezu"),
("select-old-billing",3, "You can select the data of a previous billing"),

("old-billings-data",1, "Datos de facturas anteriores"),
("old-billings-data",2, "Aurreko fakturen datuak"),
("old-billings-data",3, "Previous billing data"),

("purchase-title",1, "Compra"),
("purchase-title",2, "Erosketa"),
("purchase-title",3, "Purchase"),

("purchase",1, "Comprar"),
("purchase",2, "Erosi"),
("purchase",3, "Buy"),

("purchase-history-title",1, "Historial de compras"),
("purchase-history-title",2, "Erosketa historiala"),
("purchase-history-title",3, "Purchase history"),

("passwords-dont-match",1, "Las contraseñas no coinciden"),
("passwords-dont-match",2, "Pasahitzak ez dira berdinak"),
("passwords-dont-match",3, "Passwords do not match"),

("email-exists",1, "El correo ya existe"),
("email-exists",2, "E-posta jada existitzen da"),
("email-exists",3, "Email already exists"),

("email-not-found",1, "El correo no existe"),
("email-not-found",2, "E-posta ez da existitzen"),
("email-not-found",3, "Email not found"),

("incorrect-credentials",1, "Credenciales incorrectas"),
("incorrect-credentials",2, "Datuak ez dira zuzenak"),
("incorrect-credentials",3, "Incorrect credentials"),

("my-purchases",1, "Mis compras"),
("my-purchases",2, "Erosketak"),
("my-purchases",3, "My purchases"),

("no-purchases",1, "No tienes compras"),
("no-purchases",2, "Ez duzu erosketarik"),
("no-purchases",3, "No purchases"),

("search",1, "Buscar"),
("search",2, "Bilatu"),
("search",3, "Search"),

("no-results",1, "No se encontraron resultados"),
("no-results",2, "Ez da ezer aurkitu"),
("no-results",3, "No results found"),

("back",1, "Volver"),
("back",2, "Atzera"),
("back",3, "Back"),

("continue",1, "Continuar"),
("continue",2, "Jarraitu"),
("continue",3, "Continue"),

("language",1, "Idioma"),
("language",2, "Hizkuntza"),
("language",3, "Language"),

("purchase-date",1, "Fecha de compra"),
("purchase-date",2, "Erosketaren data"),
("purchase-date",3, "Purchase date"),

("end-purchase",1, "Finalizar compra"),
("end-purchase",2, "Erosketa amaitu"),
("end-purchase",3, "End purchase"),

("product-not-found",1, "Producto no encontrado"),
("product-not-found",2, "Ez da produktua aurkitu"),
("product-not-found",3, "Product not found"),

("cart-product-add-success",1, "Producto agregado al carrito"),
("cart-product-add-success",2, "Produktua saskira gehitu da"),
("cart-product-add-success",3, "Product added to cart"),

("cart-product-add-error",1, "No se pudo agregar el producto al carrito"),
("cart-product-add-error",2, "Ezin izan da produktua saskira gehitu"),
("cart-product-add-error",3, "Could not add product to cart"),

("register-success",1,"Registro exitoso"),
("register-success",2,"Erregistratuta"),
("register-success",3,"Successfully registered")
;