<?php include "model/header.php"?>

    <div class="mx-auto" style="width: 200px;"></div>
    <div class="container-fluid bg-light">
        <div class="container timeline">
            <?php while($data = $search->fetch(PDO::FETCH_ASSOC)):?>
                <a class="none" name='profilName' href='?c=profil&pseudo=<?=$data['id']?>'>
                    <div class='cards display'>
                        <div class='card flex-row'>
                            <div class="card-image w-10 m-auto">
                                <?php if(file_exists("userImages/" . $data['id'] . '/profil.jpg')):?>
                                    <img class="card-img upload_image" src="userImages/<?= $data['id']?>/profil.jpg" alt="user">
                                <?php else:?>
                                    <img class="card-img upload_image" src="view/assets/images/user.svg" alt="user">
                                <?php endif;?>
                            </div>
                            <div class='info_card w-75 padding'>
                                <h5 class='card_title'>Pseudo: <?=$data['pseudo']?></h5>
                                <p> First name: <?=$data['first_name']?></p>
                                <p> Last name: <?=$data['last_name']?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>