# SocialPubli - Symfony Lite Swapi


### REQUERIMIENTOS PREVIOS

Se debe tener Composer instalado globalmente. 
Si se utiliza Linux o Mac OS X, ejecutar los siguientes comandos:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

Si se utiliza Windows, descargar el [instalador ejecutable de
Composer](https://getcomposer.org/download) y seguir los pasos indicados por el
instalador.

##### NOTA ##### 
> Desarrollado bajo PHP 7.3 y Symfony 5

### INSTALACIÓN:

En la ruta preferida, descargar el proyecto:

```bash
$ git clone https://github.com/sesanzb/SocialPubli.git
$ cd SocialPubli/
$ composer install
```

### INICIO:

Dentro de la raíz del proyecto, iniciar el servidor web interno de PHP:

```bash
$ symfony server:start
```
Se puede acceder localmente al proyecto, ingresando a tu [localhost](http://localhost:8000/users).


### CONFIGURACIÓN DE CACHE:

Se puede modificar el tiempo que se mantienen cacheadas las llamadas modificando el valor del parámetro **$cacheTTL** que se encuentra en el fichero **config/services.yaml**

```bash
App\Service\SwapiService:
        arguments:
            $cacheTTL: 300 # Time in seconds that requests are cached
```
