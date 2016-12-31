//date picker 
$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    orientation: 'bottom',
    autoclose: true
});
// provides sorting and filtering for band and album lists
$('#band_table').DataTable();
$('#album_table').DataTable({
    sDom: 'ltipr',
    initComplete: function () {
        this.api().columns(1).every(function () {
            var column = this;
            var select = $('<select id="band_filter"><option value=""></option></select>')
                    .prependTo($('#album_table_length'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                                );

                        column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                    });

            column.data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
            });
        });
        $('#band_filter').before('<br/><label>Band Filter:</label> ');
    }
});
//form validations
$('#bandform').validate({
    rules: {
        name: {
            required: true
        },
        website: {
            url: true
        },
        date_started: {//datepicker component makes it nearly impossible to insert an incorrect value, so this never really gets triggered
            date: true
        }
    }
});

$('#albumform').validate({
    rules: {
        name: {
            required: true
        },
        band_id: {
            required: true
        },
        number_of_tracks: {
            digits: true
        },
        date_recorded: {//datepicker component makes it nearly impossible to insert an incorrect value, so this never really gets triggered
            date: true
        },
        date_released: {//datepicker component makes it nearly impossible to insert an incorrect value, so this never really gets triggered
            date: true
        }
    }
});
// handle delete requests
function delete_resource(resource, id, csrf) {
    $.ajax({
        url: '/' + resource + '/' + id,
        data: '_token=' + csrf,
        type: 'DELETE',
        async: false,
        success: function (result) {
            window.location.href = '/' + resource;
        }
    });
}