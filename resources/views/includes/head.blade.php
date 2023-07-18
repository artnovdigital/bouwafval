<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/styles.css">
<script src="/js/gen.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>


<meta name="csrf-token" content="{{ csrf_token() }}">

<script>

function postKarma(id, value) {

    formData = {'id': id, 'value':value}

    $.ajax({
        url : "/postKarma",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
            console.log('ok');
            refreshList();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log('error');

        }
    });
}    

function refreshList() {

    var search = $("#search").val();

    console.log(search);

    $.ajax({
        url : "/getAjaxCompanies?search=" + search,
        type: "GET",
        //data : formData,
        success: function(data, textStatus, jqXHR)
        {
            data = JSON.parse(data);

            $( "#compList" ).empty();

            $.each(data, function(k, v) {
                // console.log(v);

                console.log(v.karma);

                html = '<div class="karmaLevel"> ';
                html += '<button class="plusKarma" data-id=' + v.id + ' >+</button> ';
                html += '    <span class="karmaRate" data-id=' + v.id + ' >' + v.karma + '</span> ';
                html += '<button class="minusKarma" data-id=' + v.id + ' >-</button> ';
                html += '</div>';

                $("#compList").append('<li class="companies" ><a href="/company/' + v.id + '">' + v.name + '</a> ' + html + '</li>');

            });



            // data.each(function(index, value) {

            //     console.log(value);

            //     //$("#compList").append('<li><a href="#">' + dataaaaaaaaaaa</a></li>');

            // });

            // console.log(data);

            //$("#compList").append('<li><a href="#">' + dataaaaaaaaaaa</a></li>');



        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log('error');

        }

    });

}


$( document ).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).on("click","button.plusKarma", function(){
        var id = $(this).data('id');

        console.log(id);
        postKarma(id, "+");
    })

    $(document).on("click","button.minusKarma", function(){
        var id = $(this).data('id');

        console.log(id);
        postKarma(id, "-");
    })






    $( "#refreshButton" ).click(function() {

        refreshList();
        
    });

});


</script>