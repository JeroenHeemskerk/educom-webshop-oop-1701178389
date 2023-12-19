$(document).ready(
    function()
    {
        const starLocation = $(".avgStars")
        if (starLocation.length == 0){return}
        if (starLocation.length == 1){
            const itemId = starLocation[0].dataset["itemId"]
            retrieveRating(itemId)
        } else {
            retrieveRatings()
        }
    }
)

function showStars(itemId, stars, type)
{
    const parent = $("."+type+"Stars[data-item-id= '"+itemId+"']")
    if (parent == undefined)
    {
        return
    }
    parent.empty()
    for (let i = 1; i != 6; i++)
    {
        const star = document.createElement("span")
        star.classList.add("star")
        star.setAttribute('data-nr', i)
        if (i <= stars)
        {
            star.innerHTML = "&#9733;"
        } else {
            star.innerHTML = "&#9734;"
        }
        parent.append(star)
        console.log(parent)
    }
    //Als je op een ster klikt
    $(".star").click( function() {
        const newRating = $(this).attr('data-nr')
        const parent = $(this)[0].parentElement
        console.log($(this))
        const itemId = parent.dataset["itemId"]
        sendRating(itemId, newRating)
})
}


function retrieveRating(itemId)
{
    $.get("index.php?action=ajax&function=getRating&id="+itemId,
    function (data, status){
        console.log(data)
        const
        const output = JSON.parse(data)
        const avgRating = output[0]
        const myRating = output[1]
        showStars(avgRating.itemId, avgRating.stars, "avg")
        showStars(0, 0, "my")
        showStars(myRating.itemId, myRating.stars, "my")
    })
}

function retrieveRatings()
{
    $.get("index.php?action=ajax&function=getRatings",
    function(data, status){
        console.log(data)
        //alert(data)
        const output = JSON.parse(data)
        const avgRatings = output[0]
        const myRatings = output[1]
        avgRatings.forEach(stars => {showStars(stars.itemId, stars.stars, "avg")})
        for (let i = 1; i < 6; i++) {showStars(i, 0, "my")}
        myRatings.forEach(stars => {showStars(stars.itemId, stars.stars, "my")})
    })
}

function sendRating(itemId, newRating)
{
    $.ajax({
        url: "index.php",
        method: "POST",
        data: {
            action: "ajax",
            function: "rateItem",
            id: itemId,
            stars: newRating
        },
        error: function(xhr, status, error){
            console.error('Error:', status, error);
        }
    })
    retrieveRating()
}
