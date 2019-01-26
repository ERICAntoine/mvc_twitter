$(document).ready(function()
{
    $("#follow").click(function()
    {
        $.ajax({
            url: "script/follow.php",
            method: "POST",
            data: {follow: $("#idProfil").val()},
            success: function response(data)
            {
                console.log(data);
            }
        })
    })
})