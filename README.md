Proyecto "Sistema de Reservaciones para Departamento de Cs. Computacionales" |
Gómez Nava Mayra Karina 													 |
Lic. Informática															 |
CUCEI                    													 |
_____________________________________________________________________________|

Nancy Michelle Torres Villanueva
Programacion Web
 ·······························

- Descripción del Proyecto -

	El proyecto a manejar es un sistema de reservaciones de aulas y auditorios para la División de Electrónica y Computación, 
	el cual se realiza bajo la supervisión y encargo del coordinador de Ing. En Computación.

	El proyecto inicia con un sistema alojado en la página del servidor de la División:
	alanturing.cucei.udg.mx/divec  

	Desde ahí se debe acceder al calendario actual de ciclo y requerir un usuario y contraseña para ingresar al sistema 
	distinguiendo usuarios entre maestros, alumnos, directivos, administrativos e invitados.

	Una vez autenticado el usuario y la contraseña comparándolo con los registros de la base de datos se muestra la pantalla 
	de reservaciones.

	La base de datos es centralizada, unida a la base de datos de otros sistemas de la división a la cual no se pueden hacer 
	mayores modificaciones debido a la perdida de integridad en otros sistemas. Está estructurada en mysql con phpmyadmin 
	como gestor de administración.

	El sistema debe poder mostrar el nombre de la persona autenticada en el sistema o pedir estos datos en caso de ser invitados. 
	Se muestra el nombre y se solicita llenar un formulario con la información requerida para la reservación de un espacio que 
	se elige de una lista ya predefinida rescatada de la base de datos.
	Se debe revisar el horario de la reservación y el lugar para que no existan reservaciones solapadas, así como revisar la 
	fecha de término para que no sea anterior a la fecha de inicio.

	Si se desea cancelar una reservación se debe consultar con el administrador del sistema para que este haga la respectiva 
	liberación del espacio en la agenda de la reservación

	En cuanto a las aulas que contienen maquinas, estas aulas se pueden apartar por separado con un cierto número de equipos 
	dejando otros disponibles a la misma hora en el mismo salón. Se debe considerar el número y la posición de las maquinas 
	reservadas para dejar libres las correspondientes.