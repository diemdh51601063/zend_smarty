$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
    $('#table_orders').DataTable({
        className: 'display',
        "paging": true,
        "pagingType": "full_numbers"
    });
});
