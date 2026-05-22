CREATE TABLE INCIDENCIES_AULA (
    id INT AUTO_INCREMENT PRIMARY KEY,
    alumne VARCHAR(100),
    aula VARCHAR(50),
    problema VARCHAR(150),
    prioritat VARCHAR(20),
    data TIMESTAMP  
);

INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES ('Arnau', 'Aula 201', 'El projector no funciona', 'Alta', NOW());
INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES ('Júlia', 'Aula 105', 'Falta un teclat', 'Mitjana', NOW());
INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES ('Marc', 'Aula 203', 'No hi ha connexió a Internet', 'Alta', NOW());
INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES ('Nora', 'Aula 101', 'Una cadira està trencada', 'Baixa', NOW());
INSERT INTO INCIDENCIES_AULA (alumne, aula, problema, prioritat, data) VALUES ('Pau', 'Aula 202', 'El ratolí no respon', 'Mitjana', NOW());
