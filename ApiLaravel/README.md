<p>Este programa permite Consumir un api de usuarios y de post de los mismos los cuales están expuestos en la web de manera independiente</p>
<p>Es necesario que inicialmente cree la base de datos en el servidor y posteriormente ejecute las migraciones por medio de php artisan migrate</p>
<p>Debe registrarse y cuando inicie sesión debe ejecutar la acción de Copiar la data de usuarios a local y posteriormente copiar la información de sus post relacionados</p>
<p>Finalmente podrá administrar de manera visual por medio del CRUD hecho en laravel o consumir los servicios</p>

<h2>Listado de servicios</h2>
<li>http://127.0.0.1:8000/api/user-get  Obtengo todos los usuarios</li>
<li>http://127.0.0.1:8000/api/user-createt  Crear nuevo usuario</li>
<p> Ejemplo:   {
            "id": 15,
            "name": "Test Api",
            "email": "testapi@yesenia.net",
            "email_verified_at": null,
            "created_at": "2022-01-18T01:41:22.000000Z",
            "updated_at": "2022-01-18T01:41:22.000000Z",
            "city": "Medellin",
            "company": "Rua"
}</p>
<li>http://127.0.0.1:8000/api/post-delete/2 Eliminar el usuario deseado</li>