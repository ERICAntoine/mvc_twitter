$(document).ready(function()
{
    $("#search_bar").autocomplete({
        source: "script/autocomplete.php",
    });

    $("#textareatweet").keypress(function(e)
    {
        let string = $(this).val();
        let maxLength = $(this).val().length;
        let hashtags = string.match(/#[a-z]+/gi);
        let arobase = string.match(/@[a-z]+/gi);

        if(maxLength >= 140)
        {
            e.preventDefault();
        }

        $.ajax({
            url: "script/hashtags.php",
            method: "POST",
            data: {hash: hashtags, aro: arobase},
            dataType: "json",
            success: function (data)
            {
                console.log(data);
                $("#sugges").empty();
                if(data["text"])
                {
                    $("#sugges").append("<span class='italic'> Suggestion Hashtags: #"+data["text"]+"</span><br/>");
                }
                if(data["pseudo"])
                {
                    $("#sugges").append("<span class='italic'> Suggestion Pseudo: @"+data["pseudo"]+"</span><br/>");
                }
            }
        })
    })
});
