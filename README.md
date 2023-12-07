<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Horoscope astronomique

## Description

Horoscope astronomique est le parfait mélange de la sciences et l'astrologie et permet de découvrir ce qui t'attend dans ton cursus d'étudiant.

Tu peux simplement entrer tes informations et recevoir une prédiction ou crée un compte et informer tes données automatiquement.

Enjoy !

## Aspects techniques

- Framework : Laravel
- Database : MySQL
- ORM : Eloquent
- Library manager : Composer
- Linter : Pint

## Installation

### Prérequis
- Windows Subsystem for Linux (WSL 2.0) if running on a Windows OS
- Git
- Docker Desktop
- Visual Studio code

### Étapes

Voici les étapes pour WSL sur Windows 
1. Cloner le repo
```
git clone https://github.com/vino89/WEB-LAB2.git
```
2. Ouvrir dans VS code
```
code .
```
4. cliquer sur "reopen in container"
6. Ouvrir la page http://localhost dans ton browser préféré

## Base de données
Les bases de données doivent être peuplées à l'aide des instructions suivantes :
```
php artisan db:seed --class=DatabaseSeeder
php artisan db:seed --class=DebutsTableSeeder
php artisan db:seed --class=MilieuxTableSeeder
php artisan db:seed --class=FinsTableSeeder
```
```
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
php artisan migrate:fresh --seed --seeder=DebutsTableSeeder
php artisan migrate:fresh --seed --seeder=MilieuxTableSeeder
php artisan migrate:fresh --seed --seeder=FinsTableSeeder
```

## Comptes utilisateurs
3 comptes sont déjà dans la base de données et peuvent être utilisés pour des tests :
- vic
- alec5
- pirakasos

## linter
Le linter peut être lancé en exécutant la commande suivante :
```
./vendor/bin/pint
```

## devcontainer
```
curl -s "https://laravel.build/WEB-PW2?with=mysql,redis&devcontainer" | bash
```