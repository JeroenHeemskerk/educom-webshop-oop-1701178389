/*$(document).ready( function() {
    showStars()
        const starLocation = $(".stars")
        if (starLocation.length == 0){return}
        if (starLocation.length == 1){
            const itemId = starLocation[0].dataset["itemId"]
            retrieveRating(itemId)
        } else {
            retrieveRatings()
        }
    $(".stars").click( function() {
       const rating = $(this).attr('data-rating')
        

       $(".star").removeClass('ratedStar')
       
       $('.star').each( (index, elem) => {
         const itemRating = $(elem).attr('data-rating')
         if(itemRating <= rating) {
           $(elem).addClass('ratedStar')
         }
       })
     })

 })   */

$(document).ready(
    function()
    {
        showStars()
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
}


function retrieveRating(itemId)
{
    $.get("index.php?action=ajax&function=getRating&id="+itemId,
    function (data, status){
        console.log(data)
        const output = JSON.parse(data)
        const avgRating = output[0]
        const myRating = output[1]
        avgRating.showStars(stars.itemId, stars.stars, "avg")
        myRating.showStars(stars.itemId, stars.stars, "my")
        //Hier moet iets anders staan
    })
}

function retrieveRatings()
{
    $.get("index.php?action=ajax&function=getRatings",
    function(data, status){
        console.log(data)
        alert(data)
        const output = JSON.parse(data)
        const avgRatings = output[0]
        const myRatings = output[1]
        avgRatings.forEach(stars => {showStars(stars.itemId, stars.stars, "avg")})
        myRatings.forEach(stars => {showStars(stars.itemId, stars.stars, "my")})
    })
}