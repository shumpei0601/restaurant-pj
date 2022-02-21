<!DOCTYPE html>
<html lang="jd">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css" >
  <style>
    
    a{
      text-decoration: none;
      color: blue
    }

    .nav{
      position: absolute;
      height: 100vh;
      width: 100%;
      left: -100%;
      background: #eee;
      transition: .7s;
      text-align: center; 
    }
    .nav ul{
      padding-top: 80px;
    }
    .nav ul li{
      list-style-type: none;
      margin-top: 50px;
    }
    .menu {
      display: inline-block;
      width: 36px;
      height: 32px;
      cursor: pointer;
      position: relative;
      left: 20px;
      top: 20px;
    }
    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 4px;
      background-color: #000;
      position: absolute;
      transition: 0.5s;
    }
    .menu__line--top {
      top: 0;
      width: 50%;
    }
    .menu__line--middle {
      top: 14px;
      width: 100%;
    }
    .menu__line--bottom {
      bottom: 0;
      width: 20%;
    }
    .menu.open span:nth-of-type(1) {
      top: 14px;
      transform: rotate(45deg);
      width: 100%;
    }
    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }
    .menu.open span:nth-of-type(3) {
      top: 14px;
      transform: rotate(-45deg);
      width: 100%;
    }
    .in{
      transform: translateX(100%);
    }
    body{
      background-color: #dbdbdb;
    }
    .container{
      display: flex;
      justify-content: space-around;
    }
    .card{
      width: 40%;
    }
    .card_img img{
      width: 100%;
    }
    .reservation{
      background-color: blue;
      width: 40%;
    }
    h2, th, td{
      color: white;
    } 
  </style>
</head>
<body>
  <div class="container">
    @auth
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <form action="/logout" method="post">
          @csrf
           <li><button>Logout</button></li>
        </form>
       
        <li><a href="http://localhost:8000/mypage">Mypage</a></li>
      </ul>
    </nav>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    @endauth
    @guest
    <nav class="nav" id="nav">
      <ul>
        <li><a href="http://localhost:8000/">Home</a></li>
        <li><a href="http://localhost:8000/register">Registration</a></li>
        <li><a href="http://localhost:8000/login">Login</a></li>
      </ul>
    </nav>
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    @endguest
    <h1>Rese</h1>
    <div class="card">
      <span class="back_btn">
        <a href="http://localhost:8000/">&lt;</a>
      </span>
      <span class="card-shop_name">{{ $_GET['name']; }}</span>
      <div class="card_img">
        <img src="{{ $_GET['image_url']; }}" alt="">
      </div>
      <div class="card_tag">
        <span class="card_area">#{{ $_GET["area_id"]; }}</span>
        <span class="card_genre">#{{ $_GET["genre_id"]; }}</span>
      </div>
      <p class="card_content">{{ $_GET["description"]; }}</p>
    </div>
    <div class="reservation">
      <h2>予約</h2>
      <form action="/reserve" method="POST">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $_GET['id']; }}" />
        <!--<input type="text" name="user_id" value="" />-->
        <input type="date" name="date" class="date" id="text1" onKeyUp="document.getElementById('same1').innerText = document.getElementById('text1').value;" /><br>
        <input type="time" name="time" id="" class="reserve_time" />
        <select name="num_of_users" id="number">
          <optgroup label="人数">
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
            <option value="6">6人</option>
          </optgroup>
        </select>
        <div class="reserve">
          <table>
            <tr>
              <th>Shop</th>
              <td>
                <span>{{ $_GET["name"]; }}</span>
              </td>
            </tr>
            <tr>
              <th>Date</th>
              <td>
                <span id="same1"></span>
              </td>
            </tr>
            <tr>
              <th>Time</th>
              <td>
                <span id="jikann"></span>
              </td>
            </tr>
          </table>
        </div>
        <input type="submit" class="reserve_btn" value="予約する" />
      </form>
    </div>
  </div>
  <script>
    const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("nav");
    nav.classList.toggle('in');
    });
  </script>
</body>
</html>