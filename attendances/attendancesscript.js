$(document).ready(function() {
  var $table=  $('#attendances_table').DataTable( {
        "ajax": {
            url:BASE_URL+'/attendances/all',
            dataType: "json",
            error: function(error){
                if(error.status===404 || error.statusText==='Not Found'){
                    console.log(error);
                    $('#alert-message').attr("hidden",false);
                }
            }
        },
    "dataSrc": "",
        "columnDefs": [ {
          "targets": [0],
          "orderable": false,
            "checkboxes": {
                selectRow: true
            }
    } ],
     "columns": [
         {"data": ""},
        { "data": "id" },
        { "data": "surname" },
        { "data": "first_name" },
        { "data": "earlyrain" },
         { "data": "latterrain"},
         { "data": "both"}
    ],
        "processing": true,
        "language": {
    "aria": {
        "sortAscending": ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"
    },
    "emptyTable": "No data available in table",
    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
    "infoEmpty": "No entries found",
    "infoFiltered": "(filtered1 from _MAX_ total entries)",
    "lengthMenu": "_MENU_ entries",
    "search": "Search:",
    "zeroRecords": "No matching records found"
},

// Or you can use remote translation file
//"language": {
//   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
//},

buttons: [
    { extend: 'print', className: 'btn default' },
    { extend: 'copy', className: 'btn default' },
    { extend: 'pdf', className: 'btn default' },
    { extend: 'excel', className: 'btn default' },
    { extend: 'csv', className: 'btn default' },
    {
        text: 'Reload',
        className: 'btn default',
        action: function ( e, dt, node, config ) {
            dt.ajax.reload();
//                        alert('Custom Button');
        }
    }
],

"order": [
    [0, 'asc']
],

"lengthMenu": [
    [5, 10, 15, 20, 30, 50, 60, -1],
    [5, 10, 15, 20, 30, 50, 60, "All"] // change per page values here
],
// set the initial value
"pageLength": 20,

"dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
    } );
} );

$('body').on('change', '#select_all', function() {
   var rows, checked;
   rows = $('#attendances_table').find('tbody tr');
   checked = $(this).prop('checked');
   $.each(rows, function() {
      var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
       console.log('checkbox: '+checkbox.val());
   });
//    function checkEarlyRain(){
//    var rowsel = $table.column(0).checkboxes.selected();
//    $.each(rowsel, function(value, rowId){
//        console.log(rowid.val());
//    })
//}
 });

//---------------- Early Rain Service Function ----------------
function earlyRain(id){
    $.ajax({
        url: BASE_URL+'/attendances/early_rain?id='+id,
        method: 'GET',
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        async: false,
        success: function (data) {
            if(data.code === 0 || data.message === 'SUCCESS'){
                swal({
                        title: "Success",
                        text: "Marked Successfully",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "ok",
                    });
                $('#early_rain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                console.log(data);
            }
        },
        error: function (error) {
            console.log('Error: '+error);
        }
    });
    console.log(id);
}

//----------------- Latter Rain Service Function ----------------
function latterRain(id){
    $.ajax({
        url: BASE_URL+'/attendances/latter_rain?id='+id,
        method: 'GET',
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        dataType: 'json',
        async: false,
        success: function (data) {
            if(data.code === 0 || data.message === 'SUCCESS'){
                swal({
                    title: "Success",
                    text: "Marked Successfully",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ok",
                });
                $('#latter_rain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                console.log(data);
            }
        },
        error: function (error) {
            console.log('Error:' );
            console.log(error);
        }
    });
    console.log(id);
}

//----------------- Both Service Function -----------------------
function bothService(id){
    console.log(id)
;}

//---------------- Early Rain Service Function ----------------
function checkEarlyRain(){
    var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
    console.log('checkbox: '+checkbox.val());
}

//----------------- Latter Rain Service Function ----------------
function checkLatterRain(id){
    console.log(id);
}

//----------------- Both Service Function -----------------------
function checkBothService(id){
    console.log(id)
;}