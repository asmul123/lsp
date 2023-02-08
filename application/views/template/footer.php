</div>
<!-- /.main-wrapper -->
</div>
<!-- ========== COMMON JS FILES ========== -->
<script src="<?php echo base_url() ?>assets/Theme/js/jquery/jquery-2.2.4.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/pace/pace.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/lobipanel/lobipanel.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/iscroll/iscroll.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/DataTables/DataTables-1.10.13/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/DataTables/DataTables-1.10.13/js/dataTables.bootstrap.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="<?php echo base_url() ?>assets/Theme/js/prism/prism.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/waypoint/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/counterUp/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/amcharts/amcharts.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/amcharts/serial.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/amcharts/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/Theme/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="<?php echo base_url() ?>assets/Theme/js/amcharts/themes/light.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/toastr/toastr.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/bootstrap-tour/bootstrap-tour.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/chartjs/Chart.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/chartjs/utils.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/chartjs/globalchartjs.js"></script>

<!-- ========== THEME JS ========== -->
<script src="<?php echo base_url() ?>assets/Theme/js/main.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/production-chart.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/traffic-chart.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/task-list.js"></script>
<script src="<?php echo base_url() ?>assets/Theme/js/script.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script> -->
<script>
	// script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
	document.addEventListener('DOMContentLoaded', function() {
		resizeCanvas();
	})

	//script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
	function resizeCanvas() {
		var ratio = Math.max(window.devicePixelRatio || 1, 1);
		canvas.width = canvas.offsetWidth * ratio;
		canvas.height = canvas.offsetHeight * ratio;
		canvas.getContext("2d").scale(ratio, ratio);
	}


	var canvas = document.getElementById('signature-pad');

	//warna dasar signaturepad
	var signaturePad = new SignaturePad(canvas, {
		backgroundColor: 'rgb(255, 255, 255)'
	});

	//saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
	document.getElementById('clear').addEventListener('click', function() {
		signaturePad.clear();
	});

	//saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
	document.getElementById('undo').addEventListener('click', function() {
		var data = signaturePad.toData();
		if (data) {
			data.pop(); // remove the last dot or line
			signaturePad.fromData(data);
		}
	});

	//saat tombol change color diklik maka akan merubah warna pena
	document.getElementById('change-color').addEventListener('click', function() {

		//jika warna pena biru maka buat menjadi hitam dan sebaliknya
		if (signaturePad.penColor == "rgba(0, 0, 255, 1)") {

			signaturePad.penColor = "rgba(0, 0, 0, 1)";
		} else {
			signaturePad.penColor = "rgba(0, 0, 255, 1)";
		}
	})

	//fungsi untuk menyimpan tanda tangan dengan metode ajax
	$(document).on('click', '#btn-submit', function() {
		var signature = signaturePad.toDataURL();

		document.getElementById("output").value = (signature);
		document.getElementById("sign_prev").src = ('data:' + signature);
		document.getElementById("sign_prev").style.display = '';
	})
</script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/Theme/js/summernote/summernote.min.js"></script>


<script>
	$(function() {
		// Summernote
		$('.textarea').summernote()
	})
</script>
<script>
	let baseUrl = "<?php echo base_url() ?>"
	console.log(baseUrl)


	$(".js-states").select2();

	$(".js-states-limit").select2({
		maximumSelectionLength: 2
	});

	$(".js-states-hide").select2({
		minimumResultsForSearch: Infinity
	});

	$('#tableLulus').DataTable();

	$('#table-user').DataTable();

	$('#upClass-table').DataTable()

	// let t = $('#dataTableTransaksi').DataTable({
	// 	"order": [[1, "desc"]],
	// 	'scrollX': true,
	// 	render: function (data, type, row, meta) {
	// 		return meta.row + meta.settings._iDisplayStart + 1;
	// 	}
	// });

	$(document).ready(function() {
		var t = $('#dataTableTransaksi').DataTable({
			"columnDefs": [{
				"searchable": false,
				"orderable": false,
				"targets": 0
			}],
			"order": [
				[1, 'DESC']
			],
			"sScrollX": "100%",
			"sScrollXInner": "110%",
			"bScrollCollapse": true,
			"responsive": true,
		});

		t.on('order.dt search.dt', function() {
			t.column(0, {
				search: 'applied',
				order: 'applied'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw();
	});

	$('#dataTableSiswa').DataTable({
		'scrollX': true,
		'sort': false
	});

	$('#dataSiswaIndex').DataTable({
		"order": [
			[3, "desc"]
		],
		'scrollX': true,
		'sort': false
	});

	$('input.blue-style').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue'
	});

	$('input.green-style').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green'
	});

	$('input.red-style').iCheck({
		checkboxClass: 'icheckbox_square-red',
		radioClass: 'iradio_square-red'
	});

	$('input.flat-black-style').iCheck({
		checkboxClass: 'icheckbox_flat',
		radioClass: 'iradio_flat'
	});

	$('input.line-style').each(function() {
		var self = $(this),
			label = self.next(),
			label_text = label.text();

		label.remove();
		self.iCheck({
			checkboxClass: 'icheckbox_line-blue',
			radioClass: 'iradio_line-blue',
			insert: '<div class="icheck_line-icon"></div>' + label_text
		});
	});

	$("#tb_tipeuser").DataTable()

	$('#tb_staff').DataTable({
		"scrollX": true
	});

	$('#tb_histori').DataTable({
		// 'scrollX' : true,
		"sScrollX": "100%",
		"sScrollXInner": "110%",
		"bScrollCollapse": true,
		"responsive": true,
		"searching": false,
		"paging": false,
		"bInfo": false,
		// "sScrollX": "100%",
		// "sScrollXInner": "110%",
	});

	$('#tb_bp').DataTable({
		"scrollY": "170px",
		"scrollX": true,
		"scrollCollapse": true,
		"searching": false,
		"paging": false,
	});
	// if(transaksi == true){
	//     let interval = setInterval(() => {
	//         if($(".selectJS").data("select2").dropdown.$search.val() != ''){
	//             getDataByRfid($(".selectJS").data("select2").dropdown.$search.val())
	//             $(".selectJS").data("select2").dropdown.$search.val('')
	//             clearInterval(interval)
	//         }
	//     }, 500);
	// }



	$("#tb_tahunakademik").DataTable()
	// $("#tb_staff").DataTable();
	$("#tb_tanggallaporan").DataTable()
	// $("#tb_staff").DataTable();



	function toggle(source) {
		var checkboxes = document.querySelectorAll('input[type="checkbox"]');
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
		}
	}

	$('#tb_import').DataTable({
		scrollY: '300px',
		paging: false,
	});

	$('#file').hide();

	$('#file').change(function() {
		$('#filename').html($(this)[0].files[0]['name'])
		// console.log()
	})

	// $('#warning').css("display", "none")


	$('#usertipe').val($('.tipeuserAdd').val())

	// ./modul/FORMAT IMPORT EXCEL.xlsx
</script>
<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>