@extends('unit.layout.main')
@section('title', 'Dashboard')

@section('content')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../../css/dashboard.css">

<div class="dashboard-content">

    <div class="dashboard-content">

        <header class="main-header">
            <div class="filter-container">

                <label for="filterYear">Tahun:</label>
                <select id="filterYear">
                    <option value="" disabled>Pilih Tahun</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>

                <label for="filterGroup">Grup:</label>
                <select id="filterGroup">
                    <option value="" disabled selected>Pilih Grup</option>
                    <option value="Group A">Group A</option>
                    <option value="Group B">Group B</option>
                    <option value="Group C">Group C</option>
                </select>

                <button id="applyFilter">Search</button>

            </div>

        </header>
    </div>


    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <div class="stat-info">
                <h3>5</h3>
                <p>Jumlah Komite</p>
            </div>
        </div>
        <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <div class="stat-info">
                <h3>69</h3>
                <p>Jumlah Unit</p>
            </div>
        </div>
        <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <div class="stat-info">
                <h3>100</h3>
                <p>Jumlah Grup</p>
            </div>
        </div>
        <div class="stat-card">
            <i class="fas fa-money-bill-wave stat-icon"></i>
            <div class="stat-info">
                <h3>4.000.000</h3>
                <p>Cost Savings</p>
            </div>
        </div>
    </section>

    <!-- Progress Tracker Section -->
    <section class="progress-tracker">
        <h2>Progress Langkah</h2>
        <div class="progress-indicator-wrapper">
            <div class="progress-indicator">
                <div class="step step-1 active" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-2" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-3" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-4" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-5" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-6" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-7" data-id="ID001" data-group="Group A" data-year="2024"></div>
                <div class="step step-8" data-id="ID001" data-group="Group A" data-year="2024"></div>
            </div>
            <div class="step-numbers">
                <span>Langkah 1</span>
                <span>Langkah 2</span>
                <span>Langkah 3</span>
                <span>Langkah 4</span>
                <span>Langkah 5</span>
                <span>Langkah 6</span>
                <span>Langkah 7</span>
                <span>Langkah 8</span>
            </div>
        </div>
    </section>

</div>

<script>
   // Set the default year to current year
   document.addEventListener('DOMContentLoaded', function() {
        const filterYear = document.getElementById('filterYear');
        const currentYear = new Date().getFullYear();

        // Set default year option to current year
        filterYear.value = currentYear;

        document.getElementById('applyFilter').addEventListener('click', function () {
            const selectedYear = filterYear.value;
            const filterGroup = document.getElementById('filterGroup').value;

            const steps = document.querySelectorAll('.step');

            steps.forEach(step => {
                const stepYear = step.getAttribute('data-year');
                const stepGroup = step.getAttribute('data-group');

                if (
                    (selectedYear === '' || selectedYear === stepYear) &&
                    (filterGroup === '' || filterGroup === stepGroup)
                ) {
                    step.style.display = 'inline-block';
                } else {
                    step.style.display = 'none';
                }
            });
        });

        // Optional: Automatically trigger the filter when the page loads with default selection
        document.getElementById('applyFilter').click();
    });

    document.addEventListener('DOMContentLoaded', function() {
        let steps = document.querySelectorAll('.step');
        let currentStep = 0;

        function activateStep(step) {
            steps[step].classList.add('active');
        }

        // Simulate progress over time (e.g., every 2 seconds)
        setInterval(function() {
            if (currentStep < steps.length) {
                activateStep(currentStep);
                currentStep++;
            }
        }, 2000); // Every 2 seconds
    });
</script>

@endsection
