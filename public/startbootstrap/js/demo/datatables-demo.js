// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "pdf",
        orientation: "landscape",
        pageSize: "Legal",
        title: "Usulan KIS",
        download: "open",
      },

      "csv",
      "excel",
      "print",
      "copy",
    ],
    columnDefs: [
      {
        // target: [4, 5, 6, 7, 8, 9, 10],
        // visible: false,
        // searchable: false,
      },
    ],
    scrollX: true,
    scrollY: "500px",
    scrollCollapse: true,
  });
});
