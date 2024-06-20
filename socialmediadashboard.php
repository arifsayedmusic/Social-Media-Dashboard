<?php 
$userLoggedIn = true;  
if (!$userLoggedIn) { 
    header("Location: login.php"); 
    exit(); 
} 
$userName = "Arif Sayed"; 
$userId = 123;  
function getSocialMediaData($userId) { 
    $data = [ 
        'facebook' => ['likes' => 1500, 'comments' => 500, 'shares' => 200, 'followers' => 
3000], 
        'twitter' => ['followers' => 2000, 'tweets' => 100], 
        'instagram' => ['followers' => 3000, 'posts' => 50], 
    ]; 
    return $data; 
} 
$socialMediaData = getSocialMediaData($userId); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Social Media Dashboard</title> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: black; 
        } 
        .container { 
            max-width: 800px; 
            margin: 20px auto; 
            padding: 20px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            background-color: #31363F;
        } 
        h1, h2 { 
            text-align: center; 
        } 
        ul { 
            list-style-type: none; 
            padding: 0; 
        } 
        li { 
            margin-bottom: 10px; 
        } 
        canvas { 
            margin: 20px auto; 
            display: block; 
        } 
        .social-icons { 
            text-align: center; 
        } 
        .social-icons img { 
            width: 40px; 
            margin: 0 10px; 
            cursor: pointer; 
        } 
    </style> 
</head> 
<body> 
    <div class="container"> 
        <h1 style="font-family:Verdana;color:white">Welcome, <?php echo $userName; 
?> !</h1>         
        <h2 style="font-family:Trebuchet MS;color:white">Social Media Dashboard:</h2> 
        <ul> 
            <li style="color:white">Facebook Followers: <?php echo 
$socialMediaData['facebook']['followers']; ?></li> 
            <li style="color:white">Facebook Likes: <?php echo 
$socialMediaData['facebook']['likes']; ?></li> 
            <li style="color:white">Facebook Comments: <?php echo 
$socialMediaData['facebook']['comments']; ?></li> 
            <li style="color:white">Facebook Shares: <?php echo 
$socialMediaData['facebook']['shares']; ?></li> 
            <li style="color:white">Twitter Followers: <?php echo 
$socialMediaData['twitter']['followers']; ?></li> 
            <li style="color:white">Twitter Tweets: <?php echo 
$socialMediaData['twitter']['tweets']; ?></li> 
            <li style="color:white">Instagram Followers: <?php echo
$socialMediaData['instagram']['followers']; ?></li> 
            <li style="color:white">Instagram Posts: <?php echo 
$socialMediaData['instagram']['posts']; ?></li> 
        </ul> 
        <canvas id="socialMediaChart" width="400" height="400"></canvas> 
        <div class="social-icons"> 
            <a href="https://www.facebook.com/" target="_blank"><img 
src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Facebook_icon.svg" 
alt="Facebook"></a> 
            <a href="https://twitter.com/" target="_blank"><img 
src="https://upload.wikimedia.org/wikipedia/commons/6/6f/Logo_of_Twitter.svg" 
alt="Twitter"></a> 
            <a href="https://www.instagram.com/" target="_blank"><img 
src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" 
alt="Instagram"></a> 
        </div> 
    </div> 
    <script> 
        // Data for the pie chart 
        var data = { 
            labels: ['Facebook', 'Twitter', 'Instagram'], 
            datasets: [{ 
                data: [ 
                    <?php echo $socialMediaData['facebook']['followers']; ?>, 
                    <?php echo $socialMediaData['twitter']['followers']; ?>, 
                    <?php echo $socialMediaData['instagram']['followers']; ?> 
                ], 
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56'] 
            }] 
        }; 
        // Get the canvas element 
        var ctx = document.getElementById('socialMediaChart').getContext('2d'); 
        // Create the pie chart 
        var socialMediaChart = new Chart(ctx, { 
            type: 'pie', 
            data: data 
        }); 
    </script> 
</body> 
</html> 