@extends('unit.layout.main')
@section('title', 'Dashboard')

@section('content')
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../../css/dashboard.css">

<div class="dashboard-content">

    <header class="main-header">
        <h1>Welcome, Department Groups!</h1>
    </header>

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
            <i class="fas fa-envelope stat-icon"></i>
            <div class="stat-info">
                <h3>4.000.000</h3>
                <p>Cost Savings</p>
            </div>
        </div>
    </section>

    <!-- Progress Tracker Section -->
    <section class="filter-section">
        <div class="filter-container">
            <select id="filterYear" class="filter">
                <option value="" disabled selected>Pilih Tahun</option>
                <option value="">Semua</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>

        <div class="filter-container">
            <select id="filterId" class="filter">
                <option value="" disabled selected>ID Pendaftaran</option>
                <option value="">Semua</option>
                <option value="ID001">ID001</option>
                <option value="ID002">ID002</option>
                <option value="ID003">ID003</option>
            </select>
        </div>

        <div class="filter-container">
            <select id="filterGroup" class="filter">
                <option value="" disabled selected>Pilih Grup</option>
                <option value="">Semua</option>
                <option value="Group A">Group A</option>
                <option value="Group B">Group B</option>
                <option value="Group C">Group C</option>
            </select>
        </div>


        <button id="applyFilter" class="filter-btn">
            <i class="fas fa-search"> </i> <!-- Ikon Font Awesome -->
        </button>

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

    {{-- <section class="task-section">
        <h2>To-Do List</h2>
        <ul class="task-list">
            <li><input type="checkbox"> Review project proposal <span>Due: Tomorrow</span></li>
            <li><input type="checkbox" checked> Submit monthly report <span>Completed</span></li>
            <li><input type="checkbox"> Plan team meeting <span>Due: 3 days</span></li>
        </ul>
    </section>

    <section class="recent-activities">
        <h2>Recent Activities</h2>
        <ul class="activity-list">
            <li><i class="fas fa-check-circle"></i> John Doe completed a task. <span>2 hours ago</span></li>
            <li><i class="fas fa-edit"></i> Settings updated by admin. <span>4 hours ago</span></li>
            <li><i class="fas fa-user-plus"></i> New user registered. <span>1 day ago</span></li>
        </ul>
    </section> --}}

</div>

<script>
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

    document.getElementById('applyFilter').addEventListener('click', function () {
        const filterId = document.getElementById('filterId').value;
        const filterGroup = document.getElementById('filterGroup').value;
        const filterYear = document.getElementById('filterYear').value;

        const steps = document.querySelectorAll('.step');

        steps.forEach(step => {
            const stepId = step.getAttribute('data-id');
            const stepGroup = step.getAttribute('data-group');
            const stepYear = step.getAttribute('data-year');

            // Jika semua filter kosong (default), tampilkan semua indikator
            if (filterId === '' && filterGroup === '' && filterYear === '') {
                step.style.display = 'inline-block'; // Tampilkan semua indikator
            } else {
                // Tampilkan indikator yang sesuai dengan filter
                if (
                    (filterId === '' || filterId === stepId) &&
                    (filterGroup === '' || filterGroup === stepGroup) &&
                    (filterYear === '' || filterYear === stepYear)
                ) {
                    step.style.display = 'inline-block'; // Tampilkan indikator yang sesuai
                } else {
                    step.style.display = 'none'; // Sembunyikan indikator yang tidak sesuai
                }
            }
        });
    });
</script>

@endsection
