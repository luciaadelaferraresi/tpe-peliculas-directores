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
El archivo SQL exportado se encuentra en [cine.sql](cine.sql) y crea las tablas:

- `Película`  
- `Director`
- La relación es de 1 a N, cada película tiene un director.
