@if ($message = Session::get('success'))
<div class="alert alert-success mt-3 alert-block alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ $message }}</strong>
</div>
@endif