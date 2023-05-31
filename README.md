# backend_dcurieses

## Requisitos
- PHP v8
* Composer v2.5
+ Postman

## Implementación
Una vez disponemos de los requisitos marcados en la parte superior, podemos realizar la implementación de la API.

Para llevar a cabo la implementación de esta API REST hay que seguir los siguientes pasos:
1. Descargar el código de la API desde este repositorio de GitHub, mediante git clone o la descarga del zip
2. Acceder desde una terminal al directorio donde se aloja el código de la API.
3. Acceder a la carpeta /rest-api
4. Crear el archivo .env en el directorio raíz
5. Definir las variables siguientes dentro del .env: 
```
APP_URL=http://localhost
DB_CONNECTION=sqlite
DB_DATABASE=database.sqlite
```
8. Ejecutar el comando ```php artisan migrate``` para poder generar las bases de datos.
9. Ejecutar el comando ```php artisan serve``` para levantar la API.
