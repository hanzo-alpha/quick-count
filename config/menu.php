<?php

    return [
        'menu' => [
            [
                "url" => "/",
                "name" => "Dashboard",
                "i18n" => "Dashboard",
                "icon" => "desktop",
            ], [
                "url" => "data-mesin",
                "name" => "Data Mesin",
                "i18n" => "Data Mesin",
                "slug" => "data-mesin",
                "icon" => "servers",
            ], [
                "url" => "data-pegawai",
                "name" => "Data Pegawai",
                "i18n" => "Data Pegawai",
                "slug" => "data-pegawai",
                "icon" => "users",
            ], [
                "url" => "log-absen",
                "name" => "Log Absensi",
                "i18n" => "Log Absensi",
                "slug" => "log-absensi",
                "icon" => "notebook",
            ],
            [
                "url" => "#",
                "name" => "Rekap Absensi",
                "i18n" => "Rekap Absensi",
                "icon" => "bar-chart",
                "submenu" => [
                    [
                        "url" => "/rekap-absensi",
                        "name" => "Per Unit Kerja",
                        "i18n" => "Per Unit Kerja",
                        "icon" => "bx bx-right-arrow-alt",
                    ], [
                        "url" => "/rekap-absensi",
                        "name" => "Perorangan",
                        "i18n" => "Perorangan",
                        "icon" => "bx bx-right-arrow-alt",
                    ],
                ],
            ], [
                "url" => "/pengaturan",
                "name" => "Pengaturan",
                "i18n" => "Pengaturan",
                "icon" => "gear",
            ],
        ],
    ];
