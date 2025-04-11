//Responsive table by adminLTE
var $ = jQuery.noConflict();
$(document).ready(function() {
	$('#table1').DataTable({
		"paging": true,
		"lengthChange": false, //Allow changing the number of rows displayed
		"searching": false, //Enable search functionality
		"ordering": true, // Enable column sorting
		"info": true, // Show table information
		"autoWidth": false, // Disable automatic column width calculation
		"responsive": true, // Enable responsive behavior
	  	"lengthMenu": [5, 10, 25, 50], // Set the number of rows displayed per page});
		"pageLength": 10, // Set the default number of rows displayed per page
	});
});