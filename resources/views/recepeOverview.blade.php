@extends('layouts.default')

@section('content')
recepeOverview

<a href="/recepeadd/">Add new</a>
<br><br>

@foreach($recipes as $recipe) 

    {{$recipe->name}}&nbsp;<a href="javascript: void(0);" onClick='del({{$recipe->id}})'>Del</a> {{$recipe->company->name}} <br>


@endforeach




<script>


function del(id) {

console.log(id);

formData = {'id': id}

$.ajax({
    url : "/recepeDelete",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
        console.log('ok');
        location.reload();
        //refreshList();

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        console.log('error');

    }
});

}




</script>
@stop