<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
        @csrf
    </form>
    <a class="nav-link" style="color: #f13f3f" href="{{ route('logout') }}" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon cil-account-logout" style="color: #f13f3f"></i>
        Logout
    </a>
</li>
<li class="nav-title">Admin</li>
<li class="nav-item">
    <a class="nav-link" href="{{ url('report-presensi') }}">
        <i class="nav-icon cil-book"> </i>
        Report Presensi
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ url('qr-generator') }}">
        <i class="nav-icon cil-description"></i>
        QR Generator
    </a>
</li>
