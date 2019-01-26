$(document).ready(function(e)
{
    $("#image_upload").change(function(e)
    {
        $("#upload").submit();    
    });

    $("#upload").submit(function(e)
    {
        e.preventDefault();

        $.ajax({
            url: "script/upload.php",
            type: "POST",
            data:  new FormData(this),
            dataType: "text",
            contentType: false,
            cache: false,
            processData:false,
            success: function response(data)
            {
                if(data == "success")
                {
                    window.location.replace("http://localhost/mvc_tweet/index.php?c=settings");
                }
                else
                {
                    alert(data);
                }
            }
        })
    })
})