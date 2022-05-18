<div class="py-4 py-lg-6 bg-info">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div>
					<h1 class="text-white text-center fs-1">
						<i class="ai-shopping-bag"></i>
					</h1>
					<h2 class="text-white text-center">Tienda en línea</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mb-5 mt-5">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 mb-5">
			<div class="card card-product card-hover">
				<a class="card-img-top" href="#">
					<img src="<?=base_url("img/Coinpinver/Tienda/Libro1.jpeg")?>?v=<?=time()?>" alt="Product thumbnail"/>
				</a>
				<div class="card-body">
					<a class="meta-link fs-xs mb-1" href="#">Educación</a>
					<h3 class="fs-md fw-medium mb-2">
						<a class="meta-link" href="#">Como sacar ventajas de las criptomonedas Vol. 1</a>
					</h3>
					<span class="text-heading fw-semibold">Fisico - $399.99</span><br>
					<span class="text-heading fw-semibold">Digital - $200.00</span>
				</div>
				<div class="card-footer">
					<button type="button" id="btn-login" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100" data-bs-toggle="modal" data-bs-target="#metodos-pago">
						<i class="ai-credit-card"></i> Formas de pago
					</button>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3 col-lg-3 mb-5">
			<div class="card card-product card-hover">
				<a class="card-img-top" href="#">
					<img src="<?=base_url("img/Coinpinver/Tienda/Libro2.jpeg")?>?v=<?=time()?>" alt="Product thumbnail"/>
				</a>
				<div class="card-body">
					<a class="meta-link fs-xs mb-1" href="#">Educación</a>
					<h3 class="fs-md fw-medium mb-2">
						<a class="meta-link" href="#">Como sacar ventajas de las criptomonedas Vol. 2</a>
					</h3>
					<span class="text-heading fw-semibold">Fisico - $399.99</span><br>
					<span class="text-heading fw-semibold">Digital - $200.00</span>
				</div>
				<div class="card-footer">
					<button type="button" id="btn-login" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100" data-bs-toggle="modal" data-bs-target="#metodos-pago">
						<i class="ai-credit-card"></i> Formas de pago
					</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<div class="card card-horizontal card-hover mb-4">
				<a class="card-img-top" href="#" style="background-image: url(../img/Coinpinver/Tienda/comboFisico.jpg);"></a>
				<div class="card-body">
					<h2 class="h2 text-sm-nowrap">Oferta No. 1</h2>
					<p class="pb-2 mx-auto mx-sm-0 fs-md">Adquiere ambos libros en forma fisica por tan solo:</p>

					<del class="fs-sm text-muted me-1 text-danger">$799.98</del>
					<span class="text-heading fw-semibold">$699.99</span>
					<hr>
					<button type="button" id="btn-login" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100" data-bs-toggle="modal" data-bs-target="#metodos-pago">
						<i class="ai-credit-card"></i> Formas de pago
					</button>
				</div>
			</div>

			<div class="card card-horizontal card-hover mb-4">
				<a class="card-img-top" href="#" style="background-image: url(../img/Coinpinver/Tienda/comboDigital.jpg);"></a>
				<div class="card-body">
					<h2 class="h2 text-sm-nowrap">Oferta No. 2</h2>
					<p class="pb-2 mx-auto mx-sm-0 fs-md">Adquiere ambos libros en forma digital por tan solo:</p>

					<del class="fs-sm text-muted me-1 text-danger">$400.00</del>
					<span class="text-heading fw-semibold">$300.00</span>
					<hr>
					<button type="button" id="btn-login" class="btn btn-outline-warning btn-translucent-warning btn-sm btn-icon d-block w-100" data-bs-toggle="modal" data-bs-target="#metodos-pago">
						<i class="ai-credit-card"></i> Formas de pago
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="metodos-pago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Formas de pago</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="head-wallet-btc">
							<button class="accordion-button no-indicator collapsed" type="button">
								<div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#body-wallet-btc" aria-expanded="false" aria-controls="body-wallet-btc">
									<input class="form-check-input" type="radio" id="wallet-btc" name="metodo-pago">
									<label class="form-check-label d-flex align-items-center fs-base text-heading mb-0 mt-1" for="wallet-btc">Wallet - BTC</label>
								</div>
							</button>
						</h2>
						<div class="accordion-collapse collapse" id="body-wallet-btc" aria-labelledby="head-wallet-btc" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="mb-3">
									<label for="wallet-btc" class="form-label">Para hacer transferencia a la wallet copia la siguiente cadena:</label>
									<input class="form-control form-control-sm" type="text" id="wallet-btc" value="3DwMQbrAiTMQnCUq9X59Td1pCz5yHEeW9Z">
								</div>
							</div>
						</div>

						
					</div>



					<div class="accordion-item">
						<h2 class="accordion-header" id="head-bitso-transfer">
							<button class="accordion-button no-indicator collapsed" type="button">
								<div class="form-check w-100" data-bs-toggle="collapse" data-bs-target="#body-bitso-transfer" aria-expanded="false" aria-controls="body-bitso-transfer">
									<input class="form-check-input" type="radio" id="bitso-transfer" name="metodo-pago">
									<label class="form-check-label d-flex align-items-center fs-base text-heading mb-0 mt-1" for="bitso-transfer">Bitso transfer</label>
								</div>
							</button>
						</h2>
						<div class="accordion-collapse collapse" id="body-bitso-transfer" aria-labelledby="head-bitso-transfer" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="mb-3">
									<label for="wallet-btc" class="form-label">Para hacer transferencia desde bitso transfer copia el siguiente correo electrónico:</label>
									<input class="form-control form-control-sm" type="text" id="wallet-btc" value="emprendedorescoinpinver@hotmail.com">
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-warning btn-translucent-warning" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>



