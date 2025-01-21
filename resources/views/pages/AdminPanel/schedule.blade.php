@extends('layouts.apps')
@section('content')

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #3498db;
        --success-color: #27ae60;
        --danger-color: #e74c3c;
        --background-color: #f8f9fa;
        --card-background: #ffffff;
        --text-color: #2c3e50;
        --border-color: #e2e8f0;
        --hover-color: #f7fafc;
    }
    
    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        line-height: 1.6;
    }
    
    /* Header Styling */
    .page-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 2rem 1.5rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .page-header h1 {
        color: #ffffff;
        margin: 0;
        font-size: 2rem;
        font-weight: 600;
    }
    
    .page-subtitle {
        color: rgba(255, 255, 255, 0.85);
        margin-top: 0.5rem;
        font-size: 1rem;
    }
    
    /* Calendar Container */
    .calendar-container {
        background-color: var(--card-background);
        border-radius: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin: 0 auto 2rem;
        max-width: 1200px;
        transition: all 0.3s ease;
    }
    
    /* Calendar Navigation */
    .fc .fc-toolbar {
        margin-bottom: 1.5rem !important;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 0.5rem;
    }
    
    .fc .fc-toolbar-title {
        font-size: 1.5rem !important;
        font-weight: 600;
        color: var(--primary-color);
    }
    
    /* Calendar Buttons */
    .fc .fc-button-primary {
        background-color: var(--accent-color) !important;
        border-color: var(--accent-color) !important;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }
    
    .fc .fc-button-primary:hover {
        background-color: #2980b9 !important;
        border-color: #2980b9 !important;
        transform: translateY(-1px);
    }
    
    .fc .fc-button-primary:not(:disabled):active {
        background-color: #2473a6 !important;
        border-color: #2473a6 !important;
    }
    
    /* Calendar Grid */
    .fc-theme-standard td, 
    .fc-theme-standard th {
        border-color: var(--border-color) !important;
    }
    
    .fc-day-today {
        background-color: #f8fafc !important;
    }
    
    .fc-daygrid-day-number {
        font-weight: 500;
        padding: 0.5rem !important;
        color: var(--text-color);
    }
    
    /* Events */
    .fc-event {
        border-radius: 0.375rem;
        padding: 0.25rem;
        margin: 0.125rem;
        border: none;
        transition: transform 0.2s ease;
    }
    
    .fc-event:hover {
        transform: translateY(-2px);
    }
    
    .fc-daygrid-event {
        background-color: var(--accent-color);
        color: #ffffff;
    }
    
    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .modal-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #ffffff;
        border-radius: 1rem 1rem 0 0;
        padding: 1.5rem;
    }
    
    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .form-label {
        font-weight: 500;
        color: var(--text-color);
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        border-radius: 0.5rem;
        border-color: var(--border-color);
        padding: 0.625rem;
        transition: all 0.2s ease;
    }
    
    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }
    
    /* Chips Styling */
    .chip-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }
    
    .chip {
        background-color: var(--accent-color);
        color: #ffffff;
        padding: 0.375rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        transition: all 0.2s ease;
    }
    
    .chip:hover {
        background-color: #2980b9;
    }
    
    .remove-chip {
        cursor: pointer;
        font-weight: bold;
        padding: 0 0.25rem;
    }
    
    /* Empty State */
    #emptyMessage {
        text-align: center;
        padding: 2rem;
        background-color: #fff;
        border-radius: 1rem;
        border: 2px dashed var(--border-color);
        margin-bottom: 1.5rem;
    }
    
    #emptyMessage h3 {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    #emptyMessage p {
        color: var(--text-color);
        opacity: 0.8;
    }
    
    /* Buttons */
    .btn {
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }
    
    .btn-primary {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }
    
    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
        transform: translateY(-1px);
    }
    
    .btn-danger {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
    }
    
    .btn-danger:hover {
        background-color: #c0392b;
        border-color: #c0392b;
        transform: translateY(-1px);
    }
    
    /* List View Enhancements */
    .fc-list-day-cushion {
        background-color: var(--background-color) !important;
    }
    
    .fc-list-event:hover td {
        background-color: var(--hover-color) !important;
    }
    
    .fc-list-event-dot {
        border-color: var(--accent-color) !important;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .calendar-container {
            padding: 1rem;
            margin: 0 1rem 1rem;
        }
        
        .fc .fc-toolbar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .fc .fc-toolbar-title {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .modal-dialog {
            margin: 0.5rem;
        }
    }
    
    /* Loading State */
    .calendar-loading {
        position: relative;
        min-height: 200px;
    }
    
    .calendar-loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: var(--text-color);
    }
    
    /* Custom Scrollbar */
    .fc-scroller {
        scrollbar-width: thin;
        scrollbar-color: var(--accent-color) var(--background-color);
    }
    
    .fc-scroller::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    
    .fc-scroller::-webkit-scrollbar-track {
        background: var(--background-color);
    }
    
    .fc-scroller::-webkit-scrollbar-thumb {
        background-color: var(--accent-color);
        border-radius: 3px;
    }
</style>

<!-- Required CSS -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<div class="container-fluid">
    <div class="page-header">
        <h1><i class="bi bi-calendar-event me-2"></i> Event Scheduler</h1>
        <p class="page-subtitle">Plan, organize, and manage your events efficiently</p>
    </div>
    
    <div class="calendar-container">
        <div id="emptyMessage" style="display: none;">
            <i class="bi bi-calendar-plus" style="font-size: 3rem; color: var(--accent-color); margin-bottom: 1rem;"> </i>
            <h3>Your Schedule is Clear</h3>
            <p>Click on any date to add a new event and start planning your activities!</p>
        </div>
        <div id="calendar"></div>
    </div>
</div>

<!-- Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">
                    <i class="bi bi-calendar-plus me-2"></i> Event Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <input type="hidden" id="eventId">
                    <div class="mb-3">
                        <label for="eventTitle" class="form-label">
                            <i class="bi bi-type me-2"></i> Event Title
                        </label>
                        <input type="text" class="form-control" id="eventTitle" required placeholder="Enter event title">
                    </div>
                    <div class="mb-3">
                        <label for="eventStart" class="form-label">
                            <i class="bi bi-clock me-2"></i> Start Date & Time
                        </label>
                        <input type="datetime-local" class="form-control" id="eventStart" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventEnd" class="form-label">
                            <i class="bi bi-clock-history me-2"></i> End Date & Time
                        </label>
                        <input type="datetime-local" class="form-control" id="eventEnd" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventCommittees" class="form-label">
                            <i class="bi bi-people me-2"></i> Committees
                        </label>
                        <select class="form-control committee-select" id="eventCommittees" multiple required>
                            <!-- Committee options will be dynamically populated -->
                        </select>
                        <div class="chip-container" id="committeeChips"></div>
                        <button type="button" class="btn btn-outline-primary mt-2" id="addCommitteeBtn">
                            <i class="bi bi-plus-circle me-2"></i> Add Committee
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">
                            <i class="bi bi-text-paragraph me-2"></i> Event Description
                        </label>
                        <textarea class="form-control" id="eventDescription" rows="3" placeholder="Enter event description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i> Close
                </button>
                <button type="button" class="btn btn-danger" id="deleteBtn">
                    <i class="bi bi-trash me-2"></i> Delete Event
                </button>
                <button type="button" class="btn btn-primary" id="saveBtn">
                    <i class="bi bi-check-circle me-2"></i> Save Event
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-trash text-danger" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center fs-5"> Are you sure you want to delete this event?</p>
                <p class="text-center text-muted"> This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i> Cancel
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi bi-trash me-2"></i> Delete Event
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Required Scripts -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src='fullcalendar/dist/index.global.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configure Toastr notifications with a more modern style
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        toastClass: 'toast rounded shadow-lg'
    };

    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize Elements
    const calendarEl = document.getElementById('calendar');
    const emptyMessage = document.getElementById('emptyMessage');
    const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
    const deleteConfirmModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
    const eventForm = document.getElementById('eventForm');
    const eventCommittees = document.getElementById('eventCommittees');
    const committeeChips = document.getElementById('committeeChips');
    
    let userType = '';
    let userCommittees = [];
    let eventToDelete = null;

    // Calendar Initialization
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        views: {
            dayGridMonth: {
                dayMaxEventRows: 4,
                dayMaxEvents: true
            },
            listWeek: { 
                buttonText: 'List View',
                displayEventTime: true,
                displayEventEnd: true
            }
        },
        themeSystem: 'bootstrap5',
        height: 'auto',
        aspectRatio: 1.8,
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true,
        weekNumbers: true,
        navLinks: true,
        businessHours: {
            daysOfWeek: [1, 2, 3, 4, 5],
            startTime: '08:00',
            endTime: '18:00',
        },
        nowIndicator: true,
        dayPopoverFormat: { month: 'long', day: 'numeric', year: 'numeric' },
        
        // Event Handlers
        select: handleDateSelect,
        eventClick: handleEventClick,
        eventDrop: handleEventDrop,
        eventResize: handleEventResize,
        loading: handleLoading,
        eventDidMount: handleEventMount,
        
        // Events Source
        events: fetchEvents
    });

    // Initialize Calendar
    calendar.render();
    initializeUserData();

    // Event Handlers
    function handleDateSelect(info) {
        const currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);
        const selectedDate = new Date(info.start);
        selectedDate.setHours(0, 0, 0, 0);

        if (selectedDate >= currentDate) {
            openModal(null, info.startStr, info.endStr);
        } else {
            showError('You cannot add events for past dates.');
        }
    }

    function handleEventClick(info) {
        openModal(info.event);
    }

    function handleEventDrop(info) {
        const currentDate = new Date();
        currentDate.setHours(0, 0, 0, 0);
        const newEventDate = new Date(info.event.start);
        newEventDate.setHours(0, 0, 0, 0);

        if (newEventDate >= currentDate) {
            updateEvent(info.event);
        } else {
            showError('You cannot move events to past dates.');
            info.revert();
        }
    }

    function handleEventResize(info) {
        updateEvent(info.event);
    }

    function handleLoading(isLoading) {
        const loadingEl = document.getElementById('calendar-loading');
        if (isLoading) {
            if (!loadingEl) {
                const loader = document.createElement('div');
                loader.id = 'calendar-loading';
                loader.className = 'calendar-loading';
                loader.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
                calendarEl.appendChild(loader);
            }
        } else {
            if (loadingEl) {
                loadingEl.remove();
            }
        }
    }

    function handleEventMount(info) {
        if (info.view.type === 'listWeek') {
            const titleEl = info.el.querySelector('.fc-list-event-title');
            if (titleEl && info.event.extendedProps.committees) {
                const committeesSpan = document.createElement('span');
                committeesSpan.className = 'fc-list-event-committees';
                committeesSpan.textContent = `(${info.event.extendedProps.committees.join(', ')})`;
                titleEl.appendChild(committeesSpan);
            }
        }

        // Add tooltip
        const tooltip = new bootstrap.Tooltip(info.el, {
            title: `${info.event.title}\n${moment(info.event.start).format('LLL')}${info.event.end ? ` - ${moment(info.event.end).format('LLL')}` : ''}\n${info.event.extendedProps.description || ''}`,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
        });
    }

    // Committee Management
    function renderCommitteeChips(committees) {
        committeeChips.innerHTML = '';
        committees.forEach(committee => {
            const chip = document.createElement('div');
            chip.className = 'chip';
            chip.innerHTML = `
                ${committee}
                <span class="remove-chip" data-committee="${committee}">&times;</span>
            `;
            committeeChips.appendChild(chip);
        });

        // Add click handlers
        document.querySelectorAll('.remove-chip').forEach(button => {
            button.addEventListener('click', () => {
                removeCommittee(button.dataset.committee);
            });
        });
    }

    function removeCommittee(committee) {
        const option = eventCommittees.querySelector(`option[value="${committee}"]`);
        if (option) {
            option.selected = false;
            renderCommitteeChips(Array.from(eventCommittees.selectedOptions).map(opt => opt.value));
        }
    }

    // Event Handlers for Committee Selection
    document.getElementById('addCommitteeBtn').addEventListener('click', () => {
        eventCommittees.style.display = 'block';
        eventCommittees.size = 5;
        eventCommittees.focus();
    });

    eventCommittees.addEventListener('change', function() {
        renderCommitteeChips(Array.from(this.selectedOptions).map(opt => opt.value));
        this.style.display = 'none';
    });

    eventCommittees.addEventListener('blur', function() {
        this.style.display = 'none';
    });

    // Modal Management
    function openModal(event, start, end) {
        const modalTitle = document.getElementById('eventModalLabel');
        const eventId = document.getElementById('eventId');
        const eventTitle = document.getElementById('eventTitle');
        const eventDescription = document.getElementById('eventDescription');
        const eventStart = document.getElementById('eventStart');
        const eventEnd = document.getElementById('eventEnd');
        const deleteBtn = document.getElementById('deleteBtn');

        const now = new Date();
        const minDateTime = now.toISOString().slice(0, 16);

        eventStart.min = minDateTime;
        eventEnd.min = minDateTime;

        if (event) {
            modalTitle.innerHTML = '<i class="bi bi-pencil-square me-2"></i> Edit Event';
            eventId.value = event.id;
            eventTitle.value = event.title;
            eventStart.value = moment(event.start).format('YYYY-MM-DDTHH:mm');
            eventEnd.value = event.end ? moment(event.end).format('YYYY-MM-DDTHH:mm') : '';
            eventDescription.value = event.extendedProps.description || '';
            deleteBtn.style.display = 'inline-block';

            // Set committees
            Array.from(eventCommittees.options).forEach(option => {
                option.selected = event.extendedProps.committees?.includes(option.value);
            });
            renderCommitteeChips(event.extendedProps.committees || []);
        } else {
            modalTitle.innerHTML = '<i class="bi bi-calendar-plus me-2"></i> Add New Event';
            eventForm.reset();
            eventId.value = '';
            eventStart.value = start && new Date(start) > now ? moment(start).format('YYYY-MM-DDTHH:mm') : '';
            eventEnd.value = end && new Date(end) > now ? moment(end).format('YYYY-MM-DDTHH:mm') : '';
            deleteBtn.style.display = 'none';
            renderCommitteeChips([]);
        }

        eventModal.show();
    }

    // Event CRUD Operations
    function saveEventToDatabase(eventData) {
        const selectedCommittees = Array.from(committeeChips.children).map(chip => 
            chip.textContent.replace('×', '').trim()
        );

        if (userType === 'SBMember') {
            const validCommittees = selectedCommittees.filter(committee => 
                userCommittees.includes(committee)
            );

            if (validCommittees.length === 0) {
                showError('You must select at least one committee you belong to.');
                return;
            }

            eventData.committees = validCommittees;
        } else {
            eventData.committees = selectedCommittees;
        }

        $.ajax({
            url: '/api/events/save',
            method: eventData.id ? 'PUT' : 'POST',
            data: JSON.stringify(eventData),
            contentType: 'application/json',
            success: handleEventSaveSuccess,
            error: handleEventSaveError
        });
    }

    function handleEventSaveSuccess(response) {
        const existingEvent = calendar.getEventById(response.id);
        if (existingEvent) {
            existingEvent.remove();
        }

        if (userType !== 'SBMember' || response.committees.some(committee => 
            userCommittees.includes(committee))
        ) {
            calendar.addEvent({
                id: response.id,
                title: response.title,
                start: response.start,
                end: response.end,
                extendedProps: {
                    description: response.description,
                    committees: response.committees
                }
            });

            eventModal.hide();
            updateEmptyMessageVisibility(calendar.getEvents());
            showSuccess('Event saved successfully');
        } else {
            showError('You do not have permission to add this event to your calendar.');
        }
    }

    function handleEventSaveError(xhr, status, error) {
        console.error('Error saving event:', error);
        showError('There was an error saving the event. Please try again.');
    }

    // Delete Event Handling
    document.getElementById('deleteBtn').addEventListener('click', () => {
        const eventId = document.getElementById('eventId').value;
        if (eventId) {
            eventToDelete = eventId;
            deleteConfirmModal.show();
        }
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
        if (eventToDelete) {
            deleteEventFromDatabase(eventToDelete);
            deleteConfirmModal.hide();
        }
    });

    function deleteEventFromDatabase(eventId) {
        $.ajax({
            url: `/api/events/${eventId}`,
            method: 'DELETE',
            success: function(response) {
                const event = calendar.getEventById(eventId);
                if (event) {
                    event.remove();
                }
                eventModal.hide();
                updateEmptyMessageVisibility(calendar.getEvents());
                showSuccess('Event deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error deleting event:', error);
                showError('There was an error deleting the event. Please try again.');
            }
        });
    }

    // Utility Functions
    function showSuccess(message) {
        toastr.success(message, 'Success');
    }

    function showError(message) {
        toastr.error(message, 'Error');
    }

    function updateEmptyMessageVisibility(events) {
        emptyMessage.style.display = events.length === 0 ? 'block' : 'none';
    }

    // Date Validation Functions
    function validateDates() {
        const start = new Date(document.getElementById('eventStart').value);
        const end = new Date(document.getElementById('eventEnd').value);
        const now = new Date();

        if (isNaN(start.getTime())) {
            showError('Please enter a valid start date and time.');
            return false;
        }

        if (isNaN(end.getTime())) {
            showError('Please enter a valid end date and time.');
            return false;
        }

        if (start < now) {
            showError('Start date and time cannot be in the past.');
            return false;
        }

        if (end < now) {
            showError('End date and time cannot be in the past.');
            return false;
        }

        if (end <= start) {
            showError('End date and time must be after the start date and time.');
            return false;
        }

        return true;
    }

    // Event Handlers for Date Inputs
    document.getElementById('eventStart').addEventListener('change', function() {
        if (this.value) {
            const startDateTime = new Date(this.value);
            const now = new Date();

            if (isNaN(startDateTime.getTime())) {
                showError('Please enter a valid start date and time.');
                this.value = '';
                return;
            }

            if (startDateTime < now) {
                showError('Start date and time cannot be in the past.');
                this.value = '';
                return;
            }

            const minEndDateTime = new Date(startDateTime.getTime() + 60000);
            document.getElementById('eventEnd').min = minEndDateTime.toISOString().slice(0, 16);

            const endDateTime = new Date(document.getElementById('eventEnd').value);
            if (endDateTime <= startDateTime) {
                document.getElementById('eventEnd').value = minEndDateTime.toISOString().slice(0, 16);
            }
        } else {
            document.getElementById('eventEnd').min = '';
        }
    });

    document.getElementById('eventEnd').addEventListener('change', function() {
        if (this.value) {
            const endDateTime = new Date(this.value);
            const now = new Date();

            if (isNaN(endDateTime.getTime())) {
                showError('Please enter a valid end date and time.');
                this.value = '';
                return;
            }

            if (endDateTime < now) {
                showError('End date and time cannot be in the past.');
                this.value = '';
                return;
            }

            const startDateTime = new Date(document.getElementById('eventStart').value);
            if (endDateTime <= startDateTime) {
                showError('End date and time must be after the start date and time.');
                this.value = '';
            }
        }
    });

    // Save Event Handler
    document.getElementById('saveBtn').addEventListener('click', function() {
        if (!validateDates()) {
            return;
        }

        const eventData = {
            id: document.getElementById('eventId').value,
            title: document.getElementById('eventTitle').value,
            start: document.getElementById('eventStart').value,
            end: document.getElementById('eventEnd').value,
            description: document.getElementById('eventDescription').value,
            committees: Array.from(eventCommittees.selectedOptions).map(option => option.value)
        };

        saveEventToDatabase(eventData);
    });

    // Initialize User Data
    function initializeUserData() {
        $.ajax({
            url: '/api/user-data',
            method: 'GET',
            success: function(data) {
                userType = data.userType;
                userCommittees = data.committees || [];
                
                // Update UI based on user type
                updateUIForUserType(userType);
                
                // Fetch committees and refresh calendar
                fetchAllCommittees();
                calendar.refetchEvents();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching user data:', error);
                showError('Failed to fetch user data. Please try again.');
            }
        });
    }

    // Update UI based on user type
    function updateUIForUserType(userType) {
        const addCommitteeBtn = document.getElementById('addCommitteeBtn');
        if (userType === 'SBMember') {
            addCommitteeBtn.classList.add('disabled');
            addCommitteeBtn.title = 'Committee selection is restricted for SB Members';
        } else {
            addCommitteeBtn.classList.remove('disabled');
            addCommitteeBtn.title = 'Add Committee';
        }
    }

    // Fetch Events Function
    function fetchEvents(fetchInfo, successCallback, failureCallback) {
        $.ajax({
            url: '/api/events',
            method: 'GET',
            data: { 
                userType: userType, 
                committees: userCommittees.join(','),
                start: fetchInfo.start.toISOString(),
                end: fetchInfo.end.toISOString()
            },
            success: function(events) {
                const formattedEvents = events.map(event => ({
                    id: event.id,
                    title: event.title,
                    start: new Date(event.start),
                    end: new Date(event.end),
                    extendedProps: {
                        description: event.description,
                        committees: Array.isArray(event.committees) ? event.committees : []
                    }
                }));

                const filteredEvents = userType === 'SBMember' 
                    ? formattedEvents.filter(event => 
                        event.extendedProps.committees.some(committee => 
                            userCommittees.includes(committee)
                        )
                    )
                    : formattedEvents;

                updateEmptyMessageVisibility(filteredEvents);
                successCallback(filteredEvents);
            },
            error: function(error) {
                console.error('Error fetching events:', error);
                failureCallback(error);
                showError('Failed to fetch events. Please try again.');
            }
        });
    }

    // Fetch Committees Function
    function fetchAllCommittees() {
        $.ajax({
            url: '/api/committees',
            method: 'GET',
            success: function(committees) {
                eventCommittees.innerHTML = '';
                committees.forEach(function(committee) {
                    if (userType !== 'SBMember' || userCommittees.includes(committee.name)) {
                        const option = document.createElement('option');
                        option.value = committee.name;
                        option.textContent = committee.name;
                        eventCommittees.appendChild(option);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching committees:', error);
                showError('Failed to fetch committees. Please try again.');
            }
        });
    }

    // Update Event Function
    function updateEvent(event) {
        const eventData = {
            id: event.id,
            title: event.title,
            start: event.start.toISOString(),
            end: event.end ? event.end.toISOString() : null,
            description: event.extendedProps.description,
            committees: event.extendedProps.committees
        };
        saveEventToDatabase(eventData);
    }

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // ESC key closes modals
        if (e.key === 'Escape') {
            eventModal.hide();
            deleteConfirmModal.hide();
        }

        // Enter key saves event when modal is open and form is valid
        if (e.key === 'Enter' && document.getElementById('eventModal').classList.contains('show')) {
            if (eventForm.checkValidity()) {
                document.getElementById('saveBtn').click();
            }
        }
    });

    // Add responsive calendar height adjustment
    function updateCalendarHeight() {
        const windowHeight = window.innerHeight;
        const headerHeight = document.querySelector('.page-header').offsetHeight;
        const padding = 40; // Adjust this value based on your layout
        const minHeight = 400; // Minimum calendar height

        const calculatedHeight = windowHeight - headerHeight - padding;
        const newHeight = Math.max(calculatedHeight, minHeight);
        
        calendar.setOption('height', newHeight);
    }

    // Update calendar height on window resize
    window.addEventListener('resize', _.debounce(updateCalendarHeight, 250));

    // Initial calendar height update
    updateCalendarHeight();
});
</script>

@endsection