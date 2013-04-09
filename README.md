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

	Se tiene una estructura tipo mvc ( modelo vista controlador ) con:
		
		Controladores
			*estándar
			*usuario
			*salones
			*reservacion
		
		Modelos
			*usuario
			*salon
			*reservacion
		
		Vistas
			*usuario
			*salon
			*reservacion

	
	El controlador estándar tiene los datos para el login y el inicio de la sesión, así como el logout y la destrucción de la sesión
	Es el controlador que se manda llamar por default si no se especifica algún otro.
	
	Se tiene un modelo por cada clase realizada, a excepción del modelo 'usuarios' que incluye la clase de las sesiones también
	
	Se tiene una vista por cada clase, y al igual que el modelo, las sesiones van incluídas en la vista de 'usuarios'
	
	
	
BASE DE DATOS

	La base de datos es centralizada, unida a la base de datos de otros sistemas de la división a la cual no se pueden hacer 
	mayores modificaciones debido a la perdida de integridad en otros sistemas. Está estructurada en mysql con phpmyadmin 
	como gestor de administración.
	
		Tablas
			*alumno
			*maestro
			*usuario
			*reservacion
			*sesion_alumno
			*sesion_maestro
			
		Vistas
			*usuario (de alumno y maestro)
			*sesion_usuario (de sesion_alumno y sesion_maestro)
	
	
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
	
	

	
