@extends('layouts.apps')
@section('content')

<style>
/* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8f9fc;
    color: #2c3e50;
}

/* Dashboard Layout */
.dashboard-wrapper {
    padding: 1.5rem;
    min-height: calc(100vh - 60px); /* Adjust based on your header height */
    background-color: #f8f9fc;
}

.dashboard-header {
    margin-bottom: 2rem;
    padding: 0.5rem 0;
}

.dashboard-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.dashboard-title i {
    color: #302b63;
}

/* Card Styles */
.dashboard-card {
    height: 100%;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.dashboard-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
}

.card-header {
    background: linear-gradient(135deg, #24243e 0%, #302b63 100%);
    color: white;
    padding: 1rem 1.25rem;
    font-weight: 500;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border-bottom: none;
}

.card-header i {
    font-size: 1.1rem;
    opacity: 0.9;
}

.card-body {
    flex: 1;
    padding: 1.25rem;
    overflow-y: auto;
    height: 200px;
    flex-direction: column;
    padding-bottom: 0.5rem; /* Space for button */
}

/* SB Members Section */
.member-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.member-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    background: #f8f9fa;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.member-item:hover {
    background: #eef1f5;
}

.member-avatar {
    width: 40px;
    height: 40px;
    
    border-radius: 60%;
    display: flex;
    align-items:flex-start;
    justify-content: center;
    color: white;
    font-weight: 500;
    margin-right: 1rem;
    flex-shrink: 0;
}
.member-image {
    width: 100%;
    height: 100%;
    object-fit:cover;
    border-radius: 60%;
}

.member-info {
    flex: 1;
    min-width: 0;
}

.member-name {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 500;
    color: #2c3e50;
}

.member-position {
    margin: 0;
    font-size: 0.85rem;
    color: #6c757d;
}

/* News Section */
.news-container {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.news-item {
    padding: 1rem;
    background: #f8f9fa;
    border-left: 4px solid #302b63;
    border-radius: 0 8px 8px 0;
}

.news-title {
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.news-preview {
    font-size: 0.9rem;
    color: #6c757d;
    line-height: 1.5;
    margin: 0;
}

/* Calendar Customization */
.calendar-container {
    position: relative;
    height: 100%;
    
}

/* Button Wrapper */
.button-wrapper {
    flex-shrink: 0; /* Prevent button from shrinking */
    padding-top: 0.5rem;
}


#miniCalendar {
    height: 100% !important;
}

.fc {
    height: 100% !important;
}

.fc .fc-toolbar.fc-header-toolbar {
    margin-bottom: 0.5rem;
}

.fc .fc-toolbar-title {
    font-size: 1.1rem;
}

.fc .fc-button {
    background: #302b63;
    border-color: #302b63;
}

.fc .fc-button:hover {
    background: #24243e;
    border-color: #24243e;
}

.fc-theme-standard td, 
.fc-theme-standard th {
    border-color: #e9ecef;
}

.fc .fc-view-harness {
    height: calc(100% - 50px) !important; /* Adjust based on toolbar height */
}

/* Make sure calendar doesn't overflow */
.fc-view-harness-active {
    height: auto !important;
}

/* Document Section */
.doc-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.doc-card {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1rem;
    transition: all 0.2s ease;
}

.doc-card:hover {
    background: #eef1f5;
    transform: translateX(3px);
}

.doc-content {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.doc-icon {
    width: 40px;
    height: 40px;
    background: rgba(48, 43, 99, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.doc-icon i {
    color: #302b63;
    font-size: 1.1rem;
}

.doc-details {
    flex: 1;
    min-width: 0;
}

.doc-title {
    margin: 0 0 0.25rem 0;
    font-size: 0.95rem;
    font-weight: 500;
    color: #2c3e50;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.doc-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.doc-type {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
    background: #302b63;
    color: white;
    border-radius: 12px;
    font-weight: 500;
}

.doc-date {
    font-size: 0.8rem;
    color: #6c757d;
}

/* Action Buttons */
.action-btn {
    display: inline-flex;
    position: relative;
    align-items: center;
    z-index: 10;
    gap: 0.5rem;
    padding: 0.5rem 1.25rem;
    background: #302b63;
    color: white !important;
    text-decoration: none !important;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    margin-top: 0.7rem;
    border: none;
}

.action-btn:hover {
    background: #24243e;
    transform: translateY(-1px);
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb {
    background: #302b63;
    border-radius: 3px;
}

::-webkit-scrollbar-thumb:hover {
    background: #24243e;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .dashboard-wrapper {
        padding: 1rem;
    }

    .dashboard-title {
        font-size: 1.5rem;
    }

    .calendar-wrapper {
        min-height: 250px;
    }

    .card-header {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }

    .card-body {
        padding: 1rem;
        height: 350px;
    }

    .member-avatar {
        width: 35px;
        height: 35px;
    }

    .doc-icon {
        width: 35px;
        height: 35px;
    }
}

/* Calendar specific fixes */
.calendar-wrapper {
    position: relative;
    height: calc(100% - 50px); /* Adjust based on your button height */
    min-height: 300px;
}


</style>

<div class="dashboard-wrapper">
    <div class="dashboard-header">
        <h1 class="dashboard-title">
            <i class="fas fa-tachometer-alt"></i>
            SBMIS Dashboard
        </h1>
    </div>

    <div class="row">
        <!-- SB Members Section -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Sangguniang Bayan Members
                </div>
                <div class="card-body">
                    <div id="sbMembersChart" class="member-list"></div>
                    <a href="/resident" class="action-btn">
                        <i class="fas fa-cog"></i>
                        Manage SB Members
                    </a>
                </div>
            </div>
        </div>

        @if(session('user.type') != 'SBMember')
        <!-- News Section -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-newspaper"></i>
                    Latest News & Updates
                </div>
                <div class="card-body">
                    <div id="newsContainer" class="news-container"></div>
                    <a href="/certificate" class="action-btn">
                        <i class="fas fa-edit"></i>
                        Manage News
                    </a>
                </div>
            </div>
        </div>
        @endif

        <!-- Calendar Section -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-calendar-alt"></i>
                    Upcoming Events
                </div>
                <div class="card-body">
                    <div class="calendar-container">
                        <div id="miniCalendar"></div>
                    </div>
                    <div class="button-wrapper">
                        <a href="/schedules" class="action-btn">
                            <i class="fas fa-calendar-plus"></i>
                            Manage Events
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documents Section -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card">
                <div class="card-header">
                    <i class="fas fa-file-alt"></i>
                    Recent Documents
                </div>
                <div class="card-body">
                    <div id="documentContainer" class="doc-list"></div>
                    <a href="/documents" class="action-btn">
                        <i class="fas fa-folder-plus"></i>
                        Manage Documents
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // SB Members
    function loadSBMembers() {
    $.ajax({
        url: '/sb-members/view',
        method: 'GET',
        success: function(response) {
            var sbMembersChart = $('#sbMembersChart');
            sbMembersChart.empty();
            
            response.slice(0, 8).forEach(function(member) {
                var initials = member.first_name.charAt(0) + member.last_name.charAt(0);
                var memberItem = `
                    <div class="member-item">
                        <div class="member-avatar">
                            <img 
                                src="/sb-members/serve/${member.id}" 
                                alt="${initials}"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'"
                                class="member-image"
                            />
                            <div class="member-initials" style="display:none">${initials}</div>
                        </div>
                        <div class="member-info">
                            <h6 class="member-name">Hon. ${member.first_name} ${member.last_name}</h6>
                            <p class="member-position">${member.position}</p>
                        </div>
                    </div>
                `;
                sbMembersChart.append(memberItem);
            });
        },
        error: function(error) {
            console.error('Error loading SB members:', error);
            $('#sbMembersChart').html('<p class="text-danger">Error loading members. Please try again.</p>');
        }
    });
}

    // News Updates
    function loadLatestNews() {
        $.ajax({
            url: '/api/news',
            method: 'GET',
            success: function(newsItems) {
                var newsContainer = $('#newsContainer');
                newsContainer.empty();
                
                newsItems.slice(0, 3).forEach(function(item) {
                    var preview = item.content.length > 150 ? 
                        item.content.substring(0, 150) + '...' : 
                        item.content;
                    var newsItem = `
                        <div class="news-item">
                            <h6 class="news-title">${item.title}</h6>
                            <p class="news-preview">${preview}</p>
                        </div>
                    `;
                    newsContainer.append(newsItem);
                });
            },
            error: function(error) {
                console.error('Error loading news:', error);
                $('#newsContainer').html('<p class="text-danger">Error loading news. Please try again.</p>');
            }
        });
    }

    // Recent Documents
    function loadRecentDocuments() {
        $.ajax({
            url: '/documents/view',
            method: 'GET',
            success: function(documents) {
                var documentContainer = $('#documentContainer');
                documentContainer.empty();
                
                documents.slice(0, 4).forEach(function(doc) {
                    var dateFormatted = new Date(doc.created_at).toLocaleDateString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    
                    var docCard = `
                        <div class="doc-card">
                            <div class="doc-content">
                                <div class="doc-icon">
                                    <i class="fas ${getDocumentIcon(doc.type)}"></i>
                                </div>
                                <div class="doc-details">
                                    <h6 class="doc-title" title="${doc.title}">${doc.title}</h6>
                                    <div class="doc-meta">
                                        <span class="doc-type">${doc.type}</span>
                                        <span class="doc-date">${dateFormatted}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    documentContainer.append(docCard);
                });
            },
            error: function(error) {
                console.error('Error loading documents:', error);
                $('#documentContainer').html('<p class="text-danger">Error loading documents. Please try again.</p>');
            }
        });
    }

    function getDocumentIcon(type) {
        const iconMap = {
            'PDF': 'fa-file-pdf',
            'DOC': 'fa-file-word',
            'DOCX': 'fa-file-word',
            'XLS': 'fa-file-excel',
            'XLSX': 'fa-file-excel',
            'TXT': 'fa-file-alt',
            'resolution': 'fa-file-signature',
            'ordinance': 'fa-gavel',
            'minutes': 'fa-clipboard',
            'default': 'fa-file'
        };
        return iconMap[type] || iconMap['default'];
    }

    // Calendar Initialization with Error Handling
    function initMiniCalendar() {
        try {
            const calendarEl = document.getElementById('miniCalendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                views: {
                    dayGridMonth: {
                        titleFormat: { month: 'long', year: 'numeric' }
                    }
                },
                 // Add this to ensure proper sizing after render
                viewDidMount: function() {
                    setTimeout(() => {
                        calendar.updateSize();
                    }, 0);
                },
                eventDidMount: function(info) {
                    $(info.el).tooltip({
                        title: info.event.title,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                },
                eventClick: function(info) {
                    showEventDetails(info.event);
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '/api/events',
                        method: 'GET',
                        data: {
                            start: fetchInfo.start.toISOString(),
                            end: fetchInfo.end.toISOString()
                        },
                        success: function(events) {
                            const formattedEvents = events.map(event => ({
                                id: event.id,
                                title: event.title,
                                start: new Date(event.start),
                                end: new Date(event.end),
                                backgroundColor: '#302b63',
                                borderColor: '#302b63',
                                textColor: '#ffffff',
                                extendedProps: {
                                    description: event.description,
                                    location: event.location,
                                    type: event.type
                                }
                            }));
                            successCallback(formattedEvents);
                        },
                        error: function(error) {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        }
                    });
                }
            });

            calendar.render();

            // Handle window resize for responsive calendar
            window.addEventListener('resize', function() {
                calendar.updateSize();
            });

            return calendar;
        } catch (error) {
            console.error('Error initializing calendar:', error);
            $('#miniCalendar').html('<p class="text-danger">Error loading calendar. Please refresh the page.</p>');
        }
    }

    // Event Details Modal
    function showEventDetails(event) {
        Swal.fire({
            title: event.title,
            html: `
                <div class="text-left">
                    <p><strong>Date:</strong> ${event.start.toLocaleDateString()}</p>
                    ${event.extendedProps.description ? 
                        `<p><strong>Description:</strong> ${event.extendedProps.description}</p>` : ''}
                    ${event.extendedProps.location ? 
                        `<p><strong>Location:</strong> ${event.extendedProps.location}</p>` : ''}
                    ${event.extendedProps.type ? 
                        `<p><strong>Type:</strong> ${event.extendedProps.type}</p>` : ''}
                </div>
            `,
            confirmButtonText: 'Close',
            confirmButtonColor: '#302b63'
        });
    }

    // Error Handler Function
    function handleAjaxError(error, elementId, message) {
        console.error(error);
        $(`#${elementId}`).html(`
            <div class="alert alert-danger" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `);
    }

    // Initialize Components
    try {
        loadSBMembers();
        initMiniCalendar();
        loadLatestNews();
        loadRecentDocuments();

        // Refresh data periodically
        setInterval(function() {
            loadLatestNews();
            loadRecentDocuments();
        }, 300000); // Refresh every 5 minutes

    } catch (error) {
        console.error('Error initializing dashboard:', error);
    }

    // Add loading indicators
    $(document).ajaxStart(function() {
        $('.dashboard-card .card-body').addClass('loading');
    }).ajaxStop(function() {
        $('.dashboard-card .card-body').removeClass('loading');
    });
});
</script>

<!-- Additional Loading Styles -->
<style>
.loading {
    position: relative;
}

.loading:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.loading:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 30px;
    height: 30px;
    border: 3px solid #302b63;
    border-top-color: transparent;
    border-radius: 50%;
    z-index: 1001;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>
@endsection