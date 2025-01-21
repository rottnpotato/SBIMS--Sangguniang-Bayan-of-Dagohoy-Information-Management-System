@extends('layouts.apps')
@section('title', 'Other Documents')
@section('styles')
<style>
    .document-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 8px;
    }
    .document-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .stat-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .table th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    .document-actions .btn {
        margin: 0 2px;
        transition: all 0.2s ease;
    }
    .document-actions .btn:hover {
        transform: translateY(-1px);
    }
    .search-bar {
        border-radius: 20px;
        padding-left: 20px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }
    .alert {
        border-radius: 8px;
        border-left: 4px solid;
    }
    .alert-success {
        border-left-color: #28a745;
    }
    .alert-danger {
        border-left-color: #dc3545;
    }
    .pagination-container {
        margin-top: 1rem;
    }
    .pagination {
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }
    .pagination > li {
        list-style: none;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #4a5568;
        background-color: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }
    .pagination > li > a:hover {
        z-index: 2;
        color: #2d3748;
        background-color: #edf2f7;
        border-color: #cbd5e0;
    }
    .pagination > .active > a,
    .pagination > .active > span {
        z-index: 3;
        color: #fff;
        background-color: #3490dc;
        border-color: #3490dc;
    }
    .pagination > .disabled > a,
    .pagination > .disabled > span {
        color: #a0aec0;
        pointer-events: none;
        background-color: #fff;
        border-color: #e2e8f0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <!-- Stats Overview -->
    <div class="row mb-2">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1"> <i class="fas fa-file-alt fa-2x"></i>  Total Documents: {{ $documents->total() }}</h6>
                       
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card p-3">
                <div class="d-flex justify-content-between align-items-center">
               
                    <div>
                        <h6 class="text-muted mb-1"> <i class="fas fa-user-edit fa-2x"></i>  Your Documents: {{ $documents->where('uploaded_by', session('user.id'))->count() }}</h6>
                       
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card p-3">
                <div class="d-flex justify-content-between align-items-center">
               
                    <div>
                        <h6 class="text-muted mb-1"><i class="fas fa-clock fa-2x"></i>  Recent Uploads: {{ $documents->where('created_at', '>=', now()->subDays(7))->count() }}</h6>
    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="card shadow document-card">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <h5 class="font-weight-bold text-primary mb-0">
                        <i class="fas fa-folder-open me-2"></i> Other Documents
                    </h5>
                </div>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" class="form-control search-bar" id="documentSearch" 
                               placeholder="Search documents...">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('other-documents.create') }}" 
                       class="btn btn-primary btn-sm rounded-pill">
                        <i class="fas fa-plus me-1"></i> New Document
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="text-nowrap">
                                <i class="fas fa-file me-2"></i> Title
                            </th>
                            <th>Description</th>
                            <th class="text-nowrap">
                                <i class="fas fa-user me-2"></i> Uploaded By
                            </th>
                            <th class="text-nowrap">
                                <i class="fas fa-calendar me-2"></i> Date Added
                            </th>
                            <th class="text-center"> Actions</th>
                        </tr>
                    </thead>
                    <tbody id="documentTableBody">
                        @forelse($documents as $document)
                            <tr class="document-row">
                                <td class="text-nowrap">
                                    <i class="fas fa-file file-icon me-2" data-file-type="{{ $document->file_type }}"></i>
                                    {{ $document->title }}
                                </td>
                                <td>
                                    <div class="text-muted">
                                        {{ Str::limit($document->description, 100) }}
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <span class="text-primary">
                                        <i class="fas fa-user me-2"></i>
                                        {{ session('user.firstname') }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <span title="{{ $document->created_at }}">
                                        {{ $document->created_at->format('M d, Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="document-actions text-center">
                                        <a href="{{ $document->getDownloadUrl() }}" 
                                           class="btn btn-sm btn-outline-success"
                                           title="Download">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        
                                        @if($document->uploaded_by == session('user.id'))
                                            <a href="{{ route('other-documents.edit', $document->id) }}" 
                                               class="btn btn-sm btn-outline-info"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{ route('other-documents.destroy', $document->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this document?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-3x mb-3"></i>
                                        <p>No documents found. Click "New Document" to upload your first document.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $documents->firstItem() ?? 0 }} to {{ $documents->lastItem() ?? 0 }} 
                    of {{ $documents->total() }} documents
                </div>
                <div class="pagination-container">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Initialize file icons
    setFileIcons();
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Search functionality
    $('#documentSearch').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('.document-row').each(function() {
            const text = $(this).text().toLowerCase();
            $(this).toggle(text.indexOf(searchTerm) > -1);
        });
        
        // Show/hide empty message
        if ($('.document-row:visible').length === 0) {
            if ($('#emptySearchMessage').length === 0) {
                $('#documentTableBody').append(`
                    <tr id="emptySearchMessage">
                        <td colspan="5" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-search fa-3x mb-3"></i>
                                <p>No documents match your search criteria.</p>
                            </div>
                        </td>
                    </tr>
                `);
            }
        } else {
            $('#emptySearchMessage').remove();
        }
    });

    // Remove storage calculation as it's no longer needed

    // Add fade out effect to alerts after 5 seconds
    $('.alert').delay(5000).fadeOut(500);

    // Smooth scroll to top when pagination is clicked
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        $.get(url, function(data) {
            $('#documentTableBody').html($(data).find('#documentTableBody').html());
            $('.pagination').html($(data).find('.pagination').html());
        });
        $('html, body').animate({
            scrollTop: $('.document-card').offset().top - 20
        }, 200);
    });
});

// Set file icons based on file type using jQuery
function setFileIcons() {
    const iconMapping = {
        'pdf': 'fa-file-pdf',
        'doc': 'fa-file-word',
        'docx': 'fa-file-word',
        'xls': 'fa-file-excel',
        'xlsx': 'fa-file-excel',
        'ppt': 'fa-file-powerpoint',
        'pptx': 'fa-file-powerpoint',
        'txt': 'fa-file-alt',
        'jpg': 'fa-file-image',
        'jpeg': 'fa-file-image',
        'png': 'fa-file-image',
        'gif': 'fa-file-image',
        'zip': 'fa-file-archive',
        'rar': 'fa-file-archive'
    };

    $('.file-icon').each(function() {
        const fileType = $(this).data('file-type').toLowerCase();
        const iconClass = iconMapping[fileType] || 'fa-file';
        
        // Remove existing file icon classes and add the new one
        $(this).removeClass(Object.values(iconMapping).join(' '))
               .removeClass('fa-file')
               .addClass(iconClass);
    });
}
</script>
@endsection