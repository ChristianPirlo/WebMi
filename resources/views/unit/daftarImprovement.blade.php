@extends('unit.layout.main')
@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/tableUnitDash.css">
    <link rel="stylesheet" href="../../css/notifUnit.css">
</head>

<body>
    <div class="table-container">
        <h2>DELTA IMPROVEMENT</h2>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Pendaftaran</th>
                        <th>Unit</th>
                        <th>Perusahaan</th>
                        <th>Kriteria Improvement</th>
                        <th>Tema</th>
                        <th>Judul</th>
                        <th>Time Table</th>
                        <th>Tanggal</th>
                        <th>Tahap Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <!-- Tombol ID Pendaftaran yang memicu popup ID Pendaftaran -->
                            <button class="popup-btn-id" data-id="5755383" data-label="Detail ID Pendaftaran">72575003</button>
                        </td>
                        <td>IT</td>
                        <td>Sido Muncul</td>
                        <td>SGA</td>
                        <td>Efisiensi</td>
                        <td>Improvement</td>
                        <td>
                            <a href="timetable" class="popup-link">
                                <i class="fas fa-calendar-alt"></i>
                            </a>
                        </td>


                        <td>19/11/2024</td>
                        <td>
                            <!-- Tombol Status yang memicu popup Tabel -->
                            <button class="popup-btn-status">Langkah 1</button>
                        </td>
                    </tr>
                    <!-- Add other rows similarly -->
                </tbody>
            </table>
        </div>
    </div>

     <!-- Batas Suci -->
    <div class="popup" id="popup-id">
        <div class="popup-content">
            <h3 id="popup-id-title">Struktur Anggota</h3>

            <form id="popup-id-content">
                <div class="input-container">
                    <label for="id-pendaftaran">ID Pendaftaran</label>
                    <input type="text" id="id-pendaftaran" name="id-pendaftaran">
                </div>
                <div class="input-container">
                    <label for="sponsor">Nama Sponsor</label>
                    <input type="text" id="sponsor" name="sponsor">
                    <input type="text" class="short-input" id="short-sponsor" name="short-sponsor">
                </div>
                <div class="input-container">
                    <label for="fasilitator">Nama Fasilitator</label>
                    <input type="text" id="fasilitator" name="fasilitator">
                    <input type="text" class="short-input" id="short-fasilitator" name="short-fasilitator">
                </div>
                <div class="input-container">
                    <label for="ketua">Ketua Kelompok</label>
                    <input type="text" id="ketua" name="ketua">
                    <input type="text" class="short-input" id="short-ketua" name="short-ketua">
                </div>
                <div class="input-container">
                    <label for="sekretaris">Sekretaris</label>
                    <input type="text" id="sekretaris" name="sekretaris">
                    <input type="text" class="short-input" id="short-sekretaris" name="short-sekretaris">
                </div>
                <div class="input-container">
                    <label for="anggota1">Anggota 1</label>
                    <input type="text" id="anggota1" name="anggota1">
                    <input type="text" class="short-input" id="short-anggota1" name="short-anggota1">
                </div>
                <div class="input-container">
                    <label for="anggota2">Anggota 2</label>
                    <input type="text" id="anggota2" name="anggota2">
                    <input type="text" class="short-input" id="short-anggota2" name="short-anggota2">
                </div>
                <div class="input-container">
                    <label for="anggota3">Anggota 3</label>
                    <input type="text" id="anggota3" name="anggota3">
                    <input type="text" class="short-input" id="short-anggota3" name="short-anggota3">
                </div>
                <div class="input-container">
                    <label for="anggota4">Anggota 4</label>
                    <input type="text" id="anggota4" name="anggota4">
                    <input type="text" class="short-input" id="short-anggota4" name="short-anggota4">
                </div>
                <div class="input-container">
                    <label for="anggota5">Anggota 5</label>
                    <input type="text" id="anggota5" name="anggota5">
                    <input type="text" class="short-input" id="short-anggota5" name="short-anggota5">
                </div>
                <div class="input-container">
                    <label for="anggota6">Anggota 6</label>
                    <input type="text" id="anggota6" name="anggota6">
                    <input type="text" class="short-input" id="short-anggota6" name="short-anggota6">
                </div>
                <div class="input-container">
                    <label for="anggota7">Anggota 7</label>
                    <input type="text" id="anggota7" name="anggota7">
                    <input type="text" class="short-input" id="short-anggota7" name="short-anggota7">
                </div>
            </form>
            <a href="pendaftaran2" class="popup-edit" id="popup-edit-id">
                <i class="fas fa-edit"></i> Edit Pendaftaran
            </a>
            <!-- Tambahkan tombol Edit Pendaftaran -->

            <button class="popup-close" id="popup-close-id">Close</button>


        </div>
    </div>


    <!-- Popup for Form Judul -->
    <div class="popup" id="popup-judul">
        <div class="popup-content">
            <h3 id="popup-judul-title">Edit Judul</h3>
            <form id="popup-judul-content">
                <div>
                    <label for="judul-saat-ini">Judul Lama</label>
                    <input type="text" id="judul-saat-ini" name="judul-saat-ini">
                </div>
                <div>
                    <label for="judul-baru">Judul Baru</label>
                    <input type="text" id="judul-baru" name="judul-baru" required>
                </div>
                <div>
                    <label for="status">Alasan Perubahan Judul</label>
                    <input type="text" id="status" name="status" required>
                </div>

                <submit>Save</submit>
            </form>
            <table border="1" style="margin-top: 20px; width: 100%; text-align: left;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Saat Ini</th>
                        <th>Judul Baru</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Contoh Judul Lama</td>
                        <td>Contoh Judul Baru</td>
                        <td>Contoh Keterangan</td>
                        <td>20/11/2024</td>
                    </tr>
                </tbody>
            </table>

            <button class="popup-close" id="popup-close-judul">Close</button>
        </div>
    </div>

<!-- Popup for Table -->
<div class="popup" id="popup-table">
    <div class="popup-content">
        <h3>Detail Status</h3>
        <table class="popup-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Tahapan</th>
                    <th>Dokumen</th>
                    <th>Status Approval</th>
                    <th>Pengumpulan</th>
                </tr>
            </thead>
            <tbody id="popup-table-body">
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 1</td>
                    <td>Dokumen 1</td>
                     <td>
                        <button class="open-modal-button" data-step="Langkah 1">Langkah 1</button>
                    </td>
                    <td>
                        <label for="file-upload-1" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 2</td>
                    <td>Dokumen 2</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 2">Langkah 2</button>
                    </td>
                    <td>
                        <label for="file-upload-2" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 3</td>
                    <td>Dokumen 3</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 3">Langkah 3</button>
                    </td>
                    <td>
                        <label for="file-upload-3" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 4</td>
                    <td>Dokumen 4</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 4">Langkah 4</button>
                    </td>
                    <td>
                        <label for="file-upload-4" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 5</td>
                    <td>Dokumen 5</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 5">Langkah 5</button>
                    </td>
                    <td>
                        <label for="file-upload-5" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 6</td>
                    <td>Dokumen 6</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 6">Langkah 6</button>
                    </td>
                    <td>
                        <label for="file-upload-6" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>QCDSMPE </td>
                    <td>Dokumen QCDSMPE</td>
                    <td>
                        <button class="open-modal-button" data-step="qcdsmpe">QCDSMPE</button>
                    </td>
                    <td>
                        <a href="qcdsmpe" id="upload-link">
                            <i class="fa fa-upload" id="upload-icon"></i>
                          </a>

                          <!-- Sertakan link ke Font Awesome di dalam <head> -->
                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 7</td>
                    <td>Dokumen 7</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 6">Langkah 7</button>
                    </td>
                    <td>
                        <label for="file-upload-7" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>2024-11-19</td>
                    <td>Langkah 8</td>
                    <td>Dokumen 8</td>
                    <td>
                        <button class="open-modal-button" data-step="Langkah 6">Langkah 8</button>
                    </td>
                    <td>
                        <label for="file-upload-8" class="upload-icon">
                            <i class="fas fa-upload"></i>
                        </label>

                    </td>
                </tr>
            </tbody>
        </table>
        <button class="popup-close" id="popup-close-table">Close</button>
    </div>
</div>

<!-- Modal for Detail Approval -->
<div class="modal" id="modal-detail-approval">
    <div class="modal-content">
        <h3>Detail Approval</h3>
        <table class="detail-approval-table">
            <thead>
                <tr>
                    <th>Perner</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tanggal Approval</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>16372842</td>
                    <td>Pak ... </td>
                    <td>Mohon langkah selanjutnya..</td>
                    <td>Disetujui</td>
                    <td>20/11/2024</td>
                </tr>
                <tr>
                    <td>83292834</td>
                    <td>Bu ... </td>
                    <td>Mohon langkah selanjutnya..</td>
                    <td>Disetujui</td>
                    <td>20/11/2024</td>
                </tr>
            </tbody>
        </table>
        <button class="close-modal" id="modal-close">Close</button>
    </div>
</div>

<!-- Modal for Upload Risalah -->

<div class="modal" id="upload-modal">
    <div class="modal-content-upload">
        <h3>Upload Risalah</h3>
        <form id="upload-form">
            <!-- File type selection -->
            <div class="form-group">
                <label for="select-file">Pilih File</label>
                <select id="select-file" name="select-file" required>
                    <option value="" disabled selected>Pilih Tipe File</option>
                    <option value="pdf">Pdf</option>
                    <option value="excel">Excel</option>
                </select>
            </div>

            <!-- Upload PDF input field (hidden by default) -->
            <div class="form-group" id="upload-pdf-container" style="display: none;">
                <label for="upload_file">Upload PDF</label>
                <input type="file" id="upload_file" name="upload_file" accept=".pdf" />
            </div>

            <!-- Upload Link input field (hidden by default) -->
            <div class="form-group" id="upload-link-container" style="display: none;">
                <label for="link">Upload Link</label>
                <input type="text" id="link" name="link" />
            </div>

            <div class="form-actions">
                <button type="submit">Upload</button>
            </div>

            <div class="form-actions">
                <button type="close-modal" id="close-modal">Close</button>
            </div>
        </form>
    </div>
</div>

    <script>
// Script popup

// Ambil elemen popup dan tombol close
const popupId = document.getElementById("popup-id");
const popupJudul = document.getElementById("popup-judul");
const popupTable = document.getElementById("popup-table");
const popupCloseIdButton = document.getElementById("popup-close-id");
const popupCloseJudulButton = document.getElementById("popup-close-judul");
const popupCloseTableButton = document.getElementById("popup-close-table");

// Fungsi untuk membuka popup ID Pendaftaran
function openIdPopup(id, tanggal, tema) {
    // Isi data ID Pendaftaran pada form
    document.getElementById("id-pendaftaran").value = id;


    popupId.style.display = "block";
}

// Fungsi untuk membuka popup Judul
function openJudulPopup(judul) {
    // Isi data Judul pada form

    popupJudul.style.display = "block";
}

// Fungsi untuk membuka popup Table
function openTablePopup() {
    popupTable.style.display = "block";
}

// Fungsi untuk menutup popup ID Pendaftaran
function closeIdPopup() {
    popupId.style.display = "none";
}

// Fungsi untuk menutup popup Judul
function closeJudulPopup() {
    popupJudul.style.display = "none";
}

// Fungsi untuk menutup popup Table
function closeTablePopup() {
    popupTable.style.display = "none";
}

// Menangani klik pada tombol ID Pendaftaran untuk membuka popup ID Pendaftaran
document.querySelectorAll(".popup-btn-id").forEach(button => {
    button.addEventListener("click", (e) => {
        const id = e.target.getAttribute("data-id");
        const label = e.target.getAttribute("data-label");
        // Menampilkan popup untuk ID Pendaftaran dengan data
        openIdPopup(id, "19/11/2024", "Effrsnsbf");
    });
});

// Menangani klik pada tombol Judul untuk membuka popup Judul
document.querySelectorAll(".popup-btn-judul").forEach(button => {
    button.addEventListener("click", (e) => {
        const label = e.target.getAttribute("data-label");
        // Menampilkan popup untuk Judul
        openJudulPopup("Impdffjehf");
    });
});

// Menangani klik pada tombol Status untuk membuka popup Table
document.querySelectorAll(".popup-btn-status").forEach(button => {
    button.addEventListener("click", openTablePopup);
});

// Menangani klik pada tombol close di popup ID Pendaftaran
popupCloseIdButton.addEventListener("click", closeIdPopup);

// Menangani klik pada tombol close di popup Judul
popupCloseJudulButton.addEventListener("click", closeJudulPopup);

// Menangani klik pada tombol close di popup Table
popupCloseTableButton.addEventListener("click", closeTablePopup);


// Menangani pengiriman form Judul
document.getElementById("popup-judul-content").addEventListener("submit", (event) => {
    event.preventDefault(); // Mencegah pengiriman form biasa
    const judulBaru = document.getElementById("judul-baru").value;
    const keterangan = document.getElementById("status").value;

    // Proses data Judul yang telah

    console.log("Data Judul yang disimpan:", { judulBaru, keterangan });

    // Tutup popup setelah form disubmit
    closeJudulPopup();
});

// Script Modal

// Ambil elemen modal dan tombol close
const modal = document.getElementById('modal-detail-approval');
const closeModalButton = document.getElementById('modal-close');

// Fungsi untuk membuka modal
function openModal(step) {
    modal.style.display = 'flex';

    // Perbarui konten modal jika diperlukan
    const modalTitle = modal.querySelector('h3');
    modalTitle.textContent = `Detail Approval - ${step}`;
}

// Fungsi untuk menutup modal
function closeModal() {
    modal.style.display = 'none';
}

// Event listener untuk tombol close
closeModalButton.addEventListener('click', closeModal);

// Tutup modal jika area luar konten di klik
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

// Tambahkan event listener ke semua tombol dengan kelas open-modal-button
document.querySelectorAll('.open-modal-button').forEach((button) => {
    button.addEventListener('click', () => {
        const step = button.getAttribute('data-step'); // Ambil data langkah
        openModal(step); // Buka modal sesuai langkah
    });
});

//upload
// Function to open the modal when the upload icon is clicked
document.querySelectorAll('.upload-icon').forEach(item => {
    item.addEventListener('click', function() {
        // Show the modal
        document.getElementById('upload-modal').style.display = 'block';
    });
});

// Close modal when "Close" button is clicked
document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('upload-modal').style.display = 'none';
});

// Handle file upload form submission
document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const fileInput = document.getElementById('upload-file');

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        alert('File uploaded successfully!');
        // Close the modal after uploading
        document.getElementById('upload-modal').style.display = 'none';
    } else {
        alert('Please select a file to upload.');
    }
});

// Event listener for dropdown change
document.getElementById('select-file').addEventListener('change', function() {
    var selectedFileType = this.value;

    // Hide both fields initially
    document.getElementById('upload-pdf-container').style.display = 'none';
    document.getElementById('upload-link-container').style.display = 'none';

    // Show the appropriate field based on selected file type
    if (selectedFileType === 'pdf') {
        document.getElementById('upload-pdf-container').style.display = 'block'; // Show PDF upload field
    } else if (selectedFileType === 'excel') {
        document.getElementById('upload-link-container').style.display = 'block'; // Show link input field
    }
});

// Handle form submission (optional validation)
document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var fileInput = document.getElementById('upload_file');
    var linkInput = document.getElementById('link');
    var fileType = document.getElementById('select-file').value;

    if (fileType === "pdf" && !fileInput.files.length) {
        alert('Please select a PDF file.');
    } else if (fileType === "excel" && !linkInput.value) {
        alert('Please provide a link for the Excel file.');
    } else {
        alert('Form submitted successfully!');
        // You can perform AJAX or other logic here for submitting the form
        document.getElementById('upload-modal').style.display = 'none'; // Close the modal after submission
    }
});

// Handle close modal button
document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('upload-modal').style.display = 'none'; // Hide the modal
});


    </script>

</body>
</html>
@endsection
