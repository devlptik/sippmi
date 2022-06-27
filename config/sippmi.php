<?php

return [
    'path' => [
        'cv' => 'cv',
        'pengesahan' => 'pengesahan',
        'proposal' => 'proposal',
        'kemajuan' => 'kemajuan',
        'logbook' => 'logbook',
        'luaran' => 'luaran',
        'lap_akhir' => 'lap_akhir',
        'jurnal' => [
            'artikel' => 'jurnal/artikel',
        ],
        'kinerja' => [
            'makalah' => 'kinerja/makalah'
        ]
    ],

    'tipe_pertanyaan' => [
        1 => 'Skala 7',
        2 => 'Text',
        3 => 'Target Laporan',
        4 => 'Ada/Tidak Ada (skala 7)',
        5 => 'Output Buku',
        6 => 'Output Artikel',
        7 => 'Output HKI',
        8 => 'Opsi Berdasarkan Jumlah'
    ],

    'opsi_skala_7' => [
        1 => '1 - Buruk',
        2 => '2 - Sangat Kurang',
        3 => '3 - Kurang',
        5 => '5 - Cukup',
        6 => '6 - Baik',
        7 => '7 - Sangat Baik'
    ],
    'opsi_pertanyaan' => [
        1 => [
            1 => '1 - Buruk',
            2 => '2 - Sangat Kurang',
            3 => '3 - Kurang',
            5 => '5 - Cukup',
            6 => '6 - Baik',
            7 => '7 - Sangat Baik'
        ],
        3 => [
            0 => 'Tidak Ada',
            3 => 'Ada, tidak sesuai target',
            5 => 'Ada, sesuai target',
            7 => 'Ada, melampaui target'
        ],
        4 => [
            0 => 'Tidak Ada',
            7 => 'Ada'
        ],
        5 => [
            0 => 'Ada Buku',
            3 => 'Draft Buku',
            5 => 'Draft Buku Lebih dari 1 bab',
            7 => 'Buku ISBN'
        ],
        6 => [
            1 => 'Draft',
            2 => 'Submit',
            6 => 'Accepted',
            7 => 'Publish'
        ],
        7 => [
            1 => 'Draft',
            3 => 'Submit',
            5 => 'Terdaftar',
            7 => 'Granted',
        ],
        8 => [
            0 => 'Tidak Ada',
            1 => 'Jumlah output 1',
            2 => 'Jumlah output 2',
            3 => 'Jumlah output 3',
            4 => 'Jumlah output 4',
            5 => 'Jumlah output 5',
            6 => 'Jumlah output 6',
            7 => 'Jumlah output 7'
        ],
    ]

];
