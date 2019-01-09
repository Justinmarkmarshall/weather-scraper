<?php

if($_GET['city']) {

    $city = str_replace(' ', '', $_GET['city']);

    $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");

    $pageArray = explode('</h2>(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',
    $forecastPage);

    $secondPageArray = explode('</span></p></td>', $pageArray[1]);

    $weather = $secondPageArray[0];

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Weather Scraper</title>
    <style type="text/css">
    

    html {
            background: url(background.jpg) no-repeat center center fixed;
            background-size: cover;
        }

    body {
        background: none;
    }

    .container {
        text-align: center;
        margin-top: 176px;
        width: 450px;
    }

    #weather {
        text-align: center;
        width: 420px;  
    }

    input {
        margin: 20px 0px;
    }

    button {
        margin: 20px 0px;
    }

    </style>

  </head>
  <body>
    
<div class="container">

    <h1> What is the weather?</h1>
    <form>
        <div class="form-group">
            <label for="">Enter your city here</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter a city name, eg London, Paris" value="<?php echo $_GET['city']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="weather"><?php

        if($weather) {
            echo' 
            <div class="alert alert-success" role="alert">
            '.$weather.'
        </div>';

        } 

        ?>
    </div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>