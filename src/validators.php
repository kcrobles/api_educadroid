<?php 

use Respect\Validation\Validator as v;
//Users
/* fistname, lastname, email, password, dni, sexo, role_id, local_id */
$firstNameValidator = v::alpha()->length(3,100)->notEmpty();
$lastNameValidator = v::alpha()->length(3,100)->notEmpty();
$emailValidator = v::NoWhitespace()->notEmpty()->email()->emailAvailable();
$passwordValidator = v::notEmpty()->length(6,12);
$dniValidator = v::notEmpty()->IntVal()->between(1000000, 99999999);
$sexoValidator = v::notEmpty()->In(['m', 'f']);
$idValidator = v::notEmpty()->IntVal()->positive(); //role, local
$fnacimientoValidator = v::notEmpty()->Date('Y-m-d')->age(6, 75);

$ofirstNameValidator = v::Optional(v::alpha()->length(3,100)->notEmpty());
$olastNameValidator = v::Optional(v::alpha()->length(2,100)->notEmpty());
$oemailValidator = v::Optional(v::NoWhitespace()->notEmpty()->email());
$opasswordValidator = v::Optional(v::notEmpty()->length(6,12));
$odniValidator = v::Optional(v::notEmpty()->IntVal()->between(1000000, 99999999));
$osexoValidator = v::Optional(v::notEmpty()->In(['m', 'f']));
$oidValidator = v::Optional(v::notEmpty()->IntVal()->positive());
$ofnacimientoValidator = v::Optional(v::notEmpty()->Date('Y-m-d')->age(6, 75));

$LOGIN_VALIDATORS = array(
    'email' => v::email(),
    'password' => v::length(6, 12)
);

$USER_CREATE = array(
    'nombre' => $firstNameValidator,
    'apellido' => $lastNameValidator,
    'documento' => $dniValidator,
    'email' => $emailValidator,
    'password' => $passwordValidator,
    'fnacimiento' => $fnacimientoValidator,
    'sexo' => $sexoValidator,
    'rol_id' => $idValidator,
    'domicilio_id' => $idValidator,
);

$USER_EDIT = array(
    'firstName' => $ofirstNameValidator,
    'lastName' => $olastNameValidator,
    'email' => $oemailValidator,
    'password' => $opasswordValidator,
    'fnacimiento' => $ofnacimientoValidator,
    'dni' => $odniValidator,
    'sexo' => $osexoValidator,
    'domicilio_id' => $oidValidator,
    'role_id' => $oidValidator
);

$translator = function($message){
	$messages = [
        "All of the required rules must pass for {{name}}" => "pija",
        'These rules must pass for {{name}}' => 'Estas validaciones deben ser aprobadas por {{name}}',
		//length(x,y)
		'{{name}} must have a length between {{minValue}} and {{maxValue}}' => 'Debe tener entre {{minValue}} y {{maxValue}} caracteres',
		'{{name}} must have a length greater than {{minValue}}' => 'No puede ser menor a {{minValue}} caracteres',
		'{{name}} must have a length lower than {{maxValue}}' => 'No puede ser mayor a {{maxValue}} caracteres',
		//notEmpty
		'The value must not be empty' => 'No puede estar vacío',
        '{{name}} must not be empty' => 'No puede estar vacío',
        //alpha
        '{{name}} must contain only letters (a-z)' => 'Solo puede contener letras (a-z)',
        //email
        '{{name}} must be valid email' => 'Debe ser un email válido',
        //emailAvailable
        'Email is already used.' => 'El email ya se encuentra registrado',
        //NoWhitespace
        '{{name}} must not contain whitespace' => 'No puede contener espacios en blanco',
        //intval
        '{{name}} must be an integer number' => 'Debe ser un número entero',
        //between
        '{{name}} must be between {{minValue}} and {{maxValue}}' => 'Debe estar entre {{minValue}} y {{maxValue}}',
        '{{name}}  must be greater than {{minValue}}' => 'Debe ser mayor a {{minValue}}',
        '{{name}} must be lower than {{maxValue}}' => 'Debe ser menor a {{maxValue}}',
        //in
		'{{name}} must be in {{haystack}}' => 'Debe ser "m" o "f"',
        //positive
        '{{name}} must be positive' => 'Debe ser positivo',
        //floatval
        '{{name}} must be a float number' => 'Debe ser un número válido',
        //optional
        'The value must be optional' => 'Es opcional',
        '{{name}} must be optional' => 'Es opcional',
        //phone
        '{{name}} must be a valid telephone number' => 'Debe ser un numero válido',
        //alnum
        '{{name}} must contain only letters (a-z) and digits (0-9)' => 'Sólo puede contener letras y números',
        //age
        '{{name}} must be between {{minAge}} and {{maxAge}} years ago' => 'Debe tener una edad entre {{minAge}} y {{maxAge}}',
        '{{name}} must not be lower than {{minAge}} years ago' => 'Debe ser mayor de {{minAge}} años',
        '{{name}} must not be greater than {{maxAge}} years ago' => 'No debe ser mayor de {{minAge}} años',
        //datetime
        '{{name}} must be a valid date/time' => 'Debe ser una fecha válida',
        '{{name}} must be a valid date/time. Sample format: {{format}}' => 'Debe tener un formato AAAA/mm/dd'
    ];
    return $messages[$message];
};

