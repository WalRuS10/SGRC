Sistema de Gestion de Reparaciones de Computadoras
##################################################

Application es la carpeta donde se debe trabajar.
	Models 
		Contiene los modelos.
		Los modelos deben usar en lo posible el mismo formato todos con los mismos nombres de metodos para que sea facil crear nuevos modelos a partir de alguno ya existente
		
	Controllers 
		Contiene los controladores.
		En los controladores se deben declarar como funciones cada accion que toma dicho modulo,
		codeigniter se encarga de crear la ruta apropiada. Por ejemplo si en el controlador
		empleados creamos una funcion que se llame nuevo, codeigniter invocara dicha funcion 
		cada vez que se escriba en la URL empleados/nuevo.
	
	Views las vistas (HTML)
		Dentro de views esta la carpeta layouts la cual contiene la plantilla principal main.php la cual contiene el header y footer de la aplicacion
		Las vistas estan divididas en subcarpetas para que sea mas prolijo y entendible, mantener esa forma.
		
	Config
		En esta se configura la aplicacion, se puede configurar datos sobre la conexion a la base de datos, modulos que se cargan, rutas, etc.
	
	