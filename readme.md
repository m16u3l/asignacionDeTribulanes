## Asignacion de Tribunales
instalacion
	git clone https://github.com/m16u3l/asignacionDeTribulanes.git
	cd asignacionDeTribulanes
	composer install

Configuracion de la base de datos a Postgres de XAMPP
	abrir XAMPP 
		apache  boton "config" abrir PHP(php.ini)
		buscar
				;extension=php_pdo_pgsql.dll
				;extension=php_pgsql.dll
		quitar ";"

