Prueba Atlas
==================

Lo primero es agradecer la oportunidad brindada, para mi ha sido un reto ya que nunca había hecho nada con Angular u otro Framework de Javascript. 

Me he permitido hacer una pantalla más de la que pide el ejercicio, para listar a los usuarios. También tiene la función de borrar, por lo que he hecho un CRUD completo.

No hay pruebas unitarias. En la parte Backend creo que podría haber hecho alguna, pero con Angular no lo he hecho nunca. El tiempo no me ha dado para intentarlo.

Os adjunto por aquí un video de demostración de la aplicación funcionando. 

La prueba la podéis bajar de -> 


* Notas:

BACKEND
==================

La parte Backend es donde tengo más experiencía pues es lo que hago en mi actual trabajo, de hecho, es lo que menos me ha costado y donde menos tiempo he gastado.

- Php y Symfony 2.8.
- Servidor local Apache.
- No va la carpeta Vendor.
- Base de datos PostgreSQL (porque es el tipo de gestor que se utiliza en mi actual trabajo y lo tenía montado ya en casa).
- Dejo en la raíz el .sql de la tabla users por si os hiciera falta.
- He quitado mis datos de conexión a la base de datos del parameter.yml de Symfony. 
- Codificación de la BBDD que he utilizado es UTF8.
- La ruta de la API me ha quedado así: http://localhost/prueba-atlas/backend/web/app_dev.php/ -> seguido de los routing específicos para cada acción.
- He tenido problemas con la conexión entre el servidor y el cliente, resolviéndolo añadiendo las siguientes líneas en /etc/apache2/sites-available/000-default.conf:
     Header set Access-Control-Allow-Origin "*"
     Header set Access-Control-Allow-Methods "POST, GET, OPTIONS, DELETE, PUT"

FRONTEND
==================

La parte Frontend, por otro lado, me ha hecho sudar. Hay cosas que me hubiera gustado dejar mejor, aunque ahora mismo no se cómo porque estoy más verde.

- Angular 7.
- Bootstrap 4.3.1. Los archivos los he ubicado en la carpeta assets y los he dejado al subir el proyecto.
- No va la carpeta node_modules.
- He utilizado una biblioteca para una paginación en el listado de usuarios (instalar con npm install ngx-pagination --save).
- El Formulario y las validaciones empecé a hacerlo con los ReactiveFormsModule pero no he conseguido darle el comportamiento que yo quería, cosa que si he logrado (más o menos) de otra manera que me parece un poco menos limpia, en el html. Tambíen lo he dejado para el final y no podía seguir peleándome. No me he quedado muy contento con eso.
- No he podido controlar por falta de tiempo: a la hora de crear un usuario, cuando se ingresa un email o un documento identificativo que ya existe en la BBDD el programa hace lo que pide el ejercicio, pero al editar un usuario no se puede a no ser que se cambie el Dni o el Email, y creo que esto se debería controlar.
- Esto último lo pregunto al usuario con un confirm. Me hubiera gustado hacerlo con un modal de bootstrap.
- Tambíen se podría haber hecho una paginación del listado de usuarios. 


Por lo demás estoy contento por lo aprendido y voy seguir haciéndolo, por supuesto!.

