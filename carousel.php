
<?php
//mostrar caroussel
echo "<div class='container'>";
    if (!empty($destacados)) {
        echo "<div id='carouselDestacados' class='carousel slide' data-ride='carousel'>";
        echo "<div class='carousel-inner'>";
    
        foreach ($destacados as $key => $articulo) {
            $active = ($key == 0) ? 'active' : '';
            echo "<div class='carousel-item $active'>";
            echo $articulo->mostrarCard();
            echo "</div>";
        }

        echo "</div>";
        echo "<a class='carousel-control-prev' href='#carouselDestacados' role='button' data-slide='prev'>";
        echo "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
        echo "<span class='sr-only'>Previous</span></a>";
        echo "<a class='carousel-control-next' href='#carouselDestacados' role='button' data-slide='next'>";
        echo "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
        echo "<span class='sr-only'>Next</span></a></div>";
    }
    echo "</div>"

    ?>