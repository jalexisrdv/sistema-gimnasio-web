<?php

require_once 'models/daos/UsuarioDAO.php';
require_once 'models/dtos/UsuarioDTO.php';

$usuarioDAO = new UsuarioDAO();

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNick('raul98');
$usuarioDTO->setPassword('hola1998');
$usuarioDTO->setTipo('cliente');
$usuarioDTO->setStatus(1);

//$usuarioDAO->insertarUsuario($usuarioDTO);

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNick('alfredo98');
$usuarioDTO->setPassword('hola1998');
$usuarioDTO->setTipo('cliente');
$usuarioDTO->setStatus(1);

//$usuarioDAO->insertarUsuario($usuarioDTO);
//echo var_dump($usuarioDAO->existeUsuario('alfredo98', 'hola1998'));
$usuarioDTO->setId(11);
$usuarioDTO->setPassword('123456');
//echo $usuarioDAO->actualizarUsuarioById($usuarioDTO);
//echo var_dump($usuarioDAO->obtenerUsuarioById(11));
//echo var_dump($usuarioDAO->obtenerUsuarios(11));




require_once 'models/daos/ClienteDAO.php';
require_once 'models/dtos/ClienteDTO.php';

$clienteDAO = new ClienteDAO();

$clienteDTO = new ClienteDTO();
$clienteDTO->setId(2);
$clienteDTO->setNombre('karla');
$clienteDTO->setApellidos('ramirez');
$clienteDTO->setFechaNacimiento('1998/07/11');
$clienteDTO->setEmail('karla@gmail.com');
$clienteDTO->setFechaIngreso('2020/12/01');
$clienteDTO->setNivelCliente('Principiante');
$clienteDTO->setEstatura(1.90);
$clienteDTO->setPesoInicial(62);
$clienteDTO->setPesoProgreso(64);
$clienteDTO->setUrlFoto('http://dummyimage.com/137x154.png/cc0000/ffffff');
$clienteDTO->setIdSucursal(1);
$clienteDTO->setIdUsuario(11);

//echo $clienteDAO->insertarCliente($clienteDTO);
//echo var_dump($clienteDAO->obtenerClienteById(5));
//echo var_dump($clienteDAO->obtenerClientes());
//echo $clienteDAO->actualizarClienteById($clienteDTO);
//echo $clienteDAO->asignarRutinaById(1, 9);


require_once 'models/daos/EntrenadorDAO.php';
require_once 'models/dtos/EntrenadorDTO.php';

$entrenadorDAO = new EntrenadorDAO();

$entrenadorDTO = new EntrenadorDTO();
$entrenadorDTO->setId(1);
$entrenadorDTO->setNombre('karime');
$entrenadorDTO->setApellidos('alvarado');
$entrenadorDTO->setFechaNacimiento('1998/07/11');
$entrenadorDTO->setFechaIngreso('2020/12/01');
$entrenadorDTO->setNivelEntrenador('Avanzado');
$entrenadorDTO->setEstatura(1.89);
$entrenadorDTO->setPeso(80);
$entrenadorDTO->setUrlFoto('http://dummyimage.com/137x154.png/cc0000/ffffff');
$entrenadorDTO->setHorario('Luneas a Viernes 8:00 - 13:00');
$entrenadorDTO->setIdSucursal(1);
$entrenadorDTO->setIdUsuario(12);


//echo $entrenadorDAO->insertarEntrenador($entrenadorDTO);
//echo var_dump($entrenadorDAO->obtenerEntrenadorById(1));
//echo var_dump($entrenadorDAO->obtenerEntrenadores());
//echo $entrenadorDAO->actualizarEntrenadorById($entrenadorDTO);



require_once 'models/daos/FechaImportanteDAO.php';
require_once 'models/dtos/FechaImportanteDTO.php';

$fechaImportanteDAO = new FechaImportanteDAO();

$fechaImportanteDTO = new FechaImportanteDTO();
$fechaImportanteDTO->setId(11);
$fechaImportanteDTO->setFecha('2020/04/15');
$fechaImportanteDTO->setDescripcion('otra cosa');

//echo $fechaImportanteDAO->insertarFechaImportante($fechaImportanteDTO);
//echo var_dump($fechaImportanteDAO->obtenerFechaImportanteById(1));
//echo var_dump($fechaImportanteDAO->obtenerFechasImportantes(1,6));
//echo $fechaImportanteDAO->actualizarFechaImportanteById($fechaImportanteDTO);
//echo $fechaImportanteDAO->eliminarFechaImportanteById(1);




require_once 'models/daos/PagoClienteDAO.php';
require_once 'models/dtos/PagoClienteDTO.php';

$pagoClienteDAO = new PagoClienteDAO();

$pagoClienteDTO = new PagoClienteDTO();
$pagoClienteDTO->setId(3);
$pagoClienteDTO->setFechaPagoRealizado("2020/01/09");
$pagoClienteDTO->setFechaCortePago("2020/02/09");
$pagoClienteDTO->setIdCliente(6);
$pagoClienteDTO->setIdSucursal(2);

//echo $pagoClienteDAO->insertarPagoCliente($pagoClienteDTO);
//echo var_dump($pagoClienteDAO->obtenerPagoClienteById(5));
//echo var_dump($pagoClienteDAO->obtenerPagosClientes());
//echo $pagoClienteDAO->actualizarPagoClienteById($pagoClienteDTO);
//echo $pagoClienteDAO->eliminarPagoClienteById(4);




require_once 'models/daos/RutinaDAO.php';
require_once 'models/dtos/RutinaDTO.php';

$rutinaDAO = new RutinaDAO();

$rutinaDTO = new RutinaDTO();
$rutinaDTO->setId(1);
$rutinaDTO->setTipo("full body");
$rutinaDTO->setEjercicios("peso muerto, press militar, dominadas, sentadillas, zancadas, press banca");
$rutinaDTO->setDuracion("1 hora");
$rutinaDTO->setDia("Lunes y miercoles y viernes");
$rutinaDTO->setDescripcion("rutina de cuerpo completo");
$rutinaDTO->setIdEntrenador(2);

//echo $rutinaDAO->insertarRutina($rutinaDTO);
//echo var_dump($rutinaDAO->obtenerRutinaById(11));
//echo var_dump($rutinaDAO->obtenerRutinas());
//echo $rutinaDAO->actualizarRutinaById($rutinaDTO);
//echo $rutinaDAO->eliminarRutinaById(1);


require_once 'models/daos/SucursalDAO.php';
require_once 'models/dtos/SucursalDTO.php';

$sucursalDAO = new SucursalDAO();

$sucursalDTO = new SucursalDTO();
$sucursalDTO->setId(3);
$sucursalDTO->setNombre("colima del norte");
$sucursalDTO->setDireccion("Av. 1 de mayo");
$sucursalDTO->setCodigoPostal("68410");
$sucursalDTO->setHorarios("Lunes a viernes de 8:00 a 20:00");
$sucursalDTO->setStatus(1);

//echo $sucursalDAO->insertarSucursal($sucursalDTO);
//echo var_dump($sucursalDAO->obtenerSucursalById(2));
//echo var_dump($sucursalDAO->obtenerSucursales());
//echo $sucursalDAO->actualizarSucursalById($sucursalDTO);
//echo $sucursalDAO->eliminarSucursalById(14);
//echo $sucursalDAO->asignarFechaImportanteById(1, 4);





//echo var_dump($clienteDAO->obtenerClientesByIdEntrenador(1));
//echo var_dump($rutinaDAO->obtenerRutinasByIdCliente(1));
//echo var_dump($rutinaDAO->obtenerRutinasByIdEntrenador(1));
//echo var_dump($pagoClienteDAO->obtenerPagosByIdCliente(2));