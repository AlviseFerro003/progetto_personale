dycalendar.draw({
    target: '#dycalendar',
    type: 'month',
    dayformat: 'full',
    monthformat: 'full',
    highlighttargetdate: true,
    //highlighttoday: true,
    prevnextbutton: 'show'
})

// When the user clicks on <div>, open the popup
function myFunction()
{
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}