
        $('#createForm').on('submit',function (e) {   
            e.preventDefault();

                $.ajax({
                        type: "post",
                        url: base + '/addprod_magasin',
                        data: $('#createForm').serialize() ,
                        dataType: 'json',
                        async: true,
                        success:suc(),
                        error: alert('erreur'),
                });

                function suc() {
                
                    alert('Succeeded');
                    //location.reload();
                    //$('#CreateModal').modal('hide');
                   
               
           
              }
           
        });



 
             


