var animalContainer = document.getElementById("post-info");

var postTitle = document.getElementById("post-title");
var postBody = document.getElementById("post-created");
var postCreated = document.getElementById("post-body");
var postModified = document.getElementById("post-modified");

var btn = document.getElementById("press-btn");

btn.addEventListener("click", function() {
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'http://localhost/cake-app/posts/getjsonxmlposts.json');
    ourRequest.onload = function () {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var posts = JSON.parse(ourRequest.responseText);
            renderHTML(posts);
        } else {
            console.log("We connected to the server, but it returned an error.");
        }
    };
    ourRequest.onerror = function () {
        console.log("Connection error");
    };

     ourRequest.send();
     btn.classList.add('hide-me');

});

function renderHTML(posts) {
    var htmlString = "";
    for (i = 0; i < 3; i++) {
        htmlString += "<div class='jumbotron'>" ;
        htmlString += "<p><h2>" + posts[i].title + "</h2></p>";
        htmlString += "<p>" + posts[i].body + "</p>";
        htmlString += "<small class='label label-info'> Post Modified on: " + posts[i].modified + "</small>";
        htmlString += "</div>";
        animalContainer.insertAdjacentHTML('beforeend', htmlString);
        htmlString = "";
    }
}