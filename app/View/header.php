<header id="header">
    <div class="top_nav">
        <div class="headerz" >
            <ul class="ul_button">
                <?php if (!isset($_SESSION['user'])) { ?>
                    <a href="/starter-project/register"><button type="button" class="register_btn">Register</button></a>
                    <a href="/starter-project/login"><button type="button" class="login_btn">Login</button></a>
                    <a href="/starter-project/"><button type="button" class="home_btn">Home page</button></a>

                <?php } else { ?>

                        <a href="./profile"><button type="button" class="button-profile">Profil</button></a>
                        <a href="./logout"><button type="button" class="button-logout">Logout</button></a>
                        
                    <?php } ?>
            </ul>
        </div>
    </div>
</header>