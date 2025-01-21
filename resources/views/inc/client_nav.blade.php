<header class="main-header py-8">
        <div id="datetime" class="absolute top-2 right-2 text-sm text-gray-300"></div>
        <div class="container mx-auto px-4">
            <div class="header-content flex items-center space-x-8">
                <div class="flex-shrink-0">
                <a href="/">
                    <img src="{{ URL::asset('images/icons.png') }}" alt="Dagohoy Municipal Seal" class="w-32 h-32 object-contain">
                    </a>
                </div>
                <div class="flex-shrink-0">
                    <a href="/">
                    <img src="{{ URL::asset('images/phnew.png') }}" alt="Dagohoy Municipal Seal" class="w-32 h-32 object-contain">
                    </a>
                </div>
                <div class="text-left">
                <h1 class="text-4xl font-bold text-white mb-2">Sangguniang Bayan of Dagohoy</h1>
                    <p class="text-xl text-gray-200">Province of Bohol, Philippines</p>
                </div>
            </div>
        </div>
    </header>
@include('inc.Cnav')

    <style>
       
        .main-header {
            font-family: 'Poppins', sans-serif;
            background-image: url("{{ URL::asset('images/back.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .main-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 32, 63, 0.8); /* Slightly darker blue overlay */
        }
        .header-content {
            position: relative;
            z-index: 1;
        }
    </style>

<script>
function updateDateTime() {
    var now = new Date();
    var options = { 
        timeZone: 'Asia/Manila',
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit',
        second: '2-digit',
        hour12: true 
    };
    var formattedDateTime = now.toLocaleString('en-US', options);
    document.getElementById('datetime').textContent = formattedDateTime;
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>
    

