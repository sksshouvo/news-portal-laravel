
	<script src="<?php echo e(asset('js/dashboard/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/chart-data.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/easypiechart.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/easypiechart-data.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dashboard/bootstrap-datepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('js/dashboard/custom.js')); ?>"></script>
	<script src="<?php echo e(asset('js/dashboard/bootstrap-toggle.min.js')); ?>"></script>
	<?php $__env->startSection('add_src'); ?>
	
	<?php echo $__env->yieldSection(); ?>
	<script>
	window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
    };
	</script>
	<?php $__env->startSection('add_js'); ?>
		
	<?php echo $__env->yieldSection(); ?>
		
</body>
</html>