<script src="{{url('public')}}/assets/vendor/global/global.min.js"></script>
	<script src="{{url('public')}}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{url('public')}}/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{url('public')}}/assets/js/custom.min.js"></script>
	<script src="{{url('public')}}/assets/js/deznav-init.js"></script>
	<script src="{{url('public')}}/assets/vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{url('public')}}/assets/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="{{url('public')}}/assets/vendor/apexchart/apexchart.js"></script>
	
	<script src="{{url('public')}}/assets/js/dashboard/dashboard-1.js"></script>
	
    


    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{url('public')}}/assets/vendor/moment/moment.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{url('public')}}/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="{{url('public')}}/assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="{{url('public')}}/assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.js"></script>
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.time.js"></script>
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.date.js"></script>


    <!-- sweet alert -->
    <script src="{{url('public')}}/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{url('public')}}/assets/js/plugins-init/sweetalert.init.js"></script>

    <script src="{{url('public')}}/assets/dist/sweetalert2.all.min.js"></script>

    <!-- Daterangepicker -->
    <script src="{{url('public')}}/assets/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="{{url('public')}}/assets/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="{{url('public')}}/assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="{{url('public')}}/assets/js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="{{url('public')}}/assets/js/plugins-init/pickadate-init.js"></script>
    <!-- Data table -->
    <script src="{{url('public')}}/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{url('public')}}/assets/js/plugins-init/datatables.init.js"></script>
  <!-- momment js is must -->
    <script src="{{url('public')}}/assets/vendor/moment/moment.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{url('public')}}/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="{{url('public')}}/assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{url('public')}}/assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="{{url('public')}}/assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.js"></script>
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.time.js"></script>
    <script src="{{url('public')}}/assets/vendor/pickadate/picker.date.js"></script>
     <script src="{{url('public')}}/assets//vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>


