<!-- JAVASCRIPT TOE TE VOEGEN IN PAGINA

<script src="js/jquery.mobile-menu.js"></script>
<script>
	$(function(){
		$("body").mobile_menu({
			menu: ['#set_nav ul', '#secondary-nav ul'],
			menu_width: 200,
			prepend_button_to: '#mobile-bar'
		});
	});
</script>
-->

<div id="sidebar" style="position: relative">
    <div data-theme="a" data-role="header">
    <header>
        <div id="mobile-bar"></div>
        <div id="main-nav">
            <ul>
                <li><p>settings</p></li>
                <li>
                    <a href="change_zones.php" class="set_btn">
                        <img src="" alt="change zones" />
                        <p>change zones</p>
                    </a>
                </li>
                <li>
                    <a href="account.php" class="set_btn">
                        <img src="" alt="account settings" />
                        <p>account</p>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    </div>
</div>