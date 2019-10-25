CREATE TABLE IF NOT EXISTS Zombie(
	idZombie int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(50) NOT NULL
); 

CREATE TABLE IF NOT EXISTS Estado(
	idEstado int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	estado varchar(10) NOT NULL 
);

CREATE TABLE IF NOT EXISTS Registro(
	idZombie int NOT NULL,
	idEstado int NOT NULL,
	fechaHora TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (idZombie) REFERENCES Zombier(id),
	FOREIGN KEY(idEstado) REFERENCES Incidente(idEstado)
);
DELIMITER //

CREATE PROCEDURE RegistrarZombie(inNombre varchar(30) )
BEGIN
	INSERT INTO Zombie (nombre) VALUES (inNombre);
END //
DELIMITER;

DROP procedure IF EXISTS `ConsultarHistorialZombies`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE PROCEDURE `ConsultarHistorialZombies` ()
BEGIN
    SELECT  nombre,estado, FechaHora
	FROM Zombie, Estado, Registro
	WHERE Zombie.idZombie=Registro.idZombie AND Estado.idEstado = Registro.idEstado;

END$$

DELIMITER ;

USE `dawbdorg_A01250647`;
DROP procedure IF EXISTS `ConsultarCantidadZombies`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE PROCEDURE `ConsultarCantidadZombies` ()
BEGIN
	SELECT Zombie.idZombie, COUNT(Zombie.idZombie) AS 'Numero Zombies'
	FROM Zombie
	GROUP BY Zombie.idZombie;
END$$

DELIMITER ;

DROP procedure IF EXISTS `ConsultarEstadosDeZombies`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE DEFINER=`dawbdorg_1250647`@`132.%.%.%` PROCEDURE `ConsultarEstadosDeZombies`(INidZombie int)
BEGIN
	SELECT estado, FechaHora
 	FROM Estado, Registro
	WHERE Registro.idZombie = INidZombie AND Registro.idEstado = Estado.idEstado;
END$$

DELIMITER ;





DROP procedure IF EXISTS `ConsultarEstados`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE PROCEDURE `ConsultarEstados` ()
BEGIN
	SELECT * FROM Estado;
END$$

DELIMITER ;

DROP procedure IF EXISTS `ObtenerZombieMasReciente`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE PROCEDURE `ObtenerZombieMasReciente` ()
BEGIN
	SELECT * FROM Zombie ORDER BY idZombie DESC LIMIT 1;
END$$

DELIMITER ;

DROP procedure IF EXISTS `ConsultarZombies`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE PROCEDURE `ConsultarZombies` ()
BEGIN
	SELECT * FROM Zombie;
END$$

DELIMITER ;

DROP procedure IF EXISTS `ConsultarRegistros`;

DELIMITER $$
USE `dawbdorg_A01250647`$$
CREATE DEFINER=`dawbdorg_1250647`@`132.%.%.%` PROCEDURE `ConsultarRegistros`()
BEGIN
	SELECT nombre, estado, FechaHora
 	FROM Zombie, Estado, Registro
	WHERE Registro.idZombie = Zombie.idZombie AND Registro.idEstado = Estado.idEstado
	ORDER BY FechaHora DESC;
END$$

DELIMITER ;

DELIMITER $$
CREATE DEFINER=`dawbdorg_1250647`@`132.%.%.%` PROCEDURE `ConsultarCantidadZombies`()
BEGIN
	SELECT COUNT(*) AS 'Numero Zombies'
	FROM Zombie;
END$$
DELIMITER ;

