<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link href="/template/style.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Assignment 2</title>
  </head>
  <body>

    <!--<h1><?php site_name(); ?></h1> -->



    <header>
        <h1></h1>
        <nav class="navbar navbar-dark bg-dark">
            <?php nav_menu(); ?>
        </nav>


    </header>

    <div class="jumbotron">
        <h1 class="display-4">Welcome to the random comic generator</h1>
        <p class="lead">Your number one source for comics!!</p>
        <hr class="my-4">
        <p>Click the button below to choose another comic!</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Randomize!</a>
    </div>

    <article>
        <h2><?php page_title(); ?></h2>
        <?php page_content(); ?>
    </article>

    <footer>
        <small>&copy;<?php echo date('Y'); ?> <?php site_name(); ?>.<br><?php site_version(); ?></small>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $('#comicGenerator').click(function (){
          $.ajax({
              type: 'post',
              url: "/includes/functions.php",
              data: {'random' : true},
              dataType:"HTML", // May be HTML or JSON as your wish
              success: function(data)
              {
                  $('#randomComic').html(data) // The server's response is now placed inside your target div
              },
              error: function()
              {
                  alert("Failed to get data.");
            }
          }); // Ajax close
          return false; // So the button click does not refresh the page
      }); // Function end
    </script>
  </body>
</html>

