# prueba_aseo_regiona
Deberás construir una aplicación web para una empresa de logística y transporte, la cual permita la administración y visualización de sus rutas.

## Modelo de base de datos

![Image text](https://github.com/mdmd0497/prueba_aseo_regiona/blob/master/model_bd.PNG)

## Descargar:
Para la ejecución de la prueba debe tener previamente instalado XAMPP para ubicar el archivo a descargar.
Tenga en cuenta que el proyecto fue desarrollado en **PHP Version PHP 7.3.28**, por lo que la version de xampp debe estar con **PHP version 7**
```
https://github.com/mdmd0497/prueba_aseo_regiona
```

```
cd prueba_aseo_regiona
```

```
mv prueba_xolit C:\xampp\htdocs
```

una vez ubicado el archivo en la carpeta htdocs ejecutamos xampp

## importar base de datos
ingresar a la siguiente URL una vez ejecutado XAMPP
```
http://localhost
```
una vez hecho esto debe crear la base de datos con el nombre **empresa**
![Image text](https://github.com/mdmd0497/prueba_xolit/blob/master/php-myadmin.PNG)
![Image text](https://github.com/mdmd0497/prueba_xolit/blob/master/crear_bd.PNG)

luego de esto nos ubicamos en la base de datos **empresa**
![Image text](https://github.com/mdmd0497/prueba_xolit/blob/master/importar.png)
![Image text](https://github.com/mdmd0497/prueba_xolit/blob/master/importar-2.PNG)
seguido de ello importamos la base de datos que se encuentra en la ruta
```
C:\xampp\htdocs\prueba_xolit\persistence\prueba.sql
```
con esto finalizamos la importación de la base de datos

## Correr el proyecto
en un navegador escribir la siguiente URL
```
http://localhost/prueba_aseo_regiona/
```

el inicio le pedira un usuario y clave estas seran 
usuario:admin@admin.co
clave:123
![Image text](https://github.com/mdmd0497/prueba_xolit/blob/master/pagina-inicio.PNG)
