## Challenges: 
* In this program I want to display the tickets images that I created using PHP 5 times and display the ticket code dynamically so it will change everytime I hit reload button and each ticket, have them display ticket code differently. At first I struggle to display the ticket code differently in the ticket images. I'm using for loop here in html and just loop the card 5 times, because of this, they all have the same ticket code. I resolve this issue by putting the $ticketCode variable inside the for loop in the html file so in every iteration the rand() will run which I passed as a $ticketNumber and generate a unique code.

##  What I learned?
* I learned to generate an image using PHP and I learned how to pass a query parameter in the  url so the other files can access the variables I set globally. In this case I used `$ticketName = isset($_GET['name']) ? $_GET['name'] : '';` to retrieve the variable i set in the URL query parameter.


