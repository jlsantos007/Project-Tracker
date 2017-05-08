<div class="md-form" style="width: 250px; margin-right: 50px; margin-bottom: 0; color: white">
   <input type="text" class="input-alternate" placeholder="Search Project">
</div>
<i class="fa fa-bell" aria-hidden="true"></i>
<a href="<?php echo base_url() . 'index.php/cart' ?>">
<i class="fa fa-shopping-cart" aria-hidden="true">
<span class="badge red" id="badge" style="font-size: 10px;"><?php echo (empty($this->session->userdata('cart'))) ? null :  count(explode(" ", $this->session->userdata('cart')));?></span></i>
</a>
<div class="btn-group" style="height: 40px; width: 200px">
    <button type="button" class="btn btn-danger" style="font-size: 70%;"><?php echo $user_name; ?></button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="<?php echo base_url() . 'index.php/main/logout' ?>">Logout</a>
    </div>
</div>