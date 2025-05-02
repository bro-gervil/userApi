
$('#createForm').submit(function (e) { 
    e.preventDefault();
    
    $.ajax({
        type: "post",
        url: "<?php echo base_url('/addprod_magasin');?>",
        data: $('#createForm').serialize(),
        dataType: 'json',
        async:false,
        success: function (response) {
            
            $('#createModal').modal('hide');
            $('#createForm')[0].reset();
        },
        error: function (){
            alert('Error');
        }
    });
});
