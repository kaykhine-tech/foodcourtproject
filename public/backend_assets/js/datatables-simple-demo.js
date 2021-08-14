window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        let mytable = new simpleDatatables.DataTable(datatablesSimple);

        //'datatable.page' fires event on page change.And use on() function to listen for custom events.
        mytable.on('datatable.page', function(page) {
            deletefun();
        });
    }
});
