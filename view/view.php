<?php

// ## App Pages View ##

class AppView {

  // ## Index page layout ##
  function indexPage( $list ) {

    $commentList = '';

    while ($row = mysqli_fetch_array( $list ))
    {
      $commentList .= <<<html
      <br />
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{$row['name']}</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">{$row['message']}</p>
    <small>{$row['email']}</small>
  </a>
</div><br />
html;


}

    $layout = <<<html
    <section>
    <form action="index.php?act=create.html" method="post" name="guest">
  <fieldset>
    <legend>* Please fill in all field.</legend>
    <div class="form-group">
      <label for="exampleInputName">Name</label>
      <input type="text" name="name" id="name" class="form-control" aria-describedby="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="messa">Message</label>
      <textarea class="form-control" id="message" rows="4" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-primary">Clear</button>
  </fieldset>
</form>
</section><br />
html;

    $layout .= $commentList;
    return $layout;
  }

  // ## App Page Layout ## //
  function appLayout( $content ){
    return $layout = <<<html
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

    <title>WanLab Guestbook</title>
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">WanLab Guestbook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
</nav>
</header>

<main class="container">
<br /><br />
<h1>Hello friend! Plz leave your comment below.</h1>


<section>
{$content}
</section>
</main>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
html;

  } 
}

?>