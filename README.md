<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Creamos rama en Git
Crearemos la rama dev en git para trabajar

## Comprobar version de php:
php --version

## Comprobar versión composer:
composer –version

## Crear proyecto laravel:
composer create-project laravel/laravel mi-proyecto-laravel

## Para levantar el servidor:
php artisan serve


## Crear archivo procfile y añadir línea:
web: vendor/bin/heroku-php-apache2 public/

## Modificar archivo appserviceprovider.php

En el archivo app-service-providers-appserviceprovider.php añadir varias líneas en la función register:
![image](https://user-images.githubusercontent.com/28491001/146584027-f81300fd-f79e-4e7c-9756-ab700080e345.png)

 
Y en la función boot:

![image](https://user-images.githubusercontent.com/28491001/146584036-fcc4e207-7dd4-42ed-b152-db775bf66b93.png)



