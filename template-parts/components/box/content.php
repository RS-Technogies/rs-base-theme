<?php 
    $iconClass=isset($args['icon'])?$args['icon']:"";
?>
<div class="md:w-1/4">
    <!-- Icon Box -->
    <div class="icon-box-1 w-90 mx-auto shadow-md">
        <?php if (!empty($iconClass)): ?>
            <div class="icon-container">
                <i class="<?php echo $iconClass; ?> text-primary text-8xl"></i>
            </div>
        <?php endif; ?>
        <h3><?php echo isset($args['title']) ? $args['title'] : ""; ?></h3>
        <p><?php echo isset($args['content']) ? $args['content'] : ""; ?></p>
    </div>  
</div>
