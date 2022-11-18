<footer class="footer">
      <div class="pull-right hidden-xs">
        <b>Riad Husejnovic</b>
      </div>
      <strong>Copyright &copy; 2022<?php
            if(isset($_SESSION['user'])){
              echo '
                       | <a href="source-code">Source Code</a>
              ';
            }
          ?></strong>
    </div>
</footer>