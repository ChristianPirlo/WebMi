@extends('superadmin.layout.main')
@section('title', 'Risalah')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="../../css/tableSADash.css">

</head>
<body>
    <div class="table-container">
        <h2>DAFTAR APPROVAL</h2>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Grup</th>
                        <th>Nama Grup</th>
                        <th>Unit</th>
                        <th>Perusahaan</th>
                        <th>Kriteria</th>
                        <th>Tema</th>
                        <th>Judul</th>
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
                        <td>Sido IT</td>
                        <td>IT</td>
                        <td>Sido Muncul</td>
                        <td>SGA</td>
                        <td>Efisiensi</td>
                        <td>Improvement</td>

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
            </form>
            <button class="popup-close" id="popup-close-id">Close</button>
        </div>
    </div>

<!-- Popup for Table -->
<div class="popup" id="popup-table">
    <div class="popup-content">
        <h2>Detail Approval</h2>
        <table class="popup-table">
            <thead>
                <tr>
                    <th>ID Grup</th>
                    <th>Status</th>
                    <th>Perner</th>
                    <th>Nama</th>
                    <th>Keputusan</th>
                </tr>
            </thead>
            <tbody id="popup-table-body">
                <tr>
                    <td>72354534</td>
                    <td>Langkah 1</td>
                    <td>12467001</td>
                    <td>John Doe</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-acc" onclick="openApproveModal()">Approve</button>
                            <button class="btn-reject" onclick="openRejectModal()">Reject</button>
                        </div>
                    </td>
                </tr>


            </tbody>
        </table>
        <button class="popup-close" id="popup-close-table">Close</button>
    </div>
</div>


<!-- Modal Approve -->
<div id="modal-approve" class="modal approve-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeApproveModal()">&times;</span>
        <h2>Approve Notes</h2>
        <textarea id="approve-notes" placeholder="Enter your approval notes..." rows="5"></textarea>
        <div class="modal-actions">
            <button class="btn-submit" onclick="submitApproveNotes()">Submit</button>
            <button class="btn-cancel" onclick="closeApproveModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- Modal Reject -->
<div id="modal-reject" class="modal reject-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeRejectModal()">&times;</span>
        <h2>Reject Notes</h2>
        <textarea id="reject-notes" placeholder="Enter your rejection notes..." rows="5"></textarea>
        <div class="modal-actions">
            <button class="btn-submit" onclick="submitRejectNotes()">Submit</button>
            <button class="btn-cancel" onclick="closeRejectModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- Popup Modal for Keterangan (Comment Form) -->
<div class="popup-keterangan" id="popup-keterangan" style="display: none;">
    <div class="popup-content">
        <h3>Berikan Keterangan</h3>
        <form id="keterangan-form">
            <div class="form-group">
                <label for="keterangan">Komentar:</label>
                <textarea id="keterangan" name="keterangan" rows="4" required placeholder="Tuliskan keterangan..."></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Submit</button>
                <button type="button" class="popup-close" id="popup-close-keterangan">Close</button>
            </div>
        </form>
        <div id="success-message" style="display: none; color: green;">
            Komentar berhasil disubmit!
        </div>
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


    <script>
// Script popup

// Ambil elemen popup dan tombol close
const popupId = document.getElementById("popup-id");
const popupJudul = document.getElementById("popup-judul");
const popupTable = document.getElementById("popup-table");
const popupKeterangan = document.getElementById("popup-keterangan"); // New popup for comments
const popupCloseIdButton = document.getElementById("popup-close-id");
const popupCloseJudulButton = document.getElementById("popup-close-judul");
const popupCloseTableButton = document.getElementById("popup-close-table");
const popupCloseKeteranganButton = document.getElementById("popup-close-keterangan"); // Close button for Keterangan popup

// Fungsi untuk membuka popup ID Pendaftaran
function openIdPopup(id, tanggal, tema) {
    // Isi data ID Pendaftaran pada form
    document.getElementById("id-pendaftaran").value = id;
    popupId.style.display = "block";
}

// Fungsi untuk membuka popup Table
function openTablePopup() {
    popupTable.style.display = "block";
}

// Fungsi untuk membuka popup Keterangan (Comment Form)
function openKeteranganPopup() {
    popupKeterangan.style.display = "block"; // Show the comment form popup
}

// Fungsi untuk menutup popup ID Pendaftaran
function closeIdPopup() {
    popupId.style.display = "none";
}

// Fungsi untuk menutup popup Table
function closeTablePopup() {
    popupTable.style.display = "none";
}

// Fungsi untuk menutup popup Keterangan
function closeKeteranganPopup() {
    popupKeterangan.style.display = "none";
}

// Menangani klik pada tombol ID Pendaftaran untuk membuka popup ID Pendaftaran
document.querySelectorAll(".popup-btn-id").forEach(button => {
    button.addEventListener("click", (e) => {
        const id = e.target.getAttribute("data-id");
        const label = e.target.getAttribute("data-label");
        openIdPopup(id, "19/11/2024", "Effrsnsbf");
    });
});

// Menangani klik pada tombol Status untuk membuka popup Table
document.querySelectorAll(".popup-btn-status").forEach(button => {
    button.addEventListener("click", openTablePopup);
});

// Menangani klik pada tombol Keterangan untuk membuka popup Keterangan
document.querySelectorAll(".open-modal-button2").forEach(button => {
    button.addEventListener("click", openKeteranganPopup);
});

// Menangani klik pada tombol close di popup ID Pendaftaran
popupCloseIdButton.addEventListener("click", closeIdPopup);

// Menangani klik pada tombol close di popup Table
popupCloseTableButton.addEventListener("click", closeTablePopup);

// Menangani klik pada tombol close di popup Keterangan
popupCloseKeteranganButton.addEventListener("click", closeKeteranganPopup);

// Handle submit button in the Keterangan form
const keteranganForm = document.getElementById("keterangan-form"); // Assuming the form has this ID
if (keteranganForm) {
    keteranganForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        // Tampilkan pesan berhasil menggunakan alert window
        alert('Komentar berhasil disubmit!');

        // Close only the Keterangan popup
        closeKeteranganPopup();
    });
}


// Ambil elemen modal dan tombol close untuk Detail Approval
const modal = document.getElementById('modal-detail-approval');
const closeModalButton = document.getElementById('modal-close');

// Fungsi untuk membuka modal Detail Approval
function openModal(step) {
    modal.style.display = 'flex';
    const modalTitle = modal.querySelector('h3');
    modalTitle.textContent = Detail Approval - ${step};
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

// Upload functionality (unchanged)
document.querySelectorAll('.upload-icon').forEach(item => {
    item.addEventListener('click', function() {
        document.getElementById('upload-modal').style.display = 'block';
    });
});

document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('upload-modal').style.display = 'none';
});

document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const fileInput = document.getElementById('upload-file');
    if (fileInput.files.length > 0) {
        alert('File uploaded successfully!');
        document.getElementById('upload-modal').style.display = 'none';
    } else {
        alert('Please select a file to upload.');
    }
});

document.getElementById('select-file').addEventListener('change', function() {
    var selectedFileType = this.value;
    document.getElementById('upload-pdf-container').style.display = 'none';
    document.getElementById('upload-link-container').style.display = 'none';

    if (selectedFileType === 'pdf') {
        document.getElementById('upload-pdf-container').style.display = 'block';
    } else if (selectedFileType === 'excel') {
        document.getElementById('upload-link-container').style.display = 'block';
    }
});

document.getElementById('upload-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var fileInput = document.getElementById('upload_file');
    var linkInput = document.getElementById('link');
    var fileType = document.getElementById('select-file').value;

    if (fileType === "pdf" && !fileInput.files.length) {
        alert('Please select a PDF file.');
    } else if (fileType === "excel" && !linkInput.value) {
        alert('Please provide a link for the Excel file.');
    } else {
        alert('Form submitted successfully!');
        document.getElementById('upload-modal').style.display = 'none';
    }
});

document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('upload-modal').style.display = 'none';
});

// Approve Modal Functions
function openApproveModal() {
    document.getElementById("modal-approve").style.display = "flex";
}

function closeApproveModal() {
    document.getElementById("modal-approve").style.display = "none";
}

function submitApproveNotes() {
    const notes = document.getElementById("approve-notes").value.trim();
    if (notes === "") {
        alert("Please provide approval notes before submitting.");
        return;
    }
    alert("Approval Notes: " + notes);
    closeApproveModal();
}

// Reject Modal Functions
function openRejectModal() {
    document.getElementById("modal-reject").style.display = "flex";
}

function closeRejectModal() {
    document.getElementById("modal-reject").style.display = "none";
}

function submitRejectNotes() {
    const notes = document.getElementById("reject-notes").value.trim();
    if (notes === "") {
        alert("Please provide rejection notes before submitting.");
        return;
    }
    alert("Rejection Notes: " + notes);
    closeRejectModal();
}



    </script>

</body>
</html>


@endsection
