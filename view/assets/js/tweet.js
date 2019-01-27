$("#sub_tweet").click(function(e)
{
    e.preventDefault();
    let string = $("#textareatweet").val()
    let hashtags = string.match(/#[a-z]+/gi);

    $.ajax({
        url: "script/tweet.php",
        method: "post",
        data: {content: string},
        success: function(data)
        {
            if(data == "error")
            {
                $("#sugges").empty();
                $("#sugges").append("<span class='italic .text-danger'>Le champ est vide </span><br/>");
            }
            else
            {
                $("#sugges").empty();
            }
        }
    });


})