<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Digital Baby Memory Book</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link rel="stylesheet" href="style.css">

<!-- PDF Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>

<body>

<nav class="navbar">
<a href="index.php">Home</a>
<a href="view_memories.php">Memories</a>
<a href="timeline.php">Timeline</a>
<a href="login.php">Parent Login</a>
</nav>


    <div id="loader">
  <div class="baby-loader">👶</div>
  <p>Loading Baby Memory Book...</p>
</div>

<div class="bubbles">
  <span></span><span></span><span></span><span></span>
  <span></span><span></span><span></span><span></span>
</div>

<header>
<h1>Digital Baby Memory Book</h1>
</header>

<section class="dashboard">

<div class="card">
<h3>Total Memories</h3>
<p id="totalMemories">0</p>
</div>

<div class="card">
<h3>Latest Memory</h3>
<p id="latestMemory">None</p>
</div>

<div class="card">
<h3>Memory Count</h3>
<p id="memoryCount">0</p>
</div>

<div class="card">
<h3>Baby Age</h3>

<input type="date" id="birthDate">
<button onclick="calculateAge()">Calculate</button>

<p id="babyAge"></p>

</div>

</section>

<section class="chart-section">

<h2>Memory Statistics</h2>

<canvas id="memoryChart"></canvas>

</section>

<section class="add-memory">

<h2>Add Memory</h2>

<input type="text" id="title" placeholder="Memory title">

<input type="date" id="date">

<input type="file" id="photo">

<p id="captionSuggestion"></p>

<button onclick="addMemory()">Add Memory</button>

<br><br>

<button onclick="downloadPDF()">Download Memory Book PDF</button>

</section>

<section class="timeline">

<h2>Memory Timeline</h2>

<div id="memoryList"></div>

</section>

<section class="slideshow-section">


<h2>Memory Slideshow Gallery</h2>

<div class="slideshow-container">

<img id="slideImage" src="" style="width:300px;height:auto;">

</div>

</section>

<section class="growth-timeline">

<h2>Baby Growth Timeline</h2>

<div class="timeline-item">👶 Birth</div>
<div class="timeline-item">🍼 First Feeding</div>
<div class="timeline-item">🧸 First Toy</div>
<div class="timeline-item">🚶 First Walk</div>
<div class="timeline-item">🎂 First Birthday</div>

</section>

<script src="script.js"></script>

</body>
</html>