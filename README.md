# backend_dcurieses API REST
## Requisitos
+ PHP v8
+ Composer v2.5

Se recomienda el uso de aplicaciones como Postman para realizar pruebas sobre la API.
Existe en el repositorio una batería de pruebas para Postman con la cual se puede probar la API REST.

## Implementación
Una vez tengamos los requisitos marcados en la parte superior, podemos implementar la api con los siguientes pasos:
1. Descargar el código fuente desde este repositorio.
2. Acceder desde una terminal al directorio donde se encuentra el código.
3. Crear en el directorio raíz del proyecto el archivo '.env', existe un archivo de ejemplo denominado '.env.example'.
4. Crear dentro del archivo '.env' las siguientes variables: 
```
APP_URL=http://localhost
DB_CONNECTION=sqlite
DB_DATABASE=database.sqlite
```
5. Ejecutar el comando ```touch database/database.sqlite``` sobre el directorio raíz.
6. Ejecutar el comando ```php artisan migrate``` para generar las bases de datos.
7. Ejecutar el comando ```php artisan serve``` para levantar la API REST.

### [Documentación de la API REST](https://documenter.getpostman.com/view/27688582/2s93mATKPN).


