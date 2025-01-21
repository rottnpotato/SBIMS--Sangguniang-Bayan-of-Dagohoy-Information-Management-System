<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Management System</title>
      
      <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
      
      <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css">
      <style>
    .dropdown-menu {
        right: 0;
        left: auto;
    }
    
    /* Updated navbar styles */
    .navbar {
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1030;
    }
    
    /* New sidebar styles */
    #wrapper {
        display: flex;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        transition: all 0.3s ease;
    }
    
    /* Sidebar positioning */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 1020;
        width: 250px;
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        transition: all 0.3s ease;
        overflow-y: auto;
    }
    
    /* Main content wrapper adjustment */
    #page-content-wrapper {
        flex: 1;
        width: 100%;
        margin-left: 250px;
        transition: all 0.3s ease;
    }
    
    /* Container adjustments */
    .main-body {
        padding: 20px;
        min-height: calc(100vh - 60px); /* Adjust based on your navbar height */
    }
    
    .sidebar {
        transform: translateX(0);
        transition: transform 0.3s ease;
    }

    #wrapper.toggled .sidebar {
        transform: translateX(-100%);
    }

    #wrapper.toggled #page-content-wrapper {
        margin-left: 0;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            margin-left: -250px;
        }
        
        #page-content-wrapper {
            margin-left: 0;
            width: 100%;
        }
        
        #wrapper.toggled .sidebar {
            margin-left: 0;
        }
    }
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        position: sticky;
        top: 0;
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        box-shadow: 0 4px 6px rgba(0,0,0,.1);
        padding: 0.5rem 1rem;
        z-index: 1030;
        width: 100%;
    }
    .nav-item.dropdown {
    position: static; /* Reset position */
}
.dropdown-menu.show {
    display: block;
    animation: dropdownFade 0.2s ease-in-out;
}
.navbar-nav {
    position: relative;
    z-index: 1030;
}



/* handle any potential overlay issues */
.dropdown-menu-end {
    right: 0;
    left: auto;
}
img{
    margin-left: 10px;
}

    .navbar-brand {
        font-weight: 600;
        letter-spacing: 1px;
    }

    .brand-text {
        font-size: 1.2rem;
        margin-left: 0.5rem;
        vertical-align: middle;
    }

    .nav-link {
        font-weight: 500;
        transition: color 0.3s ease, transform 0.3s ease;
        padding: 0.5rem 1rem;
    }

    .nav-link:hover {
        color: #ffd700 !important;
        transform: translateY(-2px);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border-radius: 0.5rem;
    }

    .dropdown-item {
        padding: 0.75rem 1.5rem;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
        color: #302b63;
    }

    #menu-toggle {
        padding: 0.375rem 0.75rem;
        font-size: 1.25rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    #menu-toggle:hover {
        color: #ffd700;
        border-color: #ffd700;
        transform: scale(1.05);
    }

    .navbar-toggler {
        border-color: rgba(255,255,255,0.1);
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.25rem rgba(255,255,255,0.1);
    }

    @media (max-width: 991.98px) {
        .navbar-brand {
            margin-right: auto;
            margin-left: 1rem;
        }
    }
</style>
<style>

/* Content Container */
.content-wrapper {
    padding: 20px;

    background-color: #f8f9fc;
}

/* Page Header */
.page-header {
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #e9ecef;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

/* Action Button */
.action-btn {
    background: linear-gradient(135deg, #24243e 0%, #302b63 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    border: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.15);
    background: linear-gradient(135deg, #302b63 0%, #24243e 100%);
    color: white;
    text-decoration: none;
}

/* Organization Chart */
.org-chart {
    padding: 1.5rem 0;
    width: 100%;
    overflow-x: auto;
}

.org-chart ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
}

/* Member Card */
.member-card {
    width: 280px;
    min-height: 350px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
}

.member-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

/* Member Image */
.member-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    align-items: center;
    object-fit: cover;
    margin-bottom: 1.25rem;
    border: 4px solid #f8f9fa;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}


.member-details-container {
    padding: 1rem;
}

.member-detail-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: block;
  margin-left: auto;
  margin-right: auto;
    object-fit: cover;
    margin-bottom: 1.5rem;
    border: 5px solid #f8f9fa;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.member-detail-name {
    font-size: 1.5rem;
    font-weight: 600;
    text-align: center;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    word-wrap: break-word;
}

.member-detail-position {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 1.5rem;
    text-align: center;
    word-wrap: break-word;
}

.member-info-section {
    text-align: justify;
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 12px;
    margin-top: 1.5rem;
}

/* Member Details */
.member-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
    text-align: center;
    margin: 0.5rem 0;
    padding: 0 0.5rem;
    width: 100%;
    word-wrap: break-word;
}

.member-position {
    font-size: 0.9rem;
    color: #6c757d;
    text-align: center;
    margin-bottom: 1rem;
    padding: 0 0.5rem;
    width: 100%;
    word-wrap: break-word;
}

.member-committee {
    font-size: 0.85rem;
    color: #495057;
    text-align: center;
    background: #f8f9fa;
    padding: 0.75rem 1rem;
    border-radius: 20px;
    width: 90%;
    word-wrap: break-word;
    margin-top: auto;
    margin-bottom: 0.5rem;
}

/* Modal Styles */
.modal-content {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.modal-header {
    background: linear-gradient(135deg, #24243e 0%, #302b63 100%);
    color: white;
    padding: 1.25rem;
    border-bottom: none;
    border-radius: 12px 12px 0 0;
}

.modal-header .btn-close {
    color: white;
    filter: brightness(0) invert(1);
}

/* Form Styles */
.form-label {
    font-weight: 500;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 0.75rem;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #302b63;
    box-shadow: 0 0 0 3px rgba(48, 43, 99, 0.1);
}

/* Loading States */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    z-index: 1000;
}

.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #302b63;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Adjustments */
@media (max-width: 1200px) {
    .member-card {
        width: 260px;
    }
}

@media (max-width: 992px) {
    .content-wrapper {
        margin-left: 200px; /* Adjust for smaller sidebar */
    }
    
    .member-card {
        width: 240px;
    }
}

@media (max-width: 768px) {
    .content-wrapper {
        margin-left: 0; /* Full width on mobile */
        padding: 15px;
    }
    
    .member-card {
        width: 100%;
        max-width: 280px;
    }
    
    .org-chart ul {
        gap: 1rem;
    }
}
</style>

      <script>
        // global app configuration object
        var config = {
            routes: {
            }
        };
     </script>


   </head>
   <body>
      <div class="d-flex overflow-auto" id="wrapper">
         @include('inc.nav')
         <div id="page-content-wrapper">
            @include('inc.top_nav')
            <div class="container-fluid main-body" id="body">
            <div class="content-wrapper">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">
                        <i class="fas fa-users"></i>
                        Sangguniang Bayan Members
                    </h1>
                </div>

                <!-- Action Button -->
                <button id="createSBMember" class="action-btn">
                    <i class="fas fa-plus"></i>
                    New SB Member
                </button>

                <!-- Organization Chart -->
                <div id="orgChart" class="org-chart"></div>
            </div>

            <!-- Add/Edit Modal -->
            <div class="modal fade overflow-auto" id="sbMemberModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sbMemberModalLabel">Add/Edit Sangguniang Bayan Member</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form id="sbMemberForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="member_id" id="member_id">
                                
                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label class="form-label">Member Image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="memberImage" name="memberImage" 
                                            accept="image/jpeg,image/png">
                                    </div>
                                    <small class="text-muted">Maximum file size: 2MB (JPG/PNG only)</small>
                                </div>

                                <!-- Personal Information -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>

                                <!-- Position & Committee -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Position</label>
                                        <select class="form-select" id="position" name="position">
                                            <option value="">Select Position</option>
                                            <option value="Vice Mayor">Vice Mayor</option>
                                            <option value="Councilor">Councilor</option>
                                            <option value="Representative, LnB President">Representative, LnB President</option>
                                            <option value="Representative, PPSK President">Representative, PPSK President</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Committee</label>
                                        <input type="text" class="form-control" id="committee" name="committee">
                                    </div>
                                </div>

                                <!-- Term Dates -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Term Start</label>
                                        <input type="date" class="form-control" id="termStart" name="termStart">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Term End</label>
                                        <input type="date" class="form-control" id="termEnd" name="termEnd">
                                    </div>
                                </div>

                                <!-- Biography -->
                                <div class="mb-3">
                                    <label class="form-label">Biography</label>
                                    <textarea class="form-control" id="biography" name="biography" rows="4"></textarea>
                                </div>

                                <div class="modal-footer px-0 pb-0">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Member Details Modal -->
            <div class="modal fade" id="memberDetailsModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Member Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="member-details-container">
                                <img id="memberDetailImage" class="member-detail-image" src="" alt="Member Photo">
                                <h4 id="memberDetailName" class="member-detail-name"></h4>
                                <p id="memberDetailPosition" class="member-detail-position"></p>
                                
                                <div class="member-info-section">
                                    <div id="memberDetailInfo">
                                        <!-- Member details will be populated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="editMemberBtn" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
         </div>
      </div>
   </body>

   <script>
    // Ensure sidebar height matches content
    function adjustSidebarHeight() {
        const contentHeight = document.getElementById('page-content-wrapper').scrollHeight;
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.minHeight = `${contentHeight}px`;
    }
    
    // Run on load and resize
    window.addEventListener('load', adjustSidebarHeight);
    window.addEventListener('resize', adjustSidebarHeight);
</script>
<!-- Your existing scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let membersData = [];

    // Enhanced Toast Configuration
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    // Enhanced Toast Functions
    function showToast(message, type = 'success') {
        const capitalizedMessage = message.charAt(0).toUpperCase() + message.slice(1);
        Toast.fire({
            icon: type,
            title: capitalizedMessage,
            background: type === 'success' ? '#f0f9eb' : '#fef0f0',
            color: type === 'success' ? '#67c23a' : '#f56c6c'
        });
    }

    // Validation Functions
    function isValidName(name) {
        const nameRegex = /^[A-ZÑa-zñ\s-]{2,}$/;
        return nameRegex.test(name);
    }

    function isValidCommittee(committee) {
        const committeeRegex = /^[A-Za-z0-9\s,.-]{2,}$/;
        return committeeRegex.test(committee);
    }

    function isValidImageFile(file) {
        if (!file) return true;
        
        const validTypes = ['image/jpeg', 'image/png'];
        const maxSize = 2 * 1024 * 1024; // 2MB

        if (!validTypes.includes(file.type)) {
            return 'Only JPG and PNG images are allowed';
        }

        if (file.size > maxSize) {
            return 'Image size must be less than 2MB';
        }

        return true;
    }

    // Form Validation
    function validateForm(formData) {
        const errors = [];

        // Name validation
        const firstName = formData.get('first_name');
        const lastName = formData.get('last_name');

        if (!firstName || !isValidName(firstName)) {
            errors.push('Please enter a valid first name (letters, spaces, and hyphens only)');
        }

        if (!lastName || !isValidName(lastName)) {
            errors.push('Please enter a valid last name (letters, spaces, and hyphens only)');
        }

        // Position validation
        const position = formData.get('position');
        if (!position) {
            errors.push('Please select a position');
        }

        // Committee validation
        const committee = formData.get('committee');
        if (!committee || !isValidCommittee(committee)) {
            errors.push('Please enter a valid committee name');
        }

        // Date validation
        const termStart = formData.get('termStart');
        const termEnd = formData.get('termEnd');
        
        if (!termStart) {
            errors.push('Term start date is required');
        }
        if (!termEnd) {
            errors.push('Term end date is required');
        }
        if (termStart && termEnd && new Date(termEnd) < new Date(termStart)) {
            errors.push('Term end date must be after term start date');
        }

        // Image validation
        const imageFile = document.getElementById('memberImage').files[0];
        const imageValidation = isValidImageFile(imageFile);
        if (imageValidation !== true) {
            errors.push(imageValidation);
        }

        return errors;
    }

    // Load SB Members
    function loadSBMembers() {
        showLoadingOverlay();
        fetch('/sb-members/view')
            .then(response => response.json())
            .then(data => {
                membersData = data;
                updateOrgChart();
                updatePositionDropdown();
                hideLoadingOverlay();
            })
            .catch(error => {
                console.error('Error loading members:', error);
                //showToast('Failed to load members', 'error');
                hideLoadingOverlay();
            });
    }

    function deleteMember(memberId) {
        const member = membersData.find(m => m.id === memberId);
        const memberName = member ? `${member.first_name} ${member.last_name}` : 'this member';

        Swal.fire({
            title: 'Delete Confirmation',
            text: `Are you sure you want to delete ${memberName}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/sb-members/members/${memberId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        membersData = membersData.filter(member => member.id !== memberId);
                        updateOrgChart();
                        updatePositionDropdown();
                        showSuccessToast(`${memberName} has been deleted successfully`);
                    } else {
                        showErrorToast(data.message || 'Failed to delete member');
                    }
                })
                .catch(error => {
                    showErrorToast('A network error occurred while deleting the member');
                });
            }
        });
    }

    function countPositions() {
        const counts = {
            'Vice Mayor': 0,
            'Councilor': 0,
            'Representative, PPSK President': 0,
            'Secretary': 0,
            'Representative, LnB President': 0
        };
        membersData.forEach(member => {
            if (counts[member.position] !== undefined) {
                counts[member.position]++;
            }
        });
        return counts;
    }

    // Position Management
    function getPositionLimit(position) {
        switch(position) {
            case 'Vice Mayor':
            case 'Representative, LnB President':
            case 'Representative, PPSK President':
            case 'Secretary':
                return 1;
            case 'Councilor':
                return 8;
            default:
                return Infinity;
        }
    }

    function updatePositionDropdown() {
        const positionSelect = document.getElementById('position');
        const positions = ['Vice Mayor', 'Councilor', 'Representative, PPSK President', 'Secretary', 'Representative, LnB President'];
        const positionCounts = countPositions();
        
        // Clear existing options
        positionSelect.innerHTML = '<option value="">Select Position</option>';
        
        // Add positions
        positions.forEach(position => {
            const option = document.createElement('option');
            option.value = position;
            option.textContent = position;
            const limit = getPositionLimit(position);
            option.disabled = positionCounts[position] >= limit;
            positionSelect.appendChild(option);
        });
    }

    // Enhanced Organization Chart
    function updateOrgChart() {
        const orgChart = document.getElementById('orgChart');
        orgChart.innerHTML = '';

        const hierarchy = {
            viceMayor: null,
            councilors: [],
            skChairman: null,
            secretary: null,
            lnbPres: null
        };

        // Organize members by position
        membersData.forEach(member => {
            const pos = member.position?.toLowerCase();
            switch(pos) {
                case 'vice mayor':
                    hierarchy.viceMayor = member;
                    break;
                case 'councilor':
                    if (hierarchy.councilors.length < 8) {
                        hierarchy.councilors.push(member);
                    }
                    break;
                case 'representative, lnb president':
                    hierarchy.lnbPres = member;
                    break;
                case 'representative, ppsk president':
                    hierarchy.skChairman = member;
                    break;
                case 'secretary':
                    hierarchy.secretary = member;
                    break;
            }
        });

        // Create chart structure
        const chart = document.createElement('ul');
        chart.className = 'd-flex flex-column align-items-center';

        // Add Vice Mayor
        if (hierarchy.viceMayor) {
            chart.appendChild(createMemberElement(hierarchy.viceMayor, true));
        }

        // Create councilors section
        const councilorsSection = document.createElement('ul');
        councilorsSection.className = 'd-flex flex-wrap justify-content-center gap-4 mt-4';

        // Add Councilors
        hierarchy.councilors.forEach(councilor => {
            councilorsSection.appendChild(createMemberElement(councilor));
        });

        // Add other representatives
        if (hierarchy.skChairman) {
            councilorsSection.appendChild(createMemberElement(hierarchy.skChairman));
        }
        if (hierarchy.lnbPres) {
            councilorsSection.appendChild(createMemberElement(hierarchy.lnbPres));
        }

        chart.appendChild(councilorsSection);
        orgChart.appendChild(chart);
    }

    // Enhanced Member Element Creation
    function createMemberElement(member, isViceMayor = false) {
        const li = document.createElement('li');
        li.className = `member-item ${isViceMayor ? 'vice-mayor' : ''}`;

        const memberCard = document.createElement('div');
        memberCard.className = 'member-card';
        memberCard.onclick = () => showMemberDetails(member);

        // Image with loading and error handling
        const img = document.createElement('img');
        img.className = 'member-image';
        img.src = `/sb-members/serve/${member.id}`;
        img.alt = `Hon. ${member.first_name} ${member.last_name}`;
        img.loading = 'lazy';
        img.onerror = function() {
            this.src = '/path/to/default/avatar.jpg'; // Add a default avatar path
            this.onerror = null;
        };

        const name = document.createElement('h3');
        name.className = 'member-name';
        name.textContent = `Hon. ${member.first_name} ${member.last_name}`;

        const position = document.createElement('p');
        position.className = 'member-position';
        position.textContent = member.position;

        const committee = document.createElement('div');
        committee.className = 'member-committee';
        committee.textContent = member.committee;

        memberCard.append(img, name, position, committee);
        li.appendChild(memberCard);

        return li;
    }

    // Enhanced Member Details Display
    function showMemberDetails(member) {
        const modal = new bootstrap.Modal(document.getElementById('memberDetailsModal'));
        
        document.getElementById('memberDetailName').textContent = `Hon. ${member.first_name} ${member.last_name}`;
        document.getElementById('memberDetailPosition').textContent = member.position;
        
        const img = document.getElementById('memberDetailImage');
        img.src = `/sb-members/serve/${member.id}`;
        img.onerror = function() {
            this.src = '/path/to/default/avatar.jpg';
        };

        const info = document.getElementById('memberDetailInfo');
        info.innerHTML = `
            <div class="info-group mb-4">
                <div class="info-label">Committee</div>
                <div class="info-value">${member.committee}</div>
            </div>
            <div class="info-group mb-4">
                <div class="info-label">Term of Service</div>
                <div class="info-value">${formatDate(member.termStart)} - ${formatDate(member.termEnd)}</div>
            </div>
            <div class="info-group">
                <div class="info-label">Biography</div>
                <div class="info-value">${member.biography || 'No biography available.'}</div>
            </div>
        `;

        modal.show();

        // Set up edit button
        document.getElementById('editMemberBtn').onclick = () => {
            modal.hide();
            showEditModal(member);
        };
    }

    // Enhanced Modal Functions
    function showEditModal(member = null) {
        const modal = new bootstrap.Modal(document.getElementById('sbMemberModal'));
        const form = document.getElementById('sbMemberForm');
        const modalTitle = document.getElementById('sbMemberModalLabel');

        if (member) {
            modalTitle.textContent = 'Edit Sangguniang Bayan Member';
            fillFormWithMemberData(form, member);
        } else {
            modalTitle.textContent = 'Add Sangguniang Bayan Member';
            form.reset();
            form.member_id.value = '';
            document.getElementById('position').disabled = false;
        }

        modal.show();
    }

    function fillFormWithMemberData(form, member) {
        form.member_id.value = member.id;
        form.first_name.value = member.first_name;
        form.last_name.value = member.last_name;
        form.position.value = member.position;
        form.committee.value = member.committee;
        form.termStart.value = member.termStart;
        form.termEnd.value = member.termEnd;
        form.biography.value = member.biography;
        
        document.getElementById('position').disabled = true;

        // Handle current image display
        const currentImageLabel = document.createElement('div');
        currentImageLabel.className = 'current-image-preview mt-2';
        currentImageLabel.innerHTML = `
            <img src="/sb-members/serve/${member.id}" 
                 alt="Current member image" 
                 class="img-thumbnail" 
                 style="height: 100px; width: 100px; object-fit: cover;">
            <small class="d-block text-muted mt-1">Current image</small>
        `;

        const imageInput = document.getElementById('memberImage');
        const existingPreview = imageInput.parentNode.querySelector('.current-image-preview');
        if (existingPreview) {
            existingPreview.remove();
        }
        imageInput.parentNode.appendChild(currentImageLabel);
    }

    // Utility Functions
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    function showLoadingOverlay() {
        const overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.innerHTML = '<div class="loading-spinner"></div>';
        document.getElementById('orgChart').appendChild(overlay);
    }

    function hideLoadingOverlay() {
        const overlay = document.querySelector('.loading-overlay');
        if (overlay) {
            overlay.remove();
        }
    }

    // Form Submission Handler
    document.getElementById('sbMemberForm').onsubmit = function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        // Validate form
        const errors = validateForm(formData);
        if (errors.length > 0) {
            errors.forEach(error => showToast(error, 'error'));
            return;
        }

        const memberId = formData.get('member_id');
        const url = memberId ? `/sb-members/members/${memberId}` : '/sb-members/members';
        const method = memberId ? 'POST' : 'POST';

        if (memberId) {
            formData.append('_method', 'PUT');
        }

        showLoadingOverlay();

        fetch(url, {
            method: method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            hideLoadingOverlay();
            if (data.status === 'success') {
                bootstrap.Modal.getInstance(document.getElementById('sbMemberModal')).hide();
                loadSBMembers();
                showToast(memberId ? 'Member updated successfully' : 'New member added successfully');
            } else {
                showToast(data.message || 'An error occurred', 'error');
            }
        })
        .catch(error => {
            hideLoadingOverlay();
            console.error('Error:', error);
            showToast('A network error occurred', 'error');
        });
    };

    // Initialize
    document.getElementById('createSBMember').onclick = () => showEditModal();
    loadSBMembers();
});
</script>






   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

   <script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>

 <!---datatable-->


 <script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



   <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

   <!--pagination-->
   <script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>



</html>
