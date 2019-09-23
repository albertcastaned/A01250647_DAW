CREATE TABLE Materiales
(
	Clave numeric(5),
	Descripcion varchar(50),
	Costo numeric(8,2)
)

CREATE TABLE Proveedores
(
	RFC char(13),
	RazonSocial varchar(50)
)

CREATE TABLE Proyectos
(
	Numero NUMERIC(5),
	Denominacion varchar(50)
)

CREATE TABLE Entregan
(
	Clave numeric(5),
	RFC char(13),
	Numero NUMERIC(5),
	Fecha DATETIME,
	Cantidad Numeric(8,2)
)