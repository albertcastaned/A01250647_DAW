  SELECT * from Materiales;
  SELECT * from Proyectos;
  SELECT * from Proveedores;

INSERT INTO Entregan values (0, 'xxx', 0, '1-jan-02', 0) ;
Delete from Entregan where Clave = 0

 ALTER TABLE Entregan add constraint cfentreganclave
  foreign key (clave) references Materiales(clave);

ALTER TABLE Entregan add constraint cfentregannumero
  foreign key (numero) references Proyectos(numero);

ALTER TABLE Entregan add constraint cfentreganrfc
  foreign key (rfc) references Proveedor(rfc);