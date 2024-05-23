# Proyecto_Laravel
Práctica de Laravel

## Pasos previos
- Instalar composer y laravel: [Descargar Composer](https://getcomposer.org/Composer-Setup.exe)
- Desde Consola o PowerShell con privilegios de administrador, ejecutar el siguiente comando: `composer global require laravel/installer`
- Preparar el IDE, en este caso PhpStorm, e instalar los siguientes plugins útiles desde `Settings -> Plugins`:
    - Atom Material Icons
    - Laravel Idea

### Crear el proyecto
- Crear el proyecto Laravel: `composer create-project laravel/laravel Proyecto_Laravel`
- Alternativamente, desde Laravel: `laravel new Proyecto_Laravel`
- Seguir el proceso de instalación para seleccionar las opciones deseadas.

### Clonar el repositorio git
- Crear una carpeta y clonar el repositorio git:
  ```
  git clone <URL_del_repositorio>

### Crear rama develop
```
git checkout -b "develop"
```

### Añadir los archivos y poner un comentario (esto se hará frecuentemente para tener el repositorio actualizado)
```
git checkout -b develop
git add .
git commit -m "Inicio practica Laravel"
```

### Hacer el push
```
git push -u origin develop
```

### Hacer merge
Ir al repositio y seguir los pasos para Compare&Pull request y luego merge.

### Comprobar la instalación
Para comprobar que Laravel se ha instalado correctamente y ver información sobre la aplicación, puedes ejecutar el siguiente comando desde la terminal, estando ubicado en el directorio de tu proyecto Laravel (en este caso, `Proyecto_Laravel`):

```
php artisan about
```
### Arancar el servidor
```
php artisan serve
```
```
http://127.0.0.1:8000/
```

![Web inicial funcionando](public/images/web_inicial.PNG)

## Crear nuestra web

## Generar index.blade.php 

En resources/views/ creamos nuestra estructura básica de web:
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
</head>
<body>
<header><h1 ">Esta es mi página principal</h1></header>
<hr />
<nav>
    Menu
</nav>

<main>
    Parte Principal
</main>

<footer>
    Footer
</footer>
</body>
```
### Crear MainController

Hay que crear el controlador principal de nuestra web (MainController):
```
php artisan make:controller MainController
```

Y despues agregarle esto:

```
public function index (){

        return view ('index');
    }

```

### Modificar fichero de rutas

Debemos modificas el fichero Routes/web.php para que encuentre las rutas correctamente.
Al principio añadimos el directorio para referenciarlo:
```
use \App\Http\Controllers\MainController; 
```

Despues agregamos nuestra ruta:
```
Route::get('/', [MainController::class, 'index'])->name('main');
```

Y para hacer que nuestra web sea la inicial comentamos estas lineas:
```
/*Route::get('/', function () {
    return view('welcome');
})*/


```

![Estructura basica web](public/images/estructura_basica.PNG)

## Para darle formato a la web

### Descargar e instalar node.js (tambien se instalará npm)
```
https://nodejs.org/en
```

### Descargar e instalar breeze
Tambien se instala tailwindcss para dar formato. Hay que tener en cuenta que hay que estar en el directorio del proyecto.

NOTA: Al instalar sobreescribe el fichero web.php, por lo que debemos hacer una copia si queremos conservar lo que tiene configurado para agrgarlo posteriormente.

```
composer require laravel/breeze
```

Si se ha instalado bien debe crearse la carpeta en vendor/laravel/breeze
Lo tenemos instalado pero no disponible, para eso necesitamos ejecutar:
```
php artisan breeze
```
Selecionaremos:
* Blade
* No modo dark
* PHPinit.

  Con eso ha instalado los controladores, las vistas y las rutas por defecto para login, register, etc...
  Las vistas/webs se pueden modificar a nuestra conveniencia todo a excepto de las variables.

### Tailwindcss y @vite

Podemos aplicar distintos estilos que tiene añadidos taildwindcss, pero para que compile los estilos  y se apliquen debemos ejecutar en el terminal.

```
npm run dev
```

Tambien podemos crear los nuestro propios, eso se hace en el fichero taildwind.config.js

```
height:{
  "10v":"10vh",
  "15v":"15vh",
  "65v":"65vh"
},
colors:{
  'header': "#BE0F34",
  'nav': "#FFFFFF",
  'main':"#DCE5F4",
  'footer':"#E5E5E5"
},
```
Ademas debemos referencias el fichero en nuestro html con:

```
@vite("resources/css/app.css")
```

### Aplicar los estilos a nuestro index.blade.php

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    @vite("resources/css/app.css")
</head>
<body>
<header><h1 class="h-15v bg-header">Esta es mi página principal</h1></header>
<hr />
<nav CLASS="h-10 bg-nav">
    Menu
</nav>

<main class="h-65v bg-main">
    Parte Principal
</main>

<footer class="h-10v bg-footer">
    Footer
</footer>
</body>
</html>
```
![Vista web estilos](public/images/estilos.PNG)

## Layouts

El siguiente paso es crear los layouts para nuestra web, ya que queremos que todos las distintas partes tengan la misma parariencia, este mejor estructurado el codigo y sea más facil de mantener.

Mover index.blade.php a una carpeta creada dentro de views/components/layouts y renombrarlo a layout.blade.php

Crear en views/index.blade.php
```
<x-layouts.layout>
    <h1>Esta es la parte main</h1>
</x-layouts.layout>
```

Y en layout.blade.php cambiar en main por la variable, para refenciarlo.
``` 
<main class="h-65v bg-main">
    {{$slot}}
</main>
```

Cortar el contenido de header de layout.blade.php  y sustituirlo por esto:
```
<x-layouts.header/>
```
Crear layout para layouts/header.blade.php con lo que hemos cortado anteriormente.
```
<header> 
  Proyecto Laravel
</header>
Hacemos lo mismo con nav, quitamos el contenido de nav de layout.blade.php  y lo sustituimos por esto:
```
<x-layouts.nav/>
```
Crear layout para layouts/nav.blade.php

```
<nav>
  Menu
</nav>

Ya solo queda el footer, creamos el archivo footer.blade.php y en layout.blade.php sustituimos el footer por esto:
```
<x-layouts.footer/>
```

### Instalamos Daisyui para dar estilos a nuestra web y botones
Se instala desde el terminal con:
```
npm i -D daisyui@latest
```

Agregarlo a plugins en tailwind.config.php 

```
plugins: [forms, require('daisyui')],
```

Una vez hecho esto, vamos a la web y seleccionamos lo que queremos (asi con copiar y pegar tenemos nuestros estilos)
```
https://daisyui.com/components/button/
```

#### En el header
Agregamos el Logo.png y lo guardamos en carpeta public/images/Logo.png y le damos formato
```
<header class="h-15v bg-header p-5 flex justify-between items-center">
    <img class="max-h-full" src="{{ asset('images/Logo.png') }}" alt="Logo">
    <h1 class="text-5xl text-white" >CRUD de alumnos</h1>
    <div>
        <a class=" btn btn-warning">Entrar</a>
        <a class=" btn btn-warning">Registro</a>
    </div>
</header>

```

#### En el nav

Agregar los botones que necesitamos para el menu y dar forma:
```
<nav class="h-15vv bg-nav flex flex-row justify-start items-center space-x-2 p-3">
    <a class="btn btn-primary" href="">Inicio</a>
    <a class="btn btn-secondary" href="">Alumnos</a>
    <a class="btn btn-success" href="">Proyectos</a>
</nav>
```

### Agregamos contenido a nuestro index.blade.php

Buscamos en Dasyui y agregamos el contenido al cuerpo de nuestro index

```
<x-layouts.layout>
    <div class="hero h-full bg-base-200">
        <div class="hero-content flex-col lg:flex-row">
            <img src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" class="max-w-sm rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Box Office News!</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
</x-layouts.layout>
```
### En el footer

Volvemos a buscar a Daisyui y escogemos el que mas nos giuste, lo agregamos a footer.blade.php dentro de layouts
```
<footer class="footer items-center p-4 bg-neutral text-neutral-content">
    <aside class="items-center grid-flow-col">
        <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
        <p>Copyright © 2024 - All right reserved</p>
    </aside>
    <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
        </a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </nav>
</footer>
```
![WEb Daisyui](public/images/daisyui.PNG)

Personalización de la web
![WEb Personalizada](public/images/personalizada.PNG)