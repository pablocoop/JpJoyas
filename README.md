# JP Joyas

Trabajo personal para el desarrollo de un sitio web de joyería utilizando Laravel.

## Descripción

JpJoyas es una página web desarrollada en Laravel orientada a la presentación y promoción de una joyería. El proyecto incluye las secciones informativas básicas para mostrar información de la empresa, servicios, contacto, y otros detalles relevantes. No incluye funcionalidades de catálogo ni gestión de productos.

## Características principales

- Página de inicio personalizada para la joyería
- Sección “Sobre nosotros”
- Información de contacto y formulario
- Diseño adaptable para dispositivos móviles y escritorio

## Tecnologías utilizadas

-Laravel (Framework PHP)
-Blade (Sistema de plantillas de Laravel)
-PHP
-HTML/CSS/JavaScript

## Instalación y configuración

1. Clona el repositorio:

```bash
git clone https://github.com/pablocoop/JpJoyas.git
cd JpJoyas
```

2. Instala las dependencias con Composer:

```bash
composer install
```

3. Copia el archivo de entorno y genera la clave de la app:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configura tus datos de entorno:

Edita el archivo .env para configurar la conexión a base de datos (si la usas) y otros parámetros necesarios.

5. Ejecuta las migraciones y seeders:

```bash
php artisan migrate --seed
```

6. Inicia el servidor de desarrollo:

```bash
php artisan serve
```

## Contribuciones

Las contribuciones son bienvenidas. Haz un fork y envía tu Pull Request.
