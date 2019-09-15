
Requerido:
Tener instalado  xampp o similar (en Windows).
https://www.apachefriends.org/es/index.html
Tener instalado composer
https://getcomposer.org/download/
Tener instalado nodejs
https://nodejs.org/es/
opcional tener instalado git bash en windows
https://gitforwindows.org/

En la carpeta htdocs del directorio correspondiente a la instalación de xampp  crear una carpeta llamada Ejercicio. Clonar el proyecto abriendo una terminal en la carpeta del proyecto y ejecutando  git clone https://github.com/Diegodelias/CrudLaravelEjercicio.git
<br>
<br>
Con  el  Xampp corriendo Apache y mysql ingresar a phpmyadmin y crear una nueva base de datos llamada ejercicio
importar el archivo ejercicio.sql  ubicado en la carpeta basedatos del proyecto a la  base de datos. También se puede  descargar de acá https://drive.google.com/drive/folders/1_xPB_f8J7nuAEpxkJtskHFSbny3lKIDm	
<br>

Instalar dependencias de composer. Abrir una  terminal en el directorio de la aplicación y ejecutar el comando 
composer install

Instalar dependencias de NPM. Abrir una  terminal en el directorio de la aplicación y ejecutar el comando 
npm install

Hacer una copia del archivo ‘.env.example’ y modificar su nombre a ‘.env’. Abrirlo y editar los valores que se muestran a continuación. La parte del servidor de correo  no es necesaria ya que no está funcionando.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ejercicio
DB_USERNAME=root
DB_PASSWORD=null


MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=laravelpracticakaizen@gmail.com
MAIL_PASSWORD=nforkiqhstbystjy
MAIL_ENCRYPTION=tls

<br>
Generar la llave de encriptación de la aplicación
<br>
php artisan key:generate

<br>
por útimo ubicado en el directorio de la aplicación abrir una terminal y ejecutar el comando:

<br>

php artisan serve

<br>

abrir en un navegador la dirección indicada http://127.0.0.1:8000
<br>

En la base ya existen 2 usuarios de prueba uno administrador con email y contraseña admin@test.com   12345678 respectivamente y otro con permisos de operador con usuario diegodelias@gmail.com y contraseña 12345678.  Cualquiera de los 2 pueden usarse para realizar pruebas.

<br>


mas info sobre el proceso a realizar: https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/
