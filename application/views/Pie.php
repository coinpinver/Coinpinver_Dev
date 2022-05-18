	</div>

	<footer class="footer bg-darker py-1">
		<div class="container d-md-flex align-items-center justify-content-between py-2 text-center text-md-start">
			<div class="fs-sm mb-3 mb-md-0 order-md-2 position-relative">
				<a class="btn-social bs-facebook bs-light bs-lg me-2 mb-2" target="_blank" href="https://www.facebook.com/CoinPinver_Criptomonedas-110854660735816/"><i class="ai-facebook"></i></a>	
				<a class="btn-social bs-instagram bs-light bs-lg me-2 mb-2" target="_blank" href="https://instagram.com/coinpinver_criptomonedas?igshid=118izpe7yl5wa"><i class="ai-instagram"></i></a>
				<a class="btn-social bs-youtube bs-light bs-lg me-2 mb-2" target="_blank" href="https://youtube.com/channel/UCXpel7u479amgsaTbdKC-BQ"><i class="ai-youtube"></i></a>
			</div>
			
			<p class="fs-sm mb-0 me-3 order-md-1">
				<span class="textoPie text-light opacity-50 me-1">© Todos los derechos reservados. Realizado por CoinPinver</span>
			</p>
			<p class="fs-sm mb-0 me-3 order-md-1">
				
				<span class="textoPie text-light opacity-50 me-1 cursor" id="terminos">Términos y Condiciones</span>
				
			</p>
		</div>
	</footer>

	<a class="btn-scroll-top show" href="#top" data-scroll="" data-fixed-element="">
		<span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Regresar</span>
		<i class="btn-scroll-top-icon ai-arrow-up"></i>
	</a>

</body>



<script src="<?=base_url("vendor/bootstrap/dist/js/bootstrap.bundle.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/simplebar/dist/simplebar.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/tiny-slider/dist/min/tiny-slider.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/lightgallery.js/dist/js/lightgallery.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/lg-video.js/dist/lg-video.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/parallax-js/dist/parallax.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/jarallax/dist/jarallax.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/jarallax/dist/jarallax-element.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/flatpickr/dist/flatpickr.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/flatpickr/dist/plugins/rangePlugin.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/cleave.js/dist/cleave.min.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("vendor/chart/chartist.min.js")?>?t=<?=time()?>"></script>

<script src="<?=base_url("js/theme.min.js")?>?t=<?=time()?>"></script>
<!-- <script src="<?=base_url("js/ckeditor/ckeditor.js")?>?t=<?=time()?>"></script> -->
<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>

<script src="<?=base_url("js/particles/particles.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("js/particles/app.js")?>?t=<?=time()?>"></script>
<script src="<?=base_url("js/particles/lib/stats.js")?>?t=<?=time()?>"></script> 

<!-- 
	https://github.com/ChainSafe/web3.js/tree/v1.7.0
	https://github.com/ChainSafe/web3.js/blob/v1.7.0/dist/web3.min.js
	https://docs.metamask.io/guide/rpc-api.html#restricted-methods
	https://docs.metamask.io/guide/metamask-extension-provider.html#editing-the-example
 -->
<!-- <script src="<?=base_url("js/web3/web3.min.js")?>?t=<?=time()?>"></script> -->
<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
<!--<script src="<?=base_url("js/WalletConnect.js")?>?t=<?=time()?>"></script>-->
<!-- <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script> -->
<!-- <script src="<?=base_url("js/conectametamask.js")?>?t=<?=time()?>"></script>  -->

</html>

<script type="text/javascript">
	(function () {
// 		window.onload = function () {
// 			var preloader = document.querySelector('.page-loading');
// 			preloader.classList.remove('active');
// 			setTimeout(function () {
// 			preloader.remove();
// 			}, 2000);
// 		};

		$("#terminos").click(function(e){		
			var href =  base_url + 'Archivos/terminos/terminos.pdf';
			e.preventDefault(); 
		    window.open(href, '_blank');
			
		});
	})();
</script>