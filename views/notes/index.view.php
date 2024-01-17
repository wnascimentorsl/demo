<?php require base_path('views/partials/head.php')?>


<?php require base_path('views/partials/nav.php')?> 


<?php require base_path('views/partials/banner.php')?> 


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li>
          <a href="/note?id= <?php echo htmlspecialchars($note['id']) ?>" class="text-blue-500 hover:underline">
            <?php echo htmlspecialchars($note['body']) ?>
          </a>  
        </li>
       <?php endforeach; ?> 
    </ul>
  </div>
  <p>

        <a href="/notes/create" class="text-blue-500 hover:underline"> Create Note </a>

  </p>
</main>

<?php require base_path('views/partials/footer.php')?>

