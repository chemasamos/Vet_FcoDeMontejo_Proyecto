<p align="center">
<a href="http://localhost:8000" target="_blank">
<!-- PUEDES REEMPLAZAR ESTO CON TU PROPIO LOGO O UN BANNER SI TIENES UNO -->
<img src="https://www.google.com/search?q=https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%2520SVG/2%2520CMYK/1%2520Full%2520Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Veterinaria Logo">
</a>
</p>

<h1 align="center">🐾 Veterinaria Francisco de Montejo</h1>

<p align="center">
<strong>Sistema Integral de Gestión Clínica Veterinaria</strong>
<br />
<br />
<a href="https://laravel.com"><img src="https://www.google.com/search?q=https://img.shields.io/badge/Laravel-11.x-FF2D20%3Fstyle%3Dfor-the-badge%26logo%3Dlaravel" alt="Laravel 11" /></a>
<a href="https://tailwindcss.com"><img src="https://www.google.com/search?q=https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC%3Fstyle%3Dfor-the-badge%26logo%3Dtailwind-css" alt="Tailwind CSS" /></a>
<a href="https://php.net"><img src="https://www.google.com/search?q=https://img.shields.io/badge/PHP-8.2%2B-777BB4%3Fstyle%3Dfor-the-badge%26logo%3Dphp" alt="PHP" /></a>
<a href="https://mysql.com"><img src="https://www.google.com/search?q=https://img.shields.io/badge/MySQL-8.0%2B-4479A1%3Fstyle%3Dfor-the-badge%26logo%3Dmysql" alt="MySQL" /></a>
</p>

<p align="center">
<a href="#-características-principales">Características</a> •
<a href="#-instalación">Instalación</a> •
<a href="#-credenciales-de-prueba">Credenciales</a> •
<a href="#-uso-del-sistema">Uso</a> •
<a href="#-solución-de-problemas">Soporte</a>
</p>

📖 Descripción

Sistema de gestión robusto desarrollado con Laravel 11 y Tailwind CSS. Diseñado para optimizar la administración de una clínica veterinaria, permitiendo el control total de clientes, expedientes de mascotas y personal administrativo mediante un sistema seguro de roles y permisos (ACL).

📋 Características Principales

Módulo

Descripción

🔐 Autenticación

Login/Logout seguro implementado con Laravel Jetstream.

👥 Gestión de Roles

Jerarquía completa: Administrador, Staff y Cliente.

🐕 Pacientes (Mascotas)

CRUD completo con historial clínico y relación directa a dueños.

👤 Clientes

Administración de perfiles de usuarios y vinculación de mascotas.

🛡️ Seguridad

Rutas protegidas y middleware personalizado con Spatie.

🎨 UX/UI

Interfaz moderna, responsive y con Modo Oscuro nativo.

📊 Dashboard

Vista general con estadísticas y accesos rápidos según el rol.

🛠️ Stack Tecnológico

Backend framework: Laravel 11.x

Frontend: Blade Templates + Tailwind CSS

Interactividad: Livewire

Base de Datos: MySQL / SQLite

Gestión de Accesos: Spatie Laravel-Permission

Empaquetador: Vite

⚙️ Requisitos Previos

Asegúrate de tener instalado lo siguiente antes de comenzar:

PHP >= 8.2

Composer >= 2.5

Node.js >= 18.x & NPM >= 9.x

MySQL >= 8.0 o SQLite

🚀 Instalación y Configuración

Sigue estos pasos para desplegar el proyecto en tu entorno local:

1. Clonar el repositorio

git clone <url-del-repositorio>
cd Vet_FcoDeMontejo_Proyecto


2. Instalar dependencias

# Backend
composer install

# Frontend
npm install


3. Configuración de entorno

cp .env.example .env


Nota: Abre el archivo .env y configura tus credenciales de base de datos (DB_DATABASE, DB_USERNAME, etc.).

4. Generar Key y Migrar

php artisan key:generate
php artisan migrate --seed


El comando --seed poblará la base de datos con los usuarios de prueba.

5. Ejecutar la aplicación

Necesitarás dos terminales:

Terminal 1 (Vite - Hot Reload):

npm run dev


Terminal 2 (Servidor Laravel):

php artisan serve


Visita http://localhost:8000 en tu navegador.

🔑 Credenciales de Prueba

El sistema viene precargado con los siguientes usuarios para testear los diferentes niveles de acceso:

Rol

Email

Contraseña

Permisos

👑 Administrador

admin@test.com

password

Acceso total al sistema y gestión de usuarios.

👨‍⚕️ Staff

staff@test.com

password

Gestión operativa de clientes y mascotas.

👤 Cliente

cliente@test.com

password

Vista de lectura de sus propias mascotas.

📱 Guía de Uso Rápido

Panel de Administración

/administradores: CRUD de usuarios internos. Aquí asignas roles.

/clientes: Base de datos de dueños.

/mascotas: Expedientes clínicos. Incluye foto, raza, edad y vinculación con dueño.

Estructura del Proyecto

Vet_FcoDeMontejo_Proyecto/
├── app/
│   ├── Http/Controllers/   # Lógica de negocio (Cliente, Mascota, User)
│   └── Models/             # Modelos Eloquent y Relaciones
├── database/
│   └── seeders/            # Datos de prueba (DatabaseSeeder)
├── resources/
│   └── views/              # Vistas Blade (Dashboard, Landing, CRUDs)
└── routes/
    └── web.php             # Rutas protegidas por Middleware


🐛 Solución de Problemas Comunes

<details>
<summary><strong>🚫 Error: Permission denied en storage/</strong></summary>

Si tienes problemas de permisos en Linux/Mac para guardar imágenes o logs:

chmod -R 775 storage bootstrap/cache


</details>

<details>
<summary><strong>🎨 Los estilos no cargan o se ven mal</strong></summary>

Asegúrate de que Vite esté corriendo (npm run dev) o compila los assets para producción:

npm run build


</details>

<details>
<summary><strong>💾 Error de Base de Datos o Tablas faltantes</strong></summary>

Reinicia la base de datos completamente:

php artisan migrate:fresh --seed


</details>

👨‍💻 Autor

Proyecto desarrollado para la materia de Gaxiola Alluah jeke arabe dueño el 70% de paseo verde.

📄 Licencia

Este proyecto es de código abierto y está disponible bajo la Licencia MIT.

<p align="center">
<i>Hecho con ❤️ y Laravel</i>
</p>
