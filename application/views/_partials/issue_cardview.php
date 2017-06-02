<tr>
  <td><?php echo $issue_title; ?></td>
  <td><?php echo $this->themodeloftruth->create($created_by); ?></td>
  <td><?php if($assigned_to == null) {echo 'unassigned';} else {echo $this->themodeloftruth->dev($assigned_to);} ?></td>
  <td><?php echo $this->themodeloftruth->git($git_repo_id); ?></td>
  <td><?php echo $date_created; ?></td>
  <td colspan="3" style="text-align: center;">

  		<a href="#" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-list-alt"></span> Current
        </a>
        <a href="#" class="btn btn-primary btn-sm">
          <span class="glyphicon glyphicon-list-alt"></span> Details
        </a>
        <a href="#" class="btn btn-info btn-sm"<?php if ($track_issue_id == null) {echo 'style="opacity: 0.50; cursor: not-allowed;"';} ?>>
        <span class="glyphicon glyphicon-list-alt"></span> History
       	</a>

    	
  </td>
</tr>
