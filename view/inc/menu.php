<!--navigation-starts-->
<div class="navigation animated wow fadeInDown animated animated" data-wow-duration="1200ms" data-wow-delay="500ms">
  <span class="menu"></span>
    <ul class="navig cl-effect-16">
      <li><a href="<?php amigable('?module=main'); ?>">Home</a></li>
      <li><a href="<?php amigable('?module=specialists&function=list_specialists'); ?>">Specialists</a></li>
      <li><a href="<?php amigable('?module=hospital&function=load_map'); ?>">Hospitals</a></li>
      <li><a href="<?php amigable('?module=contact&function=loadcontact'); ?>">Contact</a></li>
      <li><a href="<?php amigable('?module=users&function=profile'); ?>">Profile</a></li>
      <li><a href="<?php amigable('?module=users&function=modal'); ?>">Log In</a></li>
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
  <div id="alertbanner"></div>
<!--script-for-menu-->
