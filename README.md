# La Tienda Maldita - Ecommerce básico

Este proyecto es una implementación de una tienda online básica desarrollada con PHP y MySQL. La tienda está diseñada con un toque humorístico, vendiendo "objetos que te ayudarán a tener un peor día".

## Características principales

- Catálogo de productos organizados por categorías
- Carrito de compras
- Sistema de usuarios (registro e inicio de sesión)
- Gestión de pedidos
- Sistema de facturación
- Soporte multiidioma (Español, Euskera, Inglés)

## Tecnologías utilizadas

- PHP 8.1
- MySQL 8.0
- Docker y Docker Compose
- Nginx

## Estructura del proyecto

El proyecto sigue un patrón MVC simplificado y está organizado en:

- Modelos para operaciones de base de datos
- Vistas para la interfaz de usuario
- Acciones para procesar formularios
- Componentes reutilizables

## Instalación

1. Clonar el repositorio
2. Configurar las variables de entorno en el archivo `.env`
3. Ejecutar `docker-compose up`
4. La aplicación estará disponible en `http://localhost`

## Base de datos

La base de datos incluye tablas para:
- Productos y categorías
- Usuarios y clientes
- Pedidos y facturación
- Gestión de idiomas

## Notas

- Esta es una implementación básica enfocada en la funcionalidad
- El panel de administración no está incluido en esta versión
- El sistema está preparado para futuras mejoras y expansiones

## Autor

Danel Lafuente Mendiola