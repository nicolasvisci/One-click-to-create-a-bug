
<style>

h1 {
    color: #fff;
    text-align: center;
    position: relative;
    bottom: 50px;
}

span {
  transition: background-size .5s, background-position .3s ease-in .5s;
}
span:hover {
  transition: background-position .5s, background-size .3s ease-in .5s;
}
span {
  background-image: linear-gradient(orange, orange);
  background-repeat: no-repeat;
  background-position: 0% 100%;
  background-size: 100% 0px;
  border-radius: 10px 10px 10px 10px;
}
span:hover {
  background-size: 100% 100%;
  background-position: 0% 0%;
}

</style>

        <main>
            <form class="compile-form" >
            <h1><span> LOGIN </span></h1> 
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit" class="regLog_btn" formaction='dashboard'  method='post'><a class="regLog_text">Login</a></button>
                <button type="submit" name="recuperaPassword" class="regLog_btn" id="recuperaPassword" formaction="recuperaPassword" ><a class="regLog_text">Recupera Password</a></button>
            </form>
        </main>
    </body>
</html>