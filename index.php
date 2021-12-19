<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Weather Chanettee</title>
</head>
<style>
    .bg {
        background-color: #F5EED8;
    }
</style>

<body class="bg">
    <div class="container">
        <p>
        <h1 class="text-center">Weather forecast</h1>
        </p>
        <div class="col-md-6 mx-auto">

            <div class="input-group mb-3">
                <span class="input-group-text">Latitude</span>
                <input type="text" class="form-control" placeholder="7.2033356" aria-label="Latitude"
                    aria-describedby="Latitude" id="Latitude">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">Longitude</span>
                <input type="text" class="form-control" placeholder="99.6939695" aria-label="Longitude"
                    aria-describedby="Longitude" id="Longitude">
            </div>

            <div class="d-flex justify-content-center">
                <button id="btnLoad" type="button" class="btn btn-success" style="width:160px; height:55px">Load</button>
            </div>

            <div id="Weather" class="card container mt-4 d-flex justify-content-center">

            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<script>

function Climate(value) {
        let time = value;
        var convert = new Date(time * 1000);
        var hours = convert.getHours();
        var months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        var date = convert.getDate();
        var month = months[convert.getMonth()];
        var year = convert.getFullYear();
        var minutes = "0" + convert.getMinutes();
        var seconds = "0" + convert.getSeconds();
        var today = date + '/' + month + '/' + year + ' เวลา ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
        return today
    }

    function Default() {
        var urlDefualt = "https://api.openweathermap.org/data/2.5/weather?lat=7.2033356&lon=99.6939695&appid=d1eed91d1cc9541e07aefcbd356f8112";
        $.getJSON(urlDefualt)
            .done((data) => {
                var datetime = Climate(data.dt);
                var sunrise = Climate(data.sys["sunrise"]);
                var sunset = Climate(data.sys["sunset"]);
                var today = Climate()
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(2));
                var humid = (data.main["humidity"]);
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })

                var line = "<div id='DataWeather'>";
                line += "<img src='https://cdn.pixabay.com/photo/2015/10/30/20/13/sunrise-1014712_960_720.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<h3 class='card-title'>" + place + "</h3>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + " เซลเซียส </p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "%</p>";
                line += "<p class='card-text'>ดวงอาทิตย์ขึ้น : วันที่ " + sunrise + "</p>";
                line += "<p class='card-text'>ดวงอาทิตย์ตก : วันที่ " + sunset + "</p>";
                line += "<p class='card-text'>ณ วันที่ :  " + datetime + "</p>";
                line += "</div>"
                $("#Weather").append(line);
            }).fail((xhr, status, error) => { })
    }

    function LoadForcast() {
        var x = $("#Latitude").val();
        var y = $("#Longitude").val();
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + x + "&lon=" + y + "&appid=d1eed91d1cc9541e07aefcbd356f8112"
        $.getJSON(url)
            .done((data) => {
                var datetime = Climate(data.dt);
                var sunrise = Climate(data.sys["sunrise"]);
                var sunset = Climate(data.sys["sunset"]);
                var date = Climate(data.sys["date"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(2));
                var humid = (data.main["humidity"]);
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })

                var line = "<div id='DataWeather'>";
                line += "<img src='https://cdn.pixabay.com/photo/2015/11/16/21/46/grasses-1046475_960_720.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<h3 class='card-title'>" + place + "</h3>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + " เซลเซียส </p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์  : " + humid + "%</p>";
                line += "<p class='card-text'>ดวงอาทิตย์ขึ้น : วันที่ " + sunrise + "</p>";
                line += "<p class='card-text'>ดวงอาทิตย์ตก : วันที่ " + sunset + "</p>";
                line += "<p class='card-text'>ณ วันที่:  " +  datetime + "</p>";
                line += "</div>"
                $("#Weather").append(line);
            }).fail((xhr, status, error) => { })
    }

    $(() => {
        Default();
        $("#btnLoad").click(() => {
            LoadForcast();
            $("#DataWeather").hide();
        });
    });
</script>

</html>
