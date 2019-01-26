function getTweet()
{
    $.ajax({
        url: "script/timeline.php",
        dataType: "json",
        method: "POST",
        data: {id: $("#homeTitle").attr("value")},
        success: function(data)
        {
           if(!$(".all_tweet").empty())
            {
                $(".all_tweet").empty();
            }

            data.sort(function(a,b)
            {
                return new Date(a.tweet_date).getTime() - new Date(b.tweet_date).getTime() 
            });
            data.reverse();

            for(var i = 0; i < data.length; i++)
            {
               // let fileexst = "<?php if(file_exists("userImages/' . $_SESSION['id'] . '/profil.jpg')):?><img class='images' src='userImages/<?= $_SESSION['id']?>/profil.jpg' alt='user'><?php else:?><img class='images' src='view/assets/images/user.svg' alt='user'><?php endif;?>"
                $(".all_tweet").append("<div class='tweet'><div class='tweet_photo'><img class='images' src='view/assets/images/user.svg'/></div><div class='tweet_describe'><span class='pseudo'>@"+data[i]["pseudo"]+"</span><p>" + data[i]["text"] + "</p><span class='date'>" + data[i]["tweet_date"] + "</span></div></div>");
            }
        }
    })
}

setInterval(getTweet, 3000);