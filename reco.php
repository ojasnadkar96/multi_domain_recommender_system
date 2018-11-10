<!DOCTYPE html>
<html>
<head>
<style>

body {
  margin:0;
  }

.navbar {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(15, 13, 13);
    position: fixed;
    top: 0;
    width: 100%;
    z-index:100;
}

li {
    height:55px;
    width:350px;
    float: left;
}

li a {
    display: block;
    height:55px;
    color: white;
    text-align: center;
    padding: 16px 16px;
    font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
    font-size:18px;
    
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: rgb(212, 206, 206);
    color:black;
    
}

.results {
  overflow:hidden;
  font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
  font-size:18px;
}

.column {
    float: left;
    width: 50%;
    background-color:#ddd;
    overflow:hidden;
    text-align:center;
    font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
    font-size:18px;
    }

.column2 {
    float: left;
    width: 25%;
    font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
    font-size:18px;
    text-align:center;
    }

.column3 {
    float: left;
    width: 100%;
    text-align:center;
    margin-top:55px;
    font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
    font-size:18px;
    }    

.column4 {
    float: left;
    width: 100%;
    text-align:center;
    font-family:"Cambria", Cochin, Georgia, Times, Times New Roman, serif;
    font-size:18px;
    }  
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.footer {
   position: relative;
   height:50px;
   margin:0;
   overflow:hidden;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(75, 72, 72, 0.781);
   color: white;
   text-align: center;
}

.autocomplete {
  /*the container must be positioned relative:*/
  position:relative;
  z-index:99;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  width:150px;
  text-align:center;
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  width:520px;
  height:300px;
  overflow:auto;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}


p1 {
  background-color:rgb(197, 193, 193);
  border-left:5px solid black;
  height:20px;
  padding:10px;
  text-align:center;

}


</style>
</head>
<body>

<div class="navbar">
  <li><a href="#home">HOME</a></li>
  <li><a href="#contact">CONTACT US</a></li>
  <li><a href="#about">ABOUT</a></li>
</div>

<div class="row" id="home" >
    <div class="column3" style="height:250px;">
    </br>
      <h2>SEARCH</h2>
      <form autocomplete="off" action="/home.php" method="post">
        <div class="autocomplete" style="width:500px;">
          <input id="myInput" type="text" name="myTaste" placeholder="Movies/Books">
        </div>
        <input type="submit" name="click" value="Recommend">
      </form>
      
    </div>
</div>   
<?php
// this php script is for connecting with database
// data have to fetched from local server
$mysql_host = 'localhost';
 
// user name is root
$mysql_user = 'root';
 
// function to connect with database having 
// argument host and user name
$con = mysqli_connect("127.0.0.1","root","");
if(!$con)
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysqli_select_db($con,"db"))
{
	die('oops database selection problem ! --> '.mysql_error());
}
if(isset($_POST['click']))
{
$choice= mysqli_real_escape_string($con,$_POST['myTaste']);

$query1 = "SELECT * FROM `table 3`
WHERE title='$choice'";

$result1=mysqli_query($con,$query1);
$row = mysqli_fetch_assoc($result1);
$sm1 = $row['movie1'];
$sm2 = $row['movie2'];
$sm3 = $row['movie3'];
$sm4 = $row['movie4'];
$sm5 = $row['movie5'];
$sb1 = $row['book1'];
$sb2 = $row['book2'];
$sb3 = $row['book3'];
$sb4 = $row['book4'];
$sb5 = $row['book5'];

$query2 = "SELECT * FROM `table 2`
WHERE comb_id='$sm1'"; 
$result2=mysqli_query($con,$query2);
$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $m1=$row['title'];
    

$query3 = "SELECT * FROM `table 2`
WHERE comb_id='$sm2'"; 
$result3=mysqli_query($con,$query3);
$row = mysqli_fetch_array($result3,MYSQLI_ASSOC);
     $m2=$row['title'];
    

$query4 = "SELECT * FROM `table 2`
WHERE comb_id='$sm3'"; 
$result4=mysqli_query($con,$query4);
$row = mysqli_fetch_array($result4,MYSQLI_ASSOC);
    $m3=$row['title'];            
    

$query5 = "SELECT * FROM `table 2`
WHERE comb_id='$sm4'"; 
$result5=mysqli_query($con,$query5);
$row = mysqli_fetch_array($result5,MYSQLI_ASSOC);
    $m4=$row['title'];            
    

$query6 = "SELECT * FROM `table 2`
WHERE comb_id='$sm5'"; 
$result6=mysqli_query($con,$query6);
$row = mysqli_fetch_array($result6,MYSQLI_ASSOC);
    $m5=$row['title'];            
    
  
$query7 = "SELECT * FROM `table 2`
WHERE comb_id='$sb1'"; 
$result7=mysqli_query($con,$query7);
$row = mysqli_fetch_array($result7,MYSQLI_ASSOC);
    $b1=$row['title'];            
    
    
$query8 = "SELECT * FROM `table 2`
WHERE comb_id='$sb2'"; 
$result8=mysqli_query($con,$query8);
$row = mysqli_fetch_array($result8,MYSQLI_ASSOC);
    $b2=$row['title'];            
    
    
$query9 = "SELECT * FROM `table 2`
WHERE comb_id='$sb3'"; 
$result9=mysqli_query($con,$query9);
$row = mysqli_fetch_array($result9,MYSQLI_ASSOC);
    $b3=$row['title'];            
    
    
$query10 = "SELECT * FROM `table 2`
WHERE comb_id='$sb4'"; 
$result10=mysqli_query($con,$query10);
$row = mysqli_fetch_array($result10,MYSQLI_ASSOC);
    $b4=$row['title'];            
    
    
$query11 = "SELECT * FROM `table 2`
WHERE comb_id='$sb5'"; 
$result11=mysqli_query($con,$query11);
$row = mysqli_fetch_array($result11,MYSQLI_ASSOC);
    $b5=$row['title']; 
}	
?>


<div class="results">
  <div class="column" style="height:400px;">
      <p><b>MOVIES</b></p></br>
      <p1>1.<?php if(isset($_POST['click'])){ echo $m1;} ?> </p1></br></br></br>
      <p1>2.<?php if(isset($_POST['click'])){ echo $m2;} ?></p1><br></br></br>
      <p1>3.<?php if(isset($_POST['click'])){ echo $m3;} ?></p1></br></br></br>
      <p1>4.<?php if(isset($_POST['click'])){ echo $m4;} ?></p1></br></br></br>
      <p1>5.<?php if(isset($_POST['click'])){ echo $m5;} ?></p1>
      
  </div>

  <div class="column" style="height:400px;">
      <p><b>BOOKS</b></p></br>
      <p1>1.<?php if(isset($_POST['click'])){ echo $b1;} ?></p1></br></br></br>
      <p1>2.<?php if(isset($_POST['click'])){ echo $b2;} ?></p1><br></br></br>
      <p1>3.<?php if(isset($_POST['click'])){ echo $b3;} ?></p1></br></br></br>
      <p1>4.<?php if(isset($_POST['click'])){ echo $b4;} ?></p1></br></br></br>
      <p1>5.<?php if(isset($_POST['click'])){ echo $b5;} ?></p1
    </div>
</div>

<div class="row" id="about">
    <div class="column4" style="height:200px;">
      <h2><b>About the project</b></h2>
      <p>The input from the user can be either a book or a movie. The recommendations that are displayed will be from books and movies both<p>
      <p>Common content between books and the movies is analysed and based on the user's input, the recommendations are displayed on both the domains</p>        
    </div>
</div> 


<div class="row" id="contact">
    <div class="column2" style="background-color:#aaa;">
      <h2>Kevin Jain</h2>
      <p>ksjain_b14@it.vjti.ac.in</p>
    </div>
    <div class="column2" style="background-color:#bbb;">
      <h2>Ojas Nadkar</h2>
      <p>opnadkar_b14@it.vjti.ac.in</p>
    </div>
    <div class="column2" style="background-color:#ccc;">
      <h2>Pranay Morye</h2>
      <p>ppmorye_b14@it.vjti.ac.in</p>
    </div>
    <div class="column2" style="background-color:#ddd;">
        <h2>Vivek Maurya</h2>
        <p>vcmaurya_b14@it.vjti.ac.in</p>
      </div>
  </div>

  <div class="footer">
      <p>Copyright@VJTI</p>
    </div>


    <script>
        function autocomplete(inp, arr) {
          /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;
              /*close any already open lists of autocompleted values*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*create a DIV element that will contain the items (values):*/
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*append the DIV element as a child of the autocomplete container:*/
              this.parentNode.appendChild(a);
              /*for each item in the array...*/
              for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                  b.addEventListener("click", function(e) {
                      /*insert the value for the autocomplete text field:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      /*close the list of autocompleted values,
                      (or any other open lists of autocompleted values:*/
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  if (x) x[currentFocus].click();
                }
              }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
              }
            }
          }
          /*execute a function when someone clicks in the document:*/
          document.addEventListener("click", function (e) {
              closeAllLists(e.target);
              });
        }
        
        /*An array containing all the country names in the world:*/
        var countries = ["The Hunger Games (The Hunger Games, #1)"
        ,"Harry Potter and the Sorcerer's Stone (Harry Potter, #1)"
        ,"Twilight (Twilight, #1)"
        ,"To Kill a Mockingbird"
        ,"The Great Gatsby"
        ,"The Fault in Our Stars"
        ,"The Hobbit"
        ,"The Catcher in the Rye"
        ,"Angels & Demons  (Robert Langdon, #1)"
        ,"Pride and Prejudice"
        ,"The Kite Runner"
        ,"1984"
        ,"Animal Farm"
        ,"The Girl with the Dragon Tattoo (Millennium, #1)"
        ,"Catching Fire (The Hunger Games, #2)"
        ,"Harry Potter and the Prisoner of Azkaban (Harry Potter, #3)"
        ,"The Fellowship of the Ring (The Lord of the Rings, #1)"
        ,"Mockingjay (The Hunger Games, #3)"
        ,"Harry Potter and the Order of the Phoenix (Harry Potter, #5)"
        ,"Harry Potter and the Chamber of Secrets (Harry Potter, #2)"
        ,"Harry Potter and the Goblet of Fire (Harry Potter, #4)"
        ,"The Da Vinci Code (Robert Langdon, #2)"
        ,"Harry Potter and the Half-Blood Prince (Harry Potter, #6)"
        ,"Lord of the Flies"
        ,"Romeo and Juliet"
        ,"The Help"
        ,"Of Mice and Men"
        ,"Memoirs of a Geisha"
        ,"Fifty Shades of Grey (Fifty Shades, #1)"
        ,"The Alchemist"
        ,"The Giver (The Giver, #1)"
        ,"The Lion, the Witch, and the Wardrobe (Chronicles of Narnia, #1)"
        ,"The Time Traveler's Wife"
        ,"A Game of Thrones (A Song of Ice and Fire, #1)"
        ,"The Lightning Thief (Percy Jackson and the Olympians, #1)"
        ,"Jane Eyre"
        ,"The Notebook (The Notebook, #1)"
        ,"Life of Pi"
        ,"Water for Elephants"
        ,"Fahrenheit 451"
        ,"New Moon (Twilight, #2)"
        ,"City of Bones (The Mortal Instruments, #1)"
        ,"Eclipse (Twilight, #3)"
        ,"Eragon (The Inheritance Cycle, #1)"
        ,"The Hitchhiker's Guide to the Galaxy (Hitchhiker's Guide to the Galaxy, #1)"
        ,"Brave New World"
        ,"Breaking Dawn (Twilight, #4)"
        ,"The Secret Life of Bees"
        ,"The Adventures of Huckleberry Finn"
        ,"Charlotte's Web"
        ,"The Curious Incident of the Dog in the Night-Time"
        ,"Wuthering Heights"
        ,"My Sister's Keeper"
        ,"Slaughterhouse-Five"
        ,"Gone with the Wind"
        ,"A Thousand Splendid Suns"
        ,"The Perks of Being a Wallflower"
        ,"Ender's Game (Ender's Saga, #1)"
        ,"Frankenstein"
        ,"The Shining (The Shining #1)"
        ,"The Host (The Host, #1)"
        ,"Sense and Sensibility"
        ,"Holes (Holes, #1)"
        ,"The Devil Wears Prada (The Devil Wears Prada, #1)"
        ,"The Odyssey"
        ,"The Little Prince"
        ,"Into the Wild"
        ,"A Tale of Two Cities"
        ,"Jurassic Park (Jurassic Park, #1)"
        ,"The Giving Tree"
        ,"A Time to Kill"
        ,"Paper Towns"
        ,"The Princess Bride "
        ,"The Outsiders"
        ,"The Maze Runner (Maze Runner, #1)"
        ,"The Secret Garden"
        ,"One Hundred Years of Solitude"
        ,"The Picture of Dorian Gray"
        ,"Dracula"
        ,"The Girl Who Played with Fire (Millennium, #2)"
        ,"The Poisonwood Bible"
        ,"Where the Wild Things Are"
        ,"The Count of Monte Cristo"
        ,"The Road"
        ,"A Walk to Remember"
        ,"Les Mis??rables"
        ,"A Clash of Kings  (A Song of Ice and Fire, #2)"
        ,"The Memory Keeper's Daughter"
        ,"Catch-22"
        ,"Tuesdays with Morrie"
        ,"Middlesex"
        ,"A Wrinkle in Time (A Wrinkle in Time Quintet, #1)"
        ,"The Joy Luck Club"
        ,"The Handmaid's Tale"
        ,"The Sisterhood of the Traveling Pants (Sisterhood, #1)"
        ,"Lolita"
        ,"The Firm (Penguin Readers, Level 5)"
        ,"Room"
        ,"Hamlet"
        ,"Dune (Dune Chronicles #1)"
        ,"One Flew Over the Cuckoo's Nest"
        ,"The Old Man and the Sea"
        ,"The Grapes of Wrath"
        ,"The Five People You Meet in Heaven"
        ,"Anne of Green Gables (Anne of Green Gables, #1)"
        ,"City of Glass (The Mortal Instruments, #3)"
        ,"A Storm of Swords (A Song of Ice and Fire, #3)"
        ,"Divine Secrets of the Ya-Ya Sisterhood"
        ,"Outlander (Outlander, #1)"
        ,"The Scarlet Letter"
        ,"The Girl Who Kicked the Hornet's Nest (Millennium, #3)"
        ,"The Pillars of the Earth (The Kingsbridge Series, #1)"
        ,"Thirteen Reasons Why"
        ,"If I Stay (If I Stay, #1)"
        ,"The Red Tent"
        ,"The Sea of Monsters (Percy Jackson and the Olympians, #2)"
        ,"City of Ashes (The Mortal Instruments, #2)"
        ,"Macbeth"
        ,"The Two Towers (The Lord of the Rings, #2)"
        ,"Something Borrowed (Darcy & Rachel, #1)"
        ,"Charlie and the Chocolate Factory (Charlie Bucket, #1)"
        ,"The Battle of the Labyrinth (Percy Jackson and the Olympians, #4)"
        ,"The Return of the King (The Lord of the Rings, #3)"
        ,"The Stranger"
        ,"The Lost Hero (The Heroes of Olympus, #1)"
        ,"A Feast for Crows (A Song of Ice and Fire, #4)"
        ,"American Gods (American Gods, #1)"
        ,"The Stand"
        ,"The Last Song"
        ,"Digital Fortress"
        ,"Emma"
        ,"Anna Karenina"
        ,"A Clockwork Orange"
        ,"The Shack"
        ,"The Last Olympian (Percy Jackson and the Olympians, #5)"
        ,"It"
        ,"Crime and Punishment"
        ,"The Bell Jar"
        ,"Angela's Ashes (Frank McCourt, #1)"
        ,"Siddhartha"
        ,"Beautiful Creatures (Caster Chronicles, #1)"
        ,"Clockwork Angel (The Infernal Devices, #1)"
        ,"Matilda"
        ,"The Night Circus"
        ,"Uglies (Uglies, #1)"
        ,"A Dance with Dragons (A Song of Ice and Fire, #5)"
        ,"The Lord of the Rings (The Lord of the Rings, #3)"
        ,"The Name of the Wind (The Kingkiller Chronicle, #1)"
        ,"Moby-Dick or, The Whale"
        ,"The Guernsey Literary and Potato Peel Pie Society"
        ,"Fight Club"
        ,"Dead Until Dark (Sookie Stackhouse, #1)"
        ,"The Color Purple"
        ,"Marley and Me: Life and Love With the World's Worst Dog"
        ,"The Lost Symbol (Robert Langdon, #3)"
        ,"Hush, Hush (Hush, Hush, #1)"
        ,"A Christmas Carol"
        ,"Interview with the Vampire (The Vampire Chronicles, #1)"
        ,"One for the Money (Stephanie Plum, #1)"
        ,"The Silence of the Lambs  (Hannibal Lecter, #2)"
        ,"Atonement"
        ,"The Metamorphosis"
        ,"The Titan's Curse (Percy Jackson and the Olympians, #3)"
        ,"Ready Player One"
        ,"A Child Called 'It' (Dave Pelzer #1)"
        ,"The Bourne Identity (Jason Bourne, #1)"
        ,"East of Eden"
        ,"Dark Places"
        ,"The Client"
        ,"Alice's Adventures in Wonderland & Through the Looking-Glass"
        ,"Persuasion"
        ,"The Gunslinger (The Dark Tower, #1)"
        ,"Love in the Time of Cholera"
        ,"Speak"
        ,"Carrie"
        ,"World War Z: An Oral History of the Zombie War"
        ,"Number the Stars"
        ,"Misery"
        ,"Bridge to Terabithia"
        ,"Marked (House of Night, #1)"
        ,"A Midsummer Night's Dream"
        ,"Extremely Loud and Incredibly Close"
        ,"Cinder (The Lunar Chronicles, #1)"
        ,"Atlas Shrugged"
        ,"Alice in Wonderland"
        ,"The Shadow of the Wind (The Cemetery of Forgotten Books,  #1)"
        ,"The Scorch Trials (Maze Runner, #2)"
        ,"Ella Enchanted"
        ,"The Sun Also Rises"
        ,"A Tree Grows in Brooklyn"
        ,"Kiss the Girls (Alex Cross, #2)"
        ,"Never Let Me Go"
        ,"Rebecca"
        ,"Flowers for Algernon"
        ,"Like Water for Chocolate"
        ,"Snow Flower and the Secret Fan"
        ,"An Abundance of Katherines"
        ,"A Light in the Attic"
        ,"Coraline"
        ,"Good Omens: The Nice and Accurate Prophecies of Agnes Nutter, Witch"
        ,"On the Road"
        ,"The Lucky One"
        ,"The Fountainhead"
        ,"The Hunt for Red October (Jack Ryan Universe, #4)"
        ,"Watership Down (Watership Down, #1)"
        ,"The Voyage of the Dawn Treader (Chronicles of Narnia, #3)"
        ,"Treasure Island"
        ,"The Son of Neptune (The Heroes of Olympus, #2)"
        ,"11/22/1963"
        ,"The Very Hungry Caterpillar Board Book"
        ,"Cat's Cradle"
        ,"The Time Machine"
        ,"The Boy in the Striped Pajamas"
        ,"Heart of Darkness"
        ,"I Know This Much Is True"
        ,"Pet Sematary"
        ,"She's Come Undone"
        ,"The Wise Man's Fear (The Kingkiller Chronicle, #2)"
        ,"City of Fallen Angels (The Mortal Instruments, #4)"
        ,"Good in Bed (Cannie Shapiro, #1)"
        ,"The Thorn Birds"
        ,"The Graveyard Book"
        ,"Inkheart (Inkworld, #1)"
        ,"I Know Why the Caged Bird Sings"
        ,"Where the Red Fern Grows"
        ,"Neverwhere"
        ,"A Prayer for Owen Meany"
        ,"White Oleander"
        ,"Nineteen Minutes"
        ,"The Eye of the World (Wheel of Time, #1)"
        ,"The Magician's Nephew (Chronicles of Narnia, #6)"
        ,"James and the Giant Peach"
        ,"1st to Die (Women's Murder Club, #1)"
        ,"The Ultimate Hitchhiker's Guide to the Galaxy"
        ,"One Day"
        ,"Goodnight Moon"
        ,"I Am Number Four (Lorien Legacies, #1)"
        ,"The Iliad"
        ,"The Casual Vacancy"
        ,"The Runaway Jury"
        ,"Naked"
        ,"Eldest (The Inheritance Cycle, #2)"
        ,"The Wonderful Wizard of Oz (Oz, #1)"
        ,"Prince Caspian (Chronicles of Narnia, #2)"
        ,"'Salem's Lot"
        ,"Othello"
        ,"Beloved"
        ,"Graceling (Graceling Realm, #1)"
        ,"The Bad Beginning (A Series of Unfortunate Events, #1)"
        ,"All Quiet on the Western Front"
        ,"Oliver Twist"
        ,"The Screwtape Letters"
        ,"Odd Thomas (Odd Thomas, #1)"
        ,"The Subtle Knife (His Dark Materials, #2)"
        ,"Stargirl (Stargirl, #1)"
        ,"The Red Pyramid (Kane Chronicles, #1)"
        ,"Stranger in a Strange Land"
        ,"The BFG"
        ,"The Call of the Wild"
        ,"The Death Cure (Maze Runner, #3)"
        ,"Stardust"
        ,"Where the Heart Is"
        ,"Will Grayson, Will Grayson"
        ,"A Million Little Pieces"
        ,"Frostbite (Vampire Academy, #2)"
        ,"Island of the Blue Dolphins (Island of the Blue Dolphins, #1)"
        ,"Hatchet (Brian's Saga, #1)"
        ,"The Final Empire (Mistborn, #1)"
        ,"Shadow Kiss (Vampire Academy, #3)"
        ,"For Whom the Bell Tolls"
        ,"Fast Food Nation: The Dark Side of the All-American Meal"
        ,"Neuromancer"
        ,"A Farewell to Arms"
        ,"The Tell-Tale Heart and Other Writings"
        ,"Breakfast of Champions"
        ,"Bel Canto"
        ,"Guns, Germs, and Steel: The Fates of Human Societies"
        ,"Fried Green Tomatoes at the Whistle Stop Cafe"
        ,"Things Fall Apart (The African Trilogy, #1)"
        ,"The Undomestic Goddess"
        ,"The Three Musketeers"
        ,"Evermore (The Immortals, #1)"
        ,"The Witches"
        ,"The Thirteenth Tale"
        ,"Spirit Bound (Vampire Academy, #5)"
        ,"Blood Promise (Vampire Academy, #4)"
        ,"Message in a Bottle"
        ,"The Name of the Rose"
        ,"Go Ask Alice"
        ,"The Mark of Athena (The Heroes of Olympus, #3)"
        ,"The Color of Magic (Discworld, #1; Rincewind #1)"
        ,"Kafka on the Shore"
        ,"Red Dragon (Hannibal Lecter, #1)"
        ,"Crescendo (Hush, Hush, #2)"
        ,"The God of Small Things"
        ,"Fall of Giants (The Century Trilogy, #1)"
        ,"Under the Dome"
        ,"Just Listen"
        ,"Winnie-the-Pooh (Winnie-the-Pooh, #1)"
        ,"Before I Go to Sleep"
        ,"A Study in Scarlet"
        ,"Brisingr (The Inheritance Cycle, #3)"
        ,"Betrayed (House of Night, #2)"
        ,"Storm Front (The Dresden Files, #1)"
        ,"Northanger Abbey"
        ,"Cold Mountain"
        ,"Something Blue (Darcy & Rachel, #2)"
        ,"The Historian"
        ,"The Good Earth (House of Earth, #1)"
        ,"Dragonfly in Amber (Outlander, #2)"
        ,"In Her Shoes"
        ,"The Brief Wondrous Life of Oscar Wao"
        ,"Mansfield Park"
        ,"Where She Went (If I Stay, #2)"
        ,"The World According to Garp"
        ,"Killing Floor (Jack Reacher, #1)"
        ,"Robinson Crusoe"
        ,"The Prince"
        ,"The Amber Spyglass (His Dark Materials, #3)"
        ,"Wizard's First Rule (Sword of Truth, #1)"
        ,"The Kitchen House"
        ,"Franny and Zooey"
        ,"Choke"
        ,"The Brothers Karamazov"
        ,"The City of Ember (Book of Ember, #1)"
        ,"The Andromeda Strain"
        ,"The Green Mile"
        ,"The Prophet"
        ,"Maus I: A Survivor's Tale: My Father Bleeds History (Maus, #1)"
        ,"Untamed (House of Night, #4)"
        ,"Speaker for the Dead (Ender's Saga, #2)"
        ,"Mere Christianity"
        ,"The Secret History"
        ,"The Clan of the Cave Bear (Earth's Children, #1)"
        ,"Black Beauty"
        ,"War and Peace"
        ,"American Psycho"
        ,"2001: A Space Odyssey (Space Odyssey, #1)"
        ,"Redeeming Love"
        ,"The One (The Selection, #3)"
        ,"The Great Hunt (Wheel of Time, #2)"
        ,"Postmortem (Kay Scarpetta, #1)"
        ,"The Prince of Tides"
        ,"The Amazing Adventures of Kavalier & Clay"
        ,"Peter Pan"
        ,"Pretties (Uglies, #2)"
        ,"The Wind-Up Bird Chronicle"
        ,"Cloud Atlas"
        ,"Darkly Dreaming Dexter (Dexter, #1)"
        ,"Living Dead in Dallas (Sookie Stackhouse, #2)"
        ,"The Dragon Reborn (Wheel of Time, #3)"
        ,"Gulliver's Travels"
        ,"Much Ado About Nothing"
        ,"A Little Princess"
        ,"The Truth About Forever"
        ,"The Horse and His Boy (Chronicles of Narnia, #5)"
        ,"Last Sacrifice (Vampire Academy, #6)"
        ,"The Velveteen Rabbit"
        ,"The War of the Worlds"
        ,"Corduroy"
        ,"The Omnivore's Dilemma: A Natural History of Four Meals"
        ,"Needful Things"
        ,"Cujo"
        ,"The Virgin Suicides"
        ,"Dead to the World (Sookie Stackhouse, #4)"
        ,"The Phantom Tollbooth"
        ,"The Way of Kings (The Stormlight Archive, #1)"
        ,"It's Kind of a Funny Story"
        ,"The Well of Ascension (Mistborn, #2)"
        ,"The Guardian"
        ,"Oryx and Crake (MaddAddam, #1)"
        ,"Timeline"
        ,"Candide"
        ,"Tuck Everlasting"
        ,"Christine"
        ,"Rich Dad, Poor Dad"
        ,"Silence (Hush, Hush, #3)"
        ,"The Magicians (The Magicians #1)"
        ,"A Great and Terrible Beauty (Gemma Doyle, #1)"
        ,"The Bourne Supremacy (Jason Bourne, #2)"
        ,"Easy (Contours of the Heart, #1)"
        ,"David Copperfield"
        ,"The Absolutely True Diary of a Part-Time Indian"
        ,"The Master and Margarita"
        ,"A Wizard of Earthsea (Earthsea Cycle, #1)"
        ,"Because of Winn-Dixie"
        ,"A Separate Peace"
        ,"Don Quixote"
        ,"Assassin's Apprentice (Farseer Trilogy, #1)"
        ,"The Restaurant at the End of the Universe (Hitchhiker's Guide, #2)"
        ,"Torment (Fallen, #2)"
        ,"The Tale of Peter Rabbit"
        ,"The Silver Chair (Chronicles of Narnia, #4)"
        ,"The Hero of Ages (Mistborn, #3)"
        ,"Girl, Interrupted"
        ,"Jonathan Livingston Seagull"
        ,"Cell"
        ,"The Silmarillion (Middle-Earth Universe)"
        ,"The Drawing of the Three (The Dark Tower, #2)"
        ,"The Trial"
        ,"This Lullaby"
        ,"Plain Truth"
        ,"Orange Is the New Black"
        ,"The Hound of the Baskervilles"
        ,"The Mists of Avalon (Avalon, #1)"
        ,"Are You There God? It's Me, Margaret"
        ,"Nights in Rodanthe"
        ,"All Together Dead (Sookie Stackhouse, #7)"
        ,"Midwives"
        ,"The Polar Express"
        ,"The True Story of the 3 Little Pigs"
        ,"Patriot Games (Jack Ryan Universe, #2)"
        ,"Veronika Decides to Die"
        ,"Dead as a Doornail (Sookie Stackhouse, #5)"
        ,"Starship Troopers"
        ,"Sophie's World"
        ,"Heidi"
        ,"Prey"
        ,"The Last Battle (Chronicles of Narnia, #7)"
        ,"World Without End (The Kingsbridge Series, #2)"
        ,"Beastly (Beastly, #1; Kendra Chronicles, #1)"
        ,"Baby Proof"
        ,"Inheritance (The Inheritance Cycle, #4)"
        ,"1Q84"
        ,"Uncle Tom's Cabin"
        ,"Definitely Dead (Sookie Stackhouse, #6)"
        ,"Blindness"
        ,"Freedom"
        ,"I'd Tell You I Love You, But Then I'd Have to Kill You (Gallagher Girls, #1)"
        ,"The Corrections"
        ,"Congo"
        ,"Breakfast at Tiffany's"
        ,"The Passage (The Passage, #1)"
        ,"Anansi Boys"
        ,"Along for the Ride"
        ,"The House of the Spirits"
        ,"The Dead Zone"
        ,"The Mysterious Affair at Styles (Hercule Poirot, #1)"
        ,"Murder on the Orient Express (Hercule Poirot, #10)"
        ,"Firestarter"
        ,"Little House in the Big Woods (Little House, #1)"
        ,"Jonathan Strange & Mr Norrell"
        ,"A Bend in the Road"
        ,"Gone (Gone, #1)"
        ,"On Writing: A Memoir of the Craft"
        ,"Sphere"
        ,"The Vampire Lestat (The Vampire Chronicles, #2)"
        ,"Twenty Thousand Leagues Under the Sea"
        ,"The Constant Princess (The Plantagenet and Tudor Novels, #6)"
        ,"Mrs. Dalloway"
        ,"Bag of Bones"
        ,"Thinner"
        ,"Around the World in Eighty Days"
        ,"Walk Two Moons"
        ,"Eleven Minutes"
        ,"Unwind (Unwind, #1)"
        ,"King Lear"
        ,"Death of a Salesman"
        ,"The Sound and the Fury"
        ,"The Shadow Rising (Wheel of Time, #4)"
        ,"Shantaram"
        ,"From Dead to Worse (Sookie Stackhouse, #8)"
        ,"The Waste Lands (The Dark Tower, #3)"
        ,"Hyperion (Hyperion Cantos, #1)"
        ,"The Pearl"
        ,"The Exorcist"
        ,"The Short Second Life of Bree Tanner: An Eclipse Novella (Twilight, #3.5)"
        ,"Snow Falling on Cedars"
        ,"Roots: The Saga of an American Family"
        ,"Invisible Man"
        ,"Mrs. Frisby and the Rats of NIMH (Rats of NIMH, #1)"
        ,"Lamb: The Gospel According to Biff, Christ's Childhood Pal"
        ,"The Power of Now: A Guide to Spiritual Enlightenment"
        ,"Let's Pretend This Never Happened: A Mostly True Memoir"
        ,"The Lies of Locke Lamora (Gentleman Bastard, #1)"
        ,"Sabriel (Abhorsen,  #1)"
        ,"Dead and Gone (Sookie Stackhouse, #9)"
        ,"The Storyteller"
        ,"Life, the Universe and Everything (Hitchhiker's Guide, #3)"
        ,"Half Broke Horses"
        ,"Mort (Death, #1; Discworld, #4)"
        ,"Lonesome Dove"
        ,"Ender's Shadow (Ender's Shadow, #1)"
        ,"Twenties Girl"
        ,"Schindler's List"
        ,"The Bluest Eye"
        ,"The White Queen (The Plantagenet and Tudor Novels, #2)"
        ,"Shutter Island"
        ,"The Republic"
        ,"The Hunchback of Notre-Dame"
        ,"A Fine Balance"
        ,"Specials (Uglies, #3)"
        ,"The Awakening"
        ,"For One More Day"
        ,"Falling Up"
        ,"Trainspotting"
        ,"Foundation and Empire (Foundation #2)"
        ,"House Rules"
        ,"From the Mixed-Up Files of Mrs. Basil E. Frankweiler"
        ,"Doctor Sleep (The Shining, #2)"
        ,"Jumanji"
        ,"Beauty and the Beast"
        ,"Lucy"
        ,"Grown Ups"
        ,"The Circle"
        ,"Pacific Rim"
        ,"The Mummy"
        ,"Logan"
        ,"The Avengers"
        ,"Blade Runner"
        ,"Saw"
        ,"Now You See Me"
        ,"The Twilight Saga: Breaking Dawn - Part 1"
        ,"Thor"
        ,"The Revenant"
        ,"Teenage Mutant Ninja Turtles"
        ,"The Amazing Spider-Man"
        ,"Harry Potter and the Philosopher's Stone"
        ,"Harry Potter and the Order of the Phoenix"
        ,"Harry Potter and the Chamber of Secrets"
        ,"Spectre"
        ,"I Am Legend"
        ,"Iron Man"
        ,"Charlie and the Chocolate Factory"
        ,"Fury"
        ,"Shrek"
        ,"Inglourious Basterds"
        ,"Django Unchained"
        ,"The Godfather"
        ,"The Incredibles"
        ,"Cinderella"
        ,"Shrek 2"
        ,"Project X"
        ,"Avatar"
        ,"Pulp Fiction"
        ,"Spider-Man 3"
        ,"Inside Out"
        ,"Iron Man 2"
        ,"Shrek Forever After"
        ,"Frozen"
        ,"Paul"
        ,"Terminator 2: Judgment Day"
        ,"Underworld"
        ,"Terminator 3: Rise of the Machines"
        ,"Inception"
        ,"Pirates of the Caribbean: The Curse of the Black Pearl"
        ,"Saw II"
        ,"Finding Nemo"
        ,"Harry Potter and the Prisoner of Azkaban"
        ,"The Hangover"
        ,"Ghost in the Shell"
        ,"The Dark Knight Rises"
        ,"Terminator Salvation"
        ,"The Terminator"
        ,"The Lord of the Rings: The Fellowship of the Ring"
        ,"Harry Potter and the Half-Blood Prince"
        ,"Back to the Future"
        ,"Spider-Man"
        ,"Toy Story"
        ,"The Hunger Games: Catching Fire"
        ,"Predator"
        ,"Batman Begins"
        ,"Fight Club"
        ,"Wrath of the Titans"
        ,"The Incredible Hulk"
        ,"Clash of the Titans"
        ,"Wonder Woman"
        ,"The Girl Next Door"
        ,"The Da Vinci Code"
        ,"Harry Potter and the Goblet of Fire"
        ,"Gladiator"
        ,"The Lord of the Rings: The Return of the King"
        ,"Toy Story 2"
        ,"Elysium"
        ,"The Shining"
        ,"The Expendables 2"
        ,"The BFG"
        ,"Hulk"
        ,"Real Steel"
        ,"American History X"
        ,"The Lord of the Rings: The Two Towers"
        ,"The Notebook"
        ,"Saw III"
        ,"Rise of the Planet of the Apes"
        ,"Ice Age"
        ,"The Cabin in the Woods"
        ,"The Expendables"
        ,"Toy Story 3"
        ,"Shrek the Third"
        ,"Black Hawk Down"
        ,"Twilight"
        ,"Neighbors"
        ,"Ice Age: The Meltdown"
        ,"Pirates of the Caribbean: On Stranger Tides"
        ,"Titanic"
        ,"Madagascar"
        ,"Madagascar 3: Europe's Most Wanted"
        ,"The Fifth Element"
        ,"Gravity"
        ,"The Iron Giant"
        ,"Underworld: Evolution"
        ,"Live Free or Die Hard"
        ,"21 Jump Street"
        ,"Men in Black II"
        ,"Rocky"
        ,"Whiplash"
        ,"Pirates of the Caribbean: Dead Man's Chest"
        ,"Minority Report"
        ,"Despicable Me"
        ,"Hercules"
        ,"Die Hard: With a Vengeance"
        ,"Mission: Impossible"
        ,"Up"
        ,"Wrong Turn 2: Dead End"
        ,"The Curious Case of Benjamin Button"
        ,"Prometheus"
        ,"Men in Black"
        ,"The Jungle Book"
        ,"Alien"
        ,"The Matrix"
        ,"Battleship"
        ,"Pirates of the Caribbean: At World's End"
        ,"Secret Window"
        ,"G.I. Joe: Retaliation"
        ,"Prince of Persia: The Sands of Time"
        ,"Salt"
        ,"Saving Private Ryan"
        ,"Beauty and the Beast"
        ,"Seed of Chucky"
        ,"Captain America: The First Avenger"
        ,"Fantastic Four"
        ,"Jeepers Creepers"
        ,"The Beguiled"
        ,"Monsters, Inc."
        ,"The Sixth Sense"
        ,"The Dark Knight"
        ,"Oblivion"
        ,"I, Robot"
        ,"Underworld: Rise of the Lycans"
        ,"Ocean's Eleven"
        ,"Battle: Los Angeles"
        ,"The Lion King"
        ,"Die Hard 2"
        ,"Bruce Almighty"
        ,"Ice Age: Continental Drift"
        ,"The Goonies"
        ,"Never Back Down"
        ,"Casino Royale"
        ,"Edward Scissorhands"
        ,"Scott Pilgrim vs. the World"
        ,"Cars"
        ,"Aliens"
        ,"National Treasure: Book of Secrets"
        ,"The Last Samurai"
        ,"Twelve Monkeys"
        ,"The Devil Wears Prada"
        ,"2001: A Space Odyssey"
        ,"Armageddon"
        ,"The Green Mile"
        ,"Snow White and the Huntsman"
        ,"Saw IV"
        ,"Brokeback Mountain"
        ,"Fantastic Four"
        ,"Saw V"
        ,"Les Mis??rables"
        ,"Life of Pi"
        ,"Night at the Museum"
        ,"Scary Movie"
        ,"Underworld: Awakening"
        ,"Reservoir Dogs"
        ,"Looper"
        ,"The Mist"
        ,"National Treasure"
        ,"Ice Age: Dawn of the Dinosaurs"
        ,"3:10 to Yuma"
        ,"American Beauty"
        ,"Grease"
        ,"Carrie"
        ,"Due Date"
        ,"The Magnificent Seven"
        ,"A Nightmare on Elm Street"
        ,"Mission: Impossible II"
        ,"Rings"
        ,"Moulin Rouge!"
        ,"Ocean's Twelve"
        ,"Ted"
        ,"Die Hard"
        ,"The Departed"
        ,"Black Swan"
        ,"War of the Worlds"
        ,"The SpongeBob SquarePants Movie"
        ,"Rocky II"
        ,"Man on Fire"
        ,"GoldenEye"
        ,"American Pie"
        ,"Indiana Jones and the Temple of Doom"
        ,"Tangled"
        ,"Ratatouille"
        ,"Trainspotting"
        ,"Drive"
        ,"Big Fish"
        ,"The Warriors"
        ,"D??j?ÿ Vu"
        ,"Cloud Atlas"
        ,"Sin City"
        ,"Planet of the Apes"
        ,"Madagascar: Escape 2 Africa"
        ,"The Nightmare Before Christmas"
        ,"Godzilla"
        ,"Saw VI"
        ,"The Chronicles of Narnia: The Lion, the Witch and the Wardrobe"
        ,"Insidious"
        ,"Wreck-It Ralph"
        ,"Everest"
        ,"Hugo"
        ,"Freddy vs. Jason"
        ,"Gattaca"
        ,"Apollo 13"
        ,"RoboCop"
        ,"Million Dollar Baby"
        ,"Back to the Future Part II"
        ,"Shutter Island"
        ,"Bride of Chucky"
        ,"Batman Returns"
        ,"Total Recall"
        ,"Life"
        ,"The Little Mermaid"
        ,"The English Patient"
        ,"The Matrix Reloaded"
        ,"Ghostbusters II"
        ,"Lincoln"
        ,"A Clockwork Orange"
        ,"28 Weeks Later"
        ,"Hancock"
        ,"One Flew Over the Cuckoo's Nest"
        ,"Legend"
        ,"Thank You for Smoking"
        ,"The Hunger Games"
        ,"Die Another Day"
        ,"Bolt"
        ,"John Carter"
        ,"Men in Black 3"
        ,"Taken"
        ,"War Dogs"
        ,"Troy"
        ,"Rocky Balboa"
        ,"Cloverfield"
        ,"Over the Hedge"
        ,"Beetlejuice"
        ,"Slumdog Millionaire"
        ,"Indiana Jones and the Last Crusade"
        ,"The Chronicles of Narnia: Prince Caspian"
        ,"Rush"
        ,"Pitch Perfect"
        ,"Snatch"
        ,"First Blood"
        ,"Daredevil"
        ,"Taxi Driver"
        ,"Noah"
        ,"Hellboy"
        ,"The Wizard of Oz"
        ,"Back to the Future Part III"
        ,"Quantum of Solace"
        ,"Collateral"
        ,"The Great Gatsby"
        ,"Dead Poets Society"
        ,"Batman"
        ,"The Intern"
        ,"Memento"
        ,"300"
        ,"The Social Network"
        ,"A Knight's Tale"
        ,"Kung Fu Panda"
        ,"Casablanca"
        ,"Cowboys & Aliens"
        ,"Mulan"
        ,"Catch Me If You Can"
        ,"Vertigo"
        ,"True Lies"
        ,"The Chronicles of Narnia: The Voyage of the Dawn Treader"
        ,"Night at the Museum: Battle of the Smithsonian"
        ,"Gangs of New York"
        ,"Good Will Hunting"
        ,"Indiana Jones and the Kingdom of the Crystal Skull"
        ,"Kingdom of Heaven"
        ,"Snow White and the Seven Dwarfs"
        ,"Ghost Rider"
        ,"Psycho"
        ,"Kick-Ass"
        ,"King Kong"
        ,"The Girl with the Dragon Tattoo"
        ,"How to Train Your Dragon"
        ,"12 Angry Men"
        ,"Forrest Gump"
        ,"Bridget Jones's Diary"
        ,"A Bug's Life"
        ,"The Truman Show"
        ,"The Polar Express"
        ,"Wrong Turn 4: Bloody Beginnings"
        ,"American Pie 2"
        ,"The Croods"
        ,"E.T. the Extra-Terrestrial"
        ,"Mission: Impossible III"
        ,"Zombieland"
        ,"Ocean's Thirteen"
        ,"Cars 2"
        ,"Hot Fuzz"
        ,"Focus"
        ,"Master and Commander: The Far Side of the World"
        ,"Batman Forever"
        ,"Donnie Darko"
        ,"Mr. & Mrs. Smith"
        ,"From Dusk Till Dawn"
        ,"Journey to the Center of the Earth"
        ,"Alien??"
        ,"Sweeney Todd: The Demon Barber of Fleet Street"
        ,"District 9"
        ,"The Shawshank Redemption"
        ,"The King's Speech"
        ,"Scary Movie 2"
        ,"The World Is Not Enough"
        ,"Blade"
        ,"Independence Day"
        ,"The World's End"
        ,"The Mummy Returns"
        ,"The League of Extraordinary Gentlemen"
        ,"Citizen Kane"
        ,"Vanilla Sky"
        ,"The Italian Job"
        ,"The Aviator"
        ,"The Lone Ranger"
        ,"Flight"
        ,"The Butterfly Effect"
        ,"Pixels"
        ,"The Simpsons Movie"
        ,"AVP: Alien vs. Predator"
        ,"Mamma Mia!"
        ,"The Walk"
        ,"Wrong Turn 3: Left for Dead"
        ,"Crash"
        ,"Ninja Assassin"
        ,"Top Gun"
        ,"Children of Men"
        ,"Batman & Robin"
        ,"Alien: Resurrection"
        ,"Inside Man"
        ,"Pearl Harbor"
        ,"Lethal Weapon"
        ,"Corpse Bride"
        ,"Monty Python and the Holy Grail"
        ,"Dracula"
        ,"Dances with Wolves"
        ,"The Exorcist"
        ,"The Ninth Gate"
        ,"Miss Congeniality"
        ,"Full Metal Jacket"
        ,"Serenity"
        ,"What Women Want"
        ,"Superbad"
        ,"Dirty Dancing"
        ,"Blade II"
        ,"Anastasia"
        ,"It's a Wonderful Life"
        ,"Into the Wild"
        ,"Ghostbusters"
        ,"Home Alone 2: Lost in New York"
        ,"Meet the Parents"
        ,"Sleepy Hollow"
        ,"The A-Team"
        ,"A.I. Artificial Intelligence"
        ,"Jaws"
        ,"Once Upon a Time in America"
        ,"The Big Lebowski"
        ,"Blade: Trinity"
        ,"American Wedding"
        ,"Airplane!"
        ,"Puss in Boots"
        ,"The Book of Eli"
        ,"Platoon"
        ,"Contact"
        ,"The Usual Suspects"
        ,"Chicago"
        ,"Lara Croft: Tomb Raider"
        ,"Scarface"
        ,"Eternal Sunshine of the Spotless Mind"
        ,"Super 8"
        ,"Sherlock Holmes: A Game of Shadows"
        ,"Boyhood"
        ,"The Pursuit of Happyness"
        ,"The Prestige"
        ,"Tarzan"
        ,"Halloween"
        ,"The Hurt Locker"
        ,"The Exorcism of Emily Rose"
        ,"A Beautiful Mind"
        ,"Dawn of the Dead"
        ,"Fargo"
        ,"You Don't Mess with the Zohan"
        ,"The Patriot"
        ,"The Untouchables"
        ,"Erin Brockovich"
        ,"Panic Room"
        ,"Hercules"
        ,"The Matrix Revolutions"
        ,"Rear Window"
        ,"Knight and Day"
        ,"Enemy at the Gates"
        ,"Gran Torino"
        ,"The Hitchhiker's Guide to the Galaxy"
        ,"Shakespeare in Love"
        ,"The Boy in the Striped Pyjamas"
        ,"Groundhog Day"
        ,"Jumper"
        ,"Transporter 2"
        ,"Moon"
        ,"Gremlins"
        ,"The Village"
        ,"Alexander"
        ,"In Bruges"
        ,"Nanny McPhee and the Big Bang"
        ,"Waterworld"
        ,"Robin Hood"
        ,"School of Rock"
        ,"Zero Dark Thirty"
        ,"Austin Powers: The Spy Who Shagged Me"
        ,"Fear and Loathing in Las Vegas"
        ,"King Arthur"
        ,"The Vow"
        ,"Schindler's List"
        ,"The Transporter"
        ,"The Punisher"
        ,"Unforgiven"
        ,"Some Like It Hot"
        ,"Gone in Sixty Seconds"
        ,"Rocky III"
        ,"Tomorrow Never Dies"
        ,"Sunshine"
        ,"L.A. Confidential"
        ,"Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb"
        ,"Meet the Fockers"
        ,"Gone with the Wind"
        ,"Shark Tale"
        ,"Road to Perdition"
        ,"Sucker Punch"
        ,"The Mechanic"
        ,"The Town"
        ,"Hostel"
        ,"Wanted"
        ,"The Pianist"
        ,"Coraline"
        ,"Source Code"
        ,"The Terminal"
        ,"Crank"
        ,"Abraham Lincoln: Vampire Hunter"
        ,"The Lion King 1?«"
        ,"Superman"
        ,"Valkyrie"
        ,"Blow"
        ,"Signs"
        ,"Alvin and the Chipmunks"
        ,"Trance"
        ,"Atonement"
        ,"Face/Off"
        ,"Green Lantern"
        ,"Basic Instinct"
        ,"Rocky V"
        ,"Rio"
        ,"Chronicle"
        ,"No Strings Attached"
        ,"Legally Blonde"
        ,"Apocalypse Now"
        ,"Beowulf"
        ,"Skyline"
        ,"Eastern Promises"
        ,"Zodiac"
        ,"Mystic River"
        ,"Yes Man"
        ,"Rain Man"
        ,"Ace Ventura: Pet Detective"
        ,"Stardust"
        ,"Life of Brian"
        ,"Transporter 3"
        ,"Superman Returns"
        ,"The Brothers Grimm"
        ,"The Life of David Gale"
        ,"The Adjustment Bureau"
        ,"Insomnia"
        ,"The Day the Earth Stood Still"
        ,"Love Actually"
        ,"(500) Days of Summer"
        ,"Scream"
        ,"Who Framed Roger Rabbit"
        ,"Meet the Spartans"
        ,"The Graduate"
        ,"Perfume: The Story of a Murderer"
        ,"Brave"
        ,"Monsters University"
        ,"The Sorcerer's Apprentice"
        ,"Disturbia"
        ,"American Psycho"
        ];
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), countries);
        </script>
        



</body>
</html>
