<nav>
            <div class="logo">
                <h1 class="text-3xl font-bold">Carry</h1>
            </div>
            <ul class="">
                <li class="inline-block ">

                    <a class="px-3 py-1 mx-1"  id="home" onclick="home()" >Home</a>
                </li>

                <li class="inline-block">

                    <a class="px-3 py-1 mx-1" id="shop" href="./pages/shop.php">Shop</a>
                </li>

                <li class="inline-block">

                    <a class="px-3 py-1 mx-1" id="about" onclick="about()">About</a>
                </li>

                <li class="inline-block">

                    <a class="px-3 py-1 mx-1" id="contact" onclick="contact()">Contact</a>
                </li>

                <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    ?>
                    <li class="inline-block">
                        <form action="logout.php" method="post"><button name="logout" class="inline-block text-[#ffe4c4] text-2xl   px-2 py-1 border-b-2  border-transparent hover:border-black"> log out</button></form>
                    </li>
                    <?php
                } else { ?>
                    <li class="inline-block">

                        <a class="px-3 py-1 mx-1" href="login.php">Login</a>
                    </li>
                    <li class="inline-block">

                        <a class="px-3 py-1 mx-1" href="register.php">Register</a>
                    </li>

                    <?php

                }
                ?>
                <li class="inline-block"> <a class="px-3 py-1 mx-1" href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>

            </ul>
        </nav>