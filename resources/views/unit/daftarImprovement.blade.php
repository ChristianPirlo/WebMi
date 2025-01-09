@extends('unit.layout.main')
@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Pengajuan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../../css/tableUnitDash.css">
    <link rel="stylesheet" href="../../css/notifUnit.css">
    <style>
    </style>
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
                    @foreach($pendaftarans as $key => $pendaftaran)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <button class="popup-btn-id" data-id="{{ $pendaftaran->id_pendaftaran }}">
                                    {{ $pendaftaran->id_pendaftaran }}
                                </button>
                            </td>
                            <td>{{ $pendaftaran->unit }}</td>
                            <td>{{ $pendaftaran->pabrik }}</td>
                            <td>{{ $pendaftaran->kreteria_grup }}</td>
                            <td>{{ $pendaftaran->tema }}</td>
                            <td>{{ $pendaftaran->judul }}</td>
                            <td>
                                <a href="timetable" class="popup-link">
                                    <i class="fas fa-calendar-alt"></i>
                                </a>
                            </td>
                            <td>{{ $pendaftaran->created_at ? $pendaftaran->created_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                <button class="popup-btn-status" data-id="{{ $pendaftaran->id }}">Pendaftaran</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

 <!-- Modal untuk Upload -->
 <div class="modal" id="upload-modal" style="display: none;">
    <div class="modal-content-upload">
        <h3>Upload Risalah</h3>
        <form id="upload-form" method="POST" action="/unit/daftarImprovement" enctype="multipart/form-data">
            @csrf
            <!-- Hidden input untuk ID Pendaftaran -->
            <input type="hidden" id="id_pendaftaran" name="id_pendaftaran" />

            <!-- Pilihan tipe file -->
            <div class="form-group">
                <label for="select-file">Pilih File</label>
                <select id="select-file" name="file_type" required>
                    <option value="" disabled selected>Pilih Tipe File</option>
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                </select>
            </div>

            <!-- Upload PDF -->
            <div class="form-group" id="upload-pdf-container" style="display: none;">
                <label for="upload_file">Upload PDF</label>
                <input type="file" id="upload_file" name="upload_file" accept=".pdf" />
            </div>

            <!-- Upload Link -->
            <div class="form-group" id="upload-link-container" style="display: none;">
                <label for="link">Upload Link</label>
                <input type="text" id="link" name="link" />
            </div>

            <div class="form-actions">
                <button type="submit">Upload</button>
                <button id="close-modal">Close</button>
            </div>
        </form>
    </div>
</div>
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Popup Struktur Anggota -->
    <div class="popup" id="popup">
        <h3>Struktur Anggota</h3>
        <form id="struktur-form">
            <div class="input-container">
                <label for="id-pendaftaran">ID Pendaftaran</label>
                <input type="text" id="id-pendaftaran" name="id-pendaftaran" readonly required>
            </div>
            <div class="input-container">
                <label for="sponsor">Nama Sponsor</label>
                <input type="text" id="sponsor" name="sponsor" readonly>
                <input type="text" id="sponsor-perner" name="sponsor-perner" readonly>
            </div>
            <div class="input-container">
                <label for="fasilitator">Nama Fasilitator</label>
                <input type="text" id="fasilitator" name="fasilitator" readonly>
                <input type="text" id="fasilitator-perner" name="fasilitator-perner" readonly>
            </div>
            <div class="input-container">
                <label for="ketua">Ketua Kelompok</label>
                <input type="text" id="ketua" name="ketua" readonly>
                <input type="text" id="ketua-perner" name="ketua-perner" readonly>
            </div>
            <div class="input-container">
                <label for="sekretaris">Sekretaris</label>
                <input type="text" id="sekretaris" name="sekretaris" readonly>
                <input type="text" id="sekretaris-perner" name="sekretaris-perner" readonly>
            </div>

            <!-- Anggota Grup -->
            <div id="anggota-container" class="anggota-container"></div>
            <div class="form-actions">
                <button class="popup-close" id="popup-close-id">Close</button>
            </div>
        </form>
    </div>

    <div class="popup" id="popup-status">
        <h3>Status</h3>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Tahapan</th>
                    <th>Dokumen</th>
                    <th>Status Approval</th>
                    <th>Pengumpulan</th>
                </tr>
            </thead>
            <tbody id="status-body">
                <!-- Data akan diisi secara dinamis -->
            </tbody>
        </table>
        <div class="form-actions">
            <button class="popup-close" id="popup-close-status">Close</button>
        </div>
    </div>

    @push('scripts')
    <script>
        function closeOverlay() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-status').style.display = 'none';
            document.getElementById('upload-modal').style.display = 'none';
        }

        // Tampilkan popup struktur anggota
        document.querySelectorAll('.popup-btn-id').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';

                const idPendaftaran = button.getAttribute('data-id');

                // Bersihkan container anggota sebelum memuat data baru
                const anggotaContainer = document.getElementById('anggota-container');
                anggotaContainer.innerHTML = '';

                // Ambil data dari server berdasarkan id_pendaftaran
                fetch(`/unit/daftarImprovement/${idPendaftaran}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            document.getElementById('id-pendaftaran').value = data[0].id_pendaftaran;

                            data.forEach((grup, index) => {
                                if (grup.jabatan_grup === 'sponsor') {
                                    document.getElementById('sponsor').value = grup.nama;
                                    document.getElementById('sponsor-perner').value = grup.perner;
                                } else if (grup.jabatan_grup === 'fasilitator') {
                                    document.getElementById('fasilitator').value = grup.nama;
                                    document.getElementById('fasilitator-perner').value = grup.perner;
                                } else if (grup.jabatan_grup === 'ketua') {
                                    document.getElementById('ketua').value = grup.nama;
                                    document.getElementById('ketua-perner').value = grup.perner;
                                } else if (grup.jabatan_grup === 'sekretaris') {
                                    document.getElementById('sekretaris').value = grup.nama;
                                    document.getElementById('sekretaris-perner').value = grup.perner;
                                } else if (grup.jabatan_grup === 'anggota') {
                                    const divAnggota = document.createElement('div');
                                    divAnggota.classList.add('input-container');

                                    const label = document.createElement('label');
                                    label.textContent = `Anggota ${index + 1}`;
                                    divAnggota.appendChild(label);

                                    const inputNama = document.createElement('input');
                                    inputNama.type = 'text';
                                    inputNama.value = grup.nama;
                                    inputNama.readOnly = true;
                                    divAnggota.appendChild(inputNama);

                                    const inputPerner = document.createElement('input');
                                    inputPerner.type = 'text';
                                    inputPerner.value = grup.perner;
                                    inputPerner.readOnly = true;
                                    divAnggota.appendChild(inputPerner);

                                    anggotaContainer.appendChild(divAnggota);
                                }
                            });
                        } else {
                            console.error('Data tidak ditemukan.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        document.getElementById('status-body').addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('upload-btn')) {
        const idPendaftaran = event.target.getAttribute('data-id');
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('upload-modal').style.display = 'block';
        document.getElementById('id_pendaftaran').value = idPendaftaran;
    }
});

// Tutup popup status
document.getElementById('popup-close-status').addEventListener('click', closeOverlay);

        // Tampilkan popup status
        document.querySelectorAll('.popup-btn-status').forEach(button => {
    button.addEventListener('click', function () {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup-status').style.display = 'block';

        const idPendaftaran = button.getAttribute('data-id');

        // Bersihkan tabel status sebelum memuat data baru
        const statusBody = document.getElementById('status-body');
        statusBody.innerHTML = '';

        // Ambil data dari server berdasarkan id_pendaftaran
        fetch(`/unit/daftarImprovement/status/${idPendaftaran}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    data.forEach(status => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${status.created_at ? new Date(status.created_at).toLocaleDateString() : '-'}</td>
                            <td>${status.tahapan}</td>
                            <td>${status.dokumen}</td>
                            <td>${status.status_approval}</td>
                            <td>
                                ${status.pengumpulan ? `<a href="/uploads/${status.dokumen}" target="_blank"><i class="fas fa-upload"></i></a>` : '<button class="upload-btn" data-id="' + status.id + '"><i class="fas fa-upload"></i></button>'}
                            </td>
                        `;
                        statusBody.appendChild(row);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });
});


        // Tutup popup
        document.getElementById('popup-close-id').addEventListener('click', closeOverlay);
        document.getElementById('popup-close-status').addEventListener('click', closeOverlay);
        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('upload-modal').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        });

        // Pilihan file
    // Pilihan file
document.getElementById('select-file').addEventListener('change', function () {
    const selectedValue = this.value;
    if (selectedValue === 'pdf') {
        document.getElementById('upload-pdf-container').style.display = 'block';
        document.getElementById('upload-link-container').style.display = 'none';
    } else if (selectedValue === 'excel') {
        document.getElementById('upload-pdf-container').style.display = 'none';
        document.getElementById('upload-link-container').style.display = 'block';
    }
});

// Tampilkan modal upload
document.querySelectorAll('.popup-btn-status').forEach(button => {
    button.addEventListener('click', function () {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('upload-modal').style.display = 'block';

        const idPendaftaran = button.getAttribute('data-id');
        document.getElementById('id_pendaftaran').value = idPendaftaran;
    });
});

    </script>
    @endpush
</body>
</html>
