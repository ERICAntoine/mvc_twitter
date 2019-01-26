$(document).ready(function()
{
    $("#search_bar").autocomplete({
        source: "script/autocomplete.php",
    });

    $("#textareatweet").keypress(function(e)
    {
        let maxLength = $(this).val().length;
        if(maxLength >= 140)
        {
            e.preventDefault();
        }
    })
});
