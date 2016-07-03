<!-- imports the jqvmap visualisation of the map of nepal-->

  <link href="./jqvmap.css" media="screen" rel="stylesheet" type="text/css">
  <style>
    html, body {
      width: 100%;
      height: 100%;

    }
    #vmap {
      width: 100%;
      height: 100%;
      background-color: red;
    }
  </style>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="./jquery.vmap.js"></script>
  <script type="text/javascript" src="./jquery.vmap.nepal.js" charset="utf-8"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('#vmap').vectorMap({
        map: 'nepal',
        backgroundColor: '#F8F8F8',
        borderColor: '#818181',
        borderOpacity: 0.25,
        borderWidth: 1.8,
        color: '#eee',
        enableZoom: false,
        hoverColor: '#9BDA69',
        hoverOpacity: null,
        normalizeFunction: 'linear',
        selectedColor: '#fff',
        showTooltip: true,
        colors: {
        },
        onRegionClick: function (element, code, region) {
             parent.window.location='chart.php?district='+region;
        }
      });
    });
  </script>
  <div></div>
  <div id="vmap"></div>
