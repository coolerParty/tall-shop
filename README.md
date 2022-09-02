## Installation

install php, or XAMPP

    - https://www.apachefriends.org/
    - download and install
    
install composer

    - https://getcomposer.org
    - download and install 

Install Nodejs

    - https://nodejs.org/
    - download and install 

Terminal

    cd "directory file"
    git clone https://github.com/coolerParty/pizza-Online-System.git
    cd pizza-Online-System
    composer install

Rename ".env.example" file to ".env" then Edit 
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=food
    DB_USERNAME=root
    DB_PASSWORD=

localhost/phpmyadmin
    - Create Database Name: food
  
Terminal

    php artisan key:generate
    php artisan migrate:fresh --seed    
    npm install
    npm run dev
    php artisan serve

copy URL

    127.0.0.1:8000
        
Users

    Name    : SuperAdmin
    Email   : superadmin@admin.com
    Password: 1234567890
    
    Name    : Admin
    Email   : admin@admin.com
    Password: 1234567890
    