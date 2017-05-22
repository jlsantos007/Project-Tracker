        <?php if (!empty($userdata['track_id'])): ?>
            <?php echo '<input type="hidden" id="track_id" value="'. urldecode($userdata['track_id']) .'"/>'; ?>
            <?php echo PHP_EOL; ?>
            <?php echo '<input type="hidden" id="approved" value="'. urldecode($userdata['issue_approved_by_id']) .'"/>'; ?>
        <?php endif ?>
