// Call the dataTables jQuery plugin
$(document).ready(function() {
  
  $('#dataTable').DataTable({
  	// "paging":false,
  	// "info":false,
  	"language":{
  		"sProcessing":   "Sedang proses...",
		"sLengthMenu":   "Tampilan _MENU_ entri",
		"sZeroRecords":  "Tidak ditemukan data yang sesuai",
		"sInfo":         "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
		"sInfoEmpty":    "Tampilan 0 hingga 0 dari 0 entri",
		"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
		"sInfoPostFix":  "",
		"sSearch":       "Cari:",
		"sUrl":          "",
		"oPaginate": {
		   "sFirst":    "Awal",
		   "sPrevious": "Balik",
		   "sNext":     "Lanjut",
		   "sLast":     "Akhir"
		}
  	}
  });

});