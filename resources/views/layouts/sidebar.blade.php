<section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        @if(\Auth::user()->role_id == 1)
        @if($_SERVER['REQUEST_URI'] == '/dashboard')
        <li class="menu-sidebar"><a href="{{ url('/dashboard ') }}"><span
                    class="fa fa-dashboard"></span><strong>Dashboard</strong></span></a></li>
        @else
        <li class="menu-sidebar"><a href="{{ url('/dashboard ') }}"><span
                    class="fa fa-dashboard"></span>Dashboard</span></a></li>
        @endif
        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-pengguna')">
            @if($_SERVER['REQUEST_URI'] == '/karyawan' || $_SERVER['REQUEST_URI'] == '/role' || $_SERVER['REQUEST_URI']
            == '/hubungan-kerja')
            <a href="javascript:void(0)"><span class="fa fa-user"></span><strong>Users ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-user"></span>Users ▼</span></a>
            @endif
            <ul id="dropdown-pengguna" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/karyawan') }}">Daftar Users</a>
                </li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/role') }}">Roles</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/hubungan-kerja') }}">Hubungan
                        Kerja</a></li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-kehadiran')">
            @if($_SERVER['REQUEST_URI'] == '/log_absen' || $_SERVER['REQUEST_URI'] == '/ketidakhadiran' ||
            $_SERVER['REQUEST_URI'] == '/absen_non_kerja')
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span><strong>Laporan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span>Laporan ▼</span></a>
            @endif
            <ul id="dropdown-kehadiran" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_absen') }}">Daftar Hadir</a>
                </li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/ketidakhadiran') }}">Daftar
                        Tidak Hadir</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/absen_non_kerja') }}">Non Hari
                        Kerja</a></li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-akumulasi')">
            @if($_SERVER['REQUEST_URI'] == '/akumulasi' || $_SERVER['REQUEST_URI'] == '/akumulasiLembur' ||
            $_SERVER['REQUEST_URI'] == '/lebihKerja' || $_SERVER['REQUEST_URI'] == '/kurangKerja' ||
            $_SERVER['REQUEST_URI'] == '/akumulasi_tahunan')
            <a href="javascript:void(0)"><span class="fa fa-clock-o"></span><strong>Akumulasi Waktu
                    ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-clock-o"></span>Akumulasi Waktu ▼</span></a>
            @endif
            <ul id="dropdown-akumulasi" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasi') }}">Absen</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasiLembur') }}">Lembur</a>
                </li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lebihKerja') }}">Jam Kerja
                        Lebih</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/kurangKerja') }}">Jam Kerja
                        Kurang</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a
                        href="{{ url('/akumulasi_tahunan') }}">Tahunan</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-lembur')">
            @if($_SERVER['REQUEST_URI'] == '/lembur' || $_SERVER['REQUEST_URI'] == '/cuti')
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span><strong>Permit ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span>Permit ▼</span></a>
            @endif
            <ul id="dropdown-lembur" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lembur') }}">Lembur</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/cuti') }}">Perizinan</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-peraturan')">
            @if($_SERVER['REQUEST_URI'] == '/rules' || $_SERVER['REQUEST_URI'] == '/libur')
            <a href="javascript:void(0)"><span class="fa fa-cog"></span><strong>Peraturan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-cog"></span>Peraturan ▼</span></a>
            @endif
            <ul id="dropdown-peraturan" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/rules') }}">Jam Kerja</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/libur') }}">Libur Nasional</a>
                </li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-log')">
            @if($_SERVER['REQUEST_URI'] == '/log_activity' || $_SERVER['REQUEST_URI'] == '/log_kegiatan')
            <a href="javascript:void(0)"><span class="fa fa-history"></span><strong>Log ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-history"></span>Log ▼</span></a>
            @endif
            <ul id="dropdown-log" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_activity') }}">Log
                        Aktivitas</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_kegiatan') }}"></span>Log
                        Akses</a></li>
            </ul>
        </li>


        @endif

        @if(\Auth::user()->role_id == 2)
        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-lembur')">
            @if($_SERVER['REQUEST_URI'] == '/lembur' || $_SERVER['REQUEST_URI'] == '/cuti')
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span><strong>Permit ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span>Permit ▼</span></a>
            @endif
            <ul id="dropdown-lembur" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lembur') }}"><span
                            class="fa fa-firefox"></span>Lembur</span></a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/cuti') }}"><span
                            class="fa fa-firefox"></span>Cuti</span></a></li>

            </ul>
        </li>
        @endif

        @if(\Auth::user()->role_id == 3)
        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-pengguna')">
            @if($_SERVER['REQUEST_URI'] == '/karyawan' || $_SERVER['REQUEST_URI'] == '/role' )
            <a href="javascript:void(0)"><span class="fa fa-user"></span><strong>Pengguna ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-user"></span>Pengguna ▼</span></a>
            @endif
            <ul id="dropdown-pengguna" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/karyawan') }}">Karyawan</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/role') }}">Role</a></li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-kehadiran')">
            {{dd($_SERVER['REQUEST_URI'])}}
            @if($_SERVER['REQUEST_URI'] == '/log_absen' || $_SERVER['REQUEST_URI'] == '/ketidakhadiran' ||
            $_SERVER['REQUEST_URI'] == '/absen_non_kerja' || $_SERVER['REQUEST_URI'] == '/akumulasi' ||
            $_SERVER['REQUEST_URI'] == '/lebihKerja' || $_SERVER['REQUEST_URI'] == '/kurangKerja' ||
            $_SERVER['REQUEST_URI'] == '/akumulasi_tahunan')
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span><strong>Laporan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span>Laporan ▼</span></a>
            @endif
            <ul id="dropdown-kehadiran" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_absen') }}">Daftar Hadir</a>
                </li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/ketidakhadiran') }}">Daftar
                        Tidak Hadir</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/absen_non_kerja') }}">Non Hari
                        Kerja</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasi') }}">Akumulasi
                        Kehadiran</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lebihKerja') }}">Jam Kerja
                        Lebih</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/kurangKerja') }}">Jam Kerja
                        Kurang</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a
                        href="{{ url('/akumulasi_tahunan') }}">Akumulasi Tahunan</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-lembur')">
            @if($_SERVER['REQUEST_URI'] == '/lembur' || $_SERVER['REQUEST_URI'] == 'akumulasiLembur' ||
            $_SERVER['REQUEST_URI'] == '/cuti')
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span><strong>Permit ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span>Permit ▼</span></a>
            @endif
            <ul id="dropdown-lembur" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lembur') }}">Lembur</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasiLembur') }}">Akumulasi
                        Lembur</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/cuti') }}">Cuti</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-peraturan')">
            @if($_SERVER['REQUEST_URI'] == '/rules' || $_SERVER['REQUEST_URI'] == '/libur')
            <a href="javascript:void(0)"><span class="fa fa-cog"></span><strong>Peraturan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-cog"></span>Peraturan ▼</span></a>
            @endif
            <ul id="dropdown-peraturan" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/rules') }}">Jam Kerja</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/libur') }}">Libur Nasional</a>
                </li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-log')">
            @if($_SERVER['REQUEST_URI'] == '/log_activity' || $_SERVER['REQUEST_URI'] == '/log_kegiatan')
            <a href="javascript:void(0)"><span class="fa fa-history"></span><strong>Log ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-history"></span>Log ▼</span></a>
            @endif
            <ul id="dropdown-log" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_activity') }}">Log
                        Aktivitas</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_kegiatan') }}">Log
                        Kegiatan</a></li>
            </ul>
        </li>
        @endif

        @if(\Auth::user()->role_id == 4)
        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-pengguna')">
            @if($_SERVER['REQUEST_URI'] == '/karyawan' || $_SERVER['REQUEST_URI'] == '/role' )
            <a href="javascript:void(0)"><span class="fa fa-user"></span><strong>Pengguna ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-user"></span>Pengguna ▼</span></a>
            @endif
            <ul id="dropdown-pengguna" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/karyawan') }}">Karyawan</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/role') }}">Role</a></li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-kehadiran')">
            @if($_SERVER['REQUEST_URI'] == '/log_absen' || $_SERVER['REQUEST_URI'] == '/ketidakhadiran' ||
            $_SERVER['REQUEST_URI'] == '/absen_non_kerja' || $_SERVER['REQUEST_URI'] == '/akumulasi' ||
            $_SERVER['REQUEST_URI'] == '/lebihKerja' || $_SERVER['REQUEST_URI'] == '/kurangKerja' ||
            $_SERVER['REQUEST_URI'] == '/akumulasi_tahunan')
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span><strong>Laporan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-list-alt"></span>Laporan ▼</span></a>
            @endif
            <ul id="dropdown-kehadiran" style="display: none;" data-widget="tree">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_absen') }}">Daftar Hadir</a>
                </li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/ketidakhadiran') }}">Daftar
                        Tidak Hadir</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/absen_non_kerja') }}">Non Hari
                        Kerja</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasi') }}">Akumulasi
                        Kehadiran</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lebihKerja') }}">Jam Kerja
                        Lebih</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/kurangKerja') }}">Jam Kerja
                        Kurang</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a
                        href="{{ url('/akumulasi_tahunan') }}">Akumulasi Tahunan</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-lembur')">
            @if($_SERVER['REQUEST_URI'] == '/lembur' || $_SERVER['REQUEST_URI'] == 'akumulasiLembur' ||
            $_SERVER['REQUEST_URI'] == '/cuti')
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span><strong>Permit ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-envelope-o"></span>Permit ▼</span></a>
            @endif
            <ul id="dropdown-lembur" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/lembur') }}">Lembur</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/akumulasiLembur') }}">Akumulasi
                        Lembur</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/cuti') }}">Perizinan</a></li>

            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-peraturan')">
            @if($_SERVER['REQUEST_URI'] == '/rules' || $_SERVER['REQUEST_URI'] == '/libur')
            <a href="javascript:void(0)"><span class="fa fa-cog"></span><strong>Peraturan ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-cog"></span>Peraturan ▼</span></a>
            @endif
            <ul id="dropdown-peraturan" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/rules') }}">Jam Kerja</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/libur') }}">Libur Nasional</a>
                </li>
            </ul>
        </li>

        <li class="menu-sidebar" onclick="toggleDropdown('dropdown-log')">
            @if($_SERVER['REQUEST_URI'] == '/log_activity' || $_SERVER['REQUEST_URI'] == '/log_kegiatan')
            <a href="javascript:void(0)"><span class="fa fa-history"></span><strong>Log ▼</strong></span></a>
            @else
            <a href="javascript:void(0)"><span class="fa fa-history"></span>Log ▼</span></a>
            @endif
            <ul id="dropdown-log" style="display: none;">
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_activity') }}">Log
                        Aktivitas</a></li>
                <li class="menu-sidebar" style="margin-bottom: 10px;"><a href="{{ url('/log_kegiatan') }}">Log
                        Kegiatan</a></li>
            </ul>
        </li>
        @endif


    </ul>
    <script>
        function toggleDropdown(id) {
            var dropdown = document.getElementById(id);
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

    </script>
</section>
