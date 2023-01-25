@if ($message = Session::get('error'))
<div class="alert d alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif