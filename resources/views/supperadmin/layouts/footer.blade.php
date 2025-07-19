<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">

    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">€GlobBird</a>
        @php 
        date('Y');
        @endphp
        </p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>

<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->





<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
<script>
  /*   new DataTable('#example', {
        dom: '<"top"<"left"lB><"right"f>>rt<"bottom"<"left"i><"right"p>>',
        buttons: [
            
            {
                extend: 'csv',
                className: 'custom-btn'
            },
            {
                extend: 'excel',
                className: 'custom-btn'
            },
            {
                extend: 'pdf',
                className: 'custom-btn'
            },
            {
                extend: 'print',
                className: 'custom-btn'
            }
        ],
        language: {
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            lengthMenu: "Entries per page _MENU_",
            paginate: {
                first: '«',
                previous: '‹',
                next: '›',
                last: '»'
            }
        }
    }); */
</script>


<script>
    function deleteUser(id) {
        swal({
                title: "Are you sure?",
                text: "Do you want to delete this user?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('store_deleteuser') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        },
                        data: {
                            'id': id
                        },
                        success: function(response) {
                            if (response.success) {
                                swal({
                                    title: "Deleted!",
                                    text: "User deleted successfully",
                                    type: "success",
                                    confirmButtonText: "Done",
                                    confirmButtonColor: "#1dbf73"
                                }, function(isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                });
                            } else {
                                swal("Error!", response.message || "Failed to delete user", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Status:', status);
                            console.error('Error:', error);
                            console.error('Response:', xhr.responseText);
                            
                            let errorMessage = "Failed to delete user";
                            try {
                                const response = JSON.parse(xhr.responseText);
                                errorMessage = response.message || errorMessage;
                            } catch(e) {
                                errorMessage += ": " + error;
                            }
                            
                            swal("Error!", errorMessage, "error");
                        }
                    });
                }
            });
    }
</script>
<style>
    /* Smaller SweetAlert Styles */
    .small-swal {
        font-size: 0.9rem !important;
    }

    .small-swal .swal2-title {
        font-size: 1.1rem !important;
        padding: 0.5em 1em 0 !important;
    }

    .small-swal .swal2-content {
        font-size: 0.9rem !important;
    }

    .small-swal .swal2-icon {
        width: 60px !important;
        height: 60px !important;
        margin: 0.5em auto !important;
    }

    .small-swal .swal2-actions {
        margin: 1em auto 0 !important;
    }

    .small-swal .swal2-confirm,
    .small-swal .swal2-cancel {
        font-size: 0.9rem !important;
        padding: 0.5em 2em !important;
        margin: 0 0.5em !important;
    }

    /* Question icon color */
    .swal2-icon.swal2-question {
        border-color: #87adbd !important;
        color: #87adbd !important;
    }
    

    /* Style for DataTable buttons */
    .dt-button,
    .buttons-html5,
    .buttons-print,
    .custom-btn {
        background-color: #000000 !important;
        color: #ffffff !important;
        border: none !important;
        padding: 5px 15px !important;
        margin: 2px !important;
        border-radius: 4px !important;
    }

    .dt-button:hover,
    .buttons-html5:hover,
    .buttons-print:hover,
    .custom-btn:hover {
        background-color: #333333 !important;
        color: #ffffff !important;
        opacity: 0.9;
    }

    /* Style for the buttons container */
    .dt-buttons {
        display: flex;
        gap: 5px;
        margin-left: 20px;
    }

    /* Container styling */
    .top, .bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
    }

    /* Left side styling */
    .left {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* Right side styling */
    .right {
        display: flex;
        align-items: center;
    }

    /* Pagination styling */
    .dataTables_paginate {
        margin: 0;
        padding-top: 3px;
    }

    .paginate_button {
        padding: 5px 10px;
        margin: 0 2px;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        background-color: #fff;
    }

    .paginate_button.current {
        background-color: #000000 !important;
        color: white !important;
        border-color: #000000 !important;
    }

    .paginate_button:hover {
        background-color: #f0f0f0 !important;
        color: #000000 !important;
    }

    /* Length menu styling */
    .dataTables_length {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .dataTables_length select {
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin: 0 5px;
    }

    /* Button container styling */
    .dt-buttons {
        display: flex;
        gap: 5px;
    }

    /* Button styling */
    .dt-button,
    .buttons-html5,
    .buttons-print,
    .custom-btn {
        background-color: #000000 !important;
        color: #ffffff !important;
        border: none !important;
        padding: 5px 15px !important;
        margin: 2px !important;
        border-radius: 4px !important;
    }

    .dt-button:hover,
    .buttons-html5:hover,
    .buttons-print:hover,
    .custom-btn:hover {
        background-color: #333333 !important;
        color: #ffffff !important;
        opacity: 0.9;
    }

    /* Search styling */
    .dataTables_filter input {
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-left: 5px;
    }

    /* Info text styling */
    .dataTables_info {
        padding-top: 8px;
    }
</style>
<script src="{{asset('admin-assets/vendor/global/global.min.js')}}"></script>
<script src="{{asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="js/dashboard/cms.js"></script>

<!--nestable file-->
<script src="{{asset('admin-assets/vendor/nestable2/js/jquery.nestable.min.js')}}"></script>
<!-- nestable plugins -->
<script src="{{asset('admin-assets/js/plugins-init/nestable-init.js')}}"></script>

<!-- ck-editor -->
<script src="{{asset('admin-assets/vendor/ckeditor/ckeditor.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('admin-assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('admin-assets/js/deznav-init.js')}}"></script>
<script src="{{asset('admin-assets/js/custom.min.js')}}"></script>

<!-- DataTables Core -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>

<!-- Export Buttons Libraries -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<!-- DataTables Style -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>