@php if(!empty($_GET['message'])) { $get_message = $_GET['message']; } @endphp
@if(!empty($get_message) && $get_message == "added")
<div class="container alert alert-success">
    <p>Stock added successfully</p>
</div>
@endif
@if(!empty($get_message) && $get_message == "empty")
<div class="container alert alert-danger">
    <p>No such stock</p>
</div>
@endif
@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="container alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="container alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="container alert alert-danger">
        {{session('error')}}
    </div>
@endif