-- Mostrar las Bases de datos
SHOW DATABASES;

-- Seleccionar la Base de datos
USE mysql;

-- Ver tablas
SHOW tables;

-- Mostrar los usuarios
SELECT * FROM mysql.user;

-- Crear un usuario
CREATE USER 'test' @'locahost' IDENTIFIED BY '1234';

-- Dar permisos al usuario test
GRANT ALL PRIVILEGES ON *.* TO 'test'@'localhost';

FLUSH PRIVILEGES;

-- Mostrar privilegios
SHOW GRANTS FOR 'test'@'localhost';

-- Eliminar privilegios
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'test'@'localhost';

-- Eliminar un usuario
DROP USER 'test'@'localhost';