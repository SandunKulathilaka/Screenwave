


    let btnNowShowing = document.getElementById('nowShowing');
    let btnUpcoming = document.getElementById('upcoming');
    let images =["img/wp12698399.jpg","img/avengers-endgame-superheroes-2ujw4a3pp2gh8xpf.jpg","img/blue-beetle-dc-4000x2490-11588.jpg","img/justice-league.jpg"];
    let names =["Gran Turismo 2023","Avengers End Game 2023","Blue Beetle 2023","Justice League 2023"];
    let ranks =["IMDB 7.2","IMDB 9.2","IMDB 6.7","IMDB 8.5"];
    let nowShowing = document.querySelectorAll(".item-now");
    let upcoming = document.querySelectorAll(".item-later");
    let loginBtn = document.getElementById("login");

    function showSlides() {
        let image = document.getElementById("image");
        let name = document.getElementById("movieName");
        let rank = document.getElementById("rank");
        let rand = Math.floor(Math.random() * 4);
        console.log(rand);

    image.src = images[rand];
    name.innerHTML = names[rand];
    rank.innerHTML = ranks[rand];
}

    function showNowShowing (){

        btnNowShowing.style.backgroundColor = "yellow";
        btnNowShowing.style.color = "black";
        btnUpcoming.style.backgroundColor = "";
        btnUpcoming.style.color = "";


        for (i=0;i<upcoming.length;i++){
            upcoming[i].style.display = "none";
        }

        for (i=0;i<nowShowing.length;i++){
            nowShowing[i].style.display = "" ;
        }
    }
    function showUpcoming (){
        btnNowShowing.style.backgroundColor = "";
        btnNowShowing.style.color = "";
        btnUpcoming.style.backgroundColor = "yellow";
        btnUpcoming.style.color = "black";

        for (i=0;i<nowShowing.length;i++){

            nowShowing[i].style.display = "none" ;
        }
        for (i=0;i<upcoming.length;i++){
            upcoming[i].style.display = "" ;
        }
    }

    function alertFunction(x){
        alert("You clicked : "+x);
    }

    showNowShowing();
    showSlides();
    setInterval(showSlides, 5000); // Change image every 5 seconds

