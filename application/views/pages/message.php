<?php
  foreach ($messages as $m) {
      //$m->id;

  echo '<div id="viewMessage"><img class="thumbMessage" src="'.base_url().'images/user.png"><p class="textMessage">'.$m->message.'</p></div>';

}
