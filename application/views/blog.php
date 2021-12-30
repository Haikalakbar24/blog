<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Artikel Terbaru</h1>
    <a href="<?php echo site_url('Blog/add') ?>"> Tambah Artikel</a>
    <form>
      <input type="text" name="find">
      <button type="submit">Cari</button>
    </form>
    <?php foreach($blog as $key=>$blog):?>
    <div class="blog">
        <h2>
          <a href="<?php echo site_url('blog/detail/'.$blog['url']);?>">
            <?php echo $blog['title'];?>
          </a>
        </h2>
        <a href="<?php echo site_url('blog/edit/' . $blog['id']); ?>"> Edit</a>
        <a href="<?php echo site_url('blog/delete/' . $blog['id']); ?>">Delete</a>
        <br>
        <?php echo $blog['content'];
        
        endforeach;
        ?>
   
</body>
</html>