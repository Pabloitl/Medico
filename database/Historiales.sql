CREATE DATABASE Historiales

USE Historiales

DROP TABLE Consulta;
DROP TABLE Alergia;
DROP TABLE Medicamento;
DROP TABLE Alumno;
DROP TABLE Medico;

CREATE TABLE Alumno(
	No_Control INT NOT NULL,
	Nombre VARCHAR(50),
	Sexo VARCHAR(15),
	Carrera VARCHAR(30)
);

ALTER TABLE Alumno
ADD CONSTRAINT pk_alumno PRIMARY KEY (No_Control);

CREATE TABLE Medico(
	Cedula INT NOT NULL,
	Nombre VARCHAR(50),
	Campus INT
);

ALTER TABLE Medico
ADD CONSTRAINT pk_medico PRIMARY KEY (Cedula);

CREATE TABLE Consulta(
	No_Consulta INT NOT NULL,
	No_Control INT NOT NULL,
	Cedula INT NOT NULL,
	Fecha_consulta DATE,
	Diagnostico VARCHAR(30),
	Tipo_Afeccion VARCHAR(30)
);

ALTER TABLE Consulta
ADD CONSTRAINT pk_consulta PRIMARY KEY (No_Consulta);

ALTER TABLE Consulta
ADD CONSTRAINT fk_alumno_consulta FOREIGN KEY (No_Control) REFERENCES Alumno (No_Control);

ALTER TABLE Consulta
ADD CONSTRAINT fk_medico_consulta FOREIGN KEY (Cedula) REFERENCES Medico (Cedula);

CREATE TABLE Medicamento(
	Cod_M VARCHAR(8) NOT NULL,
	Nombre VARCHAR(40)
);

ALTER TABLE Medicamento
ADD CONSTRAINT pk_medicamento PRIMARY KEY (Cod_M);

CREATE TABLE Alergia(
	No_Control INT NOT NULL,
	Cod_M VARCHAR(8) NOT NULL
);

ALTER TABLE Alergia
ADD CONSTRAINT pk_alergia PRIMARY KEY (No_Control, Cod_M);

ALTER TABLE Alergia
ADD CONSTRAINT fk_alumno_alergia FOREIGN KEY (No_Control) REFERENCES Alumno (No_Control);

ALTER TABLE Alergia
ADD CONSTRAINT fk_medicamento_alergia FOREIGN KEY (Cod_M) REFERENCES Medicamento (Cod_M);





