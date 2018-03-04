
function validate(a)
{
    var id= a.value;
    var name= $('#hapus').attr('data-user');
    swal({
            title: "Apakah Kamu Yakin?",
            text: "Kamu akan Menghapus User dengan Id "+id,
            type: "warning",

            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            closeOnConfirm: false }, function()
        {
            swal("Deleted!", "User Berhasil di Hapus."+id, "success");
            $(location).attr('href','<?php echo base_url()?>user/delete_akun/'+id);
        }
    );
}

 $(document).ready(function(){


function filter(){

   var filter_roles = $('#filter_roles').val();
 var filter_status = $('#filter_status').val();
    $.ajax({
     url: "<?php echo base_url(); ?>user/filter_data_akun",
     method: "POST",
     data: {filter_roles:filter_roles,filter_status:filter_status,},
     success: function(data){
      $('#data-user').html(data);
     }
    });

}
$('#sub_filter').click(function(){

filter();
 });


 });
