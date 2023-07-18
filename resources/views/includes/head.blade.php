<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/styles.css">
<script src="/js/gen.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>


<script>

$( document ).ready(function() {

    $.ajax({
          url : "/getAjaxCompanies",
          type: "GET",
          //data : formData,
          success: function(data, textStatus, jqXHR)
          {
            console.log('ok');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            console.log('error');

          }

        });

});


</script>