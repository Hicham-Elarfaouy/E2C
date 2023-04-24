
## E2C

Mon projet consiste à créer un site web pour l'école de la 2e chance. Ce site web vise à améliorer l'expérience des étudiants et des visiteurs en offrant une présentation interactive de l'école, une gestion simplifiée de l'administration, une meilleure accessibilité aux informations, aux emplois de temps et aux documents administratifs ainsi qu'une communication améliorée entre les étudiants, les enseignants et l'administration de l'école.


## Tech Stack

**Client:**  Bootstrap - TailwindCSS

**Server:**  Laravel - MySQL


## Features

- Landing Page
- Login
- Dashboard
- Classrooms
- Schedules
- Requests


## Installation

 - Clone the repository or obtain a compressed archive file of the project.
```bash
  git clone https://github.com/Hicham-Elarfaouy/E2C.git
```

 - Navigate to the root directory of the project using the command line or terminal.

 - Run composer install command to install all the necessary packages and dependencies.
```bash
  composer install
```

 - Run npm install command to install all the necessary packages and dependencies.
```bash
  npm install
```

 - Create a new .env file by copying the .env.example file using the command cp .env.example .env (on Unix-based systems) or copy .env.example .env (on Windows).
```bash
  cp .env.example .env
  copy .env.example .env
```

 - Generate a unique application key by running the command.
```bash
  php artisan key:generate
``` 

 - Run the command php artisan migrate to create the necessary database tables.
```bash
  php artisan migrate
```
    
 - You can now run the Laravel application by running the command php artisan serve. The application should now be accessible at http://localhost:8000 in your web browser.
```bash
  php artisan serve
```
 
 
## Environment Variables

Edit the .env file to include the configuration settings for your database.

``DB_HOST``
``DB_PORT``

``DB_DATABASE``
``DB_USERNAME``
``DB_PASSWORD``


## Badges

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## Authors

- [@hicham](https://github.com/Hicham-Elarfaouy)

