// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableDosen').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 2 },
      { responsivePriority: 2, targets: 7 },
    ],
  });
  $('#dataProposalMhs').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 1 }
    ],
  });
  $('#dataTableKonsentrasi').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 1 }
    ],
  });
  $('#dataTableMahasiswa').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 2 },
      { responsivePriority: 3, targets: 8 },
    ],
  });
  $('#dataTableProposal').DataTable({
    responsive: true,
    columnDefs: [
      
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 2 },
      { responsivePriority: 3, targets: 11 },
      { responsivePriority: 4, targets: 3 },
      { responsivePriority: 5, targets: 12 },
      { responsivePriority: 6, targets: 7 },
      { responsivePriority: 7, targets: 9 },
      { responsivePriority: 8, targets: 4 },
    ],
  });
  $('#dataHistoryProposal').DataTable({
    responsive: true,
    // columnDefs: [
      
    //   { responsivePriority: 1, targets: 0 },
    //   { responsivePriority: 2, targets: 2 },
    //   { responsivePriority: 3, targets: 12 },
    //   { responsivePriority: 4, targets: 3 },
    //   { responsivePriority: 5, targets: 7 },
    //   { responsivePriority: 6, targets: 9 },
    //   { responsivePriority: 7, targets: 4 },
    // ],
  });
});
