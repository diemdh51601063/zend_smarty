$(document).ready(function () {
    $('#table_category').DataTable({
        className:'display',
        "paging": true,
        "pagingType": "full_numbers",
        "processing": true,
        "order": ([ 0, "desc" ])
    });
});

