Proyecto "Sistema de Reservaciones para Departamento de Cs. Computacionales" |
Gómez Nava Mayra Karina 													 |
Lic. Informática															 |
CUCEI                    													 |
_____________________________________________________________________________|

Nancy Michelle Torres Villanueva
Programacion Web
 ·······························

SISTEMA DE RESERVACIONES EN LINEA


	El proyecto a manejar es un sistema de reservaciones de aulas y auditorios para la División de Electrónica y Computación, 
	el cual se realiza bajo la supervisión y encargo del coordinador de Ing. En Computación.

	El proyecto inicia con un sistema alojado en la página del servidor de la División:
	alanturing.cucei.udg.mx/divec

		*Acceder al calendario actual de ciclo
		*Requiere un usuario y contraseña para ingresar al sistema 
		distinguiendo usuarios entre maestros, alumnos, administrativos e invitados.

		*Una vez autenticado el usuario y la contraseña comparándolo con los registros de la base de datos se muestra la pantalla 
		de reservaciones.

BASE DE DATOS

	La base de datos es centralizada, unida a la base de datos de otros sistemas de la división a la cual no se pueden hacer 
	mayores modificaciones debido a la perdida de integridad en otros sistemas. Está estructurada en mysql con phpmyadmin 
	como gestor de administración.
	
HACER UNA RESERVACION

	Una vez entrada a la pagina de la reservacion, ya se tiene el nombre de la persona que hace dicho movimiento por medio de la
	identificacion previa en el ingreso al sistema.
	Se pediran los datos requeridos para la reservacion
		*Seleccion de lugar
		*Fecha de inicio y Fecha de fin o término
		*Hora de inicio y hora final
	
	En caso de ser un laboratiorio el que se reserva se debe seleccionar (en caso de necesitarlo)
	la cantidad de maquinas a utilizar e indicar cuales serán las seleccionadas. Puede ser desde 1 
	hasta la cantidad de maquinas disponibles en el aula

CANCELAR UNA RESERVACION
	
	Se debe estar autenticado con el ROL de Administrador de sistema. Una vez validado se selecciona
	el evento que se desea cancelar, se pide verificacion de lugar, fecha, hora y evento antes de cancelar.
	
	En el caso de los laboratorios se puede cancelar por evento o por numero de maquinas a utilizar
	osea, dar de baja algunos equipos solamente y no todo el evento en general
	
VER UNA RESERVACION
	
	Una vez entrando al sistema se muestran todas las reservaciones hechas hasta el momento, la fecha
	hora y el responsable del evento. 
	
ALTAS, BAJAS Y MODIFICACIONES DE ALUMNOS, MAESTROS y SALONES
	
	El administrador del sistema es el unico que puede realizar estas operaciones
	el ROL de Administrador se otroga a la persona que en su momento esté designada para el cargo
	y solo un Adminstrador puede designar a otra persona el ROL o dar de baja administradores
	
	

	
