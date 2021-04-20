<?php 
ob_start();

?>
    <h1 class='intro'>Blog de monsieur Jean Forteroche</h1>
        <div class="introContainer">
            <img class="rounded-circle photo" alt="30x30" src="images\papiArmée2.jpg" data-holder-rendered="true">
            <div class='animP'>
                <p class='intro'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste accusantium, nihil obcaecati nemo vel libero voluptate numquam odit quidem, officiis pariatur! Qui facere architecto commodi, adipisci velit obcaecati delectus error vero ipsum assumenda dolorem deleniti esse recusandae corrupti temporibus. Sequi debitis, esse officia molestiae vitae ullam dignissimos laborum reiciendis a, recusandae voluptas eum vero quisquam error. Aliquam, vel nobis, tenetur velit, ab atque consectetur totam cum iure nihil recusandae! Cum sit fugiat, qui maiores nulla repellat ipsam eum accusamus blanditiis fuga velit temporibus quod quasi aliquam animi molestiae reprehenderit dolores rerum alias iusto dolorum expedita eaque! Quod earum ipsa ducimus quisquam ex molestias sunt, vel magnam at, beatae, minus tempora asperiores laudantium? Ducimus nihil rerum harum, sit unde assumenda molestiae perspiciatis! Non fugiat eum dolor possimus? Aut nemo quam, exercitationem harum repudiandae quis maxime alias amet eum dignissimos deserunt voluptates. Recusandae illo repudiandae consectetur placeat explicabo praesentium tenetur odio accusantium, voluptatum possimus neque magni sapiente, cum ullam nihil rerum? Optio odio suscipit nulla magnam officiis temporibus possimus, natus saepe explicabo, dolore molestiae quo recusandae vel iste. Accusamus vero magni tempora numquam veritatis magnam quia 
                    facilis cumque, maiores non libero. Dolorem, totam et! In nemo hic vitae, debitis eveniet nam tempora!
                </p>
                <p class="float-end">Jean F.</p>
            </div>
        </div>
        <br>
        <hr class="hr">
        <br>
    <h3 class="intro">Derniers articles publiés</h3>
    <?php
    foreach($article as $articles){
    ?>
    <div class="card text-center mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6" >
    <div class="card-body shadow-lg paper">
        <h5 class="card-title"><?= $articles['titre']  ?></h5>
        <hr class="hr">
        <p class="card-text"><?= $articles['contenu'].' ...'?></p>
        <hr class="hr">
        <a href="article&id=<?= $articles['id']?>&pagingComment=1" class="btn btn-primary mt-4 btnBleu">Aller sur l'article</a>
    </div>
    </div>
    <br>
    <br>
<?php
}
$contenu = ob_get_clean();
?>
