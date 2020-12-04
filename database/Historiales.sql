create database Historiales

use Historiales

create table Alumno(
	No_Control int not null,
	Nombre varchar(50),
	Sexo varchar(15),
	Carrera varchar(30)
)

alter table Alumno add constraint pk_alumno primary key (No_Control)

create table M�dico(
	C�dula int not null,
	Nombre varchar(50),
	Campus int
)

alter table M�dico add constraint pk_medico primary key (C�dula)

create table Consulta(
	No_Consulta int not null,
	No_Control int not null,
	C�dula int not null,
	Fecha_consulta date,
	Diagn�stico varchar(30),
	Tipo_Afeccion varchar(30)
)

alter table Consulta add constraint pk_consulta primary key (No_Consulta)

alter table Consulta ADD constraint fk_alumno_consulta foreign key (No_Control) 
References Alumno (No_Control)

alter table Consulta ADD constraint fk_medico_consulta foreign key (C�dula) 
References M�dico (C�dula)

create table Medicamento(
	No_Consulta int not null,
	Cod_M varchar(8)not null,
	Nombre varchar(40)
)

alter table Medicamento add constraint pk_medicamento primary key (Cod_M)

alter table Medicamento ADD constraint fk_consulta_medicamento foreign key (No_Consulta) 
References Consulta (No_Consulta)

create table Al�rgico(
	No_Control int not null,
	Cod_M varchar(8)not null
)

alter table Al�rgico add constraint pk_alergico primary key (No_Control, Cod_M)

alter table Al�rgico add constraint fk_alumno_alergico foreign key (No_Control) 
References Alumno (No_Control)

alter table Al�rgico add constraint fk_medicamento_alergico foreign key (Cod_M) 
References Medicamento (Cod_M)





