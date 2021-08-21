<p> This is a respository containing an api for weather information.
    Setup Instructions
    <ul>
        <li>Clone this respository</li> 
        <li>Setup Virtual Host for 'api' directory</li> 
        <li>composer install</li> 
        <li>php init</li>
    </ul>
</p>

<p>Api Documentation:</br>
    Endpoint: your-domain/weather/get-detail </br>
    Request Params: </br>
        q={city name}</br>
        or
        q={city name},{state code}</br>
        or
        q={city name},{state code},{country code}</br>
    Response: Json
    
    
    Example:
    Request - your-domain/weather/get-detail?q=london
    Response - 
    {
        "success": true,
        "status": 200,
            "data": {
            "cod": 200,
            "name": "London",
            "country": "GB",
            "timezone": 3600,
            "weather": "Clouds",
            "description": "overcast clouds",
            "coordinates": {
            "lon": -0.1257,
            "lat": 51.5085
            },
            "wind-speed": 2.06,
            "wind-deg": 90,
            "temp_min": 287.98,
            "temp_max": 290.2,
            "pressure": 1016,
            "humidity": 91,
            "visibility": 10000,
            "sunrise": 1629521751,
            "sunset": 1629573106
            }
        }
    
</p>
