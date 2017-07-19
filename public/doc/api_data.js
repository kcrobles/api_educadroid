define({ "api": [
  {
    "type": "post",
    "url": "/auth/attempt",
    "title": "Login",
    "name": "attempt",
    "group": "Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "size": "6 .. 12",
            "optional": false,
            "field": "password",
            "description": "<p>Password del usuario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "token",
            "description": "<p>Devuelve un JWT del usuario autenticado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>Informa el tipo de error (validación, repetido, contraseña, parámetros, etc) en el mensaje.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Auth"
  },
  {
    "type": "get",
    "url": "/domicilios",
    "title": "Listado de domicilios",
    "name": "all",
    "group": "Domicilios",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "domicilios",
            "description": "<p>Devuelve un json con los registros de domicilios</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Domicilios"
  },
  {
    "type": "post",
    "url": "/domicilios",
    "title": "Alta de domicilios",
    "name": "create",
    "group": "Domicilios",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "direccion",
            "description": "<p>Direccion del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "latitud",
            "description": "<p>Coordenada latitudinal de la ubicación del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "longitud",
            "description": "<p>Coordenada longitudinal de la ubicación del usuario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "domicilio",
            "description": "<p>Devuelve un json con los datos del registro creado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Domicilios"
  },
  {
    "type": "delete",
    "url": "/domicilios/:id",
    "title": "Baja de domicilio",
    "name": "delete",
    "group": "Domicilios",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del registro de domicilio</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "domicilio",
            "description": "<p>Devuelve un json con los datos del registro eliminado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Domicilios"
  },
  {
    "type": "put",
    "url": "/domicilios/:id",
    "title": "Modificar domicilio",
    "name": "update",
    "group": "Domicilios",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del registro de domicilio</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "direccion",
            "description": "<p>Direccion del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "latitud",
            "description": "<p>Coordenada latitudinal de la ubicación del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "longitud",
            "description": "<p>Coordenada longitudinal de la ubicación del usuario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "domicilio",
            "description": "<p>Devuelve un json con los datos del registro creado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Domicilios"
  },
  {
    "type": "get",
    "url": "/",
    "title": "Ruta raiz de la API",
    "name": "Home",
    "group": "Home",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Devuelve el nombre de la API en caso de haberse instalado y configurado con éxito.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "src/routes.php",
    "groupTitle": "Home"
  },
  {
    "type": "get",
    "url": "/images/:nombre",
    "title": "Retornar imagen",
    "name": "getImageUploaded",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "nombre",
            "description": "<p>identificador único de la imagen subida al servidor.</p>"
          }
        ]
      }
    },
    "group": "Images",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "imagen",
            "description": "<p>Retorna un archivo de imagen subida al servidor.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Images"
  },
  {
    "type": "get",
    "url": "/roles",
    "title": "Listado de roles",
    "name": "all",
    "group": "Roles",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "roles",
            "description": "<p>Devuelve un json con los roles y sus usuarios.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Roles"
  },
  {
    "type": "post",
    "url": "/roles",
    "title": "Alta de roles",
    "name": "create",
    "group": "Roles",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nombre",
            "description": "<p>Nombre del nuevo rol</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "rol",
            "description": "<p>Devuelve un json con los datos del registro creado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Roles"
  },
  {
    "type": "delete",
    "url": "/roles/:id",
    "title": "Baja de roles",
    "name": "delete",
    "group": "Roles",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del rol</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "rol",
            "description": "<p>Devuelve un json con los datos del registro eliminado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Roles"
  },
  {
    "type": "put",
    "url": "/roles/:id",
    "title": "Modificar roles",
    "name": "update",
    "group": "Roles",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del rol</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nombre",
            "description": "<p>Nombre del rol</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "rol",
            "description": "<p>Devuelve un json con los datos del registro actualizado</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa del error específico.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Roles"
  },
  {
    "type": "get",
    "url": "/users",
    "title": "Listado de usuarios",
    "name": "all",
    "group": "Users",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "users",
            "description": "<p>Devuelve un json con los usuarios registrados en la base de datos</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 Informa que no hay usuarios registrados.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Users"
  },
  {
    "type": "post",
    "url": "/users",
    "title": "Alta de usuarios",
    "name": "create",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "nombre",
            "description": "<p>Nombre del usuario.</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "apellido",
            "description": "<p>Apellido del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Email del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "size": "6..12",
            "optional": false,
            "field": "password",
            "description": "<p>Password del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "size": "7..8",
            "optional": false,
            "field": "documento",
            "description": "<p>Nro de documento del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "fnacimiento",
            "description": "<p>Fecha de nacimiento del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "sexo",
            "defaultValue": "m",
            "description": "<p>Sexo</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "domicilio",
            "description": "<p>Dirección del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "latitud",
            "description": "<p>Coordenada latitudinal de la ubicación del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "longitud",
            "description": "<p>Coordenada longitudinal de la ubicación del usuario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "user",
            "description": "<p>Devuelve un json con los datos del alta</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>Informa el tipo de error (validación, repetido, parámetros, etc) en el mensaje.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Users"
  },
  {
    "type": "delte",
    "url": "/users/:id",
    "title": "Baja de usuario",
    "name": "delete",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del usuario.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "user",
            "description": "<p>Devuelve un json con los datos del usuario eliminado.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 El usuario no existe.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Users"
  },
  {
    "type": "get",
    "url": "/users/:id",
    "title": "Mostrar usuario.",
    "name": "show",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del usuario.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "user",
            "description": "<p>Devuelve un json con los datos del usuario encontrado.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>404 El usuario no existe.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Users"
  },
  {
    "type": "put",
    "url": "/users/:id",
    "title": "Modificar usuario",
    "name": "update",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID del usuario.</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "nombre",
            "description": "<p>Nombre del usuario.</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "apellido",
            "description": "<p>Apellido del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "email",
            "description": "<p>Email del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "size": "6..12",
            "optional": true,
            "field": "password",
            "description": "<p>Password del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "size": "7..8",
            "optional": true,
            "field": "documento",
            "description": "<p>Nro de documento del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": true,
            "field": "fnacimiento",
            "description": "<p>Fecha de nacimiento del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "sexo",
            "description": "<p>Sexo</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "domicilio",
            "description": "<p>Dirección del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "latitud",
            "description": "<p>Coordenada latitudinal de la ubicación del usuario</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": true,
            "field": "longitud",
            "description": "<p>Coordenada longitudinal de la ubicación del usuario</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "user",
            "description": "<p>Devuelve un json con los datos actualizados del usuario</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "message",
            "description": "<p>Informa el tipo de error (validación, repetido, parámetros, etc) en el mensaje.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "src/routes.php",
    "groupTitle": "Users"
  }
] });
