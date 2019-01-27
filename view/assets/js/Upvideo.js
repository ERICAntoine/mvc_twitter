$(document).ready(function(e)
{
    $("#upload_video").submit(function(e)
    {
        e.preventDefault();

        $.ajax({
            url: "script/uploadVideo.php",
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
                    location.reload()
                }
                else
                {
                    alert(data);
                }
            }
        })
    })
})