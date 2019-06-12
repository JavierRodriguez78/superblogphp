var deleteModal = $('#deleteModal');



function deleteMsg(blog, id){
    $(this).click(function(event){
        event.preventDefault();
    });

    deleteModal.modal('show');
    $('.modal-body').text(blog);
    $('.modal-footer .btn-danger').attr("id",id);
}

function confirmDelete(){
    alert("pulsado");
   
        var id = $(this).attr("id");
        console.log(id);
        $(this).onclick="location.href='/delete-post/"+id+"'";

    }

