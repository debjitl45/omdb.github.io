<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script type="text/javascript" >

  	function movieSelected(id){
	sessionStorage.setItem('movieId',id);
	window.location = 'movie.php';
	return false;
}
function getMovie(){
	let movieId = sessionStorage.getItem('movieId');
	 axios.get('http://omdbapi.com/?apikey=daf62b50&i='+movieId)
	.then((response)=>{
     console.log(response);
     let movie = response.data;
     let output =`<div class="row">
     <div class="col-md-4" style="margin-left: 450px;">
     <img src="${movie.Poster}" class="avatar">
     </div>
     <div class="col-md-8">
     <h2 style="margin-left: 450px;">${movie.Title}</h2>
     </div>
     </div>`;

     $("#movie").html(output);
    	})
	.catch((error)=>{
     console.log(error);
	});

}
  </script>
</head>
<body>
	<?php session_start(); ?>
<div class="body content">
	<div class="welcome">
		<div class="alert alert-success"><?=$_SESSION['username']?>'s Profile</div>
		<br>
		Welcome!<span class="user"><?=$_SESSION['username']?></span>
	</div>
</div>
	<button class="btn btn-outline-info" onclick="show()">Seen</button>
	<button class="btn btn-outline-info" onclick="rate()">Rate Movie</button>
    <div class="box" style="display: none;" id="like">
	  <div class="container">
		<div id="movie" class="well"></div>
	  </div>
	<div class="rating" style=" display: none;" id="rate">
		<span><h2>Ratings</h2></span>
		<input type="radio" name="star" id="star5"><label>Best Movie Ever Seen</label><br>
		<input type="radio" name="star" id="star4"><label>Awesome</label><br>
		<input type="radio" name="star" id="star3"><label>Good!</label><br>
		<input type="radio" name="star" id="star2"><label>OK</label><br>
		<input type="radio" name="star" id="star1"><label>Hated It!</label>
	</div>
	</div>


<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
	getMovie();
</script>
<script type="text/javascript">
	function show(){
     var s=document.getElementById('like');
     s.style.display="block";
	}
</script>
<script type="text/javascript">
	function rate(){
     var r=document.getElementById('rate');
     r.style.display="block";
	}
</script>
</body>
</html>