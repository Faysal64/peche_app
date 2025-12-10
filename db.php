Faysal Driouach <fdriouach10@gmail.com>
	
08:39 (il y a 3 minutes)
	
	
À Faysal
FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql \
    && chown -R www-data:www-data /var/www/html

COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
COPY ./app /var/www/html/

EXPOSE 80







version: "3.8"

services:

  web:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: peche_web
    ports:
      - "8083:80"
    volumes:
      - ./app:/var/www/html
    depends_on:
      - db
    restart: always

  db:
    image: mysql:8.0
    container_name: peche_db
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: peche
      MYSQL_USER: peche_user
      MYSQL_PASSWORD: peche_pass
    volumes:
      - ./db_data:/var/lib/mysql
      - ./peche.sql:/docker-entrypoint-initdb.d/peche.sql
    ports:
      - "3307:3306"

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: peche_phpmyadmin
    restart: always
    ports:
      - "8085:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: root

volumes:
  db_data:







CREATE TABLE poissons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    taille INT NOT NULL,
    poids FLOAT NOT NULL
);

INSERT INTO poissons (nom, taille, poids) VALUES
('Saumon', 40, 1.5),
('Thon', 90, 8.2),
('Truite', 30, 0.7);

CREATE TABLE localisations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    lat FLOAT NOT NULL,
    lng FLOAT NOT NULL
);













<?php

$host = 'db';         
$db   = 'peche';
$user = 'peche_user';  
$pass = 'peche_pass';  
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion MySQL : " . $e->getMessage());
}




