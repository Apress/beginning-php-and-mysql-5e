<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unit Converter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 32px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Unit Converter
                </div>

                <div class="links">
                    <form id="convertForm" method="POST" action="/calculate">
                       @csrf
                       <input id="from" name="from" placeholder="From" type="number">
                       <select id="fromUnit" name="fromUnit">
                          <option value="25.4">Inch</option>
                          <option value="304.8">Foot</option>
                          <option value="1">Millimeter (mm)</option>
                          <option value="10">Centimeter (cm)</option>
                          <option value="1000">Meeter (m)</option>
                       </select>
                       <br/>
                       <input id="to" placeholder="To" type="number" disabled>
                       <select id="toUnit" name="toUnit">
                          <option value="25.4">Inch</option>
                          <option value="304.8">Foot</option>
                          <option value="1">Millimeter (mm)</option>
                          <option value="10">Centimeter (cm)</option>
                          <option value="1000">Meeter (m)</option>
                       </select>
                       <br/>
                       <button type="submit">Calculate</button>
                   </form>
                </div>
            </div>
        </div>
        <script>
$("#convertForm").submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();
  // Get some values from elements on the page:
  var $form = $( this ),
    t = $form.find("input[name='_token']").val(),
    f = $form.find("#from").val(),
    fU = $form.find("#fromUnit").val(),
    tU = $form.find("#toUnit").val(),
    url = $form.attr("action");

  // Send the data using post
  var posting = $.post( url, { _token: t, from: f, fromUnit: fU, toUnit: tU } );

  // Put the results in a div
  posting.done(function( data ) {
    $("#to").val(data.to);
  });
});
        </script>
    </body>
</html>
