
<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Schedule</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">

      <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/Header-Blue.css') }}>
      <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/app.css') }}>

      <style>
         .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-light .navbar-nav .nav-link {
            color: #1a5f7a;
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #0056b3;
            background-color: rgba(0,0,0,0.05);
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .content-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
        padding: 30px;
    }
    .calendar-section {
        flex: 1 1 50%;
        min-width: 300px;
    }
    .announcements-section {
        flex: 1 1 40%;
        min-width: 300px;
        max-height: 600px;  /* Increased max-height */
        overflow-y: auto;
    }
    .section-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        padding: 25px;
    }
    .section-header {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e0e0e0;
    }
    #calendar {
        height: 600px;  /* Reduced height */
    }
    .event-category {
        font-size: 1.2rem;
        font-weight: 600;
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e0e0e0;
    }
    .announcement-item {
        border-left: 4px solid transparent;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }
    .announcement-item:hover {
        background-color: #f8f9fa;
        border-left-width: 6px;
    }
    .announcement-item.current {
        border-left-color: #28a745;
    }
    .announcement-item.upcoming {
        border-left-color: #007bff;
    }
    .announcement-item.past {
        border-left-color: #6c757d;
    }
    .announcement-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    .announcement-date {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
    }
    .announcement-details {
        background-color: #f8f9fa;
        border-radius: 4px;
        padding: 0.75rem;
        margin-top: 0.5rem;
        font-size: 0.9rem;
    }
    .announcement-details p {
        margin-bottom: 0.5rem;
    }
    .announcement-details p:last-child {
        margin-bottom: 0;
    }
    @media (max-width: 1024px) {
        .calendar-section, .announcements-section {
            flex: 1 1 100%;
        }
    }
    /* Event Modal Styles */
    /* Event Modal Styles */
    .modal-content {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 1rem 1.5rem;
        position: relative;
    }
    .modal-title {
        color: #495057;
        font-size: 1.25rem;
        font-weight: 600;
    }
    .modal-close-btn {
        position: absolute;
        top: 1rem;
        right: 1.5rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #6c757d;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }
    .modal-close-btn:hover {
        color: #343a40;
    }
    .modal-body {
        padding: 1.5rem;
    }
    #modalEventTitle {
        color: #212529;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    #modalEventDate, #modalEventTime {
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    #modalEventDescription {
        color: #495057;
        font-size: 1rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
    }
    .modal-body h4 {
        color: #495057;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }
    #modalEventCommittees {
        padding-left: 0;
    }
    #modalEventCommittees li {
        background-color: #e9ecef;
        border: none;
        border-radius: 4px;
        color: #495057;
        display: inline-block;
        font-size: 0.9rem;
        margin: 0 0.5rem 0.5rem 0;
        padding: 0.25rem 0.75rem;
    }
</style>
   </head>
   <body>     
      @include('inc.client_nav')
      <div class="container">
        <div class="content-wrapper">
            <div class="calendar-section">
                <div class="section-container">
                    <h2 class="section-header">Event Calendar</h2>
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="announcements-section">
                <div class="section-container">
                    <h2 class="section-header">Announcements</h2>
                    <ul id="announcements-list" class="list-group">
                        <!-- Announcements will be dynamically inserted here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

  
<!-- Event Modal HTML structure -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <h3 id="modalEventTitle"></h3>
                <p id="modalEventDate"></p>
                <p id="modalEventTime"></p>
                <p id="modalEventDescription"></p>
                <h4>Committees:</h4>
                <ul id="modalEventCommittees" class="list-unstyled"></ul>
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
<!-- Script loading -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                height: 'auto',
                events: '/api/events',
                eventClick: function(info) {
                    showEventDetails(info.event);
                }
            });

            calendar.render();

            function showEventDetails(event) {
        document.getElementById('modalEventTitle').textContent = event.title;
        document.getElementById('modalEventDate').textContent = `Date: ${event.start.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}`;
        document.getElementById('modalEventTime').textContent = `Time: ${event.start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})} - ${event.end.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}`;
        document.getElementById('modalEventDescription').textContent = event.extendedProps.description || 'No description available';

        const committeesList = document.getElementById('modalEventCommittees');
        committeesList.innerHTML = '';
        if (event.extendedProps.committees && event.extendedProps.committees.length > 0) {
            event.extendedProps.committees.forEach(committee => {
                const li = document.createElement('li');
                li.textContent = committee;
                committeesList.appendChild(li);
            });
        } else {
            const li = document.createElement('li');
            li.textContent = 'No committees assigned';
            committeesList.appendChild(li);
        }

        var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
        eventModal.show();
    }

        function updateAnnouncements(events) {
        var announcementsList = document.getElementById('announcements-list');
        announcementsList.innerHTML = '';

        var now = new Date();
        var pastEvents = [];
        var currentEvents = [];
        var upcomingEvents = [];

        events.forEach(function(event) {
            var eventStart = new Date(event.start);
            var eventEnd = new Date(event.end);

            if (eventEnd < now) {
                pastEvents.push(event);
            } else if (eventStart <= now && eventEnd >= now) {
                currentEvents.push(event);
            } else {
                upcomingEvents.push(event);
            }
        });

        function createEventElement(event, category) {
            var li = document.createElement('li');
            li.className = `list-group-item announcement-item ${category.toLowerCase()}`;
            
            var title = document.createElement('div');
            title.className = 'announcement-title';
            title.textContent = event.title;
            li.appendChild(title);

            var date = document.createElement('div');
            date.className = 'announcement-date';
            date.textContent = new Date(event.start).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) +' - ' +new Date(event.end).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            li.appendChild(date);

            var details = document.createElement('div');
            details.className = 'announcement-details';
            details.style.display = 'none';
            details.innerHTML = `
                <p><strong>Time:</strong> ${new Date(event.start).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})} - ${new Date(event.end).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</p>
                <p><strong>Description:</strong> ${event.description || 'No description available'}</p>
                <p><strong>Committees:</strong> ${event.committees.join(', ') || 'None'}</p>
            `;
            li.appendChild(details);

            li.addEventListener('click', function() {
                details.style.display = details.style.display === 'none' ? 'block' : 'none';
            });

            return li;
        }

        function addEventCategory(title, events, category) {
            if (events.length > 0) {
                var header = document.createElement('h4');
                header.className = 'event-category';
                header.textContent = title;
                announcementsList.appendChild(header);
                events.forEach(event => announcementsList.appendChild(createEventElement(event, category)));
            }
        }

        addEventCategory('Current Events', currentEvents, 'Current');
        addEventCategory('Upcoming Events', upcomingEvents, 'Upcoming');
        addEventCategory('Past Events', pastEvents, 'Past');
    }

            // Fetch events and update announcements
            fetch('/api/events')
                .then(response => response.json())
                .then(events => {
                    updateAnnouncements(events);
                })
                .catch(error => console.error('Error fetching events:', error));

            const nav = document.querySelector('nav');
            const navbarBrand = document.createElement('div');
            navbarBrand.className = 'nav-title';
            navbarBrand.textContent = 'Schedules & Announcements';
            
            // Insert the title after the first child of nav (usually the logo)
            nav.insertBefore(navbarBrand, nav.firstChild.nextSibling);

            // Add animation after a short delay
            setTimeout(() => {
                navbarBrand.classList.add('visible');
            }, 100);
        });
    </script>
   </body>
</html>

