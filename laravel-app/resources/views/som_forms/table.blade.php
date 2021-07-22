<div class="table-responsive" style="padding: 10px;">
    <table class="table table-bordered data-table" id="somForms-table">
        <thead>
            <tr>
                <th><input id="select_all" value="1" type="checkbox"></th>
                <th>Name</th>
                <th>Active</th>
                <th>Som Phases Milestones Id</th>
                <th>Order Form</th>
                <th>Som Milestones Forms Types Id</th>
                <th>Som Status Id</th>
                <th>Is Inactive</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</div>

<!-- ============================== delete modal ================================== -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span>Delete Item</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteModalBody">
                <div>
                    {!! Form::open(['route' => ['somForms.destroy', '0'], 'id'=>'delete_form', 'method' => 'delete']) !!}
                    <div class="form-group row">
                        <div class="col-md-12">
                            <span>Are you sure?</span>                            
                        </div>
                    </div>                    
                    <div class="form-group col-sm-12" style="display: grid;justify-content: end;">
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function openDeleteModal(id){
    $("#delete_form").attr("action","/somForms/"+id);
    $('#deleteModal').modal("show");
}

$(function () { 
    
    var table = $('.data-table').DataTable({
        processing: false,
        serverSide: false,
        ajax: "{{ route('somForms.index', ['milestones_id'=>$milestones_id]) }}",
        sDom : "<'row'<'col-md-1'<'toolbar'>><'col-md-11 btn-group data-table-entries'fl>r> t <'row'<'col-md-6'i><'col-md-6'p>>",
        language : {
            sLengthMenu: "_MENU_",
            search: "",
            searchPlaceholder: "Search" 
        },
        columns: [   
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false, sWidth: '5%'}, 
            {data: 'name', name: 'name', orderable: true, searchable: true},
            {data: 'active', name: 'active', orderable: true, searchable: true},
            {data: 'som_phases_milestones_id', name: 'som_phases_milestones_id', orderable: true, searchable: true},
            {data: 'order_form', name: 'order_form', orderable: true, searchable: true},
            {data: 'som_milestones_forms_types_id', name: 'som_milestones_forms_types_id', orderable: true, searchable: true},
            {data: 'som_status_id', name: 'som_status_id', orderable: true, searchable: true},
            {data: 'is_inactive', name: 'is_inactive', orderable: true, searchable: true},            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    }); 

    var select_html = '<div class="dropdown">';  
    select_html += '<button type="button" class="btn btn-back dropdown-toggle" data-toggle="dropdown">';  
    select_html += '<i class="fa fa-check-square"></i> Bulk Actions';  
    select_html += '</button>';  
    select_html += '<div class="dropdown-menu">';  
    select_html += '<a class="dropdown-item" onclick="deleteSelectedRow()" style="cursor:pointer;">Delete All</a>';   
    select_html += '</div>';  
    select_html += '</div>'; 

    $("div.toolbar").html(select_html);     
});

function deleteSelectedRow(){
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('id'));
    });  

    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {
        var check = confirm("Are you sure you want to delete this row?");  
        if(check == true){
            var join_selected_values = allVals.join(","); 
            $.ajax({
                url: '{{ url('somFormsDeleteAll') }}',
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: 'ids='+join_selected_values,
                success: function (data) {
                    if (data['success']) {
                        $(".sub_chk:checked").each(function() {  
                            $(this).parents("tr").remove();
                        });
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Something went wrong!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
        }  
    }
}

$(document).ready(function () {
    $('#select_all').on('click', function(e) {
        if($(this).is(':checked',true)){
            $(".sub_chk").prop('checked', true);  
        } else {  
            $(".sub_chk").prop('checked',false);  
        }  
    });    
});
</script>
