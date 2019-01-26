$(document).ready(function()
{
    $(".heart").click(function()
    {
        let heart = this;
        $.ajax({
            url: "script/like.php",
            method: "POST",
            data: {tweet: $(this).attr("value")},
            success: function(data)
            {
                (data != "delete" ? $(heart).attr("src", "view/assets/images/redlike.svg") : $(heart).attr("src", "view/assets/images/like.svg"));
            }
        })
    })
})