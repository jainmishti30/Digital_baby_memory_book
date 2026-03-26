console.log("Digital Baby Memory Book Loaded Successfully");

let memories = JSON.parse(localStorage.getItem("memories")) || []

/* ADD MEMORY */

function addMemory(){

let title = document.getElementById("title").value
let date = document.getElementById("date").value
let photoFile = document.getElementById("photo").files[0]

if(!photoFile) return

addWatermark(photoFile,function(watermarkedImage){

let memory = {
title:title,
date:date,
photo:watermarkedImage
}

memories.push(memory)

localStorage.setItem("memories",JSON.stringify(memories))

displayMemories()
updateDashboard()
loadChart()

})

}

/* WATERMARK FUNCTION */

function addWatermark(file,callback){

const reader = new FileReader()

reader.onload = function(e){

const img = new Image()
img.src = e.target.result

img.onload = function(){

const canvas = document.createElement("canvas")
const ctx = canvas.getContext("2d")

canvas.width = img.width
canvas.height = img.height

ctx.drawImage(img,0,0)

ctx.font = "30px Arial"
ctx.fillStyle = "rgba(255, 255, 255, 0.75)"
ctx.textAlign = "right"

ctx.fillText("Mishti Jain",canvas.width-40,canvas.height-40)

callback(canvas.toDataURL())

}

}

reader.readAsDataURL(file)

}

/* DISPLAY MEMORIES */

function displayMemories(){

let list = document.getElementById("memoryList")
list.innerHTML=""

memories.forEach((m,index)=>{

list.innerHTML += `
<div class="memory">

<h3>${m.title}</h3>

<p>${m.date}</p>

<img src="${m.photo}">

<br><br>

<button onclick="deleteMemory(${index})">Delete</button>
<button onclick="editMemory(${index})">Edit</button>

</div>
`

})

}

/* DELETE MEMORY */

function deleteMemory(index){

memories.splice(index,1)

localStorage.setItem("memories",JSON.stringify(memories))

displayMemories()
updateDashboard()
loadChart()

}

/* EDIT MEMORY */

function editMemory(index){

let newTitle = prompt("Edit memory title",memories[index].title)

if(newTitle){
memories[index].title = newTitle
}

localStorage.setItem("memories",JSON.stringify(memories))

displayMemories()
updateDashboard()

}

/* DASHBOARD */

function updateDashboard(){

document.getElementById("totalMemories").innerText = memories.length

document.getElementById("memoryCount").innerText = memories.length

if(memories.length>0){
document.getElementById("latestMemory").innerText =
memories[memories.length-1].title
}

}

/* BABY AGE CALCULATOR */

function calculateAge(){

let birthDate = document.getElementById("birthDate").value

let birth = new Date(birthDate)

let today = new Date()

let age = today.getFullYear() - birth.getFullYear()

document.getElementById("babyAge").innerText =
age + " years old"

}

let memories = [];
let slideIndex = 0;

fetch("slideshow.php")
    .then(response => response.json())
    .then(data => {
        memories = data;
        startSlideshow();
        setInterval(startSlideshow, 3000);
    });

/* SLIDESHOW */

function startSlideshow(){

if(memories.length==0) return

let slideImage = document.getElementById("slideImage")

if(!slideImage) return

slideImage.style.opacity = 0

setTimeout(()=>{

slideImage.src = memories[slideIndex].photo

slideImage.style.opacity = 1

slideIndex++

if(slideIndex>=memories.length){
slideIndex=0
}

},300)

}

/* MEMORY CHART */

function loadChart(){

let ctx = document.getElementById("memoryChart")

if(!ctx) return

new Chart(ctx,{

type:"bar",

data:{
labels:["Memories"],
datasets:[{
label:"Total Memories",
data:[memories.length],
backgroundColor:"#667eea"
}]
},

options:{
responsive:true
}

})

}

/* AI CAPTION GENERATOR */

const captions = [

"Baby’s cutest smile today!",
"A precious little memory.",
"Growing up so fast!",
"Our little sunshine moment.",
"Small steps, big memories.",
"Too cute to handle!",
"Tiny hands, big love.",
"Our little star shining bright.",
"Tiny feet make the biggest footprints in our hearts",
"A baby is a blessing, a gift from above",
"You are the sweetest chapter of our love story",
"In your tiny hands, I found my whole world",
"A baby fills a space in your heart you never knew was empty",
"Pure love, wrapped in blankets",
"Hello, I'm new here!",
"Little miracle",
"Born to steal hearts",
"Purest joy",
"Tiny hands, big personality",
"The snuggle is real",
"Welcome to the world, little one",
"Our family just got a little more fabulous",
"The best things come in small packages",
"A new adventure begins",

]

document.getElementById("photo").addEventListener("change",function(){

let randomCaption = captions[Math.floor(Math.random()*captions.length)]

document.getElementById("captionSuggestion").innerText =
"Suggested Caption: " + randomCaption

})

/* LOADER */

window.addEventListener("load",function(){

let loader = document.getElementById("loader")

if(loader){
loader.style.display="none"
}

})

displayMemories()
updateDashboard()
loadChart()

window.addEventListener("load", function(){
  let loader = document.getElementById("loader");
  if(loader){
    loader.style.display = "none";
  }
});

let index = 0;

function showSlides(){

let slides = document.querySelectorAll(".slide");

slides.forEach(slide=>{
slide.style.display="none";
});

index++;

if(index > slides.length){
index = 1;
}

slides[index-1].style.display="block";

setTimeout(showSlides,3000);

}

showSlides();

window.onload = function () {
    document.getElementById("loader").style.display = "none";
};