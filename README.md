Taller de Servicios - Sistema de Gestión

Este proyecto es un sistema de gestión para un taller de servicios, desarrollado con Laravel 12 y MySQL, que permite administrar clientes, técnicos, marcas, equipos y servicios utilizando Procedimientos Almacenados (SP).

El proyecto incluye un backup de la base de datos para poder inicializar el sistema fácilmente.

Requisitos

Antes de instalar el proyecto, asegúrate de contar con lo siguiente:

PHP >= 8.2

Composer

MySQL >= 8.0

Servidor local (XAMPP, WAMP, Laravel Valet, etc.)



Instalación del Proyecto

Clonar el repositorio:

git clone https://github.com/LuisE22C/Prueba_programacion.git
cd nombre-del-repo


Instalar dependencias de Laravel:

composer install


Edita .env y configura tus datos de la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller_servicios
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña


Generar la clave de la aplicación:

php artisan key:generate

Base de Datos

Dentro del proyecto hay un carpeta llamado README, que contiene el backup completo de la base de datos taller_servicios, incluyendo:

Tablas: cliente, tecnico, marca, equipo, servicio

Procedimientos almacenados para insertar, actualizar y listar registros


Ejecución del Proyecto

Inicia el servidor de desarrollo de Laravel:

php artisan serve


Abre tu navegador y accede a:

http://127.0.0.1:8000


Verás el Dashboard (Inicio), desde donde puedes navegar a las secciones:

Clientes
Técnicos
Marcas
Equipos
Servicios



Notas

Los CRUDs de clientes, técnicos, marcas, equipos y servicios utilizan Procedimientos Almacenados (SP) para la inserción, actualización y consulta de datos.

La vista principal inicio.blade.php funciona como dashboard desde donde puedes acceder a todas las secciones.

Recuerda configurar tu usuario y contraseña de MySQL en el archivo .env antes de ejecutar el proyecto.

*********************************************************************************

Nota: La parte de Algoritmos numericos se encuentra se encuentra en la carpeta que dice README 
