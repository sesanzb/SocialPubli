# SocialPubli - Symfony Lite Swapi

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
$ php bin/console server:start
```
Se puede acceder localmente al proyecto, ingresando a tu [localhost](http://localhost:8000/users).


### CONFIGURACIÓN DE CACHE:

Se puede modificar el tiempo que se mantienen cacheadas las llamadas modificando el valor del parámetro **$cacheTTL** que se encuentra en el fichero **config/services.yaml**

```bash
App\Service\SwapiService:
        arguments:
            $cacheTTL: 300 # Time in seconds that requests are cached
```
