<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">                   
          <?php if (isset($_SESSION['userData'])  && $_SESSION['userData']['success']) : ?>
            <li class="nav-link active">balance and transactions</li>
            <li class="nav-link ml-auto"><?=$_SESSION['userData'][0]->fio?></li> 
            <a class="nav-link" href="/logout">logout</a> 
          <?php else: ?>
            <a class="nav-link ml-auto" href="/login">login</a>
          <?php endif; ?>
        </nav>
    </div>
</div>
