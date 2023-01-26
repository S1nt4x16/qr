@if ($message = Session::get('error'))
<div class="alert d alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert s alert-danger alert-block">
        <center><strong>{{ $message }}</strong></center>
</div>
@endif


<style>
        .s {
        font-size: 20px;
        font-family: courier new;
        color:green;
        background-color:black;
        }
</style>

