# Prueba Wunderman Thompson 

Wunderman Thompson creara una aplicación de venta de productos de sus aliados, los cuales se encuentran dentro de unas campañas. Los aliados sacarán promociones mensuales de ciertos productos y estos tendrán un tiempo limitado. Estas campañas serán notificadas vía e-mail a los usuarios que dentro de su actividad en la aplicación hayan marcado como favoritos.
Ej:
Aliado: Éxito
Campaña: Navidad 
Duración campaña: Inicia el 10 Nov a las 00 y finaliza el 11 de Nov a las 11:59
Productos campaña: Saco bebe, Maizena buñuelos, Maizena natilla y carro de pilas.
Preferencias: Ropa, juguetes y comida

Desde el administrador debe ser posible gestionar la siguiente información:
1.	Desde el CMS se debe poder crear nuevas preferencias
	- Se esta usando Wordpress el cual permite anadir preferencia segun sea necesario o el gusto.
	>User: AdminWm
	>Pass:123456789
	
	- Para cargar el servicio se debe instalar Xampp o el de su preferencia servico local de hosting
	- Y poner el proyecto dentro de la carpeta htdocs
	- tambien debe crear una carpeta Wunderman y dentro de esta cargar los archivos
	- crear una base de datos y cambiar la informacion de base de datos, usurio de base de datos y password en el archivos
	wp-config.php
	- cargar la base de datos, la cual esta en el archivo wunderman16-11-2021-105am.sql
	- luego abrir en su navegador de preferencia la ruta http://localhost/Wunderman y el proyecto debe reproducirce
	si tiene al gun error revice los pasos en su orden
	Esta pagina explica con mayor claridad los pasos:
	https://www.webempresa.com/blog/migrar-wordpress-hosting-local-xampp-server.html
2.	Los aliados deben ser administrables y los campos que debe contener este son: nombre aliado y url de la pagina
	- los aliados estan creados como categorias y esta tambien tiene sus paginas respectivas
	como se puede visualizar en el manual de woocommerce:
	https://woocommerce.com/document/gestion-de-la-taxonomia-de-productos/
3.	Las campañas deben estar asociadas a un aliado y están deben tener un tiempo límite proporcionado por este
	- se esta manejando un descuento de producto directo por fecha estas funciona desde las 00 horas hasta las 23:59:59 de esta fecha 
	como lo demuestra en el tutorial de la siguiente pagina:
	https://woodemia.com/programar-ofertas-en-woocommerce/
4.	Si la campaña no está vigente debe notificarse al usuario al momento que este desee ingresar, de lo contrario debe redireccionarlo a la página del aliado.
	- en este caso se utilizo la opcion de cupones que nos permite 3 diferentes formas de descuento o promocion para una campaña
	esta permite modular diferentes modalidaddes y comportamientos en este caso cuando la promocion o descuento por fecha yano esta activa el usurio no la venta
	por lo cual no genera dudas si tiene o tuvo, lo cual no genera reclamos por falsa espectativa, en la siguente pagina puede ver como se parametriza:
	https://woocommerce.com/document/gestion-de-cupones/
5.	Cada producto de la campaña debe contener la siguiente información: Nombre producto, Precio con descuento (Antes y ahora) y la preferencia a la que pertenece
	- para esto se aplico descuento a todos los productos pero por la fecha que solicita en la prueba ya no es posible verlo,
	para esto cree un producto adicional con esta caracteristica y podran ver su funcionamiento segun lo que solicitan
Nota: Las preferencias de los usuarios deben recibirse vía webservice (Ej: {"email":"micorreo@correo.com","preferencia":"Ropa"}) y estos deben ser almacenados en la aplicación., y adicional, el usuario debe poder seleccionar la opción de no recibir más notificaciones.

para esta nota cree un pequeño plugin donde realiza estas acciones:
-crea dos tablas dentro de wordpress y realiza estos procesos
-asi mismo cree 3 rutas para poder realizar el consumo del web service
Nota: tengan claro que el tiempo que use para esto es muy corto por lo cual trate de implementar un servico web 
lo mas simple posible, pero que cumplieroa con un minimo estandar

las rutas funsiona de la siguiente manera

-Consulta de Preferencias:
	http://localhost/Wunderman/index.php?wpapic_api=1&mail&user=adminWm&pass=123456789
	y tiene un valor que corre por header
	el token que es unico no dinamico: 123456789asdasdasd$5
	
	Clientes:
	
	Codigo Curl
	
	curl --location --request GET "http://localhost/Wunderman/index.php?wpapic_api=1&mail&user=adminWm&pass=123456789" \
	--header "token: 123456789asdasdasd$5"
	
	Codigo Php Curl
	
	<?php

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://localhost/Wunderman/index.php?wpapic_api=1&mail&user=adminWm&pass=123456789',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'token: 123456789asdasdasd$5'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;
	
-Estado
	http://localhost/Wunderman/index.php?wpapic_api=2&mail&user=adminWm&pass=123456789
	y tiene un valor que corre por header
	el token que es unico no dinamico: 123456789asdasdasd$5
	
	Clientes:
	
	Codigo Curl
	
	curl --location --request GET "http://localhost/Wunderman/index.php?wpapic_api=2&mail&user=adminWm&pass=123456789" \
	--header "token: 123456789asdasdasd$5"
	
	Codigo Php Curl
	
	<?php

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://localhost/Wunderman/index.php?wpapic_api=2&mail&user=adminWm&pass=123456789',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'token: 123456789asdasdasd$5'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;
	
-Cambio de estado
	http://localhost/Wunderman/index.php?wpapic_api=3&mail&user=adminWm&pass=123456789
	y tiene un valor que corre por header
	el token que es unico no dinamico: 123456789asdasdasd$5
	y una valor estado:0,1
	
	Clientes:
	
	Codigo Curl
	
	curl --location --request GET "http://localhost/Wunderman/index.php?wpapic_api=3&mail&user=adminWm&pass=123456789" \
	--header "token: 123456789asdasdasd$5" \
	--header "estado: 1"
	
	Codigo Php Curl
	
	<?php

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://localhost/Wunderman/index.php?wpapic_api=3&mail&user=adminWm&pass=123456789',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
		'token: 123456789asdasdasd$5',
		'estado: 1'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;