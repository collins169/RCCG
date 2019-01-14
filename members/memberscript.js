function select(occupation) {
   if ( occupation.options[occupation.selectedIndex].value == "student" ) {
      document.getElementById("school").style.display = "block";
      document.getElementById("school2").style.display = "block";
   } else {
      document.getElementById("school").style.display = "none";
      document.getElementById("school2").style.display = "none";
   }
}
function select2(occupation) {
   if ( occupation.options[occupation.selectedIndex].value == "student" ) {
      document.getElementById("editschool").style.display = "block";
      document.getElementById("editschool2").style.display = "block";
   } else {
      document.getElementById("editschool").style.display = "none";
      document.getElementById("editschool2").style.display = "none";
   }
}
$(document).ready(function() {
    //-----------------Fetching Countries from the database-------------------
    $.getJSON(BASE_URL+'/countries/get', function(data) {
        $.each(data, function(key, value) {
             $('#country')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
        });
   });

    //-----------------Fetching Families from the database-------------------
    $.getJSON(BASE_URL+'/families/get', function(data) {
        $.each(data, function(key, value) {
             $('#family')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
        });
   });

    //-----------------Fetching Departments from the database-------------------
     $.getJSON(BASE_URL+'/departments/get', function(data) {
        $.each(data, function(key, value) {
             $('#dept')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
        });
   });

    //-----------------Fetching Schools from the database-------------------
    $.getJSON(BASE_URL+'/schools/get', function(data) {
         $.each(data, function(key, value) {
             $('#school')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
        });
   });

    //-----------------Fetching Groups from the database-------------------
    $.getJSON(BASE_URL+'/groups/get', function(data) {
         $.each(data, function(key, value) {
             $('#group')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
        });
   });

    $('#example').DataTable( {
        "ajax": BASE_URL+'/members/all',
    "dataSrc": "",
     "columns": [
        { "data": "id" },
        { "data": "surname" },
        { "data": "first_name" },
        { "data": "phone" },
         { "data": "gender"},
         { "data": "email"},
         { "data": "action"}
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

// View selected member
function view (id){
    $.getJSON(BASE_URL+'/members/get?id='+id, function(data) {
        $('#editsurname').val(data.surname);
        $('#editfirst_name').val(data.first_name);                    
        $('#editmiddle_name').val(data.middle_name);
        $('#editdob').val(data.dob);
        $('#editgender').val(data.gender);                    
        $('#editid').val(data.id);
        $('#editemail').val(data.email);
        $('#editjoin_date').val(data.date_joined);
        $('#editaddress').val(data.address);
        $('#editoccupation').val(data.occupation);
        $('#editphone').val(data.phone);
        $('#editother_phone').val(data.other_phone);
        $('#editmartial_status').val(data.martial_status);  
        if(data.image == '' || data.image == null){
            $('#imagedefault').attr('src','user-add.png');
        }else{
             $('#imagedefault').attr('src',BASE_URL+data.image);
        }
        var countries_id = data.countries_id;
        var families_id = data.families_id;
        var groups_id = data.groups_id;
        var dept_id = data.departments_id;
        var schools_id = data.schools_id;


    $.getJSON(BASE_URL+'/countries/get', function(data) {
         $.each(data, function(key, value) {
             if(value.id == countries_id){
             $('#editcountry')
                 .append($("<option value='"+value.id+"'></option>")
                 .attr('selected',true)
                 .text(value.name));
             }else{
             $('#editcountry')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
             }
        });
   });
    $.getJSON(BASE_URL+'/families/get', function(data) {
          $.each(data, function(key, value) {
             if(value.id == families_id){
             $('#editfamily')
                 .append($("<option value='"+value.id+"'></option>")
                 .attr('selected',true)
                 .text(value.name));
             }else{
             $('#editfamily')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
             }
        });
   });
     $.getJSON(BASE_URL+'/departments/get', function(data) {
          $.each(data, function(key, value) {
             if(value.id == dept_id){
             $('#editdept')
                 .append($("<option value='"+value.id+"'></option>")
                 .attr('selected',true)
                 .text(value.name));
             }else{
             $('#editdept')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
             }
        });
   });
    $.getJSON(BASE_URL+'/schools/get', function(data) {
          $.each(data, function(key, value) {
             if(value.id == schools_id){
             $('#editschool')
                 .append($("<option value='"+value.id+"'></option>")
                 .attr('selected',true)
                 .text(value.name));
             }else{
             $('#editschool')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
             }
        });
   });
    $.getJSON(BASE_URL+'/groups/get', function(data) {
          $.each(data, function(key, value) {
             if(value.id == groups_id){
             $('#editgroup')
                 .append($("<option value='"+value.id+"'></option>")
                 .attr('selected',true)
                 .text(value.name));
             }else{
             $('#editgroup')
                 .append($("<option></option>")
                 .attr("value",value.id)
                 .text(value.name));
             }
        });
   });
   });
}

//Add new Member
    
    $("#addmember").on('submit',(function(e) {
        $('#exampleModal').modal('hide');
//        swal('Saving...');
//        swal.showLoading();
    //prevent Default functionality
        e.preventDefault();
//     var formObj = {};
//    formObj.image=$('#image').val();
//        var inputs = $('#addmember').serializeArray();
//        $.each(inputs, function (i, input) {
//            formObj[input.name] = input.value;
//        });
//    formData= JSON.stringify(formObj);
//    console.log(new FormData(this));
//    console.log($('#editcountry').val())
    //do your own request an handle the results
    $.ajax({ 
            url: BASE_URL+'/members/add',
            type: "POST",
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'json',
            async: false,
            data: new FormData(this),
            success: function(response){
                if(response.code == 0 ){
                    $('#addmember').trigger('reset');
                     swal({
                      title: "Success",
                      text: response.message,
                      type: "success",
                      confirmButtonClass: "btn-success",
                    confirmButtonText: "ok",
                    });
                }else{
                    swal({
                      title: response.message,
                      text: '',
                      type: "error",
                      confirmButtonClass: "btn-danger",
                    confirmButtonText: "ok",
                    });
                }
            }
        });
    }));