$(document).ready(function () {
    let previousData = null;

    // Initialize DataTable with AJAX
    const table = $('#example').DataTable({
        ajax: {
            url: userListUrl,
            type: "GET",
            cache: false,
            dataSrc: 'data'
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
                className: 'text-center'
            },

            { 
                data: 'name',
                className: 'text-center'
            },
            {
                data: 'email', // Fixed typo: was 'subscription: "id"'
                className: 'text-center'
            },
            {
                // Plan name from subscription[0].method.method
                data: null,
                render: function(data, type, row) {
                    if (row.subscription && row.subscription[0] && row.subscription[0].method && row.subscription[0].method.method) {
                        return row.subscription[0].method.method;
                    }
                    return '';
                },
                className: 'text-center'
            },
           
            {
                data: 'mobile',
                className: 'text-center'
            },
          
            {
                data: null,
                render: function (data, type, row) {
                    return `<button class="btn btn-info btn-circle-wrapper" 
                              data-bs-toggle="modal"
                                    data-bs-target="#add-item-model"
                                onclick="editMethod(${row.id} , '${row.name}', '${row.username}','${row.email}', '${row.mobile}', ${row.subscription && row.subscription.length > 0 ? row.subscription[0].method.id : 'null'}, '${row.country_code}')"
                                title="Edit Method">
                                <span class="btn-circle-inner">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </button>

                            <button class="btn btn-danger btn-circle-wrapper" 
                                onclick="deleteMethod(${row.id})"
                                title="Delete Method">
                                <span class="btn-circle-inner">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </button>`;
                },
                className: 'text-center'
            }
        ],
        dom: '<"card p-3 mb-3"<"row"<"col-12"B>><"row mt-3"<"col-md-6"l><"col-md-6"f>>>' +
             '<"card"<"table-responsive"tr>>' +
             '<"card p-3"<"row"<"col-md-5"i><"col-md-7"p>>>',
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        pageLength: 10,
        buttons: [
            {
                extend: 'collection',
                text: '<i class="fas fa-filter"></i> Filter',
                className: 'btn btn-secondary btn-sm me-2',
                buttons: [
                    {
                        text: 'Active',
                        action: function () {
                            table.search('active').draw();
                        }
                    },
                    {
                        text: 'Inactive',
                        action: function () {
                            table.search('inactive').draw();
                        }
                    },
                    {
                        text: 'Clear Filter',
                        action: function () {
                            table.search('').draw();
                        }
                    }
                ]
            },
            {
                extend: 'collection',
                text: '<i class="fas fa-download"></i> Export',
                className: 'btn btn-primary btn-sm me-2',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1] }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1] }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'dropdown-item',
                        exportOptions: { columns: [0, 1] }
                    }
                ]
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-info btn-sm me-2',
                exportOptions: { columns: [0, 1] }
            },
            {
                text: '<i class="fas fa-sync-alt"></i> Refresh',
                className: 'btn btn-success btn-sm',
                action: function () {
                    table.ajax.reload(null, false);
                }
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "_MENU_ per page",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>'
            }
        },
        processing: true,
        serverSide: false,
        pagingType: "full_numbers"
    });

    // Add custom CSS
    $("<style>")
        .prop("type", "text/css")
        .html(`
            .card {
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,.08);
            }
            
            .table {
                margin-bottom: 0;
            }
            
            .table thead th {
                background-color: #f8f9fa;
                border-bottom: 2px solid #dee2e6;
                font-weight: 600;
            }
            
            .table td, .table th {
                padding: 1rem;
                vertical-align: middle;
            }
            
            .dataTables_wrapper .dataTables_filter input {
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 5px 10px;
                margin-left: 8px;
            }
            
            .dataTables_wrapper .dataTables_length select {
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 5px 10px;
                margin: 0 5px;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0.375rem 0.75rem;
                margin: 0 2px;
                border: 1px solid #dee2e6;
                border-radius: 4px;
                background: white;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background: #007bff;
                border-color: #007bff;
                color: white !important;
            }
            
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
                background: #e9ecef;
                border-color: #dee2e6;
                color: #0056b3 !important;
            }
            
            .dropdown-item {
                cursor: pointer;
                padding: 0.5rem 1rem;
            }
            
            .dropdown-item:hover {
                background-color: #f8f9fa;
            }
            
            .btn-circle-wrapper {
                width: 32px;
                height: 32px;
                padding: 0;
                border-radius: 50%;
                line-height: 32px;
                text-align: center;
            }
            
            .dt-buttons .btn i {
                margin-right: 5px;
            }
        `)
        .appendTo("head");

    // Function to check and update data
    function checkAndUpdateData() {
        $.ajax({
            url: methodListUrl,
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (!response || !response.data) return;
                
                const currentData = JSON.stringify(response.data);
                if (previousData !== currentData) {
                    previousData = currentData;
                    table.ajax.reload(null, false);
                    $('.dt-processing').hide();
                }
            }
        });
    }

  
    setInterval(checkAndUpdateData, 1000);

    
    $(window).on('unload', function() {
        if (table) {
            table.destroy();
        }
    });
});


const loaderHtml = `
    <div id="custom-loader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999;">
         <div id="spinner-loader" style=" width:100%; height:100%; 
        background: rgba(255,255,255,0.8); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%);">
            <div class="spinner-border text-primary" role="status" style="width:3rem; height:3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    </div>
`;
// Add success styles
const successStyles = `
<style>
    .elegant-success {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        background: #ffffff;
        border-left: 4px solid #4CAF50;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 15px 25px;
        border-radius: 4px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
    }
    
    .elegant-success .success-content {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .elegant-success .success-icon {
        color: #4CAF50;
        font-size: 20px;
    }
    
    .elegant-success .success-message {
        color: #333;
        font-size: 14px;
        font-weight: 500;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
</style>
`;
const sucessHtml = `
  
 <div class="elegant-success" id="elegant-success">
        <div class="success-content">
            <i class="fas fa-check-circle success-icon"></i>
            <span class="success-message">Successfully saved!</span>
        </div>
    </div>

`;

const sucessHtmlDelete = `
  
 <div class="elegant-success" id="elegant-success-delete">
        <div class="success-content">
            <i class="fas fa-check-circle success-icon"></i>
            <span class="success-message">Successfully deleted!</span>
        </div>
    </div>

`;
$('head').append(successStyles);
$('body').append(loaderHtml);
/* create method */
$(document).ready(function () {
    $('#add-user-form').on('submit', function(e) {
        e.preventDefault();
        
        $('.error-text').text('');
        let formData = new FormData(this);

        $.ajax({
            url: $(this).data('url'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#custom-loader').show();
            }, 
            success: function(response) {
                $('#custom-loader').hide();
                if(response.success) {
                    $('#add-user-form')[0].reset();
                    $('#add-item-model').modal('hide');
                    $('body').append(sucessHtml);
                    $('#elegant-success').show();
                    setTimeout(() => {
                        $('#elegant-success').hide();
                    }, 1800);
                    $('#example').DataTable().ajax.reload();
                }
            },
            error: function(xhr) {
                $('#custom-loader').hide();
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $(`.${key}_error`).text(errors[key][0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again.'
                    });
                }
            }
        });
    });
});

// Clear errors when modal is hidden
$('#add-item-model').on('hidden.bs.modal', function () {
    $('.error-text').text('');
    $('#add-method-form')[0].reset();
    const wrapper = document.getElementById('fileInputWrapper');
    if (wrapper) {
        wrapper.innerHTML = `
            <div class="input-group">
                <input type="file" class="form-control" id="methodIcon" name="methodIcon">
                <button class="btn btn-outline-secondary" type="button" id="clearFile">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <small class="text-muted">No file selected</small>
        `;
    }
});

// Clear field-specific error when user starts typing/changing input
$('#add-method-form input, #add-method-form textarea').on('input change', function() {
    $(`.${this.name}_error`).text('');
});

/* delete method */

function deleteMethod(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            const row = $(`button[onclick="deleteMethod(${id})"]`).closest('tr');
            
            row.addClass('deleting');

            setTimeout(() => {
                $.ajax({
                    url: `/supperadmin/user-delete/${id}`,
                    method: "get",
                    dataType: "json",
                    beforeSend: function() {
                        $('body').append(loaderHtml);
                        $('#custom-loader').show();
                    },  
                    success: function (response) {
                        $('#custom-loader').hide();
                        $('body').append(sucessHtmlDelete);
                        $('#elegant-success-delete').show();
                        setTimeout(() => {
                            $('#elegant-success-delete').hide();
                        }, 1800);
                        $('#example').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        $('#custom-loader').hide();
                        console.error('Error:', error);
                        row.removeClass('deleting');
                        Swal.fire(
                            'Error!',
                            'Failed to delete method. Please try again.',
                            'error'
                        );
                    }
                });
            }, 800);
        }
    });
}

/* edit method */

async function editMethod(id, name, username, email, mobile, planId, countryCode) {
    $('#id').val(id);
    $('#name').val(name);
    $('#username').val(username);
    $('input[name="email"]').val(email);
    $('input[name="mobile"]').val(mobile);
    $('select[name="plan"]').val(planId).selectpicker('refresh');
    $('select[name="country_code"]').val(countryCode).selectpicker('refresh');
}

function deselect() {
    document.getElementById('add-user-form').reset();
    $('#id').val(0);
}

// Add this at the beginning of your file
