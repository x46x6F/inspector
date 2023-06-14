CREATE DATABASE IF NOT EXISTS 1nspect0r;

CREATE USER IF NOT EXISTS '1nspect0r' @'localhost' IDENTIFIED by '1nspect0r123';

GRANT ALL ON 1nspect0r.* TO '1nspect0r' @'localhost';

FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS constructors(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS types(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    domain VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS sites(
    id INT PRIMARY KEY AUTO_INCREMENT,
    adress VARCHAR(200) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS roles(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT FOREIGN KEY REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS campaigns(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status VARCHAR(30) NOT NULL,
    site_id INT FOREIGN KEY REFERENCES sites(id),
    creator_id INT FOREIGN KEY REFERENCES users(id),
    participant_id INT FOREIGN KEY REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS modeles(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    date_mm DATE NOT NULL,
    status BOOLEAN NOT NULL, -- En fabrication ou pas
    constructor_id INT FOREIGN KEY REFERENCES constructors(id),
    type_id INT FOREIGN KEY REFERENCES types(id)
);

CREATE TABLE IF NOT EXISTS materials(
    id INT PRIMARY KEY AUTO_INCREMENT,
    creation_year DATE NOT NULL,
    site_id INT FOREIGN KEY REFERENCES sites(id),
    modele_id INT FOREIGN KEY REFERENCES modeles(id)
);

CREATE TABLE IF NOT EXISTS pieces(
    id INT PRIMARY KEY AUTO_INCREMENT,
    creation_year DATE NOT NULL,
    has_electro BOOLEAN NOT NULL,
    material_id INT FOREIGN KEY REFERENCES materials(id),
    modele_id INT FOREIGN KEY REFERENCES modeles(id)
);

CREATE TABLE IF NOT EXISTS compatibles(
    modele_id INT FOREIGN KEY REFERENCES modeles(id),
    compatible_modele_id INT FOREIGN KEY REFERENCES modeles(id),
    PRIMARY KEY(modele_id, compatible_modele_id)
);