$('document').ready(function(){
    $('#editProjectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $.ajax({
            url: '/projects/' + id + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var detail = data;

                $('#clientNameEdit').val(detail.client_name);
                $('#projectTitleEdit').val(detail.project_title);
                document.querySelector('#taskTypeEdit option[value="' + detail.task_type + '"]').selected = true;
                $('#stackEdit').val(detail.stack);
                $('#projectDescriptionEdit').val(detail.project_description);
                $('#assignedToEdit').val(detail.assigned_to);
                $('#deadlineEdit').val(detail.deadline);
                $('#priceEdit').val(detail.price);
                document.querySelector('#progressEdit option[value="' + detail.progress + '"]').selected = true;
                document.querySelector('#adminEdit option[value="' + detail.admin + '"]').selected = true;
                
            }
        });
        var form  = document.querySelector('#editForm');
        form.action = '/projects/' + id;
      

        

    }); 
});