<?php include "model/header.php"?>

    <div class="mx-auto" style="width: 200px;"></div>
    <div class="container-fluid bg-light">
		<div class="container timeline pb-3">
            <div class="contentMessenger padding shadow-sm p-3 mb-5 rounded">
        <!-- 
        <div class="contact">
            <div class="contactSearch">
                <input type="text" name="contactSearch" id="contactSearch">
            </div>
            <div class="contentHeader">
                <button type="button" id="msgReceived" value="received" clicked="false">message recu</button>
                <button type="button" id="msgSent" value="sent" clicked="true">message envoyee</button>
            </div>
            <div id="contactResult">

            </div>
            </div> -->
                <div class="messenger">
                    <div class="messengerBox" id="messengerBox">
                    </div>
                    <div class="messengerText">
                        <div class="inputMsg">
                            <label for="dest">Destinataire : </label><input type="text" name="dest" id="dest">
                            <textarea class="form-control" name="msg" id="inputMsg"></textarea>
                        </div>
                        <?php
                            echo '<button class="form-control" type="button" name="sendMsg" id="sendMsg" value="'.$_SESSION['id'].'">ENVOYER</button>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<!--</div>
</div>
</div>
</div>-->

</body>
</html>

<script src="script/messenger/ajax_messenger.js"></script>
<!--<script src="script/ajax_contact.js"></script>-->
