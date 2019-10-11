SET DATEFORMAT dmy
SELECT SUM(Entregan.Cantidad) as 'Cantidad Total', SUM(Entregan.Cantidad * Materiales.Costo) as 'Importe Total' FROM Entregan, Materiales
WHERE Entregan.Clave = Materiales.Clave AND (Entregan.Fecha BETWEEN '01/01/1997' AND '31/12/1997')


SELECT Materiales.Clave, Materiales.Descripcion, SUM(Entregan.Cantidad) as 'Cantidad de Entregas', MIN(Entregan.Cantidad) as 'Minima Cantidad Entregada', MAX(Entregan.Cantidad) as 'Maxima Cantidad Entregada',SUM(Entregan.Cantidad * Materiales.Costo) as 'Importe Total' FROM Entregan,Materiales
WHERE Materiales.Clave = Entregan.Clave
group by Materiales.Clave, Materiales.Descripcion
HAVING AVG(Entregan.Cantidad) > 400

SELECT Proveedores.RazonSocial, AVG(Entregan.Cantidad) as 'Promedio de Entregas' FROM Proveedores,Materiales,Entregan
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Clave = Materiales.Clave
GROUP BY Proveedores.RazonSocial
HAVING AVG(Entregan.Cantidad) < 500

(
SELECT Proveedores.RazonSocial, Materiales.Clave, Materiales.Descripcion, AVG(Entregan.Cantidad) as 'Promedio de Entregas' FROM Proveedores,Materiales,Entregan
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Clave = Materiales.Clave
GROUP BY Proveedores.RazonSocial, Materiales.Clave, Materiales.Descripcion
HAVING AVG(Entregan.Cantidad) < 370
)
UNION
(
SELECT Proveedores.RazonSocial, Materiales.Clave, Materiales.Descripcion, AVG(Entregan.Cantidad) as 'Promedio de Entregas' FROM Proveedores,Materiales,Entregan
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Clave = Materiales.Clave
GROUP BY Proveedores.RazonSocial, Materiales.Clave, Materiales.Descripcion
HAVING AVG(Entregan.Cantidad) > 450
)


INSERT INTO Materiales VALUES (1431, 'Description ...', 250 , 2.50) ;
INSERT INTO Materiales VALUES (1432, 'Description ...', 230 , 7.50) ;
INSERT INTO Materiales VALUES (1433, 'Description ...', 230 , 7.50) ;
INSERT INTO Materiales VALUES (1434, 'Description ...', 500 , 2.50) ;
INSERT INTO Materiales VALUES (1435, 'Description ...', 900 , 15.00) ;

SELECT Materiales.Clave, Materiales.Descripcion FROM Materiales
WHERE Materiales.Clave NOT IN
(
	SELECT Materiales.Clave FROM Materiales,Entregan
	WHERE Materiales.Clave = Entregan.Clave
)

SELECT Proveedores.RazonSocial FROM Proveedores, Entregan, Proyectos
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Numero = Proyectos.Numero AND (Proyectos.Denominacion = 'Vamos Mexico' OR Proyectos.Denominacion = 'Querétaro Limpio')


SELECT Materiales.Descripcion FROM Materiales
WHERE Materiales.Clave NOT IN (SELECT Entregan.Clave FROM Proyectos, Entregan WHERE Entregan.Numero = Proyectos.Numero AND Proyectos.Denominacion = 'CIT Yucatán')


SELECT Proveedores.RazonSocial, AVG(Entregan.Cantidad) as 
'Promedio de Entregas' FROM Proveedores,Entregan
WHERE Proveedores.RFC = Entregan.RFC
GROUP BY Proveedores.RazonSocial
HAVING AVG(Entregan.Cantidad) > (SELECT AVG(Entregan.Cantidad) FROM Proveedores,Entregan WHERE Entregan.RFC = Proveedores.RFC AND Proveedores.RFC = 'VAGO780901')

SET DATEFORMAT dmy
SELECT Proveedores.RFC, Proveedores.RazonSocial FROM Proveedores, Entregan,Proyectos
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Numero = Proyectos.Numero AND Proyectos.Denominacion = 'Infonavit Durango' AND (Entregan.Fecha BETWEEN '01/01/2000' AND '31/12/2000')
GROUP BY Proveedores.RFC, Proveedores.RazonSocial
HAVING SUM(Entregan.Cantidad) > 
(
SELECT SUM(Entregan.Cantidad) FROM Proveedores, Entregan,Proyectos
WHERE Proveedores.RFC = Entregan.RFC AND Entregan.Numero = Proyectos.Numero AND Proyectos.Denominacion = 'Infonavit Durango' AND (Entregan.Fecha BETWEEN '01/01/2001' AND '31/12/2001')
)2