<nav class="navbar navbar-dark navbarTrack">
    <div class="container">
        <div class="navbar-toggleable-xs" id="collapseEx2">
            <a class="navbar-brand"><?php echo $page_title ?></a>
            <div class="row pull-right">
            	<?php if ($this->session->userdata('id')): ?>
            		<?php $this->load->view('_partials/header/after'); ?>
            	<?php else: ?>
            		<?php $this->load->view('_partials/header/before'); ?>
            	<?php endif ?>
            </div>
        </div>
    </div>
</nav>