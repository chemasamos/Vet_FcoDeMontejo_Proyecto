# 🐾 Veterinaria Francisco de Montejo

Sistema de gestión integral para clínica veterinaria, desarrollado con Laravel 11 y Tailwind CSS. Permite administrar clientes, mascotas y personal de manera eficiente con un sistema de roles y permisos robusto.

## 📋 Características Principales

- ✅ **Sistema de Autenticación**: Login/Logout con Laravel Jetstream
- 👥 **Gestión de Roles**: Administrador, Staff y Cliente
- 🐕 **Módulo de Mascotas**: CRUD completo con relación a dueños
- 👤 **Gestión de Clientes**: Administración de usuarios tipo cliente
- 🛡️ **Control de Acceso**: Rutas protegidas según roles
- 🎨 **Interfaz Moderna**: UI responsive con Tailwind CSS
- 📊 **Dashboard**: Vista general del sistema

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 11.x
- **Frontend**: Blade Templates + Tailwind CSS
- **Autenticación**: Laravel Jetstream con Livewire
- **Roles y Permisos**: Spatie Laravel-Permission
- **Base de Datos**: MySQL/SQLite
- **Assets**: Vite

## ⚙️ Requisitos del Sistema

- PHP >= 8.2
- Composer >= 2.5
- Node.js >= 18.x
- NPM >= 9.x
- MySQL >= 8.0 o SQLite

## 🚀 Instalación

### 1️⃣ Clonar el Repositorio

```bash
git clone <url-del-repositorio>
cd Vet_FcoDeMontejo_Proyecto
```

### 2️⃣ Instalar Dependencias de PHP

```bash
composer install
```

### 3️⃣ Instalar Dependencias de Node

```bash
npm install
```

### 4️⃣ Configurar Variables de Entorno

```bash
cp .env.example .env
```

Edita el archivo `.env` y configura tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=veterinaria_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Generar Clave de Aplicación

```bash
php artisan key:generate
```

### 6️⃣ Ejecutar Migraciones y Seeders

```bash
php artisan migrate --seed
```

Este comando creará todas las tablas necesarias y poblará la base de datos con datos de prueba.

### 7️⃣ Compilar Assets

```bash
npm run build
```

Para desarrollo (con hot reload):

```bash
npm run dev
```

### 8️⃣ Iniciar el Servidor

```bash
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

## 🔑 Credenciales de Prueba

El seeder crea automáticamente los siguientes usuarios de prueba:

### Administrador
- **Email**: `admin@test.com`
- **Contraseña**: `password`
- **Permisos**: Acceso total al sistema

### Staff
- **Email**: `staff@test.com`
- **Contraseña**: `password`
- **Permisos**: Gestión de clientes y mascotas

### Cliente
- **Email**: `cliente@test.com`
- **Contraseña**: `password`
- **Permisos**: Vista de sus propias mascotas

## 📱 Uso del Sistema

### Panel de Administración

1. **Gestión de Administradores**: `/administradores`
   - Crear, editar y eliminar usuarios admin/staff
   - Asignar roles a usuarios

2. **Gestión de Clientes**: `/clientes`
   - Administrar clientes del sistema
   - Vincular clientes con mascotas

3. **Gestión de Mascotas**: `/mascotas`
   - Registrar nuevas mascotas
   - Editar información (nombre, especie, raza, edad)
   - Asociar mascota con dueño
   - Eliminar registros

### Dashboard

Accede a `http://localhost:8000/dashboard` después de iniciar sesión para ver:
- Resumen de estadísticas
- Accesos rápidos a módulos principales
- Panel personalizado según rol

## 🗂️ Estructura del Proyecto

```
Vet_FcoDeMontejo_Proyecto/
├── app/
│   ├── Http/Controllers/
│   │   ├── ClienteController.php
│   │   ├── MascotaController.php
│   │   └── UserController.php
│   └── Models/
│       ├── User.php
│       └── Mascota.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── clientes/
│       ├── mascotas/
│       ├── users/
│       ├── dashboard.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 🔐 Sistema de Roles

### Admin
- Gestión completa de administradores y staff
- Acceso a todos los módulos
- Control total del sistema

### Staff
- Gestión de clientes
- Gestión de mascotas
- Sin acceso a panel de administradores

### Cliente
- Vista de sus propias mascotas
- Acceso limitado al sistema

## 🎨 Características de UI

- ✨ Diseño responsive
- 🌙 Soporte para modo oscuro
- 🔵 Botones interactivos con efectos hover
- 📊 Tablas con paginación
- 🎯 Iconos SVG integrados
- ⚡ Transiciones suaves

## 📝 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recompilar assets
npm run build

# Ejecutar en modo desarrollo
npm run dev

# Refrescar base de datos
php artisan migrate:fresh --seed
```

## 🐛 Solución de Problemas

### Error de permisos en storage/
```bash
chmod -R 775 storage bootstrap/cache
```

### Assets no se actualizan
```bash
npm run build
```

### Error con Vite
```bash
npm install
npm run build
```

## 👨‍💻 Autor

Proyecto desarrollado para la materia de Programación Web.

## 📄 Licencia

Este proyecto es de código abierto y está disponible bajo la [Licencia MIT](LICENSE).

---

**Nota**: Este es un proyecto académico desarrollado con fines educativos.
