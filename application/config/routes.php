<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//$route['default_controller'] = "C_Inicio";
$route["default_controller"] = "C_Principal";

//--==Acceso==--//
$route["Inicio"] = "C_Inicio/CI_Principal/CIP_Home";
$route["SinPersimos"] = "C_Principal/SinPermiso";
$route["Nosotros"] = "C_AcercaDeNosotros/CADN_Principal/CADNP_AcercaDeNosotros";
$route["IniciarSesion"] = "C_IniciarSesion/CIS_Principal/CISP_IniciarSesion";
//$route["ControlAcceso"] = "C_IniciarSesion/CIS_Acciones/CISA_AccesoLogin";
$route["Recuperar-Contrasenia-Suscriptor"] = "C_IniciarSesion/CIS_Principal/CISP_RepcuperarContraseniaSuscriptor";
$route["Rifa"] = "C_Inicio/CI_Principal/CIP_Rifa";
$route["Simulacion"] = "C_Inicio/CI_Principal/CIP_Simulacion";

$route["CerrarSesion"] = "C_IniciarSesion/CIS_Principal/CISP_CerrarSesion";
$route["RegistroUsuario"] = "C_Inicio/CI_PrincipalSesion/CIP_FormRegistrarse";
$route["setUsuario"] = "C_Inicio/CI_PrincipalSesion/CIP_GuardaRegistrarse";

//--==Educacion==--//
$route["Educacion-Crecimiento-Personal"] = "C_Educacion/CE_Principal/CEP_CrecimientoPersonal";
$route["Educacion-Criptomonedas"] = "C_Educacion/CE_Principal/CEP_Criptomonedas";

//--==Contacto con Coinpinver==--//
$route["SetContacto"] = "C_Contacto/CC_Acciones/CCA_SetDatosContacto";

//--==Suscripcion a Coinpinver==--//
$route["Suscripcion"] = "C_Suscripcion/CS_Principal/CSP_CapturaSuscripcion";
$route["setSuscripcion"] = "C_Suscripcion/CS_Acciones/CSA_SetSuscripcion";
//$route["ControlAcceso/(:any)/(:any)"] = "C_IniciarSesion/CIS_Acciones/CISA_ControlAcceso/$1/$2";
$route["ConfirmaCuentaSuscriptor/(:any)"] = "C_Suscripcion/CS_Principal/CSP_ConfirmarCuentaSuscriptor/$1";
$route["ReenviarConfirmaCuentaSuscriptor"] = "C_Suscripcion/CS_Acciones/CSP_ReenviarConfirmarCuentaSuscriptor";
$route["SetConfirmaCuentaSuscriptor"] = "C_Suscripcion/CS_Acciones/CSP_SetConfirmarCuentaSuscriptor";

//--==Datos del suscriptor de Coinpinver==--//
$route["PerfilSuscriptor"] = "C_Suscriptor/CS_Principal/CS_showPerfilSuscriptor";
$route["SetModificaFotografiaSuscriptor"] = "C_Suscriptor/CS_Acciones/CS_CambiaFotografiaSuscriptor";
$route["UpdateInformacionPersonalSuscriptor"] = "C_Suscriptor/CS_Acciones/CS_UpdateInformacionPersonalSuscriptor";

//--==Cursos==--//
$route["Cursos-Criptomonedas"] = "C_Cursos/CC_Principal/CEP_GetCursosCriptomonedas";

//--==Tienda==--//
$route["Tienda"] = "C_Tienda/CT_Principal/CTP_Principal";

//--==Administracion | Cursos==--//
$route["Administracion-Cursos"] = "C_Administracion/CA_Cursos/CAC_Principal";
$route["Administracion-SetCurso"] = "C_Administracion/CA_Cursos/CAC_SetDatosCurso";
$route["Administracion-GetCurso/(:any)/(:any)"] = "C_Administracion/CA_Cursos/CAC_GetDatosCurso/$1/$2";
$route["Administracion-SetInformacionCurso"] = "C_Administracion/CA_Cursos/CEP_SetInformacionCurso";

$route["Administracion-GetModulosCurso"] = "C_Administracion/CA_Cursos/CEP_GetModulosCurso";
$route["Administracion-GetAccionModuloCurso"] = "C_Administracion/CA_Cursos/CEP_GetAccionModuloCurso";
$route["Administracion-SetAccionModuloCurso"] = "C_Administracion/CA_Cursos/CEP_SetAccionModuloCurso";

$route["Administracion-GetSesionModulo"] = "C_Administracion/CA_Cursos/CEP_GetSesionModulo";
$route["Administracion-GetAccionSesionModulo"] = "C_Administracion/CA_Cursos/CEP_GetAccionSesionModulo";
$route["Administracion-SetAccionSesionModulo"] = "C_Administracion/CA_Cursos/CEP_SetAccionSesionModulo";

$route["Detalle-Curso"] = "C_Cursos/CC_Principal/CEP_GetDetalleCursoCriptomonedas";

$route["SellToken"] = "C_Inicio/CI_Principal/CPI_SellToken";
$route["PlataformaEARN"] = "C_PlataformaEarn/CP_Inicio/CPI_Home";
$route["PlataformaLEARNING"] = "C_PlataformaLEARNING/CPL_Principal/CPLP_Home";
$route["Quienes-somos"] = "C_QuieneSomos/CQS_Principal/CQSP_Home";
$route["Recompensas"] = "C_Inicio/CI_Principal/CIP_ShowInstruccionesRecompensas";
$route["WhitePaper"] = "C_Inicio/CI_Principal/CIP_ShowWhitePaper";
$route["Educacion"] = "C_Educacion/CE_Principal/CEP_Educacion";

//--== Sesion ==--//
$route["ControlAcceso"] = "C_Inicio/CI_PrincipalSesion/CIP_AccesoLogin";
$route["PerfilUsuario"] = "C_Usuario/CU_Principal/CUP_PerfilUsuario";
$route["setPerfilUsuario"] = "C_Usuario/CU_Principal/CUP_GuardaPerfilUsuario";

//--= recuperacion contraseña == --//
$route["Recuperar-Contrasenia"] = "C_IniciarSesion/CIS_Principal/CISP_RepcuperarContrasenia";
$route["SendCodeSecurity"] = "C_IniciarSesion/CIS_Acciones/CISA_SendCodeSecurity";
$route["ValidateCodeSecurity"] = "C_IniciarSesion/CIS_Acciones/CISA_ValidateCodeSecurity";
$route["ChangePassword"] = "C_IniciarSesion/CIS_Acciones/CISA_ChangePassword";

$route["RecuperarPass"] = "C_Usuario/CU_Principal/CUP_RecuperarPass";
$route["ConfirmaCuentaUsuario/(:any)"] = "C_Inicio/CI_PrincipalSesion/CSP_ConfirmarCuentaUsuario/$1";
$route["SetConfirmaCuentaUsuario"] = "C_Inicio/CI_PrincipalSesion/CSP_SetConfirmarCuentaUsuario";
$route["ReenviarConfirmaCuentaUsuario"] = "C_Inicio/CI_PrincipalSesion/CSP_ReenviarConfirmarCuentaUsuario";

//--== WhitePaper ==--//
$route["WhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_Principal";
$route["WhitePaperDescripcion"] = "C_WhitePaper/CW_Inicio/CWI_getDescripcion";
$route["addTemaWhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_addTemaWhitePaper";
$route["saveTemaWhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_saveTemaWhitePaper";
$route["downloadWhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_downloadWhitePaper";
$route["ModalupdateTemaWhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_ModalupdateTemaWhitePaper";
$route["updateTemaWhitePaper"] = "C_WhitePaper/CW_Inicio/CWI_updateTemaWhitePaper";

//--== Administración general ==--//
$route["AdminUsuariosRegistrados"] = "C_Administracion/CA_AdminUsuariosRegistrados/CAA_AdminUsuariosRegistrados";

$route["404_override"] = "";
$route["translate_uri_dashes"] = FALSE;