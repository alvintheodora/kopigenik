<!--Footer-->
<footer class="footer-btm container-fluid container-inner bg-black1">
    <div class="row">
        <div class="col-sm-4">
            <h5 style="color: #f7db9c;">QUICK LINKS</h5>
            <ul>
                <li><a href="\subscribe">Berlangganan</a></li>
                <li><a href="\beans">Belanja</a></li>
                <li><a href="\login">Masuk</a></li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h5 style="color: #f7db9c;">TENTANG KAMI</h5>
            <ul>
                <li><a href="\about-us">Apa itu Kopigenik</a></li>
                <li><a href="\faq">FAQ</a></li>
                <li><a href="\wordpress">Blog</a></li>
                <li><a href="\contact-us">Hubungi Kami</a></li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h5 style="color: #f7db9c;">SOCIAL MEDIA</h5>
            <ul>
                <li>
                    <a href="https://facebook.com/kopigenik" target="__blank">
                        <img class="icon-social-media" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-facebook.svg'; ?>" style="display: inline;">
                        <span>Kopigenik</span>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/kopigenik" target="__blank"">
                        <img class="icon-social-media" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-instagram.svg'; ?>" style="display: inline;">
                        <span>@kopigenik</span>
                    </a>
                </li>
                <li>                        
                    <img class="icon-social-media" src="<?php echo get_stylesheet_directory_uri() . '/images/icon-line.jpg'; ?>" style="display: inline;">
                    <span style="color: #fff;">@kopigenik</span>                            
                </li>
                <li style="margin-left: 50px;">
                    <div class="line-it-button" data-lang="en" data-type="friend" data-lineid="@kopigenik" data-count="true" data-home="true" style="display: none; padding-top: 5px;"></div>                            
                </li>
            </ul>
        </div>
    </div>
</footer>		
	
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
	



<?php wp_footer(); ?>

</body>
</html>