<div class="btn-group drop<?php echo $index;?> pull-right">
   <a class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
   <div class="dropdown-menu menus<?php echo $index;?>">
      <?php loopDropDownItem($tableview, $index); ?>
    </div>
</div>
<div class="divassigned">
    <?php if (!empty($userdata['track_id'])): ?>
       <?php input_builder($label, $test); ?>
    <?php else: ?>
      <?php input_builder($label); ?>
    <?php endif ?>
</div>
