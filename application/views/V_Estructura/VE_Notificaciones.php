<!--<div class="position-fixed top-0 start-50 mt-6 translate-middle-x toast-position">
	<div class="toast" id="notification-success" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header bg-success text-white">
			<i class="ai-check-circle me-2"></i>
			<span class="me-auto" id="title-success"></span>
			<button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body text-success" id="message-success"></div>
	</div>
</div>

<div class="position-fixed top-0 start-50 mt-6 translate-middle-x toast-position">
	<div class="toast" id="notification-warning" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header bg-warning text-white">
			<i class="ai-alert-triangle me-2"></i>
			<span class="me-auto" id="title-warning"></span>
			<button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body text-warning" id="message-warning"></div>
	</div>
</div>

<div class="position-fixed top-0 start-50 mt-6 translate-middle-x toast-position">
	<div class="toast" id="notification-danger" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header bg-danger text-white">
			<i class="ai-check-circle me-2"></i>
			<span class="me-auto" id="title-danger"></span>
			<button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body text-danger" id="message-danger"></div>
	</div>
</div>

<div class="position-fixed top-0 start-50 mt-6 translate-middle-x toast-position">
	<div class="toast" id="notification-info" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header bg-info text-white">
			<i class="ai-check-circle me-2"></i>
			<span class="me-auto" id="title-info"></span>
			<button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body text-info" id="message-info"></div>
	</div>
</div>-->

<style type="text/css">
	.icon-cp-notification {
		width: 5rem;
		height: 5rem;
	}
	@media only screen and (max-width: 600px) {
	  	#respuesta_formulario
		{
			height: 400px;
			overflow-y: auto;
			overflow-x: auto;
		}
	}
	
</style>
<div class="modal fade" id="modalForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" id="tamanoModal" role="dialog">
		<div class="modal-content border-0">
			<div class="modal-header bg-dark px-4">
				<h4 class="modal-title text-light" id="titulo_modalForm"></h4>
				<button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="btn-close"></button>
			</div>
			<div class="modal-body px-6">
				<div id="respuesta_formulario"></div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-confirmacion-success" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="ai-check text-success display-2"></i>
				<h3 class="mt-2 mb-2">¡ Confirmación !</h3>
				<p class="fs-ms" id="texto-modal-success">Esta a punto de guardar<br>¿Estas seguro?</p>
				<div class="mt-5">
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Cancelar</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-success" id="btn-confirmacion-success">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-confirmacion-warning" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="ai-alert-triangle text-warning display-2"></i>
				<h3 class="mt-2 mb-2">¡ Confirmación !</h3>
				<p class="fs-ms" id="texto-modal-warning">Esta a punto de guardar<br>¿Estas seguro?</p>
				<div class="mt-5">
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Cancelar</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-warning" id="btn-confirmacion-warning">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-confirmacion-danger" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<i class="ai-x text-danger display-2"></i>
				<h3 class="mt-2 mb-2">¡ Confirmación !</h3>
				<p class="fs-ms" id="texto-modal-danger">Esta a punto de guardar<br>¿Estas seguro?</p>
				<div class="mt-5">
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">Cancelar</button>
					<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger" id="btn-confirmacion-danger">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalCentered" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<div class="spinner-border text-warning icon-cp-notification" role="status">
					<span class="visually-hidden">Espere un momento...</span>
				</div>
				<h3 class="mt-2" id="titulo-esperando"></h3>
				<p class="fs-ms" id="texto-esperando"></p>
			</div>
		</div>
	</div>
</div>