<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 
# 🏗️ Constructora Vial - Sistema de Gestión

Este sistema web permite gestionar maquinaria, obras, asignaciones y rastreo geográfico dentro de una empresa constructora vial. Incluye alertas de mantenimiento automático, tracking por provincia, y una interfaz moderna utilizando Laravel 12, Tailwind CSS y Flowbite.



## 📦 Requisitos previos

- PHP 8.2+
- Laragon
- Composer
- Node.js y npm
- MySQL 
- Laravel CLI (`composer global require laravel/installer`)
- Laravel Breeze (API + Blade scaffolding)

---

 ⚙️ Instalación y configuración del proyecto

1. Clonar repositorio
```bash
git clone https://github.com/tu-usuario/constructora-vial.git
cd constructora-vial

2. Instalar dependencias PHP
composer install

3.Instalar dependencias Frontend
npm install

4.Generar la clave del proyecto
php artisan key:generate

5.Ejecutar migraciones y seeders
php artisan migrate --seed

🚀 Ejecución del sistema
En una terminal, levantar el servidor PHP
php artisan serve

En otra terminal, compilar assets con Vite
npm run dev

📍 Navegá a http://localhost:8000

🔐 Acceso al sistema
Puedes registrarte como nuevo usuario desde la pantalla de login o usar usuario precargados en el seeder.
USUARIO:
EMAIL: admin@gmail.com
CLAVE: adminadmin

📍 Funcionalidades principales
CRUD completo de:Máquinas, Obras, Asignaciones (crear nueva)

Rastreo de ubicación por máquina en mapa Leaflet (provincias geolocalizadas)

Alertas automáticas por mantenimiento cuando una máquina supera los 500 km (En proceso)

Dashboard con tarjetas de acceso y navegación fija

📌 Desarrollo futuro
📊 Sección de reportes (en desarrollo): se implementará con tecnologías como FPDF.

🔔 Notificaciones visuales en mantenimiento: mostrar tarjetas de alerta dinámica y confirmación de reparación.




