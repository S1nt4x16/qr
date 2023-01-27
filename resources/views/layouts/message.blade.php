@if ($message = Session::get('error'))
<div class="alert d alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert s alert-success alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif

@if ($message = Session::get('login'))
<div class="alert alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif

@if ($message = Session::get('logout'))
<div class="alert alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif

