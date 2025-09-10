
CREATE SCHEMA IF NOT EXISTS Encuesta_Anonima;
use Encuesta_Anonima;



CREATE TABLE preguntas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    encuesta_id INT NOT NULL,
    interrogante VARCHAR(255) NOT NULL,
    respuesta VARCHAR(255) NOT NULL
);

CREATE TABLE opciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pregunta_id INT NOT NULL,
    respuesta VARCHAR(255) NOT NULL,
    FOREIGN KEY (pregunta_id) REFERENCES preguntas(id) ON DELETE CASCADE
);

CREATE TABLE encuestas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT
);


CREATE TABLE registro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    encuesta_id INT NOT NULL,
    pregunta_id INT NOT NULL,
    opcion_id INT,
    FOREIGN KEY (pregunta_id) REFERENCES preguntas(id) ON DELETE CASCADE,
    FOREIGN KEY (opcion_id) REFERENCES opciones(id) ON DELETE CASCADE
);