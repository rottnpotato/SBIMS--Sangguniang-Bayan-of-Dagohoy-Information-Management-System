@extends('layouts.apps')
@section('content')


<style>
   .modal-header{
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        color: #fff;
    }
   /* Fix layout issues */
.tabcontent {
    padding: 20px;
    max-width: 100%;
    overflow-x: hidden;
}

.card {
    margin-bottom: 1rem;
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
}

.card-header {
    background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
    padding: 0.75rem 1.25rem;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* Fix table layout */
.session_history_table {
    width: 100% !important;
    margin: 0 !important;
}

.session_history_table thead th {
    vertical-align: middle;
    white-space: nowrap;
}

/* Fix filter section */
.form-group label {
    margin-bottom: 0.5rem;
}

/* Responsive fixes */
@media (max-width: 768px) {
    .tabcontent {
        padding: 10px;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>
<input type="hidden" id="current_user" data-id="{{ session('user.id') }}" data-type="{{ session('user.type') }}">
<div class="col-sm-12 text-left">
   <h1 class="border-bottom border-bot pt-3">Account</h1>
</div>

<div class="main-wrapper col-sm-12 text-left h-100 pr-0 pl-0">
   <div class="col-sm-12 pl-0 pr-0 search-bars">
      <div class="tab-nav">
         <button class="tablinks active" onclick="schedules(event, 'schedule')">Account Setting</button>
         <button class="tablinks" id="tablink-create-account" onclick="schedules(event, 'create')">Create Account</button>
         @if(session('user.type') == 'Admin')
         <button class="tablinks" id="tablink-manage-account" onclick="schedules(event, 'manage')">Manage Account</button>
         <button class="tablinks" id="tablink-session-history" onclick="schedules(event, 'session')">Session History</button>
         <button class="tablinks" id="tablink-pending-accounts" onclick="schedules(event, 'pending')">Pending Accounts</button>
         @endif
      </div>

         {{-- - Account Setting Tablink - --}}
         <div id="schedule" class="tabcontent">

            <div class="col-sm-12 pt-2">
                <!-----
                  START HERE
                  --->
                <h2 class="">My Account</h2>
                  <div class="container rounded-lg bg-dark col-8 p-3 m-3" style="margin-left:100px">
                     <h3 class="text-white">Customize information</h3>
                     <div class="containder  p-2">

                        {{-- Firstname --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col">
                              <p class="m-0"><b>FIRST NAME</b></p>
                              <p class="m-0" id="account_firstname">Account Firstname</p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="firstname_edit">Edit</button>
                           </div>
                        </div>

                        {{-- Lastname --}}
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col">
                              <p class="m-0"><b>LAST NAME</b></p>
                              <p class="m-0" id="account_lastname">Account Lastname</p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="lastname_edit">Edit</button>
                           </div>
                        </div>
                        {{-- email --}}
                           <div class="row rounded-lg bg-white p-3 m-2">
                              <div class="col">
                                 <p class="m-0"><b>Username</b></p>
                                 <p class="m-0" id="account_email">Account Username</p>
                              </div>
                              <div class="col align-self-center">
                                 <button class="btn btn-dark float-right" id="email_edit">Edit</button>
                              </div>
                        </div>
            
                        <div class="row rounded-lg bg-white p-3 m-2">
                           <div class="col align-self-center">
                              <p class="m-0"><b>PASSWORD</b></p>
                           </div>
                           <div class="col align-self-center">
                              <button class="btn btn-dark float-right" id="password_edit">Change Pasword</button>
                           </div>
                     </div>
                  </div>
                </div>
                  <!-----
                     END HERE
                     --->
          </div>

            {{-- - Account Setting Tablink Modal - --}}
            <div class="container">


               <div class="modal fade " id="account_settings_modal" role="dialog">
                  <div class="modal-dialog modal-lg ">
                     <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                           <h4 class="modal-title ">Change Account Settings</h4>
                           <button type="button" class="close text-white" data-dismiss="modal" >&times;</button>
                        </div>
                        <div class="modal-body">
                           <form id="account_settings_form" name="account_settings_form" class="form-horizontal m-2">
                              {{-- hidden var --}}
                              <input type="text" name="current_id" id="current_id" hidden>
                              <input type="text" name="table_edit" id="table_edit" hidden>

                              {{-- Label 1 --}}
                              <div class="form-group row p-2">
                                 <label for="new_input_modal" id="modal_label1"  class="font-weight-bold">Label1</label>
                                 <div class="col-sm-12">
                                    <input type="text" class="form-control font-weight-bold" id="new_input_modal" name="new_input_modal">
                                    <span class="text-danger error_text new_input_modal_error new_input_email_modal_error new_input_username_modal_error"></span>
                                 </div>
                              </div>

                              {{-- Label 3 // this only show when password is being change --}}
                              <div class="form-group row p-2" id="password_edit_modal">
                                 <label for="current_password_modal_confirmation" id="modal_label2" class="font-weight-bold">CONFIRM NEW PASSWORD</label>
                                 <div class="col-sm-12">
                                    <input type="password" id="current_password_modal_confirmation" name="current_password_modal" placeholder="Confirm New Password" class="form-control ">
                                    <span class="text-danger error_text current_password_modal_confirmation_error"></span>
                                 </div>
                              </div>

                              {{-- Label 2 --}}
                              <div class="form-group row p-2">
                                 <label for="current_password_modal" id="modal_label2" class="font-weight-bold">CURRENT PASSWORD</label>
                                 <div class="col-sm-12">
                                    <input type="password" id="current_password_modal" name="current_password_modal" placeholder="Enter Password to save changes" class="form-control ">
                                    <span class="text-danger error_text current_password_modal_error"></span>
                                 </div>
                              </div>


                              <div class="form-group">
                                 <button type="submit" class="btn btn-primary float-right" id="saveBtn" value="create" >Save changes
                                 </button>
                              </div>
                           </form>

                   </div>
                 </div>
               </div>
             </div>
            </div>
         </div>
      <br>

               {{-- - Create Account Tablink - --}}

               <!-- Create Account Tablink -->
      <div id="create" class="tabcontent">
         <div class="row">
            <div class="col-md-12 order-md-1 d-flex justify-content-center pt-4">
               <form class="needs-validation" novalidate="" id="create_account_form">
                  <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="create_account_form_type">Select user type:</label>
                        <select class="form-control" id="create_account_form_type" name="create_account_form_type">
                           <option>Encoder</option>
                           <option>Admin</option>
                           <option>Secretary</option>
                           <option>Clerk</option>
                           <option>SBMember</option>
                        </select>
                     </div>
                  </div>
      
                  <div id="sb_member_selection" style="display: none;">
                     <div class="mb-3">
                        <label for="sb_member_id">Select SB Member:</label>
                        <select class="form-control" id="sb_member_id" name="sb_member_id">
                           <!-- Options will be populated dynamically -->
                        </select>
                     </div>
                  </div>

                  <div id="manual_input_fields">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label for="create_account_form_firstname">First name</label>
                           <input type="text" class="form-control" name="create_account_form_firstname" id="create_account_form_firstname" placeholder="Enter First Name" value="">
                           <span class="text-danger error_text create_account_form_firstname_error"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="create_account_form_lastname">Last name</label>
                           <input type="text" class="form-control" name="create_account_form_lastname" id="create_account_form_lastname" placeholder="Enter Last Name" value="">
                           <span class="text-danger error_text create_account_form_lastname_error"></span>
                        </div>
                     </div>
                  </div>

                  <div class="mb-3">
                     <label for="create_account_form_email">Username</label>
                     <input type="email" class="form-control" name="create_account_form_email" id="create_account_form_email" placeholder="you@example.com">
                     <span class="text-danger error_text create_account_form_email_error"></span>
                  </div>
                  <div class="row">
                  <div class="col-md-6 mb-3">
                     <label for="create_account_form_password">Password</label>
                     <input type="password" class="form-control" name="create_account_form_password" id="create_account_form_password" placeholder="Enter password">
                     <span class="text-danger error_text create_account_form_password_error"></span>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="create_account_form_verify_password">Verify Password</label>
                     <input type="password" class="form-control" name="create_account_form_verify_password" id="create_account_form_verify_password" placeholder="Verify password">
                     <span class="text-danger error_text create_account_form_verify_password_error"></span>
                  </div>
                  </div>

                  <hr class="mb-4">
                  <div class="text-center button-center d-flex justify-content-center gap-3">
                     
                     <button id="submitBtn" class="btn btn-success col-sm-3 text-center center-block" type="submit">Submit</button>
                     <button id="resetBtn" class="btn btn-primary col-sm-3 text-center center-block" type="reset">Reset</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      @if(session('user.type') == 'Admin')
            {{-- - Manage Account Tablink - --}}
            <div id="manage" class="tabcontent">
               <div class="row ">
                  <div class="col-sm-12 pl-3 ">
                     <form id="manage_account_form">
                        <div class="row">
                           <div class="col-sm-6">
                              <input type="hidden" name="id" id="manage_account_id" value="" >
                              
                              {{-- New Password --}}
                              <div class="form-group row">
                                 <label for="manage_account_new_password" class="col-sm-3 col-form-label">New Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_account_new_password" class="form-control" id="manage_account_new_password" placeholder="Enter New Password" value="">
                                    <span class="text-danger error_text manage_account_new_password_error"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              {{-- Confirm Password --}}
                              <div class="form-group row">
                                 <label for="manage_account_confirm_password" class="col-sm-3 col-form-label">Confirm New Password</label>
                                 <div class="col-sm-9">
                                    <input type="password" name="manage_account_confirm_password" class="form-control" id="manage_account_confirm_password" placeholder="Confirm Password" value="">
                                    <span class="text-danger error_text manage_account_confirm_password_error"></span>
                                 </div>
                              </div>
                              
                              <div class="col-sm-12 pl-0 pr-0  ">
                                 <div class="form-group text-right ">
                                    <button type="submit" id="changepasswordBtn"class="btn btn-success account-button " disabled><b>Change Password</b></button>
                                    
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                     </form>
                     <div class="border-buttom border-bot pl-3 pr-3">
                     </div>
                     
                     
                     <div class="col-sm-12 overflow-auto  pt-2">
                        
                        
                        
                        <table id="manage-account-table" class="bulk_action dataTables_info table resident-table datatable-element resident table-striped jambo_table bulk_action text-center border dataTable no-footer" >
                           <thead>
                              <tr class="headings">
                                 <th class="column-title">Action</th>
                                 <th class="column-title" hidden>Id</th>
                                 <th class="column-title">First Name</th>
                                 <th class="column-title">Last Name </th>
                                 <th class="column-title">Username</th>
                                 <th class="column-title">Type</th>
                                 
                                 
                              </tr>
                           </thead>
                           <tbody>
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

        
{{-- - Session History Tablink - --}}
<div id="session" class="tabcontent">
    <div class="container-fluid px-0">
        <!-- Filter Section -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="text-white mb-0">Session Filters</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-3 mb-2">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">Start Date:</label>
                                    <input type="date" class="form-control" id="session_start_date">
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">End Date:</label>
                                    <input type="date" class="form-control" id="session_end_date">
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group mb-0">
                                    <label class="font-weight-bold">User Type:</label>
                                    <select class="form-control" id="session_user_type">
                                        <option value="">All Users</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Secretary">Secretary</option>
                                        <option value="SBMember">SB Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group mb-0">
                                    <button id="applySessionFilters" class="btn btn-primary mr-2">
                                        <i class="fa fa-filter"></i> Apply
                                    </button>
                                    <button id="resetSessionFilters" class="btn btn-secondary">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered session_history_table w-100">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th hidden>Session ID</th>
                                        <th hidden>User ID</th>
                                        <th>Username</th>
                                        <th>User Type</th>
                                        <th>Login At</th>
                                        <th>Logged Out At</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         <!-- Pending Accounts Tablink (for Admin) -->
      <div id="pending" class="tabcontent">
         <h3>Pending Accounts</h3>
         <div class="row">
            <div class="col-sm-12">
               <div class="col-sm-12 overflow-auto pt-3 ">
                     <table id="pending-accounts-table" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Type</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Pending accounts will be populated here -->
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endif


         </div>
      </div>
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
       var button = document.querySelector('.tablinks.active');
       if (button) {
        button.click();
        
        // If you need to pass an event object to the schedules function
        var event = new Event('click');
        schedules(event, 'schedule');
          }
          var user_type = $("#current_user").data("type");

            var isFirstname = false;
            showUserInfo(current_id);
            
            //Hide Navlink
            if(user_type !== "Admin"&& user_type!=="Secretary"){
            $("#tablink-create-account").hide();
            $("#tablink-manage-account").hide();
            $("#tablink-session-history").hide();
            }
      });

      function showToast(message, type = 'success') {
         toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
         }
         toastr[type](message);
      }
         $(function() {
            

            //Global varibles
            var current_id = $("#current_user").data("id");
            var user_type = $("#current_user").data("type");

            var isFirstname = false;
            showUserInfo(current_id);
            
            //Hide Navlink
            if(user_type !== "Admin"&& user_type!=="Secretary"){
            $("#tablink-create-account").hide();
            $("#tablink-manage-account").hide();
            $("#tablink-session-history").hide();
            }


            $('#create_account_form_type').change(function() {
               if ($(this).val() == 'SBMember') {
                     $('#sb_member_selection').show();
                     $('#manual_input_fields').hide();
                     loadSBMembers();
               } else {
                     $('#sb_member_selection').hide();
                     $('#manual_input_fields').show();
               }
            });
            

            function loadSBMembers() {
               $.ajax({
                  url: '/get-sb-members',
                  type: 'GET',
                  success: function(data) {
                     var select = $('#sb_member_id');
                     select.empty();
                     select.append('<option value="">Select SB Member</option>');
                     $.each(data, function(key, value) {
                        select.append('<option value="' + value.id + '" data-firstname="' + value.first_name + '" data-lastname="' + value.last_name + '">' + value.first_name + ' ' + value.last_name + '</option>');
                     });
                  }
               });
            }
            $('#sb_member_id').change(function() {
               var selectedOption = $(this).find('option:selected');
               $('#create_account_form_firstname').val(selectedOption.data('firstname'));
               $('#create_account_form_lastname').val(selectedOption.data('lastname'));
            });

            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });

            //Table on Manage Account
            var table = $("#manage-account-table").DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('account.index') }}",
               columns: [
               {data: 'action', name: 'action', orderable: false, searchable: true},
               {data: 'account_id', name: 'account_id', visible:false , searchable: false},
               {data: 'first_name', name: 'manage_account_form_firstname', orderable: false, searchable: true},
               {data: 'last_name', name: 'manage_account_form_lastname', orderable: false, searchable: true},
               {data: 'email', name: 'manage_account_form_email', orderable: false, searchable: true},
               {data: 'type', name: 'manage_account_form_type', orderable: false, searchable: true},
               ]

            });

               //Table on Manage Resident Account
               var table = $("#manage-resident-account-table").DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('ResidentAccountTable') }}",
               columns: [
               {data: 'action', name: 'action', orderable: false, searchable: true},
               {data: 'resident_account_id', name: 'resident_account_id', visible:false , searchable: false},
               {data: 'first_name', name: 'manage_resident_account_form_firstname', orderable: false, searchable: true},
               {data: 'last_name', name: 'manage_resident_account_form_lastname', orderable: false, searchable: true},
               {data: 'email', name: 'manage_resident_account_form_email', orderable: false, searchable: true},
               ]

            });

            /*   //Table on sessionTable
               var sessionTable = $(".session_history_table").DataTable({
               processing: true,
               dom: 'lrtip',
               serverSide: true,
               ajax: "/setting/account/session/table",
               columns: [
               {data: 'session_id', name: 'session_id', visible:false},
               {data: 'user_id', name: 'user_id', visible:false},
               {data: 'email', name: 'email',  orderable: false},
               {data: 'user_type', name: 'user_type',  orderable: true},
               {data: 'login_at', name: 'login_at', orderable: true},
               {data: 'logged_out_at', name: 'logged_out_at', orderable: true},
               ]

            });*/

// Session History Table
var sessionTable = $(".session_history_table").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: "/setting/account/session/table",
        data: function(d) {
            // Include date filters only if both dates are selected
            if ($('#session_start_date').val() && $('#session_end_date').val()) {
                d.start_date = $('#session_start_date').val();
                d.end_date = $('#session_end_date').val();
            }
            // Always include user type filter
            d.user_type = $('#session_user_type').val();
        }
    },
    columns: [
        {data: 'session_id', name: 'session_id', visible: false},
        {data: 'user_id', name: 'user_id', visible: false},
        {data: 'email', name: 'email', orderable: false, className: 'align-middle'},
        {data: 'user_type', name: 'user_type', orderable: true, className: 'align-middle'},
        {data: 'login_at', name: 'login_at', orderable: true, className: 'align-middle'},
        {data: 'logged_out_at', name: 'logged_out_at', orderable: true, className: 'align-middle'}
    ],
    order: [[4, 'desc']],
    language: {
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
        emptyTable: "No session history found",
        zeroRecords: "No matching records found"
    }
});

// Apply filters button click
$('#applySessionFilters').on('click', function() {
    // Check if both dates are filled or neither is filled
    const startDate = $('#session_start_date').val();
    const endDate = $('#session_end_date').val();
    
    if ((startDate && !endDate) || (!startDate && endDate)) {
        showToast('Please select both start and end dates or clear both', 'error');
        return;
    }
    
    sessionTable.draw();
});

// Reset filters
$('#resetSessionFilters').on('click', function() {
    $('#session_start_date').val('');
    $('#session_end_date').val('');
    $('#session_user_type').val('');
    sessionTable.draw();
});

// Date validation
$('#session_start_date, #session_end_date').on('change', function() {
    const startDate = $('#session_start_date').val();
    const endDate = $('#session_end_date').val();
    
    if (startDate && endDate) {
        if (startDate > endDate) {
            showToast('Start date cannot be later than end date', 'error');
            $(this).val('');
        }
    }
});

// Enable individual user type filtering
$('#session_user_type').on('change', function() {
    sessionTable.draw(); // Immediately apply user type filter when changed
});


            //Select Button
            $('body').on('click', '#selectBtn', function () {
               var id = $(this).data('id');
               var username = $(this).data('username');
               $("#changepasswordBtn").removeAttr("disabled");

               $("#manage_account_id").val(id);

               $("#manage_account_username").val(username);
            });

            //Resident Select Button
            $('body').on('click', '#residentSelectBtn', function () {
               var id = $(this).data('id');
               var username = $(this).data('username');
               $("#resident_changepasswordBtn").removeAttr("disabled");

               $("#manage_resident_account_id").val(id);

               $("#manage_resident_account_username").val(username);
            });

            //Edit
           // Modify the manage account form submission
    $('#manage_account_form').on('submit', function(e) {
        e.preventDefault();
        var id = $("#manage_account_id").val();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change the password?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "PATCH",
                    url: "{{ route('account.index') }}" + '/' + id,
                    data: $('#manage_account_form').serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $(document).find('span.error_text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + "_error").text(val[0]);
                            });
                        } else {
                            $("#manage_account_form")[0].reset();
                            $("#changepasswordBtn").attr("disabled", true);
                            showToast(data.msg, 'success');
                            table.draw();
                        }
                    }
                });
            }
        });
    });

           

            
       // Modify the delete function
    $('body').on('click', '#deleteBtn', function() {
        var id = $(this).data("id");

        if (id == $("#current_user").data('id')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You cannot delete your own account!'
            });
        } else {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('account.index') }}" + '/' + id,
                        success: function(data) {
                            table.draw();
                            sessionTable.draw();
                            showToast(data.success, 'success');
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            showToast('An error occurred while deleting the account.', 'error');
                        }
                    });
                }
            });
        }
    });


             // Create Account Form Submission
             $("#create_account_form").on('submit', function(e) {
                  e.preventDefault();
                  $.ajax({
                        type: "POST",
                        url: "{{ route('account.store') }}",
                        data: new FormData(this),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                           $(document).find('span.error_text').text('');
                        },
                        success: function(data) {
                           if (data.status == 0) {
                              $.each(data.error, function(prefix, val) {
                                    $('span.' + prefix + "_error").text(val[0]);
                              });
                              showToast('Please correct the errors in the form.', 'error');
                           } else {
                              $("#create_account_form")[0].reset();
                              showToast(data.msg, 'success');
                              if (user_type === 'Secretary') {
                                    showToast("Account creation request sent for admin approval.", 'info');
                              } else {
                                    table.draw();
                              }
                           }
                        }
                  });
               });



                  // Pending Accounts Table (for Admin)
                  if (user_type === 'Admin') {
                        var pendingTable = $("#pending-accounts-table").DataTable({
                           processing: true,
                           serverSide: true,
                           ajax: "/pending-accounts",
                           columns: [
                              {data: 'first_name', name: 'name'},
                              {data: 'email', name: 'email'},
                              {data: 'type', name: 'type'},
                              {data: 'action', name: 'action', orderable: false, searchable: false}
                           ]
                        });

                        $('#pending-accounts-table').on('click', '.approve-btn, .reject-btn', function() {
                              var accountId = $(this).data('id');
                              var action = $(this).hasClass('approve-btn') ? 'approve' : 'reject';
                              
                              Swal.fire({
                                 title: 'Are you sure?',
                                 text: `Do you want to ${action} this account?`,
                                 icon: 'question',
                                 showCancelButton: true,
                                 confirmButtonColor: '#3085d6',
                                 cancelButtonColor: '#d33',
                                 confirmButtonText: `Yes, ${action} it!`
                              }).then((result) => {
                                 if (result.isConfirmed) {
                                    $.ajax({
                                          url: '/approve-reject-account',
                                          type: 'POST',
                                          data: {
                                             id: accountId,
                                             action: action,
                                             _token: '{{ csrf_token() }}'
                                          },
                                          success: function(response) {
                                             showToast(response.message, 'success');
                                             pendingTable.draw();
                                          },
                                          error: function(xhr) {
                                             showToast('An error occurred. Please try again.', 'error');
                                          }
                                    });
                                 }
                              });
                        });
                     }


            //Create Account Reset Button
            $("#resetBtn").click(function (e) {
               $(document).find('span.error_text').text('');

            });

            //Account Setting show info function
            function showUserInfo(id){
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $("#account_firstname").text(data.first_name);
                  $("#account_lastname").text(data.last_name);
                  $("#account_email").text(data.email);
               })
            }

            //Hidding label 3 for Account Setting Modal
            $("#password_edit_modal").hide();

            //On modal close
            $("#account_settings_modal").on("hidden.bs.modal", function () {
               $("#account_settings_form")[0].reset();
               $(document).find('span.error_text').text('');
               $("#password_edit_modal").hide();
               $("#new_input_modal").attr("name","new_input_modal");
               $("#current_password_modal_confirmation").attr("name","current_password_modal");
               $("#new_input_modal").attr("type","text");

               isFirstname = false;
            });

            // Modal for firstname edit
            $('body').on('click', '#firstname_edit', function () {
               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data)
               {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW FIRST NAME");
                  $("#new_input_modal").val(data.first_name);

                  $('#current_id').val(id);
                  $('#table_edit').val("firstname");

                  isFirstname = true;
               })
            });

            // Modal for Lastname edit
            $('body').on('click', '#lastname_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW LAST NAME");
                  $("#new_input_modal").val(data.last_name);

                  $('#current_id').val(id);
                  $('#table_edit').val("lastname");
               })
            });

           
            // Modal for email edit
            $('body').on('click', '#email_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW EMAIL");
                  $("#new_input_modal").val(data.email);

                  $("#new_input_modal").attr("name","new_input_email_modal");

                  $('#current_id').val(id);
                  $('#table_edit').val("email");
               })
            });

           
            $('body').on('click', '#password_edit', function () {

               var id = current_id;
               $.get("{{ route('account.index') }}" +'/' + id +'/edit', function (data) {
                  $('#account_settings_modal').modal('toggle');
                  $("#account_settings_modal").show();

                  $('#modal_label1').text("NEW PASSWORD");
                  $("#new_input_modal").attr("placeholder", "Enter new password");

                  $('#current_id').val(id);
                  $('#table_edit').val("password");


                  $("#new_input_modal").attr("type","password");
                  $("#current_password_modal_confirmation").attr("name","current_password_modal_confirmation");
                  $("#password_edit_modal").show();
               })
           });

         //Modal on submit
         $("#account_settings_form").on('submit', function (e) {
               e.preventDefault();

               $firstname = $("#new_input_modal").val();

               $.ajax({
                  type:"post",
                  url:"{{ route('accountSettingCheck') }}",
                  data: $("#account_settings_form").serialize(),
                  dataType:"json",
                  beforeSend:function(){
                     $(document).find('span.error_text').text('');
                  },
                  success: function (data) {
                     if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                           $('span.'+prefix+"_error").text(val[0]);
                        });
                     }
                     else{
                        $('#account_settings_modal').modal('hide');
                        table.draw();
                        sessionTable.draw();
                        //alert(data.msg);
                        showUserInfo(current_id);
                        $("#account_settings_form")[0].reset();
                        $(document).find('span.error_text').text('');

                        if(isFirstname == true){
                           $('#firstname_topnav').html('Welcome, ' + $firstname)
                        }
                     }
                  }
               });

            });
            $('.modal .close, .modal .btn-secondary').on('click', function() {
             $(this).closest('.modal').modal('hide');
            });

      });

      </script>
      @endsection


</div>