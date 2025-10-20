# TPE - Películas y Directores
## Integrantes
- Ferraresi Lucía Adela – luciaferraresi30@gmail.com
- Thomassen Carretero Jean Lucas – jeanthomassen.04@gmail.com

## Temática
Películas y Directores

## Descripción
Este proyecto consiste en un sitio web dinámico que permite visualizar películas según su director. 
Cada película pertenece a un solo director. Solo el administrador podrá agregar, modificar o eliminar películas y directores.

## Diagrama Entidad-Relación (DER)
Se incluye el archivo [Diagrama Entidad-Relacion](DER.jpeg) que representa las entidades "Película" y "Director" con una relación de 1 a N:
- Un director puede tener muchas películas.
- Una película pertenece a un solo director.

## SQL
El archivo SQL exportado se encuentra en [database.sql](database.sql) y crea las tablas:
- `Película`  
- `Director`
- `Usuario`
- La relación es de 1 a N, cada película tiene un director.

## Instalacion / Importar la DB
1. Cloná este repositorio: https://github.com/luciaadelaferraresi/tpe-peliculas-directores
2. Editá config.php (en la raíz) para que coincida con tu entorno local
3. El sistema accede a la base de datos utilizando las constantes definidas en config.php.
4. Si la base de datos no existe, se creará automáticamente y se cargará con datos iniciales definidos en database.sql
5. Iniciá Apache y MySQL desde XAMPP.
6. Abrí el navegador y accedé a la carpeta del proyecto, por ejemplo: http://localhost/nombre-de-tu-carpeta/

# usuario administrador:
Podes iniciar sesión con las siguientes credenciales:
usuario/email: `webadmin`
contraseña: `admin`