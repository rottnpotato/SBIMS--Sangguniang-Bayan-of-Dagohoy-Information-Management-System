<!DOCTYPE html>
<html lang="en" style="position: relative; min-height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sangguniang Bayan Organizational Structure</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        :root {
            --ph-blue: #0038A8;
            --ph-red: #CE1126;
            --ph-yellow: #FCD116;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(0,56,168,0.05), rgba(206,17,38,0.05));
            min-height: 100vh;
        }

        .page-header {
            background: linear-gradient(135deg, var(--ph-blue), var(--ph-red));
            padding: 2rem 0;
            margin-bottom: 3rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="%23FCD116"/></svg>') center/120px no-repeat;
            opacity: 0.1;
        }

        .org-chart {
            display: flex;
            justify-content: center;
            padding: 2rem 1rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .org-tree {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3rem;
            width: 100%;
        }

        .org-tree-children {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            width: 100%;
            padding: 0 1rem;
            position: relative;
        }

        .org-tree-children::before {
            content: '';
            position: absolute;
            top: -2rem;
            left: 50%;
            transform: translateX(-50%);
            height: 2rem;
            width: 2px;
            background: linear-gradient(to bottom, var(--ph-blue), var(--ph-red));
        }

        .org-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            width: 250px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .org-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, var(--ph-blue), var(--ph-red));
        }

        .org-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            cursor: pointer;
        }

        .org-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
        }

        .org-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--ph-blue);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .org-position {
            font-size: 0.9rem;
            color: var(--ph-red);
            font-weight: 500;
            text-align: center;
        }

        @media (max-width: 1200px) {
            .org-tree-children {
                gap: 1.5rem;
            }
            
            .org-card {
                width: 220px;
            }
        }

        @media (max-width: 768px) {
            .org-tree-children {
                gap: 1rem;
            }
            
            .org-card {
                width: calc(50% - 1rem);
                min-width: 200px;
            }
            
            .org-avatar {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 480px) {
            .org-card {
                width: 100%;
                max-width: 280px;
            }
        }
         .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 10000;
            backdrop-filter: blur(8px);
        }

        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            z-index: 10001;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

       

        .modal-header {
            display: flex;
            align-items: center;
            padding: 2rem;
            background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
            color: white;
        }

        .modal-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 2rem;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-title {
            flex-grow: 1;
        }

        .modal-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .modal-position {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            padding: 2rem;
            overflow-y: auto;
            text-align: justify;
        }

        .modal-section {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .modal-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .modal-section-title {
            font-size: 1rem;
            font-weight: 600;
            color: #6e8efb;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal-section-content {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.6;
        }

        .close-button {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-section.experience {
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .modal-content {
                padding: 1.5rem;
            }

            .modal-section {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('inc.client_nav')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Sangguniang Bayan Organizational Structure</h1>
        <div id="orgChart" class="org-chart"></div>
    </div>

     
    <!-- Updated Modal Template -->
   <div id="modalOverlay" class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <img id="modalAvatar" class="modal-avatar" src="" alt="Member">
            <div class="modal-title">
                <div id="modalName" class="modal-name"></div>
                <div id="modalPosition" class="modal-position"></div>
            </div>
            <button class="close-button" onclick="closeModal()">×</button>
        </div>
        <div class="modal-content">
            <div class="modal-section">
                <div class="modal-section-title">Committee</div>
                <div class="modal-section-content">
                    <div id="modalCommittee"></div>
                </div>
            </div>
            <div class="modal-section">
                <div class="modal-section-title">Term</div>
                <div class="modal-section-content">
                    <div id="modalTerm"></div>
                </div>
            </div>
            <div class="modal-section experience">
                <div class="modal-section-title">Biography</div>
                <div class="modal-section-content">
                    <div id="modalBiography"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('inc.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let membersData = [];

        function loadSBMembers() {
            fetch('/sb-members/view')
                .then(response => response.json())
                .then(data => {
                    membersData = data;
                    updateOrgChart();
                });
        }

        function updateOrgChart() {
            const orgChart = document.getElementById('orgChart');
            orgChart.innerHTML = '';

            const hierarchy = {
                viceMayor: null,
                councilors: [],
                skChairman: null,
                secretary: null,
                lnb: null
            };

            membersData.forEach(member => {
                let pos = member.position.toLowerCase();
                switch(pos) {
                    case 'vice mayor':
                        hierarchy.viceMayor = member;
                        break;
                    case 'councilor':
                        if (hierarchy.councilors.length < 8) {
                            hierarchy.councilors.push(member);
                        }
                        break;
                    case 'representative, ppsk president':
                        hierarchy.skChairman = member;
                        break;
                    case 'secretary':
                        hierarchy.secretary = member;
                        break;
                    case 'representative, lnb president':
                        hierarchy.lnb = member;
                        break;
                }
            });

            const chart = document.createElement('div');
            chart.className = 'org-tree';

            if (hierarchy.viceMayor) {
                chart.appendChild(createMemberElement(hierarchy.viceMayor));
            }

            const councilorsContainer = document.createElement('div');
            councilorsContainer.className = 'org-tree-children';

            hierarchy.councilors.forEach(councilor => {
                councilorsContainer.appendChild(createMemberElement(councilor));
            });

            if (hierarchy.skChairman) {
                councilorsContainer.appendChild(createMemberElement(hierarchy.skChairman));
            }
            if (hierarchy.lnb) {
                councilorsContainer.appendChild(createMemberElement(hierarchy.lnb));
            }

            chart.appendChild(councilorsContainer);

            if (hierarchy.secretary) {
                const staffContainer = document.createElement('div');
                staffContainer.className = 'org-tree-children';
                staffContainer.appendChild(createMemberElement(hierarchy.secretary));

                hierarchy.officeStaff.forEach(staff => {
                    staffContainer.appendChild(createMemberElement(staff));
                });

                chart.appendChild(staffContainer);
            }

            orgChart.appendChild(chart);
        }

        function createMemberElement(member) {
            const memberDiv = document.createElement('div');
            memberDiv.className = 'org-card';
            memberDiv.onclick = () => showModal(member);

            memberDiv.innerHTML = `
                <div class="org-card-header">
                    <img src="/sb-members/serve/${member.id}" alt="${'Hon. '+member.first_name +' '+member.last_name}" class="org-avatar">
                    <div class="org-name">${'Hon. '+member.first_name+ ' '+ member.last_name}</div>
                    <div class="org-position">${member.position}</div>
                </div>
            `;

            return memberDiv;
        }

        function showModal(member) {
            document.getElementById('modalAvatar').src = `/sb-members/serve/${member.id}`;
            document.getElementById('modalName').textContent = 'Hon. '+ member.first_name +' '+member.last_name;
            document.getElementById('modalPosition').textContent = member.position;
            document.getElementById('modalCommittee').textContent = member.committee;
            document.getElementById('modalTerm').textContent = `${member.termStart} - ${member.termEnd}`;
            document.getElementById('modalBiography').textContent = member.biography;

            document.getElementById('modalOverlay').style.display = 'block';
            document.getElementById('customModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
            document.getElementById('customModal').style.display = 'none';
        }

        // Close modal when clicking outside
        document.getElementById('modalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
       // $('.close-button').add
        $(".close-button").on('click', function(e) {
            closeModal();
        });

        loadSBMembers();
    });
    </script>
</body>
</html>