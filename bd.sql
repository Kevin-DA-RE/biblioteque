-- Création de la base de données
CREATE DATABASE IF NOT EXISTS biblioteque;

-- Sélection de la base de données
USE biblioteque;

-- Création de la table 'media'
CREATE TABLE IF NOT EXISTS media (
    id INT PRIMARY KEY,
    nom VARCHAR(50),
    url VARCHAR(250)
);

-- Création de la table 'categories'
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY,
    nom VARCHAR(50),
    id_media INT,
    FOREIGN KEY (id_media) REFERENCES media(id)
);
