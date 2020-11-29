
<head>
  <title>Sparta cross-zero</title>
	<meta charset="windows-1251">
  <LINK REL="stylesheet" HREF = "styles\person_style.css">
  <LINK REL="stylesheet" HREF = "styles\menu_styles.css">
</head>
<body>
<p id ="info"><?php echo "Game #".$_GET['game']." ".$_GET['course'] ?></p>
<div class="fight_field" style="display: table">
      <div style="display: table-row">
        <img class="field" id="1" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="2" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="3"  src="images\square-100.png" style="display: table-cell">
      </div>
      <div style="display: table-row">
        <img class="field" id="4" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="5" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="6" src="images\square-100.png" style="display: table-cell">
      </div>
      <div style="display: table-row">
        <img class="field" id="7" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="8" src="images\square-100.png" style="display: table-cell">
        <img class="field" id="9" src="images\square-100.png" style="display: table-cell">
      </div>
      <div style="display: table-row">
          <input id="before" type="button" value="<" style="display: table-cell">
          <input id="next" type="button" value=">" style="display: table-cell">
      </div>
</div>
<script src="scripts\replay_script.js"></script>
</body>
