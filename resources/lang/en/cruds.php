<?php

return [
    'userManagement' => [
        'title' => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title' => 'Permissions',
        'title_singular' => 'Permission',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'title' => 'Title',
            'title_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role' => [
        'title' => 'Roles',
        'title_singular' => 'Role',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'title' => 'Title',
            'title_helper' => '',
            'permissions' => 'Permissions',
            'permissions_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'user' => [
        'title' => 'Users',
        'title_singular' => 'User',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'name' => 'Name',
            'name_helper' => '',
            'email' => 'Email',
            'email_helper' => '',
            'email_verified_at' => 'Email verified at',
            'email_verified_at_helper' => '',
            'password' => 'Password',
            'password_helper' => '',
            'roles' => 'Roles',
            'roles_helper' => '',
            'remember_token' => 'Remember Token',
            'remember_token_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'username' => 'Username',
            'username_helper' => '',
            'type' => 'Type',
            'type_helper' => '',
        ],
    ],
    'userAlert' => [
        'title' => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'alert_text' => 'Alert Text',
            'alert_text_helper' => '',
            'alert_link' => 'Alert Link',
            'alert_link_helper' => '',
            'user' => 'Users',
            'user_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
        ],
    ],
    'penelitian' => [
        'title' => 'Usulan Penelitian',
        'title_singular' => 'Usulan Penelitian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'judul' => 'Judul',
            'judul_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'ringkasan_eksekutif' => 'Ringkasan Eksekutif',
            'ringkasan_eksekutif_helper' => '',
            'biaya' => 'Biaya',
            'biaya_helper' => '',
            'status_penelitian' => 'Status Penelitian',
            'status_penelitian_helper' => '',
            'file_proposal' => 'File Proposal',
            'file_proposal_helper' => '',
            'file_laporan_kemajuan' => 'Laporan Kemajuan',
            'file_laporan_kemajuan_helper' => '',
            'file_laporan_keuangan' => 'Laporan Keuangan',
            'file_laporan_keuangan_helper' => '',
            'file_laporan_akhir' => 'Laporan Akhir',
            'file_laporan_akhir_helper' => '',
            'kode_rumpun' => 'Kode Rumpun Ilmu',
            'kode_rumpun_helper' => '',
            'multi_tahun' => 'Penelitian Multi Tahun',
            'multi_tahun_helper' => '',
            'tahun_ke' => 'Tahun Ke',
            'tahun_ke_helper' => '',
            'file_profil_penelitian' => 'File Profil Penelitian',
            'file_profil_penelitian_helper' => '',
            'file_logbook' => 'File Logbook',
            'file_logbook_helper' => '',
            'prodi' => 'Prodi',
            'prodi_helper' => '',
            'skema' => 'Skema Penelitian',
            'skema_helper' => '',
            'tahapan' => 'Tahapan',
            'tahapan_helper' => '',
            'judul_2' => 'Judul 2',
            'judul_2_helper' => '',
            'fokus' => 'Bidang Fokus'
        ],
    ],
    'dosen' => [
        'title' => 'Dosen',
        'title_singular' => 'Dosen',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'nip' => 'NIP',
            'nip_helper' => '',
            'nidn' => 'Nidn',
            'nidn_helper' => '',
            'tempat_lahir' => 'Tempat Lahir',
            'tempat_lahir_helper' => '',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tanggal_lahir_helper' => '',
            'jabatan_fungsional' => 'Jabatan Fungsional',
            'jabatan_fungsional_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'email' => 'Email',
            'email_helper' => '',
            'jenis_kelamin' => 'Jenis Kelamin',
            'jenis_kelamin_helper' => '',
            'pangkat_golongan' => 'Pangkat/Golongan',
            'pangkat_golongan_helper' => '',
            'telepon' => 'Telepon',
            'telepon_helper' => '',
            'prodi' => 'Prodi',
            'prodi_helper' => '',
        ],
    ],
    'referensi' => [
        'title' => 'Referensi',
        'title_singular' => 'Referensi',
    ],
    'plottingReviewer' => [
        'title' => 'Plotting Reviewer',
        'title_singular' => 'Plotting Reviewer',
        'filter' => 'Filter',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
        ],
    ],

    'kodeRumpun' => [
        'title' => 'Kode Rumpun Ilmu',
        'title_singular' => 'Kode Rumpun Ilmu',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'kode' => 'Kode',
            'kode_helper' => '',
            'rumpun_ilmu' => 'Rumpun Ilmu',
            'rumpun_ilmu_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'penelitianAnggotum' => [
        'title' => 'Anggota Penelitian',
        'title_singular' => 'Anggota Penelitian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'dosen' => 'Dosen',
            'dosen_helper' => '',
            'penelitian' => 'Penelitian',
            'penelitian_helper' => '',
            'jabatan' => 'Jabatan',
            'jabatan_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'staff' => [
        'title' => 'Staff',
        'title_singular' => 'Staff',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'nip' => 'NIP',
            'nip_helper' => '',
            'email' => 'Email',
            'email_helper' => '',
            'tempat_lahir' => 'Tempat Lahir',
            'tempat_lahir_helper' => '',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tanggal_lahir_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'jenis_kelamin' => 'Jenis Kelamin',
            'jenis_kelamin_helper' => '',
            'telepon' => 'Telepon',
            'telepon_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'fakultum' => [
        'title' => 'Fakultas',
        'title_singular' => 'Fakulta',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => 'Nama Fakultas',
            'singkatan' => 'Singkatan',
            'singkatan_helper' => 'Nama singkat fakultas',
            'kode' => 'Kode',
            'kode_helper' => 'Kode Fakultas',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'prodi' => [
        'title' => 'Program Studi',
        'title_singular' => 'Program Studi',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => 'Nama Program Studi',
            'fakultas' => 'Fakultas',
            'fakultas_helper' => 'Fakultas',
            'kode' => 'Kode',
            'kode_helper' => 'Kode Prodi',
            'kode_dikti' => 'Kode Dikti',
            'kode_dikti_helper' => 'Kode Podi berdasarkan Standar DIKTI',
            'akreditasi' => 'Akreditasi',
            'akreditasi_helper' => 'Akreditasi Prodi',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'pengelolaanPenelitian' => [
        'title' => 'Penelitian',
        'title_singular' => 'Penelitian',
    ],
    'pengelolaanPengabdian' => [
        'title' => 'Pengabdian',
        'title_singular' => 'Pengabdian',
    ],
    'pengabdian' => [
        'title' => 'Usulan Pengabdian',
        'title_singular' => 'Usulan Pengabdian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'judul' => 'Judul',
            'judul_helper' => '',
            'mitra_pengabdian' => 'Mitra Pengabdian',
            'mitra_pengabdian_helper' => '',
            'kode_rumpun' => 'Kode Rumpun Ilmu',
            'kode_rumpun_helper' => '',
            'ringkasan_eksekutif' => 'Ringkasan Eksekutif',
            'ringkasan_eksekutif_helper' => '',
            'status_pengabdian' => 'Status Pengabdian',
            'status_pengabdian_helper' => '',
            'multi_tahun' => 'Pengabdian Multi Tahun',
            'multi_tahun_helper' => '',
            'tahun_ke' => 'Tahun Ke',
            'tahun_ke_helper' => '',
            'biaya' => 'Biaya',
            'biaya_helper' => '',
            'file_proposal' => 'File Proposal',
            'file_proposal_helper' => '',
            'file_lembaran_pengesahan' => 'Lembaran Pengesahan',
            'file_lembaran_pengesahan_helper' => '',
            'file_laporan_kemajuan' => 'Laporan Kemajuan',
            'file_laporan_kemajuan_helper' => '',
            'file_laporan_keuangan' => 'Laporan Keuangan',
            'file_laporan_keuangan_helper' => '',
            'file_laporan_akhir' => 'Laporan Akhir',
            'file_laporan_akhir_helper' => '',
            'file_logbook' => 'File Logbook',
            'file_logbook_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'prodi' => 'Prodi',
            'prodi_helper' => '',
            'file_profile_pengabdian' => 'File Profile Pengabdian',
            'file_profile_pengabdian_helper' => '',
            'skema' => 'Skema Pengabdian',
            'skema_helper' => '',
            'mitra_pengabdian' => 'Mitra Pengabdian',
            'mitra_pengabdian_helper' => '',
        ],
    ],
    'pengabdianAnggotum' => [
        'title' => 'Anggota Pengabdian',
        'title_singular' => 'Anggota Pengabdian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'pengabdian' => 'Pengabdian',
            'pengabdian_helper' => '',
            'dosen' => 'Dosen',
            'dosen_helper' => '',
            'jabatan' => 'Jabatan',
            'jabatan_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'auditLog' => [
        'title' => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'description' => 'Description',
            'description_helper' => '',
            'subject_id' => 'Subject ID',
            'subject_id_helper' => '',
            'subject_type' => 'Subject Type',
            'subject_type_helper' => '',
            'user_id' => 'User ID',
            'user_id_helper' => '',
            'properties' => 'Properties',
            'properties_helper' => '',
            'host' => 'Host',
            'host_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
        ],
    ],
    'usulan' => [
        'title' => 'Usulan',
        'title_singular' => 'Usulan',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'pengusul' => 'Pengusul',
            'pengusul_helper' => '',
            'status_usulan' => 'Status Usulan',
            'status_usulan_helper' => '',
            'jenis_usulan' => 'Jenis Usulan',
            'jenis_usulan_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'rencanaInduk' => [
        'title' => 'Rencana Induk',
        'title_singular' => 'Rencana Induk',
    ],
    'ripTema' => [
        'title' => 'Tema',
        'title_singular' => 'Tema',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'periode' => 'Periode',
            'periode_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'luaran' => 'Luaran',
            'luaran_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'ripSubTema' => [
        'title' => 'Sub Tema',
        'title_singular' => 'Sub Tema',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'tema' => 'Tema',
            'tema_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'ripTopik' => [
        'title' => 'Topik',
        'title_singular' => 'Topik',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'subtema' => 'Sub Tema',
            'subtema_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'luaran' => 'Luaran',
            'luaran_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'ripSubTopik' => [
        'title' => 'Sub Topik',
        'title_singular' => 'Sub Topik',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'topik' => 'Topik',
            'topik_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'luaran' => 'Luaran',
            'luaran_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'ripTahapan' => [
        'title' => 'Tahapan',
        'title_singular' => 'Tahapan',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'sub_topik' => 'Sub Topik',
            'sub_topik_helper' => '',
            'tahun' => 'Tahun',
            'tahun_helper' => '',
            'bahasan' => 'Bahasan',
            'bahasan_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'jenisUsulan' => [
        'title' => 'Jenis Usulan',
        'title_singular' => 'Jenis Usulan',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'kode' => 'Kode',
            'kode_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'refSkema' => [
        'title' => 'Skema',
        'title_singular' => 'Skema',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'jangka_waktu' => 'Jangka Waktu',
            'jangka_waktu_helper' => '',
            'biaya_maksimal' => 'Biaya Maksimal',
            'biaya_maksimal_helper' => '',
            'sumber_dana' => 'Sumber Dana',
            'sumber_dana_helper' => '',
            'anggota_min' => 'Jumlah Anggota Min',
            'anggota_min_helper' => '',
            'anggota_max' => 'Jumlah Anggota Max',
            'anggota_max_helper' => '',
            'jabatan_ketua_min' => 'Jabatan Ketua Minimal',
            'jabatan_ketua_min_helper' => '',
            'jabatan_ketua_max' => 'Jabatan Ketua Max',
            'jabatan_ketua_max_helper' => '',
            'jabatan_anggota_min' => 'Jabatan Anggota Minimal',
            'jabatan_anggota_min_helper' => '',
            'jabatan_anggota_max' => 'Jabatan Anggota Maksimal',
            'jabatan_anggota_max_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'jenis_usulan' => 'Jenis Usulan',
            'jenis_usulan_helper' => '',
            'biaya_minimal' => 'Biaya Minimal',
            'biaya_minimal_helper' => '',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_mulai_helper' => '',
            'tanggal_selesai' => 'Tanggal Selesai',
            'tanggal_selesai_helper' => '',
        ],
    ],
    'output' => [
        'title' => 'Output',
        'title_singular' => 'Output',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'code' => 'Code',
            'code_helper' => '',
            'jenis_usulan' => 'Jenis Usulan',
            'jenis_usulan_helper' => '',
            'luaran' => 'Luaran',
            'luaran_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'outputSkema' => [
        'title' => 'Output Skema',
        'title_singular' => 'Output Skema',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'output' => 'Output',
            'output_helper' => '',
            'skema' => 'Skema',
            'skema_helper' => '',
            'field' => 'Field',
            'field_helper' => '',
            'mime' => 'Type File',
            'mime_helper' => '',
            'required' => 'Wajib',
            'required_helper' => 'Luaran Wajib',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'penelitianOutput' => [
        'title' => 'Output Penelitian',
        'title_singular' => 'Output Penelitian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'output_skema' => 'Output Skema',
            'output_skema_helper' => '',
            'penelitian' => 'Penelitian',
            'penelitian_helper' => '',
            'filename' => 'Nama File',
            'filename_helper' => '',
            'tanggal_upload' => 'Tanggal Upload',
            'tanggal_upload_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'pengabdianOutput' => [
        'title' => 'Output Pengabdian',
        'title_singular' => 'Output Pengabdian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'output_skema' => 'Output Skema',
            'output_skema_helper' => '',
            'pengabdian' => 'Pengabdian',
            'pengabdian_helper' => '',
            'filename' => 'Nama File',
            'filename_helper' => '',
            'tanggal_upload' => 'Tanggal Upload',
            'tanggal_upload_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'konfigurasi' => [
        'title' => 'Konfigurasi Usulan',
        'title_singular' => 'Konfigurasi Usulan',
    ],
    'komponenBiaya' => [
        'title' => 'Komponen Biaya',
        'title_singular' => 'Komponen Biaya',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama',
            'nama_helper' => '',
            'keterangan' => 'Keterangan',
            'keterangan_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'biayaSkema' => [
        'title' => 'Biaya  Per Skema',
        'title_singular' => 'Biaya  Per Skema',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'biaya' => 'Biaya',
            'biaya_helper' => '',
            'persen_max' => 'Maksimal (%)',
            'persen_max_helper' => '',
            'persen_min' => 'Minimal (%)',
            'persen_min_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'penelitianBiaya' => [
        'title' => 'Biaya Penelitian',
        'title_singular' => 'Biaya Penelitian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'biaya_skema' => 'Biaya Skema',
            'biaya_skema_helper' => '',
            'penelitian' => 'Penelitian',
            'penelitian_helper' => '',
            'jumlah' => 'Jumlah',
            'jumlah_helper' => '',
            'jumlah_final' => 'Jumlah',
            'jumlah_final_helper' => '',
            'satuan' => 'Satuan',
            'satuan_helper' => '',
            'harga_satuan' => 'Harga Satuan',
            'harga_satuan_helper' => '',
            'harga_satuan_final' => 'Harga Satuan Final',
            'harga_satuan_final_helper' => '',
            'justifikasi' => 'Justifikasi',
            'justifikasi_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'pengabdianBiaya' => [
        'title' => 'Biaya Pengabdian',
        'title_singular' => 'Biaya Pengabdian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'biaya_skema' => 'Biaya Skema',
            'biaya_skema_helper' => '',
            'pengabdian' => 'Pengabdian',
            'pengabdian_helper' => '',
            'jumlah' => 'Jumlah',
            'jumlah_helper' => '',
            'jumlah_final' => 'Jumlah',
            'jumlah_final_helper' => '',
            'satuan' => 'Satuan',
            'satuan_helper' => '',
            'harga_satuan' => 'Harga Satuan',
            'harga_satuan_helper' => '',
            'harga_satuan_final' => 'Harga Satuan Final',
            'harga_satuan_final_helper' => '',
            'justifikasi' => 'Justifikasi',
            'justifikasi_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'konfigurasiReviewer' => [
        'title' => 'Konfigurasi Review',
        'title_singular' => 'Konfigurasi Review',
    ],
    'reviewer' => [
        'title' => 'Reviewer',
        'title_singular' => 'Reviewer',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'status' => 'Status',
            'status_helper' => '',
            'sertifikat' => 'Sertifikat',
            'sertifikat_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'tahapanReview' => [
        'title' => 'Tahapan Review',
        'title_singular' => 'Tahapan Review',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'nama' => 'Nama Tahapan',
            'nama_helper' => '',
            'jumlah_reviewer' => 'Jumlah Reviewer',
            'jumlah_reviewer_helper' => '',
            'mulai' => 'Mulai Review',
            'mulai_helper' => '',
            'selesai' => 'Selesai',
            'selesai_helper' => '',
            'tahun' => 'Tahun',
            'tahun_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
            'waktu_review' => 'Waktu Review',
            'waktu_review_helper' => '',
        ],
    ],
    'penelitianReviewer' => [
        'title' => 'Reviewer Penelitian',
        'title_singular' => 'Reviewer Penelitian',
        'fields' => [
            'id' => 'ID',
            'id_helper' => '',
            'tahapan_review' => 'Tahapan Review',
            'tahapan_review_helper' => '',
            'reviewer' => 'Reviewer',
            'reviewer_helper' => '',
            'penelitian' => 'Penelitian',
            'penelitian_helper' => '',
            'created_at' => 'Created at',
            'created_at_helper' => '',
            'updated_at' => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
];
