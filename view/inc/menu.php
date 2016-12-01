<!--navigation-starts-->
<div class="navigation animated wow fadeInDown animated animated" data-wow-duration="1200ms" data-wow-delay="500ms">
  <span class="menu"></span>
    <ul class="navig cl-effect-16">
      <li class="active"><a href="<?php amigable('?module=main'); ?>">Home</a></li>
      <li><a href="<?php amigable('?module=users&function=users'); ?>">Users</a></li>
      <li><a href="<?php amigable('?module=specialists&function=list_specialists'); ?>">Specialists</a></li>
      <li><a href="<?php amigable('?module=hospital&function=begin'); ?>">Hospitals</a></li>
      <li><a href="<?php amigable('?module=contact&function=loadcontact'); ?>">Contact</a></li>
    </ul>
</div>
<!--navigation-end-->
<!--script-for-menu-->
 <script>
    $("span.menu").click(function(){
      $(" ul.navig").slideToggle("slow" , function(){
      });
    });
  </script>
<!--script-for-menu-->
