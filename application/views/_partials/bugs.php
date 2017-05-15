<li class="ui-state-default">
   <div class="row" style="margin: 10px 10px 10px 10px">
      <img src="<?php echo base_url(); ?>public/img/ladybug.png" style="width: 30px; height: 30px">
      <div class="bugName" style="margin: 5px 5px 5px 30px">
         <div class="row">
            <p><?php echo $issue_title; ?></p>
            <p style="margin-left: 20px">(<i><?php echo $issue_desc; ?></i>)</p>
         </div>
      </div>
      <div class="bugBtnChk" style="margin: -5px 5px 10px 30px">
         <?php if ($userdata['linkData'] != 2): ?>
               <?php echo '<button type="button" class="btn btnfinish pull-right" data-raw="' . $id . '">';
                     if($userdata['linkData'] == 3)
                     {
                         echo 'Approved </button>';
                     }
                     else if($this->session->userdata('access_type') == 1)
                     {
                        echo 'Finish </button>';
                     }
                     else
                     {
                        echo "Dev";
                        echo '<button type="button" class="btn btnfinish pull-right" id="btndev">QA</button>';
                     }
               ?>
         <?php endif ?>
         <?php echo '<button type="button" class="btn btnfinish pull-right" data-raw="' . $id . '">Details</button>';?>
      </div>
   </div>
</li>
