<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/styles.css">
<script src="/js/gen.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>


<script>

$( document ).ready(function() {


    $( "#refreshButton" ).click(function() {


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

                    // console.log(v.name);
                    $("#compList").append('<li><a href="/company/' + v.id + '">' + v.name + '</a></li>');

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
    });

});


</script>