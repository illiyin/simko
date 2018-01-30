<?php
	$config['menu'] = array(         
        array(
            "name" => 'dashboard',
            'title' => azlang('Dashboard'),
            'icon' => 'dashboard',
            'url' => 'home',
            'role' => array(),
            'submenu' => array(),
        ),
        array(
            "name" => 'master_pos',
            'title' => 'Master POS',
            'icon' => 'briefcase',
            'url' => '',
            'role' => array(),
            'submenu' => array(
                array(
                    "name" => 'master_pos_outlet',
                    'title' => 'Toko/Gudang',
                    'url' => '#',
                    'role' => array(),
                    'submenu' => array(),
                ),
                array(
                    "name" => 'master_pos_kategori_produk',
                    'title' => 'Kategori Produk',
                    'url' => '#',
                    'role' => array(),
                    'submenu' => array(),
                ),
                array(
                    "name" => 'master_pos_satuan_produk',
                    'title' => 'Satuan Produk',
                    'url' => '#',
                    'role' => array(),
                    'submenu' => array(),
                ),
                array(
                    "name" => 'master_pos_supplier',
                    'title' => azlang('Supplier'),
                    'url' => 'supplier',
                    'role' => array(),
                    'submenu' => array(),
                ),
                array(
                    "name" => 'master_pos_stok_awal',
                    'title' => 'Stok Awal',
                    'url' => '#',
                    'role' => array(),
                    'submenu' => array(),
                ),
                array(
                    "name" => 'master_pos_produk',
                    'title' => 'Produk',
                    'url' => '#',
                    'role' => array(),
                    'submenu' => array(),
                ),
            ),
        ),
        array(
            "name" => 'pos',
            'title' => 'POS (Point of Sales)',
            'icon' => 'shopping-cart',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'pos_penjualan_barang',
                    'title' => 'Penjualan Kasir',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_penjualan_android',
                    'title' => 'Penjualan Android',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_penjualan_website',
                    'title' => 'Penjualan Website',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_retur_penjualan',
                    'title' => 'Retur Penjualan',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_pembelian_barang',
                    'title' => 'Pembelian Barang',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_pesanan_pembelian',
                    'title' => 'Pesanan Pembelian (PO)',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_retur_pembelian',
                    'title' => 'Retur Pembelian',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_mutasi',
                    'title' => 'Mutasi Barang',
                    'url' => '#',
                ),
                array(
                    'name' => 'pos_stock_opname',
                    'title' => 'Stok Opname',
                    'url' => '#',
                ),
            )
        ),
        array(
            "name" => 'accounting_pos',
            'title' => 'Accounting POS',
            'icon' => 'dollar',
            'url' => '',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'accounting_pos_account',
                    'title' => 'Master Akun Toko',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_pos_piutang_supplier',
                    'title' => 'Piutang Supplier',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_pos_account_transfer',
                    'title' => 'Mutasi Saldo Akun',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_pos_piutang_member',
                    'title' => 'Piutang Member',
                    'url' => 'piutangmember',
                ),
                array(
                    'name' => 'accounting_pos_pembayaran_group',
                    'title' => 'Pembayaran Group',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_pos_pengeluaran_toko',
                    'title' => 'Pengeluaran Toko',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'laporan_pos',
            'title' => 'Laporan POS (Toko)',
            'icon' => 'file-o',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'laporan_pos_stok_produk',
                    'title' => 'Laporan Mutasi Stok',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_saldo_member',
                    'title' => 'Laporan Saldo Member',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_shu_member',
                    'title' => 'Laporan SHU Toko',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_laba_toko',
                    'title' => 'Laporan Laba Toko',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_arus_kas',
                    'title' => 'Laporan Arus Kas Toko',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_stok_toko',
                    'title' => 'Laporan Laba Toko',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_produk_fast_moving',
                    'title' => 'Laporan Produk Fast Moving',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_produk_slow_moving',
                    'title' => 'Laporan Produk Slow Moving',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_detail_supplier',
                    'title' => 'Laporan Detail Supplier',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_detail_penjualan',
                    'title' => 'Laporan Detail Penjualan',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_detail_pengeluaran',
                    'title' => 'Laporan Detail Pengeluaran',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_laba_rugi',
                    'title' => 'Laporan Laba Rugi',
                    'url' => '#',
                ),
                array(
                    'name' => 'laporan_pos_neraca_toko',
                    'title' => 'Laporan Neraca Toko',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'bankpulsa',
            'title' => 'Bankpulsa - PPOB',
            'icon' => 'ticket',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    "name" => 'bankpulsa_transaksi',
                    'title' => 'Transaksi Pulsa - Token - PPOB',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_ticketing_hotel',
                    'title' => 'Ticketing & Hotel',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_pendaftaran',
                    'title' => 'Pendaftaran',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_pengaturan_limit',
                    'title' => 'Pengaturan Limit',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_report_transaksi_anggota',
                    'title' => 'Report Transaksi Anggota',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_pembayaran_tanpa_payroll',
                    'title' => 'Pembayaran Tanpa Payroll',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_closed',
                    'title' => 'Closed / Tutup Buku Bulanan',
                    'url' => '#',
                ),
                array(
                    "name" => 'bankpulsa_komplain_transaksi',
                    'title' => 'Komplain Transaksi',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'master_simpan_pinjam',
            'title' => 'Master Simpan Pinjam',
            'icon' => 'briefcase',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'master_simpan_pinjam_jenis_simpan_pinjam',
                    'title' => 'Jenis Simpan Pinjam',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'simpan_pinjam',
            'title' => 'Simpan Pinjam',
            'icon' => 'bank',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'simpan_pinjam_simpanan_anggota',
                    'title' => 'Simpanan Anggota',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_pengajuan_penarikan',
                    'title' => 'Pengajuan Penarikan Simpanan',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_penarikan_simpanan',
                    'title' => 'Penarikan Simpanan',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_jenis_pinjaman',
                    'title' => 'Jenis Pinjaman Support Syariah',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_pengajuan_pinjaman',
                    'title' => 'Pengajuan Pinjaman',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_pinjaman',
                    'title' => 'Pinjaman',
                    'url' => '#',
                ),
                array(
                    'name' => 'simpan_pinjam_pembayaran_pinjaman',
                    'title' => 'Pembayaran Pinjaman',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'simpan_pinjam_syariah',
            'title' => 'Simpan Pinjam Syariah',
            'icon' => 'bank',
            'url' => '#',
            'role' => array(),
            'submenu' => array()
        ),
        array(
            "name" => 'laporan_simpan_pinjam',
            'title' => 'Laporan Simpan Pinjam',
            'icon' => 'file',
            'url' => '#',
            'role' => array(),
            'submenu' => array()
        ),
        array(
            "name" => 'manajemen_anggota',
            'title' => 'Manajemen Member',
            'icon' => 'user',
            'url' => '',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'manajemen_anggota_level_anggota',
                    'title' => 'Level Member',
                    'url' => '#',
                ),
                array(
                    'name' => 'manajemen_anggota_departemen',
                    'title' => 'Departemen',
                    'url' => '#',
                ),
                array(
                    'name' => 'manajemen_anggota_jabatan',
                    'title' => 'Jabatan',
                    'url' => '#',
                ),
                array(
                    'name' => 'manajemen_anggota_anggota',
                    'title' => 'Member',
                    'url' => 'member',
                    'role' => array(
                        array(
                            'role_name' => 'role_data_umum_anggota',
                            'role_title' => 'Data Umum'
                        ),
                        array(
                            'role_name' => 'role_data_keuangan_anggota',
                            'role_title' => 'Data Keuangan'
                        ),array(
                            'role_name' => 'role_data_lain_anggota',
                            'role_title' => 'Data Lain'
                        ),
                    )
                ),
            ),
        ),
        array(
            "name" => 'laporan_member',
            'title' => 'Laporan Member',
            'icon' => 'file',
            'url' => '#',
            'role' => array(),
            'submenu' => array()
        ),
        array(
            "name" => 'usaha_tambahan',
            'title' => 'Usaha Tambahan',
            'icon' => 'plus',
            'url' => '#',
            'role' => array(),
            'submenu' => array()
        ),
        array(
            "name" => 'accounting',
            'title' => 'Accounting',
            'icon' => 'dollar',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'accounting_periode',
                    'title' => 'Periode',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_nomor_perkiraan',
                    'title' => 'Nomor Perkiraan',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_setting_mapping',
                    'title' => 'Setting Mapping Account',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_saldo_awal',
                    'title' => 'Saldo Awal',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_penerimaan_kas',
                    'title' => 'Penerimaan Kas',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_pengeluaran_kas',
                    'title' => 'Pengeluaran Kas',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_jurnal_umum',
                    'title' => 'Jurnal Umum',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_jurnal_audit',
                    'title' => 'Jurnal Audit',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_buku_besar',
                    'title' => 'Buku Besar',
                    'url' => '#',
                ),
                array(
                    'name' => 'accounting_kunci_jurnal',
                    'title' => 'Kunci Jurnal',
                    'url' => '#',
                ),
            ),
        ),
        array(
            "name" => 'general_report',
            'title' => 'General Report',
            'icon' => 'file',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
                array(
                    'name' => 'general_report_shu_gross',
                    'title' => 'Data SHU Gross',
                    'url' => '#',
                ),
                array(
                    'name' => 'general_report_shu_anggota',
                    'title' => 'Data SHU Anggota',
                    'url' => '#',
                ),
            )
        ),
        array(
            "name" => "user",
            "title" => 'Profile & Pengguna',
            "icon" => "user",
            "url" => "",
            "submenu" => array(
                array(
                    "name" => "user_role",
                    "title" => azlang("Role"),
                    "url" => "role",
                    "submenu" => array()
                ),
                array(
                    "name" => "user_user",
                    "title" => azlang("User"),
                    "url" => "user",
                    "submenu" => array()
                ),
                array(
                    "name" => "user_user_role",
                    "title" => azlang("User Role"),
                    "url" => "user_role",
                    "submenu" => array()
                ),
            )
        ),
        array(
            "name" => 'support_broadcasting',
            'title' => 'Support & Broadcasting',
            'icon' => 'volume-up',
            'url' => '#',
            'role' => array(),
            'submenu' => array(
            )
        ),
        array(
            "name" => 'setting',
            'title' => azlang('Setting'),
            'icon' => 'gear',
            'url' => 'setting',
            'submenu' => array(),
        ),
    );

