var icon = document.getElementById('icon');

icon.addEventListener('click', function () {
    document.body.classList.toggle('lighttheme');
    if (document.body.classList.contains('lighttheme')) {
        icon.src = '../assets/moon.png';
    } else {
        icon.src = '../assets/sun.png';
    }
});


function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('Time').innerHTML = h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) { i = "0" + i };  
  return i;
}

function playVideo(videoId) {
  var modal = document.createElement("div");
  modal.innerHTML = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoId + '?si=bkT1P0cBRj--tTBb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

  document.body.appendChild(modal);

  modal.style.position = "fixed";
  modal.style.top = "0";
  modal.style.left = "0";
  modal.style.width = "100%";
  modal.style.height = "100%";
  modal.style.backgroundColor = "rgba(0,0,0,0.7)";
  modal.style.display = "flex";
  modal.style.justifyContent = "center";
  modal.style.alignItems = "center";
  
  modal.addEventListener("click", function () {
    modal.parentNode.removeChild(modal);
  });
}

function addToWatchlist(button, event) {
 
  event.stopPropagation();

  
  var movieTitle = button.getAttribute("data-title");
  var trailerId = button.getAttribute("data-trailer");

  
  var form = document.createElement("form");
  form.setAttribute("method", "post");
  form.setAttribute("action", "../views/watchlist.php");

  
  var movieTitleInput = document.createElement("input");
  movieTitleInput.setAttribute("type", "hidden");
  movieTitleInput.setAttribute("name", "movieTitle");
  movieTitleInput.setAttribute("value", movieTitle);

  
  var trailerIdInput = document.createElement("input");
  trailerIdInput.setAttribute("type", "hidden");
  trailerIdInput.setAttribute("name", "trailerId");
  trailerIdInput.setAttribute("value", trailerId);

  
  var submitButton = document.createElement("input");
  submitButton.setAttribute("type", "submit");
  submitButton.setAttribute("value", "Add to Watchlist");

  
  form.appendChild(movieTitleInput);
  form.appendChild(trailerIdInput);
  form.appendChild(submitButton);

  
  document.body.appendChild(form);

 
  form.submit();

  
  document.body.removeChild(form);
}