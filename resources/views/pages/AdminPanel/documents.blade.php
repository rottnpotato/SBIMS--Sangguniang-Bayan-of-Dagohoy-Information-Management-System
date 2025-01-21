@extends('layouts.apps')

@section('content')
    <style>
        /* Modern color scheme */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f8f9fa;
            --border-color: #dee2e6;
            --text-muted: #6c757d;
        }

        /* Enhanced card styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        /* Enhanced modal styling */
        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1.25rem;
        }

        /* Enhanced table styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 2rem;
            background: white;
            table-layout: fixed;
        }

        .table th {
            background-color: var(--light-bg);
            color: var(--primary-color);
            font-weight: 600;
            padding: 1rem;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
            white-space: nowrap;
        }

        /* Column widths */
        .table th:nth-child(1) {
            width: 10%; /* Title column */
        }
        .table th:nth-child(2) {
            width: 15%; /* Subject Matter column */
        }
        .table th:nth-child(3) {
            width: 10%; /* Type column */
        }
        .table th:nth-child(4), 
        .table th:nth-child(5) {
            width: 12%; /* Author and Co-Author columns */
        }
        .table th:nth-child(6),
        .table th:nth-child(7) {
            width: 8%; /* Date and Year columns */
        }
        .table th:nth-child(8) {
            width: 10%; /* Actions column */
        }

        /* Sort icons */
        .sortable {
            cursor: pointer;
            position: relative;
            padding-right: 25px !important;
        }

        .sortable::after {
            content: '↕';
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            opacity: 0.5;
            transition: opacity 0.2s;
        }

        .sortable:hover::after {
            opacity: 1;
        }

        .sortable.sort-asc::after {
            content: '↑';
            opacity: 1;
        }

        .sortable.sort-desc::after {
            content: '↓';
            opacity: 1;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
            color: var(--secondary-color);
            transition: all 0.2s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 0;
        }

        /* Title cell specific styling */
        .table td:first-child {
            position: relative;
        }

        /* Tooltip for long titles */
        .table td:first-child:hover::after {
            content: attr(title);
            position: absolute;
            left: 0;
            top: 100%;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            padding: 8px 12px;
            z-index: 1000;
            width: max-content;
            max-width: 500px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            white-space: normal;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Expandable row styling */
        .table tr.expanded td {
            white-space: normal;
            max-height: none;
        }

        .table tr.expanded td:first-child {
            white-space: normal;
            overflow: visible;
        }
        /* Enhanced expandable title styles */
.table td.expandable {
    cursor: pointer;
    position: relative;
    padding-right: 25px;
}

.table td.expandable::after {
    content: '⌄';
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.3s;
    font-size: 18px;
    color: var(--text-muted);
}

.table tr.expanded td.expandable::after {
    transform: translateY(-50%) rotate(180deg);
}

.table td.expanded-content {
    white-space: normal;
    word-wrap: break-word;
    max-width: none;
    font-weight: normal;
}
.action-buttons .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    white-space: nowrap;
}
/* Ensure proper spacing in filter inputs */
.filter-section .form-control {
    height: calc(1.5em + 1rem + 2px);
    padding: 0.5rem 1rem;
}
span{
    margin-top: 0.34rem;
}

/* Add subtle transition for title expansion */
.table td {
    transition: all 0.3s ease;
}

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        /* Enhanced button styling */
        .btn {
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--accent-color);
            border: none;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }

        /* Enhanced form controls */
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        /* Enhanced filter section */
        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .filter-section .form-group {
            margin-bottom: 1rem;
        }

        /* Enhanced add document button */
        .add-document-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--accent-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            transition: all 0.3s;
        }

        .add-document-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        /* Enhanced dropdown menu */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 0.5rem;
            min-width: 200px;
            animation: slideIn 0.3s ease-out;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--accent-color);
        }

        /* Enhanced pagination */
        .pagination {
            margin-top: 2rem;
        }

        .page-link {
            border: none;
            color: var(--primary-color);
            margin: 0 3px;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.2s;
        }

        .page-item.active .page-link {
            background-color: var(--accent-color);
            color: white;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }

        /* Enhanced toastr notifications */
        .toast-success {
            background-color: var(--success-color);
        }

        .toast-error {
            background-color: var(--danger-color);
        }

        .toast-warning {
            background-color: var(--warning-color);
        }

        /* Document status indicators */
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-badge.draft {
            background-color: rgba(243, 156, 18, 0.1);
            color: var(--warning-color);
        }

        .status-badge.published {
            background-color: rgba(39, 174, 96, 0.1);
            color: var(--success-color);
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-start;
        }

        /* Enhanced accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Enhanced mobile responsiveness */
        @media (max-width: 768px) {
            .filter-section {
                padding: 1rem;
            }

            .table th, .table td {
                padding: 0.75rem;
            }

            .add-document-btn {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
        }

        /* Print-friendly styles */
        @media print {
            .no-print {
                display: none !important;
            }

            .table {
                border: 1px solid #ddd;
            }

            .table th {
                background-color: #f8f9fa !important;
                color: #000 !important;
            }
        }
    </style>

    <!-- Main Content Container -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Legislative Records Management</h1>
                    <button id="generateReportBtn" class="btn btn-primary">
                        <i class="fas fa-file-pdf mr-2"></i>Generate Report
                    </button>
                </div>

                <!-- Filter Section -->
                <div class="filter-section mb-6">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="searchFilter" class="small text-muted mb-2">Search</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fas fa-search text-muted"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="searchFilter" class="form-control border-left-0" placeholder="Search documents...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="typeFilter" class="small text-muted mb-2">Document Type</label>
                                <select id="typeFilter" class="form-control">
                                    <option value="">All Types</option>
                                    <option value="ordinance">Ordinance</option>
                                    <option value="resolution">Resolution</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="authorFilter" class="small text-muted mb-2">Author</label>
                                <select id="authorFilter" class="form-control">
                                    <option value="">All Authors</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="coAuthorFilter" class="small text-muted mb-2">Co-Author</label>
                                <select id="coAuthorFilter" class="form-control">
                                    <option value="">All Co-Authors</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="dateFilter" class="small text-muted mb-2">Date</label>
                                <input type="text" id="dateFilter" class="form-control" placeholder="YYYY, YYYY-MM, or YYYY-MM-DD">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="documentTable" class="table">
                                <thead>
                                    <tr>
                                        <th class="sortable" data-column="title">Title</th>
                                        <th class="sortable" data-column="subject_matter">Subject Matter</th>
                                        <th class="sortable" data-column="type">Type</th>
                                        <th class="sortable" data-column="author">Author</th>
                                        <th class="sortable" data-column="co_author">Co-Authors</th>
                                        <th class="sortable" data-column="date_published">Date Published</th>
                                        <th class="sortable" data-column="year_in_series">Year</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="documentTableBody">
                                    <!-- Table content will be dynamically inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul id="pagination" class="pagination justify-content-center">
                        <!-- Pagination will be dynamically inserted here -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add Document Button -->
    <div class="dropdown">
        <button id="addDocumentBtn" class="add-document-btn" type="button">
            <i class="fas fa-plus"></i>
        </button>
        <div id="addOptionsDropdown" class="dropdown-menu dropdown-menu-right">
            <h6 class="dropdown-header">Add Document</h6>
            <a id="addSingleDocumentBtn" class="dropdown-item" href="#">
                <i class="fas fa-file-alt mr-2"></i>Single Document
            </a>
            <a id="addBulkDocumentsBtn" class="dropdown-item" href="#">
                <i class="fas fa-files-medical mr-2"></i>Bulk Documents
            </a>
        </div>
    </div>

    <!-- Include all the existing modals (Document Modal, Bulk Document Modal, etc.) -->
        <!-- Generate Report Modal -->
    <div class="modal fade" id="generateReportModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-file-pdf mr-2"></i>Generate Report
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        <div class="form-group">
                            <label class="small text-muted">Start Date</label>
                            <input type="month" id="startDate" name="startDate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="small text-muted">End Date</label>
                            <input type="month" id="endDate" name="endDate" class="form-control" required>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-file-export mr-2"></i>Generate Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Document Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">
                        <i class="fas fa-file-alt mr-2"></i>Add New Document
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="documentForm" name="documentForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="document_id" name="document_id">
                        
                        <!-- Document Details Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Document Details</h6>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Title</label>
                                        <input type="text" id="doc_title" name="doc_title" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Document Type</label>
                                        <select id="doc_type" name="doc_type" class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="ordinance">Ordinance</option>
                                            <option value="resolution">Resolution</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Author Information Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Author Information</h6>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Author</label>
                                        <input type="text" id="doc_author" name="doc_author" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Co-Author</label>
                                        <input type="text" id="doc_co_author" name="doc_co_author" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Content Information</h6>
                                <div class="form-group mb-4">
                                    <label class="small text-muted">Description</label>
                                    <textarea id="doc_description" name="doc_description" rows="4" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="small text-muted">Subject Matter</label>
                                    <textarea id="doc_subject_matter" name="doc_subject_matter" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Publication Details Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Publication Details</h6>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Date Published</label>
                                        <input type="date" id="date_published" name="date_published" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="small text-muted">Year In Series</label>
                                        <input type="text" id="year_in_series" name="year_in_series" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- File Upload Section -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Document File</h6>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="doc_file" name="doc_file" accept="application/pdf" required>
                                    <label class="custom-file-label" for="doc_file">Choose PDF file</label>
                                </div>
                                <small class="form-text text-muted mt-2">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Only PDF files are allowed
                                </small>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-primary px-5">
                                <i class="fas fa-save mr-2"></i>Save Document
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Document Modal -->
    <div class="modal fade" id="bulkDocumentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-files-medical mr-2"></i>Add Multiple Documents
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bulkDocumentForm" name="bulkDocumentForm" enctype="multipart/form-data">
                        @csrf
                        <div id="documentForms" class="document-forms-container">
                            <!-- Document forms will be dynamically added here -->
                        </div>
                        <div class="text-center mt-4">
                            <button type="button" id="addDocumentForm" class="btn btn-secondary mr-2">
                                <i class="fas fa-plus mr-2"></i>Add Another Document
                            </button>
                            <button type="submit" id="saveBulkBtn" class="btn btn-primary px-5">
                                <i class="fas fa-save mr-2"></i>Save All Documents
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Viewer Container -->
    <div id="adobe-dc-view" class="pdf-viewer-container"></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    
    <script>

        // Initialize toastr options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $(function () {
        // ... (previous JavaScript code)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let allDocuments = [];
        let originalDocuments = [];
        let currentPage = 1;
        const itemsPerPage = 10;
        //let currentSort = { column: 'title', direction: 'asc' };
    // Update the loadDocuments function
        function loadDocuments() {
            $.ajax({
                url: "{{ route('documents.list') }}",
                method: 'GET',
                success: function(response) {
                    if (Array.isArray(response)) {
                        allDocuments = response;
                        originalDocuments = response.slice();
                        sortDocuments();
                        displayDocuments();
                        updateFilters();
                    } else {
                        console.log(response);
                        toastr.error("Unexpected response format. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error("Error loading documents. Please try again later.");
                    console.error("Error loading documents:", error);
                }
            });
        }

                    // Table sorting
                let currentSort = { column: 'title', direction: 'asc' };

                function sortDocuments() {
                    allDocuments.sort((a, b) => {
                        let valueA = a[currentSort.column];
                        let valueB = b[currentSort.column];
                        
                        if (currentSort.column === 'date_published') {
                            valueA = new Date(valueA);
                            valueB = new Date(valueB);
                        }

                        if (valueA < valueB) return currentSort.direction === 'asc' ? -1 : 1;
                        if (valueA > valueB) return currentSort.direction === 'asc' ? 1 : -1;
                        return 0;
                    });
                }

                $('.sortable').click(function() {
                    const column = $(this).data('column');
                    $('.sortable').removeClass('sort-asc sort-desc');
                    if (currentSort.column === column) {
                        currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
                    } else {
                        currentSort = { column: column, direction: 'asc' };
                    }
                    $(this).addClass(currentSort.direction === 'asc' ? 'sort-asc' : 'sort-desc');
                    sortDocuments();
                    displayDocuments();
                });

    // Display documents
    function displayDocuments() {
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const displayedDocuments = allDocuments.slice(start, end);

    let tableBody = '';
    displayedDocuments.forEach(doc => {
        tableBody += `
            <tr class="document-row" data-id="${doc.id}">
                 <td class="expandable" title="${doc.title}">${doc.title}</td>
                <td>${doc.subject_matter}</td>
                <td>${doc.type}</td>
                <td>${doc.sponsored}</td>
                <td>${doc.co_sponsored || ''}</td>
                <td>${doc.date_published}</td>
                <td>${doc.year_in_series}</td>
                <td>
                    <div class="action-buttons">
                            <button class="btn btn-primary btn-sm view-document" data-id="${doc.id}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-secondary btn-sm edit-document" data-id="${doc.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                </td>
            </tr>
        `;
    });

    $('#documentTableBody').html(tableBody);
    updatePagination();
}
        
function updateFilterSection() {
        $('.filter-section .form-group').each(function() {
            const label = $(this).find('label');
            const input = $(this).find('.form-control');
            const spn = $(this).find('input-control');
            
            // Ensure proper spacing and alignment
            label.css('margin-bottom', '0.5rem');
            input.css('margin-top', '0.35rem');
            spn.css('margin-top', '0.25rem');
        });
    }

    // Call the update function after document ready
    updateFilterSection();


    // Update filters
    function updateFilters() {
        let authors = new Set();
        let coAuthors = new Set();
        allDocuments.forEach(doc => {
            if (doc.sponsored) authors.add(doc.sponsored);
            if (doc.co_sponsored) {
                doc.co_sponsored.split(',').forEach(co_sponsored => {
                    coAuthors.add(co_sponsored.trim());
                });
            }
        });

        updateFilterOptions('#authorFilter', authors);
        updateFilterOptions('#coAuthorFilter', coAuthors);
    }

    function updateFilterOptions(selectId, options) {
        const select = $(selectId);
        select.html('<option value="">All</option>');
        options.forEach(option => {
            select.append(`<option value="${option}">${option}</option>`);
        });
    }

    // Enhanced date filter
function filterDocuments() {
    const searchTerm = $('#searchFilter').val().toLowerCase();
    const selectedType = $('#typeFilter').val().toLowerCase();
    const selectedAuthor = $('#authorFilter').val().toLowerCase();
    const selectedCoAuthor = $('#coAuthorFilter').val().toLowerCase();
    const selectedDate = $('#dateFilter').val();

    allDocuments = originalDocuments.filter(doc => {
        const matchesSearch = !searchTerm || 
                              doc.title.toLowerCase().includes(searchTerm) || 
                              doc.description.toLowerCase().includes(searchTerm) ||
                              doc.subject_matter.toLowerCase().includes(searchTerm) ||
                              
                              doc.sponsored.toLowerCase().includes(searchTerm) ||
                              (doc.co_sponsored && doc.co_sponsored.toLowerCase().includes(searchTerm));
        const matchesType = !selectedType || doc.type.toLowerCase() === selectedType;
        const matchesAuthor = !selectedAuthor || doc.author.toLowerCase() === selectedAuthor;
        const matchesCoAuthor = !selectedCoAuthor || 
                                (doc.co_author && doc.co_author.toLowerCase().includes(selectedCoAuthor));
        
        // Enhanced date filtering
        let matchesDate = true;
        if (selectedDate) {
            const docDate = new Date(doc.date_published);
            const filterDate = new Date(selectedDate);
            
            if (selectedDate.length === 4) {
                // Year only
                matchesDate = docDate.getFullYear() === filterDate.getFullYear();
            } else if (selectedDate.length === 7) {
                // Year and month
                matchesDate = docDate.getFullYear() === filterDate.getFullYear() &&
                              docDate.getMonth() === filterDate.getMonth();
            } else {
                // Full date
                matchesDate = docDate.toISOString().split('T')[0] === selectedDate;
            }
        }

        return matchesSearch && matchesType && matchesAuthor && matchesCoAuthor && matchesDate;
    });

    currentPage = 1;
    sortDocuments();
    displayDocuments();
}




// Update date filter input to allow year, year-month, and full date selection
$('#dateFilter').attr('type', 'text');
$('#dateFilter').on('input', function() {
    let value = $(this).val();
    if (value.length === 4 && !isNaN(value)) {
        // Year only, do nothing
    } else if (value.length === 7 && value.includes('-')) {
        // Year-month, validate format
        let [year, month] = value.split('-');
        if (isNaN(year) || isNaN(month) || month < 1 || month > 12) {
            toastr.error('Invalid date format. Use YYYY-MM.');
            $(this).val('');
        }
    } else if (value.length === 10 && value.includes('-')) {
        // Full date, change type to date for native validation
        $(this).attr('type', 'date');
    } else if (value.length > 10) {
        toastr.error('Invalid date format. Use YYYY, YYYY-MM, or YYYY-MM-DD.');
        $(this).val('');
    }
    filterDocuments();
});
    // Update pagination
    function updatePagination() {
        const totalPages = Math.ceil(allDocuments.length / itemsPerPage);
        let paginationHtml = '';

        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;
        }

        $('#pagination').html(paginationHtml);
    }

    // Event listeners
    $('#searchFilter, #typeFilter, #authorFilter, #coAuthorFilter, #dateFilter').on('input change', filterDocuments);

    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        currentPage = parseInt($(this).data('page'));
        displayDocuments();
    });

    // Initialize
    loadDocuments();

    // Handle form submission with duplicate title check
    // Update the document form submission
$('#documentForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    //console.log(formData.values());
   /* for (const value of formData.values()) {
        console.log(value);
    }*/
    var documentId = $('#document_id').val();
    var url = documentId ? `/documents/${documentId}/update` : "{{ route('document.store') }}";
    var method = documentId ? 'POST' : 'POST';
    
    $.ajax({
    url: "{{ route('documents.checkDuplicate') }}",
    type: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Add CSRF token
    },
    data: JSON.stringify({
        title: $('#doc_title').val(),
        document_id: documentId
    }),
        success: function(response) {
            if (response.duplicate) {
                toastr.warning('A document with this title already exists. Please choose a different title.');
            } else {
                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#documentModal').modal('hide');
                        $('#documentForm').trigger("reset");
                        toastr.success('Document saved successfully');
                        loadDocuments();
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Error saving document. Please try again.');
                        console.error("Error saving document:", error);
                    }
                });
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Error checking for duplicate title. Please try again.');
            console.error("Error checking duplicate:", error);
        }
    });
});
        let adobeDCView = null;

// Initialize Adobe PDF Embed API
const initializeAdobeViewer = (url) => {
    if (!adobeDCView) {
        const clientId = "620e1c18ae984f439f9d46d3aabaeb9b"; // Replace with your actual Adobe client ID
        adobeDCView = new AdobeDC.View({clientId: clientId, divId: "adobe-dc-view"});
    }

    const viewerConfig = {
        embedMode: "LIGHT_BOX",
        defaultViewMode: "FIT_PAGE",
        showDownloadPDF: false,
        showPrintPDF: false,
        showLeftHandPanel: true,
        showAnnotationTools: false,
    };

    adobeDCView.previewFile(
        {content: {location: {url: url}}, metaData: {fileName: "document.pdf"}},
        viewerConfig
    );

    // Add event listener for when the PDF viewer is closed
    adobeDCView.registerCallback(
        AdobeDC.View.Enum.CallbackType.EVENT_LISTENER,
        function(event) {
            if (event.type === "PDF_VIEWER_CLOSE") {
                adobeDCView = null; // Reset pdfviewer for reinitialization
                document.getElementById("adobe-dc-view").style.display = "none";
                $('nav').removeClass('nav-hidden'); // Show the nav bar when the viewer is closed
            }
        }
     );
    };

        // Function to ensure Adobe DC View is ready
        const adobeViewerReady = new Promise((resolve) => {
            if (window.AdobeDC) {
                resolve();
            } else {
                document.addEventListener("adobe_dc_view_sdk.ready", () => resolve());
            }
        });

        // Handle document viewing
        $(document).on('click', '.view-document', function() {
            var documentId = $(this).data('id');
            const url = `/documents/${documentId}/download`;
            
            document.getElementById("adobe-dc-view").style.display = "block";
            $('nav').addClass('nav-hidden'); // Hide the nav bar

            // Wait for Adobe DC View to be ready before initializing
            adobeViewerReady.then(() => {
                initializeAdobeViewer(url);
            }).catch(error => {
                console.error("Error initializing Adobe PDF Embed API:", error);
                alert("An error occurred while trying to display the PDF. Please try again later.");
                $('nav').removeClass('nav-hidden'); // Show the nav bar if there's an error
            });
        });

        // Handle document editing
        $(document).on('click', '.edit-document', function() {
            var documentId = $(this).data('id');
            $('#modelHeading').html("Edit Document");
            $('#saveBtn').val("edit-document");
            $('#document_id').val(documentId);
            $.ajax({
                url: `/documents/${documentId}/edit`,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                $('#doc_title').val(data.title);
                $('#doc_type').val(data.type);
                $('#doc_author').val(data.sponsored);
                $('#doc_co_author').val(data.co_sponsored);
                $('#doc_description').val(data.description);
                $('#date_published').val(data.date_published);
                $('#doc_subject_matter').val(data.subject_matter);
                $('#year_in_series').val(data.year_in_series);
                $('.custom-file-label').html('Choose file to replace current document');
                $('#documentModal').modal('show');
            },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        // Enhanced search and filter functionality
        $('#searchFilter, #typeFilter, #authorFilter, #dateFilter').on('input change', function() {
            const searchTerm = $('#searchFilter').val().toLowerCase();
            const selectedType = $('#typeFilter').val().toLowerCase();
            const selectedAuthor = $('#authorFilter').val().toLowerCase();
            const selectedDate = $('#dateFilter').val();

            const filteredDocuments = allDocuments.filter(doc => {
                const matchesSearch = doc.title.toLowerCase().includes(searchTerm) || 
                                      doc.description.toLowerCase().includes(searchTerm);
                const matchesType = selectedType === '' || doc.type.toLowerCase() === selectedType;
                const matchesAuthor = selectedAuthor === '' || 
                                      doc.author.toLowerCase() === selectedAuthor || 
                                      (doc.co_author && doc.co_author.toLowerCase() === selectedAuthor);
                const matchesDate = selectedDate === '' || doc.date_published === selectedDate;

                return matchesSearch && matchesType && matchesAuthor && matchesDate;
            });

            displayDocuments(filteredDocuments);
        });

            //validation
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            let fileExtension = fileName.split('.').pop().toLowerCase();
            console.log(fileName);
            if (fileExtension !== 'pdf') {
                toastr.error('Only PDF files are allowed.');
                $(this).val('');
                $(this).next('.custom-file-label').html('Choose file');
            } else {
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            }
        });

        // Close buttons functionality
        $('.modal .close, .modal .btn-secondary[data-dismiss="modal"]').on('click', function() {
            $(this).closest('.modal').modal('hide');
        });

         // Function to create a single document form
    function createDocumentForm(index) {
        return `
            <div class="document-form mb-4">
                <h5>Document ${index}</h5>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="doc_title_${index}">Title</label>
                        <input type="text" id="doc_title_${index}" name="documents[${index}][title]" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="doc_type_${index}">Document Type</label>
                        <select id="doc_type_${index}" name="documents[${index}][type]" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="ordinance">Ordinance</option>
                            <option value="resolution">Resolution</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="doc_author_${index}">Author</label>
                        <input type="text" id="doc_author_${index}" name="documents[${index}][author]" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="doc_co_author_${index}">Co-Author</label>
                        <input type="text" id="doc_co_author_${index}" name="documents[${index}][co_author]" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="doc_description_${index}">Description</label>
                    <textarea id="doc_description_${index}" name="documents[${index}][description]" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group">
                            <label for="doc_subject_matter">Subject Matter</label>
                            <textarea id="doc_subject_matter${index}" name="documents[${index}][subject_matter]" rows="4" class="form-control" required></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="date_published_${index}">Date Published</label>
                        <input type="date" id="date_published_${index}" name="documents[${index}][date_published]" class="form-control" required>
                    </div>
                     <div class="col-sm-6">
                                <label for="year_in_series">Year In Series</label>
                                <input type="text" id="year_in_series${index}" name="documents[${index}][year_in_series]" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="doc_file_${index}">Select File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="doc_file_${index}" name="documents[${index}][file]" accept="application/pdf" required>
                            <label class="custom-file-label" for="doc_file_${index}">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

     // Add click handler for expandable titles
     $(document).on('click', '.expandable', function(e) {
        e.stopPropagation(); // Prevent row click event
        const cell = $(this);
        const row = cell.closest('tr');
        
        if (cell.hasClass('expanded-content')) {
            // Collapse
            cell.removeClass('expanded-content');
            row.removeClass('expanded');
        } else {
            // Expand
            cell.addClass('expanded-content');
            row.addClass('expanded');
        }
    });

        // New dropdown functionality
        $('#addDocumentBtn').click(function(e) {
            e.stopPropagation();
            $('#addOptionsDropdown').slideToggle(300);
        });

        $(document).click(function() {
            $('#addOptionsDropdown').slideUp(300);
        });

        $('#addSingleDocumentBtn').click(function() {
            $('#addOptionsDropdown').slideUp(300);
            $('#modelHeading').html("Add New Document");
            $('#saveBtn').val("create-document");
            $('#document_id').val('');
            $('#documentForm').trigger("reset");
            $('.custom-file-label').html('Choose file');
            $('#documentModal').modal('show');
        });

        $('#addBulkDocumentsBtn').click(function() {
            $('#addOptionsDropdown').slideUp(300);
            $('#documentForms').html(createDocumentForm(1));
            handleFileInputChange();
            $('#bulkDocumentModal').modal('show');
        });

        // ... (rest of the JavaScript code)
        // Initialize the bulk document modal with one form
    $('#bulkAddDocumentBtn').click(function() {
        $('#documentForms').html(createDocumentForm(1));
        handleFileInputChange();
    });

    // Add another document form
    $('#addDocumentForm').click(function() {
    const formCount = $('.document-form').length + 1;
    $('#documentForms').append(createDocumentForm(formCount));
    handleFileInputChange();
});

    // Update the bulk document form submission
    $('#bulkDocumentForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    
    // Collect all titles for duplicate check
    var titles = [];
    $('input[name^="documents"][name$="[title]"]').each(function() {
        titles.push($(this).val());
    });

    // Check for duplicates
    $.ajax({
        url: "{{ route('documents.checkBulkDuplicate') }}",
        type: 'POST',
        data: JSON.stringify(titles),
        contentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.duplicates.length > 0) {
                toastr.warning('The following titles already exist: ' + response.duplicates.join(', ') + '. Please choose different titles.');
            } else {
                // If no duplicates, proceed with saving
                $.ajax({
                    url: "{{ route('documents.bulkStore') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#bulkDocumentModal').modal('hide');
                        $('#bulkDocumentForm').trigger("reset");
                        toastr.success('Documents saved successfully');
                        loadDocuments();
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Error saving documents. Please try again.');
                        console.error("Error saving documents:", error);
                    }
                });
            }
        },
        error: function(xhr, status, error) {
            toastr.error('Error checking for duplicate titles. Please try again.');
            console.error("Error checking duplicates:", error);
        }
    });
});

    // Update file input labels for dynamically added forms
  /*  function updateFileInputLabels() {
       // File type validation
       // Update file input label
       $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        
    } */

        // Reset form when adding a new document
        $('#addDocumentBtn').click(function() {
            $('#modelHeading').html("Add New Document");
            $('#saveBtn').val("create-document");
            $('#document_id').val('');
            $('#documentForm').trigger("reset");
            $('.custom-file-label').html('Choose file');
        });

         // Generate Report Button Click Event
    $('#generateReportBtn').click(function() {
        $('#generateReportModal').modal('show');
    });

// Enhanced report generation with proper response handling
$('#reportForm').submit(function(e) {
    e.preventDefault();
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();

    // Show loading state
    const saveBtn = $(this).find('button[type="submit"]');
    const originalText = saveBtn.html();
    saveBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Generating...').prop('disabled', true);

    $.ajax({
        url: "{{ route('documents.generateReport') }}",
        method: 'POST',
        data: {
            startDate: startDate,
            endDate: endDate,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.file) {
                // Download the generated PDF file
                fetch(`/documents/download-report/${response.file}`)
                    .then(res => res.blob())
                    .then(blob => {
                        // Create blob URL
                        const blobUrl = URL.createObjectURL(blob);
                        
                        // Create hidden iframe for printing
                        const printFrame = document.createElement('iframe');
                        printFrame.style.display = 'none';
                        printFrame.src = blobUrl;
                        
                        document.body.appendChild(printFrame);
                        
                        printFrame.onload = function() {
                            try {
                                printFrame.contentWindow.print();
                                return false;
                                // Cleanup after print dialog closes
                                setTimeout(function() {
                                    document.body.removeChild(printFrame);
                                    URL.revokeObjectURL(blobUrl);
                                }, 1000);
                                
                                $('#generateReportModal').modal('hide');
                                toastr.success('Report generated successfully.');
                                
                            } catch (error) {
                                console.error('Print error:', error);
                                toastr.error('Error opening print dialog. Please try again.');
                                document.body.removeChild(printFrame);
                                URL.revokeObjectURL(blobUrl);
                            }
                        };
                    })
                    .catch(error => {
                        console.error('Error downloading report:', error);
                        toastr.error('Error downloading report. Please try again.');
                    });
            } else {
                toastr.error('Error generating report. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            let errorMessage = 'Error generating report. Please try again later.';
            
            // Try to parse error response
            try {
                const errorResponse = JSON.parse(xhr.responseText);
                if (errorResponse.message) {
                    errorMessage = errorResponse.message;
                }
            } catch (e) {
                console.error('Error parsing error response:', e);
            }
            
            toastr.error(errorMessage);
            console.error("Error generating report:", error);
        },
        complete: function() {
            // Reset button state
            saveBtn.html(originalText).prop('disabled', false);
        }
    });
});

// Add this function to handle file input changes
function handleFileInputChange() {
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        let fileExtension = fileName.split('.').pop().toLowerCase();
        
        if (fileExtension !== 'pdf') {
            toastr.error('Only PDF files are allowed.');
            $(this).val('');
            $(this).next('.custom-file-label').html('Choose file');
        } else {
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        }
    });
}
    });
// Add click handler for expanding/collapsing rows
$(document).on('click', '.document-row', function(e) {
    // Prevent row toggle when clicking buttons
    if ($(e.target).is('button') || $(e.target).parents('button').length > 0) {
        return;
    }
    
    // Toggle expanded class
    $(this).toggleClass('expanded-row');
    
    // If row is expanded, make sure it's fully visible
    if ($(this).hasClass('expanded-row')) {
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 300);
    }
});

// Prevent row toggle when clicking action buttons
$(document).on('click', '.view-document, .edit-document', function(e) {
    e.stopPropagation();
});
    </script>

@endsection