<?php include "model/header.php"?>

    <div class="mx-auto" style="width: 200px;"></div>
    <div class="container-fluid bg-light">
        <div class="container padding">
            <div class="card fit" id="change">
                <form id="upload" method="post" enctype="multipart/form-data" >
                    <input id="image_upload" name="image" type="file" style= "display: none">
                </form>
                <label class="label_image" for="image_upload">
                    <?php if(file_exists("userImages/" . $_SESSION['id'] . '/profil.jpg')):?>
                        <img class="card-img upload_image" src="userImages/<?= $_SESSION['id']?>/profil.jpg" alt="user">
                    <?php else:?>
                        <img class="card-img upload_image" src="view/assets/images/user.svg" alt="user">
                    <?php endif;?>
                </label>
                <form method="post" class="form_change">
                    <label>Change Pseudo</label>
                    <input class="form-control" type="text" name="pseudo" value=<?= $_SESSION["pseudo"]?>>
                    <label>Change LastName</label>
                    <input class="form-control" type="text" name="lastname"  value=<?= $_SESSION["lastname"]?>>
                    <label>Change Firstname</label>
                    <input class="form-control" type="text" name="firstname"  value=<?= $_SESSION["firstname"]?>>
                    <label>Change Email</label>
                    <input class="form-control" type="email"  name="email"  value=<?= $_SESSION["email"]?>>
                    <label>Change Birthday</label>
                    <input class="form-control" type="date" name="date"  value=<?= $_SESSION["birthday"]?>>
                    <label for="theme">Change theme</label>           
					<select class="form-control" id="theme" name="theme">
						<option value="1">Light</option> 
						<option value="2" selected>Dark</option>
					</select>
                    <label>Change Password</label>
                    <input class="form-control" type="password" name="password"  value="123456789">
                    <input class="form-control btn-submit" type="submit" class="btn-chat">
                </form>
            </div>
            <div class="card fit">
                <form id="upload_video" method="POST" enctype="multipart/form-data">
                    <label for="theme">Change Background Video</label>           
                    <input id="video_upload" name="video" type="file">
                    <input id="submitvideo" name="videosub" type="submit">
                </form>
            </div>
            <div class="card fit">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount">Delete Account</button>
            <div class="modal fade" id="deleteAccount">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="post">
                                <input type="submit" class="btn btn-danger"  name= "delete" id="delete" value="Delete" class="btn-chat">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="max_width">
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="view/assets/js/UpImage.js"></script>
    <script src="view/assets/js/Upvideo.js"></script>
</body>
</html>