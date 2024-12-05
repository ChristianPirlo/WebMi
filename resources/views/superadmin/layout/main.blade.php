<!DOCTYPE html>
<html lang="id">
<head>
    <title>Komite Page</title>
    <link rel="stylesheet" href="../../css/main.css">
    <script>
        function confirmLogout() {
            // Tampilkan pesan konfirmasi sebelum logout
            const isConfirmed = confirm("Apakah anda yakin akan logout?");
            if (isConfirmed) {
                // Jika pengguna mengonfirmasi, redirect ke halaman login
                window.location.href = '/';
            }
        }
        function logout() {
            // Redirect ke halaman login
            window.location.href = '/';
        }

        // Fungsi untuk menandai menu yang aktif
        function setActiveMenu() {
            const currentPath = window.location.pathname; // Mendapatkan path saat ini
            const menuItems = document.querySelectorAll('.menu a'); // Mengambil semua item menu

            menuItems.forEach(item => {
                // Jika href dari item menu sama dengan currentPath, tambahkan kelas 'active'
                if (item.getAttribute('href') === currentPath) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Panggil fungsi setActiveMenu saat halaman dimuat
        window.onload = setActiveMenu;
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Link Font Awesome -->
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img alt="Company Logo" height="50" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjRZ2eBIK7J28Q2tzynxNN46eOCuHedxyjmm8MleF0TMQT_7cftWzZVdMEbRRnLFfC4BPtCCJIC3YHMQ2riJ-dYuHSpPFLadgOLqoe082QjKRNAsNKDi6BNt9GNncXb-VQhjszu061LFv6D6mFg6h9bhLlgzyK7I338dD5a9C0tTpYvqodxfSxR0oyYTeBF/w1200-h630-p-k-no-nu/Sidomuncul%20Logo.png" width="150"/>
        </div>
        <div class="menu">
            <a href="/superadmin/home">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
            <a href="/superadmin/daftarApproval">
                <i class="fas fa-check"></i>
                Daftar Approval
            </a>
            <a href="/superadmin/daftarImprovementSA">
                <i class="fas fa-list"></i>
                Daftar Improvement
            </a>
            <a href="/superadmin/arsip">
                <i class="fas fa-book"></i>
                Arsip SMIF
            </a>
            <a href="/superadmin/report">
                <i class="fas fa-chart-bar"></i>
                Report SMIF
            </a>
        </div>
        <div class="logout">
            <img src="../images/gambarscft.png" class="logout-icon">
            <!-- Panggil fungsi confirmLogout ketika tombol Logout diklik -->
            <button onclick="confirmLogout()">
                <i class="fas fa-power-off"></i>
                Logout
            </button>
        </div>
    </div>
    <div class="content" style="flex-grow: 1;">
        <div class="topbar">
            <h3>E-SMIF</h3>

            <div class="profile-icon">C</div>
        </div>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
