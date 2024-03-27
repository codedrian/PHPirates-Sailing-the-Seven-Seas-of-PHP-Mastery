<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>Ninjas</title>
</head>

<body>
    <main class="flex flex-col justify-center items-center">
        <h1 class="text-4xl my-9 font-bold">Awesome Ninja Turtles</h1>
        <p>Add a number in the end of the URL to display desired image count</p>
        <div class="grid grid-cols-4 col-auto gap-12 mb-20">
            <?php
            for ($ninja = 0; $ninja < $number_of_ninja; $ninja++) :
            ?>
                <img src="<?= base_url('assets/images/ninja/ninja_turtle_4.png') ?>" alt="A photo of one of the ninja turtles" class="object-cover h-auto w-52">
            <?php
            endfor;
            ?>
        </div>
    </main>
</body>

</html>
