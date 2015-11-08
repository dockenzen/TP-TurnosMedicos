<?php
 
$url = "http://weather.service.msn.com/data.aspx?src=vista&weadegreetype=C&culture=es-ES&wealocations=wc:ARBA0107";
$contents = file_get_contents($url);
$data = simplexml_load_string($contents);
 
$weather_info = $data->weather->current;
$weather_current = $data->weather;
$weather_forecast = $data['weather']['forecast_conditions'];
$trazo = "http://blob.weather.microsoft.com/static/weather4/es-es/";
echo $weather_info;
?>

<div id="current">
    <label>Ciudad:</label><?php echo $weather_current["weatherlocationname"];?><br/>
    <!--<img src="<?php// echo $weather_info['skycode']; ?>"/>-->
    <label>Estado:</label> <?php echo $weather_info['skytext']; ?>  
     - <?php echo $weather_info['temperature']; ?> &deg;C<br/>
    <label>Humedad:</label> <?php echo $weather_info['humidity']; ?>%
</div>
