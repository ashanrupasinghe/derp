<!--<div class="message error" onclick="this.classList.add('hidden');"><?= h($message) ?></div>-->
<div class="alert alert-danger alert-dismissible fade in" onclick="this.classList.add('hidden');">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <?= h($message) ?></div>
