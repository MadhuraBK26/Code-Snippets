<!DOCTYPE html>

<html lang="en">

<head>

     <meta charset="UTF-8">

     <title>Document</title>

</head>

<body>

     <nav>

           <ul>

               <li><a href="about.php">About page</li>

               <li><a href="contact.php">contact page</li> 


      <?php foreach ($tasks as $task) :?>

         <li>

            <?php if($task->completed) : ?>

                 <strike><?= $task->description; ?></strike>

            <?php else: ?>

                 <?= $task->description; ?>
                                            
            <?php endif; ?> 
            
          </li>
          
       <?php endforeach; ?>  

    </ul>

  </body>

</html>                          


