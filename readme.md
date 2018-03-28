## Asignacion de Tribunales
instalacion
	git clone https://github.com/m16u3l/asignacionDeTribulanes.git
	cd asignacionDeTribulanes
	crear el nombre del archivo ".env" y copiar el contenido de ".env.example"
	composer install
	composer update
	php artisan key:generate
	php artisan serve

Configuracion de la base de datos a Postgres de XAMPP
	abrir XAMPP 
		apache  boton "config" abrir PHP(php.ini)
		buscar
				;extension=php_pdo_pgsql.dll
				;extension=php_pgsql.dll
		quitar ";"

