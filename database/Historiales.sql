DROP TABLE Consulta;
DROP TABLE Alergia;
DROP TABLE Medicamento;
DROP TABLE Alumno;
DROP TABLE Medico;
DROP DATABASE Historiales;
--- Hasta este punto se va a quitar

-- Script LDD
CREATE DATABASE Historiales;

USE Historiales;

--- Creación de tablas con claves foraneas y primarias
CREATE TABLE Alumno(
	No_Control INT UNIQUE NOT NULL,
	Nombre VARCHAR(50),
	Sexo VARCHAR(15),
	Carrera VARCHAR(30)
);

CREATE TABLE Medico(
	Cedula INT UNIQUE NOT NULL,
	Nombre VARCHAR(50),
	Campus INT
);

CREATE TABLE Consulta(
	No_Consulta INT IDENTITY (1,1) NOT NULL,
	No_Control INT NOT NULL,
	Cedula INT NOT NULL,
	Fecha_consulta DATE,
	Tipo_Afeccion VARCHAR(30),
    Cod_M VARCHAR(8) NOT NULL
);

CREATE TABLE Medicamento(
	Cod_M VARCHAR(8) UNIQUE NOT NULL,
	Nombre VARCHAR(40),
	Cantidad INT
);

CREATE TABLE Alergia(
	No_Control INT NOT NULL,
	Cod_M VARCHAR(8) NOT NULL
);

ALTER TABLE
    Alumno
ADD
    CONSTRAINT pk_alumno PRIMARY KEY (No_Control);

ALTER TABLE
    Medico
ADD
    CONSTRAINT pk_medico PRIMARY KEY (Cedula);

ALTER TABLE
    Consulta
ADD
    CONSTRAINT pk_consulta PRIMARY KEY (No_Consulta);

ALTER TABLE
    Medicamento
ADD
    CONSTRAINT pk_medicamento PRIMARY KEY (Cod_M);

ALTER TABLE
    Alergia
ADD
    CONSTRAINT pk_alergia PRIMARY KEY (No_Control, Cod_M);

ALTER TABLE
    Consulta
ADD
    CONSTRAINT fk_alumno_consulta FOREIGN KEY (No_Control)
    REFERENCES Alumno (No_Control);

ALTER TABLE
    Consulta
ADD
    CONSTRAINT fk_medico_consulta FOREIGN KEY (Cedula)
    REFERENCES Medico (Cedula);

ALTER TABLE
    Consulta
ADD
    CONSTRAINT fk_medicamento_consulta FOREIGN KEY (Cod_M)
    REFERENCES Medicamento (Cod_M);

ALTER TABLE
    Alergia
ADD
    CONSTRAINT fk_alumno_alergia FOREIGN KEY (No_Control)
    REFERENCES Alumno (No_Control);

ALTER TABLE
    Alergia
ADD
    CONSTRAINT fk_medicamento_alergia FOREIGN KEY (Cod_M)
    REFERENCES Medicamento (Cod_M);

-- Insertar registros en la BD
INSERT INTO
    Alumno
VALUES
    (
        18240123,
        'Andrea Rivera Veloz',
        'Mujer',
        'Logística'
    ),
    (
        20240408,
        'Brenda Guerrero Aviña',
        'Mujer',
        'Gestión Empresarial'
    ),
    (
        17246487,
        'Diego Montes López',
        'Hombre',
        'Industrial'
    ),
    (
        18242334,
        'Ricardo Aldape Moreno',
        'Hombre',
        'Electromecánica'
    ),
    (
        18245628,
        'Rosario Valdez Fuentes',
        'Mujer',
        'Sistemas Computacionales'
    );

INSERT INTO
    Medico
VALUES
    (35879723, 'Manuel Andrade Villalobos', 1),
    (34565678, 'Patricia Ruiz Alcantar', 1),
    (56676844, 'Alejandro Origel Muñoz', 2);

INSERT INTO
    Medicamento
VALUES
    ('P-237583', 'Paracetamol', 30),
    ('N-434084', 'Naproxeno', 35),
    ('I-434567', 'Ibuprofeno', 45),
    ('O-423048', 'Omeprazol', 60),
    ('A-674234', 'Ambroxol', 15),
    ('A-864540', 'Amoxicilina', 30),
    ('A-934721', 'Aspirina', 36);

INSERT INTO
    Alergia
VALUES
    (18240123, 'I-434567'),
    (20240408, 'A-864540'),
    (18242334, 'A-934721');

BEGIN TRANSACTION;
    INSERT INTO
        Consulta
    VALUES
        (
            18240123,
            34565678,
            '2019-09-24',
            'Infección en la garganta',
            'A-864540'
        ),
        (
            20240408,
            56676844,
            '2019-10-01',
            'Dolor de cabeza',
            'A-934721'
        ),
        (
            17246487,
            34565678,
            '2019-10-08',
            'Fiebre',
            'P-237583'
        ),
        (
            18242334,
            35879723,
            '2019-10-08',
            'Dolor muscular',
            'I-434567'
        ),
        (
            18245628,
            35879723,
            '2019-10-11',
            'Acidez estomacal',
            'O-423048'
        );

    UPDATE
        Medicamento
    SET
        Cantidad = Cantidad - 1
    WHERE
        Cod_M IN (
            'A-864540',
            'A-934721',
            'P-237583',
            'I-434567',
            'O-423048'
        );
COMMIT;

-- Vista
-- Cuantas veces se han usado los medicamentos
CREATE VIEW UsoMedicamentos AS
SELECT
    Nombre,
    COUNT(*) AS Usos
FROM
    Consulta
    JOIN Medicamento ON Consulta.Cod_M = Medicamento.Cod_M
GROUP BY
    Nombre;

-- Creacion de usuarios y delimitacion de privilegios
--- Usuario 1
CREATE LOGIN Dueno WITH PASSWORD = 'password';

CREATE USER Dueno
FROM
    LOGIN Dueno;

EXEC sp_addrolemember @rolename = 'db_owner',
@membername = 'Dueno';

--- Usuario 2
CREATE LOGIN Sistema WITH PASSWORD = 'password';

CREATE USER Sistema
FROM
    LOGIN Sistema;

EXEC sp_addrolemember @rolename = 'db_datareader',
@membername = 'Sistema';

EXEC sp_addrolemember @rolename = 'db_datawriter',
@membername = 'Sistema';

GRANT EXECUTE TO Sistema;

-- Creación de procedimientos almacenados para inserción de registros
CREATE PROCEDURE InsertarAlumno
    @No_Control INT,
    @Nombre VARCHAR(50),
    @Sexo VARCHAR(15),
    @Carrera VARCHAR(30)
AS
    INSERT INTO
        Alumno
    VALUES
        (@No_Control, @Nombre, @Sexo, @Carrera);

CREATE PROCEDURE InsertarMedico
    @Cedula INT,
    @Nombre VARCHAR(50),
    @Campus INT
AS
    INSERT INTO
        Medico
    VALUES
        (@Cedula, @Nombre, @Campus);

CREATE PROCEDURE InsertarConsulta
    @No_Control VARCHAR(50),
    @Cedula INT,
    @Fecha_consulta DATE,
    @Tipo_Afeccion VARCHAR(30),
    @Cod_M VARCHAR(8)
AS
    INSERT INTO
        Consulta
    VALUES
        (@No_Control, @Cedula, @Fecha_consulta,
        @Tipo_Afeccion, @Cod_M);
EXEC InsertarConsulta 18245628,34565678,'2020-12-23','SAOTEUH','A-674234';

CREATE PROCEDURE InsertarMedicamento
    @Cod_M VARCHAR(8),
    @Nombre VARCHAR(40),
    @Cantidad INT
AS
    INSERT INTO
        Medicamento
    VALUES
        (@Cod_M, @Nombre, @Cantidad);

CREATE PROCEDURE InsertarAlergia
    @No_Control INT,
    @Cod_M VARCHAR(8)
AS
    INSERT INTO
        Alergia
    VALUES
        (@No_Control, @Cod_M);

-- creación de procedimientos almacenados para consulta o
-- actualizacion de la base de datos

--- Procedimientos de consulta
CREATE PROCEDURE ConsultarAlumnos
AS
    SELECT
        *
    FROM
        Alumno;

CREATE PROCEDURE ConsultarMedicos
AS
    SELECT
        *
    FROM
        Medico;

CREATE PROCEDURE ConsultarConsultas
AS
    SELECT
        No_Consulta, No_Control, Cedula, Fecha_consulta
    FROM
        Consulta;

CREATE PROCEDURE ConsultarMedicamentos
AS
    SELECT
        *
    FROM
        Medicamento;

CREATE PROCEDURE ConsultarAlergias
AS
    SELECT
        *
    FROM
        Alergia;

--- Procedimientos de actualización
CREATE PROCEDURE ActualizarAlumno
    @No_Control INT,
    @Nombre VARCHAR(50),
    @Sexo VARCHAR(15),
    @Carrera VARCHAR(30)
AS
    UPDATE
        Alumno
    SET
        Nombre = @Nombre,
        Sexo = @Sexo,
        Carrera = @Carrera
    WHERE
        No_Control = @No_Control;

CREATE PROCEDURE ActualizarMedico
    @Cedula INT,
    @Nombre VARCHAR(50),
    @Campus INT
AS
    UPDATE
        Medico
    SET
        Nombre = @Nombre,
        Campus = @Campus
    WHERE
        Cedula = @Cedula;

CREATE PROCEDURE ActualizarConsulta
    @No_Consulta INT,
    @No_Control VARCHAR(50),
    @Cedula INT,
    @Fecha_consulta DATE,
    @Tipo_Afeccion VARCHAR(30),
    @Cod_M VARCHAR(8)
AS
    UPDATE
        Consulta
    SET
        No_Control = @No_Control,
        Cedula = @Cedula,
        Fecha_consulta = @Fecha_consulta,
        Tipo_Afeccion = @Tipo_Afeccion,
        Cod_M = @Cod_M
    WHERE
        No_Consulta = @No_Consulta;

CREATE PROCEDURE ActualizarMedicamento
    @Cod_M VARCHAR(8),
    @Nombre VARCHAR(40),
    @Cantidad INT
AS
    UPDATE
        Medicamento
    SET
        Nombre = @Nombre,
        Cantidad = @Cantidad
    WHERE
        Cod_M = @Cod_M;

-- Definición de triggers para controlar integridad de datos

--- Quita un medicamento cuando se realice una nueva consulta
CREATE TRIGGER CantidadMedicamentosInsert ON Consulta
    AFTER INSERT
AS
    UPDATE
        Medicamento
    SET
        Cantidad = Cantidad - 1
    WHERE
        Cod_M = (
            SELECT
                Cod_M
            FROM
                inserted
        );

--- Si se cambia el medicamento de una consulta
CREATE TRIGGER CantidadMedicamentosUpdate ON Consulta
    AFTER UPDATE
AS
    BEGIN TRANSACTION; -- Transaccion explicita
        UPDATE
            Medicamento
        SET
            Cantidad = Cantidad - 1
        WHERE
            Cod_M = (
                SELECT
                    Cod_M
                FROM
                    inserted
            );
        UPDATE
            Medicamento
        SET
            Cantidad = Cantidad + 1
        WHERE
            Cod_M = (
                SELECT
                    Cod_M
                FROM
                    deleted
            );
    COMMIT;

--- Si se borra una consulta, el medicamento no se habra utilizado
CREATE TRIGGER CantidadMedicamentosDelete ON Consulta
    AFTER DELETE
AS
    UPDATE
        Medicamento
    SET
        Cantidad = Cantidad + 1
    WHERE
        Cod_M = (
            SELECT
                Cod_M
            FROM
                deleted
        );
