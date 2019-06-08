<?php
  session_start();

  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

  function is_favorite($id) {
    return in_array($id, $_SESSION['favorites']);
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Asynchronous Button</title>
    <style>
      #blog-posts {
        width: 700px;
        float: left;
      }
      #blog-posts img{
        width: 80%;
      }
      #cart_items{
        width: 550px;float: left;background-color: pink;
        padding:10px;
        padding-top: 0;
        max-height: 280px;
        overflow-y: auto;
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        padding-bottom: 0;
        position: fixed;
        right: 50px;
      }
      
      #cart_items h2{border-bottom: 1px dotted green;color: green;
        box-shadow: 2px 2px 25px gray;margin-top: 0;
        text-align: right;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        position: sticky;top:0;
        padding-right: 5px;

      }
      #cart_items marquee{
        background-color: silver;
        margin-top: 20px;
      }
      #cart_items img{width: 100%;}

      .favorite_cart{
        clear: both;
      }
      .favorite_cart h3{
        position: sticky;top: 0;padding-left: 5px;
      }

      #proceed{
        background-color: #0000FF;
        color: white;
        padding: 5px;
        border-radius: 5px;
        text-align: center; box-shadow: 2px 2px 5px black;
        margin-top: 10px;
        display: inline-block;margin-left:88%;
      }
      #proceed:hover{background-color: background: #000099;cursor: pointer}
      #proceed:active{box-shadow: 0px 0px 0px black;}

      .blog-post {
        border: 1px solid black;
        margin: 10px 10px 20px 10px;
        padding: 6px 10px;

      }
      

      button.favorite-button, button.unfavorite-button {
        background: #0000FF;
        color: white;
        text-align: center;
        width: 70px;
        cursor: pointer;
      }
      button.favorite-button:hover, button.unfavorite-button:hover {
        background: #000099;
      }

      button.favorite-button {
        display: inline;
      }
      .favorite button.favorite-button {
        display: none;
      }
      button.unfavorite-button {
        display: none;
      }
      .favorite button.unfavorite-button {
        display: inline;
      }

      .favorite-heart {
        color: red;
        font-size: 2em;
        float: right;
        display: none;
      }
      .favorite .favorite-heart {
        display: block;
      }
    </style>
  </head>
  <body>
    <div id="blog-posts">

      <div id="blog-post-101" class="blog-post <?php if(is_favorite(101)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Dell inspiron 13</h3>
        <img src="images/Bgw4nLRa2P9eFpCBaGLixC-768-80.jpg" alt="">
        <div>
          $15.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
        
      </div>

      <div id="blog-post-102" class="blog-post <?php if(is_favorite(102)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Iphone 10</h3>
        <img src="images/iphone-xr-white-select-201809.png" alt="">
        <div>
          $13.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
      </div>

      <div id="blog-post-103" class="blog-post <?php if(is_favorite(103)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Samsung ssd (fast storing device)</h3>
        <img src="images/MZ-76E250BW_1.jpg" alt="">
        <div>
          $10.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
      </div>

      <div id="blog-post-104" class="blog-post <?php if(is_favorite(104)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Dell convertible laptop</h3>
        <img src="images/gettyimages-141532349-2048x2048.jpg" alt="">
        <div>
          $14.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
      </div>

      <div id="blog-post-105" class="blog-post <?php if(is_favorite(105)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>MacBook pro </h3>
        <img src="images/apple_mr9q2ll_a_13_3_macbook_pro_mid_1423729.jpg" alt="">
        <div>
          $20.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
      </div>

      <div id="blog-post-106" class="blog-post <?php if(is_favorite(106)) { echo 'favorite'; } ?>">
        <span class="favorite-heart">&hearts;</span>
        <h3>Indian flag stand</h3>
        <img src="images/ManeKo-Plastic-Car-Dashboard-Indian-SDL885597909-1-56c64.jpg" alt="">
        <div>
          $302.00;
        </div>
        <button class="favorite-button">Favorite</button>
        <button class="unfavorite-button">Unfavorite</button>
      </div>
    </div>

    <!-- New div for cart items  -->
    <div id="cart_items">
      <h2>Your cart items</h2>
      
    </div>

    <script>
      // Create a marquee element for status : Item Added/removed
      var sta = document.createElement("marquee");
      
      
      // Display cart items on first load of page
      var cart_items = document.getElementsByClassName("favorite");
      var cart_items_div = document.getElementById("cart_items");
      let ii = 0;

      // Adding/Removing items from cart box
      function add_remove_items_from_cart(){
        ii = 0;
            while( ii < cart_items.length){
              let c1 = document.createElement("div");
              c1.className="favorite_cart";
              c1.innerHTML = cart_items.item(ii).innerHTML;
              cart_items_div.appendChild(c1);
              var remove_btn = document.querySelectorAll(".favorite_cart button");
              c1.removeChild(remove_btn[ii]);

              c1.innerHTML +="<div id='proceed'>proceed</div>";
              c1.innerHTML +=  "<br><hr>";
              ii++;   
}
      }

      // Reset the cart items
      function reset_cart_item(){
         if(document.getElementsByClassName("favorite_cart")){
              for(let i = 0; i<document.getElementsByClassName("favorite_cart").length; i++){
              document.getElementsByClassName("favorite_cart")[i].innerHTML="";
              }
            }
      }

            // Checking (onload the page) for original items that you liked and insert into cart item box
            add_remove_items_from_cart();

      // When favourite button clicks
      function favorite() {
        // Getting parent of the favourite element
        var parent = this.parentElement;
        // Setting a new Asynchronous request with AJaX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'favorite.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            //console.log('Result: ' + result);
            if(result == 'true') {
              parent.classList.add("favorite");
            }

            var cart_items = document.getElementsByClassName("favorite");
            var cart_items_div = document.getElementById("cart_items");
            
            // Restting the cart items
           reset_cart_item();
            
            // Adding item/S to cart
            add_remove_items_from_cart();

            // Adding status for item/S Added to cart
            sta.style.position = "sticky";
            sta.style.bottom = "0px";
            sta.innerHTML="Status : Item Added";
            cart_items_div.appendChild(sta);
          }
        };
        // Send the AJaX request
        xhr.send("id=" + parent.id);
      }

      // Adding onClick event
      var buttons = document.getElementsByClassName("favorite-button");
      for(i=0; i < buttons.length; i++) {
        buttons.item(i).addEventListener("click", favorite);
      }

      // When unfavourite button clicks
      function unfavorite() {
        // Getting parent of the unfavourite element
        var parent = this.parentElement;

        // Setting a new Asynchronous request with AJaX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unfavorite.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            //console.log('Result: ' + result);
            if(result == 'true') {
              parent.classList.remove("favorite");
            }
            
            var cart_items = document.getElementsByClassName("favorite");
            var cart_items_div = document.getElementById("cart_items");
            // Reset the cart items
            reset_cart_item();

            // Removing item/S from cart
            add_remove_items_from_cart();
            // Adding status for item/S Removed from cart
            sta.style.position = "sticky";
            sta.style.bottom = "0px";
            sta.innerHTML="Status : Item Removed";
            cart_items_div.appendChild(sta);
          }
        };
        xhr.send("id=" + parent.id);
      }

       // Adding onClick event
      var buttons = document.getElementsByClassName("unfavorite-button");
      for(i=0; i < buttons.length; i++) {
        buttons.item(i).addEventListener("click", unfavorite);
      }
    </script>

  </body>
</html>
