USE receitasmedicas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE receitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente VARCHAR(100) NOT NULL,
    medico VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data DATE NOT NULL
);
