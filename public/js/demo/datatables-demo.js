// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableDosen').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 2 }
    ],
  });
  $('#dataTableKonsentrasi').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 1 }
    ],
  });
});
