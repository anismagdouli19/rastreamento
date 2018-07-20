<?php 
if($_GET['sources'])
    show_source(__FILE__);
else
    header('Content-Type: application/vnd.google-earth.kml+xml');
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";

$cnx = mysql_connect('localhost', 'root', 'horus4321');
mysql_select_db('tracker', $cnx);

if($_GET['entries'] <> ""){
  $entries = $_GET['entries'];
  }
elseif ($_POST['entries'] <> "") {
  $entries = $_POST['entries'];
  }  
else {
  $entries = 50;
  }
// echo $entries

if($_GET['imei'] <> "")
{
	$imei = $_GET['imei'];
}
elseif ($_POST['imei'] <> "") 
{
	$imei = $_POST['imei'];
} else {
	$imei = 0;
}

if ($_GET['cliente'] <> "") {
    $cliente = $_GET['cliente'];
} elseif ($_POST['cliente'] <> "") {
    $cliente = $_POST['cliente'];
} else {
    $cliente = 0;
}

?>

<kml xmlns="http://earth.google.com/kml/2.1">
  <Document>
    <name>Tracker Map</name>
    <description>Tracker</description>

    <Style id="highlightPlacemark">
      <IconStyle>
        <Icon>
          <href>http://google-maps-icons.googlecode.com/files/suv.png</href>
        </Icon>
      </IconStyle>
    </Style>

    <Style id="highlightPlacemarkGreen">
      <IconStyle>
        <Icon>
          <href>http://google-maps-icons.googlecode.com/files/amphitheater-tourism.png</href>
        </Icon>
      </IconStyle>
    </Style>
	
    <Style id="color1">
      <LineStyle>
        <color>ffff0000</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color2">
      <LineStyle>
        <color>ff0000ff</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color3">
      <LineStyle>
        <color>ff009900</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color4">
      <LineStyle>
        <color>ff00ccff</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color5">
      <LineStyle>
        <color>ffff33ff</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color6">
      <LineStyle>
        <color>ff66a1cc</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color7">
      <LineStyle>
        <color>ffcc00cc</color>
        <width>4</width>
      </LineStyle>
    </Style>
    <Style id="color8">
      <LineStyle>
        <color>ff61f2f2</color>
        <width>4</width>
      </LineStyle>
    </Style>

    <Style id="BalloonStyle">
      <BalloonStyle>
        <!-- a background color for the balloon -->
        <bgColor>ffffffbb</bgColor>
        <!-- styling of the balloon text -->
        <text><![CDATA[
        <b><font color="#CC0000" size="+3">$[name]</font></b>
        <br/><br/>
        <font face="Courier">$[description]</font>
        <br/><br/>
        Extra text that will appear in the description balloon
        <br/><br/>
        <!-- insert the to/from hyperlinks -->
        $[geDirections]
        ]]></text>
      </BalloonStyle>
    </Style>

    <Style id="greenPoint">
      <LineStyle>
        <color>ff009900</color>
        <width>4</width>
      </LineStyle>
    </Style>

<?php

$step = 255 / $entries;
//echo $step;
$color = 0;

// $res2 = mysql_query("select imei from bem where cliente = 2 and activated = 'S'");
$res2 = mysql_query("select imei from bem where cliente = $cliente and activated = 'S'");
while($data2 = mysql_fetch_assoc($res2)) {
	$color++;
	
	$loop = 0;

	$res = mysql_query("SELECT (SELECT name FROM bem b where imei = ". $data2['imei'] .") as nomeBem, g.* FROM gprmc g WHERE gpsSignalIndicator = 'F' and imei = ". $data2['imei'] ." ORDER BY id DESC LIMIT $entries");
	$line_coordinates = "";
	$ballons = "";

	while($data = mysql_fetch_assoc($res))
	{
		if ($data['phone'] == '5011')
					       	          {
					       	          
					       	          $longitudeDecimalDegrees = $data['longitudeDecimalDegrees'];
					       	          $latitudeDecimalDegrees = $data['latitudeDecimalDegrees'];
					                 } else {
					               
					               // Calculo das coordenadas. Convertendo coordenadas do modo GPRS para GPS
					               $trackerdate = ereg_replace("^(..)(..)(..)(..)(..)$", "\\3/\\2/\\1 \\4:\\5", $data['date']);
					                 strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0'.$data['latitudeDecimalDegrees'];
					                 $g = substr($data['latitudeDecimalDegrees'],0,3);
					                 $d = substr($data['latitudeDecimalDegrees'],3);
					                 $latitudeDecimalDegrees = $g + ($d/60);
					                 $data['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;
					       
					       
					                 strlen($data['longitudeDecimalDegrees']) == 9 && $data['longitudeDecimalDegrees'] = '0'.$data['longitudeDecimalDegrees'];
					                 $g = substr($data['longitudeDecimalDegrees'],0,3);
					                 $d = substr($data['longitudeDecimalDegrees'],3);
					                 $longitudeDecimalDegrees = $g + ($d/60);
					                 $data['longitudeHemisphere'] == "S" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
					       
					                 $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
					                 }
					       
					       
					                if ($data['phone'] == '5011') {
					               $speed = $data['speed'] ;
					       	}
					       	else
					       	{
					       	$speed = $data['speed'] * 1.609;
				}
		
			if ($loop == 0) {
				echo '
				<Placemark>
					<name>'.$data['nomeBem'].'</name>
					<styleUrl>#highlightPlacemarkGreen</styleUrl>
					<description>Speed : '.floor($speed).'Km/h - Date : '.ereg_replace("^(..)(..)(..)(..)(..)$","\\3/\\2/\\1 \\4:\\5",$data['date']).'</description>
					<Point>
					  <coordinates>'."$longitudeDecimalDegrees,$latitudeDecimalDegrees,0".'</coordinates>
					</Point>
				</Placemark>
				
				<Placemark>
					<name>Red Line</name>
					<styleUrl>#color' . $color . '</styleUrl>
					<LineString>
						<altitudeMode>relative</altitudeMode>
						<coordinates>
							'."$longitudeDecimalDegrees,$latitudeDecimalDegrees,0\n";
			} else {
		
				if ($loop != 0) {
					echo "$longitudeDecimalDegrees,$latitudeDecimalDegrees,0\n";
				}
			}
			
		$loop++;
		
	}
	echo "			</coordinates>
				</LineString>
			</Placemark>";
}
mysql_close($cnx);
?>
  </Document>
</kml>
