# White Box - Laravel E-commerce

## Presentación

**White Box** es un proyecto de e-commerce construido con Laravel. En su estado actual, ofrece funcionalidades básicas de una tienda en línea, como la visualización de productos, gestión de categorías, y un formulario de contacto.

## Instalación y Ejecución

Sigue los pasos a continuación para ejecutar este proyecto en tu entorno local.

### 1. Clonar el proyecto

Primero, clona el repositorio en tu máquina local:

```bash
git clone https://github.com/SebasBarreto/white-box.git
cd white-box
2. Instalar dependencias de PHP y Node.js

Ejecuta el siguiente comando para instalar las dependencias de Laravel y de npm:

composer install
npm install

Crear el archivo .env

Duplica el archivo .env.example y nómbralo .env. Asegúrate de configurar tus credenciales de base de datos en este archivo.

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=root
DB_PASSWORD=


Migrar la base de datos

sql de la base de datos, puedes importarlo directamente desde phpMyAdmin o el cliente de MySQL que utilices.

la base de datos esta en la sub-carpeta antes de whitebox

php artisan migrate


Ejecutar el servidor de desarrollo

Inicia el servidor de Laravel usando el siguiente comando:

php artisan serve

Esto iniciará el proyecto en http://localhost:8000.

Ejecución de la base de datos

    Para importar la base de datos, ve a phpMyAdmin, selecciona tu base de datos, haz clic en "Importar" y selecciona el archivo SQL exportado (whitebox_database.sql).
    Este archivo incluye las tablas necesarias para los productos, categorías, ventas, encargos, y más.

Pestañas disponibles

En la barra de navegación principal, las pestañas funcionales son las siguientes:

    Inicio: Página de inicio del proyecto.
    Ventas: Redirige a la categoría "Componentes PC", que muestra dos productos: uno de prueba y un disco duro SSD.
    Encargos: Página para hacer encargos de productos.
    Contactanos: Página con un formulario para que los usuarios se contacten con el administrador.

Estado actual del proyecto

En este momento, solo la categoría Componentes PC en la sección Ventas está conectada a la base de datos. Dentro de esta categoría, hay dos productos visibles:

    Un producto de prueba.
    Un disco duro SSD.

Todo el proyecto está completamente personalizado y diseñado para ser extendido fácilmente a nuevas categorías y productos.

¡Gracias por revisar White Box!

