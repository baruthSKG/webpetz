<?php

  $host = 'localhost';
  $data = 'webpetz';
  $user = 'root';
  $pass = 'mysql';
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

$cat_avatars = array("cat.jpeg", "cat2.PNG", "cat3.jpg");
$dog_avatars = array("dog1.jpg", "dog2.jpg", "dog3.jpg");

if (isset($_POST['update'])) {
    $update   = $pdo->quote($_POST['update']);
    $query    = "UPDATE selected_pet SET current_pet = $update WHERE pet_check='1'";
    $result = $pdo->query($query);
}

if (isset($_POST['delete'])) {
    $delete   = $pdo->quote($_POST['delete']);
    $query    = "DELETE FROM pets WHERE name = $delete;";
    $result = $pdo->query($query);
}

$query  = "SELECT * FROM selected_pet";
$result = $pdo->query($query);
while($row = $result->fetch()) {
	$name = $row["current_pet"];
}

if (isset($_POST['birthday'])) {
    $name_s   = $pdo->quote($_POST['name']);
    $species     = $pdo->quote($_POST['species']);
    $color   = $pdo->quote($_POST['color']);
    $sex   = $pdo->quote($_POST['sex']);
    $date_adopted   = $pdo->quote($_POST['date_adopted']);
    $birthday   = $pdo->quote($_POST['birthday']);

    if ($_POST['species']=="Cat") {
	$avatar =  $pdo->quote($cat_avatars[rand(0,count($cat_avatars)-1)]);
    } else {
	$avatar =  $pdo->quote($dog_avatars[rand(0,count($dog_avatars)-1)]); }
    
    $query    = "INSERT INTO pets VALUES" .
      "($name_s, $species, $color, $sex, $avatar, $date_adopted, $birthday)";
    $result = $pdo->query($query);
  }


$query  = "SELECT * FROM pets WHERE name='$name'";
$result = $pdo->query($query);
while($row = $result->fetch()) {
$species = $row["species"];
$fav_color = $row["color"];
$avatar_ext = $row["avatar"];
$sex = $row["sex"]; 
$date_adopted = $row["date_adopted"];
$birthday = $row["birthday"];
}
$p_c = 0;
$avatar = "img/" . $avatar_ext;
if ($species=="Cat") {
$status = "MEOW MEOW MEOW";
} else {
$status = "BARK BARK BARK";
}
$rdiv = "";
$hello_phrases = array(
"Hello, how are you doing today?",
"Hi, how are you doing today?",
"Hey, how's it going?",
"What's up, bro?",
"How's life?",
"How are things?",
"How are the wife and kids?",
"Good to see you.",
"Nice to see you.",
"Hello!",
"Hi!",
"Salutations!",
"Greetings!"
);
$weather_phrases = array("sunny","clear skies","rainy","stormy","snowy","overcast","cloudy","cloudy with a chance of rain");
#sourced from https://joshmadison.com/2008/04/20/fortune-cookie-fortunes/
$fortunes = array(
"A beautiful, smart, and loving person will be coming into your life.", "
A dubious friend may be an enemy in camouflage.", "
A faithful friend is a strong defense.", "
A feather in the hand is better than a bird in the air.", " 
A fresh start will put you on your way.", "
A friend asks only for your time not your money.", "
A friend is a present you give yourself.", "
A gambler not only will lose what he has, but also will lose what he doesn’t have.", "
A golden egg of opportunity falls into your lap this month.", "
A good friendship is often more important than a passionate romance.", "
A good time to finish up old tasks.", " 
A hunch is creativity trying to tell you something.", "
A lifetime friend shall soon be made.", "
A lifetime of happiness lies ahead of you.", "
A light heart carries you through all the hard times.", "
A new perspective will come with the new year.", " 
A person is never to (sic) old to learn.", " 
A person of words and not deeds is like a garden full of weeds.", "
A pleasant surprise is waiting for you.", "
A short pencil is usually better than a long memory any day.", "
A small donation is call for.", " It’s the right thing to do.", "
A smile is your personal welcome mat.", "
A smooth long journey! Great expectations.", "
A soft voice may be awfully persuasive.", "
A truly rich life contains love and art in abundance.", "
Accept something that you cannot change, and you will feel better.", "
Adventure can be real happiness.", "
Advice is like kissing.", " It costs nothing and is a pleasant thing to do.", " 
Advice, when most needed, is least heeded.", "
All the effort you are making will ultimately pay off.", "
All the troubles you have will pass away very quickly.", "
All will go well with your new project.", "
All your hard work will soon pay off.", "
Allow compassion to guide your decisions.", "
An acquaintance of the past will affect you in the near future.", "
An agreeable romance might begin to take on the appearance.", "
An important person will offer you support.", "
An inch of time is an inch of gold.", "
Any day above ground is a good day.", "
Any decision you have to make tomorrow is a good decision.", "
At the touch of love, everyone becomes a poet.", "
Be careful or you could fall for some tricks today.", "
Beauty in its various forms appeals to you.", " 
Because you demand more from yourself, others respect you deeply.", "
Believe in yourself and others will too.", "
Believe it can be done.", "
Better ask twice than lose yourself once.", "
Bide your time, for success is near.", "
Carve your name on your heart and not on marble.", "
Chance favors those in motion.", "
Change is happening in your life, so go with the flow!
Competence like yours is underrated.", "
Congratulations! You are on your way.", "
Could I get some directions to your heart? 
Courtesy begins in the home.", "
Courtesy is contagious.", "
Curiosity kills boredom.", " Nothing can kill curiosity.", "
Dedicate yourself with a calm mind to the task at hand.", "
Depart not from the path which fate has you assigned.", "
Determination is what you need now.", "
Diligence and modesty can raise your social status.", "
Disbelief destroys the magic.", "
Distance yourself from the vain.", "
Do not be intimidated by the eloquence of others.", "
Do not demand for someone’s soul if you already got his heart.", "
Do not let ambitions overshadow small success.", "
Do not make extra work for yourself.", "
Do not underestimate yourself.", " Human beings have unlimited potentials.", "
Do you know that the busiest person has the largest amount of time?
Don’t be discouraged, because every wrong attempt discarded is another step forward.", "
Don’t confuse recklessness with confidence.", " 
Don’t expect romantic attachments to be strictly logical or rational.", "
Don’t just spend time.", " Invest it.", "
Don’t just think, act!
Don’t let friends impose on you, work calmly and silently.", "
Don’t let the past and useless detail choke your existence.", "
Don’t let your limitations overshadow your talents.", "
Don’t worry; prosperity will knock on your door soon.", "
Each day, compel yourself to do something you would rather not do.", "
Education is the ability to meet life’s situations.", "
Embrace this love relationship you have!
Emulate what you admire in your parents.", " 
Emulate what you respect in your friends.", "
Every flower blooms in its own sweet time.", "
Every wise man started out by asking many questions.", "
Everyday in your life is a special occasion.", "
Everywhere you choose to go, friendly faces will greet you.", "
Expect much of yourself and little of others.", "
Failure is the chance to do better next time.", "
Failure is the path of lease persistence.", "
Fear and desire – two sides of the same coin.", "
Fearless courage is the foundation of victory.", "
Feeding a cow with roses does not get extra appreciation.", "
First think of what you want to do; then do what you have to do.", "
Follow the middle path.", " Neither extreme will make you happy.", "
For hate is never conquered by hate.", " Hate is conquered by love.", "
For the things we have to learn before we can do them, we learn by doing them.", "
Fortune Not Found: Abort, Retry, Ignore?
From listening comes wisdom and from speaking repentance.", "
From now on your kindness will lead you to success.", "
Get your mind set – confidence will lead you on.", "
Get your mind set…confidence will lead you on.", "
Go for the gold today! You’ll be the champion of whatever.", "
Go take a rest; you deserve it.", "
Good news will be brought to you by mail.", "
Good news will come to you by mail.", "
Good to begin well, better to end well.", "
Happiness begins with facing life with a smile and a wink.", "
Happiness will bring you good luck.", "
Happy life is just in front of you.", "
Hard words break no bones, fine words butter no parsnips.", "
Have a beautiful day.", "
He who expects no gratitude shall never be disappointed.", " 
He who knows he has enough is rich.", "
He who knows others is wise.", " He who knows himself is enlightened.", "
Help! I’m being held prisoner in a chinese bakery!
How many of you believe in psycho-kinesis? Raise my hand.", "
How you look depends on where you go.", "
I learn by going where I have to go.", "
If a true sense of value is to be yours it must come through service.", "
If certainty were truth, we would never be wrong.", "
If you continually give, you will continually have.", "
If you look in the right places, you can find some good offerings.", "
If you think you can do a thing or think you can’t do a thing, you’re right.", "
If you wish to see the best in others, show the best of yourself.", "
If your desires are not extravagant, they will be granted.", "
If your desires are not to extravagant they will be granted.", " 
If you’re feeling down, try throwing yourself into your work.", "
Imagination rules the world.", "
In order to take, one must first give.", "
In the end all things will be known.", "
In this world of contradiction, It’s better to be merry than wise.", "
It could be better, but its [sic] good enough.", "
It is better to be an optimist and proven a fool than to be a pessimist and be proven right.", "
It is better to deal with problems before they arise.", "
It is honorable to stand up for what is right, however unpopular it seems.", "
It is worth reviewing some old lessons.", "
It takes courage to admit fault.", "
It’s not the amount of time you devote, but what you devote to the time that counts.", "
It’s time to get moving.", " Your spirits will lift accordingly.", "
Keep your face to the sunshine and you will never see shadows.", "
Let the world be filled with tranquility and goodwill.", "
Like the river flow into the sea.", " Something are just meant to be.", "
Listen not to vain words of empty tongue.", "
Listen to everyone.", " Ideas come from everywhere.", "
Living with a commitment to excellence shall take you far.", "
Long life is in store for you.", "
Love is a warm fire to keep the soul warm.", "
Love is like sweet medicine, good to the last drop.", "
Love lights up the world.", "
Love truth, but pardon error.", " 
Man is born to live and not prepared to live.", "
Man’s mind, once stretched by a new idea, never regains it’s original dimensions.", "
Many will travel to hear you speak.", "
Meditation with an old enemy is advised.", "
Miles are covered one step at a time.", "
Nature, time and patience are the three great physicians.", "
Never fear! The end of something marks the start of something new.", "
New ideas could be profitable.", "
New people will bring you new realizations, especially about big issues.", " 
No one can walk backwards into the future.", "
Nothing is more difficult, and therefore more precious, than to be able to decide.", "
Now is a good time to buy stock.", "
Now is the time to go ahead and pursue that love interest!
Now is the time to try something new
Now is the time to try something new.", "
Observe all men, but most of all yourself.", "
One can never fill another’s shoes, rather he must outgrow the old shoes.", "
One of the first things you should look for in a problem is its positive side.", "
Others can help you now.", "
Pennies from heaven find their way to your doorstep this year!
People are attracted by your Delicate [sic] features.", "
People find it difficult to resist your persuasive manner.", "
Perhaps you’ve been focusing too much on saving.", "
Physical activity will dramatically improve your outlook today.", "
Pick battles big enough to matter, small enough to win.", "
Place special emphasis on old friendship.", "
Please visit us at www.", "wontonfood.", "com
Po Says: Pandas like eating bamboo, but I prefer mine dipped in chocolate.", "
Practice makes perfect.", "
Protective measures will prevent costly disasters.", "
Put your mind into planning today.", " Look into the future.", "
Remember the birthday but never the age.", "
Remember to share good fortune as well as bad with your friends.", "
Rest has a peaceful effect on your physical and emotional health.", "
Resting well is as important as working hard.", "
Romance moves you in a new direction.", "
Savor your freedom – it is precious.", "
Say hello to others.", " You will have a happier day.", "
Self-knowledge is a life long process.", "
Share your joys and sorrows with your family.", "
Sift through your past to get a better idea of the present.", "
Sloth makes all things difficult; industry all easy.", "
Small confidences mark the onset of a friendship.", "
Smile when you are ready.", "
Society prepares the crime; the criminal commits it.", "
Someone you care about seeks reconciliation.", "
Soon life will become more interesting.", "
Stand tall.", " Don’t look down upon yourself.", " 
Staying close to home is going to be best for your morale today
Stop searching forever, happiness is just next to you.", "
Strong reasons make strong actions.", "
Success is a journey, not a destination.", "
Success is failure turned inside out.", "
Success is going from failure to failure without loss of enthusiasm.", "
Swimming is easy.", " Stay floating is hard.", "
Take care and sensitivity you show towards others will return to you.", "
Take the high road.", "
Technology is the art of arranging the world so we do not notice it.", "
The austerity you see around you covers the richness of life like a veil.", "
The best prediction of future is the past.", "
The change you started already have far-reaching effects.", " Be ready.", "
The change you started already have far-reaching effects.", " Be ready.", "
The first man gets the oyster, the second man gets the shell.", "
The greatest achievement in life is to stand up again after falling.", "
The harder you work, the luckier you get.", "
The night life is for you.", "
The one that recognizes the illusion does not act as if it is real.", "
The only people who never fail are those who never try.", "
The person who will not stand for something will fall for anything.", "
The philosophy of one century is the common sense of the next.", "
The saints are the sinners who keep on trying.", "
The secret to good friends is no secret to you.", " 
The small courtesies sweeten life, the greater ennoble it.", "
The smart thing to do is to begin trusting your intuitions.", "
The strong person understands how to withstand substantial loss.", "
The sure way to predict the future is to invent it.", "
The truly generous share, even with the undeserving.", "
The value lies not within any particular thing, but in the desire placed on that thing.", "
The weather is wonderful.", " 
There is a time for caution, but not for fear.", "
There is no mistake so great as that of being always right.", "
There is no wisdom greater than kindness.", " 
There is not greater pleasure than seeing your lived (sic) ones prosper.", "
There’s no such thing as an ordinary cat.", "
Things don’t just happen; they happen just.", "
Those who care will make the effort.", "
Time and patience are called for many surprises await you!.", " (sic)
Time is precious, but truth is more precious than time
To know oneself, one should assert oneself.", "
To the world you may be one person, but to one person you may be the world.", "
Today is the conserve yourself, as things just won’t budge.", "
Today, your mouth might be moving but no one is listening.", "
Tonight you will be blinded by passion.", "
Use your eloquence where it will do the most good.", "
We first make our habits, and then our habits make us.", "
Welcome change.", "
“Welcome” is a powerful word.", "
Well done is better than well said.", "
What’s hidden in an empty box?
What’s that in your eye? Oh…it’s a sparkle.", "
What’s yours in mine, and what’s mine is mine.", "
When more become too much.", " It’s same as being not enough.", "
When your heart is pure, your mind is clear.", "
Wish you happiness.", "
With age comes wisdom.", "
You (sic) adventure could lead to happiness.", "
You always bring others happiness.", "
You are a person of another time.", "
You are a talented storyteller.", " 
You are admired by everyone for your talent and ability.", "
You are almost there.", "
You are busy, but you are happy.", "
You are generous to an extreme and always think of the other fellow.", "
You are going to have some new clothes.", " 
You are in good hands this evening.", "
You are interested in higher education, whether material or spiritual.", "
You are modest and courteous.", "
You are never selfish with your advice or your help.", "
You are next in line for promotion in your firm.", "
You are offered the dream of a lifetime.", " Say yes!
You are open-minded and quick to make new friends.", " 
You are solid and dependable.", "
You are soon going to change your present line of work.", "
You are talented in many ways.", "
You are the master of every situation.", " 
You are very expressive and positive in words, act and feeling.", "
You are working hard.", "
You begin to appreciate how important it is to share your personal beliefs.", "
You can keep a secret.", "
You can see a lot just by looking.", "
You can’t steal second base and keep your foot on first.", "
You desire recognition and you will find it.", "
You have a deep appreciation of the arts and music.", "
You have a deep interest in all that is artistic.", "
You have a friendly heart and are well admired.", " 
You have a shrewd knack for spotting insincerity.", "
You have a yearning for perfection.", " (3)
You have an active mind and a keen imagination.", "
You have an ambitious nature and may make a name for yourself.", "
You have an unusual equipment for success, use it properly.", "
You have exceeded what was expected.", "
You have had a good start.", " Work harder!
You have the power to write your own fortune.", "
You have yearning for perfection.", "
You know where you are going and how to get there.", "
You look pretty.", "
You love challenge.", "
You love chinese food.", "
You make people realize that there exist other beauties in the world.", "
You never hesitate to tackle the most difficult problems.", " 
You never know who you touch.", "
You only treasure what you lost.", "
You seek to shield those you love and like the role of provider.", " 
You should be able to make money and hold on to it.", "
You should be able to undertake and complete anything.", "
You should pay for this check.", " Be generous.", "
You understand how to have fun with others and to enjoy your solitude.", "
You will always be surrounded by true friends.", "
You will always get what you want through your charm and personality.", "
You will always have good luck in your personal affairs.", "
You will be a great success both in the business world and society.", " 
You will be blessed with longevity.", "
You will be pleasantly surprised tonight.", "
You will be sharing great news with all the people you love.", "
You will be successful in your work.", "
You will be traveling and coming into a fortune.", "
You will be unusually successful in business.", "
You will become a great philanthropist in your later years.", "
You will become more and more wealthy.", "
You will enjoy good health.", "
You will enjoy good health; you will be surrounded by luxury.", "
You will find great contentment in the daily, routine activities.", "
You will have a fine capacity for the enjoyment of life.", "
You will have gold pieces by the bushel.", "
You will inherit a large sum of money.", "
You will make change for the better.", "
You will soon be surrounded by good friends and laughter.", "
You will take a chance in something in near future.", "
You will travel far and wide, both pleasure and business.", "
You will travel far and wide,both pleasure and business.", "
Your abilities are unparalleled.", "
Your ability is appreciated.", "
Your ability to juggle many tasks will take you far.", "
Your biggest virtue is your modesty.", "
Your character can be described as natural and unrestrained.", "
Your difficulties will strengthen you.", "
Your dreams are never silly; depend on them to guide you.", "
Your dreams are worth your best efforts to achieve them.", "
Your energy returns and you get things done.", "
Your family is young, gifted and attractive.", "
Your first love has never forgotten you.", "
Your goal will be reached very soon.", "
Your happiness is before you, not behind you! Cherish it.", "
Your hard work will payoff today.", "
Your heart will always make itself known through your words.", "
Your home is the center of great love.", "
Your ideals are well within your reach.", "
Your infinite capacity for patience will be rewarded sooner or later.", "
Your leadership qualities will be tested and proven.", "
Your life will be happy and peaceful.", "
Your life will get more and more exciting.", "
Your love life will be happy and harmonious.", "
Your love of music will be an important part of your life.", "
Your loyalty is a virtue, but not when it’s wedded with blind stubbornness.", "
Your mentality is alert, practical, and analytical.", "
Your mind is creative, original and alert.", "
Your mind is your greatest asset.", "
Your moods signal a period of change.", "
Your quick wits will get you out of a tough situation.", "
Your reputation is your wealth.", "
Your success will astonish everyone.", " 
Your talents will be recognized and suitably rewarded.", "
Your work interests can capture the highest status or prestige."
);
#sourced from https://www.ducksters.com/jokes/silly.php
$jokes = array(
"Q: What goes up and down but does not move?<br>
A: Stairs",
"Q: Where should a 500 pound alien go?<br>
A: On a diet",
"Q: What did one toilet say to the other?<br>
A: You look a bit flushed.",
"Q: Why did the picture go to jail?<br>
A: Because it was framed.",
"Q: What did one wall say to the other wall?<br>
A: I'll meet you at the corner.",
"Q: What did the paper say to the pencil?<br>
A: Write on!",
"Q: What do you call a boy named Lee that no one talks to?<br>
A: Lonely",
"Q: What gets wetter the more it dries?<br>
A: A towel.",
"Q: Why do bicycles fall over?<br>
A: Because they are two-tired!",
"Q: Why do dragons sleep during the day?<br>
A: So they can fight knights!",
"Q: What did Cinderella say when her photos did not show up?<br>
A: Someday my prints will come!",
"Q: Why was the broom late?<br>
A: It over swept!",
"Q: What part of the car is the laziest?<br>
A: The wheels, because they are always tired!",
"Q: What did the stamp say to the envelope?<br>
A: Stick with me and we will go places!",
"Q: What is blue and goes ding dong?<br>
A: An Avon lady at the North Pole!",
"Q: Were you long in the hospital?<br>
A: No, I was the same size I am now!",
"Q: Why couldn't the pirate play cards?<br>
A: Because he was sitting on the deck!",
"Q: What did the laundryman say to the impatient customer?<br>
A: Keep your shirt on!",
"Q: What's the difference between a TV and a newspaper?<br>
A: Ever tried swatting a fly with a TV?",
"Q: What did one elevator say to the other elevator?<br>
A: I think I'm coming down with something!",
"Q: Why was the belt arrested?<br>
A: Because it held up some pants!",
"Q: Why was everyone so tired on April 1st?<br>
A: They had just finished a March of 31 days.",
"Q: Which hand is it better to write with?<br>
A: Neither, it's best to write with a pen!",
"Q: Why can't your nose be 12 inches long?<br>
A: Because then it would be a foot!",
"Q: What makes the calendar seem so popular?<br>
A: Because it has a lot of dates!",
"Q: Why did Mickey Mouse take a trip into space?<br>
A: He wanted to find Pluto!",
"Q: What is green and has yellow wheels?<br>
A: Grass…..I lied about the wheels!",
"Q: What is it that even the most careful person overlooks?<br>
A: Her nose!",
"Q: Did you hear about the robbery last night?<br>
A: Two clothes pins held up a pair of pants!",
"Q: Why do you go to bed every night?<br>
A: Because the bed won't come to you!",
"Q: Why did Billy go out with a prune?<br>
A: Because he couldn't find a date!",
"Q: Why do eskimos do their laundry in Tide?<br>
A: Because it's too cold out-tide!",
"Q: How do you cure a headache?<br>
A: Put your head through a window and the pane will just disappear!",
"Q: What has four wheels and flies?<br>
A: A garbage truck!",
"Q: What kind of car does Mickey Mouse's wife drive?<br>
A: A minnie van!",
"Q: Why don't traffic lights ever go swimming?<br>
A: Because they take too long to change!",
"Q: Why did the man run around his bed?<br>
A: To catch up on his sleep!",
"Q: Why did the robber take a bath before he stole from the bank?<br>
A: He wanted to make a clean get away!", 
);


if (isset($_POST['hello'])) {
	$status = $hello_phrases[rand(0,count($hello_phrases)-1)]; 
}

if (isset($_POST['weather'])) {
	$status = "Using my magic powers, I predict that it will be " . $weather_phrases[rand(0,count($weather_phrases)-1)] . " " .rand(2, 365) . " days from now."; 
}

if (isset($_POST['fortune'])) {
	$status = $fortunes[rand(0,count($fortunes)-1)]; 
}

if (isset($_POST['joke'])) {
	$status = $jokes[rand(0,count($jokes)-1)]; 
}

if (isset($_POST['feed'])) {

$status = 'I am very hungry...';

$rdiv = "

<form action='webpetz.php' method='post'>
  <p style='font-size:170%'>What will you give $name to eat?</p>
  <input type='radio' name='food' value='Cat food'>Cat food <input type='radio' name='food' value='Dog food'>Dog food <input type='radio' name='food' value='Chicken nuggets'>Chicken nuggets <input type='radio' name='food' value='Lasagna'>Lasagna <input type='radio' name='food' value='Carrots'>Carrots <input type='radio' name='food' value='Tomato soup'>Tomato soup <input type='radio' name='food' value='Pop tarts'>Pop tarts <input type='radio' name='food' value='Chicken noodle soup'>Chicken noodle soup
  <p style='font-size:170%'>What will you give $name to drink?</p>
  <input type='radio' name='drink' value='Water'>Water <input type='radio' name='drink' value='Milk'>Milk <input type='radio' name='drink' value='Soda'>Soda <input type='radio' name='drink' value='Green tea'>Green tea <input type='radio' name='drink' value='Apple juice'>Apple juice <input type='radio' name='drink' value='Iced tea'>Iced tea <input type='radio' name='drink' value='Coffee'>Coffee <input type='radio' name='drink' value='Orange juice'>Orange juice <input type='radio' name='drink' value='Whiskey'>Whiskey <input type='radio' name='drink' value='Everclear'>Everclear
  <br><br>
  <input type='submit' value='Feed $name' style='width:300px;'></form>

";

}

if (isset($_POST['food']) && isset($_POST['drink'])) {
if ($species=='Cat') {
  $avatar = "img/cat-eating-corn.gif";
} else {
  $avatar = "img/dog-eating.gif";
}
  $status = "Thank you for this bountiful feast of " . strtolower($_POST['food']) . " and ". strtolower($_POST['drink']) . "."; 
}

if (isset($_POST['pet'])) {
if ($species=='Cat') {
$avatar = 'img/cat-sleep.gif';
} else {
$avatar = 'img/dog-petting.gif';
}
$status = '<i>Very nice, very nice...</i>';
}

if (isset($_POST['bathe'])) {
if ($species=='Cat') {
$avatar = 'img/cat-clean.gif';
} else {
$avatar = 'img/dog-bathing.gif';
}
$status = '<i>Splish splash...</i>';
}

if (isset($_POST['rps'])) {
$status = "Let's play rock, paper, scissors.";

$rdiv = "
  <p style='font-size:170%'>What will you throw?</p>
<form action='webpetz.php' method='post'>
  <input type='radio' name='rps_throw' value='rock'>Rock <input type='radio' name='rps_throw' value='paper'>Paper <input type='radio' name='rps_throw' value='scissors'>Scissors
  <br><br>  
  <input type='submit' value='Throw' style='width:300px;'></form>

";

}

if (isset($_POST['rps_throw'])) {
$user_choice = strtoupper($_POST['rps_throw']);
$rps_choices = array("ROCK","PAPER","SCISSORS");
$comp_choice = $rps_choices[rand(0,count($rps_choices)-1)];
$rps_win_status = "";
$rps_tie = "<p style='font-size:170%;color:yellow;'>Tie!</p>";
$rps_loss = "<p style='font-size:170%;color:red;'>You lose!</p>";
$rps_win = "<p style='font-size:170%;color:green;'>You win!</p>";
if ($user_choice == "ROCK") {
	if ($comp_choice == "ROCK") {
		$status = "We tied. Go again?";
		$rps_win_status = $rps_tie;
	} elseif ($comp_choice == "PAPER") {
		$status = "Ha! How does it feel to SUCK?";
		$rps_win_status = $rps_loss;
	} else { $status = "Nice win. You earned it."; $rps_win_status = $rps_win; }
}
if ($user_choice == "PAPER") {
	if ($comp_choice == "PAPER") {
		$status = "We tied. Go again?";
		$rps_win_status = $rps_tie;
	} elseif ($comp_choice == "SCISSORS") {
		$status = "Ha! How does it feel to SUCK?";
		$rps_win_status = $rps_loss;
	} else { $status = "Nice win. You earned it."; $rps_win_status = $rps_win; }
}
if ($user_choice == "SCISSORS") {
	if ($comp_choice == "SCISSORS") {
		$status = "We tied. Go again?";
		$rps_win_status = $rps_tie;
	} elseif ($comp_choice == "ROCK") {
		$status = "Ha! How does it feel to SUCK?";
		$rps_win_status = $rps_loss;
	} else { $status = "Nice win. You earned it."; $rps_win_status = $rps_win; }
}


$rdiv = "
  <p style='font-size:170%'>You threw: $user_choice</p><br> 
  <p style='font-size:170%'>$name threw: $comp_choice</p><br>
  $rps_win_status

  <form action='webpetz.php' method='post'>
  <input type='hidden' name='rps'>
  <input type='submit' value='Play again?' style='width:300px;'></form>
";

}

if (isset($_POST['blackjack'])) {
	// to load the blackjack game in i copied the embedded code from the website
	if ($species == "Cat") {
	$avatar = "img/casinocat.jpg";
	} else {
	$avatar = "img/casinodog.jpg";
	}
	$rdiv= "
		<script src='//thenerdshow.com/js/loader_min.js?src=//thenerdshow.com/js/blackjack.js'></script>
	";
	$status = "Feelin' lucky today?"; 
}

if (isset($_POST['chess'])) {
	if ($species == "Cat") {
	$avatar = "img/catchess.png";
	} else {
	$avatar = "img/dog-chess.jpg";
	}
	$rdiv= "
		<iframe src='https://fritz.chessbase.com' style='width:760px;height:480px'></iframe>
	";
	$status = "Chess is a game of intellect and skill. Are you sure you have what it takes to beat me?"; 
}

if (isset($_POST['add_pet'])) {
		$rdiv = "

	<p style='font-size:170%'>Adopt a new pet: </p><br> 
<form action='webpetz.php' method='post' style='border:2px solid black;'>

	<p><b>NAME:</b></p> <input type='text_box' name='name' maxlength='50'>


        <p><b>SPECIES:</b></p> <select name='species'>
    		<option value='Cat'>Cat</option>
    		<option value='Dog'>Dog</option>
	</select>

        <p><b>SEX:</b></p>
	<input type='radio' name='sex' value='Female' checked='checked'>Female
	<input type='radio' name='sex' value='Male'>Male

	<p><b>FAVORITE COLOR:</b></p> 
	 <input type='radio' name='color' value='red' checked='checked'><span style='color:red;'>Red</span> <input type='radio' name='color' value='orange'><span style='color:orange;'>Orange</span> <input type='radio' name='color' value='yellow'><span style='color:yellow;'>Yellow</span> <input type='radio' name='color' value='green'><span style='color:green;'>Green</span> <input type='radio' name='color' value='blue'><span style='color:blue;'>Blue</span> <input type='radio' name='color' value='indigo'><span style='color:indigo;'>Indigo</span> <input type='radio' name='color' value='violet'><span style='color:violet;'>Violet</span>

	<p><b>BIRTHDAY:</b></p> <input type='date' name='birthday'><br><br>

        <p><b>DATE ADOPTED:</b></p> <input type='date' name='date_adopted'><br><br>

  	<input type='submit' value='Adopt' style='width:300px;'><br><br></form>

	";
	$status = "More friends is always more fun."; 
}

if (isset($_POST['view_pets'])) {

	echo "<div style='text-align:center;width:400px;float:right;'>";

	echo "<p style='font-size:170%'>Available pets: </p>";

	$query  = "SELECT * FROM pets ORDER BY name";
	$result = $pdo->query($query);
	echo "
	<table border='4' style='width:100%;background-color:white'>
	<tr>
	<th style='width:150px;background'>Picture</th>
	<th style='width:300px;'>Name</th>
	<th style='width:300px;'>Species</th>
	<th style='width:300px;'>Sex</th>
	<th style='width:300px;'></th>
	</tr>
	";

  	while ($row = $result->fetch()) {
		$r0 = htmlspecialchars($row['name']);
		$r1 = htmlspecialchars($row['species']);
		$r2 = htmlspecialchars($row['birthday']);
		$r3 = htmlspecialchars($row['avatar']);
		$r4 = htmlspecialchars($row['sex']);
		$r5 = htmlspecialchars($row['color']);
		echo "<tr>";
                echo "<td><center><img src='img/$r3' width='100' height='100'></center></td>";
		echo "<td><span style='color:$r5'>$r0</span></td>";
		echo "<td>$r1</td>";
		echo "<td>$r4</td>";
		if ($r0 != $name) {
		echo "<td><form action='webpetz.php' method='post'><input type='hidden' name='update' value='$r0'><input type='submit' value='Select' style='width:100px;'></form></td>";
		} else { echo "<td></td>"; }
		echo "</tr>";
	}

	echo "</table>";

  	echo "</div>";
		 
	$status = "The gang's all here."; 
}

if (isset($_POST['delete_pets'])) {

	echo "<div style='text-align:center;width:400px;float:right;'>";

	echo "<p style='font-size:170%'>Select a pet to delete: </p>";
	echo "<p style='font-size:100%;color:red;'>WARNING: THIS CANNOT BE UNDONE</p>";

	$query  = "SELECT * FROM pets ORDER BY name";
	$result = $pdo->query($query);
	echo "
	<table border='4' style='width:100%;background-color:white'>
	<tr>
	<th style='width:150px;background'>Picture</th>
	<th style='width:300px;'>Name</th>
	<th style='width:300px;'></th>
	</tr>
	";

  	while ($row = $result->fetch()) {
		$r0 = htmlspecialchars($row['name']);
		$r5 = htmlspecialchars($row['color']);
		$r3 = htmlspecialchars($row['avatar']);
		echo "<tr>";
                echo "<td><center><img src='img/$r3' width='100' height='100'></center></td>";
		echo "<td><span style='color:$r5'>$r0</span></td>";
		if ($r0 != $name) {
		echo "<td><center><form action='webpetz.php' method='post'><input type='hidden' name='delete' value='$r0'><input type='submit' value='Delete' style='width:100px;'></form></center></td>";
		} else { echo "<td></td>"; }
		echo "</tr>";
	}

	echo "</table>";

  	echo "</div>";
		 
	$status = "You're not going to do what I think you're going to do, are you?"; 
}


  echo "<div style='text-align:center;border:2px solid black;width:500px;float:left;margin-right:20px;'>";

  echo "<p style='color:$fav_color;font-size:300%;'><i>$name</i></p>";

  echo "<p style='color:black;font-size:100%;'>Species: $species | Sex: $sex | Birthday: $birthday</p>";

  echo "<p style='color:black;font-size:150%;'><q>$status</q></p>";

  echo "<p><img src='$avatar' width='300'></p>";

  echo "<p style='color:black;font-size:100%;'><i>Adopted on $date_adopted</i></p>";

  echo "</div>";

 echo "<div style='text-align:center;border:2px solid black;width:310px;float:left;'>";

  echo "<p style='letter-spacing:1.5px;color:red;font-size:150%;'><strong>-- Talk --</strong></p>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='hello'>
  <input type='submit' value='Say hello' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='weather'>
  <input type='submit' value='Weather forecast' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='fortune'>
  <input type='submit' value='Tell me my fortune' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='joke'>
  <input type='submit' value='Tell me a joke' style='width:300px;'></form>";

  echo "<p style='letter-spacing:1.5px;color:blue;font-size:150%;'><strong>-- Care --</strong></p>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='feed'>
  <input type='submit' value='Feed' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='pet'>
  <input type='submit' value='Pet' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='bathe'>
  <input type='submit' value='Bathe' style='width:300px;'></form>";

  echo "<p style='letter-spacing:1.5px;color:green;font-size:150%;'><strong>-- Fun --</strong></p>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='rps'>
  <input type='submit' value='Rock, Paper, Scissors' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='blackjack'>
  <input type='submit' value='Blackjack' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='chess'>
  <input type='submit' value='Chess' style='width:300px;'></form>";

  echo "<p style='letter-spacing:1.5px;color:purple;font-size:150%;'><strong>-- Admin --</strong></p>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='view_pets'>
  <input type='submit' value='View pets' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='add_pet'>
  <input type='submit' value='Adopt a pet' style='width:300px;'></form>";

  echo "<form action='webpetz.php' method='post'>
  <input type='hidden' name='delete_pets'>
  <input type='submit' value='Delete a pet' style='width:300px;'></form>";

  echo "</div>";

  echo "<div style='text-align:center;width:400px;float:right;'>";
  echo "$rdiv";

  echo "</div>";

?>
