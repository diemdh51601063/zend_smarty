$(document).ready(function () {
    $('#table_product').DataTable({
        className:'display',
        "paging": true,
        "pagingType": "full_numbers",
        "order": ([ 0, "desc" ]),
        "render": function ( data, type, row, meta ) {
            return type === 'display' && data.length > 40 ?
              '<span title="'+data+'">'+data.substr( 0, 38 )+'...</span>' :
              data;
          }
    });
});

