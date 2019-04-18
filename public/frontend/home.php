<?php
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    require_once '..' .DS. 'layouts' .DS. 'head.php';
?>

    <!-- showcase -->
    <section class="top-container">
        <div class="showcase">
            <div id="arrow-left" class="arrow"></div>
            <div id="slider">
                <div id="slide1" class="slide slide1">
                    <div class="slide-content">
                        <h1><strong>Tick Tac Toe</strong></h1>
                        <p>Tic-tac-toe (American English), noughts and crosses (British English), or Xs and Os is a paper-and-pencil game for two players, X and O, who take turns marking the spaces in a 3×3 grid. The player who succeeds in placing three of their marks in a horizontal, vertical, or diagonal row wins the game.</p>
                        <a href="#" id="desert" class="btn">Start...</a>
                    </div>
                </div>

                <div class="slide slide2">
                    <div class="slide-content">
                        <h1>I am lake</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero quam assumenda voluptate facilis incidunt recusandae rerum animi aliquam nisi tenetur?</p>
                        <a href="#" class="btn">Play Lake</a>
                    </div>
                </div>

                <div class="slide slide3">
                    <div class="slide-content">
                        <h1>I am bee</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, repellendus voluptatum? Iure debitis tempora veritatis earum blanditiis neque vero nam.</p>
                        <a href="#" class="btn">Play Bee</a>
                    </div>
                </div>
            </div>
            <div id="arrow-right" class="arrow"></div>
        </div>

        <!-- top box -->
        <div class="top-box top-box-a">
            <h4>Pick A Face</h4>
            <p class="pick">Free Trail</p>
            <a href="#" class="btn">Register</a>
        </div>
        <div class="top-box top-box-b">
            <h4>Pick A Nick</h4>
            <p class="pick">VIP Services</p>
            <a href="#" class="btn">Buy Now</a>
        </div>
    </section>

    <!-- cards -->
    <section class="cards">
        <div class="card">
            <i class="fas fa-chart-pie fa-4x"></i>
            <h3>Pick</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, eum!</p>
        </div>
        <div class="card">
            <i class="fas fa-globe fa-4x"></i>
            <h3>Face</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, eum!</p>
        </div>
        <div class="card">
            <i class="fas fa-cog fa-4x"></i>
            <h3>Nick</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, eum!</p>
        </div>
        <div class="card">
            <i class="fas fa-users fa-4x"></i>
            <h3>Game</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, eum!</p>
        </div>
    </section>

    <!-- info -->
    <section class="info">
        <img src="../assets/vitalimages/wheat.jpg" alt="loading...">
        <div>
            <h2>Pick Face Nick Game</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo soluta, temporibus sed iusto at beatae unde recusandae natus labore cupiditate voluptates doloribus assumenda sapiente, excepturi rem distinctio cumque sit quos?</p>
            <a id="modalBtn" class="btn" href="#">Learn More</a>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="closeBtn">&times;</span>
                        <h4>Pick a Face and a Nick</h4>
                    </div>
                    <div class="modal-body">
                        <img src="../assets/vitalimages/male_1.png" height="150" width="100" alt="loading...">
                        <img src="../assets/vitalimages/female_1.png" height="150" width="100" alt="loading...">
                        <img src="../assets/vitalimages/male_2.png" height="150" width="100" alt="loading...">
                        <img src="../assets/vitalimages/female_2.png" height="150" width="100" alt="loading...">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn">Aurangzeb</a>
                        <a href="#" class="btn">Shweta</a>
                        <a href="#" class="btn">Phanindra</a>
                        <a href="#" class="btn">YanJiao</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- portfolio -->
    <section class="portfolio">
        <div id="filter" class="filter-container">
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x200" alt="loading...">
                <a class="game-category" href="#">Action</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x201" alt="loading...">
                <a class="game-category" href="#">Race</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x202" alt="loading...">
                <a class="game-category" href="#">Puzzle</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x203" alt="loading...">
                <a class="game-category" href="#">Race</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x204" alt="loading...">
                <a class="game-category" href="#">Action</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x205" alt="loading...">
                <a class="game-category" href="#">Puzzle</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x206" alt="loading...">
                <a class="game-category" href="#">Puzzle</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x207" alt="loading...">
                <a class="game-category" href="#">Race</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x208" alt="loading...">
                <a class="game-category" href="#">Action</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x209" alt="loading...">
                <a class="game-category" href="#">Action</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x210" alt="loading...">
                <a class="game-category" href="#">Puzzle</a>
            </div>
            <div class="filter-item">
                <img src="https://source.unsplash.com/random/200x211" alt="loading...">
                <a class="game-category" href="#">Race</a>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php require_once '..' .DS. 'layouts' .DS. 'foot.php'; ?>
