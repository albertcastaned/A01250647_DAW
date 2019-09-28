INSERT INTO Materiales values(1000, 'xxx', 1000)

Delete from Materiales where Clave = 1000 and Costo = 1000

ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

INSERT INTO Materiales values(1000, 'xxx', 1000)
  
ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

ALTER TABLE Entregas add constraint llaveEntregas PRIMARY KEY (Clave, Numero, RFC)
